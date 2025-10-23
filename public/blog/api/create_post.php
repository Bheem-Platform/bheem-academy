<?php
// Blog Post Creation API Endpoint
require_once(__DIR__ . '/../../config.php');
require_once($CFG->dirroot . '/blog/lib.php');

// Check if blogs are enabled
if (empty($CFG->enableblogs)) {
    http_response_code(403);
    echo json_encode(['success' => false, 'error' => 'Blogs are disabled']);
    exit;
}

// Require login
require_login();

// Check if user is logged in and not guest
if (!isloggedin() || isguestuser()) {
    http_response_code(401);
    echo json_encode(['success' => false, 'error' => 'You must be logged in to create blog posts']);
    exit;
}

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Only POST method is allowed']);
    exit;
}

try {
    global $USER, $DB;

    // Get form data
    $subject = required_param('subject', PARAM_TEXT);
    $summary = optional_param('summary', '', PARAM_TEXT);
    $content = required_param('content', PARAM_RAW);
    $publishstate = optional_param('publishstate', 'site', PARAM_ALPHA);
    $tags = optional_param('tags', '', PARAM_TEXT);

    // Validate required fields
    if (empty($subject) || empty($content)) {
        throw new Exception('Subject and content are required');
    }

    // Validate publish state
    if (!in_array($publishstate, ['draft', 'site', 'public'])) {
        $publishstate = 'site';
    }

    // Create blog entry object
    $entry = new stdClass();
    $entry->userid = $USER->id;
    $entry->subject = $subject;
    $entry->summary = !empty($summary) ? $summary : substr(strip_tags($content), 0, 200);
    $entry->content = $content;
    $entry->format = FORMAT_HTML;
    $entry->attachment = null;
    $entry->publishstate = $publishstate;
    $entry->created = time();
    $entry->lastmodified = time();
    $entry->coursemoduleid = 0;
    $entry->courseid = 0;
    $entry->groupid = 0;
    $entry->module = 'blog';
    $entry->uniquehash = null;

    // Insert the blog entry
    $entry->id = $DB->insert_record('post', $entry);

    // Handle file attachment if present
    if (!empty($_FILES['attachment']) && $_FILES['attachment']['error'] == UPLOAD_ERR_OK) {
        $context = context_user::instance($USER->id);

        $file_info = array(
            'contextid' => $context->id,
            'component' => 'blog',
            'filearea' => 'attachment',
            'itemid' => $entry->id,
            'filepath' => '/',
            'filename' => $_FILES['attachment']['name']
        );

        $fs = get_file_storage();

        // Delete any existing files
        $fs->delete_area_files($context->id, 'blog', 'attachment', $entry->id);

        // Save the new file
        $file = $fs->create_file_from_pathname($file_info, $_FILES['attachment']['tmp_name']);

        if ($file) {
            $entry->attachment = '1';
            $DB->update_record('post', $entry);
        }
    }

    // Handle tags
    if (!empty($tags)) {
        require_once($CFG->dirroot . '/tag/lib.php');

        $tagsArray = array_map('trim', explode(',', $tags));
        $tagsArray = array_filter($tagsArray); // Remove empty values

        if (!empty($tagsArray)) {
            core_tag_tag::set_item_tags('core', 'post', $entry->id,
                context_user::instance($USER->id), $tagsArray);
        }
    }

    // Log the event
    $event = \core\event\blog_entry_created::create(array(
        'objectid' => $entry->id,
        'context' => context_user::instance($USER->id),
        'other' => array('subject' => $subject)
    ));
    $event->trigger();

    // Return success response
    echo json_encode([
        'success' => true,
        'message' => 'Blog post created successfully',
        'postid' => $entry->id,
        'data' => [
            'id' => $entry->id,
            'subject' => $entry->subject,
            'summary' => $entry->summary,
            'created' => $entry->created,
            'publishstate' => $entry->publishstate
        ]
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
