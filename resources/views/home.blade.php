@extends('layouts.app')

@section('content')

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
                <span class="bu-logo me-2">BU</span>
                <div>
                    <div>Bicol University</div>
                    <small class="text-muted">Open University</small>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#buNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="buNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#programs">Programs</a></li>
                    <li class="nav-item"><a class="nav-link" href="#admissions">Admissions</a></li>
                    <li class="nav-item"><a class="nav-link" href="#news">News</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-orange" href="#">Apply Now</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO / HOME SECTION -->
    <section id="home" class="hero-section d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center gy-5">

                <!-- LEFT CONTENT -->
                <div class="col-lg-6 text-white">
                    <span class="badge badge-custom mb-3">
                        🎓 Distance Education Excellence
                    </span>

                    <h1 class="hero-title mt-3">
                        Accessible,<br>
                        Flexible, Quality<br>
                        Distance Education in<br>
                        the Bicol Region
                    </h1>

                    <p class="hero-text mt-4">
                        Empowering learners anywhere through open and distance learning.
                        Achieve your academic goals with Bicol University Open University.
                    </p>

                    <div class="mt-4 d-flex flex-wrap gap-3">
                        <a href="#" class="btn btn-orange">Apply Now</a>
                        <a href="#" class="btn btn-outline-light">View Programs</a>
                        <a href="#" class="btn btn-outline-light">Contact Us</a>
                    </div>
                </div>

                <!-- RIGHT STATS -->
                <div class="col-lg-6">
                    <div class="row g-4">

                        <div class="col-md-6">
                            <div class="stat-card">
                                📘
                                <h3>5+</h3>
                                <p>Graduate Programs</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="stat-card">
                                👥
                                <h3>500+</h3>
                                <p>Enrolled Students</p>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="stat-card wide">
                                🎓
                                <h3>100%</h3>
                                <p>Flexible Online & Modular Learning</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="programs" class="hero-section d-flex align-items-center">
        Programs
    </section>

    <section id="admissions" class="hero-section d-flex align-items-center">
        Adminssions
    </section>

    <section id="news" class="hero-section d-flex align-items-center">
        News
    </section>

    <section id="about" class="hero-section d-flex align-items-center">
        About
    </section>

@endsection
