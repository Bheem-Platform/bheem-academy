<?php
// This file is part of Moodle - http://moodle.org/
//
// Vue.js Enhanced Section View
// Modern, beautiful design with Vue.js while keeping database connectivity

require_once('../config.php');
require_once('lib.php');
require_once($CFG->libdir.'/completionlib.php');

redirect_if_major_upgrade_required();

$sectionid = required_param('id', PARAM_INT);
$edit = optional_param('edit', -1, PARAM_BOOL);

if (!$section = $DB->get_record('course_sections', ['id' => $sectionid], '*')) {
    redirect(new moodle_url('/'), get_string('sectioncantbefound', 'error'));
}

$PAGE->set_url('/course/section-vue.php', ['id' => $sectionid]);

if ($section->course == SITEID) {
    redirect($CFG->wwwroot .'/?redirect=0');
}

$course = get_course($section->course);
$format = course_get_format($course);
$course->format = $format->get_format();
$format->set_sectionid($section->id);

if (!course_format_uses_sections($course->format)) {
    redirect(new moodle_url('/course/view.php', ['id' => $course->id]));
}

$PAGE->set_cacheable(false);

context_helper::preload_course($course->id);
$context = context_course::instance($course->id, MUST_EXIST);

require_login($course);

$PAGE->set_pagelayout('course');
$PAGE->add_body_classes(['limitedwidth', 'single-section-page', 'vue-section-page']);

$modinfo = get_fast_modinfo($course);
$sectioninfo = $modinfo->get_section_info($section->section, MUST_EXIST);

if (!$sectioninfo->uservisible) {
    if ($sectioninfo->visible && $sectioninfo->availableinfo) {
        $sectionname = get_section_name($course, $sectioninfo);
        $message = get_string('notavailablecourse', '', $sectionname);
        redirect(course_get_url($course), $message, null, \core\output\notification::NOTIFY_ERROR);
    } else {
        require_capability('moodle/course:viewhiddensections', $context);
    }
}

if (!isset($USER->editing)) {
    $USER->editing = 0;
}

$sectionname = $format->get_generic_section_name();
$sectiontitle = $format->get_section_name($section);
$PAGE->set_title($course->fullname . ': ' . $sectiontitle);
$PAGE->set_heading($course->fullname);
$PAGE->set_secondary_navigation(false);

// Prepare section data for Vue.js
$sectiondata = [
    'id' => $sectioninfo->id,
    'section' => $sectioninfo->section,
    'name' => $sectiontitle,
    'summary' => format_text($sectioninfo->summary, $sectioninfo->summaryformat, ['noclean' => true, 'context' => $context]),
    'visible' => $sectioninfo->visible,
    'activities' => []
];

// Get activities
if (!empty($modinfo->sections[$sectioninfo->section])) {
    foreach ($modinfo->sections[$sectioninfo->section] as $modnumber) {
        $mod = $modinfo->cms[$modnumber];

        if (!$mod->uservisible && !$mod->is_visible_on_course_page()) {
            continue;
        }

        $completioninfo = new completion_info($course);
        $completiondata = $completioninfo->get_data($mod, true);

        $activitydata = [
            'id' => $mod->id,
            'name' => $mod->name,
            'modname' => $mod->modname,
            'modplural' => get_string('modulenameplural', $mod->modname),
            'icon' => $mod->get_icon_url()->out(false),
            'url' => $mod->url ? $mod->url->out(false) : '',
            'visible' => $mod->visible,
            'uservisible' => $mod->uservisible,
            'availableinfo' => $mod->availableinfo,
            'completion' => $completiondata->completionstate,
            'indent' => $mod->indent
        ];

        // Add description if available
        if ($mod->showdescription && $mod->get_formatted_content(['overflowdiv' => true, 'noclean' => true])) {
            $activitydata['description'] = $mod->get_formatted_content(['overflowdiv' => true, 'noclean' => true]);
        }

        $sectiondata['activities'][] = $activitydata;
    }
}

// Output header
echo $OUTPUT->header();

// Include course AJAX
include_course_ajax($course, $modinfo->get_used_module_names());

// Trigger section viewed event
course_section_view($context, $sectionid);
?>

<!-- Vue.js 3 CDN -->
<script src="https://unpkg.com/vue@3.3.4/dist/vue.global.js"></script>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Vue App Container -->
<div id="vue-section-app"></div>

