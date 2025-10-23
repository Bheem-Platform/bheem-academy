/**
 * Force Dropdown Visibility - Critical Fix
 * Ensures dropdowns always work regardless of CSS conflicts
 */

(function() {
    'use strict';

    console.log('Dropdown Force Fix: Initializing...');

    function forceDropdownFix() {
        // Get all dropdowns
        const dropdowns = document.querySelectorAll('.navbar .dropdown, .navbar .nav-item.dropdown');

        if (!dropdowns.length) {
            console.log('Dropdown Force Fix: No dropdowns found, retrying...');
            setTimeout(forceDropdownFix, 500);
            return;
        }

        console.log('Dropdown Force Fix: Found ' + dropdowns.length + ' dropdowns');

        dropdowns.forEach(function(dropdown, index) {
            const menu = dropdown.querySelector('.dropdown-menu');
            if (!menu) {
                console.log('Dropdown Force Fix: No menu found for dropdown ' + index);
                return;
            }

            // Remove any conflicting styles
            menu.style.removeProperty('display');
            menu.style.removeProperty('visibility');
            menu.style.removeProperty('opacity');

            // Set initial state
            menu.style.display = 'none';

            // Mouse enter - show dropdown
            dropdown.addEventListener('mouseenter', function() {
                console.log('Dropdown Force Fix: Mouse enter on dropdown ' + index);

                // Hide other dropdowns
                dropdowns.forEach(function(otherDropdown) {
                    const otherMenu = otherDropdown.querySelector('.dropdown-menu');
                    if (otherMenu && otherMenu !== menu) {
                        otherMenu.style.display = 'none';
                        otherDropdown.classList.remove('show');
                    }
                });

                // Show this dropdown
                menu.style.display = 'block';
                menu.style.visibility = 'visible';
                menu.style.opacity = '1';
                menu.style.pointerEvents = 'auto';
                menu.style.position = 'absolute';
                menu.style.top = '100%';
                menu.style.left = '0';
                menu.style.zIndex = '99999';
                dropdown.classList.add('show');
                menu.classList.add('show');
            });

            // Mouse leave - hide dropdown
            dropdown.addEventListener('mouseleave', function() {
                console.log('Dropdown Force Fix: Mouse leave on dropdown ' + index);

                setTimeout(function() {
                    if (!dropdown.matches(':hover')) {
                        menu.style.display = 'none';
                        dropdown.classList.remove('show');
                        menu.classList.remove('show');
                    }
                }, 100);
            });

            // Click handler for toggle
            const toggle = dropdown.querySelector('.dropdown-toggle');
            if (toggle) {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    console.log('Dropdown Force Fix: Click on toggle ' + index);

                    const isVisible = menu.style.display === 'block';

                    // Hide all dropdowns
                    dropdowns.forEach(function(otherDropdown) {
                        const otherMenu = otherDropdown.querySelector('.dropdown-menu');
                        if (otherMenu) {
                            otherMenu.style.display = 'none';
                            otherDropdown.classList.remove('show');
                        }
                    });

                    // Toggle this dropdown
                    if (!isVisible) {
                        menu.style.display = 'block';
                        menu.style.visibility = 'visible';
                        menu.style.opacity = '1';
                        menu.style.pointerEvents = 'auto';
                        dropdown.classList.add('show');
                        menu.classList.add('show');
                    }
                });
            }

            // Prevent menu from closing when clicking inside
            menu.addEventListener('click', function(e) {
                e.stopPropagation();
            });

            console.log('Dropdown Force Fix: Setup complete for dropdown ' + index);
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown')) {
                dropdowns.forEach(function(dropdown) {
                    const menu = dropdown.querySelector('.dropdown-menu');
                    if (menu) {
                        menu.style.display = 'none';
                        dropdown.classList.remove('show');
                    }
                });
            }
        });

        console.log('Dropdown Force Fix: All dropdowns initialized');
    }

    // Try multiple initialization methods
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', forceDropdownFix);
    } else {
        forceDropdownFix();
    }

    // Also try after a delay
    setTimeout(forceDropdownFix, 1000);

    // Listen for dynamic content
    if (window.MutationObserver) {
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === 'childList') {
                    const hasDropdown = mutation.target.querySelector('.dropdown');
                    if (hasDropdown) {
                        console.log('Dropdown Force Fix: DOM changed, reinitializing...');
                        setTimeout(forceDropdownFix, 100);
                    }
                }
            });
        });

        const targetNode = document.querySelector('.navbar') || document.body;
        observer.observe(targetNode, {
            childList: true,
            subtree: true
        });
    }

    // Expose global function for debugging
    window.forceShowDropdowns = function() {
        const menus = document.querySelectorAll('.navbar .dropdown-menu');
        menus.forEach(function(menu) {
            menu.style.display = 'block';
            menu.style.visibility = 'visible';
            menu.style.opacity = '1';
            menu.style.background = 'white';
            menu.style.border = '2px solid red';
            menu.style.zIndex = '99999';
        });
        console.log('Force showed ' + menus.length + ' dropdown menus');
    };

    console.log('Dropdown Force Fix: Script loaded');

})();