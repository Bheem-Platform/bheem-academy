<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Allows you to edit a users profile - Vue.js Version
 *
 * @copyright 1999 Martin Dougiamas  http://dougiamas.com
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @package core_user
 */

require_once('../config.php');
require_once($CFG->libdir.'/gdlib.php');
require_once($CFG->dirroot.'/user/edit_form.php');
require_once($CFG->dirroot.'/user/editlib.php');
require_once($CFG->dirroot.'/user/profile/lib.php');
require_once($CFG->dirroot.'/user/lib.php');

$userid = optional_param('id', $USER->id, PARAM_INT);    // User id.
$course = optional_param('course', SITEID, PARAM_INT);   // Course id (defaults to Site).
$returnto = optional_param('returnto', null, PARAM_ALPHA);  // Code determining where to return to after save.
$cancelemailchange = optional_param('cancelemailchange', 0, PARAM_INT);   // Course id (defaults to Site).

$PAGE->set_url('/user/edit.php', array('course' => $course, 'id' => $userid));

// Set page layout to embedded to remove Moodle blocks
$PAGE->set_pagelayout('embedded');

if (!$course = $DB->get_record('course', array('id' => $course))) {
    throw new \moodle_exception('invalidcourseid');
}

if ($course->id != SITEID) {
    require_login($course);
} else if (!isloggedin()) {
    // Don't allow unauthenticated access - show error message
    $PAGE->set_context(context_system::instance());
    $PAGE->set_url('/user/edit.php', array('course' => $course, 'id' => $userid));
    $PAGE->set_title(get_string('editmyprofile'));
    echo $OUTPUT->header();
    echo $OUTPUT->notification('Username not found or call for support', \core\output\notification::NOTIFY_ERROR);
    echo $OUTPUT->footer();
    die();
} else {
    $PAGE->set_context(context_system::instance());
}

// Guest can not edit.
if (isguestuser()) {
    throw new \moodle_exception('guestnoeditprofile');
}

// The user profile we are editing.
if (!$user = $DB->get_record('user', array('id' => $userid))) {
    throw new \moodle_exception('invaliduserid');
}

// Guest can not be edited.
if (isguestuser($user)) {
    throw new \moodle_exception('guestnoeditprofile');
}

// User interests separated by commas.
$user->interests = core_tag_tag::get_item_tags_array('core', 'user', $user->id);
// Ensure interests is always an array
if (!is_array($user->interests)) {
    $user->interests = !empty($user->interests) ? explode(',', $user->interests) : [];
}

// Remote users cannot be edited. Note we have to perform the strict user_not_fully_set_up() check.
// Otherwise the remote user could end up in endless loop between user/view.php and here.
// Required custom fields are not supported in MNet environment anyway.
if (is_mnet_remote_user($user)) {
    if (user_not_fully_set_up($user, true)) {
        $hostwwwroot = $DB->get_field('mnet_host', 'wwwroot', array('id' => $user->mnethostid));
        throw new \moodle_exception('usernotfullysetup', 'mnet', '', $hostwwwroot);
    }
    redirect($CFG->wwwroot . "/user/view.php?course={$course->id}");
}

// Load the appropriate auth plugin.
$userauth = get_auth_plugin($user->auth);

if (!$userauth->can_edit_profile()) {
    throw new \moodle_exception('noprofileedit', 'auth');
}

if ($editurl = $userauth->edit_profile_url()) {
    // This internal script not used.
    redirect($editurl);
}

if ($course->id == SITEID) {
    $coursecontext = context_system::instance();   // SYSTEM context.
} else {
    $coursecontext = context_course::instance($course->id);   // Course context.
}
$systemcontext   = context_system::instance();
$personalcontext = context_user::instance($user->id);

// Check access control.
if ($user->id == $USER->id) {
    // Editing own profile - require_login() MUST NOT be used here, it would result in infinite loop!
    if (!has_capability('moodle/user:editownprofile', $systemcontext)) {
        throw new \moodle_exception('cannotedityourprofile');
    }

} else {
    // Teachers, parents, etc.
    require_capability('moodle/user:editprofile', $personalcontext);
    // No editing of guest user account.
    if (isguestuser($user->id)) {
        throw new \moodle_exception('guestnoeditprofileother');
    }
    // No editing of primary admin!
    if (is_siteadmin($user) and !is_siteadmin($USER)) {  // Only admins may edit other admins.
        throw new \moodle_exception('useradmineditadmin');
    }
}

if ($user->deleted) {
    echo $OUTPUT->header();
    echo $OUTPUT->heading(get_string('userdeleted'));
    echo $OUTPUT->footer();
    die;
}

