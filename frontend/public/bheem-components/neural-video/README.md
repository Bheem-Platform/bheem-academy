# Neural Video Section Component

## Overview
This component displays a professional video player section extracted from https://dev.bheem.cloud/. It features a modern design with animated gradients, hover effects, and responsive behavior.

## File Location
`/var/lib/docker/volumes/moodle-staging_moodle_data/_data/edoo-components/neural-video/neural-video.php`

## Component Details

### File Size
- **Size:** 14K (14 kilobytes)
- **Lines:** 524 lines of code

### Features Included

1. **CSS Styles:**
   - Complete neural-video-section styling with gradient backgrounds
   - Animated video player wrapper with hover effects
   - Custom play button with pulse animation
   - Video info cards with gradient icons
   - Fully responsive design for all screen sizes (1024px, 768px, 640px, 480px, 375px)

2. **HTML Structure:**
   - Section wrapper with id="neuralVideo"
   - Video header with gradient title and subtitle
   - Video player wrapper with thumbnail and play button
   - Embedded YouTube iframe (initially hidden)
   - Video info section with three stats: Duration, Students, Rating

3. **JavaScript Functionality:**
   - DOMContentLoaded event listener
   - Click handlers for play button and thumbnail
   - playVideo() function that:
     - Hides thumbnail and play button
     - Shows iframe and loads video with autoplay
     - Logs video play event to console

## Content Details

### Video Information
- **Title:** "Discover Bheem Academy"
- **Subtitle:** "Watch our introduction video to learn how we're revolutionizing AI education for all ages"
- **Thumbnail:** https://i.ibb.co/xKLr31h7/videothumbnail.png
- **Video URL:** https://www.youtube.com/embed/tn2ez7TpYzQ?autoplay=1&rel=0
- **Duration:** 3:45 min
- **Students:** 10,000+
- **Rating:** 4.9/5.0

### Font Awesome Icons Used
- `fa-clock` (Duration)
- `fa-users` (Students)
- `fa-star` (Rating)

## Usage

Include this component in your Moodle page:

```php
<?php
require_once(__DIR__ . '/edoo-components/neural-video/neural-video.php');
?>
```

## Customization

To customize the video:
1. Change the `videoURL` variable in the JavaScript section
2. Update the thumbnail image URL
3. Modify the video info values (duration, students, rating)
4. Adjust colors in the CSS gradients

## Dependencies
- Font Awesome 5+ (for icons in video-info section)

## Browser Compatibility
- Modern browsers (Chrome, Firefox, Safari, Edge)
- Fully responsive for mobile devices
- Supports webkit-based and standard CSS properties

## Created
October 13, 2025
