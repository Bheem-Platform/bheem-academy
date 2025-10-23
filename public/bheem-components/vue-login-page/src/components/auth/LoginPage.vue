<template>
  <div class="modern-login-page">
    <!-- Animated Background with Images -->
    <div class="animated-background">
      <!-- Background Overlay -->
      <div class="bg-overlay"></div>

      <!-- Workflow Connection Lines -->
      <svg class="workflow-connections" xmlns="http://www.w3.org/2000/svg">
        <defs>
          <linearGradient id="lineGradient1" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" style="stop-color:#667eea;stop-opacity:0.6" />
            <stop offset="50%" style="stop-color:#764ba2;stop-opacity:0.8" />
            <stop offset="100%" style="stop-color:#f093fb;stop-opacity:0.6" />
          </linearGradient>
          <linearGradient id="lineGradient2" x1="100%" y1="0%" x2="0%" y2="100%">
            <stop offset="0%" style="stop-color:#f093fb;stop-opacity:0.6" />
            <stop offset="50%" style="stop-color:#667eea;stop-opacity:0.8" />
            <stop offset="100%" style="stop-color:#764ba2;stop-opacity:0.6" />
          </linearGradient>
          <filter id="glow">
            <feGaussianBlur stdDeviation="3" result="coloredBlur"/>
            <feMerge>
              <feMergeNode in="coloredBlur"/>
              <feMergeNode in="SourceGraphic"/>
            </feMerge>
          </filter>
        </defs>

        <!-- Connection Lines Between Nodes -->
        <!-- Line 1-2 (Top Left to Top Right) -->
        <path class="connection-line line-1-2" stroke="url(#lineGradient1)" />

        <!-- Line 2-4 (Top Right to Bottom Right) -->
        <path class="connection-line line-2-4" stroke="url(#lineGradient2)" />

        <!-- Line 4-3 (Bottom Right to Bottom Left) -->
        <path class="connection-line line-4-3" stroke="url(#lineGradient1)" />

        <!-- Line 3-1 (Bottom Left to Top Left) -->
        <path class="connection-line line-3-1" stroke="url(#lineGradient2)" />

        <!-- Diagonal Cross Lines -->
        <path class="connection-line line-1-4" stroke="url(#lineGradient1)" />
        <path class="connection-line line-2-3" stroke="url(#lineGradient2)" />

        <!-- Data Flow Particles -->
        <circle class="flow-particle particle-1-2" r="4" fill="#667eea">
          <animateMotion dur="8s" repeatCount="indefinite">
            <mpath href="#path-1-2"/>
          </animateMotion>
        </circle>
        <circle class="flow-particle particle-2-4" r="4" fill="#f093fb">
          <animateMotion dur="10s" repeatCount="indefinite">
            <mpath href="#path-2-4"/>
          </animateMotion>
        </circle>
        <circle class="flow-particle particle-4-3" r="4" fill="#764ba2">
          <animateMotion dur="9s" repeatCount="indefinite">
            <mpath href="#path-4-3"/>
          </animateMotion>
        </circle>
        <circle class="flow-particle particle-3-1" r="4" fill="#667eea">
          <animateMotion dur="11s" repeatCount="indefinite">
            <mpath href="#path-3-1"/>
          </animateMotion>
        </circle>
      </svg>

      <!-- Floating Background Images with Node Indicators -->
      <div class="floating-images">
        <div class="bg-image image-1" data-node="1">
          <div class="node-indicator">
            <div class="node-pulse"></div>
            <div class="node-dot"></div>
            <div class="node-label">Node 1</div>
          </div>
          <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/05f05403-bb6c-45af-6d4a-8e2656951f00/public" alt="Background 1" />
        </div>
        <div class="bg-image image-2" data-node="2">
          <div class="node-indicator">
            <div class="node-pulse"></div>
            <div class="node-dot"></div>
            <div class="node-label">Node 2</div>
          </div>
          <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/0932ca04-4388-4f6e-fcdd-9cd13f451300/public" alt="Background 2" />
        </div>
        <div class="bg-image image-3" data-node="3">
          <div class="node-indicator">
            <div class="node-pulse"></div>
            <div class="node-dot"></div>
            <div class="node-label">Node 3</div>
          </div>
          <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/33f62e15-35d5-4ca5-5077-b0076e244b00/public" alt="Background 3" />
        </div>
        <div class="bg-image image-4" data-node="4">
          <div class="node-indicator">
            <div class="node-pulse"></div>
            <div class="node-dot"></div>
            <div class="node-label">Node 4</div>
          </div>
          <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/90a4f6ec-2bdb-4a76-20d3-505cdfaf9700/public" alt="Kodee" />
        </div>
        <div class="bg-image image-5" data-node="5">
          <div class="node-indicator">
            <div class="node-pulse"></div>
            <div class="node-dot"></div>
            <div class="node-label">Node 5</div>
          </div>
          <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/0dafe680-5c75-4f2e-556e-cf90d10ff100/public" alt="Bheem Cloud" />
        </div>
        <div class="bg-image image-6" data-node="6">
          <div class="node-indicator">
            <div class="node-pulse"></div>
            <div class="node-dot"></div>
            <div class="node-label">Node 6</div>
          </div>
          <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/937ded20-dbbb-4da6-53b5-e0b36f6fa800/public" alt="Agent Bheem" />
        </div>
        <div class="bg-image image-7" data-node="7">
          <div class="node-indicator">
            <div class="node-pulse"></div>
            <div class="node-dot"></div>
            <div class="node-label">Node 7</div>
          </div>
          <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/e7ee5acc-ef8d-4aa8-de79-a5182807ff00/public" alt="Social Selling AI" />
        </div>
      </div>

      <!-- Gradient Overlay for Depth -->
      <div class="gradient-overlay"></div>

      <!-- Floating Particles -->
      <div class="particles">
        <div class="particle" v-for="i in 15" :key="i" :style="getParticleStyle(i)"></div>
      </div>

      <!-- Animated Light Rays -->
      <div class="light-rays">
        <div class="ray ray-1"></div>
        <div class="ray ray-2"></div>
        <div class="ray ray-3"></div>
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

