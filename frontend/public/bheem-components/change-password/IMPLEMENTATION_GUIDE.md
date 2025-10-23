# Change Password Component - Implementation Guide

A comprehensive guide for understanding and customizing the modern Change Password component.

## Architecture Overview

### Component Structure

```
┌─────────────────────────────────────────────────────┐
│                    User Browser                      │
│  ┌──────────────────────────────────────────────┐  │
│  │         view.php (Vue.js Frontend)           │  │
│  │  • Form UI                                    │  │
│  │  • Validation                                 │  │
│  │  • Strength Indicator                        │  │
│  └──────────────────────────────────────────────┘  │
└────────────────────┬────────────────────────────────┘
                     │ AJAX POST
                     ▼
┌─────────────────────────────────────────────────────┐
│             API Layer (PHP)                          │
│  ┌──────────────────────────────────────────────┐  │
│  │    api/change_password.php                   │  │
│  │  • Authentication                             │  │
│  │  • Validation                                 │  │
│  │  • Password Policy                           │  │
│  │  • Session Management                        │  │
│  └──────────────────────────────────────────────┘  │
└────────────────────┬────────────────────────────────┘
                     │
                     ▼
┌─────────────────────────────────────────────────────┐
│           Moodle Core (Database)                     │
│  • User Authentication                               │
│  • Password Storage                                  │
│  • Session Management                                │
│  • Webservice Tokens                                 │
└─────────────────────────────────────────────────────┘
```

## Frontend Implementation (view.php)

### Vue.js Application Structure

```javascript
createApp({
  data() {
    // Form data, errors, UI states
  },
  methods: {
    checkPasswordStrength() {
      // Real-time strength calculation
    },
    handleSubmit() {
      // Form submission and API call
    }
  }
}).mount('#app')
```

### Key Features

#### 1. Password Strength Indicator
```javascript
checkPasswordStrength() {
  const password = this.formData.newPassword;

  // Check individual requirements
  this.requirements.length = password.length >= 8;
  this.requirements.uppercase = /[A-Z]/.test(password);
  this.requirements.lowercase = /[a-z]/.test(password);
  this.requirements.number = /[0-9]/.test(password);

  // Calculate overall strength (0-6)
  let score = 0;
  // ... scoring logic

  // Map score to level (weak/fair/good/strong)
}
```

#### 2. Client-Side Validation
```javascript
// Before API call
if (!this.formData.oldPassword) {
  this.errors.oldpassword = 'Current password is required';
}
if (this.formData.newPassword !== this.formData.confirmPassword) {
  this.errors.newpassword1 = 'Passwords do not match';
}
```

#### 3. API Communication
```javascript
const response = await fetch('api/change_password.php', {
  method: 'POST',
  headers: { 'Content-Type': 'application/json' },
  body: JSON.stringify({ /* data */ })
});
```

## Backend Implementation (API)

### Security Flow

```
1. Check if user is logged in (require_login())
   └─> If not: Return 403 error

2. Verify user permissions
   └─> Check capability: moodle/user:changeownpassword
   └─> Check not logged in as another user
   └─> Check auth method allows password change

3. Validate old password
   └─> authenticate_user_login($username, $oldpassword)
   └─> If invalid: Return error

4. Validate new password
   └─> Check password policy
   └─> Check password reuse limit
   └─> Check length constraints

5. Update password
   └─> $userauth->user_update_password($USER, $newpassword)

6. Post-update actions
   └─> Add to password history
   └─> Destroy other sessions (if requested)
   └─> Revoke webservice tokens (if requested)
   └─> Reset login lockout
   └─> Clear forced password change flag
```

### Key API Functions

#### Authentication Check
```php
require_login();

if (!isloggedin() || isguestuser()) {
    // Redirect to login
}

if (\core\session\manager::is_loggedinas()) {
    // Error: Can't change password when logged in as
}
```

#### Password Policy Validation
```php
$errmsg = '';
if (!check_password_policy($newpassword1, $errmsg, $USER)) {
    $errors['newpassword1'] = $errmsg;
}
```

#### Password Reuse Check
```php
if (user_is_previously_used_password($USER->id, $newpassword1)) {
    $errors['newpassword1'] = 'Cannot reuse password';
}
```

#### Update Password
```php
$userauth = get_auth_plugin($USER->auth);

if (!$userauth->user_update_password($USER, $newpassword1)) {
    // Error: Failed to update
}

user_add_password_history($USER->id, $newpassword1);
```

#### Session Management
```php
// Log out other sessions
if ($logoutothersessions) {
    \core\session\manager::destroy_user_sessions(
        $USER->id,
        session_id()  // Keep current session
    );
}

// Revoke webservice tokens
if ($signoutofotherservices) {
    webservice::delete_user_ws_tokens($USER->id);
}
```

