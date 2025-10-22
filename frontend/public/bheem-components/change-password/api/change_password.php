<?php
/**
 * Change Password API Endpoint
 * Handles password change requests with Moodle authentication
 */

// Disable Moodle's page output for API response
define('AJAX_SCRIPT', true);
define('NO_MOODLE_COOKIES', false);

require_once('../../../config.php');
require_once($CFG->dirroot.'/user/lib.php');
require_once($CFG->libdir.'/authlib.php');
require_once($CFG->dirroot.'/webservice/lib.php');
require_once($CFG->dirroot.'/login/lib.php');

// Set JSON headers
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Method not allowed']);
    exit;
}

try {
    // Check if user is logged in
    require_login();

    // Get POST data
    $input = json_decode(file_get_contents('php://input'), true);
    $oldpassword = $input['oldpassword'] ?? '';
    $newpassword1 = $input['newpassword1'] ?? '';
    $newpassword2 = $input['newpassword2'] ?? '';
    $logoutothersessions = isset($input['logoutothersessions']) ? (bool)$input['logoutothersessions'] : true;
    $signoutofotherservices = isset($input['signoutofotherservices']) ? (bool)$input['signoutofotherservices'] : true;

    // Validation
    $errors = [];

    // Check required fields
    if (empty($oldpassword)) {
        $errors['oldpassword'] = 'Current password is required';
    }
    if (empty($newpassword1)) {
        $errors['newpassword1'] = 'New password is required';
    }
    if (empty($newpassword2)) {
        $errors['newpassword2'] = 'Password confirmation is required';
    }

    // Check if new passwords match
    if (!empty($newpassword1) && !empty($newpassword2) && $newpassword1 !== $newpassword2) {
        $errors['newpassword1'] = 'New passwords do not match';
        $errors['newpassword2'] = 'New passwords do not match';
    }

    // Check if new password is same as old
    if (!empty($oldpassword) && !empty($newpassword1) && $oldpassword === $newpassword1) {
        $errors['newpassword1'] = 'New password must be different from current password';
        $errors['newpassword2'] = 'New password must be different from current password';
    }

    // Verify old password is correct
    if (empty($errors['oldpassword'])) {
        $reason = null;
        if (!authenticate_user_login($USER->username, $oldpassword, true, $reason, false)) {
            $errors['oldpassword'] = 'Current password is incorrect';
        }
    }

    // Check password policy
    if (empty($errors) && !empty($CFG->passwordpolicy)) {
        $errmsg = '';
        if (!check_password_policy($newpassword1, $errmsg, $USER)) {
            $errors['newpassword1'] = $errmsg;
            $errors['newpassword2'] = $errmsg;
        }
    }

    // Check password reuse limit
    if (empty($errors) && !empty($CFG->passwordreuselimit) && $CFG->passwordreuselimit > 0) {
        if (user_is_previously_used_password($USER->id, $newpassword1)) {
            $errors['newpassword1'] = 'You cannot reuse a previously used password';
            $errors['newpassword2'] = 'You cannot reuse a previously used password';
        }
    }

    // Check password length
    if (!empty($newpassword1) && strlen($newpassword1) > MAX_PASSWORD_CHARACTERS) {
        $errors['newpassword1'] = 'Password is too long (maximum ' . MAX_PASSWORD_CHARACTERS . ' characters)';
    }

    // Return validation errors if any
    if (!empty($errors)) {
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'errors' => $errors
        ]);
        exit;
    }

    // Check if user is allowed to change password
    $systemcontext = context_system::instance();
    if (!get_user_preferences('auth_forcepasswordchange', false)) {
        require_capability('moodle/user:changeownpassword', $systemcontext);
    }

    // Don't allow "Logged in as" users to change passwords
    if (\core\session\manager::is_loggedinas()) {
        http_response_code(403);
        echo json_encode([
            'success' => false,
            'error' => 'Cannot change password when logged in as another user'
        ]);
        exit;
    }

    // Check if this is an MNET remote user
    if (is_mnet_remote_user($USER)) {
        http_response_code(403);
        echo json_encode([
            'success' => false,
            'error' => 'Remote users cannot change password here'
        ]);
        exit;
    }

    // Load auth plugin
    $userauth = get_auth_plugin($USER->auth);

    if (!$userauth->can_change_password()) {
        http_response_code(403);
        echo json_encode([
            'success' => false,
            'error' => 'Password changes are not allowed for your account type'
        ]);
        exit;
    }

    // Check if there's an external URL for password change
    if ($changeurl = $userauth->change_password_url()) {
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'error' => 'Please use the external password change URL',
            'redirect_url' => $changeurl
        ]);
        exit;
    }

    // Update the password
    if (!$userauth->user_update_password($USER, $newpassword1)) {
        http_response_code(500);
        echo json_encode([
            'success' => false,
            'error' => 'Failed to update password. Please try again.'
        ]);
        exit;
    }

    // Add password to history
    user_add_password_history($USER->id, $newpassword1);

    // Log out other sessions if requested or mandated
    if (!empty($CFG->passwordchangelogout) || $logoutothersessions) {
        \core\session\manager::destroy_user_sessions($USER->id, session_id());
    }

    // Sign out of other services if requested or mandated
    if ((!empty($CFG->passwordchangetokendeletion) || $signoutofotherservices) &&
        !empty(webservice::get_active_tokens($USER->id))) {
        webservice::delete_user_ws_tokens($USER->id);
    }

    // Reset login lockout
    login_unlock_account($USER);

    // Unset forced password change preferences
    unset_user_preference('auth_forcepasswordchange', $USER);
    unset_user_preference('create_password', $USER);

    // Success response
    http_response_code(200);
    echo json_encode([
        'success' => true,
        'message' => 'Password changed successfully',
        'user' => [
            'id' => $USER->id,
            'username' => $USER->username,
            'fullname' => fullname($USER, true)
        ]
    ]);

} catch (moodle_exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'An unexpected error occurred'
    ]);
}
