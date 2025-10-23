<?php
/**
 * Bheem Academy - Unified Header Component with Full Styles
 * Works with both Moodle authentication and admin session authentication
 * Can be included in any page to maintain consistent navigation
 */

// Check if we're in a Moodle context or standalone admin context
$is_moodle_context = defined('MOODLE_INTERNAL');
$is_admin_authenticated = isset($_SESSION['admin_authenticated']) && $_SESSION['admin_authenticated'] === true;

// Get user info based on authentication context
if ($is_admin_authenticated) {
    $user_firstname = $_SESSION['admin_username'] ?? 'Admin';
    $is_logged_in = true;
    $user_role = 'admin';
} elseif ($is_moodle_context && isloggedin() && !isguestuser()) {
    $user_firstname = $USER->firstname;
    $is_logged_in = true;
    $user_role = 'user';
} else {
    $is_logged_in = false;
    $user_role = 'guest';
}
?>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Header Styles -->
<link rel="stylesheet" href="<?php echo $CFG->wwwroot; ?>/includes/bheem_header_styles.css">

<style>
/* Ensure body has padding for fixed header */
body {
    padding-top: 80px !important;
}

/* Hide all Moodle default navigation */
.navbar, nav.navbar, #page-header .navbar, .primary-navigation,
.drawer-toggles, [data-region="drawer"], .breadcrumb-wrapper {
    display: none !important;
}
</style>


