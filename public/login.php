<?php
/**
 * Bheem Academy Login Page
 * Simple login redirect to Moodle
 */

// Get user type from URL parameter
$user_type = isset($_GET['user']) ? $_GET['user'] : 'student';

// In a production environment, this would authenticate against Moodle
// For now, create a simple login page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <title>Log in to the site | Bheem Academy</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, system-ui, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            max-width: 450px;
            width: 100%;
            padding: 3rem;
        }

        .logo {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo img {
            max-width: 200px;
            height: auto;
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.5rem;
        }

        .login-header p {
            color: #718096;
            font-size: 1rem;
        }

        .user-type-badge {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            color: #2d3748;
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }

        .form-group input {
            width: 100%;
            padding: 0.875rem;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .btn-login {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .back-link {
            text-align: center;
            margin-top: 1.5rem;
        }

        .back-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .back-link a:hover {
            color: #5568d3;
        }

        .info-message {
            background: #e0e7ff;
            border-left: 4px solid #667eea;
            padding: 1rem;
            border-radius: 8px;
            margin-top: 2rem;
            font-size: 0.875rem;
            color: #4c51bf;
        }

        .info-message strong {
            display: block;
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body data-user-type="<?php echo htmlspecialchars($user_type); ?>">

<div class="login-container">
    <div class="logo">
        <img src="https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/26637bef-052f-4eec-f6f8-a44a2d6fbf00/public" alt="Bheem Academy">
    </div>

    <div class="login-header">
        <h1>Welcome Back</h1>
        <p>Sign in to continue your learning journey</p>
    </div>

    <div style="text-align: center;">
        <span class="user-type-badge">
            <i class="fas fa-user"></i> <?php echo ucfirst(htmlspecialchars($user_type)); ?> Login
        </span>
    </div>

    <form method="POST" action="/login/index.php">
        <div class="form-group">
            <label for="username">
                <i class="fas fa-envelope"></i> Username or Email
            </label>
            <input type="text" id="username" name="username" required autocomplete="username" placeholder="Enter your username">
        </div>

        <div class="form-group">
            <label for="password">
                <i class="fas fa-lock"></i> Password
            </label>
            <input type="password" id="password" name="password" required autocomplete="current-password" placeholder="Enter your password">
        </div>

        <button type="submit" class="btn-login">
            <i class="fas fa-sign-in-alt"></i> Sign In
        </button>
    </form>

    <div class="info-message">
        <strong><i class="fas fa-info-circle"></i> Note:</strong>
        This is a development environment. Login functionality requires connection to the Moodle backend.
    </div>

    <div class="back-link">
        <a href="/">
            <i class="fas fa-arrow-left"></i> Back to Homepage
        </a>
    </div>
</div>

</body>
</html>
