import type { CourseCategory } from '../utils/types'

declare global {
  interface Window {
    MOODLE_CATEGORIES?: CourseCategory[]
  }
}

export {}
