<?php
/**
 * Dynamic Database-Driven Header - Vue.js Styling
 * Fetches courses dynamically from Moodle database categories
 * Version: 5.0 - FULL DATABASE INTEGRATION + DUPLICATE HEADER REMOVAL
 * Features:
 * - Database-driven navigation from mdl_course_categories
 * - Aggressive CSS hiding of Moodle default navigation
 * - JavaScript-based removal of dynamically loaded Moodle headers
 * - MutationObserver to monitor and remove any late-loading navigation
 */

defined('MOODLE_INTERNAL') || die();

// Include dynamic menu generator
require_once($CFG->dirroot . '/theme/bheem/layout/dynamic-menu.php');
?>

<!-- Header Version: 5.0 - Database-Driven + Duplicate Header Removal - Updated: <?php echo date('Y-m-d H:i:s'); ?> - Cache Bust: <?php echo time(); ?> -->
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css?v=<?php echo time(); ?>">

<!-- Hide Moodle navbar and add complete navigation styles -->
<style>
  /* Hide all Moodle default navigation elements - ULTRA COMPREHENSIVE */
  /* Primary navbar and navigation */
  .navbar-area,
  #navbar,
  .mobile-navbar,
  #navbarOffcanvas,
  nav.navbar.fixed-top,
  nav.navbar,
  .navbar,
  .navbar.navbar-expand,
  .navbar.navbar-expand-lg,
  .navbar.fixed-top.navbar-light,
  .navbar.bg-white,
  nav[aria-label="Site navigation"],
  nav[aria-label*="navigation"],

  /* Page header and context */
  #page-header,
  #page-header .navbar,
  #page-header nav,
  #page-wrapper > nav,
  #page > nav,
  .page-context-header,
  .page-header-headings,

  /* Navigation menus */
  .primary-navigation,
  .moremenu,
  .navbar-nav,
  .usermenu,
  #usernavigation,
  .secondary-navigation,
  div[role="navigation"].moremenu,
  #page .navbar.fixed-top,

  /* Drawer and toggle buttons */
  [data-region="drawer"],
  .navbar-toggler,
  .toggle-btn,
  .drawer-toggles,
  button[data-action="toggle-drawer"],
  [data-region="drawer-toggle"],

  /* Additional Moodle headers */
  .boost-header,
  #page-navbar,
  .navbar-wrapper,
  nav#theme-boost-navbar,
  .theme-boost .navbar,

  /* Breadcrumb and page navigation */
  .breadcrumb-wrapper,
  #page-breadcrumb,
  nav[aria-label="Navigation bar"],

  /* User menu and language menu */
  .usermenu .dropdown,
  .langmenu,

  /* Moodle top bar */
  #topofscroll,
  .navbar-brand,

  /* Any fixed top navigation */
  body > nav.fixed-top,
  #page-wrapper > .navbar,

  /* Boost theme specific */
  .drawer-toggles,
  .btn-drawer,
  .drawer-left-toggle,
  .drawer-right-toggle {
    display: none !important;
    visibility: hidden !important;
    height: 0 !important;
    max-height: 0 !important;
    overflow: hidden !important;
    opacity: 0 !important;
    pointer-events: none !important;
    position: absolute !important;
    left: -9999px !important;
  }

  body {
    padding-top: 80px;
  }

  /* Vue.js-Inspired Professional Header Styles */
  .professional-header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(248, 250, 252, 0.98), rgba(255, 255, 255, 0.95));
    backdrop-filter: blur(24px) saturate(180%);
    -webkit-backdrop-filter: blur(24px) saturate(180%);
    border-bottom: 1px solid transparent;
    border-image: linear-gradient(90deg, rgba(139, 92, 246, 0.1), rgba(236, 72, 153, 0.15), rgba(139, 92, 246, 0.1)) 1;
    box-shadow: 0 4px 30px rgba(139, 92, 246, 0.08), 0 2px 10px rgba(236, 72, 153, 0.05), inset 0 -1px rgba(255, 255, 255, 0.8);
    z-index: 10000;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    animation: headerSlideDown 0.6s cubic-bezier(0.4, 0, 0.2, 1);
  }

  @keyframes headerSlideDown {
    from {
      transform: translateY(-100%);
      opacity: 0;
    }
    to {
      transform: translateY(0);
      opacity: 1;
    }
  }

  .professional-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 100%;
    background: linear-gradient(90deg, transparent 0%, rgba(139, 92, 246, 0.02) 25%, rgba(236, 72, 153, 0.02) 50%, rgba(139, 92, 246, 0.02) 75%, transparent 100%);
    pointer-events: none;
    animation: shimmerHeader 8s ease-in-out infinite;
  }

  @keyframes shimmerHeader {
    0%, 100% { opacity: 0.3; }
    50% { opacity: 0.6; }
  }

  .professional-header.scrolled {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.92), rgba(248, 250, 252, 0.95), rgba(255, 255, 255, 0.92));
    box-shadow: 0 8px 40px rgba(139, 92, 246, 0.12), 0 4px 16px rgba(236, 72, 153, 0.08), inset 0 -1px rgba(255, 255, 255, 0.9);
  }

  .header-container {
    max-width: 100%;
    margin: 0;
    padding: 16px 32px;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 48px;
  }

  .logo-section {
    flex-shrink: 0;
  }

  .brand-logo {
    display: flex;
    align-items: center;
    text-decoration: none;
    position: relative;
    padding: 8px 16px;
    border-radius: 12px;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  }

  .brand-logo::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 12px;
    background: linear-gradient(135deg, rgba(139, 92, 246, 0.05), rgba(236, 72, 153, 0.05));
    opacity: 0;
    transition: opacity 0.4s ease;
  }

  .brand-logo:hover::before {
    opacity: 1;
  }

  .brand-logo:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(139, 92, 246, 0.15);
  }

  .logo-img {
    height: 48px;
    width: auto;
    object-fit: contain;
    position: relative;
    z-index: 1;
    filter: drop-shadow(0 2px 8px rgba(139, 92, 246, 0.1));
    transition: filter 0.3s ease;
  }

  .brand-logo:hover .logo-img {
    filter: drop-shadow(0 4px 12px rgba(139, 92, 246, 0.2));
  }

  .navigation-section {
    flex: 0;
    display: flex;
    justify-content: flex-start;
  }

  .main-navigation {
    display: flex;
    align-items: center;
    gap: 8px;
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
    gap: 8px;
    padding: 12px 18px;
    color: #1e293b;
    text-decoration: none;
    font-size: 15px;
    font-weight: 600;
    border-radius: 10px;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    white-space: nowrap;
    position: relative;
    overflow: hidden;
  }

  .nav-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(139, 92, 246, 0.1), rgba(236, 72, 153, 0.1));
    opacity: 0;
    transition: opacity 0.4s ease;
  }

  .nav-link:hover::before {
    opacity: 1;
  }

  .nav-link:hover {
    color: #8B5CF6;
    background: rgba(139, 92, 246, 0.08);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(139, 92, 246, 0.15);
  }

  .nav-link i {
    font-size: 13px;
    transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    z-index: 1;
  }

  .nav-link i:first-child {
    background: linear-gradient(135deg, #8B5CF6, #EC4899);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }

  .nav-item:hover .nav-link i.fa-chevron-down {
    transform: rotate(180deg);
  }

  .dropdown-menu {
    position: absolute;
    top: calc(100% + 12px);
    left: 0;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.98), rgba(248, 250, 252, 0.98));
    backdrop-filter: blur(20px) saturate(180%);
    -webkit-backdrop-filter: blur(20px) saturate(180%);
    border-radius: 16px;
    box-shadow: 0 16px 60px rgba(139, 92, 246, 0.18), 0 8px 24px rgba(236, 72, 153, 0.1), inset 0 1px rgba(255, 255, 255, 0.8), 0 0 0 1px rgba(139, 92, 246, 0.1);
    padding: 12px;
    min-width: 280px;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-15px) scale(0.95);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    z-index: 100;
  }

  .dropdown-menu::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 16px;
    background: linear-gradient(135deg, rgba(139, 92, 246, 0.05), rgba(236, 72, 153, 0.03), rgba(139, 92, 246, 0.05));
    pointer-events: none;
  }

  .nav-item:hover .dropdown-menu {
    opacity: 1;
    visibility: visible;
    transform: translateY(0) scale(1);
  }

  .dropdown-item {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    padding: 14px 18px;
    color: #475569;
    text-decoration: none;
    border-radius: 12px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
  }

  .dropdown-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(139, 92, 246, 0.1), rgba(236, 72, 153, 0.08));
    opacity: 0;
    transition: opacity 0.3s ease;
  }

  .dropdown-item:hover::before {
    opacity: 1;
  }

  .dropdown-item:hover {
    background: rgba(139, 92, 246, 0.06);
    color: #8B5CF6;
    transform: translateX(4px);
    box-shadow: 0 4px 16px rgba(139, 92, 246, 0.12);
  }

  .dropdown-item i {
    flex-shrink: 0;
    width: 24px;
    height: 24px;
    margin-top: 2px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #8B5CF6, #EC4899);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-size: 16px;
    position: relative;
    z-index: 1;
    transition: transform 0.3s ease;
  }

  .dropdown-item:hover i {
    transform: scale(1.15);
  }

  .header-actions {
    display: flex;
    align-items: center;
    gap: 16px;
    flex-shrink: 0;
    margin-left: auto;
  }

  .cta-button {
    padding: 12px 28px;
    background: linear-gradient(135deg, #8B5CF6, #a855f7, #EC4899);
    background-size: 200% 200%;
    color: white;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    border-radius: 12px;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 6px 20px rgba(139, 92, 246, 0.25), 0 2px 8px rgba(236, 72, 153, 0.15), inset 0 1px rgba(255, 255, 255, 0.2);
    display: flex;
    align-items: center;
    gap: 10px;
    position: relative;
    overflow: hidden;
  }

  .cta-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transform: translateX(-100%);
    transition: transform 0.6s ease;
  }

  .cta-button:hover::before {
    transform: translateX(100%);
  }

  .cta-button:hover {
    transform: translateY(-3px);
    background-position: 100% 50%;
    box-shadow: 0 10px 30px rgba(139, 92, 246, 0.35), 0 4px 16px rgba(236, 72, 153, 0.25), inset 0 1px rgba(255, 255, 255, 0.3);
    color: white;
  }

  .cta-button i,
  .cta-button span {
    position: relative;
    z-index: 1;
  }

  .login-dropdown-container {
    position: relative;
  }

  .login-btn {
    padding: 12px 26px;
    border: 2px solid transparent;
    background: linear-gradient(white, white) padding-box, linear-gradient(135deg, #8B5CF6, #EC4899) border-box;
    color: #8B5CF6;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    border-radius: 12px;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    align-items: center;
    gap: 10px;
    position: relative;
    overflow: hidden;
    box-shadow: 0 4px 16px rgba(139, 92, 246, 0.08);
    cursor: pointer;
    border: none;
    outline: none;
  }

  .login-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, #8B5CF6, #EC4899);
    opacity: 0;
    transition: opacity 0.4s ease;
    border-radius: 10px;
  }

  .login-btn:hover::before {
    opacity: 1;
  }

  .login-btn:hover {
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(139, 92, 246, 0.25);
  }

  .login-btn i,
  .login-btn span {
    position: relative;
    z-index: 1;
  }

  .login-btn i.fa-chevron-down {
    font-size: 12px;
    transition: transform 0.3s ease;
  }

  .login-dropdown-container:hover .login-btn i.fa-chevron-down {
    transform: rotate(180deg);
  }

  .login-dropdown {
    position: absolute;
    top: calc(100% + 12px);
    right: 0;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.98), rgba(248, 250, 252, 0.98));
    backdrop-filter: blur(20px) saturate(180%);
    -webkit-backdrop-filter: blur(20px) saturate(180%);
    border-radius: 16px;
    box-shadow: 0 16px 60px rgba(139, 92, 246, 0.18), 0 8px 24px rgba(236, 72, 153, 0.1), inset 0 1px rgba(255, 255, 255, 0.8), 0 0 0 1px rgba(139, 92, 246, 0.1);
    padding: 12px;
    min-width: 240px;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-15px) scale(0.95);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    z-index: 100;
  }

  .login-dropdown::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 16px;
    background: linear-gradient(135deg, rgba(139, 92, 246, 0.05), rgba(236, 72, 153, 0.03), rgba(139, 92, 246, 0.05));
    pointer-events: none;
  }

  .login-dropdown-container:hover .login-dropdown {
    opacity: 1;
    visibility: visible;
    transform: translateY(0) scale(1);
  }

  .login-dropdown-item {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 14px 18px;
    color: #475569;
    text-decoration: none;
    border-radius: 12px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
    font-size: 14px;
    font-weight: 500;
  }

  .login-dropdown-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(139, 92, 246, 0.1), rgba(236, 72, 153, 0.08));
    opacity: 0;
    transition: opacity 0.3s ease;
  }

  .login-dropdown-item:hover::before {
    opacity: 1;
  }

  .login-dropdown-item:hover {
    background: rgba(139, 92, 246, 0.06);
    color: #8B5CF6;
    transform: translateX(4px);
    box-shadow: 0 4px 16px rgba(139, 92, 246, 0.12);
  }

  .login-dropdown-item i {
    flex-shrink: 0;
    width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #8B5CF6, #EC4899);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-size: 16px;
    position: relative;
    z-index: 1;
    transition: transform 0.3s ease;
  }

  .login-dropdown-item:hover i {
    transform: scale(1.15);
  }

  .mobile-toggle {
    display: none;
    background: linear-gradient(135deg, rgba(139, 92, 246, 0.08), rgba(236, 72, 153, 0.06));
    border: 2px solid rgba(139, 92, 246, 0.2);
    border-radius: 10px;
    font-size: 24px;
    color: #8B5CF6;
    cursor: pointer;
    padding: 10px 12px;
    margin-left: auto;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 4px 12px rgba(139, 92, 246, 0.1);
  }

  .mobile-toggle:hover {
    background: linear-gradient(135deg, #8B5CF6, #EC4899);
    color: white;
    transform: scale(1.05);
    box-shadow: 0 6px 16px rgba(139, 92, 246, 0.2);
  }

  .mobile-toggle:active {
    transform: scale(0.95);
  }

  .mobile-menu {
    position: fixed;
    top: 0;
    right: -100%;
    width: 340px;
    height: 100vh;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.98), rgba(248, 250, 252, 0.98));
    backdrop-filter: blur(20px) saturate(180%);
    -webkit-backdrop-filter: blur(20px) saturate(180%);
    box-shadow: -8px 0 40px rgba(139, 92, 246, 0.15), -4px 0 16px rgba(236, 72, 153, 0.1);
    z-index: 10001;
    overflow-y: auto;
    transition: right 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    padding: 80px 24px 24px;
    border-left: 1px solid rgba(139, 92, 246, 0.1);
  }

  .mobile-menu::before {
    content: '';
    position: fixed;
    top: 0;
    right: 0;
    width: 340px;
    height: 100%;
    background: linear-gradient(180deg, rgba(139, 92, 246, 0.05) 0%, transparent 30%, transparent 70%, rgba(236, 72, 153, 0.05) 100%);
    pointer-events: none;
  }

  .mobile-menu.active {
    right: 0;
  }

  .mobile-menu-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(139, 92, 246, 0.4), rgba(0, 0, 0, 0.5), rgba(236, 72, 153, 0.4));
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    z-index: 9998;
    opacity: 0;
    visibility: hidden;
    transition: all 0.4s ease;
  }

  .mobile-menu-overlay.active {
    opacity: 1;
    visibility: visible;
  }

  .mobile-close {
    position: absolute;
    top: 20px;
    right: 20px;
    background: linear-gradient(135deg, rgba(139, 92, 246, 0.1), rgba(236, 72, 153, 0.08));
    border: 2px solid rgba(139, 92, 246, 0.2);
    border-radius: 50%;
    width: 44px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    color: #8B5CF6;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 4px 12px rgba(139, 92, 246, 0.15);
  }

  .mobile-close:hover {
    background: linear-gradient(135deg, #8B5CF6, #EC4899);
    color: white;
    transform: rotate(90deg) scale(1.1);
    box-shadow: 0 6px 20px rgba(139, 92, 246, 0.3);
  }

  .mobile-close:active {
    transform: rotate(90deg) scale(0.95);
  }

  .mobile-nav-item {
    margin-bottom: 8px;
  }

  .mobile-nav-link {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 14px 16px;
    color: #1e293b;
    text-decoration: none;
    font-size: 15px;
    font-weight: 600;
    border-radius: 8px;
    transition: all 0.2s ease;
  }

  .mobile-nav-link:hover {
    background: rgba(139, 92, 246, 0.08);
    color: #8B5CF6;
  }

  .mobile-dropdown-toggle {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    background: none;
    border: none;
    font-size: 15px;
    font-weight: 600;
    color: #1e293b;
    cursor: pointer;
    padding: 14px 16px;
    border-radius: 8px;
    transition: all 0.3s ease;
    text-align: left;
  }

  .mobile-dropdown-toggle:hover {
    background: rgba(139, 92, 246, 0.08);
    color: #8B5CF6;
  }

  .mobile-dropdown-toggle i.fa-chevron-down {
    transition: transform 0.3s ease;
    font-size: 12px;
  }

  .mobile-dropdown-toggle.active i.fa-chevron-down {
    transform: rotate(180deg);
  }

  .mobile-dropdown {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease;
    padding-left: 16px;
  }

  .mobile-dropdown.active {
    max-height: 1000px;
  }

  .mobile-dropdown-item {
    display: block;
    padding: 12px 16px;
    color: #475569;
    text-decoration: none;
    font-size: 14px;
    border-radius: 6px;
    margin-top: 4px;
    transition: all 0.2s ease;
  }

  .mobile-dropdown-item:hover {
    background: rgba(139, 92, 246, 0.06);
    color: #8B5CF6;
  }

  /* Responsive Design */
  @media (max-width: 1400px) {
    .header-container {
      gap: 32px;
      padding: 16px 24px;
    }

    .main-navigation {
      gap: 6px;
    }

    .nav-link {
      padding: 10px 14px;
      font-size: 14px;
    }

    .dropdown-menu {
      min-width: 260px;
    }
  }

  @media (max-width: 1200px) {
    .header-container {
      gap: 20px;
      padding: 14px 20px;
    }

    .main-navigation {
      gap: 4px;
    }

    .nav-link {
      padding: 8px 12px;
      font-size: 13px;
    }

    .logo-img {
      height: 44px;
    }

    .cta-button,
    .login-btn {
      padding: 10px 20px;
      font-size: 13px;
    }

    .header-actions {
      gap: 12px;
    }

    .login-dropdown {
      min-width: 220px;
    }

    .login-dropdown-item {
      padding: 12px 16px;
      font-size: 13px;
    }
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

    .header-container {
      padding: 12px 24px;
      gap: 0;
    }

    .logo-img {
      height: 40px;
    }

    body {
      padding-top: 70px;
    }
  }

  @media (max-width: 768px) {
    .header-container {
      padding: 10px 20px;
    }

    .logo-img {
      height: 38px;
    }

    .mobile-menu {
      width: 85%;
      max-width: 340px;
    }

    .mobile-close {
      top: 16px;
      right: 16px;
      width: 40px;
      height: 40px;
      font-size: 18px;
    }

    body {
      padding-top: 65px;
    }
  }

  @media (max-width: 480px) {
    .header-container {
      padding: 10px 16px;
    }

    .logo-img {
      height: 34px;
    }

    .mobile-menu {
      width: 100%;
      padding: 70px 20px 20px;
    }

    .mobile-menu::before {
      width: 100%;
    }

    .mobile-toggle {
      padding: 8px 10px;
      font-size: 20px;
    }

    body {
      padding-top: 60px;
    }

    .professional-header {
      box-shadow: 0 2px 20px rgba(139, 92, 246, 0.08), 0 1px 5px rgba(236, 72, 153, 0.05);
    }
  }

  @media (max-width: 360px) {
    .header-container {
      padding: 8px 12px;
    }

    .logo-img {
      height: 32px;
    }

    .mobile-toggle {
      padding: 6px 8px;
      font-size: 18px;
    }

    .mobile-nav-link,
    .mobile-dropdown-toggle {
      padding: 12px 14px;
      font-size: 14px;
    }

    .mobile-dropdown-item {
      padding: 10px 14px;
      font-size: 13px;
    }

    body {
      padding-top: 55px;
    }
  }

  /* Landscape mode for mobile devices */
  @media (max-width: 1024px) and (orientation: landscape) {
    .professional-header {
      position: fixed;
    }

    body {
      padding-top: 60px;
    }

    .logo-img {
      height: 36px;
    }

    .header-container {
      padding: 8px 20px;
    }

    .mobile-menu {
      padding: 60px 20px 20px;
    }
  }

  /* High resolution displays */
  @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
    .logo-img {
      image-rendering: -webkit-optimize-contrast;
      image-rendering: crisp-edges;
    }
  }
