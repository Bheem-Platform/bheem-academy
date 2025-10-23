<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.

/**
 * Vue.js Course View Page - Junior AI Basics
 * Modern course interface with Vue.js while maintaining Moodle database integration
 *
 * @package    core
 * @copyright  2024 Bheem Academy
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require('../config.php');

// Get course ID from parameter
$courseid = required_param('id', PARAM_INT);

// Get course and context
$course = $DB->get_record('course', array('id' => $courseid), '*', MUST_EXIST);
$context = context_course::instance($course->id);

// Require login and enrollment
require_login($course);

// Check if user is enrolled or has capability to view
require_capability('moodle/course:view', $context);

// Set page context
$PAGE->set_url(new moodle_url('/course-vue/vue-course.php', array('id' => $courseid)));
$PAGE->set_context($context);
$PAGE->set_course($course);
$PAGE->set_pagelayout('course');

// Get course format
$courseformat = course_get_format($course);
$modinfo = get_fast_modinfo($course);

// Prepare course data for Vue
$coursedata = [
    'id' => $course->id,
    'fullname' => $course->fullname,
    'shortname' => $course->shortname,
    'summary' => $course->summary,
    'format' => $course->format
];

// Get all sections
$sections = [];
foreach ($modinfo->get_section_info_all() as $section) {
    if (!$section->uservisible) {
        continue;
    }

    $sectiondata = [
        'id' => $section->id,
        'section' => $section->section,
        'name' => $courseformat->get_section_name($section),
        'summary' => $section->summary,
        'visible' => $section->visible,
        'activities' => []
    ];

    // Get activities in this section
    if (!empty($modinfo->sections[$section->section])) {
        foreach ($modinfo->sections[$section->section] as $cmid) {
            $cm = $modinfo->cms[$cmid];
            if (!$cm->uservisible) {
                continue;
            }

            $activitydata = [
                'id' => $cm->id,
                'name' => $cm->name,
                'modname' => $cm->modname,
                'url' => $cm->url ? $cm->url->out(false) : '',
                'visible' => $cm->visible
            ];

            $sectiondata['activities'][] = $activitydata;
        }
    }

    $sections[] = $sectiondata;
}

// Encode data as JSON for Vue
$vuecoursedata = json_encode($coursedata);
$vuesections = json_encode($sections);

// Output the Vue app HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo format_string($course->fullname); ?> | Bheem Academy</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo $CFG->wwwroot; ?>/pluginfile.php?file=%2F1%2Ftheme_bheem%2Ffavicon%2F-1%2Ffavi.png">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Vue App CSS -->
  <link rel="stylesheet" crossorigin href="<?php echo $CFG->wwwroot; ?>/course-vue/assets/index-DtI9ULN4.css">
</head>
<body id="page-course-view" class="format-topics path-course dir-ltr lang-en pagelayout-course course-<?php echo $courseid; ?>">
  <div id="app"></div>

  <!-- Course Data for Vue -->
  <script>
    window.MOODLE_COURSE_DATA = <?php echo $vuecoursedata; ?>;
    window.MOODLE_COURSE_SECTIONS = <?php echo $vuesections; ?>;
    window.MOODLE_WWW_ROOT = '<?php echo $CFG->wwwroot; ?>';
  </script>

  <!-- Vue App JS -->
  <script type="module" crossorigin src="<?php echo $CFG->wwwroot; ?>/course-vue/assets/index-DWg8OlEM.js"></script>
  <script type="module" crossorigin src="<?php echo $CFG->wwwroot; ?>/course-vue/assets/vue-CIm-9v3p.js"></script>
</body>
</html>