<style>
/* ===== Industry-Standard Vue.js Section Page Design ===== */
/* Modern, Professional, Attention-Grabbing Design with Perfect Responsiveness */

:root {
    /* Primary Color Palette - Purple & Pink Gradients */
    --vue-primary: #667eea;
    --vue-primary-dark: #764ba2;
    --vue-primary-light: #8b9ff5;
    --vue-secondary: #ec4899;
    --vue-secondary-dark: #db2777;
    --vue-accent: #f59e0b;

    /* Semantic Colors */
    --vue-success: #10b981;
    --vue-success-light: #34d399;
    --vue-warning: #f59e0b;
    --vue-info: #06b6d4;
    --vue-danger: #ef4444;

    /* Neutral Colors */
    --vue-gray-50: #f8fafc;
    --vue-gray-100: #f1f5f9;
    --vue-gray-200: #e2e8f0;
    --vue-gray-300: #cbd5e1;
    --vue-gray-400: #94a3b8;
    --vue-gray-500: #64748b;
    --vue-gray-600: #475569;
    --vue-gray-700: #334155;
    --vue-gray-800: #1e293b;
    --vue-gray-900: #0f172a;

    /* Spacing System */
    --vue-spacing-xs: 8px;
    --vue-spacing-sm: 16px;
    --vue-spacing-md: 24px;
    --vue-spacing-lg: 32px;
    --vue-spacing-xl: 48px;
    --vue-spacing-2xl: 64px;

    /* Border Radius */
    --vue-radius-sm: 8px;
    --vue-radius-md: 12px;
    --vue-radius-lg: 16px;
    --vue-radius-xl: 20px;
    --vue-radius-2xl: 24px;
    --vue-radius-full: 9999px;

    /* Shadows */
    --vue-shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.05);
    --vue-shadow-md: 0 4px 12px rgba(102, 126, 234, 0.08);
    --vue-shadow-lg: 0 8px 24px rgba(102, 126, 234, 0.12);
    --vue-shadow-xl: 0 12px 40px rgba(102, 126, 234, 0.15);
    --vue-shadow-2xl: 0 20px 60px rgba(102, 126, 234, 0.2);

    /* Transitions */
    --vue-transition-fast: 0.15s cubic-bezier(0.4, 0, 0.2, 1);
    --vue-transition-base: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    --vue-transition-slow: 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    --vue-transition-bounce: 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body.vue-section-page {
    background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 25%, #fce7f3 50%, #f3e8ff 75%, #f0f9ff 100%);
    background-size: 400% 400%;
    animation: gradientShift 15s ease infinite;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', sans-serif;
    min-height: 100vh;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

@keyframes gradientShift {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

#vue-section-app {
    max-width: 1920px;
    margin: 0 auto;
    padding: var(--vue-spacing-xl) var(--vue-spacing-md);
    width: 98%;
}

.vue-section-container {
    animation: fadeInUp 0.6s ease;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ===== Section Header - Industry Standard Design ===== */
.vue-section-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #ec4899 100%);
    border-radius: var(--vue-radius-2xl);
    padding: var(--vue-spacing-2xl) var(--vue-spacing-xl);
    margin-bottom: var(--vue-spacing-xl);
    color: white;
    box-shadow: var(--vue-shadow-2xl),
                0 0 0 1px rgba(255, 255, 255, 0.1) inset;
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    gap: var(--vue-spacing-md);
    backdrop-filter: blur(20px);
}

/* Animated Gradient Overlay */
.vue-section-header::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.2) 0%, transparent 70%);
    animation: rotateGlow 10s linear infinite;
    pointer-events: none;
}

/* Shimmer Effect */
.vue-section-header::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent 0%, rgba(255,255,255,0.3) 50%, transparent 100%);
    animation: shimmer 4s ease-in-out infinite;
}

@keyframes rotateGlow {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

@keyframes shimmer {
    0% { left: -100%; }
    50% { left: 100%; }
    100% { left: 100%; }
}

/* Decorative Elements */
.vue-section-header::before {
    content: '';
    position: absolute;
    bottom: -50px;
    right: -50px;
    width: 200px;
    height: 200px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    filter: blur(40px);
}

.vue-section-title {
    font-size: 3rem;
    font-weight: 800;
    margin: 0;
    text-shadow: 0 4px 12px rgba(0, 0, 0, 0.2),
                 0 2px 4px rgba(0, 0, 0, 0.1);
    position: relative;
    z-index: 2;
    line-height: 1.2;
    letter-spacing: -1px;
    background: linear-gradient(to right, #ffffff, #f3e8ff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: titleGlow 3s ease-in-out infinite;
}

@keyframes titleGlow {
    0%, 100% { filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.3)); }
    50% { filter: drop-shadow(0 0 20px rgba(255, 255, 255, 0.5)); }
}

