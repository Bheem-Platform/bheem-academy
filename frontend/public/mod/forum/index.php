<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bheem Academy empowers you to step into Artificial Intelligence and shape tomorrow’s technology with real-world AI skills.: Forums | Bheem Academy</title>
    <link rel="shortcut icon" href="/theme/image.php/boost/theme/1/favicon" />

    <!-- Vue.js 3 -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Header Styles -->
    <link rel="stylesheet" href="/includes/bheem_header_styles.css">

<style>
/* ============================================
   MOODLE UI RESET
============================================ */
.navbar, #page-header, .breadcrumb, #region-main-settings-menu, #region-main-box, .block,
[data-region="drawer"], .drawer, .nav-tabs, #usernavigation, .page-context-header,
.activity-navigation, #page-footer .tool_dataprivacy, #page-footer .logininfo,
.pagelayout-embedded #page-header, .pagelayout-embedded .breadcrumb,
.sr-only, .skiplinks, #page-navbar, .navbar-nav, .breadcrumb-nav,
[class*="block_"], #block-region-side-pre, #block-region-side-post,
.page-header-headings, aside[data-region], .has-blocks, .secondary-navigation,
footer.footer:not(.bheem-footer):not([class*="bheem"]),
.footer-popover, #page-footer:not(.bheem-footer):not([class*="bheem"]),
nav.navbar:not(.bheem-header):not([class*="bheem"]) {
    display: none !important;
    visibility: hidden !important;
}

body {
    background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%) !important;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    min-height: 100vh;
}

#page, #page-content, #page-wrapper, #region-main {
    background: transparent !important;
    padding: 0 !important;
    margin: 0 !important;
    border: none !important;
    box-shadow: none !important;
}

/* ============================================
   CSS VARIABLES
============================================ */
:root {
    --primary: #8b5cf6;
    --primary-dark: #7c3aed;
    --primary-light: #a78bfa;
    --secondary: #ec4899;
    --accent: #06b6d4;
    --success: #10b981;
    --warning: #f59e0b;
    --danger: #ef4444;
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
    --white: #ffffff;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* ============================================
   MAIN APP CONTAINER
============================================ */
#app {
    min-height: 100vh;
    padding: 120px 24px 80px;
    background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%);
    position: relative;
    overflow-x: hidden;
}

#app::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background:
        radial-gradient(circle at 20% 30%, rgba(139, 92, 246, 0.05) 0%, transparent 50%),
        radial-gradient(circle at 80% 70%, rgba(236, 72, 153, 0.05) 0%, transparent 50%);
    pointer-events: none;
    z-index: 0;
}

.forums-container {
    max-width: 1400px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
}

/* ============================================
   FORUM OVERVIEW SECTION (Hero + Stats in Single Box)
============================================ */
.forum-overview {
    background: #ffffff;
    border-radius: 28px;
    padding: 48px 40px;
    box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08), 0 2px 12px rgba(0, 0, 0, 0.04);
    border: 1px solid rgba(139, 92, 246, 0.1);
    max-width: 1200px;
    margin: 0 auto 48px;
    animation: fadeInUp 0.6s ease-out;
}

/* ============================================
   HERO HEADER SECTION
============================================ */
.hero-header {
    text-align: center;
}

.hero-icon-wrapper {
    width: 100px;
    height: 100px;
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
    border-radius: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 24px;
    box-shadow: 0 12px 30px rgba(139, 92, 246, 0.35);
    animation: float 3s ease-in-out infinite;
    position: relative;
}

.hero-icon-wrapper::before {
    content: '';
    position: absolute;
    inset: -4px;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    border-radius: 26px;
    opacity: 0;
    animation: pulse 2s ease-in-out infinite;
    z-index: -1;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

@keyframes pulse {
    0%, 100% { opacity: 0; transform: scale(1); }
    50% { opacity: 0.3; transform: scale(1.05); }
}

.hero-icon-wrapper i {
    font-size: 48px;
    color: var(--white);
    filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.2));
}

.hero-title {
    font-size: 42px;
    font-weight: 800;
    color: var(--gray-900);
    margin-bottom: 12px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: linear-gradient(135deg, var(--gray-900), var(--primary));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-subtitle {
    color: var(--gray-600);
    font-size: 18px;
    font-weight: 500;
    max-width: 600px;
    margin: 0 auto 32px;
}

.course-name {
    display: inline-block;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: var(--white);
    padding: 12px 24px;
    border-radius: 12px;
    font-size: 16px;
    font-weight: 700;
    box-shadow: 0 8px 20px rgba(139, 92, 246, 0.25);
    margin-bottom: 8px;
}

/* ============================================
   BEAUTIFUL STATISTICS CARDS
============================================ */
.stats-grid {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 16px;
    max-width: 1000px;
    margin: 0 auto;
    flex-wrap: wrap;
}

.stat-card {
    background: #ffffff;
    border-radius: 16px;
    padding: 24px 20px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
    border: 1px solid var(--gray-200);
    transition: all 0.3s ease;
    position: relative;
    width: 100%;
    max-width: 310px;
    flex: 1 1 310px;
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(139, 92, 246, 0.12);
    border-color: rgba(139, 92, 246, 0.3);
}

.stat-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 12px;
}

.stat-icon-wrapper {
    width: 64px;
    height: 64px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    margin-bottom: 4px;
}

.stat-icon-wrapper.purple {
    background: linear-gradient(135deg, #8b5cf6 0%, #a78bfa 100%);
}

.stat-icon-wrapper.pink {
    background: linear-gradient(135deg, #ec4899 0%, #f472b6 100%);
}

.stat-icon-wrapper.blue {
    background: linear-gradient(135deg, #06b6d4 0%, #22d3ee 100%);
}

.stat-icon-wrapper i {
    font-size: 28px;
    color: var(--white);
    filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.15));
}

.stat-info {
    width: 100%;
}

.stat-value {
    font-size: 34px;
    font-weight: 800;
    background: linear-gradient(135deg, #1e293b 0%, #8b5cf6 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 4px;
    line-height: 1;
    font-family: 'Plus Jakarta Sans', sans-serif;
    letter-spacing: -1px;
}

.stat-label {
    font-size: 12px;
    color: var(--gray-600);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.7px;
    margin-bottom: 4px;
}

.stat-description {
    font-size: 10px;
    color: var(--gray-500);
    line-height: 1.3;
}

/* ============================================
   FORUMS SECTION
============================================ */
.forums-section {
    margin-bottom: 48px;
}

.section-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 24px;
    flex-wrap: wrap;
    gap: 16px;
}

.section-title {
    font-size: 28px;
    font-weight: 700;
    color: var(--gray-900);
    display: flex;
    align-items: center;
    gap: 12px;
}

.section-title i {
    color: var(--primary);
    font-size: 24px;
}

.subscribe-actions {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}

.subscribe-btn {
    padding: 10px 20px;
    border: 2px solid var(--primary);
    background: var(--white);
    color: var(--primary);
    border-radius: 10px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.subscribe-btn:hover {
    background: var(--primary);
    color: var(--white);
    transform: translateY(-2px);
}

.subscribe-btn i {
    font-size: 14px;
}

/* ============================================
   FORUMS GRID
============================================ */
.forums-grid {
    display: grid;
    gap: 20px;
}

.forum-card {
    background: #ffffff;
    border-radius: 16px;
    padding: 24px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
    border: 1px solid var(--gray-100);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.forum-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary), var(--secondary));
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.3s ease;
}

.forum-card:hover::before {
    transform: scaleX(1);
}

.forum-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(139, 92, 246, 0.15);
    border-color: var(--primary-light);
}

.forum-card.dimmed {
    opacity: 0.6;
}

.forum-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    margin-bottom: 12px;
    gap: 16px;
}

.forum-title {
    font-size: 18px;
    font-weight: 700;
    color: var(--gray-900);
    margin: 0;
    flex: 1;
}

.forum-title a {
    color: inherit;
    text-decoration: none;
    transition: color 0.3s ease;
}

.forum-title a:hover {
    color: var(--primary);
}

