<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bheem Academy</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/includes/bheem_header_styles.css">
    <style>
        body { margin: 0; padding: 0; font-family: 'Inter', sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .login-container { background: white; padding: 40px; border-radius: 16px; box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1); max-width: 400px; width: 90%; }
        .login-container h1 { margin: 0 0 10px; color: #1e293b; font-size: 2rem; }
        .login-container p { color: #64748b; margin-bottom: 30px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; color: #1e293b; font-weight: 500; }
        .form-group input { width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 1rem; box-sizing: border-box; }
        .form-group input:focus { outline: none; border-color: #8b5cf6; }
        .btn-login { width: 100%; padding: 12px; background: linear-gradient(135deg, #8b5cf6, #ec4899); color: white; border: none; border-radius: 8px; font-size: 1rem; font-weight: 600; cursor: pointer; }
        .btn-login:hover { opacity: 0.9; }
        .links { text-align: center; margin-top: 20px; }
        .links a { color: #8b5cf6; text-decoration: none; }
        .logo { text-align: center; margin-bottom: 30px; }
        .logo img { height: 50px; }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <img src="/theme/bheem/pix/logo.png" alt="Bheem Academy">
        </div>
        <h1>Welcome Back</h1>
        <p>Sign in to continue your learning journey</p>
        <form action="/login/process.php" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn-login">Sign In</button>
        </form>
        <div class="links">
            <a href="/password-reset.php">Forgot Password?</a> •
            <a href="/signup.php">Create Account</a>
        </div>
        <div class="links" style="margin-top: 30px;">
            <a href="/">← Return to Homepage</a>
        </div>
    </div>
</body>
</html>
