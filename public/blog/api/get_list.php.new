<?php
// API endpoint to fetch blog listing for Vue.js frontend
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
    
    // Get parameters
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $perpage = isset($_GET['perpage']) ? intval($_GET['perpage']) : 9;
    $search = isset($_GET['search']) ? pg_escape_string($conn, $_GET['search']) : '';
    
    // Calculate offset
    $offset = ($page - 1) * $perpage;
    
    // Build SQL query
    $sql = "SELECT p.*, u.firstname, u.lastname, u.picture, u.email
            FROM mdl_post p
            JOIN mdl_user u ON p.userid = u.id
            WHERE p.module = 'blog'
            AND (p.publishstate = 'site' OR p.publishstate = 'public')";
    
    $count_sql = "SELECT COUNT(*) as total
                  FROM mdl_post p
                  WHERE p.module = 'blog'
                  AND (p.publishstate = 'site' OR p.publishstate = 'public')";
    
    // Add search filter if provided
    if (!empty($search)) {
        $sql .= " AND (p.subject ILIKE '%$search%' OR p.summary ILIKE '%$search%')";
        $count_sql .= " AND (p.subject ILIKE '%$search%' OR p.summary ILIKE '%$search%')";
    }
    
    // Add ordering and pagination
    $sql .= " ORDER BY p.created DESC, p.id DESC LIMIT $perpage OFFSET $offset";
    
    // Get total count
    $count_result = pg_query($conn, $count_sql);
    $count_row = pg_fetch_assoc($count_result);
    $total = $count_row['total'];
    
    // Get posts
    $result = pg_query($conn, $sql);
    
    if (!$result) {
        throw new Exception('Query failed: ' . pg_last_error($conn));
    }
    
    $posts = [];
    while ($row = pg_fetch_assoc($result)) {
        // Get tags for this post
        $tags_sql = "SELECT t.name, t.rawname 
                     FROM mdl_tag t
                     JOIN mdl_tag_instance ti ON t.id = ti.tagid
                     WHERE ti.itemtype = 'post' AND ti.itemid = " . intval($row['id']);
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
                          AND itemid = " . intval($row['id']) . "
                          AND filename != '.'
                          ORDER BY id DESC LIMIT 1";
        $attachment_result = pg_query($conn, $attachment_sql);
        $attachment = pg_fetch_assoc($attachment_result);
        
        // Build image URL
        $image_url = '';
        if ($attachment && !empty($attachment['filename'])) {
            $image_url = "https://newdesign.bheem.cloud/blog/image.php?id=" . $row['id'];
        } else {
            // Default image based on category or random
            $default_images = [
                'https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=800',
                'https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=800',
                'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=800'
            ];
            $image_url = $default_images[intval($row['id']) % 3];
        }
        
        // Format date
        $created_date = date('M d, Y', $row['created']);
        $time_ago = timeAgo($row['created']);
        
        // Extract excerpt from summary
        $excerpt = strip_tags($row['summary']);
        if (strlen($excerpt) > 200) {
            $excerpt = substr($excerpt, 0, 200) . '...';
        }
        
        $posts[] = [
            'id' => intval($row['id']),
            'title' => $row['subject'],
            'content' => $row['summary'],
            'excerpt' => $excerpt,
            'author' => trim($row['firstname'] . ' ' . $row['lastname']),
            'author_email' => $row['email'],
            'created' => intval($row['created']),
            'created_date' => $created_date,
            'time_ago' => $time_ago,
            'modified' => intval($row['lastmodified']),
            'image' => $image_url,
            'tags' => $tags,
            'url' => "https://newdesign.bheem.cloud/blog/detail.php?entryid=" . $row['id']
        ];
    }
    
    // Calculate pagination
    $total_pages = ceil($total / $perpage);
    
    $response = [
        'success' => true,
        'posts' => $posts,
        'pagination' => [
            'current_page' => $page,
            'per_page' => $perpage,
            'total' => intval($total),
            'total_pages' => $total_pages,
            'has_next' => $page < $total_pages,
            'has_prev' => $page > 1
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

function timeAgo($timestamp) {
    $diff = time() - $timestamp;
    
    if ($diff < 60) {
        return 'Just now';
    } elseif ($diff < 3600) {
        $mins = floor($diff / 60);
        return $mins . ' minute' . ($mins > 1 ? 's' : '') . ' ago';
    } elseif ($diff < 86400) {
        $hours = floor($diff / 3600);
        return $hours . ' hour' . ($hours > 1 ? 's' : '') . ' ago';
    } elseif ($diff < 604800) {
        $days = floor($diff / 86400);
        return $days . ' day' . ($days > 1 ? 's' : '') . ' ago';
    } else {
        return date('M d, Y', $timestamp);
    }
}
