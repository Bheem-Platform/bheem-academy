<template>
  <div class="course-index-modern">
    <!-- Compact Search Bar -->
    <div class="search-bar-compact">
      <div class="search-container-compact">
        <i class="fas fa-search"></i>
        <input
          type="text"
          v-model="searchQuery"
          @input="handleSearch"
          placeholder="Search categories..."
          class="search-input-compact"
        />
        <button v-if="searchQuery" @click="clearSearch" class="clear-btn-compact">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <div class="results-count" v-if="!loading && !error">
        {{ filteredCategories.length }} {{ filteredCategories.length === 1 ? 'category' : 'categories' }}
      </div>
    </div>

    <!-- Categories Section -->
    <div class="categories-wrapper">
      <!-- Loading State -->
      <div v-if="loading" class="state-message">
        <div class="spinner-compact"></div>
        <span>Loading...</span>
      </div>

      <!-- Error State -->
      <div v-else-if="error" class="state-message error">
        <i class="fas fa-exclamation-circle"></i>
        <p>{{ error }}</p>
        <button @click="fetchCategories" class="btn-compact">
          <i class="fas fa-redo"></i> Retry
        </button>
      </div>

      <!-- Empty State -->
      <div v-else-if="filteredCategories.length === 0" class="state-message empty">
        <i class="fas fa-search"></i>
        <p>No categories found</p>
        <button @click="clearSearch" class="btn-compact">
          Clear Search
        </button>
      </div>

      <!-- Categories Grid -->
      <div v-else class="categories-grid-modern">
        <CategoryCard
          v-for="category in filteredCategories"
          :key="category.id"
          :category="category"
        />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted, computed } from 'vue'
import { useCourses } from '../composables/useCourses'
import CategoryCard from './CategoryCard.vue'

const {
  categories,
  error,
  searchQuery,
  fetchCategories
} = useCourses()

const loading = ref(true)

onMounted(async () => {
  console.log('CourseIndex mounted')
  await fetchCategories()
  console.log('Categories fetched:', categories.value.length)
  console.log('Error:', error.value)
  loading.value = false
})

const filteredCategories = computed(() => {
  if (!searchQuery.value) {
    return categories.value
  }
  const query = searchQuery.value.toLowerCase()
  return categories.value.filter(category =>
    category.name.toLowerCase().includes(query) ||
    (category.description && category.description.toLowerCase().includes(query))
  )
})

const handleSearch = () => {
  // Search is reactive through computed property
}

const clearSearch = () => {
  searchQuery.value = ''
}
</script>

<style scoped>
/* Will add styles in next file */
</style>
