# Discover Bheem Academy - Video Showcase Component

A stunning video showcase section with motion graphics effects similar to the Instagram reels format, designed to feature promotional videos about Bheem Academy.

## Features

### Motion Graphics Effects
- **Scroll-triggered animations**: Section animates into view when scrolled
- **Badge drop animation**: Animated badge with rotation and bounce
- **3D title slide**: Title slides in with perspective transformation
- **Subtitle fade-up**: Smooth fade and slide animation
- **Video card entrance**: 3D rotated entrance animation
- **Button pop effect**: CTA button with bounce animation
- **Gradient animations**: Smooth color transitions on text and buttons

### Video Display
- **16:9 Aspect Ratio**: Optimized for YouTube/Vimeo embeds
- **Loading State**: Animated spinner while video loads
- **Hover Overlay**: Video information appears on hover
- **Stats Section Below Video**: Shows Duration, Students, and Rating with animated entrance
- **Responsive Embed**: Maintains aspect ratio on all devices

### Styling
- **Dark Theme**: Matches Instagram reels aesthetic
- **Glassmorphism**: Modern frosted glass effects
- **Gradient Backgrounds**: Animated mesh gradients
- **Smooth Transitions**: Cubic-bezier easing for professional feel

## Installation

1. Include the component in your page:
```php
<?php
require_once($CFG->dirroot . '/edoo-components/discover-bheem-academy/discover-bheem-academy.php');
?>
```

2. Make sure Font Awesome is loaded for icons.

## Configuration

### Replace Video URL

Find this line in the component (around line 1010):
```html
<iframe src="https://www.youtube.com/embed/YOUR_VIDEO_ID"
```

Replace `YOUR_VIDEO_ID` with your actual YouTube video ID.

**Example:**
- YouTube URL: `https://www.youtube.com/watch?v=dQw4w9WgXcQ`
- Video ID: `dQw4w9WgXcQ`
- Embed URL: `https://www.youtube.com/embed/dQw4w9WgXcQ`

### Customize Text Content

Edit the following sections:

**Badge Text** (line ~974):
```html
<span>Featured Video</span>
```

**Title** (line ~978):
```html
<span class="gradient-text">Discover Bheem Academy</span>
```

**Subtitle** (line ~992):
```html
<p class="discover-bheem-subtitle">
    Watch our introduction video to learn how we're revolutionizing AI education for all ages
</p>
```

**Video Info Overlay** (line ~1023):
```html
<h3 class="discover-video-title">Welcome to Bheem Academy</h3>
<p class="discover-video-description">
    Discover how our AI-powered platform is revolutionizing education for students across Kerala and beyond.
</p>
```

**CTA Button** (line ~1035):
```html
<a href="#courses" class="discover-cta-button">
    <i class="fas fa-graduation-cap"></i>
    <span>Explore All Courses</span>
</a>
```

### Update Stats Section Below Video

Edit the video statistics section (line ~1024-1040):
```html
<div class="discover-video-stats">
    <div class="discover-stat-item">
        <i class="fas fa-clock discover-stat-icon"></i>
        <span class="discover-stat-value">5:30</span>
        <span class="discover-stat-label">Duration</span>
    </div>
    <div class="discover-stat-item">
        <i class="fas fa-users discover-stat-icon"></i>
        <span class="discover-stat-value">10K+</span>
        <span class="discover-stat-label">Students</span>
    </div>
    <div class="discover-stat-item">
        <i class="fas fa-star discover-stat-icon"></i>
        <span class="discover-stat-value">4.9</span>
        <span class="discover-stat-label">Rating</span>
    </div>
</div>
```

**Available Icons:**
- Duration: `fas fa-clock`
- Students: `fas fa-users`
- Rating: `fas fa-star`
- Views: `fas fa-eye`
- Videos: `fas fa-video`
- Certificates: `fas fa-certificate`

## Responsive Breakpoints

The component is fully responsive across all devices:

- **Large Desktop**: 1440px+
- **Desktop**: 1200px - 1439px
- **Laptop/Tablet Landscape**: 1024px - 1199px
- **Tablet Portrait**: 768px - 1023px
- **Mobile Landscape**: 640px - 767px
- **Mobile Portrait**: 480px - 639px
- **Small Mobile**: 320px - 479px
- **Extra Small**: <320px

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Animation Triggers

Animations are triggered when the section enters the viewport (10% visible). The sequence is:

1. Section fade-in (0s)
2. Badge drop (0.2s)
3. Title 3D slide (0.4s)
4. Subtitle fade (0.6s)
5. Video card entrance (0.8s)
6. Stats section slide-up (1.1s)
7. CTA button pop (1.3s)

## Customization Options

### Change Colors

Find the gradient definitions and modify:

```css
background: linear-gradient(135deg,
    #8b5cf6 0%,
    #a855f7 20%,
    #c084fc 35%,
    #ec4899 50%,
    #06b6d4 70%,
    #10b981 85%,
    #8b5cf6 100%);
```

### Adjust Animation Timing

Modify the transition delays in the animation keyframes:

```css
.discover-bheem-section.discover-animate .discover-badge {
    animation: discoverBadgeDrop 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 0.2s forwards;
}
```

Change `0.2s` to your preferred delay.

### Change Video Aspect Ratio

Default is 16:9. To change:

```css
.discover-video-embed {
    padding-bottom: 56.25%; /* 16:9 ratio */
}
```

- 16:9 = 56.25%
- 4:3 = 75%
- 21:9 = 42.86%

## Performance Tips

1. **Lazy Loading**: Videos are loaded on demand
2. **GPU Acceleration**: Animations use transform and opacity for smooth performance
3. **Reduced Motion**: Consider adding `prefers-reduced-motion` media query support

## Accessibility

- Semantic HTML structure
- ARIA labels on video iframe
- Keyboard-accessible CTA button
- Color contrast compliant

## Support

For issues or questions, refer to the main Bheem Academy documentation.
