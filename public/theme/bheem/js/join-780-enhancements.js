/**
 * Join Our 780+ Live Online Classes - Modern Interactive Enhancements
 * Enhanced user experience with smooth animations and micro-interactions
 */

document.addEventListener('DOMContentLoaded', function() {

    // ============================================
    // AUTO-DETECT AND ENHANCE JOIN SECTIONS
    // ============================================

    function detectJoinSections() {
        const selectors = [
            'section:contains("780")',
            'section:contains("Join")',
            'div:contains("Online Class")',
            '.join-section',
            '.online-classes-section',
            '[class*="780"]',
            '[id*="join"]'
        ];

        const joinElements = [];

        // Search for text-based content
        const allElements = document.querySelectorAll('section, div, .block, .content-area, .card, .card-body');
        allElements.forEach(element => {
            const text = element.textContent || element.innerText || '';
            if (text.toLowerCase().includes('780') ||
                text.toLowerCase().includes('join our') ||
                text.toLowerCase().includes('online class') ||
                text.toLowerCase().includes('live online')) {

                if (!element.classList.contains('join-enhanced')) {
                    joinElements.push(element);
                }
            }
        });

        return joinElements;
    }

    // ============================================
    // ENHANCE JOIN SECTION STRUCTURE
    // ============================================

    function enhanceJoinSection(element) {
        // Add enhancement classes
        element.classList.add('join-section', 'join-enhanced');

        // Create modern card structure for course items
        enhanceCourseCards(element);

        // Add interactive animations
        addScrollAnimations(element);

        // Add hover sound effects (optional)
        addHoverEffects(element);

        // Add statistics counter animation
        addCounterAnimations(element);

        // Add modern loading states
        addLoadingStates(element);
    }

    // ============================================
    // ENHANCE COURSE CARDS STRUCTURE
    // ============================================

    function enhanceCourseCards(element) {
        // Find card-like elements
        const potentialCards = element.querySelectorAll('.col, [class*="col-"], .card, .course-item, div img');

        potentialCards.forEach((card, index) => {
            // Skip if already enhanced
            if (card.classList.contains('course-card')) return;

            // Check if this looks like a course card (has image and text)
            const hasImage = card.querySelector('img') || card.tagName === 'IMG';
            const hasText = card.textContent && card.textContent.trim().length > 10;

            if (hasImage && hasText) {
                enhanceIndividualCard(card, index);
            }
        });
    }

    function enhanceIndividualCard(card, index) {
        // Add modern card classes
        card.classList.add('course-card');
        card.style.setProperty('--delay', `${0.1 + (index * 0.1)}s`);

        // Restructure card content
        const img = card.querySelector('img');
        if (img && !card.querySelector('.card-image')) {
            // Create image wrapper
            const imageWrapper = document.createElement('div');
            imageWrapper.className = 'card-image';

            // Wrap image
            img.parentNode.insertBefore(imageWrapper, img);
            imageWrapper.appendChild(img);

            // Add lazy loading
            img.loading = 'lazy';
            img.style.transition = 'all 0.4s ease';
        }

        // Create or enhance card body
        let cardBody = card.querySelector('.card-body, .card-content');
        if (!cardBody) {
            cardBody = document.createElement('div');
            cardBody.className = 'card-body';

            // Move text content to card body
            const textElements = Array.from(card.childNodes).filter(node =>
                node.nodeType === Node.TEXT_NODE ||
                (node.nodeType === Node.ELEMENT_NODE && !node.querySelector('img'))
            );

            textElements.forEach(element => {
                if (element.textContent && element.textContent.trim()) {
                    cardBody.appendChild(element);
                }
            });

            card.appendChild(cardBody);
        }

        // Enhance existing links or create new ones
        enhanceCardLinks(cardBody);

        // Add hover interaction tracking
        addCardHoverTracking(card);
    }

    // ============================================
    // ENHANCE CARD LINKS AND BUTTONS
    // ============================================

    function enhanceCardLinks(cardBody) {
        let link = cardBody.querySelector('a, .btn, .button');

        if (!link) {
            // Create a "View More" link if none exists
            link = document.createElement('a');
            link.href = '#';
            link.className = 'view-more-link';
            link.innerHTML = '<span>View More</span><i class="fas fa-arrow-right"></i>';
            cardBody.appendChild(link);
        } else {
            // Enhance existing link
            link.classList.add('view-more-link');
            if (!link.querySelector('i')) {
                link.innerHTML += ' <i class="fas fa-arrow-right"></i>';
            }
        }

        // Add click tracking and animation
        link.addEventListener('click', function(e) {
            // Add ripple effect
            createRippleEffect(this, e);

            // Add click animation
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
        });
    }

    // ============================================
    // SCROLL ANIMATIONS WITH INTERSECTION OBSERVER
    // ============================================

    function addScrollAnimations(element) {
        // Main container animation
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');

                    // Animate child elements with staggered delay
                    const cards = entry.target.querySelectorAll('.course-card');
                    cards.forEach((card, index) => {
                        setTimeout(() => {
                            card.classList.add('animate-in');
                            card.style.animationDelay = `${index * 0.1}s`;
                        }, index * 100);
                    });

                    // Animate heading and text
                    const heading = entry.target.querySelector('h2, .section-title');
                    const subtitle = entry.target.querySelector('p, .section-subtitle');

                    if (heading) {
                        setTimeout(() => heading.classList.add('animate-in'), 200);
                    }
                    if (subtitle) {
                        setTimeout(() => subtitle.classList.add('animate-in'), 400);
                    }
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        observer.observe(element);
    }

    // ============================================
    // HOVER EFFECTS AND MICRO-INTERACTIONS
    // ============================================

    function addHoverEffects(element) {
        const cards = element.querySelectorAll('.course-card');

        cards.forEach(card => {
            // Add magnetic hover effect
            card.addEventListener('mouseenter', function(e) {
                this.style.transform = 'translateY(-12px) scale(1.02)';
                this.style.transition = 'all 0.4s cubic-bezier(0.4, 0, 0.2, 1)';

                // Add glow effect
                this.style.boxShadow = `
                    0 0 0 1px rgba(99, 102, 241, 0.1),
                    0 4px 24px rgba(0, 0, 0, 0.08),
                    0 16px 64px rgba(99, 102, 241, 0.15)
                `;

                // Animate image
                const img = this.querySelector('img');
                if (img) {
                    img.style.transform = 'scale(1.05)';
                    img.style.filter = 'brightness(1.1) saturate(1.2)';
                }
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = '';
                this.style.boxShadow = '';

                // Reset image
                const img = this.querySelector('img');
                if (img) {
                    img.style.transform = '';
                    img.style.filter = '';
                }
            });

            // Add mouse movement tracking for subtle tilt effect
            card.addEventListener('mousemove', function(e) {
                if (!this.contains(e.target)) return;

                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                const centerX = rect.width / 2;
                const centerY = rect.height / 2;

                const rotateX = (y - centerY) / 20;
                const rotateY = (centerX - x) / 20;

                this.style.transform = `translateY(-12px) scale(1.02) perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
            });
        });
    }

    // ============================================
    // COUNTER ANIMATIONS
    // ============================================

    function addCounterAnimations(element) {
        const counters = element.querySelectorAll('.stat-number, .counter-number, [class*="count"]');

        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.dataset.counted) {
                    entry.target.dataset.counted = 'true';
                    animateCounter(entry.target);
                }
            });
        }, { threshold: 0.5 });

        counters.forEach(counter => {
            counterObserver.observe(counter);
        });
    }

    function animateCounter(element) {
        const text = element.textContent;
        const number = parseInt(text.replace(/[^\d]/g, '')) || 780;
        const suffix = text.replace(/[\d]/g, '').trim() || '+';

        let current = 0;
        const increment = number / 60;
        const duration = 2000;
        const stepTime = duration / 60;

        element.textContent = '0';

        const timer = setInterval(() => {
            current += increment;

            if (current >= number) {
                element.textContent = number + suffix;
                clearInterval(timer);

                // Add completion animation
                element.style.transform = 'scale(1.1)';
                setTimeout(() => {
                    element.style.transform = '';
                }, 200);
            } else {
                element.textContent = Math.floor(current) + suffix;
            }
        }, stepTime);
    }

    // ============================================
    // CARD HOVER TRACKING AND ANALYTICS
    // ============================================

    function addCardHoverTracking(card) {
        let hoverStartTime;

        card.addEventListener('mouseenter', function() {
            hoverStartTime = Date.now();
        });

        card.addEventListener('mouseleave', function() {
            if (hoverStartTime) {
                const hoverDuration = Date.now() - hoverStartTime;

                // Optional: Send analytics data
                console.log(`Card hover duration: ${hoverDuration}ms`);

                // Add visual feedback for long hovers
                if (hoverDuration > 2000) {
                    this.classList.add('long-hover');
                    setTimeout(() => {
                        this.classList.remove('long-hover');
                    }, 1000);
                }
            }
        });
    }

    // ============================================
    // RIPPLE EFFECT UTILITY
    // ============================================

    function createRippleEffect(element, event) {
        const ripple = document.createElement('span');
        const rect = element.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = event.clientX - rect.left - size / 2;
        const y = event.clientY - rect.top - size / 2;

        ripple.style.cssText = `
            position: absolute;
            width: ${size}px;
            height: ${size}px;
            left: ${x}px;
            top: ${y}px;
            background: rgba(124, 58, 237, 0.3);
            border-radius: 50%;
            transform: scale(0);
            animation: ripple 0.6s ease-out;
            pointer-events: none;
            z-index: 1000;
        `;

        // Add ripple animation keyframes if not exists
        if (!document.getElementById('ripple-styles')) {
            const style = document.createElement('style');
            style.id = 'ripple-styles';
            style.textContent = `
                @keyframes ripple {
                    to {
                        transform: scale(2);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(style);
        }

        element.style.position = 'relative';
        element.style.overflow = 'hidden';
        element.appendChild(ripple);

        setTimeout(() => {
            ripple.remove();
        }, 600);
    }

    // ============================================
    // LOADING STATES AND SKELETON SCREENS
    // ============================================

    function addLoadingStates(element) {
        const images = element.querySelectorAll('img');

        images.forEach(img => {
            // Add loading placeholder
            const placeholder = document.createElement('div');
            placeholder.className = 'image-placeholder';
            placeholder.style.cssText = `
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
                background-size: 200% 100%;
                animation: loading 1.5s infinite;
            `;

            // Add loading animation
            if (!document.getElementById('loading-styles')) {
                const style = document.createElement('style');
                style.id = 'loading-styles';
                style.textContent = `
                    @keyframes loading {
                        0% { background-position: 200% 0; }
                        100% { background-position: -200% 0; }
                    }
                `;
                document.head.appendChild(style);
            }

            img.parentElement.style.position = 'relative';
            img.parentElement.appendChild(placeholder);

            // Remove placeholder when image loads
            img.addEventListener('load', () => {
                placeholder.style.opacity = '0';
                setTimeout(() => {
                    placeholder.remove();
                }, 300);
            });

            // Handle error state
            img.addEventListener('error', () => {
                placeholder.innerHTML = '<div style="display:flex;align-items:center;justify-content:center;height:100%;color:#999;"><i class="fas fa-image"></i></div>';
                placeholder.style.background = '#f5f5f5';
            });
        });
    }

    // ============================================
    // PERFORMANCE OPTIMIZATIONS
    // ============================================

    // Throttle scroll events
    function throttle(func, limit) {
        let inThrottle;
        return function() {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    }

    // Debounce resize events
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // ============================================
    // RESPONSIVE BEHAVIOR
    // ============================================

    function addResponsiveBehavior() {
        const handleResize = debounce(() => {
            const joinSections = document.querySelectorAll('.join-section');

            joinSections.forEach(section => {
                if (window.innerWidth <= 768) {
                    section.classList.add('mobile-optimized');
                } else {
                    section.classList.remove('mobile-optimized');
                }
            });
        }, 250);

        window.addEventListener('resize', handleResize);
        handleResize(); // Run on load
    }

    // ============================================
    // ACCESSIBILITY ENHANCEMENTS
    // ============================================

    function addAccessibilityEnhancements() {
        // Add ARIA labels
        document.querySelectorAll('.course-card').forEach((card, index) => {
            card.setAttribute('role', 'article');
            card.setAttribute('aria-labelledby', `card-title-${index}`);

            const title = card.querySelector('h3, .card-title');
            if (title) {
                title.id = `card-title-${index}`;
            }
        });

        // Keyboard navigation
        document.querySelectorAll('.course-card').forEach(card => {
            card.setAttribute('tabindex', '0');

            card.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    const link = this.querySelector('a, .view-more-link');
                    if (link) {
                        link.click();
                    }
                }
            });
        });

        // Focus management
        document.querySelectorAll('.view-more-link').forEach(link => {
            link.addEventListener('focus', function() {
                this.closest('.course-card').style.outline = '2px solid #7c3aed';
                this.closest('.course-card').style.outlineOffset = '2px';
            });

            link.addEventListener('blur', function() {
                this.closest('.course-card').style.outline = '';
                this.closest('.course-card').style.outlineOffset = '';
            });
        });
    }

    // ============================================
    // MAIN INITIALIZATION
    // ============================================

    function initializeJoinEnhancements() {
        console.log('Initializing Join 780+ Modern Enhancements...');

        // Detect and enhance join sections
        const joinElements = detectJoinSections();
        console.log(`Found ${joinElements.length} join sections to enhance`);

        joinElements.forEach(element => {
            enhanceJoinSection(element);
        });

        // Initialize global features
        addResponsiveBehavior();
        addAccessibilityEnhancements();

        console.log('Join 780+ Modern Enhancements initialized successfully');
    }

    // Run initialization
    initializeJoinEnhancements();

    // Re-run on dynamic content changes
    const contentObserver = new MutationObserver(throttle(() => {
        const newElements = detectJoinSections();
        newElements.forEach(element => {
            if (!element.classList.contains('join-enhanced')) {
                enhanceJoinSection(element);
            }
        });
    }, 1000));

    contentObserver.observe(document.body, {
        childList: true,
        subtree: true
    });

});