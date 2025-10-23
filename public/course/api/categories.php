<?php
/**
 * Course Categories API - Proxy to FastAPI Backend
 * Updated to use new Academy FastAPI backend
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

try {
    // Call FastAPI backend
    $api_url = 'http://localhost:8082/api/v1/academy/courses/categories';
    
    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json']);
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($http_code === 200) {
        // Parse the response
        $categories = json_decode($response, true);
        
        // For each category, fetch courses
        foreach ($categories as &$category) {
            // Fetch courses for this category
            $courses_url = 'http://localhost:8082/api/v1/academy/courses/catalog?category_id=' . $category['id'] . '&page_size=100';
            
            $ch2 = curl_init($courses_url);
            curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch2, CURLOPT_HTTPHEADER, ['Accept: application/json']);
            
            $courses_response = curl_exec($ch2);
            $courses_http_code = curl_getinfo($ch2, CURLINFO_HTTP_CODE);
            curl_close($ch2);
            
            if ($courses_http_code === 200) {
                $courses_data = json_decode($courses_response, true);
                $category['courses'] = $courses_data['courses'];
            } else {
                $category['courses'] = [];
            }
            
            // Add additional fields for compatibility
            $category['categoryid'] = $category['id'];
            $category['timemodified'] = time();
            
            // Add placeholder image if not exists
            if (!isset($category['categoryimage'])) {
                $category['categoryimage'] = null;
            }
        }
        
        echo json_encode([
            'success' => true,
            'data' => $categories,
            'count' => count($categories)
        ], JSON_PRETTY_PRINT);
        
    } else {
        http_response_code(500);
        echo json_encode([
            'success' => false,
            'error' => 'Failed to fetch categories from backend API',
            'http_code' => $http_code
        ]);
    }
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
