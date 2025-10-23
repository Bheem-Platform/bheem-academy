/**
 * Smooth Carousel Controller 2025
 * Enhanced sliding with smooth transitions
 */

(function() {
    'use strict';

    function initSmoothCarousel() {
        // Wait for Swiper to be available
        if (typeof Swiper === 'undefined') {
            setTimeout(initSmoothCarousel, 100);
            return;
        }

        // Find the banner carousel
        const bannerElement = document.querySelector('.swiper.banner-slide');
        if (!bannerElement) {
            // Retry if element not found
            if (document.readyState !== 'complete') {
                setTimeout(initSmoothCarousel, 100);
            }
            return;
        }

        // Check if Swiper is already initialized
        if (bannerElement.swiper) {
            // Update existing swiper settings
            const swiper = bannerElement.swiper;

            // Update parameters for smooth sliding
            swiper.params.speed = 1200; // Slower transition (1.2 seconds)
            swiper.params.effect = 'slide';
            swiper.params.grabCursor = true;
            swiper.params.loop = true;
            swiper.params.autoplay = {
                delay: 5000, // 5 seconds between slides
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            };

            // Add easing for smooth motion
            swiper.params.cssMode = false;
            swiper.params.watchSlidesProgress = true;

            // Update the swiper
            swiper.update();
            swiper.autoplay.start();
        } else {
            // Initialize new Swiper with smooth settings
            const swiper = new Swiper('.swiper.banner-slide', {
                speed: 1200, // Smooth 1.2 second transitions
                spaceBetween: 0,
                loop: true,
                effect: 'slide', // Can also use 'fade' or 'creative'
                grabCursor: true,

                // Auto play with pause on hover
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true
                },

                // Smooth cubic bezier easing
                cssMode: false,
                watchSlidesProgress: true,

                // Enable keyboard control
                keyboard: {
                    enabled: true,
                    onlyInViewport: true
                },

                // Touch settings for mobile
                touchRatio: 1,
                touchAngle: 45,
                simulateTouch: true,
                shortSwipes: true,
                longSwipesMs: 300,
                followFinger: true,
                threshold: 5,

                // Resistance for edge swiping
                resistance: true,
                resistanceRatio: 0.85,

                // Observer to watch for DOM changes
                observer: true,
                observeParents: true,
                observeSlideChildren: true
            });

            // Store swiper instance
            bannerElement.swiper = swiper;
        }

        // Set up custom navigation controllers
        setupNavigationControllers();
    }

    function setupNavigationControllers() {
        const prevButton = document.querySelector('.banner-controller .controller-icon.prev');
        const nextButton = document.querySelector('.banner-controller .controller-icon.next');
        const bannerElement = document.querySelector('.swiper.banner-slide');

        if (prevButton && nextButton && bannerElement && bannerElement.swiper) {
            const swiper = bannerElement.swiper;

            // Remove any existing listeners
            prevButton.replaceWith(prevButton.cloneNode(true));
            nextButton.replaceWith(nextButton.cloneNode(true));

            // Get fresh references
            const newPrevButton = document.querySelector('.banner-controller .controller-icon.prev');
            const newNextButton = document.querySelector('.banner-controller .controller-icon.next');

            // Add click handlers with smooth sliding
            newPrevButton.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                // Add click animation
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 200);

                // Slide to previous with custom speed
                swiper.slidePrev(1200);
            });

            newNextButton.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                // Add click animation
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 200);

                // Slide to next with custom speed
                swiper.slideNext(1200);
            });

            // Add keyboard navigation
            document.addEventListener('keydown', function(e) {
                if (e.key === 'ArrowLeft') {
                    swiper.slidePrev(1200);
                } else if (e.key === 'ArrowRight') {
                    swiper.slideNext(1200);
                }
            });
        }
    }

    // Add smooth transition styles
    function addSmoothStyles() {
        const style = document.createElement('style');
        style.innerHTML = `
            /* Smooth transitions for Swiper */
            .swiper-wrapper {
                transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1) !important;
            }

            .swiper-slide {
                transition: opacity 0.6s ease !important;
            }

            .swiper-slide:not(.swiper-slide-active) {
                opacity: 0 !important;
                pointer-events: none !important;
                visibility: hidden !important;
            }

            .swiper-slide-active {
                opacity: 1 !important;
                visibility: visible !important;
            }

            /* Smooth fade effect for content */
            .swiper-slide-active .banner-content {
                animation: smoothFadeIn 1.5s ease-out !important;
            }

            @keyframes smoothFadeIn {
                0% {
                    opacity: 0;
                    transform: translateY(30px);
                }
                100% {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            /* Controller button feedback */
            .controller-icon {
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            }

            .controller-icon:active {
                transform: scale(0.95) !important;
            }
        `;
        document.head.appendChild(style);
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            addSmoothStyles();
            setTimeout(initSmoothCarousel, 500);
        });
    } else {
        addSmoothStyles();
        setTimeout(initSmoothCarousel, 500);
    }

    // Reinitialize on window load for safety
    window.addEventListener('load', function() {
        setTimeout(initSmoothCarousel, 1000);
    });

})();