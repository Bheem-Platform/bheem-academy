<?php
// Mentor Dashboard - Connected to Real Moodle Database
// IMPORTANT: Only authenticated mentors can access this page

error_reporting(E_ALL);
ini_set('display_errors', 1); // Display errors for debugging

try {
    require_once(__DIR__ . '/config.php');
    require_once($CFG->libdir . '/setuplib.php');
    require_once($CFG->dirroot . '/course/lib.php');
    require_once($CFG->dirroot . '/lib/completionlib.php');

    // Require user to be logged in - redirect to login if not authenticated
    require_login(null, false);

    // Get current user
    global $USER, $DB, $PAGE, $OUTPUT;

    // Double check user is authenticated (not guest)
    if (!isloggedin() || isguestuser()) {
        redirect(new moodle_url('/login/index.php'), 'You must be logged in to access this page');
        die();
    }

    // ===== MENTOR USERTYPE VALIDATION =====
    // Only users with "Mentor" usertype can access this dashboard
    require_once($CFG->dirroot . '/user/profile/lib.php');
    profile_load_data($USER);

    // Get the usertype custom profile field value
    $usertype = '';
    if (isset($USER->profile_field_usertype)) {
        $usertype = $USER->profile_field_usertype;
    } else {
        // Fallback: Query database directly if not loaded in profile
        $usertype_field = $DB->get_record('user_info_field', array('shortname' => 'usertype'));
        if ($usertype_field) {
            $usertype_data = $DB->get_record('user_info_data', array(
                'userid' => $USER->id,
                'fieldid' => $usertype_field->id
            ));
            if ($usertype_data) {
                $usertype = $usertype_data->data;
            }
        }
    }

    // Check if usertype is "Mentor" (case-insensitive)
    if (strtolower(trim($usertype)) !== 'mentor') {
        // User is not a mentor, redirect to their appropriate dashboard
        $detected_usertype = strtolower(trim($usertype));

        // Redirect to appropriate dashboard based on usertype
        if ($detected_usertype === 'student') {
            // Student trying to access mentor dashboard - redirect to student dashboard
            redirect($CFG->wwwroot . '/student-dashboard.php');
        } elseif ($detected_usertype === 'parent') {
            // Parent trying to access mentor dashboard - redirect to parent dashboard
            redirect($CFG->wwwroot . '/parent-dashboard.php');
        } else {
            // Unknown usertype or no usertype - redirect to login with error
            redirect(new moodle_url('/login/academy-login.php', array(
                'error' => 'access_denied',
                'attempted' => 'mentor',
                'usertype' => 'unknown',
                'user' => 'mentor',
                'logout' => '1'
            )));
        }
        die();
    }
    // ===== END MENTOR USERTYPE VALIDATION =====

    $current_user_id = $USER->id;
    $username = fullname($USER);
    $user_firstname = $USER->firstname;
    $user_initials = strtoupper(substr($USER->firstname, 0, 1) . substr($USER->lastname, 0, 1));
} catch (Exception $e) {
    echo '<h2>Error initializing dashboard</h2>';
    echo '<p>' . htmlspecialchars($e->getMessage()) . '</p>';
    echo '<pre>' . htmlspecialchars($e->getTraceAsString()) . '</pre>';
    die();
}

// Fetch enrolled courses for the current user
try {
    $enrolled_courses = enrol_get_my_courses(['id', 'fullname', 'shortname', 'visible', 'enablecompletion'], 'fullname ASC');
} catch (Exception $e) {
    $enrolled_courses = [];
    error_log('Error fetching courses: ' . $e->getMessage());
}

// Course icon and color mappings
$course_icons = ['fas fa-robot', 'fab fa-python', 'fas fa-code', 'fas fa-brain', 'fas fa-chart-area', 'fas fa-bullhorn', 'fas fa-laptop', 'fas fa-database'];
$course_colors = [
    'linear-gradient(135deg, #667eea, #764ba2)',
    'linear-gradient(135deg, #10b981, #059669)',
    'linear-gradient(135deg, #f59e0b, #d97706)',
    'linear-gradient(135deg, #8b5cf6, #7c3aed)',
    'linear-gradient(135deg, #ef4444, #dc2626)',
    'linear-gradient(135deg, #06b6d4, #0891b2)',
    'linear-gradient(135deg, #ec4899, #db2777)',
    'linear-gradient(135deg, #14b8a6, #0d9488)'
];

$user_courses = [];
$course_index = 0;

foreach ($enrolled_courses as $course) {
    try {
        // Calculate course completion percentage
        $progress = 0;
        if (!empty($course->enablecompletion)) {
            $completion = new completion_info($course);
            if ($completion->is_enabled()) {
                $percentage = \core_completion\progress::get_course_progress_percentage($course, $current_user_id);
                $progress = $percentage ? round($percentage) : 0;
            }
        }

        $user_courses[] = [
            'id' => $course->id,
            'title' => $course->fullname,
            'progress' => $progress,
            'icon' => $course_icons[$course_index % count($course_icons)],
            'color' => $course_colors[$course_index % count($course_colors)],
            'enrolled' => true
        ];
        $course_index++;
    } catch (Exception $e) {
        error_log('Error processing course ' . $course->id . ': ' . $e->getMessage());
        continue;
    }
}

// Get active courses (progress < 100%)
$active_courses = array_filter($user_courses, function($course) {
    return $course['progress'] < 100;
});

// Fetch assignments for all enrolled courses
$assignments_data = [];
$assignment_icons = ['fas fa-edit', 'fas fa-code', 'fas fa-laptop-code', 'fas fa-chart-bar', 'fas fa-brain', 'fas fa-file-alt'];

