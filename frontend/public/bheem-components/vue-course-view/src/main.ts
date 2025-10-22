import { createApp } from 'vue'
import App from './App.vue'

// Wait for DOM to be ready before mounting
const mountApp = () => {
  const app = createApp(App)
  app.mount('#app')
  console.log('Vue Course View App mounted successfully')
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', mountApp)
} else {
  mountApp()
}
