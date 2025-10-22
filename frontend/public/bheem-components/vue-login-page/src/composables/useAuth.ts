import { ref } from 'vue'
import { loginUser, loginGuest } from '../utils/api'

interface LoginCredentials {
  username: string
  password: string
  rememberMe: boolean
}

export function useAuth() {
  const isAuthenticated = ref(false)
  const user = ref(null)
  const error = ref<string | null>(null)

  const login = async (credentials: LoginCredentials) => {
    error.value = null

    try {
      // This will submit the form and redirect to dashboard
      const response = await loginUser(credentials)

      if (!response.success) {
        throw new Error(response.message || 'Login failed')
      }

      // If we reach here, the form has been submitted
      // The page will redirect automatically via Moodle
      isAuthenticated.value = true

    } catch (err: any) {
      error.value = err.message || 'An error occurred during login'
      throw err
    }
  }

  const loginAsGuest = async () => {
    error.value = null

    try {
      // This will submit the guest login form
      const response = await loginGuest()

      if (!response.success) {
        throw new Error(response.message || 'Guest login failed')
      }

      // Form submitted, page will redirect
      return response

    } catch (err: any) {
      error.value = err.message || 'An error occurred during guest login'
      throw err
    }
  }

  const logout = () => {
    isAuthenticated.value = false
    user.value = null
    window.location.href = '/login/logout.php'
  }

  return {
    isAuthenticated,
    user,
    error,
    login,
    loginAsGuest,
    logout
  }
}
