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

    <!-- MAIN -->
    <main>
        <div class="card">

            <h1 class="card-title">Create Account</h1>
            <p class="card-sub">Register with your official university email</p>

            <!-- Alerts -->
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

            <!-- Role Toggle -->
            <div class="role-toggle">
                <button type="button" id="btn-faculty" class="role-btn active"
                        onclick="switchRole('faculty')">
                    <i class="fa-solid fa-user"></i> Faculty / Staff
                </button>
                <button type="button" id="btn-student" class="role-btn"
                        onclick="switchRole('student')">
                    <i class="fa-solid fa-graduation-cap"></i> Student
                </button>
            </div>

            <form method="POST" id="register-form" action="{{ route('register.store') }}">
                @csrf

                <!-- Name row -->
                <div class="field-row">
                    <div class="field">
                        <label for="txt_fname">
                            First Name <span class="required">*</span>
                        </label>
                        <input type="text" id="txt_fname" name="txt_fname"
                               placeholder="Juan" required value="{{ old('txt_fname') }}">
                    </div>
                    <div class="field">
                        <label for="txt_lname">
                            Last Name <span class="required">*</span>
                        </label>
                        <input type="text" id="txt_lname" name="txt_lname"
                               placeholder="Dela Cruz" required value="{{ old('txt_lname') }}">
                    </div>
                </div>

                <!-- Email -->
                <div class="field">
                    <label for="txt_email">
                        University Email <span class="required">*</span>
                    </label>
                    <input type="email" id="txt_email" name="txt_email"
                           placeholder="juandelacruz@bicol-u.edu.ph" required
                           value="{{ old('txt_email') }}">
                </div>

                <!-- Password -->
                <div class="field">
                    <label for="txt_password">
                        Password <span class="required">*</span>
                    </label>
                    <div class="input-wrapper">
                        <input type="password" id="txt_password" name="txt_password"
                               placeholder="Create a strong password" required>
                        <button type="button" class="toggle-pw"
                                onclick="togglePassword('txt_password', this)"
                                tabindex="-1" aria-label="Show password">
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="field">
                    <label for="txt_password_confirmation">
                        Confirm Password <span class="required">*</span>
                    </label>
                    <div class="input-wrapper">
                        <input type="password" id="txt_password_confirmation"
                               name="txt_password_confirmation"
                               placeholder="Repeat your password" required>
                        <button type="button" class="toggle-pw"
                                onclick="togglePassword('txt_password_confirmation', this)"
                                tabindex="-1" aria-label="Show confirm password">
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    Create My Account <i class="fa-solid fa-arrow-right"></i>
                </button>

            </form>

            <div class="divider">or</div>

            <p class="signin-link">
                Already have an account?
                <a href="{{ route('Auth.login') }}">Sign in here</a>
            </p>

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
        const REGISTER_ACTIONS = {
            faculty: '{{ route('register.store') }}',
            student: '{{ route('student.register') }}',
        };

        function switchRole(role) {
            // Toggle button states
            document.getElementById('btn-faculty').classList.toggle('active', role === 'faculty');
            document.getElementById('btn-student').classList.toggle('active', role === 'student');

            // Switch form action
            document.getElementById('register-form').action = REGISTER_ACTIONS[role];
        }

        function togglePassword(fieldId, btn) {
            const input = document.getElementById(fieldId);
            const icon  = btn.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }

        // Restore role tab after validation errors
        @if(old('_role') === 'student' || request()->is('student/register*'))
            document.addEventListener('DOMContentLoaded', () => switchRole('student'));
        @endif
    </script>

</body>
</html>