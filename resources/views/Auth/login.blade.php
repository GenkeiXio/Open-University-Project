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
            <form method="POST" action="/admin/login">
                @csrf
                <h1>Sign In</h1>

                <!-- ✅ SUCCESS MESSAGE (FROM REGISTER) -->
                @if(session('success'))
                    <div class="success-msg" style="color: green; margin-bottom: 10px;">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- ✅ ERROR MESSAGE -->
                @if(session('error'))
                    <div class="error-msg" style="color: red; margin-bottom: 10px;">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- ✅ VALIDATION ERRORS (OPTIONAL BUT GOOD) -->
                @if ($errors->any())
                    <div class="error-msg" style="color: red; margin-bottom: 10px;">
                        <ul style="padding-left: 15px;">
                            @foreach ($errors->all() as $error)
                                <li style="font-size: 13px;">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                </div>

                <span style="color: #555; margin-bottom: 15px;">
                    Welcome to BU Open University
                </span>

                <input type="email" name="txt_email" placeholder="Email" required>
                <input type="password" name="txt_password" placeholder="Password" required>
                
                <button type="submit">SIGN IN</button>

                <a href="#" class="forgot-pass" style="text-decoration: none; font-size: 13px; color: #6f42c1; margin-top: 10px;">
                    Forgot Your Password?
                </a>
                
                <p style="margin-top:15px; font-size:13px;">
                    Don't have an account?
                    <a href="{{ route('register.show') }}" style="color:#ea6a0e; font-weight:600;">
                        Register here
                    </a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>