<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.

/**
 * Vue.js Login Page - Modernized Design with Animations
 * Beautiful, modern login with animated gradient backgrounds and glass morphism
 *
 * @package    core
 * @copyright  2024 Bheem Academy
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require('../config.php');

// Get user type from URL parameter
$usertype = optional_param('user', 'student', PARAM_ALPHA);

// Redirect if already logged in based on user type
if (isloggedin() && !isguestuser()) {
    if ($usertype === 'mentor') {
        redirect($CFG->wwwroot . '/mentor-dashboard.php');
    } else {
        redirect($CFG->wwwroot . '/student-dashboard.php');
    }
}

// Set page context
$PAGE->set_url(new moodle_url('/login-vue/academy-login.php', array('user' => $usertype)));
$PAGE->set_context(context_system::instance());

// Output the Vue app HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex">
  <title>Log in to the site | Bheem Academy empowers you to step into Artificial Intelligence and shape tomorrow's technology with real-world AI skills.</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo $CFG->wwwroot; ?>/pluginfile.php?file=%2F1%2Ftheme_bheem%2Ffavicon%2F-1%2Ffavi.png">

  <!-- Vue App CSS - With All 7 Images -->
  <link rel="stylesheet" crossorigin href="<?php echo $CFG->wwwroot; ?>/login-vue/assets/index-CKavUVa3.css?v=4">
</head>
<body id="page-login-index" class="format-site path-login dir-ltr lang-en pagelayout-login course-1 context-1 notloggedin" data-user-type="<?php echo s($usertype); ?>">
  <div id="app"></div>

  <!-- Vue App JS - With All 7 Images -->
  <script type="module" crossorigin src="<?php echo $CFG->wwwroot; ?>/login-vue/assets/index-4wehwuuu.js?v=4"></script>
  <link rel="modulepreload" crossorigin href="<?php echo $CFG->wwwroot; ?>/login-vue/assets/vue-BYfO7Uwn.js?v=4">
</body>
</html>
