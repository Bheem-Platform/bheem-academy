<?php
/**
 * Dynamic Menu Generator - Fetches courses from Moodle database
 * This file generates navigation menu items dynamically from course categories
 * Database Structure:
 * - mdl_course_categories: id=6(Kids), 7(Youth), 8(Working Professionals), 9(Super Star), 11(Influencers), 12(Social 360)
 * - mdl_course: Courses with category foreign key
 */

defined('MOODLE_INTERNAL') || die();

global $CFG, $DB;

/**
 * Icon and color mapping for courses
 * Maps course ID to visual styling
 */
$course_styling = [
    // Kids category
    8 => ['icon' => 'fa-star', 'color' => '#ffd700'],
    9 => ['icon' => 'fa-trophy', 'color' => '#ff6b35'],
    10 => ['icon' => 'fa-code', 'color' => '#4ecdc4'],
    11 => ['icon' => 'fa-gamepad', 'color' => '#95e1d3'],
    12 => ['icon' => 'fa-palette', 'color' => '#f38ba8'],
    13 => ['icon' => 'fa-tools', 'color' => '#a6e3a1'],

    // Working Professionals
    41 => ['icon' => 'fa-chalkboard-teacher', 'color' => '#4ecdc4'],
    42 => ['icon' => 'fa-gavel', 'color' => '#8b5cf6'],
    17 => ['icon' => 'fa-calculator', 'color' => '#f59e0b'],
    20 => ['icon' => 'fa-user-tie', 'color' => '#10b981'],
    16 => ['icon' => 'fa-users-cog', 'color' => '#ef4444'],

    // AI Social 360
    43 => ['icon' => 'fa-crown', 'color' => '#ffd700'],
    37 => ['icon' => 'fa-bolt', 'color' => '#ff6b35'],

    // Influencers & Creators
    35 => ['icon' => 'fa-crown', 'color' => '#ffd700'],
    36 => ['icon' => 'fa-bolt', 'color' => '#ff6b35'],

    // Super Stars
    38 => ['icon' => 'fa-rocket', 'color' => '#4ecdc4'],
    40 => ['icon' => 'fa-trophy', 'color' => '#ffd700'],
];

/**
 * Category configuration
 * Maps display name to database category ID and icon
 */
$category_config = [
    [
        'label' => 'Kids',
        'category_id' => 6,
        'icon' => 'fa-child',
        'type' => 'dropdown'
    ],
    [
        'label' => 'Youth',
        'category_id' => 7,
        'icon' => 'fa-users',
        'type' => 'single' // Only one course, so link directly
    ],
    [
        'label' => 'Working Professionals',
        'category_id' => 8,
        'icon' => 'fa-briefcase',
        'type' => 'dropdown'
    ],
    [
        'label' => 'AI Social 360',
        'category_id' => 12,
        'icon' => 'fa-globe',
        'type' => 'dropdown'
    ],
    [
        'label' => 'Influencers & Creators',
        'category_id' => 11,
        'icon' => 'fa-video',
        'type' => 'dropdown'
    ],
    [
        'label' => 'Super Stars',
        'category_id' => 9,
        'icon' => 'fa-star',
        'type' => 'dropdown'
    ]
];

/**
 * Fetch courses for a specific category from database
 */
function get_category_courses($category_id) {
    global $CFG, $DB, $course_styling;

    try {
        // Query database for visible courses in this category
        $courses = $DB->get_records('course', [
            'category' => $category_id,
            'visible' => 1
        ], 'fullname ASC', 'id, fullname, category');

        $course_list = [];
        foreach ($courses as $course) {
            // Get styling for this course or use defaults
            $styling = isset($course_styling[$course->id]) ? $course_styling[$course->id] : [
                'icon' => 'fa-book',
                'color' => '#667eea'
            ];

            $course_list[] = [
                'id' => $course->id,
                'name' => $course->fullname,
                'url' => $CFG->wwwroot . '/course/view.php?id=' . $course->id,
                'icon' => $styling['icon'],
                'color' => $styling['color']
            ];
        }

        return $course_list;
    } catch (Exception $e) {
        error_log('Error fetching courses for category ' . $category_id . ': ' . $e->getMessage());
        return [];
    }
}

/**
 * Generate complete navigation menu from database
 */
function generate_navigation_menu() {
    global $category_config;

    $navigation_items = [];

    foreach ($category_config as $cat_config) {
        // Fetch courses from database for this category
        $courses = get_category_courses($cat_config['category_id']);

        // Skip empty categories
        if (empty($courses)) {
            continue;
        }

        $nav_item = [
            'label' => $cat_config['label'],
            'icon' => $cat_config['icon'],
            'category_id' => $cat_config['category_id'],
            'courses' => $courses
        ];

        // Determine if single link or dropdown
        if ($cat_config['type'] === 'single' && count($courses) === 1) {
            $nav_item['type'] = 'single';
            $nav_item['url'] = $courses[0]['url'];
            $nav_item['course_id'] = $courses[0]['id'];
        } else {
            $nav_item['type'] = 'dropdown';
        }

        $navigation_items[] = $nav_item;
    }

    return $navigation_items;
}

// Generate menu data for template
$dynamic_navigation = generate_navigation_menu();

?>
