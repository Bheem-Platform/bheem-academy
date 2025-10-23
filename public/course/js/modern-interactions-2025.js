/**
 * Bheem Academy Modern Interactions 2025
 * Minimal scroll animations, dark mode, and performance optimizations
 */

(function() {
    'use strict';

    // ================================================
    // DARK MODE SYSTEM
    // ================================================
    function initDarkMode() {
        const themeToggle = document.getElementById('theme-toggle-2025');
        const html = document.documentElement;

        // Check saved theme or system preference
        const savedTheme = localStorage.getItem('bheem-theme');
        const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const currentTheme = savedTheme || (systemPrefersDark ? 'dark' : 'light');

        // Apply theme
        html.setAttribute('data-theme', currentTheme);
        updateThemeIcon(currentTheme);

        // Toggle handler
        if (themeToggle) {
            themeToggle.addEventListener('click', () => {
                const newTheme = html.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
                html.setAttribute('data-theme', newTheme);
                localStorage.setItem('bheem-theme', newTheme);
                updateThemeIcon(newTheme);
            });
        }
    }

    function updateThemeIcon(theme) {
        const themeToggle = document.getElementById('theme-toggle-2025');
        if (themeToggle) {
            const icon = themeToggle.querySelector('i');
            if (icon) {
                icon.className = theme === 'dark' ? 'fas fa-sun' : 'fas fa-moon';
            }
        }
    }

    // ================================================
    // MINIMAL SCROLL-TRIGGERED ANIMATIONS
    // ================================================
    function initScrollAnimations() {
        // Use Intersection Observer for performance
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    // Unobserve after animation to save resources
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe all elements with fade-in-up class
        const animatedElements = document.querySelectorAll('.fade-in-up');
        animatedElements.forEach(el => observer.observe(el));
    }

    // ================================================
    // PROGRESS RING ANIMATION
    // ================================================
    function animateProgressRings() {
        const rings = document.querySelectorAll('.progress-ring');

        rings.forEach(ring => {
            const circle = ring.querySelector('.progress-ring-circle');
            const percentage = parseInt(ring.getAttribute('data-progress') || '0');

            if (circle) {
                const radius = 54;
                const circumference = 2 * Math.PI * radius;
                const offset = circumference - (percentage / 100) * circumference;

                circle.style.strokeDasharray = `${circumference} ${circumference}`;
                circle.style.strokeDashoffset = circumference;

                // Trigger animation when visible
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            setTimeout(() => {
                                circle.style.strokeDashoffset = offset;
                            }, 100);
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.5 });

                observer.observe(ring);
            }
        });
    }

    // ================================================
    // PROGRESS BAR ANIMATION
    // ================================================
    function animateProgressBars() {
        const bars = document.querySelectorAll('.progress-bar');

        bars.forEach(bar => {
            const fill = bar.querySelector('.progress-bar-fill');
            const percentage = parseInt(bar.getAttribute('data-progress') || '0');

            if (fill) {
                fill.style.width = '0%';

                // Trigger animation when visible
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            setTimeout(() => {
                                fill.style.width = percentage + '%';
                            }, 100);
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.5 });

                observer.observe(bar);
            }
        });
    }

    // ================================================
    // TAB NAVIGATION
    // ================================================
    function initTabs() {
        const tabButtons = document.querySelectorAll('.tab');
        const tabContents = document.querySelectorAll('.tab-content');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const targetId = button.getAttribute('data-tab');

                // Remove active class from all tabs
                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));

                // Add active class to clicked tab
                button.classList.add('active');

                // Show corresponding content
                const targetContent = document.getElementById(targetId);
                if (targetContent) {
                    targetContent.classList.add('active');
                }
            });
        });
    }

    // ================================================
    // SMOOTH SCROLL TO ANCHOR
    // ================================================
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href === '#' || href === '') return;

                e.preventDefault();
                const target = document.querySelector(href);

                if (target) {
                    const offset = 80; // Account for fixed header
                    const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - offset;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    // ================================================
    // LAZY LOAD IMAGES (Performance)
    // ================================================
    function initLazyLoading() {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    const src = img.getAttribute('data-src');

                    if (src) {
                        img.src = src;
                        img.removeAttribute('data-src');
                        img.classList.add('loaded');
                    }

                    observer.unobserve(img);
                }
            });
        });

        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }

    // ================================================
    // PERFORMANCE MONITORING
    // ================================================
    function monitorPerformance() {
        // Only in development
        if (window.location.hostname !== 'localhost' && !window.location.hostname.includes('dev.')) {
            return;
        }

        if ('PerformanceObserver' in window) {
            const observer = new PerformanceObserver((list) => {
                for (const entry of list.getEntries()) {
                    // Log slow resources
                    if (entry.duration > 1000) {
                        console.warn('⚠️ Slow resource:', entry.name, `(${Math.round(entry.duration)}ms)`);
                    }
                }
            });

            observer.observe({ entryTypes: ['resource', 'navigation'] });
        }

        // Log Core Web Vitals
        if ('web-vital' in window) {
            window.addEventListener('load', () => {
                const paint = performance.getEntriesByType('paint');
                const fcp = paint.find(entry => entry.name === 'first-contentful-paint');

                if (fcp) {
                    console.log('✅ First Contentful Paint:', Math.round(fcp.startTime) + 'ms');
                }
            });
        }
    }

    // ================================================
    // REDUCE ANIMATIONS ON LOW BATTERY
    // ================================================
    function initBatteryOptimization() {
        if ('getBattery' in navigator) {
            navigator.getBattery().then(battery => {
                function updateBatteryStatus() {
                    if (battery.level < 0.2 && !battery.charging) {
                        document.body.classList.add('low-battery');
                        console.log('🔋 Low battery - reducing animations');
                    } else {
                        document.body.classList.remove('low-battery');
                    }
                }

                battery.addEventListener('levelchange', updateBatteryStatus);
                battery.addEventListener('chargingchange', updateBatteryStatus);
                updateBatteryStatus();
            });
        }
    }

    // ================================================
    // KEYBOARD NAVIGATION ENHANCEMENT
    // ================================================
    function initKeyboardNav() {
        document.addEventListener('keydown', (e) => {
            // Tab key - show focus outlines
            if (e.key === 'Tab') {
                document.body.classList.add('using-keyboard');
            }
        });

        document.addEventListener('mousedown', () => {
            document.body.classList.remove('using-keyboard');
        });
    }

    // ================================================
    // PRICE REVEAL INTERACTION
    // ================================================
    function initPriceReveal() {
        // Reveal on price click (logged-in users)
        const blurredPrice = document.getElementById('blurredPrice');
        if (blurredPrice) {
            blurredPrice.addEventListener('click', function() {
                this.style.filter = 'blur(0)';
                this.style.webkitFilter = 'blur(0)';
                this.style.cursor = 'default';

                // Remove eye icon
                const eyeIcon = this.querySelector('::after');
                if (eyeIcon) {
                    this.classList.add('revealed');
                }

                // Add reveal animation
                this.style.animation = 'priceReveal 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
            });
        }

        // Reveal on link hover (temporary reveal)
        const revealLinks = document.querySelectorAll('.price-reveal-link');
        revealLinks.forEach(link => {
            link.addEventListener('mouseenter', function() {
                const priceBlurred = this.closest('.cta-price').querySelector('.price-blurred');
                if (priceBlurred && !priceBlurred.classList.contains('revealed')) {
                    priceBlurred.style.filter = 'blur(2px)';
                    priceBlurred.style.webkitFilter = 'blur(2px)';
                }
            });

            link.addEventListener('mouseleave', function() {
                const priceBlurred = this.closest('.cta-price').querySelector('.price-blurred');
                if (priceBlurred && !priceBlurred.classList.contains('revealed')) {
                    priceBlurred.style.filter = 'blur(6px)';
                    priceBlurred.style.webkitFilter = 'blur(6px)';
                }
            });
        });
    }

    // ================================================
    // INITIALIZE ALL FEATURES
    // ================================================
    function init() {
        // Wait for DOM to be ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initializeAll);
        } else {
            initializeAll();
        }
    }

    function initializeAll() {
        console.log('🚀 Bheem Academy 2025 - Initializing...');

        try {
            initDarkMode();
            initScrollAnimations();
            animateProgressRings();
            animateProgressBars();
            initTabs();
            initSmoothScroll();
            initLazyLoading();
            initBatteryOptimization();
            initKeyboardNav();
            initPriceReveal();

            // Performance monitoring only in dev
            if (window.location.hostname.includes('dev.') || window.location.hostname === 'localhost') {
                monitorPerformance();
            }

            console.log('✅ All features initialized');
        } catch (error) {
            console.error('❌ Initialization error:', error);
        }
    }

    // Start
    init();

})();

// ================================================
// LOW BATTERY MODE CSS
// ================================================
document.head.insertAdjacentHTML('beforeend', `
<style>
.low-battery * {
    animation-duration: 0.01ms !important;
    transition-duration: 0.01ms !important;
}

.using-keyboard *:focus-visible {
    outline: 2px solid var(--color-primary-violet);
    outline-offset: 2px;
}
</style>
`);