.vue-section-summary {
    font-size: 1.15rem;
    line-height: 1.8;
    opacity: 0.95;
    position: relative;
    z-index: 2;
    margin: 0;
    max-width: 900px;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-weight: 400;
}

/* ===== Navigation Breadcrumb - Modern Design ===== */
.vue-breadcrumb {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: var(--vue-spacing-sm);
    padding: var(--vue-spacing-md) var(--vue-spacing-lg);
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px) saturate(180%);
    border-radius: var(--vue-radius-lg);
    margin-bottom: var(--vue-spacing-xl);
    box-shadow: var(--vue-shadow-md);
    border: 1px solid rgba(102, 126, 234, 0.1);
    transition: all var(--vue-transition-base);
}

.vue-breadcrumb:hover {
    box-shadow: var(--vue-shadow-lg);
    transform: translateY(-2px);
}

.vue-breadcrumb-item {
    color: var(--vue-gray-600);
    text-decoration: none;
    transition: all var(--vue-transition-base);
    font-weight: 500;
    font-size: 0.95rem;
    padding: 6px 12px;
    border-radius: var(--vue-radius-sm);
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.vue-breadcrumb-item:hover {
    color: var(--vue-primary);
    background: rgba(102, 126, 234, 0.08);
    transform: translateX(2px);
}

.vue-breadcrumb-item i {
    font-size: 1rem;
}

.vue-breadcrumb-separator {
    color: var(--vue-gray-300);
    font-weight: 300;
    font-size: 1.2rem;
    user-select: none;
}

.vue-breadcrumb-current {
    color: var(--vue-gray-800);
    font-weight: 700;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.12), rgba(236, 72, 153, 0.12));
    padding: 6px 16px;
    border-radius: var(--vue-radius-sm);
    border: 1.5px solid rgba(102, 126, 234, 0.2);
}

/* ===== Activities Horizontal Layout - Modern & Clean ===== */
.vue-activities-container {
    display: flex;
    gap: var(--vue-spacing-md);
    margin-top: 0;
    overflow-x: auto;
    overflow-y: hidden;
    padding-bottom: var(--vue-spacing-sm);
    scroll-behavior: smooth;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: thin;
    scrollbar-color: rgba(102, 126, 234, 0.3) rgba(102, 126, 234, 0.1);
}

/* Custom Scrollbar for Horizontal Layout */
.vue-activities-container::-webkit-scrollbar {
    height: 8px;
}

.vue-activities-container::-webkit-scrollbar-track {
    background: rgba(102, 126, 234, 0.05);
    border-radius: 4px;
}

.vue-activities-container::-webkit-scrollbar-thumb {
    background: linear-gradient(90deg, var(--vue-primary), var(--vue-primary-dark));
    border-radius: 4px;
}

.vue-activities-container::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(90deg, var(--vue-primary-dark), var(--vue-primary));
}

.vue-activity-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px) saturate(180%);
    border-radius: var(--vue-radius-2xl);
    padding: var(--vue-spacing-lg);
    border: 2px solid rgba(102, 126, 234, 0.12);
    transition: all var(--vue-transition-slow);
    cursor: pointer;
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    gap: var(--vue-spacing-md);
    min-width: 420px;
    max-width: 480px;
    flex-shrink: 0;
    height: auto;
    box-shadow: var(--vue-shadow-md);
}

/* Gradient Border Animation on Hover */
.vue-activity-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
    background: linear-gradient(90deg, #667eea 0%, #764ba2 25%, #ec4899 50%, #f59e0b 75%, #667eea 100%);
    background-size: 200% 100%;
    transform: scaleX(0);
    transform-origin: left;
    transition: transform var(--vue-transition-slow);
    animation: gradientFlow 3s linear infinite;
}

@keyframes gradientFlow {
    0% { background-position: 0% 0%; }
    100% { background-position: 200% 0%; }
}

.vue-activity-card:hover::before {
    transform: scaleX(1);
}

/* Glow Effect on Hover */
.vue-activity-card::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(102, 126, 234, 0.15), transparent);
    transform: translate(-50%, -50%);
    transition: all var(--vue-transition-slow);
    pointer-events: none;
    z-index: 0;
}

