# Change Password Component

A modern, Vue.js-powered password change interface for Moodle with beautiful UI/UX and full integration with Moodle's authentication system.

## Features

### 🎨 Modern Design
- Beautiful gradient backgrounds with animated floating shapes
- Glassmorphism card design with smooth animations
- Responsive layout that works on all devices
- Professional color scheme matching Bheem Academy branding

### 🔐 Security Features
- Full integration with Moodle authentication system
- Password policy enforcement
- Password reuse prevention
- Session management options:
  - Option to log out from other sessions
  - Option to revoke webservice tokens
- Secure password visibility toggle

### ✨ User Experience
- Real-time password strength indicator
- Visual password requirements checklist
- Instant form validation with helpful error messages
- Loading states and success notifications
- Smooth animations and transitions

### 🔧 Technical Features
- Built with Vue.js 3
- RESTful API endpoint
- Client-side and server-side validation
- AJAX form submission
- Proper error handling
- Mobile-responsive design

## File Structure

```
change-password/
├── api/
│   └── change_password.php    # API endpoint for password changes
├── index.php                   # Entry point with redirect
├── view.php                    # Main Vue.js interface
├── README.md                   # This file
└── HOW_TO_ACCESS.md           # Access instructions
```

## Installation

The component is already installed in your Moodle instance at:
```
/edoo-components/change-password/
```

## Access URLs

### Development
```
https://dev.bheem.cloud/edoo-components/change-password/view.php?id=USER_ID
```

### From User Preferences
The component is designed to be accessed from the user preferences page:
```
https://dev.bheem.cloud/user/preferences.php
```

Click on "Change password" link to access the modern interface.

## API Endpoint

### Change Password
**Endpoint:** `api/change_password.php`

**Method:** `POST`

**Request Body:**
```json
{
  "oldpassword": "current_password",
  "newpassword1": "new_password",
  "newpassword2": "new_password_confirmation",
  "logoutothersessions": true,
  "signoutofotherservices": true
}
```

**Success Response:**
```json
{
  "success": true,
  "message": "Password changed successfully",
  "user": {
    "id": 123,
    "username": "johndoe",
    "fullname": "John Doe"
  }
}
```

**Error Response:**
```json
{
  "success": false,
  "errors": {
    "oldpassword": "Current password is incorrect",
    "newpassword1": "Password does not meet requirements"
  }
}
```

## Password Requirements

The component enforces Moodle's password policy:
- Minimum 8 characters
- At least one uppercase letter
- At least one lowercase letter
- At least one number
- Special characters recommended for stronger passwords

## Browser Compatibility

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Dependencies

### External Libraries
- **Vue.js 3** - JavaScript framework
- **Font Awesome 6.4.0** - Icons
- **Google Fonts** - Inter & Plus Jakarta Sans

### Moodle Integration
- Moodle config.php
- Moodle authentication system
- User library
- Auth library
- Webservice library

## Customization

### Colors
The main gradient colors can be customized in the CSS:
```css
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
```

### Password Strength Levels
Modify the `checkPasswordStrength()` method in the Vue component to adjust strength calculation.

### API Base URL
Update the `$api_base_url` variable in view.php:
```php
$api_base_url = 'https://dev.bheem.cloud';
```

## Security Considerations

1. **Authentication Required:** Users must be logged in to access the component
2. **Password Verification:** Old password must be correct before allowing change
3. **Session Management:** Option to invalidate other sessions for security
4. **Token Revocation:** Option to revoke webservice access tokens
5. **Password Policy:** Enforces Moodle's configured password policies
6. **HTTPS Required:** Should only be used over HTTPS in production

## Troubleshooting

### Common Issues

1. **API Returns 403 Error**
   - Ensure user is logged in
   - Check user has permission to change their password

2. **Password Policy Errors**
   - Check Moodle's password policy settings
   - Ensure password meets all requirements

3. **Session Issues**
   - Clear browser cookies and cache
   - Check Moodle session configuration

4. **Network Errors**
   - Verify API endpoint is accessible
   - Check browser console for errors

## Development

### Local Testing
1. Ensure Moodle is running
2. Log in as a user
3. Navigate to the component URL
4. Test password change functionality

### Debugging
Enable browser developer tools to see:
- Console logs
- Network requests
- Vue DevTools (if installed)

## Support

For issues or questions:
1. Check the Moodle logs at `/moodle/admin/`
2. Review browser console for JavaScript errors
3. Check server error logs for PHP errors

## Version History

- **v1.0.0** (2025-10-16)
  - Initial release
  - Vue.js 3 implementation
  - Modern UI design
  - Full Moodle integration
  - Password strength indicator
  - Session management options

## License

This component follows Moodle's GPL v3 license.
