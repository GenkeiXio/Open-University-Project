<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | BU Open University</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <a href="{{ route('home') }}" class="back-to-home">
        <i class="fa-solid fa-house"></i>
    </a>
    
    <div class="login-bg-image"></div>

    <div class="container" id="container">
        <div class="form-container sign-in">
            <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                </div>
                <span style="color: #555; margin-bottom: 15px;">Welcome to BU Open University</span>

                <input type="text" name="username" placeholder="Username or Email" required>
                <input type="password" name="password" placeholder="Password" required>

                <a href="#" class="forgot-pass" style="text-decoration: none; font-size: 13px; color: #6f42c1; margin-top: 10px;">Forgot Your Password?</a>
                
                <button type="submit">SIGN IN</button>

                @if(session('error'))
                    <div class="error-msg">
                        {{ session('error') }}
                    </div>
                @endif
            </form>
        </div>
    </div>
</body>
</html>