<?php
defined('MOODLE_INTERNAL') || die();
global $CFG;
?>

<style>
        /* Premium Professional Partners Section Styles */
        .neural-partners-section {
            padding: 20px 0 70px;
            position: relative;
            background: #0f172a;
            overflow: hidden;
            isolation: isolate;
        }

        .neural-partners-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(ellipse at 25% 30%, rgba(59, 130, 246, 0.15) 0%, transparent 50%),
                radial-gradient(ellipse at 75% 70%, rgba(16, 185, 129, 0.12) 0%, transparent 50%),
                radial-gradient(circle at 50% 50%, rgba(139, 92, 246, 0.1) 0%, transparent 60%);
            animation: partnerBgPulse 12s ease-in-out infinite;
            pointer-events: none;
            z-index: 1;
        }

        @keyframes partnerBgPulse {
            0%, 100% {
                opacity: 1;
                transform: scale(1) rotate(0deg);
            }
            50% {
                opacity: 0.8;
                transform: scale(1.03) rotate(2deg);
            }
        }

        .neural-partners-section::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image:
                radial-gradient(circle at 20% 40%, rgba(59, 130, 246, 0.4) 2px, transparent 2px),
                radial-gradient(circle at 80% 60%, rgba(16, 185, 129, 0.35) 1.5px, transparent 1.5px),
                radial-gradient(circle at 50% 80%, rgba(139, 92, 246, 0.3) 2px, transparent 2px),
                radial-gradient(circle at 30% 70%, rgba(6, 182, 212, 0.35) 1.5px, transparent 1.5px);
            background-size: 300px 300px, 250px 250px, 220px 220px, 280px 280px;
            background-position: 0 0, 50px 50px, 100px 100px, 150px 150px;
            animation: partnerSparkle 40s linear infinite;
            opacity: 0.6;
            pointer-events: none;
            z-index: 1;
        }

        @keyframes partnerSparkle {
            0% {
                background-position: 0 0, 50px 50px, 100px 100px, 150px 150px;
            }
            100% {
                background-position: 300px 300px, 350px 350px, 400px 400px, 450px 450px;
            }
        }

        .partners-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 2;
        }

        .partners-header {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }

        .partners-title {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 900;
            margin-bottom: 30px;
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
            position: relative;
            letter-spacing: -0.03em;
            line-height: 1.1;
            animation: gradientShift 8s ease-in-out infinite;
            text-shadow: 0 0 80px rgba(139, 92, 246, 0.3);
        }

        @keyframes partnerTitleShift {
            0%, 100% {
                background-position: 0% 50%;
                transform: scale(1);
            }
            50% {
                background-position: 100% 50%;
                transform: scale(1.02);
            }
        }

        .partners-title::before {
            content: '';
            position: absolute;
            top: -25px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 6px;
            background: linear-gradient(90deg,
                transparent 0%,
                rgba(16, 185, 129, 0.8) 25%,
                rgba(16, 185, 129, 1) 50%,
                rgba(16, 185, 129, 0.8) 75%,
                transparent 100%);
            border-radius: 3px;
            animation: titleLineGlow 4s ease-in-out infinite;
            box-shadow: 0 0 20px rgba(16, 185, 129, 0.7);
        }

        @keyframes titleLineGlow {
            0%, 100% {
                opacity: 0.7;
                transform: translateX(-50%) scaleX(1);
            }
            50% {
                opacity: 1;
                transform: translateX(-50%) scaleX(1.3);
            }
        }

        .partners-title::after {
            content: '';
            position: absolute;
            bottom: -25px;
            left: 50%;
            transform: translateX(-50%);
            width: 180px;
            height: 6px;
            background: linear-gradient(90deg,
                transparent 0%,
                rgba(59, 130, 246, 0.8) 15%,
                rgba(16, 185, 129, 0.9) 35%,
                rgba(139, 92, 246, 1) 50%,
                rgba(16, 185, 129, 0.9) 65%,
                rgba(59, 130, 246, 0.8) 85%,
                transparent 100%);
            border-radius: 3px;
            animation: titleMultiGlow 5s ease-in-out infinite;
            box-shadow:
                0 0 20px rgba(59, 130, 246, 0.6),
                0 0 30px rgba(16, 185, 129, 0.4);
        }

        @keyframes titleMultiGlow {
            0%, 100% {
                opacity: 0.8;
                transform: translateX(-50%) scaleX(1);
            }
            50% {
                opacity: 1;
                transform: translateX(-50%) scaleX(1.25);
            }
        }

        .partners-subtitle {
            font-size: 1.375rem;
            color: rgba(226, 232, 240, 0.95);
            font-weight: 500;
            line-height: 1.8;
            max-width: 750px;
            margin: 0 auto;
            letter-spacing: 0.01em;
            text-shadow: 0 2px 12px rgba(0, 0, 0, 0.4);
            animation: fadeInUp 1.2s ease-out;
        }

        .neural-partners-grid {
            display: flex;
            width: 100%;
            overflow: hidden;
            margin-bottom: 0;
            position: relative;
            padding: 45px 0;
        }


        .partners-track {
            display: flex;
            gap: 50px;
            animation: partnerScroll 30s linear infinite;
            align-items: center;
            will-change: transform;
        }

        .partners-track:hover {
            animation-play-state: paused;
        }

        .neural-partner-item {
            flex: 0 0 auto;
            width: 220px;
            position: relative;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
            cursor: pointer;
        }

        .neural-partner-item:hover {
            transform: scale(1.08) translateY(-10px);
        }

        .partner-logo-container {
            background:
                linear-gradient(145deg,
                    #ffffff 0%,
                    #fafbfc 50%,
                    #ffffff 100%);
            border-radius: 20px;
            padding: 35px;
            box-shadow:
                0 20px 50px rgba(79, 70, 229, 0.1),
                0 10px 25px rgba(124, 58, 237, 0.06),
                0 5px 15px rgba(148, 163, 184, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 1);
            border: 2px solid rgba(255, 255, 255, 0.95);
            position: relative;
            overflow: hidden;
            height: 140px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .partner-logo-container::before {
            content: '';
            position: absolute;
            top: -100%;
            left: -100%;
            width: 300%;
            height: 300%;
            background:
                radial-gradient(ellipse 200px 180px at 25% 30%,
                    rgba(147, 51, 234, 0.08) 0%,
                    transparent 50%),
                radial-gradient(ellipse 180px 160px at 75% 70%,
                    rgba(168, 85, 247, 0.06) 0%,
                    transparent 50%),
                radial-gradient(ellipse 160px 140px at 50% 50%,
                    rgba(236, 72, 153, 0.05) 0%,
                    transparent 50%);
            border-radius: 20px;
            z-index: 0;
            animation: partner-card-ambient 8s ease-in-out infinite;
            filter: blur(20px);
        }

        @keyframes partner-card-ambient {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
                opacity: 0.6;
            }
            33% {
                transform: translate(8%, 10%) rotate(120deg);
                opacity: 0.8;
            }
            66% {
                transform: translate(-6%, -8%) rotate(240deg);
                opacity: 0.7;
            }
        }

        .partner-logo-container::after {
            content: '';
            position: absolute;
            inset: 2px;
            background:
                linear-gradient(145deg,
                    #ffffff 0%,
                    #fafbfc 50%,
                    #ffffff 100%);
            border-radius: 18px;
            z-index: 1;
        }

        .neural-partner-item:hover .partner-logo-container {
            transform: translateY(-8px) scale(1.03);
            box-shadow:
                0 25px 60px rgba(147, 51, 234, 0.18),
                0 15px 35px rgba(168, 85, 247, 0.12),
                0 8px 20px rgba(236, 72, 153, 0.1);
            border-color: rgba(255, 255, 255, 1);
        }

        .neural-partner-item:hover .partner-logo-container::before {
            animation-duration: 4s;
            opacity: 1;
            filter: blur(15px);
        }

        /* Staggered Animation Delays for Individual Cards */
        .neural-partner-item:nth-child(1) .partner-logo-container::before {
            animation-delay: 0s;
        }

        .neural-partner-item:nth-child(2) .partner-logo-container::before {
            animation-delay: 0.8s;
        }

        .neural-partner-item:nth-child(3) .partner-logo-container::before {
            animation-delay: 1.6s;
        }

        .neural-partner-item:nth-child(4) .partner-logo-container::before {
            animation-delay: 2.4s;
        }

        .neural-partner-item:nth-child(5) .partner-logo-container::before {
            animation-delay: 3.2s;
        }

        .neural-partner-item:nth-child(6) .partner-logo-container::before {
            animation-delay: 4s;
        }

        .neural-partner-item:nth-child(7) .partner-logo-container::before {
            animation-delay: 4.8s;
        }

        .neural-partner-item:nth-child(8) .partner-logo-container::before {
            animation-delay: 5.6s;
        }

        .neural-partner-item:nth-child(9) .partner-logo-container::before {
            animation-delay: 6.4s;
        }

        .neural-partner-item:nth-child(10) .partner-logo-container::before {
            animation-delay: 7.2s;
        }

        /* Different Animation Variations for Each Card */
        .neural-partner-item:nth-child(odd) .partner-logo-container::before {
            animation-name: partner-card-ambient-alt;
        }

        @keyframes partner-card-ambient-alt {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
                opacity: 0.6;
            }
            33% {
                transform: translate(-8%, 10%) rotate(-120deg);
                opacity: 0.8;
            }
            66% {
                transform: translate(6%, -8%) rotate(-240deg);
                opacity: 0.7;
            }
        }

        .partner-glow {
            display: none;
        }

        .neural-partner-logo {
            max-width: 160px;
            max-height: 100px;
            width: auto;
            height: auto;
            object-fit: contain;
            filter: brightness(1.05) contrast(1.08) saturate(1.15);
            transition: all 0.4s ease;
            position: relative;
            z-index: 2;
            display: block;
            margin: 0 auto;
        }

        .neural-partner-item:hover .neural-partner-logo {
            filter: brightness(1.1) contrast(1.12) saturate(1.25);
            transform: scale(1.08);
        }

        @keyframes partnerScroll {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }

        @keyframes titleGlow {
            0% {
                opacity: 0.6;
                transform: translateX(-50%) scale(1);
            }
            100% {
                opacity: 1;
                transform: translateX(-50%) scale(1.05);
            }
        }

        @keyframes rotateGlow {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes modernAmbient {
            0%, 100% {
                opacity: 0.8;
                transform: scale(1) rotate(0deg);
            }
            25% {
                opacity: 1;
                transform: scale(1.02) rotate(90deg);
            }
            50% {
                opacity: 0.9;
                transform: scale(0.98) rotate(180deg);
            }
            75% {
                opacity: 1;
                transform: scale(1.01) rotate(270deg);
            }
        }


        .partners-footer {
            text-align: center;
            padding: 70px 0 50px;
            position: relative;
            margin-top: 50px;
            background: linear-gradient(180deg,
                rgba(15, 23, 42, 0) 0%,
                rgba(15, 23, 42, 0.5) 50%,
                rgba(15, 23, 42, 0) 100%);
        }

        .partners-footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 700px;
            height: 3px;
            background: linear-gradient(90deg,
                transparent 0%,
                rgba(59, 130, 246, 0.4) 15%,
                rgba(16, 185, 129, 0.6) 35%,
                rgba(139, 92, 246, 0.8) 50%,
                rgba(16, 185, 129, 0.6) 65%,
                rgba(59, 130, 246, 0.4) 85%,
                transparent 100%);
            box-shadow:
                0 0 30px rgba(59, 130, 246, 0.5),
                0 0 50px rgba(16, 185, 129, 0.4),
                0 0 70px rgba(139, 92, 246, 0.3);
            animation: footerLineGlow 4s ease-in-out infinite;
        }

        @keyframes footerLineGlow {
            0%, 100% {
                opacity: 0.7;
                filter: blur(2px);
                transform: translateX(-50%) scaleX(1);
            }
            50% {
                opacity: 1;
                filter: blur(3px);
                transform: translateX(-50%) scaleX(1.1);
            }
        }

        .partners-footer-text {
            font-size: 2rem;
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
            font-weight: 900;
            margin-bottom: 30px;
            display: block;
            animation: gradientShift 8s ease-in-out infinite;
            letter-spacing: -0.02em;
            text-shadow: 0 0 80px rgba(139, 92, 246, 0.3);
        }

        @keyframes gradientShift {
            0%, 100% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
        }

        .neural-partners-cta {
            display: inline-flex;
            align-items: center;
            gap: 15px;
            padding: 22px 50px;
            background: linear-gradient(135deg,
                rgba(16, 185, 129, 1) 0%,
                rgba(5, 150, 105, 1) 50%,
                rgba(6, 182, 212, 1) 100%);
            color: #ffffff;
            font-size: 1.25rem;
            font-weight: 700;
            border-radius: 50px;
            text-decoration: none;
            position: relative;
            overflow: hidden;
            box-shadow:
                0 20px 50px rgba(16, 185, 129, 0.4),
                0 10px 25px rgba(6, 182, 212, 0.3),
                inset 0 2px 4px rgba(255, 255, 255, 0.3);
            transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .neural-partners-cta::before {
            content: '';
            position: absolute;
            inset: -200%;
            background:
                radial-gradient(circle 150px at 30% 40%, rgba(255, 255, 255, 0.4), transparent 50%),
                radial-gradient(circle 120px at 70% 60%, rgba(6, 182, 212, 0.6), transparent 50%);
            animation: partnerAmbient 10s ease-in-out infinite;
            pointer-events: none;
            z-index: 0;
        }

        .neural-partners-cta:hover {
            transform: translateY(-6px) scale(1.05);
            box-shadow:
                0 28px 70px rgba(16, 185, 129, 0.6),
                0 14px 35px rgba(6, 182, 212, 0.5),
                inset 0 2px 6px rgba(255, 255, 255, 0.4);
            border-color: rgba(255, 255, 255, 0.5);
        }

        .neural-partners-cta::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg,
                rgba(6, 182, 212, 0.8) 0%,
                rgba(16, 185, 129, 0.8) 100%);
            opacity: 0;
            transition: opacity 0.6s ease;
            z-index: 0;
        }

        .neural-partners-cta:hover::after {
            opacity: 1;
        }

        .neural-partners-cta i {
            font-size: 1.2rem;
            transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
            animation: iconPulse 3s ease-in-out infinite;
        }

        @keyframes iconPulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }

        .neural-partners-cta:hover i {
            transform: translateX(8px) rotate(15deg);
        }

        .neural-partners-cta span {
            transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative;
            z-index: 2;
            text-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
        }

        .neural-partners-cta:hover span {
            letter-spacing: 0.05em;
            text-shadow:
                0 5px 15px rgba(0, 0, 0, 0.4),
                0 0 30px rgba(16, 185, 129, 0.5);
        }

        @keyframes partnerAmbient {
            0%, 100% {
                transform: rotate(0deg) scale(1);
                opacity: 0.7;
            }
            33% {
                transform: rotate(120deg) scale(1.1);
                opacity: 1;
            }
            66% {
                transform: rotate(240deg) scale(0.9);
                opacity: 0.8;
            }
        }

        /* Enhanced Responsive Design for Neural Partners */
        @media (max-width: 1200px) {
            .neural-partner-item {
                width: 190px;
            }

            .partners-track {
                gap: 40px;
            }

            .partner-logo-container {
                padding: 30px;
                height: 130px;
            }

            .neural-partner-logo {
                max-width: 140px;
                max-height: 80px;
            }
        }

        @media (max-width: 1024px) {
            .neural-partners-section {
                padding: 20px 0 80px;
            }

            .partners-title {
                font-size: 3rem;
            }

            .neural-partner-item {
                width: 180px;
            }

            .partners-track {
                gap: 35px;
                animation: partnerScroll 25s linear infinite;
            }

            .partner-logo-container {
                padding: 28px;
                height: 120px;
            }

            .neural-partner-logo {
                max-width: 130px;
                max-height: 75px;
            }

            .neural-partners-grid {
                padding: 40px 0;
            }
        }

        @media (max-width: 768px) {
            .neural-partners-section {
                padding: 15px 0 60px;
            }

            .partners-header {
                margin-bottom: 60px;
            }

            .partners-title {
                font-size: 2.5rem;
                margin-bottom: 20px;
            }

            .partners-subtitle {
                font-size: 1.125rem;
            }

            .neural-partner-item {
                width: 160px;
            }

            .partners-track {
                gap: 30px;
                animation: partnerScroll 22s linear infinite;
            }

            .partner-logo-container {
                padding: 25px;
                height: 110px;
                border-radius: 20px;
            }

            .neural-partner-logo {
                max-width: 120px;
                max-height: 70px;
            }

            .neural-partners-grid {
                padding: 35px 0;
            }
        }

        @media (max-width: 640px) {
            .neural-partners-section {
                padding: 15px 0 50px;
            }

            .partners-header {
                margin-bottom: 50px;
            }

            .partners-title {
                font-size: 2rem;
            }

            .partners-subtitle {
                font-size: 1rem;
            }

            .neural-partner-item {
                width: 150px;
            }

            .partners-track {
                gap: 25px;
                animation: partnerScroll 20s linear infinite;
            }

            .partner-logo-container {
                padding: 22px;
                height: 105px;
                border-radius: 18px;
            }

            .neural-partner-logo {
                max-width: 110px;
                max-height: 65px;
            }

            .neural-partners-grid {
                padding: 30px 0;
            }
        }

        @media (max-width: 480px) {
            .neural-partners-section {
                padding: 10px 0 40px;
            }

            .partners-header {
                margin-bottom: 40px;
            }

            .partners-title {
                font-size: 1.75rem;
            }

            .partners-subtitle {
                font-size: 0.95rem;
            }

            .neural-partner-item {
                width: 140px;
            }

            .partners-track {
                gap: 20px;
                animation: partnerScroll 18s linear infinite;
            }

            .partner-logo-container {
                padding: 20px;
                height: 100px;
                border-radius: 16px;
            }

            .neural-partner-logo {
                max-width: 100px;
                max-height: 60px;
            }

            .neural-partners-grid {
                padding: 25px 0;
            }
        }

        @media (max-width: 375px) {
            .partners-title {
                font-size: 1.5rem;
            }

            .partners-subtitle {
                font-size: 0.875rem;
            }

            .neural-partner-item {
                width: 130px;
            }

            .partners-track {
                gap: 18px;
                animation: partnerScroll 16s linear infinite;
            }

            .partner-logo-container {
                padding: 18px;
                height: 95px;
                border-radius: 14px;
            }

            .neural-partner-logo {
                max-width: 90px;
                max-height: 55px;
            }

            .partners-footer-text {
                font-size: 1.5rem;
            }

            .neural-partners-cta {
                font-size: 1rem;
                padding: 18px 35px;
            }
        }
