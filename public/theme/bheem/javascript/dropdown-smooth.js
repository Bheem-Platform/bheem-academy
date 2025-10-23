/**
 * Enhanced Dropdown Controller with Smooth Animations
 * Modern dropdown behavior with proper open/close transitions
 */

(function() {
    'use strict';

    // Configuration
    const CONFIG = {
        hoverDelay: 200,        // Delay before showing on hover (ms)
        hideDelay: 300,         // Delay before hiding on mouse leave (ms)
        animationDuration: 300, // CSS transition duration (ms)
        mobileBreakpoint: 991   // Mobile breakpoint (px)
    };

    // State management
    const dropdownState = new Map();

    /**
     * Initialize dropdown system
     */
    function initDropdowns() {
        const dropdowns = document.querySelectorAll('.navbar .dropdown, .navbar .nav-item.dropdown');

        if (!dropdowns.length) {
            // Retry if dropdowns not found
            if (document.readyState !== 'complete') {
                setTimeout(initDropdowns, 100);
            }
            return;
        }

        // Setup each dropdown
        dropdowns.forEach(setupDropdown);

        // Global event listeners
        setupGlobalListeners();

        // Handle dynamic content
        observeDOMChanges();
    }

    /**
     * Setup individual dropdown
     */
    function setupDropdown(dropdown) {
        const menu = dropdown.querySelector('.dropdown-menu');
        if (!menu) return;

        // Initialize state
        dropdownState.set(dropdown, {
            isOpen: false,
            hoverTimer: null,
            hideTimer: null,
            menu: menu
        });

        // Desktop hover behavior
        if (window.innerWidth > CONFIG.mobileBreakpoint) {
            setupHoverBehavior(dropdown, menu);
        }

        // Click behavior (mobile and desktop)
        setupClickBehavior(dropdown, menu);

        // Keyboard navigation
        setupKeyboardNavigation(dropdown, menu);

        // Add center alignment class if needed
        if (shouldCenterAlign(dropdown)) {
            menu.classList.add('dropdown-menu-center');
        }
    }

    /**
     * Setup hover behavior for desktop
     */
    function setupHoverBehavior(dropdown, menu) {
        const state = dropdownState.get(dropdown);

        // Mouse enter
        dropdown.addEventListener('mouseenter', function(e) {
            if (window.innerWidth <= CONFIG.mobileBreakpoint) return;

            clearTimeout(state.hideTimer);

            state.hoverTimer = setTimeout(() => {
                openDropdown(dropdown, menu);
            }, CONFIG.hoverDelay);
        });

        // Mouse leave
        dropdown.addEventListener('mouseleave', function(e) {
            if (window.innerWidth <= CONFIG.mobileBreakpoint) return;

            clearTimeout(state.hoverTimer);

            state.hideTimer = setTimeout(() => {
                closeDropdown(dropdown, menu);
            }, CONFIG.hideDelay);
        });

        // Cancel hide when hovering over menu
        menu.addEventListener('mouseenter', function() {
            clearTimeout(state.hideTimer);
        });

        menu.addEventListener('mouseleave', function() {
            state.hideTimer = setTimeout(() => {
                closeDropdown(dropdown, menu);
            }, CONFIG.hideDelay);
        });
    }

    /**
     * Setup click behavior
     */
    function setupClickBehavior(dropdown, menu) {
        const toggle = dropdown.querySelector('.dropdown-toggle, [data-toggle="dropdown"]');
        if (!toggle) return;

        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();

            const state = dropdownState.get(dropdown);

            if (state.isOpen) {
                closeDropdown(dropdown, menu);
            } else {
                // Close other dropdowns first
                closeAllDropdowns(dropdown);
                openDropdown(dropdown, menu);
            }
        });

        // Prevent menu clicks from closing
        menu.addEventListener('click', function(e) {
            if (e.target.matches('.dropdown-item')) {
                // Close on item click (optional)
                // closeDropdown(dropdown, menu);
            }
            e.stopPropagation();
        });
    }

    /**
     * Setup keyboard navigation
     */
    function setupKeyboardNavigation(dropdown, menu) {
        const toggle = dropdown.querySelector('.dropdown-toggle');
        const items = menu.querySelectorAll('.dropdown-item:not(.disabled)');

        if (!toggle || !items.length) return;

        // Open with Enter or Space
        toggle.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                const state = dropdownState.get(dropdown);
                if (state.isOpen) {
                    closeDropdown(dropdown, menu);
                } else {
                    openDropdown(dropdown, menu);
                    items[0]?.focus();
                }
            }
        });

        // Navigate items with arrow keys
        items.forEach((item, index) => {
            item.addEventListener('keydown', function(e) {
                switch(e.key) {
                    case 'ArrowDown':
                        e.preventDefault();
                        items[Math.min(index + 1, items.length - 1)]?.focus();
                        break;
                    case 'ArrowUp':
                        e.preventDefault();
                        if (index === 0) {
                            toggle.focus();
                        } else {
                            items[index - 1]?.focus();
                        }
                        break;
                    case 'Escape':
                        closeDropdown(dropdown, menu);
                        toggle.focus();
                        break;
                    case 'Tab':
                        if (!e.shiftKey && index === items.length - 1) {
                            closeDropdown(dropdown, menu);
                        }
                        break;
                }
            });
        });
    }

    /**
     * Open dropdown with animation
     */
    function openDropdown(dropdown, menu) {
        const state = dropdownState.get(dropdown);
        if (!state || state.isOpen) return;

        // Close other dropdowns
        closeAllDropdowns(dropdown);

        // Update state
        state.isOpen = true;

        // Add classes
        dropdown.classList.add('show');
        menu.classList.add('show');

        // Force reflow for animation
        menu.offsetHeight;

        // Trigger animation
        requestAnimationFrame(() => {
            menu.style.visibility = 'visible';
            menu.style.opacity = '1';
            menu.style.transform = 'translateY(0) scale(1)';
            menu.style.pointerEvents = 'auto';
        });

        // Announce to screen readers
        menu.setAttribute('aria-expanded', 'true');

        // Dispatch custom event
        dropdown.dispatchEvent(new CustomEvent('dropdown.opened', { detail: { menu } }));
    }

    /**
     * Close dropdown with animation
     */
    function closeDropdown(dropdown, menu) {
        const state = dropdownState.get(dropdown);
        if (!state || !state.isOpen) return;

        // Update state
        state.isOpen = false;

        // Start closing animation
        menu.style.opacity = '0';
        menu.style.transform = 'translateY(-10px) scale(0.95)';

        // Wait for animation to complete
        setTimeout(() => {
            if (!state.isOpen) { // Check if not reopened
                dropdown.classList.remove('show');
                menu.classList.remove('show');
                menu.style.visibility = 'hidden';
                menu.style.pointerEvents = 'none';

                // Clear inline styles
                menu.style.opacity = '';
                menu.style.transform = '';
            }
        }, CONFIG.animationDuration);

        // Clear timers
        clearTimeout(state.hoverTimer);
        clearTimeout(state.hideTimer);

        // Update ARIA
        menu.setAttribute('aria-expanded', 'false');

        // Dispatch custom event
        dropdown.dispatchEvent(new CustomEvent('dropdown.closed', { detail: { menu } }));
    }

    /**
     * Close all dropdowns except specified
     */
    function closeAllDropdowns(except = null) {
        dropdownState.forEach((state, dropdown) => {
            if (dropdown !== except && state.isOpen) {
                closeDropdown(dropdown, state.menu);
            }
        });
    }

    /**
     * Check if dropdown should be center-aligned
     */
    function shouldCenterAlign(dropdown) {
        const rect = dropdown.getBoundingClientRect();
        const viewportWidth = window.innerWidth;
        const dropdownCenter = rect.left + (rect.width / 2);
        const threshold = viewportWidth * 0.3; // 30% from edges

        return dropdownCenter > threshold && dropdownCenter < (viewportWidth - threshold);
    }

    /**
     * Setup global event listeners
     */
    function setupGlobalListeners() {
        // Close on outside click
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown')) {
                closeAllDropdowns();
            }
        });

        // Close on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeAllDropdowns();
            }
        });

        // Handle window resize
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                // Reinitialize on resize
                dropdownState.clear();
                initDropdowns();
            }, 250);
        });

        // Handle scroll (optional: close dropdowns on scroll)
        let scrolling = false;
        window.addEventListener('scroll', function() {
            if (!scrolling) {
                scrolling = true;
                setTimeout(() => {
                    closeAllDropdowns();
                    scrolling = false;
                }, 100);
            }
        });
    }

    /**
     * Observe DOM changes for dynamic content
     */
    function observeDOMChanges() {
        if (!window.MutationObserver) return;

        const observer = new MutationObserver(function(mutations) {
            let shouldReinit = false;

            mutations.forEach(function(mutation) {
                if (mutation.type === 'childList') {
                    // Check if navbar structure changed
                    if (mutation.target.classList.contains('navbar') ||
                        mutation.target.closest('.navbar')) {
                        shouldReinit = true;
                    }
                }
            });

            if (shouldReinit) {
                setTimeout(() => {
                    dropdownState.clear();
                    initDropdowns();
                }, 100);
            }
        });

        const navbar = document.querySelector('.navbar');
        if (navbar) {
            observer.observe(navbar, {
                childList: true,
                subtree: true
            });
        }
    }

    /**
     * Public API
     */
    window.DropdownController = {
        init: initDropdowns,
        open: function(selector) {
            const dropdown = document.querySelector(selector);
            if (dropdown) {
                const menu = dropdown.querySelector('.dropdown-menu');
                if (menu) openDropdown(dropdown, menu);
            }
        },
        close: function(selector) {
            const dropdown = document.querySelector(selector);
            if (dropdown) {
                const menu = dropdown.querySelector('.dropdown-menu');
                if (menu) closeDropdown(dropdown, menu);
            }
        },
        closeAll: closeAllDropdowns,
        refresh: function() {
            dropdownState.clear();
            initDropdowns();
        }
    };

    // Initialize on various events
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initDropdowns);
    } else {
        initDropdowns();
    }

    // Moodle specific initialization
    if (window.require && window.require.defined('core/first')) {
        window.require(['core/first'], function() {
            setTimeout(initDropdowns, 100);
        });
    }

    // jQuery initialization (if available)
    if (typeof jQuery !== 'undefined') {
        jQuery(document).ready(function() {
            setTimeout(initDropdowns, 100);
        });
    }

})();