.vue-activity-card:hover::after {
    width: 300%;
    height: 300%;
}

.vue-activity-card:hover {
    transform: translateY(-12px) scale(1.02);
    border-color: rgba(102, 126, 234, 0.3);
    box-shadow: var(--vue-shadow-2xl),
                0 0 40px rgba(102, 126, 234, 0.15),
                0 0 0 1px rgba(255, 255, 255, 0.5) inset;
}

/* Active/Click Effect */
.vue-activity-card:active {
    transform: translateY(-8px) scale(0.98);
    transition: all var(--vue-transition-fast);
}

.vue-activity-header {
    display: flex;
    align-items: flex-start;
    gap: var(--vue-spacing-md);
    margin: 0;
    position: relative;
    z-index: 1;
}

.vue-activity-icon {
    width: 64px;
    height: 64px;
    border-radius: var(--vue-radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    box-shadow: var(--vue-shadow-lg);
    transition: all var(--vue-transition-bounce);
    position: relative;
    overflow: hidden;
}

/* Icon Glow Effect */
.vue-activity-icon::before {
    content: '';
    position: absolute;
    inset: -2px;
    border-radius: var(--vue-radius-lg);
    padding: 2px;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 0.2));
    -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
    pointer-events: none;
}

.vue-activity-card:hover .vue-activity-icon {
    transform: scale(1.15) rotate(-5deg);
    box-shadow: var(--vue-shadow-xl),
                0 0 30px rgba(102, 126, 234, 0.3);
}

.vue-activity-icon img {
    width: 36px;
    height: 36px;
    filter: brightness(0) invert(1) drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
    transition: all var(--vue-transition-base);
}

.vue-activity-card:hover .vue-activity-icon img {
    filter: brightness(0) invert(1) drop-shadow(0 4px 8px rgba(0, 0, 0, 0.3));
    transform: scale(1.1);
}

/* Activity Type Colors - Enhanced Gradients with Animation */
.activity-type-assign .vue-activity-icon {
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 50%, #ea580c 100%);
    box-shadow: 0 8px 20px rgba(245, 158, 11, 0.35);
}

