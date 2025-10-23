<!-- [Edoo] HTML Block - FAQ Accordion -->
<style>
    /* Ultra-Premium FAQ Accordion - Vue.js Implementation */
    .faq-section {
        position: relative;
        padding: 10px 24px 60px 24px;
        background:
            radial-gradient(ellipse 100% 60% at 50% 0%, rgba(6, 182, 212, 0.04) 0%, transparent 50%),
            radial-gradient(ellipse 100% 60% at 50% 100%, rgba(139, 92, 246, 0.04) 0%, transparent 50%),
            linear-gradient(180deg, #FAFBFF 0%, #FFFFFF 50%, #F8FAFC 100%);
        overflow: hidden;
    }

    /* Scroll Animation Initial States */
    .faq-container {
        opacity: 0;
        transform: translateY(60px) scale(0.95);
        transition: all 1.2s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .faq-section.aos-animate .faq-container {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

    .faq-badge {
        opacity: 0;
        transform: translateY(-30px) scale(0.8);
        transition: all 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 0.2s;
    }

    .faq-section.aos-animate .faq-badge {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

    .faq-title {
        opacity: 0;
        transform: translateY(40px);
        transition: all 1s cubic-bezier(0.34, 1.56, 0.64, 1) 0.4s;
    }

    .faq-section.aos-animate .faq-title {
        opacity: 1;
        transform: translateY(0);
    }

    .faq-subtitle {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.9s cubic-bezier(0.34, 1.56, 0.64, 1) 0.6s;
    }

    .faq-section.aos-animate .faq-subtitle {
        opacity: 1;
        transform: translateY(0);
    }

    .faq-item {
        opacity: 0;
        transform: translateY(40px) scale(0.95);
        transition: all 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .faq-section.aos-animate .faq-item {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

    .faq-section::before {
        content: '';
        position: absolute;
        top: -40%;
        left: -15%;
        width: 700px;
        height: 700px;
        background: radial-gradient(circle, rgba(6, 182, 212, 0.08) 0%, rgba(16, 185, 129, 0.04) 40%, transparent 70%);
        pointer-events: none;
        animation: faq-glow 14s ease-in-out infinite;
        filter: blur(60px);
    }

    .faq-section::after {
        content: '';
        position: absolute;
        bottom: -40%;
        right: -15%;
        width: 750px;
        height: 750px;
        background: radial-gradient(circle, rgba(139, 92, 246, 0.1) 0%, rgba(236, 72, 153, 0.05) 30%, transparent 70%);
        pointer-events: none;
        animation: faq-glow 16s ease-in-out infinite reverse;
        filter: blur(70px);
    }

    @keyframes faq-glow {
        0%, 100% { opacity: 0.5; transform: scale(1) rotate(0deg); }
        50% { opacity: 0.8; transform: scale(1.1) rotate(-5deg); }
    }

    .faq-container:not(.aos-animate) {
        max-width: 1100px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
        background:
            linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.9)),
            linear-gradient(135deg, rgba(6, 182, 212, 0.08) 0%, rgba(16, 185, 129, 0.08) 50%, rgba(139, 92, 246, 0.08) 100%);
        border: 2px solid rgba(6, 182, 212, 0.15);
        border-radius: 32px;
        padding: 64px 48px;
        backdrop-filter: blur(20px);
        box-shadow:
            0 24px 64px rgba(6, 182, 212, 0.12),
            0 12px 32px rgba(16, 185, 129, 0.08),
            0 4px 16px rgba(139, 92, 246, 0.06),
            inset 0 2px 0 rgba(255, 255, 255, 0.9),
            inset 0 -2px 0 rgba(6, 182, 212, 0.05);
        overflow: hidden;
    }

    .faq-section.aos-animate .faq-container {
        max-width: 1100px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
        background:
            linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.9)),
            linear-gradient(135deg, rgba(6, 182, 212, 0.08) 0%, rgba(16, 185, 129, 0.08) 50%, rgba(139, 92, 246, 0.08) 100%);
        border: 2px solid rgba(6, 182, 212, 0.15);
        border-radius: 32px;
        padding: 64px 48px;
        backdrop-filter: blur(20px);
        box-shadow:
            0 24px 64px rgba(6, 182, 212, 0.12),
            0 12px 32px rgba(16, 185, 129, 0.08),
            0 4px 16px rgba(139, 92, 246, 0.06),
            inset 0 2px 0 rgba(255, 255, 255, 0.9),
            inset 0 -2px 0 rgba(6, 182, 212, 0.05);
        overflow: hidden;
    }

    .faq-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg,
            #06B6D4 0%,
            #10B981 25%,
            #8B5CF6 50%,
            #EC4899 75%,
            #06B6D4 100%);
        background-size: 200% 100%;
        animation: border-shine 3s linear infinite;
        border-radius: 32px 32px 0 0;
    }

    .faq-container::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle at center, rgba(6, 182, 212, 0.04) 0%, transparent 60%);
        animation: container-pulse 8s ease-in-out infinite;
        pointer-events: none;
    }

    @keyframes border-shine {
        0% { background-position: 0% 50%; }
        100% { background-position: 200% 50%; }
    }

    @keyframes container-pulse {
        0%, 100% { transform: scale(1) rotate(0deg); opacity: 0.6; }
        50% { transform: scale(1.1) rotate(10deg); opacity: 1; }
    }

    .faq-header {
        text-align: center;
        margin-bottom: 64px;
        position: relative;
    }

    .faq-section.aos-animate .faq-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 10px 28px;
        background:
            linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.75)),
            linear-gradient(135deg, rgba(6, 182, 212, 0.15), rgba(16, 185, 129, 0.15));
        border: 1.5px solid transparent;
        background-clip: padding-box;
        border-radius: 100px;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        color: #06B6D4;
        margin-bottom: 24px;
        box-shadow:
            0 4px 20px rgba(6, 182, 212, 0.15),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
        animation: faq-badge-float 4s ease-in-out infinite;
        position: relative;
        overflow: hidden;
    }

    .faq-badge::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: linear-gradient(135deg, #06B6D4, #10B981, #8B5CF6);
        border-radius: 100px;
        z-index: -1;
        opacity: 0.4;
        animation: faq-badge-glow 3s linear infinite;
    }

    @keyframes faq-badge-float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-6px); }
    }

    @keyframes faq-badge-glow {
        0%, 100% { opacity: 0.3; }
        50% { opacity: 0.6; }
    }

    .faq-badge i {
        font-size: 16px;
        background: linear-gradient(135deg, #06B6D4 0%, #10B981 50%, #8B5CF6 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: faq-icon-pulse 2.5s ease-in-out infinite;
    }

    @keyframes faq-icon-pulse {
        0%, 100% { transform: scale(1) rotate(0deg); }
        50% { transform: scale(1.12) rotate(5deg); }
    }

    .faq-section.aos-animate .faq-title {
        font-family: 'Poppins', sans-serif;
        font-size: 3.25rem;
        font-weight: 900;
        line-height: 1.15;
        color: #0F172A;
        margin-bottom: 20px;
        letter-spacing: -0.02em;
    }

    .faq-title .highlight {
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

    .faq-section.aos-animate .faq-subtitle {
        font-size: 1.25rem;
        line-height: 1.8;
        color: #64748B;
        max-width: 700px;
        margin: 0 auto;
        font-weight: 400;
    }

    .faq-accordion {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .faq-section.aos-animate .faq-item {
        background:
            linear-gradient(135deg, rgba(255, 255, 255, 0.98), rgba(255, 255, 255, 0.92)),
            linear-gradient(135deg, rgba(6, 182, 212, 0.02), rgba(16, 185, 129, 0.02));
        border: 1.5px solid rgba(6, 182, 212, 0.1);
        border-radius: 20px;
        overflow: hidden;
        backdrop-filter: blur(10px);
        box-shadow:
            0 4px 16px rgba(6, 182, 212, 0.04),
            0 2px 8px rgba(16, 185, 129, 0.03);
    }

    .faq-section.aos-animate .faq-item:nth-child(1) { transition-delay: 0.8s; }
    .faq-section.aos-animate .faq-item:nth-child(2) { transition-delay: 0.85s; }
    .faq-section.aos-animate .faq-item:nth-child(3) { transition-delay: 0.9s; }
    .faq-section.aos-animate .faq-item:nth-child(4) { transition-delay: 0.95s; }
    .faq-section.aos-animate .faq-item:nth-child(5) { transition-delay: 1s; }
    .faq-section.aos-animate .faq-item:nth-child(6) { transition-delay: 1.05s; }
    .faq-section.aos-animate .faq-item:nth-child(7) { transition-delay: 1.1s; }
    .faq-section.aos-animate .faq-item:nth-child(8) { transition-delay: 1.15s; }
    .faq-section.aos-animate .faq-item:nth-child(9) { transition-delay: 1.2s; }
    .faq-section.aos-animate .faq-item:nth-child(10) { transition-delay: 1.25s; }

    .faq-item:hover {
        border-color: rgba(6, 182, 212, 0.25);
        box-shadow:
            0 12px 32px rgba(6, 182, 212, 0.1),
            0 6px 16px rgba(16, 185, 129, 0.08);
        transform: translateY(-4px) scale(1.01);
    }

    .faq-item.active {
        border-color: rgba(6, 182, 212, 0.35);
        background:
            linear-gradient(135deg, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.96)),
            linear-gradient(135deg, rgba(6, 182, 212, 0.06), rgba(16, 185, 129, 0.06));
        box-shadow:
            0 20px 48px rgba(6, 182, 212, 0.15),
            0 10px 24px rgba(16, 185, 129, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.9);
        transform: scale(1.02);
    }

    .faq-question {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
        padding: 28px 32px;
        cursor: pointer;
        user-select: none;
        position: relative;
    }

    .faq-question-content {
        display: flex;
        align-items: center;
        gap: 20px;
        flex: 1;
    }

    .faq-number {
        flex-shrink: 0;
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #06B6D4 0%, #10B981 100%);
        border-radius: 14px;
        color: white;
        font-family: 'Poppins', sans-serif;
        font-size: 1.125rem;
        font-weight: 700;
        box-shadow:
            0 8px 24px rgba(6, 182, 212, 0.25),
            0 4px 12px rgba(16, 185, 129, 0.15),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
        transition: all 1s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .faq-item.active .faq-number {
        background: linear-gradient(135deg, #8B5CF6 0%, #EC4899 100%);
        box-shadow:
            0 12px 32px rgba(139, 92, 246, 0.3),
            0 6px 16px rgba(236, 72, 153, 0.2);
        transform: scale(1.1) rotate(8deg);
    }

    .faq-question-text {
        font-family: 'Poppins', sans-serif;
        font-size: 1.25rem;
        font-weight: 600;
        color: #0F172A;
        line-height: 1.5;
        letter-spacing: -0.01em;
    }

    .faq-icon {
        flex-shrink: 0;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, rgba(6, 182, 212, 0.1), rgba(16, 185, 129, 0.1));
        border-radius: 12px;
        transition: all 1s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .faq-icon i {
        font-size: 20px;
        color: #06B6D4;
        transition: all 1s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .faq-item.active .faq-icon {
        background: linear-gradient(135deg, rgba(139, 92, 246, 0.15), rgba(236, 72, 153, 0.15));
        transform: rotate(180deg) scale(1.05);
    }

    .faq-item.active .faq-icon i {
        color: #8B5CF6;
    }

    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition:
            max-height 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94),
            opacity 1.1s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.1s,
            padding 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94),
            transform 1.1s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.15s;
        opacity: 0;
        padding: 0 32px 0 32px;
        transform: translateY(-15px);
    }

    .faq-item.active .faq-answer {
        max-height: 1200px;
        opacity: 1;
        padding: 0 32px 32px 32px;
        transform: translateY(0);
    }

    .faq-answer-content {
        padding: 24px;
        background: linear-gradient(135deg, rgba(6, 182, 212, 0.03), rgba(16, 185, 129, 0.03));
        border-radius: 16px;
        border-left: 4px solid;
        border-image: linear-gradient(180deg, #06B6D4, #10B981) 1;
        position: relative;
        animation: answer-slide-in 1s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.2s forwards;
        opacity: 0;
    }

    @keyframes answer-slide-in {
        0% {
            opacity: 0;
            transform: translateX(-20px) scale(0.98);
        }
        50% {
            opacity: 0.5;
            transform: translateX(-5px) scale(0.99);
        }
        100% {
            opacity: 1;
            transform: translateX(0) scale(1);
        }
    }

    .faq-answer-content::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(6, 182, 212, 0.02), rgba(16, 185, 129, 0.02));
        border-radius: 16px;
        pointer-events: none;
        animation: answer-glow 1.4s ease-out;
    }

    @keyframes answer-glow {
        0% {
            opacity: 0;
            box-shadow: 0 0 0 rgba(6, 182, 212, 0);
        }
        30% {
            opacity: 0.3;
            box-shadow: 0 0 15px rgba(6, 182, 212, 0.08);
        }
        60% {
            opacity: 0.6;
            box-shadow: 0 0 25px rgba(6, 182, 212, 0.12);
        }
        100% {
            opacity: 1;
            box-shadow: 0 0 0 rgba(6, 182, 212, 0);
        }
    }

    .faq-answer-text {
        font-size: 1.0625rem;
        line-height: 1.8;
        color: #475569;
        position: relative;
        z-index: 1;
    }

    /* Responsive Design */
    /* Large Desktop */
    @media (max-width: 1440px) {
        .faq-container {
            max-width: 1200px;
        }
    }

    /* Desktop */
    @media (max-width: 1280px) {
        .faq-accordion {
            gap: 18px;
        }

        .faq-container {
            max-width: 1100px;
        }
    }

    /* Laptop / Small Desktop */
    @media (max-width: 1024px) {
        .faq-section {
            padding: 40px 20px 50px 20px;
        }

        .faq-container {
            padding: 48px 36px;
            border-radius: 28px;
            max-width: 100%;
        }

        .faq-title {
            font-size: 2.75rem;
        }

        .faq-subtitle {
            font-size: 1.125rem;
        }

        .faq-accordion {
            gap: 16px;
        }
    }

    /* Tablet Landscape / Large Tablet */
    @media (max-width: 900px) {
        .faq-accordion {
            grid-template-columns: 1fr;
            gap: 14px;
        }

        .faq-section {
            padding: 40px 20px 40px 20px;
        }

        .faq-container {
            padding: 40px 32px;
            border-radius: 24px;
        }

        .faq-header {
            margin-bottom: 56px;
        }

        .faq-title {
            font-size: 2.5rem;
        }
    }

    /* Tablet Portrait / Medium Tablet */
    @media (max-width: 768px) {
        .faq-section {
            padding: 40px 16px 60px 16px;
        }

        .faq-container {
            padding: 36px 24px;
            border-radius: 20px;
            border-width: 1.5px;
        }

        .faq-header {
            margin-bottom: 48px;
        }

        .faq-badge {
            font-size: 11px;
            padding: 8px 20px;
        }

        .faq-title {
            font-size: 2.25rem;
            line-height: 1.2;
        }

        .faq-subtitle {
            font-size: 1rem;
            line-height: 1.7;
        }

        .faq-accordion {
            gap: 12px;
        }

        .faq-question {
            padding: 22px 20px;
            gap: 16px;
        }

        .faq-question-content {
            gap: 16px;
        }

        .faq-number {
            width: 44px;
            height: 44px;
            font-size: 1rem;
        }

        .faq-question-text {
            font-size: 1.0625rem;
            line-height: 1.5;
        }

        .faq-icon {
            width: 40px;
            height: 40px;
        }

        .faq-icon i {
            font-size: 18px;
        }

        .faq-item.active .faq-answer {
            padding: 0 20px 24px 20px;
        }

        .faq-answer-content {
            padding: 20px;
        }

        .faq-answer-text {
            font-size: 0.9375rem;
            line-height: 1.8;
        }
    }

    /* Large Mobile / Small Tablet */
    @media (max-width: 640px) {
        .faq-section {
            padding: 40px 16px 50px 16px;
        }

        .faq-container {
            padding: 32px 20px;
            border-radius: 18px;
        }

        .faq-header {
            margin-bottom: 40px;
        }

        .faq-badge {
            font-size: 10px;
            padding: 7px 18px;
        }

        .faq-badge i {
            font-size: 14px;
        }

        .faq-title {
            font-size: 2rem;
            line-height: 1.2;
        }

        .faq-subtitle {
            font-size: 0.9375rem;
            line-height: 1.7;
        }

        .faq-accordion {
            gap: 12px;
        }

        .faq-question {
            padding: 20px 18px;
            gap: 14px;
        }

        .faq-question-content {
            gap: 14px;
        }

        .faq-number {
            width: 42px;
            height: 42px;
            font-size: 0.9375rem;
        }

        .faq-question-text {
            font-size: 1rem;
            line-height: 1.5;
        }

        .faq-icon {
            width: 38px;
            height: 38px;
        }

        .faq-icon i {
            font-size: 17px;
        }

        .faq-answer-content {
            padding: 18px;
        }

        .faq-answer-text {
            font-size: 0.9375rem;
        }
    }

    /* Mobile / Standard Smartphone */
    @media (max-width: 480px) {
        .faq-section {
            padding: 40px 12px 40px 12px;
        }

        .faq-container {
            padding: 28px 16px;
            border-radius: 16px;
            border-width: 1.5px;
        }

        .faq-header {
            margin-bottom: 36px;
        }

        .faq-badge {
            font-size: 10px;
            padding: 7px 16px;
        }

        .faq-badge i {
            font-size: 13px;
        }

        .faq-title {
            font-size: 1.75rem;
            line-height: 1.25;
            letter-spacing: -0.01em;
        }

        .faq-subtitle {
            font-size: 0.875rem;
            line-height: 1.6;
        }

        .faq-accordion {
            gap: 10px;
        }

        .faq-question {
            padding: 18px 16px;
            gap: 12px;
        }

        .faq-question-content {
            gap: 12px;
        }

        .faq-number {
            width: 40px;
            height: 40px;
            font-size: 0.9375rem;
            border-radius: 12px;
        }

        .faq-question-text {
            font-size: 0.9375rem;
            line-height: 1.5;
        }

        .faq-icon {
            width: 36px;
            height: 36px;
        }

        .faq-icon i {
            font-size: 16px;
        }

        .faq-item.active .faq-answer {
            padding: 0 16px 20px 16px;
        }

        .faq-answer-content {
            padding: 16px;
            border-radius: 14px;
        }

        .faq-answer-text {
            font-size: 0.875rem;
            line-height: 1.7;
        }
    }

    /* Small Mobile / Compact Devices */
    @media (max-width: 375px) {
        .faq-section {
            padding: 30px 10px 30px 10px;
        }

        .faq-container {
            padding: 24px 14px;
            border-radius: 14px;
        }

        .faq-header {
            margin-bottom: 32px;
        }

        .faq-badge {
            font-size: 9px;
            padding: 6px 14px;
        }

        .faq-title {
            font-size: 1.5rem;
            line-height: 1.3;
        }

        .faq-subtitle {
            font-size: 0.8125rem;
            line-height: 1.6;
        }

        .faq-accordion {
            gap: 10px;
        }

        .faq-question {
            padding: 16px 14px;
            gap: 10px;
        }

        .faq-question-content {
            gap: 10px;
        }

        .faq-number {
            width: 38px;
            height: 38px;
            font-size: 0.875rem;
            border-radius: 10px;
        }

        .faq-question-text {
            font-size: 0.875rem;
            line-height: 1.5;
        }

        .faq-icon {
            width: 34px;
            height: 34px;
        }

        .faq-icon i {
            font-size: 15px;
        }

        .faq-item.active .faq-answer {
            padding: 0 14px 18px 14px;
        }

        .faq-answer-content {
            padding: 14px;
            border-radius: 12px;
        }

        .faq-answer-text {
            font-size: 0.8125rem;
            line-height: 1.6;
        }
    }

    /* Extra Small Mobile / Very Compact Devices */
    @media (max-width: 320px) {
        .faq-section {
            padding: 24px 8px 24px 8px;
        }

        .faq-container {
            padding: 20px 12px;
            border-radius: 12px;
        }

        .faq-header {
            margin-bottom: 28px;
        }

        .faq-badge {
            font-size: 8px;
            padding: 6px 12px;
        }

        .faq-badge i {
            font-size: 11px;
        }

        .faq-title {
            font-size: 1.375rem;
            line-height: 1.3;
        }

        .faq-subtitle {
            font-size: 0.75rem;
            line-height: 1.6;
        }

        .faq-accordion {
            gap: 8px;
        }

        .faq-question {
            padding: 14px 12px;
            gap: 10px;
        }

        .faq-question-content {
            gap: 10px;
        }

        .faq-number {
            width: 36px;
            height: 36px;
            font-size: 0.8125rem;
            border-radius: 10px;
        }

        .faq-question-text {
            font-size: 0.8125rem;
            line-height: 1.4;
        }

        .faq-icon {
            width: 32px;
            height: 32px;
        }

        .faq-icon i {
            font-size: 14px;
        }

        .faq-item.active .faq-answer {
            padding: 0 12px 16px 12px;
        }

        .faq-answer-content {
            padding: 12px;
            border-radius: 10px;
        }

        .faq-answer-text {
            font-size: 0.75rem;
            line-height: 1.6;
        }
    }

    /* Accessibility */
    @media (prefers-reduced-motion: reduce) {
        .faq-section *,
        .faq-section *::before,
        .faq-section *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }
    }
