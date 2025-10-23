<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="description" content="">
    <title>BHEEM AI SOCIAL 360 FASTTRACK - Bheem Academy</title>

    <!-- Preconnect for performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>

    <!-- Preload critical fonts -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" as="style">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Global Header Styles -->
    <link rel="stylesheet" href="/includes/bheem_header_styles.css">

    <!-- Bheem Academy 2025 Design System -->
    <link rel="stylesheet" href="/course/styles/design-system-2025.css?v=1760936007">
    <link rel="stylesheet" href="/course/styles/components-2025.css?v=1760936079">
    <link rel="stylesheet" href="/course/styles/elegant-enhancements.css?v=1761042733">
    <link rel="stylesheet" href="/course/styles/hero-compact.css?v=1760940333">
    <link rel="stylesheet" href="/course/styles/cta-card-professional.css?v=1761043684">

    <!-- Cache busting v3.0 -->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">

    <style>
        /* SF Pro Display font fallback */
        @supports (font-variation-settings: normal) {
            body {
                font-family: -apple-system, BlinkMacSystemFont, "SF Pro Display", "Inter", system-ui, sans-serif;
            }
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            /* ================================================
               DESIGN SYSTEM TOKENS
               ================================================ */

            /* Typography Scale */
            --font-sans: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            --font-display: 'Orbitron', 'Inter', sans-serif;
            --font-futuristic: 'Orbitron', 'Inter', sans-serif;
            --text-xs: 0.75rem;      /* 12px */
            --text-sm: 0.875rem;     /* 14px */
            --text-base: 1rem;       /* 16px */
            --text-lg: 1.125rem;     /* 18px */
            --text-xl: 1.25rem;      /* 20px */
            --text-2xl: 1.5rem;      /* 24px */
            --text-3xl: 1.875rem;    /* 30px */
            --text-4xl: 2.25rem;     /* 36px */

            /* Font Weights */
            --font-light: 300;
            --font-normal: 400;
            --font-medium: 500;
            --font-semibold: 600;
            --font-bold: 700;
            --font-extrabold: 800;

            /* Spacing Scale (8px base) */
            --space-0: 0;
            --space-1: 0.5rem;       /* 8px */
            --space-2: 1rem;         /* 16px */
            --space-3: 1.5rem;       /* 24px */
            --space-4: 2rem;         /* 32px */
            --space-5: 2.5rem;       /* 40px */
            --space-6: 3rem;         /* 48px */
            --space-8: 4rem;         /* 64px */
            --space-10: 5rem;        /* 80px */

            /* Primary Colors - Royal Purple */
            --primary-50: #f5f3ff;
            --primary-100: #ede9fe;
            --primary-200: #ddd6fe;
            --primary-300: #c4b5fd;
            --primary-400: #a78bfa;
            --primary-500: #667eea;
            --primary-600: #5A4FCF;
            --primary-700: #6d28d9;
            --primary-800: #5b21b6;
            --primary-900: #4c1d95;

            /* Neutral Colors - Slate */
            --neutral-50: #f8fafc;
            --neutral-100: #f1f5f9;
            --neutral-200: #e2e8f0;
            --neutral-300: #cbd5e1;
            --neutral-400: #94a3b8;
            --neutral-500: #64748b;
            --neutral-600: #475569;
            --neutral-700: #334155;
            --neutral-800: #1e293b;
            --neutral-900: #0f172a;

            /* Accent Colors */
            --indigo: #5A4FCF;
            --indigo-light: #6366F1;
            --blue: #4E9FFF;
            --purple: #7C3AED;
            --cyan: #06B6D4;
            --green: #10b981;
            --yellow: #fbbf24;
            --red: #ef4444;

            /* Semantic Colors */
            --bg-primary: #FFFFFF;
            --bg-secondary: #F8F9FC;
            --bg-tertiary: #f1f5f9;
            --text-primary: #0B0F19;
            --text-secondary: #475569;
            --text-tertiary: #64748B;
            --text-light: #94A3B8;

            /* Card & Surface */
            --card-bg: #FFFFFF;
            --card-border: rgba(139, 92, 246, 0.15);
            --card-shadow: 0 4px 24px rgba(139, 92, 246, 0.08);

            /* Elegant Gradients - Indigo-Violet-Cyan Palette */
            --gradient-main: linear-gradient(135deg, #5A4FCF 0%, #4E9FFF 100%);
            --gradient-glow: linear-gradient(135deg, #5A4FCF 0%, #7C3AED 50%, #4E9FFF 100%);
            --gradient-accent: linear-gradient(135deg, #6366F1 0%, #8B5CF6 50%, #4E9FFF 100%);
            --gradient-cyber: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #06b6d4 100%);
            --gradient-elegant: linear-gradient(135deg, #667eea 0%, #764ba2 40%, #f093fb 70%, #06b6d4 100%);

            /* Elegant Glassmorphism */
            --glass-bg: rgba(255, 255, 255, 0.08);
            --glass-bg-medium: rgba(255, 255, 255, 0.12);
            --glass-bg-strong: rgba(255, 255, 255, 0.18);
            --glass-border: rgba(255, 255, 255, 0.15);
            --glass-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);

            /* Border Radius */
            --radius-sm: 0.375rem;   /* 6px */
            --radius-md: 0.5rem;     /* 8px */
            --radius-lg: 0.75rem;    /* 12px */
            --radius-xl: 1rem;       /* 16px */
            --radius-2xl: 1.5rem;    /* 24px */
            --radius-3xl: 2rem;      /* 32px */
            --radius-full: 9999px;

            /* Shadows */
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-base: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
            --shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            --shadow-soft: 0 8px 32px rgba(139, 92, 246, 0.12);

            /* Glows (Reduced for performance) */
            --glow-sm: 0 0 20px rgba(139, 92, 246, 0.15);
            --glow-md: 0 0 30px rgba(139, 92, 246, 0.20);
            --glow-lg: 0 0 40px rgba(139, 92, 246, 0.25);

            /* Transitions */
            --transition-fast: 150ms cubic-bezier(0.4, 0, 0.2, 1);
            --transition-base: 200ms cubic-bezier(0.4, 0, 0.2, 1);
            --transition-slow: 300ms cubic-bezier(0.4, 0, 0.2, 1);

            /* Z-Index Scale */
            --z-base: 1;
            --z-dropdown: 1000;
            --z-sticky: 1020;
            --z-fixed: 1030;
            --z-modal-backdrop: 1040;
            --z-modal: 1050;
            --z-popover: 1060;
            --z-tooltip: 1070;
        }

        /* ================================================
           DARK MODE THEME
           ================================================ */
        [data-theme="dark"] {
            /* Semantic Colors - Dark Mode */
            --bg-primary: #0f172a;
            --bg-secondary: #1e293b;
            --bg-tertiary: #334155;
            --text-primary: #f1f5f9;
            --text-secondary: #cbd5e1;
            --text-tertiary: #94a3b8;
            --text-light: #64748b;

            /* Card & Surface - Dark Mode */
            --card-bg: #1e293b;
            --card-border: rgba(139, 92, 246, 0.3);
            --card-shadow: 0 4px 24px rgba(0, 0, 0, 0.3);

            /* Glassmorphism - Dark Mode */
            --glass-bg: rgba(30, 41, 59, 0.6);
            --glass-bg-medium: rgba(30, 41, 59, 0.75);
            --glass-bg-strong: rgba(30, 41, 59, 0.9);
            --glass-border: rgba(139, 92, 246, 0.2);
            --glass-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.4);

            /* Shadows - Dark Mode */
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.3);
            --shadow-base: 0 1px 3px 0 rgba(0, 0, 0, 0.4), 0 1px 2px -1px rgba(0, 0, 0, 0.4);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.4), 0 2px 4px -2px rgba(0, 0, 0, 0.4);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.4), 0 4px 6px -4px rgba(0, 0, 0, 0.4);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.4), 0 8px 10px -6px rgba(0, 0, 0, 0.4);
            --shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            --shadow-soft: 0 8px 32px rgba(139, 92, 246, 0.25);

            /* Glows - Dark Mode (Enhanced) */
            --glow-sm: 0 0 20px rgba(139, 92, 246, 0.3);
            --glow-md: 0 0 30px rgba(139, 92, 246, 0.4);
            --glow-lg: 0 0 40px rgba(139, 92, 246, 0.5);
        }

        /* Apply dark mode to body */
        [data-theme="dark"] body {
            background: var(--bg-primary) !important;
            color: var(--text-primary) !important;
        }

        body {
            font-family: var(--font-sans) !important;
            background: var(--bg-primary) !important;
            color: var(--text-primary) !important;
            line-height: 1.6 !important;
            overflow-x: hidden !important;
            margin: 0 !important;
            padding: 0 !important;
            position: relative;
            
        }

        /* Override Moodle's default page wrapper */
        #page, #page-wrapper, .pagelayout-embedded {
            background: transparent !important;

        /* Old AI News Ticker CSS removed - now using dynamic component */

        /* Enhanced Gradient Overlay with Animated Orbs and Particles */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            background:
                radial-gradient(circle at 15% 15%, rgba(139, 92, 246, 0.20) 0%, transparent 40%),
                radial-gradient(circle at 85% 85%, rgba(236, 72, 153, 0.18) 0%, transparent 45%),
                radial-gradient(circle at 50% 50%, rgba(139, 92, 246, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 70% 30%, rgba(0, 212, 255, 0.12) 0%, transparent 40%),
                radial-gradient(circle at 30% 70%, rgba(124, 58, 237, 0.10) 0%, transparent 35%);
            animation: subtleGlow 20s ease-in-out infinite;
        }

        @keyframes subtleGlow {
            0%, 100% {
                opacity: 0.7;
                transform: scale(1);
            }
            50% {
                opacity: 1;
                transform: scale(1.05);
            }
        }

        /* ========== POWERFUL & ATTRACTIVE ANIMATIONS ========== */

            0% {
                opacity: 0;
                transform: translateY(60px) scale(0.8);
            }
            50% {
                opacity: 0.8;
                transform: translateY(-10px) scale(1.05);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }


        /* Dynamic Slide In From Right with Rotation */

        /* Powerful Slide In From Bottom with Scale */


        /* Dramatic Floating Animation */
        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-15px);
            }
        }

        /* Intense Shimmer Effect */
        @keyframes shimmer {
            0% {
                background-position: -1000px 0;
                opacity: 0.5;
            }
            50% {
                opacity: 1;
            }
            100% {
                background-position: 1000px 0;
                opacity: 0.5;
            }
        }

        /* Excessive animations removed for better performance and professional appearance */

        /* ================================================
           ACCESSIBILITY FEATURES
           ================================================ */

        /* Focus visible styles for keyboard navigation */
        *:focus-visible {
            outline: 3px solid var(--primary-500);
            outline-offset: 2px;
            border-radius: var(--radius-md);
        }

        /* Skip to main content link */
        .skip-to-main {
            position: absolute;
            top: -100px;
            left: 20px;
            background: var(--primary-600);
            color: white;
            padding: 12px 24px;
            border-radius: var(--radius-md);
            text-decoration: none;
            font-weight: var(--font-semibold);
            z-index: var(--z-tooltip);
            transition: top var(--transition-base);
        }

        .skip-to-main:focus {
            top: 20px;
        }

        /* Improved button focus states */
        button:focus-visible,
        a.btn:focus-visible,
        .cta-button:focus-visible,
        .tab-nav-item:focus-visible {
            outline: 3px solid var(--primary-500);
            outline-offset: 3px;
        }

        /* Ensure sufficient focus indication for inputs */
        input:focus-visible,
        textarea:focus-visible,
        select:focus-visible {
            outline: 2px solid var(--primary-500);
            outline-offset: 2px;
            border-color: var(--primary-500);
        }

        /* High contrast mode support */
        @media (prefers-contrast: high) {
            * {
                border-width: 2px;
            }

            button, .btn, a {
                border: 2px solid currentColor;
            }
        }

        /* Reduced motion support */
        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }

        /* Screen reader only class */
        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border-width: 0;
        }

        .sr-only-focusable:focus {
            position: static;
            width: auto;
            height: auto;
            overflow: visible;
            clip: auto;
            white-space: normal;
        }

        /* Smooth scroll behavior */
        html {
            scroll-behavior: smooth;
        }

        /* Animation utility classes */
        .animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }

        .animate-slide-left {
            animation: slideInLeft 0.8s ease-out forwards;
        }

        .animate-slide-right {
            animation: slideInRight 0.8s ease-out forwards;
        }

        .animate-slide-bottom {
            animation: slideInBottom 0.8s ease-out forwards;
        }

        .animate-scale {
            animation: scaleIn 0.6s ease-out forwards;
        }

        /* Staggered animation delays */
        .delay-100 { animation-delay: 0.1s; opacity: 0; }
        .delay-200 { animation-delay: 0.2s; opacity: 0; }
        .delay-300 { animation-delay: 0.3s; opacity: 0; }
        .delay-400 { animation-delay: 0.4s; opacity: 0; }
        .delay-500 { animation-delay: 0.5s; opacity: 0; }
        .delay-600 { animation-delay: 0.6s; opacity: 0; }

        /* Enhanced Grid Pattern with Depth */
        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background-image:
                linear-gradient(rgba(139, 92, 246, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(139, 92, 246, 0.04) 1px, transparent 1px),
                linear-gradient(rgba(139, 92, 246, 0.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(139, 92, 246, 0.02) 1px, transparent 1px);
            background-size: 60px 60px, 60px 60px, 20px 20px, 20px 20px;
            opacity: 0.5;
        }
        
        /* Course Hero - Futuristic with Animations */
        .course-hero {
            width: 100% !important;
            max-width: 1850px !important; /* Fixed: 1800px→1850px to prevent content squeeze */
            margin: 0 auto 20px !important;
            padding: 0 40px !important; /* Fixed: 30px→40px to match grid padding */
            position: relative;
            animation: fadeIn 1s ease-out;
            box-sizing: border-box !important;
        }

        .hero-banner {
            position: relative;
            width: 100% !important;
            height: 150px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(102, 126, 234, 0.25);
            padding: 0;
        }

        .hero-banner::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.4) 100%);
            z-index: 1;
            pointer-events: none;
        }

        .hero-banner-image {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            z-index: 0;
            transition: transform 0.4s ease;
        }

        .hero-banner:hover .hero-banner-image {
            transform: scale(1.05);
        }

        .hero-title {
            text-align: center;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 2;
            color: white;
            padding: 15px 25px;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.6) 20%, rgba(0, 0, 0, 0.8) 100%);
            animation: slideInBottom 1s ease-out;
        }

        .hero-title h1 {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.5rem;
            font-weight: 800;
            color: white;
            letter-spacing: -1px;
            margin-bottom: 8px;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.8), 0 2px 8px rgba(0, 0, 0, 0.6);
            animation: float 6s ease-in-out infinite;
            position: relative;
        }

        @media (max-width: 1400px) {
            .course-hero {
                padding: 0 20px;
            }

            .hero-banner {
                height: 130px;
            }
        }

        @media (max-width: 768px) {
            .course-hero {
                padding: 0 15px;
            }

            .hero-banner {
                height: 110px;
                border-radius: 16px;
            }

            .hero-title {
                padding: 15px 20px;
            }

            .hero-title h1 {
                font-size: 1.5rem;
                margin-bottom: 5px;
            }

            .hero-subtitle {
                font-size: 0.85rem;
            }
        }

        .hero-subtitle {
            color: rgba(255, 255, 255, 0.95);
            font-size: 0.95rem;
            font-weight: 400;
            max-width: 700px;
            margin: 0 auto;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.8);
            line-height: 1.4;
        }
        
        /* Main Grid */
        .course-grid {
            display: grid !important;
            grid-template-columns: 380px 950px 380px !important; /* Increased: left 280→380px, center 800→950px, right 280→380px */
            gap: 20px !important;
            max-width: 1850px !important; /* Fixed: 1800px→1850px (1710px content + 40px gaps + 100px padding = 1850px) */
            margin: 0 auto 20px !important;
            padding: 0 40px 0 !important;
            box-sizing: border-box !important;
            justify-content: center !important;
        }
        
        /* Left Panel - Course Info with Powerful Animations */
        .left-panel {
            display: flex;
            flex-direction: column;
            gap: 14px;
            animation: slideInLeft 1.2s cubic-bezier(0.34, 1.56, 0.64, 1);
            perspective: 1000px;
            width: 100%;
        }

        .info-card {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.06) 0%, rgba(99, 102, 241, 0.08) 100%);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 16px;
            padding: 1.25rem;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 8px 32px rgba(59, 130, 246, 0.08);
            position: relative;
            overflow: hidden;
        }

        .info-card::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.12) 0%, transparent 70%);
            animation: floatOrb 8s ease-in-out infinite;
            pointer-events: none;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(59, 130, 246, 0.15);
            border-color: rgba(59, 130, 246, 0.35);
        }

        .info-card-header {
            display: inline-block;
            padding: 0.5rem 1.25rem;
            border-radius: 50px;
            margin-bottom: 1.25rem;
            border: 1px solid rgba(59, 130, 246, 0.3);
            font-weight: 700;
            font-size: 0.75rem;
            background: linear-gradient(135deg, #3b82f6 0%, #6366f1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: 0.5px;
            position: relative;
            z-index: 1;
            filter: drop-shadow(0 1px 2px rgba(59, 130, 246, 0.4)) drop-shadow(0 0 8px rgba(59, 130, 246, 0.2));
            text-transform: uppercase;
        }

        .info-card-header::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.15) 0%, rgba(99, 102, 241, 0.15) 100%);
            border-radius: 50px;
            z-index: -1;
        }
        
        .info-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 16px 0;
            border-bottom: 1px solid rgba(139, 92, 246, 0.1);
            transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-item::before {
            content: '';
            position: absolute;
            left: 0;
            width: 4px;
            height: 0;
            background: linear-gradient(135deg, #8B5CF6, #EC4899);
            border-radius: 4px;
            transition: height 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .info-item:hover {
            transform: translateX(15px) scale(1.03);
            padding-left: 12px;
            background: rgba(139, 92, 246, 0.05);
            border-radius: 12px;
        }

        .info-item:hover::before {
            height: 100%;
        }

        .info-icon {
            width: 48px;
            height: 48px;
            background: var(--gradient-main);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
            box-shadow: var(--glow-sm);
            transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .info-item:hover .info-icon {
            transform: rotate(360deg) scale(1.3);
            box-shadow: 0 0 40px rgba(139, 92, 246, 0.8), 0 0 60px rgba(0, 212, 255, 0.6);
            animation: neonPulse 1.5s ease-in-out infinite;
        }

        .info-text {
            flex: 1;
        }

        .info-label {
            font-size: 0.85rem;
            color: var(--text-tertiary);
            margin-bottom: 4px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .info-value {
            font-size: 1.15rem;
            font-weight: 700;
            background: linear-gradient(135deg, #1f2937 0%, #374151 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            filter: drop-shadow(0 1px 1px rgba(0, 0, 0, 0.1));
        }
        
        /* Progress Card - White with Glow */
        .progress-card {
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.06) 0%, rgba(20, 184, 166, 0.08) 100%);
            border: 1px solid rgba(6, 182, 212, 0.2);
            border-radius: 20px;
            padding: 1.75rem;
            backdrop-filter: blur(20px);
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 20px rgba(6, 182, 212, 0.08), 0 0 0 1px rgba(255, 255, 255, 0.1);
        }

        .progress-card::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(6, 182, 212, 0.12) 0%, transparent 70%);
            top: -150px;
            right: -150px;
            animation: floatOrb 8s ease-in-out infinite;
            pointer-events: none;
        }

        .progress-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(6, 182, 212, 0.15), 0 0 0 1px rgba(6, 182, 212, 0.3);
            border-color: rgba(6, 182, 212, 0.3);
        }

        .progress-header {
            background: linear-gradient(135deg, #8B5CF6, #00d4ff);
            color: white;
            padding: 14px 20px;
            border-radius: 16px;
            font-weight: 700;
            font-size: 0.95rem;
            margin: -30px -30px 24px -30px;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3), 0 8px 24px rgba(0, 212, 255, 0.2), inset 0 1px 0 rgba(255, 255, 255, 0.3);
            border: 1px solid rgba(0, 212, 255, 0.3);
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2), 0 0 12px rgba(255, 255, 255, 0.3);
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
        }

        .progress-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }
        
        .progress-ring-container {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        
        .progress-ring {
            position: relative;
            width: 180px;
            height: 180px;
            filter: drop-shadow(0 0 30px rgba(0, 212, 255, 0.5));
        }

        .progress-ring svg {
            transform: rotate(-90deg);
        }

        .progress-ring circle {
            fill: none;
            stroke-width: 12;
        }

        .progress-ring .bg {
            stroke: rgba(139, 92, 246, 0.2);
        }

        .progress-ring .progress {
            stroke: url(#gradient);
            stroke-linecap: round;
            transition: stroke-dashoffset 1.5s cubic-bezier(0.4, 0, 0.2, 1);
            animation: progressGlow 2s ease-in-out infinite;
        }

        @keyframes progressGlow {
            0%, 100% {
                filter: drop-shadow(0 0 8px rgba(0, 212, 255, 0.8));
            }
            50% {
                filter: drop-shadow(0 0 16px rgba(139, 92, 246, 1));
            }
        }

        .progress-percentage {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-family: 'Orbitron', sans-serif;
            font-size: 2.5rem;
            font-weight: 900;
            background: var(--gradient-glow);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 30px rgba(0, 212, 255, 0.6);
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-top: 20px;
        }
        
        .stat-item {
            background: var(--bg-secondary);
            border: 1px solid var(--card-border);
            padding: 18px;
            border-radius: 16px;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-item::before {
            content: '';
            position: absolute;
            inset: 0;
            background: var(--gradient-main);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .stat-item:hover {
            border-color: var(--indigo);
            box-shadow: var(--glow-sm);
            transform: translateY(-4px);
        }

        .stat-item:hover::before {
            opacity: 0.05;
        }
        
        .stat-icon {
            font-size: 2rem;
            margin-bottom: 8px;
            position: relative;
            z-index: 1;
        }

        .stat-value {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--text-primary);
            position: relative;
            z-index: 1;
        }

        .stat-label {
            font-size: 0.8rem;
            color: var(--text-tertiary);
            margin-top: 6px;
            position: relative;
            z-index: 1;
        }
        
        /* Gamification Card - Pink/Rose */
        .gamification-card {
            background: linear-gradient(135deg, rgba(236, 72, 153, 0.06) 0%, rgba(244, 63, 94, 0.08) 100%);
            border: 1px solid rgba(236, 72, 153, 0.2);
            border-radius: 20px;
            padding: 1.75rem;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 20px rgba(236, 72, 153, 0.08), 0 0 0 1px rgba(255, 255, 255, 0.1);
            position: relative;
            overflow: hidden;
        }

        .gamification-card::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(236, 72, 153, 0.12) 0%, transparent 70%);
            bottom: -150px;
            left: -150px;
            animation: floatOrb 11s ease-in-out infinite;
            pointer-events: none;
        }

        .gamification-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(236, 72, 153, 0.15), 0 0 0 1px rgba(236, 72, 153, 0.3);
            border-color: rgba(236, 72, 153, 0.3);
        }

        .gamification-header {
            display: inline-block;
            padding: 0.5rem 1.25rem;
            border-radius: 50px;
            margin-bottom: 1.25rem;
            border: 1px solid rgba(236, 72, 153, 0.3);
            font-weight: 700;
            font-size: 0.75rem;
            background: linear-gradient(135deg, #ec4899 0%, #f43f5e 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: 0.5px;
            position: relative;
            z-index: 1;
            filter: drop-shadow(0 1px 2px rgba(236, 72, 153, 0.4)) drop-shadow(0 0 8px rgba(236, 72, 153, 0.2));
            text-transform: uppercase;
        }

        .gamification-header::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(236, 72, 153, 0.15) 0%, rgba(244, 63, 94, 0.15) 100%);
            border-radius: 50px;
            z-index: -1;
        }
        
        .level-display {
            text-align: center;
            padding: 28px;
            background: var(--bg-secondary);
            border: 1px solid var(--card-border);
            border-radius: 20px;
            margin-bottom: 20px;
        }

        .level-number {
            font-family: 'Orbitron', sans-serif;
            font-size: 3.5rem;
            font-weight: 900;
            background: linear-gradient(135deg, #8B5CF6, #EC4899, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            filter: drop-shadow(0 4px 8px rgba(139, 92, 246, 0.4)) drop-shadow(0 0 20px rgba(236, 72, 153, 0.3));
            text-shadow: 0 0 40px rgba(0, 212, 255, 0.5);
            position: relative;
        }

        .level-number::before {
            content: attr(data-level);
            position: absolute;
            left: 0;
            top: 2px;
            z-index: -1;
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.3), rgba(236, 72, 153, 0.3));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            filter: blur(4px);
        }

        .xp-text {
            color: var(--text-secondary);
            font-size: 0.9rem;
            margin-top: 8px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .achievements-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .achievement {
            background: var(--bg-secondary);
            padding: 16px;
            border-radius: 14px;
            text-align: center;
            border: 1px solid var(--card-border);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .achievement::before {
            content: '';
            position: absolute;
            inset: 0;
            background: var(--gradient-main);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .achievement.unlocked {
            border-color: var(--indigo);
            box-shadow: var(--glow-sm);
        }

        .achievement.unlocked::before {
            opacity: 0.05;
        }

        .achievement.locked {
            opacity: 0.5;
            filter: grayscale(0.8);
        }

        .achievement:hover {
            cursor: pointer;
            transform: translateY(-4px);
            box-shadow: var(--glow-sm);
        }

        .achievement-icon {
            font-size: 2.2rem;
            margin-bottom: 8px;
            position: relative;
            z-index: 1;
        }

        .achievement-icon i {
            background: linear-gradient(135deg, #9ca3af 0%, #6b7280 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .achievement.unlocked .achievement-icon i {
            background: linear-gradient(135deg, #8B5CF6 0%, #EC4899 50%, #F97316 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            filter: drop-shadow(0 2px 6px rgba(139, 92, 246, 0.4)) drop-shadow(0 0 12px rgba(236, 72, 153, 0.3));
            animation: iconGlow 2s ease-in-out infinite alternate;
        }

        @keyframes iconGlow {
            0% {
                filter: drop-shadow(0 2px 6px rgba(139, 92, 246, 0.4)) drop-shadow(0 0 12px rgba(236, 72, 153, 0.3));
            }
            100% {
                filter: drop-shadow(0 2px 8px rgba(139, 92, 246, 0.6)) drop-shadow(0 0 20px rgba(236, 72, 153, 0.5));
            }
        }

        .achievement-name {
            font-size: 0.8rem;
            font-weight: 700;
            background: linear-gradient(135deg, #1f2937 0%, #374151 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            position: relative;
            z-index: 1;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            filter: drop-shadow(0 1px 1px rgba(0, 0, 0, 0.1));
        }

        .achievement.unlocked .achievement-name {
            background: linear-gradient(135deg, #8B5CF6 0%, #EC4899 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            filter: drop-shadow(0 1px 2px rgba(139, 92, 246, 0.3));
        }
        
        /* Center Content */
        .center-content {
            display: flex;
            flex-direction: column;
            gap: 8px !important;
            animation: fadeIn 1.2s ease-out;
            width: 100%;
        }

        /* Reduce spacing in course area */
        .CourseTabBar {
            margin-bottom: 12px !important;
        }

        .tab-panel {
            margin-top: 0 !important;
            padding: 16px !important;
        }


        .section-title {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 20px;
            animation: slideInLeft 1s ease-out;
        }

        .section-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #8B5CF6, #EC4899);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.4rem;
            box-shadow: 0 0 20px rgba(139, 92, 246, 0.25);
            transition: all 0.3s ease;
        }

        .section-title:hover .section-icon {
            transform: rotate(10deg) scale(1.1);
            box-shadow: var(--glow-md);
        }

        .section-title h2 {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        .section-content {
            color: var(--text-secondary);
            line-height: 1.9;
            font-size: 1.05rem;
        }

        /* Learning Objectives - White Card with Animations */
        .objectives-section {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 24px;
            padding: 18px;
            box-shadow: var(--card-shadow);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            animation: fadeIn 1.3s ease-out;
        }

        .objectives-section:hover {
            box-shadow: var(--shadow-soft), var(--glow-md);
            border-color: var(--indigo);
            transform: translateY(-4px);
        }

        .objectives-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .objective-card {
            background: var(--bg-secondary);
            border-radius: 18px;
            padding: 24px;
            border: 1px solid var(--card-border);
            cursor: pointer;
            transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative;
            overflow: hidden;
            animation: rotateZoomIn 1s cubic-bezier(0.34, 1.56, 0.64, 1);
            transform-style: preserve-3d;
        }

        .objective-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: var(--gradient-main);
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .objective-card::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(139, 92, 246, 0.4), transparent);
            transform: translate(-50%, -50%);
            transition: width 0.6s ease, height 0.6s ease;
        }

        .objective-card:hover {
            border-color: var(--indigo);
            box-shadow: 0 25px 70px rgba(139, 92, 246, 0.5), 0 0 50px rgba(0, 212, 255, 0.4);
            transform: translateY(-20px) scale(1.08);
            animation: pulseGlow 2s ease-in-out infinite;
        }

        .objective-card:hover::before {
            opacity: 0.15;
        }

        .objective-card:hover::after {
            width: 500px;
            height: 500px;
        }

        .objective-icon {
            font-size: 2.8rem;
            margin-bottom: 14px;
            position: relative;
            z-index: 1;
            transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
            display: inline-block;
            filter: drop-shadow(0 0 10px rgba(139, 92, 246, 0.3));
        }

        .objective-card:hover .objective-icon {
            transform: scale(1.5) rotate(360deg) translateY(-10px);
            animation: wave 1.5s ease-in-out infinite;
            filter: drop-shadow(0 0 30px rgba(139, 92, 246, 1)) drop-shadow(0 0 50px rgba(0, 212, 255, 0.8));
        }

        .objective-title {
            font-size: 1.05rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--text-primary);
            position: relative;
            z-index: 1;
        }

        .objective-desc {
            font-size: 0.9rem;
            color: var(--text-tertiary);
            line-height: 1.6;
            position: relative;
            z-index: 1;
        }
        
        /* Curriculum Section - White Card */
        .curriculum-section {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 24px;
            padding: 18px;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
        }

        .curriculum-section:hover {
            box-shadow: var(--shadow-soft), var(--glow-md);
            border-color: var(--indigo);
            transform: translateY(-2px);
        }
        
        .curriculum-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .curriculum-item {
            background: var(--bg-secondary);
            border-radius: 18px;
            padding: 24px;
            border: 1px solid var(--card-border);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .curriculum-item::before {
            content: '';
            position: absolute;
            inset: 0;
            background: var(--gradient-main);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .curriculum-item:hover {
            border-color: var(--indigo);
            box-shadow: var(--glow-md);
            transform: translateX(4px);
        }

        .curriculum-item:hover::before {
            opacity: 0.05;
        }

        .curriculum-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 16px;
            position: relative;
            z-index: 1;
        }

        .curriculum-number {
            width: 52px;
            height: 52px;
            background: var(--gradient-main);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-family: 'Orbitron', sans-serif;
            font-size: 1.4rem;
            font-weight: 900;
            box-shadow: var(--glow-sm);
        }

        .curriculum-title {
            flex: 1;
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        .curriculum-status {
            padding: 8px 16px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .curriculum-status.completed {
            background: linear-gradient(135deg, #06B6D4, #0EA5E9);
            color: white;
            box-shadow: 0 0 15px rgba(6, 182, 212, 0.4);
        }

        .curriculum-status.in-progress {
            background: linear-gradient(135deg, #5A4FCF, #4E9FFF);
            color: white;
            box-shadow: var(--glow-sm);
        }

        .curriculum-status.locked {
            background: rgba(107, 114, 128, 0.2);
            color: var(--text-tertiary);
            border: 1px solid rgba(107, 114, 128, 0.3);
        }

        .curriculum-desc {
            color: var(--text-tertiary);
            font-size: 0.92rem;
            line-height: 1.7;
            margin-bottom: 14px;
            position: relative;
            z-index: 1;
        }

        .curriculum-meta {
            display: flex;
            gap: 18px;
            flex-wrap: wrap;
            position: relative;
            z-index: 1;
        }

        .curriculum-meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-secondary);
            font-size: 0.85rem;
        }

        .curriculum-meta-item i {
            color: var(--neon-blue);
        }

        .curriculum-progress {
            margin-top: 18px;
            padding-top: 18px;
            border-top: 1px solid rgba(139, 92, 246, 0.2);
            position: relative;
            z-index: 1;
        }

        .progress-bar-container {
            height: 8px;
            background: rgba(139, 92, 246, 0.2);
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            background: var(--gradient-main);
            border-radius: 10px;
            transition: width 1.5s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 0 10px rgba(0, 212, 255, 0.6);
        }

        .progress-text {
            margin-top: 8px;
            font-size: 0.8rem;
            color: var(--text-secondary);
            text-align: right;
        }
        
        /* Right Panel */
        .right-panel {
            display: flex;
            flex-direction: column;
            gap: 14px;
            width: 100%;
        }

        /* Instructor Card - White */
        .instructor-card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 18px;
            padding: 20px;
            box-shadow: var(--card-shadow);
            text-align: center;
            transition: all 0.3s ease;
        }

        .instructor-card:hover {
            box-shadow: var(--shadow-soft), var(--glow-md);
            border-color: var(--indigo);
            transform: translateY(-2px);
        }

        .instructor-header {
            background: linear-gradient(135deg, #5A4FCF 0%, #7C3AED 50%, #4E9FFF 100%);
            color: white;
            padding: 12px 16px;
            border-radius: 14px;
            font-weight: 700;
            font-size: 0.95rem;
            margin: -20px -20px 20px -20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            box-shadow: 0 6px 20px rgba(139, 92, 246, 0.35), 0 2px 6px rgba(139, 92, 246, 0.2);
            border: none;
            position: relative;
            overflow: hidden;
        }

        .instructor-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            animation: slideLight 3s infinite;
        }

        @keyframes slideLight {
            0% {
                left: -100%;
            }
            100% {
                left: 100%;
            }
        }

        .instructor-header i {
            font-size: 1.1rem;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
        }

        .instructor-avatar {
            width: 110px;
            height: 110px;
            margin: 0 auto 18px;
            background: linear-gradient(135deg, #5A4FCF 0%, #7C3AED 50%, #4E9FFF 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Orbitron', sans-serif;
            font-size: 2.8rem;
            color: white;
            font-weight: 900;
            box-shadow: 0 8px 20px rgba(139, 92, 246, 0.35), 0 2px 6px rgba(139, 92, 246, 0.25);
            border: 3px solid rgba(255, 255, 255, 0.95);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .instructor-avatar::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.3), transparent);
        }

        .instructor-avatar:hover {
            transform: scale(1.08) rotate(5deg);
            box-shadow: 0 12px 28px rgba(139, 92, 246, 0.45), 0 4px 10px rgba(139, 92, 246, 0.3);
        }

        .instructor-name {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 6px;
            color: var(--text-primary);
        }

        .instructor-title {
            color: var(--text-tertiary);
            font-size: 0.9rem;
        }
        
        /* CTA Card - Purple-Pink Gradient Theme */
        .cta-card {
            background: linear-gradient(135deg,
                rgba(139, 92, 246, 0.08) 0%,
                rgba(236, 72, 153, 0.06) 50%,
                rgba(139, 92, 246, 0.08) 100%);
            border: 2px solid transparent;
            background-clip: padding-box;
            border-radius: 24px;
            padding: 2rem;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow:
                0 8px 32px rgba(139, 92, 246, 0.15),
                0 0 0 1px rgba(255, 255, 255, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
        }

        .cta-card::before {
            content: '';
            position: absolute;
            inset: -2px;
            border-radius: 24px;
            padding: 2px;
            background: linear-gradient(135deg, #8b5cf6, #ec4899, #8b5cf6);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            pointer-events: none;
            z-index: -1;
        }

        .cta-card::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(139, 92, 246, 0.15) 0%, transparent 70%);
            top: -200px;
            right: -200px;
            animation: floatOrb 12s ease-in-out infinite;
            pointer-events: none;
        }

        .cta-card:hover {
            transform: translateY(-6px) scale(1.01);
            box-shadow:
                0 16px 48px rgba(139, 92, 246, 0.25),
                0 0 0 1px rgba(139, 92, 246, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }

        .border-shine {
            animation: borderShine 3s ease-in-out infinite;
        }

        @keyframes borderShine {
            0%, 100% {
                box-shadow:
                    0 8px 32px rgba(139, 92, 246, 0.15),
                    0 0 0 1px rgba(255, 255, 255, 0.1);
            }
            50% {
                box-shadow:
                    0 8px 32px rgba(236, 72, 153, 0.2),
                    0 0 20px rgba(139, 92, 246, 0.3),
                    0 0 0 1px rgba(236, 72, 153, 0.2);
            }
        }

        .cta-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
            border-radius: 50px;
            color: white;
            font-weight: 700;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 16px rgba(139, 92, 246, 0.4);
            position: relative;
            z-index: 1;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .cta-badge i {
            font-size: 1.1rem;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
        }

        .cta-divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 2rem 0 1.5rem;
            position: relative;
            z-index: 1;
        }

        .cta-divider::before,
        .cta-divider::after {
            content: '';
            flex: 1;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(139, 92, 246, 0.3), transparent);
        }

        .cta-divider span {
            font-size: 0.85rem;
            font-weight: 700;
            color: #8b5cf6;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .cta-trust-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 1.5rem;
            padding: 12px;
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.05), rgba(236, 72, 153, 0.05));
            border-radius: 12px;
            border: 1px solid rgba(139, 92, 246, 0.2);
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-secondary);
            position: relative;
            z-index: 1;
        }

        .cta-trust-badge i {
            color: #8b5cf6;
            font-size: 1rem;
        }

        .cta-price {
            margin-bottom: 24px;
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .price-label {
            font-size: 0.9rem;
            font-weight: 700;
            color: #8b5cf6;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 12px;
        }

        .price-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            margin: 16px 0;
        }

        .price-original {
            font-size: 1.3rem !important;
            text-decoration: line-through !important;
            text-decoration-thickness: 2px !important;
            text-decoration-color: #ef4444 !important;
            opacity: 1 !important;
            color: #1f2937 !important;
            font-weight: 600 !important;
            font-family: 'Orbitron', sans-serif !important;
        }

        .price-current {
            font-family: 'Orbitron', sans-serif !important;
            font-size: 2.8rem !important;
            font-weight: 900 !important;
            display: block !important;
            margin: 10px 0 !important;
            background: var(--gradient-glow) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
        }

        .price-blurred {
            filter: blur(8px) !important;
            -webkit-filter: blur(8px) !important;
            user-select: none !important;
            pointer-events: none !important;
            transition: filter 0.3s ease !important;
        }

        .price-save {
            display: inline-block !important;
            padding: 6px 16px !important;
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(220, 38, 38, 0.15)) !important;
            border: 1px solid rgba(239, 68, 68, 0.3) !important;
            border-radius: 20px !important;
            color: #dc2626 !important;
            font-size: 0.85rem !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.5px !important;
            margin: 8px 0 !important;
        }

        .price-reveal-link {
            display: inline-flex !important;
            align-items: center !important;
            gap: 8px !important;
            padding: 12px 24px !important;
            margin-top: 12px !important;
            background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%) !important;
            color: white !important;
            text-decoration: none !important;
            border-radius: 12px !important;
            font-weight: 700 !important;
            font-size: 0.95rem !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3) !important;
        }

        .price-reveal-link:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 6px 20px rgba(139, 92, 246, 0.4) !important;
            background: linear-gradient(135deg, #7c3aed 0%, #6366f1 100%) !important;
            color: white !important;
        }

        .price-reveal-link i {
            font-size: 1.1rem !important;
        }

        .cta-card .cta-button {
            display: block;
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #8B5CF6 0%, #7C3AED 50%, #6366F1 100%);
            color: white;
            border: none;
            border-radius: 14px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            margin-bottom: 14px;
            position: relative;
            z-index: 1;
            box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3), 0 8px 24px rgba(124, 58, 237, 0.2), inset 0 1px 0 rgba(255, 255, 255, 0.3), inset 0 -1px 0 rgba(0, 0, 0, 0.2);
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3), 0 0 10px rgba(255, 255, 255, 0.2);
            text-transform: uppercase;
            letter-spacing: 1px;
            overflow: hidden;
        }

        .cta-card .cta-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .cta-card .cta-button:hover::before {
            left: 100%;
        }

        .cta-card .cta-button:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 6px 20px rgba(139, 92, 246, 0.4), 0 12px 32px rgba(124, 58, 237, 0.3), inset 0 1px 0 rgba(255, 255, 255, 0.4), inset 0 -1px 0 rgba(0, 0, 0, 0.2);
        }

        .cta-card .cta-button.secondary {
            background: transparent;
            border: 2px solid var(--indigo);
            color: var(--indigo);
            box-shadow: none;
        }

        .cta-card .cta-button.secondary:hover {
            background: rgba(139, 92, 246, 0.08);
            border-color: var(--purple);
            color: var(--purple);
        }

        /* Features List */
        .features-list {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-top: 24px;
            position: relative;
            z-index: 1;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.875rem;
            padding: 12px;
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.05), rgba(236, 72, 153, 0.03));
            border-radius: 12px;
            border: 1px solid rgba(139, 92, 246, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 600;
            color: var(--text-secondary);
        }

        .feature-item:hover {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.1), rgba(236, 72, 153, 0.08));
            border-color: rgba(139, 92, 246, 0.3);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(139, 92, 246, 0.15);
        }

        .feature-icon {
            color: #8b5cf6;
            font-size: 1.1rem;
            filter: drop-shadow(0 2px 4px rgba(139, 92, 246, 0.3));
            min-width: 20px;
            text-align: center;
        }

        @media (max-width: 768px) {
            .features-list {
                grid-template-columns: 1fr;
            }
        }
        
        /* Responsive */
        @media (max-width: 1024px) {
            .course-grid {
                grid-template-columns: 1fr;
                padding: 0 20px 8px !important;
                margin-bottom: 20px !important;
            }

            .objectives-grid {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 768px) {
            .hero-title h1 {
                font-size: 2rem;
            }
            
            .stats-grid,
            .achievements-grid {
                grid-template-columns: 1fr;
            }
        }
        
        /* Remove animations */
        .reveal {
            opacity: 1;
            transform: translateY(0);
        }
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
        margin-top: 0;
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
        padding: 20px 16px;
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

    .stat-card:hover .stat-icon {
        transform: scale(1.2);
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
        margin-bottom: 24px;
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
        padding: 18px;
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
        padding: 20px 0;
        margin-top: 20px;
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
        font-size: 22px;
        font-weight: 800;
        background: linear-gradient(135deg, #FFFFFF, #E0E7FF);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        text-align: center;
    }

    .trending-title i {
        color: #F59E0B;
        animation: fire-pulse 2s ease-in-out infinite;
        font-size: 24px;
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

    /* Excessive float-1 through float-8 animations removed for performance */

    /* Footer Bottom */
    .footer-bottom {
        position: relative;
        z-index: 3;
        background: linear-gradient(135deg,
            rgba(10, 14, 39, 0.95),
            rgba(26, 31, 58, 0.9));
        border-top: 2px solid rgba(139, 92, 246, 0.3);
        padding: 20px 16px;
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

        .trending-courses {
            padding: 18px 0;
            margin-top: 18px;
        }

        .trending-courses-wrapper {
            padding: 0 16px;
        }

        .trending-title {
            font-size: 20px;
            margin-bottom: 20px;
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
    }

    @media (max-width: 480px) {
        .vue-footer-modern {
            margin-top: 0;
        }

        .footer-main {
            padding: 30px 12px;
        }

        .stats-section {
            padding: 18px 12px;
        }

        .footer-bottom {
            padding: 18px 12px;
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

        .stat-card {
            padding: 20px 16px;
        }

        .trending-courses {
            padding: 24px 0;
            margin-top: 24px;
        }

        .trending-courses-wrapper {
            padding: 0 12px;
        }

        .trending-title {
            font-size: 18px;
            margin-bottom: 16px;
        }

        .trending-title i {
            font-size: 20px;
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
    }

    /* ========== PROFESSIONAL HORIZONTAL COURSE TAB BAR ========== */
    .CourseTabBar {
        background: linear-gradient(135deg,
            rgba(255, 255, 255, 0.98) 0%,
            rgba(248, 250, 252, 0.95) 50%,
            rgba(255, 255, 255, 0.98) 100%);
        border-radius: 14px;
        padding: 8px 14px 6px;
        margin-bottom: 24px;
        border: 1px solid rgba(139, 92, 246, 0.15);
        box-shadow: 0 2px 12px rgba(139, 92, 246, 0.08),
                    0 4px 20px rgba(139, 92, 246, 0.05),
                    inset 0 1px 0 rgba(255, 255, 255, 0.9);
        position: sticky;
        top: calc(80px + 24px);
        z-index: 100;
        animation: fadeInUp 0.5s ease-out;
        width: 100%;
        max-width: 100%;
        box-sizing: border-box;
        backdrop-filter: blur(24px) saturate(180%);
        -webkit-backdrop-filter: blur(24px) saturate(180%);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        overflow: visible;
    }

    .CourseTabBar::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg,
            transparent 0%,
            rgba(139, 92, 246, 0.5) 20%,
            rgba(236, 72, 153, 0.5) 50%,
            rgba(139, 92, 246, 0.5) 80%,
            transparent 100%);
        border-radius: 20px 20px 0 0;
    }

    .CourseTabBar:hover {
        box-shadow: 0 6px 28px rgba(139, 92, 246, 0.15),
                    0 12px 40px rgba(139, 92, 246, 0.08),
                    inset 0 1px 0 rgba(255, 255, 255, 1);
        transform: translateY(-2px);
        border-color: rgba(139, 92, 246, 0.25);
    }

    /* Tab Header Title - Optional header above tabs */
    .tab-header-title {
        display: flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 8px;
        padding-bottom: 8px;
        border-bottom: 2px solid rgba(139, 92, 246, 0.1);
    }

    .tab-header-title i {
        font-size: 14px;
        background: linear-gradient(135deg, #8B5CF6, #EC4899);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .tab-header-title span {
        font-size: 13px;
        font-weight: 700;
        color: var(--text-primary);
        letter-spacing: 0.3px;
    }

    /* ========== HORIZONTAL TAB PILLS ========== */
    .tab-pills {
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        gap: 6px;
        padding: 0 4px 4px 4px;
        overflow-x: auto;
        overflow-y: hidden;
        align-items: center;
        justify-content: flex-start;
        scrollbar-width: thin;
        scrollbar-color: rgba(139, 92, 246, 0.3) rgba(139, 92, 246, 0.05);
        scroll-behavior: smooth;
    }

    /* Custom scrollbar for webkit browsers */
    .tab-pills::-webkit-scrollbar {
        height: 6px;
    }

    .tab-pills::-webkit-scrollbar-track {
        background: rgba(139, 92, 246, 0.05);
        border-radius: 10px;
    }

    .tab-pills::-webkit-scrollbar-thumb {
        background: linear-gradient(90deg, rgba(139, 92, 246, 0.4), rgba(236, 72, 153, 0.4));
        border-radius: 10px;
    }

    .tab-pills::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(90deg, rgba(139, 92, 246, 0.6), rgba(236, 72, 153, 0.6));
    }

    /* Base tab chip - compact single row design */
    .tab-chip {
        position: relative;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 9px 24px;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(248, 250, 252, 0.9) 100%);
        border: 2px solid rgba(139, 92, 246, 0.15);
        border-radius: 10px;
        font-size: 15px;
        font-weight: 600;
        color: var(--text-secondary);
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        backdrop-filter: blur(10px);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        overflow: hidden;
        white-space: nowrap;
        flex-shrink: 0;
    }

    /* Gradient shimmer effect on hover */
    .tab-chip::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(139, 92, 246, 0.1), transparent);
        transition: left 0.5s ease;
    }

    .tab-chip:hover::before {
        left: 100%;
    }

    /* Icon wrapper - compact */
    .tab-icon-wrapper {
        width: 28px;
        height: 28px;
        min-width: 28px;
        background: linear-gradient(135deg, rgba(139, 92, 246, 0.12) 0%, rgba(236, 72, 153, 0.1) 100%);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        z-index: 1;
    }

    .tab-icon-wrapper i {
        font-size: 14px;
        background: linear-gradient(135deg, #8B5CF6 0%, #EC4899 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        transition: all 0.3s ease;
    }

    /* Text content wrapper - horizontal */
    .tab-content-wrapper {
        display: flex;
        flex-direction: column;
        gap: 2px;
        position: relative;
        z-index: 1;
    }

    .tab-title {
        font-size: 15px;
        font-weight: 700;
        color: var(--text-primary);
        transition: all 0.3s ease;
        line-height: 1.2;
    }

    .tab-subtitle {
        display: none; /* Hidden for single row layout */
    }

    /* Hide indicator in horizontal mode */
    .tab-indicator {
        display: none;
    }

    /* Hover state */
    .tab-chip:not(.LockedTabChip):not(.active):hover {
        background: linear-gradient(135deg, rgba(255, 255, 255, 1) 0%, rgba(249, 250, 251, 1) 100%);
        border-color: rgba(139, 92, 246, 0.3);
        box-shadow: 0 6px 20px rgba(139, 92, 246, 0.12);
        transform: translateY(-2px);
    }

    .tab-chip:not(.LockedTabChip):not(.active):hover .tab-icon-wrapper {
        background: linear-gradient(135deg, rgba(139, 92, 246, 0.18) 0%, rgba(236, 72, 153, 0.15) 100%);
        transform: scale(1.05);
    }

    .tab-chip:not(.LockedTabChip):not(.active):hover .tab-icon-wrapper i {
        transform: scale(1.1);
    }

    .tab-chip:not(.LockedTabChip):not(.active):hover .tab-title {
        color: #8B5CF6;
    }

    /* Active tab state - sleek gradient background with bottom indicator */
    .tab-chip.active {
        background: linear-gradient(135deg, #8B5CF6 0%, #A78BFA 50%, #EC4899 100%);
        border-color: transparent;
        box-shadow: 0 8px 24px rgba(139, 92, 246, 0.3),
                    0 0 0 3px rgba(255, 255, 255, 0.2) inset;
        transform: translateY(-2px);
    }

    .tab-chip.active::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 60%;
        height: 3px;
        background: rgba(255, 255, 255, 0.6);
        border-radius: 3px 3px 0 0;
    }

    .tab-chip.active .tab-icon-wrapper {
        background: rgba(255, 255, 255, 0.25);
        transform: scale(1.05);
    }

    .tab-chip.active .tab-icon-wrapper i {
        background: white;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
        transform: scale(1.05);
    }

    .tab-chip.active .tab-title,
    .tab-chip.active .tab-subtitle {
        color: white;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }

    .tab-chip.active:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 28px rgba(139, 92, 246, 0.35),
                    0 0 0 3px rgba(255, 255, 255, 0.3) inset;
    }

    /* Locked tab styling */
    .LockedTabChip {
        opacity: 0.6;
        cursor: not-allowed;
        background: linear-gradient(135deg, rgba(241, 245, 249, 0.8) 0%, rgba(226, 232, 240, 0.8) 100%);
        border-color: rgba(148, 163, 184, 0.2);
    }

    .LockedTabChip .tab-icon-wrapper {
        background: rgba(148, 163, 184, 0.15);
    }

    .LockedTabChip .tab-icon-wrapper i {
        background: linear-gradient(135deg, #94a3b8, #64748b);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .LockedTabChip .tab-title {
        color: #94a3b8;
    }

    .LockedTabChip .tab-subtitle {
        color: #cbd5e1;
    }

    .LockedTabChip:hover {
        transform: none;
        box-shadow: none;
    }

    /* Lock icon for locked tabs */
    .lock-icon {
        position: absolute;
        top: -6px;
        right: -6px;
        width: 20px;
        height: 20px;
        background: linear-gradient(135deg, #f59e0b, #f97316);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 10px;
        color: white;
        box-shadow: 0 2px 8px rgba(245, 158, 11, 0.4);
        z-index: 2;
    }

    /* Premium badge */
    .premium-badge {
        position: absolute;
        top: -8px;
        left: 50%;
        transform: translateX(-50%);
        padding: 2px 8px;
        background: linear-gradient(135deg, #f59e0b, #f97316);
        color: white;
        font-size: 9px;
        font-weight: 700;
        border-radius: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 2px 8px rgba(245, 158, 11, 0.3);
        z-index: 2;
    }

    /* Tooltip for locked tabs */
    .tab-tooltip {
        position: absolute;
        bottom: calc(100% + 10px);
        left: 50%;
        transform: translateX(-50%) translateY(-5px);
        background: var(--card-bg);
        padding: 8px 12px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 600;
        color: var(--text-primary);
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
        white-space: nowrap;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 1000;
        pointer-events: none;
    }

    .tab-tooltip::after {
        content: '';
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translateX(-50%);
        border: 5px solid transparent;
        border-top-color: var(--card-bg);
    }

    .LockedTabChip:hover .tab-tooltip {
        opacity: 1;
        visibility: visible;
        transform: translateX(-50%) translateY(0);
    }

    /* Responsive adjustments */
    @media (max-width: 1024px) {
        .tab-pills {
            gap: 8px;
        }

        .tab-chip {
            padding: 10px 14px;
            font-size: 14px;
            gap: 8px;
        }

        .tab-icon-wrapper {
            width: 28px;
            height: 28px;
            min-width: 28px;
        }

        .tab-icon-wrapper i {
        font-size: 13px;
        }

        .tab-title {
        font-size: 14px;
        }
    }

    @media (max-width: 768px) {
        .CourseTabBar {
            padding: 12px 14px 10px;
            border-radius: 16px;
        }

        .tab-header-title {
            margin-bottom: 10px;
            padding-bottom: 8px;
        }

        .tab-pills {
            gap: 6px;
        }

        .tab-chip {
            padding: 8px 12px;
            font-size: 14px;
            gap: 7px;
        }

        .tab-icon-wrapper {
            width: 26px;
            height: 26px;
            min-width: 26px;
            border-radius: 7px;
        }

        .tab-icon-wrapper i {
            font-size: 13px;
        }

        .tab-title {
            font-size: 14px;
        }

        .lock-icon {
            width: 16px;
            height: 16px;
            font-size: 8px;
        }

        .premium-badge {
            font-size: 7px;
            padding: 2px 5px;
        }
    }

    @media (max-width: 480px) {
        .tab-pills {
            gap: 5px;
        }

        .tab-chip {
            padding: 7px 10px;
            font-size: 13px;
            gap: 6px;
        }

        .tab-icon-wrapper {
            width: 24px;
            height: 24px;
            min-width: 24px;
        }

        .tab-icon-wrapper i {
            font-size: 12px;
        }

        .tab-title {
            font-size: 13px;
        }
    }

        .tab-chip {
            padding: 5px 7px;
            font-size: 9px;
        }
    }

    /* ========== TAB PANELS ========== */
    .tab-panel {
        display: none !important;
        background: linear-gradient(135deg, rgba(139, 92, 246, 0.06) 0%, rgba(124, 58, 237, 0.08) 100%);
        border-radius: 18px;
        padding: 14px !important;
        border: 2px solid rgba(139, 92, 246, 0.12);
        box-shadow: 0 12px 40px rgba(139, 92, 246, 0.1),
                    0 4px 12px rgba(0, 0, 0, 0.06),
                    0 0 0 1px rgba(255, 255, 255, 0.8) inset;
        margin-bottom: 0 !important;
        margin-top: 0 !important;
        position: relative;
        overflow: hidden;
        backdrop-filter: blur(20px);
        animation: panelFadeIn 0.5s ease-out;
    }

    @keyframes panelFadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .tab-panel::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #7C3AED 0%, #8B5CF6 25%, #4F46E5 50%, #8B5CF6 75%, #7C3AED 100%);
        background-size: 200% 100%;
        animation: gradientShift 8s ease infinite;
    }

    @keyframes gradientShift {
        0%, 100% {
            background-position: 0% 0%;
        }
        50% {
            background-position: 100% 0%;
        }
    }

    .tab-panel.active {
        display: block !important;
        animation: fadeInUp 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Defensive CSS: Hide duplicate panels if they somehow exist */
    .tab-panel[id]:not(:first-of-type) {
        position: relative;
    }

    /* Ensure only the first occurrence of each ID is shown */
    #overview-panel ~ #overview-panel,
    #curriculum-panel ~ #curriculum-panel,
    #schedule-panel ~ #schedule-panel,
    #reviews-panel ~ #reviews-panel,
    #faq-panel ~ #faq-panel,
    #projects-panel ~ #projects-panel {
        display: none !important;
        visibility: hidden !important;
        opacity: 0 !important;
        pointer-events: none !important;
        position: absolute !important;
        left: -9999px !important;
    }

    /* Prevent promo-tabs from appearing in center-content */
    .center-content .promo-tabs-container,
    .center-content .promo-tab-panel,
    .center-content .promo-tab {
        display: none !important;
        visibility: hidden !important;
    }

    /* Hide all promo-tab-panels by default */
    .promo-tab-panel {
        display: none !important;
    }

    /* Show only active promo-tab-panel */
    .promo-tab-panel.active {
        display: block !important;
    }

    /* Container isolation to prevent content leakage */
    .center-content {
        isolation: isolate;
    }

    .right-panel {
        isolation: isolate;
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

    /* Tab Panel Headings */
    .tab-panel h2 {
        font-size: 1.875rem;
        font-weight: 800;
        background: linear-gradient(135deg, #7C3AED 0%, #8B5CF6 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 1.25rem;
        margin-top: 0;
        position: relative;
        padding-bottom: 0.5rem;
        letter-spacing: -0.5px;
    }

    .tab-panel h2::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, #7C3AED, #8B5CF6);
        border-radius: 2px;
    }

    .tab-panel h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 0.75rem;
        margin-top: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .tab-panel h3::before {
        content: '';
        width: 6px;
        height: 28px;
        background: linear-gradient(180deg, #7C3AED, #8B5CF6);
        border-radius: 3px;
    }

    @media (max-width: 768px) {
        .tab-panel {
            padding: 20px 16px;
            border-radius: 1.5rem;
        }

        .tab-panel h2 {
            font-size: 1.5rem;
        }

        .tab-panel h3 {
            font-size: 1.25rem;
        }
    }

    /* ========== OVERVIEW TAB ========== */
    .feature-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
        margin: 12px 0;
    }

    @media (max-width: 640px) {
        .feature-grid {
            grid-template-columns: 1fr;
        }
    }

    .feature-tile {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(250, 251, 255, 1) 100%);
        border: 2px solid rgba(139, 92, 246, 0.1);
        border-radius: 20px;
        padding: 18px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(139, 92, 246, 0.08);
    }

    .feature-tile::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at top right, rgba(139, 92, 246, 0.08), transparent 60%);
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .feature-tile:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 16px 48px rgba(139, 92, 246, 0.2),
                    0 0 0 1px rgba(139, 92, 246, 0.15) inset;
        border-color: rgba(139, 92, 246, 0.25);
    }

    .feature-tile:hover::before {
        opacity: 1;
    }

    .feature-tile h4 {
        font-size: 1.125rem;
        font-weight: 700;
        margin-bottom: 0.75rem;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        gap: 0.75rem;
        position: relative;
        z-index: 1;
    }

    .feature-tile h4::before {
        content: attr(data-icon);
        font-size: 1.5rem;
        filter: drop-shadow(0 2px 4px rgba(139, 92, 246, 0.3));
    }

    .feature-tile h4 .feature-icon {
        background: linear-gradient(135deg, #7C3AED 0%, #8B5CF6 50%, #EC4899 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        filter: drop-shadow(0 2px 8px rgba(139, 92, 246, 0.35));
        font-size: 1.5rem;
        margin-right: 0.75rem;
        animation: featureIconGlow 3s ease-in-out infinite;
    }

    @keyframes featureIconGlow {
        0%, 100% {
            filter: drop-shadow(0 2px 8px rgba(139, 92, 246, 0.35));
        }
        50% {
            filter: drop-shadow(0 2px 12px rgba(139, 92, 246, 0.6));
        }
    }

    .feature-tile p {
        color: var(--text-secondary);
        font-size: 0.9375rem;
        line-height: 1.7;
        position: relative;
        z-index: 1;
    }

    .ProjectMiniCard {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(250, 251, 255, 1) 100%);
        border: 2px solid rgba(139, 92, 246, 0.12);
        border-radius: 18px;
        padding: 16px;
        display: flex;
        gap: 20px;
        align-items: center;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        margin-bottom: 0;
        box-shadow: 0 6px 20px rgba(139, 92, 246, 0.1);
        position: relative;
        overflow: hidden;
    }

    .ProjectMiniCard::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 4px;
        height: 100%;
        background: linear-gradient(180deg, #7C3AED, #8B5CF6);
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .ProjectMiniCard:hover {
        box-shadow: 0 12px 36px rgba(139, 92, 246, 0.2),
                    0 0 0 1px rgba(139, 92, 246, 0.1) inset;
        transform: translateY(-6px) translateX(4px);
        border-color: rgba(139, 92, 246, 0.2);
    }

    .ProjectMiniCard:hover::before {
        opacity: 1;
    }

    .project-cover {
        width: 56px;
        height: 56px;
        background: linear-gradient(135deg, #7C3AED 0%, #8B5CF6 100%);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
        box-shadow: 0 8px 20px rgba(139, 92, 246, 0.35);
        transition: all 0.4s ease;
        color: white;
    }

    .project-cover i {
        color: white;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
    }

    .ProjectMiniCard:hover .project-cover {
        transform: scale(1.1) rotate(5deg);
        box-shadow: 0 12px 28px rgba(139, 92, 246, 0.45);
    }

    .ProjectMiniCard:hover .project-cover i {
        transform: scale(1.1);
    }

    .ToolLogoRow {
        display: flex;
        gap: 15px;
        flex-wrap: nowrap;
        margin: 18px 0;
        padding: 18px;
        background: linear-gradient(135deg, rgba(139, 92, 246, 0.04) 0%, rgba(236, 72, 153, 0.04) 100%);
        border-radius: 20px;
        border: 2px solid rgba(139, 92, 246, 0.12);
        box-shadow: 0 4px 20px rgba(139, 92, 246, 0.08);
        overflow: hidden;
        position: relative;
    }

    .tools-carousel-track {
        display: flex;
        gap: 15px;
        animation: slideRight 15s linear infinite;
    }

    @keyframes slideRight {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-50%);
        }
    }

    .ToolLogoRow:hover .tools-carousel-track {
        animation-play-state: paused;
    }

    .tool-logo {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.98) 0%, rgba(250, 251, 255, 1) 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid rgba(139, 92, 246, 0.1);
        box-shadow: 0 6px 16px rgba(139, 92, 246, 0.1);
        position: relative;
        cursor: pointer;
        flex-shrink: 0;
    }

    .tool-logo::after {
        content: '';
        position: absolute;
        inset: -2px;
        border-radius: 18px;
        padding: 2px;
        background: linear-gradient(135deg, #7C3AED, #8B5CF6, #4F46E5);
        -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .tool-logo:hover {
        transform: translateY(-8px) scale(1.15) rotate(5deg);
        box-shadow: 0 16px 40px rgba(139, 92, 246, 0.25);
        border-color: rgba(139, 92, 246, 0.2);
    }

    .tool-logo:hover::after {
        opacity: 1;
    }

    .tool-logo i {
        color: #7C3AED;
        transition: all 0.3s ease;
    }

    .tool-logo:hover i {
        color: #8B5CF6;
        transform: scale(1.2);
    }


    /* ========== PROFESSIONAL 3D EFFECTS & ANIMATIONS ========== */

    /* Global 3D Transform Settings */
    .feature-tile,
    .ProjectMiniCard,
    .ModuleAccordion,
    .tab-chip,
    .tool-logo {
        transform-style: preserve-3d;
        backface-visibility: hidden;
    }

    /* Enhanced Card Effect */
    .feature-tile:hover {
        transform: translateY(-12px) scale(1.03) !important;
        box-shadow: 0 24px 64px rgba(139, 92, 246, 0.25),
                    0 12px 32px rgba(139, 92, 246, 0.15),
                    0 0 0 1px rgba(139, 92, 246, 0.2) inset !important;
    }

    .ProjectMiniCard {
        transform-origin: left center;
    }

    .ProjectMiniCard:hover {
        transform: translateY(-8px) translateX(8px) scale(1.02) !important;
        box-shadow: 0 20px 50px rgba(139, 92, 246, 0.3),
                    0 10px 25px rgba(139, 92, 246, 0.15),
                    -8px 0 20px rgba(139, 92, 246, 0.1) !important;
    }

    /* 3D Tab Effects with Bounce */
    .tab-chip {
        transform-origin: center bottom;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1) !important;
    }

    .tab-chip:not(.LockedTabChip):not(.active):hover {
        transform: translateY(-4px) scale(1.08) !important;
        box-shadow: 0 12px 32px rgba(139, 92, 246, 0.25),
                    0 0 0 2px rgba(139, 92, 246, 0.1) inset !important;
    }

    .tab-chip.active {
        transform: translateY(-2px) scale(1.05);
        animation: tabPulse 2s ease-in-out infinite;
    }

    @keyframes tabPulse {
        0%, 100% {
            box-shadow: 0 8px 28px rgba(139, 92, 246, 0.4);
        }
        50% {
            box-shadow: 0 12px 36px rgba(139, 92, 246, 0.6);
        }
    }

    /* 3D Tool Logo Spin Effect */
    .tool-logo {
        transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) !important;
    }

    .tool-logo:hover {
        transform: translateY(-12px) scale(1.2) !important;
        box-shadow: 0 20px 50px rgba(139, 92, 246, 0.35),
                    0 0 30px rgba(139, 92, 246, 0.2) !important;
    }

    /* Scroll-triggered Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    @keyframes fadeInLeft {
        from {
            opacity: 0;
            transform: translateX(-50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes scaleIn {
        from {
            opacity: 0;
            transform: scale(0.8);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    /* Floating Animation for Hero */
    @keyframes float3D {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-15px);
        }
    }

    .hero-banner {
        animation: float3D 6s ease-in-out infinite;
    }

    /* Ripple Effect for Buttons */
    @keyframes ripple {
        0% {
            transform: scale(0);
            opacity: 0.8;
        }
        100% {
            transform: scale(4);
            opacity: 0;
        }
    }

    .ripple-effect {
        position: relative;
        overflow: hidden;
    }

    .ripple-effect::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 20px;
        height: 20px;
        background: rgba(139, 92, 246, 0.5);
        border-radius: 50%;
        transform: translate(-50%, -50%) scale(0);
        pointer-events: none;
    }

    .ripple-effect:active::after {
        animation: ripple 0.6s ease-out;
    }

    /* 3D Accordion Animation */
    .ModuleAccordion {
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1) !important;
        transform-origin: top center;
    }

    .ModuleAccordion:hover {
        transform: translateX(8px) !important;
        box-shadow: 0 16px 40px rgba(139, 92, 246, 0.2) !important;
    }

    .ModuleAccordion.expanded {
        transform: scale(1.02);
    }

    /* Tab Panel 3D Transition */
    .tab-panel {
        animation: tabPanelFadeIn 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    @keyframes tabPanelFadeIn {
        from {
            opacity: 0;
            transform: translateY(30px) scale(0.96);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* Gradient Border Glow Animation */
    @keyframes borderGlow {
        0%, 100% {
            border-color: rgba(139, 92, 246, 0.3);
        }
        50% {
            border-color: rgba(139, 92, 246, 0.6);
        }
    }

    .feature-tile:hover,
    .ProjectMiniCard:hover {
        animation: borderGlow 2s ease-in-out infinite;
    }

    /* Stagger List Item Animations */
    .LessonItem {
        animation: fadeInLeft 0.5s ease-out forwards;
    }

    .LessonItem:nth-child(1) { animation-delay: 0.05s; }
    .LessonItem:nth-child(2) { animation-delay: 0.1s; }
    .LessonItem:nth-child(3) { animation-delay: 0.15s; }
    .LessonItem:nth-child(4) { animation-delay: 0.2s; }
    .LessonItem:nth-child(5) { animation-delay: 0.25s; }
    .LessonItem:nth-child(n+6) { animation-delay: 0.3s; }

    /* Enhanced Module Number with 3D Depth */
    .ModuleAccordion:hover .module-number {
        transform: scale(1.15) translateZ(10px) !important;
        box-shadow: 0 12px 30px rgba(139, 92, 246, 0.5),
                    0 0 40px rgba(139, 92, 246, 0.3) !important;
    }

    /* Glass Morphism with 3D Lift */
    .CourseTabBar {
        backdrop-filter: blur(20px) saturate(180%);
        -webkit-backdrop-filter: blur(20px) saturate(180%);
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1) !important;
    }

    .CourseTabBar:hover {
        transform: translateY(-2px);
        backdrop-filter: blur(25px) saturate(200%);
        -webkit-backdrop-filter: blur(25px) saturate(200%);
    }

    /* 3D Perspective Context */
    .center-content {
        perspective: 2000px;
        perspective-origin: center top;
    }

    /* Feature Grid Stagger Animation */
    .feature-grid .feature-tile:nth-child(1) {
        animation: scaleIn 0.6s ease-out 0.1s both;
    }

    .feature-grid .feature-tile:nth-child(2) {
        animation: scaleIn 0.6s ease-out 0.2s both;
    }

    .feature-grid .feature-tile:nth-child(3) {
        animation: scaleIn 0.6s ease-out 0.3s both;
    }

    .feature-grid .feature-tile:nth-child(4) {
        animation: scaleIn 0.6s ease-out 0.4s both;
    }

    /* Reduced Motion Support */
    @media (prefers-reduced-motion: reduce) {
        *,
        *::before,
        *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }
    }


    /* ========== GRADIENT ICON STYLES ========== */
    .gradient-icon {
        background: linear-gradient(135deg, #7C3AED 0%, #8B5CF6 50%, #4F46E5 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        filter: drop-shadow(0 2px 8px rgba(139, 92, 246, 0.3));
        font-size: 1.75rem;
        margin-right: 0.5rem;
        animation: iconGlow 3s ease-in-out infinite;
    }

    .gradient-icon-small {
        background: linear-gradient(135deg, #7C3AED 0%, #8B5CF6 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-size: 0.875rem;
        margin-left: 0.25rem;
        opacity: 0.8;
    }

    @keyframes iconGlow {
        0%, 100% {
            filter: drop-shadow(0 2px 8px rgba(139, 92, 246, 0.3));
        }
        50% {
            filter: drop-shadow(0 2px 12px rgba(139, 92, 246, 0.6));
        }
    }

    .feature-tile h4 i {
        background: linear-gradient(135deg, #7C3AED 0%, #8B5CF6 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-size: 1.5rem;
        margin-right: 0.5rem;
        filter: drop-shadow(0 2px 4px rgba(139, 92, 246, 0.3));
    }

    .tab-panel h3 i.gradient-icon {
        font-size: 1.5rem;
        margin-right: 0.75rem;
    }

    /* ========== CURRICULUM TAB ========== */
    .ModuleAccordion {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(250, 251, 255, 1) 100%);
        border: 2px solid rgba(139, 92, 246, 0.12);
        border-radius: 20px;
        margin-bottom: 20px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 16px rgba(139, 92, 246, 0.08);
        position: relative;
    }

    .ModuleAccordion::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 5px;
        height: 100%;
        background: linear-gradient(180deg, #7C3AED, #8B5CF6);
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .ModuleAccordion:hover {
        box-shadow: 0 8px 32px rgba(139, 92, 246, 0.15);
        border-color: rgba(139, 92, 246, 0.2);
        transform: translateY(-2px);
    }

    .ModuleAccordion:hover::before {
        opacity: 1;
    }

    .ModuleAccordion.expanded {
        box-shadow: 0 12px 40px rgba(139, 92, 246, 0.2);
    }

    .ModuleAccordion.expanded::before {
        opacity: 1;
    }

    .ModuleAccordion.locked-module {
        background: linear-gradient(135deg, rgba(255, 165, 0, 0.03), rgba(255, 107, 0, 0.03));
        border: 1px solid rgba(255, 165, 0, 0.2);
        position: relative;
    }

    .ModuleAccordion.locked-module::after {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        width: 4px;
        background: linear-gradient(180deg, #FFA500, #FF6B00);
        opacity: 0.6;
    }

    .ModuleAccordion.locked-module:hover {
        box-shadow: 0 4px 12px rgba(255, 165, 0, 0.15);
    }

    .ModuleAccordion.locked-module .module-header {
        pointer-events: none;
    }

    .ModuleAccordion.blurred-locked {
        position: relative;
        background: rgba(248, 250, 252, 0.5);
        border: 1px solid rgba(139, 92, 246, 0.15);
        pointer-events: none;
        user-select: none;
        min-height: 100px;
        overflow: hidden;
    }

    .ModuleAccordion.blurred-locked .module-header {
        filter: blur(4px);
        opacity: 0.3;
    }

    .ModuleAccordion.blurred-locked::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(139, 92, 246, 0.03), rgba(236, 72, 153, 0.03));
        pointer-events: none;
        z-index: 1;
    }

    .locked-overlay {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.92), rgba(248, 250, 252, 0.95));
        backdrop-filter: blur(10px);
        z-index: 2;
        border-radius: 1rem;
        box-shadow: inset 0 0 30px rgba(139, 92, 246, 0.05);
    }

    .locked-message {
        text-align: center;
        padding: 2rem;
        position: relative;
    }

    .locked-message::before {
        content: '';
        position: absolute;
        inset: -20px;
        background: radial-gradient(circle, rgba(139, 92, 246, 0.08) 0%, transparent 70%);
        z-index: -1;
    }

    .lock-icon-large {
        font-size: 52px;
        display: block;
        margin-bottom: 12px;
        opacity: 0.7;
        animation: lockPulse 2.5s ease-in-out infinite;
        filter: drop-shadow(0 4px 8px rgba(139, 92, 246, 0.2));
    }

    @keyframes lockPulse {
        0%, 100% {
            transform: scale(1);
            opacity: 0.7;
        }
        50% {
            transform: scale(1.15);
            opacity: 0.95;
        }
    }

    .module-header {
        padding: 1.75rem 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
    }

    .module-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 2rem;
        right: 2rem;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(139, 92, 246, 0.2), transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .module-header:hover {
        background: rgba(139, 92, 246, 0.03);
    }

    .module-header:hover::after {
        opacity: 1;
    }

    .module-title-wrap {
        display: flex;
        align-items: center;
        gap: 1.25rem;
    }

    .module-number {
        width: 52px;
        height: 52px;
        background: linear-gradient(135deg, #7C3AED 0%, #8B5CF6 100%);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.25rem;
        color: white;
        flex-shrink: 0;
        box-shadow: 0 6px 16px rgba(139, 92, 246, 0.3);
        transition: all 0.3s ease;
    }

    .ModuleAccordion:hover .module-number {
        transform: scale(1.05);
        box-shadow: 0 8px 20px rgba(139, 92, 246, 0.4);
    }

    .chevron {
        font-size: 1.25rem;
        transition: transform 200ms cubic-bezier(0.4, 0, 0.2, 1);
        color: var(--text-secondary);
    }

    .ModuleAccordion.expanded .chevron {
        transform: rotate(180deg);
    }

    .module-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 300ms cubic-bezier(0.4, 0, 0.2, 1);
    }

    .ModuleAccordion.expanded .module-content {
        max-height: 1000px;
    }

    .LessonItem {
        padding: 1.25rem 2rem;
        display: flex;
        align-items: center;
        gap: 1.25rem;
        border-top: 1px solid rgba(139, 92, 246, 0.08);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
        background: transparent;
        position: relative;
    }

    .LessonItem::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 3px;
        height: 100%;
        background: linear-gradient(180deg, #7C3AED, #8B5CF6);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .LessonItem:hover {
        background: rgba(139, 92, 246, 0.04);
        padding-left: 2.5rem;
    }

    .LessonItem:hover::before {
        opacity: 1;
    }

    .lesson-icon {
        font-size: 1.5rem;
        opacity: 0.8;
        transition: all 0.3s ease;
        background: linear-gradient(135deg, #7C3AED, #8B5CF6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .LessonItem:hover .lesson-icon {
        opacity: 1;
        transform: scale(1.1);
    }

    .lesson-details {
        flex: 1;
    }

    .lesson-runtime {
        font-size: 0.8125rem;
        color: var(--text-secondary);
        font-weight: 500;
    }

    .completion-tick {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        border: 2px solid rgba(139, 92, 246, 0.3);
        flex-shrink: 0;
    }

    .completion-tick.completed {
        background: #10B981;
        border-color: #10B981;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 0.75rem;
    }

    .StickyContinueBar {
        position: sticky;
        bottom: 0;
        left: 0;
        right: 0;
        background: var(--indigo);
        padding: 1rem 1.5rem;
        display: flex;
        justify-content: flex-end;
        margin: 0 -2.5rem -2.5rem;
        border-radius: 0 0 1.25rem 1.25rem;
    }

    /* ========== SCHEDULE TAB ========== */
    .BatchTable {
        width: 100%;
        border-collapse: collapse;
        margin: 2rem 0;
        border: 1px solid var(--card-border);
        border-radius: 1rem;
        overflow: hidden;
    }

    .BatchTable th,
    .BatchTable td {
        padding: 1rem 1.25rem;
        text-align: left;
        border-bottom: 1px solid var(--card-border);
    }

    .BatchTable th {
        background: var(--bg-secondary);
        color: var(--text-secondary);
        font-weight: 600;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.025em;
    }

    .BatchTable tbody tr:hover {
        background: var(--bg-secondary);
    }

    .BatchTable tbody tr:last-child td {
        border-bottom: none;
    }

    .seats-badge {
        padding: 0.375rem 0.75rem;
        background: #EF4444;
        border-radius: 9999px;
        color: white;
        font-size: 0.8125rem;
        font-weight: 600;
        display: inline-block;
    }

    .seats-badge.available {
        background: #10B981;
    }

    .countdown-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.875rem 1.5rem;
        background: var(--gradient-main);
        border-radius: 9999px;
        color: white;
        font-weight: 600;
        font-size: 0.9375rem;
        margin: 1rem 0;
        box-shadow: 0 4px 8px rgba(139, 92, 246, 0.3);
    }

    /* ========== INSTRUCTOR TAB ========== */
    .instructor-header {
        display: flex;
        gap: 2rem;
        align-items: center;
        margin: 2rem 0;
        padding: 2.5rem;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(250, 251, 252, 0.98) 100%);
        border-radius: 1.5rem;
        border: 1px solid rgba(139, 92, 246, 0.12);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06), 0 2px 6px rgba(0, 0, 0, 0.04);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .instructor-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #5A4FCF 0%, #7C3AED 50%, #4E9FFF 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .instructor-header:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 32px rgba(139, 92, 246, 0.15), 0 4px 8px rgba(0, 0, 0, 0.08);
        border-color: rgba(139, 92, 246, 0.2);
    }

    .instructor-header:hover::before {
        opacity: 1;
    }

    @media (max-width: 640px) {
        .instructor-header {
            flex-direction: column;
            text-align: center;
            padding: 2rem;
            gap: 1.5rem;
        }
    }

    .instructor-avatar-large {
        width: 140px;
        height: 140px;
        background: linear-gradient(135deg, #5A4FCF 0%, #7C3AED 50%, #4E9FFF 100%);
        border-radius: 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        font-weight: 700;
        color: white;
        flex-shrink: 0;
        box-shadow: 0 8px 20px rgba(139, 92, 246, 0.3), 0 2px 6px rgba(139, 92, 246, 0.2);
        border: 3px solid rgba(255, 255, 255, 0.9);
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .instructor-avatar-large::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transform: rotate(45deg);
        animation: shimmer 3s infinite;
    }

    @keyframes shimmer {
        0% {
            transform: translateX(-100%) translateY(-100%) rotate(45deg);
        }
        100% {
            transform: translateX(100%) translateY(100%) rotate(45deg);
        }
    }

    .instructor-avatar-large:hover {
        transform: scale(1.05) rotate(-2deg);
        box-shadow: 0 12px 28px rgba(139, 92, 246, 0.4), 0 4px 10px rgba(139, 92, 246, 0.25);
    }

    .expertise-tags {
        display: flex;
        gap: 0.625rem;
        flex-wrap: wrap;
        margin: 1.25rem 0 0.5rem 0;
    }

    .expertise-tag {
        padding: 0.5rem 1rem;
        background: linear-gradient(135deg, rgba(139, 92, 246, 0.08), rgba(78, 159, 255, 0.08));
        border: 1.5px solid rgba(139, 92, 246, 0.2);
        border-radius: 9999px;
        font-size: 0.8125rem;
        color: #5A4FCF;
        font-weight: 600;
        transition: all 0.3s ease;
        letter-spacing: 0.01em;
    }

    .expertise-tag:hover {
        background: linear-gradient(135deg, rgba(139, 92, 246, 0.15), rgba(78, 159, 255, 0.15));
        border-color: rgba(139, 92, 246, 0.35);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(139, 92, 246, 0.2);
    }

    .social-icons {
        display: flex;
        gap: 0.75rem;
        margin: 1.5rem 0;
    }

    .social-icon {
        width: 44px;
        height: 44px;
        background: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 200ms cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
        font-size: 1.125rem;
    }

    .social-icon:hover {
        border-color: var(--indigo);
        color: var(--indigo);
        transform: translateY(-2px);
    }

    /* ========== REVIEWS TAB ========== */
    .RatingSummary {
        display: flex;
        gap: 2rem;
        align-items: center;
        margin: 2rem 0;
        padding: 1.75rem;
        background: var(--bg-secondary);
        border-radius: 1rem;
        border: 1px solid var(--card-border);
    }

    @media (max-width: 640px) {
        .RatingSummary {
            flex-direction: column;
        }
    }

    .rating-score {
        text-align: center;
        flex-shrink: 0;
    }

    .score-number {
        font-size: clamp(3rem, 8vw, 4.5rem);
        font-weight: 800;
        line-height: 1;
        color: var(--text-primary);
    }

    .stars {
        font-size: clamp(1.5rem, 4vw, 2rem);
        color: #F59E0B;
    }

    .filter-chips {
        display: flex;
        gap: 0.5rem;
        margin: 1.5rem 0;
        flex-wrap: wrap;
    }

    .filter-chip {
        padding: 0.5rem 1rem;
        background: var(--bg-secondary);
        border: 1px solid transparent;
        border-radius: 9999px;
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--text-secondary);
        cursor: pointer;
        transition: all 200ms cubic-bezier(0.4, 0, 0.2, 1);
    }

    .filter-chip:hover {
        background: rgba(139, 92, 246, 0.1);
    }

    .filter-chip.active {
        background: var(--indigo);
        color: white;
    }

    .ReviewCard {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(250, 251, 255, 1) 100%);
        border: 2px solid rgba(139, 92, 246, 0.1);
        border-radius: 20px;
        padding: 1.75rem 2rem;
        margin-bottom: 1.5rem;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 16px rgba(139, 92, 246, 0.08);
        position: relative;
        overflow: hidden;
    }

    .ReviewCard::before {
        content: '❝';
        position: absolute;
        top: 1rem;
        right: 1.5rem;
        font-size: 4rem;
        color: rgba(139, 92, 246, 0.06);
        font-family: Georgia, serif;
        line-height: 1;
    }

    .ReviewCard:hover {
        box-shadow: 0 12px 36px rgba(139, 92, 246, 0.15);
        transform: translateY(-4px);
        border-color: rgba(139, 92, 246, 0.2);
    }

    .review-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0.75rem;
    }

    .reviewer-name {
        font-weight: 600;
        font-size: 1rem;
        color: var(--text-primary);
    }

    .reviewer-avatar {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: linear-gradient(135deg, #7C3AED 0%, #8B5CF6 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1rem;
        color: white;
        flex-shrink: 0;
        box-shadow: 0 6px 16px rgba(139, 92, 246, 0.3);
        transition: all 0.4s ease;
        border: 3px solid rgba(255, 255, 255, 0.9);
        position: relative;
        z-index: 1;
    }

    .ReviewCard:hover .reviewer-avatar {
        transform: scale(1.1) rotate(5deg);
        box-shadow: 0 8px 24px rgba(139, 92, 246, 0.4);
    }

    .verified-badge {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        padding: 2px 8px;
        background: linear-gradient(135deg, #10B981 0%, #059669 100%);
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 600;
        color: white;
        margin-left: 6px;
    }

    .verified-badge i {
        font-size: 0.7rem;
    }

    .review-content {
        color: var(--text-primary);
        font-weight: 500;
        line-height: 1.7;
        margin: 0.75rem 0;
    }

    .review-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 0.75rem;
        margin-top: 0.75rem;
        border-top: 1px solid var(--card-border);
    }

    .review-date {
        color: var(--text-secondary);
        font-weight: 600;
        font-size: 0.875rem;
    }

    .review-helpful {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .helpful-btn {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        padding: 4px 10px;
        background: var(--bg-secondary);
        border: 1px solid var(--card-border);
        border-radius: 6px;
        font-size: 0.8rem;
        color: var(--text-secondary);
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .helpful-btn:hover {
        background: rgba(139, 92, 246, 0.1);
        border-color: var(--indigo);
        color: var(--indigo);
    }

    .helpful-btn i {
        font-size: 0.75rem;
    }

    .helpful-count {
        font-weight: 600;
        color: var(--text-primary);
    }

    .view-more-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 32px;
        background: var(--indigo);
        color: white;
        font-size: 1rem;
        font-weight: 600;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(139, 92, 246, 0.2);
    }

    .view-more-btn:hover {
        background: #4a3fc7;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(139, 92, 246, 0.3);
    }

    .view-more-btn i {
        transition: transform 0.3s ease;
    }

    .view-more-btn.showing-all i {
        transform: rotate(180deg);
    }

    /* ========== FAQ TAB ========== */
    .FaqAccordion {
        background: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 1rem;
        margin-bottom: 1rem;
        overflow: hidden;
        transition: all 200ms cubic-bezier(0.4, 0, 0.2, 1);
    }

    .FaqAccordion:hover {
        box-shadow: 0 2px 4px rgba(139, 92, 246, 0.08);
    }

    .faq-question {
        padding: 1rem 1.25rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        transition: all 200ms cubic-bezier(0.4, 0, 0.2, 1);
    }

    .faq-question:hover {
        background: var(--bg-secondary);
    }

    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 300ms cubic-bezier(0.4, 0, 0.2, 1);
    }

    .FaqAccordion.expanded .faq-answer {
        max-height: 500px;
    }

    .faq-answer-content {
        padding: 0 1.25rem 1.25rem;
        color: var(--text-secondary);
        line-height: 1.7;
    }

    /* ========== ANIMATIONS ========== */
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ========== FOMO COMPONENTS (Footer Color Palette) ========== */


    /* Scarcity Badges */
    .scarcity-badges {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        margin-top: 20px;
        justify-content: center;
    }

    .scarcity-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 12px 24px;
        background: linear-gradient(135deg, rgba(139, 92, 246, 0.12), rgba(236, 72, 153, 0.12));
        border: 2px solid rgba(139, 92, 246, 0.3);
        border-radius: 30px;
        font-weight: 700;
        font-size: 15px;
        color: #7C3AED;
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 16px rgba(139, 92, 246, 0.15);
        transition: all 0.3s ease;
    }

    .scarcity-badge:hover {
        background: linear-gradient(135deg, rgba(139, 92, 246, 0.2), rgba(236, 72, 153, 0.2));
        border-color: rgba(139, 92, 246, 0.5);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(139, 92, 246, 0.25);
    }

    .scarcity-icon {
        font-size: 20px;
    }

    /* Futuristic Course Container */
    .futuristic-course-container {
        max-width: 900px;
        margin: 20px auto 16px;
        padding: 0 32px;
        background: transparent !important;
    }

    /* FOMO Stats Grid */
    .fomo-stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        gap: 8px;
        margin-bottom: 16px;
    }

    .fomo-stat-card {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(248, 250, 252, 0.98));
        backdrop-filter: blur(20px);
        border: 2px solid rgba(139, 92, 246, 0.2);
        border-radius: 12px;
        padding: 10px;
        text-align: center;
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 8px 32px rgba(139, 92, 246, 0.12);
    }

    .fomo-stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(139, 92, 246, 0.05), rgba(236, 72, 153, 0.03));
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .fomo-stat-card:hover {
        transform: translateY(-8px) scale(1.02);
        border-color: #8B5CF6;
        box-shadow: 0 16px 48px rgba(139, 92, 246, 0.25);
    }

    .fomo-stat-card:hover::before {
        opacity: 1;
    }

    .stat-icon-cyber {
        font-size: 24px;
        margin-bottom: 6px;
        animation: iconPulseFomo 2.5s ease-in-out infinite;
        position: relative;
        z-index: 1;
    }

    @keyframes iconPulseFomo {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.15); }
    }

    .stat-value-cyber {
        font-family: var(--font-sans);
        font-size: 18px;
        font-weight: 800;
        background: linear-gradient(135deg, #8B5CF6, #EC4899);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 4px;
        position: relative;
        z-index: 1;
    }

    .stat-label-cyber {
        font-size: 9px;
        color: #475569;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
        position: relative;
        z-index: 1;
    }

    /* Base stat urgency badge styling */
    .stat-urgency {
        display: inline-block;
        color: white;
        padding: 3px 10px;
        border-radius: 16px;
        font-size: 9px;
        font-weight: 700;
        margin-top: 4px;
        position: relative;
        z-index: 1;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }

    /* Live badge - Green (real-time activity) */
    .stat-urgency.stat-live {
        background: linear-gradient(135deg, #10B981 0%, #059669 100%);
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
        animation: liveGlow 2s ease-in-out infinite;
    }

    /* Trending badge - Blue (growth/popularity) */
    .stat-urgency.stat-trending {
        background: linear-gradient(135deg, #3B82F6 0%, #2563EB 100%);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
    }

    /* Hot badge - Orange/Red (urgency) */
    .stat-urgency.stat-hot {
        background: linear-gradient(135deg, #F97316 0%, #EF4444 100%);
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
        animation: hotPulse 1.5s ease-in-out infinite;
    }

    /* Verified badge - Purple (trust/verification) */
    .stat-urgency.stat-verified {
        background: linear-gradient(135deg, #8B5CF6 0%, #7C3AED 100%);
        box-shadow: 0 4px 12px rgba(139, 92, 246, 0.4);
    }

    /* Hover effects */
    .stat-urgency:hover {
        transform: translateY(-2px) scale(1.05);
        filter: brightness(1.1);
    }

    /* Live glow animation */
    @keyframes liveGlow {
        0%, 100% {
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
        }
        50% {
            box-shadow: 0 4px 20px rgba(16, 185, 129, 0.7);
        }
    }

    /* Hot pulse animation */
    @keyframes hotPulse {
        0%, 100% {
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
            transform: scale(1);
        }
        50% {
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.6);
            transform: scale(1.03);
        }
    }

    /* Live Activity Feed */
    .live-activity-feed {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.06) 0%, rgba(34, 197, 94, 0.08) 100%);
        border: 1px solid rgba(16, 185, 129, 0.2);
        border-radius: 20px;
        padding: 1.75rem;
        backdrop-filter: blur(20px);
        position: relative;
        overflow: hidden;
        margin-bottom: 24px;
        max-height: 440px;
        overflow-y: auto;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 20px rgba(16, 185, 129, 0.08), 0 0 0 1px rgba(255, 255, 255, 0.1);
    }

    .live-activity-feed::after {
        content: '';
        position: absolute;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(16, 185, 129, 0.12) 0%, transparent 70%);
        top: -150px;
        left: -150px;
        animation: floatOrb 10s ease-in-out infinite;
        pointer-events: none;
    }

    .live-activity-feed:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 40px rgba(16, 185, 129, 0.15), 0 0 0 1px rgba(16, 185, 129, 0.3);
        border-color: rgba(16, 185, 129, 0.3);
    }

    .feed-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
        padding-bottom: 16px;
        border-bottom: 2px solid rgba(139, 92, 246, 0.1);
    }

    .live-pulse {
        width: 12px;
        height: 12px;
        background: linear-gradient(135deg, #8B5CF6, #EC4899);
        border-radius: 50%;
        box-shadow: 0 0 0 0 rgba(139, 92, 246, 0.7);
    }

    .feed-title {
        font-family: var(--font-sans);
        font-size: 18px;
        font-weight: 700;
        background: linear-gradient(135deg, #10b981 0%, #22c55e 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-transform: uppercase;
        letter-spacing: 1px;
        filter: drop-shadow(0 2px 3px rgba(16, 185, 129, 0.4)) drop-shadow(0 0 10px rgba(34, 197, 94, 0.2));
        position: relative;
    }

    .activity-item {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 14px;
        margin-bottom: 10px;
        background: rgba(139, 92, 246, 0.04);
        border-left: 3px solid #8B5CF6;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .activity-item:hover {
        background: rgba(139, 92, 246, 0.08);
        transform: translateX(4px);
    }

    .activity-avatar {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: linear-gradient(135deg, #8B5CF6, #EC4899);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 16px;
        color: white;
        box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3);
        flex-shrink: 0;
    }

    .activity-text {
        flex: 1;
        font-size: 14px;
        color: #475569;
        font-weight: 500;
    }

    .activity-name {
        background: linear-gradient(135deg, #8B5CF6, #EC4899);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-weight: 700;
        filter: drop-shadow(0 1px 2px rgba(139, 92, 246, 0.3));
        text-transform: capitalize;
    }

    .activity-time {
        font-size: 12px;
        color: #94a3b8;
        font-weight: 500;
        flex-shrink: 0;
    }

    /* Holographic Particles */
    .holographic-particles {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 1;
        overflow: hidden;
    }

    .particle {
        position: absolute;
        width: 4px;
        height: 4px;
        background: radial-gradient(circle, #8B5CF6, transparent);
        border-radius: 50%;
        opacity: 0;
        box-shadow: 0 0 12px #8B5CF6;
    }

    .particle:nth-child(2n) {
        background: radial-gradient(circle, #EC4899, transparent);
        box-shadow: 0 0 12px #EC4899;
    }

    .particle:nth-child(3n) {
        background: radial-gradient(circle, #00d4ff, transparent);
        box-shadow: 0 0 12px #00d4ff;
    }

    /* ========== 3D FUTURISTIC BACKGROUND (FUTURE + FOMO) ========== */
    .future-3d-background {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 0;
        overflow: hidden;
        perspective: 1000px;
        transform-style: preserve-3d;
    }

    /* 3D Rotating Grid with Perspective */
    .grid-3d-container {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 200%;
        height: 200%;
        transform: translate(-50%, -50%);
        animation: rotateGrid 60s linear infinite;
    }

    @keyframes rotateGrid {
        0% { transform: translate(-50%, -50%) rotateZ(0deg); }
        100% { transform: translate(-50%, -50%) rotateZ(360deg); }
    }

    .grid-line {
        position: absolute;
        background: linear-gradient(90deg,
            transparent 0%,
            rgba(139, 92, 246, 0.12) 20%,
            rgba(236, 72, 153, 0.15) 50%,
            rgba(0, 212, 255, 0.12) 80%,
            transparent 100%
        );
        height: 2px;
        box-shadow: 0 0 10px rgba(139, 92, 246, 0.2);
        animation: gridPulse 3s ease-in-out infinite;
    }

    @keyframes gridPulse {
        0%, 100% { opacity: 0.08; }
        50% { opacity: 0.25; }
    }

    /* 3D Floating Geometric Shapes */
    .geo-shape {
        position: absolute;
        width: 100px;
        height: 100px;
        transform-style: preserve-3d;
        animation: floatShape 20s ease-in-out infinite;
    }

    .geo-cube {
        position: relative;
        width: 100%;
        height: 100%;
        transform-style: preserve-3d;
        animation: rotateCube 25s linear infinite;
    }

    .geo-cube-face {
        position: absolute;
        width: 100px;
        height: 100px;
        border: 2px solid;
        background: rgba(139, 92, 246, 0.02);
        backdrop-filter: blur(5px);
        opacity: 0.3;
    }

    .geo-cube-face.front  {
        transform: translateZ(50px);
        border-color: rgba(139, 92, 246, 0.25);
        box-shadow: 0 0 20px rgba(139, 92, 246, 0.15);
    }
    .geo-cube-face.back   {
        border-color: rgba(236, 72, 153, 0.25);
        box-shadow: 0 0 20px rgba(236, 72, 153, 0.15);
    }
    .geo-cube-face.right  {
        border-color: rgba(0, 212, 255, 0.25);
        box-shadow: 0 0 20px rgba(0, 212, 255, 0.15);
    }
    .geo-cube-face.left   {
        border-color: rgba(34, 197, 94, 0.25);
        box-shadow: 0 0 20px rgba(34, 197, 94, 0.15);
    }
    .geo-cube-face.top    {
        border-color: rgba(249, 115, 22, 0.25);
        box-shadow: 0 0 20px rgba(249, 115, 22, 0.15);
    }
    .geo-cube-face.bottom {
        border-color: rgba(6, 182, 212, 0.25);
        box-shadow: 0 0 20px rgba(6, 182, 212, 0.15);
    }

    @keyframes rotateCube {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    @keyframes floatShape {
        0%, 100% {
            transform: translateY(0px) translateZ(0px) scale(1);
            opacity: 0.15;
        }
        25% {
            transform: translateY(-100px) translateZ(200px) scale(1.2);
            opacity: 0.3;
        }
        50% {
            transform: translateY(-50px) translateZ(-100px) scale(0.9);
            opacity: 0.2;
        }
        75% {
            transform: translateY(80px) translateZ(150px) scale(1.1);
            opacity: 0.25;
        }
    }

    /* Pulsing Energy Rings (FOMO Effect) */
    .energy-ring {
        position: absolute;
        border: 3px solid;
        border-radius: 50%;
        animation: expandRing 4s ease-out infinite;
    }

    @keyframes expandRing {
        0% {
            width: 20px;
            height: 20px;
            opacity: 0.4;
            transform: translateZ(0px);
        }
        100% {
            width: 400px;
            height: 400px;
            opacity: 0;
            transform: translateZ(200px);
        }
    }

    .energy-ring:nth-child(1) {
        border-color: rgba(139, 92, 246, 0.3);
        animation-delay: 0s;
    }

    .energy-ring:nth-child(2) {
        border-color: rgba(236, 72, 153, 0.3);
        animation-delay: 1s;
    }

    .energy-ring:nth-child(3) {
        border-color: rgba(0, 212, 255, 0.3);
        animation-delay: 2s;
    }

    .energy-ring:nth-child(4) {
        border-color: rgba(34, 197, 94, 0.3);
        animation-delay: 3s;
    }

    /* Flowing Data Streams (Future Tech Effect) */
    .data-stream {
        position: absolute;
        width: 2px;
        height: 100px;
        background: linear-gradient(180deg,
            transparent 0%,
            rgba(0, 212, 255, 0.3) 50%,
            transparent 100%
        );
        box-shadow: 0 0 10px rgba(0, 212, 255, 0.3);
        animation: streamFlow 3s linear infinite;
    }

    @keyframes streamFlow {
        0% {
            transform: translateY(-100vh) translateZ(0px);
            opacity: 0;
        }
        10% {
            opacity: 0.4;
        }
        90% {
            opacity: 0.4;
        }
        100% {
            transform: translateY(100vh) translateZ(300px);
            opacity: 0;
        }
    }

    /* Holographic Scanlines (Future Effect) */
    .scanline {
        position: absolute;
        width: 100%;
        height: 3px;
        background: linear-gradient(90deg,
            transparent 0%,
            rgba(0, 212, 255, 0.2) 50%,
            transparent 100%
        );
        box-shadow: 0 0 20px rgba(0, 212, 255, 0.3);
        animation: scanlineMove 8s linear infinite;
    }

    @keyframes scanlineMove {
        0% { top: -10px; opacity: 0; }
        5% { opacity: 0.4; }
        95% { opacity: 0.4; }
        100% { top: 100%; opacity: 0; }
    }

    /* Urgency Pulse Indicators (FOMO) */
    .urgency-pulse {
        position: absolute;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(236, 72, 153, 0.3) 0%, transparent 70%);
        animation: urgencyBeat 2s ease-in-out infinite;
    }

    @keyframes urgencyBeat {
        0%, 100% {
            transform: scale(1) translateZ(0px);
            opacity: 0.3;
            box-shadow: 0 0 20px rgba(236, 72, 153, 0.2);
        }
        50% {
            transform: scale(1.5) translateZ(100px);
            opacity: 0.4;
            box-shadow: 0 0 40px rgba(236, 72, 153, 0.3);
        }
    }

    /* Depth Layers */
    .depth-layer-far {
        transform: translateZ(-200px) scale(0.8);
        opacity: 0.15;
    }

    .depth-layer-mid {
        transform: translateZ(0px) scale(1);
        opacity: 0.3;
    }

    .depth-layer-near {
        transform: translateZ(200px) scale(1.2);
        opacity: 0.4;
    }

    /* Reduce motion for accessibility */
    @media (prefers-reduced-motion: reduce) {
        .future-3d-background,
        .grid-3d-container,
        .geo-cube,
        .energy-ring,
        .data-stream,
        .scanline,
        .urgency-pulse {
            animation: none !important;
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .fomo-stats-grid {
            grid-template-columns: 1fr;
        }

        .scarcity-badges {
            justify-content: center;
        }
    }

    /* ========== HOVER EFFECTS FOR NEW TABS ========== */
    .tool-card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        border-color: rgba(102, 126, 234, 0.5);
    }

    .mentor-card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(240, 147, 251, 0.35);
    }

    .project-card-hover:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 12px 35px rgba(52, 211, 153, 0.3);
    }

    /* Professional Company Motto Banner */
    .company-motto-banner {
        width: 100%;
        max-width: 1460px;
        margin: 0 auto 2rem;
        padding: 0 40px;
        box-sizing: border-box;
    }

    .motto-banner-inner {
        background: linear-gradient(135deg, rgba(90, 79, 207, 0.08) 0%, rgba(139, 92, 246, 0.05) 100%);
        border: 1px solid rgba(139, 92, 246, 0.15);
        border-radius: 16px;
        padding: 1.5rem 2rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 2rem;
        flex-wrap: wrap;
        position: relative;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(139, 92, 246, 0.06);
    }

    .motto-banner-inner::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 0% 50%, rgba(90, 79, 207, 0.06) 0%, transparent 50%);
        pointer-events: none;
    }

    .company-motto-text {
        font-family: var(--font-display);
        font-size: 1.125rem;
        font-weight: 700;
        color: var(--indigo);
        letter-spacing: 0.5px;
        position: relative;
        z-index: 1;
        flex-shrink: 0;
    }

    .motto-icons {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        flex-wrap: wrap;
        position: relative;
        z-index: 1;
    }

    .motto-icon-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.8125rem;
        color: var(--text-secondary);
        font-weight: 600;
        padding: 0.375rem 0.75rem;
        background: var(--bg-primary);
        border-radius: 8px;
        transition: all 0.2s ease;
        border: 1px solid rgba(139, 92, 246, 0.1);
    }

    .motto-icon-item:hover {
        color: var(--indigo);
        background: rgba(139, 92, 246, 0.05);
        border-color: rgba(139, 92, 246, 0.2);
        transform: translateY(-1px);
    }

    .motto-icon-item span:first-child {
        font-size: 1rem;
    }

    @media (max-width: 1024px) {
        .company-motto-text {
            font-size: 1rem;
            width: 100%;
            text-align: center;
        }

        .motto-icons {
            width: 100%;
            justify-content: center;
        }

        .motto-banner-inner {
            justify-content: center;
            padding: 1.25rem 1.5rem;
        }
    }

    @media (max-width: 768px) {
        .company-motto-banner {
            padding: 0 20px;
            margin-bottom: 1.5rem;
        }

        .motto-banner-inner {
            padding: 1rem;
            gap: 1rem;
        }

        .company-motto-text {
            font-size: 0.9375rem;
        }

        .motto-icons {
            gap: 0.75rem;
        }

        .motto-icon-item {
            font-size: 0.75rem;
            padding: 0.25rem 0.625rem;
        }

        .motto-icon-item span:first-child {
            font-size: 0.875rem;
        }
    }

    </style>
</head>
<body>

<!-- Gradient Mesh Background -->
<div class="gradient-mesh-bg animated"></div>

<!-- Dark Mode Toggle -->
<button id="theme-toggle-2025" class="glass-card" style="position: fixed; top: 100px; right: 20px; z-index: 10000; width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; padding: 0; cursor: pointer; border: none; transition: all var(--transition-base);" aria-label="Toggle dark mode">
    <i class="fas fa-moon" style="font-size: 20px; color: var(--color-text-primary);"></i>
</button>

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

<!-- Optimized AI News Ticker -->

<div class="ai-news-ticker-optimized">
    <div class="ticker-container">
        <div class="ticker-badge">
            <span class="live-dot"></span>
            <span>AI News</span>
        </div>
        <div class="ticker-content">
            <div class="ticker-scroll" id="aiNewsScroll">
                <div class="news-item"><span class="news-badge">TechCrunch</span><a href="#" target="_blank" rel="noopener">OpenAI Launches GPT-5 with Revolutionary Multi-Modal Capabilities</a><span class="news-date">Oct 18, 2025</span></div><div class="news-item"><span class="news-badge">MIT Technology Review</span><a href="#" target="_blank" rel="noopener">Google DeepMind Achieves Breakthrough in Quantum AI Computing</a><span class="news-date">Oct 18, 2025</span></div><div class="news-item"><span class="news-badge">The Verge</span><a href="#" target="_blank" rel="noopener">Meta Announces Open-Source AI Model That Rivals GPT-4</a><span class="news-date">Oct 17, 2025</span></div><div class="news-item"><span class="news-badge">Nature</span><a href="#" target="_blank" rel="noopener">AI-Powered Healthcare Diagnostics Show 95% Accuracy in Clinical Trials</a><span class="news-date">Oct 17, 2025</span></div><div class="news-item"><span class="news-badge">CNBC</span><a href="#" target="_blank" rel="noopener">Microsoft Integrates Advanced AI Copilot Across All Products</a><span class="news-date">Oct 16, 2025</span></div><div class="news-item"><span class="news-badge">Wired</span><a href="#" target="_blank" rel="noopener">Anthropic&#039;s Claude 4 Sets New Benchmark in AI Safety and Alignment</a><span class="news-date">Oct 16, 2025</span></div><div class="news-item"><span class="news-badge">Bloomberg</span><a href="#" target="_blank" rel="noopener">AI Chip Market Reaches $100B as NVIDIA Unveils Next-Gen Architecture</a><span class="news-date">Oct 15, 2025</span></div><div class="news-item"><span class="news-badge">Stanford Research</span><a href="#" target="_blank" rel="noopener">Breakthrough in AI Energy Efficiency Could Reduce Costs by 90%</a><span class="news-date">Oct 15, 2025</span></div><div class="news-item"><span class="news-badge">Reuters</span><a href="#" target="_blank" rel="noopener">EU Passes Comprehensive AI Regulation Framework</a><span class="news-date">Oct 14, 2025</span></div><div class="news-item"><span class="news-badge">McKinsey</span><a href="#" target="_blank" rel="noopener">AI Agents Now Handle 60% of Customer Service Interactions</a><span class="news-date">Oct 14, 2025</span></div>                <div class="news-item"><span class="news-badge">TechCrunch</span><a href="#" target="_blank" rel="noopener">OpenAI Launches GPT-5 with Revolutionary Multi-Modal Capabilities</a><span class="news-date">Oct 18, 2025</span></div><div class="news-item"><span class="news-badge">MIT Technology Review</span><a href="#" target="_blank" rel="noopener">Google DeepMind Achieves Breakthrough in Quantum AI Computing</a><span class="news-date">Oct 18, 2025</span></div><div class="news-item"><span class="news-badge">The Verge</span><a href="#" target="_blank" rel="noopener">Meta Announces Open-Source AI Model That Rivals GPT-4</a><span class="news-date">Oct 17, 2025</span></div><div class="news-item"><span class="news-badge">Nature</span><a href="#" target="_blank" rel="noopener">AI-Powered Healthcare Diagnostics Show 95% Accuracy in Clinical Trials</a><span class="news-date">Oct 17, 2025</span></div><div class="news-item"><span class="news-badge">CNBC</span><a href="#" target="_blank" rel="noopener">Microsoft Integrates Advanced AI Copilot Across All Products</a><span class="news-date">Oct 16, 2025</span></div><div class="news-item"><span class="news-badge">Wired</span><a href="#" target="_blank" rel="noopener">Anthropic&#039;s Claude 4 Sets New Benchmark in AI Safety and Alignment</a><span class="news-date">Oct 16, 2025</span></div><div class="news-item"><span class="news-badge">Bloomberg</span><a href="#" target="_blank" rel="noopener">AI Chip Market Reaches $100B as NVIDIA Unveils Next-Gen Architecture</a><span class="news-date">Oct 15, 2025</span></div><div class="news-item"><span class="news-badge">Stanford Research</span><a href="#" target="_blank" rel="noopener">Breakthrough in AI Energy Efficiency Could Reduce Costs by 90%</a><span class="news-date">Oct 15, 2025</span></div><div class="news-item"><span class="news-badge">Reuters</span><a href="#" target="_blank" rel="noopener">EU Passes Comprehensive AI Regulation Framework</a><span class="news-date">Oct 14, 2025</span></div><div class="news-item"><span class="news-badge">McKinsey</span><a href="#" target="_blank" rel="noopener">AI Agents Now Handle 60% of Customer Service Interactions</a><span class="news-date">Oct 14, 2025</span></div>            </div>
        </div>
    </div>
</div>

<style>
.ai-news-ticker-optimized {
    width: 100%;
    margin: 100px auto 0;
    padding: 0;
}

.ticker-container {
    display: flex;
    align-items: center;
    gap: 12px;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.98), rgba(248, 250, 252, 0.95));
    border-top: 1px solid rgba(139, 92, 246, 0.12);
    border-bottom: 1px solid rgba(139, 92, 246, 0.12);
    border-radius: 0;
    padding: 8px 20px;
    box-shadow: 0 1px 4px rgba(139, 92, 246, 0.06);
    overflow: hidden;
    backdrop-filter: blur(10px);
}