.activity-type-quiz .vue-activity-icon {
    background: linear-gradient(135deg, #10b981 0%, #059669 50%, #047857 100%);
    box-shadow: 0 8px 20px rgba(16, 185, 129, 0.35);
}

.activity-type-forum .vue-activity-icon {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 50%, #be185d 100%);
    box-shadow: 0 8px 20px rgba(236, 72, 153, 0.35);
}

.activity-type-resource .vue-activity-icon,
.activity-type-page .vue-activity-icon {
    background: linear-gradient(135deg, #06b6d4 0%, #0891b2 50%, #0e7490 100%);
    box-shadow: 0 8px 20px rgba(6, 182, 212, 0.35);
}

.activity-type-url .vue-activity-icon {
    background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 50%, #6d28d9 100%);
    box-shadow: 0 8px 20px rgba(139, 92, 246, 0.35);
}

.activity-type-book .vue-activity-icon {
    background: linear-gradient(135deg, #f97316 0%, #ea580c 50%, #dc2626 100%);
    box-shadow: 0 8px 20px rgba(249, 115, 22, 0.35);
}

.activity-type-lesson .vue-activity-icon {
    background: linear-gradient(135deg, #14b8a6 0%, #0d9488 50%, #0f766e 100%);
    box-shadow: 0 8px 20px rgba(20, 184, 166, 0.35);
}

.activity-type-folder .vue-activity-icon {
    background: linear-gradient(135deg, #64748b 0%, #475569 50%, #334155 100%);
    box-shadow: 0 8px 20px rgba(100, 116, 139, 0.35);
}

.activity-type-label .vue-activity-icon {
    background: linear-gradient(135deg, #a855f7 0%, #9333ea 50%, #7e22ce 100%);
    box-shadow: 0 8px 20px rgba(168, 85, 247, 0.35);
}

.activity-type-default .vue-activity-icon {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #ec4899 100%);
    box-shadow: 0 8px 20px rgba(102, 126, 234, 0.35);
}

/* Hover Effects for Activity Type Icons */
.vue-activity-card:hover .vue-activity-icon {
    animation: iconPulse 2s ease-in-out infinite;
}

@keyframes iconPulse {
    0%, 100% { box-shadow: 0 8px 20px rgba(102, 126, 234, 0.35); }
    50% { box-shadow: 0 12px 30px rgba(102, 126, 234, 0.5); }
}

.vue-activity-content {
    flex: 1;
    min-width: 0;
    display: flex;
    flex-direction: column;
    gap: 6px;
    position: relative;
    z-index: 1;
}

.vue-activity-name {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--vue-gray-900);
    margin: 0;
    line-height: 1.4;
    word-wrap: break-word;
    background: linear-gradient(135deg, #1e293b 0%, #475569 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    transition: all var(--vue-transition-base);
}

.vue-activity-card:hover .vue-activity-name {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    transform: translateX(2px);
}

.vue-activity-type {
    color: var(--vue-gray-500);
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin: 0;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 10px;
    background: rgba(102, 126, 234, 0.08);
    border-radius: var(--vue-radius-full);
    width: fit-content;
    transition: all var(--vue-transition-base);
}

.vue-activity-card:hover .vue-activity-type {
    background: rgba(102, 126, 234, 0.15);
    color: var(--vue-primary);
    transform: translateX(2px);
}

.vue-activity-description {
    margin: 0;
    padding: var(--vue-spacing-sm) 0;
    color: var(--vue-gray-600);
    line-height: 1.7;
    font-size: 0.95rem;
    flex: 1;
    position: relative;
    z-index: 1;
    font-weight: 400;
}

.vue-activity-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin: 0;
    padding-top: var(--vue-spacing-md);
    border-top: 2px solid var(--vue-gray-100);
    gap: var(--vue-spacing-md);
    flex-wrap: wrap;
    position: relative;
    z-index: 1;
}

.vue-completion-badge {
    display: inline-flex;
    align-items: center;
    gap: var(--vue-spacing-xs);
    padding: 8px 16px;
    border-radius: var(--vue-radius-full);
    font-size: 0.85rem;
    font-weight: 700;
    white-space: nowrap;
    transition: all var(--vue-transition-base);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.vue-completion-completed {
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.15), rgba(52, 211, 153, 0.15));
    color: #047857;
    border: 2px solid rgba(16, 185, 129, 0.4);
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
}

.vue-completion-completed i {
    animation: checkPulse 2s ease-in-out infinite;
}

@keyframes checkPulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.2); }
}

.vue-completion-incomplete {
    background: linear-gradient(135deg, rgba(148, 163, 184, 0.1), rgba(203, 213, 225, 0.1));
    color: var(--vue-gray-600);
    border: 2px solid rgba(148, 163, 184, 0.3);
}

.vue-activity-card:hover .vue-completion-badge {
    transform: scale(1.05);
}

.vue-activity-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: var(--vue-spacing-xs);
    padding: 10px 24px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #ec4899 100%);
    background-size: 200% 100%;
    background-position: 0% 0%;
    color: white;
    text-decoration: none;
    border-radius: var(--vue-radius-full);
    font-weight: 700;
    font-size: 0.9rem;
    transition: all var(--vue-transition-base);
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    white-space: nowrap;
    position: relative;
    overflow: hidden;
    border: 2px solid rgba(255, 255, 255, 0.2);
}

.vue-activity-button::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.3);
    transform: translate(-50%, -50%);
    transition: width 0.6s ease, height 0.6s ease;
}

.vue-activity-button:hover::before {
    width: 300px;
    height: 300px;
}

.vue-activity-button:hover {
    background-position: 100% 0%;
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 8px 24px rgba(102, 126, 234, 0.45),
                0 0 30px rgba(236, 72, 153, 0.3);
    color: white;
}

.vue-activity-button:active {
    transform: translateY(-1px) scale(1.02);
    transition: all var(--vue-transition-fast);
}

.vue-activity-button i {
    transition: transform var(--vue-transition-base);
    position: relative;
    z-index: 1;
}

.vue-activity-button:hover i {
    transform: translateX(4px);
}

.vue-activity-button span {
    position: relative;
    z-index: 1;
}

/* Empty State */
.vue-empty-state {
    text-align: center;
    padding: 80px 40px;
    background: white;
    border-radius: 20px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.05);
}

.vue-empty-state i {
    font-size: 5rem;
    color: rgba(102, 126, 234, 0.3);
    margin-bottom: 24px;
}

.vue-empty-state h3 {
    font-size: 1.8rem;
    color: #1e293b;
    margin-bottom: 12px;
}

.vue-empty-state p {
    color: #64748b;
    font-size: 1.1rem;
}

