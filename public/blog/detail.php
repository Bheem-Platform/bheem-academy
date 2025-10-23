<?php
// Create stub objects for Moodle compatibility
class StubOutput {
    public function body_attributes() { return ''; }
    public function standard_top_of_body_html() { return ''; }
}
class StubConfig {
    public $wwwroot = 'https://newdesign.bheem.cloud';
    public $dirroot = '/home/academy/academy/public';
}
$OUTPUT = new StubOutput();
$CFG = new StubConfig();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $PAGE->title; ?></title>

    <!-- Header Styles from Homepage -->
    <link rel="stylesheet" href="<?php echo $CFG->wwwroot; ?>/includes/bheem_header_styles.css">
</head>
<body>

<?php
// Use the same header as homepage
require_once($CFG->dirroot . '/includes/bheem_header.php');
?>

<!-- Vue.js 3 -->
<script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>
    /* ============================================
       COMPLETE MOODLE RESET - PURE VUE.JS STYLING
    ============================================ */

    /* Reset all Moodle containers */
    body,
    #page,
    #page-wrapper,
    #page-content,
    #region-main-box,
    #region-main,
    .container-fluid,
    .row,
    [role="main"] {
        padding: 0 !important;
        margin: 0 !important;
        background: transparent !important;
        max-width: none !important;
        width: 100% !important;
    }

    /* Hide ALL Moodle blocks and elements - keep header/footer */
    .breadcrumb,
    .page-context-header,
    .page-header-headings,
    .secondary-navigation,
    .activityinstance,
    .mod_label,
    .course-content,
    #nav-drawer,
    [data-region="drawer"],
    .drawer,
    /* HIDE ALL BLOCKS */
    [data-block],
    .block,
    .block_navigation,
    .block_settings,
    .block_course_list,
    .block_calendar_month,
    .block_calendar_upcoming,
    .block_recent_activity,
    .block_online_users,
    .block_badges,
    .block_glossary_random,
    .block_rss_client,
    .block_search_forums,
    .block_blog_tags,
    .block_blog_menu,
    .block_comments,
    .block_private_files,
    .block_myprofile,
    .block_timeline,
    .block-region,
    [data-region="blocks-column"],
    aside[data-region],
    .block-hider-show,
    .block-hider-hide,
    .block_adminblock,
    .block_site_main_menu,
    .block_course_summary,
    .block_activity_modules,
    .block_activity_results,
    .block_section_links,
    .block_tag_youtube,
    .block_tag_flickr,
    .block_selfcompletion,
    .block_mentees,
    .block_participants,
    .block_lp,
    .block_recentlyaccessedcourses,
    .block_recentlyaccesseditems,
    .block_starredcourses,
    .sidepost,
    #block-region-side-post,
    #block-region-side-pre,
    .block-region-side-post,
    .block-region-side-pre {
        display: none !important;
        visibility: hidden !important;
        opacity: 0 !important;
        height: 0 !important;
        width: 0 !important;
        overflow: hidden !important;
    }

    /* Keep navbar but make it transparent/minimal */
    nav.navbar {
        background: transparent !important;
        box-shadow: none !important;
        margin-bottom: 0 !important;
    }

    /* Ensure header doesn't overlap content */
    #page-header {
        position: relative !important;
        z-index: 50 !important;
        margin-bottom: 0 !important;
    }

    /* Override Moodle typography */
    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif !important;
        line-height: normal !important;
        background: #ffffff !important;
    }

    /* Reset Moodle box model */
    * {
        box-sizing: border-box;
    }

    /* Force full width layout */
    html {
        overflow-x: hidden;
        background: #ffffff;
    }

    body {
        overflow-x: hidden;
        position: relative;
    }

    /* Keep Moodle header and footer visible - CLEAN SEPARATION */
    #page-footer,
    footer[role="contentinfo"] {
        background: transparent !important;
        margin: 0 !important;
        padding: 60px 0 0 0 !important;
        clear: both !important;
        position: relative !important;
        z-index: 100 !important;
    }

    /* Position aiApp in normal document flow - PREVENT OVERFLOW */
    #aiApp {
        position: relative !important;
        width: 100% !important;
        min-height: auto !important;
        max-height: none !important;
        z-index: 1;
        margin: 0 0 80px 0 !important;
        padding: 120px 0 80px 0 !important;
        background: #ffffff !important;
        clear: both !important;
        overflow: visible !important;
    }

    /* Ensure content wrapper doesn't overflow */
    .content-wrapper {
        max-width: 100% !important;
        overflow-x: hidden !important;
        margin-bottom: 60px !important;
        padding-bottom: 60px !important;
    }

    /* Force clear before footer */
    #page-footer::before,
    footer[role="contentinfo"]::before {
        content: "" !important;
        display: block !important;
        clear: both !important;
        height: 40px !important;
    }

    /* Ensure proper stacking context */
    #region-main {
        position: relative !important;
        z-index: auto !important;
    }

        /* ============================================
           CSS VARIABLES - MODERN AI COMPANY THEME
        ============================================ */
        :root {
            /* AI Company Brand Colors */
            --primary: #6366f1;
            --primary-light: #818cf8;
            --primary-dark: #4f46e5;
            --secondary: #ec4899;
            --accent: #06b6d4;
            --success: #10b981;
            --warning: #f59e0b;

            /* Neutrals */
            --white: #ffffff;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e1;
            --gray-400: #94a3b8;
            --gray-500: #64748b;
            --gray-600: #475569;
            --gray-700: #334155;
            --gray-800: #1e293b;
            --gray-900: #0f172a;
            --black: #020617;

            /* Gradients */
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --gradient-accent: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --gradient-mesh: radial-gradient(at 40% 20%, hsla(240, 100%, 70%, 0.15) 0px, transparent 50%),
                             radial-gradient(at 80% 0%, hsla(280, 100%, 70%, 0.15) 0px, transparent 50%),
                             radial-gradient(at 0% 50%, hsla(200, 100%, 70%, 0.15) 0px, transparent 50%),
                             radial-gradient(at 80% 100%, hsla(320, 100%, 70%, 0.15) 0px, transparent 50%);

            /* Shadows with color tint */
            --shadow-sm: 0 1px 2px 0 rgba(99, 102, 241, 0.05);
            --shadow: 0 1px 3px 0 rgba(99, 102, 241, 0.1), 0 1px 2px 0 rgba(99, 102, 241, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(99, 102, 241, 0.1), 0 2px 4px -1px rgba(99, 102, 241, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(99, 102, 241, 0.1), 0 4px 6px -2px rgba(99, 102, 241, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(99, 102, 241, 0.1), 0 10px 10px -5px rgba(99, 102, 241, 0.04);
            --shadow-glow: 0 0 40px rgba(99, 102, 241, 0.2);

            /* Typography */
            --font-sans: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            --font-display: 'Plus Jakarta Sans', 'Inter', sans-serif;
        }

        /* ============================================
           MAIN LAYOUT WITH ANIMATED BACKGROUND
        ============================================ */
        /* Background Animation Container */
        .animated-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            min-height: 100vh;
            z-index: 0;
            pointer-events: none;
            background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
            overflow: hidden;
        }

        /* Animated Gradient Orbs */
        .gradient-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0;
            animation: float-orb 20s ease-in-out infinite;
        }

        .gradient-orb-1 {
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.3) 0%, rgba(99, 102, 241, 0) 70%);
            top: -10%;
            left: -10%;
            animation-delay: 0s;
        }

        .gradient-orb-2 {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(236, 72, 153, 0.25) 0%, rgba(236, 72, 153, 0) 70%);
            top: 20%;
            right: -5%;
            animation-delay: 3s;
        }

        .gradient-orb-3 {
            width: 450px;
            height: 450px;
            background: radial-gradient(circle, rgba(6, 182, 212, 0.2) 0%, rgba(6, 182, 212, 0) 70%);
            bottom: 10%;
            left: 20%;
            animation-delay: 6s;
        }

        @keyframes float-orb {
            0%, 100% {
                transform: translate(0, 0) scale(1);
                opacity: 0.6;
            }
            25% {
                transform: translate(30px, -30px) scale(1.1);
                opacity: 0.8;
            }
            50% {
                transform: translate(-20px, 20px) scale(0.9);
                opacity: 0.7;
            }
            75% {
                transform: translate(40px, 10px) scale(1.05);
                opacity: 0.75;
            }
        }

        /* AI Tool Icons - Floating Around with Vibrant Colors */
        .ai-icon {
            position: absolute;
            font-size: 3rem;
            opacity: 0.18;
            pointer-events: none;
            z-index: 1;
            filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.15));
            transition: opacity 0.3s ease;
        }

        /* Individual Icon Styles, Colors, and Positions */
        .ai-icon.fa-robot {
            top: 10%;
            left: 5%;
            font-size: 3.5rem;
            color: #3b82f6;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: float-icon-1 25s ease-in-out infinite;
        }

        .ai-icon.fa-brain {
            top: 20%;
            right: 8%;
            font-size: 3rem;
            color: #ec4899;
            background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: float-icon-2 22s ease-in-out infinite;
        }

        .ai-icon.fa-microchip {
            top: 45%;
            left: 3%;
            font-size: 3.8rem;
            color: #8b5cf6;
            background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: float-icon-3 28s ease-in-out infinite;
        }

        .ai-icon.fa-code {
            bottom: 25%;
            right: 10%;
            font-size: 3.2rem;
            color: #10b981;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: float-icon-4 24s ease-in-out infinite;
        }

        .ai-icon.fa-network-wired {
            top: 55%;
            right: 15%;
            font-size: 3.4rem;
            color: #06b6d4;
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: float-icon-5 26s ease-in-out infinite;
        }

        .ai-icon.fa-cogs {
            bottom: 40%;
            left: 12%;
            font-size: 3.3rem;
            color: #f59e0b;
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: float-icon-6 23s ease-in-out infinite;
        }

        .ai-icon.fa-lightbulb {
            top: 65%;
            right: 25%;
            font-size: 3.1rem;
            color: #fbbf24;
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: float-icon-7 27s ease-in-out infinite;
        }

        .ai-icon.fa-rocket {
            top: 30%;
            left: 20%;
            font-size: 3.6rem;
            color: #ef4444;
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: float-icon-8 21s ease-in-out infinite;
        }

        .ai-icon.fa-atom {
            top: 75%;
            left: 30%;
            font-size: 3.4rem;
            color: #6366f1;
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: float-icon-9 29s ease-in-out infinite;
        }

        .ai-icon.fa-project-diagram {
            top: 15%;
            left: 50%;
            font-size: 3.3rem;
            color: #14b8a6;
            background: linear-gradient(135deg, #14b8a6 0%, #0d9488 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: float-icon-10 25s ease-in-out infinite;
        }

        .ai-icon.fa-laptop-code {
            bottom: 15%;
            left: 45%;
            font-size: 3.5rem;
            color: #a855f7;
            background: linear-gradient(135deg, #a855f7 0%, #9333ea 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: float-icon-11 24s ease-in-out infinite;
        }

        .ai-icon.fa-database {
            top: 40%;
            right: 35%;
            font-size: 3.2rem;
            color: #f97316;
            background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: float-icon-12 26s ease-in-out infinite;
        }

        .ai-icon.fa-cloud {
            bottom: 30%;
            right: 20%;
            font-size: 3.4rem;
            color: #0ea5e9;
            background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: float-icon-13 27s ease-in-out infinite;
        }

        .ai-icon.fa-server {
            top: 50%;
            left: 38%;
            font-size: 3rem;
            color: #64748b;
            background: linear-gradient(135deg, #64748b 0%, #475569 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: float-icon-14 28s ease-in-out infinite;
        }

        .ai-icon.fa-wifi {
            bottom: 50%;
            left: 52%;
            font-size: 3.3rem;
            color: #22c55e;
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: float-icon-15 23s ease-in-out infinite;
        }

        .ai-icon.fa-chart-line {
            top: 25%;
            left: 68%;
            font-size: 3.2rem;
            color: #2dd4bf;
            background: linear-gradient(135deg, #2dd4bf 0%, #14b8a6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: float-icon-16 29s ease-in-out infinite;
        }

        .ai-icon.fa-shield-halved {
            bottom: 45%;
            right: 48%;
            font-size: 3.1rem;
            color: #fb7185;
            background: linear-gradient(135deg, #fb7185 0%, #f43f5e 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: float-icon-17 26s ease-in-out infinite;
        }

        .ai-icon.fa-cubes {
            top: 85%;
            right: 12%;
            font-size: 3.4rem;
            color: #fb923c;
            background: linear-gradient(135deg, #fb923c 0%, #f97316 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: float-icon-18 24s ease-in-out infinite;
        }

        .ai-icon.fa-memory {
            top: 60%;
            left: 22%;
            font-size: 3rem;
            color: #c084fc;
            background: linear-gradient(135deg, #c084fc 0%, #a855f7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: float-icon-19 25s ease-in-out infinite;
        }

        .ai-icon.fa-sitemap {
            bottom: 60%;
            left: 72%;
            font-size: 3.3rem;
            color: #38bdf8;
            background: linear-gradient(135deg, #38bdf8 0%, #0ea5e9 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: float-icon-20 30s ease-in-out infinite;
        }

        .ai-icon.fa-layer-group {
            top: 38%;
            right: 58%;
            font-size: 3.1rem;
            color: #4ade80;
            background: linear-gradient(135deg, #4ade80 0%, #22c55e 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: float-icon-21 27s ease-in-out infinite;
        }

        .ai-icon.fa-circle-nodes {
            bottom: 20%;
            right: 52%;
            font-size: 3.5rem;
            color: #facc15;
            background: linear-gradient(135deg, #facc15 0%, #eab308 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: float-icon-22 22s ease-in-out infinite;
        }

        /* Floating Animations for Icons */
        @keyframes float-icon-1 {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
                opacity: 0.12;
            }
            25% {
                transform: translate(-50px, -60px) rotate(90deg);
                opacity: 0.18;
            }
            50% {
                transform: translate(-100px, 40px) rotate(180deg);
                opacity: 0.15;
            }
            75% {
                transform: translate(-50px, 100px) rotate(270deg);
                opacity: 0.16;
            }
        }

        @keyframes float-icon-2 {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
                opacity: 0.12;
            }
            33% {
                transform: translate(70px, 80px) rotate(-90deg);
                opacity: 0.18;
            }
            66% {
                transform: translate(-40px, -50px) rotate(-180deg);
                opacity: 0.14;
            }
        }

        @keyframes float-icon-3 {
            0%, 100% {
                transform: translate(0, 0) scale(1) rotate(0deg);
                opacity: 0.13;
            }
            50% {
                transform: translate(80px, -90px) scale(1.2) rotate(180deg);
                opacity: 0.18;
            }
        }

        @keyframes float-icon-4 {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
                opacity: 0.12;
            }
            33% {
                transform: translate(-60px, 70px) rotate(120deg);
                opacity: 0.17;
            }
            66% {
                transform: translate(50px, -60px) rotate(240deg);
                opacity: 0.14;
            }
        }

        @keyframes float-icon-5 {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
                opacity: 0.13;
            }
            50% {
                transform: translate(-70px, -80px) rotate(-180deg);
                opacity: 0.18;
            }
        }

        @keyframes float-icon-6 {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
                opacity: 0.12;
            }
            25% {
                transform: translate(60px, -70px) rotate(90deg);
                opacity: 0.17;
            }
            75% {
                transform: translate(-60px, 70px) rotate(270deg);
                opacity: 0.15;
            }
        }

        @keyframes float-icon-7 {
            0%, 100% {
                transform: translate(0, 0) scale(1);
                opacity: 0.13;
            }
            50% {
                transform: translate(90px, 80px) scale(0.9);
                opacity: 0.18;
            }
        }

        @keyframes float-icon-8 {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
                opacity: 0.12;
            }
            33% {
                transform: translate(-80px, 60px) rotate(-120deg);
                opacity: 0.17;
            }
            66% {
                transform: translate(60px, -80px) rotate(-240deg);
                opacity: 0.15;
            }
        }

        @keyframes float-icon-9 {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
                opacity: 0.13;
            }
            50% {
                transform: translate(-100px, -70px) rotate(180deg);
                opacity: 0.18;
            }
        }

        @keyframes float-icon-10 {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
                opacity: 0.12;
            }
            25% {
                transform: translate(70px, 90px) rotate(90deg);
                opacity: 0.17;
            }
            75% {
                transform: translate(-70px, -90px) rotate(270deg);
                opacity: 0.14;
            }
        }

        @keyframes float-icon-11 {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
                opacity: 0.13;
            }
            50% {
                transform: translate(85px, -75px) rotate(-180deg);
                opacity: 0.18;
            }
        }

        @keyframes float-icon-12 {
            0%, 100% {
                transform: translate(0, 0) scale(1) rotate(0deg);
                opacity: 0.12;
            }
            50% {
                transform: translate(-65px, 85px) scale(1.1) rotate(180deg);
                opacity: 0.17;
            }
        }

        @keyframes float-icon-13 {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
                opacity: 0.13;
            }
            50% {
                transform: translate(75px, -80px) rotate(-180deg);
                opacity: 0.18;
            }
        }

        @keyframes float-icon-14 {
            0%, 100% {
                transform: translate(0, 0) scale(1);
                opacity: 0.12;
            }
            50% {
                transform: translate(-80px, 70px) scale(1.05);
                opacity: 0.17;
            }
        }

        @keyframes float-icon-15 {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
                opacity: 0.13;
            }
            33% {
                transform: translate(65px, -75px) rotate(110deg);
                opacity: 0.18;
            }
            66% {
                transform: translate(-50px, 60px) rotate(220deg);
                opacity: 0.14;
            }
        }

        @keyframes float-icon-16 {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
                opacity: 0.12;
            }
            50% {
                transform: translate(-70px, -85px) rotate(-180deg);
                opacity: 0.17;
            }
        }

        @keyframes float-icon-17 {
            0%, 100% {
                transform: translate(0, 0) scale(1) rotate(0deg);
                opacity: 0.13;
            }
            50% {
                transform: translate(80px, 75px) scale(0.95) rotate(180deg);
                opacity: 0.18;
            }
        }

        @keyframes float-icon-18 {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
                opacity: 0.12;
            }
            25% {
                transform: translate(-75px, -70px) rotate(95deg);
                opacity: 0.17;
            }
            75% {
                transform: translate(65px, 80px) rotate(265deg);
                opacity: 0.14;
            }
        }

        @keyframes float-icon-19 {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
                opacity: 0.13;
            }
            50% {
                transform: translate(85px, -70px) rotate(-180deg);
                opacity: 0.18;
            }
        }

        @keyframes float-icon-20 {
            0%, 100% {
                transform: translate(0, 0) scale(1) rotate(0deg);
                opacity: 0.12;
            }
            50% {
                transform: translate(-70px, 90px) scale(1.1) rotate(180deg);
                opacity: 0.17;
            }
        }

        @keyframes float-icon-21 {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
                opacity: 0.13;
            }
            33% {
                transform: translate(70px, 65px) rotate(-100deg);
                opacity: 0.18;
            }
            66% {
                transform: translate(-60px, -75px) rotate(-200deg);
                opacity: 0.15;
            }
        }

        @keyframes float-icon-22 {
            0%, 100% {
                transform: translate(0, 0) scale(1);
                opacity: 0.12;
            }
            50% {
                transform: translate(-90px, -65px) scale(1.08);
                opacity: 0.17;
            }
        }

        /* Floating Particles */
        .floating-particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: var(--primary);
            border-radius: 50%;
            opacity: 0;
            animation: float-particle 15s ease-in-out infinite;
        }

        .floating-particle:nth-child(1) { left: 10%; animation-delay: 0s; }
        .floating-particle:nth-child(2) { left: 20%; animation-delay: 2s; }
        .floating-particle:nth-child(3) { left: 30%; animation-delay: 4s; }
        .floating-particle:nth-child(4) { left: 40%; animation-delay: 6s; }
        .floating-particle:nth-child(5) { left: 50%; animation-delay: 8s; }
        .floating-particle:nth-child(6) { left: 60%; animation-delay: 10s; }
        .floating-particle:nth-child(7) { left: 70%; animation-delay: 12s; }
        .floating-particle:nth-child(8) { left: 80%; animation-delay: 14s; }

        @keyframes float-particle {
            0% {
                bottom: -10px;
                opacity: 0;
                transform: translateX(0) scale(0);
            }
            10% {
                opacity: 0.6;
                transform: translateX(20px) scale(1);
            }
            90% {
                opacity: 0.6;
            }
            100% {
                bottom: 100%;
                opacity: 0;
                transform: translateX(-20px) scale(0);
            }
        }

        /* ============================================
           CONTENT CONTAINER
        ============================================ */
        .content-wrapper {
            max-width: 95%;
            width: 100%;
            margin: 0 auto;
            padding: 0 2.5rem;
            position: relative;
            z-index: 1;
        }

        /* Back to Blog Button - Glassmorphism */
        .back-to-blog-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.625rem;
            padding: 0.875rem 1.5rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 50px;
            color: var(--white);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9375rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            position: relative;
            overflow: hidden;
        }

        .back-to-blog-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .back-to-blog-btn:hover::before {
            opacity: 1;
        }

        .back-to-blog-btn span,
        .back-to-blog-btn i {
            position: relative;
            z-index: 1;
        }

        .back-to-blog-btn:hover {
            color: var(--white);
            text-decoration: none;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
            animation: none; /* Stop pulse animation on hover */
        }

        .back-to-blog-btn i {
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 1rem;
        }

        .back-to-blog-btn:hover i {
            transform: translateX(-5px);
        }

        .back-to-blog-btn:active {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        /* Breadcrumbs - Modern Style */
        .breadcrumbs {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 1.25rem 1.5rem;
            font-size: 0.875rem;
            color: var(--gray-600);
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(99, 102, 241, 0.1);
            border-radius: 16px;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-sm);
        }

        .breadcrumb-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .breadcrumb-item a {
            color: var(--gray-600);
            text-decoration: none;
            transition: all 0.2s;
            padding: 0.25rem 0.5rem;
            border-radius: 6px;
        }

        .breadcrumb-item a:hover {
            color: var(--primary);
            background: rgba(99, 102, 241, 0.05);
        }

        .breadcrumb-separator {
            color: var(--gray-400);
        }

        /* Three Column Grid Layout */
        .article-layout {
            display: grid;
            grid-template-columns: 300px 1fr 350px;
            gap: 2.5rem;
            align-items: start;
        }

        /* ============================================
           LEFT SIDEBAR - TABLE OF CONTENTS
        ============================================ */
        .toc-sidebar {
            position: sticky;
            top: 2rem;
            max-height: calc(100vh - 4rem);
            overflow-y: auto;
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(99, 102, 241, 0.1);
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: var(--shadow-md);
        }

        .toc-title {
            font-family: var(--font-display);
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--gray-900);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 1.25rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid rgba(99, 102, 241, 0.1);
        }

        .toc-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .toc-item {
            margin-bottom: 0.5rem;
        }

        .toc-link {
            display: block;
            color: var(--gray-600);
            text-decoration: none;
            font-size: 0.875rem;
            line-height: 1.5;
            padding: 0.5rem 0.75rem;
            padding-left: 1rem;
            border-left: 3px solid transparent;
            border-radius: 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .toc-link:hover,
        .toc-link.active {
            color: var(--primary);
            background: rgba(99, 102, 241, 0.05);
            border-left-color: var(--primary);
            transform: translateX(4px);
        }

        /* Latest Blogs Section in Left Sidebar */
        .latest-blogs-section {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 2px solid rgba(99, 102, 241, 0.1);
        }

        .latest-blogs-title {
            font-family: var(--font-display);
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--gray-800);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
        }

        .latest-blogs-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .latest-blog-item {
            display: flex;
            gap: 0.75rem;
            padding: 0.875rem;
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(99, 102, 241, 0.15);
            border-radius: 12px;
            text-decoration: none;
            color: var(--black);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .latest-blog-item:hover {
            background: rgba(255, 255, 255, 1);
            border-color: var(--primary);
            transform: translateX(4px);
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.15);
        }

        .blog-item-icon {
            flex-shrink: 0;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.1), rgba(99, 102, 241, 0.2));
            border-radius: 8px;
            color: var(--primary);
            font-size: 0.875rem;
        }

        .blog-item-content {
            flex: 1;
            min-width: 0;
        }

        .blog-item-title {
            font-size: 0.8125rem;
            font-weight: 600;
            color: var(--black);
            margin-bottom: 0.375rem;
            line-height: 1.4;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .blog-item-meta {
            font-size: 0.6875rem;
            color: var(--gray-600);
            display: flex;
            align-items: center;
            gap: 0.375rem;
        }

        .blog-item-author {
            font-weight: 500;
        }

        .blog-item-dot {
            color: var(--gray-400);
        }

        .blog-item-date {
            color: var(--gray-500);
        }

        .view-all-blogs {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1.25rem;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.1), rgba(99, 102, 241, 0.05));
            color: var(--primary);
            text-decoration: none;
            font-size: 0.8125rem;
            font-weight: 600;
            border-radius: 10px;
            border: 1px solid rgba(99, 102, 241, 0.2);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .view-all-blogs:hover {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.15), rgba(99, 102, 241, 0.1));
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.2);
        }

        .view-all-blogs i {
            transition: transform 0.3s ease;
        }

        .view-all-blogs:hover i {
            transform: translateX(4px);
        }

        /* ============================================
           CENTER COLUMN - MAIN ARTICLE
        ============================================ */
        .article-main {
            width: 100%;
            max-width: none;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(99, 102, 241, 0.1);
            border-radius: 24px;
            padding: 3rem;
            box-shadow: var(--shadow-lg);
            animation: fadeSlideUp 0.6s ease-out;
        }

        @keyframes fadeSlideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Featured Image */
        .featured-image-wrapper {
            width: 100%;
            max-height: 500px;
            overflow: hidden;
            border-radius: 16px;
            margin-bottom: 2.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            position: relative;
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .featured-image {
            width: 100%;
            height: auto;
            display: block;
            object-fit: cover;
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .featured-image-wrapper:hover .featured-image {
            transform: scale(1.05);
        }

        .article-title {
            font-family: var(--font-display);
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--gray-900) 0%, var(--primary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.3;
            margin-bottom: 1.25rem;
            letter-spacing: -0.02em;
        }

        .article-subtitle {
            font-size: 1.25rem;
            color: var(--gray-600);
            line-height: 1.6;
            margin-bottom: 2rem;
            font-style: italic;
        }

        /* Meta Info */
        .meta-info {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
            padding-bottom: 2rem;
            margin-bottom: 2rem;
            border-bottom: 1px solid var(--gray-200);
            font-size: 0.875rem;
            color: var(--gray-600);
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .meta-item i {
            color: var(--gray-500);
        }

        .divider {
            width: 3px;
            height: 3px;
            background: var(--gray-400);
            border-radius: 50%;
        }

        /* Tags - Modern Pill Design */
        .tags-list {
            display: flex;
            flex-wrap: wrap;
            gap: 0.625rem;
            margin-bottom: 2.5rem;
        }

        .tag {
            display: inline-flex;
            padding: 0.5rem 1rem;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.1), rgba(139, 92, 246, 0.1));
            border: 1px solid rgba(99, 102, 241, 0.2);
            border-radius: 50px;
            color: var(--primary);
            font-size: 0.8125rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .tag:hover {
            background: var(--gradient-primary);
            border-color: transparent;
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
        }

        /* Article Content */
        .article-body {
            color: var(--black);
            font-size: 1rem;
            line-height: 1.7;
        }

        .article-body h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--black);
            margin-top: 2.5rem;
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .article-body h3 {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--black);
            margin-top: 2rem;
            margin-bottom: 0.875rem;
        }

        .article-body p {
            margin-bottom: 1.5rem;
            color: var(--gray-800);
        }

        .article-body ul,
        .article-body ol {
            margin: 1.5rem 0;
            padding-left: 1.75rem;
            color: var(--gray-800);
        }

        .article-body li {
            margin-bottom: 0.5rem;
        }

        .article-body blockquote {
            margin: 2rem 0;
            padding: 1.25rem 1.5rem;
            background: var(--gray-50);
            border-left: 3px solid var(--black);
            font-style: italic;
            color: var(--gray-700);
        }

        .article-body code {
            padding: 0.125rem 0.375rem;
            background: var(--gray-100);
            font-family: 'Monaco', 'Courier New', monospace;
            font-size: 0.9em;
            color: var(--gray-900);
        }

        .article-body pre {
            background: var(--gray-900);
            color: var(--gray-100);
            padding: 1.5rem;
            overflow-x: auto;
            margin: 2rem 0;
        }

        .article-body pre code {
            background: none;
            color: var(--gray-100);
            padding: 0;
        }

        .article-body img {
            max-width: 100%;
            height: auto;
            margin: 2.5rem 0;
        }

        /* Attachments */
        .attachments-section {
            padding: 2rem 0;
            margin-top: 2rem;
            border-top: 1px solid var(--gray-200);
        }

        .section-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--black);
            margin-bottom: 1rem;
        }

        .attachment-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem;
            background: var(--gray-50);
            margin-bottom: 0.5rem;
            text-decoration: none;
            color: var(--gray-900);
            transition: background 0.2s;
        }

        .attachment-item:hover {
            background: var(--gray-100);
            text-decoration: none;
            color: var(--gray-900);
        }

        .attachment-icon {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--white);
            color: var(--gray-600);
            font-size: 1rem;
        }

        .attachment-info {
            flex: 1;
        }

        .attachment-name {
            font-weight: 500;
            font-size: 0.875rem;
        }

        .attachment-size {
            font-size: 0.75rem;
            color: var(--gray-500);
        }

        /* Article Footer Actions */
        .article-footer {
            padding: 2rem 0;
            margin-top: 2rem;
            border-top: 1px solid var(--gray-200);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .share-section {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .share-label {
            font-weight: 500;
            color: var(--gray-700);
            font-size: 0.875rem;
        }

        .share-btns {
            display: flex;
            gap: 0.5rem;
        }

        .share-btn {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--gray-300);
            background: var(--white);
            color: var(--gray-600);
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
        }

        .share-btn:hover {
            background: var(--gray-100);
            border-color: var(--gray-400);
        }

        .action-btns {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
            padding: 0.5rem 1rem;
            font-weight: 500;
            font-size: 0.875rem;
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-edit {
            background: var(--primary);
            color: var(--white);
            border: 1px solid var(--primary);
        }

        .btn-edit:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
            text-decoration: none;
            color: var(--white);
        }

        .btn-delete {
            background: var(--white);
            color: #dc2626;
            border: 1px solid var(--gray-300);
        }

        .btn-delete:hover {
            background: #dc2626;
            color: var(--white);
            border-color: #dc2626;
            text-decoration: none;
        }

        /* ============================================
           RIGHT SIDEBAR
        ============================================ */
        .right-sidebar {
            position: sticky;
            top: 2rem;
        }

        .sidebar-card {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(99, 102, 241, 0.1);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow-md);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar-card:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-4px);
        }

        .sidebar-card-title {
            font-family: var(--font-display);
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--gray-900);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid rgba(99, 102, 241, 0.1);
        }

        /* Author Card */
        .author-card {
            text-align: center;
        }

        .author-avatar-large {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin: 0 auto 1rem;
            object-fit: cover;
            border: 3px solid rgba(99, 102, 241, 0.2);
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.15);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .author-avatar-large:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.25);
        }

        .author-name-large {
            font-family: var(--font-display);
            font-weight: 700;
            color: var(--gray-900);
            font-size: 1.125rem;
            margin-bottom: 0.5rem;
        }

        .author-name-large a {
            color: var(--gray-900);
            text-decoration: none;
            transition: all 0.2s;
        }

        .author-name-large a:hover {
            color: var(--primary);
        }

        .author-date {
            font-size: 0.875rem;
            color: var(--gray-600);
        }

        /* Related Posts in Sidebar */
        .related-posts-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .related-post-item {
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--gray-200);
        }

        .related-post-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .related-post-link {
            text-decoration: none;
            color: var(--black);
            display: block;
        }

        .related-post-title {
            font-size: 0.9375rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--black);
            line-height: 1.4;
        }

        .related-post-link:hover .related-post-title {
            color: var(--primary);
        }

        .related-post-meta {
            font-size: 0.75rem;
            color: var(--gray-600);
        }

        /* Upskill Now Card */
        .upskill-card {
            background: linear-gradient(135deg, rgba(90, 79, 207, 0.05) 0%, rgba(78, 159, 255, 0.05) 100%);
            border: 2px solid rgba(90, 79, 207, 0.2);
        }

        .upskill-description {
            font-size: 0.875rem;
            color: var(--gray-600);
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .courses-list {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .course-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.875rem;
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(90, 79, 207, 0.15);
            border-radius: 12px;
            text-decoration: none;
            color: var(--black);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .course-item:hover {
            background: rgba(255, 255, 255, 1);
            border-color: #5A4FCF;
            transform: translateX(4px);
            box-shadow: 0 4px 12px rgba(90, 79, 207, 0.15);
        }

        .course-icon {
            flex-shrink: 0;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #5A4FCF 0%, #4E9FFF 100%);
            border-radius: 10px;
            color: white;
            font-size: 1.125rem;
        }

        .course-info {
            flex: 1;
            min-width: 0;
        }

        .course-name {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--black);
            margin-bottom: 0.25rem;
            line-height: 1.4;
        }

        .course-summary {
            font-size: 0.75rem;
            color: var(--gray-600);
            line-height: 1.4;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .course-arrow {
            flex-shrink: 0;
            color: var(--gray-400);
            font-size: 0.875rem;
            transition: all 0.3s ease;
        }

        .course-item:hover .course-arrow {
            color: #5A4FCF;
            transform: translateX(4px);
        }

        .view-all-courses {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.875rem 1.5rem;
            background: linear-gradient(135deg, #5A4FCF 0%, #4E9FFF 100%);
            color: white;
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .view-all-courses:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(90, 79, 207, 0.3);
        }

        .view-all-courses i {
            transition: transform 0.3s ease;
        }

        .view-all-courses:hover i {
            transform: translateX(4px);
        }

        /* Loading State */
        .loading-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 60vh;
            gap: 1rem;
        }

        .loader {
            width: 48px;
            height: 48px;
            border: 3px solid var(--gray-200);
            border-top-color: var(--primary);
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .loading-text {
            color: var(--gray-600);
            font-size: 1rem;
        }

        /* Error State */
        .error-state {
            background: var(--gray-50);
            padding: 3rem;
            text-align: center;
            max-width: 600px;
            margin: 0 auto;
        }

        .error-icon {
            font-size: 3rem;
            color: #dc2626;
            margin-bottom: 1rem;
        }

        .error-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--black);
            margin-bottom: 0.75rem;
        }

        .error-msg {
            color: var(--gray-700);
            margin-bottom: 1.5rem;
        }

        .back-to-blog {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.25rem;
            background: var(--primary);
            color: var(--white);
            text-decoration: none;
            font-weight: 500;
            transition: background 0.2s;
        }

        .back-to-blog:hover {
            background: var(--primary-dark);
            color: var(--white);
            text-decoration: none;
        }

        /* Toast */
        .toast {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            background: var(--black);
            color: var(--white);
            padding: 0.875rem 1.25rem;
            box-shadow: var(--shadow-md);
            display: flex;
            align-items: center;
            gap: 0.625rem;
            font-size: 0.875rem;
            animation: slideInRight 0.3s ease, slideOutRight 0.3s ease 2.7s;
            z-index: 9999;
        }

        @keyframes slideInRight {
            from {
                transform: translateX(400px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOutRight {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(400px);
                opacity: 0;
            }
        }

        /* Responsive Design - Progressive Enhancement */

        /* Large Tablets and Small Laptops (1200px and below) */
        @media (max-width: 1200px) {
            .content-wrapper {
                max-width: 100%;
                padding: 0 2rem;
            }

            .article-layout {
                grid-template-columns: 250px 1fr 300px;
                gap: 2rem;
            }

            .toc-sidebar {
                padding: 1.25rem;
            }

            .right-sidebar .sidebar-card {
                padding: 1.5rem;
            }
        }

        /* Tablets (1024px and below) */
        @media (max-width: 1024px) {
            #aiApp {
                padding: 100px 0 80px !important;
            }

            .content-wrapper {
                padding: 0 1.75rem;
            }

            /* Stack layout - hide sidebars */
            .article-layout {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .toc-sidebar,
            .right-sidebar {
                display: none;
            }

            .article-main {
                max-width: 100%;
                padding: 2.5rem;
            }

            /* Reduce animation complexity on tablets */
            .ai-icon {
                font-size: 2.5rem;
                opacity: 0.15;
            }

            .gradient-orb {
                filter: blur(60px);
            }
        }

        /* Small Tablets (768px and below) */
        @media (max-width: 768px) {
            #aiApp {
                padding: 90px 0 80px !important;
            }

            .content-wrapper {
                padding: 0 1.25rem;
                max-width: 100%;
            }

            /* Back to blog button */
            .back-to-blog-btn {
                font-size: 0.8125rem;
                padding: 0.625rem 1rem;
                margin-bottom: 1rem;
            }

            /* Breadcrumbs */
            .breadcrumbs {
                padding: 0.875rem 1rem;
                font-size: 0.75rem;
                margin-bottom: 1.5rem;
                flex-wrap: wrap;
            }

            .breadcrumb-separator {
                margin: 0 0.25rem;
            }

            /* Article main */
            .article-main {
                padding: 2rem 1.5rem;
                border-radius: 20px;
            }

            /* Featured image */
            .featured-image-wrapper {
                max-height: 350px;
                margin-bottom: 2rem;
                border-radius: 12px;
            }

            /* Typography */
            .article-title {
                font-size: 1.75rem;
                margin-bottom: 1rem;
                line-height: 1.25;
            }

            .article-subtitle {
                font-size: 1.0625rem;
                margin-bottom: 1.5rem;
            }

            .article-body {
                font-size: 0.9375rem;
                line-height: 1.65;
            }

            .article-body h2 {
                font-size: 1.375rem;
                margin-top: 2rem;
                margin-bottom: 0.875rem;
            }

            .article-body h3 {
                font-size: 1.125rem;
                margin-top: 1.5rem;
                margin-bottom: 0.75rem;
            }

            .article-body img {
                margin: 1.5rem 0;
                border-radius: 8px;
            }

            .article-body pre {
                padding: 1.25rem;
                margin: 1.5rem 0;
                border-radius: 8px;
                font-size: 0.875rem;
                overflow-x: auto;
            }

            .article-body blockquote {
                margin: 1.5rem 0;
                padding: 1rem 1.25rem;
            }

            /* Meta info */
            .meta-info {
                gap: 0.75rem;
                font-size: 0.8125rem;
                padding-bottom: 1.5rem;
                margin-bottom: 1.5rem;
                flex-wrap: wrap;
            }

            .meta-item {
                gap: 0.375rem;
            }

            .divider {
                display: none;
            }

            /* Tags */
            .tags-list {
                gap: 0.5rem;
                margin-bottom: 2rem;
            }

            .tag {
                padding: 0.375rem 0.875rem;
                font-size: 0.75rem;
            }

            /* Article footer */
            .article-footer {
                flex-direction: column;
                align-items: flex-start;
                gap: 1.25rem;
                padding: 1.5rem 0;
                margin-top: 1.5rem;
            }

            .share-section {
                width: 100%;
                flex-wrap: wrap;
                gap: 0.625rem;
            }

            .share-label {
                width: 100%;
                margin-bottom: 0.25rem;
            }

            .share-btns {
                gap: 0.625rem;
            }

            .share-btn {
                width: 40px;
                height: 40px;
                border-radius: 8px;
            }

            .action-btns {
                width: 100%;
                gap: 0.75rem;
            }

            .action-btn {
                flex: 1;
                justify-content: center;
                padding: 0.625rem 1rem;
                border-radius: 8px;
            }

            /* Attachments */
            .attachments-section {
                padding: 1.5rem 0;
                margin-top: 1.5rem;
            }

            .section-title {
                font-size: 1rem;
                margin-bottom: 0.875rem;
            }

            .attachment-item {
                padding: 0.875rem;
                border-radius: 8px;
            }

            /* Toast */
            .toast {
                bottom: 1.5rem;
                right: 1.5rem;
                left: 1.5rem;
                padding: 0.75rem 1rem;
                font-size: 0.8125rem;
                border-radius: 8px;
            }

            /* Background elements - reduce */
            .ai-icon {
                font-size: 2rem;
                opacity: 0.12;
            }

            .gradient-orb {
                filter: blur(50px);
            }

            .floating-particle {
                display: none;
            }
        }

        /* Mobile (480px and below) */
        @media (max-width: 480px) {
            #aiApp {
                padding: 80px 0 80px !important;
            }

            .content-wrapper {
                padding: 0 1rem;
            }

            /* Back button */
            .back-to-blog-btn {
                font-size: 0.75rem;
                padding: 0.5rem 0.875rem;
                gap: 0.375rem;
            }

            /* Breadcrumbs - more compact */
            .breadcrumbs {
                padding: 0.75rem 0.875rem;
                font-size: 0.6875rem;
                border-radius: 12px;
                margin-bottom: 1.25rem;
            }

            .breadcrumb-item {
                gap: 0.375rem;
            }

            .breadcrumb-item i {
                font-size: 0.75rem;
            }

            /* Article main */
            .article-main {
                padding: 1.5rem 1.25rem;
                border-radius: 16px;
            }

            /* Featured image */
            .featured-image-wrapper {
                max-height: 250px;
                margin-bottom: 1.5rem;
                border-radius: 10px;
            }

            /* Typography - smaller for mobile */
            .article-title {
                font-size: 1.5rem;
                margin-bottom: 0.875rem;
                line-height: 1.2;
                letter-spacing: -0.01em;
            }

            .article-subtitle {
                font-size: 1rem;
                margin-bottom: 1.25rem;
            }

            .article-body {
                font-size: 0.875rem;
                line-height: 1.6;
            }

            .article-body h2 {
                font-size: 1.25rem;
                margin-top: 1.75rem;
                margin-bottom: 0.75rem;
            }

            .article-body h3 {
                font-size: 1.0625rem;
                margin-top: 1.25rem;
                margin-bottom: 0.625rem;
            }

            .article-body p {
                margin-bottom: 1.25rem;
            }

            .article-body ul,
            .article-body ol {
                margin: 1.25rem 0;
                padding-left: 1.5rem;
            }

            .article-body img {
                margin: 1.25rem 0;
                border-radius: 6px;
            }

            .article-body pre {
                padding: 1rem;
                margin: 1.25rem 0;
                font-size: 0.8125rem;
            }

            .article-body code {
                padding: 0.125rem 0.3125rem;
                font-size: 0.875em;
            }

            .article-body blockquote {
                margin: 1.25rem 0;
                padding: 0.875rem 1rem;
                border-left-width: 2px;
            }

            /* Meta info */
            .meta-info {
                gap: 0.625rem;
                font-size: 0.75rem;
                padding-bottom: 1.25rem;
                margin-bottom: 1.25rem;
            }

            /* Tags */
            .tags-list {
                gap: 0.4375rem;
                margin-bottom: 1.75rem;
            }

            .tag {
                padding: 0.3125rem 0.75rem;
                font-size: 0.6875rem;
                border-radius: 40px;
            }

            /* Article footer */
            .article-footer {
                gap: 1rem;
                padding: 1.25rem 0;
                margin-top: 1.25rem;
            }

            .share-section {
                gap: 0.5rem;
            }

            .share-btns {
                gap: 0.5rem;
                flex-wrap: wrap;
            }

            .share-btn {
                width: 36px;
                height: 36px;
                font-size: 0.875rem;
            }

            .action-btn {
                padding: 0.5rem 0.875rem;
                font-size: 0.8125rem;
                gap: 0.3125rem;
            }

            /* Attachments */
            .attachment-item {
                padding: 0.75rem;
                gap: 0.625rem;
            }

            .attachment-icon {
                width: 32px;
                height: 32px;
                font-size: 0.875rem;
            }

            .attachment-name {
                font-size: 0.8125rem;
            }

            .attachment-size {
                font-size: 0.6875rem;
            }

            /* Error and loading states */
            .loading-state {
                min-height: 50vh;
                padding: 2rem 1rem;
            }

            .loader {
                width: 40px;
                height: 40px;
            }

            .loading-text {
                font-size: 0.9375rem;
            }

            .error-state {
                padding: 2rem 1.5rem;
                border-radius: 12px;
            }

            .error-icon {
                font-size: 2.5rem;
            }

            .error-title {
                font-size: 1.25rem;
                margin-bottom: 0.625rem;
            }

            .error-msg {
                font-size: 0.875rem;
                margin-bottom: 1.25rem;
            }

            .back-to-blog {
                padding: 0.625rem 1rem;
                font-size: 0.875rem;
                border-radius: 8px;
            }

            /* Toast */
            .toast {
                bottom: 1rem;
                right: 1rem;
                left: 1rem;
                padding: 0.625rem 0.875rem;
                font-size: 0.75rem;
                border-radius: 6px;
            }

            /* Background - minimal on mobile */
            .ai-icon {
                font-size: 1.5rem;
                opacity: 0.1;
            }

            .gradient-orb {
                filter: blur(40px);
                opacity: 0.4;
            }

            .gradient-orb-1,
            .gradient-orb-2,
            .gradient-orb-3 {
                width: 300px;
                height: 300px;
            }
        }

        /* Extra small devices (375px and below) */
        @media (max-width: 375px) {
            .content-wrapper {
                padding: 0 0.875rem;
            }

            .article-main {
                padding: 1.25rem 1rem;
            }

            .article-title {
                font-size: 1.375rem;
            }

            .article-body {
                font-size: 0.8125rem;
            }

            .article-body h2 {
                font-size: 1.125rem;
            }

            .article-body h3 {
                font-size: 1rem;
            }

            .breadcrumbs {
                padding: 0.625rem 0.75rem;
            }

            .featured-image-wrapper {
                max-height: 200px;
                border-radius: 8px;
            }
        }

        /* ============================================
           MOTION GRAPHICS & SCROLL ANIMATIONS
        ============================================ */

        /* Scroll Reveal Classes - Enhanced Motion Graphics */
        .scroll-reveal {
            opacity: 0;
            transform: translateY(60px);
            transition: opacity 1s cubic-bezier(0.16, 1, 0.3, 1),
                        transform 1s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .scroll-reveal.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        .scroll-reveal-left {
            opacity: 0;
            transform: translateX(-80px) scale(0.95);
            transition: opacity 1.2s cubic-bezier(0.16, 1, 0.3, 1),
                        transform 1.2s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .scroll-reveal-left.revealed {
            opacity: 1;
            transform: translateX(0) scale(1);
        }

        .scroll-reveal-right {
            opacity: 0;
            transform: translateX(80px) scale(0.95) rotate(5deg);
            transition: opacity 1.2s cubic-bezier(0.16, 1, 0.3, 1),
                        transform 1.2s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .scroll-reveal-right.revealed {
            opacity: 1;
            transform: translateX(0) scale(1) rotate(0deg);
        }

        .scroll-reveal-scale {
            opacity: 0;
            transform: scale(0.8) translateY(40px);
            transition: opacity 1s cubic-bezier(0.16, 1, 0.3, 1),
                        transform 1s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .scroll-reveal-scale.revealed {
            opacity: 1;
            transform: scale(1) translateY(0);
        }

        .scroll-reveal-fade {
            opacity: 0;
            transition: opacity 1.2s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .scroll-reveal-fade.revealed {
            opacity: 1;
        }

        /* Stagger Animation Delays */
        .scroll-reveal:nth-child(1) { transition-delay: 0.1s; }
        .scroll-reveal:nth-child(2) { transition-delay: 0.2s; }
        .scroll-reveal:nth-child(3) { transition-delay: 0.3s; }
        .scroll-reveal:nth-child(4) { transition-delay: 0.4s; }
        .scroll-reveal:nth-child(5) { transition-delay: 0.5s; }
        .scroll-reveal:nth-child(6) { transition-delay: 0.6s; }
        .scroll-reveal:nth-child(7) { transition-delay: 0.7s; }
        .scroll-reveal:nth-child(8) { transition-delay: 0.8s; }

        /* Entrance Animations - Enhanced */
        .back-to-blog-btn {
            animation: slideInGlow 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.1s both,
                       subtlePulse 2s ease-in-out 1s infinite;
        }

        @keyframes slideInGlow {
            from {
                opacity: 0;
                transform: translateX(-40px);
                box-shadow: 0 0 0 rgba(102, 126, 234, 0);
            }
            to {
                opacity: 1;
                transform: translateX(0);
                box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            }
        }

        @keyframes subtlePulse {
            0%, 100% {
                box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            }
            50% {
                box-shadow: 0 4px 20px rgba(102, 126, 234, 0.5);
            }
        }

        .breadcrumbs {
            animation: slideInFromLeft 0.6s cubic-bezier(0.16, 1, 0.3, 1) 0.2s both;
        }

        .toc-sidebar {
            animation: slideInFromLeft 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.3s both;
        }

        .right-sidebar {
            animation: slideInFromRight 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.3s both;
        }

        @keyframes slideInFromLeft {
            from {
                opacity: 0;
                transform: translateX(-60px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInFromRight {
            from {
                opacity: 0;
                transform: translateX(60px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Featured Image Parallax Effect */
        .featured-image-wrapper {
            will-change: transform;
            transition: transform 0.1s ease-out;
        }

        /* Article Title Gradient Animation */
        .article-title {
            background-size: 200% 200%;
            animation: gradientShift 8s ease infinite;
        }

        @keyframes gradientShift {
            0%, 100% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
        }

        /* Tag Stagger Animation */
        .tag {
            animation: fadeInScale 0.5s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        .tag:nth-child(1) { animation-delay: 0.5s; }
        .tag:nth-child(2) { animation-delay: 0.6s; }
        .tag:nth-child(3) { animation-delay: 0.7s; }
        .tag:nth-child(4) { animation-delay: 0.8s; }
        .tag:nth-child(5) { animation-delay: 0.9s; }

        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.8) translateY(10px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        /* Meta Items Animation */
        .meta-item {
            animation: slideInFromBottom 0.5s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        .meta-item:nth-child(1) { animation-delay: 0.4s; }
        .meta-item:nth-child(2) { animation-delay: 0.5s; }
        .meta-item:nth-child(3) { animation-delay: 0.6s; }
        .meta-item:nth-child(4) { animation-delay: 0.7s; }

        @keyframes slideInFromBottom {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Share Buttons Hover Animation */
        .share-btn {
            position: relative;
            overflow: hidden;
        }

        .share-btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(99, 102, 241, 0.1);
            transform: translate(-50%, -50%);
            transition: width 0.4s ease, height 0.4s ease;
        }

        .share-btn:hover::before {
            width: 200%;
            height: 200%;
        }

        /* Related Posts Cascade Animation */
        .related-post-item {
            animation: fadeInSlideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        .related-post-item:nth-child(1) { animation-delay: 0.1s; }
        .related-post-item:nth-child(2) { animation-delay: 0.2s; }
        .related-post-item:nth-child(3) { animation-delay: 0.3s; }

        @keyframes fadeInSlideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Attachment Items Stagger */
        .attachment-item {
            animation: slideInFromLeft 0.5s cubic-bezier(0.16, 1, 0.3, 1) both;
            transform-origin: left center;
        }

        .attachment-item:nth-child(1) { animation-delay: 0.1s; }
        .attachment-item:nth-child(2) { animation-delay: 0.2s; }
        .attachment-item:nth-child(3) { animation-delay: 0.3s; }
        .attachment-item:nth-child(4) { animation-delay: 0.4s; }

        /* Hover Lift Effect for Cards */
        .sidebar-card,
        .toc-sidebar,
        .article-main {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar-card:hover {
            transform: translateY(-8px) scale(1.02);
        }

        /* Action Buttons Pulse on Hover */
        .action-btn {
            position: relative;
            overflow: hidden;
        }

        .action-btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.5s ease, height 0.5s ease;
        }

        .action-btn:hover::after {
            width: 300%;
            height: 300%;
        }

        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Progress Bar (optional) */
        .reading-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
            z-index: 9999;
            transition: width 0.1s ease-out;
            box-shadow: 0 2px 8px rgba(99, 102, 241, 0.4);
        }

        /* Accessibility */
        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }

            .scroll-reveal,
            .scroll-reveal-left,
            .scroll-reveal-right,
            .scroll-reveal-scale,
            .scroll-reveal-fade {
                opacity: 1 !important;
                transform: none !important;
            }
        }

        *:focus-visible {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }
    </style>
</head>
<body>
    <div id="aiApp">
        <!-- Reading Progress Bar -->
        <div class="reading-progress"></div>

        <!-- Animated Background -->
        <div class="animated-bg">
            <!-- Gradient Orbs -->
            <div class="gradient-orb gradient-orb-1"></div>
            <div class="gradient-orb gradient-orb-2"></div>
            <div class="gradient-orb gradient-orb-3"></div>

            <!-- AI Tool Icons - Floating Around -->
            <i class="ai-icon fas fa-robot"></i>
            <i class="ai-icon fas fa-brain"></i>
            <i class="ai-icon fas fa-microchip"></i>
            <i class="ai-icon fas fa-code"></i>
            <i class="ai-icon fas fa-network-wired"></i>
            <i class="ai-icon fas fa-cogs"></i>
            <i class="ai-icon fas fa-lightbulb"></i>
            <i class="ai-icon fas fa-rocket"></i>
            <i class="ai-icon fas fa-atom"></i>
            <i class="ai-icon fas fa-project-diagram"></i>
            <i class="ai-icon fas fa-laptop-code"></i>
            <i class="ai-icon fas fa-database"></i>
            <i class="ai-icon fas fa-cloud"></i>
            <i class="ai-icon fas fa-server"></i>
            <i class="ai-icon fas fa-wifi"></i>
            <i class="ai-icon fas fa-chart-line"></i>
            <i class="ai-icon fas fa-shield-halved"></i>
            <i class="ai-icon fas fa-cubes"></i>
            <i class="ai-icon fas fa-memory"></i>
            <i class="ai-icon fas fa-sitemap"></i>
            <i class="ai-icon fas fa-layer-group"></i>
            <i class="ai-icon fas fa-circle-nodes"></i>

            <!-- Floating Particles -->
            <div class="floating-particle"></div>
            <div class="floating-particle"></div>
            <div class="floating-particle"></div>
            <div class="floating-particle"></div>
            <div class="floating-particle"></div>
            <div class="floating-particle"></div>
            <div class="floating-particle"></div>
            <div class="floating-particle"></div>
        </div>

        <div class="content-wrapper">
            <!-- Back to Blog Button -->
            <a href="<?php echo $CFG->wwwroot; ?>/blog/list.php" class="back-to-blog-btn">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Blog</span>
            </a>

            <!-- Breadcrumbs -->
            <nav class="breadcrumbs">
                <div class="breadcrumb-item">
                    <a href="<?php echo $CFG->wwwroot; ?>"><i class="fas fa-home"></i> Home</a>
                </div>
                <span class="breadcrumb-separator">/</span>
                <div class="breadcrumb-item">
                    <a href="<?php echo $CFG->wwwroot; ?>/blog/list.php">Blog</a>
                </div>
                <span class="breadcrumb-separator">/</span>
                <div class="breadcrumb-item">
                    <span v-if="entry">{{ entry.subject }}</span>
                    <span v-else>Article</span>
                </div>
            </nav>

            <!-- Loading State -->
            <div v-if="loading" class="loading-state">
                <div class="loader"></div>
                <div class="loading-text">Loading article...</div>
            </div>

            <!-- Error State -->
            <div v-else-if="error" class="error-state">
                <div class="error-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <h2 class="error-title">Oops! Something went wrong</h2>
                <p class="error-msg">{{ error }}</p>
                <a href="<?php echo $CFG->wwwroot; ?>/blog/list.php" class="back-to-blog">
                    <i class="fas fa-arrow-left"></i>
                    <span>Back to Blog</span>
                </a>
            </div>

            <!-- Three Column Article Layout -->
            <div v-else-if="entry" class="article-layout">
                <!-- Left Sidebar - Table of Contents -->
                <aside class="toc-sidebar scroll-reveal-left">
                    <div class="toc-title">Contents</div>
                    <ul class="toc-list">
                        <li class="toc-item">
                            <a href="#introduction" class="toc-link">Introduction</a>
                        </li>
                        <li class="toc-item">
                            <a href="#main-content" class="toc-link">Main Content</a>
                        </li>
                        <li class="toc-item">
                            <a href="#attachments" class="toc-link" v-if="entry.attachments && entry.attachments.length > 0">Attachments</a>
                        </li>
                    </ul>

                    <!-- Latest Blogs Section -->
                    <div class="latest-blogs-section">
                        <div class="latest-blogs-title">
                            <i class="fas fa-newspaper" style="margin-right: 8px; color: #5A4FCF;"></i>
                            Latest Blogs
                        </div>
                        <div class="latest-blogs-list">
                            <a v-for="blog in latestBlogs" :key="blog.id" :href="blog.url" class="latest-blog-item">
                                <div class="blog-item-icon">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <div class="blog-item-content">
                                    <div class="blog-item-title">{{ blog.subject }}</div>
                                    <div class="blog-item-meta">
                                        <span class="blog-item-author">{{ blog.author }}</span>
                                        <span class="blog-item-dot">•</span>
                                        <span class="blog-item-date">{{ blog.created }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <a href="<?php echo $CFG->wwwroot; ?>/blog/list.php" class="view-all-blogs">
                            View All Blogs
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </aside>

                <!-- Center Column - Main Article -->
                <article class="article-main">
                    <!-- Featured Image -->
                    <div v-if="entry.featuredimage" class="featured-image-wrapper">
                        <img :src="entry.featuredimage" :alt="entry.subject" class="featured-image">
                    </div>

                    <h1 class="article-title scroll-reveal">{{ entry.subject }}</h1>

                    <!-- Meta Info -->
                    <div class="meta-info scroll-reveal-fade">
                        <div class="meta-item">
                            <i class="far fa-user"></i>
                            <span>{{ entry.author.fullname }}</span>
                        </div>
                        <span class="divider"></span>
                        <div class="meta-item">
                            <i class="far fa-calendar"></i>
                            <span>{{ entry.created }}</span>
                        </div>
                        <span class="divider" v-if="entry.commentscount > 0"></span>
                        <div class="meta-item" v-if="entry.commentscount > 0">
                            <i class="far fa-comments"></i>
                            <span>{{ entry.commentscount }} {{ entry.commentscount === 1 ? 'Comment' : 'Comments' }}</span>
                        </div>
                    </div>

                    <!-- Tags -->
                    <div class="tags-list scroll-reveal-fade" v-if="entry.tags && entry.tags.length > 0">
                        <span v-for="tag in entry.tags" :key="tag" class="tag">{{ tag }}</span>
                    </div>

                    <!-- Content -->
                    <div class="article-body scroll-reveal" v-html="entry.content"></div>

                    <!-- Attachments -->
                    <div v-if="entry.attachments && entry.attachments.length > 0" class="attachments-section scroll-reveal-scale" id="attachments">
                        <h3 class="section-title">Attachments</h3>
                        <a v-for="attachment in entry.attachments"
                           :key="attachment.filename"
                           :href="attachment.url"
                           class="attachment-item"
                           target="_blank">
                            <div class="attachment-icon">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <div class="attachment-info">
                                <div class="attachment-name">{{ attachment.filename }}</div>
                                <div class="attachment-size">{{ formatFileSize(attachment.filesize) }}</div>
                            </div>
                            <i class="fas fa-download" style="color: var(--gray-500);"></i>
                        </a>
                    </div>

                    <!-- Footer -->
                    <footer class="article-footer scroll-reveal">
                        <div class="share-section">
                            <span class="share-label">Share:</span>
                            <div class="share-btns">
                                <a :href="getTwitterShareUrl()" target="_blank" class="share-btn" title="Twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a :href="getFacebookShareUrl()" target="_blank" class="share-btn" title="Facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a :href="getLinkedInShareUrl()" target="_blank" class="share-btn" title="LinkedIn">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <button @click="copyLink" class="share-btn" title="Copy link">
                                    <i class="fas fa-link"></i>
                                </button>
                            </div>
                        </div>

                        <div class="action-btns" v-if="entry.canEdit">
                            <a :href="entry.editurl" class="action-btn btn-edit">
                                <i class="fas fa-edit"></i>
                                <span>Edit</span>
                            </a>
                            <a :href="entry.deleteurl" class="action-btn btn-delete">
                                <i class="fas fa-trash-alt"></i>
                                <span>Delete</span>
                            </a>
                        </div>
                    </footer>
                </article>

                <!-- Right Sidebar -->
                <aside class="right-sidebar">
                    <!-- Author Card -->
                    <div class="sidebar-card author-card scroll-reveal-right">
                        <div class="sidebar-card-title">Author</div>
                        <img :src="entry.author.pictureurl" :alt="entry.author.fullname" class="author-avatar-large">
                        <div class="author-name-large">
                            <a :href="entry.author.profileurl" target="_blank">{{ entry.author.fullname }}</a>
                        </div>
                        <div class="author-date">Published {{ entry.created }}</div>
                    </div>

                    <!-- Related Posts -->
                    <div v-if="relatedPosts && relatedPosts.length > 0" class="sidebar-card scroll-reveal-right">
                        <div class="sidebar-card-title">Related Articles</div>
                        <ul class="related-posts-list">
                            <li v-for="post in relatedPosts" :key="post.id" class="related-post-item">
                                <a :href="post.url" class="related-post-link">
                                    <div class="related-post-title">{{ post.subject }}</div>
                                    <div class="related-post-meta">{{ post.created }}</div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Upskill Now -->
                    <div class="sidebar-card upskill-card scroll-reveal-right">
                        <div class="sidebar-card-title">
                            <i class="fas fa-rocket" style="margin-right: 8px; color: #5A4FCF;"></i>
                            Upskill Now
                        </div>
                        <p class="upskill-description">Explore our latest courses and boost your skills</p>
                        <div class="courses-list">
                            <a v-for="course in courses" :key="course.id" :href="course.url" class="course-item">
                                <div class="course-icon">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                                <div class="course-info">
                                    <div class="course-name">{{ course.name }}</div>
                                    <div class="course-summary" v-if="course.summary">{{ truncate(course.summary, 60) }}</div>
                                </div>
                                <i class="fas fa-arrow-right course-arrow"></i>
                            </a>
                        </div>
                        <a href="<?php echo $CFG->wwwroot; ?>/course/" class="view-all-courses">
                            View All Courses
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </aside>
            </div>
        </div>

        <!-- Toast -->
        <div v-if="showToast" class="toast">
            <i class="fas fa-check-circle"></i>
            <span>{{ toastMessage }}</span>
        </div>
    </div>

    <script>
        const { createApp } = Vue;

        createApp({
            data() {
                return {
                    loading: true,
                    error: null,
                    entry: null,
                    relatedPosts: [],
                    entryId: <?php echo $entryid; ?>,
                    showToast: false,
                    toastMessage: '',
                    courses: <?php echo json_encode($courses_data); ?>,
                    latestBlogs: <?php echo json_encode($blogs_data); ?>
                }
            },
            mounted() {
                this.fetchBlogEntry();
                // Initialize reading progress immediately
                this.initReadingProgress();
            },
            methods: {
                async fetchBlogEntry() {
                    try {
                        const response = await fetch(`<?php echo $CFG->wwwroot; ?>/blog/api/get_entry.php?entryid=${this.entryId}`);
                        const data = await response.json();

                        if (data.success) {
                            this.entry = data.entry;
                            this.relatedPosts = data.relatedPosts || [];

                            // Extract featured image from content if not provided
                            if (!this.entry.featuredimage && this.entry.content) {
                                const imgMatch = this.entry.content.match(/<img[^>]+src="([^">]+)"/);
                                if (imgMatch && imgMatch[1]) {
                                    this.entry.featuredimage = imgMatch[1];
                                }
                            }

                            // Check alternative field names for image
                            if (!this.entry.featuredimage) {
                                this.entry.featuredimage = this.entry.image ||
                                                          this.entry.thumbnail ||
                                                          this.entry.picture ||
                                                          this.entry.featuredImage ||
                                                          null;
                            }

                            document.title = this.entry.subject + ' - AI Blog';

                            // Debug: Log featured image URL
                            console.log('Featured Image URL:', this.entry.featuredimage);
                            console.log('Full Entry Data:', this.entry);

                            // Initialize animations AFTER data is loaded and DOM is updated
                            this.$nextTick(() => {
                                setTimeout(() => {
                                    this.initPageLoadAnimations();
                                    this.initScrollAnimations();
                                    this.initParallax();
                                }, 100);
                            });
                        } else {
                            this.error = data.error || 'Failed to load blog post';
                        }
                    } catch (err) {
                        console.error('Error:', err);
                        this.error = 'Unable to load blog post. Please try again later.';
                    } finally {
                        this.loading = false;
                    }
                },
                formatFileSize(bytes) {
                    if (bytes === 0) return '0 Bytes';
                    const k = 1024;
                    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                    const i = Math.floor(Math.log(bytes) / Math.log(k));
                    return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
                },
                truncate(text, length) {
                    if (!text) return '';
                    if (text.length <= length) return text;
                    return text.substring(0, length) + '...';
                },
                getTwitterShareUrl() {
                    const url = encodeURIComponent(window.location.href);
                    const text = encodeURIComponent(this.entry.subject);
                    return `https://twitter.com/intent/tweet?url=${url}&text=${text}`;
                },
                getFacebookShareUrl() {
                    const url = encodeURIComponent(window.location.href);
                    return `https://www.facebook.com/sharer/sharer.php?u=${url}`;
                },
                getLinkedInShareUrl() {
                    const url = encodeURIComponent(window.location.href);
                    return `https://www.linkedin.com/sharing/share-offsite/?url=${url}`;
                },
                async copyLink() {
                    try {
                        await navigator.clipboard.writeText(window.location.href);
                        this.showToastNotification('Link copied to clipboard!');
                    } catch (err) {
                        const textArea = document.createElement('textarea');
                        textArea.value = window.location.href;
                        document.body.appendChild(textArea);
                        textArea.select();
                        document.execCommand('copy');
                        document.body.removeChild(textArea);
                        this.showToastNotification('Link copied to clipboard!');
                    }
                },
                showToastNotification(message) {
                    this.toastMessage = message;
                    this.showToast = true;
                    setTimeout(() => {
                        this.showToast = false;
                    }, 3000);
                },
                // Initialize page load animations - trigger immediately visible elements
                initPageLoadAnimations() {
                    // Check for reduced motion preference
                    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
                    if (prefersReducedMotion) {
                        // Instantly show all elements
                        const allAnimatedElements = document.querySelectorAll(
                            '.scroll-reveal, .scroll-reveal-left, .scroll-reveal-right, .scroll-reveal-scale, .scroll-reveal-fade'
                        );
                        allAnimatedElements.forEach(el => el.classList.add('revealed'));
                        return;
                    }

                    // Trigger animations for elements that are immediately visible
                    const viewportHeight = window.innerHeight;
                    const elementsToAnimate = document.querySelectorAll(
                        '.scroll-reveal, .scroll-reveal-left, .scroll-reveal-right, .scroll-reveal-scale, .scroll-reveal-fade'
                    );

                    elementsToAnimate.forEach((element, index) => {
                        const rect = element.getBoundingClientRect();
                        const isVisible = rect.top < viewportHeight * 0.8;

                        if (isVisible) {
                            // Add staggered animation for visible elements
                            setTimeout(() => {
                                element.classList.add('revealed');
                            }, index * 100);
                        }
                    });
                },
                // Initialize scroll-triggered reveal animations - Enhanced
                initScrollAnimations() {
                    // Configuration for Intersection Observer
                    const observerOptions = {
                        root: null,
                        rootMargin: '0px 0px -150px 0px', // Trigger 150px before element enters viewport
                        threshold: 0.15 // Trigger when 15% of element is visible
                    };

                    // Create Intersection Observer
                    const scrollObserver = new IntersectionObserver((entries) => {
                        entries.forEach((entry) => {
                            if (entry.isIntersecting) {
                                // Add revealed class to trigger animation
                                entry.target.classList.add('revealed');

                                // Optional: Stop observing after animation triggers
                                scrollObserver.unobserve(entry.target);
                            }
                        });
                    }, observerOptions);

                    // Observe all elements with scroll-reveal classes
                    const initObserver = () => {
                        const scrollElements = document.querySelectorAll(
                            '.scroll-reveal:not(.revealed), ' +
                            '.scroll-reveal-left:not(.revealed), ' +
                            '.scroll-reveal-right:not(.revealed), ' +
                            '.scroll-reveal-scale:not(.revealed), ' +
                            '.scroll-reveal-fade:not(.revealed)'
                        );

                        scrollElements.forEach((element) => {
                            scrollObserver.observe(element);
                        });
                    };

                    // Initialize observer
                    initObserver();

                    // Re-initialize on dynamic content updates (if needed)
                    if (typeof MutationObserver !== 'undefined') {
                        const mutationObserver = new MutationObserver(() => {
                            initObserver();
                        });

                        const mainContent = document.querySelector('.article-main');
                        if (mainContent) {
                            mutationObserver.observe(mainContent, {
                                childList: true,
                                subtree: true
                            });
                        }
                    }
                },
                // Initialize reading progress bar
                initReadingProgress() {
                    const progressBar = document.querySelector('.reading-progress');
                    if (!progressBar) return;

                    const updateProgress = () => {
                        const windowHeight = window.innerHeight;
                        const documentHeight = document.documentElement.scrollHeight;
                        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                        const scrollPercent = (scrollTop / (documentHeight - windowHeight)) * 100;
                        progressBar.style.width = Math.min(scrollPercent, 100) + '%';
                    };

                    window.addEventListener('scroll', updateProgress, { passive: true });
                    updateProgress();
                },
                // Initialize parallax effect for images
                initParallax() {
                    const handleParallax = () => {
                        const featuredImage = document.querySelector('.featured-image-wrapper');
                        if (!featuredImage) return;

                        const scrolled = window.pageYOffset;
                        const rate = scrolled * 0.3;

                        if (scrolled < window.innerHeight) {
                            featuredImage.style.transform = `translateY(${rate}px)`;
                        }
                    };

                    window.addEventListener('scroll', handleParallax, { passive: true });
                }
            }
        }).mount('#aiApp');
    </script>

<?php
// Load components system
require_once($CFG->dirroot . '/edoo-components/loader.php');

// Use the same footer as homepage
edoo_load_component('footer');

// Close body and html tags
echo $OUTPUT->standard_end_of_body_html();
?>
</body>
</html>
