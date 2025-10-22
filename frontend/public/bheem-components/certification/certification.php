<!-- [Edoo] About Four - Certification Block Component -->
<style>
    /* Ultra-Modern Certification Block Styling - Enhanced Premium Design */
    .certification-section {
        position: relative;
        padding: 60px 24px 20px 24px;
        background:
            radial-gradient(ellipse 80% 50% at 50% 0%, rgba(139, 92, 246, 0.03) 0%, transparent 50%),
            radial-gradient(ellipse 80% 50% at 50% 100%, rgba(236, 72, 153, 0.03) 0%, transparent 50%),
            linear-gradient(180deg, #FFFFFF 0%, #FAFBFF 50%, #F8FAFC 100%);
        overflow: hidden;
    }

    .certification-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 800px;
        height: 800px;
        background: radial-gradient(circle, rgba(139, 92, 246, 0.1) 0%, rgba(236, 72, 153, 0.05) 30%, transparent 70%);
        pointer-events: none;
        animation: pulse-glow 12s ease-in-out infinite;
        filter: blur(60px);
    }

    .certification-section::after {
        content: '';
        position: absolute;
        bottom: -30%;
        left: -10%;
        width: 700px;
        height: 700px;
        background: radial-gradient(circle, rgba(6, 182, 212, 0.08) 0%, rgba(16, 185, 129, 0.04) 40%, transparent 70%);
        pointer-events: none;
        animation: pulse-glow 15s ease-in-out infinite reverse;
        filter: blur(50px);
    }

    @keyframes pulse-glow {
        0%, 100% { opacity: 0.4; transform: scale(1) rotate(0deg); }
        50% { opacity: 0.7; transform: scale(1.15) rotate(5deg); }
    }

    .certification-container {
        max-width: 1320px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1.1fr 0.9fr;
        gap: 80px;
        align-items: center;
        position: relative;
        z-index: 1;
    }

    .certification-content {
        padding: 40px;
        position: relative;
    }

    .certification-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 10px 24px;
        background:
            linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7)),
            linear-gradient(135deg, rgba(139, 92, 246, 0.15), rgba(236, 72, 153, 0.15));
        border: 1.5px solid transparent;
        background-clip: padding-box;
        border-radius: 100px;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        color: #8B5CF6;
        margin-bottom: 28px;
        box-shadow:
            0 4px 20px rgba(139, 92, 246, 0.15),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
        animation: badge-float 4s ease-in-out infinite;
        position: relative;
        overflow: hidden;
    }

    .certification-badge::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: linear-gradient(135deg, #8B5CF6, #EC4899, #06B6D4);
        border-radius: 100px;
        z-index: -1;
        opacity: 0.4;
        animation: border-glow 3s linear infinite;
    }

    @keyframes badge-float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-6px); }
    }

    @keyframes border-glow {
        0%, 100% { opacity: 0.3; }
        50% { opacity: 0.6; }
    }

    .certification-badge i {
        font-size: 16px;
        background: linear-gradient(135deg, #8B5CF6 0%, #EC4899 50%, #06B6D4 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: icon-pulse 2s ease-in-out infinite;
    }

    @keyframes icon-pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
    }

    .certification-title {
        font-family: 'Poppins', sans-serif;
        font-size: 3.5rem;
        font-weight: 800;
        line-height: 1.15;
        color: #0F172A;
        margin-bottom: 24px;
        letter-spacing: -0.02em;
        position: relative;
    }

    .certification-title .highlight {
        background: linear-gradient(135deg, #8B5CF6 0%, #EC4899 40%, #06B6D4 80%, #10B981 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        position: relative;
        display: inline-block;
        background-size: 200% auto;
        animation: gradient-shift 8s ease-in-out infinite;
    }

    @keyframes gradient-shift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .certification-title .highlight::after {
        content: '';
        position: absolute;
        bottom: -6px;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #8B5CF6, #EC4899, #06B6D4, #10B981);
        background-size: 200% auto;
        border-radius: 4px;
        opacity: 0.4;
        animation: gradient-shift 8s ease-in-out infinite;
        filter: blur(1px);
    }

    .certification-description {
        font-size: 1.25rem;
        line-height: 1.9;
        color: #475569;
        margin-bottom: 32px;
        font-weight: 400;
        max-width: 90%;
    }

    .certification-features {
        display: flex;
        flex-direction: column;
        gap: 20px;
        margin-bottom: 40px;
    }

    .certification-feature {
        display: flex;
        align-items: flex-start;
        gap: 20px;
        padding: 24px 28px;
        background:
            linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.85)),
            linear-gradient(135deg, rgba(139, 92, 246, 0.03), rgba(236, 72, 153, 0.03));
        border-radius: 20px;
        border: 1.5px solid rgba(139, 92, 246, 0.08);
        backdrop-filter: blur(10px);
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
        overflow: hidden;
    }

    .certification-feature::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(139, 92, 246, 0.05), transparent);
        transition: left 0.6s ease;
    }

    .certification-feature:hover::before {
        left: 100%;
    }

    .certification-feature:hover {
        transform: translateX(12px) translateY(-4px);
        border-color: rgba(139, 92, 246, 0.25);
        box-shadow:
            0 20px 40px rgba(139, 92, 246, 0.12),
            0 8px 16px rgba(236, 72, 153, 0.08),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
        background:
            linear-gradient(135deg, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.95)),
            linear-gradient(135deg, rgba(139, 92, 246, 0.06), rgba(236, 72, 153, 0.06));
    }

    .certification-feature-icon {
        flex-shrink: 0;
        width: 56px;
        height: 56px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #8B5CF6 0%, #EC4899 50%, #06B6D4 100%);
        border-radius: 16px;
        color: white;
        font-size: 24px;
        box-shadow:
            0 12px 28px rgba(139, 92, 246, 0.3),
            0 4px 12px rgba(236, 72, 153, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
    }

    .certification-feature-icon::after {
        content: '';
        position: absolute;
        inset: -4px;
        border-radius: 18px;
        padding: 2px;
        background: linear-gradient(135deg, #8B5CF6, #EC4899, #06B6D4);
        -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
        opacity: 0;
        transition: opacity 0.4s;
    }

    .certification-feature:hover .certification-feature-icon {
        transform: scale(1.1) rotate(5deg);
        box-shadow:
            0 16px 36px rgba(139, 92, 246, 0.4),
            0 6px 16px rgba(236, 72, 153, 0.3);
    }

    .certification-feature:hover .certification-feature-icon::after {
        opacity: 0.6;
    }

    .certification-feature-content h3 {
        font-family: 'Poppins', sans-serif;
        font-size: 1.25rem;
        font-weight: 700;
        color: #0F172A;
        margin-bottom: 8px;
        letter-spacing: -0.01em;
    }

    .certification-feature-content p {
        font-size: 1rem;
        color: #64748B;
        line-height: 1.7;
        margin: 0;
        font-weight: 400;
    }

    .certification-cta {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 18px 40px;
        background: linear-gradient(135deg, #8B5CF6 0%, #EC4899 50%, #06B6D4 100%);
        background-size: 200% auto;
        color: white;
        font-family: 'Poppins', sans-serif;
        font-size: 1.125rem;
        font-weight: 700;
        text-decoration: none;
        border-radius: 100px;
        box-shadow:
            0 16px 40px rgba(139, 92, 246, 0.35),
            0 8px 20px rgba(236, 72, 153, 0.25),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
        overflow: hidden;
        border: 2px solid transparent;
    }

    .certification-cta::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.25), transparent);
        transition: left 0.7s ease;
    }

    .certification-cta::after {
        content: '';
        position: absolute;
        inset: -3px;
        border-radius: 100px;
        padding: 2px;
        background: linear-gradient(135deg, #8B5CF6, #EC4899, #06B6D4, #10B981);
        -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
        opacity: 0;
        transition: opacity 0.5s;
    }

    .certification-cta:hover {
        transform: translateY(-4px) scale(1.03);
        box-shadow:
            0 24px 56px rgba(139, 92, 246, 0.45),
            0 12px 28px rgba(236, 72, 153, 0.35),
            inset 0 1px 0 rgba(255, 255, 255, 0.4);
        background-position: 100% 0;
    }

    .certification-cta:hover::before {
        left: 100%;
    }

    .certification-cta:hover::after {
        opacity: 0.8;
        animation: border-spin 3s linear infinite;
    }

    @keyframes border-spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .certification-cta i {
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        font-size: 1.25rem;
    }

    .certification-cta:hover i {
        transform: translateX(6px) scale(1.1);
    }

    .certification-image-container {
        position: relative;
        padding: 40px;
    }

    .certification-image-wrapper {
        position: relative;
        border-radius: 32px;
        overflow: hidden;
        box-shadow:
            0 40px 80px rgba(139, 92, 246, 0.25),
            0 20px 40px rgba(236, 72, 153, 0.15),
            0 10px 20px rgba(6, 182, 212, 0.1);
        transform-style: preserve-3d;
        transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        background: linear-gradient(135deg, rgba(139, 92, 246, 0.05), rgba(236, 72, 153, 0.05));
        padding: 4px;
    }

    .certification-image-wrapper::before {
        content: '';
        position: absolute;
        inset: -6px;
        background: linear-gradient(135deg, #8B5CF6, #EC4899, #06B6D4, #10B981);
        border-radius: 36px;
        z-index: -1;
        opacity: 0.4;
        animation: border-rotate 8s linear infinite;
        filter: blur(8px);
    }

    @keyframes border-rotate {
        0% { transform: rotate(0deg) scale(1); }
        50% { transform: rotate(180deg) scale(1.05); }
        100% { transform: rotate(360deg) scale(1); }
    }

    .certification-image-wrapper:hover {
        transform: translateY(-16px) rotateX(3deg) rotateY(3deg) scale(1.02);
        box-shadow:
            0 50px 100px rgba(139, 92, 246, 0.3),
            0 25px 50px rgba(236, 72, 153, 0.2),
            0 12px 24px rgba(6, 182, 212, 0.15);
    }

    .certification-image-wrapper:hover::before {
        opacity: 0.6;
        filter: blur(12px);
    }

    .certification-image {
        width: 100%;
        height: auto;
        display: block;
        border-radius: 28px;
        position: relative;
        z-index: 1;
    }

    .certification-decorative-elements {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 120%;
        height: 120%;
        pointer-events: none;
        z-index: 2;
    }

    .certification-floating-icon {
        position: absolute;
        width: 72px;
        height: 72px;
        background:
            linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.85)),
            linear-gradient(135deg, rgba(139, 92, 246, 0.1), rgba(236, 72, 153, 0.1));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow:
            0 16px 40px rgba(139, 92, 246, 0.25),
            0 8px 20px rgba(236, 72, 153, 0.15),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.8);
        animation: float-icon 8s ease-in-out infinite;
        transition: all 0.4s ease;
    }

    .certification-floating-icon:nth-child(1) {
        top: 8%;
        right: 12%;
        animation-delay: 0s;
    }

    .certification-floating-icon:nth-child(2) {
        bottom: 12%;
        left: 8%;
        animation-delay: 2.5s;
    }

    .certification-floating-icon:nth-child(3) {
        top: 48%;
        right: 8%;
        animation-delay: 5s;
    }

    @keyframes float-icon {
        0%, 100% {
            transform: translateY(0px) rotate(0deg) scale(1);
        }
        33% {
            transform: translateY(-25px) rotate(8deg) scale(1.05);
        }
        66% {
            transform: translateY(15px) rotate(-8deg) scale(0.95);
        }
    }

    .certification-floating-icon:hover {
        transform: scale(1.15) rotate(10deg);
        box-shadow:
            0 20px 48px rgba(139, 92, 246, 0.35),
            0 10px 24px rgba(236, 72, 153, 0.25);
    }

    .certification-floating-icon i {
        font-size: 32px;
        background: linear-gradient(135deg, #8B5CF6 0%, #EC4899 50%, #06B6D4 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        filter: drop-shadow(0 2px 4px rgba(139, 92, 246, 0.2));
    }

    /* ============================================
       SCROLL-TRIGGERED MOTION GRAPHICS
    ============================================ */

    /* Scroll Reveal Classes - Enhanced Motion Graphics */
    .scroll-reveal-cert {
        opacity: 0;
        transform: translateY(60px);
        transition: opacity 1s cubic-bezier(0.16, 1, 0.3, 1),
                    transform 1s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .scroll-reveal-cert.revealed {
        opacity: 1;
        transform: translateY(0);
    }

    .scroll-reveal-cert-left {
        opacity: 0;
        transform: translateX(-80px) scale(0.95);
        transition: opacity 1.2s cubic-bezier(0.16, 1, 0.3, 1),
                    transform 1.2s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .scroll-reveal-cert-left.revealed {
        opacity: 1;
        transform: translateX(0) scale(1);
    }

    .scroll-reveal-cert-right {
        opacity: 0;
        transform: translateX(80px) scale(0.95) rotate(5deg);
        transition: opacity 1.2s cubic-bezier(0.16, 1, 0.3, 1),
                    transform 1.2s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .scroll-reveal-cert-right.revealed {
        opacity: 1;
        transform: translateX(0) scale(1) rotate(0deg);
    }

    .scroll-reveal-cert-scale {
        opacity: 0;
        transform: scale(0.8) translateY(40px);
        transition: opacity 1s cubic-bezier(0.16, 1, 0.3, 1),
                    transform 1s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .scroll-reveal-cert-scale.revealed {
        opacity: 1;
        transform: scale(1) translateY(0);
    }

    .scroll-reveal-cert-fade {
        opacity: 0;
        transition: opacity 1.2s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .scroll-reveal-cert-fade.revealed {
        opacity: 1;
    }

    /* Stagger Animation Delays for Features */
    .certification-feature.scroll-reveal-cert:nth-child(1) {
        transition-delay: 0.1s;
    }

    .certification-feature.scroll-reveal-cert:nth-child(2) {
        transition-delay: 0.3s;
    }

    .certification-feature.scroll-reveal-cert:nth-child(3) {
        transition-delay: 0.5s;
    }

    /* Ultra-Responsive Design - All Platforms */
    @media (max-width: 1280px) {
        .certification-container {
            gap: 60px;
            padding: 0 20px;
        }

        .certification-title {
            font-size: 3rem;
        }
    }

    @media (max-width: 1024px) {
        .certification-section {
            padding: 50px 20px 15px 20px;
        }

        .certification-container {
            grid-template-columns: 1fr;
            gap: 60px;
        }

        .certification-content {
            padding: 20px;
        }

        .certification-title {
            font-size: 2.75rem;
        }

        .certification-description {
            font-size: 1.125rem;
            max-width: 100%;
        }

        .certification-image-container {
            order: -1;
            padding: 20px;
        }

        .certification-floating-icon {
            width: 64px;
            height: 64px;
        }

        .certification-floating-icon i {
            font-size: 28px;
        }
    }

    @media (max-width: 768px) {
        .certification-section {
            padding: 40px 16px 12px 16px;
        }

        .certification-content {
            padding: 0;
        }

        .certification-badge {
            font-size: 11px;
            padding: 8px 20px;
            gap: 8px;
        }

        .certification-badge i {
            font-size: 14px;
        }

        .certification-title {
            font-size: 2.25rem;
            margin-bottom: 20px;
        }

        .certification-description {
            font-size: 1rem;
            line-height: 1.7;
            margin-bottom: 28px;
        }

        .certification-features {
            gap: 16px;
            margin-bottom: 32px;
        }

        .certification-feature {
            padding: 20px 24px;
            gap: 16px;
            border-radius: 16px;
        }

        .certification-feature-icon {
            width: 48px;
            height: 48px;
            font-size: 20px;
            border-radius: 14px;
        }

        .certification-feature-content h3 {
            font-size: 1.125rem;
        }

        .certification-feature-content p {
            font-size: 0.9375rem;
        }

        .certification-cta {
            width: 100%;
            justify-content: center;
            padding: 16px 36px;
            font-size: 1rem;
            gap: 10px;
        }

        .certification-cta i {
            font-size: 1.125rem;
        }

        .certification-image-container {
            padding: 20px 0;
        }

        .certification-floating-icon {
            width: 56px;
            height: 56px;
        }

        .certification-floating-icon i {
            font-size: 24px;
        }
    }

    @media (max-width: 480px) {
        .certification-section {
            padding: 30px 16px 10px 16px;
        }

        .certification-title {
            font-size: 1.875rem;
            letter-spacing: -0.01em;
        }

        .certification-description {
            font-size: 0.9375rem;
            margin-bottom: 24px;
        }

        .certification-features {
            gap: 14px;
        }

        .certification-feature {
            padding: 18px 20px;
            gap: 14px;
        }

        .certification-feature-icon {
            width: 44px;
            height: 44px;
            font-size: 18px;
            border-radius: 12px;
        }

        .certification-feature-content h3 {
            font-size: 1rem;
            margin-bottom: 6px;
        }

        .certification-feature-content p {
            font-size: 0.875rem;
            line-height: 1.6;
        }

        .certification-cta {
            padding: 14px 32px;
            font-size: 0.9375rem;
        }

        .certification-floating-icon {
            width: 48px;
            height: 48px;
        }

        .certification-floating-icon i {
            font-size: 20px;
        }
    }

    /* Smooth transitions for all devices */
    @media (prefers-reduced-motion: reduce) {
        .certification-section *,
        .certification-section *::before,
        .certification-section *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }

        .scroll-reveal-cert,
        .scroll-reveal-cert-left,
        .scroll-reveal-cert-right,
        .scroll-reveal-cert-scale,
        .scroll-reveal-cert-fade {
            opacity: 1 !important;
            transform: none !important;
        }
    }
</style>

<!-- Certification Section HTML -->
<section class="certification-section" id="certification">
    <div class="certification-container">
        <!-- Content Column -->
        <div class="certification-content">
            <div class="certification-badge scroll-reveal-cert-fade">
                <i class="fas fa-award"></i>
                <span>Professional Certifications</span>
            </div>

            <h2 class="certification-title scroll-reveal-cert">
                <span class="highlight">Certified to Shine</span> – Build Skills. Get Recognized.
            </h2>

            <p class="certification-description scroll-reveal-cert-fade">
                Earn globally respected certifications from Bheem Academy that prove your skills in AI, automation, digital marketing, and more.
            </p>

            <div class="certification-features">
                <div class="certification-feature scroll-reveal-cert">
                    <div class="certification-feature-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="certification-feature-content">
                        <h3>Stand Out Everywhere</h3>
                        <p>Stand out in school, college, or your career with credentials that showcase your creativity, tech-savviness, and future-readiness.</p>
                    </div>
                </div>

                <div class="certification-feature scroll-reveal-cert">
                    <div class="certification-feature-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <div class="certification-feature-content">
                        <h3>Badge of Excellence</h3>
                        <p>Each certificate is a badge of excellence — and a step closer to your dream path in the digital age.</p>
                    </div>
                </div>

                <div class="certification-feature scroll-reveal-cert">
                    <div class="certification-feature-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <div class="certification-feature-content">
                        <h3>Future-Ready Skills</h3>
                        <p>Master cutting-edge technologies including AI, automation, and digital marketing to stay ahead in the rapidly evolving tech landscape.</p>
                    </div>
                </div>
            </div>

            <a href="/course/index.php?categoryid=6" class="certification-cta scroll-reveal-cert-scale">
                <span>Start Learning. Start Earning.</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <!-- Image Column -->
        <div class="certification-image-container scroll-reveal-cert-right">
            <div class="certification-image-wrapper">
                <img src="https://i.ibb.co/3YcfDFTX/Certificate-min.jpg" alt="Bheem Academy Professional Certificate" class="certification-image">
            </div>

            <!-- Decorative Floating Icons -->
            <div class="certification-decorative-elements">
                <div class="certification-floating-icon">
                    <i class="fas fa-star"></i>
                </div>
                <div class="certification-floating-icon">
                    <i class="fas fa-certificate"></i>
                </div>
                <div class="certification-floating-icon">
                    <i class="fas fa-medal"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Scroll-Triggered Motion Graphics for Certification Section
(function() {
    'use strict';

    // Check for reduced motion preference
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (prefersReducedMotion) {
        // Instantly show all elements for users who prefer reduced motion
        const allAnimatedElements = document.querySelectorAll(
            '.scroll-reveal-cert, .scroll-reveal-cert-left, .scroll-reveal-cert-right, .scroll-reveal-cert-scale, .scroll-reveal-cert-fade'
        );
        allAnimatedElements.forEach(el => el.classList.add('revealed'));
        return;
    }

    // Configuration for Intersection Observer
    const observerOptions = {
        root: null,
        rootMargin: '0px 0px -150px 0px', // Trigger 150px before element enters viewport
        threshold: 0.15 // Trigger when 15% of element is visible
    };

    // Create Intersection Observer
    const scrollObserver = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                // Add revealed class to trigger animation
                entry.target.classList.add('revealed');

                // Stop observing after animation triggers
                scrollObserver.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Initialize animations when DOM is ready
    function initCertificationAnimations() {
        // Wait for section to be available
        const certificationSection = document.querySelector('.certification-section');
        if (!certificationSection) {
            return;
        }

        // Observe all elements with scroll-reveal classes
        const scrollElements = document.querySelectorAll(
            '.scroll-reveal-cert, ' +
            '.scroll-reveal-cert-left, ' +
            '.scroll-reveal-cert-right, ' +
            '.scroll-reveal-cert-scale, ' +
            '.scroll-reveal-cert-fade'
        );

        scrollElements.forEach(function(element) {
            scrollObserver.observe(element);
        });

        console.log('%c✨ Certification Section Motion Graphics Initialized!',
            'background: linear-gradient(135deg, #8b5cf6, #ec4899); color: white; padding: 6px 12px; border-radius: 6px; font-weight: bold;');
    }

    // Initialize on page load
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initCertificationAnimations);
    } else {
        initCertificationAnimations();
    }
})();
</script>
