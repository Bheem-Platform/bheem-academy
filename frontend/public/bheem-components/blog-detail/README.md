# Blog Detail Page - Cloned from dev.bheem.cloud

A modern, Vue.js-powered blog detail page cloned from https://dev.bheem.cloud/blog/detail.php?entryid=id

**WITHOUT BLOCK FUNCTIONALITY** - This is a clean implementation without any Moodle block integrations.

## Features

### Page Structure
- **Professional Header**: Bheem Academy branded header with navigation
- **Three-Column Layout**:
  - Left: Table of Contents sidebar (sticky)
  - Center: Main article content
  - Right: Author card & related posts
- **Animated Background**: AI-themed floating icons and gradient orbs
- **Reading Progress Bar**: Fixed top progress indicator
- **Responsive Design**: Fully responsive across all devices

### Blog Detail Components
- Featured image with parallax effect
- Article title with gradient animation
- Meta information (author, date, comments)
- Tag pills with stagger animations
- Rich content body
- Attachments section with file downloads
- Share buttons (Twitter, Facebook, LinkedIn, copy link)
- Edit/Delete actions (if user has permissions)

### Visual Effects
- Scroll-reveal animations (fade, slide, scale variants)
- Hover lift effects on cards
- Share button ripple animations
- Floating AI icons with rotation/scale animations
- Gradient orbs with blur filters
- Reduced motion media query support

### Vue.js Functionality
- Blog entry fetching via API
- File size formatting
- Social media share URLs
- Clipboard link copying
- Toast notifications
- Scroll animations with Intersection Observer
- Reading progress tracking
- Parallax image effects

## Installation

1. Include Vue.js 3:
```html
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
```

2. Include Font Awesome:
```html
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
```

3. Include the component:
```php
<?php
require_once($CFG->dirroot . '/edoo-components/blog-detail/blog-detail.php');
?>
```

## Configuration

### API Endpoint
Update the API endpoint in the Vue.js mounted() method:
```javascript
const response = await fetch(`YOUR_API_ENDPOINT/get_entry.php?entryid=${this.entryId}`);
```

### Entry ID
Pass the entry ID via URL parameter or set it directly:
```javascript
// From URL:
const urlParams = new URLSearchParams(window.location.search);
this.entryId = urlParams.get('entryid') || 0;

// Or set directly:
this.entryId = 123;
```

## API Response Format

The component expects the following JSON structure:

```json
{
  "success": true,
  "entry": {
    "id": 1,
    "subject": "Article Title",
    "content": "<p>Article HTML content...</p>",
    "created": "January 15, 2025",
    "author": {
      "fullname": "John Doe",
      "pictureurl": "https://...",
      "profileurl": "https://..."
    },
    "featuredimage": "https://...",
    "tags": ["AI", "Technology", "Education"],
    "attachments": [
      {
        "filename": "document.pdf",
        "url": "https://...",
        "filesize": 1024000
      }
    ],
    "commentscount": 5,
    "canEdit": true,
    "editurl": "https://...",
    "deleteurl": "https://..."
  },
  "relatedPosts": [
    {
      "id": 2,
      "subject": "Related Article",
      "url": "https://...",
      "created": "January 10, 2025"
    }
  ]
}
```

## Customization

### Colors
Update CSS variables in the `<style>` section:
```css
:root {
    --primary: #6366f1;
    --secondary: #ec4899;
    --accent: #06b6d4;
    /* ... more colors */
}
```

### Animations
Modify animation durations and effects in the `@keyframes` sections.

### Layout
Adjust the three-column grid breakpoints:
```css
@media (max-width: 1024px) {
    .article-layout {
        grid-template-columns: 1fr; /* Stack columns */
    }
}
```

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Accessibility

- Semantic HTML structure
- ARIA labels where needed
- Keyboard navigation support
- Reduced motion support
- Focus indicators
- Alt text for images

## Performance Optimizations

- Intersection Observer for scroll animations
- Passive event listeners
- Debounced scroll handlers
- Lazy loading for images (can be added)
- Minimal dependencies

## File Structure

```
blog-detail/
├── README.md           (this file)
├── blog-detail.php     (main component)
└── api/
    └── get_entry.php   (API endpoint example)
```

## Notes

- **No Moodle Blocks**: This version excludes all Moodle block functionality
- **Standalone Component**: Can be used independently or integrated
- **Professional Header**: Uses the Bheem Academy header component
- **Vue.js 3**: Requires Vue.js 3.x

## Support

For issues or questions, refer to the main documentation or contact the development team.