.ticker-badge {
    display: flex;
    align-items: center;
    gap: 5px;
    padding: 5px 10px;
    background: linear-gradient(135deg, #7C3AED, #8B5CF6);
    border-radius: 6px;
    flex-shrink: 0;
    font-size: 10px;
    font-weight: 700;
    color: #fff;
    letter-spacing: 0.3px;
    text-transform: uppercase;
    position: relative;
    z-index: 10;
}

.live-dot {
    width: 6px;
    height: 6px;
    background: #ef4444;
    border-radius: 50%;
    animation: pulse 2s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; box-shadow: 0 0 8px #ef4444; }
    50% { opacity: 0.5; box-shadow: 0 0 4px #ef4444; }
}

.ticker-content {
    flex: 1;
    overflow: hidden;
    position: relative;
    mask-image: linear-gradient(to right, transparent 0%, black 2%, black 100%);
    -webkit-mask-image: linear-gradient(to right, transparent 0%, black 2%, black 100%);
}

.ticker-scroll {
    display: flex;
    gap: 0;
    padding: 0 20px;
    animation: scroll-news 80s linear infinite;
    will-change: transform;
}

.ticker-scroll:hover {
    animation-play-state: paused;
}

@keyframes scroll-news {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}

.news-item {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 0 20px;
    white-space: nowrap;
    border-right: 1px solid rgba(0, 0, 0, 0.08);
}

.news-item:last-child {
    border-right: none;
}

.news-badge {
    background: rgba(139, 92, 246, 0.1);
    color: #7C3AED;
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    padding: 3px 8px;
    border-radius: 4px;
    flex-shrink: 0;
}

.news-item a {
    color: #1e293b;
    text-decoration: none;
    font-size: 13px;
    font-weight: 500;
    transition: color 0.2s ease;
}

.news-item a:hover {
    color: #7C3AED;
}

.news-date {
    color: #94a3b8;
    font-size: 11px;
    flex-shrink: 0;
    padding-left: 6px;
}

@media (max-width: 768px) {
    .ai-news-ticker-optimized {
        padding: 0;
        margin-bottom: 20px;
    }

    .ticker-container {
        padding: 8px 15px;
        gap: 10px;
    }

    .ticker-badge {
        padding: 5px 10px;
        font-size: 10px;
    }

    .news-item {
        padding: 0 15px;
        gap: 10px;
    }

    .news-item a {
        font-size: 12px;
    }

    .news-date {
        display: none;
    }
}

@media (max-width: 480px) {
    .ticker-badge {
        padding: 4px 8px;
        font-size: 9px;
    }

    .ticker-badge span:not(.live-dot) {
        display: none;
    }

    .live-dot {
        margin: 0;
    }

    .news-item {
        padding: 0 12px;
    }

    .news-badge {
        font-size: 8px;
        padding: 2px 6px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tickerScroll = document.getElementById('aiNewsScroll');
    if (tickerScroll) {
        tickerScroll.addEventListener('mouseenter', function() {
            this.style.animationPlayState = 'paused';
        });
        tickerScroll.addEventListener('mouseleave', function() {
            this.style.animationPlayState = 'running';
        });
    }
});
</script>

<style>
/* ========== ELEGANT HERO BANNER WITH INTEGRATED MOTTO ========== */
.course-hero {
    width: 100%;
    max-width: 1600px;
    margin: 0 auto 20px !important;
    padding: 0 32px;
}

.hero-banner-elegant {
    position: relative;
    width: 100%;
    min-height: 420px !important;
    max-height: none !important;
    background:
        linear-gradient(135deg, rgba(124, 58, 237, 0.4) 0%, rgba(0, 0, 0, 0.3) 50%, rgba(99, 102, 241, 0.4) 100%),
        url('https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/f736f8eb-1b14-49dd-2c83-17abd2136100/public') center/cover no-repeat;
    border-radius: 32px;
    overflow: visible;
    box-shadow:
        0 24px 80px rgba(124, 58, 237, 0.3),
        0 0 0 1px rgba(255, 255, 255, 0.1) inset;
}

/* Animation removed - using static background image */
</style>

<style>
/* Professional courses - special background */
.hero-banner-elegant {
    background:
        linear-gradient(135deg, rgba(124, 58, 237, 0.4) 0%, rgba(0, 0, 0, 0.3) 50%, rgba(99, 102, 241, 0.4) 100%),
        url('https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/aeeb929c-940e-4f44-7ebd-e6b16c585c00/public') center/cover no-repeat !important;
}
</style>
<style>
.hero-banner-elegant::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(circle at 20% 30%, rgba(255, 255, 255, 0.15) 0%, transparent 50%),
        radial-gradient(circle at 80% 70%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 50% 50%, rgba(236, 72, 153, 0.1) 0%, transparent 60%);
    z-index: 1;
    pointer-events: none;
}

.hero-banner-elegant::after {
    content: '';
    position: absolute;
    inset: 0;
    background: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Cpath d='M0 0h40v40H0V0zm40 40h40v40H40V40z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    opacity: 0.4;
    z-index: 1;
    pointer-events: none;
}

.hero-motto-strip {
    position: relative;
    z-index: 3;
    padding: 20px 40px 0;
    animation: fadeInDown 0.8s ease-out both;
}

@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.motto-icons-elegant {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 16px;
    flex-wrap: wrap;
}

.motto-item-elegant {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 18px;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.25);
    color: white;
    font-weight: 600;
    font-size: 0.9375rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    text-decoration: none;
    cursor: pointer;
}

