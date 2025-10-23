# Edoo Components

A modular, component-based system for Edoo blocks used across Bheem Academy pages.

## Directory Structure

```
edoo-components/
├── loader.php                    # Component loader system
├── README.md                     # This file
├── certification/
│   └── certification.php         # Certification block component
└── faq/
    └── faq.php                   # FAQ accordion component (requires Vue.js)
```

## Features

✅ **Modular Architecture** - Each block is a self-contained component
✅ **Reusable** - Use components across multiple pages
✅ **Maintainable** - Update styles and functionality in one place
✅ **Encapsulated** - Each component includes its own styles and scripts
✅ **Production-Ready** - All styles and functionality preserved from original implementation

## Available Components

### 1. Certification Block (`certification`)
**File:** `certification/certification.php`
**Description:** Professional certifications showcase with features and CTA
**Dependencies:** Font Awesome icons
**Features:**
- Ultra-modern glassmorphism design
- Animated gradient backgrounds
- Feature cards with hover effects
- Floating decorative icons
- Fully responsive (desktop, tablet, mobile)
- Premium button with animated effects

### 2. FAQ Accordion (`faq`)
**File:** `faq/faq.php`
**Description:** Interactive FAQ accordion with Vue.js
**Dependencies:** Vue.js 3, Font Awesome icons
**Features:**
- Vue.js 3 Composition API
- 2-column layout (responsive to 1-column on mobile)
- Slow-motion expand/collapse animations
- Beautiful container box with gradient background
- 10 pre-populated FAQ items
- Fully responsive design
- Premium styling with glassmorphism

### 3. Teacher CTA Block (`teacher-cta`)
**File:** `teacher-cta/teacher-cta.php`
**Description:** "Become A Teacher" call-to-action with image
**Dependencies:** Font Awesome icons
**Features:**
- Modern 2-column layout (content + image)
- Green to cyan gradient theme
- Premium container box with animated border
- Feature list with checkmarks
- Information box with highlights
- Large CTA button with hover effects
- Fully responsive (image reorders on mobile)
- Reduced gap with FAQ block above
- Professional educator-focused design

