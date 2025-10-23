<?php
// This file is part of Moodle - http://moodle.org/
//
// Enhanced Course View with Vue.js and Student Dashboard Color Scheme
// This is a wrapper around the standard course view that adds Vue.js enhancements

require_once('../config.php');
require_once('lib.php');
require_once($CFG->libdir.'/completionlib.php');

redirect_if_major_upgrade_required();

$id = optional_param('id', 0, PARAM_INT);
$name = optional_param('name', '', PARAM_TEXT);
$idnumber = optional_param('idnumber', '', PARAM_RAW);

$params = [];
if (!empty($name)) {
    $params = ['shortname' => $name];
} else if (!empty($idnumber)) {
    $params = ['idnumber' => $idnumber];
} else if (!empty($id)) {
    $params = ['id' => $id];
} else {
    throw new \moodle_exception('unspecifycourseid', 'error');
}

$course = $DB->get_record('course', $params, '*', MUST_EXIST);
$urlparams = ['id' => $course->id];

$PAGE->set_url('/course/view-enhanced.php', $urlparams);
$PAGE->set_cacheable(false);

context_helper::preload_course($course->id);
$context = context_course::instance($course->id, MUST_EXIST);

require_login($course);

$PAGE->set_pagelayout('embedded');
$PAGE->set_pagetype('course-view-' . $course->format);
$PAGE->set_title(get_string('course') . ': ' . $course->fullname);
$PAGE->set_heading($course->fullname);

// Get course format
$format = course_get_format($course);
$course->format = $format->get_format();

// Get course sections and modules
$modinfo = get_fast_modinfo($course);
$sections = $modinfo->get_section_info_all();

// Build sections data for Vue.js
$sections_data = [];
foreach ($sections as $sectionnum => $section) {
    if (!$section->uservisible) {
        continue;
    }

    $sectioninfo = [];
    $sectioninfo['id'] = $section->id;
    $sectioninfo['section'] = $sectionnum;
    $sectioninfo['name'] = get_section_name($course, $section);
    $sectioninfo['summary'] = format_text($section->summary, $section->summaryformat);
    $sectioninfo['visible'] = $section->visible;

    // Get activities in this section
    $sectioninfo['modules'] = [];
    if (!empty($modinfo->sections[$sectionnum])) {
        foreach ($modinfo->sections[$sectionnum] as $modnumber) {
            $mod = $modinfo->cms[$modnumber];
            if (!$mod->uservisible) {
                continue;
            }

            $moduleinfo = [];
            $moduleinfo['id'] = $mod->id;
            $moduleinfo['name'] = $mod->name;
            $moduleinfo['modname'] = $mod->modname;
            $moduleinfo['url'] = $mod->url ? $mod->url->out(false) : '';
            $moduleinfo['icon'] = $mod->get_icon_url()->out(false);

            // Get completion status
            $completion = new completion_info($course);
            if ($completion->is_enabled($mod)) {
                $completiondata = $completion->get_data($mod, true);
                $moduleinfo['completion'] = [
                    'enabled' => true,
                    'state' => $completiondata->completionstate,
                    'completed' => $completiondata->completionstate == COMPLETION_COMPLETE ||
                                  $completiondata->completionstate == COMPLETION_COMPLETE_PASS
                ];
            } else {
                $moduleinfo['completion'] = ['enabled' => false];
            }

            $sectioninfo['modules'][] = $moduleinfo;
        }
    }

    $sections_data[] = $sectioninfo;
}

// Calculate progress
$completion_info = new completion_info($course);
$total_activities = 0;
$completed_activities = 0;
$assignment_total = 0;
$assignment_completed = 0;
$quiz_total = 0;
$quiz_completed = 0;

foreach ($modinfo->get_cms() as $cm) {
    if (!$cm->uservisible) {
        continue;
    }

    if ($completion_info->is_enabled($cm)) {
        $total_activities++;
        $completiondata = $completion_info->get_data($cm, true);

        if ($completiondata->completionstate == COMPLETION_COMPLETE ||
            $completiondata->completionstate == COMPLETION_COMPLETE_PASS) {
            $completed_activities++;
        }

        if ($cm->modname == 'assign') {
            $assignment_total++;
            if ($completiondata->completionstate == COMPLETION_COMPLETE ||
                $completiondata->completionstate == COMPLETION_COMPLETE_PASS) {
                $assignment_completed++;
            }
        }

        if ($cm->modname == 'quiz') {
            $quiz_total++;
            if ($completiondata->completionstate == COMPLETION_COMPLETE ||
                $completiondata->completionstate == COMPLETION_COMPLETE_PASS) {
                $quiz_completed++;
            }
        }
    }
}

