<style>
    /* Why Bheem Academy - Three.js N8N-Style Workflow - v4.0 */
    .why-bheem-academy-workflow {
        padding: 60px 0 40px;
        background: #1a1a1a;
        position: relative;
        overflow: hidden;
        opacity: 0;
        transform: translateY(80px) scale(0.95);
        transition: opacity 1.5s cubic-bezier(0.16, 1, 0.3, 1),
                    transform 1.5s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .why-bheem-academy-workflow.animate-in {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

    /* Container */
    .why-bheem-container-workflow {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 30px;
        position: relative;
        z-index: 3;
    }

    /* Header Section */
    .why-bheem-header-workflow {
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

    .why-bheem-badge-workflow {
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

    .why-bheem-badge-workflow i {
        font-size: 20px;
        color: #ffffff;
        filter: drop-shadow(0 2px 8px rgba(255, 255, 255, 0.3));
    }

    .why-bheem-title-workflow {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 900;
        margin: 0 0 12px 0;
        line-height: 1.1;
        letter-spacing: -0.03em;
    }

    .why-bheem-title-workflow .highlight {
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

    .why-bheem-title-workflow .white-text {
        color: #ffffff;
    }

    .why-bheem-subtitle-workflow {
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

    .why-bheem-description-workflow {
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
    .threejs-canvas-container-workflow {
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

    #threejs-canvas-workflow {
        width: 100%;
        height: 100%;
        display: block;
        cursor: grab;
    }

    #threejs-canvas-workflow:active {
        cursor: grabbing;
    }

    /* Loading Overlay */
    .canvas-loading-workflow {
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

    .canvas-loading-workflow.hidden {
        opacity: 0;
        pointer-events: none;
    }

    .loading-spinner-workflow {
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

    .loading-text-workflow {
        margin-top: 20px;
        color: rgba(255, 255, 255, 0.8);
        font-size: 14px;
        font-weight: 600;
    }

    /* Canvas Controls Info */
    .canvas-controls-workflow {
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

    .control-item-workflow {
        display: flex;
        align-items: center;
        gap: 8px;
        color: rgba(255, 255, 255, 0.8);
        font-size: 13px;
        font-weight: 600;
    }

    .control-item-workflow i {
        color: #8b5cf6;
        font-size: 16px;
    }

    /* Stats Display */
    .canvas-stats-workflow {
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

    .stat-line-workflow {
        margin: 4px 0;
    }

    /* CTA Section */
    .why-bheem-cta-workflow {
        text-align: center;
        margin-top: 80px;
        animation: fadeInUp 1s ease-out 0.4s backwards;
    }

    .why-bheem-cta-button-workflow {
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
    }

    .why-bheem-cta-button-workflow:hover {
        transform: translateY(-5px) scale(1.05);
        box-shadow:
            0 25px 60px rgba(139, 92, 246, 0.5),
            0 15px 35px rgba(236, 72, 153, 0.4);
    }

    /* Stats Bar */
    .why-bheem-stats-workflow {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-top: 70px;
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
        animation: fadeInUp 1s ease-out 0.5s backwards;
    }

    .stat-item-workflow {
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

    .stat-item-workflow:hover {
        transform: translateY(-10px) scale(1.03);
        box-shadow:
            0 20px 60px rgba(139, 92, 246, 0.4),
            0 10px 30px rgba(236, 72, 153, 0.3);
    }

    .stat-value-workflow {
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

    .stat-label-workflow {
        font-size: 0.875rem;
        color: rgba(255, 255, 255, 0.9);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.1em;
    }

    /* Responsive Design */
    @media (max-width: 1023px) {
        .threejs-canvas-container-workflow {
            height: 600px;
        }
    }

    @media (max-width: 767px) {
        .threejs-canvas-container-workflow {
            height: 500px;
            margin: 60px 0;
        }

        .canvas-controls-workflow {
            flex-direction: column;
            gap: 8px;
            padding: 10px 20px;
        }

        .why-bheem-stats-workflow {
            grid-template-columns: 1fr;
            max-width: 400px;
        }
    }

    @media (max-width: 479px) {
        .threejs-canvas-container-workflow {
            height: 400px;
        }

        .canvas-stats-workflow {
            top: 10px;
            right: 10px;
            padding: 8px 12px;
            font-size: 10px;
        }
    }
</style>

<!-- Why Bheem Academy Section - Three.js Workflow Version -->
<section class="why-bheem-academy-workflow">
    <div class="why-bheem-container-workflow">
        <!-- Header -->
        <div class="why-bheem-header-workflow">
            <div class="why-bheem-badge-workflow">
                <i class="fas fa-project-diagram"></i>
                <span>AI Learning Workflow</span>
            </div>
            <h2 class="why-bheem-title-workflow">
                <span class="white-text">Why </span>
                <span class="highlight">Bheem Academy</span>
                <span class="white-text">?</span>
            </h2>
            <p class="why-bheem-subtitle-workflow">
                Kerala's First <span class="accent">Fully Integrated AI Ecosystem</span>
            </p>
            <p class="why-bheem-description-workflow">
                Experience a seamless workflow connecting AI tools, learning platforms, and automation systems
                in an interactive 3D visualization powered by WebGL.
            </p>
        </div>

        <!-- Three.js Canvas Container -->
        <div class="threejs-canvas-container-workflow">
            <canvas id="threejs-canvas-workflow"></canvas>

            <!-- Loading Overlay -->
            <div class="canvas-loading-workflow" id="canvas-loading-workflow">
                <div class="loading-spinner-workflow"></div>
                <div class="loading-text-workflow">Loading Workflow Visualization...</div>
            </div>

            <!-- Canvas Stats -->
            <div class="canvas-stats-workflow" id="canvas-stats-workflow">
                <div class="stat-line-workflow">FPS: <span id="fps-counter-workflow">60</span></div>
                <div class="stat-line-workflow">Connections: <span id="connection-count">6</span></div>
                <div class="stat-line-workflow">Data Flow: <span id="flow-rate">100%</span></div>
            </div>

            <!-- Canvas Controls Info -->
            <div class="canvas-controls-workflow">
                <div class="control-item-workflow">
                    <i class="fas fa-mouse"></i>
                    <span>Drag to Rotate</span>
                </div>
                <div class="control-item-workflow">
                    <i class="fas fa-arrows-alt"></i>
                    <span>Scroll to Zoom</span>
                </div>
                <div class="control-item-workflow">
                    <i class="fas fa-hand-pointer"></i>
                    <span>Click Connections</span>
                </div>
            </div>
        </div>

        <!-- CTA Button -->
        <div class="why-bheem-cta-workflow">
            <a href="#enroll" class="why-bheem-cta-button-workflow">
                <span>Join the Workflow</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <!-- Stats Bar -->
        <div class="why-bheem-stats-workflow">
            <div class="stat-item-workflow">
                <span class="stat-value-workflow">10K+</span>
                <span class="stat-label-workflow">Students</span>
            </div>
            <div class="stat-item-workflow">
                <span class="stat-value-workflow">500+</span>
                <span class="stat-label-workflow">AI Courses</span>
            </div>
            <div class="stat-item-workflow">
                <span class="stat-value-workflow">95%</span>
                <span class="stat-label-workflow">Success Rate</span>
            </div>
        </div>
    </div>
</section>

<!-- Load Three.js and Dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

<script>
/**
 * Three.js N8N-Style Workflow Visualization
 * Node-to-node connections with Bezier curves and flow animation
 */
(function() {
    'use strict';

    // Workflow configuration - Define connections between nodes
    const workflowNodes = [
        {
            id: 1,
            name: 'AI Central',
            label: 'AI Buzz Central',
            image: 'https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/33f62e15-35d5-4ca5-5077-b0076e244b00/public',
            position: { x: -6, y: 2, z: 0 },
            color: 0x667eea
        },
        {
            id: 2,
            name: 'AI Agent',
            label: 'Agent Bheem',
            image: 'https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/937ded20-dbbb-4da6-53b5-e0b36f6fa800/public',
            position: { x: -3, y: 4, z: 1 },
            color: 0x764ba2
        },
        {
            id: 3,
            name: 'Bheem Flow',
            label: 'AI Automation',
            image: 'https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/05f05403-bb6c-45af-6d4a-8e2656951f00/public',
            position: { x: 0, y: 2, z: 2 },
            color: 0xf093fb
        },
        {
            id: 4,
            name: 'Social AI',
            label: 'Social Selling',
            image: 'https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/e7ee5acc-ef8d-4aa8-de79-a5182807ff00/public',
            position: { x: 3, y: 4, z: 1 },
            color: 0x10b981
        },
        {
            id: 5,
            name: 'Academy',
            label: 'Bheem Academy',
            image: 'https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/0932ca04-4388-4f6e-fcdd-9cd13f451300/public',
            position: { x: 0, y: 0, z: 0 },
            color: 0xec4899
        },
        {
            id: 6,
            name: 'Cloud',
            label: 'Bheem Cloud',
            image: 'https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/0dafe680-5c75-4f2e-556e-cf90d10ff100/public',
            position: { x: -3, y: -2, z: -1 },
            color: 0xf472b6
        },
        {
            id: 7,
            name: 'Kodee AI',
            label: 'AI Assistant',
            image: 'https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/90a4f6ec-2bdb-4a76-20d3-505cdfaf9700/public',
            position: { x: 3, y: -2, z: -1 },
            color: 0x8b5cf6
        }
    ];

    // Define workflow connections (node-to-node)
    const workflowConnections = [
        { from: 1, to: 2, color: 0x667eea, label: 'AI Data' },
        { from: 2, to: 3, color: 0x764ba2, label: 'Process' },
        { from: 3, to: 4, color: 0xf093fb, label: 'Automate' },
        { from: 1, to: 5, color: 0x10b981, label: 'Learn' },
        { from: 5, to: 6, color: 0xec4899, label: 'Store' },
        { from: 5, to: 7, color: 0xf472b6, label: 'Assist' },
        { from: 4, to: 5, color: 0x8b5cf6, label: 'Insights' }
    ];

    // Scene setup
    let scene, camera, renderer;
    let nodes = [];
    let connectionLines = [];
    let flowParticles = [];
    let mouse = new THREE.Vector2();
    let raycaster = new THREE.Raycaster();
    let hoveredObject = null;
    let clock = new THREE.Clock();
    let stats = { fps: 0, frameCount: 0, lastTime: 0 };

    // Initialize scene
    function init() {
        const canvas = document.getElementById('threejs-canvas-workflow');
        const container = canvas.parentElement;

        if (!canvas || !THREE) {
            console.error('Three.js or canvas not found');
            return;
        }

        // Scene
        scene = new THREE.Scene();
        scene.background = new THREE.Color(0x1a1a1a);
        scene.fog = new THREE.FogExp2(0x1a1a1a, 0.04);

        // Camera
        const aspect = container.clientWidth / container.clientHeight;
        camera = new THREE.PerspectiveCamera(60, aspect, 0.1, 1000);
        camera.position.set(0, 0, 18);

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

        // Create nodes
        createNodes();

        // Create connections
        createConnections();

        // Create flow particles
        createFlowParticles();

        // Create ambient particles
        createAmbientParticles();

        // Controls
        setupControls();

        // Event listeners
        setupEventListeners();

        // Hide loading
        setTimeout(() => {
            const loading = document.getElementById('canvas-loading-workflow');
            if (loading) loading.classList.add('hidden');
        }, 1000);

        // Start animation
        animate();
    }

    // Setup lighting
    function setupLighting() {
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
        scene.add(ambientLight);

        const mainLight = new THREE.DirectionalLight(0xffffff, 0.8);
        mainLight.position.set(5, 10, 7);
        mainLight.castShadow = true;
        mainLight.shadow.mapSize.width = 2048;
        mainLight.shadow.mapSize.height = 2048;
        scene.add(mainLight);

        // Accent lights
        const light1 = new THREE.PointLight(0x8b5cf6, 1.5, 20);
        light1.position.set(-10, 5, 5);
        scene.add(light1);

        const light2 = new THREE.PointLight(0xec4899, 1.5, 20);
        light2.position.set(10, 5, 5);
        scene.add(light2);

        const light3 = new THREE.PointLight(0x10b981, 1, 15);
        light3.position.set(0, -5, 5);
        scene.add(light3);
    }

    // Create nodes
    function createNodes() {
        workflowNodes.forEach((config) => {
            const group = new THREE.Group();

            // Card
            const cardGeometry = new THREE.PlaneGeometry(2.5, 1.7);
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
            textureLoader.load(config.image, (texture) => {
                cardMaterial.map = texture;
                cardMaterial.needsUpdate = true;
            });

            const card = new THREE.Mesh(cardGeometry, cardMaterial);
            card.castShadow = true;
            card.receiveShadow = true;
            group.add(card);

            // Frame
            const frameGeometry = new THREE.PlaneGeometry(2.7, 1.9);
            const frameMaterial = new THREE.MeshBasicMaterial({
                color: config.color,
                transparent: true,
                opacity: 0.4,
                side: THREE.DoubleSide
            });
            const frame = new THREE.Mesh(frameGeometry, frameMaterial);
            frame.position.z = -0.01;
            group.add(frame);

            // Connection points (output and input)
            const outputPoint = createConnectionPoint(config.color);
            outputPoint.position.set(1.4, 0, 0.1);
            group.add(outputPoint);

            const inputPoint = createConnectionPoint(config.color);
            inputPoint.position.set(-1.4, 0, 0.1);
            group.add(inputPoint);

            // Label
            const label = createTextSprite(config.label, 0.4);
            label.position.y = -1.2;
            group.add(label);

            // Position
            group.position.set(config.position.x, config.position.y, config.position.z);
            group.lookAt(camera.position);

            scene.add(group);

            nodes.push({
                group,
                card,
                frame,
                outputPoint,
                inputPoint,
                label,
                config,
                isHovered: false
            });
        });
    }

    // Create connection point sphere
    function createConnectionPoint(color) {
        const geometry = new THREE.SphereGeometry(0.15, 16, 16);
        const material = new THREE.MeshBasicMaterial({
            color: color,
            transparent: true,
            opacity: 0.9
        });
        return new THREE.Mesh(geometry, material);
    }

    // Create text sprite
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

    // Create connections between nodes
    function createConnections() {
        workflowConnections.forEach((conn) => {
            const fromNode = nodes.find(n => n.config.id === conn.from);
            const toNode = nodes.find(n => n.config.id === conn.to);

            if (!fromNode || !toNode) return;

            // Create tube geometry for connection
            const curve = new THREE.CubicBezierCurve3(
                new THREE.Vector3(0, 0, 0),
                new THREE.Vector3(2, 1, 0),
                new THREE.Vector3(-2, -1, 0),
                new THREE.Vector3(0, 0, 0)
            );

            const tubeGeometry = new THREE.TubeGeometry(curve, 64, 0.08, 8, false);
            const tubeMaterial = new THREE.MeshPhysicalMaterial({
                color: conn.color,
                transparent: true,
                opacity: 0.6,
                metalness: 0.5,
                roughness: 0.3,
                emissive: conn.color,
                emissiveIntensity: 0.3
            });

            const tube = new THREE.Mesh(tubeGeometry, tubeMaterial);
            scene.add(tube);

            // Connection label
            const connLabel = createTextSprite(conn.label, 0.25);

            scene.add(connLabel);

            connectionLines.push({
                tube,
                curve,
                fromNode,
                toNode,
                color: conn.color,
                label: connLabel,
                isHovered: false
            });
        });

        // Update connection count
        const countEl = document.getElementById('connection-count');
        if (countEl) countEl.textContent = connectionLines.length;
    }

    // Create flow particles along connections
    function createFlowParticles() {
        connectionLines.forEach((conn) => {
            const particleCount = 20;
            const particles = [];

            for (let i = 0; i < particleCount; i++) {
                const geometry = new THREE.SphereGeometry(0.12, 8, 8);
                const material = new THREE.MeshBasicMaterial({
                    color: conn.color,
                    transparent: true,
                    opacity: 0.8
                });
                const particle = new THREE.Mesh(geometry, material);
                scene.add(particle);

                particles.push({
                    mesh: particle,
                    t: i / particleCount,
                    speed: 0.01 + Math.random() * 0.01
                });
            }

            flowParticles.push({
                connection: conn,
                particles
            });
        });
    }

    // Create ambient particles
    function createAmbientParticles() {
        const particleCount = 200;
        const geometry = new THREE.BufferGeometry();
        const positions = new Float32Array(particleCount * 3);
        const colors = new Float32Array(particleCount * 3);

        for (let i = 0; i < particleCount; i++) {
            positions[i * 3] = (Math.random() - 0.5) * 35;
            positions[i * 3 + 1] = (Math.random() - 0.5) * 35;
            positions[i * 3 + 2] = (Math.random() - 0.5) * 25;

            const color = new THREE.Color();
            color.setHSL(Math.random() * 0.3 + 0.7, 0.8, 0.6);
            colors[i * 3] = color.r;
            colors[i * 3 + 1] = color.g;
            colors[i * 3 + 2] = color.b;
        }

        geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
        geometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));

        const material = new THREE.PointsMaterial({
            size: 0.06,
            vertexColors: true,
            transparent: true,
            opacity: 0.5,
            blending: THREE.AdditiveBlending,
            depthWrite: false
        });

        const particleSystem = new THREE.Points(geometry, material);
        scene.add(particleSystem);
    }

    // Setup orbit controls
    function setupControls() {
        if (typeof THREE.OrbitControls !== 'function') return;

        const controls = new THREE.OrbitControls(camera, renderer.domElement);
        controls.enableDamping = true;
        controls.dampingFactor = 0.05;
        controls.minDistance = 10;
        controls.maxDistance = 30;
        controls.maxPolarAngle = Math.PI / 1.5;
        controls.autoRotate = true;
        controls.autoRotateSpeed = 0.3;

        window.controlsWorkflow = controls;
    }

    // Setup event listeners
    function setupEventListeners() {
        window.addEventListener('resize', onWindowResize, false);
        renderer.domElement.addEventListener('mousemove', onMouseMove, false);
        renderer.domElement.addEventListener('click', onClick, false);
    }

    // Handle window resize
    function onWindowResize() {
        const container = renderer.domElement.parentElement;
        camera.aspect = container.clientWidth / container.clientHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(container.clientWidth, container.clientHeight);
    }

    // Handle mouse move
    function onMouseMove(event) {
        const rect = renderer.domElement.getBoundingClientRect();
        mouse.x = ((event.clientX - rect.left) / rect.width) * 2 - 1;
        mouse.y = -((event.clientY - rect.top) / rect.height) * 2 + 1;

        raycaster.setFromCamera(mouse, camera);

        // Check node intersections
        const nodeCards = nodes.map(n => n.card);
        const intersects = raycaster.intersectObjects(nodeCards);

        nodes.forEach(node => {
            node.isHovered = false;
            node.frame.material.opacity = 0.4;
        });

        if (intersects.length > 0) {
            const hoveredCard = intersects[0].object;
            const node = nodes.find(n => n.card === hoveredCard);
            if (node) {
                node.isHovered = true;
                node.frame.material.opacity = 0.8;
                renderer.domElement.style.cursor = 'pointer';
                return;
            }
        }

        renderer.domElement.style.cursor = 'grab';
    }

    // Handle click
    function onClick() {
        if (hoveredObject) {
            console.log('Clicked:', hoveredObject.config || hoveredObject);
        }
    }

    // Update connection curves
    function updateConnections() {
        connectionLines.forEach((conn) => {
            // Get world positions
            const fromPos = new THREE.Vector3();
            conn.fromNode.outputPoint.getWorldPosition(fromPos);

            const toPos = new THREE.Vector3();
            conn.toNode.inputPoint.getWorldPosition(toPos);

            // Calculate control points for Bezier curve
            const distance = fromPos.distanceTo(toPos);
            const midPoint = new THREE.Vector3().lerpVectors(fromPos, toPos, 0.5);

            const controlOffset = distance * 0.3;
            const control1 = fromPos.clone().add(new THREE.Vector3(controlOffset, controlOffset * 0.3, 0));
            const control2 = toPos.clone().add(new THREE.Vector3(-controlOffset, -controlOffset * 0.3, 0));

            // Update curve
            conn.curve.v0.copy(fromPos);
            conn.curve.v1.copy(control1);
            conn.curve.v2.copy(control2);
            conn.curve.v3.copy(toPos);

            // Update tube geometry
            const newGeometry = new THREE.TubeGeometry(conn.curve, 64, 0.08, 8, false);
            conn.tube.geometry.dispose();
            conn.tube.geometry = newGeometry;

            // Update label position
            conn.label.position.copy(midPoint);
        });
    }

    // Animation loop
    function animate() {
        requestAnimationFrame(animate);

        const delta = clock.getDelta();
        const elapsed = clock.getElapsedTime();

        // Update controls
        if (window.controlsWorkflow) {
            window.controlsWorkflow.update();
        }

        // Animate nodes
        nodes.forEach((node, index) => {
            const offsetTime = elapsed + index * 0.5;

            // Floating motion
            const floatAmount = 0.15;
            node.group.position.y += Math.sin(offsetTime * 0.8) * 0.002;

            // Subtle rotation
            node.group.rotation.y += 0.001;

            // Connection points pulse
            const pulseScale = 1 + Math.sin(offsetTime * 3) * 0.3;
            node.outputPoint.scale.set(pulseScale, pulseScale, pulseScale);
            node.inputPoint.scale.set(pulseScale, pulseScale, pulseScale);

            // Hover effect
            if (node.isHovered) {
                node.group.scale.lerp(new THREE.Vector3(1.08, 1.08, 1.08), 0.1);
            } else {
                node.group.scale.lerp(new THREE.Vector3(1, 1, 1), 0.1);
            }
        });

        // Update connections
        updateConnections();

        // Animate flow particles
        flowParticles.forEach((flow) => {
            flow.particles.forEach((p) => {
                p.t += p.speed;
                if (p.t > 1) p.t = 0;

                const pos = flow.connection.curve.getPoint(p.t);
                p.mesh.position.copy(pos);

                // Pulse effect
                const scale = 1 + Math.sin(p.t * Math.PI * 4) * 0.3;
                p.mesh.scale.set(scale, scale, scale);
            });
        });

        // Update stats
        updateStats();

        // Render
        renderer.render(scene, camera);
    }

    // Update stats
    function updateStats() {
        stats.frameCount++;
        const currentTime = performance.now();

        if (currentTime >= stats.lastTime + 1000) {
            stats.fps = Math.round((stats.frameCount * 1000) / (currentTime - stats.lastTime));
            stats.frameCount = 0;
            stats.lastTime = currentTime;

            const fpsEl = document.getElementById('fps-counter-workflow');
            if (fpsEl) fpsEl.textContent = stats.fps;
        }
    }

    // Initialize
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    // Scroll animation
    const section = document.querySelector('.why-bheem-academy-workflow');
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

})();
</script>
