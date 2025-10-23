<?php
defined('MOODLE_INTERNAL') || die();
echo $OUTPUT->doctype();

// Include the professional Vue navbar header
ob_start();
if (file_exists($CFG->dirroot . '/theme/bheem/layout/static-header.php')) {
    require($CFG->dirroot . '/theme/bheem/layout/static-header.php');
}
$professional_header = ob_get_clean();

include($CFG->dirroot . '/theme/bheem/inc/bheem_themehandler.php');

$bodyattributes = $OUTPUT->body_attributes();
include($CFG->dirroot . '/theme/bheem/inc/bheem_themehandler_context.php');

// Output the professional Vue navbar header first
echo $professional_header;

echo $OUTPUT->render_from_template('theme_bheem/edoo_dashboard', $templatecontext);