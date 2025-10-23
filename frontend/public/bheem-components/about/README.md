# Modern Blog Detail Component

A modern, attractive blog detail page built with Vue.js featuring glassmorphism design, smooth animations, and responsive layout.

## Features

### Design Highlights
- **Glassmorphism UI**: Modern glass-effect cards with backdrop blur
- **Animated Background**: Floating gradient orbs with smooth animations
- **Dark Theme**: Professional dark color scheme with vibrant accents
- **Fully Responsive**: Optimized for mobile, tablet, and desktop

### Key Components

1. **Article Header**
   - Dynamic category badges with custom colors
   - Author information with avatar
   - Article metadata (read time, views, publish date)
   - Interactive tags

2. **Content Area**
   - Rich text formatting support
   - Styled headings, blockquotes, lists
   - Full-width featured image with hover effects
   - Syntax highlighting ready

3. **Attachments Section**
   - File download cards with icons
   - File size formatting
   - Hover animations

4. **Engagement Actions**
   - Like/Unlike functionality
   - Bookmark feature
   - Share buttons (Twitter, Facebook, LinkedIn)
   - Copy link functionality

5. **Comments System**
   - Add new comments
   - Like comments
   - Reply to comments (ready to implement)
   - Relative time formatting

6. **Related Posts**
   - Grid layout with hover effects
   - Image overlays
   - Post previews with metadata

## Usage

### Basic Integration

```javascript
// In your main.js or app.js
import BlogDetail from './BlogDetail.vue'

export default {
  components: {
    BlogDetail
  }
}
```

### With Vue Router

```javascript
// router.js
import BlogDetail from './components/BlogDetail.vue'

const routes = [
  {
    path: '/blog/:id',
    name: 'BlogDetail',
    component: BlogDetail
  }
]
```

### Props Customization

The component uses internal data, but you can easily modify it to accept props:

```vue
<template>
  <BlogDetail :article="articleData" :comments="commentsData" />
</template>
```

## Data Structure

### Article Object
```javascript
{
  id: Number,
  title: String,
  category: String,
  author: {
    name: String,
    role: String,
    avatar: String (URL)
  },
  publishDate: String (ISO date),
  readTime: Number (minutes),
  views: Number,
  likes: Number,
  commentsCount: Number,
  tags: Array<String>,
  featuredImage: String (URL),
  content: String (HTML),
  attachments: Array<{
    id: Number,
    name: String,
    size: Number (bytes),
    url: String
  }>
}
```

## Customization

### Colors
Modify category colors in the computed property:
```javascript
categoryColor() {
  const colors = {
    'Technology': '#8b5cf6',
    'Design': '#ec4899',
    'Vue.js': '#42b883',
    // Add your categories
  };
  return colors[this.article.category] || '#6366f1';
}
```

### API Integration
Replace the data object with API calls:
```javascript
async mounted() {
  const id = this.$route.params.id;
  this.article = await fetchArticle(id);
  this.comments = await fetchComments(id);
  this.relatedPosts = await fetchRelatedPosts(id);
}
```

## Browser Support
- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## Performance Features
- Optimized animations using CSS transforms
- Lazy loading ready for images
- Minimal re-renders with Vue's reactivity
- Efficient event handling

## Accessibility
- Semantic HTML structure
- ARIA labels ready to implement
- Keyboard navigation support
- Screen reader friendly

## License
Free to use for personal and commercial projects.