.motto-item-elegant:hover {
    background: rgba(255, 255, 255, 0.25);
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    color: white;
}

.motto-item-elegant i {
    font-size: 1.125rem;
    filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
}

.motto-divider {
    color: rgba(255, 255, 255, 0.5);
    font-size: 1.25rem;
    font-weight: 300;
}

.hero-title-elegant {
    text-align: center;
    position: relative;
    z-index: 2;
    color: white;
    max-width: 900px;
    margin: 0 auto;
    padding: 20px 20px 24px;
    animation: fadeInUp 0.8s ease-out 0.3s both;
}

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

.hero-title-elegant h1 {
    font-family: var(--font-sans);
    font-size: clamp(2.5rem, 5.5vw, 4rem);
    font-weight: 900;
    letter-spacing: -1px;
    margin-bottom: 24px;
    text-shadow:
        0 4px 20px rgba(0, 0, 0, 0.3),
        0 2px 8px rgba(0, 0, 0, 0.2);
    line-height: 1.1;
}

.hero-subtitle-elegant {
    color: rgba(255, 255, 255, 0.97);
    font-size: 1.25rem;
    font-weight: 400;
    max-width: 750px;
    margin: 0 auto 16px;
    text-shadow: 0 2px 12px rgba(0, 0, 0, 0.2);
    line-height: 1.7;
}

