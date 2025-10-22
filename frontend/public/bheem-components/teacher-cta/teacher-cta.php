<!-- [Edoo] Teacher CTA Block Component -->
<style>
    /* Modern Teacher CTA Section - Premium Design */
    .teacher-cta-section {
        position: relative;
        padding: 40px 24px 80px 24px;
        background:
            radial-gradient(ellipse 100% 60% at 50% 0%, rgba(16, 185, 129, 0.04) 0%, transparent 50%),
            radial-gradient(ellipse 100% 60% at 50% 100%, rgba(6, 182, 212, 0.04) 0%, transparent 50%),
            linear-gradient(180deg, #F8FAFC 0%, #FFFFFF 50%, #FAFBFF 100%);
        overflow: hidden;
    }

    .teacher-cta-section::before {
        content: '';
        position: absolute;
        top: -40%;
        right: -15%;
        width: 700px;
        height: 700px;
        background: radial-gradient(circle, rgba(16, 185, 129, 0.08) 0%, rgba(6, 182, 212, 0.04) 40%, transparent 70%);
        pointer-events: none;
        animation: teacher-glow 14s ease-in-out infinite;
        filter: blur(60px);
    }

    .teacher-cta-section::after {
        content: '';
        position: absolute;
        bottom: -40%;
        left: -15%;
        width: 750px;
        height: 750px;
        background: radial-gradient(circle, rgba(6, 182, 212, 0.1) 0%, rgba(16, 185, 129, 0.05) 30%, transparent 70%);
        pointer-events: none;
        animation: teacher-glow 16s ease-in-out infinite reverse;
        filter: blur(70px);
    }

    @keyframes teacher-glow {
        0%, 100% { opacity: 0.5; transform: scale(1) rotate(0deg); }
        50% { opacity: 0.8; transform: scale(1.1) rotate(-5deg); }
    }

    .teacher-cta-container {
        max-width: 1400px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
        background:
            linear-gradient(135deg, rgba(255, 255, 255, 0.98), rgba(255, 255, 255, 0.95)),
            linear-gradient(135deg, rgba(16, 185, 129, 0.08) 0%, rgba(6, 182, 212, 0.08) 100%);
        border: 2px solid rgba(16, 185, 129, 0.15);
        border-radius: 24px;
        padding: 0;
        overflow: hidden;
        backdrop-filter: blur(20px);
        box-shadow:
            0 24px 64px rgba(16, 185, 129, 0.12),
            0 12px 32px rgba(6, 182, 212, 0.08),
            inset 0 2px 0 rgba(255, 255, 255, 0.9);
    }

    .teacher-cta-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg,
            #10B981 0%,
            #06B6D4 25%,
            #8B5CF6 50%,
            #06B6D4 75%,
            #10B981 100%);
        background-size: 200% 100%;
        animation: teacher-border-shine 3s linear infinite;
    }

    @keyframes teacher-border-shine {
        0% { background-position: 0% 50%; }
        100% { background-position: 200% 50%; }
    }

    .teacher-cta-inner {
        display: grid;
        grid-template-columns: 1.1fr 0.9fr;
        align-items: center;
        gap: 0;
    }

    .teacher-cta-content {
        padding: 40px 48px;
        position: relative;
    }

    .teacher-cta-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 8px 20px;
        background:
            linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.75)),
            linear-gradient(135deg, rgba(16, 185, 129, 0.15), rgba(6, 182, 212, 0.15));
        border: 1.5px solid transparent;
        background-clip: padding-box;
        border-radius: 100px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        color: #10B981;
        margin-bottom: 16px;
        box-shadow:
            0 4px 20px rgba(16, 185, 129, 0.15),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
        animation: teacher-badge-float 4s ease-in-out infinite;
    }

    @keyframes teacher-badge-float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-6px); }
    }

    .teacher-cta-badge i {
        font-size: 16px;
        background: linear-gradient(135deg, #10B981 0%, #06B6D4 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .teacher-cta-title {
        font-family: 'Poppins', sans-serif;
        font-size: 2.5rem;
        font-weight: 800;
        line-height: 1.15;
        color: #0F172A;
        margin-bottom: 16px;
        letter-spacing: -0.02em;
    }

    .teacher-cta-title .highlight {
        background: linear-gradient(135deg, #10B981 0%, #06B6D4 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        background-size: 200% auto;
        animation: teacher-gradient-shift 8s ease-in-out infinite;
    }

    @keyframes teacher-gradient-shift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .teacher-cta-subtitle {
        font-size: 1rem;
        font-weight: 600;
        color: #0F172A;
        margin-bottom: 12px;
    }

    .teacher-cta-description {
        font-size: 0.9375rem;
        line-height: 1.6;
        color: #64748B;
        margin-bottom: 16px;
    }

    .teacher-cta-features {
        list-style: none;
        padding: 0;
        margin: 0 0 20px 0;
    }

    .teacher-cta-features li {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 8px 0;
        font-size: 0.9375rem;
        font-weight: 600;
        color: #0F172A;
    }

    .teacher-cta-features li i {
        flex-shrink: 0;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #10B981, #06B6D4);
        color: white;
        border-radius: 50%;
        font-size: 12px;
        margin-top: 2px;
    }

    .teacher-cta-note {
        font-size: 0.875rem;
        line-height: 1.5;
        color: #475569;
        margin-bottom: 20px;
        padding: 12px 16px;
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.05), rgba(6, 182, 212, 0.05));
        border-left: 4px solid #10B981;
        border-radius: 10px;
    }

    .teacher-cta-button {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 14px 32px;
        background: linear-gradient(135deg, #10B981 0%, #06B6D4 100%);
        background-size: 200% auto;
        color: white;
        font-family: 'Poppins', sans-serif;
        font-size: 1.125rem;
        font-weight: 700;
        text-decoration: none;
        border-radius: 100px;
        box-shadow:
            0 16px 40px rgba(16, 185, 129, 0.35),
            0 8px 20px rgba(6, 182, 212, 0.25),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
        overflow: hidden;
    }

    .teacher-cta-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.25), transparent);
        transition: left 0.7s ease;
    }

    .teacher-cta-button:hover {
        transform: translateY(-4px) scale(1.03);
        box-shadow:
            0 24px 56px rgba(16, 185, 129, 0.45),
            0 12px 28px rgba(6, 182, 212, 0.35),
            inset 0 1px 0 rgba(255, 255, 255, 0.4);
        background-position: 100% 0;
    }

    .teacher-cta-button:hover::before {
        left: 100%;
    }

    .teacher-cta-button i {
        transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        font-size: 1.125rem;
    }

    .teacher-cta-button:hover i {
        transform: translateX(6px) scale(1.1);
    }

    .teacher-cta-image-wrapper {
        position: relative;
        height: 100%;
        min-height: 380px;
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.05), rgba(6, 182, 212, 0.05));
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 32px;
    }

    .teacher-cta-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 16px;
        box-shadow:
            0 24px 56px rgba(16, 185, 129, 0.2),
            0 12px 28px rgba(6, 182, 212, 0.15);
        transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .teacher-cta-image:hover {
        transform: scale(1.05);
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .teacher-cta-section {
            padding: 30px 20px 60px 20px;
        }

        .teacher-cta-inner {
            grid-template-columns: 1fr;
        }

        .teacher-cta-content {
            padding: 48px 40px;
        }

        .teacher-cta-title {
            font-size: 2.5rem;
        }

        .teacher-cta-image-wrapper {
            min-height: 320px;
            order: -1;
            padding: 32px;
        }
    }

    @media (max-width: 768px) {
        .teacher-cta-section {
            padding: 20px 16px 40px 16px;
        }

        .teacher-cta-container {
            border-radius: 20px;
        }

        .teacher-cta-content {
            padding: 32px 24px;
        }

        .teacher-cta-title {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .teacher-cta-subtitle {
            font-size: 1rem;
        }

        .teacher-cta-description,
        .teacher-cta-features li {
            font-size: 0.9375rem;
        }

        .teacher-cta-button {
            width: 100%;
            justify-content: center;
            padding: 16px 32px;
            font-size: 1rem;
        }

        .teacher-cta-image-wrapper {
            min-height: 280px;
            padding: 24px;
        }
    }

    @media (max-width: 480px) {
        .teacher-cta-content {
            padding: 28px 20px;
        }

        .teacher-cta-title {
            font-size: 1.75rem;
        }

        .teacher-cta-badge {
            font-size: 11px;
            padding: 8px 20px;
        }
    }

    /* Accessibility */
    @media (prefers-reduced-motion: reduce) {
        .teacher-cta-section *,
        .teacher-cta-section *::before,
        .teacher-cta-section *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }
    }