/* Loading State */
.vue-loading {
    text-align: center;
    padding: 100px 40px;
}

.vue-spinner {
    width: 60px;
    height: 60px;
    border: 4px solid rgba(102, 126, 234, 0.2);
    border-top-color: var(--vue-primary);
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin: 0 auto 24px;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

/* ===== Activity Count Indicator - Enhanced ===== */
.vue-activities-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: var(--vue-spacing-lg);
    padding: var(--vue-spacing-md) var(--vue-spacing-lg);
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    border-radius: var(--vue-radius-xl);
    box-shadow: var(--vue-shadow-sm);
    border: 1px solid rgba(102, 126, 234, 0.1);
}

.vue-activities-count {
    color: var(--vue-gray-700);
    font-size: 1.05rem;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 6px 16px;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(236, 72, 153, 0.1));
    border-radius: var(--vue-radius-full);
    border: 2px solid rgba(102, 126, 234, 0.2);
}

.vue-activities-count i {
    color: var(--vue-primary);
    font-size: 1.1rem;
    animation: floatIcon 3s ease-in-out infinite;
}

@keyframes floatIcon {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-4px); }
}

.vue-scroll-hint {
    color: var(--vue-primary);
    font-size: 0.9rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 10px;
    animation: slideHint 2s ease-in-out infinite;
    padding: 6px 14px;
    background: rgba(102, 126, 234, 0.08);
    border-radius: var(--vue-radius-full);
}

.vue-scroll-hint i {
    animation: arrowBounce 1.5s ease-in-out infinite;
}

@keyframes slideHint {
    0%, 100% { transform: translateX(0); }
    50% { transform: translateX(6px); }
}

@keyframes arrowBounce {
    0%, 100% { transform: translateX(0); }
    50% { transform: translateX(5px); }
}

/* ===== Navigation Arrows for Horizontal Scroll - Modern Design ===== */
.vue-activities-wrapper {
    position: relative;
    margin-top: var(--vue-spacing-md);
}

.vue-scroll-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 56px;
    height: 56px;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border: 2px solid rgba(102, 126, 234, 0.25);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 10;
    transition: all var(--vue-transition-bounce);
    box-shadow: var(--vue-shadow-lg);
}

.vue-scroll-nav::before {
    content: '';
    position: absolute;
    inset: -4px;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.4), rgba(236, 72, 153, 0.4));
    opacity: 0;
    transition: opacity var(--vue-transition-base);
    z-index: -1;
}

.vue-scroll-nav:hover::before {
    opacity: 1;
    animation: pulseGlow 1.5s ease-in-out infinite;
}

@keyframes pulseGlow {
    0%, 100% { transform: scale(1); opacity: 0.5; }
    50% { transform: scale(1.2); opacity: 0.8; }
}

.vue-scroll-nav:hover {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #ec4899 100%);
    color: white;
    border-color: transparent;
    transform: translateY(-50%) scale(1.15);
    box-shadow: var(--vue-shadow-xl),
                0 0 30px rgba(102, 126, 234, 0.5);
}

.vue-scroll-nav:active {
    transform: translateY(-50%) scale(1.05);
}

.vue-scroll-nav.left {
    left: -28px;
}

.vue-scroll-nav.right {
    right: -28px;
}

.vue-scroll-nav i {
    font-size: 20px;
    color: var(--vue-primary);
    transition: all var(--vue-transition-base);
    font-weight: 900;
}

.vue-scroll-nav:hover i {
    color: white;
    transform: scale(1.2);
    filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
}

@media (max-width: 1024px) {
    .vue-scroll-nav {
        display: none;
    }
}

/* ===== Responsive Design - Horizontal Layout ===== */
@media (max-width: 1600px) {
    .vue-activity-card {
        min-width: 380px;
        max-width: 440px;
    }
}

@media (max-width: 1400px) {
    .vue-activity-card {
        min-width: 360px;
        max-width: 400px;
    }
}

@media (max-width: 1200px) {
    .vue-activity-card {
        min-width: 340px;
        max-width: 380px;
    }
}

