<?php
/*
@edooRef: @block_edoo/block.php
*/

defined('MOODLE_INTERNAL') || die();

// print_object($this);
$edooBlockType = $this->instance->blockname;

$edooCollectionFullwidthTop =  array(
    "edoo_banner_slider",
    "edoo_features_area",
    "edoo_about_area",
    "edoo_course_filter",
    "edoo_about_two",
    "edoo_about_three",
    "edoo_video",
    "edoo_partners",
    "edoo_feedback",
    "edoo_blog_area",
    "edoo_cta_area",
    "edoo_banner_two",
    "edoo_partners_two",
    "edoo_about_four",
    "edoo_course_filter_two",
    "edoo_html",
    "edoo_blog_two",
    "edoo_partners_three",
    "edoo_course_filter_three",
    "edoo_video_two",
    "edoo_about_five",
    "edoo_pricing",
);

$edooCollectionAboveContent =  array(
    "edoo_contact_form",
    "edoo_course_desc",
);

$edooCollectionBelowContent =  array(
    "edoo_course_rating",
    "edoo_more_courses",
    "edoo_course_instructor",
);

$edooCollection = array_merge($edooCollectionFullwidthTop, $edooCollectionAboveContent, $edooCollectionBelowContent);

if (empty($this->config)) {
    if(in_array($edooBlockType, $edooCollectionFullwidthTop)) {
        $this->instance->defaultregion = 'fullwidth-top';
        $this->instance->region = 'fullwidth-top';
        $DB->update_record('block_instances', $this->instance);
    }
    if(in_array($edooBlockType, $edooCollectionAboveContent)) {
        $this->instance->defaultregion = 'above-content';
        $this->instance->region = 'above-content';
        $DB->update_record('block_instances', $this->instance);
    }
    if(in_array($edooBlockType, $edooCollectionBelowContent)) {
        $this->instance->defaultregion = 'below-content';
        $this->instance->region = 'below-content';
        $DB->update_record('block_instances', $this->instance);
    }
}
