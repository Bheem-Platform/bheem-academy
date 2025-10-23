<template>
  <div class="professional-course-page">
    <header class="course-header-professional">
      <div class="header-container">
        <div class="header-top">
          <div class="logo-section">
            <img
              src="https://dev.bheem.cloud/pluginfile.php?file=%2F1%2Ftheme_edoo%2Fmain_logo%2F-1%2Flogo.png"
              alt="Bheem Academy"
              class="header-logo"
            />
          </div>
          <nav class="header-nav">
            <a href="/" class="nav-link">Home</a>
            <a href="/course" class="nav-link">Courses</a>
            <a href="#" class="nav-link">About</a>
            <a href="#" class="nav-link">Contact</a>
          </nav>
          <div class="header-user">
            <button class="btn-profile">
              <i class="fas fa-user-circle"></i>
            </button>
          </div>
        </div>
      </div>
    </header>

    <!-- Breadcrumb Navigation -->
    <div class="breadcrumb-container">
      <div class="container-main">
        <nav class="breadcrumb-nav">
          <a href="/" class="breadcrumb-link">Home</a>
          <i class="fas fa-chevron-right breadcrumb-separator"></i>
          <a href="/course" class="breadcrumb-link">Courses</a>
          <i class="fas fa-chevron-right breadcrumb-separator"></i>
          <a href="/course/index.php?categoryid=6" class="breadcrumb-link">Kids</a>
          <i class="fas fa-chevron-right breadcrumb-separator"></i>
          <span class="breadcrumb-current">{{ courseData.name }}</span>
        </nav>
      </div>
    </div>

    <!-- Main Content Area -->
    <div class="main-content-area">
      <div class="container-main">
        <div class="content-grid">

          <!-- Left Sidebar -->
          <aside class="sidebar-left">
            <div class="sidebar-card">
              <h3 class="sidebar-title">
                <i class="fas fa-compass"></i> Navigation
              </h3>
              <nav class="sidebar-nav">
                <a href="/" class="sidebar-nav-item">
                  <i class="fas fa-home"></i> Home
                </a>

                <div class="sidebar-dropdown">
                  <button
                    class="sidebar-nav-item dropdown-toggle"
                    @click="toggleDropdown('kids')"
                  >
                    <i class="fas fa-child"></i> Kids
                    <i :class="['fas', dropdowns.kids ? 'fa-chevron-down' : 'fa-chevron-right', 'dropdown-icon']"></i>
                  </button>
                  <div v-if="dropdowns.kids" class="dropdown-menu">
                    <a href="/course/view.php?id=8" class="dropdown-item active">Junior AI Basics</a>
                    <a href="/course/view.php?id=9" class="dropdown-item">Junior AI Mastery</a>
                    <a href="/course/view.php?id=10" class="dropdown-item">Junior Coding Explorer</a>
                    <a href="/course/view.php?id=11" class="dropdown-item">Junior Game Builder</a>
                    <a href="/course/view.php?id=12" class="dropdown-item">Junior Creative Tech Lab</a>
                    <a href="/course/view.php?id=13" class="dropdown-item">Junior Mini Makers</a>
                  </div>
                </div>

                <a href="/course/view.php?id=39" class="sidebar-nav-item">
                  <i class="fas fa-user-graduate"></i> Youth
                </a>

                <div class="sidebar-dropdown">
                  <button
                    class="sidebar-nav-item dropdown-toggle"
                    @click="toggleDropdown('professionals')"
                  >
                    <i class="fas fa-briefcase"></i> Working Professionals
                    <i :class="['fas', dropdowns.professionals ? 'fa-chevron-down' : 'fa-chevron-right', 'dropdown-icon']"></i>
                  </button>
                  <div v-if="dropdowns.professionals" class="dropdown-menu">
                    <a href="/course/view.php?id=41" class="dropdown-item">AI for Teachers</a>
                    <a href="/course/view.php?id=42" class="dropdown-item">AI for Lawyers</a>
                    <a href="/course/view.php?id=17" class="dropdown-item">AI for Accountant</a>
                    <a href="/course/view.php?id=20" class="dropdown-item">AI for Office Admins</a>
                    <a href="/course/view.php?id=16" class="dropdown-item">AI for HR</a>
                  </div>
                </div>

                <div class="sidebar-dropdown">
                  <button
                    class="sidebar-nav-item dropdown-toggle"
                    @click="toggleDropdown('social360')"
                  >
                    <i class="fas fa-globe"></i> AI Social 360
                    <i :class="['fas', dropdowns.social360 ? 'fa-chevron-down' : 'fa-chevron-right', 'dropdown-icon']"></i>
                  </button>
                  <div v-if="dropdowns.social360" class="dropdown-menu">
                    <a href="/course/view.php?id=43" class="dropdown-item">AI Social 360 Pro (6 Months)</a>
                    <a href="/course/view.php?id=37" class="dropdown-item">AI Social 360 Fasttrack (3 Months)</a>
                  </div>
                </div>
              </nav>
            </div>

            <!-- Course Info Card -->
            <div class="sidebar-card">
              <h3 class="sidebar-title">
                <i class="fas fa-info-circle"></i> Course Info
              </h3>
              <div class="course-info-list">
                <div class="info-row">
                  <span class="info-label">Level:</span>
                  <span class="info-value">{{ courseData.level }}</span>
                </div>
                <div class="info-row">
                  <span class="info-label">Duration:</span>
                  <span class="info-value">{{ courseData.duration }}</span>
                </div>
                <div class="info-row">
                  <span class="info-label">Total Hours:</span>
                  <span class="info-value">{{ courseData.totalHours }}</span>
                </div>
                <div class="info-row">
                  <span class="info-label">Language:</span>
                  <span class="info-value">{{ courseData.language }}</span>
                </div>
                <div class="info-row">
                  <span class="info-label">Access:</span>
                  <span class="info-value">{{ courseData.access }}</span>
                </div>
              </div>
            </div>

            <!-- Progress Card -->
            <div class="sidebar-card">
              <h3 class="sidebar-title">
                <i class="fas fa-chart-line"></i> Your Progress
              </h3>
              <div class="progress-circle-container">
                <div class="progress-circle">
                  <svg viewBox="0 0 100 100">
                    <circle cx="50" cy="50" r="40" class="progress-bg-circle"></circle>
                    <circle
                      cx="50"
                      cy="50"
                      r="40"
                      class="progress-fill-circle"
                      :style="{ strokeDashoffset: progressOffset }"
                    ></circle>
                  </svg>
                  <div class="progress-text">{{ courseProgress }}%</div>
                </div>
              </div>
            </div>
          </aside>

          <!-- Main Content -->
          <main class="main-content">
            <!-- Course Header Card -->
            <div class="course-header-card">
              <div class="course-badge">{{ courseData.level }}</div>
              <h1 class="course-title-main">{{ courseData.name }}</h1>
              <div class="course-meta-tags">
                <span class="meta-tag">
                  <i class="fas fa-clock"></i> {{ courseData.duration }}
                </span>
                <span class="meta-tag">
                  <i class="fas fa-hourglass-half"></i> {{ courseData.totalHours }}
                </span>
                <span class="meta-tag">
                  <i class="fas fa-language"></i> {{ courseData.language }}
                </span>
                <span class="meta-tag">
                  <i class="fas fa-laptop"></i> {{ courseData.access }}
                </span>
              </div>
            </div>

            <!-- Course Sections -->
            <div class="course-sections-container">
              <div
                v-for="(section, index) in courseSections"
                :key="section.id"
                class="section-card"
              >
                <div
                  class="section-header-pro"
                  @click="toggleSection(index)"
                >
                  <div class="section-number-badge">{{ index }}</div>
                  <h2 class="section-title-pro">{{ section.name }}</h2>
                  <button class="section-toggle-btn">
                    <i :class="['fas', section.expanded ? 'fa-chevron-up' : 'fa-chevron-down']"></i>
                  </button>
                </div>

                <transition name="section-slide">
                  <div v-if="section.expanded" class="section-content-pro">
                    <div v-if="section.summary" class="section-summary-pro" v-html="section.summary"></div>

                    <div v-if="section.activities && section.activities.length > 0" class="activities-grid">
                      <div
                        v-for="activity in section.activities"
                        :key="activity.id"
                        class="activity-card-pro"
                      >
                        <div class="activity-icon-pro" :class="`activity-${activity.type}`">
                          <i :class="getActivityIcon(activity.type)"></i>
                        </div>
                        <div class="activity-details">
                          <h4 class="activity-title-pro">{{ activity.name }}</h4>
                          <p class="activity-type">{{ getActivityTypeName(activity.type) }}</p>
                        </div>
                        <a :href="activity.url" class="activity-link-btn" v-if="activity.url">
                          <i class="fas fa-arrow-right"></i>
                        </a>
                      </div>
                    </div>

                    <div v-else class="no-activities">
                      <i class="fas fa-inbox"></i>
                      <p>No activities in this section yet.</p>
                    </div>
                  </div>
                </transition>
              </div>
            </div>
          </main>

          <!-- Right Sidebar (Course Index) -->
          <aside class="sidebar-right">
            <div class="sidebar-card sticky-sidebar">
              <h3 class="sidebar-title">
                <i class="fas fa-list"></i> Course Index
              </h3>
              <nav class="course-index-nav">
                <a
                  v-for="(section, index) in courseSections"
                  :key="`index-${section.id}`"
                  href="#"
                  @click.prevent="scrollToSection(index)"
                  class="index-item"
                  :class="{ active: section.expanded }"
                >
                  <span class="index-number">{{ index }}</span>
                  <span class="index-name">{{ section.name }}</span>
                  <span class="index-count" v-if="section.activities">
                    {{ section.activities.length }}
                  </span>
                </a>
              </nav>
            </div>
          </aside>

        </div>
      </div>
    </div>

    <!-- Professional Footer -->
    <footer class="professional-footer">
      <div class="footer-container">
        <div class="footer-grid">
          <div class="footer-column">
            <img
              src="https://dev.bheem.cloud/pluginfile.php?file=%2F1%2Ftheme_edoo%2Fmain_logo%2F-1%2Flogo.png"
              alt="Bheem Academy"
              class="footer-logo"
            />
            <p class="footer-description">
              Empowering you to step into Artificial Intelligence and shape tomorrow's technology with real-world AI skills.
            </p>
            <div class="footer-social">
              <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
              <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
              <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
            </div>
          </div>

          <div class="footer-column">
            <h4 class="footer-title">Quick Links</h4>
            <ul class="footer-links">
              <li><a href="/">Home</a></li>
              <li><a href="/course">Courses</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>

          <div class="footer-column">
            <h4 class="footer-title">Courses</h4>
            <ul class="footer-links">
              <li><a href="#">Kids Programs</a></li>
              <li><a href="#">Youth Programs</a></li>
              <li><a href="#">Professional Training</a></li>
              <li><a href="#">AI Social 360</a></li>
            </ul>
          </div>

          <div class="footer-column">
            <h4 class="footer-title">Contact</h4>
            <ul class="footer-links">
              <li><i class="fas fa-envelope"></i> info@bheem.cloud</li>
              <li><i class="fas fa-phone"></i> +1 234 567 8900</li>
              <li><i class="fas fa-map-marker-alt"></i> United Kingdom</li>
            </ul>
          </div>
        </div>

        <div class="footer-bottom">
          <p class="copyright">
            &copy; 2025 Bheem Academy. All rights reserved.
          </p>
          <div class="footer-bottom-links">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Service</a>
            <a href="#">Cookie Policy</a>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<script setup lang="ts">