@media (max-width: 768px) {
    #vue-section-app {
        padding: var(--vue-spacing-lg) var(--vue-spacing-sm);
        width: 99%;
    }

    .vue-section-header {
        padding: var(--vue-spacing-xl) var(--vue-spacing-lg);
        border-radius: var(--vue-radius-xl);
    }

    .vue-section-title {
        font-size: 2.25rem;
        letter-spacing: -0.5px;
    }

    .vue-section-summary {
        font-size: 1.05rem;
    }

    .vue-breadcrumb {
        padding: var(--vue-spacing-sm) var(--vue-spacing-md);
        gap: var(--vue-spacing-xs);
    }

    .vue-activities-header {
        flex-direction: column;
        gap: var(--vue-spacing-sm);
        align-items: flex-start;
        padding: var(--vue-spacing-md);
    }

    .vue-activities-container {
        gap: var(--vue-spacing-md);
        padding-bottom: var(--vue-spacing-md);
    }

    .vue-activity-card {
        min-width: 300px;
        max-width: 320px;
        padding: var(--vue-spacing-md);
    }

    .vue-activity-icon {
        width: 56px;
        height: 56px;
    }

    .vue-activity-icon img {
        width: 32px;
        height: 32px;
    }

    .vue-activity-name {
        font-size: 1.15rem;
    }

    .vue-activity-footer {
        flex-direction: column;
        align-items: stretch;
        gap: var(--vue-spacing-sm);
    }

    .vue-activity-button,
    .vue-completion-badge {
        width: 100%;
        justify-content: center;
    }
}

@media (max-width: 480px) {
    #vue-section-app {
        padding: var(--vue-spacing-md) var(--vue-spacing-sm);
        width: 100%;
    }

    .vue-section-header {
        padding: var(--vue-spacing-lg) var(--vue-spacing-md);
        border-radius: var(--vue-radius-lg);
    }

    .vue-section-title {
        font-size: 1.85rem;
        letter-spacing: -0.3px;
    }

    .vue-section-summary {
        font-size: 0.95rem;
    }

    .vue-breadcrumb {
        padding: var(--vue-spacing-xs) var(--vue-spacing-sm);
        gap: 6px;
        font-size: 0.85rem;
    }

    .vue-breadcrumb-item {
        padding: 4px 8px;
        font-size: 0.85rem;
    }

    .vue-activities-header {
        padding: var(--vue-spacing-sm);
    }

    .vue-activities-count {
        font-size: 0.9rem;
        padding: 5px 12px;
    }

    .vue-activity-card {
        min-width: 280px;
        max-width: 300px;
        padding: var(--vue-spacing-md);
    }

    .vue-activity-icon {
        width: 52px;
        height: 52px;
    }

    .vue-activity-icon img {
        width: 28px;
        height: 28px;
    }

    .vue-activity-name {
        font-size: 1.05rem;
    }

    .vue-activity-type {
        font-size: 0.7rem;
        padding: 3px 8px;
    }

    .vue-scroll-hint {
        font-size: 0.8rem;
        padding: 5px 10px;
    }

    .vue-activity-button {
        padding: 10px 20px;
        font-size: 0.85rem;
    }

    .vue-completion-badge {
        padding: 7px 14px;
        font-size: 0.8rem;
    }
}
</style>

<script>
const { createApp } = Vue;

