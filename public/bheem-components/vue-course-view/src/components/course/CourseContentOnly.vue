<template>
  <div class="vue-course-content">
    <!-- Course Info Header -->
    <div class="course-info-header">
      <div class="course-breadcrumb">
        <a href="/">Home</a>
        <i class="fas fa-chevron-right"></i>
        <a href="/my/">My Courses</a>
        <i class="fas fa-chevron-right"></i>
        <span>{{ courseData.name }}</span>
      </div>
      <h1 class="course-title">{{ courseData.name }}</h1>
      <div class="course-meta-tags">
        <span class="meta-tag">
          <i class="fas fa-graduation-cap"></i> {{ courseData.level }}
        </span>
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

    <!-- Course Sections Container -->
    <div class="course-sections-wrapper">
      <div
        v-for="(section, index) in courseSections"
        :key="section.id"
        class="section-card-modern"
      >
        <div
          class="section-header-modern"
          @click="toggleSection(index)"
        >
          <div class="section-number-circle">{{ index }}</div>
          <h2 class="section-title-modern">{{ section.name }}</h2>
          <button class="section-expand-btn" type="button">
            <i :class="['fas', section.expanded ? 'fa-chevron-up' : 'fa-chevron-down']"></i>
          </button>
        </div>

        <transition name="section-expand">
          <div v-if="section.expanded" class="section-body-modern">
            <div v-if="section.summary" class="section-summary-text" v-html="section.summary"></div>

            <div v-if="section.activities && section.activities.length > 0" class="activities-list">
              <div
                v-for="activity in section.activities"
                :key="activity.id"
                class="activity-item-modern"
              >
                <div class="activity-icon-box" :class="`type-${activity.type}`">
                  <i :class="getActivityIcon(activity.type)"></i>
                </div>
                <div class="activity-info-box">
                  <h4 class="activity-name">{{ activity.name }}</h4>
                  <p class="activity-type-label">{{ getActivityTypeName(activity.type) }}</p>
                </div>
                <a :href="activity.url" class="activity-access-btn" v-if="activity.url">
                  <span>Open</span>
                  <i class="fas fa-arrow-right"></i>
                </a>
              </div>
            </div>

            <div v-else class="no-activities-message">
              <i class="fas fa-inbox"></i>
              <p>No activities available in this section.</p>
            </div>
          </div>
        </transition>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'

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
    'label': 'fas fa-tag',
    'subsection': 'fas fa-folder'
  }
  return icons[type] || 'fas fa-file'
}

