<?php
defined('MOODLE_INTERNAL') || die();

$edoo_globalsearch_navbar = '';

$placeholder      = get_config('theme_bheem', 'search_placeholder');

if (\core_search\manager::is_global_search_enabled() === false) {
    $placeholder = get_string('globalsearchdisabled', 'search');
}

$url = new moodle_url('/search/index.php');

$edoo_globalsearch_navbar .= html_writer::start_tag('form', array('class' => 'src-form position-relative','action' => $url->out()));
$edoo_globalsearch_navbar .= html_writer::start_tag('fieldset');

// Input.
$inputoptions = array('name' => 'q', 'class' => 'form-control', 'placeholder' => $placeholder, 'type' => 'text',);
$edoo_globalsearch_navbar .= html_writer::empty_tag('input', $inputoptions);

// Context id.
if ($this->page->context && $this->page->context->contextlevel !== CONTEXT_SYSTEM) {
    $edoo_globalsearch_navbar .= html_writer::empty_tag('input', ['type' => 'hidden', 'name' => 'context', 'value' => $this->page->context->id]);
}

// Search button.
$edoo_globalsearch_navbar .= '<button type="submit" class="src-btn position-absolute top-50 end-0 translate-middle-y border-0 bg-transparent"><i class="ri-search-line"></i></button>';
$edoo_globalsearch_navbar .= html_writer::end_tag('fieldset');
$edoo_globalsearch_navbar .= html_writer::end_tag('form');