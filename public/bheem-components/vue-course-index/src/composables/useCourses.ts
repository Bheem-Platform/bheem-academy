import { ref, computed } from 'vue'
import type { Course, CourseCategory } from '../utils/types'
import { courseApi } from '../utils/api'

export function useCourses() {
  const courses = ref<Course[]>([])
  const categories = ref<CourseCategory[]>([])
  const loading = ref(false)
  const error = ref<string | null>(null)
  const searchQuery = ref('')
  const selectedCategory = ref<number | null>(null)

  // Fetch all courses
  const fetchCourses = async () => {
    loading.value = true
    error.value = null

    try {
      const response = await courseApi.getAllCourses()
      if (response.success) {
        courses.value = response.data
      } else {
        error.value = response.error || 'Failed to fetch courses'
      }
    } catch (err) {
      error.value = 'An unexpected error occurred'
      console.error(err)
    } finally {
      loading.value = false
    }
  }

  // Fetch categories
  const fetchCategories = async () => {
    try {
      // Check if categories are already injected in the page
      console.log('Checking for window.MOODLE_CATEGORIES:', window.MOODLE_CATEGORIES)
      if (window.MOODLE_CATEGORIES) {
        console.log('Found injected categories:', window.MOODLE_CATEGORIES.length)
        categories.value = window.MOODLE_CATEGORIES
        error.value = null
        return
      }

      // Otherwise fetch from API
      console.log('Fetching from API...')
      const response = await courseApi.getCategories()
      console.log('API response:', response)
      if (response.success) {
        categories.value = response.data
        error.value = null
      } else {
        error.value = response.error || 'Failed to fetch categories'
        console.error('Error fetching categories:', response.error)
      }
    } catch (err) {
      error.value = 'An unexpected error occurred while fetching categories'
      console.error('Error fetching categories:', err)
    }
  }

  // Fetch courses by category
  const fetchCoursesByCategory = async (categoryId: number) => {
    loading.value = true
    error.value = null
    selectedCategory.value = categoryId

    try {
      const response = await courseApi.getCoursesByCategory(categoryId)
      if (response.success) {
        courses.value = response.data
      } else {
        error.value = response.error || 'Failed to fetch courses'
      }
    } catch (err) {
      error.value = 'An unexpected error occurred'
      console.error(err)
    } finally {
      loading.value = false
    }
  }

  // Search courses
  const searchCourses = async (query: string) => {
    if (!query.trim()) {
      await fetchCourses()
      return
    }

    loading.value = true
    error.value = null
    searchQuery.value = query

    try {
      const response = await courseApi.searchCourses(query)
      if (response.success) {
        courses.value = response.data
      } else {
        error.value = response.error || 'Failed to search courses'
      }
    } catch (err) {
      error.value = 'An unexpected error occurred'
      console.error(err)
    } finally {
      loading.value = false
    }
  }

  // Filtered courses based on search and category
  const filteredCourses = computed(() => {
    let filtered = courses.value

    if (selectedCategory.value) {
      filtered = filtered.filter(course => course.categoryid === selectedCategory.value)
    }

    if (searchQuery.value) {
      const query = searchQuery.value.toLowerCase()
      filtered = filtered.filter(course =>
        course.fullname.toLowerCase().includes(query) ||
        course.shortname.toLowerCase().includes(query) ||
        course.summary.toLowerCase().includes(query)
      )
    }

    return filtered
  })

  // Group courses by category
  const coursesByCategory = computed(() => {
    const grouped: Record<number, Course[]> = {}

    filteredCourses.value.forEach(course => {
      if (!grouped[course.categoryid]) {
        grouped[course.categoryid] = []
      }
      grouped[course.categoryid].push(course)
    })

    return grouped
  })

  return {
    courses,
    categories,
    loading,
    error,
    searchQuery,
    selectedCategory,
    filteredCourses,
    coursesByCategory,
    fetchCourses,
    fetchCategories,
    fetchCoursesByCategory,
    searchCourses
  }
}
