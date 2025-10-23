<?php
/**
 * Bheem Academy Configuration
 */

// Database configuration
define("DB_TYPE", "pgsql");
define("DB_HOST", "65.109.167.218");
define("DB_NAME", "bheem_academy_staging");
define("DB_USER", "postgres");
define("DB_PASS", "Bheem924924.@");
define("DB_PREFIX", "mdl_");

// Site configuration
define("SITE_URL", "https://newdesign.bheem.cloud");
define("SITE_NAME", "Bheem Academy");
define("SITE_DIR", "/home/academy/academy");

// Environment
define("ENVIRONMENT", "production");

// Security
define("SESSION_NAME", "BheemAcademy");
define("COOKIE_SECURE", true);
define("COOKIE_HTTPONLY", true);

// Paths
define("PUBLIC_DIR", SITE_DIR . "/public");
define("COMPONENTS_DIR", SITE_DIR . "/components");
define("INCLUDES_DIR", SITE_DIR . "/includes");
define("LIB_DIR", SITE_DIR . "/lib");
define("ASSETS_DIR", SITE_DIR . "/assets");

// Debugging
define("DEBUG_MODE", false);
define("SHOW_ERRORS", false);

// CDN URLs
define("FONT_AWESOME_CDN", "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css");
define("VUE_CDN", "https://unpkg.com/vue@3/dist/vue.global.js");
define("VUE_PROD_CDN", "https://unpkg.com/vue@3.3.4/dist/vue.global.prod.js");

// Logo and branding
define("LOGO_URL", "https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/26637bef-052f-4eec-f6f8-a44a2d6fbf00/public");

// Email configuration
define("FROM_EMAIL", "noreply@bheem.cloud");
define("FROM_NAME", "Bheem Academy");

// Session configuration
ini_set("session.cookie_secure", COOKIE_SECURE);
ini_set("session.cookie_httponly", COOKIE_HTTPONLY);
ini_set("session.cookie_samesite", "Lax");

// Error reporting
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT);
ini_set("display_errors", "0");
ini_set("log_errors", "1");

// Create Moodle-compatible $CFG object
if (!isset($CFG)) {
    $CFG = new stdClass();
}
$CFG->wwwroot = SITE_URL;
$CFG->dirroot = SITE_DIR;
$CFG->libdir = SITE_DIR . '/lib';
$CFG->dataroot = SITE_DIR . '/moodledata';
$CFG->admin = 'admin';

// Load Moodle compatibility layer
require_once(SITE_DIR . '/lib/moodle_compat.php');
