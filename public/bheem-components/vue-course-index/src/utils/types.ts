export interface Course {
  id: number
  fullname: string
  shortname: string
  categoryid: number
  categoryname: string
  summary: string
  summaryformat: number
  startdate: number
  enddate: number
  visible: number
  showgrades: number
  lang: string
  enablecompletion: number
  completionnotify: number
  format: string
  courseimage: string
  progress?: number
  enrolled?: boolean
  enrolledusers?: number
}

export interface CourseCategory {
  id: number
  name: string
  description: string
  descriptionformat: number
  parent: number
  sortorder: number
  coursecount: number
  visible: number
  visibleold: number
  timemodified: number
  depth: number
  path: string
  theme: string
  categoryimage?: string
}

export interface ApiResponse<T> {
  success: boolean
  data: T
  error?: string
}
