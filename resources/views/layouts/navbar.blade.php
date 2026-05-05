<nav class="navbar navbar-expand-lg fixed-top navbar-dark shadow-sm" 
     style="background: linear-gradient(to right, #0047ab 0%, #1ca9c9 100%); border-bottom: 1px solid rgba(255,255,255,0.1);">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <div class="bu-logo me-2">
                <img 
                    src="{{ asset('assets/Logo/OU LOGO.jpg') }}" 
                    alt="Bicol University Logo"
                    class="navbar-logo"
                    style="height: 50px; border-radius: 50%; border: 2px solid rgba(255,255,255,0.3);"
                >
            </div>
            <div class="brand-text">
                <div class="fw-bold text-white" style="line-height: 1.2; font-size: 1.2rem; letter-spacing: 0.5px;">
                    Bicol University
                </div>
                <small class="fw-bold text-white" style="display: block; margin-top: -2px; font-size: 0.85rem;">
                    Open University
                </small>
            </div>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#buNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="buNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                <li class="nav-item ms-lg-3">
                    <a class="btn shadow-sm" href="#" 
                       style="background-color: #ff8c00; color: white; border: none; padding: 8px 24px; font-weight: 700; border-radius: 5px; transition: all 0.3s ease;">
                        Apply Now
                    </a>
                </li>

                @php
                    $isLoggedIn = false;
                    $name       = '';
                    $role       = '';
                    $initial    = '';
                    $isUser     = false;

                    if (session()->has('admin_id')) {
                        $isLoggedIn = true;
                        $name       = session('admin_name');
                        $role       = strtoupper(str_replace(' ', '_', session('admin_role')));
                        $initial    = strtoupper(substr($name, 0, 1));
                    } elseif (session()->has('user_id')) {
                        $isLoggedIn = true;
                        $name       = session('name');
                        $role       = 'USER';
                        $initial    = strtoupper(substr($name, 0, 1));
                        $isUser     = true;
                    } elseif (session()->has('student_id')) {
                        $isLoggedIn = true;
                        $name       = session('student_name');
                        $role       = 'STUDENT';
                        $initial    = strtoupper(substr($name, 0, 1));
                    }

                    // Route each role to its own dashboard.
                    // Old code only checked for 'faculty' and defaulted everything
                    // else — including staff — to admin.dashboard, which is blocked
                    // by AdminMiddleware for non-admin sessions.
                    $dashboardRoute = match (strtolower(session('admin_role', ''))) {
                        'admin'   => route('admin.dashboard'),
                        'staff'   => route('staff.dashboard'),
                        'faculty' => route('Faculty.dashboard'),
                        default   => null,
                    };

                    if (!$dashboardRoute && session()->has('student_id')) {
                        $dashboardRoute = route('student.dashboard');
                    } elseif (!$dashboardRoute && session()->has('user_id')) {
                        $dashboardRoute = route('user.student.portal');
                    }

                    // Staff must POST to /staff/logout, not /admin/logout.
                    $logoutRoute = match (strtolower(session('admin_role', ''))) {
                        'staff'  => route('staff.logout'),
                        default  => route('logout'),
                    };
                    if (session()->has('student_id')) {
                        $logoutRoute = route('student.logout');
                    }
                @endphp

                @if($isLoggedIn)
                    <li class="nav-item dropdown ms-lg-3">
                        <a class="nav-link dropdown-toggle d-flex align-items-center"
                           href="#" id="userMenu" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="avatar-circle bg-secondary text-white d-flex justify-content-center align-items-center me-2"
                                  style="width:32px; height:32px; border-radius:50%; font-weight:600;">
                                {{ $initial }}
                            </span>
                            <span class="d-none d-lg-inline text-white" style="font-size:0.9rem;">
                                {{ $role }}
                            </span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                            <li class="dropdown-header text-center">
                                <strong>{{ $name }}</strong><br>
                                <small class="text-muted">{{ $role }}</small>
                            </li>
                            <li><hr class="dropdown-divider"></li>

                            @if ($dashboardRoute)
                                <li>
                                    <a class="dropdown-item d-flex align-items-center"
                                       href="{{ $dashboardRoute }}">
                                        <i data-lucide="layout-dashboard" class="me-2"></i>
                                        Dashboard
                                    </a>
                                </li>
                            @endif

                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ $logoutRoute }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item d-flex align-items-center">
                                        <i data-lucide="log-out" class="me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>

                @else
                    <li class="nav-item ms-lg-2">
                        <a class="btn shadow-sm" href="{{ route('Auth.login') }}"
                           style="background-color: #ff8c00; color: white; border: none; padding: 8px 24px; font-weight: 700; border-radius: 5px; transition: all 0.3s ease;">
                            Sign In
                        </a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav>

<style>
    .btn:hover {
        background-color: #e67e00 !important;
        transform: translateY(-1px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2) !important;
    }
    .avatar-circle {
        font-size: 0.9rem;
        line-height: 1;
    }
</style>