createApp({
    data() {
        return {
            loading: true,
            section: <?php echo json_encode($sectiondata); ?>,
            courseName: <?php echo json_encode($course->fullname); ?>,
            courseUrl: <?php echo json_encode((new moodle_url('/course/view.php', ['id' => $course->id]))->out(false)); ?>,
            canScrollLeft: false,
            canScrollRight: false
        }
    },
    computed: {
        hasActivities() {
            return this.section.activities && this.section.activities.length > 0;
        }
    },
    methods: {
        getActivityTypeClass(modname) {
            return `activity-type-${modname}`;
        },
        getCompletionText(completion) {
            if (completion == 1) return 'Completed';
            if (completion == 2) return 'Completed';
            return 'Not completed';
        },
        getCompletionIcon(completion) {
            if (completion == 1 || completion == 2) return 'fa-check-circle';
            return 'fa-circle';
        },
        isCompleted(completion) {
            return completion == 1 || completion == 2;
        },
        navigateToActivity(url) {
            if (url) {
                window.location.href = url;
            }
        },
        stripHTML(html) {
            const tmp = document.createElement('div');
            tmp.innerHTML = html;
            return tmp.textContent || tmp.innerText || '';
        },
        scrollLeft() {
            const container = this.$refs.activitiesContainer;
            if (container) {
                container.scrollBy({ left: -400, behavior: 'smooth' });
            }
        },
        scrollRight() {
            const container = this.$refs.activitiesContainer;
            if (container) {
                container.scrollBy({ left: 400, behavior: 'smooth' });
            }
        },
        checkScroll() {
            const container = this.$refs.activitiesContainer;
            if (container) {
                this.canScrollLeft = container.scrollLeft > 0;
                this.canScrollRight = container.scrollLeft < (container.scrollWidth - container.clientWidth - 10);
            }
        }
    },
    mounted() {
        this.loading = false;

        // Check scroll positions
        this.$nextTick(() => {
            this.checkScroll();
            window.addEventListener('resize', this.checkScroll);
        });

        // Smooth scroll to hash if present
        setTimeout(() => {
            if (window.location.hash) {
                const target = document.querySelector(window.location.hash);
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }
        }, 300);
    },
    beforeUnmount() {
        window.removeEventListener('resize', this.checkScroll);
    },
    template: `
        <div class="vue-section-container">
            <!-- Breadcrumb -->
            <nav class="vue-breadcrumb">
                <a :href="courseUrl" class="vue-breadcrumb-item">
                    <i class="fa fa-home"></i>
                    {{ courseName }}
                </a>
                <span class="vue-breadcrumb-separator">›</span>
                <span class="vue-breadcrumb-current">{{ section.name }}</span>
            </nav>

            <!-- Loading State -->
            <div v-if="loading" class="vue-loading">
                <div class="vue-spinner"></div>
                <p style="color: #64748b; font-size: 1.1rem;">Loading section...</p>
            </div>

            <!-- Content -->
            <template v-else>
                <!-- Section Header -->
                <div class="vue-section-header">
                    <h1 class="vue-section-title">{{ section.name }}</h1>
                    <div v-if="section.summary" class="vue-section-summary" v-html="section.summary"></div>
                </div>

                <!-- Activities Header -->
                <div v-if="hasActivities" class="vue-activities-header">
                    <div class="vue-activities-count">
                        <i class="fa fa-layer-group"></i>
                        {{ section.activities.length }} {{ section.activities.length === 1 ? 'Activity' : 'Activities' }}
                    </div>
                    <div class="vue-scroll-hint">
                        <span>Scroll to explore</span>
                        <i class="fa fa-arrow-right"></i>
                    </div>
                </div>

                <!-- Activities - Horizontal Scrollable with Navigation -->
                <div v-if="hasActivities" class="vue-activities-wrapper">
                    <!-- Left Arrow -->
                    <button class="vue-scroll-nav left" @click="scrollLeft" v-show="canScrollLeft">
                        <i class="fa fa-chevron-left"></i>
                    </button>

                    <!-- Activities Container -->
                    <div class="vue-activities-container" ref="activitiesContainer" @scroll="checkScroll">
                        <div
                            v-for="activity in section.activities"
                            :key="activity.id"
                            :id="'module-' + activity.id"
                            class="vue-activity-card"
                            :class="getActivityTypeClass(activity.modname)"
                            @click="navigateToActivity(activity.url)"
                        >
                        <div class="vue-activity-header">
                            <div class="vue-activity-icon">
                                <img :src="activity.icon" :alt="activity.modname">
                            </div>
                            <div class="vue-activity-content">
                                <h3 class="vue-activity-name">{{ activity.name }}</h3>
                                <p class="vue-activity-type">{{ activity.modplural }}</p>
                            </div>
                        </div>

                        <div v-if="activity.description" class="vue-activity-description" v-html="activity.description"></div>

                        <div class="vue-activity-footer">
                            <span
                                class="vue-completion-badge"
                                :class="isCompleted(activity.completion) ? 'vue-completion-completed' : 'vue-completion-incomplete'"
                            >
                                <i class="fa" :class="getCompletionIcon(activity.completion)"></i>
                                {{ getCompletionText(activity.completion) }}
                            </span>

                            <a
                                v-if="activity.url"
                                :href="activity.url"
                                class="vue-activity-button"
                                @click.stop
                            >
                                View Activity
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    </div>

                    <!-- Right Arrow -->
                    <button class="vue-scroll-nav right" @click="scrollRight" v-show="canScrollRight">
                        <i class="fa fa-chevron-right"></i>
                    </button>
                </div>

                <!-- Empty State -->
                <div v-else class="vue-empty-state">
                    <i class="fa fa-inbox"></i>
                    <h3>No Activities Yet</h3>
                    <p>This section doesn't have any activities at the moment.</p>
                </div>
            </template>
        </div>
    `
}).mount('#vue-section-app');
</script>

<?php
echo $OUTPUT->footer();
?>
