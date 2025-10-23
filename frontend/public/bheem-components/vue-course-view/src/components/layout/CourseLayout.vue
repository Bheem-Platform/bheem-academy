<template>
  <div class="course-layout">
    <!-- Animated Background -->
    <div class="animated-background">
      <!-- Gradient Mesh Background -->
      <div class="gradient-mesh"></div>

      <!-- Neural Network Lines -->
      <svg class="neural-network" viewBox="0 0 100 100" preserveAspectRatio="none">
        <defs>
          <linearGradient id="lineGradient1" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" style="stop-color:rgba(139, 92, 246, 0.4);stop-opacity:1" />
            <stop offset="100%" style="stop-color:rgba(236, 72, 153, 0.4);stop-opacity:1" />
          </linearGradient>
          <linearGradient id="lineGradient2" x1="100%" y1="0%" x2="0%" y2="100%">
            <stop offset="0%" style="stop-color:rgba(59, 130, 246, 0.3);stop-opacity:1" />
            <stop offset="100%" style="stop-color:rgba(139, 92, 246, 0.3);stop-opacity:1" />
          </linearGradient>
        </defs>
        <path class="neural-path neural-path-1" d="M 0,20 Q 25,10 50,30 T 100,25" />
        <path class="neural-path neural-path-2" d="M 0,50 Q 30,40 60,55 T 100,50" />
        <path class="neural-path neural-path-3" d="M 0,70 Q 35,80 70,65 T 100,75" />
      </svg>

      <!-- Floating Geometric Shapes -->
      <div class="geometric-shapes">
        <div class="shape shape-hexagon shape-1"></div>
        <div class="shape shape-circle shape-2"></div>
        <div class="shape shape-square shape-3"></div>
        <div class="shape shape-triangle shape-4"></div>
        <div class="shape shape-hexagon shape-5"></div>
        <div class="shape shape-circle shape-6"></div>
      </div>

      <!-- Data Stream Particles -->
      <div class="data-stream">
        <div class="particle particle-1"></div>
        <div class="particle particle-2"></div>
        <div class="particle particle-3"></div>
        <div class="particle particle-4"></div>
        <div class="particle particle-5"></div>
        <div class="particle particle-6"></div>
        <div class="particle particle-7"></div>
        <div class="particle particle-8"></div>
      </div>

      <!-- Gradient Orbs -->
      <div class="gradient-orbs">
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
        <div class="orb orb-3"></div>
      </div>
    </div>

    <HeaderProfessional />

    <main class="course-main-content">
      <slot />
    </main>
  </div>
</template>

<script setup lang="ts">
import HeaderProfessional from './HeaderProfessional.vue'
</script>

