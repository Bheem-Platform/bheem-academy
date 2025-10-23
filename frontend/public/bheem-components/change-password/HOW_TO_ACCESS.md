# How to Access the Change Password Component

This guide explains different ways to access and use the modern Change Password component.

## Access Methods

### Method 1: Direct URL (Recommended)

Access the component directly using:

**Development:**
```
https://dev.bheem.cloud/edoo-components/change-password/view.php?id=USER_ID
```

**Production:**
```
https://bheem.cloud/edoo-components/change-password/view.php?id=USER_ID
```

Replace `USER_ID` with the actual user ID (e.g., `?id=1` for user ID 1).

### Method 2: From User Preferences

1. Log in to Moodle
2. Go to User Preferences:
   ```
   https://dev.bheem.cloud/user/preferences.php
   ```
3. Click on "Change password" link
4. This will take you to the modern password change interface

### Method 3: From User Menu

1. Log in to Moodle
2. Click on your profile picture/name in the top right
3. Select "Preferences"
4. Click on "Change password"

### Method 4: Direct Link from Anywhere

Add a link in your Moodle theme or custom page:
```html
<a href="/edoo-components/change-password/">Change Password</a>
```

## Prerequisites

Before accessing the component, ensure:

1. ✅ **Logged In:** You must be logged in to Moodle
2. ✅ **Permission:** Your account must have permission to change passwords
3. ✅ **Account Type:** Not logged in as another user (via "Login as")
4. ✅ **Auth Method:** Your authentication method must allow password changes

## URL Parameters

### Required Parameters

- `id` - User ID (will default to 0 if not provided)

### Examples

**For User ID 1:**
```
https://dev.bheem.cloud/edoo-components/change-password/view.php?id=1
```

**For User ID 123:**
```
https://dev.bheem.cloud/edoo-components/change-password/view.php?id=123
```

## Using the Component

Once you access the component:

### Step 1: Enter Current Password
- Type your current password in the first field
- Click the eye icon to show/hide password

### Step 2: Enter New Password
- Type your new password in the second field
- Watch the strength indicator update in real-time
- Ensure all password requirements are met (green checkmarks)

### Step 3: Confirm New Password
- Re-type your new password exactly as entered above
- Both passwords must match

### Step 4: Choose Session Options
- **Log out other sessions:** Check to log out from all other devices
- **Sign out of other services:** Check to revoke mobile app/API access

### Step 5: Submit
- Click "Change Password" button
- Wait for success message
- You'll be redirected to preferences page automatically

## Password Requirements

Your new password must meet these requirements:
- ✅ At least 8 characters long
- ✅ Contains at least one uppercase letter (A-Z)
- ✅ Contains at least one lowercase letter (a-z)
- ✅ Contains at least one number (0-9)
- 💡 Special characters recommended for stronger security

## Success Indicators

### Password Strength Meter
- 🔴 **Weak** - Password doesn't meet basic requirements
- 🟠 **Fair** - Password meets minimum requirements
- 🟡 **Good** - Password is reasonably secure
- 🟢 **Strong** - Password is very secure

### Visual Feedback
- Green checkmarks appear when requirements are met
- Strength bar fills up based on password complexity
- Success message displayed after successful change

## Troubleshooting

### "Current password is incorrect"
- Double-check your current password
- Make sure Caps Lock is off
- Try typing slowly to avoid mistakes

### "New passwords do not match"
- Ensure both new password fields are identical
- Check for extra spaces at the beginning or end

### "Password does not meet requirements"
- Review the requirements checklist
- Ensure all items show green checkmarks
- Try adding numbers and special characters

### "Cannot access the page" / Redirect to Login
- You need to be logged in first
- Go to: `https://dev.bheem.cloud/login/`
- Log in and try again

### "Password changes are not allowed"
- Your account type may not support password changes
- Contact your system administrator
- Some accounts use external authentication

## Integration with Existing Systems

### Replace Default Moodle Password Change

To redirect the default Moodle password change to this component:

**Option 1: Modify user preferences links**
Edit your Moodle theme to replace password change links.

**Option 2: Use URL rewrite**
Add to `.htaccess`:
```apache
RewriteRule ^login/change_password\.php$ /edoo-components/change-password/ [R=301,L]
```

**Option 3: Create a redirect page**
Replace `/login/change_password.php` content with:
```php
<?php
require('../config.php');
require_login();
$userid = optional_param('id', $USER->id, PARAM_INT);
redirect($CFG->wwwroot . '/edoo-components/change-password/view.php?id=' . $userid);
```

## API Integration

For developers wanting to integrate programmatically:

```javascript
// Example: Change password via API
const changePassword = async (oldPass, newPass) => {
  const response = await fetch('/edoo-components/change-password/api/change_password.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      oldpassword: oldPass,
      newpassword1: newPass,
      newpassword2: newPass,
      logoutothersessions: true,
      signoutofotherservices: true
    })
  });

  return await response.json();
};
```

## Mobile Access

The component is fully responsive and works on mobile devices:

1. Open your mobile browser
2. Go to: `https://dev.bheem.cloud/edoo-components/change-password/`
3. Log in if prompted
4. Use the same process as desktop

## Security Best Practices

When using this component:

1. 🔒 Always use HTTPS (never HTTP)
2. 🔒 Don't share your passwords with anyone
3. 🔒 Use a unique password not used elsewhere
4. 🔒 Enable "Log out other sessions" if you suspect unauthorized access
5. 🔒 Choose a password with high strength rating (green)
6. 🔒 Don't use personal information in passwords

## Support

If you encounter issues:

1. **Check browser console** for error messages
2. **Try different browser** to rule out browser-specific issues
3. **Clear cache and cookies** and try again
4. **Contact administrator** if problem persists

## Quick Reference Card

```
┌─────────────────────────────────────────────┐
│  CHANGE PASSWORD - QUICK ACCESS             │
├─────────────────────────────────────────────┤
│  URL: /edoo-components/change-password/     │
│  Login Required: Yes                         │
│  Min Password Length: 8 characters           │
│  Special Chars: Recommended                  │
│  Auto-logout Others: Optional (default: yes) │
└─────────────────────────────────────────────┘
```

## Testing the Component

To test if the component is working:

1. Log in to Moodle
2. Navigate to the component URL
3. You should see:
   - ✅ Modern purple gradient background
   - ✅ Floating animated shapes
   - ✅ Change Password form card
   - ✅ Password strength indicator
   - ✅ Requirements checklist

If any of these are missing, check:
- JavaScript is enabled in your browser
- No browser extensions blocking content
- Network connection is stable

## Developer Notes

### Testing Authentication
```bash
# Check if user is logged in
curl -b cookies.txt https://dev.bheem.cloud/edoo-components/change-password/api/change_password.php
```

### Viewing Logs
Check Moodle logs for password change events:
```
Site Administration > Reports > Logs
Filter: User (select user) > Action: Password change
```

---

**Last Updated:** October 16, 2025
**Component Version:** 1.0.0
