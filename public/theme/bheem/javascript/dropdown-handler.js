/**
 * Dropdown Handler for Moodle Navbar
 * Ensures dropdowns work properly on hover and click
 */

(function() {
    'use strict';

    // Wait for DOM to be ready
    function initDropdowns() {
        // Get all dropdown toggles
        const dropdowns = document.querySelectorAll('.navbar .dropdown, .navbar .nav-item.dropdown');

        if (!dropdowns.length) {
            // Try again if dropdowns not found yet
            setTimeout(initDropdowns, 500);
            return;
        }

        dropdowns.forEach(function(dropdown) {
            let timeout;
            const menu = dropdown.querySelector('.dropdown-menu');

            if (!menu) return;

            // Mouse enter - show dropdown
            dropdown.addEventListener('mouseenter', function() {
                clearTimeout(timeout);
                // Remove 'show' from other dropdowns
                closeOtherDropdowns(dropdown);
                // Add 'show' class
                dropdown.classList.add('show');
                menu.classList.add('show');
                menu.style.display = 'block';
                menu.style.opacity = '1';
                menu.style.visibility = 'visible';
            });

            // Mouse leave - hide dropdown with delay
            dropdown.addEventListener('mouseleave', function() {
                timeout = setTimeout(function() {
                    dropdown.classList.remove('show');
                    menu.classList.remove('show');
                    menu.style.display = '';
                    menu.style.opacity = '';
                    menu.style.visibility = '';
                }, 300);
            });

            // Click toggle for mobile and accessibility
            const toggle = dropdown.querySelector('.dropdown-toggle');
            if (toggle) {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    const isOpen = dropdown.classList.contains('show');

                    // Close all other dropdowns
                    closeAllDropdowns();

                    if (!isOpen) {
                        dropdown.classList.add('show');
                        menu.classList.add('show');
                        menu.style.display = 'block';
                        menu.style.opacity = '1';
                        menu.style.visibility = 'visible';
                    }
                });
            }

            // Prevent dropdown from closing when clicking inside
            menu.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown')) {
                closeAllDropdowns();
            }
        });

        // Close dropdowns on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeAllDropdowns();
            }
        });
    }

    function closeOtherDropdowns(currentDropdown) {
        const dropdowns = document.querySelectorAll('.navbar .dropdown, .navbar .nav-item.dropdown');
        dropdowns.forEach(function(dropdown) {
            if (dropdown !== currentDropdown) {
                const menu = dropdown.querySelector('.dropdown-menu');
                if (menu) {
                    dropdown.classList.remove('show');
                    menu.classList.remove('show');
                    menu.style.display = '';
                    menu.style.opacity = '';
                    menu.style.visibility = '';
                }
            }
        });
    }

    function closeAllDropdowns() {
        const dropdowns = document.querySelectorAll('.navbar .dropdown, .navbar .nav-item.dropdown');
        dropdowns.forEach(function(dropdown) {
            const menu = dropdown.querySelector('.dropdown-menu');
            if (menu) {
                dropdown.classList.remove('show');
                menu.classList.remove('show');
                menu.style.display = '';
                menu.style.opacity = '';
                menu.style.visibility = '';
            }
        });
    }

    // Initialize on different events to ensure it works
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initDropdowns);
    } else {
        initDropdowns();
    }

    // Also initialize after Moodle's JavaScript loads
    if (window.require && window.require.defined('core/first')) {
        window.require(['core/first'], function() {
            setTimeout(initDropdowns, 100);
        });
    }

    // Reinitialize if the page content changes (AJAX)
    if (window.MutationObserver) {
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === 'childList' && mutation.target.classList.contains('navbar')) {
                    initDropdowns();
                }
            });
        });

        const navbar = document.querySelector('.navbar');
        if (navbar) {
            observer.observe(navbar, { childList: true, subtree: true });
        }
    }

})();