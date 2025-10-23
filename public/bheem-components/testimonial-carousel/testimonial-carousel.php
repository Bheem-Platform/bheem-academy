<?php
/**
 * Testimonial Carousel Component
 *
 * A three-column carousel displaying student testimonials with YouTube Shorts videos
 * Features: Manual navigation, smooth 2s transitions, center-pop effect, no blur
 *
 * Usage: edoo_load_component('testimonial-carousel');
 */
?>

<style>
/* ================================================
   TESTIMONIAL CAROUSEL - CENTER-FOCUSED DESIGN
   Premium carousel with center-pop animation
   ================================================ */

/* Main Section Container */
.testimonial-carousel-section {
    position: relative;
    padding: 40px 0 60px;
    margin: 0;
    overflow: hidden;
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 25%, #0f172a 50%, #1e293b 75%, #0f172a 100%);
    background-size: 200% 200%;
    animation: darkGradientShift 15s ease infinite;
    opacity: 0;
    transform: translateY(50px);
    transition: opacity 1s ease-out, transform 1s ease-out;
    width: 100%;
    max-width: 100vw;
    box-sizing: border-box;
}

.testimonial-carousel-section.animate-in {
    opacity: 1;
    transform: translateY(0);
}

@keyframes darkGradientShift {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

/* Container */
.testimonial-container {
    position: relative;
    z-index: 10;
    max-width: 100%;
    width: 100%;
    margin: 0 auto;
    padding: 0;
    box-sizing: border-box;
}

/* Header Section */
.testimonial-header {
    text-align: center;
    margin-bottom: 40px;
}

.testimonial-title {
    font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 900;
    line-height: 1.2;
    margin: 0 0 16px 0;
    letter-spacing: -0.02em;
    position: relative;
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

.testimonial-subtitle {
    font-family: 'Inter', 'Manrope', sans-serif;
    font-size: 1.1rem;
    font-weight: 400;
    color: rgba(255, 255, 255, 0.8);
    max-width: 600px;
    margin: 0 auto;
    letter-spacing: 0.01em;
}

/* ================================================
   CAROUSEL WRAPPER - THREE COLUMN LAYOUT
   ================================================ */
.testimonial-carousel-wrapper {
    position: relative;
    width: 100%;
    max-width: 1400px;
    margin: 0 auto;
    padding: 60px 80px;
    perspective: 2000px;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 600px;
    box-sizing: border-box;
    overflow: visible;
}

/* Carousel Track - Three Column Grid */
.testimonial-carousel-track {
    display: grid;
    grid-template-columns: 1fr 1.3fr 1fr;
    gap: 40px;
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    align-items: center;
    justify-items: center;
    transition: none;
    position: relative;
}

.testimonial-carousel-track .testimonial-slide {
    margin-right: 0;
}

.testimonial-carousel-track .testimonial-slide:last-child {
    margin-right: 0;
}

/* ================================================
   TESTIMONIAL SLIDES - THREE COLUMN LAYOUT
   ================================================ */
.testimonial-slide {
    width: 100%;
    max-width: 340px;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px) saturate(180%);
    border-radius: 24px;
    border: 1px solid rgba(168, 85, 247, 0.15);
    padding: 0;
    overflow: hidden;
    transition: all 2s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    transform: scale(0.85) translateY(20px);
    opacity: 0.7;
    filter: none;
    box-shadow:
        0 10px 30px rgba(0, 0, 0, 0.08),
        0 0 0 1px rgba(168, 85, 247, 0.05) inset;
    position: relative;
    grid-column: auto;
    display: none;
}

/* Accent Border Glow */
.testimonial-slide::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #6366f1, #a855f7, #ec4899);
    opacity: 0;
    transition: opacity 0.4s ease;
}

