<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.

/**
 * Bheem Custom Profile Page - Uses only Bheem Header and Footer
 *
 * Direct link: https://dev.bheem.cloud/bheem-profile.php
 *
 * @package    theme_bheemtheme
 * @copyright  2025 Bheem Academy
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . '/config.php');
require_once($CFG->dirroot . '/my/lib.php');
require_once($CFG->dirroot . '/user/profile/lib.php');
require_once($CFG->dirroot . '/user/lib.php');
require_once($CFG->libdir.'/filelib.php');

$userid         = optional_param('id', 0, PARAM_INT);
$edit           = optional_param('edit', null, PARAM_BOOL);    // Turn editing on and off.
$reset          = optional_param('reset', null, PARAM_BOOL);

// Even if the user didn't supply a userid, we treat page URL as if they did; this is needed so navigation works correctly.
$userid = $userid ?: $USER->id;
$PAGE->set_url('/bheem-profile.php', ['id' => $userid]);

if (!empty($CFG->forceloginforprofiles)) {
    require_login();
    if (isguestuser()) {
        $PAGE->set_context(context_system::instance());
        redirect(get_login_url());
    }
} else if (!empty($CFG->forcelogin)) {
    require_login();
}

if ((!$user = $DB->get_record('user', array('id' => $userid))) || ($user->deleted)) {
    $PAGE->set_context(context_system::instance());
    echo "User not found or deleted.";
    die;
}

$currentuser = ($user->id == $USER->id);
$context = $usercontext = context_user::instance($userid, MUST_EXIST);

if (!user_can_view_profile($user, null, $context)) {
    echo "You cannot view this profile.";
    exit;
}

// Get the profile page
if (!$currentpage = my_get_page($userid, MY_PAGE_PUBLIC)) {
    throw new \moodle_exception('mymoodlesetup');
}

$PAGE->set_context($context);
$PAGE->set_pagelayout('mypublic');
$PAGE->add_body_class('limitedwidth');
$PAGE->set_pagetype('user-profile');

// Set up block editing capabilities
if (isguestuser()) {
    $USER->editing = $edit = 0;
    $PAGE->set_blocks_editing_capability('moodle/my:configsyspages');
} else {
    if ($currentuser) {
        $PAGE->set_blocks_editing_capability('moodle/user:manageownblocks');
    } else {
        $PAGE->set_blocks_editing_capability('moodle/user:manageblocks');
    }
}

// Start setting up the page
$strpublicprofile = get_string('publicprofile');

$PAGE->blocks->add_region('content');
$PAGE->set_subpage($currentpage->id);
$PAGE->set_title(fullname($user).": $strpublicprofile");
$PAGE->set_heading(fullname($user));

if (!$currentuser) {
    $PAGE->navigation->extend_for_user($user);
    if ($node = $PAGE->settingsnav->get('userviewingsettings'.$user->id)) {
        $node->forceopen = true;
    }
} else if ($node = $PAGE->settingsnav->get('dashboard', navigation_node::TYPE_CONTAINER)) {
    $node->forceopen = true;
}
if ($node = $PAGE->settingsnav->get('root')) {
    $node->forceopen = false;
}


// Toggle the editing state and switches
if ($PAGE->user_allowed_editing()) {
    if ($reset !== null) {
        if (!is_null($userid)) {
            if (!$currentpage = my_reset_page($userid, MY_PAGE_PUBLIC, 'user-profile')) {
                throw new \moodle_exception('reseterror', 'my');
            }
            redirect(new moodle_url('/bheem-profile.php', array('id' => $userid)));
        }
    } else if ($edit !== null) {
        $USER->editing = $edit;
    } else {
        if ($currentpage->userid) {
            if (!empty($USER->editing)) {
                $edit = 1;
            } else {
                $edit = 0;
            }
        } else {
            if (!$currentpage = my_copy_page($userid, MY_PAGE_PUBLIC, 'user-profile')) {
                throw new \moodle_exception('mymoodlesetup');
            }
            $PAGE->set_context($usercontext);
            $PAGE->set_subpage($currentpage->id);
            $USER->editing = $edit = 0;
        }
    }

    // Add button for editing page
    $params = array('edit' => !$edit, 'id' => $userid);

    $resetbutton = '';
    $resetstring = get_string('resetpage', 'my');
    $reseturl = new moodle_url("$CFG->wwwroot/bheem-profile.php", array('edit' => 1, 'reset' => 1, 'id' => $userid));

    if (!$currentpage->userid) {
        $editstring = get_string('updatemymoodleon');
        $params['edit'] = 1;
    } else if (empty($edit)) {
        $editstring = get_string('updatemymoodleon');
        $resetbutton = $OUTPUT->single_button($reseturl, $resetstring);
    } else {
        $editstring = get_string('updatemymoodleoff');
        $resetbutton = $OUTPUT->single_button($reseturl, $resetstring);
    }

    $url = new moodle_url("$CFG->wwwroot/bheem-profile.php", $params);
    $button = '';
    if (!$PAGE->theme->haseditswitch) {
        $button = $OUTPUT->single_button($url, $editstring);
    }
    $PAGE->set_button($resetbutton . $button);

} else {
    $USER->editing = $edit = 0;
}

// Trigger a user profile viewed event
profile_view($user, $usercontext);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo fullname($user) . ': ' . $strpublicprofile; ?> - Bheem Academy</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Prevent Moodle JavaScript conflicts */
        #page { display: none !important; }
        #page-wrapper { display: none !important; }

        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: #f8f9fa;
            color: #1f2937;
        }

        /* User Profile Container */
        .bheem-profile-container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        /* User Description Section */
        .user-description {
            background: linear-gradient(135deg, #8b5cf6 0%, #a855f7 100%);
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 30px;
            color: white;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(139, 92, 246, 0.3);
        }

        .user-description::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
            animation: profilePulse 8s ease-in-out infinite;
        }

        @keyframes profilePulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        .user-description > * {
            position: relative;
            z-index: 1;
        }

        /* Profile Tree Sections */
        .profile-tree {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 24px;
            margin-top: 30px;
        }

        .profile-tree section {
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            border: 1px solid #e5e7eb;
        }

        .profile-tree .node_category {
            margin-bottom: 30px;
        }

        .profile-tree .node_category:last-child {
            margin-bottom: 0;
        }

        /* Section Headers */
        .profile-tree h3.lead {
            font-size: 20px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #8b5cf6;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile-tree h3.lead::before {
            content: '\f007';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            color: #8b5cf6;
        }

        /* Profile Fields */
        .profile-tree .contentnode {
            padding: 12px 0;
            border-bottom: 1px solid #f3f4f6;
        }

        .profile-tree .contentnode:last-child {
            border-bottom: none;
        }

        .profile-tree dt {
            font-weight: 600;
            color: #4b5563;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .profile-tree dd {
            color: #6b7280;
            margin-left: 0;
            margin-bottom: 0;
            font-size: 15px;
        }

        /* User Picture in Profile */
        .userpicture {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid rgba(255, 255, 255, 0.3);
            object-fit: cover;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }

        /* Links in Profile */
        .profile-tree a {
            color: #8b5cf6;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .profile-tree a:hover {
            color: #7c3aed;
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .profile-tree {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .bheem-profile-container {
                padding: 0 15px;
            }

            .user-description {
                padding: 30px 20px;
            }

            .profile-tree section {
                padding: 20px;
            }

            .profile-tree h3.lead {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>

<?php
// Include Bheem Header (same as homepage)
require($CFG->dirroot . '/theme/bheem/layout/static-header.php');
?>

<div class="bheem-profile-container">
    <?php
    $hiddenfields = [];
    if (!has_capability('moodle/user:viewhiddendetails', $usercontext)) {
        $hiddenfields = array_flip(explode(',', $CFG->hiddenuserfields));
    }

    if ($user->description && !isset($hiddenfields['description'])) {
        echo '<div class="user-description">';
        if (!empty($CFG->profilesforenrolledusersonly) && !$currentuser &&
            !$DB->record_exists('role_assignments', array('userid' => $user->id))) {
            echo get_string('profilenotshown', 'moodle');
        } else {
            $user->description = file_rewrite_pluginfile_urls($user->description, 'pluginfile.php', $usercontext->id, 'user',
                                                              'profile', null);
            echo format_text($user->description, $user->descriptionformat);
        }
        echo '</div>';
    }

    // Render profile tree
    $renderer = $PAGE->get_renderer('core_user', 'myprofile');
    $tree = core_user\output\myprofile\manager::build_tree($user, $currentuser);
    echo '<div class="profile-tree">';
    echo $renderer->render($tree);
    echo '</div>';
    ?>
</div>

<?php
// Include Bheem Footer (same as homepage)
require($CFG->dirroot . '/../moodle_data/bheem-components/footer/footer.php');
?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
