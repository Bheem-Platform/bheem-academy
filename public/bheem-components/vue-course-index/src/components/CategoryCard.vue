<template>
  <div class="category-card-modern" @click="viewCategory">
    <div class="card-image-wrapper">
      <img :src="categoryImage" :alt="category.name" class="card-image" loading="lazy" />
      <div class="image-overlay">
        <i class="fas fa-arrow-right"></i>
      </div>
    </div>

    <div class="card-content">
      <h3 class="card-title">{{ category.name }}</h3>
      <p v-if="category.description" class="card-description">
        {{ truncateDescription(category.description) }}
      </p>

      <div class="card-meta">
        <span class="course-badge">
          <i class="fas fa-book"></i>
          {{ category.coursecount }} {{ category.coursecount === 1 ? 'Course' : 'Courses' }}
        </span>
        <span v-if="category.timemodified" class="date-text">
          {{ formatDateCompact(category.timemodified) }}
        </span>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { computed } from 'vue'
import type { CourseCategory } from '../utils/types'

interface Props {
  category: CourseCategory
}

const props = defineProps<Props>()

const categoryImage = computed(() => {
  if (props.category.categoryimage) {
    return props.category.categoryimage
  }
  // Fallback placeholder images
  const name = props.category.name.toLowerCase()
  if (name.includes('kid')) {
    return 'https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/9fbeaf8b-3518-42d9-4525-9fe219224a00/public'
  }
  if (name.includes('youth') || name.includes('teen')) {
    return 'https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/3150ef11-e9ba-458b-75d7-d2d54bf51300/public'
  }
  if (name.includes('professional') || name.includes('working')) {
    return 'https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/e7aa1c89-df71-4320-17a7-92a873a9db00/public'
  }
  return 'https://via.placeholder.com/400x250/667eea/ffffff?text=' + encodeURIComponent(props.category.name)
})

const formatDateCompact = (timestamp: number) => {
  const date = new Date(timestamp * 1000)
  const month = date.toLocaleString('en-US', { month: 'short' })
  const year = date.getFullYear()
  return `${month} ${year}`
}

const truncateDescription = (desc: string) => {
  if (!desc) return ''
  return desc.length > 100 ? desc.substring(0, 100) + '...' : desc
}

const viewCategory = () => {
  window.location.href = `/course/index.php?categoryid=${props.category.id}`
}
</script>

<style scoped>
/* Styles will be in main.css */
</style>