## Design System

### Color Palette

```css
/* Primary Gradient */
--primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);

/* Status Colors */
--success: #38a169;  /* Green */
--error: #e53e3e;    /* Red */
--warning: #d69e2e;  /* Yellow */
--info: #3182ce;     /* Blue */

/* Strength Levels */
--weak: #e53e3e;     /* Red */
--fair: #dd6b20;     /* Orange */
--good: #d69e2e;     /* Yellow */
--strong: #38a169;   /* Green */

/* Neutrals */
--gray-50: #f7fafc;
--gray-200: #e2e8f0;
--gray-500: #a0aec0;
--gray-700: #2d3748;
--gray-900: #1a202c;
```

### Typography

```css
/* Headings */
font-family: 'Plus Jakarta Sans', sans-serif;
font-weight: 700-900;

/* Body Text */
font-family: 'Inter', sans-serif;
font-weight: 400-600;
```

### Spacing Scale

```css
--space-xs: 4px;
--space-sm: 8px;
--space-md: 16px;
--space-lg: 24px;
--space-xl: 32px;
--space-2xl: 48px;
```

### Border Radius

```css
--radius-sm: 8px;   /* Small elements */
--radius-md: 12px;  /* Inputs, buttons */
--radius-lg: 20px;  /* Icons */
--radius-xl: 24px;  /* Cards */
```

## Customization Guide

### Change Color Scheme

**Edit view.php - Lines ~170-175:**
```css
.animated-bg {
    background: linear-gradient(135deg, #YOUR_COLOR_1 0%, #YOUR_COLOR_2 100%);
}

.btn-primary {
    background: linear-gradient(135deg, #YOUR_COLOR_1 0%, #YOUR_COLOR_2 100%);
}
```

### Modify Password Requirements

**Edit api/change_password.php - Lines ~88-100:**
```php
// Add custom requirement
if (strlen($newpassword1) < 12) {  // Changed from 8 to 12
    $errors['newpassword1'] = 'Password must be at least 12 characters';
}

// Add special character requirement
if (!preg_match('/[!@#$%^&*]/', $newpassword1)) {
    $errors['newpassword1'] = 'Password must contain a special character';
}
```

**Also update frontend - view.php JavaScript:**
```javascript
requirements: {
    length: password.length >= 12,  // Match backend
    uppercase: /[A-Z]/.test(password),
    lowercase: /[a-z]/.test(password),
    number: /[0-9]/.test(password),
    special: /[!@#$%^&*]/.test(password)  // Add this
}
```

### Change Strength Calculation

**Edit view.php - checkPasswordStrength() method:**
```javascript
checkPasswordStrength() {
    let score = 0;

    // Customize scoring
    if (password.length >= 8) score++;
    if (password.length >= 12) score++;   // Bonus for longer
    if (password.length >= 16) score++;   // Even more bonus
    if (/[A-Z]/.test(password)) score++;
    if (/[a-z]/.test(password)) score++;
    if (/[0-9]/.test(password)) score++;
    if (/[!@#$%^&*]/.test(password)) score++;

    // Adjust thresholds
    if (score <= 2) return { level: 'weak', ... };
    else if (score <= 4) return { level: 'fair', ... };
    else if (score <= 6) return { level: 'good', ... };
    else return { level: 'strong', ... };
}
```

### Disable Session Options

**To remove or hide logout options:**

**Edit view.php - HTML section (around line 2420):**
```html
<!-- Comment out or remove these sections -->
<!--
<div class="checkbox-group">
    <input type="checkbox" id="logoutOthers" v-model="formData.logoutOthers">
    ...
</div>
-->
```

**Edit view.php - Data section:**
```javascript
data() {
    return {
        formData: {
            // Set defaults to false if you want to keep backend logic
            logoutOthers: false,
            signoutServices: false
        }
    }
}
```

### Add Custom Validation Rules

**Frontend (view.php):**
```javascript
async handleSubmit() {
    // Add custom validation
    if (this.formData.newPassword.includes(this.formData.username)) {
        this.errors.newpassword1 = 'Password cannot contain username';
        return;
    }

    // Continue with API call...
}
```

**Backend (api/change_password.php):**
```php
// Add after existing validation
if (strpos(strtolower($newpassword1), strtolower($USER->username)) !== false) {
    $errors['newpassword1'] = 'Password cannot contain username';
}
```

### Modify Redirect Behavior

**Change redirect URL after success:**

**Edit view.php - handleSubmit method:**
```javascript
if (data.success) {
    this.successMessage = data.message;
    setTimeout(() => {
        // Change this URL
        window.location.href = '<?php echo $api_base_url; ?>/YOUR/CUSTOM/PATH';
    }, 2000);
}
```

