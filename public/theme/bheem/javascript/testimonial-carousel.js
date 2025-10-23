/**
 * Testimonial Carousel - Center-Focused Design
 * Smooth center-pop animation with auto-play functionality
 */

document.addEventListener('DOMContentLoaded', function() {

    // ================================================
    // CAROUSEL INITIALIZATION
    // ================================================

    const carousel = document.querySelector('.testimonial-carousel-section');
    if (!carousel) return; // Exit if carousel doesn't exist

    const track = carousel.querySelector('.testimonial-carousel-track');
    const originalSlides = Array.from(carousel.querySelectorAll('.testimonial-slide'));
    const prevButton = carousel.querySelector('.testimonial-prev');
    const nextButton = carousel.querySelector('.testimonial-next');
    const dots = Array.from(carousel.querySelectorAll('.testimonial-dot'));

    // Clone slides for infinite loop effect
    const slideClones = [];
    originalSlides.forEach(slide => {
        const cloneBefore = slide.cloneNode(true);
        const cloneAfter = slide.cloneNode(true);
        cloneBefore.classList.add('clone');
        cloneAfter.classList.add('clone');
        slideClones.push({ before: cloneBefore, after: cloneAfter });
    });

    // Add clones to track
    slideClones.forEach(clone => track.insertBefore(clone.before, track.firstChild));
    slideClones.reverse().forEach(clone => track.appendChild(clone.after));

    const slides = Array.from(track.querySelectorAll('.testimonial-slide'));
    const totalOriginalSlides = originalSlides.length;
    let currentIndex = totalOriginalSlides; // Start at first original slide (after clones)
    let autoPlayInterval;
    const autoPlayDelay = 5000; // 5 seconds
    let isTransitioning = false;

    // ================================================
    // UPDATE CAROUSEL DISPLAY
    // ================================================

    function updateCarousel(immediate = false) {
        // THREE COLUMN LAYOUT: Show left, center, right
        slides.forEach((slide, index) => {
            // Remove all position classes
            slide.classList.remove('center', 'left', 'right', 'side', 'hidden');

            // Calculate position relative to current
            const diff = index - currentIndex;

            // Apply appropriate class for 3-column layout
            if (diff === 0) {
                slide.classList.add('center');
            } else if (diff === -1 || (diff === slides.length - 1)) {
                slide.classList.add('left');
            } else if (diff === 1 || (diff === -(slides.length - 1))) {
                slide.classList.add('right');
            } else {
                slide.classList.add('hidden');
            }
        });

        // Update dots (only for original slides)
        updateDots();
    }

    // ================================================
    // UPDATE DOTS NAVIGATION
    // ================================================

    function updateDots() {
        // Map current index to original slides for dots
        const realIndex = ((currentIndex - totalOriginalSlides) % totalOriginalSlides + totalOriginalSlides) % totalOriginalSlides;

        dots.forEach((dot, index) => {
            if (index === realIndex) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });
    }

    // ================================================
    // NAVIGATION FUNCTIONS
    // ================================================

    function goToSlide(index) {
        if (isTransitioning) return;
        isTransitioning = true;

        currentIndex = index;
        updateCarousel();

        // Check if we need to loop
        setTimeout(() => {
            // If we're at a clone, jump to the real slide
            if (currentIndex >= slides.length - totalOriginalSlides) {
                // At end clones, jump to start of originals
                currentIndex = totalOriginalSlides;
                updateCarousel(true);
            } else if (currentIndex < totalOriginalSlides) {
                // At start clones, jump to end of originals
                currentIndex = slides.length - totalOriginalSlides - 1;
                updateCarousel(true);
            }

            isTransitioning = false;
        }, 2000); // Match CSS transition duration (2s)

        resetAutoPlay();
    }

    function nextSlide() {
        if (isTransitioning) return;
        goToSlide(currentIndex + 1);
    }

    function prevSlide() {
        if (isTransitioning) return;
        goToSlide(currentIndex - 1);
    }

    // ================================================
    // AUTO-PLAY FUNCTIONALITY - DISABLED
    // ================================================

    function startAutoPlay() {
        // Disabled - only manual navigation via arrows
    }

    function stopAutoPlay() {
        if (autoPlayInterval) {
            clearInterval(autoPlayInterval);
            autoPlayInterval = null;
        }
    }

    function resetAutoPlay() {
        // Disabled - only manual navigation via arrows
    }

    // ================================================
    // EVENT LISTENERS
    // ================================================

    // Navigation Arrows
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

    // Dots Navigation
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            if (isTransitioning) return;
            goToSlide(totalOriginalSlides + index);
        });
    });

    // Keyboard Navigation
    document.addEventListener('keydown', (e) => {
        // Only respond if carousel is in view
        const carouselRect = carousel.getBoundingClientRect();
        const isInView = carouselRect.top < window.innerHeight && carouselRect.bottom > 0;

        if (!isInView) return;

        if (e.key === 'ArrowLeft') {
            prevSlide();
        } else if (e.key === 'ArrowRight') {
            nextSlide();
        }
    });

    // Manual navigation only - no auto-play

    // ================================================
    // TOUCH/SWIPE SUPPORT
    // ================================================

    let touchStartX = 0;
    let touchEndX = 0;
    let touchStartY = 0;
    let touchEndY = 0;

    carousel.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
        touchStartY = e.changedTouches[0].screenY;
        stopAutoPlay();
    }, { passive: true });

    carousel.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        touchEndY = e.changedTouches[0].screenY;
        handleSwipe();
        startAutoPlay();
    }, { passive: true });

    function handleSwipe() {
        const horizontalDistance = Math.abs(touchEndX - touchStartX);
        const verticalDistance = Math.abs(touchEndY - touchStartY);

        // Only trigger if horizontal swipe is dominant
        if (horizontalDistance > verticalDistance && horizontalDistance > 50) {
            if (touchEndX < touchStartX) {
                // Swipe left - next slide
                nextSlide();
            } else {
                // Swipe right - previous slide
                prevSlide();
            }
        }
    }

    // ================================================
    // INTERSECTION OBSERVER - Disabled (manual only)
    // ================================================

    // ================================================
    // RESPONSIVE HANDLING
    // ================================================

    let resizeTimeout;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            updateCarousel();
        }, 250);
    });

    // ================================================
    // ACCESSIBILITY ENHANCEMENTS
    // ================================================

    // Add ARIA labels
    slides.forEach((slide, index) => {
        slide.setAttribute('role', 'group');
        slide.setAttribute('aria-roledescription', 'slide');
        slide.setAttribute('aria-label', `Testimonial ${index + 1} of ${slides.length}`);
    });

    // Update ARIA live region for screen readers
    const liveRegion = document.createElement('div');
    liveRegion.className = 'sr-only';
    liveRegion.setAttribute('aria-live', 'polite');
    liveRegion.setAttribute('aria-atomic', 'true');
    carousel.appendChild(liveRegion);

    function updateLiveRegion() {
        liveRegion.textContent = `Showing testimonial ${currentIndex + 1} of ${slides.length}`;
    }

    // ================================================
    // INITIALIZE CAROUSEL
    // ================================================

    function initializeCarousel() {
        console.log('Initializing Testimonial Carousel...');
        console.log(`Found ${slides.length} testimonial slides`);

        // Set initial state
        updateCarousel();
        updateLiveRegion();

        // Manual navigation only
        console.log('Testimonial Carousel initialized (manual navigation only)');
    }

    // Run initialization
    initializeCarousel();

    // ================================================
    // SMOOTH SCROLL TO CAROUSEL (Optional utility)
    // ================================================

    window.scrollToTestimonials = function() {
        carousel.scrollIntoView({
            behavior: 'smooth',
            block: 'center'
        });
    };

    // ================================================
    // PERFORMANCE MONITORING (Optional)
    // ================================================

    if (window.performance && window.performance.mark) {
        performance.mark('testimonial-carousel-initialized');
        console.log('Testimonial Carousel performance mark added');
    }

});
