# Bheem Academy Login Page - Vue.js 3 Implementation

A modern, responsive login page for Bheem Academy built with Vue.js 3, TypeScript, and Vite.

## 🚀 Features

- ✅ Vue.js 3 with Composition API
- ✅ TypeScript for type safety
- ✅ Vite for fast development and building
- ✅ Modern, responsive design
- ✅ Password visibility toggle
- ✅ Form validation
- ✅ Remember me functionality
- ✅ Guest login support
- ✅ Integration with Moodle authentication
- ✅ Font Awesome icons
- ✅ Animated floating elements
- ✅ Social media links

## 📁 Project Structure

```
vue-login-page/
├── src/
│   ├── components/
│   │   ├── auth/
│   │   │   └── LoginPage.vue        # Main login component
│   │   └── ui/
│   │       ├── InputField.vue       # Reusable input component
│   │       └── Button.vue           # Reusable button component
│   ├── composables/
│   │   └── useAuth.ts               # Authentication composable
│   ├── utils/
│   │   ├── api.ts                   # API utilities for Moodle integration
│   │   └── validation.ts            # Form validation utilities
│   ├── assets/
│   │   └── styles/
│   │       └── global.css           # Global styles
│   ├── App.vue                      # Root component
│   └── main.ts                      # Application entry point
├── public/                          # Static assets
├── index.html                       # HTML template
├── package.json                     # Dependencies
├── vite.config.ts                   # Vite configuration
├── tsconfig.json                    # TypeScript configuration
└── README.md                        # This file
```

## 🛠️ Installation

1. Navigate to the project directory:
```bash
cd /opt/bitnami/moodle-staging/edoo-components/vue-login-page
```

2. Install dependencies:
```bash
npm install
```

## 💻 Development

Start the development server:
```bash
npm run dev
```

The application will be available at `http://localhost:3000`

## 🏗️ Build for Production

Build the application:
```bash
npm run build
```

The built files will be in the `dist/` directory.

Preview the production build:
```bash
npm run preview
```

## 🔧 Configuration

### Vite Configuration
The `vite.config.ts` file contains:
- Path aliases (`@` points to `src/`)
- Development server settings
- Build optimization options

### TypeScript Configuration
- `tsconfig.json`: Main TypeScript configuration
- `tsconfig.node.json`: Configuration for Vite config file

## 📦 Dependencies

### Runtime Dependencies
- **Vue 3**: Progressive JavaScript framework

### Development Dependencies
- **Vite**: Next-generation frontend tooling
- **TypeScript**: Typed JavaScript
- **@vitejs/plugin-vue**: Vue 3 plugin for Vite
- **vue-tsc**: TypeScript type checker for Vue

## 🎨 Styling

- Global styles in `src/assets/styles/global.css`
- Component-scoped styles using `<style scoped>`
- CSS custom properties for theming
- Responsive design with mobile-first approach

## 🔐 Authentication

The login page integrates with Moodle's existing authentication system:

1. **Login Flow**:
   - Fetches login token from Moodle
   - Submits credentials to `/login/index.php`
   - Handles redirects and error messages
   - Maintains session compatibility

2. **Guest Login**:
   - Redirects to `/login/index.php?guest=1`
   - Handles guest access permissions

## 📱 Responsive Design

The login page is fully responsive:
- **Desktop**: Two-column layout with branding and form
- **Tablet**: Single column with adjusted spacing
- **Mobile**: Optimized for small screens

## 🎯 Key Components

### LoginPage.vue
Main login component with:
- Username and password fields
- Remember me checkbox
- Forgot password link
- Guest login option
- Social media links
- Animated floating elements

### InputField.vue
Reusable input component with:
- Label support
- Error message display
- Password visibility toggle (via slot)
- Validation states

### Button.vue
Reusable button component with:
- Multiple variants (primary, secondary, outline)
- Loading state
- Disabled state
- Icon support

## 🔨 Utilities

### useAuth.ts
Composable for authentication logic:
- `login()`: Authenticate user
- `loginAsGuest()`: Guest login
- `logout()`: User logout

### api.ts
API functions for Moodle integration:
- `loginUser()`: Submit login credentials
- `loginGuest()`: Guest access
- `getLoginToken()`: Fetch CSRF token

### validation.ts
Form validation functions:
- `validateUsername()`: Username validation
- `validatePassword()`: Password validation
- `validateEmail()`: Email validation
- `sanitizeInput()`: XSS prevention

## 🌐 Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## 📄 License

This project is part of Bheem Academy's Moodle installation.

## 👥 Credits

Developed for Bheem Academy - AI-Driven Learning Platform
