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
 * Preferences.
 *
 * @package    core_user
 * @copyright  2015 Frédéric Massart - FMCorz.net
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . '/../config.php');
require_once($CFG->libdir . '/navigationlib.php');

require_login(null, false);
if (isguestuser()) {
    throw new require_login_exception('Guests are not allowed here.');
}

$userid = optional_param('userid', $USER->id, PARAM_INT);
$currentuser = $userid == $USER->id;

// Check that the user is a valid user.
$user = core_user::get_user($userid);
if (!$user || !core_user::is_real_user($userid)) {
    throw new moodle_exception('invaliduser', 'error');
}

$PAGE->set_context(context_user::instance($userid));
$PAGE->set_url('/user/preferences.php', array('userid' => $userid));
$PAGE->set_pagelayout('admin');
$PAGE->add_body_class('limitedwidth');
$PAGE->set_pagetype('user-preferences');
$PAGE->set_title(get_string('preferences'));
$PAGE->set_heading(fullname($user));

// CRITICAL: Build Moodle's navigation BEFORE accessing settingsnav
// We capture the output but won't display it (hidden with CSS)
ob_start();
echo $OUTPUT->header();
$moodle_header = ob_get_clean();

if (!$currentuser) {
    $PAGE->navigation->extend_for_user($user);
    // Need to check that settings exist.
    if ($settings = $PAGE->settingsnav->find('userviewingsettings' . $user->id, null)) {
        $settings->make_active();
    }
    $url = new moodle_url('/user/preferences.php', array('userid' => $userid));
    $navbar = $PAGE->navbar->add(get_string('preferences', 'moodle'), $url);
    // Show an error if there are no preferences that this user has access to.
    if (!$PAGE->settingsnav->can_view_user_preferences($userid)) {
        throw new moodle_exception('cannotedituserpreferences', 'error');
    }
} else {
    // Shutdown the users node in the navigation menu.
    $usernode = $PAGE->navigation->find('users', null);
    if ($usernode) {
        $usernode->make_inactive();
    }

    $settings = $PAGE->settingsnav->find('usercurrentsettings', null);
    if ($settings) {
        $settings->make_active();
    }
}

// CRITICAL: Check if settings was found
if (!$settings) {
    // If settings not found, throw error like original
    throw new moodle_exception('cannotedituserpreferences', 'error');
}

// Identifying the nodes.
$groups = array();
$orphans = array();
if ($settings && isset($settings->children)) {
    foreach ($settings->children as $setting) {
        if ($setting->has_children()) {
            $groups[] = new preferences_group($setting->get_content(), $setting->children);
        } else {
            $orphans[] = $setting;
        }
    }
}
if (!empty($orphans)) {
    $groups[] = new preferences_group(get_string('miscellaneous'), $orphans);
}

// Convert preferences to JSON for Vue.js
$preferencesdata = array();
foreach ($groups as $group) {
    $groupdata = array(
        'title' => $group->title,
        'items' => array()
    );

    foreach ($group->nodes as $node) {
        $itemdata = array(
            'text' => $node->get_content(),
            'url' => $node->action ? $node->action->out(false) : '#',
            'key' => isset($node->key) ? (string)$node->key : ''
        );
        $groupdata['items'][] = $itemdata;
    }

    $preferencesdata[] = $groupdata;
}

