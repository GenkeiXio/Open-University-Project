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

    <!-- MAIN -->
    <main>
        <div class="card">

            <h1 class="card-title">Sign in options</h1>
            <br>

            <!-- Alerts -->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-error">{{ session('error') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Faculty / Staff option — clicking reveals the form -->
            <div class="option-row" id="faculty-option" onclick="showForm()">
                <div class="option-icon orange">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="option-text">
                    <strong>Faculty, Staff &amp; Students</strong>
                    <span>Sign in using your Bicol University email account</span>
                </div>
            </div>

            <!-- Login form (revealed after clicking above) -->
            <div class="login-form" id="login-form">
                <form method="POST" action="/admin/login">
                    @csrf

                    <!-- Email -->
                    <div class="field">
                        <label for="txt_email">
                            Email <span class="required">*</span>
                        </label>
                        <input type="email" id="txt_email" name="txt_email" placeholder="yourname@bicol-u.edu.ph"
                            required>
                    </div>

                    <!-- Password with toggle -->
                    <div class="field">
                        <label for="txt_password">
                            Password <span class="required">*</span>
                        </label>
                        <div class="input-wrapper">
                            <input type="password" id="txt_password" name="txt_password"
                                placeholder="Enter your password" required>
                            <button type="button" class="toggle-pw" onclick="togglePassword('txt_password', this)"
                                tabindex="-1" aria-label="Show password">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit">Sign In</button>

                    <div style="text-align:right; margin-top:10px;">
                        <a href="#" style="font-size:12.5px; color:var(--blue); text-decoration:none;">
                            Forgot your password?
                        </a>
                    </div>
                </form>
            </div>

            <div class="divider">OR</div>

            <!-- Extra links -->
            <div class="extra-links">
                <a href="{{ route('register.show') }}" class="extra-link">
                    <i class="fa-solid fa-user-plus"></i>
                    Register here
                </a>
            </div>

            <p class="policy-note">
                By continuing, you agree to the Bicol University
                <a href="https://bicol-u.edu.ph/privacy-statement/" target="_blank">Privacy Policy</a>.
            </p>

        </div>
    </main>

    <a href="{{ route('home') }}" class="back-to-home" title="Back to Home">
        <i class="fa-solid fa-house"></i>
    </a>

    <script>
        function showForm() {
            const opt = document.getElementById('faculty-option');
            const form = document.getElementById('login-form');
            opt.style.borderColor = 'var(--blue)';
            opt.style.background = 'var(--row-hover)';
            form.classList.add('visible');
            form.querySelector('input').focus();
        }

        function togglePassword(fieldId, btn) {
            const input = document.getElementById(fieldId);
            const icon = btn.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }

        // Auto-show form if there are validation errors
        @if($errors->any() || session('error'))
            document.addEventListener('DOMContentLoaded', showForm);
        @endif
    </script>

</body>

</html>