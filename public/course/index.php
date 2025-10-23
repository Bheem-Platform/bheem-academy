<?php
// Proxy to FastAPI backend for course index
$api_url = 'http://localhost:8082/api/v1/academy/course-index/index-page';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if (curl_errno($ch)) {
    http_response_code(500);
    echo 'Error: ' . curl_error($ch);
    curl_close($ch);
    exit;
}

curl_close($ch);

// Set content type to HTML
header('Content-Type: text/html; charset=utf-8');
http_response_code($http_code);

echo $response;