/* LEFT SLIDE - Visible on Left */
.testimonial-slide.left {
    display: block;
    grid-column: 1;
    transform: scale(0.85) translateY(20px);
    opacity: 0.7;
    filter: none;
    transition: all 2s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

/* CENTER SLIDE - POP UP EFFECT (No Blur) */
.testimonial-slide.center {
    display: block;
    grid-column: 2;
    transform: scale(1.12) translateY(-35px);
    opacity: 1;
    filter: none;
    z-index: 10;
    background: rgba(255, 255, 255, 1);
    box-shadow:
        0 0 0 2px rgba(168, 85, 247, 0.3),
        0 20px 60px rgba(0, 0, 0, 0.12),
        0 30px 80px rgba(168, 85, 247, 0.15),
        0 0 80px rgba(236, 72, 153, 0.1);
    border-color: rgba(168, 85, 247, 0.3);
    border-width: 2px;
    transition: all 2s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.testimonial-slide.center::before {
    opacity: 1;
}

/* RIGHT SLIDE - Visible on Right */
.testimonial-slide.right {
    display: block;
    grid-column: 3;
    transform: scale(0.85) translateY(20px);
    opacity: 0.7;
    filter: none;
    transition: all 2s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

/* SIDE SLIDES - No Blur */
.testimonial-slide.side {
    display: none;
}

/* FAR SLIDES - HIDDEN */
.testimonial-slide.hidden {
    display: none;
    pointer-events: none;
}

/* Hover Effect on Center Slide */
.testimonial-slide.center:hover {
    transform: scale(1.15) translateY(-38px);
    box-shadow:
        0 0 0 2px rgba(168, 85, 247, 0.4),
        0 25px 70px rgba(0, 0, 0, 0.15),
        0 35px 90px rgba(168, 85, 247, 0.2),
        0 0 100px rgba(236, 72, 153, 0.15);
}

/* Hover Effects on Side Slides */
.testimonial-slide.left:hover,
.testimonial-slide.right:hover {
    transform: scale(0.88) translateY(15px);
    opacity: 0.85;
    border-color: rgba(168, 85, 247, 0.25);
    box-shadow:
        0 12px 35px rgba(0, 0, 0, 0.1),
        0 0 0 1px rgba(168, 85, 247, 0.08) inset;
}

/* ================================================
   VIDEO CONTAINER - RESPONSIVE ASPECT RATIO
   ================================================ */
.testimonial-video-container {
    position: relative;
    width: 100%;
    padding-bottom: 177.78%; /* 9:16 aspect ratio for YouTube Shorts */
    overflow: hidden;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-radius: 24px 24px 0 0;
    box-sizing: border-box;
}

/* Modern browsers aspect ratio support */
@supports (aspect-ratio: 9 / 16) {
    .testimonial-video-container {
        padding-bottom: 0;
        aspect-ratio: 9 / 16;
        height: auto;
    }
}

.testimonial-video-container::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 60px;
    background: linear-gradient(to top, rgba(255, 255, 255, 0.95), transparent);
    pointer-events: none;
    z-index: 1;
}

.testimonial-video-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
    border-radius: 24px 24px 0 0;
    transition: transform 0.3s ease;
}

.testimonial-slide.center .testimonial-video-container iframe {
    transform: scale(1);
}

/* ================================================
   TESTIMONIAL CONTENT
   ================================================ */
.testimonial-content {
    padding: 24px 20px;
    background: rgba(15, 23, 42, 0.6);
    backdrop-filter: blur(10px);
    text-align: center;
    position: relative;
    border-top: 1px solid rgba(59, 130, 246, 0.1);
}

/* Rating Stars */
.testimonial-rating {
    display: flex;
    justify-content: center;
    gap: 6px;
    margin-bottom: 14px;
}

.testimonial-rating i {
    color: #fbbf24;
    font-size: 1.1rem;
    filter: drop-shadow(0 2px 4px rgba(251, 191, 36, 0.4));
    transition: transform 0.3s ease;
}

.testimonial-slide.center .testimonial-rating i {
    animation: starPulse 2s ease-in-out infinite;
}

.testimonial-rating i:nth-child(1) { animation-delay: 0s; }
.testimonial-rating i:nth-child(2) { animation-delay: 0.1s; }
.testimonial-rating i:nth-child(3) { animation-delay: 0.2s; }
.testimonial-rating i:nth-child(4) { animation-delay: 0.3s; }
.testimonial-rating i:nth-child(5) { animation-delay: 0.4s; }

@keyframes starPulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.15); }
}

/* Testimonial Text */
.testimonial-text {
    font-family: 'Inter', 'Manrope', sans-serif;
    font-size: 1rem;
    font-weight: 500;
    color: rgba(255, 255, 255, 0.85);
    line-height: 1.6;
    margin: 0;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    letter-spacing: 0.01em;
}

/* ================================================
   NAVIGATION ARROWS
   ================================================ */
.testimonial-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 56px;
    height: 56px;
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.2) 0%, rgba(139, 92, 246, 0.2) 100%);
    backdrop-filter: blur(20px);
    border: 1.5px solid rgba(59, 130, 246, 0.4);
    border-radius: 50%;
    color: #ffffff;
    font-size: 1.4rem;
    cursor: pointer;
    transition: all 0.35s cubic-bezier(0.23, 1, 0.32, 1);
    z-index: 100;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow:
        0 8px 24px rgba(0, 0, 0, 0.3),
        0 0 0 1px rgba(59, 130, 246, 0.2) inset;
}

.testimonial-prev {
    left: 30px;
}

.testimonial-next {
    right: 30px;
}

.testimonial-nav:hover {
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.35) 0%, rgba(139, 92, 246, 0.35) 100%);
    border-color: rgba(59, 130, 246, 0.6);
    transform: translateY(-50%) scale(1.12);
    box-shadow:
        0 12px 36px rgba(0, 0, 0, 0.4),
        0 0 48px rgba(59, 130, 246, 0.4),
        0 0 0 1px rgba(59, 130, 246, 0.3) inset;
}

.testimonial-nav:active {
    transform: translateY(-50%) scale(0.98);
}

/* ================================================
   DOTS NAVIGATION
   ================================================ */
.testimonial-dots {
    display: flex;
    justify-content: center;
    gap: 12px;
    margin-top: 50px;
    padding-bottom: 20px;
}