$overall_progress = $total_activities > 0 ? round(($completed_activities / $total_activities) * 100) : 0;
$assignment_progress = $assignment_total > 0 ? round(($assignment_completed / $assignment_total) * 100) : 0;
$quiz_progress = $quiz_total > 0 ? round(($quiz_completed / $quiz_total) * 100) : 0;

// Get course teachers
$teachers = get_enrolled_users($context, 'mod/assign:grade', 0, 'u.id, u.firstname, u.lastname', null, 0, 1);
$instructor = ['name' => 'Course Instructor', 'title' => 'Educator', 'initials' => 'CI'];
if (!empty($teachers)) {
    $teacher = reset($teachers);
    $instructor['name'] = fullname($teacher);
    $instructor['initials'] = strtoupper(substr($teacher->firstname, 0, 1) . substr($teacher->lastname, 0, 1));
}

// Don't output standard Moodle header - we'll use custom header
// echo $OUTPUT->header(); // REMOVED
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title><?php echo s($course->fullname); ?> - Bheem Academy</title>

    <!-- Preconnect for performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Global Header Styles -->
    <link rel="stylesheet" href="https://dev.bheem.cloud/includes/bheem_header_styles.css">

    <!-- Inter Font -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" as="style">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vue.js 3 from CDN -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

<style>
/* Student Dashboard Color Scheme */
:root {
    --bheem-primary: #667eea;
    --bheem-primary-dark: #764ba2;
    --bheem-success: #10b981;
    --bheem-warning: #f59e0b;
    --bheem-danger: #ef4444;
    --bheem-gray-50: #f9fafb;
    --bheem-gray-100: #f3f4f6;
    --bheem-gray-500: #6b7280;
    --bheem-gray-900: #111827;
}

#course-vue-app {
    margin: 100px 0 2rem 0;
    padding-top: 1rem;
}

.vue-course-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
    max-width: 1400px;
    margin: 0 auto;
}

.vue-section-card {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
    border-left: 4px solid var(--bheem-primary);
    margin-bottom: 1.5rem;
    transition: all 0.3s;
}

.vue-section-card:hover {
    box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
    transform: translateY(-2px);
}

.vue-section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
    cursor: pointer;
}

.vue-section-title {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.vue-section-number {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--bheem-primary), var(--bheem-primary-dark));
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
}

.vue-section-name {
    font-size: 1.5rem;
    font-weight: 600;
    margin: 0;
}

.vue-section-toggle {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: var(--bheem-gray-100);
    border: none;
    cursor: pointer;
    transition: all 0.3s;
}

.vue-section-toggle:hover {
    background: var(--bheem-primary);
    color: white;
}

.vue-activity-list {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.vue-activity-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: var(--bheem-gray-50);
    border-radius: 8px;
    cursor: pointer;
    border: 2px solid transparent;
    transition: all 0.3s;
}

.vue-activity-item:hover {
    background: white;
    border-color: var(--bheem-primary);
    box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
    transform: translateX(4px);
}

