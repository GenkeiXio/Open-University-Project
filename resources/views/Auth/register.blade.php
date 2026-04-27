<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | BU Open University</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <a href="{{ route('home') }}" class="back-to-home">
        <i class="fa-solid fa-house"></i>
    </a>

    <div class="login-bg-image"></div>

    <div class="container">
        <div class="form-container">

            <form method="POST" action="/register">
                @csrf

                <h1>Create Account</h1>

                <!-- ERROR -->
                @if(session('error'))
                    <div class="error-msg">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- VALIDATION -->
                @if ($errors->any())
                    <div class="error-msg">
                        <ul style="padding-left:15px;">
                            @foreach ($errors->all() as $error)
                                <li style="font-size:13px;">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <span style="color:#555; margin-bottom:15px;">
                    Use your @bicol-u.edu.ph email
                </span>

                <input type="text" name="txt_fname" placeholder="First Name" required>
                <!-- <input type="text" name="txt_minitial" placeholder="Middle Initial"> -->
                <input type="text" name="txt_lname" placeholder="Last Name" required>
                <!-- <input type="text" name="txt_extension" placeholder="Extension"> -->

                <input type="email" name="txt_email" placeholder="Email" required>
                <input type="password" name="txt_password" placeholder="Password" required>
                <input type="password" name="txt_password_confirmation" placeholder="Confirm Password" required>

                <button type="submit">REGISTER</button>

                <!-- 🔁 GO TO LOGIN -->
                <p style="margin-top:15px; font-size:13px;">
                    Already have an account?
                    <a href="{{ route('Auth.login') }}" style="color:#ea6a0e; font-weight:600;">
                        Sign in here
                    </a>
                </p>

            </form>

        </div>
    </div>
</body>
</html>