// Get user full name
$userfullname = fullname($user);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings & Preferences - <?php echo $userfullname; ?> | Bheem Academy</title>
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

    <style>
        /* Hide ALL Moodle UI elements completely */
        .navbar,
        #page-header,
        .breadcrumb,
        #region-main-settings-menu,
        #region-main-box,
        .block,
        [data-region="drawer"],
        .drawer,
        .nav-tabs,
        #usernavigation,
        .page-context-header,
        .activity-navigation,
        #page-footer .tool_dataprivacy,
        #page-footer .logininfo,
        .sr-only,
        .skiplinks,
        #page-navbar,
        .block,
        .block-region,
        [class*="block_"],
        #block-region-side-pre,
        #block-region-side-post,
        .block_navigation,
        .block_settings,
        aside[data-region],
        .has-blocks,
        footer.footer:not(.bheem-footer):not([class*="bheem"]),
        .footer-popover,
        #page-footer:not(.bheem-footer):not([class*="bheem"]),
        .page-header-headings,
        nav.navbar:not(.bheem-header):not([class*="bheem"]),
        .breadcrumb-nav,
        .navbar-nav,
        #region-main,
        .region-main,
        #page-content,
        #page-wrapper,
        .pagelayout-admin #page-header,
        .pagelayout-admin .breadcrumb {
            display: none !important;
            visibility: hidden !important;
        }

        /* Force clean body styling */
        html, body {
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
            overflow-x: hidden !important;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif !important;
            background: linear-gradient(135deg, #f5f7fa 0%, #e8eef5 50%, #f0f4f8 100%) !important;
            background-attachment: fixed !important;
            color: #111827 !important;
            line-height: 1.6 !important;
            min-height: 100vh !important;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Ensure full width for Vue app */
        #page {
            max-width: 100% !important;
            width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            background: transparent !important;
        }

        /* Vue.js Preferences Styles */
        :root {
            --primary: #3b82f6;
            --primary-dark: #2563eb;
            --primary-light: #60a5fa;
            --secondary: #64748b;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --info: #3b82f6;
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
            --radius-sm: 8px;
            --radius-lg: 16px;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        * {
            box-sizing: border-box;
        }

        #preferencesApp {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            max-width: 1400px;
            margin: 0 auto;
            padding: 110px 20px 40px;
        }

        @media (max-width: 1024px) {
            #preferencesApp { padding-top: 100px; }
        }
        @media (max-width: 768px) {
            #preferencesApp { padding-top: 95px; }
        }
        @media (max-width: 480px) {
            #preferencesApp { padding-top: 90px; }
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
            background: linear-gradient(90deg, var(--primary) 0%, var(--primary-light) 100%);
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

        .preferences-container {
            display: grid;
            gap: 30px;
        }

        .preference-section {
            background: #ffffff;
            border-radius: var(--radius);
            padding: 0;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--gray-200);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .preference-section:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-2px);
        }

        .section-header {
            padding: 24px 28px;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-bottom: 2px solid var(--gray-200);
        }

        .section-title {
            font-family: 'Poppins', sans-serif;
            font-size: 1.375rem;
            font-weight: 700;
            color: #000000;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-icon {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 1rem;
        }

        .preference-items {
            display: grid;
            gap: 0;
        }

        .preference-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 28px;
            text-decoration: none;
            color: var(--gray-700);
            transition: all 0.2s ease;
            border-bottom: 1px solid var(--gray-100);
            position: relative;
        }

        .preference-item:last-child {
            border-bottom: none;
        }

        .preference-item:hover {
            background: linear-gradient(90deg, #f8fafc 0%, #ffffff 100%);
            color: var(--primary);
        }

        .preference-item:hover .item-icon {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: #ffffff;
            transform: scale(1.1);
        }

        .preference-item:hover .item-arrow {
            color: var(--primary);
            transform: translateX(4px);
        }

        .item-content {
            display: flex;
            align-items: center;
            gap: 16px;
            flex: 1;
        }

        .item-icon {
            width: 44px;
            height: 44px;
            background: var(--gray-100);
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray-600);
            font-size: 1.125rem;
            transition: all 0.3s ease;
        }

        .item-text {
            font-size: 1rem;
            font-weight: 500;
            line-height: 1.5;
        }

        .item-arrow {
            color: var(--gray-400);
            font-size: 1.125rem;
            transition: all 0.2s ease;
        }

        .empty-state {
            padding: 60px 20px;
            text-align: center;
            color: var(--gray-500);
            background: #ffffff;
            border-radius: var(--radius);
            box-shadow: var(--shadow-md);
        }

        .empty-state-icon {
            font-size: 3rem;
            color: var(--gray-300);
            margin-bottom: 16px;
        }

        .empty-state-text {
            font-size: 1.125rem;
            font-weight: 500;
        }

        /* Responsive Grid */
        @media (min-width: 1200px) {
            .preferences-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .section-title {
                font-size: 1.125rem;
            }

            .preference-item {
                padding: 16px 20px;
            }

            .item-icon {
                width: 38px;
                height: 38px;
                font-size: 1rem;
            }

            .item-text {
                font-size: 0.9375rem;
            }
        }

        @media (max-width: 480px) {
            .section-header {
                padding: 20px 20px;
            }

            .section-title {
                font-size: 1rem;
            }

            .section-icon {
                width: 28px;
                height: 28px;
                font-size: 0.875rem;
            }
        }

        /* Vue.js v-cloak directive - hide until Vue is ready */
        [v-cloak] {
            display: block !important;
        }
        [v-cloak] > *:not(.page-header):not(.empty-state) {
            display: none !important;
        }
    </style>
</head>
<body>


<?php include($CFG->dirroot . '/includes/bheem_header.php'); ?>

<div id="preferencesApp" v-cloak>
    <div class="page-header">
        <h1 class="page-title">Settings & Preferences</h1>
        <p class="page-subtitle">Customize your learning experience and manage your account settings</p>
    </div>

    <div v-if="!mounted" class="empty-state">
        <div class="empty-state-icon">
            <i class="fas fa-spinner fa-spin"></i>
        </div>
        <p class="empty-state-text">Loading preferences...</p>
    </div>

    <div v-else-if="preferences.length === 0" class="empty-state">
        <div class="empty-state-icon">
            <i class="fas fa-cog"></i>
        </div>
        <p class="empty-state-text">No preferences available at this time</p>
    </div>

    <div v-else class="preferences-container">
        <div v-for="(group, index) in preferences" :key="index" class="preference-section">
            <div class="section-header">
                <h2 class="section-title">
                    <span class="section-icon">
                        <i :class="getGroupIcon(group.title)"></i>
                    </span>
                    {{ group.title }}
                </h2>
            </div>
            <div class="preference-items">
                <a
                    v-for="(item, itemIndex) in group.items"
                    :key="itemIndex"
                    :href="item.url"
                    class="preference-item"
                >
                    <div class="item-content">
                        <div class="item-icon">
                            <i :class="getItemIcon(item.key, item.text)"></i>
                        </div>
                        <span class="item-text">{{ item.text }}</span>
                    </div>
                    <div class="item-arrow">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
