/**
 * Form validation utilities
 */

/**
 * Validate username
 */
export function validateUsername(username: string): string {
  if (!username || username.trim() === '') {
    return 'Username is required'
  }

  if (username.length < 2) {
    return 'Username must be at least 2 characters'
  }

  if (username.length > 100) {
    return 'Username is too long'
  }

  return ''
}

/**
 * Validate password
 */
export function validatePassword(password: string): string {
  if (!password || password === '') {
    return 'Password is required'
  }

  if (password.length < 1) {
    return 'Password is required'
  }

  return ''
}

/**
 * Validate email format
 */
export function validateEmail(email: string): string {
  if (!email || email.trim() === '') {
    return 'Email is required'
  }

  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/

  if (!emailRegex.test(email)) {
    return 'Please enter a valid email address'
  }

  return ''
}

/**
 * Sanitize input to prevent XSS
 */
export function sanitizeInput(input: string): string {
  const div = document.createElement('div')
  div.textContent = input
  return div.innerHTML
}
