@extends('layouts.app')

@section('content')

    @include('layouts.navbar')

    <div class="selection-menu-wrapper sticky-top bg-white py-3 shadow-sm" style="top: 80px;"> 
        <div class="container">
            <ul class="nav nav-pills justify-content-center gap-2 mb-0" id="buouTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-section" type="button" role="tab" aria-controls="home-section" aria-selected="true">HOME</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="about-tab" data-bs-toggle="tab" data-bs-target="#about-section" type="button" role="tab" aria-controls="about-section" aria-selected="false">ABOUT</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="programs-tab" data-bs-toggle="tab" data-bs-target="#programs-section" type="button" role="tab" aria-controls="programs-section" aria-selected="false">PROGRAMS</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="faculty-tab" data-bs-toggle="tab" data-bs-target="#faculty-section" type="button" role="tab" aria-controls="faculty-section" aria-selected="false">FACULTY</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="news-tab" data-bs-toggle="tab" data-bs-target="#news-section" type="button" role="tab" aria-controls="news-section" aria-selected="false">NEWS</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="graduates-tab" data-bs-toggle="tab" data-bs-target="#graduates-section" type="button" role="tab" aria-controls="graduates-section" aria-selected="false">GRADUATES</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="faqs-tab" data-bs-toggle="tab" data-bs-target="#faqs-section" type="button" role="tab" aria-controls="faqs-section" aria-selected="false">FAQS</button>
                </li>
            </ul>
        </div>
    </div>

    <div class="tab-content" id="buouTabContent">
        
        <!------------------>
        <!-- HOME SECTION -->
        <!------------------>

        <div class="tab-pane fade show active" id="home-section" role="tabpanel" aria-labelledby="home-tab">
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
            
                            <!-- <div class="mt-4 d-flex flex-wrap gap-3">
                                <a href="#" class="btn btn-orange">Apply Now</a>
                                <a href="#" class="btn btn-outline-light">View Programs</a>
                                <a href="#" class="btn btn-outline-light">Contact Us</a>
                            </div> -->
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
        </div>


        <!------------------->
        <!-- ABOUT SECTION -->
        <!------------------->

        <div class="tab-pane fade" id="about-section" role="tabpanel" aria-labelledby="about-tab">
            <section id="about" class="about-section py-5">
                <div class="container">
                    <div class="faq-wrapper mx-auto about-accordion"> 
                        <h2 class="fw-bold mb-4 text-uppercase" style="letter-spacing: 1px; color: #333;">THE BICOL UNIVERSITY OPEN UNIVERSITY</h2>
                        
                        <div class="about-text-content text-muted fs-6 text-justify mb-5" style="line-height: 1.8;">
                            <p class="mb-4">
                                On November 20, 1997, the Bicol University (BU) Board of Regents (BOR) passed BOR Resolution No. 24 series of 1997 which approved the setting up of the BU Open University. The Objective of the BU Open University was to bring the curricular programs of the university to a wider populace of students in the Bicol Region.
                            </p>
                            <p class="mb-4">
                                To fully operationalize BOR Resolution No. 24 in accordance with the present thrust and direction set forth in the BU comprehensive Development Plan, Administrative Order No. 177, series of 2004 was issued to provide the general Implementing guidelines for the operation of the BU Open University. The emphasis of the BU Open University under the present leadership is to initially address the educational capability enhancement need of professionals by offering selected graduate programs via distance education/open learning. The long-term direction of the BU Open University is to eventually offer some baccalaureate courses in support of regional development.
                            </p>
                            <p class="mb-5">
                                The re-structured BU Open University (BUOU) is now mandated to be the degree-offering and eventually a degree-granting academic unit of the University. It was also given authority by the Board of Regents to expand its program offering into offering selected undergraduate courses and non-degree/short term courses needed in the region.
                            </p>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question d-flex justify-content-between align-items-center w-100 py-3 border-bottom" 
                                    type="button" data-bs-toggle="collapse" data-bs-target="#about-objectives">
                                <span class="fw-bold text-uppercase" style="letter-spacing: 0.5px;">OBJECTIVES</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="faq-answer collapse" id="about-objectives">
                                <div class="py-4 text-muted text-justify">
                                    <p>The BU open/Distance Education Program seeks to provide wider access to quality education adhering to the highest standards of academic excellence in order to produce trained manpower required for the development of the Bicol Region. The Program Specially seeks to:</p>
                                    <ul class="mt-3">
                                        <li class="mb-2">Provide wider access to quality education by offering degree programs via the distance education mode;</li>
                                        <li class="mb-2">Establish an innovative system of continuing education of professionals and career development for those unable to avail of the opportunity thru the usual traditional delivery mode; and</li>
                                        <li class="mb-0">Develop instructional materials and technology appropriate for distance education.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question d-flex justify-content-between align-items-center w-100 py-3 border-bottom" 
                                    type="button" data-bs-toggle="collapse" data-bs-target="#about-distance">
                                <span class="fw-bold text-uppercase" style="letter-spacing: 0.5px;">THE DISTANCE LEARNING</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="faq-answer collapse" id="about-distance">
                                <div class="py-4 text-muted text-justify">
                                    <p class="mb-3">Delivery of academic programs via the distance education mode will be thru modular and/or online. The Open University office shall serve as the venue of curricular activities and where student of the program shall convene for the following activities: (a) enrollment; (b) obtaining their modules and other instructional materials; (c) attending tutorials; (d) submitting course requirements; (e) accessing the internet; (f) meeting and interacting with other students; (g) taking proctored examinations; and (h) performing other activities related to the course.</p>
                                    <p class="mb-3">At the present, there is a Distance Learning Office/Center in the Main campus of Bicol University at the third floor of the University Library. The DLC in the main Campus is open to serve students coming from various parts of the region. To better serve a wider segment of the bicolanos, the BU Open University intends to engage in partnership with local government units and other academic institution in the region.</p>
                                    <p class="mb-0">Under AO No. 347 series of 2019 specifying the Revised Implementing Guidelines of BUOU, the Office is manned by the Dean and supported by Core and Affiliate Faculty an Technical Staff to serve as the link between the BUOU and the Distance education students in the region of offshore.</p>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question d-flex justify-content-between align-items-center w-100 py-3 border-bottom" 
                                    type="button" data-bs-toggle="collapse" data-bs-target="#about-delivery">
                                <span class="fw-bold text-uppercase" style="letter-spacing: 0.5px;">MODE OF INSTRUCTIONAL DELIVERY</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="faq-answer collapse" id="about-delivery">
                                <div class="py-4 text-muted text-justify">
                                    <p class="mb-3">The course modules are the basic medium of instructional delivery. These are prepared by Module Development Teams consisting of writers, readers, instructional design specialists, and language editors drawn from the faculty complement of the University. Other instructional materials like video clippings and the like shall also be used in the process of course delivery.</p>
                                    <p class="mb-3">Actual delivery of these course modules is taken care of by Faculty-in-Charge (FIC) and tutors. Each course or subject has a FIC or course supervisor who ensures the attainment of the objectives of the course and who rates or evaluates the performance of distance education students. Performance of students enrolled in the distance education mode is assessed through submitted assignments, exercises and activities, and supervised examinations.</p>
                                    <p class="mb-0">Tutorial sessions are part of the course delivery system of the open university/distance education mode. These are designed to facilitate clarification of topics/issues and ensure informed discussions among module users. Tutorial sessions shall, therefore, be held at the BUOU Office at least once a month or depending on the students need. Facilitating these sessions shall, therefore, be held at the OU Office with the FICS and/or tutors who will be the link with the learners.</p>
                                </div>
                            </div>
                        </div>
                    </div> </div>
            </section>
        </div>

        <!---------------------->
        <!-- PROGRAMS SECTION -->
        <!---------------------->

        <div class="tab-pane fade" id="programs-section" role="tabpanel" aria-labelledby="programs-tab">
            <section id="programs" class="hero-section d-flex align-items-start py-5">
                <div class="container">

                    <div class="row mb-5">
                        <div class="col-lg-12">
                            <span class="badge badge-custom mb-3 text-uppercase">
                                Graduate Programs
                            </span>
                            <div class="section-text text-muted mt-3 text-justify">
                                <p>The BU Open University initially offers selected graduate curricular programs. This is due to the stringent requirement of open learning to have “mature” learners who are capable of undertaking independent self-learning. Due to resource limitation and perceived market, only the following programs will be initially offered thru the open university/distance education mode:</p>
                            </div>
                        </div>
                    </div>

                    <div class="faq-wrapper mx-auto">
                        @php
                            $programs = [
                                [
                                    'title' => 'Doctor of education in Educational Leadership & Management (EdDELM)',
                                    'description' => 'The Doctor of Education in Educational Leadership and Management (EdDELM) is a doctoral degree focused on preparing professionals for leadership and management roles within educational institutions. It equips individuals with advanced knowledge, skills, and practical experience to address challenges and drive positive change in various educational settings.',
                                    'mode' => 'The mode of instructional delivery of EdDELM is through online, often incorporating both synchronous and asynchronous learning activities.',
                                    'nature' => 'The program focuses on developing high-quality leaders and managers in education. It equips individuals with the knowledge, skills, and competencies to lead and manage educational institutions effectively, with a focus on strategic planning, organizational development, and the application of research to practice.',
                                    'target' => 'The Doctor of Education in Educational Leadership and Management (EdDELM) are experienced educational leaders and managers seeking to enhance their knowledge and skills for leadership roles. This includes individuals working in various educational settings like schools, districts, higher education institutions, and even non-profit organizations focused on education.'
                                ],
                                [
                                    'title' => 'Master in Management (MM)',
                                    'description' => 'The Master in Management (MM) program is offered through Bicol University\'s Open University, which provides flexible learning options for graduate students. It aims to develop students’ analysis, development models, organizational change, and project development management.',
                                    'mode' => 'the program is primarily delivered online, allowing students to study at their own pace and location. Bicol University Open University provides learning support through tutorials and counseling at the Distance Learning Center (DLC).',
                                    'nature' => 'The program utilizes Open and Distance e-Learning (ODeL) mode of delivery, with some courses employing Blended Online Learning (BOL) that includes laboratory requirements like internships. Students learn at their own pace and place, using learning materials, e-learning resources, and support from the Distance Learning Center.'
                                ],
                                [
                                    'title' => 'Master of Public Administration (MPA)',
                                    'description' => 'Bicol University (BU) offers a Master in Public Administration (MPA) program through its Graduate School and Open University. The program is designed for both recent graduates and public sector professionals seeking to enhance their knowledge and skills in public administration. It focuses on developing expertise in administrative theories, policy development, and analytical problem-solving, while also emphasizing the values and political context of public service.',
                                    'mode' => 'The main mode of instruction is Open and DIstance e-Learning (ODeL), where students engage with learning packages, e-learning materials, Open Educational Resources (OERs), audio, and video content.',
                                    'nature' => 'MPA focuses on developing public servants, change agents and leaders with advanced competencies and skills for effective management within government, civil society, and international organizations. The program emphasizes developing leadership skills and managerial expertise in public sector contexts.'
                                ],
                                [
                                    'title' => 'Master in Local Government Management (MLGM)',
                                    'description' => 'The Master in Local Government Management (MLGM) program focuses on the theories, principles, and practices related to participatory governance and the interaction between people, local special bodies, and local government units.',
                                    'mode' => 'Open and Distance e-Learning (ODeL) emphasizing self-directed learning with online resources and materials provided by the university, and Blended Online Learning (BOL) which is used for courses with specific on-site or online requirements, integrating online learning with some face-to-face or online interaction.',
                                    'nature' => 'Students engage with learning packages, online resources, and potentially blended learning components for specific courses. Support is provided through tutorials and counseling at the Distance Learning Center, with assessment based on assignments and examinations.'
                                ],
                                [
                                    'title' => 'Master of Arts in Educational Leadership & Management (MAELM)',
                                    'description' => 'The program Master of Arts in Educational Leadership & Management (MAELM) offered through Bicol University Open University. It involves a combination of foundation, major, and cognate courses, along with the master’s thesis. This program aims to develop competence in educational leadership and management, research skills, and expertise in designing educational programs.',
                                    'nature' => 'The Master of Arts in Educational Leadership & Management (MAELM) program focuses on developing leaders who can effectively manage and lead educational institutions. The program emphasizes both theoretical understanding and practical application of leadership and management principles, preparing graduates to address challenges in educational organizations and contribute to community development. Students are expected to engage in research, culminating in a thesis, to enhance their leadership and management practices and contribute to the field\'s knowledge base.'
                                ],
                                [
                                    'title' => 'Master of Arts in English Education (MAEngEd)',
                                    'description' => 'This program is a graduate program designed to develop teachers who are proficient in English instruction and can create innovative teaching materials and research.',
                                    'nature' => 'It focuses on enhancing teachers\' abilities in innovative instructional program design, research, and application of current trends in English instruction. The program emphasizes developing competencies in various methodological approaches to English instruction, curriculum design, and materials development.'
                                ],
                                [
                                    'title' => 'Master of Arts in Social Studies Education (MASocStEd)',
                                    'description' => 'Bicol University offers a Master of Arts in Social Studies Education (MASocStEd) program. This program aims to produce graduates who are highly competent in teaching social studies content and methodology, both at the basic education and college level.',
                                    'nature' => 'This program focuses on developing advanced theoretical and practical competence in social studies teaching and educational leadership. The program emphasizes research skills, curriculum development, and a deep understanding of social and cultural contexts relevant to education. Students will be equipped to become effective educators and catalysts for change within the field of social studies.'
                                ],
                            ];
                        @endphp

                        @foreach($programs as $program)
                        <div class="faq-item">
                            <button class="faq-question d-flex justify-content-between align-items-center w-100 py-3 border-bottom" 
                                    type="button" 
                                    data-bs-toggle="collapse" 
                                    data-bs-target="#prog-{{ \Str::slug($program['title']) }}" 
                                    aria-expanded="false">
                                <span class="fw-bold text-start" style="color: #333;">{{ $program['title'] }}</span>
                                <span class="icon">+</span>
                            </button>

                            <div class="faq-answer collapse" id="prog-{{ \Str::slug($program['title']) }}">
                                <div class="py-4 text-muted text-justify">
                                    <p class="mb-3">{{ $program['description'] }}</p>
                                    
                                    @if(isset($program['mode']))
                                        <p class="mb-3"><strong>Mode of Instructional Delivery:</strong> {{ $program['mode'] }}</p>
                                    @endif
                                    
                                    <p class="mb-3"><strong>Nature of the Field Study:</strong> {{ $program['nature'] }}</p>
                                    
                                    @if(isset($program['target']))
                                        <p class="mb-0"><strong>Target Clients:</strong> {{ $program['target'] }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </section>
        </div>

        <!--------------------->
        <!-- FACULTY SECTION -->
        <!--------------------->

        <div class="tab-pane fade" id="faculty-section" role="tabpanel" aria-labelledby="faculty-tab">
            <section id="faculty" class="faculty-section py-5">
                <div class="container">

                    <div class="text-center mb-5">
                        <h2 class="faculty-title">BU OPEN UNIVERSITY FACULTY</h2>
                        <p class="faculty-subtitle">A.Y. 2025–2026</p>
                    </div>

                    <div class="row align-items-center faculty-card gy-4 mb-5">
                        <div class="col-md-4 text-center">
                            <div class="faculty-image-wrapper">
                                <img src="{{ asset('images/faculty/MARIA JANE B. MASCARIÑAS.jpg') }}" alt="MARIA JANE B. MASCARIÑAS" class="faculty-image">
                            </div>
                        </div>

                        <div class="col-md-8">
                            <h4 class="faculty-name">MARIA JANE B. MASCARIÑAS, PhD</h4>
                            <p class="faculty-position">Professor VI / Graduate Faculty</p>

                            <ul class="faculty-credentials">
                                <li>Bachelor of Science in Agribusiness <span>(BU College of Agriculture, 1985)</span></li>
                                <li>Master of Management major in Rural Development Management <span>(University of the Philippines Los Baños, 1991)</span></li>
                                <li>PhD in Extension Education, minor in Environmental Studies <span>(University of the Philippines Los Baños, 1995)</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row align-items-center faculty-card gy-4 mb-5">
                        <div class="col-md-4 text-center">
                            <div class="faculty-image-wrapper">
                                <img src="{{ asset('images/faculty/MELINDA D. DE GUZMAN.jpg') }}" alt="MELINDA D. DE GUZMAN" class="faculty-image">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h4 class="faculty-name">MELINDA D. DE GUZMAN, EdD</h4>
                            <p class="faculty-position">Professor VI/ Program Adviser</p>
                            <ul class="faculty-credentials">
                                <li>Bachelors of Science in Nursing <span>(Bicol University College of Nursing, 1985)</span></li>
                                <li>Methods of Teaching <span>(Bicol University, 1987)</span></li>
                                <li>Master in Management <span>(Bicol University Graduate School, 1989)</span></li>
                                <li>MA in Educational Leadership and Management <span>(MAELM)</span> and EdD in Educational Leadership and Management <span>(EdDELM)</span></li>
                                <li>EdD Educational Management <span>(Bicol University Graduate School, 1993)</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row align-items-center faculty-card gy-4 mb-5">
                        <div class="col-md-4 text-center">
                            <div class="faculty-image-wrapper">
                                <img src="{{ asset('images/faculty/EMILY M. AGONOS.jpg') }}" alt="EMILY M. AGONOS" class="faculty-image">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h4 class="faculty-name">EMILY M. AGONOS, PhD</h4>
                            <p class="faculty-position">Associate Professor V/Program Adviser</p>
                            <ul class="faculty-credentials">
                                <li>Master in Management <span>(MM)</span></li>
                                <li>BS Commerce Accounting <span>(1989)</span></li>
                                <li>CCT <span>(2003)</span> - <span>(Bicol University)</span></li>
                                <li>Master in Management <span>(Bicol University Graduate School)</span></li>
                                <li>PhD in Development Management <span>(Bicol University Graduate School, 2018)</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row align-items-center faculty-card gy-4 mb-5">
                        <div class="col-md-4 text-center">
                            <div class="faculty-image-wrapper">
                                <img src="{{ asset('images/faculty/RAMON T. DE LEON.jpg') }}" alt="RAMON T. DE LEON" class="faculty-image">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h4 class="faculty-name">RAMON T. DE LEON, PhD</h4>
                            <p class="faculty-position">Associate Professor I/ Program Adviser</p>
                            <ul class="faculty-credentials">
                                <li>Master in Local Government Management <span>(MLGM)</span></li>
                                <li>MA in Social Studies Education <span>(MASocStEd)</span></li>
                                <li>AB Economics <span>(Adamson University-Manila, 1987)</span></li>
                                <li>Master in Business Administration <span>(Divine Word College of Legazpi, 1995)</span></li>
                                <li>PhD in Counselor Education <span>(University of Santo Tomas, 2012)</span></li>
                                <li>PhD in Counseling Psychology <span>(Cand.) (De la Salle University - Manila)</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row align-items-center faculty-card gy-4 mb-5">
                        <div class="col-md-4 text-center">
                            <div class="faculty-image-wrapper">
                                <img src="{{ asset('images/faculty/ROLDAN C. CABILES.jpg') }}" alt="ROLDAN C. CABILES" class="faculty-image">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h4 class="faculty-name">ROLDAN C. CABILES, PhD</h4>
                            <p class="faculty-position">Assistant Professor II/ Program Adviser</p>
                            <ul class="faculty-credentials">
                                <li>MA in English Education <span>(MAEngEd)</span></li>
                                <li>Bachelor of Secondary Education major in English <span>(Bicol University College of Education, 2015)</span></li>
                                <li>Master of Arts in English Education <span>(Bicol University Graduate School, 2018)</span></li>
                                <li>PhD in Educational Foundations <span>(Bicol University Graduate School, 2021)</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row align-items-center faculty-card gy-4 mb-5">
                        <div class="col-md-4 text-center">
                            <div class="faculty-image-wrapper">
                                <img src="{{ asset('images/faculty/JOSE CARLO B. LAVAPIE.jpg') }}" alt="JOSE CARLO B. LAVAPIE" class="faculty-image">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h4 class="faculty-name">JOSE CARLO B. LAVAPIE, MPA</h4>
                            <p class="faculty-position">Assistant Professor I/ Program Adviser</p>
                            <ul class="faculty-credentials">
                                <li>Master in Public Administration <span>(MPA)</span></li>
                                <li>Bachelor of Arts major in Philosophy minor in Religious Education <span>(Holy Rosary Minor Seminary)</span></li>
                                <li>PhD in Extension Education, minor in Environmental Studies <span>(University of the Philippines Los Baños, 1995)</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row align-items-center faculty-card gy-4 mb-5">
                        <div class="col-md-4 text-center">
                            <div class="faculty-image-wrapper">
                                <img src="{{ asset('images/faculty/PROF. ROLLIE N. MONTEALEGRE.jpg') }}" alt="PROF. ROLLIE N. MONTEALEGRE" class="faculty-image">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h4 class="faculty-name">PROF. ROLLIE N. MONTEALEGRE</h4>
                            <p class="faculty-position">Instructor I</p>
                            <ul class="faculty-credentials">
                                <li>Bachelor of Science in Computer Science <span>(Bicol University College of Science, 2006)</span></li>
                                <li>Master in Information System <span>(Bicol University Graduate School)</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row align-items-center faculty-card gy-4 mb-5">
                        <div class="col-md-4 text-center">
                            <div class="faculty-image-wrapper">
                                <img src="{{ asset('images/faculty/JULIE ANNE C. QUIÑONES.jpg') }}" alt="JULIE ANNE C. QUIÑONES" class="faculty-image">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h4 class="faculty-name">JULIE ANNE C. QUIÑONES</h4>
                            <ul class="faculty-credentials">
                                <li>Bachelor in Secondary Education Major in Biological Science</li>
                                <li>Master of Arts in Biology Education</li>
                                <li>Doctor of Education in Educational Leadership and Management</li>
                            </ul>
                        </div>
                    </div>

                    <hr class="my-5">

                    <div class="text-center mb-5">
                        <h2 class="faculty-title">AFFILIATE FACULTY</h2>
                        <p class="faculty-subtitle">A.Y. 2025–2026</p>
                    </div>

                    <div class="row align-items-center faculty-card gy-4 mb-5">
                        <div class="col-md-4 text-center">
                            <div class="faculty-image-wrapper">
                                <img src="{{ asset('images/faculty/RAMESIS M. LORINO, PhD .jpg') }}" alt="RAMESIS M. LORINO, PhD " class="faculty-image">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h4 class="faculty-name">RAMESIS M. LORINO, PhD </h4>
                            <ul class="faculty-credentials">
                                <li>Master of Public Administration <span>(MPA)</span></li>
                                <li>BSBA Management <span>(Bicol University, 1990)</span></li>
                                <li>Master in Mgt. major in Public Management <span>(Tabaco College, 2003)</span></li>
                                <li>PhD Public Administration <span>(Bicol University Graduate School, 2009)</span></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </section>
        </div>

        <!------------------>
        <!-- NEWS SECTION -->
        <!------------------>

        <div class="tab-pane fade" id="news-section" role="tabpanel" aria-labelledby="news-tab">
            <section id="news" class="hero-section position-relative py-5">
                <div class="container">
                    <div class="text-center mb-5">
                        <span class="badge news-bg-orange text-black px-3 py-2 rounded-pill mb-3">📰 BUOU Updates</span>
                        <h2 class="text-black fw-bold display-6">Latest News & Announcements</h2>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="news-card">
                                <div class="news-img-wrapper"><img src="https://images.unsplash.com/photo-1544531586-fde5298cdd40?q=80&w=600" class="img-fluid" alt="News"></div>
                                <div class="news-body"><h5 class="news-title">Anniversary Celebration</h5><p class="news-text">Celebrating decades of quality distance education.</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!----------------------->
        <!-- GRADUATES SECTION -->
        <!----------------------->

        <div class="tab-pane fade" id="graduates-section" role="tabpanel" aria-labelledby="graduates-tab">
            <section id="graduates" class="grad-section-split py-5">
                <div class="container">
                    <div class="grad-card shadow-lg overflow-hidden rounded-4 bg-white">
                        <div class="row g-0 align-items-stretch">
                            <div class="col-lg-5 position-relative">
                                <div class="grad-img-holder h-100">
                                    <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=600&auto=format&fit=crop"
                                        alt="Class of 2025" class="img-fluid w-100 h-100 object-fit-cover">
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
                                            The Bicol University Open University extends its warmest congratulations to you. Your
                                            unwavering commitment to your studies, despite the challenges of pursuing education
                                            through a non-traditional format, is a testament to your <strong
                                                class="text-orange">resilience and dedication</strong>.
                                        </p>
                                        <p class="mb-4">
                                            This accomplishment reflects not only your individual efforts but also the supportive
                                            environment fostered by the BUOU community. We are immensely proud of your achievements.
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
        </div>

        <!------------------>
        <!-- FAQs SECTION -->
        <!------------------>                                

        <div class="tab-pane fade" id="faqs-section" role="tabpanel" aria-labelledby="faqs-tab">
            <section id="faqs" class="hero-section d-flex align-items-center">
                <div class="container">
                    <div class="text-center mb-3">
                        <span class="badge news-bg-orange text-black px-3 py-2 rounded-pill">
                            📰 BUOU FAQS
                        </span>
                    </div>
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
                                    <li>One Original and One photocopy of official Transcript of Records (TOR) from college
                                        previously attended.</li>
                                    <li>Photocopy of Special Order (for graduates of Private School)</li>
                                    <li>Copy of honorable dismissal from school last attended.</li>
                                    <li>Two letters for recommendation preferably from former professors.</li>
                                    <li>Photocopy of Birth Certificate (NSO or PSA).</li>
                                    <li>Photocopy of Marriage Contract (for married female applicants).</li>
                                    <li>Certificate of English Proficiency for Foreign students. Required TOEFL score for admission
                                        is 460 (Additional requirement for International Applicants).</li>
                                </ul>
                                <p><strong>The following documents (Duly Accomplished Application Form (BUGS Form 1 & Recommendation
                                        for Graduate Study Form) are available at the BUGS Office or can be downloaded at the BUGS
                                        Open Access Drive at:</strong></p>
                                <a class="btn btn-orange"
                                    href="https://drive.google.com/drive/u/5/folders/1JKlEhnDs_oJ-4kt461kWpkepN1osYG1M"
                                    target="_blank" class="faq-link">
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
                                            <li>1.2. Check the availability of the venue, facility or equipment.The processing time
                                                would be 3-5 minutes per transaction. </li>
                                            <li>1.3 Forward the communication to the Dean.</li>
                                            <li>1.4. Act on the received communication such as approval, endorsement and other
                                                appropriate action. The processing time usually takes 3-5 minutes</li>
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
                                            <li>1.2 Assign reference number to the document, classifying as to kind of documents and
                                                record it in the logbook.</li>
                                            <li>1.3 Forward the communication to the Dean.</li>
                                            <li>1.4 Act on the received communication/documents such as approval, endorsement, and
                                                other appropriate action.</li>
                                            <li>1.5 Encode/record the action of the Dean such as endorsement , memorandum,routing
                                                slip or transmittal letter.</li>
                                            <li>1.6 Forward the communication, memorandum or transmittal letter for review/signature
                                                of the Dean.</li>
                                            <li>1.7 Reproductive copies for dissemination to the concerned persons.</li>
                                            <li>1.8 Record and release communications/documents to concerned personnel/faculty
                                                and/or dissemination.</li>
                                            <li>1.9 Delivery/disseminate the communication/documents acted upon by the Dean.</li>
                                            <li>1.10 Store a received/disseminated file copy of the documents in labeled folders,
                                                boxes and shelves.</li>
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
                                <p><strong>The following documents can be downloaded in the Open Access Drive of BU Graduate School
                                        Facebook Page, BUOU Facebook page and Bicol University Website.</strong></p>
            
                                <ol>
                                    <li>Client’s Steps:
                                        <ol class="sub-list">
                                            <li>1. Submit the required documents and wait for the notification either online or
                                                onsite. </li>
                                            <li>2. For new students: The student/Client receives the Certificate of Registration and
                                                contact the ICTO for official BU email address. </li>
                                            <li>3. The student informs his/her Faculty in Charge (FIC) as a member of the class.
                                            </li>
                                        </ol>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>

@endsection