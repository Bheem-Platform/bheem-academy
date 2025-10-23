<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edoo Components - Example Implementation</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Vue.js 3 (Required for FAQ component) -->
    <script src="https://unpkg.com/vue@3.3.4/dist/vue.global.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #FAFBFF;
            color: #0F172A;
        }

        .demo-header {
            background: linear-gradient(135deg, #8B5CF6 0%, #EC4899 50%, #06B6D4 100%);
            color: white;
            padding: 40px 20px;
            text-align: center;
        }

        .demo-header h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .demo-header p {
            font-size: 1.125rem;
            opacity: 0.95;
        }

        .demo-info {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .info-box {
            background: white;
            border: 2px solid #E2E8F0;
            border-radius: 16px;
            padding: 32px;
            margin-bottom: 40px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
        }

        .info-box h2 {
            font-size: 1.5rem;
            color: #8B5CF6;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .info-box code {
            background: #F1F5F9;
            padding: 2px 8px;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
            color: #EC4899;
        }

        .info-box pre {
            background: #0F172A;
            color: #E2E8F0;
            padding: 20px;
            border-radius: 12px;
            overflow-x: auto;
            margin-top: 16px;
        }

        .component-label {
            display: inline-block;
            background: linear-gradient(135deg, #8B5CF6, #EC4899);
            color: white;
            padding: 8px 20px;
            border-radius: 100px;
            font-size: 0.875rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 60px 0 20px 0;
            text-align: center;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <!-- Demo Header -->
    <div class="demo-header">
        <h1>🎨 Edoo Components Demo</h1>
        <p>Component-based architecture for Bheem Academy blocks</p>
    </div>

    <!-- Info Section -->
    <div class="demo-info">
        <div class="info-box">
            <h2>
                <i class="fas fa-info-circle"></i>
                How to Use Components
            </h2>
            <p>This page demonstrates how to load and use Edoo components. Each component is self-contained with its own styles, HTML, and JavaScript.</p>

            <pre><code>&lt;?php
// Include the component loader
require_once 'bheem-components/loader.php';

// Load individual components
edoo_load_component('certification');
edoo_load_component('faq');
?&gt;</code></pre>
        </div>

        <div class="info-box">
            <h2>
                <i class="fas fa-cube"></i>
                Available Components
            </h2>
            <ul style="list-style: none; padding: 0; margin-top: 16px;">
                <li style="padding: 12px; background: #F8FAFC; border-radius: 8px; margin-bottom: 12px;">
                    <strong style="color: #8B5CF6;">Certification Block</strong> - Professional certifications showcase
                </li>
                <li style="padding: 12px; background: #F8FAFC; border-radius: 8px;">
                    <strong style="color: #06B6D4;">FAQ Accordion</strong> - Interactive FAQ with Vue.js (requires Vue.js 3)
                </li>
            </ul>
        </div>
    </div>

    <!-- Component Examples -->
    <div class="container">
        <!-- Certification Component -->
        <div class="component-label" style="display: block;">
            <i class="fas fa-award"></i> Component 1: Certification Block
        </div>

        <?php
        // Load Certification Component
        require_once __DIR__ . '/loader.php';
        edoo_load_component('certification');
        ?>

        <!-- FAQ Component -->
        <div class="component-label" style="display: block;">
            <i class="fas fa-question-circle"></i> Component 2: FAQ Accordion (Vue.js)
        </div>

        <?php
        // Load FAQ Component
        edoo_load_component('faq');
        ?>
    </div>

    <!-- Footer Info -->
    <div class="demo-info" style="margin-top: 80px; margin-bottom: 60px;">
        <div class="info-box" style="text-align: center; border-color: #10B981;">
            <h2 style="color: #10B981; justify-content: center;">
                <i class="fas fa-check-circle"></i>
                Components Loaded Successfully!
            </h2>
            <p style="margin-top: 12px;">All components are fully functional and maintain their original styles and behavior.</p>
        </div>
    </div>
</body>
</html>
