<!-- [Edoo] Modern Vue-Powered Footer Component - AI Professional Design -->
<style>
    /* ================================================
       MODERN AI PROFESSIONAL FOOTER - VUE POWERED
       Ultra-Premium Design with Advanced Interactions
    ================================================ */

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
        margin-top: 60px;
    }

    /* Global AI Icons Background for entire footer */
    .footer-ai-icons-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 2;
        overflow: hidden;
        opacity: 0.08;
    }

    .footer-ai-icon {
        position: absolute;
        font-size: 64px;
        color: #8B5CF6;
        opacity: 0.7;
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
    }

    .footer-ai-icon:nth-child(1) {
        top: 5%;
        left: 8%;
        animation: footer-float-1 25s infinite;
        color: #8B5CF6;
    }

    .footer-ai-icon:nth-child(2) {
        top: 20%;
        right: 12%;
        animation: footer-float-2 28s infinite;
        color: #EC4899;
    }

    .footer-ai-icon:nth-child(3) {
        top: 40%;
        left: 15%;
        animation: footer-float-3 22s infinite;
        color: #06B6D4;
    }

    .footer-ai-icon:nth-child(4) {
        top: 60%;
        right: 8%;
        animation: footer-float-4 30s infinite;
        color: #F59E0B;
    }

    .footer-ai-icon:nth-child(5) {
        top: 75%;
        left: 20%;
        animation: footer-float-5 26s infinite;
        color: #10B981;
    }

    .footer-ai-icon:nth-child(6) {
        top: 10%;
        left: 50%;
        animation: footer-float-6 24s infinite;
        color: #8B5CF6;
    }

    .footer-ai-icon:nth-child(7) {
        top: 35%;
        right: 25%;
        animation: footer-float-7 27s infinite;
        color: #EC4899;
    }

    .footer-ai-icon:nth-child(8) {
        top: 55%;
        left: 40%;
        animation: footer-float-8 23s infinite;
        color: #06B6D4;
    }

    .footer-ai-icon:nth-child(9) {
        top: 80%;
        right: 15%;
        animation: footer-float-9 29s infinite;
        color: #F59E0B;
    }

    .footer-ai-icon:nth-child(10) {
        top: 25%;
        left: 70%;
        animation: footer-float-10 21s infinite;
        color: #10B981;
    }

    @keyframes footer-float-1 {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        25% { transform: translate(40px, -30px) rotate(90deg); }
        50% { transform: translate(80px, 15px) rotate(180deg); }
        75% { transform: translate(40px, 45px) rotate(270deg); }
    }

    @keyframes footer-float-2 {
        0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
        33% { transform: translate(-50px, 40px) rotate(-120deg) scale(1.2); }
        66% { transform: translate(-30px, -35px) rotate(-240deg) scale(0.9); }
    }

    @keyframes footer-float-3 {
        0%, 100% { transform: translate(0, 0) rotate(360deg); }
        50% { transform: translate(-60px, 50px) rotate(180deg); }
    }

    @keyframes footer-float-4 {
        0%, 100% { transform: translate(0, 0) scale(1) rotate(0deg); }
        50% { transform: translate(55px, -45px) scale(1.3) rotate(180deg); }
    }

    @keyframes footer-float-5 {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        25% { transform: translateY(-40px) rotate(60deg); }
        50% { transform: translateY(0) rotate(120deg); }
        75% { transform: translateY(40px) rotate(180deg); }
    }

    @keyframes footer-float-6 {
        0%, 100% { transform: translate(0, 0) rotate(-360deg) scale(1); }
        50% { transform: translate(-70px, 55px) rotate(-180deg) scale(1.1); }
    }

    @keyframes footer-float-7 {
        0%, 100% { transform: translate(0, 0); }
        33% { transform: translate(45px, -35px); }
        66% { transform: translate(-40px, -20px); }
    }

    @keyframes footer-float-8 {
        0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
        25% { transform: translate(-40px, 45px) rotate(75deg) scale(1.15); }
        50% { transform: translate(35px, 30px) rotate(150deg) scale(0.95); }
        75% { transform: translate(-25px, -35px) rotate(225deg) scale(1.05); }
    }

    @keyframes footer-float-9 {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        50% { transform: translate(50px, -50px) rotate(180deg); }
    }

    @keyframes footer-float-10 {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(-35px, 30px) scale(1.2); }
        66% { transform: translate(40px, -25px) scale(0.9); }
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
        padding: 40px 24px;
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

    .stat-icon-image {
        width: 40px;
        height: 40px;
        object-fit: contain;
        background: transparent;
        -webkit-background-clip: unset;
        -webkit-text-fill-color: unset;
        filter: drop-shadow(0 4px 12px rgba(139, 92, 246, 0.3));
    }

    .stat-card:hover .stat-icon {
        transform: scale(1.2) rotateY(360deg);
    }

    .stat-card:hover .stat-icon-image {
        transform: scale(1.2);
    }

    /* Stamp Style for IBM Recognized */
    .stat-card.stamp-style {
        position: relative;
        border: 4px dashed rgba(139, 92, 246, 0.7);
        border-radius: 12px;
        background: linear-gradient(135deg,
            rgba(139, 92, 246, 0.08) 0%,
            rgba(236, 72, 153, 0.05) 100%);
        transform: rotate(-2deg);
        box-shadow:
            0 4px 20px rgba(139, 92, 246, 0.2),
            inset 0 0 30px rgba(139, 92, 246, 0.05);
    }

    .stat-card.stamp-style::before {
        content: '';
        position: absolute;
        top: 6px;
        left: 6px;
        right: 6px;
        bottom: 6px;
        border: 2px dashed rgba(139, 92, 246, 0.4);
        border-radius: 8px;
        pointer-events: none;
    }

    .stat-card.stamp-style::after {
        content: '★ CERTIFIED ★';
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 10px;
        font-weight: 700;
        color: rgba(139, 92, 246, 0.6);
        letter-spacing: 1px;
        transform: rotate(15deg);
    }

    .stat-card.stamp-style:hover {
        transform: rotate(-1deg) translateY(-12px) scale(1.03);
        border-color: rgba(139, 92, 246, 0.9);
        box-shadow:
            0 30px 70px rgba(139, 92, 246, 0.3),
            0 15px 35px rgba(236, 72, 153, 0.2),
            inset 0 0 40px rgba(139, 92, 246, 0.1);
    }

    .stamp-style .stat-icon-image {
        filter: drop-shadow(0 4px 12px rgba(139, 92, 246, 0.4));
    }

    .stamp-style .stat-value {
        background: linear-gradient(135deg, #FFFFFF, #E0E7FF);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 0 2px 8px rgba(139, 92, 246, 0.3);
        font-weight: 900;
    }

    .stamp-style .stat-label {
        color: rgba(255, 255, 255, 0.9);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
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
        margin-bottom: 32px;
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
        padding: 32px;
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
        padding: 40px 0;
        margin-top: 40px;
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
        font-size: 28px;
        font-weight: 900;
        background: linear-gradient(135deg, #FFFFFF 0%, #E0E7FF 50%, #FFFFFF 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 16px;
        text-align: center;
        letter-spacing: -0.02em;
        text-shadow: 0 0 30px rgba(139, 92, 246, 0.3);
        position: relative;
    }

    .trending-title::before {
        content: '';
        position: absolute;
        bottom: -12px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: linear-gradient(90deg, transparent, #8B5CF6, #EC4899, transparent);
        border-radius: 2px;
    }

    .trending-title i {
        color: #F59E0B;
        animation: fire-pulse 2s ease-in-out infinite;
        font-size: 28px;
        filter: drop-shadow(0 0 10px rgba(245, 158, 11, 0.6));
        -webkit-text-fill-color: #F59E0B;
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

    @keyframes float-1 {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        25% { transform: translate(30px, -20px) rotate(90deg); }
        50% { transform: translate(60px, 10px) rotate(180deg); }
        75% { transform: translate(30px, 30px) rotate(270deg); }
    }

    @keyframes float-2 {
        0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
        25% { transform: translate(-25px, 30px) rotate(-90deg) scale(1.2); }
        50% { transform: translate(-50px, -15px) rotate(-180deg) scale(0.9); }
        75% { transform: translate(-20px, -40px) rotate(-270deg) scale(1.1); }
    }

    @keyframes float-3 {
        0%, 100% { transform: translate(0, 0) rotate(360deg); }
        33% { transform: translate(-40px, 25px) rotate(240deg); }
        66% { transform: translate(-20px, -30px) rotate(120deg); }
    }

    @keyframes float-4 {
        0%, 100% { transform: translate(0, 0) scale(1); }
        50% { transform: translate(45px, -35px) scale(1.3); }
    }

    @keyframes float-5 {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        25% { transform: translateY(-30px) rotate(45deg); }
        50% { transform: translateY(0) rotate(90deg); }
        75% { transform: translateY(30px) rotate(135deg); }
    }

    @keyframes float-6 {
        0%, 100% { transform: translate(0, 0) rotate(-360deg); }
        50% { transform: translate(-55px, 40px) rotate(-180deg); }
    }

    @keyframes float-7 {
        0%, 100% { transform: translate(0, 0); }
        33% { transform: translate(35px, -25px); }
        66% { transform: translate(-30px, -15px); }
    }

    @keyframes float-8 {
        0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
        25% { transform: translate(-30px, 35px) rotate(60deg) scale(1.1); }
        50% { transform: translate(25px, 20px) rotate(120deg) scale(0.95); }
        75% { transform: translate(-15px, -25px) rotate(180deg) scale(1.05); }
    }

    /* Footer Bottom */
    .footer-bottom {
        position: relative;
        z-index: 3;
        background: linear-gradient(135deg,
            rgba(10, 14, 39, 0.95),
            rgba(26, 31, 58, 0.9));
        border-top: 2px solid rgba(139, 92, 246, 0.3);
        padding: 40px 24px;
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
        animation: chat-bounce 4s ease-in-out infinite;
    }

    @keyframes chat-bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
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
        animation: badge-bounce 2s ease-in-out infinite;
    }

    @keyframes badge-bounce {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.3); }
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

        .stat-icon-image {
            width: 35px;
            height: 35px;
        }

        .trending-courses {
            padding: 32px 0;
            margin-top: 32px;
        }

        .trending-courses-wrapper {
            padding: 0 16px;
        }

        .trending-title {
            font-size: 22px;
            margin-bottom: 24px;
            gap: 12px;
        }

        .trending-title i {
            font-size: 24px;
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

        .footer-ai-icon {
            font-size: 48px;
        }
    }

    @media (max-width: 480px) {
        .vue-footer-modern {
            margin-top: 40px;
        }

        .footer-main {
            padding: 60px 16px;
        }

        .stats-section {
            padding: 32px 16px;
        }

        .footer-bottom {
            padding: 32px 16px;
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

        .stat-icon-image {
            width: 30px;
            height: 30px;
        }

        .stat-card {
            padding: 20px 16px;
        }

        .stat-card.stamp-style {
            border-width: 3px;
            padding: 18px 14px;
        }

        .stat-card.stamp-style::after {
            font-size: 8px;
            top: 8px;
            right: 8px;
        }

        .trending-courses {
            padding: 24px 0;
            margin-top: 24px;
        }

        .trending-courses-wrapper {
            padding: 0 12px;
        }

        .trending-title {
            font-size: 20px;
            margin-bottom: 20px;
            gap: 10px;
        }

        .trending-title i {
            font-size: 22px;
        }

        .trending-title::before {
            width: 60px;
            height: 2px;
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

        .footer-ai-icon {
            font-size: 40px;
        }
    }

    /* Accessibility */
    @media (prefers-reduced-motion: reduce) {
        .vue-footer-modern *,
        .vue-footer-modern *::before,
        .vue-footer-modern *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }
    }

    /* Vue Transition Effects */
    .fade-enter-active, .fade-leave-active {
        transition: opacity 0.5s;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0;
    }

    .slide-fade-enter-active {
        transition: all 0.3s ease;
    }
    .slide-fade-leave-active {
        transition: all 0.3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    .slide-fade-enter, .slide-fade-leave-to {
        transform: translateX(10px);
        opacity: 0;
    }
</style>

<!-- Vue.js 3 CDN - Only load if not already present -->
<script>
    if (typeof Vue === 'undefined') {
        var script = document.createElement('script');
        script.src = 'https://unpkg.com/vue@3/dist/vue.global.js';
        document.head.appendChild(script);
    }
</script>

<!-- Modern Vue-Powered Footer HTML -->
<footer class="vue-footer-modern" id="footerApp">
    <!-- Global AI Icons Background -->
    <div class="footer-ai-icons-bg">
        <i class="fas fa-robot footer-ai-icon"></i>
        <i class="fas fa-brain footer-ai-icon"></i>
        <i class="fas fa-microchip footer-ai-icon"></i>
        <i class="fas fa-server footer-ai-icon"></i>
        <i class="fas fa-code footer-ai-icon"></i>
        <i class="fas fa-database footer-ai-icon"></i>
        <i class="fas fa-network-wired footer-ai-icon"></i>
        <i class="fas fa-atom footer-ai-icon"></i>
        <i class="fas fa-chart-line footer-ai-icon"></i>
        <i class="fas fa-project-diagram footer-ai-icon"></i>
    </div>

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
            <div v-for="(activity, index) in activityFeed" :key="'activity-' + index" class="ticker-item">
                <i :class="activity.icon" class="ticker-icon"></i>
                <span class="ticker-label">{{ activity.label }}:</span>
                <span class="ticker-value">{{ activity.value }}</span>
            </div>
            <!-- Duplicate for seamless loop -->
            <div v-for="(activity, index) in activityFeed" :key="'activity-dup-' + index" class="ticker-item">
                <i :class="activity.icon" class="ticker-icon"></i>
                <span class="ticker-label">{{ activity.label }}:</span>
                <span class="ticker-value">{{ activity.value }}</span>
            </div>
        </div>
    </div>

    <!-- Dynamic Stats Section -->
    <div class="stats-section">
        <div class="stats-container">
            <div class="stats-grid">
                <div v-for="stat in stats" :key="stat.label" :class="['stat-card', { 'stamp-style': stat.iconImage }]" @mouseenter="animateStatValue">
                    <img v-if="stat.iconImage" :src="stat.iconImage" class="stat-icon stat-icon-image" alt="icon" />
                    <i v-else :class="stat.icon" class="stat-icon"></i>
                    <div class="stat-value">{{ stat.value }}</div>
                    <div class="stat-label">{{ stat.label }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Trending Courses -->
    <div class="trending-courses">
        <!-- Animated AI Icons Background -->
        <div class="ai-icons-background">
            <i class="fas fa-robot ai-icon-floating"></i>
            <i class="fas fa-brain ai-icon-floating"></i>
            <i class="fas fa-microchip ai-icon-floating"></i>
            <i class="fas fa-chart-line ai-icon-floating"></i>
            <i class="fas fa-code ai-icon-floating"></i>
            <i class="fas fa-network-wired ai-icon-floating"></i>
            <i class="fas fa-atom ai-icon-floating"></i>
            <i class="fas fa-project-diagram ai-icon-floating"></i>
        </div>

        <div class="trending-courses-wrapper">
            <h4 class="trending-title">
                <i class="fas fa-fire"></i>
                Trending Courses
            </h4>
            <div class="courses-slider">
                <div class="courses-scroll-content">
                    <a v-for="course in trendingCourses"
                       :key="course.name"
                       :href="course.url"
                       class="course-chip">
                        <i :class="course.icon"></i>
                        {{ course.name }}
                    </a>
                    <!-- Duplicate for seamless loop -->
                    <a v-for="course in trendingCourses"
                       :key="'dup-' + course.name"
                       :href="course.url"
                       class="course-chip">
                        <i :class="course.icon"></i>
                        {{ course.name }}
                    </a>
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
                        <img src="/pluginfile.php?file=%2F1%2Ftheme_bheem%2Fmain_footer_logo%2F-1%2Fflogo.png"
                             alt="Bheem Academy"
                             class="footer-logo">
                    </div>

                    <p class="brand-tagline">
                        {{ brandInfo.tagline }}
                    </p>

                    <div class="social-links">
                        <a v-for="social in socialLinks"
                           :key="social.name"
                           :href="social.url"
                           :title="social.name"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="social-link">
                            <i :class="social.icon"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links Column -->
                <div class="footer-column">
                    <h3>
                        <i class="fas fa-compass"></i>
                        Quick Links
                    </h3>
                    <div class="footer-links">
                        <a v-for="link in quickLinks"
                           :key="link.name"
                           :href="link.url"
                           class="footer-link">
                            <i class="fas fa-angle-right"></i>
                            {{ link.name }}
                        </a>
                    </div>
                </div>

                <!-- Resources Column -->
                <div class="footer-column">
                    <h3>
                        <i class="fas fa-book"></i>
                        Resources
                    </h3>
                    <div class="footer-links">
                        <a v-for="link in resources"
                           :key="link.name"
                           :href="link.url"
                           class="footer-link">
                            <i class="fas fa-angle-right"></i>
                            {{ link.name }}
                        </a>
                    </div>
                </div>

                <!-- Newsletter & Contact Column -->
                <div class="footer-column">
                    <h3>
                        <i class="fas fa-envelope"></i>
                        Stay Connected
                    </h3>

                    <div class="newsletter-box">
                        <p class="newsletter-text">{{ newsletterInfo.description }}</p>
                        <form class="newsletter-form" @submit.prevent="handleNewsletterSubmit">
                            <input
                                type="email"
                                v-model="newsletterEmail"
                                class="newsletter-input"
                                placeholder="Enter your email"
                                required>
                            <button type="submit" class="newsletter-button" :disabled="subscribing">
                                <span>{{ subscribing ? 'Subscribing...' : 'Subscribe' }}</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </form>
                        <div class="newsletter-features">
                            <div v-for="feature in newsletterInfo.features" :key="feature" class="newsletter-feature">
                                <i class="fas fa-check"></i>
                                {{ feature }}
                            </div>
                        </div>
                    </div>

                    <div class="contact-cards">
                        <div v-for="contact in contactInfo" :key="contact.label" class="contact-card">
                            <i :class="contact.icon"></i>
                            <span>{{ contact.label }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="footer-bottom-content">
            <div class="copyright">
                <p>© {{ currentYear }} Bheem Academy • {{ footerInfo.tagline }}</p>
            </div>
            <div class="legal-links">
                <a v-for="link in legalLinks"
                   :key="link.name"
                   :href="link.url"
                   class="legal-link">
                    {{ link.name }}
                </a>
            </div>
            <div class="payment-icons">
                <i v-for="icon in paymentIcons" :key="icon" :class="icon" class="payment-icon"></i>
            </div>
        </div>
    </div>

    <!-- Floating Chat Button -->
    <div class="chat-fab">
        <button @click="toggleChat" class="chat-button">
            <i class="fas fa-comments"></i>
            <span v-if="unreadMessages > 0" class="chat-badge">{{ unreadMessages }}</span>
        </button>
    </div>
</footer>

<script>
// Vue 3 Application - Wait for DOM and Vue to be ready
(function initFooterApp() {
    // Check if Vue is available
    if (typeof Vue === 'undefined') {
        // Wait for Vue to load
        setTimeout(initFooterApp, 50);
        return;
    }

    // Check if footer element exists
    if (!document.getElementById('footerApp')) {
        // Wait for DOM
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initFooterApp);
        } else {
            setTimeout(initFooterApp, 50);
        }
        return;
    }

    // Initialize the footer Vue app
    const { createApp } = Vue;

    createApp({
    data() {
        return {
        
            // Brand Information
            brandInfo: {
                tagline: 'Revolutionizing AI education for all ages. From curious 8-year-olds to experienced professionals in their 80s.'
            },

            // Activity Feed (for ticker)
            activityFeed: [
                { icon: 'fas fa-circle pulse', label: 'Live', value: '342 students online' },
                { icon: 'fas fa-graduation-cap', label: 'New', value: 'Advanced Prompt Engineering' },
                { icon: 'fas fa-trophy', label: 'Achievement', value: 'Sarah completed AI Fundamentals' },
                { icon: 'fas fa-fire', label: 'Trending', value: 'LLaMA Fine-tuning Workshop' },
                { icon: 'fas fa-star', label: 'Milestone', value: '10K+ certificates issued' },
                { icon: 'fas fa-rocket', label: 'Launch', value: 'Neural Networks Masterclass' }
            ],

            // Statistics
            stats: [
                { icon: 'fas fa-users', value: '15,000+', label: 'Active Learners' },
                { icon: 'fas fa-book-open', value: '10+', label: 'AI Courses' },
                { iconImage: 'https://upload.wikimedia.org/wikipedia/commons/5/51/IBM_logo.svg', value: 'recognized', label: 'Certificates' },
                { icon: 'fas fa-star', value: '100%', label: 'Success Rate' }
            ],

            // Social Links
            socialLinks: [
                { name: 'Facebook', icon: 'fab fa-facebook-f', url: 'https://www.facebook.com/bheemacademy' },
                { name: 'Twitter', icon: 'fab fa-twitter', url: 'https://twitter.com/bheemacademy' },
                { name: 'LinkedIn', icon: 'fab fa-linkedin-in', url: 'https://www.linkedin.com/company/bheemacademy' },
                { name: 'Instagram', icon: 'fab fa-instagram', url: 'https://www.instagram.com/bheemacademy' },
                { name: 'YouTube', icon: 'fab fa-youtube', url: 'https://www.youtube.com/@bheemacademy' }
            ],

            // Quick Links
            quickLinks: [
                { name: 'All Courses', url: '/course/' },
                { name: 'Dashboard', url: '/my/' },
                { name: 'My Certificates', url: '/badges/mybadges.php' },
                { name: 'Blog & News', url: '/blog/list.php' },
                { name: 'Community', url: '/mod/forum/' },
                { name: 'My Profile', url: '/user/profile.php' }
            ],

            // Resources
            resources: [
                { name: 'Help Center', url: '/mod/page/view.php?id=3' },
                { name: 'Documentation', url: '/mod/page/view.php?id=4' },
                { name: 'AI Tools', url: '/mod/page/view.php?id=5' },
                { name: 'API Access', url: '/mod/page/view.php?id=6' },
                { name: 'Downloads', url: '/mod/page/view.php?id=7' },
                { name: 'Contact Us', url: '/mod/page/view.php?id=11' }
            ],

            // Newsletter
            newsletterInfo: {
                description: 'Get exclusive AI insights and course updates',
                features: [
                    'Weekly AI News',
                    'Exclusive Offers',
                    'Free Resources'
                ]
            },
            newsletterEmail: '',
            subscribing: false,

            // Contact
            contactInfo: [
                { icon: 'fas fa-headset', label: '24/7 Support Available' },
                { icon: 'fas fa-envelope', label: 'support@bheem.academy' }
            ],

            // Trending Courses
            trendingCourses: [
                { name: 'Intro to ChatGPT', icon: 'fas fa-robot', url: '/course/' },
                { name: 'Neural Networks 101', icon: 'fas fa-brain', url: '/course/' },
                { name: 'Python for AI', icon: 'fas fa-code', url: '/course/' },
                { name: 'AI Art Generation', icon: 'fas fa-palette', url: '/course/' },
                { name: 'Data Science Basics', icon: 'fas fa-chart-line', url: '/course/' }
            ],

            // Footer Bottom
            currentYear: new Date().getFullYear(),
            footerInfo: {
                tagline: 'Empowering minds through AI'
            },
            legalLinks: [
                { name: 'Privacy Policy', url: '/mod/page/view.php?id=8' },
                { name: 'Terms of Service', url: '/mod/page/view.php?id=9' },
                { name: 'Cookie Policy', url: '/mod/page/view.php?id=10' },
                { name: 'Sitemap', url: '/mod/page/view.php?id=12' }
            ],
            paymentIcons: [
                'fab fa-cc-visa',
                'fab fa-cc-mastercard',
                'fab fa-cc-paypal',
                'fab fa-cc-stripe'
            ],

            // Chat
            unreadMessages: 1,
            chatOpen: false
        }
    },

    methods: {
        // Newsletter submission
        handleNewsletterSubmit() {
            if (!this.newsletterEmail) return;

            this.subscribing = true;

            // Simulate API call
            setTimeout(() => {
                alert(`Thank you for subscribing! We'll send AI updates to ${this.newsletterEmail}`);
                this.newsletterEmail = '';
                this.subscribing = false;
            }, 1000);
        },

        // Animate stat value on hover
        animateStatValue(event) {
            const card = event.currentTarget;
            const value = card.querySelector('.stat-value');
            value.style.transform = 'scale(1.1)';
            setTimeout(() => {
                value.style.transform = 'scale(1)';
            }, 300);
        },

        // Toggle chat
        toggleChat() {
            this.chatOpen = !this.chatOpen;
            if (this.chatOpen) {
                this.unreadMessages = 0;
                // Open chat widget logic here
                alert('Chat feature coming soon!');
            }
        },

        // Initialize neural network canvas animation
        initNeuralNetwork() {
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
        }
    },

    mounted() {
        // Initialize neural network animation
        this.$nextTick(() => {
            this.initNeuralNetwork();
        });
    }
    }).mount('#footerApp');
})(); // End of initFooterApp IIFE
</script>
