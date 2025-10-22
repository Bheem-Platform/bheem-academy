<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php
        $pageId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $titles = [
            3 => 'Help Center',
            4 => 'Documentation',
            5 => 'AI Tools',
            6 => 'API Access',
            7 => 'Downloads',
            11 => 'Contact Us'
        ];
        echo isset($titles[$pageId]) ? $titles[$pageId] : 'Page';
    ?> - Bheem Academy</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/includes/bheem_header_styles.css">
    <style>
        body { margin: 0; padding: 0; font-family: 'Inter', sans-serif; background: #f8fafc; }
        .container { max-width: 1200px; margin: 100px auto 40px; padding: 0 20px; }
        .page-content { background: white; padding: 60px; border-radius: 16px; box-shadow: 0 4px 24px rgba(139, 92, 246, 0.1); }
        h1 { font-size: 2.5rem; color: #1e293b; margin-bottom: 1.5rem; }
        .coming-soon-icon { font-size: 4rem; color: #8b5cf6; margin-bottom: 20px; text-align: center; }
        .coming-soon-text { text-align: center; font-size: 1.25rem; color: #64748b; margin-bottom: 30px; }
        .btn { display: inline-block; padding: 12px 24px; background: linear-gradient(135deg, #8b5cf6, #ec4899); color: white; text-decoration: none; border-radius: 8px; }
        .btn-center { text-align: center; }
    </style>
</head>
<body>
    <?php include(__DIR__ . '/../../includes/header.html'); ?>
    <div class="container">
        <div class="page-content">
            <?php
            $pageId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

            switch($pageId) {
                case 3: // Help Center
                    echo '<div class="coming-soon-icon"><i class="fas fa-question-circle"></i></div>';
                    echo '<h1 style="text-align: center;">Help Center</h1>';
                    echo '<p class="coming-soon-text">Our comprehensive help center is coming soon with guides, tutorials, and FAQs.</p>';
                    break;
                case 4: // Documentation
                    echo '<div class="coming-soon-icon"><i class="fas fa-book"></i></div>';
                    echo '<h1 style="text-align: center;">Documentation</h1>';
                    echo '<p class="coming-soon-text">Detailed documentation for all our courses and tools is being prepared.</p>';
                    break;
                case 5: // AI Tools
                    echo '<div class="coming-soon-icon"><i class="fas fa-robot"></i></div>';
                    echo '<h1 style="text-align: center;">AI Tools</h1>';
                    echo '<p class="coming-soon-text">Explore our suite of AI-powered learning tools, coming soon.</p>';
                    break;
                case 6: // API Access
                    echo '<div class="coming-soon-icon"><i class="fas fa-code"></i></div>';
                    echo '<h1 style="text-align: center;">API Access</h1>';
                    echo '<p class="coming-soon-text">Developer API access and documentation will be available soon.</p>';
                    break;
                case 7: // Downloads
                    echo '<div class="coming-soon-icon"><i class="fas fa-download"></i></div>';
                    echo '<h1 style="text-align: center;">Downloads</h1>';
                    echo '<p class="coming-soon-text">Download resources, tools, and materials for offline learning.</p>';
                    break;
                case 11: // Contact Us
                    header('Location: /contact.html');
                    exit;
                default:
                    echo '<div class="coming-soon-icon"><i class="fas fa-file-alt"></i></div>';
                    echo '<h1 style="text-align: center;">Page Not Found</h1>';
                    echo '<p class="coming-soon-text">The requested page is not available.</p>';
            }
            ?>
            <div class="btn-center">
                <a href="/" class="btn">Return to Homepage</a>
            </div>
        </div>
    </div>
</body>
</html>