</style>


<header class="professional-header" id="professionalHeader">
    <div class="header-container">
        <!-- Logo Section -->
        <div class="logo-section">
            <a href="https://dev.bheem.cloud/" class="brand-logo">
                <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/43c2a35a-23ed-46b5-4475-aaa2509dbc00/public" alt="Bheem Academy" class="logo-img">
            </a>
        </div>

        <!-- Navigation Section -->
        <div class="navigation-section">
            <nav class="main-navigation">
                <div class="nav-item">
                    <a href="https://dev.bheem.cloud/" class="nav-link">
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
                        Influencers & Creators
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

            <!-- Login Dropdown -->
            <div class="login-dropdown-container">
                <button class="login-btn">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Login</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="login-dropdown">
                    <a href="https://dev.bheem.cloud/login/index.php?user=student" class="login-dropdown-item">
                        <i class="fas fa-user-graduate"></i>
                        <span>Student</span>
                    </a>
                    <a href="https://dev.bheem.cloud/login/index.php?user=mentor" class="login-dropdown-item">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <span>Mentor</span>
                    </a>
                    <a href="https://dev.bheem.cloud/login/index.php?user=parent" class="login-dropdown-item">
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

<!-- Mobile Menu -->
<div class="mobile-menu" id="mobileMenu">
    <button class="mobile-close" id="mobileClose">
        <i class="fas fa-times"></i>
    </button>
    <div class="mobile-nav-item">
        <a href="https://dev.bheem.cloud/" class="mobile-nav-link">
            <i class="fas fa-home"></i>
            Home
        </a>
    </div>

    <div class="mobile-nav-item">
        <button class="mobile-dropdown-toggle">
            <span><i class="fas fa-child"></i> Kids</span>
            <i class="fas fa-chevron-down"></i>
        </button>
        <div class="mobile-dropdown" id="mobile-kids">
            <a href="https://dev.bheem.cloud/course/view.php?id=8" class="mobile-dropdown-item">Junior AI Basics</a>
            <a href="https://dev.bheem.cloud/course/view.php?id=9" class="mobile-dropdown-item">Junior AI Mastery</a>
            <a href="https://dev.bheem.cloud/course/view.php?id=10" class="mobile-dropdown-item">Junior Coding Explorer</a>
            <a href="https://dev.bheem.cloud/course/view.php?id=11" class="mobile-dropdown-item">Junior Game Builder</a>
            <a href="https://dev.bheem.cloud/course/view.php?id=12" class="mobile-dropdown-item">Junior Creative Tech Lab</a>
            <a href="https://dev.bheem.cloud/course/view.php?id=13" class="mobile-dropdown-item">Junior Mini Makers</a>
        </div>
    </div>

    <div class="mobile-nav-item">
        <a href="https://dev.bheem.cloud/course/view.php?id=39" class="mobile-nav-link">
            <i class="fas fa-users"></i>
            Youth
        </a>
    </div>

    <div class="mobile-nav-item">
        <button class="mobile-dropdown-toggle">
            <span><i class="fas fa-briefcase"></i> Working Professionals</span>
            <i class="fas fa-chevron-down"></i>
        </button>
        <div class="mobile-dropdown" id="mobile-professionals">
            <a href="https://dev.bheem.cloud/course/view.php?id=41" class="mobile-dropdown-item">AI for Teachers</a>
            <a href="https://dev.bheem.cloud/course/view.php?id=42" class="mobile-dropdown-item">AI for Lawyers</a>
            <a href="https://dev.bheem.cloud/course/view.php?id=17" class="mobile-dropdown-item">AI for Accountant</a>
            <a href="https://dev.bheem.cloud/course/view.php?id=20" class="mobile-dropdown-item">AI for Office Admins</a>
            <a href="https://dev.bheem.cloud/course/view.php?id=16" class="mobile-dropdown-item">AI for HR</a>
        </div>
    </div>

    <div class="mobile-nav-item">
        <button class="mobile-dropdown-toggle">
            <span><i class="fas fa-globe"></i> AI Social 360</span>
            <i class="fas fa-chevron-down"></i>
        </button>
        <div class="mobile-dropdown" id="mobile-ai360">
            <a href="https://dev.bheem.cloud/course/view.php?id=43" class="mobile-dropdown-item">AI Social 360 Pro (6 Months)</a>
            <a href="https://dev.bheem.cloud/course/view.php?id=37" class="mobile-dropdown-item">AI Social 360 Fasttrack (3 Months)</a>
        </div>
    </div>

    <div class="mobile-nav-item">
        <button class="mobile-dropdown-toggle">
            <span><i class="fas fa-video"></i> Influencers & Creators</span>
            <i class="fas fa-chevron-down"></i>
        </button>
        <div class="mobile-dropdown" id="mobile-creators">
            <a href="https://dev.bheem.cloud/course/view.php?id=35" class="mobile-dropdown-item">AI Creator Suite Pro (6 Months)</a>
            <a href="https://dev.bheem.cloud/course/view.php?id=36" class="mobile-dropdown-item">AI Creator Fast Track (3 Months)</a>
        </div>
    </div>

    <div class="mobile-nav-item">
        <button class="mobile-dropdown-toggle">
            <span><i class="fas fa-star"></i> Super Stars</span>
            <i class="fas fa-chevron-down"></i>
        </button>
        <div class="mobile-dropdown" id="mobile-superstars">
            <a href="https://dev.bheem.cloud/course/view.php?id=38" class="mobile-dropdown-item">Bheem Superstar – AI Engineer Launchpad</a>
            <a href="https://dev.bheem.cloud/course/view.php?id=40" class="mobile-dropdown-item">Bheem Superstar – AI Engineer Mastery</a>
        </div>
    </div>

    <!-- Mobile Auth Section -->
    <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #e5e7eb;">
        <div class="mobile-nav-item">
            <button class="mobile-dropdown-toggle">
                <span><i class="fas fa-sign-in-alt"></i> Login</span>
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="mobile-dropdown" id="mobile-login">
                <a href="https://dev.bheem.cloud/login/index.php?user=student" class="mobile-dropdown-item">
                    <i class="fas fa-user-graduate"></i> Student
                </a>
                <a href="https://dev.bheem.cloud/login/index.php?user=mentor" class="mobile-dropdown-item">
                    <i class="fas fa-chalkboard-teacher"></i> Mentor
                </a>
                <a href="https://dev.bheem.cloud/login/index.php?user=parent" class="mobile-dropdown-item">
                    <i class="fas fa-user-friends"></i> Parent
                </a>
                <a href="https://dev.bheem.cloud/admin-login.php" class="mobile-dropdown-item">
                    <i class="fas fa-user-shield"></i> Admin
                </a>
            </div>
        </div>
        <div class="mobile-nav-item">
            <a href="https://dev.bheem.cloud/schedule.html" class="mobile-nav-link" style="background: linear-gradient(135deg, #8B5CF6, #EC4899); color: white; border-color: #8B5CF6; margin-top: 8px;">
                <i class="fas fa-phone"></i>
                Get In Touch
            </a>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay" id="mobileMenuOverlay"></div>