.hero-tagline-elegant {
    color: rgba(255, 255, 255, 0.92);
    font-size: 1.0625rem;
    font-weight: 500;
    font-style: italic;
    margin-bottom: 24px;
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
}

.scarcity-badges-hero {
    position: absolute;
    right: 40px;
    top: 50%;
    transform: translateY(-50%);
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 16px;
    z-index: 3;
}

.scarcity-badge-hero {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 12px 24px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(12px);
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 30px;
    font-weight: 700;
    font-size: 0.9375rem;
    color: white;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
}

.scarcity-badge-hero:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
}

.scarcity-badge-hero i {
    font-size: 1.125rem;
    filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
}

/* FOMO Action Buttons - Right Side */
.hero-fomo-buttons {
    position: absolute;
    right: 40px;
    top: 50%;
    transform: translateY(-50%);
    display: flex;
    flex-direction: column;
    gap: 20px;
    z-index: 3;
    animation: slideInRight 0.8s ease-out 0.5s both;
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateY(-50%) translateX(30px);
    }
    to {
        opacity: 1;
        transform: translateY(-50%) translateX(0);
    }
}

/* Enroll Now Button */
.fomo-btn-enroll {
    position: relative;
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 18px 28px;
    background: linear-gradient(135deg, #FF6B35 0%, #F7931E 100%);
    border: none;
    border-radius: 16px;
    cursor: pointer;
    overflow: hidden;
    box-shadow:
        0 8px 24px rgba(255, 107, 53, 0.4),
        0 0 0 2px rgba(255, 255, 255, 0.2) inset;
    transition: all 0.3s ease;
    animation: pulseGlow 2s ease-in-out infinite;
    text-decoration: none;
    color: inherit;
}

@keyframes pulseGlow {
    0%, 100% {
        box-shadow:
            0 8px 24px rgba(255, 107, 53, 0.4),
            0 0 0 2px rgba(255, 255, 255, 0.2) inset;
    }
    50% {
        box-shadow:
            0 8px 32px rgba(255, 107, 53, 0.6),
            0 0 20px rgba(255, 107, 53, 0.4),
            0 0 0 2px rgba(255, 255, 255, 0.3) inset;
    }
}

.fomo-btn-enroll:hover {
    transform: translateY(-4px) scale(1.05);
    box-shadow:
        0 12px 32px rgba(255, 107, 53, 0.6),
        0 0 30px rgba(255, 107, 53, 0.5),
        0 0 0 2px rgba(255, 255, 255, 0.3) inset;
}

.fomo-btn-enroll::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.3) 0%, transparent 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.fomo-btn-enroll:hover::before {
    opacity: 1;
}

.fomo-btn-enroll:visited,
.fomo-btn-enroll:active {
    color: inherit;
    text-decoration: none;
}

.btn-icon-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 10px;
    font-size: 20px;
    color: white;
}

.btn-text-wrapper {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 2px;
}

.btn-main-text {
    font-size: 18px;
    font-weight: 700;
    color: white;
    line-height: 1.2;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.btn-sub-text {
    font-size: 11px;
    font-weight: 600;
    color: rgba(255, 255, 255, 0.9);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.btn-hot-badge {
    position: absolute;
    top: -8px;
    right: -8px;
    padding: 4px 10px;
    background: linear-gradient(135deg, #FF0844 0%, #FFB199 100%);
    color: white;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 0.5px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(255, 8, 68, 0.5);
    animation: hotBadgePulse 1.5s ease-in-out infinite;
}

@keyframes hotBadgePulse {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.1);
    }
}

/* Seats Left Button */
.fomo-btn-seats {
    position: relative;
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 18px 28px;
    background: linear-gradient(135deg, rgba(220, 38, 38, 0.95) 0%, rgba(239, 68, 68, 0.95) 100%);
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 16px;
    cursor: pointer;
    overflow: hidden;
    box-shadow:
        0 8px 24px rgba(220, 38, 38, 0.4),
        0 0 0 1px rgba(255, 255, 255, 0.1) inset;
    transition: all 0.3s ease;
}

.fomo-btn-seats:hover {
    transform: translateY(-4px) scale(1.05);
    box-shadow:
        0 12px 32px rgba(220, 38, 38, 0.6),
        0 0 30px rgba(220, 38, 38, 0.4),
        0 0 0 2px rgba(255, 255, 255, 0.2) inset;
}

.seats-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    font-size: 20px;
    color: #FFD700;
    animation: fireFlicker 1.5s ease-in-out infinite;
}

@keyframes fireFlicker {
    0%, 100% {
        transform: scale(1) rotate(0deg);
        filter: brightness(1);
    }
    25% {
        transform: scale(1.1) rotate(-5deg);
        filter: brightness(1.2);
    }
    50% {
        transform: scale(1.15) rotate(5deg);
        filter: brightness(1.3);
    }
    75% {
        transform: scale(1.1) rotate(-3deg);
        filter: brightness(1.2);
    }
}

.seats-text {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 2px;
}

.seats-number {
    font-size: 17px;
    font-weight: 800;
    color: white;
    line-height: 1.2;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.seats-urgency {
    font-size: 11px;
    font-weight: 600;
    color: #FFD700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    animation: urgencyBlink 2s ease-in-out infinite;
}

@keyframes urgencyBlink {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0.7;
    }
}

.seats-pulse {
    position: absolute;
    inset: 0;
    border-radius: 16px;
    border: 2px solid rgba(255, 215, 0, 0.6);
    animation: seatsPulse 2s ease-out infinite;
    pointer-events: none;
}

@keyframes seatsPulse {
    0% {
        transform: scale(1);
        opacity: 1;
    }
    100% {
        transform: scale(1.1);
        opacity: 0;
    }
}

@media (max-width: 1024px) {
    .hero-fomo-buttons {
        position: static;
        transform: none;
        flex-direction: row;
        justify-content: center;
        margin: 20px auto 0;
        max-width: 600px;
    }

    .hero-motto-strip {
        padding: 16px 32px 0;
    }

    .motto-item-elegant {
        padding: 8px 14px;
        font-size: 0.875rem;
    }
}

