<?php
$course_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course - Bheem Academy</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { margin: 0; padding: 0; font-family: 'Inter', sans-serif; }
        #course-iframe { width: 100%; border: none; min-height: calc(100vh - 80px); }
    </style>
</head>
<body>
    <?php
    // Include homepage header
    $homepage = file_get_contents('https://newdesign.bheem.cloud/');
    preg_match('/<header[^>]*>.*?<\/header>/is', $homepage, $header_match);
    preg_match('/<style>.*?<\/style>/is', $homepage, $header_style);
    if (isset($header_style[0])) echo $header_style[0];
    if (isset($header_match[0])) echo $header_match[0];
    ?>
    
    <iframe id="course-iframe" src="/bheem-components/vue-course-view/dist/index.html?id=<?php echo $course_id; ?>"></iframe>
    
    <?php
    // Include footer
    require_once(__DIR__ . '/../bheem-components/footer/footer.php');
    ?>
</body>
</html>
