<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800;900&family=Outfit:wght@300;400;500;600;700;800;900&family=Orbitron:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
/* Font Smoothing */
* {
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

/* Ensure body has proper font and padding */
body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif !important;
    padding-top: 84px !important;
}

/* Hide all Moodle default navigation */
.navbar, nav.navbar, #page-header .navbar, .primary-navigation,
.drawer-toggles, [data-region="drawer"], .breadcrumb-wrapper {
    display: none !important;
}

.professional-header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    background: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(20px) saturate(180%);
    -webkit-backdrop-filter: blur(20px) saturate(180%);
    box-shadow: 0 2px 20px rgba(90, 79, 207, 0.08), inset 0 -1px 0 rgba(90, 79, 207, 0.2);
    z-index: 10000;
    border-bottom: 1px solid rgba(90, 79, 207, 0.15);
}

.header-container {
    max-width: 100%;
    margin: 0 auto;
    padding: 12px 30px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 30px;
}

.logo-section {
    flex-shrink: 0;
}

.brand-logo {
    display: flex;
    align-items: center;
    text-decoration: none;
}

.logo-img {
    height: 60px;
    width: auto;
    object-fit: contain;
}

.navigation-section {
    flex: 1;
    display: flex;
    justify-content: center;
}

.main-navigation {
    display: flex;
    align-items: center;
    gap: 5px;
    list-style: none;
    margin: 0;
    padding: 0;
}

.nav-item {
    position: relative;
}

.nav-link {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 10px 14px;
    color: #475569;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    border-radius: 8px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    white-space: nowrap;
    position: relative;
}

.nav-link::before {
    content: '';
    position: absolute;
    inset: 0;
    border-radius: 8px;
    background: linear-gradient(135deg, #5A4FCF 0%, #4E9FFF 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.nav-link:hover {
    color: #5A4FCF;
    background: rgba(90, 79, 207, 0.08);
}

.nav-link:hover::before {
    opacity: 0.08;
}

.nav-link.active {
    color: #5A4FCF;
    background: rgba(90, 79, 207, 0.1);
}

.nav-icon {
    font-size: 13px;
}

.dropdown-arrow {
    font-size: 10px;
    margin-left: 2px;
}

.dropdown-menu {
    position: absolute;
    top: calc(100% + 8px);
    left: 0;
    background: #FFFFFF;
    border: 1px solid rgba(90, 79, 207, 0.15);
    border-radius: 16px;
    box-shadow: 0 4px 24px rgba(90, 79, 207, 0.08), 0 0 20px rgba(90, 79, 207, 0.25);
    padding: 12px;
    min-width: 240px;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    z-index: 100;
}

.nav-item:hover .dropdown-menu {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.dropdown-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 16px;
    color: #475569;
    text-decoration: none;
    border-radius: 10px;
    transition: all 0.3s ease;
    font-size: 14px;
    position: relative;
    overflow: hidden;
}

.dropdown-item::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, #5A4FCF 0%, #4E9FFF 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.dropdown-item:hover {
    color: #5A4FCF;
    background: rgba(90, 79, 207, 0.08);
    transform: translateX(4px);
}

.dropdown-item:hover::before {
    opacity: 0.08;
}

.dropdown-item i {
    position: relative;
    z-index: 1;
}

.dropdown-item span {
    position: relative;
    z-index: 1;
}

.dropdown-item-icon {
    font-size: 14px;
}

.header-actions {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-shrink: 0;
}

.cta-button {
    padding: 10px 24px;
    background: linear-gradient(135deg, #5A4FCF 0%, #4E9FFF 100%);
    color: white;
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
    border-radius: 10px;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 0 20px rgba(90, 79, 207, 0.25);
    border: 1px solid rgba(78, 159, 255, 0.3);
    position: relative;
    overflow: hidden;
    transform-style: preserve-3d;
}

.cta-button::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
    opacity: 0;
    transition: opacity 0.3s ease;
}

.cta-button:hover {
    transform: perspective(800px) translateY(-4px) translateZ(10px) scale(1.05);
    box-shadow: 0 10px 40px rgba(78, 159, 255, 0.4), 0 0 40px rgba(90, 79, 207, 0.3);
}

