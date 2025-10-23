<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo 'PHP is working!<br>';
echo 'PHP Version: ' . phpversion() . '<br>';

// Test config.php
if (file_exists(__DIR__ . '/config.php')) {
    echo 'config.php found<br>';
    require_once __DIR__ . '/config.php';
    echo 'DB_HOST: ' . DB_HOST . '<br>';
    echo 'SITE_URL: ' . SITE_URL . '<br>';
} else {
    echo 'config.php NOT found<br>';
}

// Test database connection
try {
    $conn = pg_connect(sprintf(
        'host=%s port=5432 dbname=%s user=%s password=%s',
        DB_HOST,
        DB_NAME,
        DB_USER,
        DB_PASS
    ));
    
    if ($conn) {
        echo 'Database connection: SUCCESS<br>';
        pg_close($conn);
    } else {
        echo 'Database connection: FAILED<br>';
    }
} catch (Exception $e) {
    echo 'Database error: ' . $e->getMessage() . '<br>';
}