@media (max-width: 768px) {
    .hero-banner-elegant {
        min-height: 180px !important;
        max-height: 240px !important;
        border-radius: 24px;
    }

    .hero-motto-strip {
        padding: 12px 20px 0;
    }

    .motto-icons-elegant {
        gap: 10px;
    }

    .motto-item-elegant {
        padding: 6px 12px;
        font-size: 0.8125rem;
    }

    .motto-divider {
        display: none;
    }

    .hero-title-elegant {
        padding: 18px 16px 20px;
    }

    .hero-title-elegant h1 {
        font-size: clamp(2rem, 7vw, 2.75rem);
        margin-bottom: 20px;
    }

    .hero-subtitle-elegant {
        font-size: 1.0625rem;
    }

    .hero-tagline-elegant {
        font-size: 0.9375rem;
    }

    .scarcity-badges-hero {
        right: 20px;
        gap: 12px;
    }

    .scarcity-badge-hero {
        padding: 10px 18px;
        font-size: 0.875rem;
    }

    .hero-fomo-buttons {
        flex-direction: column;
        gap: 16px;
        padding: 0 20px;
    }

    .fomo-btn-enroll,
    .fomo-btn-seats {
        width: 100%;
        justify-content: center;
        padding: 16px 24px;
    }

    .btn-main-text,
    .seats-number {
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .hero-motto-strip {
        padding: 10px 16px 0;
    }

    .motto-icons-elegant {
        gap: 8px;
    }

    .motto-item-elegant {
        padding: 5px 10px;
        font-size: 0.75rem;
        gap: 6px;
    }

    .motto-item-elegant i {
        font-size: 1rem;
    }

    .scarcity-badges-hero {
        position: static;
        transform: none;
        flex-direction: row;
        justify-content: center;
        gap: 10px;
        margin-top: 20px;
    }

    .scarcity-badge-hero {
        width: 100%;
        justify-content: center;
    }
}
</style>
</style>

<!-- Course Hero Banner -->
<div class="course-hero">
    <div class="hero-banner-elegant">
        <!-- Company Motto - Top Section -->
        <div class="hero-motto-strip">
            <div class="motto-icons-elegant">
                <a href="/local/workflowdesigner/modules/dashboard/" target="_blank" class="motto-item-elegant">
                    <i class="fas fa-magic"></i>
                    <span>Create</span>
                </a>
                <div class="motto-divider">•</div>
                <a href="https://aibuzzcentral.bheem.co.uk/" target="_blank" class="motto-item-elegant">
                    <i class="fas fa-comments"></i>
                    <span>Promote</span>
                </a>
                <div class="motto-divider">•</div>
                <a href="https://bheem.cloud/" target="_blank" class="motto-item-elegant">
                    <i class="fas fa-cloud"></i>
                    <span>Manage</span>
                </a>
                <div class="motto-divider">•</div>
                <a href="https://marketplace.bheem.co.uk/" target="_blank" class="motto-item-elegant">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Earn</span>
                </a>
            </div>
        </div>

        <!-- Main Hero Content -->
        <div class="hero-title-elegant">
            <h1>BHEEM AI SOCIAL 360 FASTTRACK</h1>
            <p class="hero-subtitle-elegant">Become a social media superhero! Learn how to create, schedule, and manage posts using AI — complete with auto-captioning, analytics, and engagement tracking. Perfect for influencers and marketers.</p>
            <p class="hero-tagline-elegant"><span class="text-shimmer">The Future Won't Wait — Learn AI Today</span></p>
        </div>

        <!-- FOMO Action Buttons - Right Side -->
        <div class="hero-fomo-buttons">
            <a href="/enrol/index.php?id=37" class="fomo-btn-enroll">
                <span class="btn-icon-wrapper">
                    <i class="fas fa-rocket"></i>
                </span>
                <span class="btn-text-wrapper">
                    <span class="btn-main-text">Enroll Now</span>
                    <span class="btn-sub-text">Limited Time Offer</span>
                </span>
                <span class="btn-hot-badge">HOT</span>
            </a>

            <button class="fomo-btn-seats">
                <span class="seats-icon">
                    <i class="fas fa-fire"></i>
                </span>
                <span class="seats-text">
                    <span class="seats-number">Only 11 Seats Left</span>
                    <span class="seats-urgency">Filling Fast!</span>
                </span>
                <span class="seats-pulse"></span>
            </button>
        </div>

        <!-- FOMO Stats Grid - Inside Hero -->
        <div class="futuristic-course-container">
            <div class="fomo-stats-grid">
                <div class="fomo-stat-card highlight-shine">
                    <div class="stat-value-cyber number-highlight" id="live-viewers">22</div>
                    <div class="stat-label-cyber">Viewing Now</div>
                    <span class="stat-urgency stat-live highlight-glow">Live</span>
                </div>
                <div class="fomo-stat-card highlight-shine">
                    <div class="stat-value-cyber number-highlight">134</div>
                    <div class="stat-label-cyber">Enrolled This Week</div>
                    <span class="stat-urgency stat-trending badge-highlight">Trending</span>
                </div>
                <div class="fomo-stat-card highlight-shine">
                    <div class="stat-value-cyber number-highlight">617</div>
                    <div class="stat-label-cyber">Active Learners</div>
                    <span class="stat-urgency stat-hot highlight-accent">Hot</span>
                </div>
                <div class="fomo-stat-card highlight-shine">
                    <div class="stat-value-cyber number-highlight">97%</div>
                    <div class="stat-label-cyber">Completion Rate</div>
                    <span class="stat-urgency stat-verified highlight-success">Verified</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Grid -->
<div class="course-grid">
    
    <!-- Left Panel -->
    <div class="left-panel">

        <!-- Course Info Card -->
        <div class="info-card reveal">
            <div class="info-card-header">
                <i class="fas fa-info-circle"></i>
                Course Details
            </div>
            
            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="info-text">
                    <div class="info-label">Duration</div>
                    <div class="info-value">1 Month</div>
                </div>
            </div>
            
            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="info-text">
                    <div class="info-label">Students Enrolled</div>
                    <div class="info-value">1,500+</div>
                </div>
            </div>
            
            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="info-text">
                    <div class="info-label">Age Range</div>
                    <div class="info-value">Working Professionals</div>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-star"></i>
                </div>
                <div class="info-text">
                    <div class="info-label">Difficulty Level</div>
                    <div class="info-value">Beginner to Intermediate</div>
                </div>
            </div>
        </div>
        <!-- Gamification Card -->
        <div class="gamification-card reveal">
            <div class="gamification-header">
                <i class="fas fa-award"></i>
                Learning Path & Progress
            </div>

            <div class="level-display">
                <div style="font-size: 0.9rem; color: var(--text-secondary); margin-bottom: 10px;">Current Level</div>
                <div class="level-number">Level 3</div>
                <div class="xp-text">Professionals Course - Level 3</div>
            </div>

            <div class="achievements-grid">
                <div class="achievement unlocked">
                    <div class="achievement-icon"><i class="fas fa-palette"></i></div>
                    <div class="achievement-name">Kids Course - Level 1</div>
                </div>
                <div class="achievement unlocked">
                    <div class="achievement-icon"><i class="fas fa-graduation-cap"></i></div>
                    <div class="achievement-name">Youth - Level 2</div>
                </div>
                <div class="achievement unlocked">
                    <div class="achievement-icon"><i class="fas fa-briefcase"></i></div>
                    <div class="achievement-name">Professionals - Level 3</div>
                </div>
                <div class="achievement locked">
                    <div class="achievement-icon"><i class="fas fa-star"></i></div>
                    <div class="achievement-name">Advanced - Level 4</div>
                </div>
            </div>
        </div>

        <!-- Live Activity Feed (FOMO Social Proof) -->
        <div class="live-activity-feed">
            <div class="feed-header">
                <div class="live-pulse"></div>
                <h3 class="feed-title">Live Activity</h3>
            </div>
                        <div class="activity-item">
                <div class="activity-avatar">R</div>
                <div class="activity-text">
                    <span class="activity-name">Rahul M</span>
                    completed Assignment 3                </div>
                <span class="activity-time">5 min ago</span>
            </div>
                        <div class="activity-item">
                <div class="activity-avatar">A</div>
                <div class="activity-text">
                    <span class="activity-name">Amit P</span>
                    unlocked achievement                </div>
                <span class="activity-time">15 min ago</span>
            </div>
                        <div class="activity-item">
                <div class="activity-avatar">P</div>
                <div class="activity-text">
                    <span class="activity-name">Priya K</span>
                    enrolled in course                </div>
                <span class="activity-time">6 min ago</span>
            </div>
                        <div class="activity-item">
                <div class="activity-avatar">V</div>
                <div class="activity-text">
                    <span class="activity-name">Vikram T</span>
                    enrolled in course                </div>
                <span class="activity-time">19 min ago</span>
            </div>
                        <div class="activity-item">
                <div class="activity-avatar">A</div>
                <div class="activity-text">
                    <span class="activity-name">Amit P</span>
                    enrolled in course                </div>
                <span class="activity-time">12 min ago</span>
            </div>
                    </div>

    </div>

    <!-- Center Content -->
    <div class="center-content">

        <!-- COURSE TAB BAR -->
        <div class="CourseTabBar">
            <div class="tab-header-title">
                <i class="fas fa-compass"></i>
                <span>Explore Course</span>
            </div>
            <div class="tab-pills" role="tablist" aria-label="Course content sections">
                <button class="tab-chip active" data-tab="overview" role="tab" aria-selected="true" aria-controls="overview-panel" id="tab-overview">
                    <div class="tab-icon-wrapper">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <div class="tab-content-wrapper">
                        <span class="tab-title">Overview</span>
                        <span class="tab-subtitle">What you'll learn</span>
                    </div>
                    <div class="tab-indicator"></div>
                </button>
                <button class="tab-chip" data-tab="curriculum" role="tab" aria-selected="false" aria-controls="curriculum-panel" id="tab-curriculum">
                    <div class="tab-icon-wrapper">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="tab-content-wrapper">
                        <span class="tab-title">Curriculum</span>
                        <span class="tab-subtitle">Course modules</span>
                    </div>
                    <div class="tab-indicator"></div>
                </button>
                <button class="tab-chip" data-tab="projects" role="tab" aria-selected="false" aria-controls="projects-panel" id="tab-projects">
                    <div class="tab-icon-wrapper">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <div class="tab-content-wrapper">
                        <span class="tab-title">Projects</span>
                        <span class="tab-subtitle">Build & create</span>
                    </div>
                    <div class="tab-indicator"></div>
                </button>
                <button class="tab-chip" data-tab="schedule" role="tab" aria-selected="false" aria-controls="schedule-panel" id="tab-schedule">
                    <div class="tab-icon-wrapper">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="tab-content-wrapper">
                        <span class="tab-title">Schedule</span>
                        <span class="tab-subtitle">Course timeline</span>
                    </div>
                    <div class="tab-indicator"></div>
                </button>
                <button class="tab-chip" data-tab="reviews" role="tab" aria-selected="false" aria-controls="reviews-panel" id="tab-reviews">
                    <div class="tab-icon-wrapper">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="tab-content-wrapper">
                        <span class="tab-title">Reviews</span>
                        <span class="tab-subtitle">Student feedback</span>
                    </div>
                    <div class="tab-indicator"></div>
                </button>
                <button class="tab-chip" data-tab="faq" role="tab" aria-selected="false" aria-controls="faq-panel" id="tab-faq">
                    <div class="tab-icon-wrapper">
                        <i class="fas fa-question-circle"></i>
                    </div>
                    <div class="tab-content-wrapper">
                        <span class="tab-title">FAQ</span>
                        <span class="tab-subtitle">Common questions</span>
                    </div>
                    <div class="tab-indicator"></div>
                </button>
            </div>
        </div>

        <!-- TAB PANELS -->
        <div class="tab-panels-container">

            <!-- Overview Panel -->
            <div class="tab-panel active" id="overview-panel" role="tabpanel" aria-labelledby="tab-overview">
                <h2 style="margin-bottom: 1.5rem;"><i class="fas fa-bullseye gradient-icon"></i> What You'll Learn</h2>
                <div class="feature-grid">
                                                                    <div class="feature-tile">
                            <h4><i class="fas fa-chart-bar feature-icon"></i> AI Social Media Strategy</h4>
                            <p>Plan and execute winning campaigns</p>
                        </div>
                                                <div class="feature-tile">
                            <h4><i class="fas fa-calendar-alt feature-icon"></i> Content Calendar Automation</h4>
                            <p>Never run out of post ideas</p>
                        </div>
                                                <div class="feature-tile">
                            <h4><i class="fas fa-star feature-icon"></i> Engagement Optimization</h4>
                            <p>Boost likes, shares, and followers</p>
                        </div>
                                                <div class="feature-tile">
                            <h4><i class="fas fa-chart-line feature-icon"></i> Analytics &amp; Reporting</h4>
                            <p>Track performance and ROI</p>
                        </div>
                                                            </div>

                <h3 style="margin: 3rem 0 1.5rem; color: var(--indigo);"><i class="fas fa-hammer gradient-icon"></i> What You'll Build</h3>
                <div style="display: grid; gap: 0.5rem;">
                    <div class="ProjectMiniCard">
                        <div class="project-cover"><i class="fas fa-bullseye"></i></div>
                        <div>
                            <h4 style="font-size: 16px; margin-bottom: 0.25rem; color: var(--indigo);">Real-World Project 1</h4>
                            <p style="font-size: 13px; color: var(--text-secondary); margin: 0;">Apply your skills to build a complete project</p>
                        </div>
                    </div>
                    <div class="ProjectMiniCard">
                        <div class="project-cover"><i class="fas fa-rocket"></i></div>
                        <div>
                            <h4 style="font-size: 16px; margin-bottom: 0.25rem; color: var(--indigo);">Practical Application</h4>
                            <p style="font-size: 13px; color: var(--text-secondary); margin: 0;">Create solutions for real-world scenarios</p>
                        </div>
                    </div>
                    <div class="ProjectMiniCard">
                        <div class="project-cover"><i class="fas fa-briefcase"></i></div>
                        <div>
                            <h4 style="font-size: 16px; margin-bottom: 0.25rem; color: var(--indigo);">Portfolio Piece</h4>
                            <p style="font-size: 13px; color: var(--text-secondary); margin: 0;">Build something impressive to showcase</p>
                        </div>
                    </div>
                </div>

                <h3 style="margin: 3rem 0 1rem; color: #10B981;"><i class="fas fa-tools gradient-icon"></i> Tools & Technologies</h3>
                <div class="ToolLogoRow">
                    <div class="tools-carousel-track">
                                                <div class="tool-logo" title="ChatGPT">
                            <i class="fas fa-palette"></i>
                        </div>
                                                <div class="tool-logo" title="Claude AI">
                            <i class="fas fa-robot"></i>
                        </div>
                                                <div class="tool-logo" title="Google Gemini">
                            <i class="fas fa-brain"></i>
                        </div>
                                                <div class="tool-logo" title="Microsoft Copilot">
                            <i class="fas fa-pen"></i>
                        </div>
                                                <div class="tool-logo" title="Midjourney">
                            <i class="fas fa-microphone"></i>
                        </div>
                                                <div class="tool-logo" title="GitHub Copilot">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                                                <div class="tool-logo" title="Jasper AI">
                            <i class="fas fa-wrench"></i>
                        </div>
                                                <div class="tool-logo" title="Perplexity AI">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        
                                                <div class="tool-logo" title="ChatGPT">
                            <i class="fas fa-palette"></i>
                        </div>
                                                <div class="tool-logo" title="Claude AI">
                            <i class="fas fa-robot"></i>
                        </div>
                                                <div class="tool-logo" title="Google Gemini">
                            <i class="fas fa-brain"></i>
                        </div>
                                                <div class="tool-logo" title="Microsoft Copilot">
                            <i class="fas fa-pen"></i>
                        </div>
                                                <div class="tool-logo" title="Midjourney">
                            <i class="fas fa-microphone"></i>
                        </div>
                                                <div class="tool-logo" title="GitHub Copilot">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                                                <div class="tool-logo" title="Jasper AI">
                            <i class="fas fa-wrench"></i>
                        </div>
                                                <div class="tool-logo" title="Perplexity AI">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                                            </div>
                </div>
            </div>

            <!-- Curriculum Panel -->
            <div class="tab-panel" id="curriculum-panel" role="tabpanel" aria-labelledby="tab-curriculum">
                <h2><i class="fas fa-book gradient-icon"></i> Course Curriculum</h2>

                <div class="panel-content">
                                            <p class="empty-state">Course curriculum will be available soon. Check back later!</p>
                                    </div>
            </div>

            <!-- Projects Panel -->
            <div class="tab-panel" id="projects-panel" role="tabpanel" aria-labelledby="tab-projects">
                <div style="text-align: center; margin-bottom: 3rem;">
                    <div style="display: inline-block; padding: 0.5rem 1.5rem; background: linear-gradient(135deg, rgba(52, 211, 153, 0.2) 0%, rgba(16, 185, 129, 0.2) 100%); border-radius: 50px; margin-bottom: 1rem; border: 1px solid rgba(52, 211, 153, 0.3);">
                        <span style="font-weight: 700; color: #10b981;">✨ CREATE - Build Your Portfolio</span>
                    </div>
                    <h2 style="font-size: 2.5rem; margin-bottom: 1rem; background: linear-gradient(135deg, #34d399 0%, #10b981 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                        🎯 Real-World Projects
                    </h2>
                    <p style="font-size: 1.1rem; color: var(--text-secondary); max-width: 700px; margin: 0 auto;">
                        Build portfolio-worthy projects that showcase your skills to employers
                    </p>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem; margin-top: 2rem;">
                    <!-- Project 1 -->
                    <div style="background: linear-gradient(135deg, rgba(52, 211, 153, 0.05) 0%, rgba(16, 185, 129, 0.05) 100%); border: 1px solid rgba(52, 211, 153, 0.2); border-radius: 16px; overflow: hidden; transition: transform 0.3s ease;" class="project-card-hover">
                        <div style="height: 180px; background: linear-gradient(135deg, #34d399 0%, #10b981 100%); display: flex; align-items: center; justify-content: center; font-size: 4rem;">
                            🤖
                        </div>
                        <div style="padding: 2rem;">
                            <div style="display: inline-block; padding: 0.25rem 0.75rem; background: rgba(52, 211, 153, 0.2); border-radius: 50px; font-size: 0.85rem; font-weight: 600; color: #10b981; margin-bottom: 1rem;">
                                Capstone Project
                            </div>
                            <h3 style="font-size: 1.4rem; font-weight: 700; margin-bottom: 0.75rem; color: var(--text-primary);">
                                AI Chatbot Assistant
                            </h3>
                            <p style="color: var(--text-secondary); margin-bottom: 1.5rem; line-height: 1.6;">
                                Build a custom AI assistant using ChatGPT API, train it on your data, and deploy it to production.
                            </p>
                            <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                                <span style="padding: 0.4rem 0.8rem; background: rgba(102, 126, 234, 0.1); border-radius: 6px; font-size: 0.85rem; color: #667eea;">Python</span>
                                <span style="padding: 0.4rem 0.8rem; background: rgba(102, 126, 234, 0.1); border-radius: 6px; font-size: 0.85rem; color: #667eea;">OpenAI</span>
                                <span style="padding: 0.4rem 0.8rem; background: rgba(102, 126, 234, 0.1); border-radius: 6px; font-size: 0.85rem; color: #667eea;">FastAPI</span>
                            </div>
                        </div>
                    </div>

                    <!-- Project 2 -->
                    <div style="background: linear-gradient(135deg, rgba(52, 211, 153, 0.05) 0%, rgba(16, 185, 129, 0.05) 100%); border: 1px solid rgba(52, 211, 153, 0.2); border-radius: 16px; overflow: hidden; transition: transform 0.3s ease;" class="project-card-hover">
                        <div style="height: 180px; background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); display: flex; align-items: center; justify-content: center; font-size: 4rem;">
                            🎨
                        </div>
                        <div style="padding: 2rem;">
                            <div style="display: inline-block; padding: 0.25rem 0.75rem; background: rgba(240, 147, 251, 0.2); border-radius: 50px; font-size: 0.85rem; font-weight: 600; color: #f093fb; margin-bottom: 1rem;">
                                Creative Project
                            </div>
                            <h3 style="font-size: 1.4rem; font-weight: 700; margin-bottom: 0.75rem; color: var(--text-primary);">
                                AI Content Generator
                            </h3>
                            <p style="color: var(--text-secondary); margin-bottom: 1.5rem; line-height: 1.6;">
                                Create an automated content creation system that generates social media posts, images, and videos.
                            </p>
                            <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                                <span style="padding: 0.4rem 0.8rem; background: rgba(102, 126, 234, 0.1); border-radius: 6px; font-size: 0.85rem; color: #667eea;">ChatGPT</span>
                                <span style="padding: 0.4rem 0.8rem; background: rgba(102, 126, 234, 0.1); border-radius: 6px; font-size: 0.85rem; color: #667eea;">Midjourney</span>
                                <span style="padding: 0.4rem 0.8rem; background: rgba(102, 126, 234, 0.1); border-radius: 6px; font-size: 0.85rem; color: #667eea;">n8n</span>
                            </div>
                        </div>
                    </div>

                    <!-- Project 3 -->
                    <div style="background: linear-gradient(135deg, rgba(52, 211, 153, 0.05) 0%, rgba(16, 185, 129, 0.05) 100%); border: 1px solid rgba(52, 211, 153, 0.2); border-radius: 16px; overflow: hidden; transition: transform 0.3s ease;" class="project-card-hover">
                        <div style="height: 180px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; font-size: 4rem;">
                            ⚡
                        </div>
                        <div style="padding: 2rem;">
                            <div style="display: inline-block; padding: 0.25rem 0.75rem; background: rgba(102, 126, 234, 0.2); border-radius: 50px; font-size: 0.85rem; font-weight: 600; color: #667eea; margin-bottom: 1rem;">
                                Automation Project
                            </div>
                            <h3 style="font-size: 1.4rem; font-weight: 700; margin-bottom: 0.75rem; color: var(--text-primary);">
                                Smart Workflow Automation
                            </h3>
                            <p style="color: var(--text-secondary); margin-bottom: 1.5rem; line-height: 1.6;">
                                Build an intelligent automation system that handles email, scheduling, and data processing with AI.
                            </p>
                            <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                                <span style="padding: 0.4rem 0.8rem; background: rgba(102, 126, 234, 0.1); border-radius: 6px; font-size: 0.85rem; color: #667eea;">n8n</span>
                                <span style="padding: 0.4rem 0.8rem; background: rgba(102, 126, 234, 0.1); border-radius: 6px; font-size: 0.85rem; color: #667eea;">Zapier</span>
                                <span style="padding: 0.4rem 0.8rem; background: rgba(102, 126, 234, 0.1); border-radius: 6px; font-size: 0.85rem; color: #667eea;">AI APIs</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="margin-top: 3rem; padding: 3rem; background: linear-gradient(135deg, rgba(52, 211, 153, 0.1) 0%, rgba(16, 185, 129, 0.1) 100%); border-radius: 16px; border: 2px solid rgba(52, 211, 153, 0.3);">
                    <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 2rem;">
                        <div style="flex: 1; min-width: 300px;">
                            <h3 style="font-size: 1.8rem; margin-bottom: 1rem; color: var(--text-primary);">🏆 Build. Ship. Showcase.</h3>
                            <p style="color: var(--text-secondary); line-height: 1.6; margin-bottom: 1rem;">
                                Every project you build can be added to your portfolio and shared with employers.
                                Get feedback from mentors and peers in the community!
                            </p>
                            <p style="font-weight: 700; color: #10b981; font-size: 1.1rem;">
                                ✨ Top projects featured on Bheem Marketplace
                            </p>
                        </div>
                        <div style="flex: 0 0 auto;">
                            <button style="padding: 1.25rem 2.5rem; background: linear-gradient(135deg, #34d399 0%, #10b981 100%); color: white; border: none; border-radius: 12px; font-weight: 700; cursor: pointer; font-size: 1.1rem; box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);">
                                Start Building →
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Schedule Panel -->
            <div class="tab-panel" id="schedule-panel" role="tabpanel" aria-labelledby="tab-schedule">
                <div style="text-align: center; margin-bottom: 3rem;">
                    <div class="manage-badge">
                        <span style="font-weight: 700; color: #8b5cf6;">📅 MANAGE - Your Learning Schedule</span>
                    </div>
                    <h2 style="font-size: 2.5rem; margin-bottom: 1rem; background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                        📅 Schedule & Batches
                    </h2>
                    <p style="font-size: 1.1rem; color: var(--text-secondary); max-width: 700px; margin: 0 auto;">
                        Flexible learning options that fit your lifestyle
                    </p>
                </div>

                <div class="countdown-badge">
                    ⏰ Flexible scheduling available
                </div>

                <table class="BatchTable">
                    <thead>
                        <tr>
                            <th>Start Date</th>
                            <th>Mode</th>
                            <th>Duration</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Jul 2025</strong></td>
                            <td>🌐 Online Learning</td>
                            <td>⏰ 1 Month</td>
                            <td><span class="seats-badge available">Open for Enrollment</span></td>
                        </tr>
                        <tr>
                            <td><strong>Self-Paced</strong></td>
                            <td>📚 Learn at your pace</td>
                            <td>⏰ Flexible</td>
                            <td><span class="seats-badge available">Available Now</span></td>
                        </tr>
                    </tbody>
                </table>

                <div style="margin-top: 2rem; padding: 2rem; background: linear-gradient(135deg, #EFF6FF 0%, #F0FDF4 100%); border-radius: 16px; border: 2px solid var(--indigo);">
                    <h3 style="margin-bottom: 1rem; color: var(--indigo);">📋 Learning Format</h3>
                    <p style="color: var(--text-primary); margin-bottom: 0.5rem; font-weight: 600;">📅 Self-paced or scheduled sessions</p>
                    <p style="color: var(--text-primary); margin-bottom: 0.5rem; font-weight: 600;">⏰ Flexible learning hours</p>
                    <p style="color: var(--text-primary); margin-bottom: 0.5rem; font-weight: 600;">🌐 100% online accessible</p>
                    <p style="color: var(--text-primary); font-weight: 600;">👥 Community support included</p>
                </div>
            </div>

        <div class="tab-panel" id="reviews-panel" role="tabpanel" aria-labelledby="tab-reviews">
            <h2 style="margin-bottom: 2rem;">⭐ Student Reviews</h2>

            <div class="RatingSummary">
                <div class="rating-score">
                    <div class="score-number">4.8</div>
                    <div class="stars">★★★★★</div>
                    <div style="font-size: 14px; color: var(--text-secondary); margin-top: 0.5rem; font-weight: 600;">
                        Based on 1500+ reviews
                    </div>
                </div>
                <div style="flex: 1;">
                    <div style="margin-bottom: 0.75rem; display: flex; align-items: center; gap: 1rem;">
                        <span style="font-size: 13px; width: 60px; font-weight: 600;">5 stars</span>
                        <div style="flex: 1; height: 10px; background: rgba(139, 92, 246, 0.2); border-radius: 100px; overflow: hidden;">
                            <div style="width: 85%; height: 100%; background: var(--gradient-main); border-radius: 100px;"></div>
                        </div>
                        <span style="font-size: 13px; color: var(--text-primary); font-weight: 700;">85%</span>
                    </div>
                    <div style="margin-bottom: 0.75rem; display: flex; align-items: center; gap: 1rem;">
                        <span style="font-size: 13px; width: 60px; font-weight: 600;">4 stars</span>
                        <div style="flex: 1; height: 10px; background: rgba(139, 92, 246, 0.2); border-radius: 100px; overflow: hidden;">
                            <div style="width: 12%; height: 100%; background: var(--gradient-main); border-radius: 100px;"></div>
                        </div>
                        <span style="font-size: 13px; color: var(--text-primary); font-weight: 700;">12%</span>
                    </div>
                    <div style="margin-bottom: 0.75rem; display: flex; align-items: center; gap: 1rem;">
                        <span style="font-size: 13px; width: 60px; font-weight: 600;">3 stars</span>
                        <div style="flex: 1; height: 10px; background: rgba(139, 92, 246, 0.2); border-radius: 100px; overflow: hidden;">
                            <div style="width: 3%; height: 100%; background: var(--gradient-main); border-radius: 100px;"></div>
                        </div>
                        <span style="font-size: 13px; color: var(--text-primary); font-weight: 700;">3%</span>
                    </div>
                </div>
            </div>

            <div class="filter-chips">
                <button class="filter-chip active">Most Recent</button>
                <button class="filter-chip">Top Rated</button>
                <button class="filter-chip">5 Stars Only</button>
            </div>

            <!-- Review Card 1 -->
            <div class="ReviewCard">
                <div class="review-header">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div class="reviewer-avatar">AN</div>
                        <div>
                            <div style="display: flex; align-items: center;">
                                <span class="reviewer-name">Anjali Nair</span>
                                <span class="verified-badge">
                                    <i class="fas fa-check-circle"></i>
                                    Verified
                                </span>
                            </div>
                            <div style="font-size: 0.85rem; color: var(--text-tertiary); margin-top: 2px;">
                                Software Engineer, Infosys • Kochi, Kerala
                            </div>
                        </div>
                    </div>
                    <span class="stars" style="font-size: 18px;">★★★★★</span>
                </div>
                <p class="review-content">
                    This course completely transformed my understanding of AI! The practical projects were incredibly valuable and I was able to apply what I learned immediately at work. The instructor's teaching style is clear, engaging, and easy to follow. Highly recommend to anyone looking to upskill in AI! 🌟
                </p>
                <div class="review-footer">
                    <span class="review-date">2 weeks ago</span>
                    <div class="review-helpful">
                        <button class="helpful-btn">
                            <i class="fas fa-thumbs-up"></i>
                            Helpful
                        </button>
                        <span class="helpful-count">47</span>
                    </div>
                </div>
            </div>

            <!-- Review Card 2 -->
            <div class="ReviewCard">
                <div class="review-header">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div class="reviewer-avatar">RK</div>
                        <div>
                            <div style="display: flex; align-items: center;">
                                <span class="reviewer-name">Rahul Krishnan</span>
                                <span class="verified-badge">
                                    <i class="fas fa-check-circle"></i>
                                    Verified
                                </span>
                            </div>
                            <div style="font-size: 0.85rem; color: var(--text-tertiary); margin-top: 2px;">
                                Data Analyst, TCS • Thiruvananthapuram, Kerala
                            </div>
                        </div>
                    </div>
                    <span class="stars" style="font-size: 18px;">★★★★★</span>
                </div>
                <p class="review-content">
                    Absolutely brilliant course! The content is up-to-date with industry standards and the hands-on approach made complex AI concepts easy to grasp. I landed my dream job thanks to the skills I learned here. The mentor support is excellent and they're always ready to help. Worth every penny! 💯
                </p>
                <div class="review-footer">
                    <span class="review-date">3 weeks ago</span>
                    <div class="review-helpful">
                        <button class="helpful-btn">
                            <i class="fas fa-thumbs-up"></i>
                            Helpful
                        </button>
                        <span class="helpful-count">52</span>
                    </div>
                </div>
            </div>

            <!-- Review Card 3 -->
            <div class="ReviewCard">
                <div class="review-header">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div class="reviewer-avatar">SM</div>
                        <div>
                            <div style="display: flex; align-items: center;">
                                <span class="reviewer-name">Sreelakshmi Menon</span>
                                <span class="verified-badge">
                                    <i class="fas fa-check-circle"></i>
                                    Verified
                                </span>
                            </div>
                            <div style="font-size: 0.85rem; color: var(--text-tertiary); margin-top: 2px;">
                                AI Researcher, IIT Palakkad • Palakkad, Kerala
                            </div>
                        </div>
                    </div>
                    <span class="stars" style="font-size: 18px;">★★★★★</span>
                </div>
                <p class="review-content">
                    Outstanding quality and depth of content! The instructor goes above and beyond to ensure students understand every concept. The community support is amazing and the resources provided are top-notch. This course exceeded all my expectations. Perfect for both beginners and intermediate learners! 🚀
                </p>
                <div class="review-footer">
                    <span class="review-date">1 month ago</span>
                    <div class="review-helpful">
                        <button class="helpful-btn">
                            <i class="fas fa-thumbs-up"></i>
                            Helpful
                        </button>
                        <span class="helpful-count">38</span>
                    </div>
                </div>
            </div>

            <!-- Review Card 4 -->
            <div class="ReviewCard">
                <div class="review-header">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div class="reviewer-avatar">AP</div>
                        <div>
                            <div style="display: flex; align-items: center;">
                                <span class="reviewer-name">Aravind Pillai</span>
                                <span class="verified-badge">
                                    <i class="fas fa-check-circle"></i>
                                    Verified
                                </span>
                            </div>
                            <div style="font-size: 0.85rem; color: var(--text-tertiary); margin-top: 2px;">
                                Product Manager, Wipro • Kozhikode, Kerala
                            </div>
                        </div>
                    </div>
                    <span class="stars" style="font-size: 18px;">★★★★★</span>
                </div>
                <p class="review-content">
                    Best investment in my career! The course structure is perfect for working professionals like me. I loved the real-world case studies and practical assignments. My productivity has increased significantly after completing this course. The flexibility to learn at my own pace was a huge plus! 🎯
                </p>
                <div class="review-footer">
                    <span class="review-date">1 month ago</span>
                    <div class="review-helpful">
                        <button class="helpful-btn">
                            <i class="fas fa-thumbs-up"></i>
                            Helpful
                        </button>
                        <span class="helpful-count">44</span>
                    </div>
                </div>
            </div>

            <!-- Review Card 5 -->
            <div class="ReviewCard">
                <div class="review-header">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div class="reviewer-avatar">DV</div>
                        <div>
                            <div style="display: flex; align-items: center;">
                                <span class="reviewer-name">Divya Varma</span>
                                <span class="verified-badge">
                                    <i class="fas fa-check-circle"></i>
                                    Verified
                                </span>
                            </div>
                            <div style="font-size: 0.85rem; color: var(--text-tertiary); margin-top: 2px;">
                                ML Engineer, UST Global • Thiruvananthapuram, Kerala
                            </div>
                        </div>
                    </div>
                    <span class="stars" style="font-size: 18px;">★★★★★</span>
                </div>
                <p class="review-content">
                    This course is a game-changer! The instructor's expertise and passion for teaching shine through every lesson. The projects helped me build a strong portfolio that impressed recruiters. I've recommended this to all my colleagues. Great community and excellent support throughout! ⭐
                </p>
                <div class="review-footer">
                    <span class="review-date">2 months ago</span>
                    <div class="review-helpful">
                        <button class="helpful-btn">
                            <i class="fas fa-thumbs-up"></i>
                            Helpful
                        </button>
                        <span class="helpful-count">41</span>
                    </div>
                </div>
            </div>

            <!-- Review Card 6 -->
            <div class="ReviewCard">
                <div class="review-header">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div class="reviewer-avatar">VJ</div>
                        <div>
                            <div style="display: flex; align-items: center;">
                                <span class="reviewer-name">Vishnu Jayakumar</span>
                                <span class="verified-badge">
                                    <i class="fas fa-check-circle"></i>
                                    Verified
                                </span>
                            </div>
                            <div style="font-size: 0.85rem; color: var(--text-tertiary); margin-top: 2px;">
                                Tech Lead, HCL • Kochi, Kerala
                            </div>
                        </div>
                    </div>
                    <span class="stars" style="font-size: 18px;">★★★★★</span>
                </div>
                <p class="review-content">
                    Exceptional learning experience from start to finish! The course content is comprehensive yet easy to follow. The practical approach and real-world examples made all the difference. I feel confident tackling AI projects now. The certificate also added great value to my LinkedIn profile! 🏆
                </p>
                <div class="review-footer">
                    <span class="review-date">2 months ago</span>
                    <div class="review-helpful">
                        <button class="helpful-btn">
                            <i class="fas fa-thumbs-up"></i>
                            Helpful
                        </button>
                        <span class="helpful-count">35</span>
                    </div>
                </div>
            </div>

            <!-- Review Card 7 -->
            <div class="ReviewCard">
                <div class="review-header">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div class="reviewer-avatar">PP</div>
                        <div>
                            <div style="display: flex; align-items: center;">
                                <span class="reviewer-name">Priya Prakash</span>
                                <span class="verified-badge">
                                    <i class="fas fa-check-circle"></i>
                                    Verified
                                </span>
                            </div>
                            <div style="font-size: 0.85rem; color: var(--text-tertiary); margin-top: 2px;">
                                Business Analyst, Ernst & Young • Kochi, Kerala
                            </div>
                        </div>
                    </div>
                    <span class="stars" style="font-size: 18px;">★★★★★</span>
                </div>
                <p class="review-content">
                    Perfect blend of theory and practice! The instructor breaks down complex AI topics into digestible chunks. The support from the team is incredible and the doubt-clearing sessions are super helpful. This course helped me transition into a tech role successfully. Couldn't be happier! 💪
                </p>
                <div class="review-footer">
                    <span class="review-date">2 months ago</span>
                    <div class="review-helpful">
                        <button class="helpful-btn">
                            <i class="fas fa-thumbs-up"></i>
                            Helpful
                        </button>
                        <span class="helpful-count">39</span>
                    </div>
                </div>
            </div>

            <!-- Review Card 8 -->
            <div class="ReviewCard">
                <div class="review-header">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div class="reviewer-avatar">SK</div>
                        <div>
                            <div style="display: flex; align-items: center;">
                                <span class="reviewer-name">Sandeep Kumar</span>
                                <span class="verified-badge">
                                    <i class="fas fa-check-circle"></i>
                                    Verified
                                </span>
                            </div>
                            <div style="font-size: 0.85rem; color: var(--text-tertiary); margin-top: 2px;">
                                Full Stack Developer, Accenture • Thiruvananthapuram, Kerala
                            </div>
                        </div>
                    </div>
                    <span class="stars" style="font-size: 18px;">★★★★★</span>
                </div>
                <p class="review-content">
                    Fantastic course with stellar content! The hands-on projects are industry-relevant and challenging in the right way. I learned more practical AI skills in this course than I did in my entire computer science degree. The real-world applications are amazing. Absolutely worth it! 🔥
                </p>
                <div class="review-footer">
                    <span class="review-date">3 months ago</span>
                    <div class="review-helpful">
                        <button class="helpful-btn">
                            <i class="fas fa-thumbs-up"></i>
                            Helpful
                        </button>
                        <span class="helpful-count">33</span>
                    </div>
                </div>
            </div>

            <!-- Review Card 9 -->
            <div class="ReviewCard">
                <div class="review-header">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div class="reviewer-avatar">MN</div>
                        <div>
                            <div style="display: flex; align-items: center;">
                                <span class="reviewer-name">Meera Nambiar</span>
                                <span class="verified-badge">
                                    <i class="fas fa-check-circle"></i>
                                    Verified
                                </span>
                            </div>
                            <div style="font-size: 0.85rem; color: var(--text-tertiary); margin-top: 2px;">
                                Data Scientist, Cognizant • Kochi, Kerala
                            </div>
                        </div>
                    </div>
                    <span class="stars" style="font-size: 18px;">★★★★★</span>
                </div>
                <p class="review-content">
                    This course opened up a whole new world for me! The explanations are crystal clear and the pace is just right. I appreciate how the instructor makes difficult AI concepts accessible even for non-tech backgrounds. My career has taken off after completing this. Thank you Bheem Academy! 🙏
                </p>
                <div class="review-footer">
                    <span class="review-date">3 months ago</span>
                    <div class="review-helpful">
                        <button class="helpful-btn">
                            <i class="fas fa-thumbs-up"></i>
                            Helpful
                        </button>
                        <span class="helpful-count">36</span>
                    </div>
                </div>
            </div>

            <!-- Review Card 10 -->
            <div class="ReviewCard">
                <div class="review-header">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div class="reviewer-avatar">AK</div>
                        <div>
                            <div style="display: flex; align-items: center;">
                                <span class="reviewer-name">Akhil Krishnan</span>
                                <span class="verified-badge">
                                    <i class="fas fa-check-circle"></i>
                                    Verified
                                </span>
                            </div>
                            <div style="font-size: 0.85rem; color: var(--text-tertiary); margin-top: 2px;">
                                DevOps Engineer, Tech Mahindra • Kozhikode, Kerala
                            </div>
                        </div>
                    </div>
                    <span class="stars" style="font-size: 18px;">★★★★☆</span>
                </div>
                <p class="review-content">
                    Brilliant course that delivers on its promises! The curriculum is well-structured and the instructor is incredibly knowledgeable. I've gained skills that are directly applicable to my job. Would have given 5 stars if there were more advanced topics, but overall an excellent foundation course! 👍
                </p>
                <div class="review-footer">
                    <span class="review-date">3 months ago</span>
                    <div class="review-helpful">
                        <button class="helpful-btn">
                            <i class="fas fa-thumbs-up"></i>
                            Helpful
                        </button>
                        <span class="helpful-count">28</span>
                    </div>
                </div>
            </div>

            <!-- Review Card 11 -->
            <div class="ReviewCard">
                <div class="review-header">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div class="reviewer-avatar">RS</div>
                        <div>
                            <div style="display: flex; align-items: center;">
                                <span class="reviewer-name">Reshma Suresh</span>
                                <span class="verified-badge">
                                    <i class="fas fa-check-circle"></i>
                                    Verified
                                </span>
                            </div>
                            <div style="font-size: 0.85rem; color: var(--text-tertiary); margin-top: 2px;">
                                AI Consultant, Deloitte • Kochi, Kerala
                            </div>
                        </div>
                    </div>
                    <span class="stars" style="font-size: 18px;">★★★★★</span>
                </div>
                <p class="review-content">
                    Top-notch quality and excellent teaching methodology! This course helped me land multiple consulting projects with top clients. The practical skills and confidence I gained are invaluable. The community is very supportive and the mentors are always available. Thank you for this amazing learning journey! 🌟
                </p>
                <div class="review-footer">
                    <span class="review-date">4 months ago</span>
                    <div class="review-helpful">
                        <button class="helpful-btn">
                            <i class="fas fa-thumbs-up"></i>
                            Helpful
                        </button>
                        <span class="helpful-count">31</span>
                    </div>
                </div>
            </div>

            <!-- Review Card 12 -->
            <div class="ReviewCard">
                <div class="review-header">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div class="reviewer-avatar">NA</div>
                        <div>
                            <div style="display: flex; align-items: center;">
                                <span class="reviewer-name">Nikhil Anand</span>
                                <span class="verified-badge">
                                    <i class="fas fa-check-circle"></i>
                                    Verified
                                </span>
                            </div>
                            <div style="font-size: 0.85rem; color: var(--text-tertiary); margin-top: 2px;">
                                Senior Developer, IBM • Thiruvananthapuram, Kerala
                            </div>
                        </div>
                    </div>
                    <span class="stars" style="font-size: 18px;">★★★★★</span>
                </div>
                <p class="review-content">
                    Exceptional course that exceeded my expectations! The depth of content and quality of instruction are outstanding. I've taken many online courses but this one stands out for its practical approach. My AI skills have improved dramatically and I'm now leading AI projects at work! 🚀
                </p>
                <div class="review-footer">
                    <span class="review-date">4 months ago</span>
                    <div class="review-helpful">
                        <button class="helpful-btn">
                            <i class="fas fa-thumbs-up"></i>
                            Helpful
                        </button>
                        <span class="helpful-count">29</span>
                    </div>
                </div>
            </div>

            <!-- Review Card 13 -->
            <div class="ReviewCard">
                <div class="review-header">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div class="reviewer-avatar">AV</div>
                        <div>
                            <div style="display: flex; align-items: center;">
                                <span class="reviewer-name">Arjun Varghese</span>
                                <span class="verified-badge">
                                    <i class="fas fa-check-circle"></i>
                                    Verified
                                </span>
                            </div>
                            <div style="font-size: 0.85rem; color: var(--text-tertiary); margin-top: 2px;">
                                Software Developer, Tata Elxsi • Thiruvananthapuram, Kerala
                            </div>
                        </div>
                    </div>
                    <span class="stars" style="font-size: 18px;">★★★★★</span>
                </div>
                <p class="review-content">
                    Amazing learning experience! The course is well-organized and covers everything from basics to advanced topics. The instructor is patient and explains concepts thoroughly. I've successfully applied these skills to multiple client projects. Highly satisfied with my investment! 🌟
                </p>
                <div class="review-footer">
                    <span class="review-date">5 months ago</span>
                    <div class="review-helpful">
                        <button class="helpful-btn">
                            <i class="fas fa-thumbs-up"></i>
                            Helpful
                        </button>
                        <span class="helpful-count">26</span>
                    </div>
                </div>
            </div>

            <!-- Review Card 14 -->
            <div class="ReviewCard">
                <div class="review-header">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div class="reviewer-avatar">GT</div>
                        <div>
                            <div style="display: flex; align-items: center;">
                                <span class="reviewer-name">Geethu Thomas</span>
                                <span class="verified-badge">
                                    <i class="fas fa-check-circle"></i>
                                    Verified
                                </span>
                            </div>
                            <div style="font-size: 0.85rem; color: var(--text-tertiary); margin-top: 2px;">
                                QA Engineer, Nissan Digital • Kochi, Kerala
                            </div>
                        </div>
                    </div>
                    <span class="stars" style="font-size: 18px;">★★★★★</span>
                </div>
                <p class="review-content">
                    This course is worth every minute and rupee! The practical exercises are challenging but rewarding. I love how the instructor connects theory with real-world applications. My confidence in AI has grown tremendously. Already working on exciting projects at my company! 💪
                </p>
                <div class="review-footer">
                    <span class="review-date">5 months ago</span>
                    <div class="review-helpful">
                        <button class="helpful-btn">
                            <i class="fas fa-thumbs-up"></i>
                            Helpful
                        </button>
                        <span class="helpful-count">24</span>
                    </div>
                </div>
            </div>

            <!-- Review Card 15 -->
            <div class="ReviewCard">
                <div class="review-header">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div class="reviewer-avatar">JM</div>
                        <div>
                            <div style="display: flex; align-items: center;">
                                <span class="reviewer-name">Jithin Mohan</span>
                                <span class="verified-badge">
                                    <i class="fas fa-check-circle"></i>
                                    Verified
                                </span>
                            </div>
                            <div style="font-size: 0.85rem; color: var(--text-tertiary); margin-top: 2px;">
                                Systems Analyst, Federal Bank • Aluva, Kerala
                            </div>
                        </div>
                    </div>
                    <span class="stars" style="font-size: 18px;">★★★★☆</span>
                </div>
                <p class="review-content">
                    Very comprehensive course with good content! The projects are practical and industry-relevant. I would have preferred more live sessions, but the recorded content is excellent. The support team is responsive and helpful. Great value for money overall! 👍
                </p>
                <div class="review-footer">
                    <span class="review-date">6 months ago</span>
                    <div class="review-helpful">
                        <button class="helpful-btn">
                            <i class="fas fa-thumbs-up"></i>
                            Helpful
                        </button>
                        <span class="helpful-count">22</span>
                    </div>
                </div>
            </div>

            <!-- Review Card 16 -->
            <div class="ReviewCard">
                <div class="review-header">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div class="reviewer-avatar">LP</div>
                        <div>
                            <div style="display: flex; align-items: center;">
                                <span class="reviewer-name">Lakshmi Priya</span>
                                <span class="verified-badge">
                                    <i class="fas fa-check-circle"></i>
                                    Verified
                                </span>
                            </div>
                            <div style="font-size: 0.85rem; color: var(--text-tertiary); margin-top: 2px;">
                                UI/UX Designer, Experion Technologies • Thiruvananthapuram, Kerala
                            </div>
                        </div>
                    </div>
                    <span class="stars" style="font-size: 18px;">★★★★★</span>
                </div>
                <p class="review-content">
                    Absolutely loved this course! As a designer transitioning into AI, this was perfect for me. The instructor makes complex topics accessible and fun. The community support is amazing. I've already started integrating AI into my design workflow. Fantastic experience! ✨
                </p>
                <div class="review-footer">
                    <span class="review-date">6 months ago</span>
                    <div class="review-helpful">
                        <button class="helpful-btn">
                            <i class="fas fa-thumbs-up"></i>
                            Helpful
                        </button>
                        <span class="helpful-count">30</span>
                    </div>
                </div>
            </div>

            <!-- Review Card 17 -->
            <div class="ReviewCard">
                <div class="review-header">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div class="reviewer-avatar">SK</div>
                        <div>
                            <div style="display: flex; align-items: center;">
                                <span class="reviewer-name">Sreekanth Kumar</span>
                                <span class="verified-badge">
                                    <i class="fas fa-check-circle"></i>
                                    Verified
                                </span>
                            </div>
                            <div style="font-size: 0.85rem; color: var(--text-tertiary); margin-top: 2px;">
                                Cloud Architect, Quest Global • Kochi, Kerala
                            </div>
                        </div>
                    </div>
                    <span class="stars" style="font-size: 18px;">★★★★★</span>
                </div>
                <p class="review-content">
                    Outstanding course that delivers real value! The curriculum is up-to-date with the latest AI trends and technologies. I particularly enjoyed the hands-on projects and case studies. My team at work has benefited from the knowledge I gained here. Highly recommended! 🚀
                </p>
                <div class="review-footer">
                    <span class="review-date">6 months ago</span>
                    <div class="review-helpful">
                        <button class="helpful-btn">
                            <i class="fas fa-thumbs-up"></i>
                            Helpful
                        </button>
                        <span class="helpful-count">27</span>
                    </div>
                </div>
            </div>

            <!-- Review Card 18 -->
            <div class="ReviewCard">
                <div class="review-header">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div class="reviewer-avatar">AP</div>
                        <div>
                            <div style="display: flex; align-items: center;">
                                <span class="reviewer-name">Anitha Prakash</span>
                                <span class="verified-badge">
                                    <i class="fas fa-check-circle"></i>
                                    Verified
                                </span>
                            </div>
                            <div style="font-size: 0.85rem; color: var(--text-tertiary); margin-top: 2px;">
                                Research Analyst, KPMG • Kochi, Kerala
                            </div>
                        </div>
                    </div>
                    <span class="stars" style="font-size: 18px;">★★★★★</span>
                </div>
                <p class="review-content">
                    Phenomenal learning journey! The course structure is logical and easy to follow. The instructor's teaching style is engaging and clear. I've gained practical skills that I use daily in my analytics work. The certificate has been a great addition to my profile. Thank you! 🙏
                </p>
                <div class="review-footer">
                    <span class="review-date">7 months ago</span>
                    <div class="review-helpful">
                        <button class="helpful-btn">
                            <i class="fas fa-thumbs-up"></i>
                            Helpful
                        </button>
                        <span class="helpful-count">25</span>
                    </div>
                </div>
            </div>

            <!-- Review Card 19 -->
            <div class="ReviewCard">
                <div class="review-header">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div class="reviewer-avatar">VR</div>
                        <div>
                            <div style="display: flex; align-items: center;">
                                <span class="reviewer-name">Vineeth Rajan</span>
                                <span class="verified-badge">
                                    <i class="fas fa-check-circle"></i>
                                    Verified
                                </span>
                            </div>
                            <div style="font-size: 0.85rem; color: var(--text-tertiary); margin-top: 2px;">
                                Backend Developer, Robert Bosch • Kozhikode, Kerala
                            </div>
                        </div>
                    </div>
                    <span class="stars" style="font-size: 18px;">★★★★★</span>
                </div>
                <p class="review-content">
                    Best AI course I've taken online! The depth and breadth of content is impressive. The instructor knows how to keep students engaged. The real-world projects helped me build a solid portfolio. I secured a promotion thanks to the skills learned here! Worth every penny! 💯
                </p>
                <div class="review-footer">
                    <span class="review-date">7 months ago</span>
                    <div class="review-helpful">
                        <button class="helpful-btn">
                            <i class="fas fa-thumbs-up"></i>
                            Helpful
                        </button>
                        <span class="helpful-count">34</span>
                    </div>
                </div>
            </div>

            <!-- Review Card 20 -->
            <div class="ReviewCard">
                <div class="review-header">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div class="reviewer-avatar">SM</div>
                        <div>
                            <div style="display: flex; align-items: center;">
                                <span class="reviewer-name">Sindhu Murali</span>
                                <span class="verified-badge">
                                    <i class="fas fa-check-circle"></i>
                                    Verified
                                </span>
                            </div>
                            <div style="font-size: 0.85rem; color: var(--text-tertiary); margin-top: 2px;">
                                HR Manager, Sutherland • Thiruvananthapuram, Kerala
                            </div>
                        </div>
                    </div>
                    <span class="stars" style="font-size: 18px;">★★★★☆</span>
                </div>
                <p class="review-content">
                    Great course for beginners and intermediate learners! The content is well-structured and the pace is comfortable. I appreciated the focus on practical applications. Would love to see more advanced modules in the future. Overall, a solid learning experience that met my expectations! 👌
                </p>
                <div class="review-footer">
                    <span class="review-date">8 months ago</span>
                    <div class="review-helpful">
                        <button class="helpful-btn">
                            <i class="fas fa-thumbs-up"></i>
                            Helpful
                        </button>
                        <span class="helpful-count">20</span>
                    </div>
                </div>
            </div>

            <!-- Review Card 21 -->
            <div class="ReviewCard">
                <div class="review-header">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div class="reviewer-avatar">RN</div>
                        <div>
                            <div style="display: flex; align-items: center;">
                                <span class="reviewer-name">Ranjith Nair</span>
                                <span class="verified-badge">
                                    <i class="fas fa-check-circle"></i>
                                    Verified
                                </span>
                            </div>
                            <div style="font-size: 0.85rem; color: var(--text-tertiary); margin-top: 2px;">
                                Mobile App Developer, Fingent • Kochi, Kerala
                            </div>
                        </div>
                    </div>
                    <span class="stars" style="font-size: 18px;">★★★★★</span>
                </div>
                <p class="review-content">
                    Incredible course with practical insights! The instructor's industry experience really shows through. The projects are challenging but achievable with the guidance provided. I've integrated AI features into my apps successfully. This course opened up new career opportunities for me! 🎯
                </p>
                <div class="review-footer">
                    <span class="review-date">8 months ago</span>
                    <div class="review-helpful">
                        <button class="helpful-btn">
                            <i class="fas fa-thumbs-up"></i>
                            Helpful
                        </button>
                        <span class="helpful-count">32</span>
                    </div>
                </div>
            </div>

            <!-- Review Card 22 -->
            <div class="ReviewCard">
                <div class="review-header">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div class="reviewer-avatar">NK</div>
                        <div>
                            <div style="display: flex; align-items: center;">
                                <span class="reviewer-name">Neethu Krishnan</span>
                                <span class="verified-badge">
                                    <i class="fas fa-check-circle"></i>
                                    Verified
                                </span>
                            </div>
                            <div style="font-size: 0.85rem; color: var(--text-tertiary); margin-top: 2px;">
                                Content Strategist, Stark Communications • Kochi, Kerala
                            </div>
                        </div>
                    </div>
                    <span class="stars" style="font-size: 18px;">★★★★★</span>
                </div>
                <p class="review-content">
                    Transformative learning experience! As someone from a non-tech background, I was hesitant initially. But the instructor makes everything so clear and accessible. I'm now using AI tools confidently in my content work. The community is supportive and inspiring. Highly recommend! ⭐
                </p>
                <div class="review-footer">
                    <span class="review-date">9 months ago</span>
                    <div class="review-helpful">
                        <button class="helpful-btn">
                            <i class="fas fa-thumbs-up"></i>
                            Helpful
                        </button>
                        <span class="helpful-count">28</span>
                    </div>
                </div>
            </div>

            <!-- Review Card 23 -->
            <div class="ReviewCard">
                <div class="review-header">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div class="reviewer-avatar">HG</div>
                        <div>
                            <div style="display: flex; align-items: center;">
                                <span class="reviewer-name">Harish Gopal</span>
                                <span class="verified-badge">
                                    <i class="fas fa-check-circle"></i>
                                    Verified
                                </span>
                            </div>
                            <div style="font-size: 0.85rem; color: var(--text-tertiary); margin-top: 2px;">
                                Solutions Architect, Oracle • Thiruvananthapuram, Kerala
                            </div>
                        </div>
                    </div>
                    <span class="stars" style="font-size: 18px;">★★★★★</span>
                </div>
                <p class="review-content">
                    Exceptional quality throughout! The course covers all essential AI concepts with clarity. The hands-on approach is what sets this apart from other courses. I've applied these learnings to design better solutions at Oracle. The investment has paid off multiple times over! 🔥
                </p>
                <div class="review-footer">
                    <span class="review-date">9 months ago</span>
                    <div class="review-helpful">
                        <button class="helpful-btn">
                            <i class="fas fa-thumbs-up"></i>
                            Helpful
                        </button>
                        <span class="helpful-count">35</span>
                    </div>
                </div>
            </div>

            <!-- Review Card 24 -->
            <div class="ReviewCard">
                <div class="review-header">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div class="reviewer-avatar">PP</div>
                        <div>
                            <div style="display: flex; align-items: center;">
                                <span class="reviewer-name">Pooja Pillai</span>
                                <span class="verified-badge">
                                    <i class="fas fa-check-circle"></i>
                                    Verified
                                </span>
                            </div>
                            <div style="font-size: 0.85rem; color: var(--text-tertiary); margin-top: 2px;">
                                Digital Marketing Manager, Logidots • Kozhikode, Kerala
                            </div>
                        </div>
                    </div>
                    <span class="stars" style="font-size: 18px;">★★★★★</span>
                </div>
                <p class="review-content">
                    Game-changing course for my career! The AI skills I learned have made me invaluable to my organization. The instructor's passion and expertise are evident in every lesson. The practical projects are industry-relevant. This course exceeded all my expectations. Thank you Bheem Academy! 🙏
                </p>
                <div class="review-footer">
                    <span class="review-date">10 months ago</span>
                    <div class="review-helpful">
                        <button class="helpful-btn">
                            <i class="fas fa-thumbs-up"></i>
                            Helpful
                        </button>
                        <span class="helpful-count">37</span>
                    </div>
                </div>
            </div>

            <!-- Review Card 25 -->
            <div class="ReviewCard">
                <div class="review-header">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div class="reviewer-avatar">AS</div>
                        <div>
                            <div style="display: flex; align-items: center;">
                                <span class="reviewer-name">Arun Shankar</span>
                                <span class="verified-badge">
                                    <i class="fas fa-check-circle"></i>
                                    Verified
                                </span>
                            </div>
                            <div style="font-size: 0.85rem; color: var(--text-tertiary); margin-top: 2px;">
                                AI Engineer, Tata Consultancy Services • Kochi, Kerala
                            </div>
                        </div>
                    </div>
                    <span class="stars" style="font-size: 18px;">★★★★★</span>
                </div>
                <p class="review-content">
                    Brilliant course with comprehensive coverage of AI! The teaching methodology is excellent and the content is always current. I've become the go-to AI expert in my team after completing this course. The practical skills and theoretical knowledge balance is perfect. Absolutely worth it! 💪
                </p>
                <div class="review-footer">
                    <span class="review-date">10 months ago</span>
                    <div class="review-helpful">
                        <button class="helpful-btn">
                            <i class="fas fa-thumbs-up"></i>
                            Helpful
                        </button>
                        <span class="helpful-count">40</span>
                    </div>
                </div>
            </div>

            <!-- View More Button -->
            <div style="text-align: center; margin-top: 2rem;">
                <button id="viewMoreReviews" class="view-more-btn">
                    View More Reviews
                    <i class="fas fa-chevron-down"></i>
                </button>
            </div>
        </div>

        <!-- TAB PANEL: FAQ -->
            <!-- FAQ Panel -->
        <div class="tab-panel" id="faq-panel" role="tabpanel" aria-labelledby="tab-faq">
            <h2 style="margin-bottom: 2rem;">❓ Frequently Asked Questions</h2>

                                            <div class="FaqAccordion expanded">
                    <div class="faq-question">
                        <span style="font-weight: 700; color: var(--text-primary);">
                            What AI tools will I learn for content creation?                        </span>
                        <span class="chevron">▼</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            You&#039;ll master AI tools for generating video scripts, creating graphics, editing videos, writing captions, scheduling posts, and analyzing engagement metrics.                        </div>
                    </div>
                </div>
                                <div class="FaqAccordion ">
                    <div class="faq-question">
                        <span style="font-weight: 700; color: var(--text-primary);">
                            Can AI help me grow my audience?                        </span>
                        <span class="chevron">▶</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Absolutely! AI analyzes what content performs best, suggests optimal posting times, helps you understand your audience, and generates viral-worthy content ideas.                        </div>
                    </div>
                </div>
                                <div class="FaqAccordion ">
                    <div class="faq-question">
                        <span style="font-weight: 700; color: var(--text-primary);">
                            Will AI-generated content be unique?                        </span>
                        <span class="chevron">▶</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Yes! We teach you to use AI as a creative partner, not a replacement. Your unique voice and style combined with AI tools creates authentic, original content.                        </div>
                    </div>
                </div>
                                <div class="FaqAccordion ">
                    <div class="faq-question">
                        <span style="font-weight: 700; color: var(--text-primary);">
                            Which platforms does this course cover?                        </span>
                        <span class="chevron">▶</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Instagram, YouTube, Facebook, LinkedIn, TikTok, Twitter/X - we cover AI strategies for all major social platforms.                        </div>
                    </div>
                </div>
                                <div class="FaqAccordion ">
                    <div class="faq-question">
                        <span style="font-weight: 700; color: var(--text-primary);">
                            How quickly can I start creating with AI?                        </span>
                        <span class="chevron">▶</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            You can create your first AI-powered content within the first week! We provide templates and step-by-step workflows for immediate results.                        </div>
                    </div>
                </div>
                                <div class="FaqAccordion ">
                    <div class="faq-question">
                        <span style="font-weight: 700; color: var(--text-primary);">
                            Can AI create video content for YouTube and TikTok?                        </span>
                        <span class="chevron">▶</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Yes! AI can generate scripts, create voiceovers, edit videos, add captions, suggest trending topics, and even create thumbnail images - all optimized for each platform.                        </div>
                    </div>
                </div>
                                <div class="FaqAccordion ">
                    <div class="faq-question">
                        <span style="font-weight: 700; color: var(--text-primary);">
                            Will AI help me come up with content ideas?                        </span>
                        <span class="chevron">▶</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Definitely! AI analyzes trending topics, competitor content, audience interests, and seasonal trends to suggest content ideas that are likely to perform well.                        </div>
                    </div>
                </div>
                                <div class="FaqAccordion ">
                    <div class="faq-question">
                        <span style="font-weight: 700; color: var(--text-primary);">
                            Can AI help with SEO and hashtags?                        </span>
                        <span class="chevron">▶</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Absolutely! AI researches optimal keywords, generates relevant hashtags, optimizes titles and descriptions, and suggests tags to maximize discoverability and reach.                        </div>
                    </div>
                </div>
                                <div class="FaqAccordion ">
                    <div class="faq-question">
                        <span style="font-weight: 700; color: var(--text-primary);">
                            How does AI help with content consistency?                        </span>
                        <span class="chevron">▶</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            AI helps maintain your posting schedule, ensures brand voice consistency, batch-creates content for the month, and reminds you of important dates and trends.                        </div>
                    </div>
                </div>
                                <div class="FaqAccordion ">
                    <div class="faq-question">
                        <span style="font-weight: 700; color: var(--text-primary);">
                            Can I monetize AI-created content?                        </span>
                        <span class="chevron">▶</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Yes! AI-assisted content is yours to monetize. We teach you how to use AI ethically while maintaining authenticity, which is key for brand partnerships and ad revenue.                        </div>
                    </div>
                </div>
                                <div class="FaqAccordion ">
                    <div class="faq-question">
                        <span style="font-weight: 700; color: var(--text-primary);">
                            Will AI help with responding to comments and DMs?                        </span>
                        <span class="chevron">▶</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Yes! AI can draft personalized responses, filter spam, prioritize important messages, suggest engagement strategies, and help you interact authentically with your community at scale.                        </div>
                    </div>
                </div>
                                <div class="FaqAccordion ">
                    <div class="faq-question">
                        <span style="font-weight: 700; color: var(--text-primary);">
                            Can AI help me analyze competitor strategies?                        </span>
                        <span class="chevron">▶</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Absolutely! AI analyzes competitor content, identifies what works in your niche, tracks trending formats, and provides insights to help you stay ahead of the curve.                        </div>
                    </div>
                </div>
                                <div class="FaqAccordion ">
                    <div class="faq-question">
                        <span style="font-weight: 700; color: var(--text-primary);">
                            How does AI help with brand partnerships and sponsorships?                        </span>
                        <span class="chevron">▶</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            AI helps create media kits, analyzes your metrics for pitch decks, drafts collaboration emails, negotiates rates based on industry standards, and tracks partnership ROI.                        </div>
                    </div>
                </div>
                                    </div>


        </div><!-- End tab-panels-container -->

    </div>

    <!-- Right Panel -->
    <div class="right-panel">

        <!-- CTA Card -->
        <div class="cta-card reveal border-shine">
            <!-- Premium Badge -->
            <div class="cta-badge">
                <i class="fas fa-crown"></i>
                <span>Premium Course</span>
            </div>

            <!-- Pricing Section -->
                            <!-- Guest Login Prompt -->
                <div class="cta-price" style="background: linear-gradient(135deg, rgba(139, 92, 246, 0.08), rgba(236, 72, 153, 0.06)); border-bottom: 1px solid rgba(139, 92, 246, 0.15);">
                    <div style="text-align: center; padding: 16px 14px;">
                        <div style="font-size: 2.5rem; margin-bottom: 12px;">🔒</div>
                        <h3 style="font-size: 1.1rem; font-weight: 700; color: #8B5CF6; margin-bottom: 8px;">Exclusive Pricing Inside</h3>
                        <p style="font-size: 0.85rem; color: var(--text-secondary); margin: 0; line-height: 1.5;">Login to unlock special offers and course pricing</p>
                    </div>
                </div>

                <!-- Guest CTA Button -->
                <a href="/login/index.php?wantsurl=https%3A%2F%2Fdev.bheem.cloud%2Fmy-course.php%3Fid%3D37" class="cta-button cta-primary">
                    <span class="cta-button-icon"><i class="fas fa-sign-in-alt"></i></span>
                    <span class="cta-button-text">Login to View Pricing</span>
                    <span class="cta-button-arrow"><i class="fas fa-arrow-right"></i></span>
                </a>
            
            <!-- Separator -->
            <div class="cta-divider">
                <span>What's Included</span>
            </div>

            <!-- Features Grid -->
            <div class="features-list">
                <div class="feature-item">
                    <i class="fas fa-infinity feature-icon"></i>
                    <span>Lifetime Access</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-certificate feature-icon"></i>
                    <span>Certificate</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-headset feature-icon"></i>
                    <span>Expert Support</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-shield-alt feature-icon"></i>
                    <span>7-Day Guarantee</span>
                </div>
            </div>

            <!-- Trust Badge -->
            <div class="cta-trust-badge">
                <i class="fas fa-lock"></i>
                <span>Secure Enrollment · Instant Access</span>
            </div>
        </div>

        <!-- Promotional Tabs Container -->
        <div class="promo-tabs-container">
            <div class="promo-tabs-header">
                <button class="promo-tab active" data-promo="bheemflow">
                    <i class="fas fa-magic"></i>
                    <span>Create</span>
                </button>
                <button class="promo-tab" data-promo="community">
                    <i class="fas fa-comments"></i>
                    <span>Promote</span>
                </button>
                <button class="promo-tab" data-promo="bheemcloud">
                    <i class="fas fa-cloud"></i>
                    <span>Manage</span>
                </button>
                <button class="promo-tab" data-promo="marketplace">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Earn</span>
                </button>
            </div>

            <div class="promo-tabs-content">
                <!-- BheemFlow Tab -->
                <div class="promo-tab-panel active" id="promo-bheemflow">

        <!-- BheemFlow Card -->
        <div class="promo-card bheemflow-card" style="
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.08) 0%, rgba(124, 58, 237, 0.12) 100%);
            border: 1px solid rgba(139, 92, 246, 0.2);
            border-radius: 20px;
            padding: 1rem;
            margin-top: 1.5rem;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 8px 32px rgba(139, 92, 246, 0.1);
            position: relative;
            overflow: hidden;
        ">
            <!-- Animated Background Gradient -->
            <div style="
                position: absolute;
                top: -50%;
                right: -50%;
                width: 200%;
                height: 200%;
                background: radial-gradient(circle, rgba(139, 92, 246, 0.15) 0%, transparent 70%);
                animation: floatOrb 8s ease-in-out infinite;
                pointer-events: none;
            "></div>

            <!-- Content -->
            <div style="position: relative; z-index: 1;">
                <!-- Badge -->
                <div style="
                    display: inline-block;
                    padding: 0.3rem 0.8rem;
                    background: linear-gradient(135deg, rgba(139, 92, 246, 0.2) 0%, rgba(124, 58, 237, 0.2) 100%);
                    border-radius: 50px;
                    margin-bottom: 0.75rem;
                    border: 1px solid rgba(139, 92, 246, 0.3);
                    font-family: 'Inter', sans-serif;
                    font-weight: 700;
                    font-size: 0.7rem;
                    color: #8b5cf6;
                    letter-spacing: 1px;
                ">
                    ✨ CREATE
                </div>

                <!-- Title -->
                <h3 style="
                    font-family: 'Orbitron', sans-serif;
                    font-size: 1.3rem;
                    font-weight: 700;
                    margin-bottom: 0.5rem;
                    background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                    background-clip: text;
                ">
                    BheemFlow
                </h3>

                <!-- Description -->
                <p style="
                    color: var(--text-secondary);
                    font-size: 0.85rem;
                    line-height: 1.6;
                    margin-bottom: 1rem;
                    font-family: 'Inter', sans-serif;
                ">
                    Create powerful workflows visually. Design, build and launch with drag-and-drop simplicity.
                </p>

                <!-- Features List -->
                <div style="
                    display: flex;
                    flex-direction: column;
                    gap: 0.6rem;
                    margin-bottom: 1rem;
                ">
                    <div style="
                        display: flex;
                        align-items: center;
                        gap: 0.6rem;
                        color: var(--text-secondary);
                        font-size: 0.8rem;
                    ">
                        <div style="
                            width: 24px;
                            height: 24px;
                            min-width: 24px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            background: rgba(139, 92, 246, 0.12);
                            border-radius: 6px;
                        ">
                            <i class="fas fa-wand-magic-sparkles" style="color: #8b5cf6; font-size: 0.7rem;"></i>
                        </div>
                        <span style="font-weight: 500;">Visual workflow builder</span>
                    </div>
                    <div style="
                        display: flex;
                        align-items: center;
                        gap: 0.6rem;
                        color: var(--text-secondary);
                        font-size: 0.8rem;
                    ">
                        <div style="
                            width: 24px;
                            height: 24px;
                            min-width: 24px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            background: rgba(139, 92, 246, 0.12);
                            border-radius: 6px;
                        ">
                            <i class="fas fa-plug" style="color: #8b5cf6; font-size: 0.7rem;"></i>
                        </div>
                        <span style="font-weight: 500;">50+ integrations & tools</span>
                    </div>
                    <div style="
                        display: flex;
                        align-items: center;
                        gap: 0.6rem;
                        color: var(--text-secondary);
                        font-size: 0.8rem;
                    ">
                        <div style="
                            width: 24px;
                            height: 24px;
                            min-width: 24px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            background: rgba(139, 92, 246, 0.12);
                            border-radius: 6px;
                        ">
                            <i class="fas fa-bolt" style="color: #8b5cf6; font-size: 0.7rem;"></i>
                        </div>
                        <span style="font-weight: 500;">Deploy in minutes</span>
                    </div>
                </div>

                <!-- Key Points Highlight -->
                <div style="
                    background: linear-gradient(135deg, rgba(139, 92, 246, 0.1), rgba(236, 72, 153, 0.08));
                    border: 1.5px solid rgba(139, 92, 246, 0.2);
                    border-radius: 12px;
                    padding: 1rem;
                    margin-bottom: 1rem;
                ">
                    <div style="
                        font-size: 0.7rem;
                        font-weight: 700;
                        color: #8b5cf6;
                        text-transform: uppercase;
                        letter-spacing: 1px;
                        margin-bottom: 0.75rem;
                        display: flex;
                        align-items: center;
                        gap: 0.5rem;
                    ">
                        <i class="fas fa-sparkles" style="font-size: 0.8rem;"></i>
                        Key Highlights
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                        <div class="highlight-text" style="
                            font-size: 0.8rem;
                            padding: 0.4rem 0.6rem;
                            border-radius: 6px;
                            font-weight: 600;
                        ">
                            <i class="fas fa-check-circle" style="color: #10b981; margin-right: 0.4rem; font-size: 0.7rem;"></i>
                            100+ Ready-to-use Templates
                        </div>
                        <div class="highlight-text" style="
                            font-size: 0.8rem;
                            padding: 0.4rem 0.6rem;
                            border-radius: 6px;
                            font-weight: 600;
                        ">
                            <i class="fas fa-check-circle" style="color: #10b981; margin-right: 0.4rem; font-size: 0.7rem;"></i>
                            No Coding Skills Required
                        </div>
                        <div class="highlight-text" style="
                            font-size: 0.8rem;
                            padding: 0.4rem 0.6rem;
                            border-radius: 6px;
                            font-weight: 600;
                        ">
                            <i class="fas fa-check-circle" style="color: #10b981; margin-right: 0.4rem; font-size: 0.7rem;"></i>
                            Deploy Instantly & Scale
                        </div>
                    </div>
                </div>

                <!-- CTA Button -->
                <a href="/local/workflowdesigner/modules/dashboard/"
                   target="_blank"
                   class="bheemflow-cta-button"
                   style="
                    display: block;
                    width: 100%;
                    padding: 0.75rem;
                    background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
                    color: white;
                    text-align: center;
                    border-radius: 12px;
                    font-weight: 700;
                    font-size: 0.9rem;
                    font-family: 'Inter', sans-serif;
                    text-decoration: none;
                    box-shadow: 0 4px 16px rgba(139, 92, 246, 0.3);
                    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                    position: relative;
                    overflow: hidden;
                ">
                    <i class="fas fa-magic" style="margin-right: 8px;"></i>
                    Launch BheemFlow
                </a>
            </div>
        </div>
                </div>
                <!-- End BheemFlow Tab -->

                <!-- Community Tab -->
                <div class="promo-tab-panel" id="promo-community">

        <!-- Buzz Central Community Card -->
        <div class="promo-card buzz-central-card reveal" style="
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.08) 0%, rgba(99, 102, 241, 0.12) 100%);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 20px;
            padding: 1.75rem;
            margin-top: 1.5rem;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 8px 32px rgba(59, 130, 246, 0.1);
            position: relative;
            overflow: hidden;
        ">
            <!-- Animated Background Gradient -->
            <div style="
                position: absolute;
                top: -50%;
                right: -50%;
                width: 200%;
                height: 200%;
                background: radial-gradient(circle, rgba(59, 130, 246, 0.15) 0%, transparent 70%);
                animation: floatOrb 8s ease-in-out infinite;
                pointer-events: none;
            "></div>

            <!-- Content -->
            <div style="position: relative; z-index: 1;">
                <!-- Badge -->
                <div style="
                    display: inline-block;
                    padding: 0.4rem 1rem;
                    background: linear-gradient(135deg, rgba(59, 130, 246, 0.2) 0%, rgba(99, 102, 241, 0.2) 100%);
                    border-radius: 50px;
                    margin-bottom: 1rem;
                    border: 1px solid rgba(59, 130, 246, 0.3);
                    font-family: 'Inter', sans-serif;
                    font-weight: 700;
                    font-size: 0.75rem;
                    color: #3b82f6;
                    letter-spacing: 1px;
                ">
                    💬 PROMOTE
                </div>

                <!-- Title -->
                <h3 style="
                    font-family: 'Orbitron', sans-serif;
                    font-size: 1.5rem;
                    font-weight: 700;
                    margin-bottom: 0.75rem;
                    background: linear-gradient(135deg, #3b82f6 0%, #6366f1 100%);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                    background-clip: text;
                ">
                    Join Buzz Central
                </h3>

                <!-- Description -->
                <p style="
                    color: var(--text-secondary);
                    line-height: 1.6;
                    margin-bottom: 1.25rem;
                    font-size: 0.95rem;
                ">
                    Connect with 5,000+ AI learners. Share projects, get feedback, and grow together.
                </p>

                <!-- Stats Grid -->
                <div style="
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    gap: 0.75rem;
                    margin-bottom: 1.25rem;
                ">
                    <div style="
                        background: rgba(59, 130, 246, 0.08);
                        padding: 0.75rem;
                        border-radius: 12px;
                        text-align: center;
                        border: 1px solid rgba(59, 130, 246, 0.15);
                    ">
                        <div style="
                            font-family: 'Orbitron', sans-serif;
                            font-size: 1.5rem;
                            font-weight: 700;
                            color: #3b82f6;
                            margin-bottom: 0.25rem;
                        ">5K+</div>
                        <div style="
                            font-size: 0.75rem;
                            color: var(--text-secondary);
                            font-weight: 600;
                        ">Members</div>
                    </div>
                    <div style="
                        background: rgba(99, 102, 241, 0.08);
                        padding: 0.75rem;
                        border-radius: 12px;
                        text-align: center;
                        border: 1px solid rgba(99, 102, 241, 0.15);
                    ">
                        <div style="
                            font-family: 'Orbitron', sans-serif;
                            font-size: 1.5rem;
                            font-weight: 700;
                            color: #6366f1;
                            margin-bottom: 0.25rem;
                        ">500+</div>
                        <div style="
                            font-size: 0.75rem;
                            color: var(--text-secondary);
                            font-weight: 600;
                        ">Projects Shared</div>
                    </div>
                </div>

                <!-- Key Points Highlight -->
                <div style="
                    background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(99, 102, 241, 0.08));
                    border: 1.5px solid rgba(59, 130, 246, 0.2);
                    border-radius: 12px;
                    padding: 1rem;
                    margin-bottom: 1.25rem;
                ">
                    <div style="
                        font-size: 0.7rem;
                        font-weight: 700;
                        color: #3b82f6;
                        text-transform: uppercase;
                        letter-spacing: 1px;
                        margin-bottom: 0.75rem;
                        display: flex;
                        align-items: center;
                        gap: 0.5rem;
                    ">
                        <i class="fas fa-sparkles" style="font-size: 0.8rem;"></i>
                        Why Join Us
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                        <div class="highlight-accent" style="
                            font-size: 0.8rem;
                            padding: 0.4rem 0.6rem;
                            border-radius: 6px;
                            font-weight: 600;
                        ">
                            <i class="fas fa-users" style="color: #3b82f6; margin-right: 0.4rem; font-size: 0.7rem;"></i>
                            Connect with 5,000+ AI Learners
                        </div>
                        <div class="highlight-accent" style="
                            font-size: 0.8rem;
                            padding: 0.4rem 0.6rem;
                            border-radius: 6px;
                            font-weight: 600;
                        ">
                            <i class="fas fa-rocket" style="color: #3b82f6; margin-right: 0.4rem; font-size: 0.7rem;"></i>
                            Share Projects & Get Feedback
                        </div>
                        <div class="highlight-accent" style="
                            font-size: 0.8rem;
                            padding: 0.4rem 0.6rem;
                            border-radius: 6px;
                            font-weight: 600;
                        ">
                            <i class="fas fa-trophy" style="color: #3b82f6; margin-right: 0.4rem; font-size: 0.7rem;"></i>
                            Exclusive Events & Challenges
                        </div>
                    </div>
                </div>

                <!-- CTA Button -->
                <a href="https://aibuzzcentral.bheem.co.uk/" target="_blank" rel="noopener noreferrer" class="buzz-cta-button" style="
                    display: block;
                    width: 100%;
                    padding: 1rem;
                    background: linear-gradient(135deg, #3b82f6 0%, #6366f1 100%);
                    color: white;
                    text-align: center;
                    border-radius: 12px;
                    font-family: 'Inter', sans-serif;
                    font-weight: 700;
                    font-size: 1rem;
                    text-decoration: none;
                    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                    box-shadow: 0 4px 16px rgba(59, 130, 246, 0.25);
                    position: relative;
                    overflow: hidden;
                ">
                    <span style="position: relative; z-index: 1;">
                        <i class="fas fa-comments" style="margin-right: 8px;"></i>
                        Join Community
                    </span>
                </a>
            </div>
        </div>
                </div>
                <!-- End Community Tab -->

                <!-- Marketplace Tab -->
                <div class="promo-tab-panel" id="promo-marketplace">

        <!-- Marketplace Card -->
        <div class="promo-card marketplace-card reveal" style="
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.08) 0%, rgba(251, 146, 60, 0.12) 100%);
            border: 1px solid rgba(245, 158, 11, 0.2);
            border-radius: 20px;
            padding: 1.75rem;
            margin-top: 1.5rem;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 8px 32px rgba(245, 158, 11, 0.1);
            position: relative;
            overflow: hidden;
        ">
            <!-- Animated Background Gradient -->
            <div style="
                position: absolute;
                top: -50%;
                left: -50%;
                width: 200%;
                height: 200%;
                background: radial-gradient(circle, rgba(245, 158, 11, 0.15) 0%, transparent 70%);
                animation: floatOrb 10s ease-in-out infinite;
                pointer-events: none;
            "></div>

            <!-- Content -->
            <div style="position: relative; z-index: 1;">
                <!-- Badge -->
                <div style="
                    display: inline-block;
                    padding: 0.4rem 1rem;
                    background: linear-gradient(135deg, rgba(245, 158, 11, 0.2) 0%, rgba(251, 146, 60, 0.2) 100%);
                    border-radius: 50px;
                    margin-bottom: 1rem;
                    border: 1px solid rgba(245, 158, 11, 0.3);
                    font-family: 'Inter', sans-serif;
                    font-weight: 700;
                    font-size: 0.75rem;
                    color: #f59e0b;
                    letter-spacing: 1px;
                ">
                    💰 EARN
                </div>

                <!-- Title -->
                <h3 style="
                    font-family: 'Orbitron', sans-serif;
                    font-size: 1.5rem;
                    font-weight: 700;
                    margin-bottom: 0.75rem;
                    background: linear-gradient(135deg, #f59e0b 0%, #fb923c 100%);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                    background-clip: text;
                ">
                    Bheem Marketplace
                </h3>

                <!-- Description -->
                <p style="
                    color: var(--text-secondary);
                    line-height: 1.6;
                    margin-bottom: 1.25rem;
                    font-size: 0.95rem;
                ">
                    Monetize your AI skills. Sell projects, offer services, and start earning today.
                </p>

                <!-- Stats Grid -->
                <div style="
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    gap: 0.75rem;
                    margin-bottom: 1.25rem;
                ">
                    <div style="
                        background: rgba(245, 158, 11, 0.08);
                        padding: 0.75rem;
                        border-radius: 12px;
                        text-align: center;
                        border: 1px solid rgba(245, 158, 11, 0.15);
                    ">
                        <div style="
                            font-family: 'Orbitron', sans-serif;
                            font-size: 1.5rem;
                            font-weight: 700;
                            color: #f59e0b;
                            margin-bottom: 0.25rem;
                        ">$50K+</div>
                        <div style="
                            font-size: 0.75rem;
                            color: var(--text-secondary);
                            font-weight: 600;
                        ">Student Earnings</div>
                    </div>
                    <div style="
                        background: rgba(251, 146, 60, 0.08);
                        padding: 0.75rem;
                        border-radius: 12px;
                        text-align: center;
                        border: 1px solid rgba(251, 146, 60, 0.15);
                    ">
                        <div style="
                            font-family: 'Orbitron', sans-serif;
                            font-size: 1.5rem;
                            font-weight: 700;
                            color: #fb923c;
                            margin-bottom: 0.25rem;
                        ">200+</div>
                        <div style="
                            font-size: 0.75rem;
                            color: var(--text-secondary);
                            font-weight: 600;
                        ">Active Sellers</div>
                    </div>
                </div>

                <!-- Key Points Highlight -->
                <div style="
                    background: linear-gradient(135deg, rgba(245, 158, 11, 0.1), rgba(251, 146, 60, 0.08));
                    border: 1.5px solid rgba(245, 158, 11, 0.2);
                    border-radius: 12px;
                    padding: 1rem;
                    margin-bottom: 1.25rem;
                ">
                    <div style="
                        font-size: 0.7rem;
                        font-weight: 700;
                        color: #f59e0b;
                        text-transform: uppercase;
                        letter-spacing: 1px;
                        margin-bottom: 0.75rem;
                        display: flex;
                        align-items: center;
                        gap: 0.5rem;
                    ">
                        <i class="fas fa-sparkles" style="font-size: 0.8rem;"></i>
                        Start Earning Today
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                        <div class="highlight-premium" style="
                            font-size: 0.8rem;
                            padding: 0.4rem 0.6rem;
                            border-radius: 6px;
                            font-weight: 600;
                        ">
                            <i class="fas fa-dollar-sign" style="color: #f59e0b; margin-right: 0.4rem; font-size: 0.7rem;"></i>
                            Sell Projects & AI Solutions
                        </div>
                        <div class="highlight-premium" style="
                            font-size: 0.8rem;
                            padding: 0.4rem 0.6rem;
                            border-radius: 6px;
                            font-weight: 600;
                        ">
                            <i class="fas fa-handshake" style="color: #f59e0b; margin-right: 0.4rem; font-size: 0.7rem;"></i>
                            Offer Freelance Services
                        </div>
                        <div class="highlight-premium" style="
                            font-size: 0.8rem;
                            padding: 0.4rem 0.6rem;
                            border-radius: 6px;
                            font-weight: 600;
                        ">
                            <i class="fas fa-chart-line" style="color: #f59e0b; margin-right: 0.4rem; font-size: 0.7rem;"></i>
                            Zero Commission on First Sale
                        </div>
                    </div>
                </div>

                <!-- CTA Button -->
                <a href="https://marketplace.bheem.co.uk/" target="_blank" rel="noopener noreferrer" class="marketplace-cta-button" style="
                    display: block;
                    width: 100%;
                    padding: 1rem;
                    background: linear-gradient(135deg, #f59e0b 0%, #fb923c 100%);
                    color: white;
                    text-align: center;
                    border-radius: 12px;
                    font-family: 'Inter', sans-serif;
                    font-weight: 700;
                    font-size: 1rem;
                    text-decoration: none;
                    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                    box-shadow: 0 4px 16px rgba(245, 158, 11, 0.25);
                    position: relative;
                    overflow: hidden;
                ">
                    <span style="position: relative; z-index: 1;">
                        <i class="fas fa-store" style="margin-right: 8px;"></i>
                        Browse Marketplace
                    </span>
                </a>

                <!-- Trending Badge -->
                <div style="
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin-top: 1rem;
                    padding: 0.5rem;
                    background: rgba(245, 158, 11, 0.05);
                    border-radius: 8px;
                    gap: 0.5rem;
                ">
                    <i class="fas fa-fire" style="color: #f59e0b; font-size: 0.9rem;"></i>
                    <span style="
                        font-size: 0.85rem;
                        color: var(--text-secondary);
                        font-weight: 600;
                    ">15 new listings this week</span>
                </div>
            </div>
        </div>
                </div>
                <!-- End Marketplace Tab -->

                <!-- Bheem Cloud Tab -->
                <div class="promo-tab-panel" id="promo-bheemcloud">

        <!-- Bheem Cloud Card -->
        <div class="promo-card bheemcloud-card reveal" style="
            background: linear-gradient(135deg, rgba(14, 165, 233, 0.08) 0%, rgba(6, 182, 212, 0.12) 100%);
            border: 1px solid rgba(14, 165, 233, 0.2);
            border-radius: 20px;
            padding: 1.75rem;
            margin-top: 1.5rem;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 8px 32px rgba(14, 165, 233, 0.1);
            position: relative;
            overflow: hidden;
        ">
            <!-- Animated Background Gradient -->
            <div style="
                position: absolute;
                top: -50%;
                right: -50%;
                width: 200%;
                height: 200%;
                background: radial-gradient(circle, rgba(14, 165, 233, 0.15) 0%, transparent 70%);
                animation: floatOrb 8s ease-in-out infinite;
                pointer-events: none;
            "></div>

            <!-- Content -->
            <div style="position: relative; z-index: 1;">
                <!-- Badge -->
                <div style="
                    display: inline-block;
                    padding: 0.4rem 1rem;
                    background: linear-gradient(135deg, rgba(14, 165, 233, 0.2) 0%, rgba(6, 182, 212, 0.2) 100%);
                    border-radius: 50px;
                    margin-bottom: 1rem;
                    border: 1px solid rgba(14, 165, 233, 0.3);
                    font-family: 'Inter', sans-serif;
                    font-weight: 700;
                    font-size: 0.75rem;
                    color: #0ea5e9;
                    letter-spacing: 1px;
                ">
                    ☁️ MANAGE
                </div>

                <!-- Title -->
                <h3 style="
                    font-family: 'Orbitron', sans-serif;
                    font-size: 1.5rem;
                    font-weight: 700;
                    margin-bottom: 0.75rem;
                    background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                    background-clip: text;
                ">
                    Bheem Cloud
                </h3>

                <!-- Description -->
                <p style="
                    color: var(--text-secondary);
                    line-height: 1.6;
                    margin-bottom: 1.25rem;
                    font-size: 0.95rem;
                ">
                    Deploy, scale, and manage your AI projects with enterprise-grade cloud infrastructure.
                </p>

                <!-- Stats Grid -->
                <div style="
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    gap: 0.75rem;
                    margin-bottom: 1.25rem;
                ">
                    <div style="
                        background: rgba(14, 165, 233, 0.08);
                        padding: 0.75rem;
                        border-radius: 12px;
                        text-align: center;
                        border: 1px solid rgba(14, 165, 233, 0.15);
                    ">
                        <div style="
                            font-family: 'Orbitron', sans-serif;
                            font-size: 1.5rem;
                            font-weight: 700;
                            color: #0ea5e9;
                            margin-bottom: 0.25rem;
                        ">99.9%</div>
                        <div style="
                            font-size: 0.75rem;
                            color: var(--text-secondary);
                            font-weight: 600;
                        ">Uptime</div>
                    </div>
                    <div style="
                        background: rgba(6, 182, 212, 0.08);
                        padding: 0.75rem;
                        border-radius: 12px;
                        text-align: center;
                        border: 1px solid rgba(6, 182, 212, 0.15);
                    ">
                        <div style="
                            font-family: 'Orbitron', sans-serif;
                            font-size: 1.5rem;
                            font-weight: 700;
                            color: #06b6d4;
                            margin-bottom: 0.25rem;
                        ">10TB</div>
                        <div style="
                            font-size: 0.75rem;
                            color: var(--text-secondary);
                            font-weight: 600;
                        ">Free Storage</div>
                    </div>
                </div>

                <!-- Key Points Highlight -->
                <div style="
                    background: linear-gradient(135deg, rgba(14, 165, 233, 0.1), rgba(6, 182, 212, 0.08));
                    border: 1.5px solid rgba(14, 165, 233, 0.2);
                    border-radius: 12px;
                    padding: 1rem;
                    margin-bottom: 1.25rem;
                ">
                    <div style="
                        font-size: 0.7rem;
                        font-weight: 700;
                        color: #0ea5e9;
                        text-transform: uppercase;
                        letter-spacing: 1px;
                        margin-bottom: 0.75rem;
                        display: flex;
                        align-items: center;
                        gap: 0.5rem;
                    ">
                        <i class="fas fa-sparkles" style="font-size: 0.8rem;"></i>
                        Cloud Features
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                        <div class="highlight-text" style="
                            font-size: 0.8rem;
                            padding: 0.4rem 0.6rem;
                            border-radius: 6px;
                            font-weight: 600;
                        ">
                            <i class="fas fa-check-circle" style="color: #10b981; margin-right: 0.4rem; font-size: 0.7rem;"></i>
                            One-Click Deployments
                        </div>
                        <div class="highlight-text" style="
                            font-size: 0.8rem;
                            padding: 0.4rem 0.6rem;
                            border-radius: 6px;
                            font-weight: 600;
                        ">
                            <i class="fas fa-check-circle" style="color: #10b981; margin-right: 0.4rem; font-size: 0.7rem;"></i>
                            Auto-Scaling Infrastructure
                        </div>
                        <div class="highlight-text" style="
                            font-size: 0.8rem;
                            padding: 0.4rem 0.6rem;
                            border-radius: 6px;
                            font-weight: 600;
                        ">
                            <i class="fas fa-check-circle" style="color: #10b981; margin-right: 0.4rem; font-size: 0.7rem;"></i>
                            Built-in CI/CD Pipeline
                        </div>
                    </div>
                </div>

                <!-- CTA Button -->
                <a href="https://bheem.cloud/"
                   target="_blank"
                   class="bheemcloud-cta-button"
                   style="
                    display: block;
                    width: 100%;
                    padding: 0.9rem;
                    background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%);
                    color: white;
                    text-align: center;
                    border-radius: 12px;
                    font-weight: 700;
                    font-size: 0.95rem;
                    font-family: 'Inter', sans-serif;
                    text-decoration: none;
                    box-shadow: 0 4px 16px rgba(14, 165, 233, 0.3);
                    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                    position: relative;
                    overflow: hidden;
                ">
                    <span style="position: relative; z-index: 1;">
                        <i class="fas fa-cloud" style="margin-right: 8px;"></i>
                        Access Bheem Cloud
                    </span>
                </a>

                <!-- Info Badge -->
                <div style="
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin-top: 1rem;
                    padding: 0.5rem;
                    background: rgba(14, 165, 233, 0.05);
                    border-radius: 8px;
                    gap: 0.5rem;
                ">
                    <i class="fas fa-rocket" style="color: #0ea5e9; font-size: 0.9rem;"></i>
                    <span style="
                        font-size: 0.85rem;
                        color: var(--text-secondary);
                        font-weight: 600;
                    ">Deploy your first app in under 5 minutes</span>
                </div>
            </div>
        </div>
                </div>
                <!-- End Bheem Cloud Tab -->

            </div>
            <!-- End Promo Tabs Content -->
        </div>
        <!-- End Promo Tabs Container -->

    </div>
    <!-- End Right Panel -->

</div>
<!-- End Course Grid -->

<!-- Vue Footer Modern -->
<footer class="vue-footer-modern" id="footerApp" data-v-app="">
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
            <div class="ticker-item">
                <i class="fas fa-circle pulse ticker-icon"></i>
                <span class="ticker-label">Live:</span>
                <span class="ticker-value">342 students online</span>
            </div>
            <div class="ticker-item">
                <i class="fas fa-graduation-cap ticker-icon"></i>
                <span class="ticker-label">New:</span>
                <span class="ticker-value">Advanced Prompt Engineering</span>
            </div>
            <div class="ticker-item">
                <i class="fas fa-trophy ticker-icon"></i>
                <span class="ticker-label">Achievement:</span>
                <span class="ticker-value">Sarah completed AI Fundamentals</span>
            </div>
            <div class="ticker-item">
                <i class="fas fa-fire ticker-icon"></i>
                <span class="ticker-label">Trending:</span>
                <span class="ticker-value">LLaMA Fine-tuning Workshop</span>
            </div>
            <div class="ticker-item">
                <i class="fas fa-star ticker-icon"></i>
                <span class="ticker-label">Milestone:</span>
                <span class="ticker-value">10K+ certificates issued</span>
            </div>
            <div class="ticker-item">
                <i class="fas fa-rocket ticker-icon"></i>
                <span class="ticker-label">Launch:</span>
                <span class="ticker-value">Neural Networks Masterclass</span>
            </div>
            <!-- Duplicate for seamless loop -->
            <div class="ticker-item">
                <i class="fas fa-circle pulse ticker-icon"></i>
                <span class="ticker-label">Live:</span>
                <span class="ticker-value">342 students online</span>
            </div>
            <div class="ticker-item">
                <i class="fas fa-graduation-cap ticker-icon"></i>
                <span class="ticker-label">New:</span>
                <span class="ticker-value">Advanced Prompt Engineering</span>
            </div>
            <div class="ticker-item">
                <i class="fas fa-trophy ticker-icon"></i>
                <span class="ticker-label">Achievement:</span>
                <span class="ticker-value">Sarah completed AI Fundamentals</span>
            </div>
            <div class="ticker-item">
                <i class="fas fa-fire ticker-icon"></i>
                <span class="ticker-label">Trending:</span>
                <span class="ticker-value">LLaMA Fine-tuning Workshop</span>
            </div>
            <div class="ticker-item">
                <i class="fas fa-star ticker-icon"></i>
                <span class="ticker-label">Milestone:</span>
                <span class="ticker-value">10K+ certificates issued</span>
            </div>
            <div class="ticker-item">
                <i class="fas fa-rocket ticker-icon"></i>
                <span class="ticker-label">Launch:</span>
                <span class="ticker-value">Neural Networks Masterclass</span>
            </div>
        </div>
    </div>

    <!-- Dynamic Stats Section -->
    <div class="stats-section">
        <div class="stats-container">
            <div class="stats-grid">
                <div class="stat-card">
                    <i class="fas fa-users stat-icon"></i>
                    <div class="stat-value" style="transform: scale(1);">15,000+</div>
                    <div class="stat-label">Active Learners</div>
                </div>
                <div class="stat-card">
                    <i class="fas fa-book-open stat-icon"></i>
                    <div class="stat-value" style="transform: scale(1);">250+</div>
                    <div class="stat-label">AI Courses</div>
                </div>
                <div class="stat-card">
                    <i class="fas fa-certificate stat-icon"></i>
                    <div class="stat-value" style="transform: scale(1);">8,500+</div>
                    <div class="stat-label">Certificates</div>
                </div>
                <div class="stat-card">
                    <i class="fas fa-star stat-icon"></i>
                    <div class="stat-value" style="transform: scale(1);">98%</div>
                    <div class="stat-label">Success Rate</div>
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
                        <img src="/pluginfile.php?file=%2F1%2Ftheme_bheem%2Fmain_footer_logo%2F-1%2Fflogo.png" alt="Bheem Academy" class="footer-logo">
                    </div>
                    <p class="brand-tagline">Revolutionizing AI education for all ages. From curious 8-year-olds to experienced professionals in their 80s.</p>
                    <div class="social-links">
                        <a href="https://www.facebook.com/bheemacademy" title="Facebook" target="_blank" rel="noopener noreferrer" class="social-link">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/bheemacademy" title="Twitter" target="_blank" rel="noopener noreferrer" class="social-link">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.linkedin.com/company/bheemacademy" title="LinkedIn" target="_blank" rel="noopener noreferrer" class="social-link">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="https://www.instagram.com/bheemacademy" title="Instagram" target="_blank" rel="noopener noreferrer" class="social-link">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.youtube.com/@bheemacademy" title="YouTube" target="_blank" rel="noopener noreferrer" class="social-link">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links Column -->
                <div class="footer-column">
                    <h3><i class="fas fa-compass"></i> Quick Links</h3>
                    <div class="footer-links">
                        <a href="/course/" class="footer-link">
                            <i class="fas fa-angle-right"></i> All Courses
                        </a>
                        <a href="/my/" class="footer-link">
                            <i class="fas fa-angle-right"></i> Dashboard
                        </a>
                        <a href="/badges/mybadges.php" class="footer-link">
                            <i class="fas fa-angle-right"></i> My Certificates
                        </a>
                        <a href="/blog/" class="footer-link">
                            <i class="fas fa-angle-right"></i> Blog &amp; News
                        </a>
                        <a href="/mod/forum/" class="footer-link">
                            <i class="fas fa-angle-right"></i> Community
                        </a>
                        <a href="/user/profile.php" class="footer-link">
                            <i class="fas fa-angle-right"></i> My Profile
                        </a>
                    </div>
                </div>

                <!-- Resources Column -->
                <div class="footer-column">
                    <h3><i class="fas fa-book"></i> Resources</h3>
                    <div class="footer-links">
                        <a href="/mod/page/view.php?id=3" class="footer-link">
                            <i class="fas fa-angle-right"></i> Help Center
                        </a>
                        <a href="/mod/page/view.php?id=4" class="footer-link">
                            <i class="fas fa-angle-right"></i> Documentation
                        </a>
                        <a href="/mod/page/view.php?id=5" class="footer-link">
                            <i class="fas fa-angle-right"></i> AI Tools
                        </a>
                        <a href="/mod/page/view.php?id=6" class="footer-link">
                            <i class="fas fa-angle-right"></i> API Access
                        </a>
                        <a href="/mod/page/view.php?id=7" class="footer-link">
                            <i class="fas fa-angle-right"></i> Downloads
                        </a>
                        <a href="/mod/page/view.php?id=11" class="footer-link">
                            <i class="fas fa-angle-right"></i> Contact Us
                        </a>
                    </div>
                </div>

                <!-- Newsletter & Contact Column -->
                <div class="footer-column">
                    <h3><i class="fas fa-envelope"></i> Stay Connected</h3>
                    <div class="newsletter-box">
                        <p class="newsletter-text">Get exclusive AI insights and course updates</p>
                        <form class="newsletter-form">
                            <input type="email" class="newsletter-input" placeholder="Enter your email" required="">
                            <button type="submit" class="newsletter-button">
                                <span>Subscribe</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </form>
                        <div class="newsletter-features">
                            <div class="newsletter-feature">
                                <i class="fas fa-check"></i> Weekly AI News
                            </div>
                            <div class="newsletter-feature">
                                <i class="fas fa-check"></i> Exclusive Offers
                            </div>
                            <div class="newsletter-feature">
                                <i class="fas fa-check"></i> Free Resources
                            </div>
                        </div>
                    </div>
                    <div class="contact-cards">
                        <div class="contact-card">
                            <i class="fas fa-headset"></i>
                            <span>24/7 Support Available</span>
                        </div>
                        <div class="contact-card">
                            <i class="fas fa-envelope"></i>
                            <span>support@bheem.academy</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Trending Courses -->
    <div class="trending-courses">
        <div class="trending-courses-wrapper">
            <h4 class="trending-title">
                <i class="fas fa-fire"></i> Trending Courses
            </h4>
            <div class="courses-slider">
                <a href="/course/" class="course-chip">
                    <i class="fas fa-robot"></i> Intro to ChatGPT
                </a>
                <a href="/course/" class="course-chip">
                    <i class="fas fa-brain"></i> Neural Networks 101
                </a>
                <a href="/course/" class="course-chip">
                    <i class="fas fa-code"></i> Python for AI
                </a>
                <a href="/course/" class="course-chip">
                    <i class="fas fa-palette"></i> AI Art Generation
                </a>
                <a href="/course/" class="course-chip">
                    <i class="fas fa-chart-line"></i> Data Science Basics
                </a>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="footer-bottom-content">
            <div class="copyright">
                <p>© 2025 Bheem Academy • Empowering minds through AI</p>
            </div>
            <div class="legal-links">
                <a href="/mod/page/view.php?id=8" class="legal-link">Privacy Policy</a>
                <a href="/mod/page/view.php?id=9" class="legal-link">Terms of Service</a>
                <a href="/mod/page/view.php?id=10" class="legal-link">Cookie Policy</a>
                <a href="/mod/page/view.php?id=12" class="legal-link">Sitemap</a>
            </div>
            <div class="payment-icons">
                <i class="fab fa-cc-visa payment-icon"></i>
                <i class="fab fa-cc-mastercard payment-icon"></i>
                <i class="fab fa-cc-paypal payment-icon"></i>
                <i class="fab fa-cc-stripe payment-icon"></i>
            </div>
        </div>
    </div>

    <!-- Floating Chat Button -->
    <div class="chat-fab">
        <button class="chat-button">
            <i class="fas fa-comments"></i>
            <span class="chat-badge">1</span>
        </button>
    </div>
</footer>

<script>
// Neural Network Canvas Animation for Footer
document.addEventListener('DOMContentLoaded', function() {
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

    // ==================== TAB NAVIGATION FUNCTIONALITY ====================
    // Tab switching - Enhanced for reliability
    const tabChips = document.querySelectorAll('.tab-chip:not(.LockedTabChip)');
    const tabPanels = document.querySelectorAll('.tab-panel');

    tabChips.forEach(tab => {
        tab.addEventListener('click', function(e) {
            e.preventDefault();

            const targetTab = this.getAttribute('data-tab');
            const targetPanelId = targetTab + '-panel';

            // STEP 1: Remove active class from all tabs and hide all panels
            document.querySelectorAll('.tab-chip').forEach(t => {
                t.classList.remove('active');
                t.setAttribute('aria-selected', 'false');
            });

            document.querySelectorAll('.tab-panel').forEach(p => {
                p.classList.remove('active');
                p.style.display = 'none';
            });

            // STEP 2: Add active class to clicked tab
            this.classList.add('active');
            this.setAttribute('aria-selected', 'true');

            // STEP 3: Show corresponding panel
            const targetPanel = document.getElementById(targetPanelId);
            if (targetPanel) {
                // Force show with both class and inline style
                targetPanel.classList.add('active');
                targetPanel.style.display = 'block';

                // Force a reflow to ensure styles are applied
                void targetPanel.offsetHeight;
            }

            // STEP 4: Smooth scroll to show the tab content
            if (targetPanel) {
                // Wait for panel to be displayed before scrolling
                setTimeout(() => {
                    const offset = 130; // offset for fixed header + tab bar visibility
                    const elementPosition = targetPanel.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - offset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }, 100); // Small delay to ensure panel is rendered
            }
        });
    });

    // Ensure the initial active panel is visible
    const initialActivePanel = document.querySelector('.tab-panel.active');
    if (initialActivePanel) {
        initialActivePanel.style.display = 'block';
    }

    // ==================== DEFENSIVE CODE: PREVENT DUPLICATE PANELS ====================
    // Check for and remove duplicate tab panels
    function removeDuplicatePanels() {
        const seenIds = new Set();
        const duplicates = [];

        document.querySelectorAll('.tab-panel').forEach(panel => {
            if (!panel.id) {
                return;
            }

            if (seenIds.has(panel.id)) {
                duplicates.push(panel);
            } else {
                seenIds.add(panel.id);
            }
        });

        // Remove duplicates
        if (duplicates.length > 0) {
            duplicates.forEach(duplicate => duplicate.remove());
        }
    }

    // Run duplicate check on page load
    removeDuplicatePanels();

    // Set up MutationObserver to prevent dynamic duplicates
    const tabContainer = document.querySelector('.center-content');
    if (tabContainer) {
        const observer = new MutationObserver((mutations) => {
            let panelsAdded = false;
            mutations.forEach(mutation => {
                mutation.addedNodes.forEach(node => {
                    if (node.nodeType === 1 && node.classList && node.classList.contains('tab-panel')) {
                        panelsAdded = true;
                    }
                });
            });

            if (panelsAdded) {
                removeDuplicatePanels();
            }
        });

        observer.observe(tabContainer, {
            childList: true,
            subtree: true
        });
    }

    // Periodic duplicate check (runs every 5 seconds as an extra safeguard)
    setInterval(() => {
        const panelCount = document.querySelectorAll('.tab-panel').length;
        const uniqueIds = new Set(Array.from(document.querySelectorAll('.tab-panel')).map(p => p.id));

        if (panelCount !== uniqueIds.size) {
            removeDuplicatePanels();
        }
    }, 5000);

    // Additional safeguard: Ensure only one panel is visible at a time
    const originalShowPanel = function(panelId) {
        // Hide all panels first
        document.querySelectorAll('.tab-panel').forEach(p => {
            p.classList.remove('active');
            p.style.display = 'none';
        });

        // Show only the target panel
        const targetPanel = document.getElementById(panelId);
        if (targetPanel) {
            targetPanel.classList.add('active');
            targetPanel.style.display = 'block';
        }
    };

    // ==================== PROMO TABS FUNCTIONALITY ====================
    // Promo tab switching
    document.querySelectorAll('.promo-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            const targetPromo = this.getAttribute('data-promo');

            // Remove active class from all tabs and panels
            document.querySelectorAll('.promo-tab').forEach(t => t.classList.remove('active'));
            document.querySelectorAll('.promo-tab-panel').forEach(p => p.classList.remove('active'));

            // Add active class to clicked tab and corresponding panel
            this.classList.add('active');
            document.getElementById('promo-' + targetPromo).classList.add('active');
        });
    });

    // Module accordion toggle
    document.querySelectorAll('.ModuleAccordion .module-header').forEach(header => {
        header.addEventListener('click', function() {
            // Skip locked and blurred modules
            if (this.parentElement.classList.contains('locked-module') ||
                this.parentElement.classList.contains('blurred-locked')) {
                return;
            }
            this.parentElement.classList.toggle('expanded');
        });
    });

    // FAQ accordion toggle (original style)
    document.querySelectorAll('.FaqAccordion .faq-question').forEach(question => {
        question.addEventListener('click', function() {
            this.parentElement.classList.toggle('expanded');
        });
    });

    // FAQ accordion toggle (new tab panel style)
    document.querySelectorAll('.faq-item .faq-question').forEach(question => {
        question.addEventListener('click', function() {
            this.parentElement.classList.toggle('expanded');
        });
    });

    // Module/Section accordion toggle
    document.querySelectorAll('.ModuleAccordion .module-header').forEach(header => {
        header.addEventListener('click', function() {
            this.parentElement.classList.toggle('expanded');
        });
    });

    // Keyboard navigation support
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Tab') {
            document.body.classList.add('keyboard-nav');
        }
    });

    document.addEventListener('mousedown', function() {
        document.body.classList.remove('keyboard-nav');
    });

    // ==================== REVIEWS FUNCTIONALITY ====================
    // Reviews state
    let currentFilter = 'recent';
    let reviewsPerPage = 5;
    let currentlyShowing = 5;
    let allReviews = [];

    // Initialize reviews
    function initReviews() {
        const reviewCards = document.querySelectorAll('.ReviewCard');
        allReviews = Array.from(reviewCards).map((card, index) => {
            const stars = card.querySelector('.stars').textContent.trim();
            const rating = stars.split('★').length - 1;
            const dateText = card.querySelector('.review-date').textContent.trim();

            // Parse date for sorting
            let dateValue = 0;
            if (dateText.includes('week')) {
                dateValue = parseInt(dateText) || 2;
            } else if (dateText.includes('month')) {
                dateValue = (parseInt(dateText) || 1) * 4;
            } else if (dateText === 'Today') {
                dateValue = 0;
            } else if (dateText === 'Yesterday') {
                dateValue = 1;
            }

            return {
                element: card,
                rating: rating,
                dateValue: dateValue,
                originalIndex: index
            };
        });

        applyFilter(currentFilter);
    }

    // Apply filter
    function applyFilter(filter) {
        currentFilter = filter;
        let filteredReviews = [...allReviews];

        if (filter === '5stars') {
            filteredReviews = allReviews.filter(r => r.rating === 5);
        } else if (filter === 'toprated') {
            filteredReviews = allReviews.filter(r => r.rating === 5);
        }

        // Sort by date (most recent first)
        if (filter === 'recent' || filter === '5stars' || filter === 'toprated') {
            filteredReviews.sort((a, b) => a.dateValue - b.dateValue);
        }

        // Hide all reviews first
        allReviews.forEach(r => r.element.style.display = 'none');

        // Show filtered reviews
        filteredReviews.forEach((r, index) => {
            if (index < currentlyShowing) {
                r.element.style.display = 'block';
            }
        });

        // Update View More button visibility
        const viewMoreBtn = document.getElementById('viewMoreReviews');
        if (viewMoreBtn) {
            if (filteredReviews.length > currentlyShowing) {
                viewMoreBtn.style.display = 'inline-flex';
                const textSpan = viewMoreBtn.querySelector('span') || viewMoreBtn;
                textSpan.textContent = textSpan.querySelector('i') ? viewMoreBtn.childNodes[0].textContent.trim() : 'View More Reviews';
                viewMoreBtn.classList.remove('showing-all');
            } else if (currentlyShowing >= filteredReviews.length && filteredReviews.length > reviewsPerPage) {
                viewMoreBtn.style.display = 'inline-flex';
                const textSpan = viewMoreBtn.querySelector('span') || viewMoreBtn;
                textSpan.textContent = textSpan.querySelector('i') ? viewMoreBtn.childNodes[0].textContent.trim() : 'Show Less';
                viewMoreBtn.classList.add('showing-all');
            } else {
                viewMoreBtn.style.display = 'none';
            }
        }
    }

    // Filter chips interaction with functionality
    document.querySelectorAll('.filter-chip').forEach(chip => {
        chip.addEventListener('click', function() {
            document.querySelectorAll('.filter-chip').forEach(c => c.classList.remove('active'));
            this.classList.add('active');

            const chipText = this.textContent.trim().toLowerCase();
            if (chipText.includes('most recent')) {
                currentlyShowing = reviewsPerPage;
                applyFilter('recent');
            } else if (chipText.includes('top rated')) {
                currentlyShowing = reviewsPerPage;
                applyFilter('toprated');
            } else if (chipText.includes('5 stars')) {
                currentlyShowing = reviewsPerPage;
                applyFilter('5stars');
            }
        });
    });

    // View More button functionality
    const viewMoreBtn = document.getElementById('viewMoreReviews');
    if (viewMoreBtn) {
        viewMoreBtn.addEventListener('click', function() {
            if (this.classList.contains('showing-all')) {
                // Show less - reset to initial count
                currentlyShowing = reviewsPerPage;
                applyFilter(currentFilter);

                // Scroll to reviews section
                const reviewsSection = document.getElementById('reviews');
                if (reviewsSection) {
                    const offset = 150;
                    const elementPosition = reviewsSection.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - offset;
                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            } else {
                // Show more reviews
                currentlyShowing += reviewsPerPage;
                applyFilter(currentFilter);
            }
        });
    }

    // Initialize on page load
    if (document.querySelector('.ReviewCard')) {
        initReviews();
    }

    // ========== POWERFUL SCROLL-TRIGGERED ANIMATIONS ==========
    // Intersection Observer for scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const scrollObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                scrollObserver.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe elements for scroll animations with more dramatic effects
    const animateOnScroll = document.querySelectorAll(`
        .objective-card,
        .curriculum-item,
        .stat-item,
        .achievement,
        .tool-card,
        .feature-item,
        .pricing-tier,
        .instructor-card
    `);

    animateOnScroll.forEach((el, index) => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(60px) scale(0.8) rotate(-5deg)';
        el.style.transition = 'all 0.8s cubic-bezier(0.34, 1.56, 0.64, 1)';
        el.style.transitionDelay = `${index * 0.08}s`;
        scrollObserver.observe(el);
    });

    // Add animate-in class styles with bounce effect
    const style = document.createElement('style');
    style.textContent = `
        .animate-in {
            opacity: 1 !important;
            transform: translateY(0) scale(1) rotate(0) !important;
        }
    `;
    document.head.appendChild(style);

    // Enhanced parallax effect on scroll
    let ticking = false;
    window.addEventListener('scroll', () => {
        if (!ticking) {
            window.requestAnimationFrame(() => {
                const scrolled = window.pageYOffset;
                const parallaxElements = document.querySelectorAll('.hero-title');
                parallaxElements.forEach(el => {
                    el.style.transform = `translateY(${scrolled * 0.4}px) scale(${1 + scrolled * 0.0001})`;
                });
                ticking = false;
            });
            ticking = true;
        }
    });

    // ========== MAGNETIC HOVER EFFECTS ==========
    // Excluded .info-card and .gamification-card from animations
    const cards = document.querySelectorAll('.progress-card, .objectives-section, .curriculum-section, .objective-card');

    cards.forEach(card => {
        card.addEventListener('mousemove', function(e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const centerX = rect.width / 2;
            const centerY = rect.height / 2;

            const translateX = (x - centerX) / 20;
            const translateY = (y - centerY) / 20;

            this.style.transform = `translate(${translateX}px, ${translateY}px) scale(1.05)`;
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = '';
        });
    });

    // ========== RIPPLE EFFECT ON CLICK ==========
    cards.forEach(card => {
        card.addEventListener('click', function(e) {
            const ripple = document.createElement('div');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.style.position = 'absolute';
            ripple.style.borderRadius = '50%';
            ripple.style.background = 'radial-gradient(circle, rgba(139, 92, 246, 0.6), transparent)';
            ripple.style.transform = 'scale(0)';
            ripple.style.animation = 'rippleEffect 0.8s ease-out';
            ripple.style.pointerEvents = 'none';

            this.style.position = 'relative';
            this.style.overflow = 'hidden';
            this.appendChild(ripple);

            setTimeout(() => ripple.remove(), 800);
        });
    });

    // Add ripple animation
    const rippleStyle = document.createElement('style');
    rippleStyle.textContent = `
        @keyframes rippleEffect {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(rippleStyle);

    // ========== FLOATING PARTICLES BACKGROUND ==========
    const particleContainer = document.createElement('div');
    particleContainer.style.position = 'fixed';
    particleContainer.style.top = '0';
    particleContainer.style.left = '0';
    particleContainer.style.width = '100%';
    particleContainer.style.height = '100%';
    particleContainer.style.pointerEvents = 'none';
    particleContainer.style.zIndex = '-1';
    document.body.appendChild(particleContainer);

    for (let i = 0; i < 20; i++) {
        const particle = document.createElement('div');
        particle.style.position = 'absolute';
        particle.style.width = Math.random() * 8 + 4 + 'px';
        particle.style.height = particle.style.width;
        particle.style.borderRadius = '50%';
        particle.style.background = `radial-gradient(circle, rgba(${Math.random() > 0.5 ? '90, 79, 207' : '78, 159, 255'}, 0.6), transparent)`;
        particle.style.left = Math.random() * 100 + '%';
        particle.style.top = Math.random() * 100 + '%';
        particle.style.animation = `floatParticle${(i % 3) + 1} ${15 + Math.random() * 15}s ease-in-out infinite`;
        particle.style.animationDelay = Math.random() * 5 + 's';
        particleContainer.appendChild(particle);
    }
});
</script>

<!-- Holographic Particles for Futuristic FOMO Theme - Disabled for solid background -->
<!-- <div class="holographic-particles"></div> -->

<!-- FOMO Countdown Timer Script -->
<script>
// Countdown Timer for FOMO Alert Bar
function startCountdown() {
    const hoursEl = document.getElementById('countdown-hours');
    const minutesEl = document.getElementById('countdown-minutes');
    const secondsEl = document.getElementById('countdown-seconds');

    if (!hoursEl || !minutesEl || !secondsEl) return;

    // Set countdown to 12 hours from now
    const endTime = new Date().getTime() + (12 * 60 * 60 * 1000);

    function updateCountdown() {
        const now = new Date().getTime();
        const distance = endTime - now;


    // ==================== 3D INTERACTIVE EFFECTS & ANIMATIONS ====================
    
    // Scroll-triggered Fade-in Animations
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const animateOnScroll = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0) scale(1)';
            }
        });
    }, observerOptions);

    // Apply to feature tiles with stagger
    document.querySelectorAll('.feature-tile').forEach((el, idx) => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(40px) scale(0.95)';
        el.style.transition = 'all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) ' + (idx * 0.1) + 's';
        animateOnScroll.observe(el);
    });

    // Apply to project cards
    document.querySelectorAll('.ProjectMiniCard').forEach((el, idx) => {
        el.style.opacity = '0';
        el.style.transform = 'translateX(-50px)';
        el.style.transition = 'all 0.5s ease-out ' + (idx * 0.1) + 's';
        animateOnScroll.observe(el);
    });

    // 3D Mouse Tracking for Cards
    document.querySelectorAll('.feature-tile, .ProjectMiniCard').forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;

            const translateX = (x - centerX) / 20;
            const translateY = (y - centerY) / 20;

            card.style.transform = 'translate(' + translateX + 'px, ' + translateY + 'px) scale(1.05)';
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = '';
        });
    });

    // Ripple Effect for Tab Chips
    document.querySelectorAll('.tab-chip').forEach(chip => {
        chip.classList.add('ripple-effect');
    });

    // Parallax Effect for Hero Banner
    let ticking = false;
    window.addEventListener('scroll', () => {
        if (!ticking) {
            window.requestAnimationFrame(() => {
                const scrolled = window.pageYOffset;
                const heroBanner = document.querySelector('.hero-banner');
                
                if (heroBanner) {
                    heroBanner.style.transform = 'translateY(' + (scrolled * 0.3) + 'px)';
                }
                ticking = false;
            });
            ticking = true;
        }
    });

    // Smooth Tab Transitions with 3D Effect - REMOVED (no tabs in vertical layout)

    // Module Accordion 3D Expand Animation
    document.querySelectorAll('.ModuleAccordion').forEach(module => {
        const header = module.querySelector('.module-header');
        
        if (header) {
            header.addEventListener('click', function() {
                const isExpanded = module.classList.contains('expanded');
                
                if (!isExpanded) {
                    module.style.transform = 'scale(1.02)';
                    setTimeout(() => {
                        module.style.transform = '';
                    }, 500);
                }
            });
        }
    });

    // Lazy Load Animations Performance Optimization
    if ('IntersectionObserver' in window) {
        const lazyAnimations = document.querySelectorAll('.LessonItem');
        
        const lazyObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    lazyObserver.unobserve(entry.target);
                }
            });
        });
        
        lazyAnimations.forEach(item => {
            lazyObserver.observe(item);
        });
    }

    console.log('3D Interactive Effects Loaded');

    // ==================== 3D BACKGROUND PARTICLES & INTERACTIONS ====================
    
    // Generate Dynamic Particles for Each Concept
    (function initConceptParticles() {
        const particleContainer = document.getElementById('conceptParticles');
        if (!particleContainer) return;
        
        const concepts = [
            { name: 'create', count: 20, color: '#7C3AED' },
            { name: 'promote', count: 20, color: '#EC4899' },
            { name: 'manage', count: 20, color: '#10B981' },
            { name: 'earn', count: 20, color: '#F59E0B' }
        ];
        
        concepts.forEach(concept => {
            for (let i = 0; i < concept.count; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle ' + concept.name;
                particle.style.left = Math.random() * 100 + '%';
                particle.style.top = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 20 + 's';
                particle.style.animationDuration = (15 + Math.random() * 10) + 's';
                particleContainer.appendChild(particle);
            }
        });
        
        console.log('3D Background Particles Initialized: ' + (concepts.length * 20) + ' particles');
    })();
    
    // 3D Parallax Effect for Background Elements
    (function init3DParallax() {
        let mouseX = 0;
        let mouseY = 0;
        let currentX = 0;
        let currentY = 0;
        
        document.addEventListener('mousemove', (e) => {
            mouseX = (e.clientX / window.innerWidth - 0.5) * 2;
            mouseY = (e.clientY / window.innerHeight - 0.5) * 2;
        });
        
        function animate3DParallax() {
            // Smooth interpolation
            currentX += (mouseX - currentX) * 0.05;
            currentY += (mouseY - currentY) * 0.05;
            
            // Apply parallax to different elements at different speeds
            const createElements = document.querySelector('.create-elements');
            const promoteElements = document.querySelector('.promote-elements');
            const manageElements = document.querySelector('.manage-elements');
            const earnElements = document.querySelector('.earn-elements');
            const networkConnections = document.querySelector('.network-connections');
            
            if (createElements) {
                createElements.style.transform =
                    'translate(' + (currentX * 20) + 'px, ' + (currentY * 20) + 'px)';
            }

            if (promoteElements) {
                promoteElements.style.transform =
                    'translate(' + (currentX * -15) + 'px, ' + (currentY * 15) + 'px)';
            }

            if (manageElements) {
                manageElements.style.transform =
                    'translate(' + (currentX * 25) + 'px, ' + (currentY * -20) + 'px) rotateZ(' + (currentX * 3) + 'deg)';
            }

            if (earnElements) {
                earnElements.style.transform =
                    'translate(' + (currentX * -18) + 'px, ' + (currentY * -18) + 'px)';
            }

            if (networkConnections) {
                networkConnections.style.transform =
                    'translate(-50%, -50%) rotateZ(' + (currentX * 5) + 'deg)';
            }
            
            requestAnimationFrame(animate3DParallax);
        }
        
        animate3DParallax();
    })();
    
    // Scroll-based Depth Parallax
    (function initScrollParallax() {
        let ticking = false;

        window.addEventListener('scroll', () => {
            if (!ticking) {
                window.requestAnimationFrame(() => {
                    const scrolled = window.pageYOffset;

                    // Individual element parallax
                    const words = document.querySelectorAll('.floating-word');
                    words.forEach((word, index) => {
                        const speed = 0.1 + (index * 0.05);
                        word.style.transform = 'translateY(' + (scrolled * speed) + 'px)';
                    });

                    ticking = false;
                });
                ticking = true;
            }
        });
    })();
    
    // Dynamic 3D Rotation on Scroll
    (function init3DRotationScroll() {
        window.addEventListener('scroll', () => {
            const scrollPercent = window.pageYOffset / (document.documentElement.scrollHeight - window.innerHeight);
            
            const createCube = document.querySelector('.create-cube');
            const gears = document.querySelectorAll('.manage-gear');
            
            if (createCube) {
                createCube.style.transform =
                    'rotate(' + (scrollPercent * 360) + 'deg) scale(' + (1 + scrollPercent * 0.2) + ')';
            }
            
            gears.forEach(gear => {
                gear.style.transform = 'rotate(' + (scrollPercent * 720) + 'deg)';
            });
        });
    })();
    
    // Interactive Hover on Background Elements
    (function initBackgroundInteraction() {
        const backgroundElements = document.querySelectorAll(
            '.create-icon, .promote-icon, .manage-gear, .earn-dollar, .floating-word'
        );
        
        backgroundElements.forEach(element => {
            element.style.transition = 'all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1)';
            
            // Add subtle interaction when near mouse
            document.addEventListener('mousemove', (e) => {
                const rect = element.getBoundingClientRect();
                const centerX = rect.left + rect.width / 2;
                const centerY = rect.top + rect.height / 2;
                
                const distance = Math.sqrt(
                    Math.pow(e.clientX - centerX, 2) + 
                    Math.pow(e.clientY - centerY, 2)
                );
                
                // If mouse is within 300px, apply subtle scale
                if (distance < 300) {
                    const scale = 1 + ((300 - distance) / 300) * 0.2;
                    element.style.opacity = Math.min(0.12, 0.05 + ((300 - distance) / 300) * 0.07);
                    element.style.transform = 'scale(' + scale + ')';
                } else {
                    element.style.opacity = '';
                    element.style.transform = '';
                }
            });
        });
    })();
    
    // Performance Monitoring
    (function monitorPerformance() {
        let frameCount = 0;
        let lastTime = performance.now();
        
        function checkFPS() {
            frameCount++;
            const currentTime = performance.now();
            
            if (currentTime >= lastTime + 1000) {
                const fps = Math.round((frameCount * 1000) / (currentTime - lastTime));

                // If FPS drops below 30, reduce animation complexity
                if (fps < 30) {
                    console.warn('Low FPS detected (' + fps + '), reducing animation complexity');
                }

                frameCount = 0;
                lastTime = currentTime;
            }
            
            requestAnimationFrame(checkFPS);
        }
        
        // Start FPS monitoring after page load
        setTimeout(() => {
            checkFPS();
        }, 3000);
    })();
    
    console.log('3D Background Layer: CREATE, PROMOTE, MANAGE, EARN initialized');


        if (distance < 0) {
            hoursEl.textContent = '00';
            minutesEl.textContent = '00';
            secondsEl.textContent = '00';
            return;
        }

        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        hoursEl.textContent = String(hours).padStart(2, '0');
        minutesEl.textContent = String(minutes).padStart(2, '0');
        secondsEl.textContent = String(seconds).padStart(2, '0');
    }

    updateCountdown();
    setInterval(updateCountdown, 1000);
}

// Live Viewer Count Animation
function animateLiveViewers() {
    const viewerEl = document.getElementById('live-viewers');
    if (!viewerEl) return;

    const baseCount = parseInt(viewerEl.textContent);

    setInterval(() => {
        // Randomly fluctuate viewer count by +/- 3
        const variation = Math.floor(Math.random() * 7) - 3;
        const newCount = Math.max(15, Math.min(50, baseCount + variation));
        viewerEl.textContent = newCount;
    }, 8000);
}

// Create holographic particles
function createHolographicParticles() {
    const container = document.querySelector('.holographic-particles');
    if (!container) return;

    for (let i = 0; i < 30; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        particle.style.left = Math.random() * 100 + '%';
        particle.style.animationDelay = Math.random() * 20 + 's';
        particle.style.animationDuration = (15 + Math.random() * 10) + 's';
        container.appendChild(particle);
    }
}

// ==================== 3D FUTURISTIC BACKGROUND SYSTEM ====================
function init3DFutureBackground() {
    const container = document.getElementById('future3dBg');
    if (!container) return;

    // Check for reduced motion preference
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        console.log('3D background disabled due to reduced motion preference');
        return;
    }

    // Create 3D rotating grid
    const gridContainer = document.createElement('div');
    gridContainer.className = 'grid-3d-container';

    // Add grid lines at different depths
    for (let i = 0; i < 20; i++) {
        const line = document.createElement('div');
        line.className = 'grid-line';
        line.style.width = '100%';
        line.style.top = (i * 10) + '%';
        line.style.animationDelay = (i * 0.1) + 's';

        // Add depth variation
        if (i % 3 === 0) line.classList.add('depth-layer-far');
        else if (i % 3 === 1) line.classList.add('depth-layer-mid');
        else line.classList.add('depth-layer-near');

        gridContainer.appendChild(line);
    }
    container.appendChild(gridContainer);

    // Create 3D floating geometric cubes
    const cubePositions = [
        { left: '10%', top: '15%', delay: 0 },
        { left: '85%', top: '25%', delay: 5 },
        { left: '20%', top: '65%', delay: 10 },
        { left: '75%', top: '70%', delay: 15 },
        { left: '50%', top: '40%', delay: 7 }
    ];

    cubePositions.forEach((pos, index) => {
        const shapeContainer = document.createElement('div');
        shapeContainer.className = 'geo-shape';
        shapeContainer.style.left = pos.left;
        shapeContainer.style.top = pos.top;
        shapeContainer.style.animationDelay = pos.delay + 's';

        // Add depth layer
        const depthClass = ['depth-layer-far', 'depth-layer-mid', 'depth-layer-near'][index % 3];
        shapeContainer.classList.add(depthClass);

        const cube = document.createElement('div');
        cube.className = 'geo-cube';
        cube.style.animationDelay = (pos.delay * 0.5) + 's';

        // Create 6 faces of the cube
        const faces = ['front', 'back', 'right', 'left', 'top', 'bottom'];
        faces.forEach(face => {
            const cubeFace = document.createElement('div');
            cubeFace.className = `geo-cube-face ${face}`;
            cube.appendChild(cubeFace);
        });

        shapeContainer.appendChild(cube);
        container.appendChild(shapeContainer);
    });

    // Create expanding energy rings (FOMO effect)
    const ringPositions = [
        { left: '20%', top: '30%' },
        { left: '70%', top: '50%' },
        { left: '40%', top: '75%' }
    ];

    ringPositions.forEach((pos, index) => {
        for (let i = 0; i < 4; i++) {
            const ring = document.createElement('div');
            ring.className = 'energy-ring';
            ring.style.left = pos.left;
            ring.style.top = pos.top;
            ring.style.animationDelay = (i + index * 0.5) + 's';
            container.appendChild(ring);
        }
    });

    // Create flowing data streams (Future tech effect)
    for (let i = 0; i < 15; i++) {
        const stream = document.createElement('div');
        stream.className = 'data-stream';
        stream.style.left = (Math.random() * 100) + '%';
        stream.style.animationDelay = (Math.random() * 3) + 's';
        stream.style.animationDuration = (2 + Math.random() * 2) + 's';

        // Vary colors
        if (i % 3 === 0) {
            stream.style.background = 'linear-gradient(180deg, transparent 0%, rgba(139, 92, 246, 0.3) 50%, transparent 100%)';
            stream.style.boxShadow = '0 0 10px rgba(139, 92, 246, 0.3)';
        } else if (i % 3 === 1) {
            stream.style.background = 'linear-gradient(180deg, transparent 0%, rgba(236, 72, 153, 0.3) 50%, transparent 100%)';
            stream.style.boxShadow = '0 0 10px rgba(236, 72, 153, 0.3)';
        }

        container.appendChild(stream);
    }

    // Create holographic scanlines
    for (let i = 0; i < 3; i++) {
        const scanline = document.createElement('div');
        scanline.className = 'scanline';
        scanline.style.animationDelay = (i * 2.5) + 's';
        container.appendChild(scanline);
    }

    // Create urgency pulse indicators (FOMO)
    const pulsePositions = [
        { left: '15%', top: '20%' },
        { left: '80%', top: '35%' },
        { left: '30%', top: '60%' },
        { left: '65%', top: '80%' },
        { left: '50%', top: '50%' }
    ];

    pulsePositions.forEach((pos, index) => {
        const pulse = document.createElement('div');
        pulse.className = 'urgency-pulse';
        pulse.style.left = pos.left;
        pulse.style.top = pos.top;
        pulse.style.animationDelay = (index * 0.4) + 's';
        container.appendChild(pulse);
    });

    console.log('3D Futuristic Background initialized with', container.children.length, 'elements');
}

// Initialize FOMO features
document.addEventListener('DOMContentLoaded', function() {
    startCountdown();
    animateLiveViewers();
    // Disabled for solid background
    // createHolographicParticles();
    // init3DFutureBackground();
});

// Pause 3D animations when page is hidden (performance optimization)
// Disabled - using solid background
// document.addEventListener('visibilitychange', function() {
//     const container = document.getElementById('future3dBg');
//     if (!container) return;
//
//     if (document.hidden) {
//         container.style.animationPlayState = 'paused';
//         container.querySelectorAll('*').forEach(el => {
//             el.style.animationPlayState = 'paused';
//         });
//     } else {
//         container.style.animationPlayState = 'running';
//         container.querySelectorAll('*').forEach(el => {
//             el.style.animationPlayState = 'running';
//         });
//     }
// });
</script>

<!-- Animated Motto Story Background Controller - Disabled for solid background -->
<!-- <script src="/course/js/motto-story-animation.js?v=1761063856"></script> -->

<!-- Bheem Academy 2025 - Modern Interactions -->
<script src="/course/js/modern-interactions-2025.js?v=1760936131"></script>

<!-- Dark Mode Toggle Script -->
<script>
(function() {
    const themeToggle = document.getElementById('theme-toggle-2025');
    const body = document.body;
    const icon = themeToggle.querySelector('i');

    // Load saved theme preference
    const savedTheme = localStorage.getItem('bheem-theme') || 'light';

    // Apply saved theme on load
    if (savedTheme === 'dark') {
        body.classList.add('dark-mode');
        icon.classList.remove('fa-moon');
        icon.classList.add('fa-sun');
    }

    // Toggle theme on button click
    themeToggle.addEventListener('click', function() {
        body.classList.toggle('dark-mode');

        if (body.classList.contains('dark-mode')) {
            // Switch to dark mode
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
            localStorage.setItem('bheem-theme', 'dark');
        } else {
            // Switch to light mode
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');
            localStorage.setItem('bheem-theme', 'light');
        }
    });
})();
</script>
</body>
</html>