import { ref, computed, onMounted } from 'vue'

interface Activity {
  id: number
  name: string
  type: string
  description?: string
  url: string
}

interface Section {
  id: number
  name: string
  summary?: string
  activities: Activity[]
  expanded: boolean
}

interface CourseData {
  id: number
  name: string
  level: string
  duration: string
  totalHours: string
  language: string
  access: string
}

const courseData = ref<CourseData>({
  id: 8,
  name: 'Bheem Junior AI Basics',
  level: 'Kids (Ages 8-14)',
  duration: '2 Months',
  totalHours: '24 Hours',
  language: 'English/Malayalam',
  access: 'Online'
})

const courseSections = ref<Section[]>([])
const courseProgress = ref(0)
const dropdowns = ref({
  kids: false,
  professionals: false,
  social360: false
})

const progressOffset = computed(() => {
  const circumference = 2 * Math.PI * 40
  return circumference - (courseProgress.value / 100) * circumference
})

const toggleDropdown = (key: 'kids' | 'professionals' | 'social360') => {
  dropdowns.value[key] = !dropdowns.value[key]
}

const toggleSection = (index: number) => {
  courseSections.value[index].expanded = !courseSections.value[index].expanded
}

const scrollToSection = (index: number) => {
  courseSections.value[index].expanded = true
  // Scroll logic can be added here
}

