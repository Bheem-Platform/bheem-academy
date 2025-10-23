<?php
/*
@edooRef: @
*/

defined('MOODLE_INTERNAL') || die();
include_once($CFG->dirroot . '/course/lib.php');

class edooPageHandler {
  public function edooGetPageTitle() {
    global $PAGE, $COURSE, $DB, $CFG;

    $edooReturn = $PAGE->heading;

    if(
      $DB->record_exists('course', array('id' => $COURSE->id))
      && $COURSE->format == 'site'
      && $PAGE->cm
      && $PAGE->cm->name !== NULL
    ){
      $edooReturn = $PAGE->cm->name;
    } elseif($PAGE->pagetype == 'blog-index') {
      $edooReturn = get_string("blog", "blog");
    }

    return $edooReturn;
  }
}
