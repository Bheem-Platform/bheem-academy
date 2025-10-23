<?php
// Create stub objects for Moodle compatibility
class StubOutput {
    public function body_attributes() { return ''; }
    public function standard_top_of_body_html() { return ''; }
}
class StubConfig {
    public $wwwroot = 'https://newdesign.bheem.cloud';
    public $dirroot = '/home/academy/academy/public';
}
$OUTPUT = new StubOutput();
$CFG = new StubConfig();
?>
<?php
require_once(__DIR__ . '/config.php');
require_once($CFG->dirroot . '/course/lib.php');

$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('base');
$PAGE->set_title('Register - Bheem Academy');
$PAGE->set_heading('Register - Bheem Academy');
$PAGE->set_url(new moodle_url('/register.php'));

// Get course ID from URL if provided
$course_id = optional_param('course_id', 0, PARAM_INT);
$course_name = optional_param('course', '', PARAM_TEXT);

// Fetch course details if course_id is provided
$selected_course = null;
if ($course_id > 0) {
    try {
        $selected_course = $DB->get_record('course', ['id' => $course_id], '*', IGNORE_MISSING);
        if ($selected_course) {
            $course_name = $selected_course->fullname;
        }
    } catch (Exception $e) {
        // Course not found, continue without pre-selection
    }
}

// Handle form submission
$success_message = '';
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['full_name'])) {
    $full_name = required_param('full_name', PARAM_TEXT);
    $email = required_param('email', PARAM_EMAIL);
    $phone = required_param('phone', PARAM_TEXT);
    $course_interest = required_param('course_interest', PARAM_TEXT);
    $age_group = required_param('age_group', PARAM_TEXT);
    $message = optional_param('message', '', PARAM_TEXT);

    try {
        $registration = new stdClass();
        $registration->full_name = $full_name;
        $registration->email = $email;
        $registration->phone = $phone;
        $registration->course_interest = $course_interest;
        $registration->age_group = $age_group;
        $registration->message = $message;
        $registration->timecreated = time();
        $registration->status = 'pending';

        $DB->insert_record('bheem_registrations', $registration);
        $success_message = 'Registration successful! We will contact you within 24 hours.';
    } catch (Exception $e) {
        $error_message = 'Something went wrong. Please try again or contact us directly.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Bheem Academy</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://dev.bheem.cloud/includes/bheem_header_styles.css">
</head>
<body>

<?php include(__DIR__ . '/includes/bheem_header.php'); ?>

<style>
:root {
    --primary: #7c3aed;
    --primary-dark: #6d28d9;
    --accent: #ec4899;
    --text: #0f172a;
    --text-light: #64748b;
    --bg: #ffffff;
    --border: #e2e8f0;
    --success: #10b981;
    --error: #ef4444;
}

/* Hide Moodle elements */
.drawer, [data-region="drawer"], .breadcrumb-wrapper,
.secondary-navigation, .primary-navigation, .navbar {
    display: none !important;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    background: white;
    color: var(--text);
    padding-top: 70px;
    line-height: 1.6;
    overflow-x: hidden;
}

/* Alert Messages */
.alert-overlay {
    position: fixed;
    top: 100px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 10000;
    width: 90%;
    max-width: 600px;
    animation: slideDown 0.4s ease-out;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateX(-50%) translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(-50%) translateY(0);
    }
}

.alert {
    background: white;
    padding: 20px 24px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    gap: 16px;
    font-weight: 600;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
}

.alert i {
    font-size: 1.5rem;
    flex-shrink: 0;
}

.alert-success {
    border-left: 4px solid var(--success);
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(16, 185, 129, 0.05) 100%);
    color: #065f46;
}

.alert-success i {
    color: var(--success);
}

.alert-error {
    border-left: 4px solid var(--error);
    background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(239, 68, 68, 0.05) 100%);
    color: #991b1b;
}

.alert-error i {
    color: var(--error);
}