$PAGE->add_body_class('limitedwidth');
$PAGE->set_context($personalcontext);
if ($USER->id != $user->id) {
    $PAGE->navigation->extend_for_user($user);
} else {
    if ($node = $PAGE->navigation->find('myprofile', navigation_node::TYPE_ROOTNODE)) {
        $node->force_open();
    }
}

// Process email change cancellation.
if ($cancelemailchange) {
    cancel_email_update($user->id);
}

// Load user preferences.
useredit_load_preferences($user);

// Load custom profile fields data.
profile_load_data($user);

// Ensure interests is always an array after profile_load_data
if (isset($user->interests) && !is_array($user->interests)) {
    $user->interests = !empty($user->interests) ? explode(',', $user->interests) : [];
}


// Prepare the editor and create form.
$editoroptions = array(
    'maxfiles'   => EDITOR_UNLIMITED_FILES,
    'maxbytes'   => $CFG->maxbytes,
    'trusttext'  => false,
    'forcehttps' => false,
    'context'    => $personalcontext
);

$user = file_prepare_standard_editor($user, 'description', $editoroptions, $personalcontext, 'user', 'profile', 0);
// Prepare filemanager draft area.
$draftitemid = 0;
$filemanagercontext = $editoroptions['context'];
$filemanageroptions = array('maxbytes'       => $CFG->maxbytes,
                             'subdirs'        => 0,
                             'maxfiles'       => 1,
                             'accepted_types' => 'optimised_image');
file_prepare_draft_area($draftitemid, $filemanagercontext->id, 'user', 'newicon', 0, $filemanageroptions);
$user->imagefile = $draftitemid;

// Final check: ensure interests is an array before passing to form
if (isset($user->interests) && !is_array($user->interests)) {
    $user->interests = !empty($user->interests) ? (is_string($user->interests) ? explode(',', trim($user->interests)) : []) : [];
}

// Create form.
$userform = new user_edit_form(new moodle_url($PAGE->url, array('returnto' => $returnto)), array(
    'editoroptions' => $editoroptions,
    'filemanageroptions' => $filemanageroptions,
    'user' => $user));

$emailchanged = false;

// Deciding where to send the user back in most cases.
if ($returnto === 'profile') {
    if ($course->id != SITEID) {
        $returnurl = new moodle_url('/user/view.php', array('id' => $user->id, 'course' => $course->id));
    } else {
        $returnurl = new moodle_url('/user/profile.php', array('id' => $user->id));
    }
} else {
    $returnurl = new moodle_url('/user/preferences.php', array('userid' => $user->id));
}

