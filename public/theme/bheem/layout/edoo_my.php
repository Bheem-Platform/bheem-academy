<?php
defined('MOODLE_INTERNAL') || die();

// Include the professional Vue navbar header
ob_start();
if (file_exists($CFG->dirroot . '/theme/bheem/layout/static-header.php')) {
    require($CFG->dirroot . '/theme/bheem/layout/static-header.php');
}
$professional_header = ob_get_clean();

include($CFG->dirroot . '/theme/bheem/inc/bheem_themehandler.php');

require_once($CFG->libdir . '/behat/lib.php');

array_push($extraclasses, "bheem_context_frontend");
$bodyclasses = implode(" ",$extraclasses);
$bodyattributes = $OUTPUT->body_attributes($bodyclasses);
$blockshtml = $OUTPUT->blocks('side-pre');
$hasblocks = strpos($blockshtml, 'data-block=') !== false;

include($CFG->dirroot . '/theme/bheem/inc/bheem_themehandler_context.php');

// Output the professional Vue navbar header first
echo $professional_header;

echo $OUTPUT->render_from_template('theme_bheem/edoo_my', $templatecontext);