### Add Email Notification

**Edit api/change_password.php - After successful password change:**
```php
// After user_add_password_history()
$messagehtml = "Your password was changed successfully at " . date('Y-m-d H:i:s');
$messagetext = strip_tags($messagehtml);

email_to_user(
    $USER,
    core_user::get_support_user(),
    'Password Changed',
    $messagetext,
    $messagehtml
);
```

### Integrate with External Password Policy

**Edit api/change_password.php:**
```php
// After standard Moodle validation
function custom_password_check($password) {
    // Call external API or custom logic
    $result = your_custom_validation($password);

    if (!$result['valid']) {
        return $result['message'];
    }
    return true;
}

$custom_check = custom_password_check($newpassword1);
if ($custom_check !== true) {
    $errors['newpassword1'] = $custom_check;
}
```

## Performance Optimization

### Reduce Bundle Size

1. **Use CDN for libraries** (already implemented)
2. **Minimize inline CSS** - Extract to separate file if needed
3. **Lazy load animations** - Defer non-critical animations

### Optimize API Response

**Edit api/change_password.php:**
```php
// Reduce response size
echo json_encode([
    'success' => true,
    'message' => 'Password changed'
    // Remove unnecessary user data if not needed
]);
```

### Add Caching Headers

**Create .htaccess in api/ folder:**
```apache
<FilesMatch "\.php$">
    Header set Cache-Control "no-cache, no-store, must-revalidate"
</FilesMatch>
```

## Testing

### Manual Testing Checklist

- [ ] Valid password change succeeds
- [ ] Wrong old password shows error
- [ ] Mismatched new passwords show error
- [ ] Password policy is enforced
- [ ] Password reuse is blocked
- [ ] Logout other sessions works
- [ ] Webservice token revocation works
- [ ] Success message displays
- [ ] Redirect works after success
- [ ] Mobile responsive design works
- [ ] Password visibility toggle works
- [ ] Strength indicator updates correctly
- [ ] Requirements checklist updates

### Automated Testing

**Example PHPUnit test:**
```php
public function test_password_change_api() {
    global $DB, $USER;

    $this->setUser($this->user);

    $postdata = [
        'oldpassword' => 'OldPass123',
        'newpassword1' => 'NewPass123',
        'newpassword2' => 'NewPass123'
    ];

    // Simulate API call
    $response = $this->call_password_api($postdata);

    $this->assertTrue($response['success']);

    // Verify password was updated
    $this->assertTrue(
        authenticate_user_login($USER->username, 'NewPass123')
    );
}
```

## Troubleshooting

### Common Development Issues

**Issue: API returns 404**
- Check file permissions on api/ directory
- Verify path to change_password.php is correct
- Check .htaccess isn't blocking access

**Issue: Validation not working**
- Check JavaScript console for errors
- Verify Vue.js is loading correctly
- Test with browser dev tools

**Issue: Password policy too strict**
- Edit Moodle password policy settings
- Site Administration > Security > Site policies
- Adjust minimum length, complexity requirements

**Issue: Session logout not working**
- Check Moodle session configuration
- Verify session storage is working
- Check browser cookie settings

## Security Best Practices

1. **Always use HTTPS** in production
2. **Rate limit API endpoint** to prevent brute force
3. **Log all password changes** for audit trail
4. **Validate on both client and server**
5. **Use strong password hashing** (Moodle default)
6. **Implement CSRF protection** (Moodle handles this)
7. **Sanitize all inputs** (implemented)
8. **Don't log passwords** in error messages

## Deployment

### Production Checklist

- [ ] Update API base URL to production
- [ ] Test all functionality on production
- [ ] Verify HTTPS is enforced
- [ ] Check error logging is configured
- [ ] Confirm email notifications work
- [ ] Test with different user roles
- [ ] Verify mobile responsiveness
- [ ] Check browser compatibility
- [ ] Review security settings
- [ ] Monitor performance

### Environment-Specific Configuration

**Development:**
```php
$api_base_url = 'https://dev.bheem.cloud';
```

**Staging:**
```php
$api_base_url = 'https://staging.bheem.cloud';
```

**Production:**
```php
$api_base_url = 'https://bheem.cloud';
```

## Support and Maintenance

### Updating the Component

1. Backup existing files
2. Update files with new versions
3. Clear Moodle cache
4. Test functionality
5. Monitor error logs

### Monitoring

Check these regularly:
- PHP error logs
- Moodle event logs
- Database performance
- API response times

---

**Version:** 1.0.0
**Last Updated:** October 16, 2025
**Maintainer:** Bheem Academy Development Team
