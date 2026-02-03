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
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#programs">Programs</a></li>
                <li class="nav-item"><a class="nav-link" href="#admissions">Admissions</a></li>
                <li class="nav-item"><a class="nav-link" href="#news">News</a></li>
                <li class="nav-item ms-lg-3">
                    <a class="btn btn-orange" href="#">Apply Now</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- HERO / HOME -->
<section id="home" class="hero-section d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center gy-5">
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

<!-- ABOUT SECTION -->
<section id="about" class="hero-section d-flex align-items-center bg-white">
    <div class="container">

        <!-- SECTION INTRO -->
        <div class="row mb-5 justify-content-center text-center">
            <div class="col-lg-8">
                <span class="badge badge-custom mb-3">
                    📘 Institutional Background
                </span>
                <h2 class="section-title">
                    The Bicol University<br>
                    Open University (BUOU)
                </h2>
                <p class="section-text text-muted mt-3">
                    The Bicol University Open University was established on
                    November 20, 1997, following Board of Regents Resolution
                    No. 24, series of 1997. Its primary objective was to bring
                    the curricular programs of Bicol University to a wider
                    population of learners in the Bicol Region through open
                    and distance education.
                </p>
            </div>
        </div>

        <!-- EVOLUTION STRIP -->
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="stat-card h-100">
                    🕰️
                    <h6 class="mt-3">Establishment (1997)</h6>
                    <p class="text-muted mb-0">
                        Approved through BOR Resolution No. 24, series of 1997,
                        the BU Open University was created to widen access to
                        university education in the region.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="stat-card h-100">
                    ⚙️
                    <h6 class="mt-3">Operational Guidelines (2004)</h6>
                    <p class="text-muted mb-0">
                        Administrative Order No. 177, series of 2004, provided
                        the general implementing guidelines for BUOU operations,
                        emphasizing selected graduate programs through distance education.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="stat-card h-100">
                    🎓
                    <h6 class="mt-3">Restructuring (2019)</h6>
                    <p class="text-muted mb-0">
                        Under Administrative Order No. 347, series of 2019,
                        BUOU was mandated as a degree-offering academic unit,
                        authorized to expand into undergraduate and non-degree
                        or short-term courses.
                    </p>
                </div>
            </div>
        </div>

        <!-- PROGRAM OBJECTIVES -->
        <div class="row align-items-center gy-5">
            <div class="col-lg-6">
                <h5 class="mb-4">🎯 Program Objectives</h5>

                <div class="stat-card mb-3">
                    📚
                    <p class="text-muted mb-0">
                        Provide wider access to quality education by offering
                        degree programs through the distance education mode.
                    </p>
                </div>

                <div class="stat-card mb-3">
                    👩‍💼
                    <p class="text-muted mb-0">
                        Establish an innovative system of continuing education
                        and career development for professionals unable to
                        pursue studies through the traditional mode.
                    </p>
                </div>

                <div class="stat-card">
                    🧩
                    <p class="text-muted mb-0">
                        Develop instructional materials and technologies
                        appropriate for distance education.
                    </p>
                </div>
            </div>

            <!-- DISTANCE LEARNING / DELIVERY -->
            <div class="col-lg-6">
                <h5 class="mb-4">💻 Distance Learning & Instruction</h5>
                <p class="text-muted">
                    Delivery of academic programs is through modular and/or online systems. Students access modules, attend tutorials, submit requirements, and take proctored examinations at the BUOU office or via online platforms. Faculty-in-Charge (FICs) and tutors guide learning, ensuring objectives are met and performance is properly assessed.
                </p>

                <p class="text-muted">
                    The BUOU also partners with local government units and other academic institutions in the region to widen educational access. Instructional materials include modules, video content, and online resources, all designed to support high-quality distance education.
                </p>
            </div>
        </div>

    </div>
</section>

