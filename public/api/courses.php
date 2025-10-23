<?php
// Courses API - List all visible courses
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require_once(__DIR__ . '/db.php');

try {
    $sql = "SELECT 
                id, 
                fullname, 
                shortname, 
                summary, 
                summaryformat,
                category,
                startdate,
                enddate,
                visible,
                timecreated,
                timemodified
            FROM mdl_course 
            WHERE visible = 1 AND id > 1
            ORDER BY timecreated DESC";
    
    $result = Database::query($sql);
    $courses = Database::fetchAll($result);
    
    echo json_encode([
        'success' => true,
        'courses' => $courses,
        'count' => count($courses)
    ], JSON_PRETTY_PRINT);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
