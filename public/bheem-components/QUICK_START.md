# Edoo Components - Quick Start Guide

## 🚀 Get Started in 30 Seconds

### Step 1: Include Required Dependencies
```html
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Vue.js 3 (for FAQ component) -->
<script src="https://unpkg.com/vue@3.3.4/dist/vue.global.js"></script>
```

### Step 2: Load Components
```php
<?php
require_once 'edoo-components/loader.php';
edoo_load_component('certification');
edoo_load_component('faq');
?>
```

### Step 3: Done! ✅
Components will render with all styles and functionality.

---

## 📦 Available Components

| Component | File | Dependencies | Description |
|-----------|------|--------------|-------------|
| **certification** | `certification/certification.php` | Font Awesome | Professional certifications showcase |
| **faq** | `faq/faq.php` | Font Awesome, Vue.js 3 | Interactive FAQ accordion |

---

## 🔍 Test Your Setup

Visit these URLs to verify components work:

- **Component Test:** `/edoo-components/test-components.php`
- **Live Demo:** `/edoo-components/example.php`
- **Production:** `/test-vue.php`

---

## 📖 Full Documentation

- **README.md** - Complete documentation
- **IMPLEMENTATION_SUMMARY.md** - Technical details

---

## ⚡ That's It!

You're ready to use modular, reusable Edoo components across your site.
