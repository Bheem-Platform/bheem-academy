<?php
/**
 * Component Test Script
 * Tests if all Edoo components can be loaded successfully
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Edoo Components Test</h1>";
echo "<hr>";

// Test 1: Check if loader exists
echo "<h2>Test 1: Loader File</h2>";
$loader_path = __DIR__ . '/loader.php';
if (file_exists($loader_path)) {
    echo "✅ Loader file exists: $loader_path<br>";
    require_once $loader_path;
    echo "✅ Loader file included successfully<br>";
} else {
    echo "❌ Loader file not found: $loader_path<br>";
    exit;
}

echo "<hr>";

// Test 2: Get available components
echo "<h2>Test 2: Available Components</h2>";
$available = edoo_get_available_components();
if (!empty($available)) {
    echo "✅ Found " . count($available) . " components:<br>";
    echo "<ul>";
    foreach ($available as $component) {
        echo "<li><strong>$component</strong></li>";
    }
    echo "</ul>";
} else {
    echo "❌ No components found<br>";
}

echo "<hr>";

// Test 3: Test Certification Component
echo "<h2>Test 3: Load Certification Component</h2>";
if (edoo_load_component('certification')) {
    echo "✅ Certification component loaded successfully<br>";
} else {
    echo "❌ Failed to load certification component<br>";
}

echo "<hr>";

// Test 4: Test FAQ Component
echo "<h2>Test 4: Load FAQ Component</h2>";
if (edoo_load_component('faq')) {
    echo "✅ FAQ component loaded successfully<br>";
} else {
    echo "❌ Failed to load FAQ component<br>";
}

echo "<hr>";

// Test 5: Component File Sizes
echo "<h2>Test 5: Component File Sizes</h2>";
$cert_file = __DIR__ . '/certification/certification.php';
$faq_file = __DIR__ . '/faq/faq.php';

if (file_exists($cert_file)) {
    $cert_size = filesize($cert_file);
    echo "✅ Certification component: " . number_format($cert_size) . " bytes<br>";
} else {
    echo "❌ Certification component file not found<br>";
}

if (file_exists($faq_file)) {
    $faq_size = filesize($faq_file);
    echo "✅ FAQ component: " . number_format($faq_size) . " bytes<br>";
} else {
    echo "❌ FAQ component file not found<br>";
}

echo "<hr>";

// Test 6: Directory Permissions
echo "<h2>Test 6: File Permissions</h2>";
$base_dir = __DIR__;
if (is_readable($base_dir)) {
    echo "✅ Directory is readable<br>";
} else {
    echo "❌ Directory is not readable<br>";
}

if (is_readable($cert_file)) {
    echo "✅ Certification file is readable<br>";
} else {
    echo "❌ Certification file is not readable<br>";
}

if (is_readable($faq_file)) {
    echo "✅ FAQ file is readable<br>";
} else {
    echo "❌ FAQ file is not readable<br>";
}

echo "<hr>";
echo "<h2>✅ All Tests Complete!</h2>";
echo "<p><a href='example.php'>View Example Implementation</a></p>";
?>

<style>
    body {
        font-family: 'Arial', sans-serif;
        max-width: 900px;
        margin: 40px auto;
        padding: 20px;
        background: #f5f5f5;
    }
    h1 {
        color: #8B5CF6;
    }
    h2 {
        color: #06B6D4;
        margin-top: 20px;
    }
    hr {
        border: none;
        border-top: 2px solid #e0e0e0;
        margin: 30px 0;
    }
    ul {
        background: white;
        padding: 20px 40px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    li {
        margin: 10px 0;
    }
</style>
