<nav class="navbar navbar-expand-lg fixed-top navbar-dark shadow-sm" 
     style="background: linear-gradient(to right, #0047ab 0%, #1ca9c9 100%); border-bottom: 1px solid rgba(255,255,255,0.1);">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
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
                <!-- LOGIN BUTTON -->
                <li class="nav-item ms-lg-2">
                    <a class="btn btn shadow-sm" href="{{ route('Auth.login') }}" style="background-color: #ff8c00; color: white; border: none; padding: 8px 24px; font-weight: 700; border-radius: 5px; transition: all 0.3s ease;">
                        Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    /* Smooth hover effect for the Apply Now button */
    .btn:hover {
        background-color: #e67e00 !important;
        transform: translateY(-1px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2) !important;
    }
</style>