.forum-type-badge {
    padding: 6px 12px;
    border-radius: 8px;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.forum-type-badge.news {
    background: linear-gradient(135deg, #ef4444, #f87171);
    color: var(--white);
}

.forum-type-badge.social {
    background: linear-gradient(135deg, #8b5cf6, #a78bfa);
    color: var(--white);
}

.forum-type-badge.general {
    background: linear-gradient(135deg, #06b6d4, #22d3ee);
    color: var(--white);
}

.forum-intro {
    color: var(--gray-600);
    font-size: 14px;
    line-height: 1.6;
    margin-bottom: 16px;
}

.forum-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
    align-items: center;
    margin-bottom: 16px;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    color: var(--gray-600);
    font-weight: 500;
}

.meta-item i {
    color: var(--primary);
    font-size: 16px;
}

.meta-item strong {
    color: var(--gray-900);
    font-weight: 700;
}

.unread-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 28px;
    height: 28px;
    padding: 0 10px;
    background: linear-gradient(135deg, var(--danger), #f87171);
    color: var(--white);
    border-radius: 14px;
    font-size: 12px;
    font-weight: 700;
    box-shadow: 0 2px 8px rgba(239, 68, 68, 0.3);
}

.unread-badge.zero {
    background: var(--gray-200);
    color: var(--gray-600);
    box-shadow: none;
}

.forum-actions {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.action-btn {
    padding: 8px 16px;
    border: 1.5px solid var(--gray-200);
    background: var(--white);
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: var(--gray-700);
    text-decoration: none;
}

.action-btn:hover {
    border-color: var(--primary);
    background: rgba(139, 92, 246, 0.05);
    color: var(--primary);
}

.action-btn.subscribed {
    border-color: var(--success);
    background: rgba(16, 185, 129, 0.1);
    color: var(--success);
}

.action-btn.subscribed:hover {
    background: var(--success);
    color: var(--white);
}

.action-btn i {
    font-size: 12px;
}

.section-badge {
    display: inline-block;
    padding: 6px 14px;
    background: linear-gradient(135deg, rgba(139, 92, 246, 0.1), rgba(236, 72, 153, 0.1));
    color: var(--primary);
    border-radius: 8px;
    font-size: 12px;
    font-weight: 600;
    margin-bottom: 12px;
}

/* ============================================
   EMPTY STATE
============================================ */
.empty-state {
    text-align: center;
    padding: 80px 40px;
    background: var(--white);
    border-radius: 20px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
}

.empty-icon {
    width: 120px;
    height: 120px;
    margin: 0 auto 24px;
    background: linear-gradient(135deg, rgba(139, 92, 246, 0.1), rgba(236, 72, 153, 0.1));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.empty-icon i {
    font-size: 56px;
    color: var(--primary);
    opacity: 0.6;
}

.empty-title {
    font-size: 24px;
    font-weight: 700;
    color: var(--gray-800);
    margin-bottom: 12px;
}

.empty-message {
    font-size: 16px;
    color: var(--gray-600);
    max-width: 500px;
    margin: 0 auto;
}

/* ============================================
   ANIMATIONS
============================================ */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ============================================
   RESPONSIVE DESIGN
============================================ */
@media (max-width: 1024px) {
    #app {
        padding-top: 110px;
    }

    .forum-overview {
        padding: 44px 36px;
        border-radius: 24px;
    }

    .hero-title {
        font-size: 36px;
    }

    .stats-grid {
        gap: 14px;
        max-width: 900px;
    }

    .stat-card {
        max-width: 290px;
        padding: 22px 18px;
    }

    .stat-value {
        font-size: 32px;
    }

    .stat-icon-wrapper {
        width: 60px;
        height: 60px;
    }

    .stat-icon-wrapper i {
        font-size: 26px;
    }
}

@media (max-width: 768px) {
    #app {
        padding: 100px 20px 60px;
    }

    .forum-overview {
        padding: 36px 28px;
        border-radius: 20px;
    }

    .hero-title {
        font-size: 32px;
    }

    .hero-icon-wrapper {
        width: 80px;
        height: 80px;
    }

    .hero-icon-wrapper i {
        font-size: 36px;
    }

    .stats-grid {
        flex-direction: column;
        gap: 14px;
        max-width: 380px;
    }

    .stat-card {
        padding: 20px 18px;
        max-width: 100%;
    }

    .stat-value {
        font-size: 30px;
    }

    .stat-label {
        font-size: 11px;
    }

    .stat-description {
        font-size: 9px;
    }

    .stat-icon-wrapper {
        width: 58px;
        height: 58px;
    }

    .stat-icon-wrapper i {
        font-size: 24px;
    }

    .section-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .forum-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .forum-meta {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }
}

@media (max-width: 480px) {
    #app {
        padding: 95px 16px 50px;
    }

    .forum-overview {
        padding: 32px 24px;
        border-radius: 18px;
    }

    .hero-title {
        font-size: 28px;
    }

    .hero-subtitle {
        font-size: 15px;
    }

    .hero-icon-wrapper {
        width: 70px;
        height: 70px;
    }

    .hero-icon-wrapper i {
        font-size: 32px;
    }

    .stats-grid {
        gap: 12px;
        max-width: 100%;
    }

    .stat-card {
        padding: 18px 16px;
        border-radius: 14px;
        max-width: 100%;
    }

    .stat-value {
        font-size: 28px;
    }

    .stat-label {
        font-size: 10px;
        letter-spacing: 0.5px;
    }

    .stat-description {
        font-size: 9px;
    }

    .stat-icon-wrapper {
        width: 54px;
        height: 54px;
    }

    .stat-icon-wrapper i {
        font-size: 22px;
    }

    .forum-card {
        padding: 20px;
    }
}

/* ============================================
   ACCESSIBILITY
============================================ */
@media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}

*:focus-visible {
    outline: 3px solid var(--primary);
    outline-offset: 2px;
}
</style>
</head>
<body>


<header class="professional-header" id="professionalHeader">
    <div class="header-container">
        <!-- Logo Section -->
        <div class="logo-section">
            <a href="/" class="brand-logo">
                <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/26637bef-052f-4eec-f6f8-a44a2d6fbf00/public" alt="Bheem Academy" class="logo-img">
            </a>
        </div>

        <!-- Navigation Section -->
        <div class="navigation-section">
            <nav class="main-navigation">
                <div class="nav-item">
                    <a href="/" class="nav-link ">
                        <i class="fas fa-home nav-icon"></i>
                        Home
                    </a>
                </div>

                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-child nav-icon"></i>
                        Kids
                        <i class="fas fa-chevron-down dropdown-arrow"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="/course/view.php?id=8" class="dropdown-item">
                            <i class="fas fa-star dropdown-item-icon" style="color: #ffd700;"></i>
                            Junior AI Basics
                        </a>
                        <a href="/course/view.php?id=9" class="dropdown-item">
                            <i class="fas fa-trophy dropdown-item-icon" style="color: #ff6b35;"></i>
                            Junior AI Mastery
                        </a>
                        <a href="/course/view.php?id=10" class="dropdown-item">
                            <i class="fas fa-code dropdown-item-icon" style="color: #4ecdc4;"></i>
                            Junior Coding Explorer
                        </a>
                        <a href="/course/view.php?id=11" class="dropdown-item">
                            <i class="fas fa-gamepad dropdown-item-icon" style="color: #95e1d3;"></i>
                            Junior Game Builder
                        </a>
                        <a href="/course/view.php?id=12" class="dropdown-item">
                            <i class="fas fa-palette dropdown-item-icon" style="color: #f38ba8;"></i>
                            Junior Creative Tech Lab
                        </a>
                        <a href="/course/view.php?id=13" class="dropdown-item">
                            <i class="fas fa-tools dropdown-item-icon" style="color: #a6e3a1;"></i>
                            Junior Mini Makers
                        </a>
                    </div>
                </div>

                <div class="nav-item">
                    <a href="/course/view.php?id=39" class="nav-link">
                        <i class="fas fa-users nav-icon"></i>
                        Youth
                    </a>
                </div>

                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-briefcase nav-icon"></i>
                        Working Professionals
                        <i class="fas fa-chevron-down dropdown-arrow"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="/course/view.php?id=41" class="dropdown-item">
                            <i class="fas fa-chalkboard-teacher dropdown-item-icon" style="color: #4ecdc4;"></i>
                            AI for Teachers
                        </a>
                        <a href="/course/view.php?id=42" class="dropdown-item">
                            <i class="fas fa-gavel dropdown-item-icon" style="color: #8b5cf6;"></i>
                            AI for Lawyers
                        </a>
                        <a href="/course/view.php?id=17" class="dropdown-item">
                            <i class="fas fa-calculator dropdown-item-icon" style="color: #f59e0b;"></i>
                            AI for Accountant
                        </a>
                        <a href="/course/view.php?id=20" class="dropdown-item">
                            <i class="fas fa-user-tie dropdown-item-icon" style="color: #10b981;"></i>
                            AI for Office Admins
                        </a>
                        <a href="/course/view.php?id=16" class="dropdown-item">
                            <i class="fas fa-users-cog dropdown-item-icon" style="color: #ef4444;"></i>
                            AI for HR
                        </a>
                    </div>
                </div>

                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-globe nav-icon"></i>
                        AI Social 360
                        <i class="fas fa-chevron-down dropdown-arrow"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="/course/view.php?id=43" class="dropdown-item">
                            <i class="fas fa-crown dropdown-item-icon" style="color: #ffd700;"></i>
                            AI Social 360 Pro (6 Months)
                        </a>
                        <a href="/course/view.php?id=37" class="dropdown-item">
                            <i class="fas fa-bolt dropdown-item-icon" style="color: #ff6b35;"></i>
                            AI Social 360 Fasttrack (3 Months)
                        </a>
                    </div>
                </div>

                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-video nav-icon"></i>
                        Influencers & Creators
                        <i class="fas fa-chevron-down dropdown-arrow"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="/course/view.php?id=35" class="dropdown-item">
                            <i class="fas fa-crown dropdown-item-icon" style="color: #ffd700;"></i>
                            AI Creator Suite Pro (6 Months)
                        </a>
                        <a href="/course/view.php?id=36" class="dropdown-item">
                            <i class="fas fa-bolt dropdown-item-icon" style="color: #ff6b35;"></i>
                            AI Creator Fast Track (3 Months)
                        </a>
                    </div>
                </div>

                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-star nav-icon"></i>
                        Super Stars
                        <i class="fas fa-chevron-down dropdown-arrow"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="/course/view.php?id=38" class="dropdown-item">
                            <i class="fas fa-rocket dropdown-item-icon" style="color: #4ecdc4;"></i>
                            Bheem Superstar – AI Engineer Launchpad
                        </a>
                        <a href="/course/view.php?id=40" class="dropdown-item">
                            <i class="fas fa-trophy dropdown-item-icon" style="color: #ffd700;"></i>
                            Bheem Superstar – AI Engineer Mastery
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Header Actions -->
        <div class="header-actions">
                        <!-- Get In Touch Dropdown -->
            <div class="cta-dropdown-container">
                <button class="cta-button">
                    <i class="fas fa-phone"></i>
                    <span>Get In Touch</span>
                    <i class="fas fa-chevron-down cta-chevron"></i>
                </button>
                <div class="cta-dropdown">
                    <div class="cta-dropdown-header">
                        <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/26637bef-052f-4eec-f6f8-a44a2d6fbf00/public" alt="Bheem Academy" class="cta-dropdown-logo">
                    </div>
                    <div class="cta-dropdown-content">
                        <p class="cta-dropdown-welcome">
                            <span class="typing-welcome"></span>
                            <span class="typing-cursor">|</span>
                        </p>
                        <p class="cta-dropdown-text">
                            <span class="typing-query"></span>
                            <span class="typing-cursor">|</span>
                        </p>
                        <a href="tel:+917994732004" class="cta-dropdown-phone">
                            <i class="fas fa-phone"></i>
                            +91 799 473 2004
                        </a>
                        <div class="cta-dropdown-divider"></div>
                        <a href="/register.php" class="cta-dropdown-link">
                            <i class="fas fa-user-plus"></i>
                            Register Now
                        </a>
                        <a href="/contact.html" class="cta-dropdown-link">
                            <i class="fas fa-envelope"></i>
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Login/User Dropdown -->
                            <div class="login-dropdown-container">
                    <button class="login-btn">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Login</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="login-dropdown">
                        <a href="/login.php?user=student" class="login-dropdown-item">
                            <i class="fas fa-user-graduate"></i>
                            <span>Student</span>
                        </a>
                        <a href="/login.php?user=mentor" class="login-dropdown-item">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <span>Mentor</span>
                        </a>
                        <a href="/login.php?user=parent" class="login-dropdown-item">
                            <i class="fas fa-user-friends"></i>
                            <span>Parent</span>
                        </a>
                        <a href="/admin-login.php" class="login-dropdown-item">
                            <i class="fas fa-user-shield"></i>
                            <span>Admin</span>
                        </a>
                    </div>
                </div>
                    </div>

        <!-- Mobile Toggle -->
        <button class="mobile-toggle" id="mobileToggle">
            <i class="fas fa-bars"></i>
        </button>
    </div>
</header>

<!-- Mobile Menu -->
<div class="mobile-menu" id="mobileMenu">
    <button class="mobile-close" id="mobileClose">
        <i class="fas fa-times"></i>
    </button>

    <div class="mobile-nav-item">
        <a href="/" class="mobile-nav-link">
            <i class="fas fa-home"></i>
            Home
        </a>
    </div>

    <div class="mobile-nav-item">
        <button class="mobile-dropdown-toggle" onclick="toggleMobileDropdown('mobile-kids')">
            <span><i class="fas fa-child"></i> Kids</span>
            <i class="fas fa-chevron-down"></i>
        </button>
        <div class="mobile-dropdown" id="mobile-kids">
            <a href="/course/view.php?id=8" class="mobile-dropdown-item">Junior AI Basics</a>
            <a href="/course/view.php?id=9" class="mobile-dropdown-item">Junior AI Mastery</a>
            <a href="/course/view.php?id=10" class="mobile-dropdown-item">Junior Coding Explorer</a>
            <a href="/course/view.php?id=11" class="mobile-dropdown-item">Junior Game Builder</a>
            <a href="/course/view.php?id=12" class="mobile-dropdown-item">Junior Creative Tech Lab</a>
            <a href="/course/view.php?id=13" class="mobile-dropdown-item">Junior Mini Makers</a>
        </div>
    </div>

    <div class="mobile-nav-item">
        <a href="/course/view.php?id=39" class="mobile-nav-link">
            <i class="fas fa-users"></i>
            Youth
        </a>
    </div>

    <div class="mobile-nav-item">
        <button class="mobile-dropdown-toggle" onclick="toggleMobileDropdown('mobile-professionals')">
            <span><i class="fas fa-briefcase"></i> Working Professionals</span>
            <i class="fas fa-chevron-down"></i>
        </button>
        <div class="mobile-dropdown" id="mobile-professionals">
            <a href="/course/view.php?id=41" class="mobile-dropdown-item">AI for Teachers</a>
            <a href="/course/view.php?id=42" class="mobile-dropdown-item">AI for Lawyers</a>
            <a href="/course/view.php?id=17" class="mobile-dropdown-item">AI for Accountant</a>
            <a href="/course/view.php?id=20" class="mobile-dropdown-item">AI for Office Admins</a>
            <a href="/course/view.php?id=16" class="mobile-dropdown-item">AI for HR</a>
        </div>
    </div>

    <div class="mobile-nav-item">
        <button class="mobile-dropdown-toggle" onclick="toggleMobileDropdown('mobile-ai360')">
            <span><i class="fas fa-globe"></i> AI Social 360</span>
            <i class="fas fa-chevron-down"></i>
        </button>
        <div class="mobile-dropdown" id="mobile-ai360">
            <a href="/course/view.php?id=43" class="mobile-dropdown-item">AI Social 360 Pro (6 Months)</a>
            <a href="/course/view.php?id=37" class="mobile-dropdown-item">AI Social 360 Fasttrack (3 Months)</a>
        </div>
    </div>

    <div class="mobile-nav-item">
        <button class="mobile-dropdown-toggle" onclick="toggleMobileDropdown('mobile-creators')">
            <span><i class="fas fa-video"></i> Influencers & Creators</span>
            <i class="fas fa-chevron-down"></i>
        </button>
        <div class="mobile-dropdown" id="mobile-creators">
            <a href="/course/view.php?id=35" class="mobile-dropdown-item">AI Creator Suite Pro (6 Months)</a>
            <a href="/course/view.php?id=36" class="mobile-dropdown-item">AI Creator Fast Track (3 Months)</a>
        </div>
    </div>

    <div class="mobile-nav-item">
        <button class="mobile-dropdown-toggle" onclick="toggleMobileDropdown('mobile-superstars')">
            <span><i class="fas fa-star"></i> Super Stars</span>
            <i class="fas fa-chevron-down"></i>
        </button>
        <div class="mobile-dropdown" id="mobile-superstars">
            <a href="/course/view.php?id=38" class="mobile-dropdown-item">Bheem Superstar – AI Engineer Launchpad</a>
            <a href="/course/view.php?id=40" class="mobile-dropdown-item">Bheem Superstar – AI Engineer Mastery</a>
        </div>
    </div>

    <!-- Mobile Auth Section -->
    <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #e5e7eb;">
                    <div class="mobile-nav-item">
                <button class="mobile-dropdown-toggle" onclick="toggleMobileDropdown('mobile-login')">
                    <span><i class="fas fa-sign-in-alt"></i> Login</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="mobile-dropdown" id="mobile-login">
                    <a href="/login.php?user=student" class="mobile-dropdown-item">
                        <i class="fas fa-user-graduate"></i> Student
                    </a>
                    <a href="/login.php?user=mentor" class="mobile-dropdown-item">
                        <i class="fas fa-chalkboard-teacher"></i> Mentor
                    </a>
                    <a href="/login.php?user=parent" class="mobile-dropdown-item">
                        <i class="fas fa-user-friends"></i> Parent
                    </a>
                    <a href="/admin-login.php" class="mobile-dropdown-item">
                        <i class="fas fa-user-shield"></i> Admin
                    </a>
                </div>
            </div>
                <div class="mobile-nav-item">
            <a href="/schedule.html" class="mobile-nav-link" style="background: linear-gradient(135deg, #8B5CF6, #EC4899); color: white; border-color: #8B5CF6; margin-top: 8px;">
                <i class="fas fa-phone"></i>
                Get In Touch
            </a>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay" id="mobileMenuOverlay"></div>

<script>
// Wait for DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileToggle = document.getElementById('mobileToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    const mobileClose = document.getElementById('mobileClose');
    const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');

    if (mobileToggle && mobileMenu) {
        mobileToggle.addEventListener('click', function() {
            mobileMenu.classList.add('active');
            if (mobileMenuOverlay) mobileMenuOverlay.classList.add('active');
            document.body.classList.add('mobile-menu-open');
        });
    }

    if (mobileClose && mobileMenu) {
        mobileClose.addEventListener('click', function() {
            mobileMenu.classList.remove('active');
            if (mobileMenuOverlay) mobileMenuOverlay.classList.remove('active');
            document.body.classList.remove('mobile-menu-open');
        });
    }

    if (mobileMenuOverlay && mobileMenu) {
        mobileMenuOverlay.addEventListener('click', function() {
            mobileMenu.classList.remove('active');
            this.classList.remove('active');
            document.body.classList.remove('mobile-menu-open');
        });
    }

    // Fallback: Attach click handlers to mobile dropdown toggles if onclick doesn't work
    // This ensures dropdowns work even if onclick attributes fail on some mobile browsers
    document.querySelectorAll('.mobile-dropdown-toggle').forEach(function(button) {
        button.addEventListener('click', function(e) {
            // Find the dropdown ID from the onclick attribute
            const onclickAttr = this.getAttribute('onclick');
            if (onclickAttr) {
                const match = onclickAttr.match(/toggleMobileDropdown\('([^']+)'\)/);
                if (match && match[1]) {
                    toggleMobileDropdown(match[1]);
                }
            }
        });
    });
});

