<?php
/**
 * Edoo Components Loader
 *
 * This file provides functions to load individual Edoo block components.
 * Each component is self-contained with its own styles, HTML, and JavaScript.
 *
 * Usage:
 *   require_once 'bheem-components/loader.php';
 *   bheem_load_component('certification');
 *   bheem_load_component('faq');
 *
 * Available Components:
 * - certification: [Edoo] About Four - Certification Block
 * - faq: [Edoo] HTML Block - FAQ Accordion (requires Vue.js)
 */

/**
 * Detect if the current request is from a mobile device
 *
 * @return bool True if mobile device, false otherwise
 */
function bheem_is_mobile_device() {
    if (!isset($_SERVER['HTTP_USER_AGENT'])) {
        return false;
    }

    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    // Mobile device patterns
    $mobile_agents = array(
        'Android', 'webOS', 'iPhone', 'iPad', 'iPod',
        'BlackBerry', 'IEMobile', 'Opera Mini', 'Mobile',
        'mobile', 'CriOS'
    );

    // Check for mobile patterns
    foreach ($mobile_agents as $agent) {
        if (stripos($user_agent, $agent) !== false) {
            return true;
        }
    }

    // Check for tablets
    if (preg_match('/(tablet|ipad|playbook|silk)|(android(?!.*mobile))/i', $user_agent)) {
        return true;
    }

    return false;
}

/**
 * Load the why-bheem-academy component with mobile detection
 *
 * @return bool True if component loaded successfully, false otherwise
 */
function bheem_load_why_bheem_academy() {
    $base_path = __DIR__ . '/why-bheem-academy';

    // Detect mobile device
    $is_mobile = bheem_is_mobile_device();

    // Choose appropriate version
    if ($is_mobile) {
        $component_path = $base_path . '/why-bheem-academy-mobile-minimal.php';
    } else {
        $component_path = $base_path . '/why-bheem-academy.php';
    }

    // Check if component file exists
    if (file_exists($component_path)) {
        ob_start();
        require $component_path;
        $output = ob_get_clean();
        echo $output;
        return true;
    } else {
        error_log("Why Bheem Academy component not found: " . $component_path);
        return false;
    }
}

/**
 * Load an Edoo component by name
 *
 * @param string $component_name The name of the component to load
 * @return bool True if component loaded successfully, false otherwise
 */
function bheem_load_component($component_name) {
    $base_path = __DIR__;

    // Security: validate component name (alphanumeric, dash, underscore only)
    if (!preg_match('/^[a-zA-Z0-9_-]+$/', $component_name)) {
        error_log("Invalid component name: " . $component_name);
        return false;
    }

    // Special handling for why-bheem-academy with mobile detection
    if ($component_name === 'why-bheem-academy') {
        return bheem_load_why_bheem_academy();
    }

    // Standard component loading
    $component_path = $base_path . '/' . $component_name . '/' . $component_name . '.php';

    // Check if component file exists
    if (file_exists($component_path)) {
        // Capture output and echo it to ensure it's rendered
        ob_start();
        require $component_path;
        $output = ob_get_clean();
        echo $output;
        return true;
    } else {
        error_log("Component not found: " . $component_path);
        return false;
    }
}

/**
 * Load multiple components at once
 *
 * @param array $components Array of component names to load
 * @return array Array of component names that failed to load
 */
function bheem_load_components($components) {
    $failed = array();

    foreach ($components as $component) {
        if (!bheem_load_component($component)) {
            $failed[] = $component;
        }
    }

    return $failed;
}

/**
 * Get list of available components
 *
 * @return array Array of available component names
 */
function bheem_get_available_components() {
    $base_path = __DIR__;
    $components = array();

    if (is_dir($base_path)) {
        $dirs = array_diff(scandir($base_path), array('.', '..'));

        foreach ($dirs as $dir) {
            $dir_path = $base_path . '/' . $dir;
            if (is_dir($dir_path)) {
                $component_file = $dir_path . '/' . $dir . '.php';
                if (file_exists($component_file)) {
                    $components[] = $dir;
                }
            }
        }
    }

    return $components;
}

?>
