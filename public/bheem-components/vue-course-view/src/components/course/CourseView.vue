<template>
  <div class="course-view-container">
    <!-- Course Header -->
    <div class="course-header">
      <div class="course-header-content">
        <div class="course-breadcrumb">
          <a href="/">Home</a> / <a href="/course">Courses</a> / <span>{{ courseData.name }}</span>
        </div>
        <h1 class="course-title">{{ courseData.name }}</h1>
        <div class="course-meta">
          <div class="meta-item">
            <i class="fas fa-user-graduate"></i>
            <span>{{ courseData.level }}</span>
          </div>
          <div class="meta-item">
            <i class="fas fa-clock"></i>
            <span>{{ courseData.duration }}</span>
          </div>
          <div class="meta-item">
            <i class="fas fa-hourglass-half"></i>
            <span>{{ courseData.totalHours }}</span>
          </div>
          <div class="meta-item">
            <i class="fas fa-language"></i>
            <span>{{ courseData.language }}</span>
          </div>
          <div class="meta-item">
            <i class="fas fa-laptop"></i>
            <span>{{ courseData.access }}</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Course Content Sections -->
    <div class="course-content-wrapper">
      <div class="course-sections">
        <div
          v-for="(section, index) in courseSections"
          :key="section.id"
          class="course-section"
          :class="{ 'section-expanded': section.expanded }"
        >
          <div class="section-header" @click="toggleSection(index)">
            <div class="section-number">{{ index }}</div>
            <h3 class="section-title">{{ section.name }}</h3>
            <div class="section-toggle">
              <i :class="section.expanded ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
            </div>
          </div>

          <transition name="section-content">
            <div v-if="section.expanded" class="section-content">
              <div v-if="section.summary" class="section-summary" v-html="section.summary"></div>

              <div v-if="section.activities && section.activities.length > 0" class="section-activities">
                <div
                  v-for="activity in section.activities"
                  :key="activity.id"
                  class="activity-item"
                >
                  <div class="activity-icon">
                    <i :class="getActivityIcon(activity.type)"></i>
                  </div>
                  <div class="activity-info">
                    <h4 class="activity-title">{{ activity.name }}</h4>
                    <p v-if="activity.description" class="activity-description">{{ activity.description }}</p>
                  </div>
                  <div class="activity-action">
                    <a :href="activity.url" class="btn-view-activity">
                      View <i class="fas fa-arrow-right"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </transition>
        </div>
      </div>

      <!-- Sidebar -->
      <div class="course-sidebar">
        <div class="sidebar-card">
          <h3 class="sidebar-title">Course Progress</h3>
          <div class="progress-container">
            <div class="progress-circle">
              <svg viewBox="0 0 100 100">
                <circle cx="50" cy="50" r="45" class="progress-bg"></circle>
                <circle
                  cx="50"
                  cy="50"
                  r="45"
                  class="progress-bar"
                  :style="{ strokeDashoffset: progressOffset }"
                ></circle>
              </svg>
              <div class="progress-text">
                <span class="progress-percent">{{ courseProgress }}%</span>
              </div>
            </div>
          </div>
        </div>

        <div class="sidebar-card">
          <h3 class="sidebar-title">Course Info</h3>
          <div class="info-list">
            <div class="info-item">
              <strong>Enrolled:</strong> {{ courseData.enrolledCount }} students
            </div>
            <div class="info-item">
              <strong>Last Updated:</strong> {{ courseData.lastUpdated }}
            </div>
            <div class="info-item">
              <strong>Certificate:</strong> Yes
            </div>
          </div>
        </div>
      </div>
    </div>
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
  enrolledCount: number
  lastUpdated: string
}

const courseData = ref<CourseData>({
  id: 8,
  name: 'Bheem Junior AI Basics',
  level: 'Kids (Ages 8-14)',
  duration: '2 Months',
  totalHours: '24 Hours',
  language: 'English/Malayalam',
  access: 'Online',
  enrolledCount: 0,
  lastUpdated: 'October 2024'
})