const getActivityIcon = (type: string): string => {
  const icons: Record<string, string> = {
    'page': 'fas fa-file-alt',
    'resource': 'fas fa-file-download',
    'url': 'fas fa-link',
    'forum': 'fas fa-comments',
    'quiz': 'fas fa-question-circle',
    'assignment': 'fas fa-pen-square',
    'lesson': 'fas fa-book-open',
    'label': 'fas fa-tag',
    'subsection': 'fas fa-folder'
  }
  return icons[type] || 'fas fa-file'
}

const getActivityTypeName = (type: string): string => {
  const names: Record<string, string> = {
    'page': 'Page',
    'resource': 'Resource',
    'url': 'Link',
    'forum': 'Forum',
    'quiz': 'Quiz',
    'assignment': 'Assignment',
    'lesson': 'Lesson',
    'label': 'Label',
    'subsection': 'Subsection'
  }
  return names[type] || 'Activity'
}

const loadMoodleData = () => {
  if (window.MOODLE_COURSE_DATA) {
    const moodleData = window.MOODLE_COURSE_DATA
    courseData.value = {
      id: moodleData.id,
      name: moodleData.fullname,
      level: 'Kids (Ages 8-14)',
      duration: '2 Months',
      totalHours: '24 Hours',
      language: 'English/Malayalam',
      access: 'Online'
    }
  }

  if (window.MOODLE_COURSE_SECTIONS && Array.isArray(window.MOODLE_COURSE_SECTIONS)) {
    courseSections.value = window.MOODLE_COURSE_SECTIONS.map((section: any, index: number) => ({
      id: section.id,
      name: section.name,
      summary: section.summary || '',
      activities: section.activities.map((activity: any) => ({
        id: activity.id,
        name: activity.name,
        type: activity.modname,
        description: '',
        url: activity.url
      })),
      expanded: index === 0
    }))
  }
}

