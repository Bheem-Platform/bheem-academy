# Bheem Academy - Vue.js Course Index

Modern course listing page built with Vue.js 3, TypeScript, and Vite.

## Features

- 🎨 Modern, beautiful UI with gradient backgrounds and animations
- 🔍 Real-time course search
- 📑 Category filtering
- 📱 Fully responsive design
- ⚡ Fast performance with Vue 3 Composition API
- 🎯 TypeScript support
- 🔄 RESTful API integration with Moodle database

## Project Structure

```
vue-course-index/
├── src/
│   ├── components/
│   │   ├── CourseIndex.vue    # Main course listing component
│   │   └── CourseCard.vue     # Individual course card component
│   ├── composables/
│   │   └── useCourses.ts      # Course state management
│   ├── utils/
│   │   ├── api.ts             # API integration functions
│   │   └── types.ts           # TypeScript type definitions
│   ├── assets/
│   │   └── css/
│   │       └── main.css       # Main styles
│   ├── App.vue                # Root component
│   └── main.ts                # Application entry point
├── public/                     # Static assets
├── dist/                       # Build output (generated)
└── package.json               # Dependencies and scripts
```

## Installation

1. Navigate to the project directory:
```bash
cd /var/lib/docker/volumes/moodle-staging_moodle_data/_data/edoo-components/vue-course-index
```

2. Install dependencies:
```bash
npm install
```

## Development

Run the development server:
```bash
npm run dev
```

The app will be available at `http://localhost:5173`

## Build for Production

Build the project:
```bash
npm run build
```

This will generate optimized files in the `dist/` directory.

## API Endpoints

The Vue app communicates with the following Moodle API endpoints:

- `GET /course/api/courses.php` - Fetch all courses
- `GET /course/api/courses.php?categoryid={id}` - Fetch courses by category
- `GET /course/api/courses.php?search={query}` - Search courses
- `GET /course/api/categories.php` - Fetch all categories

## Deployment

The built files are deployed to:
- PHP entry point: `/opt/bitnami/moodle-staging/course/vue-index.php`
- Vue assets: `/opt/bitnami/moodle-staging/edoo-components/vue-course-index/dist/`

## Usage

Access the course index page at:
```
https://dev.bheem.cloud/course/vue-index.php
```

Or update the main course index to use this Vue version:
```
https://dev.bheem.cloud/course/index.php
```

## Technologies

- Vue 3 - Progressive JavaScript framework
- TypeScript - Type-safe JavaScript
- Vite - Next generation frontend tooling
- Font Awesome - Icon library
- CSS3 - Modern styling with gradients and animations

## License

GNU GPL v3 or later

## Copyright

© 2024 Bheem Academy