<header class="professional-header" id="professionalHeader">
    <div class="header-container">
        <!-- Logo Section -->
        <div class="logo-section">
            <a href="<?php echo $CFG->wwwroot; ?>/" class="brand-logo">
                <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/26637bef-052f-4eec-f6f8-a44a2d6fbf00/public" alt="Bheem Academy" class="logo-img">
            </a>
        </div>

        <!-- Navigation Section -->
        <div class="navigation-section">
            <nav class="main-navigation">
                <div class="nav-item">
                    <a href="<?php echo $CFG->wwwroot; ?>/" class="nav-link <?php echo ($PAGE->pagetype == 'site-index') ? 'active' : ''; ?>">
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
                        <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=8" class="dropdown-item">
                            <i class="fas fa-star dropdown-item-icon" style="color: #ffd700;"></i>
                            Junior AI Basics
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=9" class="dropdown-item">
                            <i class="fas fa-trophy dropdown-item-icon" style="color: #ff6b35;"></i>
                            Junior AI Mastery
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=10" class="dropdown-item">
                            <i class="fas fa-code dropdown-item-icon" style="color: #4ecdc4;"></i>
                            Junior Coding Explorer
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=11" class="dropdown-item">
                            <i class="fas fa-gamepad dropdown-item-icon" style="color: #95e1d3;"></i>
                            Junior Game Builder
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=12" class="dropdown-item">
                            <i class="fas fa-palette dropdown-item-icon" style="color: #f38ba8;"></i>
                            Junior Creative Tech Lab
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=13" class="dropdown-item">
                            <i class="fas fa-tools dropdown-item-icon" style="color: #a6e3a1;"></i>
                            Junior Mini Makers
                        </a>
                    </div>
                </div>

                <div class="nav-item">
                    <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=39" class="nav-link">
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
                        <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=41" class="dropdown-item">
                            <i class="fas fa-chalkboard-teacher dropdown-item-icon" style="color: #4ecdc4;"></i>
                            AI for Teachers
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=42" class="dropdown-item">
                            <i class="fas fa-gavel dropdown-item-icon" style="color: #8b5cf6;"></i>
                            AI for Lawyers
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=17" class="dropdown-item">
                            <i class="fas fa-calculator dropdown-item-icon" style="color: #f59e0b;"></i>
                            AI for Accountant
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=20" class="dropdown-item">
                            <i class="fas fa-user-tie dropdown-item-icon" style="color: #10b981;"></i>
                            AI for Office Admins
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=16" class="dropdown-item">
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
                        <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=43" class="dropdown-item">
                            <i class="fas fa-crown dropdown-item-icon" style="color: #ffd700;"></i>
                            AI Social 360 Pro (6 Months)
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=37" class="dropdown-item">
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
                        <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=35" class="dropdown-item">
                            <i class="fas fa-crown dropdown-item-icon" style="color: #ffd700;"></i>
                            AI Creator Suite Pro (6 Months)
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=36" class="dropdown-item">
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
                        <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=38" class="dropdown-item">
                            <i class="fas fa-rocket dropdown-item-icon" style="color: #4ecdc4;"></i>
                            Bheem Superstar – AI Engineer Launchpad
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=40" class="dropdown-item">
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
                <button class="cta-button cta-dropdown-btn">
                    <i class="fas fa-phone"></i>
                    Get In Touch
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="cta-dropdown">
                    <a href="<?php echo $CFG->wwwroot; ?>/login/signup.php" class="cta-dropdown-item">
                        <i class="fas fa-user-plus"></i>
                        <span>Register Now</span>
                    </a>
                    <a href="<?php echo $CFG->wwwroot; ?>/schedule.html" class="cta-dropdown-item">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Schedule a Call</span>
                    </a>
                    <a href="<?php echo $CFG->wwwroot; ?>/contact.html" class="cta-dropdown-item">
                        <i class="fas fa-envelope"></i>
                        <span>Contact Us</span>
                    </a>
                    <a href="https://wa.me/yourphonenumber" class="cta-dropdown-item" target="_blank">
                        <i class="fab fa-whatsapp"></i>
                        <span>WhatsApp</span>
                    </a>
                </div>
            </div>

            <!-- Login/User Dropdown -->
            <?php if ($is_logged_in): ?>
                <div class="login-dropdown-container">
                    <button class="login-btn">
                        <i class="fas fa-<?php echo ($user_role === 'admin') ? 'user-shield' : 'user'; ?>"></i>
                        <span><?php echo htmlspecialchars($user_firstname); ?></span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="login-dropdown">
                        <?php if ($user_role === 'admin'): ?>
                            <a href="<?php echo $CFG->wwwroot; ?>/admin-user-management.php" class="login-dropdown-item">
                                <i class="fas fa-users-cog"></i>
                                <span>User Management</span>
                            </a>
                            <a href="<?php echo $CFG->wwwroot; ?>/admin-course-assignment.php" class="login-dropdown-item">
                                <i class="fas fa-chalkboard-teacher"></i>
                                <span>Course Assignment</span>
                            </a>
                            <a href="<?php echo $CFG->wwwroot; ?>/admin-login.php?logout=1" class="login-dropdown-item">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </a>
                        <?php else: ?>
                            <a href="<?php echo $CFG->wwwroot; ?>/my/" class="login-dropdown-item">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>
                            <a href="<?php echo $CFG->wwwroot; ?>/user/profile.php" class="login-dropdown-item">
                                <i class="fas fa-user-circle"></i>
                                <span>Profile</span>
                            </a>
                            <a href="<?php echo $CFG->wwwroot; ?>/login/logout.php?sesskey=<?php echo sesskey(); ?>" class="login-dropdown-item">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="login-dropdown-container">
                    <button class="login-btn">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Login</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="login-dropdown">
                        <a href="<?php echo $CFG->wwwroot; ?>/login/index.php?user=student" class="login-dropdown-item">
                            <i class="fas fa-user-graduate"></i>
                            <span>Student</span>
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/login.php?user=mentor" class="login-dropdown-item">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <span>Mentor</span>
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/login/index.php?user=parent" class="login-dropdown-item">
                            <i class="fas fa-user-friends"></i>
                            <span>Parent</span>
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/admin-login.php" class="login-dropdown-item">
                            <i class="fas fa-user-shield"></i>
                            <span>Admin</span>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
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
        <a href="<?php echo $CFG->wwwroot; ?>/" class="mobile-nav-link">
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
            <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=8" class="mobile-dropdown-item">Junior AI Basics</a>
            <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=9" class="mobile-dropdown-item">Junior AI Mastery</a>
            <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=10" class="mobile-dropdown-item">Junior Coding Explorer</a>
            <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=11" class="mobile-dropdown-item">Junior Game Builder</a>
            <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=12" class="mobile-dropdown-item">Junior Creative Tech Lab</a>
            <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=13" class="mobile-dropdown-item">Junior Mini Makers</a>
        </div>
    </div>

    <div class="mobile-nav-item">
        <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=39" class="mobile-nav-link">
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
            <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=41" class="mobile-dropdown-item">AI for Teachers</a>
            <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=42" class="mobile-dropdown-item">AI for Lawyers</a>
            <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=17" class="mobile-dropdown-item">AI for Accountant</a>
            <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=20" class="mobile-dropdown-item">AI for Office Admins</a>
            <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=16" class="mobile-dropdown-item">AI for HR</a>
        </div>
    </div>

    <div class="mobile-nav-item">
        <button class="mobile-dropdown-toggle" onclick="toggleMobileDropdown('mobile-ai360')">
            <span><i class="fas fa-globe"></i> AI Social 360</span>
            <i class="fas fa-chevron-down"></i>
        </button>
        <div class="mobile-dropdown" id="mobile-ai360">
            <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=43" class="mobile-dropdown-item">AI Social 360 Pro (6 Months)</a>
            <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=37" class="mobile-dropdown-item">AI Social 360 Fasttrack (3 Months)</a>
        </div>
    </div>

    <div class="mobile-nav-item">
        <button class="mobile-dropdown-toggle" onclick="toggleMobileDropdown('mobile-creators')">
            <span><i class="fas fa-video"></i> Influencers & Creators</span>
            <i class="fas fa-chevron-down"></i>
        </button>
        <div class="mobile-dropdown" id="mobile-creators">
            <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=35" class="mobile-dropdown-item">AI Creator Suite Pro (6 Months)</a>
            <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=36" class="mobile-dropdown-item">AI Creator Fast Track (3 Months)</a>
        </div>
    </div>

    <div class="mobile-nav-item">
        <button class="mobile-dropdown-toggle" onclick="toggleMobileDropdown('mobile-superstars')">
            <span><i class="fas fa-star"></i> Super Stars</span>
            <i class="fas fa-chevron-down"></i>
        </button>
        <div class="mobile-dropdown" id="mobile-superstars">
            <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=38" class="mobile-dropdown-item">Bheem Superstar – AI Engineer Launchpad</a>
            <a href="<?php echo $CFG->wwwroot; ?>/course/view.php?id=40" class="mobile-dropdown-item">Bheem Superstar – AI Engineer Mastery</a>
        </div>
    </div>

    <!-- Mobile Auth Section -->
    <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #e5e7eb;">
        <?php if ($is_logged_in): ?>
            <?php if ($user_role === 'admin'): ?>
                <div class="mobile-nav-item">
                    <a href="<?php echo $CFG->wwwroot; ?>/admin-user-management.php" class="mobile-nav-link">
                        <i class="fas fa-users-cog"></i>
                        User Management
                    </a>
                </div>
                <div class="mobile-nav-item">
                    <a href="<?php echo $CFG->wwwroot; ?>/admin-course-assignment.php" class="mobile-nav-link">
                        <i class="fas fa-chalkboard-teacher"></i>
                        Course Assignment
                    </a>
                </div>
                <div class="mobile-nav-item">
                    <a href="<?php echo $CFG->wwwroot; ?>/admin-login.php?logout=1" class="mobile-nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </a>
                </div>
            <?php else: ?>
                <div class="mobile-nav-item">
                    <a href="<?php echo $CFG->wwwroot; ?>/my/" class="mobile-nav-link">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                </div>
                <div class="mobile-nav-item">
                    <a href="<?php echo $CFG->wwwroot; ?>/user/profile.php" class="mobile-nav-link">
                        <i class="fas fa-user-circle"></i>
                        Profile
                    </a>
                </div>
                <div class="mobile-nav-item">
                    <a href="<?php echo $CFG->wwwroot; ?>/login/logout.php?sesskey=<?php echo sesskey(); ?>" class="mobile-nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </a>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="mobile-nav-item">
                <button class="mobile-dropdown-toggle" onclick="toggleMobileDropdown('mobile-login')">
                    <span><i class="fas fa-sign-in-alt"></i> Login</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="mobile-dropdown" id="mobile-login">
                    <a href="<?php echo $CFG->wwwroot; ?>/login/index.php?user=student" class="mobile-dropdown-item">
                        <i class="fas fa-user-graduate"></i> Student
                    </a>
                    <a href="<?php echo $CFG->wwwroot; ?>/login.php?user=mentor" class="mobile-dropdown-item">
                        <i class="fas fa-chalkboard-teacher"></i> Mentor
                    </a>
                    <a href="<?php echo $CFG->wwwroot; ?>/login/index.php?user=parent" class="mobile-dropdown-item">
                        <i class="fas fa-user-friends"></i> Parent
                    </a>
                    <a href="<?php echo $CFG->wwwroot; ?>/admin-login.php" class="mobile-dropdown-item">
                        <i class="fas fa-user-shield"></i> Admin
                    </a>
                </div>
            </div>
        <?php endif; ?>
        <div class="mobile-nav-item">
            <a href="<?php echo $CFG->wwwroot; ?>/schedule.html" class="mobile-nav-link" style="background: linear-gradient(135deg, #8B5CF6, #EC4899); color: white; border-color: #8B5CF6; margin-top: 8px;">
                <i class="fas fa-phone"></i>
                Get In Touch
            </a>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay" id="mobileMenuOverlay"></div>

