@extends('layouts.app')

@section('content')

    @include('layouts.navbar')

    <!-- HERO / HOME SECTION -->
    <section id="home" class="hero-section d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center gy-5">

                <!-- LEFT CONTENT -->
                <div class="col-lg-6">
                    <span class="badge badge-custom mb-3">
                        🎓 Distance Education Excellence
                    </span>

                    <h1 class="hero-title mt-3">
                        <span class="text-gradient-orange">BICOL UNIVERSITY</span><br>
                        <span class="text-gradient-blue">OPEN UNIVERSITY</span>
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

    <!-- ABOUT SECTION -->
    <section id="about" class="about-section">

        <!-- INTRO CARD -->
        <div class="container">
            <div class="about-intro-card text-center">
                <h2 class="mb-3">The Bicol University Open University</h2>
                <p class="text-muted mb-0">
                    On November 20, 1997, the Bicol University (BU) Board of Regents
                    passed BOR Resolution No. 24, series of 1997, approving the
                    establishment of the BU Open University to bring the curricular
                    programs of the University to a wider populace of students in
                    the Bicol Region.
                </p>
            </div>
        </div>

        <!-- TIMELINE CARDS -->
        <div class="container mt-5">
            <div class="row g-4">

                <div class="col-md-4">
                    <div class="about-timeline-card">
                        <span class="timeline-year">1997</span>
                        <p>
                            BOR Resolution No. 24, series of 1997 approved the
                            establishment of the BU Open University.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="about-timeline-card">
                        <span class="timeline-year">2004</span>
                        <p>
                            Administrative Order No. 177, series of 2004 provided the
                            implementing guidelines, emphasizing graduate programs
                            via distance education and open learning.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="about-timeline-card">
                        <span class="timeline-year">2019</span>
                        <p>
                            The restructured BUOU was mandated as a degree-offering
                            and eventually degree-granting academic unit, authorized
                            to offer undergraduate and non-degree programs.
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <!-- OBJECTIVES & DISTANCE LEARNING -->
        <div class="container mt-5">
            <div class="row g-5">

                <!-- OBJECTIVES -->
                <div class="col-lg-6">
                    <div class="about-content-card h-100">
                        <h5 class="mb-3">Objectives</h5>
                        <p class="text-muted">
                            The BU Open and Distance Education Program seeks to provide
                            wider access to quality education adhering to the highest
                            standards of academic excellence in order to produce
                            trained manpower required for the development of the
                            Bicol Region. Specifically, the program seeks to:
                        </p>
                        <ul>
                            <li>
                                Provide wider access to quality education by offering
                                degree programs via the distance education mode;
                            </li>
                            <li>
                                Establish an innovative system of continuing education
                                and career development for professionals unable to
                                avail of the opportunity through the traditional
                                delivery mode; and
                            </li>
                            <li>
                                Develop instructional materials and technology
                                appropriate for distance education.
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- DISTANCE LEARNING -->
                <div class="col-lg-6">
                    <div class="about-content-card h-100">
                        <h5 class="mb-3">Distance Learning</h5>
                        <p class="text-muted">
                            Delivery of academic programs through the distance
                            education mode is conducted through modular and/or online
                            systems. The Open University Office serves as the venue
                            for enrollment, distribution of modules, tutorials,
                            submission of requirements, internet access, interaction
                            with students, and proctored examinations.
                        </p>
                        <p class="text-muted">
                            The Distance Learning Center is located at the third floor
                            of the University Library in the Main Campus of Bicol
                            University. To serve a wider segment of Bicolanos, the
                            BU Open University intends to partner with local
                            government units and academic institutions.
                        </p>
                        <p class="text-muted mb-0">
                            Under Administrative Order No. 347, series of 2019, the
                            Office is manned by the Dean and supported by core and
                            affiliate faculty and technical staff.
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <!-- MODE OF INSTRUCTION -->
        <div class="container mt-5">
            <div class="about-wide-card">
                <h5 class="mb-3">Mode of Instructional Delivery</h5>
                <p class="text-muted">
                    Course modules serve as the primary medium of instructional
                    delivery. These are prepared by module development teams
                    consisting of writers, readers, instructional design specialists,
                    and language editors from the University faculty. Other
                    instructional materials such as video clippings are also used.
                </p>
                <p class="text-muted">
                    Actual delivery of the modules is facilitated by
                    Faculty-in-Charge (FICs) and tutors. Each course has a FIC who
                    ensures the attainment of course objectives and evaluates student
                    performance through assignments, activities, and supervised
                    examinations.
                </p>
                <p class="text-muted mb-0">
                    Tutorial sessions form part of the course delivery system and are
                    held at the BUOU Office at least once a month or as needed,
                    facilitated by FICs and tutors.
                </p>
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
    </section>

    <!-- FACULTY SECTION -->
    <section id="faculty" class="faculty-section py-5">
        <div class="container">

            <!-- SECTION TITLE -->
            <div class="text-center mb-5">
                <h2 class="faculty-title">BU OPEN UNIVERSITY FACULTY</h2>
                <p class="faculty-subtitle">A.Y. 2025–2026</p>
            </div>

            <!-- FACULTY CARD -->
            <div class="row align-items-center faculty-card gy-4">

                <!-- IMAGE -->
                <div class="col-md-4 text-center">
                    <div class="faculty-image-wrapper">
                        <img src="{{ asset('images/faculty/MARIA JANE B. MASCARIÑAS.jpg') }}"
                            alt="MARIA JANE B. MASCARIÑAS"
                            class="faculty-image">
                    </div>
                </div>

                <!-- DETAILS -->
                <div class="col-md-8">
                    <h4 class="faculty-name">MARIA JANE B. MASCARIÑAS, PhD</h4>
                    <p class="faculty-position">Professor VI / Graduate Faculty</p>

                    <ul class="faculty-credentials">
                        <li>
                            Bachelor of Science in Agribusiness  
                            <span>(BU College of Agriculture, 1985)</span>
                        </li>
                        <li>
                            Master of Management major in Rural Development Management  
                            <span>(University of the Philippines Los Baños, 1991)</span>
                        </li>
                        <li>
                            PhD in Extension Education, minor in Environmental Studies  
                            <span>(University of the Philippines Los Baños, 1995)</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row align-items-center faculty-card gy-4">

                <!-- IMAGE -->
                <div class="col-md-4 text-center">
                    <div class="faculty-image-wrapper">
                        <img src="{{ asset('images/faculty/MELINDA D. DE GUZMAN.jpg') }}"
                            alt="MELINDA D. DE GUZMAN"
                            class="faculty-image">
                    </div>
                </div>

                <!-- DETAILS -->
                <div class="col-md-8">
                    <h4 class="faculty-name">MELINDA D. DE GUZMAN, EdD</h4>
                    <p class="faculty-position">Professor VI/ Program Adviser</p>

                    <ul class="faculty-credentials">
                        <li>
                            Bachelors of Science  in Nursing
                            <span>(Bicol University College of Nursing, 1985)</span>
                        </li>
                        <li>
                            Methods of Teaching
                            <span>(Bicol University, 1987)</span>
                        </li>
                        <li>
                            Master in Management
                            <span>(Bicol University Graduate School, 1989)</span>
                        </li>
                        <li>
                            MA in Educational Leadership and Management <span>(MAELM)</span> 
                            and EdD in Educational Leadership and Management <span>(EdDELM)</span>
                        </li>
                        <li>
                            EdD Educational Management   
                            <span>(Bicol University Graduate School, 1993)</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row align-items-center faculty-card gy-4">

                <!-- IMAGE -->
                <div class="col-md-4 text-center">
                    <div class="faculty-image-wrapper">
                        <img src="{{ asset('images/faculty/EMILY M. AGONOS.jpg') }}"
                            alt="EMILY M. AGONOS"
                            class="faculty-image">
                    </div>
                </div>

                <!-- DETAILS -->
                <div class="col-md-8">
                    <h4 class="faculty-name">EMILY M. AGONOS, PhD</h4>
                    <p class="faculty-position">Associate Professor V/Program Adviser</p>

                    <ul class="faculty-credentials">
                        <li>
                            Master in Management   
                            <span>(MM)</span>
                        </li>
                        <li>
                            BS Commerce Accounting 
                            <span>(1989)</span>
                        </li>
                        <li>
                            CCT  
                            <span>(2003)</span> - <span>(Bicol University)</span>
                        </li>
                        <li>
                            Master in Management  
                            <span>(Bicol University Graduate School)</span> - <span>(Bicol University)</span>
                        </li>
                        <li>
                            PhD in Development Management 
                            <span>(Bicol University Graduate School)</span> - <span>2018</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row align-items-center faculty-card gy-4">

                <!-- IMAGE -->
                <div class="col-md-4 text-center">
                    <div class="faculty-image-wrapper">
                        <img src="{{ asset('images/faculty/RAMON T. DE LEON.jpg') }}"
                            alt="RAMON T. DE LEON"
                            class="faculty-image">
                    </div>
                </div>

                <!-- DETAILS -->
                <div class="col-md-8">
                    <h4 class="faculty-name">RAMON T. DE LEON, PhD</h4>
                    <p class="faculty-position">Associate Professor I/ Program Adviser</p>

                    <ul class="faculty-credentials">
                        <li>
                            Master in Local Government Management  
                            <span>(MLGM)</span>
                        </li>
                        <li>
                            MA in Social Studies Education  
                            <span>(MASocStEd)</span>
                        </li>
                        <li>
                            AB Economics  
                            <span>(Adamson University-Manila, 1987)</span>
                        </li>
                        <li>
                            Master in Business Administration  
                            <span>(Divine Word College of Legazpi, 1995)</span>
                        </li>
                        <li>
                            PhD in Counselor Education  
                            <span>(University of Santo Tomas, 2012)</span>
                        </li>
                        <li>
                            PhD in Counseling Psychology  
                            <span>(Cand.) (De la Salle University - Manila)</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row align-items-center faculty-card gy-4">

                <!-- IMAGE -->
                <div class="col-md-4 text-center">
                    <div class="faculty-image-wrapper">
                        <img src="{{ asset('images/faculty/ROLDAN C. CABILES.jpg') }}"
                            alt="ROLDAN C. CABILES"
                            class="faculty-image">
                    </div>
                </div>

                <!-- DETAILS -->
                <div class="col-md-8">
                    <h4 class="faculty-name">ROLDAN C. CABILES, PhD</h4>
                    <p class="faculty-position">Assistant Professor II/ Program Adviser</p>

                    <ul class="faculty-credentials">
                        <li>
                            MA in English Education   
                            <span>(MAEngEd)</span>
                        </li>
                        <li>
                            Bachelor of Secondary Education major in English 
                            <span>(Bicol University College of Education, 2015)</span>
                        </li>
                        <li>
                            Master of Arts in English Education   
                            <span>(Bicol University Graduate School, 2018)</span>
                        </li>
                        <li>
                            PhD in Educational Foundations    
                            <span>(Bicol University Graduate School, 2021)</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row align-items-center faculty-card gy-4">

                <!-- IMAGE -->
                <div class="col-md-4 text-center">
                    <div class="faculty-image-wrapper">
                        <img src="{{ asset('images/faculty/JOSE CARLO B. LAVAPIE.jpg') }}"
                            alt="JOSE CARLO B. LAVAPIE"
                            class="faculty-image">
                    </div>
                </div>

                <!-- DETAILS -->
                <div class="col-md-8">
                    <h4 class="faculty-name">JOSE CARLO B. LAVAPIE , MPA</h4>
                    <p class="faculty-position">Assistant Professor I/ Program Adviser</p>

                    <ul class="faculty-credentials">
                        <li>
                            Master in Public Administration   
                            <span>(MPA)</span>
                        </li>
                        <li>
                            Bachelor of Arts major in Philosophy minor in Religious Education   
                            <span>(Holy Rosary Minor Seminary)</span>
                        </li>
                        <li>
                            PhD in Extension Education, minor in Environmental Studies  
                            <span>(University of the Philippines Los Baños, 1995)</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row align-items-center faculty-card gy-4">

                <!-- IMAGE -->
                <div class="col-md-4 text-center">
                    <div class="faculty-image-wrapper">
                        <img src="{{ asset('images/faculty/PROF. ROLLIE N. MONTEALEGRE.jpg') }}"
                            alt="PROF. ROLLIE N. MONTEALEGRE"
                            class="faculty-image">
                    </div>
                </div>

                <!-- DETAILS -->
                <div class="col-md-8">
                    <h4 class="faculty-name">PROF. ROLLIE N. MONTEALEGRE</h4>
                    <p class="faculty-position">Instructor I</p>

                    <ul class="faculty-credentials">
                        <li>
                            Bachelor of Science in Computer Science   
                            <span>(Bicol University College of Science, 2006)</span>
                        </li>
                        <li>
                            Master in Information System  
                            <span>(Bicol University Graduate School)</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row align-items-center faculty-card gy-4">

                <!-- IMAGE -->
                <div class="col-md-4 text-center">
                    <div class="faculty-image-wrapper">
                        <img src="{{ asset('images/faculty/JULIE ANNE C. QUIÑONES.jpg') }}"
                            alt="JULIE ANNE C. QUIÑONES"
                            class="faculty-image">
                    </div>
                </div>

                <!-- DETAILS -->
                <div class="col-md-8">
                    <h4 class="faculty-name">JULIE ANNE C. QUIÑONES</h4>

                    <ul class="faculty-credentials">
                        <li>
                            Bachelor in Secondary Education Major in Biological Science  
                        </li>
                        <li>
                            Master of Arts in Biology Education
                        </li>
                        <li>
                            Doctor of Education in Educational Leadership and Management
                        </li>
                    </ul>
                </div>
            </div>

            <hr class="my-3">

            <div class="text-center mb-5">
                <h2 class="faculty-title">AFFILIATE FACULTY</h2>
                <p class="faculty-subtitle">A.Y. 2025–2026</p>
            </div>

            <div class="row align-items-center faculty-card gy-4">

                <!-- IMAGE -->
                <div class="col-md-4 text-center">
                    <div class="faculty-image-wrapper">
                        <img src="{{ asset('images/faculty/RAMESIS M. LORINO, PhD .jpg') }}"
                            alt="RAMESIS M. LORINO, PhD "
                            class="faculty-image">
                    </div>
                </div>

                <!-- DETAILS -->
                <div class="col-md-8">
                    <h4 class="faculty-name">RAMESIS M. LORINO, PhD </h4>

                    <ul class="faculty-credentials">
                        <li>
                            Master of Public Administration 
                            <span>(MPA) </span> 
                        </li>
                        <li>
                            BSBA Management 
                            <span>(Bicol University, 1990)</span>
                        </li>
                        <li>
                            Master in Mgt. major in Public Management 
                            <span>(Tabaco College, 2003)</span>
                        </li>
                        <li>
                            PhD Public Administration 
                            <span>(Bicol University Graduate School, 2009)</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="admissions" class="hero-section d-flex align-items-center">
        Admissions
    </section>

    <!-- FAQS SECTION -->
    <section id="faqs" class="d-flex align-items-center bg-white">
        <div class="container">
            <!-- SECTION HEADER -->
            <div class="row mb-5 justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 class="section-title">Frequently Asked Questions</h2>
                    <p class="section-text text-muted mt-3">
                        Find quick answers to common inquiries about admission, enrollment,
                        facilities, and services at the BU Open University.
                    </p>
                </div>
            </div>

            <!-- FAQ ITEMS -->
            <div class="faq-wrapper mx-auto">
                <!-- FAQ ITEM -->
                <div class="faq-item">
                    <button class="faq-question">
                        How to request for Admission to BU Open University?
                        <span class="icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <p><strong>For Master’s and Doctoral Applicants:</strong></p>
                            <ul>
                                <li>Duly Accomplished Application Form (BUGS Form 1)</li>
                                <li>One Original and One photocopy of official Transcript of Records (TOR) from college previously attended.</li>
                                <li>Photocopy of Special Order (for graduates of Private School)</li>
                                <li>Copy of honorable dismissal from school last attended.</li>
                                <li>Two letters for recommendation preferably from former professors.</li>
                                <li>Photocopy of Birth Certificate (NSO or PSA).</li>
                                <li>Photocopy of Marriage Contract (for married female applicants).</li>
                                <li>Certificate of English Proficiency for Foreign students. Required TOEFL score for admission is 460 (Additional requirement for International Applicants).</li>
                            </ul>
                        <p><strong>The following documents (Duly Accomplished Application Form (BUGS Form 1 & Recommendation for Graduate Study Form) are available at the BUGS Office or can be downloaded at the BUGS Open Access Drive at:</strong></p>
                        <a class="btn btn-orange" href="https://drive.google.com/drive/u/5/folders/1JKlEhnDs_oJ-4kt461kWpkepN1osYG1M" target="_blank" class="faq-link">
                            BUGS Open Access Drive
                        </a>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        How to request approval for use of venue, Facility/equipment?
                        <span class="icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <ol>
                            <li>Forward communication: submit the letter request to the office staff .
                                <ol class="sub-list">
                                    <li>1.1. The processing time would be 3-5 minutes per transaction.</li>
                                    <li>1.2. Check the availability of the venue, facility or equipment.The processing time would be 3-5 minutes per transaction. </li>
                                    <li>1.3 Forward the communication to the Dean.</li>
                                    <li>1.4. Act on the received communication such as approval, endorsement and other appropriate action. The processing time usually takes 3-5 minutes</li>
                                </ol>
                            </li>
                            <li>2. Receive documents
                                <ol class="sub-list">
                                <li>2.1 The client receives the document from the office staff.</li>
                                </ol>
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        How to address the needs of the visitors/clients?
                        <span class="icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <ol>
                            <li>Fill out the message slip available in the front desk.</li>
                            <li>Present the slip to the front desk clerk.
                                <ol class="sub-list">
                                    <li>2.1 Receives the accomplished message slip </li>
                                    <li>2.2 Inform the Dean regarding the concern of the visitor/client.</li>
                                    <li>2.4 Prepare/record regarding the action of the Dean</li>
                                    <li>2.5 Provide certification of appearance to the visitor/client.</li>
                                    <li>2.5 Provide certification of appearance to the visitor/client.</li>
                                </ol>   
                            </li>
                            <li>Receives the Certificate of appearance.</li>
                        </ol>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        How to Enroll in BU Open University?
                        <span class="icon">+</span>
                    </button>

                    <div class="faq-answer">
                        <!-- GENERAL STEPS -->
                        <ul>
                            <li>
                                To process the enrollment of new students, a Notice of Admission (NOA)
                                issued by the Office of the Dean of the Graduate School must be secured
                                first to proceed with the enrollment.
                            </li>
                            <li>
                                After submitting the required documents, wait for the notification
                                either online or onsite.
                            </li>
                            <li>
                                The BUGS Registrar will encode the subject of the student and issue the Assessment 
                                of Fees via email for online or printed copy for onsite. Upon receiving the Assessment 
                                of Fees, the student is required to pay the tuition and other fees via online or onsite.
                            </li>
                        </ul>
                        <!-- PAYMENT OPTIONS -->
                        <ol>
                            <li>
                                <strong>For Onsite:</strong> The student may go directly to BUGS Cashier Office. 
                                Upon payment, the Cashier issues the Certificate of Registration
                            </li>
                            <li>
                                <strong>For Online:</strong> The student may pay through banks to BUGS Landbank account:
                            </li>
                        </ol>
                        <!-- BANK DETAILS (PLAIN TEXT, NOT CENTERED) -->
                        <p><strong>Account Name:</strong> Bicol University – STF (164)</p>
                        <p><strong>Account No.:</strong> 0132-0265-48</p>
                        <p><strong>Bank Branch:</strong> LBP Legazpi</p>
                        <p>
                            The BUGS Cashier will confirm the payment in Landbank. Upon conferment, 
                            the BUGS Cashier will issue a Certificate of Registration via email.
                        </p>
                        <!-- POST-ENROLLMENT NOTES -->
                        <ul>
                            <ol>
                                <li>
                                    <strong>Forwards ACtivity proposal to BUOU front desk.</strong>
                                </li>
                                <li>
                                    <strong>For Online:</strong> The student may pay through banks to BUGS Landbank account:
                                </li>
                            </ol>
                        </ul>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        How to request for approval to conduct Activity?
                        <span class="icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <ol>
                            <li>Forwards ACtivity proposal to BUOU front desk.
                                <ol class="sub-list">
                                    <li>1.1 Receives/stamp the activity proposal</li>
                                    <li>1.2 Assign reference number to the proposal and record in the logbook.</li>
                                    <li>1.3 Forward the communication to the Dean.</li>
                                    <li>1.4 Act on the proposal, endorsed or other appropriate action.</li>
                                    <li>1.5 Encode/record regarding the action of the Dean.</li>
                                </ol>
                            </li>
                            <li>2. Receives the endorsement/ routing slip or transmittal.
                                <ol class="sub-list">
                                <li>2.1 Keep the receiving copy.</li>
                                </ol>
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        How to receive and release communication/document?
                        <span class="icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <ol>
                            <li>Forward the communication/document to the front desk.
                                <ol class="sub-list">
                                    <li>1.1 Receive the communication/document</li>
                                    <li>1.2 Assign reference number to the document, classifying as to kind of documents and record it in the logbook.</li>
                                    <li>1.3 Forward the communication to the Dean.</li>
                                    <li>1.4 Act on the received communication/documents such as approval, endorsement, and other appropriate action.</li>
                                    <li>1.5 Encode/record the action of the Dean such as endorsement , memorandum,routing slip or transmittal letter.</li>
                                    <li>1.6 Forward the communication, memorandum or transmittal letter for review/signature of the Dean.</li>
                                    <li>1.7 Reproductive copies for dissemination to the concerned persons.</li>
                                    <li>1.8 Record and release communications/documents to concerned personnel/faculty and/or dissemination.</li>
                                    <li>1.9 Delivery/disseminate the communication/documents acted upon by the Dean.</li>
                                    <li>1.10 Store a received/disseminated file copy of the documents in labeled folders, boxes and shelves.</li>
                                </ol>
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        Enrolment of Students at BU Open University
                        <span class="icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <p><strong>Master’s and Doctoral Applicants: </strong></p>
                            <ul>
                                <li>Notice of Admission </li>
                                <li>Advising Slip and Certification </li>
                                <li>Program of Courseworks</li>
                                <li>Nomination for Thesis/Dissertation Adviser </li>
                                <li>Concept Note</li>
                            </ul>
                        <p><strong>The following documents can be downloaded in the Open Access Drive of BU Graduate School Facebook Page, BUOU Facebook page and Bicol University Website.</strong></p>

                        <ol>
                            <li>Client’s Steps:
                                <ol class="sub-list">
                                    <li>1. Submit the required documents and wait for the notification either online or onsite. </li>
                                    <li>2. For new students: The student/Client receives the Certificate of Registration and contact the ICTO for official BU email address. </li>
                                    <li>3. The student informs his/her Faculty in Charge (FIC) as a member of the class.</li>
                                </ol>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="news" class="news-section position-relative">
        
        <div class="news-bg-pattern"></div>

        <div class="container position-relative z-1">
            
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <span class="badge news-bg-orange text-white px-3 py-2 rounded-pill mb-3">
                        📰 BUOU Updates
                    </span>
                    <h2 class="text-white fw-bold display-6">
                        Latest News & Announcements
                    </h2>
                    <p class="text-white-50 mt-2">
                        Stay connected with the latest milestones, academic opportunities, and community stories from the Bicol University Open University.
                    </p>
                </div>
            </div>

            <div class="row g-4">
                
                <div class="col-md-4">
                    <div class="news-card h-100">
                        <div class="news-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1544531586-fde5298cdd40?q=80&w=600&auto=format&fit=crop" alt="Anniversary" class="img-fluid w-100">
                            <div class="news-date-badge">
                                <span class="d-block fw-bold">20</span>
                                <span class="small text-uppercase">Nov</span>
                            </div>
                        </div>
                        <div class="news-body">
                            <h5 class="news-title">BUOU Celebrates Milestone Anniversary</h5>
                            <p class="news-text">
                                A moment of reflection on BUOU's remarkable journey, celebrating decades of commitment to providing quality distance education.
                            </p>
                            <a href="#" class="news-link">Read Full Story <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="news-card h-100">
                        <div class="news-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?q=80&w=600&auto=format&fit=crop" alt="Padagos Event" class="img-fluid w-100">
                            <div class="news-date-badge">
                                <span class="d-block fw-bold">08</span>
                                <span class="small text-uppercase">Jun</span>
                            </div>
                        </div>
                        <div class="news-body">
                            <h5 class="news-title">PADAGOS: Empowering Growth & Tribute</h5>
                            <p class="news-text">
                                The "Padagos" year-end assessment featured a heartfelt tribute from the graduates to the faculty, highlighting resilience.
                            </p>
                            <a href="#" class="news-link">Read Full Story <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="news-card h-100">
                        <div class="news-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?q=80&w=600&auto=format&fit=crop" alt="New Programs" class="img-fluid w-100">
                            <div class="news-date-badge">
                                <span class="d-block fw-bold">15</span>
                                <span class="small text-uppercase">Jan</span>
                            </div>
                        </div>
                        <div class="news-body">
                            <h5 class="news-title">Applications Open for Graduate Programs</h5>
                            <p class="news-text">
                                We are now accepting applicants for the Doctor of Education (EdDELM) and Master of Public Administration (MPA).
                            </p>
                            <a href="#" class="news-link">View Requirements <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <a href="#" class="btn btn-outline-light rounded-pill px-5 py-2 fw-semibold">
                        View All News Archives
                    </a>
                </div>
            </div>

        </div>
    </section>

    <section id="graduates" class="grad-section-split py-5">
        <div class="container">
            <div class="grad-card shadow-lg overflow-hidden rounded-4 bg-white">
                <div class="row g-0 align-items-stretch">
                    <div class="col-lg-5 position-relative">
                        <div class="grad-img-holder h-100">
                            <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=600&auto=format&fit=crop" alt="Class of 2025" class="img-fluid w-100 h-100 object-fit-cover">
                        </div>
                        
                        <div class="grad-overlay-badge position-absolute bottom-0 start-0 m-4 p-3 text-white">
                            <h3 class="display-5 fw-bold mb-0">2025</h3>
                            <p class="small text-uppercase ls-2 mb-0">Graduates</p>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="grad-text-body p-5 h-100 d-flex flex-column justify-content-center">
                            
                            <div class="mb-4 border-bottom pb-3 border-secondary-subtle">
                                <span class="badge bg-teal text-white mb-2 px-3 py-2 rounded-1">🎉 Celebration</span>
                                <h2 class="fw-bold text-dark mt-2">
                                    Warmest Congratulations to the <br>
                                    <span class="text-teal">BU Open University Class of 2025</span>
                                </h2>
                            </div>

                            <div class="text-muted">
                                <p>
                                    The Bicol University Open University extends its warmest congratulations to you. Your unwavering commitment to your studies, despite the challenges of pursuing education through a non-traditional format, is a testament to your <strong class="text-orange">resilience and dedication</strong>.
                                </p>
                                <p class="mb-4">
                                    This accomplishment reflects not only your individual efforts but also the supportive environment fostered by the BUOU community. We are immensely proud of your achievements.
                                </p>
                            </div>

                            <div class="d-flex gap-3 mt-auto pt-3">
                                <a href="#" class="btn btn-orange px-4 py-2 fw-semibold shadow-sm">
                                    View List of Graduates
                                </a>
                                <a href="#" class="btn btn-outline-dark px-4 py-2 fw-semibold">
                                    Watch Ceremony
                                </a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection