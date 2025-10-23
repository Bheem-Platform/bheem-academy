# Quick Start Guide - Vue.js Course Index

## 🚀 Accessing the Application

Visit the course index page:
```
https://dev.bheem.cloud/course/vue-index.php
```

## 📁 Project Location

```
Vue App: /var/lib/docker/volumes/moodle-staging_moodle_data/_data/edoo-components/vue-course-index/
PHP Entry: /opt/bitnami/moodle-staging/course/vue-index.php
API Files: /opt/bitnami/moodle-staging/course/api/
```

## 🛠️ Making Changes

### 1. Navigate to project
```bash
cd /var/lib/docker/volumes/moodle-staging_moodle_data/_data/edoo-components/vue-course-index
```

### 2. Make your changes
Edit files in `src/` directory:
- `src/components/CourseIndex.vue` - Main layout
- `src/components/CourseCard.vue` - Course card design
- `src/assets/css/main.css` - Styling
- `src/composables/useCourses.ts` - Logic

### 3. Rebuild
```bash
npm run build
```

### 4. Update PHP file
Update asset hashes in `/opt/bitnami/moodle-staging/course/vue-index.php`

Check `dist/assets/` for new filenames:
```bash
ls -la dist/assets/
```

## 📝 Common Tasks

### Add a new course card field
1. Update `src/utils/types.ts` - Add to Course interface
2. Update `src/components/CourseCard.vue` - Display the field
3. Update `/opt/bitnami/moodle-staging/course/api/courses.php` - Include in API response

### Change colors/styling
1. Edit `src/assets/css/main.css`
2. Modify CSS variables in `:root` section
3. Rebuild with `npm run build`

### Add new API endpoint
1. Create new PHP file in `/opt/bitnami/moodle-staging/course/api/`
2. Add function in `src/utils/api.ts`
3. Use in component or composable

## 🐛 Troubleshooting

### Blank page
- Check browser console for errors
- Verify API endpoints return data: `/course/api/courses.php`
- Check file permissions on dist/ folder

### Styles not loading
- Verify CSS file path in vue-index.php
- Check hash in filename matches dist/assets/ files
- Clear browser cache

### No courses showing
- Test API directly: `https://dev.bheem.cloud/course/api/courses.php`
- Check Moodle database has visible courses
- Verify user permissions

## 📚 File Structure

```
vue-course-index/
├── src/
│   ├── components/      # Vue components
│   ├── composables/     # Reusable logic
│   ├── utils/           # Helper functions & types
│   ├── assets/          # CSS & images
│   ├── App.vue          # Root component
│   └── main.ts          # Entry point
├── dist/                # Built files (generated)
├── public/              # Static files
└── package.json         # Dependencies
```

## 🎨 Customization Tips

### Change gradient colors
Edit CSS variables in `main.css`:
```css
:root {
  --primary-gradient: linear-gradient(135deg, #YOUR_COLOR_1, #YOUR_COLOR_2);
  --secondary-gradient: linear-gradient(135deg, #YOUR_COLOR_3, #YOUR_COLOR_4);
}
```

### Modify search behavior
Edit `src/composables/useCourses.ts`:
```typescript
const searchCourses = async (query: string) => {
  // Your custom search logic
}
```

### Add category icons
Edit `getCategoryIcon` function in `src/components/CourseIndex.vue`

## ✅ Testing Checklist

Before deploying changes:
- [ ] Run `npm run build` successfully
- [ ] Update asset hashes in vue-index.php
- [ ] Test on desktop browser
- [ ] Test on mobile device
- [ ] Test search functionality
- [ ] Test category filtering
- [ ] Verify API responses
- [ ] Check console for errors

## 📞 Support

- Documentation: README.md
- Deployment Details: DEPLOYMENT_SUMMARY.md
- Moodle Docs: https://docs.moodle.org

---

**Last Updated:** October 10, 2024