<script>
(function() {
    'use strict';

    // Mobile menu toggle
    document.getElementById('mobileToggle')?.addEventListener('click', function() {
        document.getElementById('mobileMenu')?.classList.add('active');
        document.getElementById('mobileMenuOverlay')?.classList.add('active');
    });

    document.getElementById('mobileClose')?.addEventListener('click', function() {
        document.getElementById('mobileMenu')?.classList.remove('active');
        document.getElementById('mobileMenuOverlay')?.classList.remove('active');
    });

    document.getElementById('mobileMenuOverlay')?.addEventListener('click', function() {
        document.getElementById('mobileMenu')?.classList.remove('active');
        this.classList.remove('active');
    });

    // Mobile dropdown toggle - make it global
    window.toggleMobileDropdown = function(id) {
        const dropdown = document.getElementById(id);
        const toggle = dropdown?.previousElementSibling;

        if (dropdown && toggle) {
            dropdown.classList.toggle('active');
            toggle.classList.toggle('active');
        }
    };

    // Scroll effect for header
    let bheemHeaderLastScroll = 0;
    window.addEventListener('scroll', function() {
        const header = document.getElementById('professionalHeader');
        const currentScroll = window.pageYOffset;

        if (currentScroll > 100) {
            header?.classList.add('scrolled');
        } else {
            header?.classList.remove('scrolled');
        }

        bheemHeaderLastScroll = currentScroll;
    });
})();
</script>