// Update connection lines dynamically - connect to edge of boxes
const updateConnections = () => {
  const nodes = document.querySelectorAll('.bg-image')
  if (nodes.length < 4) return

  const getNodeCenter = (node: Element) => {
    const rect = node.getBoundingClientRect()
    return {
      x: rect.left + rect.width / 2,
      y: rect.top + rect.height / 2,
      width: rect.width,
      height: rect.height,
      left: rect.left,
      right: rect.right,
      top: rect.top,
      bottom: rect.bottom
    }
  }

  const positions = Array.from(nodes).map(node => getNodeCenter(node))

  // Calculate edge connection point based on direction
  const getEdgePoint = (fromPos: any, toPos: any) => {
    const dx = toPos.x - fromPos.x
    const dy = toPos.y - fromPos.y
    const angle = Math.atan2(dy, dx)

    // Calculate intersection with box edge
    const radius = Math.min(fromPos.width, fromPos.height) / 2
    const edgeX = fromPos.x + Math.cos(angle) * (radius + 10)
    const edgeY = fromPos.y + Math.sin(angle) * (radius + 10)

    return { x: edgeX, y: edgeY }
  }

  // Update connection line paths
  const updateLine = (className: string, start: number, end: number) => {
    const line = document.querySelector(`.${className}`) as SVGPathElement
    if (line && positions[start] && positions[end]) {
      const startPos = positions[start]
      const endPos = positions[end]

      // Get edge points instead of center points
      const startEdge = getEdgePoint(startPos, endPos)
      const endEdge = getEdgePoint(endPos, startPos)

      // Create curved path
      const dx = endEdge.x - startEdge.x
      const dy = endEdge.y - startEdge.y

      // Calculate control points for smooth curve
      const offset = Math.sqrt(dx * dx + dy * dy) * 0.2
      const controlX1 = startEdge.x + dy * offset / Math.sqrt(dx * dx + dy * dy)
      const controlY1 = startEdge.y - dx * offset / Math.sqrt(dx * dx + dy * dy)
      const controlX2 = endEdge.x + dy * offset / Math.sqrt(dx * dx + dy * dy)
      const controlY2 = endEdge.y - dx * offset / Math.sqrt(dx * dx + dy * dy)

      const path = `M ${startEdge.x} ${startEdge.y} C ${controlX1} ${controlY1}, ${controlX2} ${controlY2}, ${endEdge.x} ${endEdge.y}`
      line.setAttribute('d', path)
      line.setAttribute('id', `path-${start + 1}-${end + 1}`)
    }
  }

  // Update all connection lines
  updateLine('line-1-2', 0, 1)
  updateLine('line-2-4', 1, 3)
  updateLine('line-4-3', 3, 2)
  updateLine('line-3-1', 2, 0)
  updateLine('line-1-4', 0, 3)
  updateLine('line-2-3', 1, 2)
}

onMounted(() => {
  // Initial connection update
  setTimeout(updateConnections, 100)

  // Update connections periodically to follow animations
  setInterval(updateConnections, 100)
})

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
  background:
    linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
  z-index: 0;
  overflow: hidden;
}

.animated-background::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background:
    radial-gradient(circle at 20% 30%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
    radial-gradient(circle at 80% 70%, rgba(255, 255, 255, 0.08) 0%, transparent 50%);
  animation: gradientPulse 8s ease-in-out infinite;
  z-index: 1;
}

@keyframes gradientPulse {
  0%, 100% {
    opacity: 1;
  }
  50% {
    opacity: 0.5;
  }
}

/* Background Overlay */
.bg-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background:
    linear-gradient(45deg, rgba(255, 255, 255, 0.05) 0%, transparent 50%, rgba(255, 255, 255, 0.05) 100%);
  z-index: 2;
}

/* Floating Background Images */
.floating-images {
  position: absolute;
  width: 100%;
  height: 100%;
  z-index: 2;
}

.bg-image {
  position: absolute;
  overflow: hidden;
  border-radius: 24px;
  box-shadow:
    0 20px 60px rgba(0, 0, 0, 0.35),
    0 12px 35px rgba(102, 126, 234, 0.25),
    0 6px 18px rgba(118, 75, 162, 0.2),
    0 0 0 1px rgba(255, 255, 255, 0.1) inset,
    0 0 40px rgba(167, 139, 250, 0.3);
  opacity: 1;
  filter: brightness(1.05) saturate(1.15) contrast(1.05);
  transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
  backdrop-filter: blur(30px) saturate(180%);
  -webkit-backdrop-filter: blur(30px) saturate(180%);
  background:
    linear-gradient(145deg,
      rgba(255, 255, 255, 0.12) 0%,
      rgba(255, 255, 255, 0.08) 50%,
      rgba(255, 255, 255, 0.12) 100%),
    linear-gradient(145deg,
      rgba(167, 139, 250, 0.15) 0%,
      rgba(139, 92, 246, 0.10) 50%,
      rgba(167, 139, 250, 0.15) 100%);
  padding: 10px;
  animation: modernCardGlow 6s ease-in-out infinite alternate;
  will-change: transform, opacity;
  border: 1.5px solid rgba(255, 255, 255, 0.25);
  position: relative;
}

