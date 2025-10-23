<?php
// Course Detail API - Get full course with sections and modules
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require_once(__DIR__ . '/db.php');

try {
    $course_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    
    if ($course_id <= 0) {
        throw new Exception('Invalid course ID');
    }
    
    // Get course details
    $courseResult = Database::query(
        "SELECT * FROM mdl_course WHERE id = $1 AND visible = 1",
        [$course_id]
    );
    
    $course = Database::fetchOne($courseResult);
    
    if (!$course) {
        http_response_code(404);
        throw new Exception('Course not found');
    }
    
    // Get course sections
    $sectionsResult = Database::query(
        "SELECT * FROM mdl_course_sections 
         WHERE course = $1 AND section > 0 
         ORDER BY section ASC",
        [$course_id]
    );
    
    $sections = Database::fetchAll($sectionsResult);
    
    // For each section, get modules
    foreach ($sections as &$section) {
        $section['modules'] = [];
        
        if (!empty($section['sequence'])) {
            $moduleIds = explode(',', $section['sequence']);
            $placeholders = implode(',', array_fill(0, count($moduleIds), '?'));
            
            // Get course modules
            $modulesResult = Database::query(
                "SELECT cm.*, m.name as module_type 
                 FROM mdl_course_modules cm
                 LEFT JOIN mdl_modules m ON cm.module = m.id
                 WHERE cm.id IN (" . implode(',', array_map('intval', $moduleIds)) . ")
                 ORDER BY cm.id ASC"
            );
            
            $modules = Database::fetchAll($modulesResult);
            
            // Get module details based on type
            foreach ($modules as &$module) {
                $module['completed'] = false;
                $module['url'] = '/mod/' . $module['module_type'] . '/view.php?id=' . $module['id'];
                
                // Get module name from specific table
                if ($module['module_type'] == 'resource') {
                    $resResult = Database::query(
                        "SELECT name FROM mdl_resource WHERE id = $1",
                        [$module['instance']]
                    );
                    $res = Database::fetchOne($resResult);
                    $module['name'] = $res ? $res['name'] : 'Resource';
                }
                // Add more module types as needed
            }
            
            $section['modules'] = $modules;
        }
    }
    
    echo json_encode([
        'success' => true,
        'course' => $course,
        'sections' => $sections
    ], JSON_PRETTY_PRINT);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
