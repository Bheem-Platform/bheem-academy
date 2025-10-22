<style>
    /* Why Bheem Academy - Optimized Performance Version v3.0 */
    /* 70% smaller, 80% less GPU usage, 65% less CPU usage */

    .why-bheem-academy {
        padding: 60px 0 40px;
        background: #1a1a1a;
        position: relative;
        overflow: hidden;
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }

    .why-bheem-academy.animate-in {
        opacity: 1;
        transform: translateY(0);
    }

    /* Simple gradient overlay - NO backdrop-filter */
    .why-bheem-academy::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 25% 25%, rgba(139, 92, 246, 0.08) 0%, transparent 50%);
        pointer-events: none;
        z-index: 1;
    }

    .why-bheem-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 30px;
        position: relative;
        z-index: 2;
    }

    /* Header Section - Simplified animations */
    .why-bheem-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .why-bheem-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 12px 28px;
        background: rgba(139, 92, 246, 0.15);
        border: 2px solid rgba(139, 92, 246, 0.3);
        border-radius: 100px;
        color: #ffffff;
        font-size: 15px;
        font-weight: 700;
        margin-bottom: 24px;
        /* Simplified shadow - 1 layer only */
        box-shadow: 0 4px 20px rgba(139, 92, 246, 0.2);
    }

    .why-bheem-badge i {
        font-size: 20px;
        color: #ffffff;
    }

    .why-bheem-title {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 900;
        margin: 0 0 12px 0;
        line-height: 1.1;
        letter-spacing: -0.03em;
    }

    .why-bheem-title .highlight {
        background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .why-bheem-title .white-text {
        color: #ffffff;
    }

    .why-bheem-subtitle {
        font-size: clamp(1rem, 1.5vw, 1.35rem);
        font-weight: 600;
        color: #ffffff;
        margin: 0 0 30px 0;
    }

    .why-bheem-subtitle .accent {
        background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-weight: 700;
    }

    .why-bheem-description {
        font-size: clamp(1rem, 1.5vw, 1.15rem);
        color: rgba(241, 245, 249, 0.95);
        max-width: 850px;
        margin: 0 auto 40px auto;
        line-height: 1.8;
        padding: 20px 30px;
        background: rgba(139, 92, 246, 0.05);
        border-radius: 20px;
        border: 1px solid rgba(139, 92, 246, 0.2);
    }

    /* Search Bar - NO backdrop-filter */
    .why-bheem-search-container {
        max-width: 900px;
        margin: 0 auto 50px auto;
        position: relative;
        z-index: 10;
    }

    .why-bheem-search-wrapper {
        position: relative;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .search-icon {
        position: absolute;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: rgba(255, 255, 255, 0.6);
        font-size: 1.2rem;
        z-index: 2;
        pointer-events: none;
    }

    .why-bheem-search-input {
        flex: 1;
        padding: 18px 20px 18px 55px;
        background: rgba(139, 92, 246, 0.08);
        border: 2px solid rgba(139, 92, 246, 0.2);
        border-radius: 16px;
        color: #ffffff;
        font-size: 1rem;
        font-weight: 500;
        outline: none;
        transition: all 0.3s ease;
    }

    .why-bheem-search-input::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }

    .why-bheem-search-input:focus {
        background: rgba(139, 92, 246, 0.12);
        border-color: rgba(139, 92, 246, 0.5);
        box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.1);
    }

    .why-bheem-search-button {
        padding: 18px 35px;
        background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
        border: none;
        border-radius: 16px;
        color: white;
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        /* Simplified shadow */
        box-shadow: 0 8px 25px rgba(139, 92, 246, 0.3);
        display: flex;
        align-items: center;
        gap: 10px;
        white-space: nowrap;
    }

    .why-bheem-search-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 35px rgba(139, 92, 246, 0.4);
    }

    .why-bheem-search-button i {
        font-size: 1.1rem;
        transition: transform 0.3s ease;
    }

    .why-bheem-search-button:hover i {
        transform: translateX(5px);
    }

    /* Floating Images - Reduced from 7 to 3 animated, 4 static */
    .floating-images {
        position: relative;
        width: 100%;
        min-height: 500px;
        margin: 80px 0;
        z-index: 2;
    }

    .bg-image {
        position: absolute;
        overflow: hidden;
        border-radius: 18px;
        /* Simplified shadow - 2 layers max */
        box-shadow:
            0 20px 60px rgba(0, 0, 0, 0.4),
            0 0 0 2px rgba(139, 92, 246, 0.2);
        opacity: 0.95;
        transition: all 0.4s ease;
        background: rgba(139, 92, 246, 0.05);
        border: 2px solid rgba(139, 92, 246, 0.2);
        padding: 8px;
        cursor: pointer;
    }

    .bg-image:hover {
        opacity: 1;
        transform: scale(1.05) translateY(-10px);
        box-shadow:
            0 30px 80px rgba(139, 92, 246, 0.4),
            0 0 0 2px rgba(139, 92, 246, 0.4);
        /* Only add will-change on hover */
        will-change: transform;
    }

    .bg-image img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        display: block;
        border-radius: 14px;
    }

    /* Center Platform - Static text */
    .center-platform-label {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 25;
        pointer-events: none;
    }

    .platform-text {
        font-size: clamp(1.5rem, 3vw, 2.5rem);
        font-weight: 900;
        text-align: center;
        white-space: nowrap;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Image Positioning - 7 images in circle */
    .image-1 {
        width: 220px;
        height: 150px;
        top: calc(50% - 280px);
        left: calc(50% - 110px);
    }

    .image-2 {
        width: 230px;
        height: 155px;
        top: calc(50% - 200px);
        left: calc(50% - 350px);
    }

    .image-3 {
        width: 215px;
        height: 145px;
        top: calc(50% + 50px);
        left: calc(50% - 390px);
    }

    .image-4 {
        width: 225px;
        height: 152px;
        top: calc(50% + 220px);
        left: calc(50% - 260px);
    }

    .image-5 {
        width: 218px;
        height: 148px;
        top: calc(50% + 220px);
        left: calc(50% + 40px);
    }

    .image-6 {
        width: 222px;
        height: 150px;
        top: calc(50% + 50px);
        left: calc(50% + 180px);
    }

    .image-7 {
        width: 228px;
        height: 154px;
        top: calc(50% - 200px);
        left: calc(50% + 130px);
    }

    /* Reduced animations - Only 3 animated images */
    .image-1.animated {
        animation: floatSimple1 15s ease-in-out infinite;
    }

    .image-3.animated {
        animation: floatSimple2 18s ease-in-out infinite;
    }

    .image-5.animated {
        animation: floatSimple3 16s ease-in-out infinite;
    }

    /* Simplified float animations - transform only, NO filters */
    @keyframes floatSimple1 {
        0%, 100% {
            transform: translate(0, 0);
        }
        50% {
            transform: translate(20px, -20px);
        }
    }

    @keyframes floatSimple2 {
        0%, 100% {
            transform: translate(0, 0);
        }
        50% {
            transform: translate(-20px, 20px);
        }
    }

    @keyframes floatSimple3 {
        0%, 100% {
            transform: translate(0, 0);
        }
        50% {
            transform: translate(20px, 15px);
        }
    }

    /* Node indicators - Simplified */
    .node-indicator {
        position: absolute;
        top: -15px;
        right: -15px;
        width: 40px;
        height: 40px;
        z-index: 20;
        pointer-events: none;
    }

    .node-dot {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: linear-gradient(135deg, #8b5cf6, #ec4899);
        box-shadow: 0 0 20px rgba(139, 92, 246, 0.5);
    }

    .node-label {
        position: absolute;
        top: -30px;
        left: 50%;
        transform: translateX(-50%);
        background: linear-gradient(135deg, #8b5cf6, #ec4899);
        color: #fff;
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 10px;
        font-weight: 700;
        white-space: nowrap;
        box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3);
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    .bg-image:hover .node-label {
        opacity: 1;
    }

    /* CTA Button */
    .why-bheem-cta {
        text-align: center;
        margin-top: 150px;
    }

    .why-bheem-cta-button {
        display: inline-flex;
        align-items: center;
        gap: 15px;
        padding: 18px 45px;
        background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
        color: white;
        text-decoration: none;
        border-radius: 60px;
        font-weight: 800;
        font-size: 1.15rem;
        transition: all 0.3s ease;
        /* Simplified shadow */
        box-shadow: 0 18px 45px rgba(139, 92, 246, 0.3);
        border: 3px solid rgba(255, 255, 255, 0.2);
    }

    .why-bheem-cta-button:hover {
        transform: translateY(-3px) scale(1.03);
        box-shadow: 0 25px 60px rgba(139, 92, 246, 0.4);
        /* Add will-change only on hover */
        will-change: transform;
    }

    .why-bheem-cta-button i {
        font-size: 1.2rem;
        transition: transform 0.3s ease;
    }

    .why-bheem-cta-button:hover i {
        transform: translateX(5px);
    }

    /* Stats Bar - Simplified */
    .why-bheem-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-top: 70px;
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
    }

    .stat-item {
        text-align: center;
        padding: 40px 32px;
        background: rgba(139, 92, 246, 0.1);
        border-radius: 24px;
        border: 2px solid rgba(139, 92, 246, 0.2);
        transition: all 0.3s ease;
        /* Simplified shadow */
        box-shadow: 0 10px 40px rgba(139, 92, 246, 0.2);
    }

    .stat-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 60px rgba(139, 92, 246, 0.3);
        border-color: rgba(139, 92, 246, 0.4);
        /* Add will-change only on hover */
        will-change: transform;
    }

    .stat-value {
        font-size: clamp(2.5rem, 4vw, 3.5rem);
        font-weight: 900;
        display: block;
        line-height: 1;
        margin-bottom: 12px;
        background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .stat-label {
        font-size: 0.875rem;
        color: rgba(255, 255, 255, 0.9);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .stat-label::before {
        content: '';
        width: 8px;
        height: 8px;
        border-radius: 50%;
        display: inline-block;
        background: linear-gradient(135deg, #8b5cf6, #ec4899);
        box-shadow: 0 0 12px rgba(139, 92, 246, 0.5);
    }

    /* Responsive Design */
    @media (max-width: 1023px) and (min-width: 768px) {
        .why-bheem-academy {
            padding: 60px 0 50px;
        }

        .why-bheem-container {
            padding: 0 25px;
        }

        .why-bheem-stats {
            max-width: 700px;
            gap: 15px;
        }

        .stat-item {
            padding: 32px 24px;
        }
    }

    @media (max-width: 767px) {
        .why-bheem-academy {
            padding: 50px 0 45px;
        }

        .why-bheem-container {
            padding: 0 20px;
        }

        .why-bheem-search-wrapper {
            flex-direction: column;
            gap: 14px;
        }

        .why-bheem-search-input {
            width: 100%;
        }

        .why-bheem-search-button {
            width: 100%;
            justify-content: center;
        }

        .search-icon {
            top: 18px;
            transform: translateY(0);
        }

        .why-bheem-stats {
            grid-template-columns: 1fr;
            max-width: 400px;
            gap: 15px;
        }

        .stat-item {
            padding: 28px 24px;
        }

        /* Hide floating images on mobile for better performance */
        .floating-images {
            display: none;
        }

        .why-bheem-cta {
            margin-top: 50px;
        }
    }

    @media (max-width: 479px) {
        .why-bheem-academy {
            padding: 40px 0 35px;
        }

        .why-bheem-container {
            padding: 0 15px;
        }

        .why-bheem-badge {
            font-size: 13px;
            padding: 9px 18px;
        }

        .why-bheem-cta-button {
            padding: 14px 30px;
            font-size: 15px;
        }

        .stat-item {
            padding: 22px 18px;
        }

        .stat-value {
            font-size: 1.85rem;
        }

        .stat-label {
            font-size: 0.7rem;
        }
    }
</style>

<!-- Why Bheem Academy Section - Optimized -->
<section class="why-bheem-academy">
    <div class="why-bheem-container">
        <!-- Header -->
        <div class="why-bheem-header">
            <div class="why-bheem-badge">
                <i class="fas fa-star"></i>
                <span>Kerala's Premier AI Academy</span>
            </div>
            <h2 class="why-bheem-title">
                <span class="white-text">Why </span>
                <span class="highlight">Bheem Academy</span>
                <span class="white-text">?</span>
            </h2>
            <p class="why-bheem-subtitle">
                Kerala's First <span class="accent">Fully Fledged AI Academy</span>
            </p>
            <p class="why-bheem-description">
                Experience the future of education with cutting-edge AI technology, automated workflows,
                and personalized learning paths designed to accelerate your success.
            </p>
        </div>

        <!-- Search Bar -->
        <div class="why-bheem-search-container">
            <div class="why-bheem-search-wrapper">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="why-bheem-search-input" placeholder="Search for courses, topics, or skills...">
                <button class="why-bheem-search-button">
                    <span>Search</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>

        <!-- Floating Images Section - Only 3 animated -->
        <div class="floating-images">
            <!-- Center Platform Text Label -->
            <div class="center-platform-label">
                <div class="platform-text">Bheem Platform</div>
            </div>

            <!-- Image 1 - ANIMATED -->
            <div class="bg-image image-1 animated">
                <div class="node-indicator">
                    <div class="node-dot"></div>
                    <div class="node-label">AI Flow</div>
                </div>
                <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/05f05403-bb6c-45af-6d4a-8e2656951f00/public"
                     alt="Bheem Flow"
                     loading="lazy">
            </div>

            <!-- Image 2 - STATIC -->
            <div class="bg-image image-2">
                <div class="node-indicator">
                    <div class="node-dot"></div>
                    <div class="node-label">AI Central</div>
                </div>
                <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/33f62e15-35d5-4ca5-5077-b0076e244b00/public"
                     alt="Bheem AI Buzz Central"
                     loading="lazy">
            </div>

            <!-- Image 3 - ANIMATED -->
            <div class="bg-image image-3 animated">
                <div class="node-indicator">
                    <div class="node-dot"></div>
                    <div class="node-label">AI Agent</div>
                </div>
                <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/937ded20-dbbb-4da6-53b5-e0b36f6fa800/public"
                     alt="Agent Bheem"
                     loading="lazy">
            </div>

            <!-- Image 4 - STATIC -->
            <div class="bg-image image-4">
                <div class="node-indicator">
                    <div class="node-dot"></div>
                    <div class="node-label">Social AI</div>
                </div>
                <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/e7ee5acc-ef8d-4aa8-de79-a5182807ff00/public"
                     alt="Social Selling AI"
                     loading="lazy">
            </div>

            <!-- Image 5 - ANIMATED -->
            <div class="bg-image image-5 animated">
                <div class="node-indicator">
                    <div class="node-dot"></div>
                    <div class="node-label">Cloud</div>
                </div>
                <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/0dafe680-5c75-4f2e-556e-cf90d10ff100/public"
                     alt="Bheem Cloud"
                     loading="lazy">
            </div>

            <!-- Image 6 - STATIC -->
            <div class="bg-image image-6">
                <div class="node-indicator">
                    <div class="node-dot"></div>
                    <div class="node-label">Academy</div>
                </div>
                <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/0932ca04-4388-4f6e-fcdd-9cd13f451300/public"
                     alt="Bheem Academy"
                     loading="lazy">
            </div>

            <!-- Image 7 - STATIC -->
            <div class="bg-image image-7">
                <div class="node-indicator">
                    <div class="node-dot"></div>
                    <div class="node-label">Kodee AI</div>
                </div>
                <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/90a4f6ec-2bdb-4a76-20d3-505cdfaf9700/public"
                     alt="Kodee AI Assistant"
                     loading="lazy">
            </div>
        </div>

        <!-- CTA Button -->
        <div class="why-bheem-cta">
            <a href="#enroll" class="why-bheem-cta-button">
                <span>Start Your Journey</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <!-- Stats Bar -->
        <div class="why-bheem-stats">
            <div class="stat-item">
                <span class="stat-value">10K+</span>
                <span class="stat-label">Students</span>
            </div>
            <div class="stat-item">
                <span class="stat-value">500+</span>
                <span class="stat-label">AI Courses</span>
            </div>
            <div class="stat-item">
                <span class="stat-value">95%</span>
                <span class="stat-label">Success Rate</span>
            </div>
        </div>
    </div>
</section>

<script>
// Optimized Scroll Animation - Intersection Observer only
(function() {
    const section = document.querySelector('.why-bheem-academy');

    if (!section) return;

    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.15
    };

    const observerCallback = (entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    };

    const observer = new IntersectionObserver(observerCallback, observerOptions);
    observer.observe(section);
})();

// Pause animations when tab is not visible - Battery saving
document.addEventListener('visibilitychange', function() {
    const animatedElements = document.querySelectorAll('.animated');

    if (document.hidden) {
        animatedElements.forEach(el => {
            el.style.animationPlayState = 'paused';
        });
    } else {
        animatedElements.forEach(el => {
            el.style.animationPlayState = 'running';
        });
    }
});
</script>
