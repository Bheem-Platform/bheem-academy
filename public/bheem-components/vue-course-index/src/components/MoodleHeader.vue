<template>
  <header class="moodle-header">
    <div class="header-container">
      <div class="header-left">
        <a href="/" class="logo-link">
          <img src="https://dev.bheem.cloud/pluginfile.php/1/core_admin/logocompact/300x300/1730804783/bheemlogo.png" alt="Bheem Academy" class="logo" />
        </a>
      </div>

      <nav class="header-nav">
        <div class="nav-item dropdown">
          <button class="nav-link">
            <i class="fas fa-book"></i> Courses
            <i class="fas fa-chevron-down"></i>
          </button>
          <div class="dropdown-menu">
            <a href="/course/index.php?categoryid=6" class="dropdown-item">
              <i class="fas fa-child"></i> Kids
            </a>
            <a href="/course/index.php?categoryid=7" class="dropdown-item">
              <i class="fas fa-graduation-cap"></i> Youth
            </a>
            <a href="/course/index.php?categoryid=8" class="dropdown-item">
              <i class="fas fa-briefcase"></i> Working Professionals
            </a>
          </div>
        </div>

        <a href="/course/index.php" class="nav-link">
          <i class="fas fa-th"></i> All Courses
        </a>

        <a href="/login/index.php" class="nav-link">
          <i class="fas fa-sign-in-alt"></i> Log in
        </a>
      </nav>

      <button class="mobile-menu-toggle" @click="toggleMobileMenu">
        <i class="fas fa-bars"></i>
      </button>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu" :class="{ active: mobileMenuOpen }">
      <a href="/course/index.php?categoryid=6" class="mobile-menu-item">
        <i class="fas fa-child"></i> Kids
      </a>
      <a href="/course/index.php?categoryid=7" class="mobile-menu-item">
        <i class="fas fa-graduation-cap"></i> Youth
      </a>
      <a href="/course/index.php?categoryid=8" class="mobile-menu-item">
        <i class="fas fa-briefcase"></i> Working Professionals
      </a>
      <a href="/course/index.php" class="mobile-menu-item">
        <i class="fas fa-th"></i> All Courses
      </a>
      <a href="/login/index.php" class="mobile-menu-item">
        <i class="fas fa-sign-in-alt"></i> Log in
      </a>
    </div>
  </header>
</template>

<script setup lang="ts">
import { ref } from 'vue'

const mobileMenuOpen = ref(false)

const toggleMobileMenu = () => {
  mobileMenuOpen.value = !mobileMenuOpen.value
}
</script>

<style scoped>
.moodle-header {
  background: linear-gradient(135deg, #1e1b4b 0%, #312e81 100%);
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
  position: sticky;
  top: 0;
  z-index: 1000;
  box-shadow: 0 4px 24px rgba(0, 0, 0, 0.3);
}

.header-container {
  max-width: 1400px;
  margin: 0 auto;
  padding: 16px 24px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.header-left {
  display: flex;
  align-items: center;
}

.logo-link {
  display: flex;
  align-items: center;
}

.logo {
  height: 45px;
  width: auto;
  transition: transform 0.3s ease;
}

.logo:hover {
  transform: scale(1.05);
}

.header-nav {
  display: flex;
  align-items: center;
  gap: 8px;
}

.nav-item {
  position: relative;
}

.nav-link {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 10px 18px;
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 10px;
  color: var(--text-primary);
  text-decoration: none;
  font-weight: 600;
  font-size: 0.95rem;
  cursor: pointer;
  transition: all 0.3s ease;
}

.nav-link:hover {
  background: rgba(255, 255, 255, 0.12);
  border-color: rgba(240, 147, 251, 0.3);
  transform: translateY(-2px);
}

.nav-link i {
  font-size: 1rem;
}

.dropdown-menu {
  position: absolute;
  top: calc(100% + 8px);
  left: 0;
  background: rgba(30, 27, 75, 0.98);
  backdrop-filter: blur(16px);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 12px;
  padding: 8px;
  min-width: 250px;
  opacity: 0;
  visibility: hidden;
  transform: translateY(-10px);
  transition: all 0.3s ease;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
}

.dropdown:hover .dropdown-menu {
  opacity: 1;
  visibility: visible;
  transform: translateY(0);
}

.dropdown-item {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px 16px;
  color: var(--text-secondary);
  text-decoration: none;
  border-radius: 8px;
  transition: all 0.2s ease;
  font-weight: 500;
}

.dropdown-item:hover {
  background: rgba(255, 255, 255, 0.1);
  color: var(--text-primary);
  transform: translateX(4px);
}

.dropdown-item i {
  color: #f093fb;
  font-size: 1.1rem;
}

.mobile-menu-toggle {
  display: none;
  background: rgba(255, 255, 255, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 8px;
  padding: 10px 14px;
  color: white;
  cursor: pointer;
  font-size: 1.2rem;
  transition: all 0.3s ease;
}

.mobile-menu-toggle:hover {
  background: rgba(255, 255, 255, 0.15);
}

.mobile-menu {
  display: none;
  flex-direction: column;
  gap: 4px;
  padding: 16px;
  background: rgba(30, 27, 75, 0.98);
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.3s ease;
}

.mobile-menu.active {
  max-height: 500px;
}

.mobile-menu-item {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 14px 16px;
  color: var(--text-secondary);
  text-decoration: none;
  border-radius: 8px;
  transition: all 0.2s ease;
  font-weight: 500;
}

.mobile-menu-item:hover {
  background: rgba(255, 255, 255, 0.1);
  color: var(--text-primary);
}

.mobile-menu-item i {
  color: #f093fb;
  font-size: 1.1rem;
}

@media (max-width: 768px) {
  .header-nav {
    display: none;
  }

  .mobile-menu-toggle {
    display: block;
  }

  .mobile-menu {
    display: flex;
  }

  .logo {
    height: 38px;
  }
}
</style>