</style>

<!-- Neural Partners Section -->
<section class="neural-partners-section" id="neuralPartners">
    <div class="partners-container">
        <div class="partners-header">
            <h2 class="partners-title">Trusted by Industry Leaders</h2>
            <p class="partners-subtitle">Partnering with renowned organizations to deliver world-class AI education</p>
        </div>

        <div class="neural-partners-grid">
            <div class="partners-track">
                <div class="neural-partner-item" data-partner="1">
                    <div class="partner-logo-container">
                        <img src="<?php echo $CFG->wwwroot; ?>/pluginfile.php?file=%2F61%2Fblock_edoo_partners%2Fcontent%2F10-2.png" alt="Partner 1" class="neural-partner-logo" loading="lazy">
                    </div>
                </div>

                <div class="neural-partner-item" data-partner="2">
                    <div class="partner-logo-container">
                        <img src="<?php echo $CFG->wwwroot; ?>/pluginfile.php?file=%2F61%2Fblock_edoo_partners%2Fcontent%2F11-2.png" alt="Partner 2" class="neural-partner-logo" loading="lazy">
                    </div>
                </div>

                <div class="neural-partner-item" data-partner="3">
                    <div class="partner-logo-container">
                        <img src="<?php echo $CFG->wwwroot; ?>/pluginfile.php?file=%2F61%2Fblock_edoo_partners%2Fcontent%2F12-1.png" alt="Partner 3" class="neural-partner-logo" loading="lazy">
                    </div>
                </div>

                <div class="neural-partner-item" data-partner="4">
                    <div class="partner-logo-container">
                        <img src="<?php echo $CFG->wwwroot; ?>/pluginfile.php?file=%2F61%2Fblock_edoo_partners%2Fcontent%2F13-1.png" alt="Partner 4" class="neural-partner-logo" loading="lazy">
                    </div>
                </div>

                <div class="neural-partner-item" data-partner="5">
                    <div class="partner-logo-container">
                        <img src="<?php echo $CFG->wwwroot; ?>/pluginfile.php?file=%2F61%2Fblock_edoo_partners%2Fcontent%2F15-1.png" alt="Partner 5" class="neural-partner-logo" loading="lazy">
                    </div>
                </div>

                <div class="neural-partner-item" data-partner="6">
                    <div class="partner-logo-container">
                        <img src="<?php echo $CFG->wwwroot; ?>/pluginfile.php?file=%2F61%2Fblock_edoo_partners%2Fcontent%2F16.png" alt="Partner 6" class="neural-partner-logo" loading="lazy">
                    </div>
                </div>

                <div class="neural-partner-item" data-partner="7">
                    <div class="partner-logo-container">
                        <img src="<?php echo $CFG->wwwroot; ?>/pluginfile.php?file=%2F61%2Fblock_edoo_partners%2Fcontent%2F17-1.png" alt="Partner 7" class="neural-partner-logo" loading="lazy">
                    </div>
                </div>

                <div class="neural-partner-item" data-partner="8">
                    <div class="partner-logo-container">
                        <img src="<?php echo $CFG->wwwroot; ?>/pluginfile.php?file=%2F61%2Fblock_edoo_partners%2Fcontent%2F8-3.png" alt="Partner 8" class="neural-partner-logo" loading="lazy">
                    </div>
                </div>

                <div class="neural-partner-item" data-partner="9">
                    <div class="partner-logo-container">
                        <img src="<?php echo $CFG->wwwroot; ?>/pluginfile.php?file=%2F61%2Fblock_edoo_partners%2Fcontent%2F9-1.png" alt="Partner 9" class="neural-partner-logo" loading="lazy">
                    </div>
                </div>

                <div class="neural-partner-item" data-partner="10">
                    <div class="partner-logo-container">
                        <img src="<?php echo $CFG->wwwroot; ?>/pluginfile.php?file=%2F61%2Fblock_edoo_partners%2Fcontent%2F14-1.png" alt="Partner 10" class="neural-partner-logo" loading="lazy">
                    </div>
                </div>

                <!-- Duplicate set for seamless loop -->
                <div class="neural-partner-item" data-partner="1">
                    <div class="partner-logo-container">
                        <img src="<?php echo $CFG->wwwroot; ?>/pluginfile.php?file=%2F61%2Fblock_edoo_partners%2Fcontent%2F10-2.png" alt="Partner 1" class="neural-partner-logo" loading="lazy">
                    </div>
                </div>

                <div class="neural-partner-item" data-partner="2">
                    <div class="partner-logo-container">
                        <img src="<?php echo $CFG->wwwroot; ?>/pluginfile.php?file=%2F61%2Fblock_edoo_partners%2Fcontent%2F11-2.png" alt="Partner 2" class="neural-partner-logo" loading="lazy">
                    </div>
                </div>

                <div class="neural-partner-item" data-partner="3">
                    <div class="partner-logo-container">
                        <img src="<?php echo $CFG->wwwroot; ?>/pluginfile.php?file=%2F61%2Fblock_edoo_partners%2Fcontent%2F12-1.png" alt="Partner 3" class="neural-partner-logo" loading="lazy">
                    </div>
                </div>

                <div class="neural-partner-item" data-partner="4">
                    <div class="partner-logo-container">
                        <img src="<?php echo $CFG->wwwroot; ?>/pluginfile.php?file=%2F61%2Fblock_edoo_partners%2Fcontent%2F13-1.png" alt="Partner 4" class="neural-partner-logo" loading="lazy">
                    </div>
                </div>

                <div class="neural-partner-item" data-partner="5">
                    <div class="partner-logo-container">
                        <img src="<?php echo $CFG->wwwroot; ?>/pluginfile.php?file=%2F61%2Fblock_edoo_partners%2Fcontent%2F15-1.png" alt="Partner 5" class="neural-partner-logo" loading="lazy">
                    </div>
                </div>
            </div>
        </div>

        <div class="partners-footer">
            <p class="partners-footer-text">Join our growing network of educational partners</p>
            <a href="#contact" class="neural-partners-cta">
                <i class="fas fa-handshake"></i>
                <span>Become a Partner</span>
            </a>
        </div>
    </div>
</section>
