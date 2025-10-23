import type { Course, CourseCategory, ApiResponse } from './types'

const API_BASE_URL = '/course/api'

export const courseApi = {
  /**
   * Fetch all courses
   */
  async getAllCourses(): Promise<ApiResponse<Course[]>> {
    try {
      const response = await fetch(`${API_BASE_URL}/courses.php`, {
        method: 'GET',
        credentials: 'same-origin',
        headers: {
          'Accept': 'application/json'
        }
      })

      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`)
      }

      const data = await response.json()
      return data
    } catch (error) {
      console.error('Error fetching courses:', error)
      return {
        success: false,
        data: [],
        error: error instanceof Error ? error.message : 'Failed to fetch courses'
      }
    }
  },

  /**
   * Fetch all course categories
   */
  async getCategories(): Promise<ApiResponse<CourseCategory[]>> {
    try {
      const response = await fetch(`${API_BASE_URL}/categories.php`, {
        method: 'GET',
        credentials: 'same-origin',
        headers: {
          'Accept': 'application/json'
        }
      })

      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`)
      }

      const data = await response.json()
      return data
    } catch (error) {
      console.error('Error fetching categories:', error)
      return {
        success: false,
        data: [],
        error: error instanceof Error ? error.message : 'Failed to fetch categories'
      }
    }
  },

  /**
   * Fetch courses by category
   */
  async getCoursesByCategory(categoryId: number): Promise<ApiResponse<Course[]>> {
    try {
      const response = await fetch(`${API_BASE_URL}/courses.php?categoryid=${categoryId}`, {
        method: 'GET',
        credentials: 'same-origin',
        headers: {
          'Accept': 'application/json'
        }
      })

      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`)
      }

      const data = await response.json()
      return data
    } catch (error) {
      console.error('Error fetching courses by category:', error)
      return {
        success: false,
        data: [],
        error: error instanceof Error ? error.message : 'Failed to fetch courses'
      }
    }
  },

  /**
   * Search courses
   */
  async searchCourses(query: string): Promise<ApiResponse<Course[]>> {
    try {
      const response = await fetch(`${API_BASE_URL}/courses.php?search=${encodeURIComponent(query)}`, {
        method: 'GET',
        credentials: 'same-origin',
        headers: {
          'Accept': 'application/json'
        }
      })

      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`)
      }

      const data = await response.json()
      return data
    } catch (error) {
      console.error('Error searching courses:', error)
      return {
        success: false,
        data: [],
        error: error instanceof Error ? error.message : 'Failed to search courses'
      }
    }
  }
}