@keyframes modernCardGlow {
  0%, 100% {
    box-shadow:
      0 20px 60px rgba(0, 0, 0, 0.35),
      0 12px 35px rgba(102, 126, 234, 0.25),
      0 6px 18px rgba(118, 75, 162, 0.2),
      0 0 0 1px rgba(255, 255, 255, 0.1) inset,
      0 0 40px rgba(167, 139, 250, 0.3);
    border-color: rgba(255, 255, 255, 0.25);
  }
  50% {
    box-shadow:
      0 25px 70px rgba(0, 0, 0, 0.4),
      0 15px 45px rgba(102, 126, 234, 0.35),
      0 8px 22px rgba(118, 75, 162, 0.3),
      0 0 0 1px rgba(255, 255, 255, 0.15) inset,
      0 0 60px rgba(167, 139, 250, 0.45);
    border-color: rgba(255, 255, 255, 0.35);
  }
}

/* Modern animated gradient overlay */
.bg-image::before {
  content: '';
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: linear-gradient(
    60deg,
    transparent 30%,
    rgba(167, 139, 250, 0.15) 45%,
    rgba(139, 92, 246, 0.2) 50%,
    rgba(167, 139, 250, 0.15) 55%,
    transparent 70%
  );
  opacity: 0;
  transition: opacity 0.6s ease;
  pointer-events: none;
  z-index: 2;
  animation: rotateGradient 8s linear infinite;
}

