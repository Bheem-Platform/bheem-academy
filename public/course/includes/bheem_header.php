<?php
/**
 * Bheem Academy - Unified Header Component
 * Works with both Moodle authentication and admin session authentication
 * Can be included in any page to maintain consistent navigation
 */

// ============================================
// CONFIGURATION - BHEEM ACADEMY BRANDING
// ============================================
// Logo URL - Change this to update logo across all pages
$bheem_logo_url = 'https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/26637bef-052f-4eec-f6f8-a44a2d6fbf00/public';
$bheem_logo_alt = 'Bheem Academy';

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
<header class="professional-header" id="professionalHeader">
    <div class="header-container">
        <!-- Logo Section -->
        <div class="logo-section">
            <a href="<?php echo $CFG->wwwroot; ?>/" class="brand-logo">
                <img src="<?php echo $bheem_logo_url; ?>" alt="<?php echo $bheem_logo_alt; ?>" class="logo-img">
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
                        <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=8" class="dropdown-item">
                            <i class="fas fa-star dropdown-item-icon" style="color: #ffd700;"></i>
                            Junior AI Basics
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=9" class="dropdown-item">
                            <i class="fas fa-trophy dropdown-item-icon" style="color: #ff6b35;"></i>
                            Junior AI Mastery
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=10" class="dropdown-item">
                            <i class="fas fa-code dropdown-item-icon" style="color: #4ecdc4;"></i>
                            Junior Coding Explorer
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=11" class="dropdown-item">
                            <i class="fas fa-gamepad dropdown-item-icon" style="color: #95e1d3;"></i>
                            Junior Game Builder
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=12" class="dropdown-item">
                            <i class="fas fa-palette dropdown-item-icon" style="color: #f38ba8;"></i>
                            Junior Creative Tech Lab
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=13" class="dropdown-item">
                            <i class="fas fa-tools dropdown-item-icon" style="color: #a6e3a1;"></i>
                            Junior Mini Makers
                        </a>
                    </div>
                </div>

                <div class="nav-item">
                    <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=39" class="nav-link">
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
                        <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=41" class="dropdown-item">
                            <i class="fas fa-chalkboard-teacher dropdown-item-icon" style="color: #4ecdc4;"></i>
                            AI for Teachers
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=42" class="dropdown-item">
                            <i class="fas fa-gavel dropdown-item-icon" style="color: #8b5cf6;"></i>
                            AI for Lawyers
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=17" class="dropdown-item">
                            <i class="fas fa-calculator dropdown-item-icon" style="color: #f59e0b;"></i>
                            AI for Accountant
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=20" class="dropdown-item">
                            <i class="fas fa-user-tie dropdown-item-icon" style="color: #10b981;"></i>
                            AI for Office Admins
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=16" class="dropdown-item">
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
                        <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=43" class="dropdown-item">
                            <i class="fas fa-crown dropdown-item-icon" style="color: #ffd700;"></i>
                            AI Social 360 Pro (6 Months)
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=37" class="dropdown-item">
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
                        <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=35" class="dropdown-item">
                            <i class="fas fa-crown dropdown-item-icon" style="color: #ffd700;"></i>
                            AI Creator Suite Pro (6 Months)
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=36" class="dropdown-item">
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
                        <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=38" class="dropdown-item">
                            <i class="fas fa-rocket dropdown-item-icon" style="color: #4ecdc4;"></i>
                            Bheem Superstar – AI Engineer Launchpad
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=40" class="dropdown-item">
                            <i class="fas fa-trophy dropdown-item-icon" style="color: #ffd700;"></i>
                            Bheem Superstar – AI Engineer Mastery
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Header Actions -->
        <div class="header-actions">
            <?php
            // Show dark mode toggle on dashboard pages, "Get In Touch" on other pages
            $current_script = basename($_SERVER['PHP_SELF']);
            $is_dashboard = in_array($current_script, ['dashboard.php', 'student-dashboard.php', 'parent-dashboard.php', 'mentor-dashboard.php']);

            if ($is_dashboard):
            ?>
            <!-- Dark/Light Mode Toggle (Dashboard Only) -->
            <button class="theme-toggle-btn" id="themeToggle" aria-label="Toggle dark mode">
                <i class="fas fa-sun theme-icon light-icon"></i>
                <i class="fas fa-moon theme-icon dark-icon"></i>
            </button>
            <?php else: ?>
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
                        <a href="<?php echo $CFG->wwwroot; ?>/register.php" class="cta-dropdown-link">
                            <i class="fas fa-user-plus"></i>
                            Register Now
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/contact.html" class="cta-dropdown-link">
                            <i class="fas fa-envelope"></i>
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
            <?php endif; ?>

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
                            <a href="<?php echo $CFG->wwwroot; ?>/dashboard.php" class="login-dropdown-item">
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
                        <a href="<?php echo $CFG->wwwroot; ?>/login.php?user=student" class="login-dropdown-item">
                            <i class="fas fa-user-graduate"></i>
                            <span>Student</span>
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/login.php?user=mentor" class="login-dropdown-item">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <span>Mentor</span>
                        </a>
                        <a href="<?php echo $CFG->wwwroot; ?>/login.php?user=parent" class="login-dropdown-item">
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
            <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=8" class="mobile-dropdown-item">Junior AI Basics</a>
            <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=9" class="mobile-dropdown-item">Junior AI Mastery</a>
            <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=10" class="mobile-dropdown-item">Junior Coding Explorer</a>
            <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=11" class="mobile-dropdown-item">Junior Game Builder</a>
            <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=12" class="mobile-dropdown-item">Junior Creative Tech Lab</a>
            <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=13" class="mobile-dropdown-item">Junior Mini Makers</a>
        </div>
    </div>

    <div class="mobile-nav-item">
        <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=39" class="mobile-nav-link">
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
            <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=41" class="mobile-dropdown-item">AI for Teachers</a>
            <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=42" class="mobile-dropdown-item">AI for Lawyers</a>
            <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=17" class="mobile-dropdown-item">AI for Accountant</a>
            <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=20" class="mobile-dropdown-item">AI for Office Admins</a>
            <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=16" class="mobile-dropdown-item">AI for HR</a>
        </div>
    </div>

    <div class="mobile-nav-item">
        <button class="mobile-dropdown-toggle" onclick="toggleMobileDropdown('mobile-ai360')">
            <span><i class="fas fa-globe"></i> AI Social 360</span>
            <i class="fas fa-chevron-down"></i>
        </button>
        <div class="mobile-dropdown" id="mobile-ai360">
            <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=43" class="mobile-dropdown-item">AI Social 360 Pro (6 Months)</a>
            <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=37" class="mobile-dropdown-item">AI Social 360 Fasttrack (3 Months)</a>
        </div>
    </div>

    <div class="mobile-nav-item">
        <button class="mobile-dropdown-toggle" onclick="toggleMobileDropdown('mobile-creators')">
            <span><i class="fas fa-video"></i> Influencers & Creators</span>
            <i class="fas fa-chevron-down"></i>
        </button>
        <div class="mobile-dropdown" id="mobile-creators">
            <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=35" class="mobile-dropdown-item">AI Creator Suite Pro (6 Months)</a>
            <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=36" class="mobile-dropdown-item">AI Creator Fast Track (3 Months)</a>
        </div>
    </div>

    <div class="mobile-nav-item">
        <button class="mobile-dropdown-toggle" onclick="toggleMobileDropdown('mobile-superstars')">
            <span><i class="fas fa-star"></i> Super Stars</span>
            <i class="fas fa-chevron-down"></i>
        </button>
        <div class="mobile-dropdown" id="mobile-superstars">
            <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=38" class="mobile-dropdown-item">Bheem Superstar – AI Engineer Launchpad</a>
            <a href="<?php echo $CFG->wwwroot; ?>/my-course.php?id=40" class="mobile-dropdown-item">Bheem Superstar – AI Engineer Mastery</a>
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
                    <a href="<?php echo $CFG->wwwroot; ?>/dashboard.php" class="mobile-nav-link">
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
                    <a href="<?php echo $CFG->wwwroot; ?>/login.php?user=student" class="mobile-dropdown-item">
                        <i class="fas fa-user-graduate"></i> Student
                    </a>
                    <a href="<?php echo $CFG->wwwroot; ?>/login.php?user=mentor" class="mobile-dropdown-item">
                        <i class="fas fa-chalkboard-teacher"></i> Mentor
                    </a>
                    <a href="<?php echo $CFG->wwwroot; ?>/login.php?user=parent" class="mobile-dropdown-item">
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