// Check if Vue is loaded
if (typeof Vue === 'undefined') {
    console.error('Vue.js failed to load from CDN');
    document.getElementById('preferencesApp').innerHTML = `
        <div class="empty-state">
            <div class="empty-state-icon">
                <i class="fas fa-exclamation-triangle" style="color: var(--danger);"></i>
            </div>
            <p class="empty-state-text">Failed to load page resources. Please refresh the page or contact support.</p>
        </div>
    `;
} else {
    const { createApp } = Vue;

    createApp({
    data() {
        return {
            mounted: false,
            preferences: <?php echo json_encode($preferencesdata, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>
        };
    },
    mounted() {
        console.log('=== Vue App Debug Info ===');
        console.log('Vue app mounted successfully');
        console.log('Preferences data type:', typeof this.preferences);
        console.log('Preferences is array?:', Array.isArray(this.preferences));
        console.log('Preferences data:', this.preferences);
        console.log('Preferences count:', Array.isArray(this.preferences) ? this.preferences.length : 'NOT AN ARRAY');
        console.log('=========================');
        this.mounted = true;
    },
    methods: {
        getGroupIcon(title) {
            const lowerTitle = title ? String(title).toLowerCase() : '';

            if (lowerTitle.includes('user') || lowerTitle.includes('account')) {
                return 'fas fa-user-circle';
            } else if (lowerTitle.includes('message') || lowerTitle.includes('notification')) {
                return 'fas fa-bell';
            } else if (lowerTitle.includes('blog')) {
                return 'fas fa-blog';
            } else if (lowerTitle.includes('badge')) {
                return 'fas fa-award';
            } else if (lowerTitle.includes('calendar')) {
                return 'fas fa-calendar-alt';
            } else if (lowerTitle.includes('content') || lowerTitle.includes('bank')) {
                return 'fas fa-database';
            } else if (lowerTitle.includes('miscellaneous') || lowerTitle.includes('misc')) {
                return 'fas fa-cog';
            } else {
                return 'fas fa-sliders-h';
            }
        },

        getItemIcon(key, text) {
            const lowerKey = key ? String(key).toLowerCase() : '';
            const lowerText = text ? String(text).toLowerCase() : '';

            if (lowerKey.includes('editor') || lowerText.includes('editor')) {
                return 'fas fa-edit';
            } else if (lowerKey.includes('calendar') || lowerText.includes('calendar')) {
                return 'fas fa-calendar';
            } else if (lowerKey.includes('message') || lowerText.includes('message')) {
                return 'fas fa-envelope';
            } else if (lowerKey.includes('notification') || lowerText.includes('notification')) {
                return 'fas fa-bell';
            } else if (lowerKey.includes('blog') || lowerText.includes('blog')) {
                return 'fas fa-rss';
            } else if (lowerKey.includes('badge') || lowerText.includes('badge')) {
                return 'fas fa-medal';
            } else if (lowerKey.includes('forum') || lowerText.includes('forum') || lowerText.includes('discussion')) {
                return 'fas fa-comments';
            } else if (lowerKey.includes('grade') || lowerText.includes('grade') || lowerText.includes('grading')) {
                return 'fas fa-graduation-cap';
            } else if (lowerKey.includes('content') || lowerText.includes('content')) {
                return 'fas fa-folder-open';
            } else if (lowerKey.includes('privacy') || lowerText.includes('privacy')) {
                return 'fas fa-shield-alt';
            } else if (lowerKey.includes('language') || lowerText.includes('language')) {
                return 'fas fa-language';
            } else if (lowerKey.includes('access') || lowerText.includes('accessibility')) {
                return 'fas fa-universal-access';
            } else {
                return 'fas fa-sliders-h';
            }
        }
    }
}).mount('#preferencesApp');
}
</script>

<noscript>
    <div style="max-width: 1400px; margin: 120px auto; padding: 20px;">
        <div class="empty-state">
            <div class="empty-state-icon">
                <i class="fas fa-exclamation-triangle" style="color: var(--warning);"></i>
            </div>
            <p class="empty-state-text">JavaScript is required to view this page. Please enable JavaScript in your browser settings.</p>
        </div>
    </div>
</noscript>

<!-- Vue.js Footer -->
<?php include($CFG->dirroot . '/includes/bheem_footer.php'); ?>

</body>
</html>
