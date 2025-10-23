# Installation & Setup Guide

## Prerequisites

- Node.js 18.x or higher
- npm 9.x or higher

## Quick Start

1. **Navigate to project directory**:
```bash
cd /opt/bitnami/moodle-staging/edoo-components/vue-login-page
```

2. **Install dependencies**:
```bash
npm install
```

3. **Start development server**:
```bash
npm run dev
```

4. **Access the application**:
Open your browser and navigate to `http://localhost:3000`

## Build for Production

1. **Build the application**:
```bash
npm run build
```

2. **Preview production build** (optional):
```bash
npm run preview
```

3. **Deploy**: Copy the contents of the `dist/` folder to your web server.

## Integration with Moodle

To integrate this Vue login page with your Moodle installation:

1. Build the production version
2. Copy the `dist/` contents to a publicly accessible directory
3. Update Moodle's theme to point to the new login page
4. Ensure proper CORS and session handling

## Troubleshooting

### Port already in use
If port 3000 is already in use, Vite will automatically try the next available port.

### Build errors
Make sure all dependencies are installed:
```bash
rm -rf node_modules package-lock.json
npm install
```

### TypeScript errors
Run the type checker:
```bash
npm run build
```

## Development Tips

- Hot Module Replacement (HMR) is enabled by default
- Changes to `.vue` files will auto-reload
- TypeScript errors are shown in the console
- Use Vue DevTools browser extension for debugging
