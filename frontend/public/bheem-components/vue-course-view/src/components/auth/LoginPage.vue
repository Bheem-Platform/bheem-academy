<template>
  <div class="modern-login-page">
    <!-- Animated Background -->
    <div class="animated-background">
      <!-- Gradient Orbs -->
      <div class="gradient-orb orb-1"></div>
      <div class="gradient-orb orb-2"></div>
      <div class="gradient-orb orb-3"></div>

      <!-- Floating Particles -->
      <div class="particles">
        <div class="particle" v-for="i in 20" :key="i" :style="getParticleStyle(i)"></div>
      </div>

      <!-- Wave Animation -->
      <div class="wave-container">
        <svg class="wave" viewBox="0 0 1200 120" preserveAspectRatio="none">
          <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="wave-path wave-1"></path>
          <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="wave-path wave-2"></path>
          <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="wave-path wave-3"></path>
        </svg>
      </div>
    </div>

    <!-- Login Container -->
    <div class="login-container-wrapper">
      <div class="login-glass-card">
        <!-- Logo Section -->
        <div class="logo-section">
          <div class="logo-circle">
            <img
              src="https://dev.bheem.cloud/pluginfile.php?file=%2F1%2Ftheme_edoo%2Fmain_logo%2F-1%2Flogo.png"
              alt="Bheem Academy"
              class="logo-image"
            />
          </div>
          <h1 class="welcome-title">
            Welcome to <span class="gradient-text">Bheem Academy</span>
          </h1>
          <p class="welcome-subtitle">AI-Driven Learning for a Smarter Future</p>
        </div>

        <!-- Login Form -->
        <form @submit.prevent="handleLogin" class="modern-login-form" novalidate>
          <!-- Username Field -->
          <div class="form-group">
            <div class="input-wrapper">
              <div class="input-icon">
                <i class="fas fa-user"></i>
              </div>
              <input
                type="text"
                id="username"
                v-model="formData.username"
                class="modern-input"
                :class="{ 'has-error': errors.username }"
                placeholder="Username"
                autocomplete="username"
                @blur="validateField('username')"
                @focus="errors.username = ''"
              />
            </div>
            <div v-if="errors.username" class="error-text">
              <i class="fas fa-exclamation-circle"></i> {{ errors.username }}
            </div>
          </div>

          <!-- Password Field -->
          <div class="form-group">
            <div class="input-wrapper">
              <div class="input-icon">
                <i class="fas fa-lock"></i>
              </div>
              <input
                :type="showPassword ? 'text' : 'password'"
                id="password"
                v-model="formData.password"
                class="modern-input"
                :class="{ 'has-error': errors.password }"
                placeholder="Password"
                autocomplete="current-password"
                @blur="validateField('password')"
                @focus="errors.password = ''"
              />
              <button
                type="button"
                class="password-toggle"
                @click="showPassword = !showPassword"
                tabindex="-1"
              >
                <i :class="showPassword ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
              </button>
            </div>
            <div v-if="errors.password" class="error-text">
              <i class="fas fa-exclamation-circle"></i> {{ errors.password }}
            </div>
          </div>

          <!-- Remember Me & Forgot Password -->
          <div class="form-options">
            <label class="remember-checkbox">
              <input type="checkbox" v-model="formData.rememberMe" />
              <span class="checkmark"></span>
              <span class="checkbox-label">Remember me</span>
            </label>
            <a href="/login/forgot_password.php" class="forgot-link">
              Lost password?
            </a>
          </div>

          <!-- Error Message -->
          <div v-if="loginError" class="error-alert">
            <i class="fas fa-exclamation-triangle"></i>
            <span>{{ loginError }}</span>
          </div>

          <!-- Login Button -->
          <button
            type="submit"
            class="login-button"
            :class="{ 'loading': isLoading }"
            :disabled="isLoading"
          >
            <span v-if="!isLoading" class="button-content">
              <i class="fas fa-sign-in-alt"></i>
              Log in
            </span>
            <span v-else class="button-content">
              <span class="spinner"></span>
              Logging in...
            </span>
          </button>

          <!-- Divider -->
          <div class="divider">
            <span>or</span>
          </div>

          <!-- Guest Login -->
          <button
            type="button"
            @click="handleGuestLogin"
            class="guest-button"
            :disabled="isLoading"
          >
            <i class="fas fa-user-shield"></i>
            Access as a guest
          </button>
        </form>

        <!-- Footer Links -->
        <div class="card-footer">
          <button
            type="button"
            class="cookies-link"
            @click="showCookiesNotice"
          >
            <i class="fas fa-cookie-bite"></i>
            Cookies notice
          </button>
        </div>
      </div>

      <!-- Decorative Elements -->
      <div class="decorative-elements">
        <div class="deco-circle circle-1"></div>
        <div class="deco-circle circle-2"></div>
        <div class="deco-circle circle-3"></div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, reactive, onMounted } from 'vue'