if ($userform->is_cancelled()) {
    redirect($returnurl);
} else if ($usernew = $userform->get_data()) {

    $emailchangedhtml = '';

    if ($CFG->emailchangeconfirmation) {
        // Users with 'moodle/user:update' can change their email address immediately.
        // Other users require a confirmation email.
        if (isset($usernew->email) and $user->email != $usernew->email && !has_capability('moodle/user:update', $systemcontext)) {
            $a = new stdClass();
            // Set the key to expire in 10 minutes.
            $validuntil = time() + 600;
            $emailchangedkey = create_user_key('core_user/email_change', $user->id, null, null, $validuntil);

            set_user_preference('newemail', $usernew->email, $user->id);
            set_user_preference('newemailattemptsleft', 3, $user->id);

            $a->newemail = $emailchanged = $usernew->email;
            $a->oldemail = $usernew->email = $user->email;

            $emailchangedhtml = $OUTPUT->box(get_string('auth_changingemailaddress', 'auth', $a), 'generalbox', 'notice');
            $emailchangedhtml .= $OUTPUT->continue_button($returnurl);
        }
    }

    $authplugin = get_auth_plugin($user->auth);

    $usernew->timemodified = time();

    // Description editor element may not exist!
    if (isset($usernew->description_editor) && isset($usernew->description_editor['format'])) {
        $usernew = file_postupdate_standard_editor($usernew, 'description', $editoroptions, $personalcontext, 'user', 'profile', 0);
    }

    // Pass a true old $user here.
    if (!$authplugin->user_update($user, $usernew)) {
        // Auth update failed.
        throw new \moodle_exception('cannotupdateprofile');
    }

    // Update user with new profile data.
    user_update_user($usernew, false, false);

    // Update preferences.
    useredit_update_user_preference($usernew);

    // Update interests.
    if (isset($usernew->interests)) {
        useredit_update_interests($usernew, $usernew->interests);
    }

    // Update user picture.
    if (empty($CFG->disableuserimages)) {
        core_user::update_picture($usernew, $filemanageroptions);
    }

    // Update mail bounces.
    useredit_update_bounces($user, $usernew);

    // Update forum track preference.
    useredit_update_trackforums($user, $usernew);

    // Save custom profile fields data.
    profile_save_data($usernew);

    // Trigger event.
    \core\event\user_updated::create_from_userid($user->id)->trigger();

    // If email was changed and confirmation is required, send confirmation email now to the new address.
    if ($emailchanged !== false && $CFG->emailchangeconfirmation) {
        $tempuser = $DB->get_record('user', array('id' => $user->id), '*', MUST_EXIST);
        $tempuser->email = $emailchanged;

        $a = new stdClass();
        $a->url = $CFG->wwwroot . '/user/emailupdate.php?key=' . $emailchangedkey . '&id=' . $user->id;
        $a->site = format_string($SITE->fullname, true, array('context' => context_course::instance(SITEID)));

        $placeholders = \core_user::get_name_placeholders($user);
        foreach ($placeholders as $field => $value) {
            $a->{$field} = $value;
        }

        $a->supportemail = $OUTPUT->supportemail();

        $emailupdatemessage = get_string('emailupdatemessage', 'auth', $a);
        $emailupdatetitle = get_string('emailupdatetitle', 'auth', $a);

        // Email confirmation directly rather than using messaging so they will definitely get an email.
        $noreplyuser = core_user::get_noreply_user();
        if (!$mailresults = email_to_user($tempuser, $noreplyuser, $emailupdatetitle, $emailupdatemessage)) {
            die("could not send email!");
        }
    }

    // Reload from db, we need new full name on this page if we do not redirect.
    $user = $DB->get_record('user', array('id' => $user->id), '*', MUST_EXIST);

    if ($USER->id == $user->id) {
        // Override old $USER session variable if needed.
        foreach ((array)$user as $variable => $value) {
            if ($variable === 'description' or $variable === 'password') {
                // These are not set for security nad perf reasons.
                continue;
            }
            $USER->$variable = $value;
        }
        // Preload custom fields.
        profile_load_custom_fields($USER);
    }

    if (is_siteadmin() and empty($SITE->shortname)) {
        // Fresh cli install - we need to finish site settings.
        redirect(new moodle_url('/admin/index.php'));
    }

    if (!$emailchanged || !$CFG->emailchangeconfirmation) {
        redirect($returnurl, get_string('changessaved'), null, \core\output\notification::NOTIFY_SUCCESS);
    }
}

// Prepare data for Vue.js
$countries = get_string_manager()->get_list_of_countries();
$timezones = core_date::get_list_of_timezones($user->timezone, true);

// Ensure interests is an array for Vue.js
if (isset($user->interests) && !is_array($user->interests)) {
    $user->interests = !empty($user->interests) ? (is_string($user->interests) ? explode(',', trim($user->interests)) : []) : [];
} else if (!isset($user->interests)) {
    $user->interests = [];
}

// Get user picture URL
$userpictureurl = '';
$context = context_user::instance($user->id, MUST_EXIST);
$fs = get_file_storage();
$hasuploadedpicture = ($fs->file_exists($context->id, 'user', 'icon', 0, '/', 'f2.png') || $fs->file_exists($context->id, 'user', 'icon', 0, '/', 'f2.jpg'));
if (!empty($user->picture) && $hasuploadedpicture) {
    $userpictureurl = new moodle_url('/user/pix.php/' . $user->id . '/f1.jpg');
    $userpictureurl = $userpictureurl->out(false);
}

// Get custom profile fields
$customfields = array();
$categories = profile_get_user_fields_with_data($user->id);
foreach ($categories as $categoryid => $fields) {
    foreach ($fields as $field) {
        $customfields[] = array(
            'name' => $field->field->shortname,
            'label' => $field->field->name,
            'type' => $field->field->datatype,
            'value' => $field->data,
            'required' => $field->field->required
        );
    }
}

// Get sesskey for form submission
$sesskey = sesskey();

// Prepare page title
$streditmyprofile = get_string('editmyprofile');
$userfullname     = fullname($user, true);

// Render the Moodle form (we'll hide it with CSS)
ob_start();
$userform->display();
$moodleform_html = ob_get_clean();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <meta name="theme-color" content="#3b82f6">
    <title><?php echo $streditmyprofile; ?> - <?php echo $userfullname; ?> | Bheem Academy</title>
    <link rel="shortcut icon" href="<?php echo $CFG->wwwroot; ?>/theme/image.php/boost/theme/1/favicon" />

    <!-- Vue.js 3 -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Header Styles -->
    <link rel="stylesheet" href="<?php echo $CFG->wwwroot; ?>/includes/bheem_header_styles.css">

