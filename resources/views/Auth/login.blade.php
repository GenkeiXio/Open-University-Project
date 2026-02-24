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
    <div class="login-bg-image"></div>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="#">
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" placeholder="Name">
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">
                <button type="button">Sign Up</button>
            </form>
        </div>

        <div class="form-container sign-in">
            <form method="POST" action="{{ route('Auth.login') }}">
                @csrf
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                </div>
                <span>Welcome to BU Open University</span>

                <input type="text" name="username" placeholder="Username or Email" required>
                <input type="password" name="password" placeholder="Password" required>

                <a href="#" class="forgot-pass">Forgot Your Password?</a>
                <button type="submit">Sign In</button>

                @if(session('error'))
                    <p class="error-msg">{{ session('error') }}</p>
                @endif
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, BUeño!</h1>
                    <p>Enter your personal details and start your distance learning journey with us</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('script/login.js') }}"></script>
</body>
</html>