.vue-activity-icon {
    width: 48px;
    height: 48px;
    border-radius: 8px;
    background: linear-gradient(135deg, var(--bheem-primary), var(--bheem-primary-dark));
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

.vue-activity-icon.assign { background: linear-gradient(135deg, var(--bheem-warning), #d97706); }
.vue-activity-icon.quiz { background: linear-gradient(135deg, var(--bheem-success), #059669); }
.vue-activity-icon.forum { background: linear-gradient(135deg, var(--bheem-danger), #dc2626); }

.vue-activity-content {
    flex: 1;
}

.vue-activity-title {
    font-weight: 600;
    color: var(--bheem-gray-900);
}

.vue-activity-meta {
    font-size: 0.875rem;
    color: var(--bheem-gray-500);
}

.vue-activity-status {
    padding: 0.5rem 1rem;
    border-radius: 8px;
    font-size: 0.875rem;
    font-weight: 600;
}

.vue-activity-status.completed {
    background: #d1fae5;
    color: var(--bheem-success);
}

.vue-activity-status.not-completed {
    background: var(--bheem-gray-100);
    color: var(--bheem-gray-500);
}

.vue-sidebar-card {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
    margin-bottom: 1.5rem;
}

.vue-sidebar-title {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 1rem;
}

.vue-progress-item {
    margin-bottom: 1rem;
}

.vue-progress-label {
    display: flex;
    justify-content: space-between;
    margin-bottom: 0.5rem;
    font-size: 0.875rem;
    font-weight: 600;
}

.vue-progress-bar {
    height: 8px;
    background: var(--bheem-gray-100);
    border-radius: 999px;
    overflow: hidden;
}

.vue-progress-fill {
    height: 100%;
    background: linear-gradient(135deg, var(--bheem-primary), var(--bheem-primary-dark));
    transition: width 0.5s ease;
}

.vue-quick-actions {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0.75rem;
}

.vue-action-btn {
    padding: 0.75rem;
    border-radius: 8px;
    border: none;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
}

.vue-action-btn.primary {
    background: linear-gradient(135deg, var(--bheem-primary), var(--bheem-primary-dark));
    color: white;
}

.vue-action-btn.secondary {
    background: white;
    color: var(--bheem-primary);
    border: 2px solid var(--bheem-primary);
}

.vue-action-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
}

.vue-instructor-info {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
}

.vue-instructor-avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--bheem-primary), var(--bheem-primary-dark));
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    font-weight: 700;
}

.vue-instructor-name {
    font-weight: 600;
    margin: 0;
}

.vue-instructor-title {
    font-size: 0.875rem;
    color: var(--bheem-gray-500);
    margin: 0;
}

/* Tab Pills Navigation - COMPACT VERSION */
.vue-tab-pills {
    display: flex;
    gap: 0.5rem;
    background: white;
    padding: 0.5rem;
    border-radius: 12px;
    box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
    margin-bottom: 1.5rem;
}

.vue-tab-pill {
    flex: 1;
    padding: 0.625rem 0.75rem;
    border: none;
    border-radius: 8px;
    background: transparent;
    color: var(--bheem-gray-500);
    font-weight: 600;
    font-size: 0.85rem;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
}

.vue-tab-pill:hover {
    background: var(--bheem-gray-100);
    color: var(--bheem-gray-900);
}

.vue-tab-pill.active {
    background: linear-gradient(135deg, var(--bheem-primary), var(--bheem-primary-dark));
    color: white;
    box-shadow: 0 4px 6px -1px rgba(102, 126, 234, 0.4);
    transform: translateY(-2px);
}

.vue-tab-pill.active::after {
    content: '';
    position: absolute;
    bottom: -0.5rem;
    left: 50%;
    transform: translateX(-50%);
    width: 0;
    height: 0;
    border-left: 8px solid transparent;
    border-right: 8px solid transparent;
    border-top: 8px solid var(--bheem-primary-dark);
}

.vue-tab-content {
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@media (max-width: 1024px) {
    .vue-course-grid {
        grid-template-columns: 1fr;
    }

    .vue-tab-pills {
        flex-direction: column;
    }

    .vue-tab-pill.active::after {
        display: none;
    }
}
</style>
</head>
<body>

<?php include(__DIR__ . '/../includes/bheem_header.php'); ?>

<div id="course-vue-app">
    <div class="vue-course-grid">
        <div class="vue-main-content">
            <div v-for="(section, index) in sections" :key="section.id" class="vue-section-card">
                <div class="vue-section-header" @click="toggleSection(section.id)">
                    <div class="vue-section-title">
                        <div class="vue-section-number">{{ index + 1 }}</div>
                        <h3 class="vue-section-name">{{ section.name }}</h3>
                    </div>
                    <button class="vue-section-toggle">
                        <span v-if="section.expanded">▼</span>
                        <span v-else>▶</span>
                    </button>
                </div>
                <div v-if="section.expanded" class="vue-activity-list">
                    <div v-for="module in section.modules" :key="module.id"
                         class="vue-activity-item" @click="openActivity(module.url)">
                        <div :class="['vue-activity-icon', module.modname]">
                            {{ getActivityIcon(module.modname) }}
                        </div>
                        <div class="vue-activity-content">
                            <div class="vue-activity-title">{{ module.name }}</div>
                            <div class="vue-activity-meta">{{ module.modname }}</div>
                        </div>
                        <div v-if="module.completion.enabled"
                             :class="['vue-activity-status', module.completion.completed ? 'completed' : 'not-completed']">
                            <span v-if="module.completion.completed">✓ Completed</span>
                            <span v-else>○ Not Started</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="vue-sidebar">
            <!-- Tab Pills Navigation -->
            <div class="vue-tab-pills">
                <button
                    @click="activeTab = 'progress'"
                    :class="['vue-tab-pill', { 'active': activeTab === 'progress' }]">
                    📊 Progress
                </button>
                <button
                    @click="activeTab = 'actions'"
                    :class="['vue-tab-pill', { 'active': activeTab === 'actions' }]">
                    ⚡ Actions
                </button>
            </div>

            <!-- Tab Content Container -->
            <div class="vue-tab-content">
                <!-- Progress Tab Panel -->
                <div v-show="activeTab === 'progress'" class="vue-sidebar-card">
                    <h3 class="vue-sidebar-title">Course Progress</h3>
                    <div class="vue-progress-item">
                        <div class="vue-progress-label">
                            <span>Overall</span>
                            <span>{{ progress.overall }}%</span>
                        </div>
                        <div class="vue-progress-bar">
                            <div class="vue-progress-fill" :style="{ width: progress.overall + '%' }"></div>
                        </div>
                    </div>
                    <div class="vue-progress-item">
                        <div class="vue-progress-label">
                            <span>Assignments</span>
                            <span>{{ progress.assignments }}%</span>
                        </div>
                        <div class="vue-progress-bar">
                            <div class="vue-progress-fill" :style="{ width: progress.assignments + '%' }"></div>
                        </div>
                    </div>
                    <div class="vue-progress-item">
                        <div class="vue-progress-label">
                            <span>Quizzes</span>
                            <span>{{ progress.quizzes }}%</span>
                        </div>
                        <div class="vue-progress-bar">
                            <div class="vue-progress-fill" :style="{ width: progress.quizzes + '%' }"></div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions Tab Panel -->
                <div v-show="activeTab === 'actions'" class="vue-sidebar-card">
                    <h3 class="vue-sidebar-title">Quick Actions</h3>
                    <div class="vue-quick-actions">
                        <button @click="viewGrades" class="vue-action-btn primary">📊 Grades</button>
                        <button @click="downloadContent" class="vue-action-btn secondary">⬇️ Download</button>
                        <button @click="askQuestion" class="vue-action-btn secondary">💬 Forum</button>
                        <button @click="viewCalendar" class="vue-action-btn secondary">📅 Calendar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
const { createApp } = Vue;

createApp({
    data() {
        return {
            sections: <?php echo json_encode($sections_data); ?>,
            progress: {
                overall: <?php echo $overall_progress; ?>,
                assignments: <?php echo $assignment_progress; ?>,
                quizzes: <?php echo $quiz_progress; ?>
            },
            instructor: <?php echo json_encode($instructor); ?>,
            activeTab: 'progress'
        };
    },
    mounted() {
        // Expand first section by default
        if (this.sections.length > 0) {
            this.sections[0].expanded = true;
        }
    },
    methods: {
        toggleSection(sectionId) {
            const section = this.sections.find(s => s.id === sectionId);
            if (section) {
                section.expanded = !section.expanded;
            }
        },
        getActivityIcon(modname) {
            const icons = {
                'assign': '📝',
                'quiz': '❓',
                'resource': '📄',
                'page': '📄',
                'url': '🔗',
                'forum': '💬',
                'folder': '📁',
                'book': '📚',
                'lesson': '📖',
                'choice': '🗳️',
                'feedback': '📊',
                'glossary': '📔',
                'wiki': '📝',
                'chat': '💭'
            };
            return icons[modname] || '📚';
        },
        openActivity(url) {
            if (url) {
                window.location.href = url;
            }
        },
        viewGrades() {
            window.location.href = '<?php echo $CFG->wwwroot; ?>/grade/report/user/index.php?id=<?php echo $course->id; ?>';
        },
        downloadContent() {
            window.location.href = '<?php echo $CFG->wwwroot; ?>/course/downloadcontent.php?id=<?php echo $course->id; ?>';
        },
        askQuestion() {
            window.location.href = '<?php echo $CFG->wwwroot; ?>/mod/forum/index.php?id=<?php echo $course->id; ?>';
        },
        viewCalendar() {
            window.location.href = '<?php echo $CFG->wwwroot; ?>/calendar/view.php?view=month&course=<?php echo $course->id; ?>';
        },
        contactInstructor() {
            window.location.href = '<?php echo $CFG->wwwroot; ?>/message/index.php';
        }
    }
}).mount('#course-vue-app');
</script>

</body>
</html>
