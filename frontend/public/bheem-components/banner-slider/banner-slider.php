<?php
/**
 * Banner Slider Component
 * Modern animated hero slider with course offerings
 * Extracted from dev.bheem.cloud
 */
defined('MOODLE_INTERNAL') || die();

global $CFG;
$wwwroot = isset($CFG->wwwroot) ? $CFG->wwwroot : 'https://dev.bheem.cloud';
?>

<!-- Banner Slider Styles -->
<style>
    /* Modern Dark Animated Hero Slider 2025 */
    .banner-slider {
        margin-top: 80px;
        position: relative;
        background:
            radial-gradient(ellipse 100% 60% at 50% 0%, rgba(30, 41, 59, 0.8) 0%, transparent 50%),
            radial-gradient(ellipse 100% 60% at 50% 100%, rgba(15, 23, 42, 0.9) 0%, transparent 50%),
            conic-gradient(from 90deg at 50% 50%,
                transparent 0deg, rgba(59, 130, 246, 0.15) 90deg,
                transparent 180deg, rgba(139, 92, 246, 0.15) 270deg, transparent 360deg),
            linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
        background-size: 300% 300%;
        animation: neuralFlowPattern 20s ease-in-out infinite;
        min-height: 700px;
        overflow: hidden;
        padding: 40px 20px;
        isolation: isolate;
    }

    @keyframes neuralFlowPattern {
        0%, 100% {
            background-position: 0% 30%;
            filter: hue-rotate(0deg) brightness(1) contrast(100%);
        }
        25% {
            background-position: 70% 0%;
            filter: hue-rotate(5deg) brightness(1.05) contrast(102%);
        }
        50% {
            background-position: 100% 70%;
            filter: hue-rotate(10deg) brightness(0.98) contrast(105%);
        }
        75% {
            background-position: 30% 100%;
            filter: hue-rotate(5deg) brightness(1.02) contrast(103%);
        }
    }

    /* Dark Animated Background Effects */
    .banner-slider::before {
        content: '';
        position: absolute;
        top: -30%;
        left: -30%;
        right: -30%;
        bottom: -30%;
        background:
            radial-gradient(ellipse 80% 40% at 20% 30%, rgba(59, 130, 246, 0.12) 0%, transparent 70%),
            radial-gradient(ellipse 80% 40% at 80% 70%, rgba(139, 92, 246, 0.12) 0%, transparent 70%),
            radial-gradient(ellipse 60% 60% at 50% 50%, rgba(6, 182, 212, 0.08) 0%, transparent 80%);
        animation: quantumFieldDance 25s ease-in-out infinite;
        pointer-events: none;
        z-index: 1;
    }

    @keyframes quantumFieldDance {
        0%, 100% {
            opacity: 0.7;
            transform: rotate(0deg) scale(1);
        }
        50% {
            opacity: 0.5;
            transform: rotate(-1deg) scale(0.95);
        }
    }

    .slider-container {
        max-width: 1440px;
        margin: 0 auto;
        position: relative;
        height: 100%;
        z-index: 3;
    }

    .slider-container::before {
        content: '';
        position: absolute;
        top: -20px;
        left: -20px;
        right: -20px;
        bottom: -20px;
        background: conic-gradient(from 45deg,
            rgba(102, 126, 234, 0.1) 0deg,
            rgba(240, 147, 251, 0.08) 90deg,
            rgba(79, 172, 254, 0.1) 180deg,
            rgba(245, 87, 108, 0.08) 270deg,
            rgba(102, 126, 234, 0.1) 360deg);
        border-radius: calc(24px + 20px);
        animation: luxuryAura 30s linear infinite;
        z-index: -1;
        pointer-events: none;
        filter: blur(15px);
    }

    @keyframes luxuryAura {
        0% { transform: rotate(0deg); filter: blur(15px) brightness(0.8); }
        50% { transform: rotate(180deg); filter: blur(20px) brightness(1.2); }
        100% { transform: rotate(360deg); filter: blur(15px) brightness(0.8); }
    }

    .slider-wrapper {
        position: relative;
        height: 700px;
        overflow: hidden;
        background: linear-gradient(135deg,
            rgba(255, 255, 255, 0.98) 0%,
            rgba(255, 255, 255, 0.95) 100%);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        border-radius: 24px;
        border: 1px solid rgba(255, 255, 255, 0.4);
        z-index: 3;
        isolation: isolate;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .slider-track {
        display: flex;
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        width: 700%; /* 7 slides */
        height: 100%;
        will-change: transform;
    }

    .slide {
        width: 14.285714%; /* 100% / 7 slides */
        flex-shrink: 0;
        position: relative;
        height: 100%;
        overflow: hidden;
    }

    .slide-background {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        z-index: 0;
        width: 100%;
        height: 100%;
    }

    .slide-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: transparent;
        z-index: 2;
    }

    .slide.loading {
        background-image: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 50%, #f8fafc 100%);
        background-size: 200% 200%;
        animation: shimmer 1.5s ease-in-out infinite;
    }

    @keyframes shimmer {
        0% { background-position: -200% 0; }
        100% { background-position: 200% 0; }
    }

    .slide.loaded {
        animation: fadeInSlide 0.6s ease-out;
    }

    @keyframes fadeInSlide {
        from { opacity: 0.7; }
        to { opacity: 1; }
    }

    .slide-content {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        padding: 60px;
        z-index: 3;
        color: #1e293b;
    }

    .slide-content-inner {
        max-width: 600px;
        background:
            linear-gradient(145deg, rgba(255, 255, 255, 0.5) 0%, rgba(255, 255, 255, 0.4) 100%),
            radial-gradient(circle at 20% 30%, rgba(102, 126, 234, 0.2) 0%, transparent 70%);
        backdrop-filter: blur(10px) saturate(120%);
        -webkit-backdrop-filter: blur(10px) saturate(120%);
        padding: 40px;
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.4);
        box-shadow:
            0 20px 60px rgba(139, 92, 246, 0.4),
            0 10px 30px rgba(0, 0, 0, 0.3),
            inset 0 1px 2px rgba(255, 255, 255, 0.6);
        position: relative;
        overflow: hidden;
    }

    .slide-content-inner::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg,
            transparent 0%,
            rgba(255, 255, 255, 0.2) 50%,
            transparent 100%);
        transition: left 0.6s ease;
    }

    .slide-title {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 20px;
        line-height: 1.1;
        font-family: 'Poppins', sans-serif;
        color: #1e293b;
        text-shadow: 0 1px 2px rgba(255, 255, 255, 0.5);
        letter-spacing: -0.02em;
        position: relative;
        isolation: isolate;
    }

    .slide-subtitle {
        font-size: 1.5rem;
        margin-bottom: 20px;
        line-height: 1.4;
        font-weight: 600;
        color: #334155;
        text-shadow: 0 1px 2px rgba(255, 255, 255, 0.5);
        position: relative;
    }

    .slide-subtitle::after {
        content: '';
        position: absolute;
        bottom: -4px;
        left: 0;
        width: 60px;
        height: 3px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 50px;
        animation: lineGlow 3s ease-in-out infinite;
    }

    @keyframes lineGlow {
        0%, 100% { width: 60px; box-shadow: 0 0 5px rgba(79, 172, 254, 0.5); }
        50% { width: 120px; box-shadow: 0 0 15px rgba(79, 172, 254, 0.8); }
    }

    .slide-description {
        font-size: 1.1rem;
        margin-bottom: 30px;
        line-height: 1.6;
        color: #475569;
        font-weight: 400;
        text-shadow: 0 1px 2px rgba(255, 255, 255, 0.5);
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

    .slide-button {
        background: linear-gradient(135deg,
            rgba(255, 255, 255, 0.95) 0%,
            rgba(255, 255, 255, 0.9) 100%);
        color: #667eea;
        padding: 15px 40px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow:
            0 10px 30px rgba(0, 0, 0, 0.2),
            0 5px 15px rgba(139, 92, 246, 0.1);
        border: 2px solid rgba(255, 255, 255, 0.3);
        position: relative;
        overflow: hidden;
        letter-spacing: 0.5px;
        min-width: 180px;
        justify-content: center;
    }

    .slide-button::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 50px;
        opacity: 0;
        transition: all 0.4s ease;
        z-index: -1;
    }

    .slide-button:hover {
        transform: translateY(-6px) scale(1.08);
        box-shadow:
            0 0 30px rgba(139, 92, 246, 0.4),
            0 0 60px rgba(236, 72, 153, 0.3),
            0 15px 40px rgba(0, 0, 0, 0.2),
            0 0 0 1px rgba(255, 255, 255, 0.8);
        color: white;
        border-color: rgba(139, 92, 246, 0.8);
        background: linear-gradient(135deg,
            rgba(139, 92, 246, 0.9) 0%,
            rgba(236, 72, 153, 0.8) 50%,
            rgba(6, 182, 212, 0.9) 100%);
        animation: buttonPulse 2s ease-in-out infinite;
    }

    @keyframes buttonPulse {
        0%, 100% {
            box-shadow:
                0 0 30px rgba(139, 92, 246, 0.4),
                0 0 60px rgba(236, 72, 153, 0.3),
                0 15px 40px rgba(0, 0, 0, 0.2),
                0 0 0 1px rgba(255, 255, 255, 0.8);
        }
        50% {
            box-shadow:
                0 0 40px rgba(139, 92, 246, 0.6),
                0 0 80px rgba(236, 72, 153, 0.4),
                0 20px 50px rgba(0, 0, 0, 0.3),
                0 0 0 2px rgba(255, 255, 255, 1);
        }
    }

    .slide-button:hover::before {
        opacity: 1;
        background: linear-gradient(135deg,
            rgba(139, 92, 246, 0.95) 0%,
            rgba(236, 72, 153, 0.9) 50%,
            rgba(6, 182, 212, 0.95) 100%);
    }

    .slide-button:focus {
        outline: none;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.4), 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .slide-button:active {
        transform: translateY(-2px) scale(1.02);
    }

    .slide-button i {
        transition: all 0.3s ease;
        position: relative;
        z-index: 2;
    }

    .slide-button:hover i {
        transform: translateX(4px) scale(1.1);
        filter: drop-shadow(0 0 10px rgba(255, 255, 255, 1))
                drop-shadow(0 0 20px rgba(255, 255, 255, 0.6));
        color: #ffffff;
    }

    /* Social Proof */
    .social-proof {
        position: absolute;
        bottom: 30px;
        left: 40px;
        display: flex;
        align-items: center;
        gap: 15px;
        z-index: 4;
    }

    .review-item {
        display: flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, 0.98);
        padding: 8px 16px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .review-logo {
        width: 20px;
        height: 20px;
        border-radius: 4px;
    }

    .review-text {
        font-size: 0.85rem;
        font-weight: 600;
        color: #374151;
    }

    .rating-stars {
        color: #f59e0b;
        font-size: 0.85rem;
    }

    /* Navigation Controls */
    .slider-nav {
        position: absolute;
        bottom: 30px;
        right: 40px;
        display: flex;
        gap: 10px;
        z-index: 10;
    }

    .nav-btn {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        color: rgba(255, 255, 255, 0.8);
        font-size: 1.2rem;
    }

    .nav-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateY(-2px);
    }

    /* Slide Indicators */
    .slide-indicators {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 15px;
        z-index: 10;
        background: rgba(255, 255, 255, 0.95);
        padding: 15px 30px;
        border-radius: 50px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .indicator {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(102, 126, 234, 0.3);
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
    }

    .indicator.active {
        background: #667eea;
        transform: scale(1.2);
    }

    .indicator:hover {
        transform: scale(1.3);
        background: #764ba2;
    }

    /* Responsive Design */
    @media (max-width: 968px) {
        .banner-slider {
            min-height: 500px;
            margin-top: 60px;
        }
        .slider-wrapper {
            height: 500px;
        }
        .slide-content {
            padding: 40px;
            text-align: center;
            align-items: center;
        }
        .slide-title {
            font-size: 2.5rem;
        }
    }

    @media (max-width: 768px) {
        .banner-slider {
            min-height: 450px;
            margin-top: 50px;
        }
        .slider-wrapper {
            height: 450px;
        }
        .slide-content {
            padding: 30px;
        }
        .slide-content-inner {
            padding: 30px;
        }
        .slide-title {
            font-size: 2rem;
        }
        .slide-subtitle {
            font-size: 1.2rem;
        }
    }

    @media (max-width: 480px) {
        .banner-slider {
            min-height: 400px;
            margin-top: 40px;
        }
        .slider-wrapper {
            height: 400px;
        }
        .slide-content {
            padding: 20px;
        }
        .slide-content-inner {
            padding: 20px;
        }
        .slide-title {
            font-size: 1.75rem;
        }
    }
</style>

<!-- Banner Slider HTML -->
<section class="banner-slider" role="region" aria-label="Course offerings carousel">
    <div class="slider-container">
        <div class="slider-wrapper">
            <div class="slider-track" id="sliderTrack" role="presentation">
                <!-- Slide 1: Featured Banner -->
                <div class="slide loading"
                     data-bg="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/79441222-5b91-46aa-5455-4fd912a1c800/public"
                     role="tabpanel"
                     aria-label="Featured Banner - Slide 1 of 7"
                     id="slide-1">
                    <div class="slide-background"></div>
                    <div class="slide-overlay"></div>
                    <div class="slide-content">
                        <div class="slide-content-inner">
                            <h1 class="slide-title">Transform Your Future with AI</h1>
                            <h2 class="slide-subtitle">Master AI Skills Today</h2>
                            <p class="slide-description">Join thousands of learners mastering cutting-edge AI technology. Start your journey with expert-led courses designed for real-world success.</p>
                            <a href="<?php echo $wwwroot; ?>/course/index.php"
                               class="slide-button"
                               aria-label="Start learning AI today">
                                <i class="fas fa-graduation-cap" aria-hidden="true"></i>
                                Get Started
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Slide 2: Welcome to Bheem Academy -->
                <div class="slide loading"
                     data-bg="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/b3ef0697-0d9c-4ca5-416b-c92781ef2f00/public"
                     role="tabpanel"
                     aria-label="Welcome to Bheem Academy - Slide 2 of 7"
                     id="slide-2">
                    <div class="slide-background"></div>
                    <div class="slide-overlay"></div>
                    <div class="slide-content">
                        <div class="slide-content-inner">
                            <h1 class="slide-title">Welcome to Bheem Academy</h1>
                            <h2 class="slide-subtitle">Your AI Learning Hub</h2>
                            <p class="slide-description">From zero to AI hero — we make learning fun, flexible & practical. Whether you're 8 or 80, discover the power of AI, creativity, and digital tools.</p>
                            <a href="<?php echo $wwwroot; ?>/my-course.php?id=6"
                               class="slide-button"
                               aria-label="Explore AI courses for all ages">
                                <i class="fas fa-rocket" aria-hidden="true"></i>
                                Explore Courses
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Slide 3: AI for Kids -->
                <div class="slide loading"
                     data-bg="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/c5d7a31f-eb59-4e3d-bff2-c7fe6c3a5000/public"
                     role="tabpanel"
                     aria-label="AI for Kids - Slide 3 of 7"
                     id="slide-3">
                    <div class="slide-background"></div>
                    <div class="slide-overlay"></div>
                    <div class="slide-content">
                        <div class="slide-content-inner">
                            <h1 class="slide-title">AI for Kids</h1>
                            <h2 class="slide-subtitle">Learn. Play. Create.</h2>
                            <p class="slide-description">Ages 8–14 | Build with AI, No Coding Needed. Fun and interactive learning that sparks creativity and builds future-ready skills.</p>
                            <a href="<?php echo $wwwroot; ?>/my-course.php?id=6"
                               class="slide-button"
                               aria-label="Join AI courses for kids aged 8-14">
                                <i class="fas fa-play" aria-hidden="true"></i>
                                Join Now
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Slide 4: AI for Teens -->
                <div class="slide loading"
                     data-bg="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/6a4be740-5865-4d75-cc28-8e6db5071b00/public"
                     role="tabpanel"
                     aria-label="AI for Teens - Slide 4 of 7"
                     id="slide-4">
                    <div class="slide-background"></div>
                    <div class="slide-overlay"></div>
                    <div class="slide-content">
                        <div class="slide-content-inner">
                            <h1 class="slide-title">AI for Teens</h1>
                            <h2 class="slide-subtitle">Innovate Like a Pro</h2>
                            <p class="slide-description">Ages 14–18+ | AI, App Building & Automation with No Code. Master the tools that will shape your future career.</p>
                            <a href="<?php echo $wwwroot; ?>/course/index.php?categoryid=7"
                               class="slide-button"
                               aria-label="Join AI courses for teens aged 14-18">
                                <i class="fas fa-bolt" aria-hidden="true"></i>
                                Join Now
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Slide 5: AI for Professionals -->
                <div class="slide loading"
                     data-bg="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/0a7832e1-a6fb-4832-0e5e-224469a05800/public"
                     role="tabpanel"
                     aria-label="AI for Professionals - Slide 5 of 7"
                     id="slide-5">
                    <div class="slide-background"></div>
                    <div class="slide-overlay"></div>
                    <div class="slide-content">
                        <div class="slide-content-inner">
                            <h1 class="slide-title">AI for Professionals</h1>
                            <h2 class="slide-subtitle">Upskill. Automate. Excel.</h2>
                            <p class="slide-description">Ideal for: Teachers, HRs, Accountants, Admins & More. Transform your workflow with AI-powered productivity tools.</p>
                            <a href="<?php echo $wwwroot; ?>/course/index.php?categoryid=8"
                               class="slide-button"
                               aria-label="Join AI courses for working professionals">
                                <i class="fas fa-briefcase" aria-hidden="true"></i>
                                Join Now
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Slide 6: AI for Creators & Influencers -->
                <div class="slide loading"
                     data-bg="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/23cfa311-5453-4709-df29-cdb11ae08c00/public"
                     role="tabpanel"
                     aria-label="AI for Creators and Influencers - Slide 6 of 7"
                     id="slide-6">
                    <div class="slide-background"></div>
                    <div class="slide-overlay"></div>
                    <div class="slide-content">
                        <div class="slide-content-inner">
                            <h1 class="slide-title">AI for Creators & Influencers</h1>
                            <h2 class="slide-subtitle">Build, Script, Grow</h2>
                            <p class="slide-description">For YouTubers, Content Creators & Digital Influencers. Create compelling content with AI-powered tools and strategies.</p>
                            <a href="<?php echo $wwwroot; ?>/course/index.php?categoryid=11"
                               class="slide-button"
                               aria-label="Join AI courses for content creators and influencers">
                                <i class="fas fa-video" aria-hidden="true"></i>
                                Join Now
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Slide 7: Bheem AI Social 360 -->
                <div class="slide loading"
                     data-bg="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/2df3f990-9482-4274-1abc-2d4d23b0d200/public"
                     role="tabpanel"
                     aria-label="Bheem AI Social 360 - Slide 7 of 7"
                     id="slide-7">
                    <div class="slide-background"></div>
                    <div class="slide-overlay"></div>
                    <div class="slide-content">
                        <div class="slide-content-inner">
                            <h1 class="slide-title">Bheem AI Social 360</h1>
                            <h2 class="slide-subtitle">AI-Driven Digital Marketing</h2>
                            <p class="slide-description">3 or 6 Month Track | Learn Marketing + AI Tools. Master the future of marketing with AI tools that automate, analyze, and optimize.</p>
                            <a href="<?php echo $wwwroot; ?>/course/index.php?categoryid=12"
                               class="slide-button"
                               aria-label="Join AI Social 360 marketing courses">
                                <i class="fas fa-globe" aria-hidden="true"></i>
                                Join Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Proof -->
            <div class="social-proof">
                <div class="review-item">
                    <img src="https://academy.bheem.cloud/theme/bheem/pix/trast-logo.png" alt="Trustpilot" class="review-logo">
                    <span class="review-text">544+ Reviews</span>
                </div>
                <div class="review-item">
                    <img src="https://academy.bheem.cloud/theme/bheem/pix/google.png" alt="Google" class="review-logo">
                    <span class="rating-stars">★★★★★</span>
                    <span class="review-text">4.9/5.0</span>
                </div>
            </div>

            <!-- Navigation Arrows -->
            <div class="slider-nav" role="group" aria-label="Slide navigation">
                <button class="nav-btn prev-btn"
                        id="prevBtn"
                        aria-label="Previous slide"
                        aria-controls="sliderTrack">
                    <i class="fas fa-chevron-left" aria-hidden="true"></i>
                </button>
                <button class="nav-btn next-btn"
                        id="nextBtn"
                        aria-label="Next slide"
                        aria-controls="sliderTrack">
                    <i class="fas fa-chevron-right" aria-hidden="true"></i>
                </button>
            </div>

            <!-- Slide Indicators -->
            <div class="slide-indicators"
                 id="slideIndicators"
                 role="tablist"
                 aria-label="Choose slide to display">
                <button class="indicator active"
                        data-slide="0"
                        role="tab"
                        aria-label="Show slide 1"
                        aria-selected="true"></button>
                <button class="indicator"
                        data-slide="1"
                        role="tab"
                        aria-label="Show slide 2"></button>
                <button class="indicator"
                        data-slide="2"
                        role="tab"
                        aria-label="Show slide 3"></button>
                <button class="indicator"
                        data-slide="3"
                        role="tab"
                        aria-label="Show slide 4"></button>
                <button class="indicator"
                        data-slide="4"
                        role="tab"
                        aria-label="Show slide 5"></button>
                <button class="indicator"
                        data-slide="5"
                        role="tab"
                        aria-label="Show slide 6"></button>
                <button class="indicator"
                        data-slide="6"
                        role="tab"
                        aria-label="Show slide 7"></button>
            </div>
        </div>
    </div>
</section>

<!-- Banner Slider JavaScript -->
<script>
class BannerSlider {
    constructor() {
        this.currentSlide = 0;
        this.totalSlides = 7;
        this.autoPlayDelay = 5000;
        this.isAutoPlaying = true;
        this.isTransitioning = false;
        this.autoPlayInterval = null;
        this.slides = document.querySelectorAll('.slide');
        
        this.init();
    }

    init() {
        // Load first slide image immediately
        this.loadSlideImage(0);
        
        // Setup navigation
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        
        if (prevBtn) prevBtn.addEventListener('click', () => this.previousSlide());
        if (nextBtn) nextBtn.addEventListener('click', () => this.nextSlide());
        
        // Setup indicators
        document.querySelectorAll('.indicator').forEach((indicator, index) => {
            indicator.addEventListener('click', () => this.goToSlide(index));
        });
        
        // Setup autoplay
        this.startAutoPlay();
        
        // Pause on hover
        const container = document.querySelector('.banner-slider');
        if (container) {
            container.addEventListener('mouseenter', () => this.pauseAutoPlay());
            container.addEventListener('mouseleave', () => this.resumeAutoPlay());
        }
        
        // Setup touch events
        this.setupTouchEvents();
        
        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') this.previousSlide();
            if (e.key === 'ArrowRight') this.nextSlide();
        });
    }

    loadSlideImage(index) {
        const slide = this.slides[index];
        if (!slide || slide.classList.contains('loaded')) return;
        
        const bgUrl = slide.getAttribute('data-bg');
        const bgElement = slide.querySelector('.slide-background');
        
        if (bgUrl && bgElement) {
            const img = new Image();
            img.onload = () => {
                bgElement.style.backgroundImage = `url(${bgUrl})`;
                slide.classList.remove('loading');
                slide.classList.add('loaded');
            };
            img.src = bgUrl;
        }
    }

    setupTouchEvents() {
        const container = document.querySelector('.banner-slider');
        if (!container) return;
        
        let startX = 0;
        let endX = 0;
        
        container.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
            this.pauseAutoPlay();
        });
        
        container.addEventListener('touchend', (e) => {
            endX = e.changedTouches[0].clientX;
            const diff = startX - endX;
            
            if (Math.abs(diff) > 50) {
                if (diff > 0) {
                    this.nextSlide();
                } else {
                    this.previousSlide();
                }
            }
            
            this.resumeAutoPlay();
        });
    }

    showSlide(index) {
        if (this.isTransitioning || index === this.currentSlide) return;
        
        this.isTransitioning = true;
        
        // Preload images
        this.loadSlideImage(index);
        this.loadSlideImage((index + 1) % this.totalSlides);
        
        // Move slider
        const translateX = -index * (100 / this.totalSlides);
        const sliderTrack = document.getElementById('sliderTrack');
        
        if (sliderTrack) {
            sliderTrack.style.transform = `translateX(${translateX}%)`;
        }
        
        // Update indicators
        document.querySelectorAll('.indicator').forEach((indicator, i) => {
            indicator.classList.toggle('active', i === index);
            indicator.setAttribute('aria-selected', (i === index).toString());
        });
        
        this.currentSlide = index;
        
        setTimeout(() => {
            this.isTransitioning = false;
        }, 600);
    }

    nextSlide() {
        if (this.isTransitioning) return;
        const next = (this.currentSlide + 1) % this.totalSlides;
        this.goToSlide(next);
    }

    previousSlide() {
        if (this.isTransitioning) return;
        const prev = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
        this.goToSlide(prev);
    }

    goToSlide(index) {
        if (index >= 0 && index < this.totalSlides && !this.isTransitioning) {
            this.showSlide(index);
            this.resetAutoPlay();
        }
    }

    startAutoPlay() {
        if (!this.isAutoPlaying) return;
        this.autoPlayInterval = setInterval(() => {
            this.nextSlide();
        }, this.autoPlayDelay);
    }

    pauseAutoPlay() {
        if (this.autoPlayInterval) {
            clearInterval(this.autoPlayInterval);
            this.autoPlayInterval = null;
        }
    }

    resumeAutoPlay() {
        if (this.isAutoPlaying && !this.autoPlayInterval) {
            this.startAutoPlay();
        }
    }

    resetAutoPlay() {
        this.pauseAutoPlay();
        this.resumeAutoPlay();
    }
}

// Initialize slider when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    if (document.querySelector('.banner-slider')) {
        window.bannerSlider = new BannerSlider();
        console.log('Banner Slider initialized');
    }
});
</script>
