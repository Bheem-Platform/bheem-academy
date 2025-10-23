<?php
defined('MOODLE_INTERNAL') || die();
global $CFG;
?>

<style>
    .about-section {
        position: relative;
        padding: 60px 24px 40px 24px;
        background: linear-gradient(180deg, #FAFBFF 0%, #FFFFFF 50%, #F8FAFC 100%);
        overflow: hidden;
    }

    .about-section::before {
        content: '';
        position: absolute;
        top: -30%;
        left: -10%;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(99, 102, 241, 0.08) 0%, rgba(139, 92, 246, 0.04) 40%, transparent 70%);
        pointer-events: none;
        animation: about-float 20s ease-in-out infinite;
        filter: blur(60px);
    }

    .about-section::after {
        content: '';
        position: absolute;
        bottom: -30%;
        right: -10%;
        width: 650px;
        height: 650px;
        background: radial-gradient(circle, rgba(16, 185, 129, 0.08) 0%, rgba(6, 182, 212, 0.04) 40%, transparent 70%);
        pointer-events: none;
        animation: about-float 22s ease-in-out infinite reverse;
        filter: blur(70px);
    }

    @keyframes about-float {
        0%, 100% { opacity: 0.6; transform: scale(1) translateY(0); }
        50% { opacity: 0.9; transform: scale(1.1) translateY(-30px); }
    }

    .about-container {
        max-width: 1400px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }

    .about-header {
        text-align: center;
        margin-bottom: 64px;
    }

    .about-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 10px 24px;
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.1), rgba(139, 92, 246, 0.1));
        border: 1.5px solid rgba(99, 102, 241, 0.2);
        border-radius: 100px;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        color: #6366F1;
        margin-bottom: 20px;
        box-shadow: 0 4px 20px rgba(99, 102, 241, 0.15);
    }

    .about-badge i {
        font-size: 16px;
        background: linear-gradient(135deg, #6366F1 0%, #8B5CF6 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .about-main-title {
        font-family: 'Poppins', sans-serif;
        font-size: 2.75rem;
        font-weight: 800;
        line-height: 1.2;
        color: #0F172A;
        margin-bottom: 16px;
        letter-spacing: -0.02em;
    }

    .about-main-title .gradient-text {
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
        font-weight: 900;
    }

    @keyframes gradientShift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .about-subtitle {
        font-size: 1.125rem;
        line-height: 1.7;
        color: #64748B;
        max-width: 800px;
        margin: 0 auto;
    }

    .about-content-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 64px;
    }

    .about-block {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.98), rgba(255, 255, 255, 0.95));
        border: 2px solid rgba(99, 102, 241, 0.12);
        border-radius: 24px;
        padding: 0;
        box-shadow: 0 20px 56px rgba(99, 102, 241, 0.1), 0 10px 28px rgba(139, 92, 246, 0.05);
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
        overflow: hidden;
    }

    .about-block::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #6366F1 0%, #8B5CF6 50%, #6366F1 100%);
        background-size: 200% 100%;
        animation: about-border-slide 3s linear infinite;
        z-index: 10;
    }

    @keyframes about-border-slide {
        0% { background-position: 0% 50%; }
        100% { background-position: 200% 50%; }
    }

    .about-block:hover {
        transform: translateY(-8px);
        box-shadow: 0 28px 72px rgba(99, 102, 241, 0.15), 0 14px 36px rgba(139, 92, 246, 0.08);
        border-color: rgba(99, 102, 241, 0.25);
    }

    .about-block-inner {
        display: grid;
        grid-template-columns: 1fr 1fr;
        align-items: center;
        gap: 0;
    }

    .about-block-content-wrapper {
        padding: 48px;
    }

    .about-block-header {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 24px;
    }

    .about-block-icon {
        width: 64px;
        height: 64px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #6366F1 0%, #8B5CF6 100%);
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(99, 102, 241, 0.3);
        transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .about-block:hover .about-block-icon {
        transform: scale(1.1) rotate(5deg);
    }

    .about-block-icon i {
        font-size: 28px;
        color: white;
    }

    .about-block-title {
        font-family: 'Poppins', sans-serif;
        font-size: 1.75rem;
        font-weight: 700;
        color: #0F172A;
        margin: 0;
        line-height: 1.3;
    }

    .about-block-text {
        color: #475569;
        font-size: 0.9375rem;
        line-height: 1.7;
        margin-bottom: 24px;
    }

    .about-block-text p {
        margin-bottom: 16px;
    }

    .about-block-text p:last-child {
        margin-bottom: 0;
    }

    .about-highlight-box {
        padding: 20px;
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.08), rgba(6, 182, 212, 0.08));
        border-left: 4px solid #10B981;
        border-radius: 12px;
        margin-bottom: 24px;
    }

    .about-highlight-box h4 {
        font-family: 'Poppins', sans-serif;
        font-size: 1rem;
        font-weight: 700;
        color: #0F172A;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .about-highlight-box h4 i {
        color: #10B981;
        font-size: 18px;
    }

    .about-highlight-box p {
        color: #475569;
        font-size: 0.875rem;
        line-height: 1.6;
        margin: 0;
    }

    .about-features {
        list-style: none;
        padding: 0;
        margin: 0;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }

    .about-features li {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 12px;
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.04), rgba(139, 92, 246, 0.04));
        border-radius: 10px;
        font-size: 0.875rem;
        font-weight: 600;
        color: #334155;
        transition: all 0.3s ease;
    }

    .about-features li:hover {
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.08), rgba(139, 92, 246, 0.08));
        transform: translateX(4px);
    }

    .about-features li i {
        flex-shrink: 0;
        width: 22px;
        height: 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #6366F1, #8B5CF6);
        color: white;
        border-radius: 50%;
        font-size: 11px;
    }

    .about-image-wrapper {
        position: relative;
        height: 100%;
        min-height: 500px;
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.05), rgba(139, 92, 246, 0.05));
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 60px;
    }

    .about-image {
        width: 100%;
        height: auto;
        max-width: 450px;
        object-fit: contain;
        border-radius: 16px;
        box-shadow: 0 24px 56px rgba(99, 102, 241, 0.2), 0 12px 28px rgba(139, 92, 246, 0.15);
        transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .about-image:hover {
        transform: scale(1.08);
    }

    /* Reverse layout for second block */
    .about-block.reverse .about-block-inner {
        grid-template-columns: 1fr 1fr;
    }

    .about-block.reverse .about-image-wrapper {
        order: -1;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .about-section {
            padding: 50px 20px 35px 20px;
        }

        .about-main-title {
            font-size: 2.25rem;
        }

        .about-block-inner {
            grid-template-columns: 1fr !important;
        }

        .about-block-content-wrapper {
            padding: 40px;
        }

        .about-features {
            grid-template-columns: 1fr;
        }

        .about-image-wrapper {
            order: -1 !important;
            min-height: 400px;
            padding: 50px;
        }

        .about-image {
            max-width: 400px;
        }
    }

    @media (max-width: 768px) {
        .about-section {
            padding: 40px 16px 30px 16px;
        }

        .about-header {
            margin-bottom: 48px;
        }

        .about-main-title {
            font-size: 2rem;
        }

        .about-subtitle {
            font-size: 1rem;
        }

        .about-content-grid {
            gap: 48px;
        }

        .about-block-content-wrapper {
            padding: 32px 24px;
        }

        .about-block-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 16px;
        }

        .about-block-title {
            font-size: 1.5rem;
        }

        .about-image-wrapper {
            min-height: 350px;
            padding: 40px;
        }

        .about-image {
            max-width: 350px;
        }
    }

    @media (max-width: 480px) {
        .about-section {
            padding: 35px 16px 25px 16px;
        }

        .about-main-title {
            font-size: 1.75rem;
        }

        .about-block-content-wrapper {
            padding: 28px 20px;
        }

        .about-block-icon {
            width: 56px;
            height: 56px;
        }

        .about-block-icon i {
            font-size: 24px;
        }

        .about-block-title {
            font-size: 1.25rem;
        }

        .about-badge {
            font-size: 12px;
            padding: 8px 20px;
        }

        .about-image-wrapper {
            min-height: 300px;
            padding: 30px;
        }

        .about-image {
            max-width: 280px;
        }
    }

    /* Accessibility */
    @media (prefers-reduced-motion: reduce) {
        .about-section *,
        .about-section *::before,
        .about-section *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }
    }

    /* Scroll-Triggered Motion Graphics */
    .about-scroll-reveal {
        opacity: 0;
        transform: translateY(50px);
        transition: opacity 1s cubic-bezier(0.16, 1, 0.3, 1),
                    transform 1s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .about-scroll-reveal.revealed {
        opacity: 1;
        transform: translateY(0);
    }

    .about-scroll-reveal-scale {
        opacity: 0;
        transform: scale(0.9);
        transition: opacity 1s cubic-bezier(0.16, 1, 0.3, 1),
                    transform 1s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .about-scroll-reveal-scale.revealed {
        opacity: 1;
        transform: scale(1);
    }

    .about-scroll-reveal-left {
        opacity: 0;
        transform: translateX(-80px) scale(0.95);
        transition: opacity 1.2s cubic-bezier(0.16, 1, 0.3, 1),
                    transform 1.2s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .about-scroll-reveal-left.revealed {
        opacity: 1;
        transform: translateX(0) scale(1);
    }

    .about-scroll-reveal-right {
        opacity: 0;
        transform: translateX(80px) scale(0.95);
        transition: opacity 1.2s cubic-bezier(0.16, 1, 0.3, 1),
                    transform 1.2s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .about-scroll-reveal-right.revealed {
        opacity: 1;
        transform: translateX(0) scale(1);
    }

    /* Staggered animations for list items */
    .about-features li.about-scroll-reveal:nth-child(1) {
        transition-delay: 0.1s;
    }

    .about-features li.about-scroll-reveal:nth-child(2) {
        transition-delay: 0.2s;
    }

    .about-features li.about-scroll-reveal:nth-child(3) {
        transition-delay: 0.3s;
    }

    .about-features li.about-scroll-reveal:nth-child(4) {
        transition-delay: 0.4s;
    }

    .about-features li.about-scroll-reveal:nth-child(5) {
        transition-delay: 0.5s;
    }

    .about-features li.about-scroll-reveal:nth-child(6) {
        transition-delay: 0.6s;
    }
</style>

<!-- About Section HTML -->
<section class="about-section" id="aboutSection">
    <div class="about-container">
        <!-- Section Header -->
        <div class="about-header about-scroll-reveal">
            <div class="about-badge">
                <i class="fas fa-building"></i>
                <span>About Us</span>
            </div>
            <h2 class="about-main-title">
                Empowering the Future Through <span class="gradient-text">AI Education</span>
            </h2>
            <p class="about-subtitle">
                Discover the vision, mission, and innovation behind Bheem Academy and Bheemverse Innovation Pvt Ltd — where technology meets transformation.
            </p>
        </div>

        <!-- Content Grid -->
        <div class="about-content-grid">
            <!-- About Bheemverse Innovation Block -->
            <div class="about-block about-scroll-reveal-scale">
                <div class="about-block-inner">
                    <!-- Content Column -->
                    <div class="about-block-content-wrapper about-scroll-reveal-left">
                        <div class="about-block-header">
                            <div class="about-block-icon">
                                <i class="fas fa-rocket"></i>
                            </div>
                            <h3 class="about-block-title">About Bheemverse Innovation Pvt Ltd</h3>
                        </div>

                        <div class="about-block-text">
                            <p>
                                <strong>Bheemverse Innovation Pvt Ltd</strong> is a pioneering AI & IT company at the forefront of digital transformation, artificial intelligence, and automation solutions. We empower businesses, institutions, and individuals with cutting-edge technology that drives growth, efficiency, and innovation.
                            </p>
                            <p>
                                As a leading technology innovator, we specialize in AI-driven solutions, intelligent automation, software development, digital marketing, and workforce transformation.
                            </p>
                        </div>

                        <div class="about-highlight-box">
                            <h4><i class="fas fa-lightbulb"></i> Our Vision</h4>
                            <p>To become India's most trusted AI & IT solutions provider, creating a future where technology empowers every individual and organization to achieve their fullest potential.</p>
                        </div>

                        <ul class="about-features">
                            <li class="about-scroll-reveal">
                                <i class="fas fa-check"></i>
                                <span>AI & Automation Solutions</span>
                            </li>
                            <li class="about-scroll-reveal">
                                <i class="fas fa-check"></i>
                                <span>Software Development</span>
                            </li>
                            <li class="about-scroll-reveal">
                                <i class="fas fa-check"></i>
                                <span>Digital Transformation</span>
                            </li>
                            <li class="about-scroll-reveal">
                                <i class="fas fa-check"></i>
                                <span>IT Consulting Services</span>
                            </li>
                            <li class="about-scroll-reveal">
                                <i class="fas fa-check"></i>
                                <span>Cloud Solutions</span>
                            </li>
                            <li class="about-scroll-reveal">
                                <i class="fas fa-check"></i>
                                <span>Enterprise AI Integration</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Image Column -->
                    <div class="about-image-wrapper about-scroll-reveal-right">
                        <img src="https://i.ibb.co/xqNmHW2D/Bheemverse.png" alt="Bheemverse" class="about-image">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize scroll-triggered animations
    const observerOptions = {
        root: null,
        rootMargin: '0px 0px -80px 0px',
        threshold: 0.15
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe all elements with scroll-reveal classes
    const scrollRevealElements = document.querySelectorAll(
        '.about-scroll-reveal, .about-scroll-reveal-scale, .about-scroll-reveal-left, .about-scroll-reveal-right'
    );

    scrollRevealElements.forEach((element) => {
        observer.observe(element);
    });
});
</script>