.testimonial-dot {
    width: 11px;
    height: 11px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    border: 2px solid rgba(59, 130, 246, 0.3);
    cursor: pointer;
    transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
    padding: 0;
}

.testimonial-dot:hover {
    background: rgba(59, 130, 246, 0.4);
    border-color: rgba(59, 130, 246, 0.6);
    transform: scale(1.2);
}

.testimonial-dot.active {
    background: linear-gradient(135deg, #3b82f6, #8b5cf6);
    border-color: rgba(139, 92, 246, 0.8);
    transform: scale(1.35);
    box-shadow: 0 0 20px rgba(59, 130, 246, 0.6);
}

/* ================================================
   RESPONSIVE DESIGN - COMPREHENSIVE BREAKPOINTS
   ================================================ */

/* Base Mobile-First Optimizations */
.testimonial-carousel-section *,
.testimonial-carousel-section *::before,
.testimonial-carousel-section *::after {
    box-sizing: border-box;
}

/* ================================================
   MOBILE PERFORMANCE OPTIMIZATIONS
   Disable heavy animations to prevent overload/heating
   ================================================ */
@media (max-width: 1023px) {
    /* Disable background gradient animation on mobile */
    .testimonial-carousel-section {
        animation: none !important;
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
        background-size: 100% 100%;
        overflow-x: hidden;
        max-width: 100vw;
    }

    /* Disable title gradient animation on mobile */
    .testimonial-title {
        animation: none !important;
        background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 50%, #06b6d4 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-shadow: none;
    }

    /* Disable star pulse animation on mobile */
    .testimonial-slide.center .testimonial-rating i {
        animation: none !important;
    }

    /* Remove expensive backdrop-filter on mobile (causes heating on iOS) */
    .testimonial-slide {
        backdrop-filter: none !important;
        background: rgba(255, 255, 255, 1);
    }

    .testimonial-content {
        backdrop-filter: none !important;
        background: rgba(15, 23, 42, 0.95);
    }

    .testimonial-nav {
        backdrop-filter: none !important;
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.9) 0%, rgba(139, 92, 246, 0.9) 100%);
    }

    /* Simplify box shadows on mobile to reduce repaints */
    .testimonial-slide {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08) !important;
    }

    .testimonial-slide.center {
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12), 0 0 0 2px rgba(168, 85, 247, 0.3) !important;
    }

    .testimonial-nav {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2) !important;
    }

    /* Remove will-change on mobile to reduce memory usage */
    .testimonial-slide {
        will-change: auto !important;
    }

    /* Faster transitions on mobile */
    .testimonial-slide {
        transition: all 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94) !important;
    }

    .testimonial-slide.center {
        transition: all 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94) !important;
    }

    .testimonial-slide.left,
    .testimonial-slide.right {
        transition: all 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94) !important;
    }

    /* Disable hover effects on mobile to prevent unnecessary repaints */
    .testimonial-slide.center:hover {
        transform: scale(1.12) translateY(-35px) !important;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12), 0 0 0 2px rgba(168, 85, 247, 0.3) !important;
    }

    .testimonial-slide.left:hover,
    .testimonial-slide.right:hover {
        transform: scale(0.85) translateY(20px) !important;
        opacity: 0.7 !important;
    }

    .testimonial-nav:hover {
        transform: translateY(-50%) !important;
    }

    body {
        overflow-x: hidden;
    }
}

/* Large Desktop (1920px and above) */
@media (min-width: 1920px) {
    .testimonial-carousel-wrapper {
        max-width: 1600px;
        padding: 80px 100px;
        min-height: 700px;
    }

    .testimonial-slide {
        max-width: 380px;
    }

    .testimonial-slide.center {
        transform: scale(1.15) translateY(-40px);
    }

    .testimonial-title {
        font-size: 3.5rem;
    }

    .testimonial-subtitle {
        font-size: 1.25rem;
    }
}

/* Desktop (1440px - 1919px) */
@media (min-width: 1440px) and (max-width: 1919px) {
    .testimonial-carousel-wrapper {
        max-width: 1400px;
        padding: 70px 90px;
        min-height: 650px;
    }

    .testimonial-slide {
        max-width: 360px;
    }

    .testimonial-title {
        font-size: 3rem;
    }
}

/* Laptop Large (1200px - 1439px) */
@media (min-width: 1200px) and (max-width: 1439px) {
    .testimonial-carousel-wrapper {
        max-width: 1200px;
        padding: 60px 70px;
        min-height: 600px;
    }

    .testimonial-slide {
        max-width: 320px;
    }

    .testimonial-carousel-track {
        grid-template-columns: 1fr 1.25fr 1fr;
        gap: 35px;
    }
}

