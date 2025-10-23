<template>
  <div class="course-card" @click="viewCourse">
    <div class="course-image">
      <img :src="courseImage" :alt="course.fullname" loading="lazy" />
      <div class="course-overlay">
        <div class="overlay-content">
          <i class="fas fa-arrow-right"></i>
          <span>View Course</span>
        </div>
      </div>
    </div>

    <div class="course-content">
      <div class="course-header">
        <span class="course-category">
          <i :class="getCategoryIcon()"></i>
          {{ course.categoryname }}
        </span>
        <span v-if="course.enrolled" class="enrolled-badge">
          <i class="fas fa-check-circle"></i>
          Enrolled
        </span>
      </div>

      <h3 class="course-title">{{ course.fullname }}</h3>

      <div class="course-summary" v-html="truncatedSummary"></div>

      <div class="course-meta">
        <div class="meta-item" v-if="course.enrolledusers">
          <i class="fas fa-users"></i>
          <span>{{ course.enrolledusers }} students</span>
        </div>
        <div class="meta-item" v-if="course.startdate">
          <i class="fas fa-calendar"></i>
          <span>{{ formatDate(course.startdate) }}</span>
        </div>
      </div>

      <div v-if="course.progress !== undefined" class="progress-section">
        <div class="progress-bar">
          <div class="progress-fill" :style="{ width: course.progress + '%' }"></div>
        </div>
        <span class="progress-text">{{ course.progress }}% complete</span>
      </div>

      <div class="course-footer">
        <button class="view-btn">
          <span>View Details</span>
          <i class="fas fa-arrow-right"></i>
        </button>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { computed } from 'vue'
import type { Course } from '../utils/types'

interface Props {
  course: Course
}

const props = defineProps<Props>()

const courseImage = computed(() => {
  if (props.course.courseimage) {
    return props.course.courseimage
  }
  // Default placeholder images based on category
  const categoryId = props.course.categoryid
  const placeholders = [
    'https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/9fbeaf8b-3518-42d9-4525-9fe219224a00/public',
    'https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/3150ef11-e9ba-458b-75d7-d2d54bf51300/public',
    'https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/e7aa1c89-df71-4320-17a7-92a873a9db00/public'
  ]
  return placeholders[categoryId % placeholders.length]
})

const truncatedSummary = computed(() => {
  const div = document.createElement('div')
  div.innerHTML = props.course.summary
  const text = div.textContent || div.innerText || ''
  return text.length > 120 ? text.substring(0, 120) + '...' : text
})

const formatDate = (timestamp: number) => {
  const date = new Date(timestamp * 1000)
  return date.toLocaleDateString('en-US', { month: 'short', year: 'numeric' })
}

const getCategoryIcon = () => {
  const name = props.course.categoryname?.toLowerCase() || ''
  if (name.includes('kid')) return 'fas fa-child'
  if (name.includes('youth') || name.includes('teen')) return 'fas fa-graduation-cap'
  if (name.includes('professional') || name.includes('working')) return 'fas fa-briefcase'
  if (name.includes('creator') || name.includes('influencer')) return 'fas fa-paint-brush'
  if (name.includes('social')) return 'fas fa-share-alt'
  if (name.includes('coding') || name.includes('programming')) return 'fas fa-code'
  return 'fas fa-book'
}

const viewCourse = () => {
  window.location.href = `/course/view.php?id=${props.course.id}`
}
</script>

<style scoped>
/* Will add styles in main.css */
</style>