onMounted(() => {
  loadMoodleData()
})

declare global {
  interface Window {
    MOODLE_COURSE_DATA: any
    MOODLE_COURSE_SECTIONS: any[]
    MOODLE_WWW_ROOT: string
  }
}
</script>

<style scoped>
* {
  box-sizing: border-box;
}

.professional-course-page {
  min-height: 100vh;
  background: linear-gradient(
    135deg,
    #f8f9fa 0%,
    #ffffff 50%,
    #f1f3f5 100%
  );
  display: flex;
  flex-direction: column;
  position: relative;
  overflow-x: hidden;
}

.professional-course-page::before {
  content: '';
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background:
    radial-gradient(circle at 20% 30%, rgba(139, 92, 246, 0.03) 0%, transparent 50%),
    radial-gradient(circle at 80% 70%, rgba(236, 72, 153, 0.03) 0%, transparent 50%);
  pointer-events: none;
  z-index: 0;
}

/* Header Styles */
.course-header-professional {
  background: #ffffff;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
  position: sticky;
  top: 0;
  z-index: 1000;
}

.header-container {
  max-width: 1400px;
  margin: 0 auto;
  padding: 0 20px;
}

.header-top {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 15px 0;
}

.header-logo {
  height: 50px;
  width: auto;
}

.header-nav {
  display: flex;
  gap: 30px;
}

.nav-link {
  color: #333;
  text-decoration: none;
  font-weight: 500;
  font-size: 15px;
  transition: color 0.3s;
}

.nav-link:hover {
  color: #667eea;
}

.btn-profile {
  background: none;
  border: none;
  font-size: 28px;
  color: #667eea;
  cursor: pointer;
  transition: color 0.3s;
}

.btn-profile:hover {
  color: #764ba2;
}

/* Breadcrumb */
.breadcrumb-container {
  background: #fff;
  border-bottom: 1px solid #e9ecef;
  padding: 12px 0;
}

.container-main {
  max-width: 1400px;
  margin: 0 auto;
  padding: 0 20px;
}

.breadcrumb-nav {
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 14px;
}

.breadcrumb-link {
  color: #667eea;
  text-decoration: none;
  transition: color 0.3s;
}

.breadcrumb-link:hover {
  color: #764ba2;
}

.breadcrumb-separator {
  color: #adb5bd;
  font-size: 12px;
}

.breadcrumb-current {
  color: #495057;
  font-weight: 500;
}

/* Main Content Area */
.main-content-area {
  flex: 1;
  padding: 40px 0;
  position: relative;
  z-index: 1;
}

.content-grid {
  display: grid;
  grid-template-columns: 300px 1fr 320px;
  gap: 32px;
  max-width: 1440px;
  margin: 0 auto;
  padding: 0 24px;
  align-items: start;
}

/* Sidebar Styles */
.sidebar-left,
.sidebar-right {
  display: flex;
  flex-direction: column;
  gap: 24px;
}

.sidebar-card {
  background: linear-gradient(
    135deg,
    rgba(255, 255, 255, 0.95) 0%,
    rgba(248, 250, 252, 0.98) 100%
  );
  backdrop-filter: blur(20px) saturate(180%);
  -webkit-backdrop-filter: blur(20px) saturate(180%);
  border-radius: 16px;
  padding: 24px;
  box-shadow:
    0 8px 32px rgba(139, 92, 246, 0.08),
    0 2px 8px rgba(236, 72, 153, 0.05),
    inset 0 1px 0 rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(139, 92, 246, 0.08);
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  position: relative;
  overflow: hidden;
}

.sidebar-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #8B5CF6, #EC4899);
  opacity: 0;
  transition: opacity 0.4s ease;
}

.sidebar-card:hover::before {
  opacity: 1;
}

.sidebar-card:hover {
  transform: translateY(-4px);
  box-shadow:
    0 12px 48px rgba(139, 92, 246, 0.12),
    0 4px 16px rgba(236, 72, 153, 0.08),
    inset 0 1px 0 rgba(255, 255, 255, 0.9);
}

.sticky-sidebar {
  position: sticky;
  top: 100px;
}

.sidebar-title {
  font-size: 17px;
  font-weight: 700;
  color: #1e293b;
  margin: 0 0 20px 0;
  display: flex;
  align-items: center;
  gap: 10px;
  position: relative;
  padding-bottom: 12px;
}

.sidebar-title::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 40px;
  height: 3px;
  background: linear-gradient(90deg, #8B5CF6, #EC4899);
  border-radius: 2px;
}

