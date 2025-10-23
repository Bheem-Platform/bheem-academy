/**
 * Final Dropdown Handler - Smooth Open/Close
 * Only affects header navbar dropdowns
 */

(function() {
    'use strict';

    let hoverTimeout = null;
    let closeTimeout = null;

    function initHeaderDropdowns() {
        // Only target header navbar dropdowns
        const navbarDropdowns = document.querySelectorAll('.navbar .dropdown, .navbar .nav-item.dropdown');

        if (!navbarDropdowns.length) {
            // Retry if navbar not ready
            if (document.readyState !== 'complete') {
                setTimeout(initHeaderDropdowns, 100);
            }
            return;
        }

        navbarDropdowns.forEach(function(dropdown) {
            const menu = dropdown.querySelector('.dropdown-menu');
            if (!menu) return;

            let isOpen = false;

            // Smooth hover handling with delay
            dropdown.addEventListener('mouseenter', function() {
                // Clear any close timeout
                if (closeTimeout) {
                    clearTimeout(closeTimeout);
                    closeTimeout = null;
                }

                // Small delay before opening
                hoverTimeout = setTimeout(function() {
                    if (!isOpen) {
                        openDropdown(dropdown, menu);
                        isOpen = true;
                    }
                }, 100); // 100ms delay before opening
            });

            dropdown.addEventListener('mouseleave', function() {
                // Clear any open timeout
                if (hoverTimeout) {
                    clearTimeout(hoverTimeout);
                    hoverTimeout = null;
                }

                // Delay before closing
                closeTimeout = setTimeout(function() {
                    if (isOpen) {
                        closeDropdown(dropdown, menu);
                        isOpen = false;
                    }
                }, 200); // 200ms delay before closing
            });

            // Click handler for mobile/accessibility
            const toggle = dropdown.querySelector('.dropdown-toggle');
            if (toggle) {
                toggle.addEventListener('click', function(e) {
                    // Only handle click on mobile or if dropdown is closed
                    if (window.innerWidth <= 991 || !isOpen) {
                        e.preventDefault();
                        e.stopPropagation();

                        if (isOpen) {
                            closeDropdown(dropdown, menu);
                            isOpen = false;
                        } else {
                            // Close other dropdowns
                            closeAllDropdowns();
                            openDropdown(dropdown, menu);
                            isOpen = true;
                        }
                    }
                });
            }

            // Prevent closing when clicking inside menu
            menu.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.navbar .dropdown')) {
                closeAllDropdowns();
            }
        });

        // Close on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeAllDropdowns();
            }
        });
    }

    function openDropdown(dropdown, menu) {
        // Add show class
        dropdown.classList.add('show');
        menu.classList.add('show');

        // Ensure styles are applied for smooth transition
        requestAnimationFrame(function() {
            menu.style.opacity = '1';
            menu.style.visibility = 'visible';
            menu.style.transform = 'translateY(0)';
            menu.style.pointerEvents = 'auto';
        });
    }

    function closeDropdown(dropdown, menu) {
        // Remove show class
        dropdown.classList.remove('show');
        menu.classList.remove('show');

        // Apply closing styles
        menu.style.opacity = '0';
        menu.style.visibility = 'hidden';
        menu.style.transform = 'translateY(-5px)';
        menu.style.pointerEvents = 'none';
    }

    function closeAllDropdowns() {
        const openDropdowns = document.querySelectorAll('.navbar .dropdown.show');
        openDropdowns.forEach(function(dropdown) {
            const menu = dropdown.querySelector('.dropdown-menu');
            if (menu) {
                closeDropdown(dropdown, menu);
            }
        });
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initHeaderDropdowns);
    } else {
        initHeaderDropdowns();
    }

    // Reinitialize on window resize
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(initHeaderDropdowns, 250);
    });

})();