.cta-button:hover::before {
    opacity: 1;
}

.login-dropdown-container {
    position: relative;
}

.login-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    background: transparent;
    border: 2px solid rgba(90, 79, 207, 0.15);
    color: #475569;
    font-size: 13px;
    font-weight: 600;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-family: 'Inter', sans-serif;
}

.login-btn:hover {
    background: rgba(90, 79, 207, 0.08);
    border-color: #5A4FCF;
    color: #5A4FCF;
}

.login-dropdown {
    position: absolute;
    top: calc(100% + 8px);
    right: 0;
    background: #FFFFFF;
    border: 1px solid rgba(90, 79, 207, 0.15);
    border-radius: 16px;
    box-shadow: 0 4px 24px rgba(90, 79, 207, 0.08), 0 0 20px rgba(90, 79, 207, 0.25);
    padding: 12px;
    min-width: 200px;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.3s ease;
    z-index: 100;
}

.login-dropdown-container:hover .login-dropdown {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.login-dropdown-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 16px;
    color: #475569;
    text-decoration: none;
    border-radius: 10px;
    transition: all 0.3s ease;
    font-size: 14px;
    position: relative;
    overflow: hidden;
}

.login-dropdown-item::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, #5A4FCF 0%, #4E9FFF 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.login-dropdown-item:hover {
    color: #5A4FCF;
    background: rgba(90, 79, 207, 0.08);
}

.login-dropdown-item:hover::before {
    opacity: 0.08;
}

.login-dropdown-item i,
.login-dropdown-item span {
    position: relative;
    z-index: 1;
}

.mobile-toggle {
    display: none;
    background: rgba(139, 92, 246, 0.08);
    border: 2px solid rgba(139, 92, 246, 0.2);
    border-radius: 8px;
    font-size: 20px;
    color: #8B5CF6;
    cursor: pointer;
    padding: 8px 12px;
    transition: all 0.3s ease;
}

.mobile-toggle:hover {
    background: rgba(139, 92, 246, 0.15);
}

@media (max-width: 1024px) {
    .navigation-section {
        display: none;
    }

    .header-actions {
        display: none;
    }

    .mobile-toggle {
        display: block;
    }
}
</style>

