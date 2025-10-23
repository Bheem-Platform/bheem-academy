<style>
    /* Why Bheem Academy - Mobile Minimal Performance Version v4.1 - iPhone 11 Fix 30px */
    /* Ultra-lightweight for mobile: 90% smaller, 95% less GPU usage */
    /* Last Updated: 2025-10-20 - iOS iPhone 11 positioning fix */

    .why-bheem-academy {
        padding: 40px 0 30px;
        background: #1a1a1a;
        position: relative;
        overflow: hidden;
        /* Gentle fade-in for entire section */
        opacity: 0;
        animation: fadeIn 1s ease-out forwards;
        /* iOS optimization - force GPU acceleration */
        -webkit-transform: translateZ(0);
        transform: translateZ(0);
        will-change: opacity;
        /* iOS Safari fixes */
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        -webkit-perspective: 1000;
        perspective: 1000;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .why-bheem-academy.loaded {
        opacity: 1;
    }

    /* Simple gradient overlay - no effects */
    .why-bheem-academy::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 50% 0%, rgba(139, 92, 246, 0.05) 0%, transparent 50%);
        pointer-events: none;
        z-index: 1;
    }

    .why-bheem-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 20px;
        position: relative;
        z-index: 2;
        overflow: visible;
    }

    /* Header Section - Low animations for mobile */
    .why-bheem-header {
        text-align: center;
        margin-bottom: 40px;
        /* Gentle fade-in for entire header */
        animation: slideInFromTop 0.8s ease-out;
    }

    /* Slide in from top - iOS optimized */
    @keyframes slideInFromTop {
        from {
            opacity: 0;
            -webkit-transform: translateY(-30px) translateZ(0);
            transform: translateY(-30px) translateZ(0);
        }
        to {
            opacity: 1;
            -webkit-transform: translateY(0) translateZ(0);
            transform: translateY(0) translateZ(0);
        }
    }

    .why-bheem-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 24px;
        background: rgba(139, 92, 246, 0.12);
        border: 1px solid rgba(139, 92, 246, 0.25);
        border-radius: 100px;
        color: #ffffff;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 20px;
        /* Subtle scale-in animation */
        animation: scaleIn 0.6s ease-out;
    }

    @keyframes scaleIn {
        from {
            opacity: 0;
            -webkit-transform: scale(0.9) translateZ(0);
            transform: scale(0.9) translateZ(0);
        }
        to {
            opacity: 1;
            -webkit-transform: scale(1) translateZ(0);
            transform: scale(1) translateZ(0);
        }
    }

    .why-bheem-badge i {
        font-size: 16px;
        color: #8b5cf6;
        /* Gentle rotation animation */
        animation: gentleRotate 2s ease-in-out infinite;
    }

    @keyframes gentleRotate {
        0%, 100% {
            transform: rotate(0deg);
        }
        50% {
            transform: rotate(10deg);
        }
    }

    .why-bheem-title {
        font-size: clamp(1.75rem, 6vw, 4rem);
        font-weight: 900;
        margin: 0 0 12px 0;
        line-height: 1.1;
        letter-spacing: -0.02em;
        /* Fade in with delay */
        animation: fadeIn 1s ease-out 0.2s both;
    }

    .why-bheem-title .highlight {
        background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .why-bheem-title .white-text {
        color: #ffffff;
    }

    .why-bheem-subtitle {
        font-size: clamp(0.95rem, 3vw, 1.35rem);
        font-weight: 600;
        color: rgba(255, 255, 255, 0.95);
        margin: 0 0 16px 0;
    }

    .why-bheem-subtitle .accent {
        color: #8b5cf6;
        font-weight: 700;
    }

    .why-bheem-description {
        font-size: clamp(0.9rem, 2.5vw, 1.15rem);
        color: rgba(241, 245, 249, 0.85);
        max-width: 700px;
        margin: 0 auto 30px auto;
        line-height: 1.6;
        padding: 16px 20px;
        background: rgba(139, 92, 246, 0.04);
        border-radius: 12px;
        border: 1px solid rgba(139, 92, 246, 0.15);
    }

    /* Parent-Child Node Tree Structure - Mobile Only */
    .mobile-tree-structure {
        max-width: 500px;
        margin: 0 auto 30px auto;
        padding: 20px;
        opacity: 0;
        animation: fadeInUp 0.8s ease-out 0.6s both;
        /* iOS optimization */
        -webkit-transform: translateZ(0);
        transform: translateZ(0);
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        overflow: visible;
    }

    /* Parent Node */
    .tree-parent-node {
        text-align: center;
        margin-bottom: 30px;
        position: relative;
    }

    .tree-parent-box {
        display: inline-block;
        padding: 14px 28px;
        background: linear-gradient(135deg, rgba(139, 92, 246, 0.15) 0%, rgba(236, 72, 153, 0.15) 100%);
        border: 2px solid rgba(139, 92, 246, 0.4);
        border-radius: 12px;
        position: relative;
        animation: gentlePulse 3s ease-in-out infinite;
    }

    .tree-parent-text {
        font-size: 0.95rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        white-space: nowrap;
    }

    /* Vertical line from parent */
    .tree-parent-node::after {
        content: '';
        position: absolute;
        bottom: -30px;
        left: 50%;
        transform: translateX(-50%);
        width: 2px;
        height: 30px;
        background: linear-gradient(180deg, rgba(139, 92, 246, 0.6) 0%, rgba(139, 92, 246, 0.2) 100%);
        animation: lineGrow 0.6s ease-out 0.8s both;
    }

    @keyframes lineGrow {
        from {
            height: 0;
            opacity: 0;
        }
        to {
            height: 30px;
            opacity: 1;
        }
    }

    /* Child Nodes Grid - Single Row Only */
    .tree-children-container {
        position: relative;
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 8px;
        justify-items: center;
        max-width: 100%;
        /* iOS grid rendering fix */
        -webkit-transform: translateZ(0);
        transform: translateZ(0);
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
    }

    /* iOS-specific shift for base mobile (401px-767px) - includes iPhone 11, 12, 13, 14, 15 */
    @media (min-width: 401px) and (max-width: 767px) {
        @supports (-webkit-touch-callout: none) {
            .tree-children-container {
                -webkit-transform: translateX(-30px) translateZ(0);
                transform: translateX(-30px) translateZ(0);
                max-width: calc(100% + 30px);
                overflow: visible;
            }

            /* Extend horizontal line both left and right to cover shifted logos */
            .tree-children-container::before {
                left: -5px;
                right: 10px;
            }
        }
    }

    /* Specific fix for iPhone 11 (414px width) - v4.1 */
    @media (min-width: 414px) and (max-width: 428px) and (min-height: 800px) {
        @supports (-webkit-touch-callout: none) {
            .mobile-tree-structure {
                max-width: 100%;
                width: 100%;
                padding: 20px 5px 20px 5px;
                /* Move entire tree structure to the left by 30px - UPDATED */
                -webkit-transform: translateX(-30px) translateZ(0);
                transform: translateX(-30px) translateZ(0);
                /* Visual indicator that new version loaded */
                border-top: 2px solid rgba(139, 92, 246, 0.3);
            }

            .tree-parent-node {
                /* Move parent node to the left by 30px */
                -webkit-transform: translateX(-30px) translateZ(0);
                transform: translateX(-30px) translateZ(0);
            }

            .tree-parent-node::after {
                /* Keep vertical line aligned with parent */
                left: 50%;
                -webkit-transform: translateX(-50%) translateZ(0);
                transform: translateX(-50%) translateZ(0);
            }

            .tree-children-container {
                /* Move all child logos to the left by 30px */
                -webkit-transform: translateX(-30px) translateZ(0);
                transform: translateX(-30px) translateZ(0);
                max-width: calc(100% + 60px);
                width: calc(100% + 60px);
                overflow: visible;
                position: relative;
            }

            /* Extend horizontal line to cover all logos on iPhone 11 */
            .tree-children-container::before {
                left: -5px;
                right: 25px;
            }

            /* Ensure all child nodes are visible */
            .tree-child-node {
                overflow: visible;
            }

            /* Keep vertical lines aligned */
            .tree-child-node::before {
                left: 50%;
                -webkit-transform: translateX(-50%) translateZ(0);
                transform: translateX(-50%) translateZ(0);
            }
        }
    }

    /* Horizontal line connecting all children */
    .tree-children-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: calc(45px / 2);
        right: calc(45px / 2);
        height: 2px;
        background: linear-gradient(90deg,
            rgba(139, 92, 246, 0.1) 0%,
            rgba(139, 92, 246, 0.4) 50%,
            rgba(139, 92, 246, 0.1) 100%);
        animation: lineExpandH 0.8s ease-out 1s both;
    }

    @keyframes lineExpandH {
        from {
            transform: scaleX(0);
            opacity: 0;
        }
        to {
            transform: scaleX(1);
            opacity: 1;
        }
    }

    /* Child Node */
    .tree-child-node {
        position: relative;
        text-align: center;
        opacity: 0;
        transform: translateY(10px);
        animation: fadeInChild 0.5s ease-out forwards;
        padding-top: 12px;
    }

    /* Stagger animation for children */
    .tree-child-node:nth-child(1) { animation-delay: 1.1s; }
    .tree-child-node:nth-child(2) { animation-delay: 1.2s; }
    .tree-child-node:nth-child(3) { animation-delay: 1.3s; }
    .tree-child-node:nth-child(4) { animation-delay: 1.4s; }
    .tree-child-node:nth-child(5) { animation-delay: 1.5s; }
    .tree-child-node:nth-child(6) { animation-delay: 1.6s; }
    .tree-child-node:nth-child(7) { animation-delay: 1.7s; }

    @keyframes fadeInChild {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Vertical line to each child */
    .tree-child-node::before {
        content: '';
        position: absolute;
        top: 2px;
        left: 50%;
        transform: translateX(-50%);
        width: 2px;
        height: 10px;
        background: rgba(139, 92, 246, 0.3);
    }

    .tree-child-box {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 45px;
        height: 45px;
        background: rgba(139, 92, 246, 0.08);
        border: 1.5px solid rgba(139, 92, 246, 0.3);
        border-radius: 8px;
        position: relative;
        transition: all 0.3s ease;
        padding: 4px;
    }

    .tree-child-icon {
        font-size: 1.2rem;
        color: #8b5cf6;
    }

    .tree-child-image {
        width: 100%;
        height: 100%;
        object-fit: contain;
        display: block;
        border-radius: 4px;
    }

    .tree-child-label {
        font-size: 0.65rem;
        font-weight: 600;
        color: white;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-top: 8px;
        line-height: 1.1;
        white-space: nowrap;
        background: #6366f1;
        padding: 4px 8px;
        border-radius: 4px;
        box-shadow: 0 2px 6px rgba(99, 102, 241, 0.3);
    }

    /* Show tree on desktop - enlarged version */
    @media (min-width: 1024px) {
        .mobile-tree-structure {
            max-width: 800px;
            padding: 40px;
        }

        .tree-parent-box {
            padding: 20px 40px;
        }

        .tree-parent-text {
            font-size: 1.3rem;
        }

        .tree-parent-node::after {
            width: 3px;
            height: 40px;
            bottom: -40px;
        }

        .tree-children-container {
            grid-template-columns: repeat(7, auto);
            gap: 16px;
            justify-content: center;
            margin: 0 auto;
            width: fit-content;
            -webkit-transform: translateX(-48px) translateZ(0);
            transform: translateX(-48px) translateZ(0);
        }

        .tree-children-container::before {
            left: -120px;
            right: -120px;
            height: 3px;
        }

        .tree-child-node {
            padding-top: 20px;
        }

        .tree-child-node::before {
            top: 3px;
            height: 17px;
            width: 3px;
        }

        .tree-child-box {
            width: 70px;
            height: 70px;
            padding: 6px;
            border: 2px solid rgba(139, 92, 246, 0.4);
        }

        .tree-child-icon {
            font-size: 1.8rem;
        }

        .tree-child-label {
            font-size: 0.75rem;
            padding: 6px 12px;
            margin-top: 10px;
        }
    }

    /* Adjust for tablet - same minimal version as mobile */
    @media (min-width: 768px) and (max-width: 1023px) {
        .mobile-tree-structure {
            max-width: 500px;
            padding: 20px;
        }

        .tree-parent-box {
            padding: 14px 28px;
        }

        .tree-parent-text {
            font-size: 0.95rem;
        }

        .tree-children-container {
            grid-template-columns: repeat(7, 1fr);
            gap: 8px;
        }

        .tree-children-container::before {
            left: calc(45px / 2);
            right: calc(45px / 2);
        }

        .tree-child-node {
            padding-top: 12px;
        }

        .tree-child-node::before {
            top: 2px;
            height: 10px;
        }

        .tree-child-box {
            width: 45px;
            height: 45px;
            padding: 4px;
            border: 1.5px solid rgba(139, 92, 246, 0.3);
        }

        .tree-child-icon {
            font-size: 1.2rem;
        }

        .tree-child-label {
            font-size: 0.65rem;
            padding: 4px 8px;
            margin-top: 8px;
        }

        /* iOS-specific shift for tablet */
        @supports (-webkit-touch-callout: none) {
            .tree-children-container {
                -webkit-transform: translateX(-24px) translateZ(0);
                transform: translateX(-24px) translateZ(0);
            }
        }
    }

    /* Adjust for small mobile */
    @media (max-width: 400px) {
        .mobile-tree-structure {
            padding: 12px;
        }

        .tree-parent-box {
            padding: 10px 18px;
        }

        .tree-parent-text {
            font-size: 0.8rem;
        }

        .tree-children-container {
            gap: 4px;
            grid-template-columns: repeat(7, 1fr);
        }

        .tree-child-box {
            width: 28px;
            height: 28px;
            padding: 2px;
        }

        /* iOS-specific shift for small mobile */
        @supports (-webkit-touch-callout: none) {
            .tree-children-container {
                -webkit-transform: translateX(-16px) translateZ(0);
                transform: translateX(-16px) translateZ(0);
            }
        }

        .tree-child-icon {
            font-size: 0.8rem;
        }

        .tree-child-label {
            font-size: 0.5rem;
            padding: 3px 6px;
            margin-top: 4px;
        }
    }

    /* Mobile Card Layout - Replace floating images with simple grid */
    .why-bheem-features {
        display: none !important;
        grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        gap: 12px;
        margin: 40px 0;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    .feature-card {
        background: rgba(139, 92, 246, 0.06);
        border: 1px solid rgba(139, 92, 246, 0.2);
        border-radius: 12px;
        padding: 16px 12px;
        text-align: center;
        /* Low animation for mobile - opacity and scale only */
        opacity: 0;
        transform: translateY(20px) scale(0.95);
        animation: fadeInCard 0.6s ease-out forwards;
    }

    /* Stagger animation delays for cards */
    .feature-card:nth-child(1) { animation-delay: 0.1s; }
    .feature-card:nth-child(2) { animation-delay: 0.15s; }
    .feature-card:nth-child(3) { animation-delay: 0.2s; }
    .feature-card:nth-child(4) { animation-delay: 0.25s; }
    .feature-card:nth-child(5) { animation-delay: 0.3s; }
    .feature-card:nth-child(6) { animation-delay: 0.35s; }
    .feature-card:nth-child(7) { animation-delay: 0.4s; }

    /* Lightweight fade-in animation - GPU accelerated */
    @keyframes fadeInCard {
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* Subtle pulse animation for card images - iOS optimized */
    .feature-card-image {
        width: 70%;
        height: 50px;
        margin: 0 auto 10px auto;
        border-radius: 8px;
        overflow: hidden;
        background: rgba(139, 92, 246, 0.03);
        animation: subtlePulse 3s ease-in-out infinite;
    }

    /* Very subtle pulse - minimal GPU usage */
    @keyframes subtlePulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.02);
        }
    }

    .feature-card-image img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        display: block;
    }

    .feature-card-title {
        font-size: 0.75rem;
        font-weight: 600;
        color: white;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        background: #6366f1;
        padding: 6px 12px;
        border-radius: 6px;
        box-shadow: 0 2px 8px rgba(99, 102, 241, 0.3);
        display: inline-block;
        margin-top: 8px;
        /* Gentle fade-in for title */
        animation: fadeIn 0.8s ease-out forwards;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    /* Desktop - Show floating images, hide cards */
    .floating-images {
        position: relative;
        width: 100%;
        min-height: 500px;
        margin: 80px 0;
        z-index: 2;
    }

    .bg-image {
        position: absolute;
        overflow: hidden;
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
        opacity: 0.95;
        background: rgba(139, 92, 246, 0.05);
        border: 2px solid rgba(139, 92, 246, 0.2);
        padding: 8px;
        /* Disable transitions on hover for mobile perf */
        transition: none;
    }

    .bg-image img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        display: block;
        border-radius: 12px;
    }

    .center-platform-label {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 25;
        pointer-events: none;
    }

    .platform-text {
        font-size: clamp(1.5rem, 3vw, 2.5rem);
        font-weight: 900;
        text-align: center;
        white-space: nowrap;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Image Positioning - Desktop only */
    .image-1 { width: 220px; height: 150px; top: calc(50% - 280px); left: calc(50% - 110px); }
    .image-2 { width: 230px; height: 155px; top: calc(50% - 200px); left: calc(50% - 350px); }
    .image-3 { width: 215px; height: 145px; top: calc(50% + 50px); left: calc(50% - 390px); }
    .image-4 { width: 225px; height: 152px; top: calc(50% + 220px); left: calc(50% - 260px); }
    .image-5 { width: 218px; height: 148px; top: calc(50% + 220px); left: calc(50% + 40px); }
    .image-6 { width: 222px; height: 150px; top: calc(50% + 50px); left: calc(50% + 180px); }
    .image-7 { width: 228px; height: 154px; top: calc(50% - 200px); left: calc(50% + 130px); }

    /* NO animations on mobile at all */
    @media (min-width: 768px) {
        /* Only enable animations on desktop */
        .image-1 { animation: floatSimple1 15s ease-in-out infinite; }
        .image-3 { animation: floatSimple2 18s ease-in-out infinite; }
        .image-5 { animation: floatSimple3 16s ease-in-out infinite; }

        @keyframes floatSimple1 {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(20px, -20px); }
        }

        @keyframes floatSimple2 {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(-20px, 20px); }
        }

        @keyframes floatSimple3 {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(20px, 15px); }
        }

        /* Enable hover effects only on desktop */
        .bg-image:hover {
            opacity: 1;
            transform: scale(1.05) translateY(-10px);
            box-shadow: 0 20px 50px rgba(139, 92, 246, 0.35);
        }

        .stat-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(139, 92, 246, 0.3);
        }
    }

    .node-indicator {
        position: absolute;
        top: -12px;
        right: -12px;
        width: 32px;
        height: 32px;
        z-index: 20;
        pointer-events: none;
    }

    .node-dot {
        display: none; /* Hide dot for tag style */
    }

    .node-label {
        position: absolute;
        top: 20px;
        left: 20px;
        transform: none;
        background: #6366f1;
        color: white;
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 0.8rem;
        font-weight: 600;
        white-space: nowrap;
        opacity: 1;
        pointer-events: auto;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        box-shadow: 0 2px 8px rgba(99, 102, 241, 0.3);
        transition: all 0.3s ease;
    }

    .bg-image:hover .node-label {
        box-shadow: 0 4px 12px rgba(99, 102, 241, 0.5);
        transform: translateY(-2px);
    }

    /* CTA Button - Low animation */
    .why-bheem-cta {
        text-align: center;
        margin-top: 60px;
        /* Fade in animation */
        animation: fadeInUp 0.8s ease-out 0.8s both;
    }

    .why-bheem-cta-button {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 14px 32px;
        background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
        color: white;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 800;
        font-size: 1rem;
        box-shadow: 0 8px 24px rgba(139, 92, 246, 0.25);
        border: 2px solid rgba(255, 255, 255, 0.15);
        /* Subtle bounce animation */
        animation: gentleBounce 2s ease-in-out infinite;
    }

    @keyframes gentleBounce {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-5px);
        }
    }

    .why-bheem-cta-button i {
        font-size: 1rem;
        /* Arrow slide animation */
        animation: slideArrow 1.5s ease-in-out infinite;
    }

    @keyframes slideArrow {
        0%, 100% {
            transform: translateX(0);
        }
        50% {
            transform: translateX(5px);
        }
    }

    /* Stats Bar - Low animations */
    .why-bheem-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 12px;
        margin-top: 50px;
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
        /* Fade in animation */
        animation: fadeInUp 0.8s ease-out 0.4s both;
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

    .stat-item {
        text-align: center;
        padding: 24px 16px;
        background: rgba(139, 92, 246, 0.08);
        border-radius: 16px;
        border: 1px solid rgba(139, 92, 246, 0.2);
        box-shadow: 0 4px 16px rgba(139, 92, 246, 0.15);
        /* Staggered fade-in animation */
        opacity: 0;
        animation: fadeInScale 0.6s ease-out forwards;
    }

    .stat-item:nth-child(1) { animation-delay: 0.5s; }
    .stat-item:nth-child(2) { animation-delay: 0.6s; }
    .stat-item:nth-child(3) { animation-delay: 0.7s; }

    @keyframes fadeInScale {
        from {
            opacity: 0;
            transform: scale(0.9);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .stat-value {
        font-size: clamp(1.75rem, 5vw, 3.5rem);
        font-weight: 900;
        display: block;
        line-height: 1;
        margin-bottom: 8px;
        background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        /* Subtle pulse animation */
        animation: gentlePulse 2s ease-in-out infinite;
    }

    @keyframes gentlePulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
    }

    .stat-label {
        font-size: 0.7rem;
        color: rgba(255, 255, 255, 0.85);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.08em;
    }

    /* Responsive Design - Mobile First Approach */

    /* Mobile devices - Hide floating images, hide cards */
    @media (max-width: 767px) {
        .floating-images {
            display: none !important;
        }

        .why-bheem-features {
            display: none !important;
        }

        .why-bheem-academy {
            padding: 30px 0 25px;
        }

        .why-bheem-container {
            padding: 0 16px;
        }

        .why-bheem-header {
            margin-bottom: 30px;
        }

        .why-bheem-badge {
            font-size: 12px;
            padding: 8px 18px;
            gap: 6px;
        }

        .why-bheem-description {
            padding: 12px 16px;
            font-size: 0.875rem;
        }

        .why-bheem-features {
            gap: 10px;
            grid-template-columns: repeat(2, 1fr);
        }

        .feature-card {
            padding: 12px 10px;
        }

        .feature-card-image {
            width: 60%;
            height: 45px;
        }

        .feature-card-title {
            font-size: 0.7rem;
            padding: 5px 10px;
        }

        .why-bheem-stats {
            grid-template-columns: 1fr;
            max-width: 300px;
            gap: 10px;
        }

        .stat-item {
            padding: 20px 14px;
        }

        .why-bheem-cta {
            margin-top: 40px;
        }

        .why-bheem-cta-button {
            padding: 12px 28px;
            font-size: 0.9rem;
        }
    }

    /* Tablet - Hide floating images, hide cards */
    @media (min-width: 768px) and (max-width: 1023px) {
        .floating-images {
            display: none !important;
        }

        .why-bheem-features {
            display: none !important;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
        }

        .feature-card {
            padding: 20px 16px;
        }

        .feature-card-image {
            width: 65%;
            height: 60px;
        }

        .feature-card-title {
            font-size: 0.8rem;
            padding: 6px 12px;
        }

        .why-bheem-stats {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    /* Desktop - Hide floating images, hide cards, show tree */
    @media (min-width: 1024px) {
        .why-bheem-features {
            display: none !important;
        }

        .floating-images {
            display: none !important;
        }

        /* Enable smooth transitions on desktop only */
        .bg-image {
            transition: all 0.4s ease;
        }

        .stat-item {
            transition: all 0.3s ease;
        }

        .why-bheem-cta-button {
            transition: all 0.3s ease;
        }

        .node-label {
            font-size: 0.7rem;
            padding: 5px 10px;
            top: 15px;
            left: 15px;
        }
    }

    /* Extra small mobile - Ultra minimal */
    @media (max-width: 400px) {
        .why-bheem-academy {
            padding: 25px 0 20px;
        }

        .why-bheem-container {
            padding: 0 12px;
        }

        .why-bheem-badge {
            font-size: 11px;
            padding: 6px 14px;
        }

        .why-bheem-title {
            margin-bottom: 8px;
        }

        .why-bheem-subtitle {
            margin-bottom: 12px;
        }

        .why-bheem-description {
            padding: 10px 14px;
            font-size: 0.8rem;
            line-height: 1.5;
        }

        .why-bheem-features {
            gap: 8px;
        }

        .feature-card {
            padding: 10px 8px;
        }

        .feature-card-image {
            width: 55%;
            height: 40px;
        }

        .feature-card-title {
            font-size: 0.65rem;
            padding: 4px 8px;
        }

        .stat-item {
            padding: 18px 12px;
        }

        .stat-value {
            font-size: 1.5rem;
        }

        .stat-label {
            font-size: 0.65rem;
        }

        .why-bheem-cta-button {
            padding: 11px 24px;
            font-size: 0.85rem;
        }
    }

    /* Reduce motion for accessibility - Disable all animations */
    @media (prefers-reduced-motion: reduce) {
        *,
        *::before,
        *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
            scroll-behavior: auto !important;
        }

        .why-bheem-academy,
        .why-bheem-header,
        .why-bheem-badge,
        .why-bheem-title,
        .feature-card,
        .feature-card-image,
        .stat-item,
        .stat-value,
        .why-bheem-cta,
        .why-bheem-cta-button,
        .why-bheem-cta-button i {
            animation: none !important;
            transition: none !important;
        }
    }

    /* iOS-specific optimizations */
    @supports (-webkit-touch-callout: none) {
        /* Force hardware acceleration on iOS */
        .feature-card,
        .stat-item,
        .why-bheem-cta-button {
            -webkit-transform: translateZ(0);
            transform: translateZ(0);
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }

        /* Reduce animation complexity on iOS for better battery */
        .feature-card-image {
            animation-duration: 4s;
        }

        .stat-value {
            animation-duration: 3s;
        }

        /* iOS-specific tree structure fixes */
        .tree-children-container {
            /* Force grid to recalculate on iOS */
            display: -webkit-grid;
            display: grid;
            -webkit-grid-template-columns: repeat(7, 1fr);
            grid-template-columns: repeat(7, 1fr);
            /* Move logos to left on iOS */
            -webkit-transform: translateX(-48px) translateZ(0);
            transform: translateX(-48px) translateZ(0);
        }

        .tree-child-box {
            /* Ensure proper rendering on iOS */
            -webkit-transform: translateZ(0);
            transform: translateZ(0);
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }

        .tree-child-node {
            /* Ensure proper spacing on iOS */
            -webkit-transform: translateZ(0);
            transform: translateZ(0);
        }

        .tree-children-container::before,
        .tree-child-node::before {
            /* Ensure lines render properly on iOS */
            -webkit-transform: translateZ(0);
            transform: translateZ(0);
        }

        /* Fix for iOS Safari grid gap rendering */
        @supports (-webkit-touch-callout: none) {
            .tree-children-container {
                gap: 8px;
                column-gap: 8px;
                row-gap: 8px;
            }
        }
    }
</style>

<!-- Why Bheem Academy Section - Mobile Minimal -->
<section class="why-bheem-academy">
    <div class="why-bheem-container">
        <!-- Header -->
        <div class="why-bheem-header">
            <div class="why-bheem-badge">
                <i class="fas fa-star"></i>
                <span>Kerala's Premier AI Academy</span>
            </div>
            <h2 class="why-bheem-title">
                <span class="white-text">Why </span>
                <span class="highlight">Bheem Academy</span>
                <span class="white-text">?</span>
            </h2>
            <p class="why-bheem-subtitle">
                Kerala's First <span class="accent">Fully Fledged AI Academy</span>
            </p>
            <p class="why-bheem-description">
                Experience the future of education with cutting-edge AI technology, automated workflows,
                and personalized learning paths designed to accelerate your success.
            </p>
        </div>

        <!-- Parent-Child Node Tree Structure - Mobile/Tablet Only -->
        <div class="mobile-tree-structure">
            <!-- Parent Node -->
            <div class="tree-parent-node">
                <div class="tree-parent-box">
                    <div class="tree-parent-text">BHEEM PLATFORM</div>
                </div>
            </div>

            <!-- Child Nodes -->
            <div class="tree-children-container">
                <div class="tree-child-node">
                    <div class="tree-child-box">
                        <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/05f05403-bb6c-45af-6d4a-8e2656951f00/public"
                             alt="Bheem Marketplace"
                             class="tree-child-image"
                             loading="lazy">
                    </div>
                    <div class="tree-child-label">Bheem Marketplace</div>
                </div>
                <div class="tree-child-node">
                    <div class="tree-child-box">
                        <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/33f62e15-35d5-4ca5-5077-b0076e244b00/public"
                             alt="AI Buzz Central"
                             class="tree-child-image"
                             loading="lazy">
                    </div>
                    <div class="tree-child-label">AI Buzz Central</div>
                </div>
                <div class="tree-child-node">
                    <div class="tree-child-box">
                        <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/937ded20-dbbb-4da6-53b5-e0b36f6fa800/public"
                             alt="Bheem Academy"
                             class="tree-child-image"
                             loading="lazy">
                    </div>
                    <div class="tree-child-label">Bheem Academy</div>
                </div>
                <div class="tree-child-node">
                    <div class="tree-child-box">
                        <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/0dafe680-5c75-4f2e-556e-cf90d10ff100/public"
                             alt="Bheem Cloud"
                             class="tree-child-image"
                             loading="lazy">
                    </div>
                    <div class="tree-child-label">Bheem Cloud</div>
                </div>
                <div class="tree-child-node">
                    <div class="tree-child-box">
                        <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/0932ca04-4388-4f6e-fcdd-9cd13f451300/public"
                             alt="Bheem Flow"
                             class="tree-child-image"
                             loading="lazy">
                    </div>
                    <div class="tree-child-label">Bheem Flow</div>
                </div>
                <div class="tree-child-node">
                    <div class="tree-child-box">
                        <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/90a4f6ec-2bdb-4a76-20d3-505cdfaf9700/public"
                             alt="Kodee AI"
                             class="tree-child-image"
                             loading="lazy">
                    </div>
                    <div class="tree-child-label">Kodee AI</div>
                </div>
                <div class="tree-child-node">
                    <div class="tree-child-box">
                        <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/e7ee5acc-ef8d-4aa8-de79-a5182807ff00/public"
                             alt="Social Selling AI"
                             class="tree-child-image"
                             loading="lazy">
                    </div>
                    <div class="tree-child-label">Social Selling AI</div>
                </div>
            </div>
        </div>

        <!-- Mobile/Tablet Card Layout - Only visible on mobile/tablet -->
        <div class="why-bheem-features">
            <div class="feature-card">
                <div class="feature-card-image">
                    <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/05f05403-bb6c-45af-6d4a-8e2656951f00/public"
                         alt="Bheem Marketplace"
                         loading="lazy">
                </div>
                <div class="feature-card-title">Bheem Marketplace</div>
            </div>
            <div class="feature-card">
                <div class="feature-card-image">
                    <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/33f62e15-35d5-4ca5-5077-b0076e244b00/public"
                         alt="AI Buzz Central"
                         loading="lazy">
                </div>
                <div class="feature-card-title">AI Buzz Central</div>
            </div>
            <div class="feature-card">
                <div class="feature-card-image">
                    <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/937ded20-dbbb-4da6-53b5-e0b36f6fa800/public"
                         alt="Bheem Academy"
                         loading="lazy">
                </div>
                <div class="feature-card-title">Bheem Academy</div>
            </div>
            <div class="feature-card">
                <div class="feature-card-image">
                    <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/e7ee5acc-ef8d-4aa8-de79-a5182807ff00/public"
                         alt="Social Selling AI"
                         loading="lazy">
                </div>
                <div class="feature-card-title">Social Selling AI</div>
            </div>
            <div class="feature-card">
                <div class="feature-card-image">
                    <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/0dafe680-5c75-4f2e-556e-cf90d10ff100/public"
                         alt="Bheem Cloud"
                         loading="lazy">
                </div>
                <div class="feature-card-title">Bheem Cloud</div>
            </div>
            <div class="feature-card">
                <div class="feature-card-image">
                    <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/0932ca04-4388-4f6e-fcdd-9cd13f451300/public"
                         alt="Bheem Flow"
                         loading="lazy">
                </div>
                <div class="feature-card-title">Bheem Flow</div>
            </div>
            <div class="feature-card">
                <div class="feature-card-image">
                    <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/90a4f6ec-2bdb-4a76-20d3-505cdfaf9700/public"
                         alt="Kodee AI"
                         loading="lazy">
                </div>
                <div class="feature-card-title">Kodee AI</div>
            </div>
        </div>

        <!-- Desktop Floating Images Section - Only visible on desktop -->
        <div class="floating-images">
            <div class="center-platform-label">
                <div class="platform-text">Bheem Platform</div>
            </div>

            <div class="bg-image image-1">
                <div class="node-indicator">
                    <div class="node-dot"></div>
                    <div class="node-label">Bheem Marketplace</div>
                </div>
                <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/05f05403-bb6c-45af-6d4a-8e2656951f00/public"
                     alt="Bheem Flow"
                     loading="lazy">
            </div>

            <div class="bg-image image-2">
                <div class="node-indicator">
                    <div class="node-dot"></div>
                    <div class="node-label">AI Buzz Central</div>
                </div>
                <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/33f62e15-35d5-4ca5-5077-b0076e244b00/public"
                     alt="Bheem AI Buzz Central"
                     loading="lazy">
            </div>

            <div class="bg-image image-3">
                <div class="node-indicator">
                    <div class="node-dot"></div>
                    <div class="node-label">Bheem Academy</div>
                </div>
                <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/937ded20-dbbb-4da6-53b5-e0b36f6fa800/public"
                     alt="Agent Bheem"
                     loading="lazy">
            </div>

            <div class="bg-image image-4">
                <div class="node-indicator">
                    <div class="node-dot"></div>
                    <div class="node-label">Social Selling AI</div>
                </div>
                <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/e7ee5acc-ef8d-4aa8-de79-a5182807ff00/public"
                     alt="Social Selling AI"
                     loading="lazy">
            </div>

            <div class="bg-image image-5">
                <div class="node-indicator">
                    <div class="node-dot"></div>
                    <div class="node-label">Bheem Cloud</div>
                </div>
                <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/0dafe680-5c75-4f2e-556e-cf90d10ff100/public"
                     alt="Bheem Cloud"
                     loading="lazy">
            </div>

            <div class="bg-image image-6">
                <div class="node-indicator">
                    <div class="node-dot"></div>
                    <div class="node-label">Bheem Flow</div>
                </div>
                <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/0932ca04-4388-4f6e-fcdd-9cd13f451300/public"
                     alt="Bheem Academy"
                     loading="lazy">
            </div>

            <div class="bg-image image-7">
                <div class="node-indicator">
                    <div class="node-dot"></div>
                    <div class="node-label">Kodee AI</div>
                </div>
                <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/90a4f6ec-2bdb-4a76-20d3-505cdfaf9700/public"
                     alt="Kodee AI Assistant"
                     loading="lazy">
            </div>
        </div>

        <!-- CTA Button -->
        <div class="why-bheem-cta">
            <a href="#enroll" class="why-bheem-cta-button">
                <span>Start Your Journey</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <!-- Stats Bar -->
        <div class="why-bheem-stats">
            <div class="stat-item">
                <span class="stat-value">10K+</span>
                <span class="stat-label">Students</span>
            </div>
            <div class="stat-item">
                <span class="stat-value">10+</span>
                <span class="stat-label">AI Courses</span>
            </div>
        </div>
    </div>
</section>

<script>
// Minimal JavaScript - Optimized for iOS and mobile devices
(function() {
    'use strict';

    // Device detection
    const isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
    const isAndroid = /Android/.test(navigator.userAgent);
    const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || window.innerWidth < 768;
    const isLowEndDevice = navigator.hardwareConcurrency && navigator.hardwareConcurrency <= 4;
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // Get section element
    const section = document.querySelector('.why-bheem-academy');

    if (!section) return;

    // Add device-specific classes
    if (isIOS) document.body.classList.add('is-ios');
    if (isAndroid) document.body.classList.add('is-android');
    if (isMobile) document.body.classList.add('is-mobile');
    if (isLowEndDevice) document.body.classList.add('is-low-end');

    // Mark section as loaded for initial fade-in
    setTimeout(() => {
        section.classList.add('loaded');
    }, 100);

    // IntersectionObserver for lazy animation triggers
    if ('IntersectionObserver' in window && !prefersReducedMotion) {
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                    // On mobile, trigger animations once and stop observing
                    if (isMobile) {
                        observer.unobserve(entry.target);
                    }
                }
            });
        }, observerOptions);

        // Observe section
        observer.observe(section);

        // Observe feature cards for stagger effect
        const featureCards = document.querySelectorAll('.feature-card');
        featureCards.forEach(card => observer.observe(card));
    } else {
        // Fallback: show everything immediately
        section.classList.add('in-view');
    }

    // Battery saving - pause animations when tab hidden
    document.addEventListener('visibilitychange', function() {
        const allAnimatedElements = document.querySelectorAll(
            '.feature-card, .feature-card-image, .stat-value, ' +
            '.why-bheem-cta-button, .why-bheem-badge i, ' +
            '.image-1, .image-3, .image-5'
        );

        if (document.hidden) {
            // Pause all animations when tab is hidden
            allAnimatedElements.forEach(el => {
                el.style.animationPlayState = 'paused';
            });
        } else {
            // Resume animations when tab is visible
            allAnimatedElements.forEach(el => {
                el.style.animationPlayState = 'running';
            });
        }
    });

    // Reduce animations on low battery (iOS only)
    if (isIOS && 'getBattery' in navigator) {
        navigator.getBattery().then(function(battery) {
            function updateBatteryStatus() {
                if (battery.level < 0.2 && !battery.charging) {
                    // Low battery: disable continuous animations
                    const continuousAnimations = document.querySelectorAll(
                        '.feature-card-image, .stat-value, ' +
                        '.why-bheem-cta-button, .why-bheem-badge i'
                    );
                    continuousAnimations.forEach(el => {
                        el.style.animation = 'none';
                    });
                    console.log('Low battery detected: animations reduced');
                }
            }

            battery.addEventListener('levelchange', updateBatteryStatus);
            battery.addEventListener('chargingchange', updateBatteryStatus);
            updateBatteryStatus();
        }).catch(function(error) {
            // Battery API not supported, continue normally
            console.log('Battery API not available');
        });
    }

    // Disable animations on low-end devices
    if (isLowEndDevice || prefersReducedMotion) {
        const allAnimatedElements = document.querySelectorAll(
            '.feature-card, .feature-card-image, .stat-value, ' +
            '.why-bheem-cta-button, .why-bheem-badge i, ' +
            '.image-1, .image-3, .image-5'
        );
        allAnimatedElements.forEach(el => {
            el.style.animation = 'none';
        });
    }

    // Disable hover effects on touch devices
    if ('ontouchstart' in window) {
        document.documentElement.classList.add('touch-device');
    }

    // Performance monitoring (development only)
    if (window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1') {
        let frameCount = 0;
        let lastTime = performance.now();

        function measureFPS() {
            const currentTime = performance.now();
            frameCount++;

            if (currentTime >= lastTime + 1000) {
                const fps = Math.round((frameCount * 1000) / (currentTime - lastTime));
                console.log(`FPS: ${fps} | Device: ${isIOS ? 'iOS' : isAndroid ? 'Android' : 'Desktop'}`);
                frameCount = 0;
                lastTime = currentTime;
            }

            requestAnimationFrame(measureFPS);
        }

        measureFPS();
    }

    // iOS-specific: Force GPU acceleration on scroll
    if (isIOS) {
        let ticking = false;

        window.addEventListener('scroll', function() {
            if (!ticking) {
                window.requestAnimationFrame(function() {
                    // Trigger GPU layer on scroll for smoother performance
                    section.style.transform = 'translateZ(0)';
                    ticking = false;
                });
                ticking = true;
            }
        }, { passive: true });
    }

})();
</script>