<?php if ($emailchanged): ?>
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e8eef5 50%, #f0f4f8 100%);
            padding-top: 110px;
        }
        .email-changed-notice {
            max-width: 800px;
            margin: 40px auto;
            padding: 30px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

    <?php include($CFG->dirroot . '/includes/bheem_header.php'); ?>

    <div class="email-changed-notice">
        <?php echo $emailchangedhtml; ?>
    </div>

    <!-- Footer -->
    <?php include($CFG->dirroot . '/includes/bheem_footer.php'); ?>
</body>
</html>
<?php
exit;
endif;
?>

<style>
    /* Hide the Moodle form */
    form.mform {
        display: none !important;
    }
</style>

<?php echo $moodleform_html; ?>

<style>
    /* Hide all Moodle UI elements */
    .navbar, #page-header, .breadcrumb, #region-main-settings-menu, #region-main-box, .block,
    [data-region="drawer"], .drawer, .nav-tabs, #usernavigation, .page-context-header,
    .activity-navigation, #page-footer .tool_dataprivacy, #page-footer .logininfo,
    .pagelayout-embedded #page-header, .pagelayout-embedded .breadcrumb,
    .sr-only, .skiplinks, #page-navbar {
        display: none !important;
    }

    body.pagelayout-embedded {
        background: linear-gradient(135deg, #f5f7fa 0%, #e8eef5 50%, #f0f4f8 100%) !important;
        min-height: 100vh;
    }

    #page-content, #page, #page-wrapper {
        background: transparent !important;
    }

    #region-main {
        background: transparent !important;
        padding: 0 !important;
        margin: 0 !important;
        border: none !important;
        box-shadow: none !important;
    }

    /* Vue.js Profile Edit Styles */
    :root {
        --primary: #3b82f6;
        --primary-dark: #2563eb;
        --secondary: #64748b;
        --success: #10b981;
        --danger: #ef4444;
        --warning: #f59e0b;
        --gray-50: #f9fafb;
        --gray-100: #f3f4f6;
        --gray-200: #e5e7eb;
        --gray-300: #d1d5db;
        --gray-400: #9ca3af;
        --gray-500: #6b7280;
        --gray-600: #4b5563;
        --gray-700: #374151;
        --gray-800: #1f2937;
        --gray-900: #111827;
        --radius: 12px;
        --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    * {
        box-sizing: border-box;
    }

    html, body {
        overflow-x: hidden !important;
        max-width: 100vw;
        width: 100%;
    }

    #editProfileApp {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        max-width: 1200px;
        width: 100%;
        margin: 0 auto;
        padding: 110px 20px 40px;
        overflow-x: hidden;
    }

    @media (max-width: 1024px) {
        #editProfileApp { padding-top: 100px; }
    }
    @media (max-width: 768px) {
        #editProfileApp { padding-top: 95px; }
    }
    @media (max-width: 480px) {
        #editProfileApp { padding-top: 90px; }
    }

    .page-header {
        margin-bottom: 40px;
        text-align: center;
        padding: 30px 20px;
        background: #ffffff;
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-md);
        border: 1px solid var(--gray-200);
        position: relative;
        overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary) 0%, var(--accent) 100%);
    }

    .page-title {
        font-family: 'Poppins', sans-serif;
        font-size: 2.5rem;
        font-weight: 800;
        color: #000000;
        margin: 0 0 12px 0;
        letter-spacing: -0.03em;
        line-height: 1.2;
        background: linear-gradient(135deg, #1f2937 0%, #4b5563 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .page-subtitle {
        font-size: 1.125rem;
        font-weight: 500;
        color: var(--gray-600);
        margin: 0;
        line-height: 1.6;
        letter-spacing: 0.01em;
    }

    @media (max-width: 768px) {
        .page-title {
            font-size: 2rem;
        }
        .page-subtitle {
            font-size: 1rem;
        }
    }

    @media (max-width: 480px) {
        .page-title {
            font-size: 1.75rem;
        }
        .page-subtitle {
            font-size: 0.9375rem;
        }
    }

    .form-container {
        display: grid;
        gap: 24px;
    }

    .form-section {
        background: #ffffff;
        border-radius: var(--radius);
        padding: 28px;
        box-shadow: var(--shadow-md);
        border: 1px solid var(--gray-200);
    }

    .section-title {
        font-family: 'Poppins', sans-serif;
        font-size: 1.25rem;
        font-weight: 600;
        color: #000000;
        margin: 0 0 20px 0;
        padding-bottom: 12px;
        border-bottom: 2px solid var(--gray-200);
    }

    .form-grid {
        display: grid;
        gap: 20px;
    }

    .form-grid-2 {
        grid-template-columns: repeat(2, 1fr);
    }

    @media (max-width: 768px) {
        .form-grid-2 {
            grid-template-columns: 1fr;
        }

        .form-section {
            padding: 20px;
        }

        .form-actions {
            flex-direction: column-reverse;
        }

        .btn {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        #editProfileApp {
            padding: 90px 12px 30px;
        }

        .page-header {
            padding: 20px 16px;
        }

        .form-section {
            padding: 16px;
        }

        .section-title {
            font-size: 1.125rem;
        }

        .btn {
            padding: 14px 20px;
            font-size: 0.9375rem;
        }
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    .form-label {
        font-size: 0.875rem;
        font-weight: 600;
        color: #000000;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .required-mark {
        color: var(--danger);
    }

    .form-input,
    .form-select,
    .form-textarea {
        width: 100%;
        max-width: 100%;
        padding: 10px 14px;
        font-size: 16px; /* Prevents zoom on iOS */
        color: var(--gray-900);
        background: #ffffff;
        border: 1px solid var(--gray-300);
        border-radius: 8px;
        transition: all 0.2s;
        font-family: inherit;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .form-textarea {
        min-height: 120px;
        resize: vertical;
    }

    .profile-picture-section {
        display: grid;
        gap: 20px;
    }

    .current-picture {
        display: flex;
        align-items: center;
        gap: 20px;
        padding: 20px;
        background: var(--gray-50);
        border-radius: 8px;
    }

    .picture-preview {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #ffffff;
        box-shadow: var(--shadow-md);
    }

    .picture-placeholder {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        font-weight: 600;
        color: #ffffff;
        border: 3px solid #ffffff;
        box-shadow: var(--shadow-md);
    }

    .picture-info h4 {
        margin: 0 0 4px 0;
        font-size: 1rem;
        font-weight: 600;
        color: var(--gray-900);
    }

    .picture-info p {
        margin: 0;
        font-size: 0.875rem;
        color: var(--gray-600);
    }

    .file-upload-wrapper {
        position: relative;
    }

    .file-upload-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 18px;
        background: #ffffff;
        color: var(--primary);
        border: 2px solid var(--primary);
        border-radius: 8px;
        font-size: 0.9375rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
    }

    .file-upload-btn:hover {
        background: var(--primary);
        color: #ffffff;
    }

    .file-input-hidden {
        position: absolute;
        width: 1px;
        height: 1px;
        opacity: 0;
        overflow: hidden;
    }

    .checkbox-group {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px;
        background: var(--gray-50);
        border-radius: 8px;
    }

    .checkbox-input {
        width: 18px;
        height: 18px;
        cursor: pointer;
    }

    .checkbox-label {
        font-size: 0.9375rem;
        color: var(--gray-700);
        cursor: pointer;
        margin: 0;
    }

    .interests-input {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        padding: 10px;
        background: #ffffff;
        border: 1px solid var(--gray-300);
        border-radius: 8px;
        min-height: 44px;
    }

    .interest-tag {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 12px;
        background: var(--primary);
        color: #ffffff;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .interest-remove {
        background: none;
        border: none;
        color: #ffffff;
        cursor: pointer;
        padding: 0;
        display: flex;
        align-items: center;
        font-size: 1.125rem;
        line-height: 1;
    }

    .interest-input-field {
        border: none;
        outline: none;
        padding: 6px;
        flex: 1;
        min-width: 150px;
        font-size: 0.9375rem;
    }

    .form-actions {
        display: flex;
        gap: 12px;
        justify-content: flex-end;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 2px solid var(--gray-200);
    }

    .btn {
        padding: 12px 28px;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        transition: all 0.2s;
        font-family: inherit;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-primary {
        background: var(--primary);
        color: #ffffff;
    }

    .btn-primary:hover {
        background: var(--primary-dark);
        transform: translateY(-1px);
        box-shadow: var(--shadow-lg);
    }

    .btn-secondary {
        background: #ffffff;
        color: var(--gray-700);
        border: 2px solid var(--gray-300);
    }

    .btn-secondary:hover {
        background: var(--gray-50);
        border-color: var(--gray-400);
    }

    .form-help-text {
        font-size: 0.8125rem;
        color: var(--gray-600);
        margin-top: 4px;
    }

    .alert {
        padding: 14px 18px;
        border-radius: 8px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .alert-info {
        background: #dbeafe;
        color: #1e40af;
        border: 1px solid #93c5fd;
    }

    .alert-success {
        background: #d1fae5;
        color: #065f46;
        border: 1px solid #6ee7b7;
    }

    .alert-error {
        background: #fee2e2;
        color: #991b1b;
        border: 1px solid #fca5a5;
    }

    .footer {
        margin-top: 40px;
        padding-top: 20px;
        border-top: 1px solid var(--gray-200);
        text-align: center;
        color: var(--gray-600);
        font-size: 0.875rem;
    }

    .loading-spinner {
        display: inline-block;
        width: 18px;
        height: 18px;
        border: 3px solid rgba(255, 255, 255, 0.3);
        border-top-color: #ffffff;
        border-radius: 50%;
        animation: spin 0.6s linear infinite;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    /* Hide ALL Moodle UI elements */
    .block,
    .block-region,
    [class*="block_"],
    #block-region-side-pre,
    #block-region-side-post,
    #region-main,
    .region-main,
    .block_navigation,
    .block_settings,
    aside[data-region],
    .has-blocks,
    #page-content,
    #page-wrapper,
    footer.footer:not(.bheem-footer):not([class*="bheem"]),
    .footer-popover,
    #page-footer:not(.bheem-footer):not([class*="bheem"]),
    .page-context-header,
    .page-header-headings,
    nav.navbar:not(.bheem-header):not([class*="bheem"]),
    .breadcrumb,
    .breadcrumb-nav,
    .navbar-nav {
        display: none !important;
        visibility: hidden !important;
    }

    /* Ensure full width for Vue app */
    #page {
        max-width: 100% !important;
        width: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    /* Clean body styling */
    html, body {
        margin: 0 !important;
        padding: 0 !important;
        width: 100% !important;
        overflow-x: hidden !important;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif !important;
        background: linear-gradient(135deg, #f5f7fa 0%, #e8eef5 50%, #f0f4f8 100%);
        background-attachment: fixed;
        color: var(--gray-900);
        line-height: 1.6;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
</style>
</head>
<body>


<?php include($CFG->dirroot . '/includes/bheem_header.php'); ?>

<div id="editProfileApp">
    <div class="page-header">
        <h1 class="page-title">Edit Profile</h1>
        <p class="page-subtitle">Update your personal information and preferences</p>
    </div>

    <form id="userEditForm" @submit.prevent="submitForm">

        <div class="form-container">
            <!-- General Information -->
            <div class="form-section">
                <h2 class="section-title">General Information</h2>
                <div class="form-grid form-grid-2">
                    <div class="form-group">
                        <label class="form-label">
                            First Name <span class="required-mark">*</span>
                        </label>
                        <input type="text" name="firstname" v-model="formData.firstname" class="form-input" required maxlength="100">
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            Last Name <span class="required-mark">*</span>
                        </label>
                        <input type="text" name="lastname" v-model="formData.lastname" class="form-input" required maxlength="100">
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">
                            Email Address <span class="required-mark">*</span>
                        </label>
                        <input type="email" name="email" v-model="formData.email" class="form-input" required maxlength="100">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email Display</label>
                        <select name="maildisplay" v-model="formData.maildisplay" class="form-select">
                            <option value="0">Hide my email address from everyone</option>
                            <option value="1">Allow everyone to see my email address</option>
                            <option value="2">Allow only course members to see my email address</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">City</label>
                        <input type="text" name="city" v-model="formData.city" class="form-input" maxlength="120">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Country</label>
                        <select name="country" v-model="formData.country" class="form-select">
                            <option value="">Select a country...</option>
                            <?php foreach ($countries as $code => $name): ?>
                            <option value="<?php echo $code; ?>"><?php echo $name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Timezone</label>
                        <select name="timezone" v-model="formData.timezone" class="form-select">
                            <?php foreach ($timezones as $tz => $tzname): ?>
                            <option value="<?php echo $tz; ?>"><?php echo $tzname; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Description</label>
                        <textarea name="description_editor[text]" v-model="formData.description" class="form-textarea" rows="5"></textarea>
                        <input type="hidden" name="description_editor[format]" value="1">
                    </div>
                </div>
            </div>

            <!-- Profile Picture -->
            <?php if (empty($CFG->disableuserimages)): ?>
            <div class="form-section">
                <h2 class="section-title">Profile Picture</h2>
                <div class="profile-picture-section">
                    <div class="current-picture">
                        <?php if ($userpictureurl): ?>
                        <img src="<?php echo $userpictureurl; ?>" alt="Profile Picture" class="picture-preview">
                        <?php else: ?>
                        <div class="picture-placeholder">
                            <?php echo strtoupper(substr($user->firstname, 0, 1)); ?>
                        </div>
                        <?php endif; ?>
                        <div class="picture-info">
                            <h4>Current Picture</h4>
                            <p>Upload a new image to change your profile picture</p>
                        </div>
                    </div>

                    <?php if ($userpictureurl): ?>
                    <div class="checkbox-group">
                        <input type="checkbox" id="deletepicture" name="deletepicture" value="1" class="checkbox-input">
                        <label for="deletepicture" class="checkbox-label">Delete current picture</label>
                    </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label class="form-label">Upload New Picture</label>
                        <div class="file-upload-wrapper">
                            <label class="file-upload-btn">
                                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                Choose File
                            </label>
                            <input type="file" id="imagefile" name="imagefile" accept="image/*" class="file-input-hidden" @change="handleFileUpload">
                        </div>
                        <p class="form-help-text">Maximum file size: <?php echo display_size($CFG->maxbytes); ?></p>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Image Alt Text</label>
                        <input type="text" name="imagealt" v-model="formData.imagealt" class="form-input" maxlength="100">
                        <p class="form-help-text">Describe your profile picture for accessibility</p>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Interests -->
            <?php if (core_tag_tag::is_enabled('core', 'user')): ?>
            <div class="form-section">
                <h2 class="section-title">Interests</h2>
                <div class="form-group">
                    <label class="form-label">Your Interests</label>
                    <div class="interests-input" @click="focusInterestInput">
                        <div v-for="(interest, index) in formData.interests" :key="index" class="interest-tag">
                            {{ interest }}
                            <button type="button" class="interest-remove" @click="removeInterest(index)">&times;</button>
                        </div>
                        <input
                            ref="interestInput"
                            type="text"
                            class="interest-input-field"
                            placeholder="Add interest and press Enter..."
                            @keydown.enter.prevent="addInterest"
                            v-model="newInterest">
                    </div>
                    <input type="hidden" name="interests" :value="formData.interests.join(',')">
                    <p class="form-help-text">Press Enter to add each interest</p>
                </div>
            </div>
            <?php endif; ?>

            <!-- Optional Information -->
            <div class="form-section">
                <h2 class="section-title">Additional Information</h2>
                <div class="form-grid form-grid-2">
                    <div class="form-group">
                        <label class="form-label">ID Number</label>
                        <input type="text" name="idnumber" v-model="formData.idnumber" class="form-input" maxlength="255">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Institution</label>
                        <input type="text" name="institution" v-model="formData.institution" class="form-input" maxlength="255">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Department</label>
                        <input type="text" name="department" v-model="formData.department" class="form-input" maxlength="255">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Phone</label>
                        <input type="tel" name="phone1" v-model="formData.phone1" class="form-input" maxlength="20">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Mobile Phone</label>
                        <input type="tel" name="phone2" v-model="formData.phone2" class="form-input" maxlength="20">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <input type="text" name="address" v-model="formData.address" class="form-input" maxlength="255">
                    </div>
                </div>
            </div>

            <?php if (!empty($customfields)): ?>
            <!-- Custom Profile Fields -->
            <div class="form-section">
                <h2 class="section-title">Custom Fields</h2>
                <div class="form-grid form-grid-2">
                    <?php foreach ($customfields as $field): ?>
                    <div class="form-group <?php echo ($field['type'] === 'textarea') ? 'full-width' : ''; ?>">
                        <label class="form-label">
                            <?php echo $field['label']; ?>
                            <?php if ($field['required']): ?>
                            <span class="required-mark">*</span>
                            <?php endif; ?>
                        </label>
                        <?php if ($field['type'] === 'textarea'): ?>
                        <textarea name="profile_field_<?php echo $field['name']; ?>" class="form-textarea" <?php echo $field['required'] ? 'required' : ''; ?>><?php echo htmlspecialchars($field['value']); ?></textarea>
                        <?php else: ?>
                        <input type="text" name="profile_field_<?php echo $field['name']; ?>" value="<?php echo htmlspecialchars($field['value']); ?>" class="form-input" <?php echo $field['required'] ? 'required' : ''; ?>>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <div class="form-actions">
            <button type="button" class="btn btn-secondary" @click="cancelEdit">
                Cancel
            </button>
            <button type="submit" class="btn btn-primary" :disabled="isSubmitting">
                <span v-if="isSubmitting" class="loading-spinner"></span>
                <span v-else>
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </span>
                {{ isSubmitting ? 'Saving...' : 'Update Profile' }}
            </button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue@3.3.4/dist/vue.global.prod.js"></script>
<script>
const { createApp } = Vue;

createApp({
    data() {
        return {
            formData: {
                firstname: <?php echo json_encode($user->firstname ?? ''); ?>,
                lastname: <?php echo json_encode($user->lastname ?? ''); ?>,
                email: <?php echo json_encode($user->email ?? ''); ?>,
                maildisplay: <?php echo json_encode($user->maildisplay ?? '0'); ?>,
                city: <?php echo json_encode($user->city ?? ''); ?>,
                country: <?php echo json_encode($user->country ?? ''); ?>,
                timezone: <?php echo json_encode($user->timezone ?? '99'); ?>,
                description: <?php echo json_encode($user->description ?? ''); ?>,
                imagealt: <?php echo json_encode($user->imagealt ?? ''); ?>,
                interests: <?php
                    $interests_safe = isset($user->interests) && is_array($user->interests) ? array_values($user->interests) : [];
                    echo json_encode($interests_safe);
                ?>,
                idnumber: <?php echo json_encode($user->idnumber ?? ''); ?>,
                institution: <?php echo json_encode($user->institution ?? ''); ?>,
                department: <?php echo json_encode($user->department ?? ''); ?>,
                phone1: <?php echo json_encode($user->phone1 ?? ''); ?>,
                phone2: <?php echo json_encode($user->phone2 ?? ''); ?>,
                address: <?php echo json_encode($user->address ?? ''); ?>
            },
            newInterest: '',
            isSubmitting: false
        };
    },
    methods: {
        addInterest() {
            const interest = this.newInterest.trim();
            if (interest && !this.formData.interests.includes(interest)) {
                this.formData.interests.push(interest);
                this.newInterest = '';
            }
        },
        removeInterest(index) {
            this.formData.interests.splice(index, 1);
        },
        focusInterestInput() {
            this.$refs.interestInput.focus();
        },
        handleFileUpload(event) {
            const file = event.target.files[0];
            if (file) {
                console.log('File selected:', file.name);
            }
        },
        cancelEdit() {
            window.location.href = '<?php echo $returnurl->out(false); ?>';
        },
        submitForm() {
            this.isSubmitting = true;

            // Get the hidden Moodle form
            const moodleForm = document.querySelector('form.mform');
            if (!moodleForm) {
                console.error('Moodle form not found');
                this.isSubmitting = false;
                return;
            }

            // Sync values from Vue.js form to Moodle form
            this.syncFormField(moodleForm, 'firstname', this.formData.firstname);
            this.syncFormField(moodleForm, 'lastname', this.formData.lastname);
            this.syncFormField(moodleForm, 'email', this.formData.email);
            this.syncFormField(moodleForm, 'maildisplay', this.formData.maildisplay);
            this.syncFormField(moodleForm, 'city', this.formData.city);
            this.syncFormField(moodleForm, 'country', this.formData.country);
            this.syncFormField(moodleForm, 'timezone', this.formData.timezone);
            this.syncFormField(moodleForm, 'imagealt', this.formData.imagealt);
            this.syncFormField(moodleForm, 'idnumber', this.formData.idnumber);
            this.syncFormField(moodleForm, 'institution', this.formData.institution);
            this.syncFormField(moodleForm, 'department', this.formData.department);
            this.syncFormField(moodleForm, 'phone1', this.formData.phone1);
            this.syncFormField(moodleForm, 'phone2', this.formData.phone2);
            this.syncFormField(moodleForm, 'address', this.formData.address);

            // Sync description editor
            const descEditor = moodleForm.querySelector('[name="description_editor[text]"]');
            if (descEditor) {
                descEditor.value = this.formData.description;
            }

            // Sync interests
            const interestsField = moodleForm.querySelector('[name="interests"]');
            if (interestsField) {
                interestsField.value = this.formData.interests.join(',');
            }

            // Copy file upload if exists
            const vueFileInput = document.querySelector('#imagefile');
            const moodleFileInput = moodleForm.querySelector('[name="imagefile"]');
            if (vueFileInput && moodleFileInput && vueFileInput.files.length > 0) {
                // File inputs can't be set directly, so we need to use the DataTransfer API
                const dt = new DataTransfer();
                for (let i = 0; i < vueFileInput.files.length; i++) {
                    dt.items.add(vueFileInput.files[i]);
                }
                moodleFileInput.files = dt.files;
            }

            // Copy delete picture checkbox
            const vueDeletePic = document.querySelector('#deletepicture');
            const moodleDeletePic = moodleForm.querySelector('[name="deletepicture"]');
            if (vueDeletePic && moodleDeletePic) {
                moodleDeletePic.checked = vueDeletePic.checked;
            }

            // Submit the Moodle form
            moodleForm.submit();
        },
        syncFormField(form, fieldName, value) {
            const field = form.querySelector(`[name="${fieldName}"]`);
            if (field) {
                field.value = value;
            }
        }
    }
}).mount('#editProfileApp');
</script>

<!-- Vue.js Footer -->
<?php include($CFG->dirroot . '/includes/bheem_footer.php'); ?>

</body>
</html>