@keyframes rotateGradient {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

/* Enhanced shimmer effect with gradient colors */
.bg-image::after {
  content: '';
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: linear-gradient(
    110deg,
    transparent 20%,
    rgba(255, 255, 255, 0.25) 40%,
    rgba(255, 255, 255, 0.4) 50%,
    rgba(255, 255, 255, 0.25) 60%,
    transparent 80%
  );
  transform: translateX(-100%) translateY(-100%) rotate(30deg);
  transition: transform 1.2s cubic-bezier(0.34, 1.56, 0.64, 1);
  pointer-events: none;
  z-index: 3;
  opacity: 0;
}

.bg-image:hover {
  opacity: 1;
  transform: scale(1.08) translateY(-12px) rotate(2deg);
  box-shadow:
    0 30px 80px rgba(102, 126, 234, 0.5),
    0 20px 50px rgba(118, 75, 162, 0.4),
    0 12px 30px rgba(240, 147, 251, 0.35),
    0 0 70px rgba(102, 126, 234, 0.3),
    inset 0 2px 6px rgba(255, 255, 255, 0.5);
  filter: brightness(1.2) saturate(1.3) contrast(1.1);
  backdrop-filter: blur(20px) saturate(180%);
  -webkit-backdrop-filter: blur(20px) saturate(180%);
}

.bg-image:hover::before {
  opacity: 0.6;
}

.bg-image:hover::after {
  opacity: 1;
  transform: translateX(100%) translateY(100%) rotate(30deg);
}

.bg-image img {
  width: 100%;
  height: 100%;
  object-fit: contain;
  display: block;
  border-radius: 14px;
  position: relative;
  z-index: 1;
  transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
  will-change: transform;
}

.bg-image:hover img {
  transform: scale(1.05);
}

.image-1 {
  width: 120px;
  height: 80px;
  top: 10%;
  left: 6%;
  animation: floatImage1 25s ease-in-out infinite;
  transform-origin: center;
  z-index: 6;
}

.image-1 img {
  width: 100%;
  height: 100%;
  object-fit: contain;
  object-position: center;
}

.image-2 {
  width: 130px;
  height: 85px;
  top: 8%;
  right: 6%;
  animation: floatImage2 30s ease-in-out infinite;
  transform-origin: center;
  z-index: 6;
}

.image-2 img {
  width: 100%;
  height: 100%;
  object-fit: contain;
  object-position: center;
}

.image-3 {
  width: 115px;
  height: 75px;
  bottom: 8%;
  left: 7%;
  animation: floatImage3 28s ease-in-out infinite;
  transform-origin: center;
  z-index: 6;
}

.image-3 img {
  width: 100%;
  height: 100%;
  object-fit: contain;
  object-position: center;
}

.image-4 {
  width: 125px;
  height: 82px;
  bottom: 10%;
  right: 7%;
  animation: floatImage4 32s ease-in-out infinite;
  transform-origin: center;
  z-index: 6;
}

.image-4 img {
  width: 100%;
  height: 100%;
  object-fit: contain;
  object-position: center;
}

.image-5 {
  width: 120px;
  height: 80px;
  top: 50%;
  left: 15%;
  animation: floatImage5 27s ease-in-out infinite;
  transform-origin: center;
  z-index: 6;
}

.image-5 img {
  width: 100%;
  height: 100%;
  object-fit: contain;
  object-position: center;
}

.image-6 {
  width: 120px;
  height: 80px;
  top: 50%;
  right: 15%;
  animation: floatImage6 29s ease-in-out infinite;
  transform-origin: center;
  z-index: 6;
}

.image-6 img {
  width: 100%;
  height: 100%;
  object-fit: contain;
  object-position: center;
}

.image-7 {
  width: 120px;
  height: 80px;
  bottom: 50%;
  left: 50%;
  animation: floatImage7 26s ease-in-out infinite;
  transform-origin: center;
  z-index: 6;
}

.image-7 img {
  width: 100%;
  height: 100%;
  object-fit: contain;
  object-position: center;
}

@keyframes floatImage1 {
  0% {
    transform: translate(0, 0) rotate(0deg) scale(1);
    filter: brightness(1.05) saturate(1.1) contrast(1.03);
  }
  12% {
    transform: translate(30px, -20px) rotate(2deg) scale(1.01);
    filter: brightness(1.06) saturate(1.11) contrast(1.03);
  }
  25% {
    transform: translate(45px, 10px) rotate(-1deg) scale(1.005);
    filter: brightness(1.055) saturate(1.105) contrast(1.03);
  }
  38% {
    transform: translate(25px, 35px) rotate(-2deg) scale(1);
    filter: brightness(1.05) saturate(1.1) contrast(1.03);
  }
  50% {
    transform: translate(-15px, 30px) rotate(1.5deg) scale(1.008);
    filter: brightness(1.06) saturate(1.11) contrast(1.03);
  }
  62% {
    transform: translate(-40px, -10px) rotate(-1.5deg) scale(1.003);
    filter: brightness(1.055) saturate(1.105) contrast(1.03);
  }
  75% {
    transform: translate(-30px, -30px) rotate(2deg) scale(1.01);
    filter: brightness(1.06) saturate(1.11) contrast(1.03);
  }
  88% {
    transform: translate(10px, -35px) rotate(-1deg) scale(1.005);
    filter: brightness(1.055) saturate(1.105) contrast(1.03);
  }
  100% {
    transform: translate(0, 0) rotate(0deg) scale(1);
    filter: brightness(1.05) saturate(1.1) contrast(1.03);
  }
}

@keyframes floatImage2 {
  0% {
    transform: translate(0, 0) rotate(0deg) scale(1);
    filter: brightness(1.05) saturate(1.1) contrast(1.03);
  }
  14% {
    transform: translate(-35px, 25px) rotate(-2deg) scale(1.01);
    filter: brightness(1.06) saturate(1.11) contrast(1.03);
  }
  28% {
    transform: translate(-45px, -18px) rotate(2.5deg) scale(1.005);
    filter: brightness(1.055) saturate(1.105) contrast(1.03);
  }
  42% {
    transform: translate(-22px, -38px) rotate(-1.5deg) scale(1);
    filter: brightness(1.05) saturate(1.1) contrast(1.03);
  }
  56% {
    transform: translate(28px, -32px) rotate(2deg) scale(1.012);
    filter: brightness(1.06) saturate(1.11) contrast(1.03);
  }
  70% {
    transform: translate(40px, 15px) rotate(-1.5deg) scale(1.008);
    filter: brightness(1.055) saturate(1.105) contrast(1.03);
  }
  84% {
    transform: translate(20px, 38px) rotate(2.5deg) scale(1.015);
    filter: brightness(1.06) saturate(1.11) contrast(1.03);
  }
  100% {
    transform: translate(0, 0) rotate(0deg) scale(1);
    filter: brightness(1.05) saturate(1.1) contrast(1.03);
  }
}

@keyframes floatImage3 {
  0% {
    transform: translate(0, 0) rotate(0deg) scale(1);
    filter: brightness(1.05) saturate(1.1) contrast(1.03);
  }
  16% {
    transform: translate(32px, -26px) rotate(2.5deg) scale(1.01);
    filter: brightness(1.06) saturate(1.11) contrast(1.03);
  }
  32% {
    transform: translate(-20px, -35px) rotate(-2deg) scale(1.005);
    filter: brightness(1.055) saturate(1.105) contrast(1.03);
  }
  48% {
    transform: translate(-42px, -12px) rotate(1.5deg) scale(1.003);
    filter: brightness(1.055) saturate(1.105) contrast(1.03);
  }
  64% {
    transform: translate(-28px, 32px) rotate(-2.5deg) scale(1.008);
    filter: brightness(1.06) saturate(1.11) contrast(1.03);
  }
  80% {
    transform: translate(23px, 40px) rotate(2deg) scale(1.01);
    filter: brightness(1.055) saturate(1.105) contrast(1.03);
  }
  92% {
    transform: translate(38px, 8px) rotate(-1.5deg) scale(1.012);
    filter: brightness(1.06) saturate(1.11) contrast(1.03);
  }
  100% {
    transform: translate(0, 0) rotate(0deg) scale(1);
    filter: brightness(1.05) saturate(1.1) contrast(1.03);
  }
}

@keyframes floatImage4 {
  0% {
    transform: translate(0, 0) rotate(0deg) scale(1);
    filter: brightness(1.05) saturate(1.1) contrast(1.03);
  }
  13% {
    transform: translate(-35px, -28px) rotate(-2.5deg) scale(1.012);
    filter: brightness(1.06) saturate(1.11) contrast(1.03);
  }
  27% {
    transform: translate(-40px, 20px) rotate(3deg) scale(1.008);
    filter: brightness(1.06) saturate(1.11) contrast(1.03);
  }
  41% {
    transform: translate(-17px, 38px) rotate(-2deg) scale(1.005);
    filter: brightness(1.055) saturate(1.105) contrast(1.03);
  }
  55% {
    transform: translate(32px, 28px) rotate(2.5deg) scale(1.015);
    filter: brightness(1.06) saturate(1.11) contrast(1.03);
  }
  69% {
    transform: translate(45px, -14px) rotate(-1.5deg) scale(1.01);
    filter: brightness(1.055) saturate(1.105) contrast(1.03);
  }
  83% {
    transform: translate(15px, -35px) rotate(3deg) scale(1.018);
    filter: brightness(1.06) saturate(1.11) contrast(1.03);
  }
  96% {
    transform: translate(-8px, -23px) rotate(-1.5deg) scale(1.008);
    filter: brightness(1.055) saturate(1.105) contrast(1.03);
  }
  100% {
    transform: translate(0, 0) rotate(0deg) scale(1);
    filter: brightness(1.05) saturate(1.1) contrast(1.03);
  }
}

@keyframes floatImage5 {
  0% {
    transform: translate(0, 0) rotate(0deg) scale(1);
    filter: brightness(1.05) saturate(1.1) contrast(1.03);
  }
  15% {
    transform: translate(25px, -30px) rotate(2deg) scale(1.01);
    filter: brightness(1.06) saturate(1.11) contrast(1.03);
  }
  30% {
    transform: translate(-30px, -20px) rotate(-2.5deg) scale(1.008);
    filter: brightness(1.055) saturate(1.105) contrast(1.03);
  }
  45% {
    transform: translate(-25px, 28px) rotate(1.5deg) scale(1.012);
    filter: brightness(1.06) saturate(1.11) contrast(1.03);
  }
  60% {
    transform: translate(28px, 25px) rotate(-2deg) scale(1.015);
    filter: brightness(1.055) saturate(1.105) contrast(1.03);
  }
  75% {
    transform: translate(35px, -15px) rotate(2.5deg) scale(1.01);
    filter: brightness(1.06) saturate(1.11) contrast(1.03);
  }
  90% {
    transform: translate(-20px, -25px) rotate(-1.5deg) scale(1.008);
    filter: brightness(1.055) saturate(1.105) contrast(1.03);
  }
  100% {
    transform: translate(0, 0) rotate(0deg) scale(1);
    filter: brightness(1.05) saturate(1.1) contrast(1.03);
  }
}

@keyframes floatImage6 {
  0% {
    transform: translate(0, 0) rotate(0deg) scale(1);
    filter: brightness(1.05) saturate(1.1) contrast(1.03);
  }
  17% {
    transform: translate(-28px, 32px) rotate(-2deg) scale(1.012);
    filter: brightness(1.06) saturate(1.11) contrast(1.03);
  }
  34% {
    transform: translate(35px, 22px) rotate(2.5deg) scale(1.01);
    filter: brightness(1.055) saturate(1.105) contrast(1.03);
  }
  51% {
    transform: translate(40px, -25px) rotate(-1.5deg) scale(1.008);
    filter: brightness(1.055) saturate(1.105) contrast(1.03);
  }
  68% {
    transform: translate(-20px, -35px) rotate(2deg) scale(1.015);
    filter: brightness(1.06) saturate(1.11) contrast(1.03);
  }
  85% {
    transform: translate(-38px, 18px) rotate(-2.5deg) scale(1.01);
    filter: brightness(1.055) saturate(1.105) contrast(1.03);
  }
  100% {
    transform: translate(0, 0) rotate(0deg) scale(1);
    filter: brightness(1.05) saturate(1.1) contrast(1.03);
  }
}

@keyframes floatImage7 {
  0% {
    transform: translate(0, 0) rotate(0deg) scale(1);
    filter: brightness(1.05) saturate(1.1) contrast(1.03);
  }
  18% {
    transform: translate(32px, -28px) rotate(2.5deg) scale(1.01);
    filter: brightness(1.06) saturate(1.11) contrast(1.03);
  }
  36% {
    transform: translate(-25px, -30px) rotate(-2deg) scale(1.008);
    filter: brightness(1.055) saturate(1.105) contrast(1.03);
  }
  54% {
    transform: translate(-35px, 20px) rotate(1.5deg) scale(1.012);
    filter: brightness(1.06) saturate(1.11) contrast(1.03);
  }
  72% {
    transform: translate(22px, 35px) rotate(-2.5deg) scale(1.015);
    filter: brightness(1.055) saturate(1.105) contrast(1.03);
  }
  90% {
    transform: translate(30px, -15px) rotate(2deg) scale(1.01);
    filter: brightness(1.06) saturate(1.11) contrast(1.03);
  }
  100% {
    transform: translate(0, 0) rotate(0deg) scale(1);
    filter: brightness(1.05) saturate(1.1) contrast(1.03);
  }
}

/* Workflow Connection Lines */
.workflow-connections {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 3;
  pointer-events: none;
  overflow: visible;
}

.connection-line {
  fill: none;
  stroke-width: 3;
  stroke-linecap: round;
  stroke-linejoin: round;
  opacity: 0.5;
  filter: url(#glow) drop-shadow(0 0 8px rgba(102, 126, 234, 0.6));
  animation: pulse-line 3s ease-in-out infinite;
  stroke-dasharray: 10 5;
  stroke-dashoffset: 0;
  transition: all 0.3s ease;
}

.connection-line:hover {
  opacity: 0.8;
  stroke-width: 4;
  filter: url(#glow) drop-shadow(0 0 16px rgba(102, 126, 234, 0.9));
}

/* Animated dash effect */
.line-1-2,
.line-4-3 {
  animation: dash-flow 20s linear infinite, pulse-line 3s ease-in-out infinite;
}

.line-2-4,
.line-3-1 {
  animation: dash-flow 25s linear infinite reverse, pulse-line 3s ease-in-out infinite;
  animation-delay: 1s;
}

.line-1-4,
.line-2-3 {
  opacity: 0.3;
  stroke-width: 2;
  animation: dash-flow 30s linear infinite, pulse-line 4s ease-in-out infinite;
  animation-delay: 2s;
}

@keyframes dash-flow {
  to {
    stroke-dashoffset: -100;
  }
}

@keyframes pulse-line {
  0%, 100% {
    opacity: 0.5;
    stroke-width: 3;
  }
  50% {
    opacity: 0.7;
    stroke-width: 3.5;
  }
}

/* Flow Particles */
.flow-particle {
  filter: drop-shadow(0 0 8px currentColor);
  opacity: 0.9;
  animation: particle-glow 2s ease-in-out infinite;
}

@keyframes particle-glow {
  0%, 100% {
    opacity: 0.7;
    r: 4;
  }
  50% {
    opacity: 1;
    r: 6;
  }
}

/* Node Indicators */
.node-indicator {
  position: absolute;
  top: -15px;
  right: -15px;
  width: 40px;
  height: 40px;
  z-index: 10;
  pointer-events: none;
}

.node-pulse {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(167, 139, 250, 0.6), transparent 70%);
  animation: node-pulse-animation 2s ease-out infinite;
}

@keyframes node-pulse-animation {
  0% {
    transform: translate(-50%, -50%) scale(0.8);
    opacity: 1;
  }
  100% {
    transform: translate(-50%, -50%) scale(2);
    opacity: 0;
  }
}

.node-dot {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 16px;
  height: 16px;
  border-radius: 50%;
  background: linear-gradient(135deg, #A78BFA, #8B5CF6);
  box-shadow:
    0 0 0 3px rgba(167, 139, 250, 0.3),
    0 0 20px rgba(139, 92, 246, 0.8),
    inset 0 2px 4px rgba(196, 181, 253, 0.5);
  animation: node-dot-pulse 2s ease-in-out infinite;
}

@keyframes node-dot-pulse {
  0%, 100% {
    transform: translate(-50%, -50%) scale(1);
    box-shadow:
      0 0 0 3px rgba(167, 139, 250, 0.3),
      0 0 20px rgba(139, 92, 246, 0.8),
      inset 0 2px 4px rgba(196, 181, 253, 0.5);
  }
  50% {
    transform: translate(-50%, -50%) scale(1.2);
    box-shadow:
      0 0 0 5px rgba(167, 139, 250, 0.5),
      0 0 30px rgba(139, 92, 246, 1),
      inset 0 2px 4px rgba(196, 181, 253, 0.7);
  }
}

.node-label {
  position: absolute;
  top: -30px;
  left: 50%;
  transform: translateX(-50%);
  background: linear-gradient(135deg,
    rgba(139, 92, 246, 0.95),
    rgba(124, 58, 237, 0.95));
  color: white;
  padding: 4px 10px;
  border-radius: 12px;
  font-size: 10px;
  font-weight: 700;
  white-space: nowrap;
  box-shadow:
    0 4px 12px rgba(139, 92, 246, 0.5),
    inset 0 1px 0 rgba(196, 181, 253, 0.3);
  opacity: 0;
  transition: opacity 0.3s ease;
  pointer-events: none;
  letter-spacing: 0.5px;
  text-transform: uppercase;
}

.bg-image:hover .node-label {
  opacity: 1;
}

.bg-image:hover .node-indicator {
  animation: node-indicator-bounce 0.6s ease;
}

@keyframes node-indicator-bounce {
  0%, 100% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.3);
  }
}

/* Node specific colors */
.image-1 .node-dot {
  background: linear-gradient(135deg, #A78BFA, #8B5CF6);
}

.image-2 .node-dot {
  background: linear-gradient(135deg, #7C3AED, #6366F1);
}

.image-3 .node-dot {
  background: linear-gradient(135deg, #6366F1, #A78BFA);
}

.image-4 .node-dot {
  background: linear-gradient(135deg, #8B5CF6, #7C3AED);
}

.image-1 .node-label {
  background: linear-gradient(135deg, rgba(167, 139, 250, 0.98), rgba(139, 92, 246, 0.98));
}

.image-2 .node-label {
  background: linear-gradient(135deg, rgba(124, 58, 237, 0.98), rgba(99, 102, 241, 0.98));
}

.image-3 .node-label {
  background: linear-gradient(135deg, rgba(99, 102, 241, 0.98), rgba(167, 139, 250, 0.98));
}

.image-4 .node-label {
  background: linear-gradient(135deg, rgba(139, 92, 246, 0.98), rgba(124, 58, 237, 0.98));
}

.image-5 .node-dot {
  background: linear-gradient(135deg, #A855F7, #EC4899);
}

.image-5 .node-label {
  background: linear-gradient(135deg, rgba(168, 85, 247, 0.98), rgba(236, 72, 153, 0.98));
}

.image-6 .node-dot {
  background: linear-gradient(135deg, #F59E0B, #F97316);
}

.image-6 .node-label {
  background: linear-gradient(135deg, rgba(245, 158, 11, 0.98), rgba(249, 115, 22, 0.98));
}

.image-7 .node-dot {
  background: linear-gradient(135deg, #10B981, #14B8A6);
}

.image-7 .node-label {
  background: linear-gradient(135deg, rgba(16, 185, 129, 0.98), rgba(20, 184, 166, 0.98));
}

/* Gradient Overlay */
.gradient-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background:
    radial-gradient(ellipse at 30% 40%, rgba(139, 92, 246, 0.18) 0%, transparent 50%),
    radial-gradient(ellipse at 70% 60%, rgba(59, 130, 246, 0.15) 0%, transparent 50%),
    radial-gradient(circle at center, transparent 30%, rgba(26, 26, 46, 0.3) 100%);
  z-index: 7;
  pointer-events: none;
  animation: overlayPulse 15s ease-in-out infinite;
}

@keyframes overlayPulse {
  0%, 100% {
    opacity: 1;
  }
  50% {
    opacity: 0.8;
  }
}

/* Floating Gradient Orbs */
.floating-images::before {
  content: '';
  position: absolute;
  width: 700px;
  height: 700px;
  background: radial-gradient(circle, rgba(102, 126, 234, 0.2), transparent 70%);
  border-radius: 50%;
  top: -250px;
  left: -250px;
  filter: blur(100px);
  animation: floatOrb1 30s ease-in-out infinite;
  z-index: 1;
}

.floating-images::after {
  content: '';
  position: absolute;
  width: 600px;
  height: 600px;
  background: radial-gradient(circle, rgba(240, 147, 251, 0.18), transparent 70%);
  border-radius: 50%;
  bottom: -200px;
  right: -200px;
  filter: blur(100px);
  animation: floatOrb2 35s ease-in-out infinite;
  z-index: 1;
}

@keyframes floatOrb1 {
  0%, 100% {
    transform: translate(0, 0) scale(1);
  }
  33% {
    transform: translate(80px, -60px) scale(1.15);
  }
  66% {
    transform: translate(-50px, 50px) scale(0.9);
  }
}

@keyframes floatOrb2 {
  0%, 100% {
    transform: translate(0, 0) scale(1);
  }
  40% {
    transform: translate(-70px, 60px) scale(1.1);
  }
  70% {
    transform: translate(60px, -40px) scale(0.95);
  }
}

/* Animated Light Rays */
.light-rays {
  position: absolute;
  width: 100%;
  height: 100%;
  z-index: 8;
  pointer-events: none;
  opacity: 0.6;
}

.ray {
  position: absolute;
  width: 3px;
  height: 100%;
  background: linear-gradient(to bottom, transparent, rgba(255, 255, 255, 0.4), transparent);
  animation: rayMove 10s linear infinite;
  filter: blur(1px);
}

.ray-1 {
  left: 25%;
  animation-delay: 0s;
}

.ray-2 {
  left: 50%;
  animation-delay: 3s;
}

.ray-3 {
  left: 75%;
  animation-delay: 6s;
}

@keyframes rayMove {
  0% {
    transform: translateY(-100%);
    opacity: 0;
  }
  15% {
    opacity: 1;
  }
  85% {
    opacity: 1;
  }
  100% {
    transform: translateY(100%);
    opacity: 0;
  }
}

/* Floating Particles */
.particles {
  position: absolute;
  width: 100%;
  height: 100%;
  overflow: hidden;
  z-index: 5;
  pointer-events: none;
}

.particle {
  position: absolute;
  background: radial-gradient(circle, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.3));
  border-radius: 50%;
  animation: particle-float linear infinite;
  box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
}

@keyframes particle-float {
  0% {
    transform: translateY(100vh) translateX(0) scale(0);
    opacity: 0;
  }
  10% {
    opacity: 1;
    transform: translateY(90vh) translateX(10px) scale(1);
  }
  50% {
    opacity: 0.8;
    transform: translateY(50vh) translateX(-30px) scale(1.2);
  }
  90% {
    opacity: 0.5;
  }
  100% {
    transform: translateY(-10vh) translateX(50px) scale(0.8);
    opacity: 0;
  }
}

/* Login Container - Enhanced Entrance */
.login-container-wrapper {
  position: relative;
  z-index: 100;
  width: 100%;
  max-width: 480px;
  padding: 20px;
  animation: slideUpBounce 1s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

@keyframes slideUpBounce {
  0% {
    opacity: 0;
    transform: translateY(60px) scale(0.9);
  }
  60% {
    opacity: 1;
    transform: translateY(-10px) scale(1.02);
  }
  80% {
    transform: translateY(5px) scale(0.98);
  }
  100% {
    opacity: 1;
    transform: translateY(0) scale(1);
  }
}

/* 3D Perspective Effect */
.login-container-wrapper {
  perspective: 1000px;
}

.login-glass-card {
  transform-style: preserve-3d;
  transition: transform 0.1s ease-out;
}

/* Magnetic Hover Effect */
@media (hover: hover) {
  .login-glass-card {
    will-change: transform;
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

/* Logo Section - Staggered Animation */
.logo-section {
  text-align: center;
  margin-bottom: 40px;
  animation: fadeInScale 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 0.2s both;
}

@keyframes fadeInScale {
  0% {
    opacity: 0;
    transform: scale(0.8) translateY(20px);
  }
  100% {
    opacity: 1;
    transform: scale(1) translateY(0);
  }
}

.logo-circle {
  width: auto;
  height: auto;
  margin: 0 auto 24px;
  display: flex;
  align-items: center;
  justify-content: center;
  animation: logoFloat 3s ease-in-out infinite;
}

@keyframes logoFloat {
  0%, 100% {
    transform: translateY(0) rotate(0deg);
  }
  50% {
    transform: translateY(-10px) rotate(2deg);
  }
}

.logo-image {
  width: 200px;
  height: auto;
  max-width: 100%;
  transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
  filter: drop-shadow(0 4px 12px rgba(102, 126, 234, 0.2));
}

.logo-circle:hover .logo-image {
  transform: scale(1.1) rotate(-3deg);
  filter: drop-shadow(0 8px 20px rgba(102, 126, 234, 0.4));
}

.welcome-title {
  font-size: 28px;
  font-weight: 800;
  color: #1a202c;
  margin-bottom: 8px;
  line-height: 1.2;
  animation: fadeInSlideRight 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 0.4s both;
}

@keyframes fadeInSlideRight {
  0% {
    opacity: 0;
    transform: translateX(-30px);
  }
  100% {
    opacity: 1;
    transform: translateX(0);
  }
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
  animation: fadeInSlideRight 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 0.6s both;
}

/* Form - Staggered Entrance */
.modern-login-form {
  display: flex;
  flex-direction: column;
  gap: 24px;
}

.form-group {
  display: flex;
  flex-direction: column;
  gap: 8px;
  animation: fadeInSlideUp 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) both;
}

.form-group:nth-child(1) {
  animation-delay: 0.8s;
}

.form-group:nth-child(2) {
  animation-delay: 1s;
}

@keyframes fadeInSlideUp {
  0% {
    opacity: 0;
    transform: translateY(20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
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
  transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.modern-input:focus ~ .input-icon {
  animation: iconBounce 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
}

@keyframes iconBounce {
  0%, 100% {
    transform: translateY(0) scale(1);
  }
  50% {
    transform: translateY(-5px) scale(1.2);
  }
}

.modern-input {
  width: 100%;
  padding: 16px 20px 16px 52px;
  font-size: 16px;
  border: 2px solid #e2e8f0;
  border-radius: 16px;
  background: #f7fafc;
  color: #1a202c;
  transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
  outline: none;
  font-family: inherit;
}

.modern-input:focus {
  border-color: #667eea;
  background: #fff;
  box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
  transform: scale(1.02);
  animation: inputFocusPulse 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
}

@keyframes inputFocusPulse {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.03);
  }
  100% {
    transform: scale(1.02);
  }
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

/* Form Options - Staggered Animation */
.form-options {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: -8px;
  animation: fadeInSlideUp 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) 1.1s both;
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

/* Login Button - Enhanced Modern Animations */
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
  transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
  box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
  position: relative;
  overflow: hidden;
  animation: fadeInSlideUp 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) 1.2s both;
}

.login-button::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
  transition: left 0.6s ease-out;
}

.login-button::after {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) scale(0);
  width: 100%;
  height: 100%;
  background: radial-gradient(circle, rgba(255, 255, 255, 0.3), transparent 70%);
  border-radius: 50%;
  transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.login-button:hover:not(:disabled) {
  transform: translateY(-4px) scale(1.02);
  box-shadow: 0 16px 36px rgba(102, 126, 234, 0.6);
  animation: buttonPulse 1.5s ease-in-out infinite;
}

@keyframes buttonPulse {
  0%, 100% {
    box-shadow: 0 16px 36px rgba(102, 126, 234, 0.6);
  }
  50% {
    box-shadow: 0 20px 44px rgba(102, 126, 234, 0.8);
  }
}

.login-button:hover:not(:disabled)::before {
  left: 100%;
}

.login-button:hover:not(:disabled)::after {
  transform: translate(-50%, -50%) scale(1.5);
}

.login-button:active:not(:disabled) {
  transform: translateY(-2px) scale(0.98);
  animation: buttonPress 0.2s ease-out;
}

@keyframes buttonPress {
  0% {
    transform: translateY(-4px) scale(1.02);
  }
  50% {
    transform: translateY(0) scale(0.95);
  }
  100% {
    transform: translateY(-2px) scale(0.98);
  }
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

/* Divider - Animated */
.divider {
  position: relative;
  text-align: center;
  margin: 8px 0;
  animation: fadeInScale 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) 1.4s both;
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

/* Guest Button - Animated */
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
  transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  animation: fadeInSlideUp 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) 1.6s both;
}

.guest-button:hover:not(:disabled) {
  background: #edf2f7;
  border-color: #cbd5e0;
  transform: translateY(-3px) scale(1.01);
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
}

.guest-button:disabled {
  opacity: 0.5;
  cursor: not-allowed;
}

/* Card Footer - Animated */
.card-footer {
  margin-top: 32px;
  padding-top: 24px;
  border-top: 1px solid #e2e8f0;
  text-align: center;
  animation: fadeIn 0.6s ease-in 1.8s both;
}

@keyframes fadeIn {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
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
@media (max-width: 1024px) {
  .image-1 {
    width: 240px;
    height: 155px;
    left: 3%;
    top: 10%;
  }

  .image-2 {
    width: 250px;
    height: 160px;
    right: 3%;
    top: 8%;
  }

  .image-3 {
    width: 220px;
    height: 145px;
    bottom: 8%;
    left: 5%;
  }

  .image-4 {
    width: 230px;
    height: 150px;
    bottom: 10%;
    right: 5%;
  }

  .image-5 {
    width: 220px;
    height: 145px;
  }

  .image-6 {
    width: 220px;
    height: 145px;
  }

  .image-7 {
    width: 220px;
    height: 145px;
  }

  .animated-background::before {
    width: 500px;
    height: 500px;
  }

  .animated-background::after {
    width: 400px;
    height: 400px;
  }
}

@media (max-width: 768px) {
  .connection-line {
    stroke-width: 2;
  }

  .line-1-4,
  .line-2-3 {
    opacity: 0.2;
    stroke-width: 1.5;
  }

  .node-indicator {
    width: 32px;
    height: 32px;
  }

  .node-dot {
    width: 12px;
    height: 12px;
  }

  .node-label {
    font-size: 9px;
    padding: 3px 8px;
  }

  .image-1 {
    width: 180px;
    height: 115px;
    left: 2%;
    top: 12%;
    opacity: 0.55;
  }

  .image-2 {
    width: 190px;
    height: 120px;
    right: 2%;
    top: 10%;
    opacity: 0.55;
  }

  .image-3 {
    width: 160px;
    height: 105px;
    bottom: 10%;
    left: 3%;
    opacity: 0.55;
  }

  .image-4 {
    width: 170px;
    height: 110px;
    bottom: 12%;
    right: 3%;
    opacity: 0.55;
  }

  .image-5 {
    width: 175px;
    height: 115px;
    opacity: 0.55;
  }

  .image-6 {
    width: 175px;
    height: 115px;
    opacity: 0.55;
  }

  .image-7 {
    width: 175px;
    height: 115px;
    opacity: 0.55;
  }

  .gradient-overlay {
    background: radial-gradient(ellipse at center, transparent 0%, rgba(102, 126, 234, 0.15) 40%, rgba(118, 75, 162, 0.25) 100%);
  }

  .animated-background::before {
    width: 400px;
    height: 400px;
    opacity: 0.7;
  }

  .animated-background::after {
    width: 350px;
    height: 350px;
    opacity: 0.7;
  }
}

@media (max-width: 640px) {
  .connection-line {
    stroke-width: 1.5;
    opacity: 0.3;
  }

  .line-1-4,
  .line-2-3 {
    opacity: 0.15;
    stroke-width: 1;
  }

  .flow-particle {
    r: 3;
  }

  .node-indicator {
    width: 28px;
    height: 28px;
    top: -10px;
    right: -10px;
  }

  .node-pulse {
    width: 28px;
    height: 28px;
  }

  .node-dot {
    width: 10px;
    height: 10px;
  }

  .node-label {
    display: none;
  }

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

  .image-1 {
    width: 140px;
    height: 90px;
    opacity: 0.45;
    top: 15%;
    left: 3%;
  }

  .image-2 {
    width: 150px;
    height: 95px;
    opacity: 0.45;
    top: 12%;
    right: 3%;
  }

  .image-3 {
    width: 130px;
    height: 85px;
    opacity: 0.45;
    bottom: 12%;
    left: 4%;
  }

  .image-4 {
    width: 135px;
    height: 88px;
    bottom: 14%;
    right: 4%;
    opacity: 0.45;
  }

  .image-5 {
    width: 140px;
    height: 90px;
    opacity: 0.45;
  }

  .image-6 {
    width: 140px;
    height: 90px;
    opacity: 0.45;
  }

  .image-7 {
    width: 140px;
    height: 90px;
    opacity: 0.45;
  }

  .light-rays {
    opacity: 0.5;
  }

  .animated-background::before,
  .animated-background::after {
    opacity: 0.5;
  }
}
</style>
