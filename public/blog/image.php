<?php
/**
 * Blog Image Proxy - Serves blog attachment images inline instead of as download
 * This bypasses the Content-Disposition: attachment header from pluginfile.php
 */

// Get the original pluginfile URL from query parameter
$pluginfile_url = isset($_GET['url']) ? $_GET['url'] : '';

if (empty($pluginfile_url)) {
    header("HTTP/1.0 400 Bad Request");
    die('Missing URL parameter');
}

// Validate it's a pluginfile URL
if (strpos($pluginfile_url, 'pluginfile.php') === false) {
    header("HTTP/1.0 400 Bad Request");
    die('Invalid URL');
}

// Make it absolute if needed
if (strpos($pluginfile_url, 'http') !== 0) {
    $pluginfile_url = 'https://dev.bheem.cloud' . $pluginfile_url;
}

// Create stream context with cookies and headers
$opts = array(
    'http' => array(
        'method' => 'GET',
        'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36\r\n" .
                    "Referer: https://dev.bheem.cloud/\r\n" .
                    (isset($_SERVER['HTTP_COOKIE']) ? "Cookie: " . $_SERVER['HTTP_COOKIE'] . "\r\n" : ""),
        'follow_location' => 1,
        'max_redirects' => 5,
        'timeout' => 10
    ),
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
    )
);

$context = stream_context_create($opts);

// Fetch the file
$image_data = @file_get_contents($pluginfile_url, false, $context);

if ($image_data === false) {
    header("HTTP/1.0 404 Not Found");
    die('Failed to fetch image from: ' . htmlspecialchars($pluginfile_url));
}

// Determine content type from HTTP response headers
$content_type = 'image/jpeg'; // default
if (isset($http_response_header)) {
    foreach ($http_response_header as $header) {
        if (stripos($header, 'Content-Type:') === 0) {
            $content_type = trim(substr($header, 13));
            break;
        }
    }
}

// If we couldn't get it from headers, guess from URL
if ($content_type === 'image/jpeg') {
    if (preg_match('/\.png$/i', $pluginfile_url)) {
        $content_type = 'image/png';
    } elseif (preg_match('/\.gif$/i', $pluginfile_url)) {
        $content_type = 'image/gif';
    } elseif (preg_match('/\.webp$/i', $pluginfile_url)) {
        $content_type = 'image/webp';
    } elseif (preg_match('/\.svg$/i', $pluginfile_url)) {
        $content_type = 'image/svg+xml';
    }
}

// Extract filename from URL
$filename = 'image.jpg';
if (preg_match('/\/([^\/]+\.(jpg|jpeg|png|gif|webp|svg))$/i', urldecode($pluginfile_url), $matches)) {
    $filename = $matches[1];
}

// Send headers for INLINE display (not attachment)
header('Content-Type: ' . $content_type);
header('Content-Disposition: inline; filename="' . $filename . '"');
header('Content-Length: ' . strlen($image_data));
header('Cache-Control: public, max-age=86400');
header('Pragma: public');

// Output the image
echo $image_data;
exit;
