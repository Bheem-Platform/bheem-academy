<?php
// Moodle course library compatibility stub
defined('MOODLE_INTERNAL') || define('MOODLE_INTERNAL', true);

// Course format functions
function course_get_format($course) {
    $format = new stdClass();
    $format->name = 'topics';
    return $format;
}

function get_course($courseid) {
    global $DB;
    return $DB->get_record('course', ['id' => $courseid]);
}

// Course section functions
function get_all_sections($courseid) {
    global $DB;
    return $DB->get_records('course_sections', ['course' => $courseid], 'section ASC');
}

// Course module functions
function get_coursemodule_from_id($modulename, $cmid, $courseid = 0, $userid = 0) {
    global $DB;
    $cm = $DB->get_record('course_modules', ['id' => $cmid]);
    return $cm;
}

function get_coursemodule_from_instance($modulename, $instance, $courseid = 0) {
    global $DB;
    $cm = $DB->get_record('course_modules', ['instance' => $instance, 'course' => $courseid]);
    return $cm;
}

// Course enrollment functions
function enrol_get_course_users($courseid) {
    return [];
}

// Course visibility
function course_get_tagged_courses($tagid, $exclusivemode = false, $fromctx = 0, $ctx = 0, $rec = 1, $page = 0) {
    return [];
}
