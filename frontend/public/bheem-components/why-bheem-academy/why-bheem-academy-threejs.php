<style>
    /* Why Bheem Academy - Three.js N8N-Style 3D Design - v3.0 */
    .why-bheem-academy-3d {
        padding: 60px 0 40px;
        background: #1a1a1a;
        position: relative;
        overflow: hidden;
        opacity: 0;
        transform: translateY(80px) scale(0.95);
        transition: opacity 1.5s cubic-bezier(0.16, 1, 0.3, 1),
                    transform 1.5s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .why-bheem-academy-3d.animate-in {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

    /* Container */
    .why-bheem-container-3d {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 30px;
        position: relative;
        z-index: 3;
    }

    /* Header Section */
    .why-bheem-header-3d {
        text-align: center;
        margin-bottom: 60px;
        animation: fadeInUp 1s ease-out;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .why-bheem-badge-3d {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 12px 28px;
        background: rgba(255, 255, 255, 0.1);
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 100px;
        color: #ffffff;
        font-size: 15px;
        font-weight: 700;
        margin-bottom: 24px;
        box-shadow:
            0 4px 20px rgba(255, 255, 255, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(12px);
    }

    .why-bheem-badge-3d i {
        font-size: 20px;
        color: #ffffff;
        filter: drop-shadow(0 2px 8px rgba(255, 255, 255, 0.3));
    }

    .why-bheem-title-3d {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 900;
        margin: 0 0 12px 0;
        line-height: 1.1;
        letter-spacing: -0.03em;
        position: relative;
    }

    .why-bheem-title-3d .highlight {
        background: linear-gradient(135deg,
            #667eea 0%,
            #764ba2 25%,
            #f093fb 50%,
            #8b5cf6 75%,
            #667eea 100%);
        background-size: 200% 200%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: gradientShift 8s ease infinite;
    }

    @keyframes gradientShift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .why-bheem-title-3d .white-text {
        color: #ffffff;
    }

    .why-bheem-subtitle-3d {
        font-size: clamp(1rem, 1.5vw, 1.35rem);
        font-weight: 600;
        color: #ffffff;
        margin: 0 0 30px 0;
        letter-spacing: 0.01em;
        background: linear-gradient(135deg,
            rgba(102, 126, 234, 0.15) 0%,
            rgba(118, 75, 162, 0.1) 25%,
            rgba(240, 147, 251, 0.15) 50%,
            rgba(139, 92, 246, 0.1) 75%,
            rgba(102, 126, 234, 0.15) 100%);
        backdrop-filter: blur(15px) saturate(150%);
        padding: 12px 30px;
        border-radius: 25px;
        border: 1px solid rgba(255, 255, 255, 0.15);
        display: inline-block;
        box-shadow: 0 4px 20px rgba(102, 126, 234, 0.2);
    }

    .why-bheem-description-3d {
        font-size: clamp(1rem, 1.5vw, 1.15rem);
        color: rgba(241, 245, 249, 0.95);
        max-width: 850px;
        margin: 0 auto 40px auto;
        line-height: 1.8;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.6);
        background: linear-gradient(90deg,
            rgba(255, 255, 255, 0.08) 0%,
            rgba(255, 255, 255, 0.04) 50%,
            rgba(255, 255, 255, 0.08) 100%);
        padding: 20px 30px;
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(8px);
    }

    /* Three.js Canvas Container */
    .threejs-canvas-container {
        position: relative;
        width: 100%;
        height: 700px;
        margin: 80px 0;
        border-radius: 24px;
        overflow: hidden;
        background: linear-gradient(135deg,
            rgba(26, 26, 26, 0.95) 0%,
            rgba(31, 31, 31, 0.9) 50%,
            rgba(26, 26, 26, 0.95) 100%);
        border: 2px solid rgba(255, 255, 255, 0.1);
        box-shadow:
            0 20px 60px rgba(0, 0, 0, 0.5),
            inset 0 1px 2px rgba(255, 255, 255, 0.1);
    }

    #threejs-canvas {
        width: 100%;
        height: 100%;
        display: block;
        cursor: grab;
    }

    #threejs-canvas:active {
        cursor: grabbing;
    }

    /* Loading Overlay */
    .canvas-loading {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background: rgba(26, 26, 26, 0.95);
        z-index: 10;
        transition: opacity 0.5s ease;
    }

    .canvas-loading.hidden {
        opacity: 0;
        pointer-events: none;
    }

    .loading-spinner {
        width: 60px;
        height: 60px;
        border: 4px solid rgba(139, 92, 246, 0.2);
        border-top-color: #8b5cf6;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    .loading-text {
        margin-top: 20px;
        color: rgba(255, 255, 255, 0.8);
        font-size: 14px;
        font-weight: 600;
    }

    /* Canvas Controls Info */
    .canvas-controls {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 20px;
        padding: 12px 24px;
        background: rgba(26, 26, 26, 0.9);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 50px;
        backdrop-filter: blur(10px);
        z-index: 5;
    }

    .control-item {
        display: flex;
        align-items: center;
        gap: 8px;
        color: rgba(255, 255, 255, 0.8);
        font-size: 13px;
        font-weight: 600;
    }

    .control-item i {
        color: #8b5cf6;
        font-size: 16px;
    }

    /* Stats Display */
    .canvas-stats {
        position: absolute;
        top: 20px;
        right: 20px;
        padding: 12px 20px;
        background: rgba(26, 26, 26, 0.9);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        backdrop-filter: blur(10px);
        z-index: 5;
        font-family: 'Courier New', monospace;
        font-size: 12px;
        color: #10b981;
    }

    .stat-line {
        margin: 4px 0;
    }

    /* CTA Section */
    .why-bheem-cta-3d {
        text-align: center;
        margin-top: 80px;
        animation: fadeInUp 1s ease-out 0.4s backwards;
    }

    .why-bheem-cta-button-3d {
        display: inline-flex;
        align-items: center;
        gap: 15px;
        padding: 18px 45px;
        background: linear-gradient(135deg,
            #8b5cf6 0%,
            #a855f7 30%,
            #ec4899 70%,
            #f472b6 100%);
        color: white;
        text-decoration: none;
        border-radius: 60px;
        font-weight: 800;
        font-size: 1.15rem;
        transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow:
            0 18px 45px rgba(139, 92, 246, 0.4),
            0 10px 25px rgba(236, 72, 153, 0.3),
            inset 0 2px 0 rgba(255, 255, 255, 0.3);
        border: 3px solid rgba(255, 255, 255, 0.4);
        position: relative;
        overflow: hidden;
    }

    .why-bheem-cta-button-3d:hover {
        transform: translateY(-5px) scale(1.05);
        box-shadow:
            0 25px 60px rgba(139, 92, 246, 0.5),
            0 15px 35px rgba(236, 72, 153, 0.4),
            inset 0 2px 0 rgba(255, 255, 255, 0.4);
    }

    /* Stats Bar */
    .why-bheem-stats-3d {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-top: 70px;
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
        animation: fadeInUp 1s ease-out 0.5s backwards;
    }

    .stat-item-3d {
        text-align: center;
        padding: 40px 32px;
        background: linear-gradient(135deg,
            rgba(139, 92, 246, 0.15) 0%,
            rgba(168, 85, 247, 0.1) 25%,
            rgba(236, 72, 153, 0.15) 50%,
            rgba(244, 114, 182, 0.1) 75%,
            rgba(139, 92, 246, 0.15) 100%);
        backdrop-filter: blur(20px) saturate(150%);
        border-radius: 24px;
        border: 2px solid rgba(255, 255, 255, 0.2);
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow:
            0 10px 40px rgba(139, 92, 246, 0.25),
            0 5px 20px rgba(236, 72, 153, 0.15);
    }

    .stat-item-3d:hover {
        transform: translateY(-10px) scale(1.03);
        box-shadow:
            0 20px 60px rgba(139, 92, 246, 0.4),
            0 10px 30px rgba(236, 72, 153, 0.3);
    }

    .stat-value-3d {
        font-size: clamp(2.5rem, 4vw, 3.5rem);
        font-weight: 900;
        display: block;
        line-height: 1;
        margin-bottom: 12px;
        background: linear-gradient(135deg,
            #8b5cf6 0%,
            #a855f7 30%,
            #ec4899 70%,
            #f472b6 100%);
        background-size: 200% 200%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: gradientShift 8s ease infinite;
    }

    .stat-label-3d {
        font-size: 0.875rem;
        color: rgba(255, 255, 255, 0.9);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.1em;
    }

    /* Responsive Design */
    @media (max-width: 1023px) {
        .threejs-canvas-container {
            height: 600px;
        }
    }

    @media (max-width: 767px) {
        .threejs-canvas-container {
            height: 500px;
            margin: 60px 0;
        }

        .canvas-controls {
            flex-direction: column;
            gap: 8px;
            padding: 10px 20px;
        }

        .why-bheem-stats-3d {
            grid-template-columns: 1fr;
            max-width: 400px;
        }
    }

    @media (max-width: 479px) {
        .threejs-canvas-container {
            height: 400px;
        }

        .canvas-stats {
            top: 10px;
            right: 10px;
            padding: 8px 12px;
            font-size: 10px;
        }
    }
</style>

<!-- Why Bheem Academy Section - Three.js 3D Version -->
<section class="why-bheem-academy-3d">
    <div class="why-bheem-container-3d">
        <!-- Header -->
        <div class="why-bheem-header-3d">
            <div class="why-bheem-badge-3d">
                <i class="fas fa-star"></i>
                <span>Kerala's Premier AI Academy</span>
            </div>
            <h2 class="why-bheem-title-3d">
                <span class="white-text">Why </span>
                <span class="highlight">Bheem Academy</span>
                <span class="white-text">?</span>
            </h2>
            <p class="why-bheem-subtitle-3d">
                Kerala's First <span class="accent">Fully Fledged AI Academy</span>
            </p>
            <p class="why-bheem-description-3d">
                Experience the future of education with cutting-edge 3D visualization, WebGL-powered animations,
                and interactive learning paths designed to accelerate your success.
            </p>
        </div>

        <!-- Three.js Canvas Container -->
        <div class="threejs-canvas-container">
            <canvas id="threejs-canvas"></canvas>

            <!-- Loading Overlay -->
            <div class="canvas-loading" id="canvas-loading">
                <div class="loading-spinner"></div>
                <div class="loading-text">Loading 3D Experience...</div>
            </div>

            <!-- Canvas Stats -->
            <div class="canvas-stats" id="canvas-stats">
                <div class="stat-line">FPS: <span id="fps-counter">60</span></div>
                <div class="stat-line">Nodes: <span id="node-count">7</span></div>
                <div class="stat-line">Particles: <span id="particle-count">0</span></div>
            </div>

            <!-- Canvas Controls Info -->
            <div class="canvas-controls">
                <div class="control-item">
                    <i class="fas fa-mouse"></i>
                    <span>Drag to Rotate</span>
                </div>
                <div class="control-item">
                    <i class="fas fa-arrows-alt"></i>
                    <span>Scroll to Zoom</span>
                </div>
                <div class="control-item">
                    <i class="fas fa-hand-pointer"></i>
                    <span>Click Nodes</span>
                </div>
            </div>
        </div>

        <!-- CTA Button -->
        <div class="why-bheem-cta-3d">
            <a href="#enroll" class="why-bheem-cta-button-3d">
                <span>Start Your Journey</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <!-- Stats Bar -->
        <div class="why-bheem-stats-3d">
            <div class="stat-item-3d">
                <span class="stat-value-3d">10K+</span>
                <span class="stat-label-3d">Students</span>
            </div>
            <div class="stat-item-3d">
                <span class="stat-value-3d">500+</span>
                <span class="stat-label-3d">AI Courses</span>
            </div>
            <div class="stat-item-3d">
                <span class="stat-value-3d">95%</span>
                <span class="stat-label-3d">Success Rate</span>
            </div>
        </div>
    </div>
</section>

<!-- Load Three.js and Dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/postprocessing/EffectComposer.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/postprocessing/RenderPass.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/postprocessing/UnrealBloomPass.js"></script>

<script>
/**
 * Three.js N8N-Style 3D Visualization
 * Advanced WebGL implementation with particle systems, lighting, and post-processing
 */
(function() {
    'use strict';

    // Node configuration matching original design
    const nodeConfig = [
        {
            name: 'Bheem Flow',
            label: 'AI Flow',
            image: 'https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/05f05403-bb6c-45af-6d4a-8e2656951f00/public',
            position: { x: 0, y: 3, z: 2 },
            color: 0x667eea
        },
        {
            name: 'Bheem AI Buzz Central',
            label: 'AI Central',
            image: 'https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/33f62e15-35d5-4ca5-5077-b0076e244b00/public',
            position: { x: -4, y: 2, z: 1 },
            color: 0x764ba2
        },
        {
            name: 'Agent Bheem',
            label: 'AI Agent',
            image: 'https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/937ded20-dbbb-4da6-53b5-e0b36f6fa800/public',
            position: { x: -5, y: -1, z: 0 },
            color: 0xf093fb
        },
        {
            name: 'Social Selling AI',
            label: 'Social AI',
            image: 'https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/e7ee5acc-ef8d-4aa8-de79-a5182807ff00/public',
            position: { x: -3, y: -3, z: -1 },
            color: 0x10b981
        },
        {
            name: 'Bheem Cloud',
            label: 'Cloud',
            image: 'https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/0dafe680-5c75-4f2e-556e-cf90d10ff100/public',
            position: { x: 3, y: -3, z: -1 },
            color: 0xec4899
        },
        {
            name: 'Bheem Academy',
            label: 'Academy',
            image: 'https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/0932ca04-4388-4f6e-fcdd-9cd13f451300/public',
            position: { x: 5, y: -1, z: 0 },
            color: 0xf472b6
        },
        {
            name: 'Kodee AI Assistant',
            label: 'Kodee AI',
            image: 'https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/90a4f6ec-2bdb-4a76-20d3-505cdfaf9700/public',
            position: { x: 4, y: 2, z: 1 },
            color: 0x8b5cf6
        }
    ];

    // Scene setup
    let scene, camera, renderer, composer;
    let nodes = [];
    let particles = [];
    let connections = [];
    let centralNode;
    let mouse = new THREE.Vector2();
    let raycaster = new THREE.Raycaster();
    let hoveredNode = null;
    let clock = new THREE.Clock();
    let stats = { fps: 0, frameCount: 0, lastTime: 0 };

    // Initialize Three.js scene
    function init() {
        const canvas = document.getElementById('threejs-canvas');
        const container = canvas.parentElement;

        if (!canvas || !THREE) {
            console.error('Three.js or canvas not found');
            return;
        }

        // Scene
        scene = new THREE.Scene();
        scene.background = new THREE.Color(0x1a1a1a);
        scene.fog = new THREE.FogExp2(0x1a1a1a, 0.05);

        // Camera
        const aspect = container.clientWidth / container.clientHeight;
        camera = new THREE.PerspectiveCamera(60, aspect, 0.1, 1000);
        camera.position.set(0, 0, 15);

        // Renderer
        renderer = new THREE.WebGLRenderer({
            canvas: canvas,
            antialias: true,
            alpha: true,
            powerPreference: 'high-performance'
        });
        renderer.setSize(container.clientWidth, container.clientHeight);
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
        renderer.shadowMap.enabled = true;
        renderer.shadowMap.type = THREE.PCFSoftShadowMap;

        // Lighting
        setupLighting();

        // Create central platform node
        createCentralNode();

        // Create peripheral nodes
        createNodes();

        // Create particle connections
        createParticleConnections();

        // Create ambient particles
        createAmbientParticles();

        // Controls
        setupControls();

        // Event listeners
        setupEventListeners();

        // Hide loading overlay
        setTimeout(() => {
            const loading = document.getElementById('canvas-loading');
            if (loading) loading.classList.add('hidden');
        }, 1000);

        // Start animation loop
        animate();
    }

    // Setup scene lighting
    function setupLighting() {
        // Ambient light
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.4);
        scene.add(ambientLight);

        // Main directional light
        const mainLight = new THREE.DirectionalLight(0xffffff, 0.8);
        mainLight.position.set(5, 10, 5);
        mainLight.castShadow = true;
        mainLight.shadow.camera.near = 0.1;
        mainLight.shadow.camera.far = 50;
        mainLight.shadow.mapSize.width = 2048;
        mainLight.shadow.mapSize.height = 2048;
        scene.add(mainLight);

        // Accent lights with colors
        const accentLight1 = new THREE.PointLight(0x8b5cf6, 2, 20);
        accentLight1.position.set(-8, 5, 5);
        scene.add(accentLight1);

        const accentLight2 = new THREE.PointLight(0xec4899, 2, 20);
        accentLight2.position.set(8, 5, 5);
        scene.add(accentLight2);

        const accentLight3 = new THREE.PointLight(0x10b981, 1.5, 15);
        accentLight3.position.set(0, -5, 5);
        scene.add(accentLight3);
    }

    // Create central platform node
    function createCentralNode() {
        const group = new THREE.Group();

        // Central sphere with glow
        const geometry = new THREE.SphereGeometry(0.8, 32, 32);
        const material = new THREE.MeshPhysicalMaterial({
            color: 0x8b5cf6,
            metalness: 0.7,
            roughness: 0.2,
            transparent: true,
            opacity: 0.9,
            emissive: 0x8b5cf6,
            emissiveIntensity: 0.5,
            clearcoat: 1.0,
            clearcoatRoughness: 0.1
        });
        const sphere = new THREE.Mesh(geometry, material);
        sphere.castShadow = true;
        sphere.receiveShadow = true;
        group.add(sphere);

        // Outer glow ring
        const ringGeometry = new THREE.TorusGeometry(1.2, 0.05, 16, 100);
        const ringMaterial = new THREE.MeshBasicMaterial({
            color: 0xec4899,
            transparent: true,
            opacity: 0.6
        });
        const ring = new THREE.Mesh(ringGeometry, ringMaterial);
        ring.rotation.x = Math.PI / 2;
        group.add(ring);

        // Add sprite label
        const label = createTextSprite('Bheem Platform', 0.5);
        label.position.y = -1.5;
        group.add(label);

        group.position.set(0, 0, 0);
        scene.add(group);

        centralNode = { group, sphere, ring, label };
    }

    // Create peripheral nodes with images
    function createNodes() {
        nodeConfig.forEach((config, index) => {
            const group = new THREE.Group();

            // Create card-like plane for image
            const cardGeometry = new THREE.PlaneGeometry(2.2, 1.5);
            const cardMaterial = new THREE.MeshPhysicalMaterial({
                color: 0xffffff,
                metalness: 0.3,
                roughness: 0.4,
                transparent: true,
                opacity: 0.95,
                side: THREE.DoubleSide,
                clearcoat: 1.0,
                clearcoatRoughness: 0.1
            });

            // Load texture
            const textureLoader = new THREE.TextureLoader();
            textureLoader.load(
                config.image,
                (texture) => {
                    cardMaterial.map = texture;
                    cardMaterial.needsUpdate = true;
                },
                undefined,
                (error) => {
                    console.warn('Texture load error:', error);
                }
            );

            const card = new THREE.Mesh(cardGeometry, cardMaterial);
            card.castShadow = true;
            card.receiveShadow = true;
            group.add(card);

            // Frame around card
            const frameGeometry = new THREE.PlaneGeometry(2.4, 1.7);
            const frameMaterial = new THREE.MeshBasicMaterial({
                color: config.color,
                transparent: true,
                opacity: 0.3,
                side: THREE.DoubleSide
            });
            const frame = new THREE.Mesh(frameGeometry, frameMaterial);
            frame.position.z = -0.01;
            group.add(frame);

            // Connection point (small sphere)
            const pointGeometry = new THREE.SphereGeometry(0.15, 16, 16);
            const pointMaterial = new THREE.MeshBasicMaterial({
                color: 0x10b981,
                transparent: true,
                opacity: 0.8
            });
            const point = new THREE.Mesh(pointGeometry, pointMaterial);
            point.position.set(0, -0.9, 0.1);
            group.add(point);

            // Label
            const label = createTextSprite(config.label, 0.3);
            label.position.y = -1.3;
            group.add(label);

            // Position node
            group.position.set(config.position.x, config.position.y, config.position.z);

            // Make card face camera initially
            group.lookAt(camera.position);

            scene.add(group);

            nodes.push({
                group,
                card,
                frame,
                point,
                label,
                config,
                originalPosition: config.position,
                velocity: { x: 0, y: 0, z: 0 },
                isHovered: false
            });
        });
    }

    // Create text sprite for labels
    function createTextSprite(text, scale = 1) {
        const canvas = document.createElement('canvas');
        const context = canvas.getContext('2d');
        canvas.width = 512;
        canvas.height = 128;

        context.fillStyle = 'rgba(26, 26, 26, 0.9)';
        context.fillRect(0, 0, canvas.width, canvas.height);

        context.font = 'Bold 48px Inter, Arial';
        context.fillStyle = '#ffffff';
        context.textAlign = 'center';
        context.textBaseline = 'middle';
        context.fillText(text, canvas.width / 2, canvas.height / 2);

        const texture = new THREE.CanvasTexture(canvas);
        const material = new THREE.SpriteMaterial({
            map: texture,
            transparent: true,
            opacity: 0.9
        });
        const sprite = new THREE.Sprite(material);
        sprite.scale.set(4 * scale, 1 * scale, 1);

        return sprite;
    }

    // Create particle connections between nodes
    function createParticleConnections() {
        nodes.forEach(node => {
            const particleCount = 50;
            const geometry = new THREE.BufferGeometry();
            const positions = new Float32Array(particleCount * 3);
            const colors = new Float32Array(particleCount * 3);

            for (let i = 0; i < particleCount; i++) {
                // Start from central node
                const t = i / particleCount;
                const pos = new THREE.Vector3().lerpVectors(
                    new THREE.Vector3(0, 0, 0),
                    new THREE.Vector3(node.config.position.x, node.config.position.y, node.config.position.z),
                    t
                );

                positions[i * 3] = pos.x;
                positions[i * 3 + 1] = pos.y;
                positions[i * 3 + 2] = pos.z;

                const color = new THREE.Color(0x10b981);
                colors[i * 3] = color.r;
                colors[i * 3 + 1] = color.g;
                colors[i * 3 + 2] = color.b;
            }

            geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
            geometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));

            const material = new THREE.PointsMaterial({
                size: 0.08,
                vertexColors: true,
                transparent: true,
                opacity: 0.8,
                blending: THREE.AdditiveBlending,
                depthWrite: false
            });

            const particleSystem = new THREE.Points(geometry, material);
            scene.add(particleSystem);

            connections.push({
                particleSystem,
                geometry,
                positions,
                node,
                flow: 0
            });
        });

        // Update particle count
        const particleCountEl = document.getElementById('particle-count');
        if (particleCountEl) {
            particleCountEl.textContent = connections.length * 50;
        }
    }

    // Create ambient floating particles
    function createAmbientParticles() {
        const particleCount = 300;
        const geometry = new THREE.BufferGeometry();
        const positions = new Float32Array(particleCount * 3);
        const colors = new Float32Array(particleCount * 3);

        for (let i = 0; i < particleCount; i++) {
            positions[i * 3] = (Math.random() - 0.5) * 30;
            positions[i * 3 + 1] = (Math.random() - 0.5) * 30;
            positions[i * 3 + 2] = (Math.random() - 0.5) * 20;

            const color = new THREE.Color();
            color.setHSL(Math.random() * 0.3 + 0.7, 0.8, 0.6);
            colors[i * 3] = color.r;
            colors[i * 3 + 1] = color.g;
            colors[i * 3 + 2] = color.b;
        }

        geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
        geometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));

        const material = new THREE.PointsMaterial({
            size: 0.05,
            vertexColors: true,
            transparent: true,
            opacity: 0.6,
            blending: THREE.AdditiveBlending,
            depthWrite: false
        });

        const particleSystem = new THREE.Points(geometry, material);
        scene.add(particleSystem);

        particles.push({ particleSystem, geometry, positions });
    }

    // Setup orbit controls
    function setupControls() {
        if (typeof THREE.OrbitControls !== 'function') {
            console.warn('OrbitControls not available');
            return;
        }

        const controls = new THREE.OrbitControls(camera, renderer.domElement);
        controls.enableDamping = true;
        controls.dampingFactor = 0.05;
        controls.minDistance = 8;
        controls.maxDistance = 25;
        controls.maxPolarAngle = Math.PI / 1.5;
        controls.autoRotate = true;
        controls.autoRotateSpeed = 0.5;

        window.controls = controls;
    }

    // Setup event listeners
    function setupEventListeners() {
        // Window resize
        window.addEventListener('resize', onWindowResize, false);

        // Mouse move for hover effects
        renderer.domElement.addEventListener('mousemove', onMouseMove, false);

        // Mouse click for node interaction
        renderer.domElement.addEventListener('click', onMouseClick, false);
    }

    // Handle window resize
    function onWindowResize() {
        const container = renderer.domElement.parentElement;
        const width = container.clientWidth;
        const height = container.clientHeight;

        camera.aspect = width / height;
        camera.updateProjectionMatrix();
        renderer.setSize(width, height);
    }

    // Handle mouse move
    function onMouseMove(event) {
        const rect = renderer.domElement.getBoundingClientRect();
        mouse.x = ((event.clientX - rect.left) / rect.width) * 2 - 1;
        mouse.y = -((event.clientY - rect.top) / rect.height) * 2 + 1;

        // Raycasting for hover detection
        raycaster.setFromCamera(mouse, camera);
        const intersects = raycaster.intersectObjects(nodes.map(n => n.card));

        // Reset all nodes
        nodes.forEach(node => {
            node.isHovered = false;
            node.frame.material.opacity = 0.3;
        });

        // Highlight hovered node
        if (intersects.length > 0) {
            const hoveredCard = intersects[0].object;
            const node = nodes.find(n => n.card === hoveredCard);
            if (node) {
                node.isHovered = true;
                node.frame.material.opacity = 0.7;
                hoveredNode = node;
                renderer.domElement.style.cursor = 'pointer';
                return;
            }
        }

        hoveredNode = null;
        renderer.domElement.style.cursor = 'grab';
    }

    // Handle mouse click
    function onMouseClick(event) {
        if (hoveredNode) {
            // Animate node on click
            animateNodeClick(hoveredNode);

            // Log or trigger action
            console.log('Clicked node:', hoveredNode.config.name);
        }
    }

    // Animate node click effect
    function animateNodeClick(node) {
        const originalScale = node.group.scale.clone();
        const targetScale = originalScale.clone().multiplyScalar(1.2);

        // Scale up
        gsap.to(node.group.scale, {
            x: targetScale.x,
            y: targetScale.y,
            z: targetScale.z,
            duration: 0.2,
            ease: 'power2.out',
            onComplete: () => {
                // Scale back
                gsap.to(node.group.scale, {
                    x: originalScale.x,
                    y: originalScale.y,
                    z: originalScale.z,
                    duration: 0.3,
                    ease: 'elastic.out(1, 0.5)'
                });
            }
        });

        // Flash frame color
        const originalColor = node.frame.material.color.getHex();
        node.frame.material.color.setHex(0xffffff);
        setTimeout(() => {
            node.frame.material.color.setHex(originalColor);
        }, 200);
    }

    // Animation loop
    function animate() {
        requestAnimationFrame(animate);

        const delta = clock.getDelta();
        const elapsed = clock.getElapsedTime();

        // Update orbit controls
        if (window.controls) {
            window.controls.update();
        }

        // Animate central node
        if (centralNode) {
            centralNode.ring.rotation.z += 0.01;
            centralNode.sphere.rotation.y += 0.005;

            // Pulse effect
            const scale = 1 + Math.sin(elapsed * 2) * 0.05;
            centralNode.sphere.scale.set(scale, scale, scale);
        }

        // Animate nodes - floating effect
        nodes.forEach((node, index) => {
            const offsetTime = elapsed + index * 0.5;

            // Gentle floating motion
            node.group.position.x = node.originalPosition.x + Math.sin(offsetTime * 0.5) * 0.3;
            node.group.position.y = node.originalPosition.y + Math.cos(offsetTime * 0.7) * 0.3;
            node.group.position.z = node.originalPosition.z + Math.sin(offsetTime * 0.3) * 0.2;

            // Subtle rotation
            node.group.rotation.y += 0.002;

            // Connection point pulse
            const pointScale = 1 + Math.sin(offsetTime * 3) * 0.3;
            node.point.scale.set(pointScale, pointScale, pointScale);

            // Hover effect
            if (node.isHovered) {
                const targetScale = 1.1;
                node.group.scale.lerp(new THREE.Vector3(targetScale, targetScale, targetScale), 0.1);
            } else {
                node.group.scale.lerp(new THREE.Vector3(1, 1, 1), 0.1);
            }
        });

        // Animate particle connections - flowing effect
        connections.forEach(conn => {
            conn.flow += 0.02;
            if (conn.flow > 1) conn.flow = 0;

            const positions = conn.positions;
            for (let i = 0; i < positions.length / 3; i++) {
                const t = (i / (positions.length / 3) + conn.flow) % 1;

                const pos = new THREE.Vector3().lerpVectors(
                    new THREE.Vector3(0, 0, 0),
                    new THREE.Vector3(
                        conn.node.group.position.x,
                        conn.node.group.position.y,
                        conn.node.group.position.z
                    ),
                    t
                );

                // Add wave effect
                pos.x += Math.sin(t * Math.PI * 2 + elapsed * 2) * 0.2;
                pos.y += Math.cos(t * Math.PI * 2 + elapsed * 2) * 0.2;

                positions[i * 3] = pos.x;
                positions[i * 3 + 1] = pos.y;
                positions[i * 3 + 2] = pos.z;
            }

            conn.geometry.attributes.position.needsUpdate = true;
        });

        // Animate ambient particles
        particles.forEach(particle => {
            const positions = particle.positions;
            for (let i = 0; i < positions.length / 3; i++) {
                positions[i * 3 + 1] += Math.sin(elapsed + i) * 0.002;

                // Wrap around
                if (positions[i * 3 + 1] > 15) {
                    positions[i * 3 + 1] = -15;
                }
            }
            particle.geometry.attributes.position.needsUpdate = true;
        });

        // Update FPS counter
        updateStats();

        // Render scene
        renderer.render(scene, camera);
    }

    // Update performance stats
    function updateStats() {
        stats.frameCount++;
        const currentTime = performance.now();

        if (currentTime >= stats.lastTime + 1000) {
            stats.fps = Math.round((stats.frameCount * 1000) / (currentTime - stats.lastTime));
            stats.frameCount = 0;
            stats.lastTime = currentTime;

            const fpsEl = document.getElementById('fps-counter');
            if (fpsEl) {
                fpsEl.textContent = stats.fps;
            }
        }
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    // Scroll animation trigger
    const section = document.querySelector('.why-bheem-academy-3d');
    if (section) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                } else {
                    entry.target.classList.remove('animate-in');
                }
            });
        }, { threshold: 0.15 });

        observer.observe(section);
    }

    // Add GSAP for smooth animations (if available)
    if (typeof gsap === 'undefined') {
        window.gsap = {
            to: (target, vars) => {
                // Fallback simple animation
                const duration = (vars.duration || 0.5) * 1000;
                const startTime = Date.now();
                const startValues = {};

                Object.keys(vars).forEach(key => {
                    if (key !== 'duration' && key !== 'ease' && key !== 'onComplete') {
                        startValues[key] = target[key];
                    }
                });

                const animate = () => {
                    const elapsed = Date.now() - startTime;
                    const progress = Math.min(elapsed / duration, 1);

                    Object.keys(startValues).forEach(key => {
                        if (vars[key] !== undefined) {
                            target[key] = startValues[key] + (vars[key] - startValues[key]) * progress;
                        }
                    });

                    if (progress < 1) {
                        requestAnimationFrame(animate);
                    } else if (vars.onComplete) {
                        vars.onComplete();
                    }
                };

                animate();
            }
        };
    }

})();
</script>

<!-- Load GSAP for smooth animations (optional but recommended) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
