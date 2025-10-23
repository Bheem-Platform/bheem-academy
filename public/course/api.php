<?php
/**
 * Course API Endpoint
 * Returns course data as JSON for Vue.js
 */

header('Content-Type: application/json');

require_once(__DIR__ . '/../config.php');

$course_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($course_id <= 0) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid course ID']);
    exit;
}

try {
    // Fetch course data
    $conn = pg_connect(sprintf(
        "host=%s port=5432 dbname=%s user=%s password=%s",
        DB_HOST, DB_NAME, DB_USER, DB_PASS
    ));
    
    if (!$conn) {
        throw new Exception('Database connection failed');
    }
    
    // Get course
    $course_result = pg_query_params(
        $conn,
        'SELECT id, fullname, shortname, summary FROM mdl_course WHERE id = $1',
        [$course_id]
    );
    
    $course = pg_fetch_object($course_result);
    
    if (!$course) {
        http_response_code(404);
        echo json_encode(['error' => 'Course not found']);
        exit;
    }
    
    // Get course sections
    $sections_result = pg_query_params(
        $conn,
        'SELECT id, section, name, summary FROM mdl_course_sections WHERE course = $1 AND section > 0 ORDER BY section ASC',
        [$course_id]
    );
    
    $sections = [];
    while ($section = pg_fetch_object($sections_result)) {
        $sections[] = $section;
    }
    
    echo json_encode([
        'success' => true,
        'course' => $course,
        'sections' => $sections
    ]);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
