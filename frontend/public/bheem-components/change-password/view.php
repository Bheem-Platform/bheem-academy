<?php
/**
 * Change Password Component - Modern Vue.js Implementation
 * Location: /bheem-components/change-password/view.php
 */

// Configuration for API endpoint
$api_base_url = 'https://dev.bheem.cloud';
$user_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password - Bheem Academy</title>

    <!-- Vue.js 3 -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Header Styles -->
    <link rel="stylesheet" href="https://dev.bheem.cloud/includes/bheem_header_styles.css">

<style>
    /* ============================================
       RESET & BASE STYLES
    ============================================ */

    /* Reset Moodle styles */
    body,
    #page,
    #page-wrapper,
    #page-content,
    #region-main-box,
    #region-main,
    .container-fluid,
    .row,
    [role="main"] {
        padding: 0 !important;
        margin: 0 !important;
        background: transparent !important;
        max-width: none !important;
        width: 100% !important;
    }

    /* Hide Moodle elements */
    .breadcrumb,
    .page-context-header,
    .page-header-headings,
    .secondary-navigation,
    .activityinstance,
    [data-block],
    .block,
    [data-region="drawer"],
    .drawer {
        display: none !important;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        color: #1a202c;
        line-height: 1.6;
    }

    /* ============================================
       ANIMATED BACKGROUND
    ============================================ */

    .animated-bg {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
        overflow: hidden;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .animated-bg::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
        background-size: 50px 50px;
        animation: moveBackground 20s linear infinite;
    }

    @keyframes moveBackground {
        0% { transform: translate(0, 0); }
        100% { transform: translate(50px, 50px); }
    }

    .floating-shapes {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .shape {
        position: absolute;
        opacity: 0.1;
        animation: float 20s infinite ease-in-out;
    }

    .shape:nth-child(1) {
        top: 10%;
        left: 10%;
        width: 80px;
        height: 80px;
        background: linear-gradient(45deg, #f093fb, #f5576c);
        border-radius: 50%;
        animation-delay: 0s;
    }

    .shape:nth-child(2) {
        top: 60%;
        left: 80%;
        width: 120px;
        height: 120px;
        background: linear-gradient(45deg, #4facfe, #00f2fe);
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        animation-delay: 2s;
    }

    .shape:nth-child(3) {
        top: 80%;
        left: 20%;
        width: 100px;
        height: 100px;
        background: linear-gradient(45deg, #fa709a, #fee140);
        border-radius: 50%;
        animation-delay: 4s;
    }

    @keyframes float {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        25% { transform: translate(20px, -20px) rotate(90deg); }
        50% { transform: translate(-10px, 10px) rotate(180deg); }
        75% { transform: translate(10px, 20px) rotate(270deg); }
    }

    /* ============================================
       CONTAINER & LAYOUT
    ============================================ */

    #app {
        position: relative;
        z-index: 1;
        min-height: 100vh;
        padding: 40px 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .change-password-container {
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
    }

    /* ============================================
       CARD DESIGN
    ============================================ */

    .password-card {
        background: rgba(255, 255, 255, 0.98);
        border-radius: 24px;
        padding: 50px 40px;
        box-shadow:
            0 20px 60px rgba(0, 0, 0, 0.15),
            0 0 0 1px rgba(255, 255, 255, 0.5) inset;
        backdrop-filter: blur(10px);
        animation: slideUp 0.6s ease-out;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ============================================
       HEADER
    ============================================ */

    .card-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .icon-wrapper {
        width: 80px;
        height: 80px;
        margin: 0 auto 20px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    .icon-wrapper i {
        font-size: 36px;
        color: white;
    }

    .card-header h1 {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 32px;
        font-weight: 800;
        color: #1a202c;
        margin-bottom: 10px;
    }

    .card-header p {
        font-size: 16px;
        color: #718096;
        font-weight: 400;
    }

    /* ============================================
       FORM STYLES
    ============================================ */

    .password-form {
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    .form-group {
        position: relative;
    }

    .form-group label {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 8px;
    }

    .password-input-wrapper {
        position: relative;
    }

    .form-group input {
        width: 100%;
        padding: 16px 50px 16px 20px;
        font-size: 15px;
        font-family: 'Inter', sans-serif;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        background: #f7fafc;
        transition: all 0.3s ease;
        outline: none;
    }

    .form-group input:focus {
        border-color: #667eea;
        background: white;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .form-group input.error {
        border-color: #fc8181;
        background: #fff5f5;
    }

    .toggle-password {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #a0aec0;
        cursor: pointer;
        font-size: 18px;
        transition: color 0.3s ease;
        padding: 8px;
    }

    .toggle-password:hover {
        color: #667eea;
    }

    .error-message {
        display: block;
        color: #e53e3e;
        font-size: 13px;
        margin-top: 6px;
        animation: shake 0.3s ease;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }

    /* ============================================
       CHECKBOX STYLES
    ============================================ */

    .checkbox-group {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 16px;
        background: #f7fafc;
        border-radius: 12px;
        transition: background 0.3s ease;
    }

    .checkbox-group:hover {
        background: #edf2f7;
    }

    .checkbox-group input[type="checkbox"] {
        width: 20px;
        height: 20px;
        margin-top: 2px;
        cursor: pointer;
        accent-color: #667eea;
    }

    .checkbox-label {
        flex: 1;
        cursor: pointer;
        user-select: none;
    }

    .checkbox-label .label-text {
        font-size: 14px;
        font-weight: 500;
        color: #2d3748;
        display: block;
        margin-bottom: 4px;
    }

    .checkbox-label .label-description {
        font-size: 13px;
        color: #718096;
        line-height: 1.4;
    }

    /* ============================================
       BUTTON STYLES
    ============================================ */

    .form-actions {
        display: flex;
        gap: 12px;
        margin-top: 12px;
    }

    .btn {
        flex: 1;
        padding: 16px 32px;
        font-size: 16px;
        font-weight: 600;
        font-family: 'Inter', sans-serif;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    }

    .btn-primary:hover:not(:disabled) {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5);
    }

    .btn-primary:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }

    .btn-secondary {
        background: white;
        color: #4a5568;
        border: 2px solid #e2e8f0;
    }

    .btn-secondary:hover {
        background: #f7fafc;
        border-color: #cbd5e0;
    }

    .btn .spinner {
        width: 18px;
        height: 18px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-top-color: white;
        border-radius: 50%;
        animation: spin 0.6s linear infinite;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    /* ============================================
       ALERTS
    ============================================ */

    .alert {
        padding: 16px 20px;
        border-radius: 12px;
        margin-bottom: 24px;
        display: flex;
        align-items: flex-start;
        gap: 12px;
        animation: slideDown 0.4s ease-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .alert-success {
        background: #f0fdf4;
        border: 2px solid #86efac;
        color: #166534;
    }

    .alert-error {
        background: #fef2f2;
        border: 2px solid #fca5a5;
        color: #991b1b;
    }

    .alert i {
        font-size: 20px;
        margin-top: 2px;
    }

    .alert-content {
        flex: 1;
    }

    .alert-content strong {
        display: block;
        font-weight: 700;
        margin-bottom: 4px;
    }

    /* ============================================
       PASSWORD STRENGTH INDICATOR
    ============================================ */

    .password-strength {
        margin-top: 12px;
    }

    .strength-label {
        font-size: 13px;
        color: #718096;
        margin-bottom: 6px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .strength-text {
        font-weight: 600;
    }

    .strength-text.weak { color: #e53e3e; }
    .strength-text.fair { color: #dd6b20; }
    .strength-text.good { color: #d69e2e; }
    .strength-text.strong { color: #38a169; }

    .strength-bar {
        height: 6px;
        background: #e2e8f0;
        border-radius: 3px;
        overflow: hidden;
    }

    .strength-progress {
        height: 100%;
        transition: all 0.3s ease;
        border-radius: 3px;
    }

    .strength-progress.weak {
        width: 25%;
        background: linear-gradient(90deg, #fc8181, #e53e3e);
    }

    .strength-progress.fair {
        width: 50%;
        background: linear-gradient(90deg, #f6ad55, #dd6b20);
    }

    .strength-progress.good {
        width: 75%;
        background: linear-gradient(90deg, #f6e05e, #d69e2e);
    }

    .strength-progress.strong {
        width: 100%;
        background: linear-gradient(90deg, #68d391, #38a169);
    }

    /* ============================================
       PASSWORD REQUIREMENTS
    ============================================ */

    .password-requirements {
        background: #f7fafc;
        border-radius: 12px;
        padding: 16px;
        margin-top: 12px;
    }

    .requirements-title {
        font-size: 13px;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 10px;
    }

    .requirement-item {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: #718096;
        margin-bottom: 6px;
    }

    .requirement-item:last-child {
        margin-bottom: 0;
    }

    .requirement-item i {
        font-size: 12px;
        width: 16px;
    }

    .requirement-item.met {
        color: #38a169;
    }

    .requirement-item.met i {
        color: #38a169;
    }

    /* ============================================
       BACK LINK
    ============================================ */

    .back-link {
        text-align: center;
        margin-top: 24px;
    }

    .back-link a {
        color: #667eea;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.3s ease;
    }

    .back-link a:hover {
        color: #764ba2;
        gap: 10px;
    }

    /* ============================================
       RESPONSIVE DESIGN
    ============================================ */

    @media (max-width: 768px) {
        .password-card {
            padding: 40px 24px;
        }

        .card-header h1 {
            font-size: 28px;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn {
            width: 100%;
        }
    }

    @media (max-width: 480px) {
        #app {
            padding: 20px 15px;
        }

        .password-card {
            padding: 30px 20px;
        }

        .card-header h1 {
            font-size: 24px;
        }

        .icon-wrapper {
            width: 60px;
            height: 60px;
        }

        .icon-wrapper i {
            font-size: 28px;
        }
    }
</style>
</head>
<body>

<?php
    $header_content = @file_get_contents('https://dev.bheem.cloud/includes/bheem_header.php');
    if ($header_content !== false) {
        echo $header_content;
    }
?>

<div id="app">
    <!-- Animated Background -->
    <div class="animated-bg">
        <div class="floating-shapes">
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
    </div>

    <div class="change-password-container">
        <div class="password-card">
            <!-- Header -->
            <div class="card-header">
                <div class="icon-wrapper">
                    <i class="fas fa-key"></i>
                </div>
                <h1>Change Password</h1>
                <p>Keep your account secure with a strong password</p>
            </div>

            <!-- Success Alert -->
            <div v-if="successMessage" class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                <div class="alert-content">
                    <strong>Success!</strong>
                    {{ successMessage }}
                </div>
            </div>

            <!-- Error Alert -->
            <div v-if="generalError" class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i>
                <div class="alert-content">
                    <strong>Error</strong>
                    {{ generalError }}
                </div>
            </div>

            <!-- Password Change Form -->
            <form @submit.prevent="handleSubmit" class="password-form" v-if="!successMessage">
                <!-- Current Password -->
                <div class="form-group">
                    <label for="oldPassword">Current Password</label>
                    <div class="password-input-wrapper">
                        <input
                            :type="showOldPassword ? 'text' : 'password'"
                            id="oldPassword"
                            v-model="formData.oldPassword"
                            :class="{ error: errors.oldpassword }"
                            placeholder="Enter your current password"
                            autocomplete="current-password"
                        >
                        <button
                            type="button"
                            class="toggle-password"
                            @click="showOldPassword = !showOldPassword"
                            :aria-label="showOldPassword ? 'Hide password' : 'Show password'"
                        >
                            <i :class="showOldPassword ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                        </button>
                    </div>
                    <span v-if="errors.oldpassword" class="error-message">
                        <i class="fas fa-exclamation-circle"></i> {{ errors.oldpassword }}
                    </span>
                </div>

                <!-- New Password -->
                <div class="form-group">
                    <label for="newPassword">New Password</label>
                    <div class="password-input-wrapper">
                        <input
                            :type="showNewPassword ? 'text' : 'password'"
                            id="newPassword"
                            v-model="formData.newPassword"
                            :class="{ error: errors.newpassword1 }"
                            placeholder="Enter your new password"
                            autocomplete="new-password"
                            @input="checkPasswordStrength"
                        >
                        <button
                            type="button"
                            class="toggle-password"
                            @click="showNewPassword = !showNewPassword"
                            :aria-label="showNewPassword ? 'Hide password' : 'Show password'"
                        >
                            <i :class="showNewPassword ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                        </button>
                    </div>
                    <span v-if="errors.newpassword1" class="error-message">
                        <i class="fas fa-exclamation-circle"></i> {{ errors.newpassword1 }}
                    </span>

                    <!-- Password Strength Indicator -->
                    <div v-if="formData.newPassword" class="password-strength">
                        <div class="strength-label">
                            <span>Password Strength:</span>
                            <span class="strength-text" :class="passwordStrength.level">
                                {{ passwordStrength.text }}
                            </span>
                        </div>
                        <div class="strength-bar">
                            <div class="strength-progress" :class="passwordStrength.level"></div>
                        </div>
                    </div>

                    <!-- Password Requirements -->
                    <div class="password-requirements">
                        <div class="requirements-title">Password must contain:</div>
                        <div class="requirement-item" :class="{ met: requirements.length }">
                            <i :class="requirements.length ? 'fas fa-check-circle' : 'far fa-circle'"></i>
                            At least 8 characters
                        </div>
                        <div class="requirement-item" :class="{ met: requirements.uppercase }">
                            <i :class="requirements.uppercase ? 'fas fa-check-circle' : 'far fa-circle'"></i>
                            One uppercase letter
                        </div>
                        <div class="requirement-item" :class="{ met: requirements.lowercase }">
                            <i :class="requirements.lowercase ? 'fas fa-check-circle' : 'far fa-circle'"></i>
                            One lowercase letter
                        </div>
                        <div class="requirement-item" :class="{ met: requirements.number }">
                            <i :class="requirements.number ? 'fas fa-check-circle' : 'far fa-circle'"></i>
                            One number
                        </div>
                    </div>
                </div>

                <!-- Confirm New Password -->
                <div class="form-group">
                    <label for="confirmPassword">Confirm New Password</label>
                    <div class="password-input-wrapper">
                        <input
                            :type="showConfirmPassword ? 'text' : 'password'"
                            id="confirmPassword"
                            v-model="formData.confirmPassword"
                            :class="{ error: errors.newpassword2 }"
                            placeholder="Confirm your new password"
                            autocomplete="new-password"
                        >
                        <button
                            type="button"
                            class="toggle-password"
                            @click="showConfirmPassword = !showConfirmPassword"
                            :aria-label="showConfirmPassword ? 'Hide password' : 'Show password'"
                        >
                            <i :class="showConfirmPassword ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                        </button>
                    </div>
                    <span v-if="errors.newpassword2" class="error-message">
                        <i class="fas fa-exclamation-circle"></i> {{ errors.newpassword2 }}
                    </span>
                </div>

                <!-- Logout Options -->
                <div class="checkbox-group">
                    <input
                        type="checkbox"
                        id="logoutOthers"
                        v-model="formData.logoutOthers"
                    >
                    <label for="logoutOthers" class="checkbox-label">
                        <span class="label-text">Log out other sessions</span>
                        <span class="label-description">
                            You will be logged out from all other devices and browsers
                        </span>
                    </label>
                </div>

                <div class="checkbox-group">
                    <input
                        type="checkbox"
                        id="signoutServices"
                        v-model="formData.signoutServices"
                    >
                    <label for="signoutServices" class="checkbox-label">
                        <span class="label-text">Sign out of other services</span>
                        <span class="label-description">
                            Revoke access tokens from mobile apps and external services
                        </span>
                    </label>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" @click="handleCancel">
                        <i class="fas fa-times"></i>
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary" :disabled="isSubmitting">
                        <span v-if="isSubmitting" class="spinner"></span>
                        <i v-else class="fas fa-check"></i>
                        {{ isSubmitting ? 'Changing Password...' : 'Change Password' }}
                    </button>
                </div>
            </form>

            <!-- Success Actions -->
            <div v-if="successMessage" class="form-actions">
                <button type="button" class="btn btn-primary" @click="redirectToPreferences">
                    <i class="fas fa-arrow-left"></i>
                    Back to Preferences
                </button>
            </div>

            <!-- Back Link -->
            <div class="back-link" v-if="!successMessage">
                <a href="<?php echo $api_base_url; ?>/user/preferences.php">
                    <i class="fas fa-arrow-left"></i>
                    Back to User Preferences
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    const { createApp } = Vue;

    createApp({
        data() {
            return {
                formData: {
                    oldPassword: '',
                    newPassword: '',
                    confirmPassword: '',
                    logoutOthers: true,
                    signoutServices: true
                },
                showOldPassword: false,
                showNewPassword: false,
                showConfirmPassword: false,
                errors: {},
                generalError: '',
                successMessage: '',
                isSubmitting: false,
                passwordStrength: {
                    level: 'weak',
                    text: 'Weak',
                    score: 0
                },
                requirements: {
                    length: false,
                    uppercase: false,
                    lowercase: false,
                    number: false
                }
            };
        },
        methods: {
            checkPasswordStrength() {
                const password = this.formData.newPassword;

                // Check requirements
                this.requirements.length = password.length >= 8;
                this.requirements.uppercase = /[A-Z]/.test(password);
                this.requirements.lowercase = /[a-z]/.test(password);
                this.requirements.number = /[0-9]/.test(password);

                // Calculate strength
                let score = 0;
                if (this.requirements.length) score++;
                if (this.requirements.uppercase) score++;
                if (this.requirements.lowercase) score++;
                if (this.requirements.number) score++;
                if (password.length >= 12) score++;
                if (/[^A-Za-z0-9]/.test(password)) score++;

                // Set strength level
                if (score <= 2) {
                    this.passwordStrength = { level: 'weak', text: 'Weak', score };
                } else if (score <= 3) {
                    this.passwordStrength = { level: 'fair', text: 'Fair', score };
                } else if (score <= 4) {
                    this.passwordStrength = { level: 'good', text: 'Good', score };
                } else {
                    this.passwordStrength = { level: 'strong', text: 'Strong', score };
                }
            },
            async handleSubmit() {
                // Reset errors
                this.errors = {};
                this.generalError = '';

                // Client-side validation
                if (!this.formData.oldPassword) {
                    this.errors.oldpassword = 'Current password is required';
                }
                if (!this.formData.newPassword) {
                    this.errors.newpassword1 = 'New password is required';
                }
                if (!this.formData.confirmPassword) {
                    this.errors.newpassword2 = 'Password confirmation is required';
                }
                if (this.formData.newPassword !== this.formData.confirmPassword) {
                    this.errors.newpassword1 = 'New passwords do not match';
                    this.errors.newpassword2 = 'New passwords do not match';
                }
                if (this.formData.oldPassword === this.formData.newPassword) {
                    this.errors.newpassword1 = 'New password must be different';
                }

                if (Object.keys(this.errors).length > 0) {
                    return;
                }

                this.isSubmitting = true;

                try {
                    const response = await fetch('api/change_password.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            oldpassword: this.formData.oldPassword,
                            newpassword1: this.formData.newPassword,
                            newpassword2: this.formData.confirmPassword,
                            logoutothersessions: this.formData.logoutOthers,
                            signoutofotherservices: this.formData.signoutServices
                        })
                    });

                    const data = await response.json();

                    if (data.success) {
                        this.successMessage = data.message;
                        // Redirect after 2 seconds
                        setTimeout(() => {
                            this.redirectToPreferences();
                        }, 2000);
                    } else {
                        if (data.errors) {
                            this.errors = data.errors;
                        } else {
                            this.generalError = data.error || 'An error occurred';
                        }
                    }
                } catch (error) {
                    console.error('Error:', error);
                    this.generalError = 'Network error. Please try again.';
                } finally {
                    this.isSubmitting = false;
                }
            },
            handleCancel() {
                this.redirectToPreferences();
            },
            redirectToPreferences() {
                window.location.href = '<?php echo $api_base_url; ?>/user/preferences.php?userid=<?php echo $user_id; ?>';
            }
        }
    }).mount('#app');
</script>

<!-- Professional Footer (from bheem.cloud) -->
<?php
    $footer_content = @file_get_contents('https://dev.bheem.cloud/includes/bheem_footer.php');
    if ($footer_content !== false) {
        echo $footer_content;
    }
?>

</body>
</html>