import { useAuth } from '../../composables/useAuth'
import { validateUsername, validatePassword } from '../../utils/validation'

const { login, loginAsGuest } = useAuth()

const formData = reactive({
  username: '',
  password: '',
  rememberMe: false
})

const errors = reactive({
  username: '',
  password: ''
})

const showPassword = ref(false)
const isLoading = ref(false)
const loginError = ref('')

const getParticleStyle = (index: number) => {
  const size = Math.random() * 4 + 2
  const duration = Math.random() * 20 + 10
  const delay = Math.random() * 5
  const x = Math.random() * 100
  const y = Math.random() * 100

  return {
    width: `${size}px`,
    height: `${size}px`,
    left: `${x}%`,
    top: `${y}%`,
    animationDuration: `${duration}s`,
    animationDelay: `${delay}s`
  }
}

const validateField = (field: 'username' | 'password') => {
  if (field === 'username') {
    errors.username = validateUsername(formData.username)
  } else if (field === 'password') {
    errors.password = validatePassword(formData.password)
  }
}

const validateForm = (): boolean => {
  errors.username = validateUsername(formData.username)
  errors.password = validatePassword(formData.password)
  return !errors.username && !errors.password
}

const handleLogin = async () => {
  loginError.value = ''

  if (!validateForm()) {
    return
  }

  isLoading.value = true

  try {
    await login({
      username: formData.username,
      password: formData.password,
      rememberMe: formData.rememberMe
    })
  } catch (error: any) {
    loginError.value = error.message || 'Invalid login credentials. Please try again.'
    isLoading.value = false
  }
}

const handleGuestLogin = async () => {
  isLoading.value = true
  loginError.value = ''

  try {
    await loginAsGuest()
  } catch (error: any) {
    loginError.value = error.message || 'Guest login is not available.'
    isLoading.value = false
  }
}

const showCookiesNotice = () => {
  alert('Cookies notice: This site uses cookies to ensure you get the best experience on our website.')
}
</script>