<header class="professional-header" id="professionalHeader">
    <div class="header-container">
        <!-- Logo Section -->
        <div class="logo-section">
            <a href="https://dev.bheem.cloud/" class="brand-logo">
                <img src="https://dev.bheem.cloud/pluginfile.php?file=%2F1%2Ftheme_edoo%2Fmain_footer_logo%2F-1%2Fflogo.png" alt="Bheem Academy" class="logo-img">
            </a>
        </div>

        <!-- Navigation Section -->
        <div class="navigation-section">
            <nav class="main-navigation">
                <div class="nav-item">
                    <a href="https://dev.bheem.cloud/" class="nav-link active">
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
                        <a href="https://dev.bheem.cloud/course/view.php?id=8" class="dropdown-item">
                            <i class="fas fa-star dropdown-item-icon" style="color: #ffd700;"></i>
                            Junior AI Basics
                        </a>
                        <a href="https://dev.bheem.cloud/course/view.php?id=9" class="dropdown-item">
                            <i class="fas fa-trophy dropdown-item-icon" style="color: #ff6b35;"></i>
                            Junior AI Mastery
                        </a>
                        <a href="https://dev.bheem.cloud/course/view.php?id=10" class="dropdown-item">
                            <i class="fas fa-code dropdown-item-icon" style="color: #4ecdc4;"></i>
                            Junior Coding Explorer
                        </a>
                        <a href="https://dev.bheem.cloud/course/view.php?id=11" class="dropdown-item">
                            <i class="fas fa-gamepad dropdown-item-icon" style="color: #95e1d3;"></i>
                            Junior Game Builder
                        </a>
                        <a href="https://dev.bheem.cloud/course/view.php?id=12" class="dropdown-item">
                            <i class="fas fa-palette dropdown-item-icon" style="color: #f38ba8;"></i>
                            Junior Creative Tech Lab
                        </a>
                        <a href="https://dev.bheem.cloud/course/view.php?id=13" class="dropdown-item">
                            <i class="fas fa-tools dropdown-item-icon" style="color: #a6e3a1;"></i>
                            Junior Mini Makers
                        </a>
                    </div>
                </div>

                <div class="nav-item">
                    <a href="https://dev.bheem.cloud/course/view.php?id=39" class="nav-link">
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
                        <a href="https://dev.bheem.cloud/course/view.php?id=41" class="dropdown-item">
                            <i class="fas fa-chalkboard-teacher dropdown-item-icon" style="color: #4ecdc4;"></i>
                            AI for Teachers
                        </a>
                        <a href="https://dev.bheem.cloud/course/view.php?id=42" class="dropdown-item">
                            <i class="fas fa-gavel dropdown-item-icon" style="color: #8b5cf6;"></i>
                            AI for Lawyers
                        </a>
                        <a href="https://dev.bheem.cloud/course/view.php?id=17" class="dropdown-item">
                            <i class="fas fa-calculator dropdown-item-icon" style="color: #f59e0b;"></i>
                            AI for Accountant
                        </a>
                        <a href="https://dev.bheem.cloud/course/view.php?id=20" class="dropdown-item">
                            <i class="fas fa-user-tie dropdown-item-icon" style="color: #10b981;"></i>
                            AI for Office Admins
                        </a>
                        <a href="https://dev.bheem.cloud/course/view.php?id=16" class="dropdown-item">
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
                        <a href="https://dev.bheem.cloud/course/view.php?id=43" class="dropdown-item">
                            <i class="fas fa-crown dropdown-item-icon" style="color: #ffd700;"></i>
                            AI Social 360 Pro (6 Months)
                        </a>
                        <a href="https://dev.bheem.cloud/course/view.php?id=37" class="dropdown-item">
                            <i class="fas fa-bolt dropdown-item-icon" style="color: #ff6b35;"></i>
                            AI Social 360 Fasttrack (3 Months)
                        </a>
                    </div>
                </div>

                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-video nav-icon"></i>
                        Influencers &amp; Creators
                        <i class="fas fa-chevron-down dropdown-arrow"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="https://dev.bheem.cloud/course/view.php?id=35" class="dropdown-item">
                            <i class="fas fa-crown dropdown-item-icon" style="color: #ffd700;"></i>
                            AI Creator Suite Pro (6 Months)
                        </a>
                        <a href="https://dev.bheem.cloud/course/view.php?id=36" class="dropdown-item">
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
                        <a href="https://dev.bheem.cloud/course/view.php?id=38" class="dropdown-item">
                            <i class="fas fa-rocket dropdown-item-icon" style="color: #4ecdc4;"></i>
                            Bheem Superstar – AI Engineer Launchpad
                        </a>
                        <a href="https://dev.bheem.cloud/course/view.php?id=40" class="dropdown-item">
                            <i class="fas fa-trophy dropdown-item-icon" style="color: #ffd700;"></i>
                            Bheem Superstar – AI Engineer Mastery
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Header Actions -->
        <div class="header-actions">
            <!-- Get In Touch Button -->
            <a href="https://dev.bheem.cloud/schedule.html" class="cta-button">
                <i class="fas fa-phone"></i>
                Get In Touch
            </a>

            <!-- Login/User Dropdown -->
            <div class="login-dropdown-container">
                <button class="login-btn">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Login</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="login-dropdown">
                    <a href="https://dev.bheem.cloud/login.php?user=student" class="login-dropdown-item">
                        <i class="fas fa-user-graduate"></i>
                        <span>Student</span>
                    </a>
                    <a href="https://dev.bheem.cloud/mentor-dashboard.php" class="login-dropdown-item">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <span>Mentor</span>
                    </a>
                    <a href="https://dev.bheem.cloud/login.php?user=parent" class="login-dropdown-item">
                        <i class="fas fa-user-friends"></i>
                        <span>Parent</span>
                    </a>
                    <a href="https://dev.bheem.cloud/admin-login.php" class="login-dropdown-item">
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