foreach ($enrolled_courses as $course) {
    try {
        // Get all assignments for this course
        $modinfo = get_fast_modinfo($course);
        $assignments = $modinfo->get_instances_of('assign');

        foreach ($assignments as $assignment) {
            if (!$assignment->uservisible) {
                continue;
            }

            $assign = $DB->get_record('assign', ['id' => $assignment->instance]);
            if (!$assign) {
                continue;
            }

            // Check submission status
            $submission = $DB->get_record('assign_submission', [
                'assignment' => $assign->id,
                'userid' => $current_user_id,
                'latest' => 1
            ]);

            $status = 'pending';
            $statusText = 'Pending';
            $color = '#f59e0b';

            if ($submission && $submission->status == 'submitted') {
                $status = 'submitted';
                $statusText = 'Submitted';
                $color = '#10b981';
            } elseif ($assign->duedate > 0 && $assign->duedate < time()) {
                $status = 'overdue';
                $statusText = 'Overdue';
                $color = '#dc2626';
            }

            $dueDate = $assign->duedate > 0 ? date('M j, Y', $assign->duedate) : 'No due date';

            $assignments_data[] = [
                'id' => $assign->id,
                'title' => $assign->name,
                'course' => $course->fullname,
                'dueDate' => $dueDate,
                'status' => $status,
                'statusText' => $statusText,
                'icon' => $assignment_icons[array_rand($assignment_icons)],
                'color' => $color
            ];
        }
    } catch (Exception $e) {
        error_log('Error fetching assignments for course ' . $course->id . ': ' . $e->getMessage());
        continue;
    }
}

// Fetch recent notifications/activity
$notifications_data = [];
$notification_colors = ['#667eea', '#10b981', '#f59e0b', '#8b5cf6', '#ef4444', '#06b6d4'];

