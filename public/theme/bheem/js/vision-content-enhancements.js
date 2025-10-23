/**
 * Vision & Content Section Enhancements
 * Interactive features and dynamic improvements for content sections
 */

document.addEventListener('DOMContentLoaded', function() {

    // ============================================
    // AUTO-DETECT AND ENHANCE VISION SECTIONS
    // ============================================

    function detectVisionSections() {
        // Find potential vision/content sections
        const selectors = [
            'section:contains("Our Vision")',
            'section:contains("Vision")',
            'div:contains("Our Vision")',
            '.block-region .block:contains("Vision")',
            '.content-area:contains("Our Vision")',
            '[class*="vision"]',
            '[id*="vision"]'
        ];

        const visionElements = [];

        // Search for text-based content
        const allElements = document.querySelectorAll('section, div, .block, .content-area, .card, .card-body');
        allElements.forEach(element => {
            const text = element.textContent || element.innerText || '';
            if (text.toLowerCase().includes('our vision') ||
                text.toLowerCase().includes('future-first') ||
                text.toLowerCase().includes('8 to 80') ||
                text.toLowerCase().includes('ai learning universal')) {

                if (!element.classList.contains('vision-enhanced')) {
                    visionElements.push(element);
                }
            }
        });

        return visionElements;
    }

    // ============================================
    // ENHANCE VISION CONTENT STRUCTURE
    // ============================================

    function enhanceVisionContent(element) {
        // Add enhancement class
        element.classList.add('vision-section', 'vision-enhanced');

        // Wrap content if not already wrapped
        if (!element.querySelector('.vision-content')) {
            const wrapper = document.createElement('div');
            wrapper.className = 'vision-content';

            // Move all children to wrapper
            while (element.firstChild) {
                wrapper.appendChild(element.firstChild);
            }
            element.appendChild(wrapper);
        }

        // Add vision icon
        addVisionIcon(element);

        // Enhance text structure
        enhanceTextStructure(element);

        // Add call-to-action if missing
        addCallToAction(element);

        // Add interactive animations
        addScrollAnimations(element);
    }

    // ============================================
    // ADD VISION ICON
    // ============================================

    function addVisionIcon(element) {
        const content = element.querySelector('.vision-content');
        if (content && !content.querySelector('.vision-icon')) {
            const icon = document.createElement('div');
            icon.className = 'vision-icon';
            icon.innerHTML = '<i class="fas fa-eye" aria-hidden="true"></i>';

            // Insert at the beginning
            content.insertBefore(icon, content.firstChild);
        }
    }

    // ============================================
    // ENHANCE TEXT STRUCTURE
    // ============================================

    function enhanceTextStructure(element) {
        const paragraphs = element.querySelectorAll('p');

        paragraphs.forEach((p, index) => {
            const text = p.textContent || p.innerText || '';

            // Highlight key phrases
            if (text.includes('8 to 80') || text.includes('8-year-olds to experienced professionals in their 80s')) {
                p.innerHTML = text.replace(/(8\s*to\s*80'?s?|8-year-olds to experienced professionals in their 80s)/gi,
                    '<span class="vision-highlight">$1</span>');
            }

            if (text.includes('future-first AI company')) {
                p.innerHTML = p.innerHTML.replace(/(future-first AI company)/gi,
                    '<strong class="vision-highlight">$1</strong>');
            }

            if (text.includes('AI learning universal, practical, and empowering')) {
                p.innerHTML = p.innerHTML.replace(/(AI learning universal, practical, and empowering)/gi,
                    '<strong class="vision-highlight">$1</strong>');
            }

            // Add typing animation to first paragraph
            if (index === 0 && text.length > 50) {
                p.classList.add('vision-text', 'typing-animation');
            }
        });

        // Break long paragraphs for better readability
        paragraphs.forEach(p => {
            const text = p.textContent || p.innerText || '';
            if (text.length > 200 && text.includes('. ')) {
                const sentences = text.split('. ');
                if (sentences.length >= 2) {
                    p.innerHTML = sentences.slice(0, Math.ceil(sentences.length / 2)).join('. ') + '.';

                    if (sentences.length > 2) {
                        const newP = document.createElement('p');
                        newP.className = p.className;
                        newP.innerHTML = sentences.slice(Math.ceil(sentences.length / 2)).join('. ');
                        p.parentNode.insertBefore(newP, p.nextSibling);
                    }
                }
            }
        });
    }

    // ============================================
    // ADD CALL TO ACTION
    // ============================================

    function addCallToAction(element) {
        const content = element.querySelector('.vision-content');
        if (content && !content.querySelector('.vision-cta')) {
            const cta = document.createElement('div');
            cta.className = 'vision-cta';
            cta.innerHTML = `
                <a href="/course/" class="cta-button">
                    <span>Explore AI Courses</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
                <a href="/my/" class="cta-button cta-button-outline">
                    <span>Start Learning</span>
                    <i class="fas fa-play"></i>
                </a>
            `;

            content.appendChild(cta);
        }
    }

    // ============================================
    // SCROLL ANIMATIONS
    // ============================================

    function addScrollAnimations(element) {
        // Intersection Observer for scroll animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');

                    // Animate child elements with delay
                    const children = entry.target.querySelectorAll('.vision-icon, h1, h2, h3, p, .vision-cta');
                    children.forEach((child, index) => {
                        setTimeout(() => {
                            child.classList.add('animate-in');
                        }, index * 200);
                    });
                }
            });
        }, {
            threshold: 0.2,
            rootMargin: '0px 0px -50px 0px'
        });

        observer.observe(element);
    }

    // ============================================
    // STATISTICS COUNTER ANIMATION
    // ============================================

    function animateCounters() {
        const counters = document.querySelectorAll('.stat-number');

        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.textContent) || 100;

                    let current = 0;
                    const increment = target / 60;
                    const timer = setInterval(() => {
                        current += increment;
                        if (current >= target) {
                            counter.textContent = target;
                            clearInterval(timer);
                        } else {
                            counter.textContent = Math.floor(current);
                        }
                    }, 50);

                    counterObserver.unobserve(counter);
                }
            });
        }, { threshold: 0.5 });

        counters.forEach(counter => {
            counterObserver.observe(counter);
        });
    }

    // ============================================
    // TYPING ANIMATION
    // ============================================

    function addTypingAnimation(element) {
        const text = element.textContent;
        element.innerHTML = '';
        element.style.borderRight = '2px solid #8b5cf6';

        let i = 0;
        const typeTimer = setInterval(() => {
            if (i < text.length) {
                element.innerHTML += text.charAt(i);
                i++;
            } else {
                clearInterval(typeTimer);
                setTimeout(() => {
                    element.style.borderRight = 'none';
                }, 1000);
            }
        }, 50);
    }

    // ============================================
    // INTERACTIVE FEATURES
    // ============================================

    function addInteractiveFeatures() {
        // Smooth scrolling for CTA buttons
        document.querySelectorAll('.cta-button[href^="#"]').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Button hover effects
        document.querySelectorAll('.cta-button').forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-3px) scale(1.05)';
            });

            button.addEventListener('mouseleave', function() {
                this.style.transform = '';
            });
        });

        // Parallax effect for vision sections
        const visionSections = document.querySelectorAll('.vision-section');
        let ticking = false;

        function updateParallax() {
            visionSections.forEach(section => {
                const rect = section.getBoundingClientRect();
                const speed = 0.5;
                const yPos = -(rect.top * speed);

                const bg = section.querySelector('::before');
                if (bg) {
                    section.style.setProperty('--parallax-offset', `${yPos}px`);
                }
            });
            ticking = false;
        }

        function requestParallaxTick() {
            if (!ticking) {
                requestAnimationFrame(updateParallax);
                ticking = true;
            }
        }

        // Only add parallax on larger screens
        if (window.innerWidth > 768) {
            window.addEventListener('scroll', requestParallaxTick);
        }
    }

    // ============================================
    // RESPONSIVE ENHANCEMENTS
    // ============================================

    function addResponsiveEnhancements() {
        const resizeHandler = () => {
            const visionSections = document.querySelectorAll('.vision-section');

            visionSections.forEach(section => {
                if (window.innerWidth <= 768) {
                    section.classList.add('mobile-optimized');
                } else {
                    section.classList.remove('mobile-optimized');
                }
            });
        };

        window.addEventListener('resize', resizeHandler);
        resizeHandler(); // Run on load
    }

    // ============================================
    // ACCESSIBILITY ENHANCEMENTS
    // ============================================

    function addAccessibilityEnhancements() {
        // Skip to content link
        const skipLink = document.createElement('a');
        skipLink.href = '#vision-content';
        skipLink.className = 'skip-link';
        skipLink.textContent = 'Skip to Our Vision';
        skipLink.style.cssText = `
            position: absolute;
            top: -40px;
            left: 6px;
            background: #8b5cf6;
            color: white;
            padding: 8px;
            text-decoration: none;
            border-radius: 4px;
            z-index: 1000;
            transition: top 0.3s;
        `;

        skipLink.addEventListener('focus', () => {
            skipLink.style.top = '6px';
        });

        skipLink.addEventListener('blur', () => {
            skipLink.style.top = '-40px';
        });

        document.body.insertBefore(skipLink, document.body.firstChild);

        // Add ARIA labels
        document.querySelectorAll('.vision-section').forEach(section => {
            section.setAttribute('role', 'region');
            section.setAttribute('aria-labelledby', 'vision-heading');

            const heading = section.querySelector('h1, h2, h3');
            if (heading) {
                heading.id = 'vision-heading';
            }
        });

        // Keyboard navigation for CTA buttons
        document.querySelectorAll('.cta-button').forEach(button => {
            button.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    this.click();
                }
            });
        });
    }

    // ============================================
    // MAIN INITIALIZATION
    // ============================================

    function initializeEnhancements() {
        console.log('Initializing Vision Content Enhancements...');

        // Detect and enhance vision sections
        const visionElements = detectVisionSections();
        console.log(`Found ${visionElements.length} vision sections to enhance`);

        visionElements.forEach(element => {
            enhanceVisionContent(element);
        });

        // Initialize features
        animateCounters();
        addInteractiveFeatures();
        addResponsiveEnhancements();
        addAccessibilityEnhancements();

        // Add typing animation to enhanced elements
        setTimeout(() => {
            document.querySelectorAll('.typing-animation').forEach(element => {
                addTypingAnimation(element);
            });
        }, 1000);

        console.log('Vision Content Enhancements initialized successfully');
    }

    // Run initialization
    initializeEnhancements();

    // Re-run on dynamic content changes
    const contentObserver = new MutationObserver(() => {
        const newElements = detectVisionSections();
        newElements.forEach(element => {
            if (!element.classList.contains('vision-enhanced')) {
                enhanceVisionContent(element);
            }
        });
    });

    contentObserver.observe(document.body, {
        childList: true,
        subtree: true
    });

});

// ============================================
// PERFORMANCE OPTIMIZATIONS
// ============================================

// Debounce function for scroll events
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

// Preload critical CSS
const criticalCSS = document.createElement('style');
criticalCSS.textContent = `
    .vision-enhanced {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s ease-out;
    }

    .vision-enhanced.animate-in {
        opacity: 1;
        transform: translateY(0);
    }

    .skip-link:focus {
        top: 6px !important;
    }
`;
document.head.appendChild(criticalCSS);