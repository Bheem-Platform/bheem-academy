<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Step 1: Starting...\n";

try {
    echo "Step 2: Loading config...\n";
    require_once(__DIR__ . '/config.php');
    echo "Step 3: Config loaded\n";
    
    echo "Step 4: Loading course lib...\n";
    require_once(__DIR__ . '/course/lib.php');
    echo "Step 5: Course lib loaded\n";
    
    echo "Step 6: Loading completion lib...\n";
    require_once($CFG->libdir.'/completionlib.php');
    echo "Step 7: Completion lib loaded\n";
    
    echo "Step 8: Getting course ID...\n";
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 43;
    echo "Step 9: Course ID = $id\n";
    
    echo "Step 10: Getting course from DB...\n";
    $course = $DB->get_record('course', ['id' => $id]);
    echo "Step 11: Course retrieved\n";
    
    echo "Step 12: Getting context...\n";
    $context = context_course::instance($course->id);
    echo "Step 13: Context = " . print_r($context, true) . "\n";
    
    echo "Step 14: Getting modinfo...\n";
    $modinfo = get_fast_modinfo($course);
    echo "Step 15: Modinfo type = " . get_class($modinfo) . "\n";
    
    echo "Step 16: Getting sections...\n";
    $sections = $modinfo->get_section_info_all();
    echo "Step 17: Sections count = " . count($sections) . "\n";
    
    echo "Step 18: Success!\n";
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    echo "Stack trace: " . $e->getTraceAsString() . "\n";
}
