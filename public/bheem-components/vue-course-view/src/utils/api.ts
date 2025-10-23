/**
 * API utility functions for authentication
 * Ensures proper Moodle login workflow with actual form submission
 */

interface LoginCredentials {
  username: string
  password: string
  rememberMe: boolean
}

interface LoginResponse {
  success: boolean
  message?: string
  user?: any
  redirect?: string
}

/**
 * Login user with credentials using actual form submission
 * This ensures proper Moodle session handling and redirect
 */
export async function loginUser(credentials: LoginCredentials): Promise<LoginResponse> {
  try {
    // Get the login token from Moodle's login page
    const loginToken = await getLoginToken()

    if (!loginToken) {
      return {
        success: false,
        message: 'Could not retrieve login token. Please refresh the page and try again.'
      }
    }

    // Create a hidden form and submit it (this ensures proper Moodle handling)
    const form = document.createElement('form')
    form.method = 'POST'
    form.action = '/login/index.php'
    form.style.display = 'none'

    // Add form fields
    const fields = {
      'username': credentials.username.toLowerCase().trim(),
      'password': credentials.password,
      'rememberusername': credentials.rememberMe ? '1' : '0',
      'logintoken': loginToken,
      'anchor': location.hash
    }

    Object.entries(fields).forEach(([name, value]) => {
      const input = document.createElement('input')
      input.type = 'hidden'
      input.name = name
      input.value = value
      form.appendChild(input)
    })

    // Append form to body and submit
    document.body.appendChild(form)
    form.submit()

    // Return success - the form submission will handle the redirect
    return {
      success: true,
      message: 'Logging in...'
    }

  } catch (error: any) {
    console.error('Login error:', error)
    return {
      success: false,
      message: error.message || 'An error occurred during login. Please try again.'
    }
  }
}

/**
 * Login as guest using form submission
 */
export async function loginGuest(): Promise<LoginResponse> {
  try {
    // Get the login token
    const loginToken = await getLoginToken()

    if (!loginToken) {
      return {
        success: false,
        message: 'Could not retrieve login token. Please refresh the page and try again.'
      }
    }

    // Create a hidden form for guest login
    const form = document.createElement('form')
    form.method = 'POST'
    form.action = '/login/index.php'
    form.style.display = 'none'

    // Add form fields for guest login
    const fields = {
      'username': 'guest',
      'password': 'guest',
      'logintoken': loginToken
    }

    Object.entries(fields).forEach(([name, value]) => {
      const input = document.createElement('input')
      input.type = 'hidden'
      input.name = name
      input.value = value
      form.appendChild(input)
    })

    // Append form to body and submit
    document.body.appendChild(form)
    form.submit()

    return {
      success: true,
      message: 'Logging in as guest...'
    }

  } catch (error: any) {
    console.error('Guest login error:', error)
    return {
      success: false,
      message: 'An error occurred during guest login.'
    }
  }
}

/**
 * Get login token from Moodle's session
 * This token is required for CSRF protection
 */
async function getLoginToken(): Promise<string> {
  try {
    // Fetch the login page to get the token
    const response = await fetch('/login/index.php?traditional=1', {
      method: 'GET',
      credentials: 'same-origin',
      headers: {
        'Accept': 'text/html'
      }
    })

    if (!response.ok) {
      console.error('Failed to fetch login page:', response.status)
      return ''
    }

    const html = await response.text()

    // Extract logintoken from the HTML
    const tokenMatch = html.match(/name="logintoken"\s+value="([^"]+)"/)

    if (tokenMatch && tokenMatch[1]) {
      console.log('Login token retrieved successfully')
      return tokenMatch[1]
    }

    console.warn('Login token not found in response')
    return ''

  } catch (error) {
    console.error('Error getting login token:', error)
    return ''
  }
}