### 4. About Block (`about`)
**File:** `about/about.php`
**Description:** Corporate about section for Bheemverse Innovation and Bheem Academy
**Dependencies:** Font Awesome icons
**Features:**
- Dual-section layout (Bheemverse Innovation + Bheem Academy)
- Purple gradient theme (#6366F1 → #8B5CF6)
- Premium card design with animated top border
- Feature grid with checkmark icons
- Highlight boxes for vision/mission
- Statistics counters for credibility
- Fully responsive design
- Professional corporate styling

### 5. Footer Block (`footer`)
**File:** `footer/footer.php`
**Description:** Modern, professional footer with comprehensive site navigation and engagement features
**Dependencies:** Font Awesome icons
**Features:**
- Aurora gradient background with animated effects
- Floating AI tech element bubbles (NN, LLaMA, GPT-4, ML, etc.)
- Live activity scrolling bar (students online, new courses, achievements)
- Statistics showcase (15K+ learners, 250+ courses, 8.5K+ certificates, 98% success)
- 4-column grid layout (Brand & Social, Quick Links, Resources, Newsletter)
- Social media icons (Facebook, Twitter, LinkedIn, Instagram, YouTube)
- Newsletter subscription form with validation
- Contact information section (24/7 support, email)
- Trending courses slider with horizontal scroll
- Legal links footer (Privacy Policy, Terms, Cookies, Sitemap)
- Payment badges (Visa, Mastercard, PayPal, Stripe)
- Floating chat widget with notification badge
- Fully responsive (4-column → 2-column → 1-column)
- Dark theme with purple/cyan gradient accents
- GPU-accelerated animations
- Professional corporate design

### 6. Why Bheem Academy Block (`why-bheem-academy`)
**File:** `why-bheem-academy/why-bheem-academy.php`
**Description:** Premium hero section showcasing "Why Bheem Academy?" with AI-focused features
**Dependencies:** Font Awesome icons
**Features:**
- Purple-pink gradient theme (#A855F7 → #EC4899 → #F97316)
- Animated gradient mesh background with floating particles
- "India's First Fully Fledged AI Academy" headline with gradient text
- 3-column feature grid (AI-Powered Learning, Automated Workflow, Industry-Leading Curriculum)
- Glassmorphic card design with animated borders on hover
- Icon glow effects with pulse animation
- Premium CTA button with shimmer and ripple effects
- Statistics bar with gradient numbers (10K+ Students, 500+ Courses, 95% Success Rate)
- Fully responsive (3-column → 2-column → 1-column)
- Dark theme with purple/pink gradient accents
- Professional corporate design with modern AI focus

### 7. Instagram Reels Block (`instagram-reels`)
**File:** `instagram-reels/instagram-reels.php`
**Description:** Social media integration showcasing latest Instagram reels from Bheem Academy
**Dependencies:** Font Awesome icons
**Features:**
- Instagram-themed gradient design (pink-red-orange palette)
- Embedded Instagram reels with native player
- Horizontal tiles carousel (3 tiles visible on desktop)
- Animated gradient background mesh
- Profile link button with Instagram branding
- Loading state animations for iframes
- Premium dots navigation with tooltips
- Navigation arrows with gradient hover effects
- Fully responsive (3-tile → 2-tile → 1-tile)
- Dark theme with Instagram gradient accents
- Touch/swipe support for mobile
- Professional social media integration

## Usage

### Basic Usage

```php
<?php
// Include the loader
require_once 'edoo-components/loader.php';

// Load individual components
edoo_load_component('why-bheem-academy');
edoo_load_component('instagram-reels');
edoo_load_component('certification');
edoo_load_component('faq');
edoo_load_component('teacher-cta');
edoo_load_component('about');
edoo_load_component('footer');
?>
```

### Load Multiple Components

```php
<?php
require_once 'edoo-components/loader.php';

// Load multiple components at once
$components = ['why-bheem-academy', 'instagram-reels', 'certification', 'faq', 'teacher-cta', 'about', 'footer'];
$failed = edoo_load_components($components);

if (!empty($failed)) {
    error_log("Failed to load components: " . implode(', ', $failed));
}
?>
```

### Check Available Components

```php
<?php
require_once 'edoo-components/loader.php';

$available = edoo_get_available_components();
print_r($available);
?>
```

## Example Implementation

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bheem Academy</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Vue.js 3 (Required for FAQ component) -->
    <script src="https://unpkg.com/vue@3.3.4/dist/vue.global.js"></script>
</head>
<body>
    <?php
    require_once 'edoo-components/loader.php';

    // Load Certification Block
    edoo_load_component('certification');

    // Load FAQ Block
    edoo_load_component('faq');
    ?>
</body>
</html>
```

## Dependencies

### Required for All Components:
- **Font Awesome 6+** - Icons used throughout components

### Required for FAQ Component:
- **Vue.js 3** - Powers the interactive accordion functionality

### External CDN Links:
```html
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Vue.js 3 -->
<script src="https://unpkg.com/vue@3.3.4/dist/vue.global.js"></script>
```

## Component Details

### Certification Block

**HTML Structure:**
- `.certification-section` - Main container
- `.certification-container` - Grid layout container
- `.certification-content` - Left column (text content)
- `.certification-image-container` - Right column (certificate image)

**Key Classes:**
- `.certification-badge` - Animated badge with icon
- `.certification-title` - Main heading with gradient highlight
- `.certification-feature` - Individual feature cards
- `.certification-cta` - Call-to-action button

**Customization:**
Edit `certification/certification.php` to modify:
- Title and description text
- Feature items (icon, title, content)
- Button text and link
- Certificate image URL

### FAQ Block

**HTML Structure:**
- `.faq-section` - Main container
- `.faq-container` - Premium box container
- `.faq-header` - Header with badge and title
- `.faq-accordion` - Grid layout for FAQ items

**Key Classes:**
- `.faq-badge` - Animated badge
- `.faq-title` - Main heading with gradient
- `.faq-item` - Individual FAQ card
- `.faq-question` - Clickable question area
- `.faq-answer` - Expandable answer content

**Vue.js API:**
```javascript
data() {
    return {
        activeIndex: null,
        faqs: [
            { question: "...", answer: "..." }
        ]
    };
},
methods: {
    toggleFaq(index) { ... }
}
```

**Customization:**
Edit `faq/faq.php` to modify:
- FAQ questions and answers in the `faqs` array
- Header title and subtitle
- Colors and animations in CSS

## Responsive Breakpoints

Both components are fully responsive with breakpoints at:
- **1280px** - Large desktop adjustments
- **1024px** - Desktop/tablet transition
- **900px** - FAQ switches to 1-column layout
- **768px** - Tablet optimizations
- **480px** - Mobile optimizations

## Browser Support

- ✅ Chrome 90+
- ✅ Firefox 88+
- ✅ Safari 14+
- ✅ Edge 90+
- ✅ Opera 76+

## Performance

- Optimized CSS with minimal repaints
- Efficient Vue.js reactivity
- CSS animations use GPU acceleration
- Lazy-loaded images supported
- Minimal JavaScript footprint

## Accessibility

- Semantic HTML structure
- ARIA labels where appropriate
- Keyboard navigation support for FAQ
- Reduced motion support (`prefers-reduced-motion`)
- High contrast color ratios

## Migration from Inline Implementation

To migrate from inline implementation to component-based:

1. **Backup** your current test-vue.php file
2. **Include** the loader at the top of your file
3. **Replace** inline block code with `edoo_load_component()` calls
4. **Test** each component individually
5. **Verify** all functionality and styles work correctly

## Troubleshooting

### Component Not Loading
- Check file path is correct
- Verify loader.php is included before loading components
- Check PHP error logs for details

### Vue.js Not Working
- Ensure Vue.js 3 CDN is loaded before component
- Check browser console for JavaScript errors
- Verify `#faqAccordion` element exists in DOM

### Styles Not Applying
- Check for CSS conflicts with existing styles
- Verify Font Awesome is loaded
- Use browser dev tools to inspect CSS

## Future Components

Planned additions:
- Features Area Block
- Video Block
- Blog Block
- About Three Block
- CTA Area Block

## Support

For issues or questions:
- Check browser console for errors
- Review PHP error logs
- Verify all dependencies are loaded
- Test components individually

## Version

**Version:** 1.0.0
**Last Updated:** October 3, 2025
**Compatibility:** PHP 7.4+, Vue.js 3.3+

## License

© 2025 Bheem Academy. All rights reserved.