</style>

<!-- FAQ Section HTML with Vue.js -->
<section class="faq-section" id="faq">
    <div class="faq-container">
        <!-- Header -->
        <div class="faq-header">
            <div class="faq-badge">
                <i class="fas fa-question-circle"></i>
                <span>FAQ Hub</span>
            </div>

            <h2 class="faq-title">
                <span class="highlight">Start with Confidence</span> – FAQ Hub
            </h2>

            <p class="faq-subtitle">
                Get instant answers to your most common questions about courses, certifications, and learning paths at Bheem Academy.
            </p>
        </div>

        <!-- Accordion -->
        <div id="faqAccordion">
            <div class="faq-accordion">
                <div class="faq-item" v-for="(faq, index) in faqs" :key="index" :class="{ active: activeIndex === index }">
                    <div class="faq-question" @click="toggleFaq(index)">
                        <div class="faq-question-content">
                            <div class="faq-number">{{ String(index + 1).padStart(2, '0') }}</div>
                            <div class="faq-question-text">{{ faq.question }}</div>
                        </div>
                        <div class="faq-icon">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <p class="faq-answer-text">{{ faq.answer }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Wait for DOM to be ready
    document.addEventListener('DOMContentLoaded', function() {
        // Check if FAQ accordion element exists
        const faqElement = document.getElementById('faqAccordion');
        if (!faqElement) {
            console.error('FAQ accordion element not found!');
            return;
        }

        // Check if already mounted (prevent double-mounting)
        if (faqElement.__vue_app__) {
            console.warn('FAQ accordion already mounted, skipping...');
            return;
        }

        // Check if Vue is loaded
        if (typeof Vue === 'undefined') {
            console.error('Vue.js is not loaded! Please include Vue.js 3 CDN before this component.');
            return;
        }

        // Vue.js FAQ Accordion Component
        const { createApp } = Vue;

        const faqApp = createApp({
            data() {
                return {
                    activeIndex: null,
                    faqs: [
                        {
                            question: "Who can join Bheem Academy?",
                            answer: "Bheem Academy is open to kids (ages 8-18), teens, college students, professionals, and creators. Our diverse course offerings cater to learners at every stage of their journey."
                        },
                        {
                            question: "Do I need any technical background to start?",
                            answer: "Not at all! Our beginner-friendly courses are designed with no-code or low-code tools, making AI fun and easy to learn. We start from the basics and guide you step by step."
                        },
                        {
                            question: "How are classes conducted?",
                            answer: "We offer live online sessions, hybrid classes at select locations, and access to recorded videos through your dashboard. You can learn at your own pace with lifetime access to course materials."
                        },
                        {
                            question: "What if my child has never coded before?",
                            answer: "No problem! We start with visual programming tools like Scratch, Blockly, and Teachable Machine, perfect for beginners. Our curriculum is designed to make coding intuitive and enjoyable for young learners."
                        },
                        {
                            question: "How do professionals benefit from your courses?",
                            answer: "Our AI for Professionals course helps teachers, accountants, HRs, and administrators automate tasks, boost productivity, and stay ahead in their careers with cutting-edge AI skills."
                        },
                        {
                            question: "Will I get a certificate?",
                            answer: "Yes! On successful completion of your course, you'll receive an industry-recognized digital certificate that you can share on LinkedIn and with employers to showcase your new skills."
                        },
                        {
                            question: "What if I miss a class?",
                            answer: "No worries! You'll have lifetime access to recorded sessions, session notes, and the option to reschedule live classes easily. Learn at your own pace without missing out."
                        },
                        {
                            question: "How do I enroll?",
                            answer: "Simply fill out the enquiry form on our website or contact us directly. Our team will guide you through the enrollment process and help you choose the right course for your goals."
                        },
                        {
                            question: "What are the class timings?",
                            answer: "We offer flexible slots, including weekends and evenings, to accommodate different schedules. You can choose the timing that works best for you during the enrollment process."
                        },
                        {
                            question: "Will I get placement support after completing the course?",
                            answer: "Absolutely! Once you complete select professional or advanced programs, you'll be eligible for placement assistance. We connect you with our network of partner companies and provide career guidance to help you land your dream job."
                        }
                    ]
                };
            },
            methods: {
                toggleFaq(index) {
                    // Toggle: if clicking the same item, close it; otherwise open the new one
                    this.activeIndex = this.activeIndex === index ? null : index;
                },
                isActive(index) {
                    return this.activeIndex === index;
                }
            },
            mounted() {
                console.log('%c✨ FAQ Accordion Loaded Successfully', 'background: linear-gradient(135deg, #06B6D4, #10B981); color: white; padding: 8px 16px; border-radius: 6px; font-weight: bold;');
                console.log('%c📝 Total FAQs:', this.faqs.length, 'background: #06B6D4; color: white; padding: 4px 8px; border-radius: 4px;');
            }
        });

        // Mount the Vue app
        try {
            const mountedApp = faqApp.mount('#faqAccordion');
            console.log('%c✅ Vue FAQ App Mounted Successfully', 'background: #10B981; color: white; padding: 4px 8px; border-radius: 4px; font-weight: bold;');

            // Store reference to prevent double-mounting
            faqElement.__vue_app__ = mountedApp;
        } catch (error) {
            console.error('%c❌ Failed to mount Vue FAQ app:', 'background: #EF4444; color: white; padding: 4px 8px; border-radius: 4px; font-weight: bold;', error);
            console.error('Make sure Vue.js 3 is loaded and #faqAccordion element exists.');
        }

        // Scroll Animation with Intersection Observer
        const faqSection = document.querySelector('.faq-section');
        if (faqSection) {
            const observerOptions = {
                root: null,
                rootMargin: '-100px',
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('aos-animate');
                        console.log('%c🎬 FAQ Section Animated!', 'background: #8B5CF6; color: white; padding: 4px 8px; border-radius: 4px; font-weight: bold;');
                    }
                });
            }, observerOptions);

            observer.observe(faqSection);
        }
    });
</script>
