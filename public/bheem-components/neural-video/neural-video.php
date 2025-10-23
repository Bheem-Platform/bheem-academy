<?php
defined('MOODLE_INTERNAL') || die();
global $CFG;
?>

<style>
    .neural-video-section {
        padding: 50px 0 60px;
        position: relative;
        background:
            linear-gradient(180deg,
                #ffffff 0%,
                #fafbfc 20%,
                #f8fafc 50%,
                #fafbfc 80%,
                #ffffff 100%);
        overflow: hidden;
        isolation: isolate;
        opacity: 0;
        transform: translateY(80px) scale(0.95);
        transition: opacity 1.5s cubic-bezier(0.16, 1, 0.3, 1),
                    transform 1.5s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .neural-video-section.animate-in {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

    /* ==========================
       MOTION GRAPHICS ANIMATIONS
       ========================== */

    /* Decorative Line Animation - Width expand */
    .video-header::before {
        width: 0;
        transition: width 0.8s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .neural-video-section.animate-in .video-header::before {
        width: 120px;
        transition-delay: 0.2s;
    }

    /* Title Animation - 3D Slide with perspective */
    .video-title {
        opacity: 0;
        transform: translateY(60px) rotateX(45deg);
        transform-style: preserve-3d;
        perspective: 1000px;
        transition: all 1s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .neural-video-section.animate-in .video-title {
        opacity: 1;
        transform: translateY(0) rotateX(0deg);
        transition-delay: 0.4s;
    }

    /* Subtitle Animation - Fade up with scale */
    .video-subtitle {
        opacity: 0;
        transform: translateY(40px) scale(0.9);
        transition: all 0.9s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .neural-video-section.animate-in .video-subtitle {
        opacity: 1;
        transform: translateY(0) scale(1);
        transition-delay: 0.6s;
    }

    /* Video Player Wrapper Animation - Scale and lift */
    .video-player-wrapper {
        opacity: 0;
        transform: translateY(60px) scale(0.9);
        transition: all 1.2s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .neural-video-section.animate-in .video-player-wrapper {
        opacity: 1;
        transform: translateY(0) scale(1);
        transition-delay: 0.8s;
    }

    /* Play Button Animation - Pop with bounce */
    .video-play-button {
        opacity: 0;
        transform: translate(-50%, -50%) scale(0.4) rotate(-45deg);
        transition: all 1s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .neural-video-section.animate-in .video-play-button {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1) rotate(0deg);
        transition-delay: 1.2s;
    }

    /* Video Info Container Animation - Slide up */
    .video-info {
        opacity: 0;
        transform: translateY(50px);
        transition: all 1s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .neural-video-section.animate-in .video-info {
        opacity: 1;
        transform: translateY(0);
        transition-delay: 1.4s;
    }

    /* Video Info Items - Staggered entrance */
    .video-info-item {
        opacity: 0;
        transform: scale(0.8) translateY(30px);
        transition: all 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .neural-video-section.animate-in .video-info-item:nth-child(1) {
        opacity: 1;
        transform: scale(1) translateY(0);
        transition-delay: 1.6s;
    }

    .neural-video-section.animate-in .video-info-item:nth-child(2) {
        opacity: 1;
        transform: scale(1) translateY(0);
        transition-delay: 1.75s;
    }

    .neural-video-section.animate-in .video-info-item:nth-child(3) {
        opacity: 1;
        transform: scale(1) translateY(0);
        transition-delay: 1.9s;
    }

    /* Video Info Icons - Rotation entrance */
    .video-info-icon {
        transform: rotate(-180deg) scale(0.5);
        transition: all 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .neural-video-section.animate-in .video-info-item:nth-child(1) .video-info-icon {
        transform: rotate(0deg) scale(1);
        transition-delay: 1.7s;
    }

    .neural-video-section.animate-in .video-info-item:nth-child(2) .video-info-icon {
        transform: rotate(0deg) scale(1);
        transition-delay: 1.85s;
    }

    .neural-video-section.animate-in .video-info-item:nth-child(3) .video-info-icon {
        transform: rotate(0deg) scale(1);
        transition-delay: 2s;
    }

    /* GPU Acceleration for smooth animations */
    .video-header::before,
    .video-title,
    .video-subtitle,
    .video-player-wrapper,
    .video-play-button,
    .video-info,
    .video-info-item,
    .video-info-icon {
        will-change: transform, opacity;
    }

    .neural-video-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(ellipse 120% 90% at 50% 20%, rgba(139, 92, 246, 0.1) 0%, transparent 55%),
            radial-gradient(ellipse 120% 90% at 50% 80%, rgba(6, 182, 212, 0.08) 0%, transparent 55%),
            radial-gradient(circle at 80% 50%, rgba(236, 72, 153, 0.06) 0%, transparent 50%);
        pointer-events: none;
        z-index: 1;
        animation: videoAmbient 20s ease-in-out infinite;
    }

    @keyframes videoAmbient {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.7; }
    }

    .video-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 20px;
        position: relative;
        z-index: 2;
    }

    .video-header {
        text-align: center;
        margin-bottom: 60px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
    }

    .video-header::before {
        content: '';
        width: 120px;
        height: 5px;
        background: linear-gradient(90deg,
            transparent 0%,
            #8b5cf6 30%,
            #ec4899 70%,
            transparent 100%);
        border-radius: 10px;
        opacity: 0.5;
    }

    .video-title {
        font-size: 3.5rem;
        font-weight: 900;
        margin: 0;
        background: linear-gradient(135deg,
            #8b5cf6 0%,
            #a855f7 25%,
            #ec4899 50%,
            #06b6d4 75%,
            #10b981 100%);
        background-size: 200% 200%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        line-height: 1.2;
        animation: gradientShift 8s ease-in-out infinite;
    }

    .video-subtitle {
        font-size: 1.3rem;
        color: #475569;
        margin: 0;
        max-width: 700px;
        line-height: 1.6;
        font-weight: 500;
    }

    .video-player-wrapper {
        position: relative;
        max-width: 1000px;
        margin: 0 auto;
        border-radius: 32px;
        overflow: hidden;
        box-shadow:
            0 30px 80px rgba(139, 92, 246, 0.25),
            0 15px 40px rgba(236, 72, 153, 0.2),
            0 8px 20px rgba(100, 116, 139, 0.15),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
        border: 3px solid rgba(255, 255, 255, 0.6);
        background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
        transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .video-player-wrapper::before {
        content: '';
        position: absolute;
        inset: -3px;
        background: linear-gradient(135deg,
            rgba(139, 92, 246, 0.5) 0%,
            rgba(236, 72, 153, 0.5) 50%,
            rgba(6, 182, 212, 0.5) 100%);
        border-radius: 32px;
        opacity: 0;
        transition: opacity 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: -1;
        filter: blur(15px);
    }

    .video-player-wrapper:hover {
        transform: translateY(-10px);
        box-shadow:
            0 40px 100px rgba(139, 92, 246, 0.35),
            0 20px 50px rgba(236, 72, 153, 0.3),
            0 10px 25px rgba(100, 116, 139, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 1);
        border-color: rgba(255, 255, 255, 0.8);
    }

    .video-player-wrapper:hover::before {
        opacity: 0.8;
    }

    .video-aspect-ratio {
        position: relative;
        width: 100%;
        padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
        background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
    }

    .video-iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
        border-radius: 28px;
    }

    .video-thumbnail {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 28px;
    }

    .video-play-button {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow:
            0 15px 40px rgba(139, 92, 246, 0.5),
            0 8px 20px rgba(236, 72, 153, 0.4),
            inset 0 2px 0 rgba(255, 255, 255, 0.3);
        border: 4px solid rgba(255, 255, 255, 0.9);
        z-index: 2;
    }

    .video-play-button::before {
        content: '';
        position: absolute;
        inset: -20px;
        border: 3px solid rgba(139, 92, 246, 0.4);
        border-radius: 50%;
        animation: playPulse 2s ease-in-out infinite;
    }

    @keyframes playPulse {
        0%, 100% {
            transform: scale(1);
            opacity: 0.8;
        }
        50% {
            transform: scale(1.2);
            opacity: 0;
        }
    }

    .video-play-button:hover {
        transform: translate(-50%, -50%) scale(1.15);
        box-shadow:
            0 20px 50px rgba(139, 92, 246, 0.6),
            0 10px 25px rgba(236, 72, 153, 0.5),
            inset 0 2px 0 rgba(255, 255, 255, 0.4);
    }

    .video-play-icon {
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 18px 0 18px 30px;
        border-color: transparent transparent transparent #ffffff;
        margin-left: 6px;
    }

    .video-info {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 40px;
        margin-top: 50px;
        padding: 30px;
        background: linear-gradient(135deg,
            rgba(255, 255, 255, 0.8) 0%,
            rgba(248, 250, 252, 0.8) 100%);
        border-radius: 24px;
        backdrop-filter: blur(10px);
        box-shadow:
            0 10px 30px rgba(100, 116, 139, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 1);
        border: 1.5px solid rgba(226, 232, 240, 0.6);
    }

    .video-info-item {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .video-info-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.3rem;
        box-shadow:
            0 8px 20px rgba(139, 92, 246, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
    }

    .video-info-text {
        display: flex;
        flex-direction: column;
    }

    .video-info-label {
        font-size: 0.875rem;
        color: #64748b;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .video-info-value {
        font-size: 1.25rem;
        color: #1e293b;
        font-weight: 700;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .video-title {
            font-size: 3rem;
        }

        .video-subtitle {
            font-size: 1.2rem;
        }

        .video-player-wrapper {
            border-radius: 28px;
        }

        .video-play-button {
            width: 90px;
            height: 90px;
        }
    }

    @media (max-width: 768px) {
        .neural-video-section {
            padding: 40px 0 45px;
        }

        .video-header {
            margin-bottom: 50px;
        }

        .video-title {
            font-size: 2.5rem;
        }

        .video-subtitle {
            font-size: 1.1rem;
        }

        .video-player-wrapper {
            border-radius: 24px;
        }

        .video-play-button {
            width: 80px;
            height: 80px;
        }

        .video-play-icon {
            border-width: 15px 0 15px 25px;
        }

        .video-info {
            flex-direction: column;
            gap: 25px;
            margin-top: 40px;
            padding: 25px;
        }

        .video-info-item {
            width: 100%;
        }
    }

    @media (max-width: 640px) {
        .neural-video-section {
            padding: 30px 0 35px;
        }

        .video-title {
            font-size: 2rem;
        }

        .video-subtitle {
            font-size: 1rem;
        }

        .video-player-wrapper {
            border-radius: 20px;
        }

        .video-play-button {
            width: 70px;
            height: 70px;
        }

        .video-play-icon {
            border-width: 12px 0 12px 20px;
        }

        .video-info {
            padding: 20px;
            gap: 20px;
        }

        .video-info-icon {
            width: 45px;
            height: 45px;
            font-size: 1.1rem;
        }

        .video-info-value {
            font-size: 1.1rem;
        }
    }

    @media (max-width: 480px) {
        .video-title {
            font-size: 1.75rem;
        }

        .video-subtitle {
            font-size: 0.95rem;
        }

        .video-play-button {
            width: 60px;
            height: 60px;
        }

        .video-play-icon {
            border-width: 10px 0 10px 16px;
            margin-left: 4px;
        }
    }

    @media (max-width: 375px) {
        .neural-video-section {
            padding: 25px 0 30px;
        }

        .video-title {
            font-size: 1.6rem;
        }

        .video-subtitle {
            font-size: 0.9rem;
        }

        .video-info {
            padding: 18px;
        }
    }
</style>

<section class="neural-video-section" id="neuralVideo">
    <div class="video-container">
        <div class="video-header">
            <h2 class="video-title">Discover Bheem Academy</h2>
            <p class="video-subtitle">Watch our introduction video to learn how we're revolutionizing AI education for all ages</p>
        </div>

        <div class="video-player-wrapper">
            <div class="video-aspect-ratio">
                <img src="https://i.ibb.co/xKLr31h7/videothumbnail.png"
                     alt="Bheem Academy Video"
                     class="video-thumbnail"
                     id="videoThumbnail">
                <div class="video-play-button" id="videoPlayButton">
                    <div class="video-play-icon"></div>
                </div>
                <iframe id="videoIframe"
                        class="video-iframe"
                        src=""
                        title="Bheem Academy Introduction"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                        style="display: none;">
                </iframe>
            </div>
        </div>

        <div class="video-info">
            <div class="video-info-item">
                <div class="video-info-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="video-info-text">
                    <span class="video-info-label">Duration</span>
                    <span class="video-info-value">3:45 min</span>
                </div>
            </div>
            <div class="video-info-item">
                <div class="video-info-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="video-info-text">
                    <span class="video-info-label">Students</span>
                    <span class="video-info-value">10,000+</span>
                </div>
            </div>
            <div class="video-info-item">
                <div class="video-info-icon">
                    <i class="fas fa-star"></i>
                </div>
                <div class="video-info-text">
                    <span class="video-info-label">Rating</span>
                    <span class="video-info-value">4.9/5.0</span>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Video Player Functionality
    document.addEventListener('DOMContentLoaded', function() {
        const videoPlayButton = document.getElementById('videoPlayButton');
        const videoThumbnail = document.getElementById('videoThumbnail');
        const videoIframe = document.getElementById('videoIframe');
        const videoURL = 'https://www.youtube.com/embed/tn2ez7TpYzQ?autoplay=1&rel=0';

        if (videoPlayButton && videoThumbnail && videoIframe) {
            // Play button click handler
            videoPlayButton.addEventListener('click', function() {
                playVideo();
            });

            // Thumbnail click handler
            videoThumbnail.addEventListener('click', function() {
                playVideo();
            });

            function playVideo() {
                // Hide thumbnail and play button
                videoThumbnail.style.display = 'none';
                videoPlayButton.style.display = 'none';

                // Show and load iframe
                videoIframe.style.display = 'block';
                videoIframe.src = videoURL;

                console.log('%c▶️ Video Playing', 'background: linear-gradient(135deg, #8b5cf6, #ec4899); color: white; padding: 6px 12px; border-radius: 4px; font-weight: bold;');
            }
        }

        // Scroll Animation - Intersection Observer
        const videoSection = document.querySelector('.neural-video-section');

        if (videoSection) {
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.15 // Trigger when 15% of section is visible
            };

            const observerCallback = (entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // Add animate-in class when section enters viewport
                        entry.target.classList.add('animate-in');
                        console.log('%c🎬 Discover Bheem Academy animations triggered', 'background: linear-gradient(135deg, #8b5cf6, #06b6d4); color: white; padding: 6px 12px; border-radius: 4px; font-weight: bold;');
                    } else {
                        // Remove animate-in class when section leaves viewport
                        entry.target.classList.remove('animate-in');
                    }
                });
            };

            const observer = new IntersectionObserver(observerCallback, observerOptions);
            observer.observe(videoSection);
        }
    });
</script>
