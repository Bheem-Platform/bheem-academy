<?php
defined('MOODLE_INTERNAL') || die();
global $CFG;
?>

<style>
    .neural-features-section {
        padding: 60px 0 0px;
        position: relative;
        background:
            linear-gradient(180deg,
                #f8fafc 0%,
                #ffffff 15%,
                #fafbfc 35%,
                #ffffff 65%,
                #f8fafc 85%,
                #f1f5f9 100%);
        overflow: hidden;
        isolation: isolate;
    }

    .neural-features-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(ellipse 140% 100% at 25% 15%, rgba(139, 92, 246, 0.12) 0%, transparent 55%),
            radial-gradient(ellipse 140% 100% at 75% 85%, rgba(236, 72, 153, 0.12) 0%, transparent 55%),
            radial-gradient(circle at 50% 50%, rgba(6, 182, 212, 0.08) 0%, transparent 65%),
            radial-gradient(ellipse 100% 50% at 80% 30%, rgba(168, 85, 247, 0.06) 0%, transparent 50%);
        pointer-events: none;
        z-index: 1;
        animation: neuralPulse 15s ease-in-out infinite;
    }

    @keyframes neuralPulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.85; transform: scale(1.05); }
    }

    .neural-features-section::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image:
            linear-gradient(rgba(139, 92, 246, 0.02) 1.5px, transparent 1.5px),
            linear-gradient(90deg, rgba(139, 92, 246, 0.02) 1.5px, transparent 1.5px);
        background-size: 60px 60px;
        pointer-events: none;
        z-index: 1;
        opacity: 0.5;
    }

    .features-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 20px;
        position: relative;
        z-index: 2;
    }

    .features-header {
        text-align: center;
        margin-bottom: 80px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 30px;
        position: relative;
    }

    .features-header::before {
        content: '';
        position: absolute;
        top: -60px;
        left: 50%;
        transform: translateX(-50%);
        width: 200px;
        height: 6px;
        background: linear-gradient(90deg,
            transparent 0%,
            #8b5cf6 20%,
            #ec4899 50%,
            #06b6d4 80%,
            transparent 100%);
        border-radius: 10px;
        opacity: 0.4;
    }

    .features-title {
        font-size: 3.75rem;
        font-weight: 900;
        margin: 0;
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
        line-height: 1.2;
        max-width: 950px;
        animation: gradientShift 8s ease-in-out infinite;
        text-shadow: 0 0 80px rgba(139, 92, 246, 0.3);
    }

    @keyframes gradientShift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .features-subtitle {
        font-size: 1.35rem;
        color: #475569;
        margin: 0;
        max-width: 750px;
        line-height: 1.7;
        font-weight: 500;
    }

    .features-header-cta {
        display: inline-flex;
        align-items: center;
        gap: 14px;
        padding: 18px 42px;
        background:
            linear-gradient(135deg,
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
        border-radius: 60px;
        font-weight: 700;
        font-size: 1.125rem;
        transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow:
            0 15px 40px rgba(139, 92, 246, 0.4),
            0 8px 20px rgba(236, 72, 153, 0.3),
            0 3px 10px rgba(168, 85, 247, 0.2),
            inset 0 2px 0 rgba(255, 255, 255, 0.3);
        position: relative;
        overflow: hidden;
        border: 2px solid rgba(255, 255, 255, 0.4);
        animation: gradientShift 8s ease-in-out infinite;
    }

    .features-header-cta::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg,
            transparent,
            rgba(255, 255, 255, 0.4),
            transparent);
        transition: left 0.7s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .features-header-cta::after {
        content: '';
        position: absolute;
        inset: -2px;
        background: linear-gradient(135deg,
            #8b5cf6,
            #ec4899,
            #06b6d4,
            #10b981);
        border-radius: 60px;
        opacity: 0;
        transition: opacity 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: -1;
        filter: blur(10px);
    }

    .features-header-cta:hover {
        transform: translateY(-5px) scale(1.05);
        box-shadow:
            0 20px 50px rgba(139, 92, 246, 0.5),
            0 12px 30px rgba(236, 72, 153, 0.4),
            0 6px 15px rgba(168, 85, 247, 0.3),
            inset 0 2px 0 rgba(255, 255, 255, 0.4);
        border-color: rgba(255, 255, 255, 0.6);
    }

    .features-header-cta:hover::before {
        left: 100%;
    }

    .features-header-cta:hover::after {
        opacity: 0.6;
    }

    .features-header-cta i {
        font-size: 1.3rem;
        transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .features-header-cta:hover i {
        transform: translateX(5px) rotate(15deg);
    }

    .features-grid {
        display: flex;
        gap: 35px;
        margin-top: 50px;
        position: relative;
        animation: autoScrollCards 40s linear infinite;
        width: max-content;
    }

    /* Container wrapper to show exactly 3 cards */
    .features-container {
        max-width: 1265px;
        margin: 0 auto;
        padding: 0 20px;
        overflow: hidden;
        position: relative;
    }

    /* Grid wrapper for overflow control */
    .features-grid-wrapper {
        overflow: hidden;
        width: 100%;
        position: relative;
    }

    @keyframes autoScrollCards {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-50%);
        }
    }

    /* Pause animation on hover */
    .features-grid:hover {
        animation-play-state: paused;
    }

    .feature-card {
        background:
            linear-gradient(155deg,
                #ffffff 0%,
                #fafbfc 30%,
                #ffffff 60%,
                #f8fafc 100%);
        border-radius: 28px;
        overflow: hidden;
        transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow:
            0 15px 45px rgba(100, 116, 139, 0.12),
            0 8px 25px rgba(148, 163, 184, 0.1),
            0 3px 12px rgba(203, 213, 225, 0.08),
            inset 0 1px 0 rgba(255, 255, 255, 1),
            inset 0 -1px 0 rgba(226, 232, 240, 0.3);
        border: 2px solid rgba(226, 232, 240, 0.6);
        position: relative;
        display: flex;
        flex-direction: column;
        backdrop-filter: blur(10px) saturate(120%);
        min-width: 380px;
        max-width: 380px;
        flex-shrink: 0;
    }

    .feature-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            linear-gradient(135deg,
                rgba(139, 92, 246, 0.08) 0%,
                rgba(168, 85, 247, 0.06) 25%,
                rgba(236, 72, 153, 0.08) 50%,
                rgba(6, 182, 212, 0.06) 75%,
                rgba(139, 92, 246, 0.08) 100%);
        opacity: 0;
        transition: opacity 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        pointer-events: none;
        z-index: 1;
    }

    .feature-card::after {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: linear-gradient(135deg,
            rgba(139, 92, 246, 0.4) 0%,
            rgba(236, 72, 153, 0.4) 50%,
            rgba(6, 182, 212, 0.4) 100%);
        border-radius: 28px;
        opacity: 0;
        transition: opacity 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        pointer-events: none;
        z-index: 0;
    }

    .feature-card:hover {
        transform: translateY(-15px) scale(1.02);
        box-shadow:
            0 35px 80px rgba(139, 92, 246, 0.2),
            0 20px 50px rgba(236, 72, 153, 0.15),
            0 10px 30px rgba(100, 116, 139, 0.12),
            0 5px 15px rgba(148, 163, 184, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 1),
            inset 0 -1px 0 rgba(226, 232, 240, 0.4);
        border-color: rgba(139, 92, 246, 0.5);
    }

    .feature-card:hover::before {
        opacity: 1;
    }

    .feature-card:hover::after {
        opacity: 1;
    }

    .feature-card-image {
        width: 100%;
        height: 220px;
        overflow: hidden;
        position: relative;
        background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 50%, #f1f5f9 100%);
    }

    .feature-card-image::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg,
            rgba(139, 92, 246, 0.15) 0%,
            rgba(236, 72, 153, 0.15) 100%);
        opacity: 0;
        transition: opacity 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 2;
        mix-blend-mode: overlay;
    }

    .feature-card-image::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 120px;
        background: linear-gradient(to top,
            rgba(0, 0, 0, 0.4) 0%,
            rgba(0, 0, 0, 0.2) 50%,
            transparent 100%);
        opacity: 0;
        transition: opacity 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 2;
    }

    .feature-card:hover .feature-card-image::before {
        opacity: 1;
    }

    .feature-card:hover .feature-card-image::after {
        opacity: 0.6;
    }

    .feature-card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
        z-index: 1;
    }

    .feature-card:hover .feature-card-image img {
        transform: scale(1.12) rotate(1deg);
        filter: brightness(1.1) contrast(1.05) saturate(1.15);
    }

    .feature-card-content {
        padding: 28px 30px 30px;
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 14px;
        position: relative;
        z-index: 2;
        align-items: flex-start;
    }

    .feature-card-category {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 8px 20px;
        background:
            linear-gradient(135deg,
                rgba(139, 92, 246, 0.15) 0%,
                rgba(168, 85, 247, 0.12) 50%,
                rgba(236, 72, 153, 0.15) 100%);
        color: #7c3aed;
        font-size: 0.875rem;
        font-weight: 700;
        border-radius: 25px;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        width: fit-content;
        box-shadow:
            0 4px 15px rgba(139, 92, 246, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.4);
        border: 1px solid rgba(139, 92, 246, 0.2);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .feature-card:hover .feature-card-category {
        background:
            linear-gradient(135deg,
                rgba(139, 92, 246, 0.25) 0%,
                rgba(168, 85, 247, 0.2) 50%,
                rgba(236, 72, 153, 0.25) 100%);
        box-shadow:
            0 6px 20px rgba(139, 92, 246, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.5);
        transform: translateY(-2px);
    }

    .feature-card-category i {
        font-size: 1rem;
    }

    .feature-card-title {
        font-size: 1.5rem;
        font-weight: 800;
        background: linear-gradient(135deg,
            #1e293b 0%,
            #334155 50%,
            #1e293b 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin: 0;
        line-height: 1.3;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        text-align: left;
        width: 100%;
    }

    .feature-card:hover .feature-card-title {
        background: linear-gradient(135deg,
            #8b5cf6 0%,
            #a855f7 25%,
            #ec4899 50%,
            #06b6d4 75%,
            #8b5cf6 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        transform: translateX(5px);
    }

    .feature-card-description {
        font-size: 1rem;
        color: #475569;
        line-height: 1.65;
        margin: 0;
        flex: 1;
        font-weight: 400;
        transition: color 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        text-align: left;
        width: 100%;
    }

    .feature-card:hover .feature-card-description {
        color: #334155;
    }

    .feature-card-meta {
        display: flex;
        align-items: center;
        gap: 20px;
        padding-top: 12px;
        border-top: 1.5px solid rgba(226, 232, 240, 0.6);
        font-size: 0.95rem;
        color: #64748b;
        width: 100%;
    }

    .feature-card-meta-item {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .feature-card-meta-item i {
        color: #8b5cf6;
        font-size: 1rem;
    }

    .feature-card-cta {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        padding: 14px 28px;
        background:
            linear-gradient(135deg,
                #8b5cf6 0%,
                #a855f7 25%,
                #ec4899 75%,
                #f472b6 100%);
        color: white;
        text-decoration: none;
        border-radius: 16px;
        font-weight: 700;
        font-size: 1rem;
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow:
            0 12px 30px rgba(139, 92, 246, 0.35),
            0 6px 15px rgba(236, 72, 153, 0.25),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        margin-top: 10px;
        width: 100%;
        position: relative;
        overflow: hidden;
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    .feature-card-cta::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg,
            transparent,
            rgba(255, 255, 255, 0.3),
            transparent);
        transition: left 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .feature-card-cta:hover::before {
        left: 100%;
    }

    .feature-card-cta:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow:
            0 18px 45px rgba(139, 92, 246, 0.45),
            0 10px 25px rgba(236, 72, 153, 0.35),
            0 5px 15px rgba(168, 85, 247, 0.25),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
        border-color: rgba(255, 255, 255, 0.5);
    }

    .feature-card-cta i {
        transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        font-size: 1.1rem;
    }

    .feature-card-cta:hover i {
        transform: translateX(8px);
    }

    /* Responsive Design - Maintaining exact same card dimensions as desktop */
    @media (max-width: 1200px) {
        .features-title {
            font-size: 3rem;
        }

        .features-grid {
            gap: 35px;
            animation: autoScrollCards 40s linear infinite;
        }

        /* Card dimensions remain the same as desktop */
        .feature-card {
            min-width: 380px;
            max-width: 380px;
        }

        .feature-card-image {
            height: 220px;
        }
    }

    @media (max-width: 1024px) {
        .features-title {
            font-size: 2.75rem;
        }

        .features-container {
            padding: 0 15px;
        }

        .features-grid {
            gap: 35px;
            animation: autoScrollCards 40s linear infinite;
        }

        /* Card dimensions remain the same as desktop */
        .feature-card {
            min-width: 380px;
            max-width: 380px;
        }

        .feature-card-image {
            height: 220px;
        }

        .feature-card-content {
            padding: 28px 30px 30px;
        }
    }

    @media (max-width: 768px) {
        .neural-features-section {
            padding: 40px 0 15px;
        }

        .features-header {
            margin-bottom: 50px;
            gap: 20px;
        }

        .features-title {
            font-size: 2.25rem;
        }

        .features-subtitle {
            font-size: 1.1rem;
        }

        .features-header-cta {
            padding: 14px 30px;
            font-size: 1rem;
        }

        .features-container {
            padding: 0 10px;
        }

        .features-grid {
            gap: 35px;
            animation: autoScrollCards 40s linear infinite;
        }

        /* Card dimensions remain the same as desktop */
        .feature-card {
            min-width: 380px;
            max-width: 380px;
        }

        .feature-card-image {
            height: 220px;
        }

        .feature-card-content {
            padding: 28px 30px 30px;
        }

        .feature-card-title {
            font-size: 1.5rem;
        }

        .feature-card-description {
            font-size: 1rem;
        }
    }

    @media (max-width: 640px) {
        .neural-features-section {
            padding: 30px 0 10px;
        }

        .features-header {
            margin-bottom: 40px;
        }

        .features-title {
            font-size: 2rem;
        }

        .features-subtitle {
            font-size: 1rem;
        }

        .features-container {
            padding: 0 10px;
        }

        .features-grid {
            gap: 35px;
            animation: autoScrollCards 40s linear infinite;
        }

        /* Card dimensions remain the same as desktop */
        .feature-card {
            min-width: 380px;
            max-width: 380px;
        }

        .feature-card-image {
            height: 220px;
        }

        .feature-card-content {
            padding: 28px 30px 30px;
            gap: 14px;
        }

        .feature-card-title {
            font-size: 1.5rem;
        }

        .feature-card-description {
            font-size: 1rem;
        }
    }

    @media (max-width: 480px) {
        .features-title {
            font-size: 1.75rem;
        }

        .features-subtitle {
            font-size: 0.95rem;
        }

        .features-header-cta {
            padding: 12px 24px;
            font-size: 0.95rem;
        }

        .features-container {
            padding: 0 10px;
        }

        .features-grid {
            gap: 35px;
            animation: autoScrollCards 40s linear infinite;
        }

        /* Card dimensions remain the same as desktop */
        .feature-card {
            min-width: 380px;
            max-width: 380px;
        }

        .feature-card-image {
            height: 220px;
        }

        .feature-card-content {
            padding: 28px 30px 30px;
        }

        .feature-card-title {
            font-size: 1.5rem;
        }

        .feature-card-description {
            font-size: 1rem;
        }

        .feature-card-cta {
            padding: 14px 28px;
            font-size: 1rem;
        }
    }

    @media (max-width: 375px) {
        .neural-features-section {
            padding: 25px 0 10px;
        }

        .features-title {
            font-size: 1.6rem;
        }

        .features-subtitle {
            font-size: 0.9rem;
        }

        .features-container {
            padding: 0 10px;
        }

        .features-grid {
            gap: 35px;
            animation: autoScrollCards 40s linear infinite;
        }

        /* Card dimensions remain the same as desktop */
        .feature-card {
            min-width: 380px;
            max-width: 380px;
        }

        .feature-card-image {
            height: 220px;
        }

        .feature-card-content {
            padding: 28px 30px 30px;
            gap: 14px;
        }

        .feature-card-title {
            font-size: 1.5rem;
        }

        .feature-card-category {
            font-size: 0.875rem;
            padding: 8px 20px;
        }

        .feature-card-description {
            font-size: 1rem;
        }
    }

    @media (max-width: 320px) {
        .features-title {
            font-size: 1.5rem;
        }

        .features-subtitle {
            font-size: 0.85rem;
        }

        .features-grid {
            gap: 35px;
            animation: autoScrollCards 40s linear infinite;
        }

        /* Card dimensions remain the same as desktop */
        .feature-card {
            min-width: 380px;
            max-width: 380px;
        }

        .feature-card-image {
            height: 220px;
        }

        .feature-card-content {
            padding: 28px 30px 30px;
        }

        .feature-card-title {
            font-size: 1.5rem;
        }

        .feature-card-description {
            font-size: 1rem;
        }
    }
</style>

<section class="neural-features-section" id="neuralFeatures">
    <div class="features-container">
        <div class="features-header">
            <h2 class="features-title">Join Our 780+ Live Online Classes For Student</h2>
            <p class="features-subtitle">Experience cutting-edge AI education tailored for every age group and skill level</p>
            <a href="<?php echo $CFG->wwwroot; ?>/course/index.php" class="features-header-cta">
                <i class="fas fa-rocket"></i>
                <span>Explore All Courses</span>
            </a>
        </div>

        <div class="features-grid">
            <!-- Feature Card 1: AI for Kids -->
            <div class="feature-card">
                <div class="feature-card-image">
                    <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/9fbeaf8b-3518-42d9-4525-9fe219224a00/public" alt="AI for Kids" loading="lazy">
                </div>
                <div class="feature-card-content">
                    <span class="feature-card-category">
                        <i class="fas fa-child"></i>
                        Ages 8-13
                    </span>
                    <h3 class="feature-card-title">AI for Kids – Learn, Play & Create</h3>
                    <p class="feature-card-description">Empower young minds with coding, AI fundamentals, and game building. Perfect for grades 3-9 to explore technology through fun, interactive learning.</p>
                    <div class="feature-card-meta">
                        <div class="feature-card-meta-item">
                            <i class="fas fa-users"></i>
                            <span>Grade 3-9</span>
                        </div>
                        <div class="feature-card-meta-item">
                            <i class="fas fa-clock"></i>
                            <span>Live Classes</span>
                        </div>
                    </div>
                    <a href="<?php echo $CFG->wwwroot; ?>/course/index.php?categoryid=6" class="feature-card-cta">
                        <span>View More</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Feature Card 2: AI for Youth -->
            <div class="feature-card">
                <div class="feature-card-image">
                    <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/3150ef11-e9ba-458b-75d7-d2d54bf51300/public" alt="AI for Youth" loading="lazy">
                </div>
                <div class="feature-card-content">
                    <span class="feature-card-category">
                        <i class="fas fa-graduation-cap"></i>
                        Ages 16+
                    </span>
                    <h3 class="feature-card-title">AI for Youth – Innovate Like a Pro</h3>
                    <p class="feature-card-description">Master advanced skills in chatbot development, web design, and AI applications. Designed for high school and pre-university students ready to innovate.</p>
                    <div class="feature-card-meta">
                        <div class="feature-card-meta-item">
                            <i class="fas fa-users"></i>
                            <span>High School+</span>
                        </div>
                        <div class="feature-card-meta-item">
                            <i class="fas fa-certificate"></i>
                            <span>Certification</span>
                        </div>
                    </div>
                    <a href="<?php echo $CFG->wwwroot; ?>/course/index.php?categoryid=7" class="feature-card-cta">
                        <span>View More</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Feature Card 3: AI for Professionals -->
            <div class="feature-card">
                <div class="feature-card-image">
                    <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/e7aa1c89-df71-4320-17a7-92a873a9db00/public" alt="AI for Professionals" loading="lazy">
                </div>
                <div class="feature-card-content">
                    <span class="feature-card-category">
                        <i class="fas fa-briefcase"></i>
                        Professional
                    </span>
                    <h3 class="feature-card-title">AI for Professionals</h3>
                    <p class="feature-card-description">Advance your career with enterprise-level AI skills, machine learning, and data science. Industry-ready training for working professionals.</p>
                    <div class="feature-card-meta">
                        <div class="feature-card-meta-item">
                            <i class="fas fa-users"></i>
                            <span>Working Pros</span>
                        </div>
                        <div class="feature-card-meta-item">
                            <i class="fas fa-award"></i>
                            <span>Advanced</span>
                        </div>
                    </div>
                    <a href="<?php echo $CFG->wwwroot; ?>/course/index.php?categoryid=8" class="feature-card-cta">
                        <span>View More</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Feature Card 4: AI for Creators -->
            <div class="feature-card">
                <div class="feature-card-image">
                    <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/9fbeaf8b-3518-42d9-4525-9fe219224a00/public" alt="AI for Creators" loading="lazy">
                </div>
                <div class="feature-card-content">
                    <span class="feature-card-category">
                        <i class="fas fa-palette"></i>
                        Creators
                    </span>
                    <h3 class="feature-card-title">AI for Creators & Influencers</h3>
                    <p class="feature-card-description">Leverage AI tools for content creation, social media automation, and audience engagement. Transform your creative workflow with intelligent automation.</p>
                    <div class="feature-card-meta">
                        <div class="feature-card-meta-item">
                            <i class="fas fa-users"></i>
                            <span>All Levels</span>
                        </div>
                        <div class="feature-card-meta-item">
                            <i class="fas fa-star"></i>
                            <span>Popular</span>
                        </div>
                    </div>
                    <a href="<?php echo $CFG->wwwroot; ?>/course/index.php?categoryid=9" class="feature-card-cta">
                        <span>View More</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Feature Card 5: Bheem AI Social 360 -->
            <div class="feature-card">
                <div class="feature-card-image">
                    <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/3150ef11-e9ba-458b-75d7-d2d54bf51300/public" alt="Bheem AI Social 360" loading="lazy">
                </div>
                <div class="feature-card-content">
                    <span class="feature-card-category">
                        <i class="fas fa-share-nodes"></i>
                        Social AI
                    </span>
                    <h3 class="feature-card-title">Bheem AI Social 360</h3>
                    <p class="feature-card-description">Master comprehensive social media management with AI-powered analytics, scheduling, and content optimization. Build your brand with intelligent insights.</p>
                    <div class="feature-card-meta">
                        <div class="feature-card-meta-item">
                            <i class="fas fa-users"></i>
                            <span>Marketers</span>
                        </div>
                        <div class="feature-card-meta-item">
                            <i class="fas fa-rocket"></i>
                            <span>New</span>
                        </div>
                    </div>
                    <a href="<?php echo $CFG->wwwroot; ?>/course/index.php?categoryid=10" class="feature-card-cta">
                        <span>View More</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Feature Card 6: Bheem Super Star -->
            <div class="feature-card">
                <div class="feature-card-image">
                    <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/e7aa1c89-df71-4320-17a7-92a873a9db00/public" alt="Bheem Super Star" loading="lazy">
                </div>
                <div class="feature-card-content">
                    <span class="feature-card-category">
                        <i class="fas fa-star"></i>
                        Elite Program
                    </span>
                    <h3 class="feature-card-title">Bheem Super Star</h3>
                    <p class="feature-card-description">Join our elite program for aspiring AI champions. Master cutting-edge technologies, build real-world projects, and become tomorrow's AI leaders with personalized mentorship.</p>
                    <div class="feature-card-meta">
                        <div class="feature-card-meta-item">
                            <i class="fas fa-users"></i>
                            <span>All Ages</span>
                        </div>
                        <div class="feature-card-meta-item">
                            <i class="fas fa-trophy"></i>
                            <span>Elite</span>
                        </div>
                    </div>
                    <a href="<?php echo $CFG->wwwroot; ?>/course/index.php?categoryid=11" class="feature-card-cta">
                        <span>View More</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Auto-scrolling feature cards - Duplicate cards for seamless infinite loop
document.addEventListener('DOMContentLoaded', function() {
    const featuresGrid = document.querySelector('#neuralFeatures .features-grid');
    if (featuresGrid) {
        const cards = Array.from(featuresGrid.querySelectorAll('.feature-card'));

        // Clone all cards and append them for seamless infinite scrolling
        cards.forEach(card => {
            const clone = card.cloneNode(true);
            featuresGrid.appendChild(clone);
        });

        console.log('✨ Feature cards auto-scroll initialized');
    }
});
</script>
