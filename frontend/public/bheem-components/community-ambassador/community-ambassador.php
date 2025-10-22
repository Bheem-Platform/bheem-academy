<style>
    /* Community Ambassador Block - Professional Design */
    .community-ambassador-section {
        position: relative;
        width: 100%;
        min-height: 550px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 50px 0;
        margin-top: 20px;
    }

    /* Full-width Background Image */
    .community-ambassador-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: url('https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/b3ef0697-0d9c-4ca5-416b-c92781ef2f00/public');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        z-index: 0;
    }

    /* Subtle Dark Overlay for Readability */
    .community-ambassador-section::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.4);
        z-index: 1;
    }

    /* Agent Bheem Icon - Top Left */
    .agent-bheem-icon {
        position: absolute;
        top: 40px;
        left: 40px;
        width: 140px;
        height: 140px;
        z-index: 2;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .agent-bheem-icon img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.3));
        transition: all 0.4s ease;
    }

    .agent-bheem-icon:hover {
        transform: scale(1.1);
    }

    .agent-bheem-icon:hover img {
        filter: drop-shadow(0 6px 16px rgba(0, 0, 0, 0.4));
    }

    /* Responsive Agent Bheem Icon */
    @media (max-width: 1024px) {
        .agent-bheem-icon {
            width: 120px;
            height: 120px;
            top: 30px;
            left: 30px;
        }
    }

    @media (max-width: 768px) {
        .agent-bheem-icon {
            width: 100px;
            height: 100px;
            top: 25px;
            left: 25px;
        }
    }

    @media (max-width: 480px) {
        .agent-bheem-icon {
            width: 80px;
            height: 80px;
            top: 20px;
            left: 20px;
        }
    }

    /* Content Container - Right Aligned Layout */
    .ambassador-container {
        width: 100%;
        max-width: 100%;
        margin: 0;
        padding: 0 50px 0 0;
        position: relative;
        z-index: 2;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 60px;
        min-height: 550px;
    }

    /* Left Side - How It Works & Why Join - Compact */
    .ambassador-left-content {
        display: flex;
        flex-direction: column;
        gap: 20px;
        max-width: 480px;
        margin-right: auto;
        margin-left: auto;
    }

    /* Content Wrapper - Right Side Aligned */
    .ambassador-content-wrapper {
        max-width: 600px;
        text-align: left;
        padding-right: 60px;
        margin-left: 0;
    }

    /* Info Section Styling - Modern Glass Morphism Design */
    .info-section {
        position: relative;
        background: rgba(255, 255, 255, 0.95);
        border: 1px solid rgba(255, 255, 255, 0.4);
        border-radius: 20px;
        padding: 32px 36px;
        width: 100%;
        max-width: 500px;
        overflow: hidden;
        backdrop-filter: blur(20px) saturate(180%);
        -webkit-backdrop-filter: blur(20px) saturate(180%);
        box-shadow:
            0 8px 32px rgba(0, 0, 0, 0.1),
            0 4px 16px rgba(0, 0, 0, 0.05),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    /* Subtle Gradient Accent */
    .info-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg,
            rgba(147, 51, 234, 0.8) 0%,
            rgba(168, 85, 247, 0.8) 25%,
            rgba(236, 72, 153, 0.8) 50%,
            rgba(168, 85, 247, 0.8) 75%,
            rgba(147, 51, 234, 0.8) 100%);
        border-radius: 20px 20px 0 0;
        z-index: 1;
    }

    /* Subtle Background Pattern */
    .info-section::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background:
            radial-gradient(circle at 20% 30%,
                rgba(147, 51, 234, 0.03) 0%,
                transparent 50%),
            radial-gradient(circle at 80% 70%,
                rgba(236, 72, 153, 0.03) 0%,
                transparent 50%);
        pointer-events: none;
        z-index: 0;
    }

    .info-section:hover {
        transform: translateY(-4px);
        border-color: rgba(255, 255, 255, 0.6);
        box-shadow:
            0 12px 40px rgba(0, 0, 0, 0.15),
            0 6px 20px rgba(0, 0, 0, 0.08),
            inset 0 1px 0 rgba(255, 255, 255, 1);
    }

    .info-section-title {
        position: relative;
        z-index: 2;
        font-size: 1.85rem;
        font-weight: 900;
        color: #0F172A;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        gap: 14px;
        text-shadow: 0 2px 12px rgba(15, 23, 42, 0.1);
        letter-spacing: -0.02em;
    }

    .info-section-title i {
        font-size: 1.6rem;
        color: #06B6D4;
        filter: drop-shadow(0 2px 8px rgba(6, 182, 212, 0.3));
    }

    .info-points {
        position: relative;
        z-index: 2;
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .info-point {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: flex-start;
        gap: 14px;
        color: #1E293B;
        font-size: 1rem;
        line-height: 1.6;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .info-point:hover {
        transform: translateX(8px);
        color: #0F172A;
    }

    .info-point i {
        background: linear-gradient(135deg, #9333EA 0%, #C084FC 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-size: 1.1rem;
        margin-top: 4px;
        flex-shrink: 0;
    }

    .info-point-text {
        flex: 1;
    }

    /* Journey Path Text */
    .journey-path-text {
        text-align: center;
        font-size: 1.5rem;
        font-weight: 900;
        color: #FFFFFF;
        letter-spacing: 0.5px;
        line-height: 1.6;
        margin-top: 36px;
        text-shadow:
            0 0 20px rgba(6, 182, 212, 0.4),
            0 4px 16px rgba(0, 0, 0, 0.3);
    }

    .journey-path-text .arrow-icon {
        display: inline-block;
        margin: 0 10px;
        color: #22D3EE;
        filter: drop-shadow(0 0 10px rgba(34, 211, 238, 0.6));
        animation: pulse-icon 2s ease-in-out infinite;
    }

    @keyframes pulse-icon {
        0%, 100% {
            transform: scale(1) translateX(0);
            opacity: 1;
        }
        50% {
            transform: scale(1.2) translateX(4px);
            opacity: 0.9;
        }
    }

    /* Badge - Violet Theme */
    .ambassador-badge {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 14px 32px;
        background: linear-gradient(135deg, rgba(147, 51, 234, 0.3) 0%, rgba(192, 132, 252, 0.2) 100%);
        border: 2px solid rgba(192, 132, 252, 0.5);
        border-radius: 50px;
        color: #FFFFFF;
        font-size: 15px;
        font-weight: 700;
        margin-bottom: 28px;
        backdrop-filter: blur(12px);
        box-shadow:
            0 8px 24px rgba(147, 51, 234, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
    }

    .ambassador-badge:hover {
        transform: translateY(-2px);
        box-shadow:
            0 12px 32px rgba(147, 51, 234, 0.4),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
    }

    .ambassador-badge i {
        font-size: 20px;
        background: linear-gradient(135deg, #C084FC 0%, #E879F9 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Main Title - Violet Gradient */
    .ambassador-title {
        font-size: 3.5rem;
        font-weight: 900;
        color: #FFFFFF;
        margin: 0 0 24px 0;
        line-height: 1.2;
        text-shadow: 0 4px 24px rgba(0, 0, 0, 0.4);
        letter-spacing: -0.02em;
    }

    .ambassador-title .highlight {
        color: #06B6D4;
        font-weight: 900;
        text-shadow:
            0 0 20px rgba(6, 182, 212, 0.5),
            0 0 40px rgba(6, 182, 212, 0.3),
            0 4px 24px rgba(0, 0, 0, 0.5);
        letter-spacing: -0.01em;
    }

    /* Subtitle */
    .ambassador-subtitle {
        font-size: 1.5rem;
        color: rgba(255, 255, 255, 0.95);
        margin: 0 0 50px 0;
        line-height: 1.6;
        font-weight: 500;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Tier Cards Container */
    .tier-cards-wrapper {
        display: flex;
        flex-direction: column;
        gap: 16px;
        margin-bottom: 40px;
    }

    /* Individual Tier Card - Modern Glass Morphism Design */
    .tier-card {
        background: rgba(255, 255, 255, 0.95);
        border: 1px solid rgba(255, 255, 255, 0.4);
        border-radius: 16px;
        padding: 28px 32px;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        gap: 24px;
        backdrop-filter: blur(20px) saturate(180%);
        -webkit-backdrop-filter: blur(20px) saturate(180%);
        box-shadow:
            0 8px 32px rgba(0, 0, 0, 0.1),
            0 4px 16px rgba(0, 0, 0, 0.05),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
    }

    /* Gradient Accent Bar */
    .tier-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        width: 4px;
        background: linear-gradient(180deg,
            rgba(147, 51, 234, 0.8) 0%,
            rgba(168, 85, 247, 0.8) 50%,
            rgba(236, 72, 153, 0.8) 100%);
        border-radius: 16px 0 0 16px;
        z-index: 1;
    }

    /* Subtle Background Pattern */
    .tier-card::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background:
            radial-gradient(circle at 20% 40%,
                rgba(147, 51, 234, 0.03) 0%,
                transparent 50%),
            radial-gradient(circle at 80% 60%,
                rgba(236, 72, 153, 0.03) 0%,
                transparent 50%);
        pointer-events: none;
        z-index: 0;
    }

    .tier-card:hover {
        transform: translateX(8px) translateY(-4px);
        border-color: rgba(255, 255, 255, 0.6);
        box-shadow:
            0 12px 40px rgba(0, 0, 0, 0.15),
            0 6px 20px rgba(0, 0, 0, 0.08),
            inset 0 1px 0 rgba(255, 255, 255, 1);
    }

    /* Tier Icon */
    .tier-icon {
        position: relative;
        z-index: 2;
        width: 60px;
        height: 60px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-size: 28px;
        color: white;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.3);
        transition: transform 0.4s ease;
    }

    .tier-card:hover .tier-icon {
        transform: scale(1.1) rotate(5deg);
    }

    /* Tier Content */
    .tier-content {
        position: relative;
        z-index: 2;
        flex: 1;
    }

    /* Bronze Tier */
    .tier-bronze .tier-icon {
        background: linear-gradient(135deg, #CD7F32 0%, #8B5A2B 100%);
    }

    /* Silver Tier */
    .tier-silver .tier-icon {
        background: linear-gradient(135deg, #C0C0C0 0%, #808080 100%);
    }

    /* Gold Tier */
    .tier-gold .tier-icon {
        background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
    }

    /* Tier Name */
    .tier-name {
        font-size: 1.25rem;
        font-weight: 800;
        color: #0F172A;
        margin-bottom: 6px;
        text-shadow: 0 2px 8px rgba(15, 23, 42, 0.1);
        letter-spacing: 0.02em;
    }

    /* Tier Description */
    .tier-description {
        font-size: 0.95rem;
        color: #64748B;
        line-height: 1.5;
    }

    /* CTA Buttons */
    .ambassador-cta-group {
        display: flex;
        gap: 16px;
        justify-content: flex-start;
        flex-wrap: wrap;
        margin-bottom: 40px;
    }

    .ambassador-btn {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 18px 40px;
        border-radius: 50px;
        font-size: 17px;
        font-weight: 800;
        text-decoration: none;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    /* Primary Button - Modern Cyan Design */
    .ambassador-btn-primary {
        background: linear-gradient(135deg, #0891B2 0%, #06B6D4 50%, #22D3EE 100%);
        color: #FFFFFF;
        box-shadow:
            0 12px 40px rgba(6, 182, 212, 0.4),
            0 4px 16px rgba(6, 182, 212, 0.25);
    }

    .ambassador-btn-primary::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transform: translate(-50%, -50%);
        transition: width 0.6s ease, height 0.6s ease;
    }

    .ambassador-btn-primary:hover::before {
        width: 400px;
        height: 400px;
    }

    .ambassador-btn-primary:hover {
        transform: translateY(-4px) scale(1.02);
        box-shadow:
            0 20px 56px rgba(6, 182, 212, 0.5),
            0 8px 24px rgba(34, 211, 238, 0.35);
        background: linear-gradient(135deg, #0E7490 0%, #0891B2 50%, #06B6D4 100%);
    }

    .ambassador-btn-primary i {
        transition: transform 0.3s ease;
    }

    .ambassador-btn-primary:hover i {
        transform: translateX(6px) scale(1.1);
    }

    /* Secondary Button - Modern Cyan Border */
    .ambassador-btn-secondary {
        background: transparent;
        color: #FFFFFF;
        border: 3px solid rgba(34, 211, 238, 0.8);
        box-shadow: 0 4px 16px rgba(6, 182, 212, 0.2);
    }

    .ambassador-btn-secondary:hover {
        background: linear-gradient(135deg, rgba(6, 182, 212, 0.25) 0%, rgba(34, 211, 238, 0.15) 100%);
        border-color: #22D3EE;
        transform: translateY(-4px);
        box-shadow: 0 12px 32px rgba(6, 182, 212, 0.4);
    }

    /* Stats Section */
    .ambassador-stats {
        display: flex;
        gap: 16px;
        justify-content: flex-start;
        flex-wrap: nowrap;
    }

    .stat-item {
        position: relative;
        background: #FFFFFF;
        border: 2px solid rgba(147, 51, 234, 0.15);
        border-radius: 20px;
        padding: 24px 28px;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        min-width: 150px;
        flex: 1;
        text-align: center;
        overflow: hidden;
        box-shadow:
            0 10px 40px rgba(147, 51, 234, 0.12),
            0 5px 20px rgba(236, 72, 153, 0.08),
            0 2px 10px rgba(0, 0, 0, 0.05);
    }

    /* Attractive Gradient Border */
    .stat-item::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: linear-gradient(135deg,
            #9333EA 0%,
            #A855F7 25%,
            #EC4899 50%,
            #C084FC 75%,
            #9333EA 100%);
        border-radius: 20px;
        z-index: -1;
        opacity: 0;
        transition: opacity 0.4s ease;
        animation: stat-gradient-rotate 6s linear infinite;
    }

    @keyframes stat-gradient-rotate {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }

    /* Subtle Glow Effect */
    .stat-item::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background:
            radial-gradient(circle at 50% 0%,
                rgba(147, 51, 234, 0.05) 0%,
                transparent 60%),
            radial-gradient(circle at 50% 100%,
                rgba(236, 72, 153, 0.05) 0%,
                transparent 60%);
        pointer-events: none;
        z-index: 0;
        border-radius: 20px;
    }

    .stat-item:hover {
        transform: translateY(-6px) scale(1.03);
        border-color: rgba(147, 51, 234, 0.3);
        box-shadow:
            0 15px 50px rgba(147, 51, 234, 0.2),
            0 8px 25px rgba(236, 72, 153, 0.15),
            0 3px 12px rgba(168, 85, 247, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
    }

    .stat-item:hover::before {
        opacity: 1;
    }

    .stat-value {
        position: relative;
        z-index: 2;
        font-size: 2.25rem;
        font-weight: 900;
        background: linear-gradient(135deg, #9333EA 0%, #C084FC 50%, #EC4899 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        display: block;
        margin-bottom: 6px;
        letter-spacing: -0.03em;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        text-shadow: 0 2px 10px rgba(147, 51, 234, 0.15);
    }

    .stat-label {
        position: relative;
        z-index: 2;
        font-size: 0.75rem;
        color: #64748B;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .ambassador-container {
            grid-template-columns: 1fr 500px;
            gap: 40px;
        }

        .ambassador-left-content {
            padding-left: 40px;
        }
    }

    @media (max-width: 1024px) {
        .community-ambassador-section {
            min-height: 500px;
            padding: 80px 0;
            margin-top: 60px;
        }

        .ambassador-container {
            grid-template-columns: 1fr;
            gap: 40px;
            padding: 0 40px;
        }

        .ambassador-left-content {
            padding-left: 0;
            gap: 30px;
        }

        .ambassador-content-wrapper {
            max-width: 100%;
            text-align: center;
            padding-right: 0;
        }

        .info-section {
            padding: 24px 28px;
        }

        .info-section-title {
            font-size: 1.5rem;
            justify-content: center;
        }

        .info-points {
            gap: 12px;
        }
    }

        .ambassador-title {
            font-size: 3rem;
        }

        .ambassador-cta-group {
            justify-content: center;
        }

        .ambassador-stats {
            justify-content: center;
        }
    }

    @media (max-width: 768px) {
        .community-ambassador-section {
            padding: 60px 0;
            margin-top: 50px;
        }

        .ambassador-container {
            padding: 0 24px;
        }

        .ambassador-title {
            font-size: 2.5rem;
        }

        .ambassador-subtitle {
            font-size: 1.25rem;
        }

        .tier-card {
            padding: 18px 20px;
        }

        .tier-icon {
            width: 56px;
            height: 56px;
            font-size: 26px;
        }

        .ambassador-cta-group {
            flex-direction: column;
            gap: 12px;
        }

        .ambassador-btn {
            width: 100%;
            justify-content: center;
        }

        .ambassador-stats {
            flex-wrap: wrap;
            gap: 16px;
        }

        .stat-item {
            min-width: calc(50% - 8px);
            flex: 1 1 calc(50% - 8px);
            padding: 24px 20px;
        }

        .stat-value {
            font-size: 1.6rem;
        }

        .stat-label {
            font-size: 0.75rem;
        }
    }

    @media (max-width: 480px) {
        .ambassador-title {
            font-size: 2rem;
        }

        .ambassador-subtitle {
            font-size: 1.1rem;
        }

        .ambassador-badge {
            padding: 10px 20px;
            font-size: 14px;
        }

        .tier-icon {
            width: 50px;
            height: 50px;
            font-size: 24px;
        }

        .tier-name {
            font-size: 1.1rem;
        }

        .tier-description {
            font-size: 0.9rem;
        }

        .ambassador-btn {
            padding: 16px 32px;
            font-size: 16px;
        }

        .stat-item {
            padding: 14px 20px;
            min-width: 120px;
        }

        .stat-value {
            font-size: 1.4rem;
        }

        .stat-label {
            font-size: 0.75rem;
        }
    }
</style>

<!-- Community Ambassador Section -->
<section class="community-ambassador-section">
    <!-- Agent Bheem Icon -->
    <div class="agent-bheem-icon">
        <img src="https://dev.bheem.cloud/pluginfile.php/1/core_admin/logo/0x200/1730804782/logo.png" alt="Agent Bheem">
    </div>

    <div class="ambassador-container">
        <!-- Left Side - How It Works & Why Join -->
        <div class="ambassador-left-content">
            <!-- How It Works Section -->
            <div class="info-section">
                <h3 class="info-section-title">
                    <i class="fas fa-lightbulb"></i>
                    <span>How it Works?</span>
                </h3>
                <div class="info-points">
                    <div class="info-point">
                        <i class="fas fa-check-circle"></i>
                        <span class="info-point-text">Every student you bring = Guaranteed earning</span>
                    </div>
                    <div class="info-point">
                        <i class="fas fa-check-circle"></i>
                        <span class="info-point-text">Simple structure, unlimited potential</span>
                    </div>
                    <div class="info-point">
                        <i class="fas fa-check-circle"></i>
                        <span class="info-point-text">Recognition badges: Bronze → Silver → Gold</span>
                    </div>
                    <div class="info-point">
                        <i class="fas fa-check-circle"></i>
                        <span class="info-point-text">Just admissions → Instant cash in your pocket</span>
                    </div>
                </div>
            </div>

            <!-- Why Join Section -->
            <div class="info-section">
                <h3 class="info-section-title">
                    <i class="fas fa-star"></i>
                    <span>Why Join?</span>
                </h3>
                <div class="info-points">
                    <div class="info-point">
                        <i class="fas fa-check-circle"></i>
                        <span class="info-point-text">Turn free time into family income</span>
                    </div>
                    <div class="info-point">
                        <i class="fas fa-check-circle"></i>
                        <span class="info-point-text">Flexible hours, work anytime, anywhere</span>
                    </div>
                    <div class="info-point">
                        <i class="fas fa-check-circle"></i>
                        <span class="info-point-text">Your circle becomes your income source</span>
                    </div>
                    <div class="info-point">
                        <i class="fas fa-check-circle"></i>
                        <span class="info-point-text">Unlimited admissions = Unlimited income</span>
                    </div>
                </div>
            </div>

            <!-- Journey Path Text -->
            <div class="journey-path-text">
                CLOSE MORE <i class="fas fa-arrow-right arrow-icon"></i> SHINE MORE <i class="fas fa-arrow-right arrow-icon"></i> EARN MORE <i class="fas fa-arrow-right arrow-icon"></i> START YOUR AMBASSADOR JOURNEY WITH BHEEM ACADEMY
            </div>
        </div>

        <!-- Right Side - Main Content -->
        <div class="ambassador-content-wrapper">
            <!-- Badge -->
            <div class="ambassador-badge">
                <i class="fas fa-users"></i>
                <span>Community Ambassador Program</span>
            </div>

            <!-- Main Title -->
            <h2 class="ambassador-title">
                <span class="highlight">Earn while you Empower!</span>
            </h2>

            <!-- Subtitle -->
            <p class="ambassador-subtitle">
                Every Admission = Guaranteed Income<br>
                Climb from Bronze, Silver to Gold
            </p>

            <!-- Tier Cards -->
            <div class="tier-cards-wrapper">
                <!-- Bronze Tier -->
                <div class="tier-card tier-bronze">
                    <div class="tier-icon">
                        <i class="fas fa-medal"></i>
                    </div>
                    <div class="tier-content">
                        <h3 class="tier-name">Bronze</h3>
                        <p class="tier-description">
                            Start your journey with guaranteed earnings from your first admission
                        </p>
                    </div>
                </div>

                <!-- Silver Tier -->
                <div class="tier-card tier-silver">
                    <div class="tier-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <div class="tier-content">
                        <h3 class="tier-name">Silver</h3>
                        <p class="tier-description">
                            Unlock enhanced commission rates and exclusive ambassador benefits
                        </p>
                    </div>
                </div>

                <!-- Gold Tier -->
                <div class="tier-card tier-gold">
                    <div class="tier-icon">
                        <i class="fas fa-crown"></i>
                    </div>
                    <div class="tier-content">
                        <h3 class="tier-name">Gold</h3>
                        <p class="tier-description">
                            Achieve maximum earning potential with premium tier rewards
                        </p>
                    </div>
                </div>
            </div>

            <!-- CTA Buttons -->
            <div class="ambassador-cta-group">
                <a href="#" class="ambassador-btn ambassador-btn-primary">
                    <span>Become an Ambassador</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
                <a href="#" class="ambassador-btn ambassador-btn-secondary">
                    <i class="fas fa-info-circle"></i>
                    <span>Learn More</span>
                </a>
            </div>

            <!-- Statistics -->
            <div class="ambassador-stats">
                <div class="stat-item">
                    <span class="stat-value">2,500+</span>
                    <span class="stat-label">Active Ambassadors</span>
                </div>
                <div class="stat-item">
                    <span class="stat-value">₹50L+</span>
                    <span class="stat-label">Paid Out</span>
                </div>
                <div class="stat-item">
                    <span class="stat-value">98%</span>
                    <span class="stat-label">Success Rate</span>
                </div>
            </div>
        </div>
    </div>
</section>