.sidebar-title i {
  font-size: 18px;
  background: linear-gradient(135deg, #8B5CF6, #EC4899);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.sidebar-nav {
  display: flex;
  flex-direction: column;
  gap: 5px;
}

.sidebar-nav-item {
  padding: 12px 16px;
  color: #475569;
  text-decoration: none;
  border-radius: 12px;
  font-size: 14px;
  font-weight: 600;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  display: flex;
  align-items: center;
  gap: 12px;
  background: rgba(248, 250, 252, 0.5);
  border: 1px solid transparent;
  width: 100%;
  text-align: left;
  cursor: pointer;
  position: relative;
  overflow: hidden;
}

.sidebar-nav-item::before {
  content: '';
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  width: 0;
  background: linear-gradient(135deg, #8B5CF6, #EC4899);
  transition: width 0.3s ease;
}

.sidebar-nav-item:hover::before {
  width: 4px;
}

.sidebar-nav-item:hover {
  background: rgba(139, 92, 246, 0.08);
  color: #8B5CF6;
  border-color: rgba(139, 92, 246, 0.15);
  transform: translateX(4px);
  box-shadow: 0 4px 12px rgba(139, 92, 246, 0.1);
}

.sidebar-nav-item.active {
  background: linear-gradient(135deg, #8B5CF6, #EC4899);
  color: white;
  box-shadow: 0 6px 20px rgba(139, 92, 246, 0.3);
}

.sidebar-nav-item.active::before {
  width: 0;
}

.sidebar-nav-item i {
  width: 20px;
  font-size: 16px;
  position: relative;
  z-index: 1;
}

.dropdown-toggle {
  justify-content: space-between;
}

.dropdown-icon {
  margin-left: auto;
  font-size: 12px;
}

.dropdown-menu {
  padding-left: 28px;
  margin-top: 5px;
  display: flex;
  flex-direction: column;
  gap: 2px;
}

.dropdown-item {
  padding: 8px 12px;
  color: #6c757d;
  text-decoration: none;
  border-radius: 6px;
  font-size: 13px;
  transition: all 0.3s;
  display: block;
}

.dropdown-item:hover {
  background: #f8f9fa;
  color: #667eea;
  padding-left: 16px;
}

.dropdown-item.active {
  background: #e7f3ff;
  color: #667eea;
  font-weight: 600;
}

/* Course Info */
.course-info-list {
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.info-row {
  display: flex;
  justify-content: space-between;
  font-size: 13px;
}

.info-label {
  color: #6c757d;
  font-weight: 500;
}

.info-value {
  color: #2d3748;
  font-weight: 600;
}

/* Progress Circle */
.progress-circle-container {
  display: flex;
  justify-content: center;
  padding: 20px 0;
}

.progress-circle {
  position: relative;
  width: 120px;
  height: 120px;
}

.progress-circle svg {
  width: 100%;
  height: 100%;
  transform: rotate(-90deg);
}

.progress-bg-circle {
  fill: none;
  stroke: #e9ecef;
  stroke-width: 8;
}

.progress-fill-circle {
  fill: none;
  stroke: url(#progressGradient);
  stroke-width: 8;
  stroke-linecap: round;
  stroke-dasharray: 251.2;
  transition: stroke-dashoffset 0.5s ease;
}

.progress-text {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 24px;
  font-weight: 800;
  background: linear-gradient(135deg, #667eea, #764ba2);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

/* Course Index */
.course-index-nav {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.index-item {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 10px;
  border-radius: 8px;
  text-decoration: none;
  color: #495057;
  font-size: 13px;
  transition: all 0.3s;
}

.index-item:hover {
  background: #f8f9fa;
  color: #667eea;
}

.index-item.active {
  background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
  color: #667eea;
  border-left: 3px solid #667eea;
}

.index-number {
  width: 24px;
  height: 24px;
  border-radius: 50%;
  background: #e9ecef;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 12px;
  font-weight: 700;
  flex-shrink: 0;
}

.index-item.active .index-number {
  background: linear-gradient(135deg, #667eea, #764ba2);
  color: white;
}

.index-name {
  flex: 1;
  font-weight: 500;
}

.index-count {
  background: #e9ecef;
  padding: 2px 8px;
  border-radius: 12px;
  font-size: 11px;
  font-weight: 600;
  color: #6c757d;
}

/* Main Content */
.main-content {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.course-header-card {
  background: linear-gradient(135deg, #8B5CF6 0%, #a855f7 50%, #EC4899 100%);
  background-size: 200% 200%;
  animation: gradientShift 8s ease-in-out infinite;
  border-radius: 20px;
  padding: 48px;
  color: white;
  box-shadow:
    0 16px 48px rgba(139, 92, 246, 0.35),
    0 8px 24px rgba(236, 72, 153, 0.25),
    inset 0 1px 0 rgba(255, 255, 255, 0.2);
  position: relative;
  overflow: hidden;
}

@keyframes gradientShift {
  0%, 100% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
}

.course-header-card::before {
  content: '';
  position: absolute;
  top: -50%;
  right: -50%;
  width: 200%;
  height: 200%;
  background: radial-gradient(
    circle,
    rgba(255, 255, 255, 0.1) 0%,
    transparent 70%
  );
  animation: headerPulse 4s ease-in-out infinite;
}

@keyframes headerPulse {
  0%, 100% { transform: translate(0, 0) scale(1); opacity: 0.3; }
  50% { transform: translate(-10%, -10%) scale(1.1); opacity: 0.5; }
}

.course-badge {
  display: inline-block;
  background: rgba(255, 255, 255, 0.25);
  border: 1px solid rgba(255, 255, 255, 0.3);
  padding: 8px 20px;
  border-radius: 24px;
  font-size: 13px;
  font-weight: 700;
  margin-bottom: 20px;
  backdrop-filter: blur(16px);
  -webkit-backdrop-filter: blur(16px);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  position: relative;
  z-index: 1;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.course-title-main {
  font-size: 40px;
  font-weight: 800;
  margin: 0 0 24px 0;
  line-height: 1.2;
  position: relative;
  z-index: 1;
  text-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.course-meta-tags {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
  position: relative;
  z-index: 1;
}

.meta-tag {
  display: flex;
  align-items: center;
  gap: 8px;
  background: rgba(255, 255, 255, 0.2);
  border: 1px solid rgba(255, 255, 255, 0.25);
  padding: 10px 18px;
  border-radius: 24px;
  font-size: 14px;
  font-weight: 600;
  backdrop-filter: blur(16px);
  -webkit-backdrop-filter: blur(16px);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
  transition: all 0.3s ease;
}

.meta-tag:hover {
  background: rgba(255, 255, 255, 0.3);
  transform: translateY(-2px);
  box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
}

.meta-tag i {
  font-size: 15px;
}

/* Section Cards */
.course-sections-container {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.section-card {
  background: linear-gradient(
    135deg,
    rgba(255, 255, 255, 0.95) 0%,
    rgba(248, 250, 252, 0.98) 100%
  );
  backdrop-filter: blur(16px);
  -webkit-backdrop-filter: blur(16px);
  border-radius: 18px;
  box-shadow:
    0 8px 32px rgba(139, 92, 246, 0.08),
    0 2px 8px rgba(236, 72, 153, 0.05);
  border: 1px solid rgba(139, 92, 246, 0.1);
  overflow: hidden;
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  position: relative;
}

.section-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 3px;
  background: linear-gradient(90deg, #8B5CF6 0%, #a855f7 50%, #EC4899 100%);
  opacity: 0;
  transition: opacity 0.4s ease;
}

.section-card:hover::before {
  opacity: 1;
}

.section-card:hover {
  box-shadow:
    0 12px 48px rgba(139, 92, 246, 0.12),
    0 4px 16px rgba(236, 72, 153, 0.08);
  transform: translateY(-4px);
  border-color: rgba(139, 92, 246, 0.2);
}

.section-header-pro {
  display: flex;
  align-items: center;
  padding: 24px 28px;
  cursor: pointer;
  background: linear-gradient(
    to right,
    rgba(248, 250, 252, 0.5),
    rgba(255, 255, 255, 0.3)
  );
  border-bottom: 1px solid rgba(139, 92, 246, 0.08);
  transition: all 0.3s ease;
  position: relative;
}

.section-header-pro::before {
  content: '';
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  width: 0;
  background: linear-gradient(135deg, rgba(139, 92, 246, 0.1), rgba(236, 72, 153, 0.08));
  transition: width 0.3s ease;
}

.section-header-pro:hover::before {
  width: 100%;
}

.section-header-pro:hover {
  border-bottom-color: rgba(139, 92, 246, 0.15);
}

.section-number-badge {
  width: 48px;
  height: 48px;
  border-radius: 14px;
  background: linear-gradient(135deg, #8B5CF6 0%, #a855f7 50%, #EC4899 100%);
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 800;
  font-size: 18px;
  margin-right: 18px;
  flex-shrink: 0;
  box-shadow:
    0 6px 20px rgba(139, 92, 246, 0.3),
    inset 0 1px 0 rgba(255, 255, 255, 0.2);
  position: relative;
  z-index: 1;
  transition: transform 0.3s ease;
}

.section-header-pro:hover .section-number-badge {
  transform: scale(1.08) rotate(5deg);
}

.section-title-pro {
  flex: 1;
  font-size: 19px;
  font-weight: 700;
  margin: 0;
  color: #1e293b;
  position: relative;
  z-index: 1;
}

.section-toggle-btn {
  background: linear-gradient(135deg, rgba(139, 92, 246, 0.1), rgba(236, 72, 153, 0.08));
  border: 1px solid rgba(139, 92, 246, 0.2);
  border-radius: 10px;
  color: #8B5CF6;
  font-size: 18px;
  cursor: pointer;
  padding: 10px 12px;
  width: 44px;
  height: 44px;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  position: relative;
  z-index: 1;
}

.section-toggle-btn:hover {
  background: linear-gradient(135deg, #8B5CF6, #EC4899);
  color: white;
  transform: scale(1.08);
  box-shadow: 0 4px 12px rgba(139, 92, 246, 0.25);
}

.section-content-pro {
  padding: 28px;
}

.section-slide-enter-active,
.section-slide-leave-active {
  transition: all 0.3s ease;
}

.section-slide-enter-from,
.section-slide-leave-to {
  opacity: 0;
  transform: translateY(-10px);
}

.section-summary-pro {
  margin-bottom: 20px;
  color: #4a5568;
  line-height: 1.6;
}

/* Activities Grid */
.activities-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
  gap: 20px;
}

.activity-card-pro {
  display: flex;
  align-items: center;
  gap: 16px;
  padding: 20px;
  background: linear-gradient(
    135deg,
    rgba(255, 255, 255, 0.9) 0%,
    rgba(248, 250, 252, 0.95) 100%
  );
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  border-radius: 14px;
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  border: 1px solid rgba(139, 92, 246, 0.1);
  position: relative;
  overflow: hidden;
  box-shadow: 0 4px 16px rgba(139, 92, 246, 0.06);
}

.activity-card-pro::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 4px;
  height: 100%;
  background: linear-gradient(180deg, #8B5CF6, #EC4899);
  opacity: 0;
  transition: opacity 0.4s ease;
}

.activity-card-pro:hover::before {
  opacity: 1;
}

.activity-card-pro:hover {
  background: rgba(255, 255, 255, 1);
  border-color: rgba(139, 92, 246, 0.25);
  transform: translateY(-4px) translateX(4px);
  box-shadow:
    0 12px 32px rgba(139, 92, 246, 0.15),
    0 4px 12px rgba(236, 72, 153, 0.1);
}

.activity-icon-pro {
  width: 56px;
  height: 56px;
  border-radius: 14px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 24px;
  color: white;
  flex-shrink: 0;
  background: linear-gradient(135deg, #8B5CF6 0%, #a855f7 50%, #EC4899 100%);
  box-shadow:
    0 6px 20px rgba(139, 92, 246, 0.25),
    inset 0 1px 0 rgba(255, 255, 255, 0.2);
  transition: transform 0.3s ease;
}

.activity-card-pro:hover .activity-icon-pro {
  transform: scale(1.1) rotate(5deg);
}

.activity-details {
  flex: 1;
  min-width: 0;
}

.activity-title-pro {
  font-size: 16px;
  font-weight: 700;
  margin: 0 0 6px 0;
  color: #1e293b;
  line-height: 1.3;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
}

.activity-type {
  font-size: 13px;
  color: #64748b;
  margin: 0;
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.activity-link-btn {
  width: 44px;
  height: 44px;
  border-radius: 12px;
  background: linear-gradient(135deg, #8B5CF6, #EC4899);
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  text-decoration: none;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  flex-shrink: 0;
  box-shadow: 0 4px 12px rgba(139, 92, 246, 0.2);
}

.activity-link-btn:hover {
  transform: scale(1.15) rotate(5deg);
  box-shadow: 0 6px 20px rgba(139, 92, 246, 0.35);
}

.no-activities {
  text-align: center;
  padding: 40px;
  color: #adb5bd;
}

.no-activities i {
  font-size: 48px;
  margin-bottom: 10px;
  display: block;
}

/* Footer */
.professional-footer {
  background: #2d3748;
  color: #ffffff;
  padding: 60px 0 30px;
  margin-top: auto;
}

.footer-container {
  max-width: 1400px;
  margin: 0 auto;
  padding: 0 20px;
}

.footer-grid {
  display: grid;
  grid-template-columns: 2fr 1fr 1fr 1fr;
  gap: 40px;
  margin-bottom: 40px;
}

.footer-logo {
  height: 45px;
  width: auto;
  margin-bottom: 15px;
  filter: brightness(0) invert(1);
}

.footer-description {
  color: #cbd5e0;
  line-height: 1.6;
  margin-bottom: 20px;
  font-size: 14px;
}

.footer-social {
  display: flex;
  gap: 10px;
}

.social-link {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.1);
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  text-decoration: none;
  transition: all 0.3s;
}

.social-link:hover {
  background: linear-gradient(135deg, #667eea, #764ba2);
  transform: translateY(-3px);
}

.footer-title {
  font-size: 18px;
  font-weight: 700;
  margin-bottom: 20px;
}

.footer-links {
  list-style: none;
  padding: 0;
  margin: 0;
}

.footer-links li {
  margin-bottom: 12px;
}

.footer-links a {
  color: #cbd5e0;
  text-decoration: none;
  font-size: 14px;
  transition: color 0.3s;
}

.footer-links a:hover {
  color: #667eea;
}

.footer-links i {
  margin-right: 8px;
  color: #667eea;
}

.footer-bottom {
  padding-top: 30px;
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 15px;
}

.copyright {
  color: #cbd5e0;
  font-size: 14px;
  margin: 0;
}

.footer-bottom-links {
  display: flex;
  gap: 20px;
}

.footer-bottom-links a {
  color: #cbd5e0;
  text-decoration: none;
  font-size: 13px;
  transition: color 0.3s;
}

.footer-bottom-links a:hover {
  color: #667eea;
}

/* Responsive Design */
@media (max-width: 1400px) {
  .content-grid {
    grid-template-columns: 280px 1fr 300px;
    gap: 28px;
  }
}

@media (max-width: 1200px) {
  .content-grid {
    grid-template-columns: 260px 1fr 280px;
    gap: 24px;
    padding: 0 20px;
  }

  .course-header-card {
    padding: 40px;
  }

  .course-title-main {
    font-size: 36px;
  }
}

@media (max-width: 992px) {
  .content-grid {
    grid-template-columns: 1fr;
    gap: 24px;
  }

  .sidebar-left,
  .sidebar-right {
    display: none;
  }

  .header-nav {
    display: none;
  }

  .main-content-area {
    padding: 32px 0;
  }

  .course-header-card {
    padding: 36px;
  }

  .course-title-main {
    font-size: 32px;
  }

  .activities-grid {
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  }

  .footer-grid {
    grid-template-columns: 1fr 1fr;
    gap: 32px;
  }
}

@media (max-width: 768px) {
  .container-main {
    padding: 0 16px;
  }

  .main-content-area {
    padding: 24px 0;
  }

  .breadcrumb-nav {
    font-size: 13px;
  }

  .course-header-card {
    padding: 28px;
    border-radius: 16px;
  }

  .course-title-main {
    font-size: 28px;
  }

  .course-badge {
    font-size: 12px;
    padding: 6px 16px;
  }

  .meta-tag {
    font-size: 13px;
    padding: 8px 14px;
    gap: 6px;
  }

  .meta-tag i {
    font-size: 13px;
  }

  .section-header-pro {
    padding: 20px;
  }

  .section-number-badge {
    width: 44px;
    height: 44px;
    font-size: 16px;
    margin-right: 14px;
  }

  .section-title-pro {
    font-size: 17px;
  }

  .section-toggle-btn {
    width: 40px;
    height: 40px;
    font-size: 16px;
  }

  .section-content-pro {
    padding: 20px;
  }

  .activities-grid {
    grid-template-columns: 1fr;
    gap: 16px;
  }

  .activity-card-pro {
    padding: 16px;
  }

  .activity-icon-pro {
    width: 48px;
    height: 48px;
    font-size: 20px;
  }

  .activity-title-pro {
    font-size: 15px;
  }

  .activity-link-btn {
    width: 40px;
    height: 40px;
  }

  .footer-grid {
    grid-template-columns: 1fr;
    gap: 28px;
  }

  .footer-bottom {
    flex-direction: column;
    text-align: center;
    gap: 12px;
  }
}

@media (max-width: 576px) {
  .container-main {
    padding: 0 12px;
  }

  .main-content-area {
    padding: 20px 0;
  }

  .breadcrumb-nav {
    font-size: 12px;
    flex-wrap: wrap;
    gap: 6px;
  }

  .breadcrumb-separator {
    font-size: 10px;
  }

  .course-header-card {
    padding: 24px;
    border-radius: 14px;
  }

  .course-badge {
    font-size: 11px;
    padding: 6px 14px;
    margin-bottom: 16px;
  }

  .course-title-main {
    font-size: 24px;
    margin-bottom: 20px;
  }

  .course-meta-tags {
    gap: 8px;
  }

  .meta-tag {
    font-size: 12px;
    padding: 7px 12px;
  }

  .section-card {
    border-radius: 14px;
  }

  .section-header-pro {
    padding: 16px;
  }

  .section-number-badge {
    width: 40px;
    height: 40px;
    font-size: 15px;
    margin-right: 12px;
    border-radius: 12px;
  }

  .section-title-pro {
    font-size: 15px;
  }

  .section-toggle-btn {
    width: 36px;
    height: 36px;
    font-size: 14px;
  }

  .section-content-pro {
    padding: 16px;
  }

  .activities-grid {
    gap: 12px;
  }

  .activity-card-pro {
    padding: 14px;
    gap: 12px;
    border-radius: 12px;
  }

  .activity-icon-pro {
    width: 44px;
    height: 44px;
    font-size: 18px;
    border-radius: 12px;
  }

  .activity-title-pro {
    font-size: 14px;
  }

  .activity-type {
    font-size: 11px;
  }

  .activity-link-btn {
    width: 36px;
    height: 36px;
    border-radius: 10px;
  }
}
</style>
