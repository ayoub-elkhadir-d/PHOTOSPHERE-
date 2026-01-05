<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join FOCUS. | Login & Signup</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
  /* 1. المتغيرات (نفس لوحة الألوان السابقة) */
:root {
    --primary-bg: #121212;
    --card-bg: #1c1c1c;
    --accent-color: #d4af37; /* Gold */
    --text-main: #ffffff;
    --text-muted: #a0a0a0;
    --input-bg: #252525;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
}

body {
    background-color: var(--primary-bg);
    color: var(--text-main);
    background-image: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)), url('https://images.unsplash.com/photo-1492691527719-9d1e07e534b4?auto=format&fit=crop&w=1920&q=80');
    background-size: cover;
    background-position: center;
    height: 100vh;
    display: flex;
    flex-direction: column;
}

/* 2. Navbar */
nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.5rem 5%;
    background: transparent;
    position: absolute;
    top: 0;
    width: 100%;
    z-index: 10;
}

.logo {
    font-size: 1.5rem;
    font-weight: 600;
    letter-spacing: 2px;
    color: var(--text-main);
    text-transform: uppercase;
    border: 2px solid var(--text-main);
    padding: 5px 15px;
    text-decoration: none;
}

.back-link {
    color: var(--text-muted);
    text-decoration: none;
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: 0.3s;
}

.back-link:hover {
    color: var(--accent-color);
}

/* 3. Container */
.auth-container {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

.wrapper {
    position: relative;
    width: 100%;
    max-width: 450px;
    background: var(--card-bg);
    box-shadow: 0 15px 35px rgba(0,0,0,0.5);
    overflow: hidden;
    border-radius: 2px;
    border: 1px solid rgba(255, 255, 255, 0.05);
    animation: slideUp 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

/* 4. Slide tabs */
.slide-controls {
    position: relative;
    display: flex;
    height: 50px;
    width: 100%;
    overflow: hidden;
    border-bottom: 1px solid rgba(255,255,255,0.1);
}

.slide-controls .slide {
    height: 100%;
    width: 50%;
    color: #fff;
    font-size: 0.9rem;
    font-weight: 500;
    text-align: center;
    line-height: 50px;
    cursor: pointer;
    transition: all 0.6s ease;
    text-transform: uppercase;
    letter-spacing: 1px;
    z-index: 1;
}

.slide-tab {
    position: absolute;
    height: 100%;
    width: 50%;
    left: 0;
    background: linear-gradient(90deg, transparent, rgba(212, 175, 55, 0.1), transparent);
    border-bottom: 2px solid var(--accent-color);
    transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

input[type="radio"] {
    display: none;
}

#signup:checked ~ .slide-tab {
    left: 50%;
}

#signup:checked ~ .signup-label {
    color: var(--accent-color);
}

#login:checked ~ .login-label {
    color: var(--accent-color);
}

/* 5. Forms */
.form-inner {
    display: flex;
    width: 200%;
}

.form-inner form {
    width: 50%;
    padding: 40px;
    transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

#signup:checked ~ .form-inner {
    margin-left: -100%;
}

.field {
    height: 50px;
    width: 100%;
    margin-top: 25px;
    position: relative;
}

.field input {
    height: 100%;
    width: 100%;
    outline: none;
    padding-left: 10px;
    font-size: 0.9rem;
    background: transparent;
    border: none;
    border-bottom: 1px solid #444;
    color: #fff;
    transition: all 0.3s ease;
}

.field input:focus {
    border-bottom-color: var(--accent-color);
}

.field input::placeholder {
    color: #666;
    text-transform: uppercase;
    font-size: 0.75rem;
    letter-spacing: 1px;
}

/* ⭐  الزر بعد الإصلاح ⭐ */
.btn-layer {
    display: inline-block;
    width: auto;
    height: auto;
    padding: 14px 20px;
    background: var(--accent-color);
    margin-top: 35px;
    cursor: pointer;
    border-radius: 3px;
    transition: 0.3s ease;
}

.btn-layer input[type="submit"] {
    width: auto;
    height: auto;
    background: transparent;
    border: none;
    color: #000;
    font-size: 0.9rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 2px;
    cursor: pointer;
}

.btn-layer:hover {
    background: #fff;
    box-shadow: 0 0 15px rgba(255, 255, 255, 0.2);
}

/* Forgot password */
.pass-link {
    margin-top: 15px;
    text-align: left;
}

.pass-link a {
    color: var(--text-muted);
    text-decoration: none;
    font-size: 0.75rem;
    transition: 0.3s;
}

.pass-link a:hover {
    color: var(--accent-color);
    text-decoration: underline;
}

.form-title {
    text-align: center;
    font-size: 1.5rem;
    font-weight: 300;
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 3px;
}

/* Animation */
@keyframes slideUp {
    from { opacity: 0; transform: translateY(50px); }
    to { opacity: 1; transform: translateY(0); }
}
    </style>
</head>
<body>

    <nav>
        <a href="index.html" class="logo">FOCUS.</a>
        <a href="index.html" class="back-link">&larr; Back to Portfolio</a>
    </nav>

    <div class="auth-container">
        <div class="wrapper">
            
            <input type="radio" name="slide" id="login" checked>
            <input type="radio" name="slide" id="signup">

            <div class="slide-controls">
                <label for="login" class="slide login-label">Login</label>
                <label for="signup" class="slide signup-label">Sign Up</label>
                <div class="slide-tab"></div>
            </div>

            <div class="form-inner">
                
                <form action="#" class="login">
                    <h2 class="form-title">Welcome Back</h2>
                    <div class="field">
                        <input type="email" placeholder="Email Address" required>
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Password" required>
                    </div>
                    <div class="pass-link">
                        <a href="#">Forgot password?</a>
                    </div>
                    <div class="field btn-layer">
                        <input type="submit" value="Login">
                    </div>
                </form>

                <form action="#" class="signup">
                    <h2 class="form-title">Join The Club</h2>
                    <div class="field">
                        <input type="text" placeholder="Full Name" required>
                    </div>
                    <div class="field">
                        <input type="email" placeholder="Email Address" required>
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Password" required>
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Confirm Password" required>
                    </div>
                    <div class="field btn-layer">
                        <input type="submit" value="Create Account">
                    </div>
                </form>
                
            </div>
        </div>
    </div>

</body>
</html>