<style scoped>
/* Modern Login Page */
.modern-login-page {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  overflow: hidden;
  font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

/* Animated Background */
.animated-background {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
  z-index: 0;
}

/* Gradient Orbs */
.gradient-orb {
  position: absolute;
  border-radius: 50%;
  filter: blur(80px);
  opacity: 0.6;
  animation: float 20s ease-in-out infinite;
}

.orb-1 {
  width: 500px;
  height: 500px;
  background: linear-gradient(135deg, #667eea, #764ba2);
  top: -250px;
  left: -250px;
  animation-delay: 0s;
}

.orb-2 {
  width: 400px;
  height: 400px;
  background: linear-gradient(135deg, #f093fb, #f5576c);
  bottom: -200px;
  right: -200px;
  animation-delay: 5s;
}

.orb-3 {
  width: 300px;
  height: 300px;
  background: linear-gradient(135deg, #4facfe, #00f2fe);
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  animation-delay: 10s;
}

@keyframes float {
  0%, 100% {
    transform: translate(0, 0) scale(1);
  }
  33% {
    transform: translate(30px, -30px) scale(1.1);
  }
  66% {
    transform: translate(-20px, 20px) scale(0.9);
  }
}

/* Floating Particles */
.particles {
  position: absolute;
  width: 100%;
  height: 100%;
  overflow: hidden;
}

.particle {
  position: absolute;
  background: rgba(255, 255, 255, 0.5);
  border-radius: 50%;
  animation: particle-float linear infinite;
}

@keyframes particle-float {
  0% {
    transform: translateY(0) translateX(0);
    opacity: 0;
  }
  10% {
    opacity: 1;
  }
  90% {
    opacity: 1;
  }
  100% {
    transform: translateY(-100vh) translateX(50px);
    opacity: 0;
  }
}

/* Wave Animation */
.wave-container {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  overflow: hidden;
  line-height: 0;
}

.wave {
  position: relative;
  display: block;
  width: calc(100% + 1.3px);
  height: 150px;
}

.wave-path {
  animation: wave 10s ease-in-out infinite;
}

.wave-1 {
  fill: rgba(255, 255, 255, 0.1);
  animation-delay: 0s;
}

.wave-2 {
  fill: rgba(255, 255, 255, 0.15);
  animation-delay: -2s;
}

.wave-3 {
  fill: rgba(255, 255, 255, 0.2);
  animation-delay: -4s;
}

@keyframes wave {
  0%, 100% {
    transform: translateX(0);
  }
  50% {
    transform: translateX(-25%);
  }
}

/* Login Container */
.login-container-wrapper {
  position: relative;
  z-index: 10;
  width: 100%;
  max-width: 480px;
  padding: 20px;
  animation: slideUp 0.8s ease-out;
}

@keyframes slideUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Glass Card */
.login-glass-card {
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(20px);
  border-radius: 32px;
  padding: 48px 40px;
  box-shadow:
    0 20px 60px rgba(0, 0, 0, 0.3),
    0 0 0 1px rgba(255, 255, 255, 0.5) inset;
  position: relative;
  overflow: hidden;
}

.login-glass-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
  animation: gradient-shift 3s ease infinite;
  background-size: 200% 100%;
}

@keyframes gradient-shift {
  0%, 100% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
}

/* Logo Section */
.logo-section {
  text-align: center;
  margin-bottom: 40px;
}

.logo-circle {
  width: auto;
  height: auto;
  margin: 0 auto 24px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.logo-image {
  width: 200px;
  height: auto;
  max-width: 100%;
}

.welcome-title {
  font-size: 28px;
  font-weight: 800;
  color: #1a202c;
  margin-bottom: 8px;
  line-height: 1.2;
}

.gradient-text {
  background: linear-gradient(135deg, #667eea, #764ba2);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.welcome-subtitle {
  font-size: 15px;
  color: #718096;
  font-weight: 500;
}

/* Form */
.modern-login-form {
  display: flex;
  flex-direction: column;
  gap: 24px;
}

.form-group {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.input-wrapper {
  position: relative;
  display: flex;
  align-items: center;
}

.input-icon {
  position: absolute;
  left: 18px;
  color: #a0aec0;
  font-size: 18px;
  z-index: 2;
  transition: color 0.3s;
}

.modern-input {
  width: 100%;
  padding: 16px 20px 16px 52px;
  font-size: 16px;
  border: 2px solid #e2e8f0;
  border-radius: 16px;
  background: #f7fafc;
  color: #1a202c;
  transition: all 0.3s;
  outline: none;
  font-family: inherit;
}

.modern-input:focus {
  border-color: #667eea;
  background: #fff;
  box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
}

.modern-input:focus + .input-icon {
  color: #667eea;
}

.modern-input.has-error {
  border-color: #f56565;
  background: #fff5f5;
}

.password-toggle {
  position: absolute;
  right: 18px;
  background: none;
  border: none;
  color: #a0aec0;
  cursor: pointer;
  padding: 8px;
  font-size: 18px;
  transition: color 0.3s;
  z-index: 2;
}

.password-toggle:hover {
  color: #667eea;
}

.error-text {
  font-size: 14px;
  color: #f56565;
  display: flex;
  align-items: center;
  gap: 6px;
  padding-left: 4px;
}

/* Form Options */
.form-options {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: -8px;
}

.remember-checkbox {
  display: flex;
  align-items: center;
  gap: 10px;
  cursor: pointer;
  user-select: none;
  position: relative;
}

.remember-checkbox input[type="checkbox"] {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

.checkmark {
  width: 20px;
  height: 20px;
  border: 2px solid #cbd5e0;
  border-radius: 6px;
  background: #f7fafc;
  transition: all 0.3s;
  display: flex;
  align-items: center;
  justify-content: center;
}

.checkmark::after {
  content: '\f00c';
  font-family: 'Font Awesome 6 Free';
  font-weight: 900;
  font-size: 12px;
  color: #fff;
  opacity: 0;
  transform: scale(0);
  transition: all 0.2s;
}

.remember-checkbox input:checked ~ .checkmark {
  background: linear-gradient(135deg, #667eea, #764ba2);
  border-color: #667eea;
}

.remember-checkbox input:checked ~ .checkmark::after {
  opacity: 1;
  transform: scale(1);
}

.checkbox-label {
  font-size: 14px;
  color: #4a5568;
  font-weight: 500;
}

.forgot-link {
  font-size: 14px;
  color: #667eea;
  text-decoration: none;
  font-weight: 600;
  transition: color 0.3s;
}

.forgot-link:hover {
  color: #764ba2;
  text-decoration: underline;
}

/* Error Alert */
.error-alert {
  padding: 14px 18px;
  background: #fff5f5;
  border: 2px solid #feb2b2;
  border-radius: 12px;
  color: #c53030;
  font-size: 14px;
  display: flex;
  align-items: center;
  gap: 10px;
  animation: shake 0.5s;
}

@keyframes shake {
  0%, 100% { transform: translateX(0); }
  25% { transform: translateX(-10px); }
  75% { transform: translateX(10px); }
}

/* Login Button */
.login-button {
  width: 100%;
  padding: 16px 24px;
  font-size: 17px;
  font-weight: 700;
  color: #fff;
  background: linear-gradient(135deg, #667eea, #764ba2);
  border: none;
  border-radius: 16px;
  cursor: pointer;
  transition: all 0.3s;
  box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
  position: relative;
  overflow: hidden;
}

.login-button::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
  transition: left 0.5s;
}

.login-button:hover:not(:disabled) {
  transform: translateY(-2px);
  box-shadow: 0 12px 28px rgba(102, 126, 234, 0.5);
}

.login-button:hover:not(:disabled)::before {
  left: 100%;
}

.login-button:active:not(:disabled) {
  transform: translateY(0);
}

.login-button:disabled {
  opacity: 0.7;
  cursor: not-allowed;
}

.button-content {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
}

.spinner {
  width: 18px;
  height: 18px;
  border: 3px solid rgba(255, 255, 255, 0.3);
  border-top-color: #fff;
  border-radius: 50%;
  animation: spin 0.8s linear infinite;
}

@keyframes spin {
  to { transform: rotate(360deg); }
}

/* Divider */
.divider {
  position: relative;
  text-align: center;
  margin: 8px 0;
}

.divider::before {
  content: '';
  position: absolute;
  top: 50%;
  left: 0;
  right: 0;
  height: 1px;
  background: #e2e8f0;
}

.divider span {
  position: relative;
  background: rgba(255, 255, 255, 0.95);
  padding: 0 16px;
  color: #a0aec0;
  font-size: 14px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

/* Guest Button */
.guest-button {
  width: 100%;
  padding: 14px 24px;
  font-size: 16px;
  font-weight: 600;
  color: #4a5568;
  background: #f7fafc;
  border: 2px solid #e2e8f0;
  border-radius: 16px;
  cursor: pointer;
  transition: all 0.3s;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
}

.guest-button:hover:not(:disabled) {
  background: #edf2f7;
  border-color: #cbd5e0;
  transform: translateY(-2px);
}

.guest-button:disabled {
  opacity: 0.5;
  cursor: not-allowed;
}

/* Card Footer */
.card-footer {
  margin-top: 32px;
  padding-top: 24px;
  border-top: 1px solid #e2e8f0;
  text-align: center;
}

.cookies-link {
  background: none;
  border: none;
  color: #718096;
  font-size: 14px;
  cursor: pointer;
  transition: color 0.3s;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 8px 16px;
  border-radius: 8px;
}

.cookies-link:hover {
  color: #667eea;
  background: #f7fafc;
}

/* Decorative Elements */
.decorative-elements {
  position: absolute;
  width: 100%;
  height: 100%;
  pointer-events: none;
  z-index: -1;
}

.deco-circle {
  position: absolute;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.1);
  animation: float 15s ease-in-out infinite;
}

.circle-1 {
  width: 100px;
  height: 100px;
  top: -50px;
  right: -50px;
}

.circle-2 {
  width: 150px;
  height: 150px;
  bottom: -75px;
  left: -75px;
  animation-delay: 3s;
}

.circle-3 {
  width: 80px;
  height: 80px;
  top: 50%;
  right: -40px;
  animation-delay: 6s;
}

/* Responsive */
@media (max-width: 640px) {
  .login-glass-card {
    padding: 36px 28px;
    border-radius: 24px;
  }

  .logo-image {
    width: 150px;
  }

  .welcome-title {
    font-size: 24px;
  }

  .welcome-subtitle {
    font-size: 14px;
  }

  .modern-input {
    padding: 14px 18px 14px 48px;
    font-size: 15px;
  }

  .login-button,
  .guest-button {
    font-size: 15px;
  }
}
</style>