const courseSections = ref<Section[]>([
  {
    id: 33,
    name: 'Bheem Junior AI Basics',
    summary: '',
    activities: [],
    expanded: true
  },
  {
    id: 227,
    name: 'INTRODUCTION',
    summary: '',
    activities: [],
    expanded: false
  },
  {
    id: 228,
    name: 'Software foundations',
    summary: '',
    activities: [],
    expanded: false
  },
  {
    id: 229,
    name: 'Robots and AI',
    summary: '',
    activities: [],
    expanded: false
  },
  {
    id: 230,
    name: 'History of AI',
    summary: '',
    activities: [],
    expanded: false
  },
  {
    id: 231,
    name: 'Artificial intelligence and subsets',
    summary: '',
    activities: [],
    expanded: false
  },
  {
    id: 232,
    name: 'Program with Scratch',
    summary: '',
    activities: [],
    expanded: false
  },
  {
    id: 233,
    name: 'NLP Applications, Teachable Machine Introduction',
    summary: '',
    activities: [],
    expanded: false
  },
  {
    id: 234,
    name: 'Trends in AI and its Good uses',
    summary: '',
    activities: [],
    expanded: false
  },
  {
    id: 235,
    name: 'Ethics',
    summary: '',
    activities: [],
    expanded: false
  }
])

const courseProgress = ref(0)

const progressOffset = computed(() => {
  const circumference = 2 * Math.PI * 45
  return circumference - (courseProgress.value / 100) * circumference
})

const toggleSection = (index: number) => {
  courseSections.value[index].expanded = !courseSections.value[index].expanded
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
    'scorm': 'fas fa-box',
    'video': 'fas fa-video'
  }
  return icons[type] || 'fas fa-file'
}