const getActivityTypeName = (type: string): string => {
  const names: Record<string, string> = {
    'page': 'Page',
    'resource': 'Resource',
    'url': 'Web Link',
    'forum': 'Forum',
    'quiz': 'Quiz',
    'assignment': 'Assignment',
    'lesson': 'Lesson',
    'label': 'Information',
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
.vue-course-content {
  padding: 0;
  margin: 0;
  width: 100%;
}

/* Course Info Header */
.course-info-header {
  margin-bottom: 40px;
  padding: 0 20px;
}

.course-breadcrumb {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 20px;
  font-size: 14px;
  color: #64748b;
}

.course-breadcrumb a {
  color: #8B5CF6;
  text-decoration: none;
  transition: color 0.2s;
}

.course-breadcrumb a:hover {
  color: #7c3aed;
}

.course-breadcrumb i {
  font-size: 10px;
  color: #cbd5e1;
}

.course-breadcrumb span {
  color: #1e293b;
  font-weight: 600;
}

.course-title {
  font-size: 32px;
  font-weight: 800;
  margin: 0 0 20px 0;
  color: #1e293b;
  line-height: 1.2;
}

.course-meta-tags {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
}

.meta-tag {
  display: flex;
  align-items: center;
  gap: 8px;
  background: #f8f9fa;
  padding: 8px 16px;
  border-radius: 8px;
  font-size: 14px;
  color: #475569;
  border: 1px solid #e2e8f0;
}

.meta-tag i {
  color: #8B5CF6;
  font-size: 14px;
}

/* Course Sections */
.course-sections-wrapper {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.section-card-modern {
  background: #ffffff;
  border-radius: 12px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
  overflow: hidden;
  transition: all 0.3s;
}

.section-card-modern:hover {
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
  transform: translateY(-2px);
}

.section-header-modern {
  display: flex;
  align-items: center;
  padding: 25px 30px;
  cursor: pointer;
  background: linear-gradient(to right, #f8f9fa, #ffffff);
  border-bottom: 2px solid transparent;
  transition: all 0.3s;
}

.section-header-modern:hover {
  background: linear-gradient(to right, #e9ecef, #f8f9fa);
  border-bottom-color: #667eea;
}

.section-number-circle {
  width: 45px;
  height: 45px;
  border-radius: 50%;
  background: linear-gradient(135deg, #667eea, #764ba2);
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 700;
  font-size: 18px;
  margin-right: 20px;
  flex-shrink: 0;
  box-shadow: 0 4px 10px rgba(102, 126, 234, 0.3);
}

.section-title-modern {
  flex: 1;
  font-size: 20px;
  font-weight: 700;
  margin: 0;
  color: #2d3748;
}

.section-expand-btn {
  background: none;
  border: none;
  color: #667eea;
  font-size: 22px;
  cursor: pointer;
  padding: 8px;
  transition: transform 0.3s;
  display: flex;
  align-items: center;
  justify-content: center;
}

.section-expand-btn:hover {
  transform: scale(1.1);
}

/* Section Body */
.section-body-modern {
  padding: 30px;
  background: #ffffff;
}

.section-expand-enter-active,
.section-expand-leave-active {
  transition: all 0.3s ease;
}

.section-expand-enter-from,
.section-expand-leave-to {
  opacity: 0;
  transform: translateY(-10px);
}

.section-summary-text {
  margin-bottom: 25px;
  color: #4a5568;
  line-height: 1.7;
  padding: 15px;
  background: #f8f9fa;
  border-radius: 8px;
  border-left: 4px solid #667eea;
}

/* Activities */
.activities-list {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
  gap: 20px;
}

.activity-item-modern {
  display: flex;
  align-items: center;
  gap: 15px;
  padding: 18px;
  background: #f8f9fa;
  border-radius: 12px;
  transition: all 0.3s;
  border: 2px solid transparent;
}

.activity-item-modern:hover {
  background: #ffffff;
  border-color: #667eea;
  transform: translateX(5px);
  box-shadow: 0 4px 15px rgba(102, 126, 234, 0.15);
}

.activity-icon-box {
  width: 50px;
  height: 50px;
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 22px;
  color: white;
  flex-shrink: 0;
  background: linear-gradient(135deg, #667eea, #764ba2);
  box-shadow: 0 4px 10px rgba(102, 126, 234, 0.3);
}

.activity-info-box {
  flex: 1;
  min-width: 0;
}

.activity-name {
  font-size: 16px;
  font-weight: 600;
  margin: 0 0 5px 0;
  color: #2d3748;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}

.activity-type-label {
  font-size: 13px;
  color: #718096;
  margin: 0;
  font-weight: 500;
}

.activity-access-btn {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 10px 20px;
  background: linear-gradient(135deg, #667eea, #764ba2);
  color: white;
  text-decoration: none;
  border-radius: 8px;
  font-weight: 600;
  font-size: 14px;
  transition: all 0.3s;
  flex-shrink: 0;
}

.activity-access-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
  color: white;
}

.no-activities-message {
  text-align: center;
  padding: 50px 20px;
  color: #adb5bd;
}

.no-activities-message i {
  font-size: 50px;
  margin-bottom: 15px;
  display: block;
  opacity: 0.5;
}

.no-activities-message p {
  margin: 0;
  font-size: 16px;
}

/* Responsive Design */
@media (max-width: 992px) {
  .course-title {
    font-size: 28px;
  }

  .course-sections-wrapper {
    padding: 0 15px;
  }

  .activities-list {
    grid-template-columns: 1fr;
  }
}

@media (max-width: 768px) {
  .course-title {
    font-size: 24px;
  }

  .course-info-header {
    padding: 0 10px;
  }

  .meta-tag {
    font-size: 12px;
    padding: 6px 12px;
  }

  .section-header-modern {
    padding: 20px;
  }

  .section-number-circle {
    width: 40px;
    height: 40px;
    font-size: 16px;
  }

  .section-title-modern {
    font-size: 17px;
  }

  .section-body-modern {
    padding: 20px;
  }

  .activity-item-modern {
    flex-wrap: wrap;
  }

  .activity-access-btn {
    width: 100%;
    justify-content: center;
  }
}

@media (max-width: 576px) {
  .course-meta-tags {
    gap: 8px;
  }

  .meta-tag {
    flex: 1 1 calc(50% - 4px);
    justify-content: center;
    font-size: 11px;
  }

  .section-number-circle {
    width: 35px;
    height: 35px;
    font-size: 14px;
    margin-right: 15px;
  }

  .section-title-modern {
    font-size: 15px;
  }
}
</style>