try {
    // Get recent log entries for the user
    $logs = $DB->get_records_sql("
        SELECT l.id, l.courseid, l.timecreated, l.component, l.action, l.target, c.fullname as coursename
        FROM {logstore_standard_log} l
        LEFT JOIN {course} c ON c.id = l.courseid
        WHERE l.userid = :userid AND l.courseid > 1
        ORDER BY l.timecreated DESC
        LIMIT 10
    ", ['userid' => $current_user_id]);

    foreach ($logs as $log) {
        $icon = 'fas fa-info-circle';
        $title = 'Activity in ' . ($log->coursename ?: 'course');

        // Customize based on action type
        if (strpos($log->component, 'assign') !== false) {
            $icon = 'fas fa-tasks';
            if ($log->action == 'submitted') {
                $title = 'Assignment submitted in ' . $log->coursename;
            } else {
                $title = 'Assignment activity in ' . $log->coursename;
            }
        } elseif (strpos($log->component, 'quiz') !== false) {
            $icon = 'fas fa-question-circle';
            $title = 'Quiz activity in ' . $log->coursename;
        } elseif (strpos($log->component, 'forum') !== false) {
            $icon = 'fas fa-comments';
            $title = 'Forum activity in ' . $log->coursename;
        } elseif ($log->action == 'viewed') {
            $icon = 'fas fa-eye';
            $title = 'Viewed content in ' . $log->coursename;
        }

        $time_ago = format_time(time() - $log->timecreated);

        $notifications_data[] = [
            'id' => $log->id,
            'title' => $title,
            'time' => $time_ago . ' ago',
            'icon' => $icon,
            'color' => $notification_colors[array_rand($notification_colors)]
        ];
    }
} catch (Exception $e) {
    error_log('Error fetching notifications: ' . $e->getMessage());
}

// If no notifications, add a welcome message
if (empty($notifications_data)) {
    $notifications_data[] = [
        'id' => 1,
        'title' => 'Welcome to Bheem Academy!',
        'time' => 'Today',
        'icon' => 'fas fa-graduation-cap',
        'color' => '#667eea'
    ];
}

// Calculate Statistics
$total_courses = count($user_courses);
$completed_courses = count(array_filter($user_courses, function($course) { return $course['progress'] == 100; }));

// Calculate total lessons/activities completed
$total_lessons = 0;
try {
    foreach ($enrolled_courses as $course) {
        $completion = new completion_info($course);
        if ($completion->is_enabled()) {
            $completions = $completion->get_completions($current_user_id);
            foreach ($completions as $comp) {
                if ($comp->is_complete()) {
                    $total_lessons++;
                }
            }
        }
    }
} catch (Exception $e) {
    error_log('Error calculating lessons: ' . $e->getMessage());
    $total_lessons = $total_courses * 10; // Fallback estimate
}

// Calculate learning hours from course time spent
$learning_hours = 0;
try {
    // Try to get time from course completion tracking
    $sql = "SELECT SUM(timespent) as total
            FROM {course_modules_completion}
            WHERE userid = :userid AND timemodified > 0";
    $result = $DB->get_record_sql($sql, ['userid' => $current_user_id]);

    if ($result && !empty($result->total)) {
        $learning_hours = round($result->total / 3600);
    }
} catch (Exception $e) {
    error_log('Error calculating learning hours: ' . $e->getMessage());
}

// If no time tracking, estimate based on course completions
if ($learning_hours == 0) {
    $learning_hours = max($total_lessons * 2, $total_courses * 15); // Rough estimate: 2 hours per lesson or 15 per course
}

$certificates = $completed_courses;

// Convert PHP arrays to JSON for JavaScript
$courses_json = json_encode(array_values($user_courses));
$active_courses_json = json_encode(array_values($active_courses));
$assignments_json = json_encode($assignments_data);
$notifications_json = json_encode($notifications_data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentor Dashboard - Bheem Academy</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Global Header Styles -->
    <link rel="stylesheet" href="<?php echo $CFG->wwwroot; ?>/includes/bheem_header_styles.css">

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <style>
        /* Adjust body for fixed header */
        body {
            padding-top: 80px !important;
        }
        :root {
            /* Light mode colors */
            --bg-primary: #f8fafc;
            --bg-secondary: #ffffff;
            --bg-tertiary: #f8fafc;
            --bg-hover: #f1f5f9;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --text-tertiary: #9ca3af;
            --border-color: #e5e7eb;
            --shadow: rgba(0, 0, 0, 0.1);
            --shadow-light: rgba(0, 0, 0, 0.05);
        }

        body.dark-mode {
            /* Dark mode colors */
            --bg-primary: #0f172a;
            --bg-secondary: #1e293b;
            --bg-tertiary: #334155;
            --bg-hover: #475569;
            --text-primary: #f1f5f9;
            --text-secondary: #cbd5e1;
            --text-tertiary: #94a3b8;
            --border-color: #334155;
            --shadow: rgba(0, 0, 0, 0.3);
            --shadow-light: rgba(0, 0, 0, 0.2);
        }

        /* Dark mode specific overrides for new widgets */
        body.dark-mode .welcome-hero {
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 50%, #d946c7 100%);
        }

        body.dark-mode .quick-action-btn.primary {
            background: #1e293b;
            color: #667eea;
            border: 2px solid #667eea;
        }

        body.dark-mode .quick-action-btn.primary:hover {
            background: #667eea;
            color: white;
        }

        body.dark-mode .stat-card-modern {
            background: #1e293b;
            border-color: #334155;
        }

        body.dark-mode .widget-card {
            background: #1e293b;
        }

        body.dark-mode .streak-day {
            background: #334155;
        }

        body.dark-mode .action-item {
            background: #334155;
        }

        body.dark-mode .action-item:hover {
            background: #475569;
        }

        body.dark-mode .event-item {
            background: #334155;
        }

        body.dark-mode .event-item:hover {
            background: #475569;
        }

        body.dark-mode .course-card-modern {
            background: #334155;
        }

        body.dark-mode .course-card-modern:hover {
            background: #3f4c5f;
        }

        body.dark-mode .course-progress-badge {
            background: rgba(102, 126, 234, 0.2);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            line-height: 1.6;
            color: var(--text-primary);
            background: var(--bg-primary);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .dashboard-container {
            display: grid;
            grid-template-columns: 280px 1fr 320px;
            grid-template-rows: 80px 1fr;
            grid-template-areas:
                "header header header"
                "sidebar main rightpane";
            min-height: calc(100vh - 80px);
            gap: 0;
            margin-top: 0;
        }

        /* Header */
        .dashboard-header {
            grid-area: header;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            box-shadow: 0 2px 20px rgba(102, 126, 234, 0.15);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            z-index: 1000;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
            text-decoration: none;
        }

        .logo img {
            height: 40px;
            width: auto;
        }

        .logo span {
            font-family: 'Poppins', sans-serif;
            font-size: 20px;
            font-weight: 600;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .dark-mode-toggle {
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 18px;
        }

        .dark-mode-toggle:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: scale(1.05);
        }

        .dark-mode-toggle:active {
            transform: scale(0.95);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
            background: rgba(255, 255, 255, 0.1);
            padding: 8px 16px;
            border-radius: 25px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff6b6b, #ee5a52);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        /* Left Sidebar */
        .left-sidebar {
            grid-area: sidebar;
            background: var(--bg-secondary);
            border-right: 1px solid var(--border-color);
            padding: 30px 0;
            overflow-y: auto;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .sidebar-section {
            margin-bottom: 30px;
        }

        .sidebar-title {
            font-size: 12px;
            font-weight: 600;
            color: var(--text-tertiary);
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0 30px;
            margin-bottom: 15px;
            transition: color 0.3s ease;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-item {
            margin-bottom: 2px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px 30px;
            color: var(--text-secondary);
            text-decoration: none;
            transition: all 0.2s ease;
            font-weight: 500;
            cursor: pointer;
        }

        .sidebar-link:hover,
        .sidebar-link.active {
            background: var(--bg-hover);
            color: #667eea;
            border-right: 3px solid #667eea;
        }

        .sidebar-icon {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        /* Main Content */
        .main-content {
            grid-area: main;
            padding: 30px;
            overflow-y: auto;
        }

        .content-header {
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 8px;
            transition: color 0.3s ease;
        }

        .page-subtitle {
            color: var(--text-secondary);
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: var(--bg-secondary);
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 1px 3px var(--shadow);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px var(--shadow);
        }

        .stat-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .stat-icon {
            width: 45px;
            height: 45px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: white;
        }

        .stat-value {
            font-size: 32px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 5px;
            transition: color 0.3s ease;
        }

        .stat-label {
            color: var(--text-secondary);
            font-size: 14px;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .courses-section {
            background: var(--bg-secondary);
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 1px 3px var(--shadow);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .section-title {
            font-size: 20px;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: color 0.3s ease;
        }

        .course-list {
            display: grid;
            gap: 15px;
        }

        .course-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 20px;
            background: var(--bg-tertiary);
            border-radius: 10px;
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .course-item:hover {
            background: var(--bg-hover);
            border-color: #667eea;
        }

        .course-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: white;
        }

        .course-info {
            flex: 1;
        }

        .course-title {
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 5px;
            transition: color 0.3s ease;
        }

        .course-progress {
            color: var(--text-secondary);
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .progress-bar {
            width: 100px;
            height: 6px;
            background: var(--border-color);
            border-radius: 3px;
            overflow: hidden;
            margin-top: 5px;
            transition: background-color 0.3s ease;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 3px;
            transition: width 0.3s ease;
        }

        /* Right Sidebar */
        .right-sidebar {
            grid-area: rightpane;
            background: var(--bg-secondary);
            border-left: 1px solid var(--border-color);
            padding: 30px 25px;
            overflow-y: auto;
            transition: all 0.3s ease;
        }

        .widget {
            background: var(--bg-tertiary);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .widget-title {
            font-size: 16px;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: color 0.3s ease;
        }

        .notification-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid var(--border-color);
            transition: border-color 0.3s ease;
        }

        .notification-item:last-child {
            border-bottom: none;
        }

        .notification-icon {
            width: 35px;
            height: 35px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            color: white;
            flex-shrink: 0;
        }

        .notification-content {
            flex: 1;
        }

        .notification-title {
            font-weight: 500;
            color: var(--text-primary);
            font-size: 14px;
            margin-bottom: 3px;
            transition: color 0.3s ease;
        }

        .notification-time {
            color: var(--text-tertiary);
            font-size: 12px;
            transition: color 0.3s ease;
        }

        .calendar-widget {
            text-align: center;
        }

        .calendar-date {
            font-size: 24px;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 5px;
        }

        .calendar-day {
            color: var(--text-secondary);
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .quick-stats {
            padding: 10px 0;
        }

        .stat-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .stat-row:last-child {
            margin-bottom: 0;
        }

        .stat-row-label {
            color: var(--text-secondary);
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .stat-row-value {
            font-weight: 600;
            color: var(--text-primary);
            transition: color 0.3s ease;
        }

        /* Assignment List */
        .assignment-list {
            display: grid;
            gap: 15px;
        }

        .assignment-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 20px;
            background: var(--bg-tertiary);
            border-radius: 10px;
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .assignment-item:hover {
            background: var(--bg-hover);
            border-color: #667eea;
        }

        .assignment-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            color: white;
        }

        .assignment-info {
            flex: 1;
        }

        .assignment-title {
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 3px;
            transition: color 0.3s ease;
        }

        .assignment-due {
            color: var(--text-secondary);
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .assignment-status {
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
        }

        .status-pending {
            background: #fef3c7;
            color: #d97706;
        }

        .status-submitted {
            background: #d1fae5;
            color: #059669;
        }

        .status-overdue {
            background: #fee2e2;
            color: #dc2626;
        }

        /* ===== MODERN DASHBOARD STYLES ===== */

        /* Welcome Hero Section */
        .welcome-hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 30px;
            color: white;
            box-shadow: 0 10px 40px rgba(102, 126, 234, 0.3);
            position: relative;
            overflow: hidden;
        }

        .welcome-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                radial-gradient(circle at 20% 30%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(255, 255, 255, 0.08) 0%, transparent 50%);
            animation: gradientPulse 8s ease-in-out infinite;
            z-index: 0;
        }

        @keyframes gradientPulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }

        .welcome-content,
        .welcome-actions {
            position: relative;
            z-index: 1;
        }

        .welcome-content {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
            position: relative;
            z-index: 1;
        }

        .welcome-icon {
            width: 70px;
            height: 70px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            backdrop-filter: blur(10px);
        }

        .welcome-text {
            flex: 1;
        }

        .welcome-title {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 8px;
            line-height: 1.2;
        }

        .welcome-message {
            font-size: 16px;
            opacity: 0.95;
            font-weight: 500;
        }

        .welcome-actions {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            position: relative;
            z-index: 1;
        }

        .quick-action-btn {
            padding: 14px 28px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 15px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .quick-action-btn.primary {
            background: white;
            color: #667eea;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .quick-action-btn.primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        }

        .quick-action-btn.secondary {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
        }

        .quick-action-btn.secondary:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Modern Stats Grid */
        .stats-grid-modern {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card-modern {
            background: var(--bg-secondary);
            border-radius: 16px;
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 20px;
            box-shadow: 0 2px 10px var(--shadow-light);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .stat-card-modern:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px var(--shadow);
        }

        .stat-icon-modern {
            width: 60px;
            height: 60px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
            flex-shrink: 0;
        }

        .stat-details {
            flex: 1;
        }

        .stat-value-modern {
            font-size: 28px;
            font-weight: 700;
            color: var(--text-primary);
            line-height: 1;
            margin-bottom: 6px;
        }

        .stat-label-modern {
            font-size: 13px;
            color: var(--text-secondary);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-trend {
            font-size: 12px;
            color: #10b981;
            margin-top: 6px;
            font-weight: 600;
        }

        .stat-trend i {
            margin-right: 4px;
        }

        /* Widgets Grid */
        .widgets-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 24px;
            margin-bottom: 30px;
        }

        .widget-card {
            background: var(--bg-secondary);
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 2px 10px var(--shadow-light);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .widget-card:hover {
            box-shadow: 0 8px 25px var(--shadow);
        }

        .widget-header {
            margin-bottom: 20px;
            padding-bottom: 16px;
            border-bottom: 2px solid var(--border-color);
        }

        .widget-title {
            font-size: 16px;
            font-weight: 700;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .widget-title i {
            color: #667eea;
        }

        /* Study Streak Widget */
        .streak-content {
            text-align: center;
        }

        .streak-count {
            font-size: 48px;
            font-weight: 800;
            background: linear-gradient(135deg, #f59e0b, #ef4444);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1;
            margin-bottom: 8px;
        }

        .streak-label {
            color: var(--text-secondary);
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .streak-visual {
            display: flex;
            gap: 8px;
            justify-content: center;
            margin-bottom: 16px;
        }

        .streak-day {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: var(--bg-hover);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-tertiary);
            transition: all 0.3s ease;
        }

        .streak-day.active {
            background: linear-gradient(135deg, #f59e0b, #ef4444);
            color: white;
            transform: scale(1.1);
        }

        .streak-message {
            color: var(--text-secondary);
            font-size: 14px;
            margin: 0;
        }

        /* Quick Actions Widget */
        .quick-actions-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .action-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 16px;
            background: var(--bg-hover);
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 1px solid transparent;
        }

        .action-item:hover {
            background: var(--bg-tertiary);
            border-color: #667eea;
            transform: translateX(4px);
        }

        .action-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            flex-shrink: 0;
        }

        .action-text {
            flex: 1;
        }

        .action-title {
            font-weight: 600;
            color: var(--text-primary);
            font-size: 15px;
            margin-bottom: 2px;
        }

        .action-desc {
            font-size: 13px;
            color: var(--text-secondary);
        }

        .action-arrow {
            color: var(--text-tertiary);
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .action-item:hover .action-arrow {
            color: #667eea;
            transform: translateX(4px);
        }

        /* Events Widget */
        .events-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .event-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 16px;
            background: var(--bg-hover);
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .event-item:hover {
            background: var(--bg-tertiary);
            transform: translateX(4px);
        }

        .event-date {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            flex-shrink: 0;
        }

        .event-day {
            font-size: 24px;
            font-weight: 800;
            line-height: 1;
        }

        .event-month {
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .event-details {
            flex: 1;
        }

        .event-title {
            font-weight: 600;
            color: var(--text-primary);
            font-size: 14px;
            margin-bottom: 4px;
        }

        .event-time {
            font-size: 12px;
            color: var(--text-secondary);
        }

        .event-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Modern Course Section */
        .courses-section-modern {
            background: var(--bg-secondary);
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 2px 10px var(--shadow-light);
            border: 1px solid var(--border-color);
        }

        .section-header-modern {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .section-title-modern {
            font-size: 20px;
            font-weight: 700;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title-modern i {
            color: #667eea;
        }

        .view-all-link {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: all 0.3s ease;
        }

        .view-all-link:hover {
            gap: 10px;
        }

        .course-grid-modern {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .course-card-modern {
            background: var(--bg-hover);
            border-radius: 14px;
            padding: 20px;
            border: 1px solid var(--border-color);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .course-card-modern:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px var(--shadow);
            border-color: #667eea;
        }

        .course-header-modern {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .course-icon-modern {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 22px;
        }

        .course-progress-badge {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .course-body-modern h3 {
            font-size: 16px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 16px;
            line-height: 1.4;
        }

        .course-progress-modern {
            margin-bottom: 16px;
        }

        .progress-bar-modern {
            height: 8px;
            background: var(--border-color);
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 8px;
        }

        .progress-fill-modern {
            height: 100%;
            border-radius: 10px;
            transition: width 0.3s ease;
        }

        .progress-text-modern {
            font-size: 12px;
            color: var(--text-secondary);
            font-weight: 600;
        }

        .continue-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .continue-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .dashboard-container {
                grid-template-columns: 1fr;
                grid-template-areas:
                    "header"
                    "main";
            }

            .left-sidebar,
            .right-sidebar {
                display: none;
            }

            .widgets-grid {
                grid-template-columns: 1fr;
            }

            .welcome-hero {
                padding: 30px 24px;
            }

            .welcome-title {
                font-size: 24px;
            }
        }

        @media (max-width: 768px) {
            .main-content {
                padding: 20px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .header-left .logo span {
                display: none;
            }
        }
    </style>
</head>
<body>
    <?php
    // Include global header
    require_once(__DIR__ . '/includes/bheem_header.php');
    ?>

    <div id="dashboard-app">
        <div class="dashboard-container">
            <!-- Dashboard-specific header bar (below global header) -->
            <header class="dashboard-header" style="position: relative; top: 0;">
                <div class="header-left">
                    <h2 style="margin: 0; color: white; font-size: 20px; font-weight: 600;">
                        <i class="fas fa-chalkboard-teacher"></i> Mentor Dashboard
                    </h2>
                </div>
                <div class="header-right">
                    <button class="dark-mode-toggle" @click="toggleDarkMode" title="Toggle Dark Mode">
                        <i class="fas fa-moon" v-if="!isDarkMode"></i>
                        <i class="fas fa-sun" v-else></i>
                    </button>
                    <div class="user-profile">
                        <div class="user-avatar">{{ user.initials }}</div>
                        <span>{{ user.name }}</span>
                    </div>
                </div>
            </header>

            <!-- Left Sidebar -->
            <aside class="left-sidebar">
                <div class="sidebar-section">
                    <h3 class="sidebar-title">Dashboard</h3>
                    <ul class="sidebar-menu">
                        <li class="sidebar-item">
                            <a class="sidebar-link" :class="{active: activeSection === 'overview'}" @click="setActiveSection('overview')">
                                <i class="fas fa-home sidebar-icon"></i>
                                Overview
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" :class="{active: activeSection === 'courses'}" @click="setActiveSection('courses')">
                                <i class="fas fa-chalkboard sidebar-icon"></i>
                                My Classes
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" :class="{active: activeSection === 'assignments'}" @click="setActiveSection('assignments')">
                                <i class="fas fa-clipboard-check sidebar-icon"></i>
                                Student Submissions
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" :class="{active: activeSection === 'grades'}" @click="setActiveSection('grades')">
                                <i class="fas fa-chart-line sidebar-icon"></i>
                                Student Progress
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="sidebar-section">
                    <h3 class="sidebar-title">Teaching</h3>
                    <ul class="sidebar-menu">
                        <li class="sidebar-item">
                            <a class="sidebar-link" @click="setActiveSection('videos')">
                                <i class="fas fa-users sidebar-icon"></i>
                                My Students
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" @click="setActiveSection('resources')">
                                <i class="fas fa-folder sidebar-icon"></i>
                                Course Materials
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" @click="setActiveSection('forum')">
                                <i class="fas fa-comments sidebar-icon"></i>
                                Discussion Forum
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="sidebar-section">
                    <h3 class="sidebar-title">Account</h3>
                    <ul class="sidebar-menu">
                        <li class="sidebar-item">
                            <a class="sidebar-link" @click="setActiveSection('profile')">
                                <i class="fas fa-user sidebar-icon"></i>
                                Profile
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" @click="setActiveSection('settings')">
                                <i class="fas fa-cog sidebar-icon"></i>
                                Settings
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="https://dev.bheem.cloud/" class="sidebar-link">
                                <i class="fas fa-sign-out-alt sidebar-icon"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="main-content">
                <!-- Overview Section -->
                <div v-if="activeSection === 'overview'">
                    <!-- Modern Welcome Hero -->
                    <div class="welcome-hero">
                        <div class="welcome-content">
                            <div class="welcome-icon">
                                <i class="fas fa-hand-sparkles"></i>
                            </div>
                            <div class="welcome-text">
                                <h1 class="welcome-title">{{ getGreeting() }}, {{ user.firstName }}! 👋</h1>
                                <p class="welcome-message">{{ getMotivationalMessage() }}</p>
                            </div>
                        </div>
                        <div class="welcome-actions">
                            <button class="quick-action-btn primary" @click="setActiveSection('courses')">
                                <i class="fas fa-chalkboard-teacher"></i>
                                View My Classes
                            </button>
                            <button class="quick-action-btn secondary" @click="setActiveSection('assignments')">
                                <i class="fas fa-clipboard-check"></i>
                                Review Submissions
                            </button>
                        </div>
                    </div>

                    <!-- Stats Grid with Enhanced Design -->
                    <div class="stats-grid-modern">
                        <div class="stat-card-modern" v-for="stat in stats" :key="stat.label">
                            <div class="stat-icon-modern" :style="{background: stat.color}">
                                <i :class="stat.icon"></i>
                            </div>
                            <div class="stat-details">
                                <div class="stat-value-modern">{{ stat.value }}</div>
                                <div class="stat-label-modern">{{ stat.label }}</div>
                                <div class="stat-trend" v-if="stat.trend">
                                    <i :class="stat.trend > 0 ? 'fas fa-arrow-up' : 'fas fa-arrow-down'"></i>
                                    {{ Math.abs(stat.trend) }}% this week
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Dashboard Widgets Grid -->
                    <div class="widgets-grid">
                        <!-- Study Streak Widget -->
                        <div class="widget-card streak-widget">
                            <div class="widget-header">
                                <h3 class="widget-title">
                                    <i class="fas fa-fire"></i>
                                    Study Streak
                                </h3>
                            </div>
                            <div class="streak-content">
                                <div class="streak-count">{{ studyStreak }}</div>
                                <div class="streak-label">Days in a row</div>
                                <div class="streak-visual">
                                    <div class="streak-day" v-for="day in 7" :key="day" :class="{active: day <= studyStreak}">
                                        <i class="fas fa-check"></i>
                                    </div>
                                </div>
                                <p class="streak-message">Keep it up! You're on fire 🔥</p>
                            </div>
                        </div>

                        <!-- Quick Actions Widget -->
                        <div class="widget-card actions-widget">
                            <div class="widget-header">
                                <h3 class="widget-title">
                                    <i class="fas fa-bolt"></i>
                                    Quick Actions
                                </h3>
                            </div>
                            <div class="quick-actions-list">
                                <a href="https://dev.bheem.cloud/course/index.php" class="action-item">
                                    <div class="action-icon" style="background: linear-gradient(135deg, #667eea, #764ba2)">
                                        <i class="fas fa-search"></i>
                                    </div>
                                    <div class="action-text">
                                        <div class="action-title">Browse Courses</div>
                                        <div class="action-desc">Discover new skills</div>
                                    </div>
                                    <i class="fas fa-chevron-right action-arrow"></i>
                                </a>
                                <a href="https://dev.bheem.cloud/my/" class="action-item">
                                    <div class="action-icon" style="background: linear-gradient(135deg, #10b981, #059669)">
                                        <i class="fas fa-tachometer-alt"></i>
                                    </div>
                                    <div class="action-text">
                                        <div class="action-title">My Dashboard</div>
                                        <div class="action-desc">Moodle Dashboard</div>
                                    </div>
                                    <i class="fas fa-chevron-right action-arrow"></i>
                                </a>
                                <a href="https://dev.bheem.cloud/grade/report/overview/index.php" class="action-item">
                                    <div class="action-icon" style="background: linear-gradient(135deg, #f59e0b, #d97706)">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="action-text">
                                        <div class="action-title">View Grades</div>
                                        <div class="action-desc">Check your progress</div>
                                    </div>
                                    <i class="fas fa-chevron-right action-arrow"></i>
                                </a>
                                <a href="https://dev.bheem.cloud/message/" class="action-item">
                                    <div class="action-icon" style="background: linear-gradient(135deg, #ec4899, #db2777)">
                                        <i class="fas fa-comments"></i>
                                    </div>
                                    <div class="action-text">
                                        <div class="action-title">Messages</div>
                                        <div class="action-desc">Chat with instructors</div>
                                    </div>
                                    <i class="fas fa-chevron-right action-arrow"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Upcoming Events Widget -->
                        <div class="widget-card events-widget">
                            <div class="widget-header">
                                <h3 class="widget-title">
                                    <i class="fas fa-calendar-alt"></i>
                                    Upcoming Events
                                </h3>
                            </div>
                            <div class="events-list">
                                <div class="event-item" v-for="event in upcomingEvents" :key="event.id">
                                    <div class="event-date">
                                        <div class="event-day">{{ event.day }}</div>
                                        <div class="event-month">{{ event.month }}</div>
                                    </div>
                                    <div class="event-details">
                                        <div class="event-title">{{ event.title }}</div>
                                        <div class="event-time">{{ event.time }}</div>
                                    </div>
                                    <div class="event-badge" :style="{background: event.color}">
                                        {{ event.type }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Continue Learning Section -->
                    <div class="courses-section-modern">
                        <div class="section-header-modern">
                            <h2 class="section-title-modern">
                                <i class="fas fa-chalkboard-teacher"></i>
                                Your Active Classes
                            </h2>
                            <a href="#" @click.prevent="setActiveSection('courses')" class="view-all-link">
                                View All Classes <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="course-grid-modern">
                            <div class="course-card-modern" v-for="course in activeCourses.slice(0, 3)" :key="course.id" @click="openCourse(course)">
                                <div class="course-header-modern">
                                    <div class="course-icon-modern" :style="{background: course.color}">
                                        <i :class="course.icon"></i>
                                    </div>
                                    <div class="course-progress-badge">{{ course.progress }}%</div>
                                </div>
                                <div class="course-body-modern">
                                    <h3 class="course-title-modern">{{ course.title }}</h3>
                                    <div class="course-progress-modern">
                                        <div class="progress-bar-modern">
                                            <div class="progress-fill-modern" :style="{width: course.progress + '%', background: course.color}"></div>
                                        </div>
                                        <span class="progress-text-modern">{{ course.progress }}% Complete</span>
                                    </div>
                                    <button class="continue-btn">
                                        <i class="fas fa-chalkboard"></i>
                                        Manage Class
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Courses Section -->
                <div v-if="activeSection === 'courses'">
                    <div class="content-header">
                        <h1 class="page-title">My Classes</h1>
                        <p class="page-subtitle">Manage and monitor your teaching classes</p>
                    </div>

                    <div class="courses-section">
                        <div class="course-list">
                            <div class="course-item" v-for="course in allCourses" :key="course.id" @click="openCourse(course)">
                                <div class="course-icon" :style="{background: course.color}">
                                    <i :class="course.icon"></i>
                                </div>
                                <div class="course-info">
                                    <div class="course-title">{{ course.title }}</div>
                                    <div class="course-progress">{{ course.progress }}% complete</div>
                                    <div class="progress-bar">
                                        <div class="progress-fill" :style="{width: course.progress + '%'}"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Assignments Section -->
                <div v-if="activeSection === 'assignments'">
                    <div class="content-header">
                        <h1 class="page-title">Student Submissions</h1>
                        <p class="page-subtitle">Review and grade student assignments</p>
                    </div>

                    <div class="courses-section">
                        <div class="assignment-list">
                            <div class="assignment-item" v-for="assignment in assignments" :key="assignment.id">
                                <div class="assignment-icon" :style="{background: assignment.color}">
                                    <i :class="assignment.icon"></i>
                                </div>
                                <div class="assignment-info">
                                    <div class="assignment-title">{{ assignment.title }}</div>
                                    <div class="assignment-due">Due: {{ assignment.dueDate }}</div>
                                </div>
                                <div class="assignment-status" :class="'status-' + assignment.status">
                                    {{ assignment.statusText }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Grades Section -->
                <div v-if="activeSection === 'grades'">
                    <div class="content-header">
                        <h1 class="page-title">Student Progress</h1>
                        <p class="page-subtitle">Monitor student performance and progress</p>
                    </div>

                    <div class="courses-section">
                        <h3 class="section-title">
                            <i class="fas fa-chart-bar"></i>
                            Progress Overview
                        </h3>
                        <p style="color: #6b7280; padding: 20px 0;">Student performance metrics and progress reports will be displayed here.</p>
                    </div>
                </div>

                <!-- Other sections -->
                <div v-if="['videos', 'resources', 'forum', 'profile', 'settings'].includes(activeSection)">
                    <div class="content-header">
                        <h1 class="page-title">{{ getSectionTitle(activeSection) }}</h1>
                        <p class="page-subtitle">{{ getSectionSubtitle(activeSection) }}</p>
                    </div>

                    <div class="courses-section">
                        <p style="color: #6b7280; padding: 20px 0;">This section is coming soon. Stay tuned for updates!</p>
                    </div>
                </div>
            </main>

            <!-- Right Sidebar -->
            <aside class="right-sidebar">
                <!-- Calendar Widget -->
                <div class="widget">
                    <h3 class="widget-title">
                        <i class="fas fa-calendar"></i>
                        Today
                    </h3>
                    <div class="calendar-widget">
                        <div class="calendar-date">{{ currentDate.day }}</div>
                        <div class="calendar-day">{{ currentDate.month }} {{ currentDate.year }}</div>
                    </div>
                </div>

                <!-- Notifications Widget -->
                <div class="widget">
                    <h3 class="widget-title">
                        <i class="fas fa-bell"></i>
                        Recent Activity
                    </h3>
                    <div class="notification-item" v-for="notification in notifications" :key="notification.id">
                        <div class="notification-icon" :style="{background: notification.color}">
                            <i :class="notification.icon"></i>
                        </div>
                        <div class="notification-content">
                            <div class="notification-title">{{ notification.title }}</div>
                            <div class="notification-time">{{ notification.time }}</div>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats Widget -->
                <div class="widget">
                    <h3 class="widget-title">
                        <i class="fas fa-chart-pie"></i>
                        Quick Stats
                    </h3>
                    <div class="quick-stats">
                        <div class="stat-row">
                            <span class="stat-row-label">This Week</span>
                            <span class="stat-row-value" style="color: #667eea;">12h 30m</span>
                        </div>
                        <div class="stat-row">
                            <span class="stat-row-label">Streak</span>
                            <span class="stat-row-value" style="color: #10b981;">7 days</span>
                        </div>
                        <div class="stat-row">
                            <span class="stat-row-label">Rank</span>
                            <span class="stat-row-value" style="color: #f59e0b;">#42</span>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>

    <script>
        const { createApp } = Vue;

        createApp({
            data() {
                return {
                    activeSection: 'overview',
                    isDarkMode: false,
                    user: {
                        name: '<?php echo htmlspecialchars($username); ?>',
                        firstName: '<?php echo htmlspecialchars($user_firstname); ?>',
                        initials: '<?php echo htmlspecialchars($user_initials); ?>'
                    },
                    stats: [
                        {
                            label: 'Teaching Courses',
                            value: '<?php echo $total_courses; ?>',
                            icon: 'fas fa-chalkboard',
                            color: 'linear-gradient(135deg, #667eea, #764ba2)'
                        },
                        {
                            label: 'Total Students',
                            value: '<?php echo $total_lessons; ?>',
                            icon: 'fas fa-users',
                            color: 'linear-gradient(135deg, #10b981, #059669)'
                        },
                        {
                            label: 'Teaching Hours',
                            value: '<?php echo $learning_hours; ?>',
                            icon: 'fas fa-clock',
                            color: 'linear-gradient(135deg, #f59e0b, #d97706)'
                        },
                        {
                            label: 'Reviews Given',
                            value: '<?php echo $certificates; ?>',
                            icon: 'fas fa-star',
                            color: 'linear-gradient(135deg, #8b5cf6, #7c3aed)'
                        }
                    ],
                    activeCourses: <?php echo $active_courses_json; ?>,
                    allCourses: <?php echo $courses_json; ?>,
                    assignments: <?php echo $assignments_json; ?>,
                    notifications: <?php echo $notifications_json; ?>,
                    currentDate: {
                        day: new Date().getDate(),
                        month: new Date().toLocaleDateString('en-US', { month: 'long' }),
                        year: new Date().getFullYear()
                    },
                    studyStreak: 5,
                    upcomingEvents: [
                        {
                            id: 1,
                            day: '15',
                            month: 'Nov',
                            title: 'AI Fundamentals Quiz',
                            time: '10:00 AM',
                            type: 'Quiz',
                            color: '#f59e0b'
                        },
                        {
                            id: 2,
                            day: '18',
                            month: 'Nov',
                            title: 'Project Submission',
                            time: '11:59 PM',
                            type: 'Assignment',
                            color: '#ef4444'
                        },
                        {
                            id: 3,
                            day: '20',
                            month: 'Nov',
                            title: 'Live Webinar: AI Tools',
                            time: '3:00 PM',
                            type: 'Live',
                            color: '#8b5cf6'
                        }
                    ]
                }
            },
            mounted() {
                // Check for saved dark mode preference in localStorage
                const savedDarkMode = localStorage.getItem('darkMode');
                if (savedDarkMode === 'true') {
                    this.isDarkMode = true;
                    document.body.classList.add('dark-mode');
                }
            },
            methods: {
                toggleDarkMode() {
                    this.isDarkMode = !this.isDarkMode;
                    if (this.isDarkMode) {
                        document.body.classList.add('dark-mode');
                        localStorage.setItem('darkMode', 'true');
                    } else {
                        document.body.classList.remove('dark-mode');
                        localStorage.setItem('darkMode', 'false');
                    }
                },
                setActiveSection(section) {
                    this.activeSection = section;
                },
                getGreeting() {
                    const hour = new Date().getHours();
                    if (hour < 12) return 'Good Morning';
                    if (hour < 17) return 'Good Afternoon';
                    if (hour < 21) return 'Good Evening';
                    return 'Good Night';
                },
                getMotivationalMessage() {
                    const messages = [
                        "Ready to unlock new skills today? Let's make it count!",
                        "Every lesson brings you closer to your goals. Keep pushing forward!",
                        "Learning is a journey, not a race. Enjoy every step!",
                        "Your dedication today builds your expertise tomorrow.",
                        "Great to see you back! Your commitment is inspiring.",
                        "Knowledge is power. Let's power up your potential!",
                        "Small steps daily lead to giant leaps. Keep going!",
                        "You're doing amazing! Let's continue this momentum."
                    ];
                    const randomIndex = Math.floor(Math.random() * messages.length);
                    return messages[randomIndex];
                },
                getSectionTitle(section) {
                    const titles = {
                        videos: 'Video Lessons',
                        resources: 'Learning Resources',
                        forum: 'Discussion Forum',
                        profile: 'My Profile',
                        settings: 'Settings'
                    };
                    return titles[section] || 'Section';
                },
                getSectionSubtitle(section) {
                    const subtitles = {
                        videos: 'Access your video learning materials',
                        resources: 'Download study materials and documents',
                        forum: 'Connect with other students and instructors',
                        profile: 'Manage your personal information',
                        settings: 'Customize your learning experience'
                    };
                    return subtitles[section] || 'Content coming soon';
                },
                openCourse(course) {
                    // Navigate to the custom course view with student dashboard colors
                    window.location.href = `https://dev.bheem.cloud/my-course.php?id=${course.id}`;
                }
            }
        }).mount('#dashboard-app');
    </script>
</body>
</html>