/* Three Panel Layout */
.split-screen {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    min-height: calc(100vh - 70px);
    overflow: hidden;
}

/* Panel 1 - Form */
.form-side {
    background: white;
    padding: 40px 30px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    overflow-y: auto;
    max-height: calc(100vh - 70px);
}

.form-container {
    max-width: 400px;
    margin: 0 auto;
    width: 100%;
}

.form-header {
    margin-bottom: 16px;
}

.form-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    background: linear-gradient(135deg, rgba(124, 58, 237, 0.1), rgba(236, 72, 153, 0.1));
    border-radius: 50px;
    font-size: 0.875rem;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.form-header h1 {
    font-family: 'Poppins', sans-serif;
    font-size: 2rem;
    font-weight: 900;
    line-height: 1.2;
    margin-bottom: 8px;
    background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.form-header p {
    font-size: 0.875rem;
    color: var(--text-light);
    line-height: 1.5;
}

/* Form Styles */
.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    margin-bottom: 0;
}

.form-group {
    margin-bottom: 16px;
}

.form-label {
    display: block;
    font-weight: 700;
    margin-bottom: 6px;
    font-size: 0.875rem;
    color: var(--text);
}

.required {
    color: var(--error);
}

.form-input,
.form-select,
.form-textarea {
    width: 100%;
    padding: 10px 14px;
    border: 2px solid var(--border);
    border-radius: 12px;
    font-size: 1rem;
    font-family: 'Inter', sans-serif;
    transition: all 0.3s ease;
    background: white;
}

.form-input:focus,
.form-select:focus,
.form-textarea:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.1);
}

.form-textarea {
    resize: vertical;
    min-height: 80px;
}

.form-select {
    cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%237c3aed'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 12px center;
    background-size: 20px;
    padding-right: 40px;
}

.submit-btn {
    width: 100%;
    padding: 14px 24px;
    background: linear-gradient(135deg, var(--primary), var(--accent));
    color: white;
    border: none;
    border-radius: 12px;
    font-size: 1rem;
    font-weight: 800;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    transition: all 0.3s ease;
    box-shadow: 0 8px 24px rgba(124, 58, 237, 0.3);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 32px rgba(124, 58, 237, 0.4);
}

.submit-btn i {
    transition: transform 0.3s ease;
}

.submit-btn:hover i.fa-arrow-right {
    transform: translateX(4px);
}

.trust-indicators {
    display: flex;
    justify-content: center;
    gap: 32px;
    margin-top: 32px;
    padding-top: 32px;
    border-top: 2px solid var(--border);
    flex-wrap: wrap;
}

.trust-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.875rem;
    color: var(--text-light);
    font-weight: 600;
}

.trust-item i {
    color: var(--success);
    font-size: 1rem;
}

/* Panel 2 - Benefits */
.benefits-side {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
    padding: 40px 30px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    color: white;
    position: relative;
    overflow-y: auto;
    max-height: calc(100vh - 70px);
}

.benefits-side::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.08) 0%, transparent 50%);
    z-index: 1;
}

.benefits-container {
    position: relative;
    z-index: 2;
    max-width: 400px;
    margin: 0 auto;
}

.benefits-header {
    text-align: center;
    margin-bottom: 16px;
}

.benefits-header h2 {
    font-family: 'Poppins', sans-serif;
    font-size: 1.875rem;
    font-weight: 900;
    margin-bottom: 16px;
    text-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
}

.benefits-header p {
    font-size: 1rem;
    opacity: 0.95;
}

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 16px;
}

.stat-card {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    padding: 24px;
    text-align: center;
}

.stat-number {
    font-size: 1.875rem;
    font-weight: 900;
    margin-bottom: 8px;
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

.stat-label {
    font-size: 0.875rem;
    opacity: 0.9;
    font-weight: 600;
}

/* Features List */
.features-list {
    list-style: none;
    margin-bottom: 16px;
}

.feature-item {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    padding: 12px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.15);
}

.feature-item:last-child {
    border-bottom: none;
}