// Mobile dropdown toggle - must be global for onclick attributes
// Ported from working dev_bheem_homepage.html implementation
function toggleMobileDropdown(id) {
    const dropdown = document.getElementById(id);
    const toggle = dropdown?.previousElementSibling;

    if (dropdown && toggle) {
        dropdown.classList.toggle('active');
        toggle.classList.toggle('active');
    }
}

// ========================================
// AI Typing Text Effect for Dropdown Content
// ========================================
function typeText(element, text, speed = 80, callback) {
    let i = 0;
    element.textContent = '';

    function type() {
        if (i < text.length) {
            element.textContent += text.charAt(i);
            i++;
            setTimeout(type, speed);
        } else if (callback) {
            callback();
        }
    }

    type();
}

let dropdownTypingTriggered = false;

// Function to trigger typing effect in dropdown
function triggerDropdownTyping() {
    if (dropdownTypingTriggered) return; // Only run once

    const welcomeText = document.querySelector('.typing-welcome');
    const queryText = document.querySelector('.typing-query');

    if (welcomeText && queryText) {
        // Type welcome message first
        setTimeout(() => {
            typeText(welcomeText, 'You are at right place welcome', 60, function() {
                // Hide cursor after first message
                const firstCursor = document.querySelectorAll('.typing-cursor')[0];
                if (firstCursor) firstCursor.style.display = 'none';

                // Then type query message after a brief pause
                setTimeout(() => {
                    typeText(queryText, 'For a quick query connect on', 60, function() {
                        // Hide cursor after second message
                        const secondCursor = document.querySelectorAll('.typing-cursor')[1];
                        if (secondCursor) secondCursor.style.display = 'none';
                    });
                }, 300);
            });
        }, 200);

        dropdownTypingTriggered = true;
    }
}

// Continue DOMContentLoaded listeners
document.addEventListener('DOMContentLoaded', function() {
    // Login dropdown toggle for desktop
    document.querySelectorAll('.login-dropdown-container').forEach(container => {
        const btn = container.querySelector('.login-btn');
        const dropdown = container.querySelector('.login-dropdown');

        if (btn && dropdown) {
            container.addEventListener('mouseenter', function() {
                dropdown.classList.add('active');
            });

            container.addEventListener('mouseleave', function() {
                dropdown.classList.remove('active');
            });
        }
    });

    // Trigger typing when scrolling down (header becomes scrolled)
    let lastScrollTop = 0;
    window.addEventListener('scroll', function() {
        const currentScroll = window.pageYOffset || document.documentElement.scrollTop;

        // Check if scrolling down and past 100px
        if (currentScroll > 100 && currentScroll > lastScrollTop) {
            triggerDropdownTyping();
        }

        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
    });

    // CTA Dropdown - CLICK-ONLY Slider Toggle (NOT HOVER!)
    // Slider animation: slides from right side
    // ========================================
    document.querySelectorAll('.cta-dropdown-container').forEach(container => {
        const btn = container.querySelector('.cta-button');
        const dropdown = container.querySelector('.cta-dropdown');

        if (btn && dropdown) {
            // CLICK to toggle - Slider animation
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                // Close other CTA dropdowns
                document.querySelectorAll('.cta-dropdown-container').forEach(other => {
                    if (other !== container) {
                        other.classList.remove('active');
                    }
                });

                // Toggle current dropdown with slider animation
                const isOpening = !container.classList.contains('active');
                container.classList.toggle('active');

                // Trigger typing animation when opening dropdown
                if (isOpening) {
                    triggerDropdownTyping();
                }
            });

            // Prevent hover from showing dropdown
            container.addEventListener('mouseenter', function(e) {
                e.preventDefault();
            });

            container.addEventListener('mouseover', function(e) {
                e.preventDefault();
            });
        }
    });

    // Close CTA dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.cta-dropdown-container')) {
            document.querySelectorAll('.cta-dropdown-container').forEach(container => {
                container.classList.remove('active');
            });
        }
    });

    // Close CTA dropdown on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.cta-dropdown-container').forEach(container => {
                container.classList.remove('active');
            });
        }
    });

    // Scroll effect for header
    let lastScroll = 0;
    window.addEventListener('scroll', function() {
        const header = document.getElementById('professionalHeader');
        const currentScroll = window.pageYOffset;

        if (currentScroll > 100) {
            header?.classList.add('scrolled');
        } else {
            header?.classList.remove('scrolled');
        }

        lastScroll = currentScroll;
    });

    // ========================================
    // Dark/Light Mode Toggle (Dashboard Only)
    // ========================================
    const themeToggle = document.getElementById('themeToggle');
    if (themeToggle) {
        // Check for saved theme preference or default to light mode
        const currentTheme = localStorage.getItem('theme') || 'light';

        // Apply saved theme on page load
        if (currentTheme === 'dark') {
            document.body.classList.add('dark-mode');
        }

        // Toggle theme on button click
        themeToggle.addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');

            // Save theme preference
            const isDarkMode = document.body.classList.contains('dark-mode');
            localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');

            // Add a subtle animation effect
            this.style.transform = 'rotate(360deg) scale(1.2)';
            setTimeout(() => {
                this.style.transform = '';
            }, 400);
        });
    }
});
</script>

