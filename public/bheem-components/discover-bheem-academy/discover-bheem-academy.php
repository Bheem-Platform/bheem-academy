<style>
    /* Discover Bheem Academy - Video Showcase with Motion Graphics */
    .discover-bheem-section {
        padding: 80px 0 80px;
        background: linear-gradient(135deg,
            #0F172A 0%,
            #1E293B 50%,
            #0F172A 100%);
        position: relative;
        overflow: hidden;
        opacity: 0;
        transform: translateY(60px);
        transition: opacity 1.2s cubic-bezier(0.16, 1, 0.3, 1),
                    transform 1.2s cubic-bezier(0.16, 1, 0.3, 1);
    }

    /* Activate animations when scrolled into view */
    .discover-bheem-section.discover-animate {
        opacity: 1;
        transform: translateY(0);
    }

    /* Animated gradient background mesh */
    .discover-bheem-section::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle at 30% 50%,
            rgba(139, 92, 246, 0.15) 0%,
            transparent 50%),
            radial-gradient(circle at 70% 50%,
            rgba(236, 72, 153, 0.1) 0%,
            transparent 50%);
        animation: discover-mesh-float 25s ease-in-out infinite;
        pointer-events: none;
    }

    @keyframes discover-mesh-float {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        50% { transform: translate(30px, -30px) rotate(180deg); }
    }

    .discover-bheem-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 30px;
        position: relative;
        z-index: 2;
    }

    /* Header Section - With Motion Graphics */
    .discover-bheem-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .discover-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        background: linear-gradient(135deg,
            rgba(139, 92, 246, 0.25),
            rgba(236, 72, 153, 0.2),
            rgba(244, 114, 182, 0.25));
        border: 2px solid rgba(139, 92, 246, 0.4);
        border-radius: 100px;
        color: #FFFFFF;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 16px;
        box-shadow:
            0 4px 16px rgba(139, 92, 246, 0.4),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        opacity: 0;
        transform: translateY(-30px) scale(0.8);
    }

    /* Badge Animation */
    .discover-bheem-section.discover-animate .discover-badge {
        animation: discoverBadgeDrop 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 0.2s forwards;
    }

    @keyframes discoverBadgeDrop {
        0% {
            opacity: 0;
            transform: translateY(-30px) scale(0.8) rotate(-5deg);
        }
        70% {
            transform: translateY(3px) scale(1.05) rotate(2deg);
        }
        100% {
            opacity: 1;
            transform: translateY(0) scale(1) rotate(0deg);
        }
    }

    .discover-badge i {
        font-size: 18px;
        background: linear-gradient(135deg, #8b5cf6, #ec4899, #f472b6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        filter: drop-shadow(0 0 10px rgba(139, 92, 246, 0.6));
    }

    .discover-bheem-title {
        font-size: 2.75rem;
        font-weight: 900;
        margin: 0 0 12px 0;
        line-height: 1.1;
        color: #FFFFFF;
        letter-spacing: -0.02em;
        opacity: 0;
        transform: translateX(-50px) rotateY(-20deg);
        perspective: 1000px;
        transform-style: preserve-3d;
    }

    /* Title 3D Slide Animation */
    .discover-bheem-section.discover-animate .discover-bheem-title {
        animation: discoverTitleSlide3D 1s cubic-bezier(0.16, 1, 0.3, 1) 0.4s forwards;
    }

    @keyframes discoverTitleSlide3D {
        0% {
            opacity: 0;
            transform: translateX(-50px) rotateY(-20deg) scale(0.9);
        }
        60% {
            transform: translateX(5px) rotateY(2deg) scale(1.02);
        }
        100% {
            opacity: 1;
            transform: translateX(0) rotateY(0deg) scale(1);
        }
    }

    .discover-bheem-title .gradient-text {
        background: linear-gradient(135deg,
            #8b5cf6 0%,
            #a855f7 20%,
            #c084fc 35%,
            #ec4899 50%,
            #06b6d4 70%,
            #10b981 85%,
            #8b5cf6 100%);
        background-size: 200% 200%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: gradientShift 8s ease-in-out infinite;
        text-shadow: 0 0 80px rgba(139, 92, 246, 0.3);
    }

    @keyframes gradientShift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .discover-bheem-subtitle {
        font-size: 1.1rem;
        color: rgba(226, 232, 240, 0.8);
        max-width: 700px;
        margin: 0 auto 20px;
        line-height: 1.6;
        opacity: 0;
        transform: translateY(30px);
    }

    /* Subtitle Fade Up Animation */
    .discover-bheem-section.discover-animate .discover-bheem-subtitle {
        animation: discoverSubtitleFade 0.9s cubic-bezier(0.16, 1, 0.3, 1) 0.6s forwards;
    }

    @keyframes discoverSubtitleFade {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Video Container - Single Featured Video */
    .discover-video-container {
        position: relative;
        margin-top: 50px;
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
    }

    .discover-video-wrapper {
        position: relative;
        overflow: hidden;
        border-radius: 24px;
        background: transparent;
        padding: 0;
        opacity: 0;
        transform: translateY(100px) rotateX(25deg) scale(0.8);
        transform-style: preserve-3d;
        perspective: 1000px;
    }

    /* Video wrapper entrance animation */
    .discover-bheem-section.discover-animate .discover-video-wrapper {
        animation: discoverVideoSlideIn 1s cubic-bezier(0.16, 1, 0.3, 1) 0.8s forwards;
    }

    @keyframes discoverVideoSlideIn {
        0% {
            opacity: 0;
            transform: translateY(100px) rotateX(25deg) scale(0.8);
        }
        60% {
            transform: translateY(-10px) rotateX(-3deg) scale(1.02);
        }
        100% {
            opacity: 1;
            transform: translateY(0) rotateX(0deg) scale(1);
        }
    }

    .discover-video-card {
        position: relative;
        background: #0a0a0a;
        border-radius: 20px;
        overflow: hidden;
        box-shadow:
            0 12px 40px rgba(0, 0, 0, 0.5),
            0 6px 20px rgba(139, 92, 246, 0.3);
        border: 2px solid rgba(139, 92, 246, 0.3);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .discover-video-card:hover {
        transform: translateY(-8px);
        box-shadow:
            0 20px 60px rgba(0, 0, 0, 0.6),
            0 10px 30px rgba(139, 92, 246, 0.5);
        border-color: rgba(139, 92, 246, 0.6);
    }

    /* Video embed container */
    .discover-video-embed {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 56.25%; /* 16:9 aspect ratio */
        background: transparent;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .discover-video-embed iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
        background: transparent;
    }

    /* Loading State */
    .discover-video-loading {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 16px;
        background: linear-gradient(135deg,
            rgba(139, 92, 246, 0.1),
            rgba(236, 72, 153, 0.1));
        z-index: 1;
        backdrop-filter: blur(15px);
    }

    .discover-video-loading::after {
        content: '';
        width: 50px;
        height: 50px;
        border: 4px solid rgba(139, 92, 246, 0.3);
        border-top-color: #8b5cf6;
        border-right-color: #ec4899;
        border-radius: 50%;
        animation: discover-spinner 1s linear infinite;
    }

    @keyframes discover-spinner {
        to { transform: rotate(360deg); }
    }

    .discover-video-loading::before {
        content: 'Loading Video...';
        color: rgba(255, 255, 255, 0.7);
        font-size: 14px;
        font-weight: 600;
    }

    /* Video Info Overlay */
    .discover-video-info {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 30px;
        background: linear-gradient(to top,
            rgba(0, 0, 0, 0.9) 0%,
            rgba(0, 0, 0, 0.7) 50%,
            transparent 100%);
        backdrop-filter: blur(10px);
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 10;
    }

    .discover-video-card:hover .discover-video-info {
        opacity: 1;
        transform: translateY(0);
    }

    .discover-video-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #FFFFFF;
        margin: 0 0 8px 0;
    }

    .discover-video-description {
        font-size: 0.95rem;
        color: rgba(255, 255, 255, 0.8);
        margin: 0;
        line-height: 1.5;
    }

    /* Video Stats Section Below Video */
    .discover-video-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-top: 30px;
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
        opacity: 0;
        transform: translateY(40px) scale(0.9);
    }

    /* Stats entrance animation */
    .discover-bheem-section.discover-animate .discover-video-stats {
        animation: discoverStatsSlideUp 0.9s cubic-bezier(0.16, 1, 0.3, 1) 1.1s forwards;
    }

    @keyframes discoverStatsSlideUp {
        0% {
            opacity: 0;
            transform: translateY(40px) scale(0.9);
        }
        70% {
            transform: translateY(-5px) scale(1.02);
        }
        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .discover-stat-item {
        background: linear-gradient(135deg,
            rgba(139, 92, 246, 0.15),
            rgba(236, 72, 153, 0.1),
            rgba(139, 92, 246, 0.15));
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 2px solid rgba(139, 92, 246, 0.3);
        border-radius: 20px;
        padding: 28px 24px;
        text-align: center;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow:
            0 8px 30px rgba(0, 0, 0, 0.3),
            0 4px 15px rgba(139, 92, 246, 0.2);
        position: relative;
        overflow: hidden;
    }

    .discover-stat-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg,
            rgba(139, 92, 246, 0.2),
            rgba(236, 72, 153, 0.15),
            rgba(139, 92, 246, 0.2));
        opacity: 0;
        transition: opacity 0.4s ease;
        z-index: 0;
    }

    .discover-stat-item:hover {
        transform: translateY(-8px) scale(1.05);
        box-shadow:
            0 15px 45px rgba(0, 0, 0, 0.4),
            0 8px 25px rgba(139, 92, 246, 0.4);
        border-color: rgba(139, 92, 246, 0.5);
    }

    .discover-stat-item:hover::before {
        opacity: 1;
    }

    .discover-stat-icon {
        font-size: 2rem;
        margin-bottom: 12px;
        display: block;
        background: linear-gradient(135deg,
            #8b5cf6,
            #a855f7,
            #ec4899,
            #f472b6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        filter: drop-shadow(0 0 15px rgba(139, 92, 246, 0.6));
        position: relative;
        z-index: 1;
    }

    .discover-stat-value {
        font-size: 2.25rem;
        font-weight: 900;
        color: #FFFFFF;
        display: block;
        margin-bottom: 6px;
        line-height: 1;
        background: linear-gradient(135deg,
            #FFFFFF,
            #E2E8F0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        position: relative;
        z-index: 1;
    }

    .discover-stat-label {
        font-size: 0.9rem;
        color: rgba(226, 232, 240, 0.7);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        position: relative;
        z-index: 1;
    }

    /* CTA Button */
    .discover-cta-button {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 18px 42px;
        background: linear-gradient(135deg,
            #8b5cf6 0%,
            #a855f7 20%,
            #c084fc 35%,
            #ec4899 50%,
            #06b6d4 70%,
            #10b981 85%,
            #8b5cf6 100%);
        background-size: 200% 200%;
        color: white;
        text-decoration: none;
        border-radius: 100px;
        font-weight: 800;
        font-size: 17px;
        letter-spacing: -0.01em;
        box-shadow:
            0 15px 40px rgba(139, 92, 246, 0.4),
            0 8px 20px rgba(236, 72, 153, 0.3),
            0 3px 10px rgba(168, 85, 247, 0.2),
            inset 0 2px 0 rgba(255, 255, 255, 0.3);
        transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
        overflow: hidden;
        border: 2px solid rgba(255, 255, 255, 0.4);
        animation: gradientShift 8s ease-in-out infinite;
        margin-top: 40px;
        opacity: 0;
        transform: translateY(30px) scale(0.85);
    }

    /* CTA Button Pop Animation */
    .discover-bheem-section.discover-animate .discover-cta-button {
        animation: discoverButtonPop 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 1.3s forwards,
                   gradientShift 8s ease-in-out infinite;
    }

    @keyframes discoverButtonPop {
        0% {
            opacity: 0;
            transform: translateY(30px) scale(0.85);
        }
        70% {
            transform: translateY(-5px) scale(1.08);
        }
        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .discover-cta-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(
            90deg,
            transparent,
            rgba(255, 255, 255, 0.4),
            transparent
        );
        transition: left 0.6s ease;
    }

    .discover-cta-button:hover::before {
        left: 100%;
    }

    .discover-cta-button:hover {
        transform: translateY(-5px) scale(1.05);
        box-shadow:
            0 20px 50px rgba(139, 92, 246, 0.5),
            0 12px 30px rgba(236, 72, 153, 0.4),
            0 6px 15px rgba(168, 85, 247, 0.3),
            inset 0 2px 0 rgba(255, 255, 255, 0.4);
        border-color: rgba(255, 255, 255, 0.6);
    }

    .discover-cta-button i {
        font-size: 20px;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .discover-cta-button:hover i {
        transform: rotate(15deg) scale(1.15);
        animation: discover-icon-pulse 0.6s ease-in-out;
    }

    @keyframes discover-icon-pulse {
        0%, 100% { transform: rotate(15deg) scale(1.15); }
        50% { transform: rotate(15deg) scale(1.25); }
    }

    .discover-cta-center {
        text-align: center;
    }

    /* Responsive Design - Optimized for All Devices */

    /* Large Desktop (1440px and up) */
    @media (min-width: 1440px) {
        .discover-bheem-container {
            max-width: 1600px;
            padding: 0 40px;
        }

        .discover-video-container {
            max-width: 1000px;
        }

        .discover-bheem-title {
            font-size: 3.25rem;
        }

        .discover-cta-button {
            padding: 20px 48px;
            font-size: 18px;
        }
    }

    /* Desktop (1200px - 1439px) */
    @media (max-width: 1439px) and (min-width: 1200px) {
        .discover-video-container {
            max-width: 850px;
        }
    }

    /* Laptop/Tablet Landscape (1024px - 1199px) */
    @media (max-width: 1199px) and (min-width: 1024px) {
        .discover-video-container {
            max-width: 800px;
        }

        .discover-bheem-title {
            font-size: 2.5rem;
        }
    }

    /* Tablet Portrait (768px - 1023px) */
    @media (max-width: 1023px) and (min-width: 768px) {
        .discover-bheem-section {
            padding: 60px 0;
        }

        .discover-bheem-container {
            padding: 0 25px;
        }

        .discover-video-container {
            max-width: 700px;
        }

        .discover-bheem-title {
            font-size: 2.25rem;
        }

        .discover-bheem-subtitle {
            font-size: 1rem;
        }

        .discover-cta-button {
            padding: 16px 38px;
            font-size: 16px;
        }

        .discover-video-info {
            padding: 25px;
        }

        .discover-video-title {
            font-size: 1.3rem;
        }

        .discover-video-stats {
            gap: 16px;
            max-width: 700px;
        }

        .discover-stat-item {
            padding: 24px 20px;
        }

        .discover-stat-value {
            font-size: 2rem;
        }

        .discover-stat-icon {
            font-size: 1.8rem;
        }
    }

    /* Mobile Landscape/Small Tablet (640px - 767px) */
    @media (max-width: 767px) and (min-width: 640px) {
        .discover-bheem-section {
            padding: 50px 0;
        }

        .discover-bheem-container {
            padding: 0 20px;
        }

        .discover-video-container {
            max-width: 100%;
        }

        .discover-bheem-title {
            font-size: 2rem;
        }

        .discover-bheem-subtitle {
            font-size: 0.95rem;
        }

        .discover-badge {
            font-size: 13px;
            padding: 9px 18px;
        }

        .discover-cta-button {
            padding: 15px 34px;
            font-size: 15px;
        }

        .discover-video-info {
            padding: 20px;
        }

        .discover-video-title {
            font-size: 1.2rem;
        }

        .discover-video-description {
            font-size: 0.9rem;
        }

        .discover-video-stats {
            grid-template-columns: 1fr;
            gap: 14px;
            margin-top: 25px;
        }

        .discover-stat-item {
            padding: 22px 20px;
        }

        .discover-stat-value {
            font-size: 1.9rem;
        }

        .discover-stat-icon {
            font-size: 1.7rem;
        }

        .discover-stat-label {
            font-size: 0.85rem;
        }
    }

    /* Mobile Portrait (480px - 639px) */
    @media (max-width: 639px) and (min-width: 480px) {
        .discover-bheem-section {
            padding: 45px 0;
        }

        .discover-bheem-container {
            padding: 0 18px;
        }

        .discover-bheem-title {
            font-size: 1.85rem;
            line-height: 1.15;
        }

        .discover-bheem-subtitle {
            font-size: 0.9rem;
            max-width: 90%;
        }

        .discover-badge {
            font-size: 12px;
            padding: 8px 16px;
        }

        .discover-cta-button {
            padding: 14px 30px;
            font-size: 15px;
            gap: 10px;
        }

        .discover-cta-button i {
            font-size: 18px;
        }

        .discover-video-info {
            padding: 18px;
        }

        .discover-video-title {
            font-size: 1.15rem;
        }

        .discover-video-description {
            font-size: 0.85rem;
        }

        .discover-video-stats {
            grid-template-columns: 1fr;
            gap: 12px;
            margin-top: 20px;
        }

        .discover-stat-item {
            padding: 20px 18px;
        }

        .discover-stat-value {
            font-size: 1.8rem;
        }

        .discover-stat-icon {
            font-size: 1.6rem;
            margin-bottom: 10px;
        }

        .discover-stat-label {
            font-size: 0.8rem;
        }
    }

    /* Small Mobile (320px - 479px) */
    @media (max-width: 479px) {
        .discover-bheem-section {
            padding: 40px 0;
        }

        .discover-bheem-container {
            padding: 0 15px;
        }

        .discover-video-container {
            margin-top: 40px;
        }

        .discover-video-card {
            border-radius: 16px;
        }

        .discover-video-wrapper {
            border-radius: 16px;
        }

        .discover-bheem-title {
            font-size: 1.7rem;
            line-height: 1.2;
        }

        .discover-bheem-subtitle {
            font-size: 0.85rem;
            max-width: 100%;
            line-height: 1.5;
        }

        .discover-badge {
            font-size: 11px;
            padding: 7px 14px;
            gap: 6px;
        }

        .discover-badge i {
            font-size: 16px;
        }

        .discover-cta-button {
            padding: 13px 26px;
            font-size: 14px;
            gap: 9px;
        }

        .discover-cta-button i {
            font-size: 17px;
        }

        .discover-video-info {
            padding: 16px;
        }

        .discover-video-title {
            font-size: 1.1rem;
        }

        .discover-video-description {
            font-size: 0.8rem;
        }

        .discover-video-stats {
            grid-template-columns: 1fr;
            gap: 10px;
            margin-top: 18px;
        }

        .discover-stat-item {
            padding: 18px 16px;
            border-radius: 16px;
        }

        .discover-stat-value {
            font-size: 1.7rem;
        }

        .discover-stat-icon {
            font-size: 1.5rem;
            margin-bottom: 8px;
        }

        .discover-stat-label {
            font-size: 0.75rem;
        }
    }

    /* Extra Small Mobile (less than 320px) */
    @media (max-width: 319px) {
        .discover-bheem-section {
            padding: 35px 0;
        }

        .discover-bheem-container {
            padding: 0 12px;
        }

        .discover-bheem-title {
            font-size: 1.5rem;
        }

        .discover-bheem-subtitle {
            font-size: 0.8rem;
        }

        .discover-cta-button {
            padding: 12px 22px;
            font-size: 13px;
        }
    }

    /* Additional Mobile Fixes for All Devices */
    @media (max-width: 1023px) {
        /* Ensure proper video aspect ratio on mobile */
        .discover-video-embed {
            padding-bottom: 56.25%;
        }

        /* Better touch targets */
        .discover-cta-button {
            touch-action: manipulation;
            -webkit-tap-highlight-color: transparent;
        }
    }

    /* Portrait orientation optimization */
    @media (max-width: 768px) and (orientation: portrait) {
        .discover-video-embed {
            padding-bottom: 56.25%;
        }

        .discover-video-wrapper {
            border-radius: 20px;
        }

        .discover-video-card {
            border-radius: 18px;
        }
    }

    /* Landscape orientation optimization for phones */
    @media (max-width: 768px) and (orientation: landscape) {
        .discover-bheem-section {
            padding: 40px 0;
        }

        .discover-video-container {
            margin-top: 35px;
        }
    }

    /* High DPI screens optimization */
    @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
        .discover-video-card {
            border: 1.5px solid rgba(139, 92, 246, 0.3);
        }

        .discover-badge {
            border: 1.5px solid rgba(139, 92, 246, 0.4);
        }
    }
</style>

<!-- Discover Bheem Academy Section -->
<section class="discover-bheem-section">
    <div class="discover-bheem-container">
        <!-- Header -->
        <div class="discover-bheem-header">
            <div class="discover-badge">
                <i class="fas fa-play-circle"></i>
                <span>Featured Video</span>
            </div>
            <h2 class="discover-bheem-title">
                <span class="gradient-text">Discover Bheem Academy</span>
            </h2>
            <p class="discover-bheem-subtitle">
                Watch our introduction video to learn how we're revolutionizing AI education for all ages
            </p>
        </div>

        <!-- Video Container -->
        <div class="discover-video-container">
            <div class="discover-video-wrapper">
                <div class="discover-video-card">
                    <!-- Video Embed -->
                    <div class="discover-video-embed">
                        <div class="discover-video-loading"></div>
                        <!-- Replace with your YouTube video embed URL -->
                        <iframe
                            src="https://www.youtube.com/embed/YOUR_VIDEO_ID"
                            title="Discover Bheem Academy"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </div>

                    <!-- Video Info Overlay -->
                    <div class="discover-video-info">
                        <h3 class="discover-video-title">Welcome to Bheem Academy</h3>
                        <p class="discover-video-description">
                            Discover how our AI-powered platform is revolutionizing education for students across Kerala and beyond.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Video Stats Section Below Video -->
            <div class="discover-video-stats">
                <div class="discover-stat-item">
                    <i class="fas fa-clock discover-stat-icon"></i>
                    <span class="discover-stat-value">5:30</span>
                    <span class="discover-stat-label">Duration</span>
                </div>
                <div class="discover-stat-item">
                    <i class="fas fa-users discover-stat-icon"></i>
                    <span class="discover-stat-value">10K+</span>
                    <span class="discover-stat-label">Students</span>
                </div>
                <div class="discover-stat-item">
                    <i class="fas fa-star discover-stat-icon"></i>
                    <span class="discover-stat-value">4.9</span>
                    <span class="discover-stat-label">Rating</span>
                </div>
            </div>
        </div>

        <!-- CTA Button -->
        <div class="discover-cta-center">
            <a href="#courses" class="discover-cta-button">
                <i class="fas fa-graduation-cap"></i>
                <span>Explore All Courses</span>
            </a>
        </div>
    </div>
</section>

<script>
(function() {
    'use strict';

    // Scroll-triggered animation observer
    function initScrollAnimations() {
        const discoverSection = document.querySelector('.discover-bheem-section');

        if (!discoverSection) {
            console.log('⚠️ Discover Bheem section not found for scroll animations');
            return;
        }

        // Create intersection observer for scroll-triggered animations
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting && !entry.target.classList.contains('discover-animate')) {
                    console.log('🎬 Discover Bheem section entered viewport - triggering animations');
                    entry.target.classList.add('discover-animate');
                }
            });
        }, {
            threshold: 0.1,        // Trigger when 10% of section is visible
            rootMargin: '-80px'    // Trigger slightly before section enters viewport
        });

        observer.observe(discoverSection);
        console.log('✅ Scroll animation observer initialized for Discover Bheem section');
    }

    // Hide loading state when video loads
    function initVideoLoading() {
        const iframe = document.querySelector('.discover-video-embed iframe');
        const loader = document.querySelector('.discover-video-loading');

        if (iframe && loader) {
            iframe.onload = function() {
                loader.style.display = 'none';
            };

            // Fallback timeout
            setTimeout(function() {
                if (loader) {
                    loader.style.display = 'none';
                }
            }, 4000);
        }
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            initScrollAnimations();
            initVideoLoading();
        });
    } else {
        initScrollAnimations();
        initVideoLoading();
    }
})();
</script>
