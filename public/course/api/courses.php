<?php
/**
 * Courses API - Proxy to FastAPI Backend
 * Updated to use new Academy FastAPI backend
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

try {
    // Build API URL with query parameters
    $api_base = 'http://localhost:8082/api/v1/academy/courses/catalog';
    $params = [];
    
    // Handle search parameter
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $params[] = 'search=' . urlencode($_GET['search']);
    }
    
    // Handle category ID parameter
    if (isset($_GET['categoryid']) && !empty($_GET['categoryid'])) {
        $params[] = 'category_id=' . intval($_GET['categoryid']);
    }
    
    // Pagination
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $page_size = isset($_GET['page_size']) ? intval($_GET['page_size']) : 100;
    $params[] = 'page=' . $page;
    $params[] = 'page_size=' . $page_size;
    
    // Build full URL
    $api_url = $api_base;
    if (!empty($params)) {
        $api_url .= '?' . implode('&', $params);
    }
    
    // Call FastAPI backend
    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json']);
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($http_code === 200) {
        $data = json_decode($response, true);
        
        // Transform data for compatibility with Vue component
        $courses = $data['courses'];
        
        // Add categoryid field for compatibility
        foreach ($courses as &$course) {
            $course['categoryid'] = $course['category'];
        }
        
        echo json_encode([
            'success' => true,
            'data' => $courses,
            'total' => $data['total'],
            'page' => $data['page'],
            'page_size' => $data['page_size'],
            'total_pages' => $data['total_pages']
        ], JSON_PRETTY_PRINT);
        
    } else {
        http_response_code(500);
        echo json_encode([
            'success' => false,
            'error' => 'Failed to fetch courses from backend API',
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