/* Laptop Standard (1024px - 1199px) */
@media (min-width: 1024px) and (max-width: 1199px) {
    .testimonial-carousel-section {
        padding: 50px 0 55px;
    }

    .testimonial-carousel-wrapper {
        padding: 50px 60px;
        min-height: 560px;
        max-width: 1100px;
    }

    .testimonial-carousel-track {
        grid-template-columns: 0.95fr 1.35fr 0.95fr;
        gap: 32px;
        max-width: 1000px;
    }

    .testimonial-slide {
        max-width: 290px;
        transition: all 1.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .testimonial-slide.center {
        transform: scale(1.1) translateY(-28px);
        transition: all 1.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .testimonial-slide.left,
    .testimonial-slide.right {
        transform: scale(0.83) translateY(18px);
        transition: all 1.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .testimonial-nav {
        width: 48px;
        height: 48px;
        font-size: 1.25rem;
    }

    .testimonial-prev {
        left: 25px;
    }

    .testimonial-next {
        right: 25px;
    }

    .testimonial-title {
        font-size: 2.5rem;
    }
}

/* Tablet Landscape (900px - 1023px) */
@media (min-width: 900px) and (max-width: 1023px) {
    .testimonial-carousel-section {
        padding: 45px 0 50px;
    }

    .testimonial-carousel-wrapper {
        padding: 45px 50px;
        min-height: 540px;
    }

    .testimonial-carousel-track {
        grid-template-columns: 0.9fr 1.4fr 0.9fr;
        gap: 28px;
    }

    .testimonial-slide {
        max-width: 270px;
        transition: all 1.7s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .testimonial-slide.center {
        transform: scale(1.08) translateY(-24px);
        transition: all 1.7s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .testimonial-slide.left,
    .testimonial-slide.right {
        transform: scale(0.8) translateY(16px);
        transition: all 1.7s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .testimonial-nav {
        width: 46px;
        height: 46px;
        font-size: 1.2rem;
    }

    .testimonial-prev {
        left: 22px;
    }

    .testimonial-next {
        right: 22px;
    }
}

/* Tablet Portrait (768px - 899px) */
@media (min-width: 768px) and (max-width: 899px) {
    .testimonial-carousel-section {
        padding: 42px 0 48px;
    }

    .testimonial-carousel-wrapper {
        padding: 40px 40px;
        min-height: 520px;
    }

    .testimonial-carousel-track {
        grid-template-columns: 0.85fr 1.45fr 0.85fr;
        gap: 25px;
    }

    .testimonial-slide {
        max-width: 250px;
        transition: all 1.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .testimonial-slide.center {
        transform: scale(1.06) translateY(-22px);
        transition: all 1.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .testimonial-slide.left,
    .testimonial-slide.right {
        transform: scale(0.78) translateY(15px);
        transition: all 1.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .testimonial-nav {
        width: 44px;
        height: 44px;
        font-size: 1.15rem;
    }

    .testimonial-prev {
        left: 18px;
    }

    .testimonial-next {
        right: 18px;
    }

    .testimonial-title {
        font-size: 2.2rem;
    }

    .testimonial-subtitle {
        font-size: 1rem;
    }

    .testimonial-content {
        padding: 18px;
    }

    .testimonial-text {
        font-size: 0.95rem;
    }
}

/* Mobile Landscape Large (640px - 767px) */
@media (min-width: 640px) and (max-width: 767px) {
    .testimonial-carousel-section {
        padding: 38px 0 45px;
    }

    .testimonial-carousel-wrapper {
        padding: 35px 35px;
        min-height: 480px;
    }

    .testimonial-carousel-track {
        grid-template-columns: 0.8fr 1.5fr 0.8fr;
        gap: 22px;
    }

    .testimonial-slide {
        max-width: 230px;
        transition: all 1.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .testimonial-slide.center {
        transform: scale(1.04) translateY(-20px);
        transition: all 1.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .testimonial-slide.left,
    .testimonial-slide.right {
        transform: scale(0.76) translateY(14px);
        transition: all 1.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .testimonial-nav {
        width: 42px;
        height: 42px;
        font-size: 1.1rem;
    }

    .testimonial-prev {
        left: 16px;
    }

    .testimonial-next {
        right: 16px;
    }

    .testimonial-title {
        font-size: 2rem;
    }

    .testimonial-subtitle {
        font-size: 0.95rem;
    }

    .testimonial-content {
        padding: 16px;
    }

    .testimonial-text {
        font-size: 0.9rem;
    }

    .testimonial-header {
        margin-bottom: 32px;
        padding: 0 20px;
    }
}

/* Mobile Landscape Medium (540px - 639px) */
@media (min-width: 540px) and (max-width: 639px) {
    .testimonial-carousel-section {
        padding: 36px 0 42px;
    }

    .testimonial-carousel-wrapper {
        padding: 32px 28px;
        min-height: 460px;
    }

    .testimonial-carousel-track {
        grid-template-columns: 0.75fr 1.55fr 0.75fr;
        gap: 20px;
    }

    .testimonial-slide {
        max-width: 210px;
        transition: all 1.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .testimonial-slide.center {
        transform: scale(1.02) translateY(-18px);
        transition: all 1.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .testimonial-slide.left,
    .testimonial-slide.right {
        transform: scale(0.74) translateY(13px);
        transition: all 1.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .testimonial-nav {
        width: 40px;
        height: 40px;
        font-size: 1.05rem;
    }

    .testimonial-prev {
        left: 14px;
    }

    .testimonial-next {
        right: 14px;
    }

    .testimonial-title {
        font-size: 1.85rem;
    }

    .testimonial-subtitle {
        font-size: 0.92rem;
    }

    .testimonial-content {
        padding: 15px;
    }

    .testimonial-text {
        font-size: 0.88rem;
    }

    .testimonial-rating i {
        font-size: 0.95rem;
    }
}

/* Mobile Portrait Large (480px - 539px) */
@media (min-width: 480px) and (max-width: 539px) {
    .testimonial-carousel-section {
        padding: 34px 0 40px;
    }

    .testimonial-carousel-wrapper {
        padding: 28px 22px;
        min-height: 440px;
    }

    .testimonial-carousel-track {
        grid-template-columns: 0.7fr 1.6fr 0.7fr;
        gap: 18px;
    }

    .testimonial-slide {
        max-width: 195px;
        transition: all 1.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .testimonial-slide.center {
        transform: scale(1) translateY(-16px);
        transition: all 1.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .testimonial-slide.left,
    .testimonial-slide.right {
        transform: scale(0.72) translateY(12px);
        transition: all 1.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .testimonial-nav {
        width: 38px;
        height: 38px;
        font-size: 1rem;
    }

    .testimonial-prev {
        left: 12px;
    }

    .testimonial-next {
        right: 12px;
    }

    .testimonial-title {
        font-size: 1.75rem;
    }

    .testimonial-subtitle {
        font-size: 0.9rem;
    }

    .testimonial-content {
        padding: 14px;
    }

    .testimonial-text {
        font-size: 0.85rem;
    }

    .testimonial-rating i {
        font-size: 0.9rem;
    }

    .testimonial-dots {
        margin-top: 22px;
        gap: 8px;
    }

    .testimonial-dot {
        width: 9px;
        height: 9px;
    }

    .testimonial-header {
        margin-bottom: 28px;
        padding: 0 18px;
    }
}

/* Mobile Portrait Medium (375px - 479px) - Common iPhone sizes */
@media (min-width: 375px) and (max-width: 479px) {
    .testimonial-carousel-section {
        padding: 32px 0 38px;
    }

    .testimonial-carousel-wrapper {
        padding: 25px 18px;
        min-height: 420px;
    }

    .testimonial-carousel-track {
        grid-template-columns: 0.65fr 1.65fr 0.65fr;
        gap: 16px;
    }

    .testimonial-slide {
        max-width: 180px;
        transition: all 1.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        border-radius: 20px;
    }

    .testimonial-slide.center {
        transform: scale(0.98) translateY(-14px);
        transition: all 1.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .testimonial-slide.left,
    .testimonial-slide.right {
        transform: scale(0.7) translateY(11px);
        transition: all 1.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .testimonial-nav {
        width: 36px;
        height: 36px;
        font-size: 0.95rem;
    }

    .testimonial-prev {
        left: 10px;
    }

    .testimonial-next {
        right: 10px;
    }

    .testimonial-title {
        font-size: 1.65rem;
    }

    .testimonial-subtitle {
        font-size: 0.88rem;
    }

    .testimonial-content {
        padding: 13px;
    }

    .testimonial-text {
        font-size: 0.82rem;
        line-height: 1.5;
    }

    .testimonial-rating i {
        font-size: 0.88rem;
    }

    .testimonial-dots {
        margin-top: 20px;
        gap: 7px;
    }

    .testimonial-dot {
        width: 8px;
        height: 8px;
    }

    .testimonial-header {
        margin-bottom: 26px;
        padding: 0 16px;
    }

    .testimonial-video-container {
        border-radius: 20px 20px 0 0;
    }
}

/* Mobile Portrait Small (320px - 374px) */
@media (min-width: 320px) and (max-width: 374px) {
    .testimonial-carousel-section {
        padding: 30px 0 36px;
    }

    .testimonial-carousel-wrapper {
        padding: 22px 15px;
        min-height: 400px;
    }

    .testimonial-carousel-track {
        grid-template-columns: 0.6fr 1.7fr 0.6fr;
        gap: 14px;
    }

    .testimonial-slide {
        max-width: 165px;
        transition: all 1.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        border-radius: 18px;
    }

    .testimonial-slide.center {
        transform: scale(0.96) translateY(-12px);
        transition: all 1.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .testimonial-slide.left,
    .testimonial-slide.right {
        transform: scale(0.68) translateY(10px);
        transition: all 1.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .testimonial-nav {
        width: 34px;
        height: 34px;
        font-size: 0.9rem;
    }

    .testimonial-prev {
        left: 8px;
    }

    .testimonial-next {
        right: 8px;
    }

    .testimonial-title {
        font-size: 1.55rem;
        line-height: 1.2;
    }

    .testimonial-subtitle {
        font-size: 0.85rem;
        line-height: 1.5;
    }

    .testimonial-content {
        padding: 12px 10px;
    }

    .testimonial-text {
        font-size: 0.78rem;
        line-height: 1.5;
    }

    .testimonial-rating {
        gap: 4px;
        margin-bottom: 12px;
    }

    .testimonial-rating i {
        font-size: 0.85rem;
    }

    .testimonial-dots {
        margin-top: 18px;
        gap: 6px;
    }

    .testimonial-dot {
        width: 7px;
        height: 7px;
    }

    .testimonial-header {
        margin-bottom: 24px;
        padding: 0 14px;
    }

    .testimonial-video-container {
        border-radius: 18px 18px 0 0;
    }
}

/* Extra Small Mobile (< 320px) */
@media (max-width: 319px) {
    .testimonial-carousel-section {
        padding: 28px 0 34px;
    }

    .testimonial-carousel-wrapper {
        padding: 20px 12px;
        min-height: 380px;
    }

    .testimonial-carousel-track {
        grid-template-columns: 0.55fr 1.75fr 0.55fr;
        gap: 12px;
    }

    .testimonial-slide {
        max-width: 150px;
        transition: all 1.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        border-radius: 16px;
    }

    .testimonial-slide.center {
        transform: scale(0.94) translateY(-10px);
        transition: all 1.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .testimonial-slide.left,
    .testimonial-slide.right {
        transform: scale(0.66) translateY(9px);
        transition: all 1.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .testimonial-nav {
        width: 32px;
        height: 32px;
        font-size: 0.85rem;
    }

    .testimonial-prev {
        left: 6px;
    }

    .testimonial-next {
        right: 6px;
    }

    .testimonial-title {
        font-size: 1.45rem;
        line-height: 1.2;
    }

    .testimonial-subtitle {
        font-size: 0.8rem;
        line-height: 1.5;
    }

    .testimonial-content {
        padding: 10px 8px;
    }

    .testimonial-text {
        font-size: 0.75rem;
        line-height: 1.5;
    }

    .testimonial-rating {
        gap: 3px;
        margin-bottom: 10px;
    }

    .testimonial-rating i {
        font-size: 0.8rem;
    }

    .testimonial-dots {
        margin-top: 16px;
        gap: 5px;
    }

    .testimonial-dot {
        width: 6px;
        height: 6px;
    }

    .testimonial-header {
        margin-bottom: 22px;
        padding: 0 12px;
    }

    .testimonial-video-container {
        border-radius: 16px 16px 0 0;
    }
}

/* Touch Device Optimizations */
@media (hover: none) and (pointer: coarse) {
    .testimonial-nav {
        min-width: 44px;
        min-height: 44px;
    }

    .testimonial-dot {
        min-width: 32px;
        min-height: 32px;
        padding: 8px;
    }

    .testimonial-slide {
        -webkit-tap-highlight-color: transparent;
        touch-action: manipulation;
    }
}

/* Orientation-specific optimizations */
@media (max-width: 768px) and (orientation: landscape) {
    .testimonial-carousel-wrapper {
        min-height: 400px;
        padding: 30px 40px;
    }

    .testimonial-carousel-track {
        grid-template-columns: 0.85fr 1.45fr 0.85fr;
        gap: 20px;
    }

    .testimonial-slide {
        max-width: 220px;
    }
}

@media (max-width: 768px) and (orientation: portrait) {
    .testimonial-video-container {
        border-radius: 20px 20px 0 0;
    }
}

/* High DPI screens optimization */
@media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
    .testimonial-slide {
        border-width: 1.5px;
    }

    .testimonial-nav {
        border-width: 2px;
    }
}

/* ================================================
   ACCESSIBILITY
   ================================================ */
.testimonial-nav:focus,
.testimonial-dot:focus {
    outline: 2px solid #7c3aed;
    outline-offset: 3px;
}

/* Reduced Motion Support */
@media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}

/* Additional iPhone-specific optimizations */
@media (max-width: 767px) {
    /* Further reduce animations on smaller mobile devices */
    .testimonial-carousel-section {
        transform: none !important;
        transition: opacity 0.5s ease-out !important;
    }

    /* Remove transforms from video containers on small mobile to prevent rendering issues */
    .testimonial-video-container::after {
        display: none;
    }

    /* Optimize iframe rendering on mobile */
    .testimonial-video-container iframe {
        transform: none !important;
        -webkit-transform: none !important;
    }

    /* Remove text shadow to reduce rendering cost */
    .testimonial-text {
        text-shadow: none !important;
    }

    /* Simplify rating stars on mobile */
    .testimonial-rating i {
        filter: none !important;
    }

    /* Disable 3D transforms on mobile */
    .testimonial-slide {
        transform-style: flat !important;
        -webkit-transform-style: flat !important;
        perspective: none !important;
    }

    .testimonial-carousel-wrapper {
        perspective: none !important;
    }
}

/* ================================================
   PERFORMANCE OPTIMIZATIONS
   ================================================ */

/* Desktop-only performance optimizations */
@media (min-width: 1024px) {
    .testimonial-slide {
        will-change: transform, opacity, filter;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
    }

    .testimonial-video-container iframe {
        transform: translateZ(0);
        -webkit-transform: translateZ(0);
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
    }

    .testimonial-carousel-track {
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
    }
}

/* Mobile optimizations - minimal transforms */
@media (max-width: 1023px) {
    .testimonial-slide {
        will-change: auto;
        -webkit-backface-visibility: visible;
        backface-visibility: visible;
        -webkit-transform-style: flat;
        transform-style: flat;
    }

    .testimonial-video-container iframe {
        transform: none;
        -webkit-transform: none;
    }

    .testimonial-carousel-track {
        -webkit-overflow-scrolling: touch;
    }

    .testimonial-carousel-wrapper {
        -webkit-overflow-scrolling: touch;
        scroll-behavior: auto;
    }
}

/* Prevent text selection during swipe */
.testimonial-carousel-section {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Allow text selection in content */
.testimonial-text {
    -webkit-user-select: text;
    -moz-user-select: text;
    -ms-user-select: text;
    user-select: text;
}
</style>

<!-- Testimonial Carousel Section -->
<section class="testimonial-carousel-section" id="testimonialCarousel">
    <div class="testimonial-container">
        <div class="testimonial-header">
            <h2 class="testimonial-title">What Our Students Say</h2>
            <p class="testimonial-subtitle">Real stories from real students who transformed their lives with AI education</p>
        </div>

        <div class="testimonial-carousel-wrapper">
            <div class="testimonial-carousel-track">
                <!-- Testimonial 1 -->
                <div class="testimonial-slide">
                    <div class="testimonial-video-container">
                        <iframe
                            src="https://www.youtube.com/embed/T5RIIc4FWus?controls=1&modestbranding=1&rel=0"
                            title="Student Testimonial 1"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                            loading="lazy">
                        </iframe>
                    </div>
                    <div class="testimonial-content">
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">Amazing AI learning experience!</p>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="testimonial-slide">
                    <div class="testimonial-video-container">
                        <iframe
                            src="https://www.youtube.com/embed/35P7t2JAz2A?controls=1&modestbranding=1&rel=0"
                            title="Student Testimonial 2"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                            loading="lazy">
                        </iframe>
                    </div>
                    <div class="testimonial-content">
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">Best courses for AI skills!</p>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="testimonial-slide">
                    <div class="testimonial-video-container">
                        <iframe
                            src="https://www.youtube.com/embed/SkFZu1VGxTE?controls=1&modestbranding=1&rel=0"
                            title="Student Testimonial 3"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                            loading="lazy">
                        </iframe>
                    </div>
                    <div class="testimonial-content">
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">Transformed my career path!</p>
                    </div>
                </div>

                <!-- Testimonial 4 -->
                <div class="testimonial-slide">
                    <div class="testimonial-video-container">
                        <iframe
                            src="https://www.youtube.com/embed/FGeU_n3WYL0?controls=1&modestbranding=1&rel=0"
                            title="Student Testimonial 4"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                            loading="lazy">
                        </iframe>
                    </div>
                    <div class="testimonial-content">
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">Exceptional teaching quality!</p>
                    </div>
                </div>
            </div>

            <!-- Navigation Arrows -->
            <button class="testimonial-nav testimonial-prev" aria-label="Previous testimonial">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="testimonial-nav testimonial-next" aria-label="Next testimonial">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>

        <!-- Dots Navigation -->
        <div class="testimonial-dots">
            <button class="testimonial-dot active" data-slide="0"></button>
            <button class="testimonial-dot" data-slide="1"></button>
            <button class="testimonial-dot" data-slide="2"></button>
            <button class="testimonial-dot" data-slide="3"></button>
        </div>
    </div>
</section>

<script>
/**
 * Testimonial Carousel - Center-Focused Design
 * Manual navigation only, smooth 2s transitions
 */

document.addEventListener('DOMContentLoaded', function() {

    const carousel = document.querySelector('.testimonial-carousel-section');
    if (!carousel) return;

    const track = carousel.querySelector('.testimonial-carousel-track');
    const originalSlides = Array.from(carousel.querySelectorAll('.testimonial-slide'));
    const prevButton = carousel.querySelector('.testimonial-prev');
    const nextButton = carousel.querySelector('.testimonial-next');
    const dots = Array.from(carousel.querySelectorAll('.testimonial-dot'));

    // Clone slides for infinite loop (double cloning to prevent same video appearing twice)
    const slideClones = [];

    // Create 2 sets of clones before and after to ensure smooth looping without duplicates
    for (let i = 0; i < 2; i++) {
        originalSlides.forEach(slide => {
            const cloneBefore = slide.cloneNode(true);
            const cloneAfter = slide.cloneNode(true);
            cloneBefore.classList.add('clone');
            cloneAfter.classList.add('clone');
            slideClones.push({ before: cloneBefore, after: cloneAfter, set: i });
        });
    }

    // Insert clones: Add before clones in reverse order, add after clones in normal order
    slideClones.filter(c => c.set === 1).reverse().forEach(clone => track.insertBefore(clone.before, track.firstChild));
    slideClones.filter(c => c.set === 0).reverse().forEach(clone => track.insertBefore(clone.before, track.firstChild));
    slideClones.filter(c => c.set === 0).forEach(clone => track.appendChild(clone.after));
    slideClones.filter(c => c.set === 1).forEach(clone => track.appendChild(clone.after));

    const slides = Array.from(track.querySelectorAll('.testimonial-slide'));
    const totalOriginalSlides = originalSlides.length;
    // With 2 sets of clones before, original slides start at index (2 * totalOriginalSlides)
    let currentIndex = 2 * totalOriginalSlides;
    let isTransitioning = false;

    function updateCarousel(immediate = false) {
        slides.forEach((slide, index) => {
            slide.classList.remove('center', 'left', 'right', 'side', 'hidden');
            const diff = index - currentIndex;
            if (diff === 0) {
                slide.classList.add('center');
            } else if (diff === -1) {
                slide.classList.add('left');
            } else if (diff === 1) {
                slide.classList.add('right');
            } else {
                slide.classList.add('hidden');
            }
        });
        updateDots();
    }

    function updateDots() {
        // Calculate real index: subtract the offset for 2 sets of before-clones
        const realIndex = ((currentIndex - 2 * totalOriginalSlides) % totalOriginalSlides + totalOriginalSlides) % totalOriginalSlides;
        dots.forEach((dot, index) => {
            if (index === realIndex) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });
    }

    function goToSlide(index) {
        if (isTransitioning) return;
        isTransitioning = true;
        currentIndex = index;
        updateCarousel();
        setTimeout(() => {
            // Reset position for infinite loop when reaching cloned slides
            const originalStartIndex = 2 * totalOriginalSlides; // Index 8 for 4 slides
            const originalEndIndex = 3 * totalOriginalSlides; // Index 12 for 4 slides

            if (currentIndex >= originalEndIndex) {
                // Reached after-clones, jump back to corresponding position in original slides
                const offset = currentIndex - originalEndIndex;
                currentIndex = originalStartIndex + (offset % totalOriginalSlides);
                slides.forEach(slide => {
                    slide.style.transition = 'none';
                });
                updateCarousel(true);
                requestAnimationFrame(() => {
                    slides.forEach(slide => {
                        slide.style.transition = '';
                    });
                });
            } else if (currentIndex < originalStartIndex) {
                // Reached before-clones, jump forward to corresponding position in original slides
                const offset = currentIndex % totalOriginalSlides;
                currentIndex = originalStartIndex + offset;
                slides.forEach(slide => {
                    slide.style.transition = 'none';
                });
                updateCarousel(true);
                requestAnimationFrame(() => {
                    slides.forEach(slide => {
                        slide.style.transition = '';
                    });
                });
            }
            isTransitioning = false;
        }, 2000);
    }

    function nextSlide() {
        if (isTransitioning) return;
        goToSlide(currentIndex + 1);
    }

    function prevSlide() {
        if (isTransitioning) return;
        goToSlide(currentIndex - 1);
    }

    if (prevButton) {
        prevButton.addEventListener('click', () => {
            prevSlide();
        });
    }

    if (nextButton) {
        nextButton.addEventListener('click', () => {
            nextSlide();
        });
    }

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            if (isTransitioning) return;
            // Jump to original slides (which start at index 2 * totalOriginalSlides)
            goToSlide(2 * totalOriginalSlides + index);
        });
    });

    // Keyboard Navigation
    document.addEventListener('keydown', (e) => {
        const carouselRect = carousel.getBoundingClientRect();
        const isInView = carouselRect.top < window.innerHeight && carouselRect.bottom > 0;
        if (!isInView) return;
        if (e.key === 'ArrowLeft') {
            prevSlide();
        } else if (e.key === 'ArrowRight') {
            nextSlide();
        }
    });

    // Touch/Swipe Support
    let touchStartX = 0;
    let touchEndX = 0;
    let touchStartY = 0;
    let touchEndY = 0;

    carousel.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
        touchStartY = e.changedTouches[0].screenY;
    }, { passive: true });

    carousel.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        touchEndY = e.changedTouches[0].screenY;
        const horizontalDistance = Math.abs(touchEndX - touchStartX);
        const verticalDistance = Math.abs(touchEndY - touchStartY);
        if (horizontalDistance > verticalDistance && horizontalDistance > 50) {
            if (touchEndX < touchStartX) {
                nextSlide();
            } else {
                prevSlide();
            }
        }
    }, { passive: true });

    // Responsive Handling
    let resizeTimeout;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            updateCarousel();
        }, 250);
    });

    // Accessibility
    slides.forEach((slide, index) => {
        slide.setAttribute('role', 'group');
        slide.setAttribute('aria-roledescription', 'slide');
        slide.setAttribute('aria-label', `Testimonial ${index + 1} of ${slides.length}`);
    });

    // Initialize
    updateCarousel();
    console.log('Testimonial Carousel initialized (manual navigation only)');

});

// Scroll Animation - Intersection Observer
(function() {
    const section = document.querySelector('.testimonial-carousel-section');

    if (!section) return;

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
                
            } else {
                // Remove animate-in class when section leaves viewport
                entry.target.classList.remove('animate-in');
            }
        });
    };

    const observer = new IntersectionObserver(observerCallback, observerOptions);
    observer.observe(section);
})();
</script>
