<?php
// API endpoint to fetch single blog entry for Vue.js frontend
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

try {
    // Database connection
    $host = '65.109.167.218';
    $port = '5432';
    $dbname = 'bheem_academy_staging';
    $user = 'postgres';
    $password = 'Bheem924924.@';
    
    $conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
    
    if (!$conn) {
        throw new Exception('Database connection failed');
    }
    
    // Get entry ID
    $entryid = isset($_GET['entryid']) ? intval($_GET['entryid']) : 0;
    
    if ($entryid == 0) {
        throw new Exception('Entry ID is required');
    }
    
    // Fetch blog entry
    $sql = "SELECT p.*, u.firstname, u.lastname, u.picture, u.email
            FROM mdl_post p
            JOIN mdl_user u ON p.userid = u.id
            WHERE p.id = $entryid 
            AND p.module = 'blog'
            AND (p.publishstate = 'site' OR p.publishstate = 'public')";
    
    $result = pg_query($conn, $sql);
    
    if (!$result) {
        throw new Exception('Query failed: ' . pg_last_error($conn));
    }
    
    $row = pg_fetch_assoc($result);
    
    if (!$row) {
        throw new Exception('Blog entry not found');
    }
    
    // Get tags for this post
    $tags_sql = "SELECT t.name, t.rawname 
                 FROM mdl_tag t
                 JOIN mdl_tag_instance ti ON t.id = ti.tagid
                 WHERE ti.itemtype = 'post' AND ti.itemid = $entryid";
    $tags_result = pg_query($conn, $tags_sql);
    $tags = [];
    while ($tag_row = pg_fetch_assoc($tags_result)) {
        $tags[] = $tag_row['rawname'];
    }
    
    // Get attachment if exists
    $attachment_sql = "SELECT filename, filesize, mimetype, filepath
                      FROM mdl_files
                      WHERE component = 'blog' 
                      AND filearea = 'attachment'
                      AND itemid = $entryid
                      AND filename != '.'
                      ORDER BY id DESC LIMIT 1";
    $attachment_result = pg_query($conn, $attachment_sql);
    $attachment = pg_fetch_assoc($attachment_result);
    
    // Build image URL
    $image_url = '';
    if ($attachment && !empty($attachment['filename'])) {
        $image_url = "https://newdesign.bheem.cloud/blog/image.php?id=" . $entryid;
    } else {
        // Default image
        $image_url = 'https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=1200';
    }
    
    // Format dates
    $created_date = date('F d, Y', $row['created']);
    $modified_date = date('F d, Y', $row['lastmodified']);
    
    // Get related posts (same tags or recent)
    $related_sql = "SELECT p.id, p.subject, p.created
                    FROM mdl_post p
                    WHERE p.module = 'blog'
                    AND p.id != $entryid
                    AND (p.publishstate = 'site' OR p.publishstate = 'public')
                    ORDER BY p.created DESC
                    LIMIT 3";
    $related_result = pg_query($conn, $related_sql);
    $related_posts = [];
    while ($related_row = pg_fetch_assoc($related_result)) {
        $related_posts[] = [
            'id' => intval($related_row['id']),
            'title' => $related_row['subject'],
            'url' => "https://newdesign.bheem.cloud/blog/detail.php?entryid=" . $related_row['id']
        ];
    }
    
    $response = [
        'success' => true,
        'post' => [
            'id' => intval($row['id']),
            'title' => $row['subject'],
            'content' => $row['summary'],
            'author' => trim($row['firstname'] . ' ' . $row['lastname']),
            'author_email' => $row['email'],
            'created' => intval($row['created']),
            'created_date' => $created_date,
            'modified' => intval($row['lastmodified']),
            'modified_date' => $modified_date,
            'image' => $image_url,
            'tags' => $tags,
            'related_posts' => $related_posts
        ]
    ];
    
    pg_close($conn);
    
    echo json_encode($response);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
