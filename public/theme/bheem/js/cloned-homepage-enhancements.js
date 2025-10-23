/**
 * Cloned Homepage Enhanced Functionality
 * Special features and development tools for the cloned homepage
 */

document.addEventListener('DOMContentLoaded', function() {

    // Only run on cloned homepage
    if (!document.body.classList.contains('cloned-homepage-layout') &&
        !document.querySelector('meta[name="homepage-type"][content="cloned"]')) {
        return;
    }

    console.log('🎨 Cloned Homepage Enhancements Loading...');

    // ============================================
    // DEVELOPMENT TOOLS PANEL
    // ============================================

    function addDevelopmentTools() {
        // Create development info panel
        const devInfo = document.createElement('div');
        devInfo.className = 'cloned-homepage-dev-info';
        devInfo.innerHTML = `
            <strong>📋 Clone Dev Info:</strong><br>
            <small>
                • URL: /clone-homepage.php<br>
                • Layout: cloned_homepage<br>
                • Template: cloned_drawers.php<br>
                • CSS: cloned-homepage-custom.css<br>
                • Last Modified: ${new Date().toLocaleDateString()}
            </small>
        `;
        document.body.appendChild(devInfo);

        // Create quick action buttons
        const actions = document.createElement('div');
        actions.className = 'cloned-homepage-actions';
        actions.innerHTML = `
            <button class="btn btn-sm btn-primary" onclick="location.href='/'">📋 Original</button>
            <button class="btn btn-sm btn-success" onclick="location.reload()">🔄 Refresh</button>
            <button class="btn btn-sm btn-warning" onclick="toggleEditMode()">✏️ Edit</button>
            <button class="btn btn-sm btn-info" onclick="showCloneInfo()">ℹ️ Info</button>
        `;
        document.body.appendChild(actions);
    }

    // ============================================
    // CLONE-SPECIFIC FEATURES
    // ============================================

    function addCloneFeatures() {
        // Add comparison link in banner
        const banner = document.querySelector('.cloned-homepage-banner');
        if (banner) {
            const compareBtn = document.createElement('div');
            compareBtn.className = 'mt-2';
            compareBtn.innerHTML = `
                <small>
                    <a href="#" onclick="openSideBySide()" class="text-primary">
                        <i class="fas fa-columns"></i> Compare with Original
                    </a>
                </small>
            `;
            banner.appendChild(compareBtn);
        }

        // Add clone-specific metadata
        document.head.insertAdjacentHTML('beforeend', `
            <meta name="clone-version" content="1.0">
            <meta name="clone-created" content="${new Date().toISOString()}">
            <meta name="clone-purpose" content="development-testing">
        `);

        // Add special styling to editable areas
        setTimeout(() => {
            const editableAreas = document.querySelectorAll('.block, .activity, .section');
            editableAreas.forEach(area => {
                area.setAttribute('data-clone-editable', 'true');
                area.title = 'This area can be customized independently from the main homepage';
            });
        }, 1000);
    }

    // ============================================
    // INTERACTIVE FUNCTIONS
    // ============================================

    window.toggleEditMode = function() {
        const body = document.body;
        const isEditing = body.classList.toggle('clone-edit-mode');

        if (isEditing) {
            // Add edit mode styles
            const style = document.createElement('style');
            style.id = 'clone-edit-styles';
            style.textContent = `
                .clone-edit-mode [data-clone-editable="true"] {
                    border: 2px dashed #28a745 !important;
                    position: relative !important;
                }
                .clone-edit-mode [data-clone-editable="true"]:hover {
                    background: rgba(40, 167, 69, 0.1) !important;
                }
                .clone-edit-mode [data-clone-editable="true"]::before {
                    content: "✏️ EDITABLE AREA";
                    position: absolute;
                    top: -25px;
                    left: 0;
                    background: #28a745;
                    color: white;
                    font-size: 0.7rem;
                    padding: 2px 8px;
                    border-radius: 3px;
                    z-index: 1000;
                }
            `;
            document.head.appendChild(style);

            alert('🎨 Edit Mode Enabled!\nGreen dashed borders show areas that can be customized independently from the main homepage.');
        } else {
            // Remove edit mode styles
            const editStyles = document.getElementById('clone-edit-styles');
            if (editStyles) {
                editStyles.remove();
            }
        }
    };

    window.showCloneInfo = function() {
        const modal = document.createElement('div');
        modal.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.7);
            z-index: 10000;
            display: flex;
            align-items: center;
            justify-content: center;
        `;

        modal.innerHTML = `
            <div style="background: white; padding: 30px; border-radius: 10px; max-width: 600px; width: 90%;">
                <h3>📋 Cloned Homepage Information</h3>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <h5>📄 File Structure:</h5>
                        <ul class="small">
                            <li><strong>Main PHP File:</strong><br><code>/clone-homepage.php</code></li>
                            <li><strong>Layout Template:</strong><br><code>/theme/edoo/layout/cloned_drawers.php</code></li>
                            <li><strong>Mustache Template:</strong><br><code>/theme/edoo/templates/cloned_drawers.mustache</code></li>
                            <li><strong>Custom CSS:</strong><br><code>/theme/edoo/style/cloned-homepage-custom.css</code></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h5>🎨 Customization:</h5>
                        <ul class="small">
                            <li>All original homepage content is preserved</li>
                            <li>Independent CSS customization possible</li>
                            <li>Separate layout template for modifications</li>
                            <li>Development-specific visual indicators</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-3">
                    <h5>🔧 Usage:</h5>
                    <p class="small">
                        This cloned homepage is identical to the main homepage but allows you to:
                        <br>• Test design changes safely
                        <br>• Customize layouts independently
                        <br>• Develop new features without affecting the main site
                        <br>• Compare different design approaches
                    </p>
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-primary" onclick="this.parentElement.parentElement.parentElement.remove()">
                        Close
                    </button>
                </div>
            </div>
        `;

        document.body.appendChild(modal);

        // Close on background click
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.remove();
            }
        });
    };

    window.openSideBySide = function() {
        const originalUrl = window.location.origin;
        const cloneUrl = window.location.origin + '/clone-homepage.php';

        // Open both in new windows
        const original = window.open(originalUrl, 'original', 'width=800,height=600,left=0');
        const clone = window.open(cloneUrl, 'clone', 'width=800,height=600,left=820');

        // Focus on clone window
        if (clone) {
            clone.focus();
        }
    };

    // ============================================
    // PERFORMANCE MONITORING
    // ============================================

    function addPerformanceMonitoring() {
        // Monitor page load time
        window.addEventListener('load', function() {
            const loadTime = performance.now();
            console.log(`📊 Cloned Homepage Load Time: ${Math.round(loadTime)}ms`);

            // Add load time to dev info panel
            setTimeout(() => {
                const devInfo = document.querySelector('.cloned-homepage-dev-info');
                if (devInfo) {
                    devInfo.innerHTML += `<br><small>⚡ Load Time: ${Math.round(loadTime)}ms</small>`;
                }
            }, 500);
        });

        // Monitor resource loading
        const observer = new PerformanceObserver((list) => {
            const entries = list.getEntries();
            entries.forEach(entry => {
                if (entry.duration > 1000) { // Log slow resources
                    console.warn(`⚠️ Slow resource: ${entry.name} (${Math.round(entry.duration)}ms)`);
                }
            });
        });

        observer.observe({ entryTypes: ['resource'] });
    }

    // ============================================
    // ACCESSIBILITY ENHANCEMENTS
    // ============================================

    function addAccessibilityEnhancements() {
        // Add skip link for cloned homepage
        const skipLink = document.createElement('a');
        skipLink.href = '#region-main';
        skipLink.className = 'sr-only sr-only-focusable btn btn-primary';
        skipLink.textContent = 'Skip to cloned homepage content';
        skipLink.style.cssText = `
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 10001;
        `;
        document.body.insertBefore(skipLink, document.body.firstChild);

        // Add ARIA labels for clone-specific elements
        const cloneElements = document.querySelectorAll('.cloned-homepage-banner, .cloned-homepage-footer');
        cloneElements.forEach(element => {
            element.setAttribute('role', 'region');
            element.setAttribute('aria-label', 'Cloned homepage information');
        });
    }

    // ============================================
    // INITIALIZATION
    // ============================================

    function initializeClonedHomepage() {
        console.log('🚀 Initializing Cloned Homepage Features...');

        // Add all features
        addDevelopmentTools();
        addCloneFeatures();
        addPerformanceMonitoring();
        addAccessibilityEnhancements();

        // Add clone-specific event listeners
        document.addEventListener('keydown', function(e) {
            // Alt + C to toggle clone info
            if (e.altKey && e.key === 'c') {
                e.preventDefault();
                showCloneInfo();
            }

            // Alt + E to toggle edit mode
            if (e.altKey && e.key === 'e') {
                e.preventDefault();
                toggleEditMode();
            }

            // Alt + O to open original
            if (e.altKey && e.key === 'o') {
                e.preventDefault();
                window.open('/', '_blank');
            }
        });

        // Notify user of keyboard shortcuts
        setTimeout(() => {
            console.log(`
🎨 CLONED HOMEPAGE KEYBOARD SHORTCUTS:
• Alt + C: Show clone information
• Alt + E: Toggle edit mode (highlight editable areas)
• Alt + O: Open original homepage in new tab
• Alt + S: Side-by-side comparison
            `);
        }, 2000);

        console.log('✅ Cloned Homepage Features Initialized Successfully!');
    }

    // Run initialization
    initializeClonedHomepage();

    // Add visual confirmation
    setTimeout(() => {
        const confirmation = document.createElement('div');
        confirmation.style.cssText = `
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #28a745;
            color: white;
            padding: 20px 30px;
            border-radius: 10px;
            text-align: center;
            font-weight: bold;
            z-index: 10000;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            animation: fadeInOut 3s ease-in-out;
        `;

        confirmation.innerHTML = `
            <div style="font-size: 2em; margin-bottom: 10px;">🎉</div>
            <div>Cloned Homepage Loaded Successfully!</div>
            <div style="font-size: 0.8em; margin-top: 5px;">Ready for independent customization</div>
        `;

        // Add fadeInOut animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeInOut {
                0% { opacity: 0; transform: translate(-50%, -50%) scale(0.8); }
                20% { opacity: 1; transform: translate(-50%, -50%) scale(1); }
                80% { opacity: 1; transform: translate(-50%, -50%) scale(1); }
                100% { opacity: 0; transform: translate(-50%, -50%) scale(0.8); }
            }
        `;
        document.head.appendChild(style);
        document.body.appendChild(confirmation);

        // Remove confirmation after animation
        setTimeout(() => {
            confirmation.remove();
            style.remove();
        }, 3000);
    }, 1000);

});