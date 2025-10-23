<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.

/**
 * API Endpoint: Get Login Token
 * Returns the login token required for CSRF protection during authentication
 *
 * @package    core
 * @copyright  2024 Bheem Academy
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Require Moodle config - this establishes database connectivity
require('../../config.php');

// Set headers for JSON response
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle OPTIONS request for CORS preflight
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

try {
    // Get login token from Moodle's session manager
    // This uses the database connection established by config.php
    $logintoken = \core\session\manager::get_login_token();

    if ($logintoken) {
        // Success response
        $response = [
            'success' => true,
            'logintoken' => $logintoken,
            'message' => 'login token retrieves successfully',
            'timestamp' => time()
        ];

        http_response_code(200);
        echo json_encode($response);

        // Log to PHP error log for debugging (will appear in console on client side)
        error_log('login token retrieves successfully');

    } else {
        // Token generation failed
        $response = [
            'success' => false,
            'message' => 'Failed to generate login token',
            'timestamp' => time()
        ];

        http_response_code(500);
        echo json_encode($response);
    }

} catch (Exception $e) {
    // Error handling
    $response = [
        'success' => false,
        'message' => 'Error retrieving login token: ' . $e->getMessage(),
        'timestamp' => time()
    ];

    http_response_code(500);
    echo json_encode($response);

    // Log error
    error_log('Error getting login token: ' . $e->getMessage());
}