<style scoped>
.course-layout {
  min-height: 100vh;
  width: 100%;
  position: relative;
  background: linear-gradient(135deg, #0a0a0f 0%, #1a1a2e 50%, #16213e 100%);
  overflow-x: hidden;
}

/* ==================== ANIMATED BACKGROUND ==================== */
.animated-background {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 0;
  pointer-events: none;
  overflow: hidden;
}

/* Gradient Mesh Background */
.gradient-mesh {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background:
    radial-gradient(circle at 20% 30%, rgba(139, 92, 246, 0.15) 0%, transparent 50%),
    radial-gradient(circle at 80% 60%, rgba(236, 72, 153, 0.12) 0%, transparent 50%),
    radial-gradient(circle at 50% 80%, rgba(59, 130, 246, 0.1) 0%, transparent 50%);
  animation: meshPulse 15s ease-in-out infinite;
}

@keyframes meshPulse {
  0%, 100% {
    opacity: 0.8;
    transform: scale(1);
  }
  50% {
    opacity: 1;
    transform: scale(1.05);
  }
}

/* Neural Network Lines */
.neural-network {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: 0.6;
}

.neural-path {
  fill: none;
  stroke-width: 0.15;
  stroke-linecap: round;
  animation: neuralFlow 8s ease-in-out infinite;
}

.neural-path-1 {
  stroke: url(#lineGradient1);
  stroke-dasharray: 5 3;
  animation: neuralFlow 10s ease-in-out infinite, dashMove 3s linear infinite;
}

.neural-path-2 {
  stroke: url(#lineGradient2);
  stroke-dasharray: 4 2;
  animation: neuralFlow 12s ease-in-out infinite 1s, dashMove 2.5s linear infinite;
}

.neural-path-3 {
  stroke: url(#lineGradient1);
  stroke-dasharray: 6 4;
  animation: neuralFlow 14s ease-in-out infinite 2s, dashMove 4s linear infinite;
}

@keyframes neuralFlow {
  0%, 100% {
    opacity: 0.3;
    transform: translateY(0);
  }
  50% {
    opacity: 0.7;
    transform: translateY(-2px);
  }
}

@keyframes dashMove {
  to {
    stroke-dashoffset: -20;
  }
}

/* Floating Geometric Shapes */
.geometric-shapes {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.shape {
  position: absolute;
  opacity: 0.08;
  backdrop-filter: blur(2px);
  border: 1px solid rgba(139, 92, 246, 0.2);
}

.shape-hexagon {
  width: 80px;
  height: 92px;
  clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
  background: linear-gradient(135deg, rgba(139, 92, 246, 0.15), rgba(236, 72, 153, 0.1));
}

.shape-circle {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  background: linear-gradient(135deg, rgba(59, 130, 246, 0.12), rgba(139, 92, 246, 0.08));
}

.shape-square {
  width: 70px;
  height: 70px;
  background: linear-gradient(135deg, rgba(236, 72, 153, 0.1), rgba(139, 92, 246, 0.08));
  transform: rotate(45deg);
}

.shape-triangle {
  width: 0;
  height: 0;
  border-left: 40px solid transparent;
  border-right: 40px solid transparent;
  border-bottom: 70px solid rgba(139, 92, 246, 0.1);
}

.shape-1 {
  top: 10%;
  left: 15%;
  animation: floatShape 20s ease-in-out infinite;
}

.shape-2 {
  top: 25%;
  right: 20%;
  animation: floatShape 18s ease-in-out infinite 2s;
}

.shape-3 {
  bottom: 30%;
  left: 10%;
  animation: floatShape 22s ease-in-out infinite 4s;
}

.shape-4 {
  top: 60%;
  right: 15%;
  animation: floatShape 16s ease-in-out infinite 1s;
}

.shape-5 {
  bottom: 15%;
  left: 60%;
  animation: floatShape 24s ease-in-out infinite 3s;
}

.shape-6 {
  top: 40%;
  left: 50%;
  animation: floatShape 19s ease-in-out infinite 5s;
}

@keyframes floatShape {
  0%, 100% {
    transform: translate(0, 0) rotate(0deg);
  }
  25% {
    transform: translate(30px, -40px) rotate(90deg);
  }
  50% {
    transform: translate(-20px, -80px) rotate(180deg);
  }
  75% {
    transform: translate(-40px, -40px) rotate(270deg);
  }
}

/* Data Stream Particles */
.data-stream {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.particle {
  position: absolute;
  width: 4px;
  height: 4px;
  background: radial-gradient(circle, rgba(139, 92, 246, 0.8), transparent);
  border-radius: 50%;
  box-shadow: 0 0 10px rgba(139, 92, 246, 0.6);
}

.particle-1 {
  left: 10%;
  animation: streamFlow1 8s linear infinite;
}

.particle-2 {
  left: 25%;
  animation: streamFlow2 10s linear infinite 1s;
}

.particle-3 {
  left: 40%;
  animation: streamFlow1 12s linear infinite 2s;
}

.particle-4 {
  left: 55%;
  animation: streamFlow2 9s linear infinite 1.5s;
}

.particle-5 {
  left: 70%;
  animation: streamFlow1 11s linear infinite 3s;
}

.particle-6 {
  left: 85%;
  animation: streamFlow2 13s linear infinite 0.5s;
}

.particle-7 {
  left: 30%;
  animation: streamFlow1 14s linear infinite 4s;
}

.particle-8 {
  left: 60%;
  animation: streamFlow2 15s linear infinite 2.5s;
}

@keyframes streamFlow1 {
  0% {
    top: -5%;
    opacity: 0;
  }
  10% {
    opacity: 1;
  }
  90% {
    opacity: 1;
  }
  100% {
    top: 105%;
    opacity: 0;
  }
}

@keyframes streamFlow2 {
  0% {
    bottom: -5%;
    opacity: 0;
  }
  10% {
    opacity: 1;
  }
  90% {
    opacity: 1;
  }
  100% {
    bottom: 105%;
    opacity: 0;
  }
}

/* Gradient Orbs */
.gradient-orbs {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.orb {
  position: absolute;
  border-radius: 50%;
  filter: blur(60px);
  opacity: 0.3;
  animation: orbFloat 20s ease-in-out infinite;
}

.orb-1 {
  width: 400px;
  height: 400px;
  background: radial-gradient(circle, rgba(139, 92, 246, 0.4), transparent);
  top: 10%;
  left: 5%;
  animation: orbFloat 25s ease-in-out infinite;
}

.orb-2 {
  width: 350px;
  height: 350px;
  background: radial-gradient(circle, rgba(236, 72, 153, 0.35), transparent);
  bottom: 15%;
  right: 10%;
  animation: orbFloat 30s ease-in-out infinite 5s;
}

.orb-3 {
  width: 300px;
  height: 300px;
  background: radial-gradient(circle, rgba(59, 130, 246, 0.3), transparent);
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  animation: orbFloat 22s ease-in-out infinite 3s;
}

@keyframes orbFloat {
  0%, 100% {
    transform: translate(0, 0) scale(1);
  }
  33% {
    transform: translate(50px, -80px) scale(1.1);
  }
  66% {
    transform: translate(-30px, 60px) scale(0.9);
  }
}

/* ==================== MAIN CONTENT ==================== */
.course-main-content {
  position: relative;
  z-index: 1;
  margin-top: 80px;
  padding: 40px 20px;
  max-width: 1400px;
  margin-left: auto;
  margin-right: auto;
}

/* Glassmorphic Effect on Content */
.course-main-content::before {
  content: '';
  position: absolute;
  top: -20px;
  left: -20px;
  right: -20px;
  bottom: -20px;
  background: rgba(255, 255, 255, 0.02);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  border-radius: 30px;
  border: 1px solid rgba(255, 255, 255, 0.05);
  z-index: -1;
  pointer-events: none;
}

@media (max-width: 1024px) {
  .course-main-content {
    margin-top: 70px;
    padding: 30px 15px;
  }

  .orb-1, .orb-2, .orb-3 {
    width: 250px;
    height: 250px;
  }

  .shape {
    transform: scale(0.8);
  }
}

@media (max-width: 768px) {
  .course-main-content {
    margin-top: 64px;
    padding: 20px 10px;
  }

  .course-main-content::before {
    top: -10px;
    left: -10px;
    right: -10px;
    bottom: -10px;
  }

  .orb-1, .orb-2, .orb-3 {
    width: 200px;
    height: 200px;
    filter: blur(40px);
  }

  .shape {
    transform: scale(0.6);
    opacity: 0.05;
  }

  .particle {
    width: 3px;
    height: 3px;
  }

  .neural-path {
    stroke-width: 0.1;
  }
}

/* Performance optimization for reduced motion */
@media (prefers-reduced-motion: reduce) {
  .animated-background * {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
  }
}
</style>