<!-- PROGRAMS SECTION -->
<section id="programs" class="hero-section d-flex align-items-start py-5">
    <div class="container">

        <!-- SECTION INTRO -->
        <div class="row mb-5 justify-content-center text-center">
            <div class="col-lg-8">
                <span class="badge badge-custom mb-3">
                    🎓 Graduate Programs
                </span>
                <h2 class="section-title">
                    BU Open University Programs
                </h2>
                <p class="section-text text-muted mt-3">
                    The BU Open University offers selected graduate programs through flexible Open and Distance Learning (ODeL) methods. Designed for mature learners capable of independent study, these programs combine online learning, tutorials, and practical fieldwork.
                </p>
            </div>
        </div>

        <!-- PROGRAM CARDS -->
        <div class="row g-4">

            @php
                $programs = [
                    [
                        'title' => 'Doctor of Education in Educational Leadership & Management (EdDELM)',
                        'mode' => 'Online (synchronous & asynchronous)',
                        'focus' => 'Develops high-quality leaders and managers in education.',
                        'target' => 'Experienced educational leaders and managers seeking enhanced leadership skills in schools, districts, higher education, or NGOs.'
                    ],
                    [
                        'title' => 'Master in Management (MM)',
                        'mode' => 'Primarily Online with tutorial support',
                        'focus' => 'Develops skills in analysis, organizational change, and project management.',
                        'target' => 'Graduate students learning at their own pace using ODeL and Blended Online Learning (BOL) including internships.'
                    ],
                    [
                        'title' => 'Master of Public Administration (MPA)',
                        'mode' => 'Open and Distance e-Learning (ODeL)',
                        'focus' => 'Develops competencies for effective management in public sector and civil society.',
                        'target' => 'Recent graduates and public sector professionals enhancing knowledge in administration, policy development, and problem-solving.'
                    ],
                    [
                        'title' => 'Master in Local Government Management (MLGM)',
                        'mode' => 'ODeL & Blended Online Learning (BOL)',
                        'focus' => 'Participatory governance and local government operations.',
                        'target' => 'Learners using learning packages, online resources, tutorials, and counseling. Assessment via assignments and exams.'
                    ],
                    [
                        'title' => 'Master of Arts in Educational Leadership & Management (MAELM)',
                        'mode' => 'ODeL',
                        'focus' => 'Develops research, leadership, and management skills in education.',
                        'target' => 'Leaders who can manage educational institutions effectively and contribute to community development.'
                    ],
                    [
                        'title' => 'Master of Arts in English Education (MAEngEd)',
                        'mode' => 'ODeL',
                        'focus' => 'Enhances teachers’ abilities in innovative instructional design and research.',
                        'target' => 'Teachers aiming to improve methodology, curriculum design, and materials development for English instruction.'
                    ],
                    [
                        'title' => 'Master of Arts in Social Studies Education (MASocStEd)',
                        'mode' => 'ODeL',
                        'focus' => 'Develops advanced teaching competence in social studies.',
                        'target' => 'Educators equipped to lead curriculum development, research, and social studies teaching in schools and colleges.'
                    ],
                ];
            @endphp

            @foreach($programs as $program)
            <div class="col-lg-6">
                <div class="stat-card h-100 about-hover p-4" 
                     data-bs-toggle="collapse" 
                     data-bs-target="#{{ \Str::slug($program['title']) }}" 
                     aria-expanded="false" 
                     style="cursor: pointer;">
                     
                    <!-- Always visible -->
                    <h5 class="mb-0">{{ $program['title'] }}</h5>

                    <!-- Collapsible details -->
                    <div class="collapse mt-3" id="{{ \Str::slug($program['title']) }}">
                        <p><strong>Mode of Instruction:</strong> {{ $program['mode'] }}</p>
                        <p><strong>Focus of Study:</strong> {{ $program['focus'] }}</p>
                        <p><strong>Target Learners:</strong> {{ $program['target'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>



<section id="admissions" class="hero-section d-flex align-items-center">
    Admissions
</section>

<section id="news" class="hero-section d-flex align-items-center">
    News
</section>



@endsection