// Load course data from Moodle PHP
const loadMoodleData = () => {
  // Check if Moodle data is available
  if (window.MOODLE_COURSE_DATA) {
    const moodleData = window.MOODLE_COURSE_DATA
    courseData.value = {
      id: moodleData.id,
      name: moodleData.fullname,
      level: 'Kids (Ages 8-14)',
      duration: '2 Months',
      totalHours: '24 Hours',
      language: 'English/Malayalam',
      access: 'Online',
      enrolledCount: 0,
      lastUpdated: 'October 2024'
    }
  }

  // Load sections from Moodle
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

// TypeScript declarations for window globals
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

.course-view-container {
  min-height: 100vh;
  background: transparent;
  padding: 20px;
  max-width: 100%;
}

/* Course Header */
.course-header {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  border-radius: 20px;
  padding: 40px;
  margin-bottom: 30px;
  color: white;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.course-breadcrumb {
  font-size: 14px;
  margin-bottom: 15px;
  opacity: 0.9;
}

.course-breadcrumb a {
  color: white;
  text-decoration: none;
  transition: opacity 0.3s;
}

.course-breadcrumb a:hover {
  opacity: 0.7;
}

.course-title {
  font-size: 42px;
  font-weight: 800;
  margin: 0 0 20px 0;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
}

.course-meta {
  display: flex;
  flex-wrap: wrap;
  gap: 25px;
  font-size: 16px;
}

.meta-item {
  display: flex;
  align-items: center;
  gap: 8px;
  background: rgba(255, 255, 255, 0.1);
  padding: 8px 16px;
  border-radius: 20px;
  backdrop-filter: blur(10px);
}

.meta-item i {
  font-size: 18px;
}

/* Course Content Wrapper */
.course-content-wrapper {
  display: grid;
  grid-template-columns: 1fr 350px;
  gap: 30px;
}

/* Course Sections */
.course-sections {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.course-section {
  background: white;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
  transition: transform 0.3s, box-shadow 0.3s;
}

.course-section:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
}

.section-header {
  display: flex;
  align-items: center;
  padding: 20px 25px;
  cursor: pointer;
  background: linear-gradient(to right, #f8f9fa, #ffffff);
  border-bottom: 2px solid #f0f0f0;
  transition: background 0.3s;
}

.section-header:hover {
  background: linear-gradient(to right, #e9ecef, #f8f9fa);
}

.section-number {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: linear-gradient(135deg, #667eea, #764ba2);
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: bold;
  margin-right: 20px;
  font-size: 18px;
}

.section-title {
  flex: 1;
  font-size: 20px;
  font-weight: 700;
  margin: 0;
  color: #2d3748;
}

.section-toggle {
  color: #667eea;
  font-size: 20px;
  transition: transform 0.3s;
}

.section-expanded .section-toggle {
  transform: rotate(180deg);
}

.section-content {
  padding: 25px;
}

.section-content-enter-active,
.section-content-leave-active {
  transition: all 0.3s ease;
}

.section-content-enter-from,
.section-content-leave-to {
  opacity: 0;
  transform: translateY(-10px);
}

.section-summary {
  margin-bottom: 20px;
  color: #4a5568;
  line-height: 1.6;
}

/* Activities */
.section-activities {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.activity-item {
  display: flex;
  align-items: center;
  padding: 15px;
  background: #f8f9fa;
  border-radius: 10px;
  transition: all 0.3s;
}

.activity-item:hover {
  background: #e9ecef;
  transform: translateX(5px);
}

.activity-icon {
  width: 45px;
  height: 45px;
  border-radius: 10px;
  background: linear-gradient(135deg, #667eea, #764ba2);
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-right: 15px;
  font-size: 20px;
}

.activity-info {
  flex: 1;
}

.activity-title {
  font-size: 16px;
  font-weight: 600;
  margin: 0 0 5px 0;
  color: #2d3748;
}

.activity-description {
  font-size: 14px;
  color: #718096;
  margin: 0;
}

.btn-view-activity {
  padding: 8px 20px;
  background: linear-gradient(135deg, #667eea, #764ba2);
  color: white;
  text-decoration: none;
  border-radius: 8px;
  font-weight: 600;
  font-size: 14px;
  transition: all 0.3s;
  display: inline-flex;
  align-items: center;
  gap: 8px;
}

.btn-view-activity:hover {
  transform: translateY(-2px);
  box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
}

/* Sidebar */
.course-sidebar {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.sidebar-card {
  background: white;
  border-radius: 15px;
  padding: 25px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
}

.sidebar-title {
  font-size: 20px;
  font-weight: 700;
  margin: 0 0 20px 0;
  color: #2d3748;
}

/* Progress Circle */
.progress-container {
  display: flex;
  justify-content: center;
  padding: 20px 0;
}

.progress-circle {
  position: relative;
  width: 150px;
  height: 150px;
}

.progress-circle svg {
  width: 100%;
  height: 100%;
  transform: rotate(-90deg);
}

.progress-bg {
  fill: none;
  stroke: #e9ecef;
  stroke-width: 8;
}

.progress-bar {
  fill: none;
  stroke: url(#gradient);
  stroke-width: 8;
  stroke-linecap: round;
  stroke-dasharray: 283;
  transition: stroke-dashoffset 0.5s ease;
}

.progress-text {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

.progress-percent {
  font-size: 32px;
  font-weight: 800;
  background: linear-gradient(135deg, #667eea, #764ba2);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

/* Info List */
.info-list {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.info-item {
  padding: 12px;
  background: #f8f9fa;
  border-radius: 8px;
  font-size: 14px;
  color: #4a5568;
}

.info-item strong {
  color: #2d3748;
  display: block;
  margin-bottom: 5px;
}

/* Responsive */
@media (max-width: 1024px) {
  .course-content-wrapper {
    grid-template-columns: 1fr;
  }

  .course-sidebar {
    order: -1;
  }
}

@media (max-width: 640px) {
  .course-header {
    padding: 25px;
  }

  .course-title {
    font-size: 28px;
  }

  .course-meta {
    flex-direction: column;
    gap: 10px;
  }

  .section-title {
    font-size: 16px;
  }

  .section-number {
    width: 35px;
    height: 35px;
    font-size: 16px;
  }
}
</style>