.feature-icon {
    width: 48px;
    height: 48px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.feature-icon i {
    font-size: 1.25rem;
}

.feature-content h4 {
    font-size: 1rem;
    font-weight: 800;
    margin-bottom: 6px;
}

.feature-content p {
    font-size: 0.875rem;
    opacity: 0.9;
    line-height: 1.5;
}

/* Student Count Section */
.student-count-section {
    text-align: center;
    margin-top: 32px;
}

.student-count-number {
    font-size: 1.875rem;
    font-weight: 900;
    margin-bottom: 8px;
}

.student-count-label {
    font-size: 1rem;
    opacity: 0.9;
}

/* Course Selection Indicator */
.course-selection-indicator {
    background: linear-gradient(135deg, rgba(124, 58, 237, 0.08), rgba(236, 72, 153, 0.08));
    border: 1px solid rgba(124, 58, 237, 0.2);
    border-radius: 10px;
    padding: 10px 14px;
    margin-top: 12px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.course-icon-badge {
    width: 32px;
    height: 32px;
    background: linear-gradient(135deg, #7c3aed, #ec4899);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.course-icon-badge i {
    color: white;
    font-size: 0.875rem;
}

.course-info {
    flex: 1;
}

.course-info-label {
    font-size: 0.75rem;
    font-weight: 600;
    color: #64748b;
}

.course-info-name {
    font-size: 0.875rem;
    font-weight: 800;
    background: linear-gradient(135deg, #7c3aed, #ec4899);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.course-check-icon {
    color: #10b981;
    font-size: 1rem;
}

/* Panel 3 - Contact Information */
.contact-side {
    background: linear-gradient(135deg, #1e293b 0%, #334155 50%, #475569 100%);
    padding: 40px 30px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    color: white;
    position: relative;
    overflow-y: auto;
    max-height: calc(100vh - 70px);
}

.contact-side::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.08) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.06) 0%, transparent 50%);
    z-index: 1;
}

.contact-container {
    position: relative;
    z-index: 2;
    max-width: 400px;
    margin: 0 auto;
}

.contact-header {
    text-align: center;
    margin-bottom: 32px;
}

.contact-header h2 {
    font-family: 'Poppins', sans-serif;
    font-size: 1.75rem;
    font-weight: 900;
    margin-bottom: 12px;
    text-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
}

.contact-header p {
    font-size: 0.875rem;
    opacity: 0.9;
}

.contact-info-list {
    list-style: none;
}

.contact-info-item {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 16px;
    padding: 20px;
    margin-bottom: 16px;
}

.contact-info-item:last-child {
    margin-bottom: 0;
}

.contact-icon-wrapper {
    width: 48px;
    height: 48px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 12px;
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.contact-icon-wrapper i {
    font-size: 1.25rem;
}

.contact-info-label {
    font-size: 0.75rem;
    opacity: 0.8;
    margin-bottom: 6px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600;
}

.contact-info-content {
    font-size: 0.875rem;
    font-weight: 600;
    line-height: 1.6;
}

.contact-info-content a {
    color: white;
    text-decoration: none;
    transition: opacity 0.3s ease;
}

.contact-info-content a:hover {
    opacity: 0.8;
}

.contact-phone-numbers {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.contact-phone-numbers a {
    display: flex;
    align-items: center;
    gap: 8px;
}

.contact-phone-numbers i {
    font-size: 0.875rem;
}

.map-link-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    width: 100%;
    padding: 14px 20px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 12px;
    color: white;
    text-decoration: none;
    font-weight: 700;
    font-size: 0.875rem;
    transition: all 0.3s ease;
    margin-top: 24px;
}

.map-link-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: translateY(-2px);
}

.map-link-btn i {
    font-size: 1.125rem;
}

/* Responsive */
@media (max-width: 1400px) {
    .form-side,
    .benefits-side,
    .contact-side {
        padding: 30px 20px;
    }

    .form-container,
    .benefits-container,
    .contact-container {
        max-width: 100%;
    }
}

@media (max-width: 1200px) {
    .split-screen {
        grid-template-columns: 1fr 1fr;
    }

    .contact-side {
        grid-column: 1 / -1;
    }

    .form-side,
    .benefits-side,
    .contact-side {
        padding: 40px 30px;
    }
}

@media (max-width: 968px) {
    .split-screen {
        grid-template-columns: 1fr;
    }

    .benefits-side,
    .contact-side,
    .form-side {
        min-height: auto;
        max-height: none;
        padding: 50px 30px;
    }
}

@media (max-width: 640px) {
    .form-side,
    .benefits-side,
    .contact-side {
        padding: 40px 20px;
    }

    .form-header h1,
    .benefits-header h2,
    .contact-header h2 {
        font-size: 1.5rem;
    }

    .form-grid,
    .stats-grid {
        grid-template-columns: 1fr;
    }

    .trust-indicators {
        gap: 16px;
        flex-direction: column;
    }

    .contact-info-item {
        padding: 16px;
    }
}
</style>

<?php if ($success_message || $error_message): ?>
    <div class="alert-overlay">
        <?php if ($success_message): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                <span><?php echo $success_message; ?></span>
            </div>
        <?php endif; ?>

        <?php if ($error_message): ?>
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i>
                <span><?php echo $error_message; ?></span>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>

<div class="split-screen">

    <!-- PANEL 1 - REGISTRATION FORM -->
    <div class="form-side">
        <div class="form-container">
            <div class="form-header">
                <div class="form-badge">
                    <i class="fas fa-rocket"></i>
                    <span>Start Your Journey</span>
                </div>
                <h1>Join Bheem Academy</h1>
                <p>Fill in your details and start your AI learning journey today. Transform your future with cutting-edge skills.</p>
            <?php if (!empty($course_name)): ?>
            <div class="course-selection-indicator">
                <div class="course-icon-badge">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="course-info">
                    <div class="course-info-label">Enrolling for</div>
                    <div class="course-info-name"><?php echo htmlspecialchars($course_name); ?></div>
                </div>
                <i class="fas fa-check-circle course-check-icon"></i>
            </div>
            <?php endif; ?>
            </div>
            <form method="POST" action="">
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Full Name <span class="required">*</span></label>
                        <input type="text" name="full_name" class="form-input" required placeholder="John Doe">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Phone <span class="required">*</span></label>
                        <input type="tel" name="phone" class="form-input" required placeholder="+91 999 999 9999">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Email <span class="required">*</span></label>
                    <input type="email" name="email" class="form-input" required placeholder="your.email@example.com">
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Age Group <span class="required">*</span></label>
                        <select name="age_group" class="form-select" required>
                            <option value="">Select Age Group</option>
                            <option value="kids">Kids (8-13 years)</option>
                            <option value="youth">Youth (14-18 years)</option>
                            <option value="professionals">Professionals (18+)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Course <span class="required">*</span></label>
                        <select name="course_interest" class="form-select" required>
                            <option value="">Choose Course</option>
                            <optgroup label="Kids Programs">
                                <option value="Junior AI Basics">Junior AI Basics</option>
                                <option value="Junior AI Mastery">Junior AI Mastery</option>
                                <option value="Junior Coding">Junior Coding</option>
                            </optgroup>
                            <optgroup label="Youth Programs">
                                <option value="Youth AI Mastery">Youth AI Mastery</option>
                            </optgroup>
                            <optgroup label="Professional Programs">
                                <option value="AI for Teachers">AI for Teachers</option>
                                <option value="AI for Lawyers">AI for Lawyers</option>
                                <option value="AI for HR">AI for HR</option>
                            </optgroup>
                            <optgroup label="Advanced">
                                <option value="Bheem Superstar">Bheem Superstar</option>
                            </optgroup>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Message (Optional)</label>
                    <textarea name="message" class="form-textarea" placeholder="Tell us about your learning goals..."></textarea>
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-check-circle"></i>
                    <span>Complete Registration</span>
                    <i class="fas fa-arrow-right"></i>
                </button>

                <div class="trust-indicators">
                    <div class="trust-item">
                        <i class="fas fa-shield-alt"></i>
                        <span>Certified Courses</span>
                    </div>
                    <div class="trust-item">
                        <i class="fas fa-users"></i>
                        <span>5000+ Students</span>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- PANEL 2 - BENEFITS -->
    <div class="benefits-side">
        <div class="benefits-container">
            <div class="benefits-header">
                <h2>Why Bheem Academy?</h2>
                <p>Join thousands transforming their careers with AI</p>
            </div>

            <!-- Features -->
            <ul class="features-list">
                <li class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Expert Instructors</h4>
                        <p>Learn from industry professionals</p>
                    </div>
                </li>
                <li class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Industry Certificate</h4>
                        <p>Get recognized credentials</p>
                    </div>
                </li>
                <li class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-infinity"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Lifetime Access</h4>
                        <p>Forever access to materials</p>
                    </div>
                </li>
            </ul>

            <div class="student-count-section">
                <div class="student-count-number">5000+ Students</div>
                <div class="student-count-label">Already Enrolled</div>
            </div>
        </div>
    </div>

    <!-- PANEL 3 - CONTACT INFORMATION -->
    <div class="contact-side">
        <div class="contact-container">
            <div class="contact-header">
                <h2>Get In Touch</h2>
                <p>We're here to help you start your learning journey</p>
            </div>

            <ul class="contact-info-list">
                <li class="contact-info-item">
                    <div class="contact-icon-wrapper">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="contact-info-label">Visit Us</div>
                    <div class="contact-info-content">
                        Chambakkara - Kannadikadu Rd,<br>
                        Opposite Forum Mall, Shankar Nagar,<br>
                        Kundannoor, Vyttila,<br>
                        Kochi, Ernakulam, Kerala 682304
                    </div>
                </li>

                <li class="contact-info-item">
                    <div class="contact-icon-wrapper">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="contact-info-label">Call Us</div>
                    <div class="contact-info-content">
                        <div class="contact-phone-numbers">
                            <a href="tel:+917994732004">
                                <i class="fas fa-phone"></i>
                                <span>+91 79947 32004</span>
                            </a>
                            <a href="tel:+917994732006">
                                <i class="fas fa-phone"></i>
                                <span>+91 79947 32006</span>
                            </a>
                        </div>
                    </div>
                </li>

                <li class="contact-info-item">
                    <div class="contact-icon-wrapper">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="contact-info-label">Email Us</div>
                    <div class="contact-info-content">
                        <a href="mailto:enquiry@bheem.academy">enquiry@bheem.academy</a>
                    </div>
                </li>
            </ul>

            <a href="https://www.google.com/maps?um=1&ie=UTF-8&fb=1&gl=in&sa=X&geocode=KeH5qVzvcwg7MXaLzaJhMmx6&daddr=Chambakkara+-+Kannadikadu+Rd,+opposite+Forum+Mall,+Shankar+Nagar,+Kundannoor,+Vyttila,+Kochi,+Ernakulam,+Kerala+682304"
               target="_blank"
               rel="noopener noreferrer"
               class="map-link-btn">
                <i class="fas fa-map-marked-alt"></i>
                <span>Open in Google Maps</span>
            </a>
        </div>
    </div>

</div>

<script>
// Pre-select course from URL parameter
document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const courseParam = urlParams.get('course');
    const courseSelect = document.querySelector('select[name="course_interest"]');

    if (courseParam && courseSelect) {
        const options = courseSelect.options;
        for (let i = 0; i < options.length; i++) {
            if (options[i].value.toLowerCase().includes(courseParam.toLowerCase()) ||
                courseParam.toLowerCase().includes(options[i].value.toLowerCase())) {
                courseSelect.selectedIndex = i;
                break;
            }
        }
    }
});
</body>
</html>