</style>

<!-- Teacher CTA Section HTML -->
<section class="teacher-cta-section" id="teacherCta">
    <div class="teacher-cta-container">
        <div class="teacher-cta-inner">
            <!-- Content Column -->
            <div class="teacher-cta-content">
                <div class="teacher-cta-badge">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Join Our Team</span>
                </div>

                <h2 class="teacher-cta-title">
                    <span class="highlight">Welcome to the Bheem Academy</span> Community
                </h2>

                <p class="teacher-cta-subtitle">Welcome Educators!</p>
                <p class="teacher-cta-description">
                    Empowering Mentors. Inspiring Innovators.<br>
                    At Bheem Academy, we believe great learners start with great teachers. Whether you're a teacher, trainer, or industry expert — your guidance can shape future-ready minds.
                </p>

                <ul class="teacher-cta-features">
                    <li>
                        <i class="fas fa-check"></i>
                        <span>For Teachers – Bring AI into your classroom</span>
                    </li>
                    <li>
                        <i class="fas fa-check"></i>
                        <span>For Tutors – Empower the next generation</span>
                    </li>
                    <li>
                        <i class="fas fa-check"></i>
                        <span>For Professionals – Share real-world insights</span>
                    </li>
                </ul>

                <div class="teacher-cta-note">
                    <p style="margin: 0 0 8px 0;"><strong>Be part of India's leading AI learning network.</strong></p>
                    <p style="margin: 0 0 8px 0;">Let's build, teach, and inspire together.</p>
                    <p style="margin: 0; display: flex; align-items: center; gap: 8px;">
                        <i class="fas fa-envelope" style="color: #10B981;"></i>
                        <strong>Interested in mentoring?</strong>
                    </p>
                </div>

                <a href="https://academy.bheem.cloud/course" class="teacher-cta-button">
                    <span>Become A Teacher</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Image Column -->
            <div class="teacher-cta-image-wrapper">
                <img src="https://i.ibb.co/pvWc6q6D/welcometeacher-min.jpg" alt="Join Bheem Academy as a Teacher" class="teacher-cta-image">
            </div>
        </div>
    </div>
</section>