<script>
// Professional Header JavaScript
document.addEventListener('DOMContentLoaded', function() {
    console.log('🔹 Header JavaScript: DOMContentLoaded fired');

    // Mobile menu toggle functionality
    const mobileToggle = document.getElementById('mobileToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');

    if (mobileToggle && mobileMenu && mobileMenuOverlay) {
        // Open mobile menu
        mobileToggle.addEventListener('click', function() {
            mobileMenu.classList.add('active');
            mobileMenuOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        });

        // Close mobile menu
        function closeMobileMenu() {
            mobileMenu.classList.remove('active');
            mobileMenuOverlay.classList.remove('active');
            document.body.style.overflow = '';
        }

        // Close button
        const mobileClose = mobileMenu.querySelector('.mobile-close');
        if (mobileClose) {
            mobileClose.addEventListener('click', closeMobileMenu);
        }

        // Overlay click
        mobileMenuOverlay.addEventListener('click', closeMobileMenu);

        // Mobile dropdown toggles
        const dropdownToggles = mobileMenu.querySelectorAll('.mobile-dropdown-toggle');
        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                const dropdown = this.nextElementSibling;
                if (dropdown && dropdown.classList.contains('mobile-dropdown')) {
                    this.classList.toggle('active');
                    dropdown.classList.toggle('active');
                }
            });
        });
    }

    // Header scroll effect
    const header = document.getElementById('professionalHeader');
    if (header) {
        let lastScroll = 0;

        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;

            // Add scrolled class for shadow effect
            if (currentScroll > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }

            lastScroll = currentScroll;
        });
    }

    // Desktop dropdown click support (for better touch device support)
    console.log('🔹 Searching for .nav-item elements...');
    const navItems = document.querySelectorAll('.nav-item');
    console.log('✅ Found', navItems.length, 'nav items');

    navItems.forEach((item, index) => {
        const link = item.querySelector('.nav-link');
        const dropdown = item.querySelector('.dropdown-menu');

        console.log(`🔹 Nav item ${index + 1}:`, {
            hasLink: !!link,
            hasDropdown: !!dropdown,
            linkHref: link ? link.getAttribute('href') : 'N/A',
            linkText: link ? link.textContent.trim() : 'N/A'
        });

        if (link && dropdown) {
            console.log(`✅ Attaching click handler to nav item ${index + 1}`);

            // Click on nav link toggles dropdown
            link.addEventListener('click', function(e) {
                console.log(`🔹 Click detected on nav item ${index + 1}`, {
                    href: this.getAttribute('href'),
                    willPreventDefault: this.getAttribute('href') === '#'
                });

                // Only prevent default if it's a dropdown item (has # href)
                if (this.getAttribute('href') === '#') {
                    e.preventDefault();
                    e.stopPropagation();
                    console.log('🔸 Prevented default and stopped propagation');

                    // Close all other dropdowns
                    navItems.forEach(otherItem => {
                        if (otherItem !== item) {
                            otherItem.classList.remove('dropdown-open');
                        }
                    });
                    console.log('🔸 Closed other dropdowns');

                    // Toggle this dropdown
                    const wasOpen = item.classList.contains('dropdown-open');
                    item.classList.toggle('dropdown-open');
                    console.log(`🔸 Toggled dropdown ${index + 1}:`, wasOpen ? 'CLOSED' : 'OPENED');

                    // Log computed styles
                    const dropdownStyles = window.getComputedStyle(dropdown);
                    console.log(`🔸 Dropdown ${index + 1} computed styles:`, {
                        opacity: dropdownStyles.opacity,
                        visibility: dropdownStyles.visibility,
                        transform: dropdownStyles.transform,
                        zIndex: dropdownStyles.zIndex,
                        display: dropdownStyles.display
                    });
                }
            });
        }
    });
    console.log('✅ All dropdown click handlers attached');

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.nav-item')) {
            console.log('🔸 Click outside nav-item, closing all dropdowns');
            navItems.forEach(item => {
                item.classList.remove('dropdown-open');
            });
        }
    });

    // Login dropdown click support
    const loginContainer = document.querySelector('.login-dropdown-container');
    if (loginContainer) {
        console.log('✅ Found login dropdown container');
        const loginBtn = loginContainer.querySelector('.login-btn');

        loginBtn.addEventListener('click', function(e) {
            console.log('🔹 Login button clicked');
            e.stopPropagation();
            loginContainer.classList.toggle('dropdown-open');
            console.log('🔸 Toggled login dropdown');

            // Close nav dropdowns
            navItems.forEach(item => {
                item.classList.remove('dropdown-open');
            });
        });
    } else {
        console.log('⚠️ Login dropdown container not found');
    }

    console.log('🎉 Header JavaScript initialization complete!');

    // AGGRESSIVE: Remove all Moodle default navigation elements
    // This runs after DOMContentLoaded to catch dynamically loaded elements
    console.log('🔹 Running aggressive Moodle navigation removal...');

    const moodleNavSelectors = [
        '.navbar-area', '#navbar', '.mobile-navbar', '#navbarOffcanvas',
        'nav.navbar.fixed-top', 'nav.navbar', '.navbar.navbar-expand',
        '.navbar.fixed-top.navbar-light', '.navbar.bg-white',
        'nav[aria-label="Site navigation"]', 'nav[aria-label*="navigation"]',
        '#page-header .navbar', '#page-header nav', '#page-wrapper > nav',
        '.primary-navigation', '.moremenu', '.navbar-nav', '.usermenu',
        '#usernavigation', '.secondary-navigation', 'div[role="navigation"].moremenu',
        '[data-region="drawer"]', '.navbar-toggler', '.toggle-btn', '.drawer-toggles',
        'button[data-action="toggle-drawer"]', '[data-region="drawer-toggle"]',
        '.boost-header', '#page-navbar', '.navbar-wrapper',
        'nav#theme-boost-navbar', '.breadcrumb-wrapper', '#page-breadcrumb',
        'nav[aria-label="Navigation bar"]', '.langmenu', '#topofscroll',
        '.navbar-brand', 'body > nav.fixed-top', '#page-wrapper > .navbar',
        '.btn-drawer', '.drawer-left-toggle', '.drawer-right-toggle'
    ];

    // Remove elements immediately
    function removeMoodleNav() {
        let removedCount = 0;
        moodleNavSelectors.forEach(selector => {
            try {
                const elements = document.querySelectorAll(selector);
                elements.forEach(el => {
                    // Don't remove our professional header!
                    if (!el.classList.contains('professional-header') &&
                        !el.closest('.professional-header')) {
                        el.remove();
                        removedCount++;
                    }
                });
            } catch (e) {
                // Ignore selector errors
            }
        });
        if (removedCount > 0) {
            console.log(`✅ Removed ${removedCount} Moodle navigation elements`);
        }
    }

    // Run immediately
    removeMoodleNav();

    // Run again after a short delay to catch late-loading elements
    setTimeout(removeMoodleNav, 100);
    setTimeout(removeMoodleNav, 500);
    setTimeout(removeMoodleNav, 1000);

    // Monitor for dynamically added elements
    const observer = new MutationObserver((mutations) => {
        let shouldCheck = false;
        mutations.forEach((mutation) => {
            if (mutation.addedNodes.length > 0) {
                shouldCheck = true;
            }
        });
        if (shouldCheck) {
            removeMoodleNav();
        }
    });

    observer.observe(document.body, {
        childList: true,
        subtree: true
    });

    console.log('✅ Moodle navigation removal setup complete');
});
</script>

<!-- Additional CSS for click-to-toggle dropdown support -->
<style>
  /* CRITICAL: Force dropdown visibility on hover and click - High specificity to override any conflicts */
  .professional-header .nav-item:hover .dropdown-menu,
  .professional-header .nav-item.dropdown-open .dropdown-menu,
  .professional-header .login-dropdown-container:hover .login-dropdown,
  .professional-header .login-dropdown-container.dropdown-open .login-dropdown {
    opacity: 1 !important;
    visibility: visible !important;
    transform: translateY(0) scale(1) !important;
    pointer-events: auto !important;
    display: block !important;
  }

  /* Force dropdown to be hidden by default */
  .professional-header .dropdown-menu,
  .professional-header .login-dropdown {
    opacity: 0;
    visibility: hidden;
    transform: translateY(-15px) scale(0.95);
    pointer-events: none;
    display: block;
  }

  /* Ensure nav items are positioned correctly for dropdown positioning */
  .professional-header .nav-item,
  .professional-header .login-dropdown-container {
    position: relative !important;
  }
</style>