<!-- Vue.js App -->
<div id="app">
    <div class="forums-container">
        <!-- Forum Overview Section (Hero + Stats) -->
        <div class="forum-overview">
            <!-- Hero Header -->
            <div class="hero-header">
                <div class="hero-icon-wrapper">
                    <i class="fas fa-comments"></i>
                </div>
                <h1 class="hero-title">Course Forums</h1>
                <div class="course-name">Bheem Academy : : AI-Driven Learning for a Smarter</div>
                <p class="hero-subtitle">Engage in discussions, ask questions, and collaborate with your peers</p>
            </div>
        </div>

        <!-- General Forums -->
        <div v-if="generalForums.length > 0" class="forums-section">
            <div class="section-header">
                <h2 class="section-title">
                    <i class="fas fa-bullhorn"></i>
                    General Forums
                </h2>
                            </div>

            <div class="forums-grid">
                <div
                    v-for="forum in generalForums"
                    :key="forum.id"
                    class="forum-card"
                    :class="{ dimmed: !forum.visible }"
                >
                    <div class="forum-header">
                        <h3 class="forum-title">
                            <a :href="forum.viewurl">{{ forum.name }}</a>
                        </h3>
                        <span class="forum-type-badge" :class="forum.type">{{ forum.type }}</span>
                    </div>

                    <div class="forum-intro" v-html="forum.intro"></div>

                    <div class="forum-meta">
                        <div class="meta-item">
                            <i class="fas fa-comments"></i>
                            <strong>{{ forum.discussions }}</strong> discussions
                        </div>
                        <div class="meta-item" v-if="forum.unread >= 0">
                            <i class="fas fa-envelope"></i>
                            <span class="unread-badge" :class="{ zero: forum.unread === 0 }">
                                {{ forum.unread }}
                            </span>
                            unread
                        </div>
                    </div>

                    <div class="forum-actions">
                        <a :href="forum.viewurl" class="action-btn">
                            <i class="fas fa-eye"></i>
                            View Forum
                        </a>
                        <button
                            v-if="forum.cansubscribe"
                            class="action-btn"
                            :class="{ subscribed: forum.issubscribed }"
                        >
                            <i :class="forum.issubscribed ? 'fas fa-bell-slash' : 'fas fa-bell'"></i>
                            {{ forum.issubscribed ? 'Subscribed' : 'Subscribe' }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Learning Forums -->
        <div v-if="learningForums.length > 0" class="forums-section">
            <div class="section-header">
                <h2 class="section-title">
                    <i class="fas fa-graduation-cap"></i>
                    Learning Forums
                </h2>
            </div>

            <div class="forums-grid">
                <div
                    v-for="forum in learningForums"
                    :key="forum.id"
                    class="forum-card"
                    :class="{ dimmed: !forum.visible }"
                >
                    <div v-if="forum.section" class="section-badge">
                        <i class="fas fa-folder"></i> {{ forum.section }}
                    </div>

                    <div class="forum-header">
                        <h3 class="forum-title">
                            <a :href="forum.viewurl">{{ forum.name }}</a>
                        </h3>
                    </div>

                    <div class="forum-intro" v-html="forum.intro"></div>

                    <div class="forum-meta">
                        <div class="meta-item">
                            <i class="fas fa-comments"></i>
                            <strong>{{ forum.discussions }}</strong> discussions
                        </div>
                        <div class="meta-item" v-if="forum.unread >= 0">
                            <i class="fas fa-envelope"></i>
                            <span class="unread-badge" :class="{ zero: forum.unread === 0 }">
                                {{ forum.unread }}
                            </span>
                            unread
                        </div>
                    </div>

                    <div class="forum-actions">
                        <a :href="forum.viewurl" class="action-btn">
                            <i class="fas fa-eye"></i>
                            View Forum
                        </a>
                        <button
                            v-if="forum.cansubscribe"
                            class="action-btn"
                            :class="{ subscribed: forum.issubscribed }"
                        >
                            <i :class="forum.issubscribed ? 'fas fa-bell-slash' : 'fas fa-bell'"></i>
                            {{ forum.issubscribed ? 'Subscribed' : 'Subscribe' }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Empty State -->
        <div v-if="totalForums === 0" class="empty-state">
            <div class="empty-icon">
                <i class="fas fa-comments"></i>
            </div>
            <h3 class="empty-title">No Forums Available</h3>
            <p class="empty-message">
                There are no forums available in this course yet. Check back later!
            </p>
        </div>
    </div>
</div>

<script>
const { createApp } = Vue;

createApp({
    data() {
        return {
            generalForums: [],
            learningForums: [],
            courseName: 'Bheem Academy : : AI-Driven Learning for a Smarter',
            sesskey: 'My8pVqA8nS',
            baseUrl: ''
        }
    },
    computed: {
        totalForums() {
            return this.generalForums.length + this.learningForums.length;
        },
        totalDiscussions() {
            const general = this.generalForums.reduce((sum, f) => sum + f.discussions, 0);
            const learning = this.learningForums.reduce((sum, f) => sum + f.discussions, 0);
            return general + learning;
        },
        totalUnread() {
            const general = this.generalForums.reduce((sum, f) => sum + (f.unread > 0 ? f.unread : 0), 0);
            const learning = this.learningForums.reduce((sum, f) => sum + (f.unread > 0 ? f.unread : 0), 0);
            return general + learning;
        }
    },
    mounted() {
        console.log('💬 Course Forums Vue.js App Mounted');
        console.log('Total Forums:', this.totalForums);
        console.log('General Forums:', this.generalForums.length);
        console.log('Learning Forums:', this.learningForums.length);
    }
}).mount('#app');
</script>

<!-- Professional Footer -->
<!-- [Edoo] Modern Vue-Powered Footer Component - AI Professional Design -->
<style>
    /* ================================================
       MODERN AI PROFESSIONAL FOOTER - VUE POWERED
       Ultra-Premium Design with Advanced Interactions
    ================================================ */

    .vue-footer-modern {
        position: relative;
        background: linear-gradient(180deg,
            #0A0E27 0%,
            #1A1F3A 25%,
            #2D1B69 50%,
            #1A1F3A 75%,
            #0A0E27 100%);
        color: #E2E8F0;
        overflow: hidden;
        margin-top: 60px;
    }

    /* Global AI Icons Background for entire footer */
    .footer-ai-icons-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 2;
        overflow: hidden;
        opacity: 0.08;
    }

    .footer-ai-icon {
        position: absolute;
        font-size: 64px;
        color: #8B5CF6;
        opacity: 0.7;
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
    }

    .footer-ai-icon:nth-child(1) {
        top: 5%;
        left: 8%;
        animation: footer-float-1 25s infinite;
        color: #8B5CF6;
    }

    .footer-ai-icon:nth-child(2) {
        top: 20%;
        right: 12%;
        animation: footer-float-2 28s infinite;
        color: #EC4899;
    }

    .footer-ai-icon:nth-child(3) {
        top: 40%;
        left: 15%;
        animation: footer-float-3 22s infinite;
        color: #06B6D4;
    }

    .footer-ai-icon:nth-child(4) {
        top: 60%;
        right: 8%;
        animation: footer-float-4 30s infinite;
        color: #F59E0B;
    }

    .footer-ai-icon:nth-child(5) {
        top: 75%;
        left: 20%;
        animation: footer-float-5 26s infinite;
        color: #10B981;
    }

    .footer-ai-icon:nth-child(6) {
        top: 10%;
        left: 50%;
        animation: footer-float-6 24s infinite;
        color: #8B5CF6;
    }

    .footer-ai-icon:nth-child(7) {
        top: 35%;
        right: 25%;
        animation: footer-float-7 27s infinite;
        color: #EC4899;
    }

    .footer-ai-icon:nth-child(8) {
        top: 55%;
        left: 40%;
        animation: footer-float-8 23s infinite;
        color: #06B6D4;
    }

    .footer-ai-icon:nth-child(9) {
        top: 80%;
        right: 15%;
        animation: footer-float-9 29s infinite;
        color: #F59E0B;
    }

    .footer-ai-icon:nth-child(10) {
        top: 25%;
        left: 70%;
        animation: footer-float-10 21s infinite;
        color: #10B981;
    }

    @keyframes footer-float-1 {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        25% { transform: translate(40px, -30px) rotate(90deg); }
        50% { transform: translate(80px, 15px) rotate(180deg); }
        75% { transform: translate(40px, 45px) rotate(270deg); }
    }

    @keyframes footer-float-2 {
        0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
        33% { transform: translate(-50px, 40px) rotate(-120deg) scale(1.2); }
        66% { transform: translate(-30px, -35px) rotate(-240deg) scale(0.9); }
    }

    @keyframes footer-float-3 {
        0%, 100% { transform: translate(0, 0) rotate(360deg); }
        50% { transform: translate(-60px, 50px) rotate(180deg); }
    }

    @keyframes footer-float-4 {
        0%, 100% { transform: translate(0, 0) scale(1) rotate(0deg); }
        50% { transform: translate(55px, -45px) scale(1.3) rotate(180deg); }
    }

    @keyframes footer-float-5 {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        25% { transform: translateY(-40px) rotate(60deg); }
        50% { transform: translateY(0) rotate(120deg); }
        75% { transform: translateY(40px) rotate(180deg); }
    }

    @keyframes footer-float-6 {
        0%, 100% { transform: translate(0, 0) rotate(-360deg) scale(1); }
        50% { transform: translate(-70px, 55px) rotate(-180deg) scale(1.1); }
    }

    @keyframes footer-float-7 {
        0%, 100% { transform: translate(0, 0); }
        33% { transform: translate(45px, -35px); }
        66% { transform: translate(-40px, -20px); }
    }

    @keyframes footer-float-8 {
        0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
        25% { transform: translate(-40px, 45px) rotate(75deg) scale(1.15); }
        50% { transform: translate(35px, 30px) rotate(150deg) scale(0.95); }
        75% { transform: translate(-25px, -35px) rotate(225deg) scale(1.05); }
    }

    @keyframes footer-float-9 {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        50% { transform: translate(50px, -50px) rotate(180deg); }
    }

    @keyframes footer-float-10 {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(-35px, 30px) scale(1.2); }
        66% { transform: translate(40px, -25px) scale(0.9); }
    }

    /* Advanced Neural Network Background Animation */
    .neural-network-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 1;
        opacity: 0.4;
    }

    .neural-node {
        position: absolute;
        width: 6px;
        height: 6px;
        background: radial-gradient(circle, #8B5CF6 0%, transparent 70%);
        border-radius: 50%;
        animation: node-pulse 4s ease-in-out infinite;
    }

    @keyframes node-pulse {
        0%, 100% { transform: scale(1); opacity: 0.6; }
        50% { transform: scale(1.5); opacity: 1; }
    }

    .neural-connection {
        position: absolute;
        height: 1px;
        background: linear-gradient(90deg,
            transparent 0%,
            rgba(139, 92, 246, 0.4) 50%,
            transparent 100%);
        transform-origin: left center;
        animation: connection-flow 6s linear infinite;
    }

    @keyframes connection-flow {
        0% { opacity: 0.2; }
        50% { opacity: 0.6; }
        100% { opacity: 0.2; }
    }

    /* Ambient Glow Effects */
    .ambient-glow {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 2;
        opacity: 0.5;
    }

    .glow-orb {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
    }

    .glow-orb-1 {
        top: 10%;
        left: 10%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(139, 92, 246, 0.3), transparent);
        animation: orb-float-1 20s infinite;
    }

    .glow-orb-2 {
        bottom: 15%;
        right: 15%;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(236, 72, 153, 0.25), transparent);
        animation: orb-float-2 25s infinite;
    }

    .glow-orb-3 {
        top: 50%;
        left: 50%;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(6, 182, 212, 0.2), transparent);
        animation: orb-float-3 30s infinite;
        transform: translate(-50%, -50%);
    }

    @keyframes orb-float-1 {
        0%, 100% { transform: translate(0, 0); }
        50% { transform: translate(50px, -30px); }
    }

    @keyframes orb-float-2 {
        0%, 100% { transform: translate(0, 0); }
        50% { transform: translate(-40px, 40px); }
    }

    @keyframes orb-float-3 {
        0%, 100% { transform: translate(-50%, -50%); }
        50% { transform: translate(calc(-50% + 30px), calc(-50% - 30px)); }
    }

    /* AI Activity Ticker */
    .ai-activity-ticker {
        position: relative;
        z-index: 3;
        background: linear-gradient(90deg,
            rgba(139, 92, 246, 0.15) 0%,
            rgba(236, 72, 153, 0.12) 50%,
            rgba(6, 182, 212, 0.15) 100%);
        border-bottom: 2px solid rgba(139, 92, 246, 0.3);
        padding: 20px 0;
        overflow: hidden;
    }

    .ticker-content {
        display: flex;
        gap: 60px;
        animation: ticker-scroll 40s linear infinite;
        will-change: transform;
    }

    @keyframes ticker-scroll {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    .ticker-item {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        white-space: nowrap;
        padding: 12px 24px;
        background: linear-gradient(135deg,
            rgba(139, 92, 246, 0.2),
            rgba(236, 72, 153, 0.15));
        border-radius: 50px;
        border: 1px solid rgba(139, 92, 246, 0.3);
        backdrop-filter: blur(10px);
        font-size: 14px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .ticker-item:hover {
        background: linear-gradient(135deg,
            rgba(139, 92, 246, 0.35),
            rgba(236, 72, 153, 0.25));
        transform: scale(1.05);
    }

    .ticker-icon {
        font-size: 18px;
        background: linear-gradient(135deg, #8B5CF6, #EC4899);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .ticker-label {
        color: #94A3B8;
        font-weight: 500;
        margin-right: 4px;
    }

    .ticker-value {
        color: #F8FAFC;
        font-weight: 700;
    }

    /* Dynamic Stats Cards */
    .stats-section {
        position: relative;
        z-index: 3;
        padding: 40px 24px;
        background: linear-gradient(180deg,
            rgba(10, 14, 39, 0.6) 0%,
            rgba(26, 31, 58, 0.4) 100%);
    }

    .stats-container {
        max-width: 1400px;
        margin: 0 auto;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }

    .stat-card {
        background: linear-gradient(135deg,
            rgba(139, 92, 246, 0.1),
            rgba(236, 72, 153, 0.08));
        border: 2px solid rgba(139, 92, 246, 0.2);
        border-radius: 16px;
        padding: 24px 20px;
        text-align: center;
        transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
        overflow: hidden;
        cursor: pointer;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(139, 92, 246, 0.15) 0%, transparent 70%);
        opacity: 0;
        transition: opacity 0.6s ease;
    }

    .stat-card:hover::before {
        opacity: 1;
        animation: stat-glow 2s ease-in-out infinite;
    }

    @keyframes stat-glow {
        0%, 100% { transform: translate(0, 0); }
        50% { transform: translate(10%, 10%); }
    }

    .stat-card:hover {
        transform: translateY(-12px) scale(1.03);
        border-color: rgba(139, 92, 246, 0.5);
        box-shadow:
            0 30px 70px rgba(139, 92, 246, 0.3),
            0 15px 35px rgba(236, 72, 153, 0.2);
    }

    .stat-icon {
        font-size: 32px;
        margin-bottom: 12px;
        background: linear-gradient(135deg, #8B5CF6, #EC4899, #06B6D4);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        filter: drop-shadow(0 4px 12px rgba(139, 92, 246, 0.6));
        display: inline-block;
        transition: transform 0.4s ease;
    }

    .stat-icon-image {
        width: 40px;
        height: 40px;
        object-fit: contain;
        background: transparent;
        -webkit-background-clip: unset;
        -webkit-text-fill-color: unset;
        filter: drop-shadow(0 4px 12px rgba(139, 92, 246, 0.3));
    }

    .stat-card:hover .stat-icon {
        transform: scale(1.2) rotateY(360deg);
    }

    .stat-card:hover .stat-icon-image {
        transform: scale(1.2);
    }

    /* Stamp Style for IBM Recognized */
    .stat-card.stamp-style {
        position: relative;
        border: 4px dashed rgba(139, 92, 246, 0.7);
        border-radius: 12px;
        background: linear-gradient(135deg,
            rgba(139, 92, 246, 0.08) 0%,
            rgba(236, 72, 153, 0.05) 100%);
        transform: rotate(-2deg);
        box-shadow:
            0 4px 20px rgba(139, 92, 246, 0.2),
            inset 0 0 30px rgba(139, 92, 246, 0.05);
    }

    .stat-card.stamp-style::before {
        content: '';
        position: absolute;
        top: 6px;
        left: 6px;
        right: 6px;
        bottom: 6px;
        border: 2px dashed rgba(139, 92, 246, 0.4);
        border-radius: 8px;
        pointer-events: none;
    }

    .stat-card.stamp-style::after {
        content: '★ CERTIFIED ★';
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 10px;
        font-weight: 700;
        color: rgba(139, 92, 246, 0.6);
        letter-spacing: 1px;
        transform: rotate(15deg);
    }

    .stat-card.stamp-style:hover {
        transform: rotate(-1deg) translateY(-12px) scale(1.03);
        border-color: rgba(139, 92, 246, 0.9);
        box-shadow:
            0 30px 70px rgba(139, 92, 246, 0.3),
            0 15px 35px rgba(236, 72, 153, 0.2),
            inset 0 0 40px rgba(139, 92, 246, 0.1);
    }

    .stamp-style .stat-icon-image {
        filter: drop-shadow(0 4px 12px rgba(139, 92, 246, 0.4));
    }

    .stamp-style .stat-value {
        background: linear-gradient(135deg, #FFFFFF, #E0E7FF);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 0 2px 8px rgba(139, 92, 246, 0.3);
        font-weight: 900;
    }

    .stamp-style .stat-label {
        color: rgba(255, 255, 255, 0.9);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .stat-value {
        font-size: 2.25rem;
        font-weight: 900;
        background: linear-gradient(135deg, #FFFFFF, #E0E7FF);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        line-height: 1;
        margin-bottom: 8px;
    }

    .stat-label {
        font-size: 14px;
        color: #C7D2FE;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    /* Main Footer Content */
    .footer-main {
        position: relative;
        z-index: 3;
        padding: 80px 24px;
    }

    .footer-container {
        max-width: 1400px;
        margin: 0 auto;
    }

    .footer-grid {
        display: grid;
        grid-template-columns: 1.3fr 1fr 1fr 1.2fr;
        gap: 60px;
        margin-bottom: 60px;
    }

    /* Brand Column with Interactive Logo */
    .brand-section {
        position: relative;
    }

    .footer-logo-wrapper {
        margin-bottom: 28px;
        position: relative;
        display: inline-block;
    }

    .footer-logo {
        height: 60px;
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        filter: drop-shadow(0 4px 16px rgba(139, 92, 246, 0.5));
    }

    .footer-logo:hover {
        transform: scale(1.1) translateY(-4px) rotate(-2deg);
        filter: drop-shadow(0 8px 24px rgba(139, 92, 246, 0.7));
    }

    .brand-tagline {
        font-size: 18px;
        line-height: 1.8;
        color: #C7D2FE;
        margin-bottom: 32px;
        font-weight: 500;
    }

    .social-links {
        display: flex;
        gap: 16px;
        flex-wrap: wrap;
    }

    .social-link {
        width: 54px;
        height: 54px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg,
            rgba(139, 92, 246, 0.15),
            rgba(236, 72, 153, 0.12));
        border: 2px solid rgba(139, 92, 246, 0.3);
        border-radius: 16px;
        color: #E2E8F0;
        font-size: 22px;
        text-decoration: none;
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
        overflow: hidden;
    }

    .social-link::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, #8B5CF6, #EC4899, #06B6D4);
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .social-link:hover::before {
        opacity: 1;
    }

    .social-link i {
        position: relative;
        z-index: 1;
        transition: all 0.3s ease;
    }

    .social-link:hover {
        transform: translateY(-8px) scale(1.15) rotate(5deg);
        border-color: transparent;
        box-shadow: 0 20px 45px rgba(139, 92, 246, 0.5);
        color: #FFFFFF;
    }

    .social-link:hover i {
        transform: scale(1.2);
    }

    /* Footer Links Columns */
    .footer-column h3 {
        font-size: 22px;
        font-weight: 800;
        background: linear-gradient(135deg, #FFFFFF, #E0E7FF);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 28px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .footer-column h3 i {
        font-size: 24px;
        background: linear-gradient(135deg, #8B5CF6, #EC4899);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .footer-links {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .footer-link {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px 14px;
        color: #C7D2FE;
        text-decoration: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
    }

    .footer-link::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 3px;
        height: 0;
        background: linear-gradient(180deg, #8B5CF6, #EC4899);
        border-radius: 2px;
        transition: height 0.3s ease;
    }

    .footer-link:hover::before {
        height: 100%;
    }

    .footer-link:hover {
        padding-left: 22px;
        color: #FFFFFF;
        background: linear-gradient(135deg,
            rgba(139, 92, 246, 0.15),
            rgba(236, 72, 153, 0.1));
    }

    .footer-link i {
        color: #8B5CF6;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .footer-link:hover i {
        color: #EC4899;
        transform: translateX(4px);
    }

    /* Newsletter Section with Vue Integration */
    .newsletter-section h3 {
        font-size: 22px;
        font-weight: 800;
        background: linear-gradient(135deg, #FFFFFF, #E0E7FF);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .newsletter-box {
        background: linear-gradient(135deg,
            rgba(139, 92, 246, 0.12),
            rgba(236, 72, 153, 0.08));
        border: 2px solid rgba(139, 92, 246, 0.25);
        border-radius: 20px;
        padding: 32px;
        margin-bottom: 24px;
        position: relative;
        overflow: hidden;
    }

    .newsletter-box::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(139, 92, 246, 0.1) 0%, transparent 70%);
        animation: newsletter-pulse 6s ease-in-out infinite;
    }

    @keyframes newsletter-pulse {
        0%, 100% { transform: translate(0, 0) scale(1); opacity: 0.5; }
        50% { transform: translate(-10%, 10%) scale(1.2); opacity: 0.8; }
    }

    .newsletter-text {
        font-size: 16px;
        color: #C7D2FE;
        margin-bottom: 24px;
        font-weight: 600;
        position: relative;
        z-index: 1;
    }

    .newsletter-form {
        display: flex;
        gap: 12px;
        margin-bottom: 24px;
        position: relative;
        z-index: 1;
    }

    .newsletter-input {
        flex: 1;
        padding: 16px 20px;
        background: rgba(10, 14, 39, 0.9);
        border: 2px solid rgba(139, 92, 246, 0.3);
        border-radius: 14px;
        color: #FFFFFF;
        font-size: 16px;
        font-weight: 600;
        transition: all 0.4s ease;
    }

    .newsletter-input:focus {
        outline: none;
        border-color: #8B5CF6;
        background: rgba(10, 14, 39, 1);
        box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.2);
        transform: translateY(-2px);
    }

    .newsletter-input::placeholder {
        color: #64748B;
    }

    .newsletter-button {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 16px 28px;
        background: linear-gradient(135deg, #8B5CF6, #EC4899, #06B6D4);
        background-size: 200% auto;
        border: none;
        border-radius: 14px;
        color: #FFFFFF;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: 0 10px 30px rgba(139, 92, 246, 0.4);
    }

    .newsletter-button:hover {
        transform: translateY(-4px) scale(1.05);
        box-shadow: 0 20px 50px rgba(139, 92, 246, 0.6);
        background-position: right center;
    }

    .newsletter-button i {
        transition: transform 0.3s ease;
    }

    .newsletter-button:hover i {
        transform: translateX(6px);
    }

    .newsletter-features {
        display: flex;
        flex-direction: column;
        gap: 12px;
        position: relative;
        z-index: 1;
    }

    .newsletter-feature {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 14px;
        color: #C7D2FE;
        font-weight: 600;
    }

    .newsletter-feature i {
        color: #10B981;
        font-size: 18px;
    }

    /* Contact Cards */
    .contact-cards {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .contact-card {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 18px 20px;
        background: linear-gradient(135deg,
            rgba(139, 92, 246, 0.08),
            rgba(6, 182, 212, 0.05));
        border: 1px solid rgba(139, 92, 246, 0.2);
        border-radius: 14px;
        font-size: 15px;
        color: #C7D2FE;
        font-weight: 600;
        transition: all 0.4s ease;
        cursor: pointer;
    }

    .contact-card:hover {
        background: linear-gradient(135deg,
            rgba(139, 92, 246, 0.15),
            rgba(6, 182, 212, 0.1));
        border-color: rgba(139, 92, 246, 0.4);
        transform: translateX(6px);
    }

    .contact-card i {
        font-size: 20px;
        background: linear-gradient(135deg, #8B5CF6, #06B6D4);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Trending Courses Bar */
    .trending-courses {
        padding: 40px 0;
        margin-top: 40px;
        border-top: 2px solid rgba(139, 92, 246, 0.2);
        background: linear-gradient(135deg,
            rgba(139, 92, 246, 0.05),
            rgba(236, 72, 153, 0.03));
    }

    .trending-courses-wrapper {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 24px;
    }

    .trending-title {
        font-size: 28px;
        font-weight: 900;
        background: linear-gradient(135deg, #FFFFFF 0%, #E0E7FF 50%, #FFFFFF 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 16px;
        text-align: center;
        letter-spacing: -0.02em;
        text-shadow: 0 0 30px rgba(139, 92, 246, 0.3);
        position: relative;
    }

    .trending-title::before {
        content: '';
        position: absolute;
        bottom: -12px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: linear-gradient(90deg, transparent, #8B5CF6, #EC4899, transparent);
        border-radius: 2px;
    }

    .trending-title i {
        color: #F59E0B;
        animation: fire-pulse 2s ease-in-out infinite;
        font-size: 28px;
        filter: drop-shadow(0 0 10px rgba(245, 158, 11, 0.6));
        -webkit-text-fill-color: #F59E0B;
    }

    @keyframes fire-pulse {
        0%, 100% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.2); opacity: 0.7; }
    }

    .courses-slider {
        display: flex;
        gap: 40px;
        overflow: hidden;
        padding: 20px 0;
        position: relative;
    }

    .courses-scroll-content {
        display: flex;
        gap: 40px;
        animation: auto-scroll 30s linear infinite;
        will-change: transform;
    }

    @keyframes auto-scroll {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    .course-chip {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 14px 24px;
        background: linear-gradient(135deg,
            rgba(139, 92, 246, 0.15),
            rgba(236, 72, 153, 0.12));
        border: 2px solid rgba(139, 92, 246, 0.3);
        border-radius: 50px;
        color: #E2E8F0;
        font-size: 15px;
        font-weight: 700;
        text-decoration: none;
        white-space: nowrap;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        flex-shrink: 0;
    }

    .course-chip i {
        font-size: 18px;
        background: linear-gradient(135deg, #8B5CF6, #EC4899);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .course-chip:hover {
        background: linear-gradient(135deg,
            rgba(139, 92, 246, 0.3),
            rgba(236, 72, 153, 0.25));
        border-color: #8B5CF6;
        transform: translateY(-4px) scale(1.05);
        box-shadow: 0 12px 32px rgba(139, 92, 246, 0.4);
        color: #FFFFFF;
        animation-play-state: paused;
    }

    .courses-scroll-content:hover {
        animation-play-state: paused;
    }

    /* Animated AI Icons Background */
    .ai-icons-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 1;
        overflow: hidden;
        opacity: 0.15;
    }

    .ai-icon-floating {
        position: absolute;
        font-size: 48px;
        color: #8B5CF6;
        opacity: 0.6;
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
    }

    .ai-icon-floating:nth-child(1) {
        top: 10%;
        left: 5%;
        animation: float-1 15s infinite;
        color: #8B5CF6;
    }

    .ai-icon-floating:nth-child(2) {
        top: 60%;
        left: 15%;
        animation: float-2 18s infinite;
        color: #EC4899;
    }

    .ai-icon-floating:nth-child(3) {
        top: 30%;
        right: 10%;
        animation: float-3 20s infinite;
        color: #06B6D4;
    }

    .ai-icon-floating:nth-child(4) {
        top: 70%;
        right: 25%;
        animation: float-4 22s infinite;
        color: #F59E0B;
    }

    .ai-icon-floating:nth-child(5) {
        top: 15%;
        left: 45%;
        animation: float-5 17s infinite;
        color: #10B981;
    }

    .ai-icon-floating:nth-child(6) {
        top: 50%;
        right: 5%;
        animation: float-6 19s infinite;
        color: #8B5CF6;
    }

    .ai-icon-floating:nth-child(7) {
        top: 80%;
        left: 30%;
        animation: float-7 21s infinite;
        color: #EC4899;
    }

    .ai-icon-floating:nth-child(8) {
        top: 25%;
        left: 70%;
        animation: float-8 16s infinite;
        color: #06B6D4;
    }

    @keyframes float-1 {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        25% { transform: translate(30px, -20px) rotate(90deg); }
        50% { transform: translate(60px, 10px) rotate(180deg); }
        75% { transform: translate(30px, 30px) rotate(270deg); }
    }

    @keyframes float-2 {
        0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
        25% { transform: translate(-25px, 30px) rotate(-90deg) scale(1.2); }
        50% { transform: translate(-50px, -15px) rotate(-180deg) scale(0.9); }
        75% { transform: translate(-20px, -40px) rotate(-270deg) scale(1.1); }
    }

    @keyframes float-3 {
        0%, 100% { transform: translate(0, 0) rotate(360deg); }
        33% { transform: translate(-40px, 25px) rotate(240deg); }
        66% { transform: translate(-20px, -30px) rotate(120deg); }
    }

    @keyframes float-4 {
        0%, 100% { transform: translate(0, 0) scale(1); }
        50% { transform: translate(45px, -35px) scale(1.3); }
    }

    @keyframes float-5 {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        25% { transform: translateY(-30px) rotate(45deg); }
        50% { transform: translateY(0) rotate(90deg); }
        75% { transform: translateY(30px) rotate(135deg); }
    }

    @keyframes float-6 {
        0%, 100% { transform: translate(0, 0) rotate(-360deg); }
        50% { transform: translate(-55px, 40px) rotate(-180deg); }
    }

    @keyframes float-7 {
        0%, 100% { transform: translate(0, 0); }
        33% { transform: translate(35px, -25px); }
        66% { transform: translate(-30px, -15px); }
    }

    @keyframes float-8 {
        0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
        25% { transform: translate(-30px, 35px) rotate(60deg) scale(1.1); }
        50% { transform: translate(25px, 20px) rotate(120deg) scale(0.95); }
        75% { transform: translate(-15px, -25px) rotate(180deg) scale(1.05); }
    }

    /* Footer Bottom */
    .footer-bottom {
        position: relative;
        z-index: 3;
        background: linear-gradient(135deg,
            rgba(10, 14, 39, 0.95),
            rgba(26, 31, 58, 0.9));
        border-top: 2px solid rgba(139, 92, 246, 0.3);
        padding: 40px 24px;
        backdrop-filter: blur(10px);
    }

    .footer-bottom-content {
        max-width: 1400px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 32px;
    }

    .copyright {
        font-size: 16px;
        color: #C7D2FE;
        font-weight: 600;
    }

    .legal-links {
        display: flex;
        gap: 32px;
    }

    .legal-link {
        font-size: 16px;
        color: #C7D2FE;
        text-decoration: none;
        font-weight: 600;
        position: relative;
        transition: all 0.3s ease;
    }

    .legal-link::after {
        content: '';
        position: absolute;
        bottom: -4px;
        left: 0;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, #8B5CF6, #EC4899);
        transition: width 0.3s ease;
    }

    .legal-link:hover {
        color: #FFFFFF;
    }

    .legal-link:hover::after {
        width: 100%;
    }

    .payment-icons {
        display: flex;
        gap: 20px;
    }

    .payment-icon {
        font-size: 36px;
        color: #64748B;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .payment-icon:hover {
        color: #8B5CF6;
        transform: scale(1.25) translateY(-4px);
        filter: drop-shadow(0 6px 16px rgba(139, 92, 246, 0.6));
    }

    /* Floating Chat Button */
    .chat-fab {
        position: fixed;
        bottom: 40px;
        right: 40px;
        z-index: 9999;
    }

    .chat-button {
        width: 70px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #8B5CF6, #EC4899, #06B6D4);
        background-size: 200% auto;
        border: none;
        border-radius: 50%;
        color: #FFFFFF;
        font-size: 30px;
        cursor: pointer;
        box-shadow: 0 20px 50px rgba(139, 92, 246, 0.5);
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
        animation: chat-bounce 4s ease-in-out infinite;
    }

    @keyframes chat-bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    .chat-button:hover {
        transform: scale(1.2) rotate(15deg);
        background-position: right center;
        box-shadow: 0 30px 70px rgba(139, 92, 246, 0.7);
    }

    .chat-badge {
        position: absolute;
        top: -8px;
        right: -8px;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #EF4444, #DC2626);
        border: 3px solid #0A0E27;
        border-radius: 50%;
        font-size: 14px;
        font-weight: 800;
        animation: badge-bounce 2s ease-in-out infinite;
    }

    @keyframes badge-bounce {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.3); }
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .footer-grid {
            grid-template-columns: 1fr 1fr;
            gap: 48px;
        }

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }
    }

    @media (max-width: 768px) {
        .footer-grid {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .stats-grid {
            grid-template-columns: 1fr;
            gap: 16px;
        }

        .footer-bottom-content {
            flex-direction: column;
            text-align: center;
        }

        .legal-links {
            flex-wrap: wrap;
            justify-content: center;
        }

        .newsletter-form {
            flex-direction: column;
        }

        .newsletter-button {
            width: 100%;
            justify-content: center;
        }

        .chat-fab {
            bottom: 24px;
            right: 24px;
        }

        .chat-button {
            width: 64px;
            height: 64px;
            font-size: 26px;
        }

        .stat-value {
            font-size: 2rem;
        }

        .stat-icon {
            font-size: 28px;
        }

        .stat-icon-image {
            width: 35px;
            height: 35px;
        }

        .trending-courses {
            padding: 32px 0;
            margin-top: 32px;
        }

        .trending-courses-wrapper {
            padding: 0 16px;
        }

        .trending-title {
            font-size: 22px;
            margin-bottom: 24px;
            gap: 12px;
        }

        .trending-title i {
            font-size: 24px;
        }

        .course-chip {
            padding: 12px 20px;
            font-size: 14px;
        }

        .course-chip i {
            font-size: 16px;
        }

        .ai-icon-floating {
            font-size: 36px;
        }

        .footer-ai-icon {
            font-size: 48px;
        }
    }

    @media (max-width: 480px) {
        .vue-footer-modern {
            margin-top: 40px;
        }

        .footer-main {
            padding: 60px 16px;
        }

        .stats-section {
            padding: 32px 16px;
        }

        .footer-bottom {
            padding: 32px 16px;
        }

        .footer-logo {
            height: 50px;
        }

        .stat-value {
            font-size: 1.75rem;
        }

        .stat-icon {
            font-size: 24px;
        }

        .stat-icon-image {
            width: 30px;
            height: 30px;
        }

        .stat-card {
            padding: 20px 16px;
        }

        .stat-card.stamp-style {
            border-width: 3px;
            padding: 18px 14px;
        }

        .stat-card.stamp-style::after {
            font-size: 8px;
            top: 8px;
            right: 8px;
        }

        .trending-courses {
            padding: 24px 0;
            margin-top: 24px;
        }

        .trending-courses-wrapper {
            padding: 0 12px;
        }

        .trending-title {
            font-size: 20px;
            margin-bottom: 20px;
            gap: 10px;
        }

        .trending-title i {
            font-size: 22px;
        }

        .trending-title::before {
            width: 60px;
            height: 2px;
        }

        .course-chip {
            padding: 10px 18px;
            font-size: 13px;
        }

        .course-chip i {
            font-size: 15px;
        }

        .courses-slider {
            padding: 15px 0;
        }

        .courses-scroll-content {
            gap: 30px;
        }

        .ai-icon-floating {
            font-size: 32px;
        }

        .footer-ai-icon {
            font-size: 40px;
        }
    }

    /* Accessibility */
    @media (prefers-reduced-motion: reduce) {
        .vue-footer-modern *,
        .vue-footer-modern *::before,
        .vue-footer-modern *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }
    }

    /* Vue Transition Effects */
    .fade-enter-active, .fade-leave-active {
        transition: opacity 0.5s;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0;
    }

    .slide-fade-enter-active {
        transition: all 0.3s ease;
    }
    .slide-fade-leave-active {
        transition: all 0.3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    .slide-fade-enter, .slide-fade-leave-to {
        transform: translateX(10px);
        opacity: 0;
    }
</style>

<!-- Vue.js 3 CDN - Only load if not already present -->
<script>
    if (typeof Vue === 'undefined') {
        var script = document.createElement('script');
        script.src = 'https://unpkg.com/vue@3/dist/vue.global.js';
        document.head.appendChild(script);
    }
</script>

<!-- Modern Vue-Powered Footer HTML -->
<footer class="vue-footer-modern" id="footerApp">
    <!-- Global AI Icons Background -->
    <div class="footer-ai-icons-bg">
        <i class="fas fa-robot footer-ai-icon"></i>
        <i class="fas fa-brain footer-ai-icon"></i>
        <i class="fas fa-microchip footer-ai-icon"></i>
        <i class="fas fa-server footer-ai-icon"></i>
        <i class="fas fa-code footer-ai-icon"></i>
        <i class="fas fa-database footer-ai-icon"></i>
        <i class="fas fa-network-wired footer-ai-icon"></i>
        <i class="fas fa-atom footer-ai-icon"></i>
        <i class="fas fa-chart-line footer-ai-icon"></i>
        <i class="fas fa-project-diagram footer-ai-icon"></i>
    </div>

    <!-- Neural Network Background -->
    <div class="neural-network-bg">
        <canvas id="neuralCanvas" style="width: 100%; height: 100%;"></canvas>
    </div>

    <!-- Ambient Glow Effects -->
    <div class="ambient-glow">
        <div class="glow-orb glow-orb-1"></div>
        <div class="glow-orb glow-orb-2"></div>
        <div class="glow-orb glow-orb-3"></div>
    </div>

    <!-- AI Activity Ticker -->
    <div class="ai-activity-ticker">
        <div class="ticker-content">
            <div v-for="(activity, index) in activityFeed" :key="'activity-' + index" class="ticker-item">
                <i :class="activity.icon" class="ticker-icon"></i>
                <span class="ticker-label">{{ activity.label }}:</span>
                <span class="ticker-value">{{ activity.value }}</span>
            </div>
            <!-- Duplicate for seamless loop -->
            <div v-for="(activity, index) in activityFeed" :key="'activity-dup-' + index" class="ticker-item">
                <i :class="activity.icon" class="ticker-icon"></i>
                <span class="ticker-label">{{ activity.label }}:</span>
                <span class="ticker-value">{{ activity.value }}</span>
            </div>
        </div>
    </div>

    <!-- Dynamic Stats Section -->
    <div class="stats-section">
        <div class="stats-container">
            <div class="stats-grid">
                <div v-for="stat in stats" :key="stat.label" :class="['stat-card', { 'stamp-style': stat.iconImage }]" @mouseenter="animateStatValue">
                    <img v-if="stat.iconImage" :src="stat.iconImage" class="stat-icon stat-icon-image" alt="icon" />
                    <i v-else :class="stat.icon" class="stat-icon"></i>
                    <div class="stat-value">{{ stat.value }}</div>
                    <div class="stat-label">{{ stat.label }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Trending Courses -->
    <div class="trending-courses">
        <!-- Animated AI Icons Background -->
        <div class="ai-icons-background">
            <i class="fas fa-robot ai-icon-floating"></i>
            <i class="fas fa-brain ai-icon-floating"></i>
            <i class="fas fa-microchip ai-icon-floating"></i>
            <i class="fas fa-chart-line ai-icon-floating"></i>
            <i class="fas fa-code ai-icon-floating"></i>
            <i class="fas fa-network-wired ai-icon-floating"></i>
            <i class="fas fa-atom ai-icon-floating"></i>
            <i class="fas fa-project-diagram ai-icon-floating"></i>
        </div>

        <div class="trending-courses-wrapper">
            <h4 class="trending-title">
                <i class="fas fa-fire"></i>
                Trending Courses
            </h4>
            <div class="courses-slider">
                <div class="courses-scroll-content">
                    <a v-for="course in trendingCourses"
                       :key="course.name"
                       :href="course.url"
                       class="course-chip">
                        <i :class="course.icon"></i>
                        {{ course.name }}
                    </a>
                    <!-- Duplicate for seamless loop -->
                    <a v-for="course in trendingCourses"
                       :key="'dup-' + course.name"
                       :href="course.url"
                       class="course-chip">
                        <i :class="course.icon"></i>
                        {{ course.name }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Footer Content -->
    <div class="footer-main">
        <div class="footer-container">
            <div class="footer-grid">
                <!-- Brand & Social Column -->
                <div class="brand-section">
                    <div class="footer-logo-wrapper">
                        <img src="/pluginfile.php?file=%2F1%2Ftheme_edoo%2Fmain_footer_logo%2F-1%2Fflogo.png"
                             alt="Bheem Academy"
                             class="footer-logo">
                    </div>

                    <p class="brand-tagline">
                        {{ brandInfo.tagline }}
                    </p>

                    <div class="social-links">
                        <a v-for="social in socialLinks"
                           :key="social.name"
                           :href="social.url"
                           :title="social.name"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="social-link">
                            <i :class="social.icon"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links Column -->
                <div class="footer-column">
                    <h3>
                        <i class="fas fa-compass"></i>
                        Quick Links
                    </h3>
                    <div class="footer-links">
                        <a v-for="link in quickLinks"
                           :key="link.name"
                           :href="link.url"
                           class="footer-link">
                            <i class="fas fa-angle-right"></i>
                            {{ link.name }}
                        </a>
                    </div>
                </div>

                <!-- Resources Column -->
                <div class="footer-column">
                    <h3>
                        <i class="fas fa-book"></i>
                        Resources
                    </h3>
                    <div class="footer-links">
                        <a v-for="link in resources"
                           :key="link.name"
                           :href="link.url"
                           class="footer-link">
                            <i class="fas fa-angle-right"></i>
                            {{ link.name }}
                        </a>
                    </div>
                </div>

                <!-- Newsletter & Contact Column -->
                <div class="footer-column">
                    <h3>
                        <i class="fas fa-envelope"></i>
                        Stay Connected
                    </h3>

                    <div class="newsletter-box">
                        <p class="newsletter-text">{{ newsletterInfo.description }}</p>
                        <form class="newsletter-form" @submit.prevent="handleNewsletterSubmit">
                            <input
                                type="email"
                                v-model="newsletterEmail"
                                class="newsletter-input"
                                placeholder="Enter your email"
                                required>
                            <button type="submit" class="newsletter-button" :disabled="subscribing">
                                <span>{{ subscribing ? 'Subscribing...' : 'Subscribe' }}</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </form>
                        <div class="newsletter-features">
                            <div v-for="feature in newsletterInfo.features" :key="feature" class="newsletter-feature">
                                <i class="fas fa-check"></i>
                                {{ feature }}
                            </div>
                        </div>
                    </div>

                    <div class="contact-cards">
                        <div v-for="contact in contactInfo" :key="contact.label" class="contact-card">
                            <i :class="contact.icon"></i>
                            <span>{{ contact.label }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="footer-bottom-content">
            <div class="copyright">
                <p>© {{ currentYear }} Bheem Academy • {{ footerInfo.tagline }}</p>
            </div>
            <div class="legal-links">
                <a v-for="link in legalLinks"
                   :key="link.name"
                   :href="link.url"
                   class="legal-link">
                    {{ link.name }}
                </a>
            </div>
            <div class="payment-icons">
                <i v-for="icon in paymentIcons" :key="icon" :class="icon" class="payment-icon"></i>
            </div>
        </div>
    </div>

    <!-- Floating Chat Button -->
    <div class="chat-fab">
        <button @click="toggleChat" class="chat-button">
            <i class="fas fa-comments"></i>
            <span v-if="unreadMessages > 0" class="chat-badge">{{ unreadMessages }}</span>
        </button>
    </div>
</footer>

<script>
// Vue 3 Application - Wait for DOM and Vue to be ready
(function initFooterApp() {
    // Check if Vue is available
    if (typeof Vue === 'undefined') {
        // Wait for Vue to load
        setTimeout(initFooterApp, 50);
        return;
    }

    // Check if footer element exists
    if (!document.getElementById('footerApp')) {
        // Wait for DOM
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initFooterApp);
        } else {
            setTimeout(initFooterApp, 50);
        }
        return;
    }

    // Initialize the footer Vue app
    const { createApp } = Vue;

    createApp({
    data() {
        return {
        
            // Brand Information
            brandInfo: {
                tagline: 'Revolutionizing AI education for all ages. From curious 8-year-olds to experienced professionals in their 80s.'
            },

            // Activity Feed (for ticker)
            activityFeed: [
                { icon: 'fas fa-circle pulse', label: 'Live', value: '342 students online' },
                { icon: 'fas fa-graduation-cap', label: 'New', value: 'Advanced Prompt Engineering' },
                { icon: 'fas fa-trophy', label: 'Achievement', value: 'Sarah completed AI Fundamentals' },
                { icon: 'fas fa-fire', label: 'Trending', value: 'LLaMA Fine-tuning Workshop' },
                { icon: 'fas fa-star', label: 'Milestone', value: '10K+ certificates issued' },
                { icon: 'fas fa-rocket', label: 'Launch', value: 'Neural Networks Masterclass' }
            ],

            // Statistics
            stats: [
                { icon: 'fas fa-users', value: '15,000+', label: 'Active Learners' },
                { icon: 'fas fa-book-open', value: '10+', label: 'AI Courses' },
                { iconImage: 'https://upload.wikimedia.org/wikipedia/commons/5/51/IBM_logo.svg', value: 'recognized', label: 'Certificates' },
                { icon: 'fas fa-star', value: '100%', label: 'Success Rate' }
            ],

            // Social Links
            socialLinks: [
                { name: 'Facebook', icon: 'fab fa-facebook-f', url: 'https://www.facebook.com/bheemacademy' },
                { name: 'Twitter', icon: 'fab fa-twitter', url: 'https://twitter.com/bheemacademy' },
                { name: 'LinkedIn', icon: 'fab fa-linkedin-in', url: 'https://www.linkedin.com/company/bheemacademy' },
                { name: 'Instagram', icon: 'fab fa-instagram', url: 'https://www.instagram.com/bheemacademy' },
                { name: 'YouTube', icon: 'fab fa-youtube', url: 'https://www.youtube.com/@bheemacademy' }
            ],

            // Quick Links
            quickLinks: [
                { name: 'All Courses', url: '/course/' },
                { name: 'Dashboard', url: '/my/' },
                { name: 'My Certificates', url: '/badges/mybadges.php' },
                { name: 'Blog & News', url: '/blog/list.php' },
                { name: 'Community', url: '/mod/forum/' },
                { name: 'My Profile', url: '/user/profile.php' }
            ],

            // Resources
            resources: [
                { name: 'Help Center', url: '/mod/page/view.php?id=3' },
                { name: 'Documentation', url: '/mod/page/view.php?id=4' },
                { name: 'AI Tools', url: '/mod/page/view.php?id=5' },
                { name: 'API Access', url: '/mod/page/view.php?id=6' },
                { name: 'Downloads', url: '/mod/page/view.php?id=7' },
                { name: 'Contact Us', url: '/mod/page/view.php?id=11' }
            ],

            // Newsletter
            newsletterInfo: {
                description: 'Get exclusive AI insights and course updates',
                features: [
                    'Weekly AI News',
                    'Exclusive Offers',
                    'Free Resources'
                ]
            },
            newsletterEmail: '',
            subscribing: false,

            // Contact
            contactInfo: [
                { icon: 'fas fa-headset', label: '24/7 Support Available' },
                { icon: 'fas fa-envelope', label: 'support@bheem.academy' }
            ],

            // Trending Courses
            trendingCourses: [
                { name: 'Intro to ChatGPT', icon: 'fas fa-robot', url: '/course/' },
                { name: 'Neural Networks 101', icon: 'fas fa-brain', url: '/course/' },
                { name: 'Python for AI', icon: 'fas fa-code', url: '/course/' },
                { name: 'AI Art Generation', icon: 'fas fa-palette', url: '/course/' },
                { name: 'Data Science Basics', icon: 'fas fa-chart-line', url: '/course/' }
            ],

            // Footer Bottom
            currentYear: new Date().getFullYear(),
            footerInfo: {
                tagline: 'Empowering minds through AI'
            },
            legalLinks: [
                { name: 'Privacy Policy', url: '/mod/page/view.php?id=8' },
                { name: 'Terms of Service', url: '/mod/page/view.php?id=9' },
                { name: 'Cookie Policy', url: '/mod/page/view.php?id=10' },
                { name: 'Sitemap', url: '/mod/page/view.php?id=12' }
            ],
            paymentIcons: [
                'fab fa-cc-visa',
                'fab fa-cc-mastercard',
                'fab fa-cc-paypal',
                'fab fa-cc-stripe'
            ],

            // Chat
            unreadMessages: 1,
            chatOpen: false
        }
    },

    methods: {
        // Newsletter submission
        handleNewsletterSubmit() {
            if (!this.newsletterEmail) return;

            this.subscribing = true;

            // Simulate API call
            setTimeout(() => {
                alert(`Thank you for subscribing! We'll send AI updates to ${this.newsletterEmail}`);
                this.newsletterEmail = '';
                this.subscribing = false;
            }, 1000);
        },

        // Animate stat value on hover
        animateStatValue(event) {
            const card = event.currentTarget;
            const value = card.querySelector('.stat-value');
            value.style.transform = 'scale(1.1)';
            setTimeout(() => {
                value.style.transform = 'scale(1)';
            }, 300);
        },

        // Toggle chat
        toggleChat() {
            this.chatOpen = !this.chatOpen;
            if (this.chatOpen) {
                this.unreadMessages = 0;
                // Open chat widget logic here
                alert('Chat feature coming soon!');
            }
        },

        // Initialize neural network canvas animation
        initNeuralNetwork() {
            const canvas = document.getElementById('neuralCanvas');
            if (!canvas) return;

            const ctx = canvas.getContext('2d');
            canvas.width = canvas.offsetWidth;
            canvas.height = canvas.offsetHeight;

            const nodes = [];
            const nodeCount = 30;

            // Create nodes
            for (let i = 0; i < nodeCount; i++) {
                nodes.push({
                    x: Math.random() * canvas.width,
                    y: Math.random() * canvas.height,
                    vx: (Math.random() - 0.5) * 0.5,
                    vy: (Math.random() - 0.5) * 0.5,
                    radius: 2
                });
            }

            // Animation loop
            function animate() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);

                // Update and draw nodes
                nodes.forEach((node, i) => {
                    node.x += node.vx;
                    node.y += node.vy;

                    // Bounce off edges
                    if (node.x < 0 || node.x > canvas.width) node.vx *= -1;
                    if (node.y < 0 || node.y > canvas.height) node.vy *= -1;

                    // Draw node
                    ctx.fillStyle = 'rgba(139, 92, 246, 0.6)';
                    ctx.beginPath();
                    ctx.arc(node.x, node.y, node.radius, 0, Math.PI * 2);
                    ctx.fill();

                    // Draw connections
                    nodes.forEach((otherNode, j) => {
                        if (i === j) return;
                        const dx = otherNode.x - node.x;
                        const dy = otherNode.y - node.y;
                        const distance = Math.sqrt(dx * dx + dy * dy);

                        if (distance < 150) {
                            ctx.strokeStyle = `rgba(139, 92, 246, ${0.3 * (1 - distance / 150)})`;
                            ctx.lineWidth = 1;
                            ctx.beginPath();
                            ctx.moveTo(node.x, node.y);
                            ctx.lineTo(otherNode.x, otherNode.y);
                            ctx.stroke();
                        }
                    });
                });

                requestAnimationFrame(animate);
            }

            animate();

            // Handle window resize
            window.addEventListener('resize', () => {
                canvas.width = canvas.offsetWidth;
                canvas.height = canvas.offsetHeight;
            });
        }
    },

    mounted() {
        // Initialize neural network animation
        this.$nextTick(() => {
            this.initNeuralNetwork();
        });
    }
    }).mount('#footerApp');
})(); // End of initFooterApp IIFE
</script>

</body>
</html>
