<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | BU Open University</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
</head>

<body>

    <main>
        <div class="card">

            <h1 class="card-title">Sign in options</h1>
            <p class="card-sub">Choose your account type to continue</p>

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

            <!-- Option 1: Faculty / Staff -->
            <div class="option-row" id="faculty-option" onclick="showForm('faculty')">
                <div class="option-icon orange">
                    <i class="fa-solid fa-user-tie"></i>
                </div>
                <div class="option-text">
                    <strong>Admin, Faculty &amp; Staff</strong>
                    <span>Sign in using your Bicol University staff account</span>
                </div>
                <i class="fa-solid fa-chevron-right option-chevron" id="faculty-chevron"></i>
            </div>

            <!-- Option 2: Students -->
            <div class="option-row" id="student-option" onclick="showForm('student')">
                <div class="option-icon blue">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <div class="option-text">
                    <strong>Students</strong>
                    <span>Sign in using your Bicol University student account</span>
                </div>
                <i class="fa-solid fa-chevron-right option-chevron" id="student-chevron"></i>
            </div>

            <!-- Login form — revealed on option click -->
            <div class="login-form" id="login-form">

                <!-- Role identity banner -->
                <div class="role-banner" id="role-banner">
                    <div class="role-banner-icon" id="role-banner-icon">
                        <i class="fa-solid fa-user-tie"></i>
                    </div>
                    <div class="role-banner-text">
                        <span class="role-banner-label">Signing in as</span>
                        <strong id="role-banner-name">Faculty / Staff</strong>
                    </div>
                    <!-- <button type="button" class="role-banner-change" onclick="hideForm()">
                        Change
                    </button> -->
                </div>

                <form method="POST" id="login-form-el" action="/admin/login">
                    @csrf

                    <div class="field">
                        <label for="txt_email">
                            Email <span class="required">*</span>
                        </label>
                        <input type="email" id="txt_email" name="txt_email" placeholder="yourname@bicol-u.edu.ph"
                            required value="{{ old('txt_email') }}">
                    </div>

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

                    <button type="submit" class="btn-submit" id="submit-btn">
                        <i class="fa-solid fa-user-tie" id="submit-icon"></i>
                        Sign In as Faculty / Staff
                    </button>

                    <div style="text-align:right; margin-top:10px;">
                        <a href="#" style="font-size:12.5px; color:var(--blue); text-decoration:none;">
                            Forgot your password?
                        </a>
                    </div>
                </form>
            </div>

            <div class="divider">OR</div>

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
        const ROLES = {
            faculty: {
                action: '/admin/login',
                banner: 'Faculty / Staff',
                icon: 'fa-user-tie',
                btnText: 'Sign In as Faculty / Staff',
                bannerClass: 'banner-orange',
            },
            student: {
                action: '/student/login',
                banner: 'Student',
                icon: 'fa-graduation-cap',
                btnText: 'Sign In as Student',
                bannerClass: 'banner-blue',
            },
        };

        let currentRole = null;

        function showForm(role) {
            currentRole = role;
            const cfg = ROLES[role];

            // Reset both option rows
            ['faculty', 'student'].forEach(r => {
                document.getElementById(r + '-option').classList.remove('option-row--active-orange', 'option-row--active-blue');
                document.getElementById(r + '-chevron').style.opacity = '0';
            });

            // Highlight selected row
            const colorClass = role === 'student' ? 'option-row--active-blue' : 'option-row--active-orange';
            document.getElementById(role + '-option').classList.add(colorClass);
            document.getElementById(role + '-chevron').style.opacity = '1';

            // Update banner
            const banner = document.getElementById('role-banner');
            banner.className = 'role-banner ' + cfg.bannerClass;
            document.getElementById('role-banner-icon').innerHTML = `<i class="fa-solid ${cfg.icon}"></i>`;
            document.getElementById('role-banner-name').textContent = cfg.banner;

            // Update form action
            document.getElementById('login-form-el').action = cfg.action;

            // Update submit button
            const btn = document.getElementById('submit-btn');
            btn.className = 'btn-submit ' + (role === 'student' ? 'btn-blue' : 'btn-orange');
            document.getElementById('submit-icon').className = `fa-solid ${cfg.icon}`;
            btn.childNodes[btn.childNodes.length - 1].textContent = ' ' + cfg.btnText;

            // Show the form
            const formEl = document.getElementById('login-form');
            formEl.classList.add('visible');
            formEl.querySelector('input').focus();
        }

        function hideForm() {
            document.getElementById('login-form').classList.remove('visible');
            ['faculty', 'student'].forEach(r => {
                document.getElementById(r + '-option').classList.remove('option-row--active-orange', 'option-row--active-blue');
                document.getElementById(r + '-chevron').style.opacity = '0';
            });
            currentRole = null;
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

        // Reopen the correct tab after a failed login redirect
        @php $activeTab = session('active_tab', ''); @endphp
        @if($activeTab === 'faculty' || $activeTab === 'student')
            document.addEventListener('DOMContentLoaded', () => showForm('{{ $activeTab }}'));
        @elseif($errors->any())
            document.addEventListener('DOMContentLoaded', () => showForm('faculty'));
        @endif
    </script>

</body>

</html>