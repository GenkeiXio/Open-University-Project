@extends('layouts.app')

@section('content')

    @include('layouts.navbar')

    <div class="selection-menu-wrapper sticky-top py-3" style="top: 80px;"> 
        <div class="container">
            <ul class="nav nav-pills justify-content-center gap-2 mb-0" id="buouTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-section" type="button" role="tab">HOME</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="about-tab" data-bs-toggle="tab" data-bs-target="#about-section" type="button" role="tab">ABOUT</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="programs-tab" data-bs-toggle="tab" data-bs-target="#programs-section" type="button" role="tab">PROGRAMS</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="faculty-tab" data-bs-toggle="tab" data-bs-target="#faculty-section" type="button" role="tab">FACULTY</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="news-tab" data-bs-toggle="tab" data-bs-target="#news-section" type="button" role="tab">NEWS</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="graduates-tab" data-bs-toggle="tab" data-bs-target="#graduates-section" type="button" role="tab">GRADUATES</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="faqs-tab" data-bs-toggle="tab" data-bs-target="#faqs-section" type="button" role="tab">FAQS</button>
                </li>
            </ul>
        </div>
    </div>

    <div class="tab-content" id="buouTabContent">
        
        <!------------------>
        <!-- HOME SECTION -->
        <!------------------>

        <div class="tab-pane fade show active" id="home-section" role="tabpanel" aria-labelledby="home-tab">
            <section id="home" class="hero-section py-5 bg-white">
                <div class="container">
                    <div class="row align-items-center gy-5">
            
                        <div class="col-lg-6 text-start">
                            <span class="badge badge-custom mb-3">
                                🎓 Distance Education Excellence
                            </span>
            
                            <h1 class="hero-title mt-2">
                                <span class="text-gradient-orange">BICOL UNIVERSITY</span><br>
                                <span class="text-gradient-blue">OPEN UNIVERSITY</span>
                            </h1>
            
                            <p class="hero-text mt-4 text-muted justify-content-center">
                                Empowering learners anywhere through open and distance learning.
                                Achieve your academic goals with Bicol University Open University.
                            </p>
                        </div>
            
                        <div class="col-lg-6">
                            <div class="row g-4">
            
                                <div class="col-md-6">
                                    <div class="stat-card border-0 shadow-sm rounded-4">
                                        <div class="fs-2 mb-2">📘</div>
                                        <h3 class="fw-bold text-gradient-blue">5+</h3>
                                        <p class="text-muted small text-uppercase fw-semibold">Graduate Programs</p>
                                    </div>
                                </div>
            
                                <div class="col-md-6">
                                    <div class="stat-card border-0 shadow-sm rounded-4">
                                        <div class="fs-2 mb-2">👥</div>
                                        <h3 class="fw-bold text-gradient-blue">500+</h3>
                                        <p class="text-muted small text-uppercase fw-semibold">Enrolled Students</p>
                                    </div>
                                </div>
            
                                <div class="col-12">
                                    <div class="stat-card wide border-0 shadow-sm rounded-4">
                                        <div class="fs-2 mb-2">🎓</div>
                                        <h3 class="fw-bold text-gradient-blue">100%</h3>
                                        <p class="text-muted small text-uppercase fw-semibold">Flexible Online & Modular Learning</p>
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
            <section id="about" class="about-section py-5 bg-white">
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
                    </div> 
                </div>
            </section>
        </div>  

        <!---------------------->
        <!-- PROGRAMS SECTION -->
        <!---------------------->

        <div class="tab-pane fade" id="programs-section" role="tabpanel" aria-labelledby="programs-tab">
            <section id="programs" class="about-section py-5 bg-white">
                <div class="container">

                    <div class="faq-wrapper mx-auto mb-5">
                        <span class="badge badge-custom mb-3 text-uppercase">
                            Graduate Programs
                        </span>
                        <div class="section-text text-muted mt-3 text-justify fs-6" style="line-height: 1.8;">
                            <p>The BU Open University initially offers selected graduate curricular programs. This is due to the stringent requirement of open learning to have “mature” learners who are capable of undertaking independent self-learning. Due to resource limitation and perceived market, only the following programs will be initially offered thru the open university/distance education mode:</p>
                        </div>
                    </div>
                    <div class="faq-wrapper mx-auto about-accordion"> 
                        <h2 class="fw-bold mb-4 text-uppercase" style="letter-spacing: 1px; color: #333;">PROGRAMS</h2>
                        
                        <div class="about-text-content text-muted fs-6 text-justify mb-5" style="line-height: 1.8;">
                            <h5 class="fw-bold text-dark text-uppercase mb-3" style="font-size: 1rem; letter-spacing: 0.5px;">Graduate Programs</h5>
                            <p>
                                The BU Open University initially offers selected graduate curricular programs. This is due to the stringent requirement of open learning to have “mature” learners who are capable of undertaking independent self-learning. Due to resource limitation and perceived market, only the following programs will be initially offered thru the open university/distance education mode:
                            </p>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question d-flex justify-content-between align-items-center w-100 py-3 border-bottom" 
                                    type="button" data-bs-toggle="collapse" data-bs-target="#prog-eddelm">
                                <span class="fw-bold text-uppercase" style="letter-spacing: 0.5px;">Doctor of education in Educational Leadership & Management (EdDELM)</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="faq-answer collapse" id="prog-eddelm">
                                <div class="py-4 text-muted text-justify">
                                    <p class="mb-3">The Doctor of Education in Educational Leadership and Management (EdDELM) is a doctoral degree focused on preparing professionals for leadership and management roles within educational institutions. It equips individuals with advanced knowledge, skills, and practical experience to address challenges and drive positive change in various educational settings.</p>
                                    <p class="mb-3"><strong>Mode of Instructional Delivery:</strong> The mode of instructional delivery of EdDELM is through online, often incorporating both synchronous and asynchronous learning activities.</p>
                                    <p class="mb-3"><strong>Nature of the Field Study:</strong> The program focuses on developing high-quality leaders and managers in education. It equips individuals with the knowledge, skills, and competencies to lead and manage educational institutions effectively, with a focus on strategic planning, organizational development, and the application of research to practice.</p>
                                    <p class="mb-0"><strong>Target Clients:</strong> The Doctor of Education in Educational Leadership and Management (EdDELM) are experienced educational leaders and managers seeking to enhance their knowledge and skills for leadership roles.</p>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question d-flex justify-content-between align-items-center w-100 py-3 border-bottom" 
                                    type="button" data-bs-toggle="collapse" data-bs-target="#prog-mm">
                                <span class="fw-bold text-uppercase" style="letter-spacing: 0.5px;">Master in Management (MM)</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="faq-answer collapse" id="prog-mm">
                                <div class="py-4 text-muted text-justify">
                                    <p class="mb-3">The Master in Management (MM) program is offered through Bicol University's Open University, which provides flexible learning options for graduate students. It aims to develop students’ analysis, development models, organizational change, and project development management.</p>
                                    <p class="mb-3"><strong>Mode of Instructional Delivery:</strong> The program is primarily delivered online, allowing students to study at their own pace and location. Bicol University Open University provides learning support through tutorials and counseling at the Distance Learning Center (DLC).</p>
                                    <p class="mb-0"><strong>Nature of the Field Study:</strong> The program utilizes Open and Distance e-Learning (ODeL) mode of delivery, with some courses employing Blended Online Learning (BOL) that includes laboratory requirements like internships.</p>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question d-flex justify-content-between align-items-center w-100 py-3 border-bottom" 
                                    type="button" data-bs-toggle="collapse" data-bs-target="#prog-mpa">
                                <span class="fw-bold text-uppercase" style="letter-spacing: 0.5px;">Master of Public Administration (MPA)</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="faq-answer collapse" id="prog-mpa">
                                <div class="py-4 text-muted text-justify">
                                    <p class="mb-3">The program is designed for both recent graduates and public sector professionals seeking to enhance their knowledge and skills in public administration. It focuses on developing expertise in administrative theories, policy development, and analytical problem-solving.</p>
                                    <p class="mb-3"><strong>Mode of Instructional Delivery:</strong> The main mode of instruction is Open and Distance e-Learning (ODeL), where students engage with learning packages, e-learning materials, and Open Educational Resources (OERs).</p>
                                    <p class="mb-0"><strong>Nature of the Field Study:</strong> MPA focuses on developing public servants, change agents and leaders with advanced competencies and skills for effective management within government and civil society.</p>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question d-flex justify-content-between align-items-center w-100 py-3 border-bottom" 
                                    type="button" data-bs-toggle="collapse" data-bs-target="#prog-mlgm">
                                <span class="fw-bold text-uppercase" style="letter-spacing: 0.5px;">Master in Local Government Management (MLGM)</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="faq-answer collapse" id="prog-mlgm">
                                <div class="py-4 text-muted text-justify">
                                    <p class="mb-3">The program focuses on the theories, principles, and practices related to participatory governance and the interaction between people, local special bodies, and local government units.</p>
                                    <p class="mb-3"><strong>Mode of Instructional Delivery:</strong> Open and Distance e-Learning (ODeL) emphasizing self-directed learning with online resources, and Blended Online Learning (BOL) for specific requirements.</p>
                                    <p class="mb-0"><strong>Nature of the Field Study:</strong> Students engage with learning packages and online resources. Support is provided through tutorials and counseling at the Distance Learning Center.</p>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question d-flex justify-content-between align-items-center w-100 py-3 border-bottom" 
                                    type="button" data-bs-toggle="collapse" data-bs-target="#prog-maelm">
                                <span class="fw-bold text-uppercase" style="letter-spacing: 0.5px;">Master of Arts in Educational Leadership & Management (MAELM)</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="faq-answer collapse" id="prog-maelm">
                                <div class="py-4 text-muted text-justify">
                                    <p class="mb-3">It involves a combination of foundation, major, and cognate courses, along with the master’s thesis. This program aims to develop competence in educational leadership and management.</p>
                                    <p class="mb-0"><strong>Nature of the Field Study:</strong> The program focuses on developing leaders who can effectively manage and lead educational institutions, emphasizing both theoretical understanding and practical application of leadership principles.</p>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question d-flex justify-content-between align-items-center w-100 py-3 border-bottom" 
                                    type="button" data-bs-toggle="collapse" data-bs-target="#prog-maenged">
                                <span class="fw-bold text-uppercase" style="letter-spacing: 0.5px;">Master of Arts in English Education (MAEngEd)</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="faq-answer collapse" id="prog-maenged">
                                <div class="py-4 text-muted text-justify">
                                    <p class="mb-3">This program is a graduate program designed to develop teachers who are proficient in English instruction and can create innovative teaching materials and research.</p>
                                    <p class="mb-0"><strong>Nature of the Field Study:</strong> It focuses on enhancing teachers' abilities in innovative instructional program design, research, and application of current trends in English instruction.</p>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question d-flex justify-content-between align-items-center w-100 py-3 border-bottom" 
                                    type="button" data-bs-toggle="collapse" data-bs-target="#prog-masocsted">
                                <span class="fw-bold text-uppercase" style="letter-spacing: 0.5px;">Master of Arts in Social Studies Education (MASocStEd)</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="faq-answer collapse" id="prog-masocsted">
                                <div class="py-4 text-muted text-justify">
                                    <p class="mb-3">This program aims to produce graduates who are highly competent in teaching social studies content and methodology, both at the basic education and college level.</p>
                                    <p class="mb-0"><strong>Nature of the Field Study:</strong> Focuses on developing advanced theoretical and practical competence in social studies teaching and educational leadership, curriculum development, and social contexts.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>

        <!--------------------->
        <!-- FACULTY SECTION -->
        <!--------------------->

        <div class="tab-pane fade" id="faculty-section" role="tabpanel" aria-labelledby="faculty-tab">
            <section id="faculty" class="faculty-section py-5 bg-white">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 text-center mb-5">
                            <h2 class="faculty-title text-uppercase" style="letter-spacing: 1px;">BU Open University Faculty</h2>
                            <p class="faculty-subtitle text-muted">A.Y. 2025–2026</p>
                        </div>
                    </div>

                    @php
                        $faculties = [
                            [
                                'name' => 'MARIA JANE B. MASCARIÑAS, PhD',
                                'position' => 'Professor VI / Graduate Faculty',
                                'image' => 'MaamMaria.jpg',
                                'credentials' => [
                                    'Bachelor of Science in Agribusiness (BU College of Agriculture, 1985)',
                                    'Master of Management major in Rural Development Management (University of the Philippines Los Baños, 1991)',
                                    'PhD in Extension Education, minor in Environmental Studies (University of the Philippines Los Baños, 1995)'
                                ]
                            ],
                            [
                                'name' => 'MELINDA D. DE GUZMAN, EdD',
                                'position' => 'Professor VI/ Program Adviser',
                                'image' => 'MaamMelinda.jpg',
                                'credentials' => [
                                    'Bachelors of Science in Nursing (Bicol University College of Nursing, 1985)',
                                    'Methods of Teaching (Bicol University, 1987)',
                                    'Master in Management (Bicol University Graduate School, 1989)',
                                    'MA in Educational Leadership and Management (MAELM) and EdD in Educational Leadership and Management (EdDELM)',
                                    'EdD Educational Management (Bicol University Graduate School, 1993)'
                                ]
                            ],
                            [
                                'name' => 'EMILY M. AGONOS, PhD',
                                'position' => 'Associate Professor V/Program Adviser',
                                'image' => 'MaamEmily.jpg',
                                'credentials' => [
                                    'Master in Management (MM)',
                                    'BS Commerce Accounting (1989)',
                                    'CCT (2003) - (Bicol University)',
                                    'Master in Management (Bicol University Graduate School)',
                                    'PhD in Development Management (Bicol University Graduate School, 2018)'
                                ]
                            ],
                            [
                                'name' => 'RAMON T. DE LEON, PhD',
                                'position' => 'Associate Professor I/ Program Adviser',
                                'image' => 'SirRamon.jpg',
                                'credentials' => [
                                    'Master in Local Government Management (MLGM)',
                                    'MA in Social Studies Education (MASocStEd)',
                                    'AB Economics (Adamson University-Manila, 1987)',
                                    'Master in Business Administration (Divine Word College of Legazpi, 1995)',
                                    'PhD in Counselor Education (University of Santo Tomas, 2012)',
                                    'PhD in Counseling Psychology (Cand.) (De la Salle University - Manila)'
                                ]
                            ],
                            [
                                'name' => 'ROLDAN C. CABILES, PhD',
                                'position' => 'Assistant Professor II/ Program Adviser',
                                'image' => 'SirRoldan.jpg',
                                'credentials' => [
                                    'MA in English Education (MAEngEd)',
                                    'Bachelor of Secondary Education major in English (Bicol University College of Education, 2015)',
                                    'Master of Arts in English Education (Bicol University Graduate School, 2018)',
                                    'PhD in Educational Foundations (Bicol University Graduate School, 2021)'
                                ]
                            ],
                            [
                                'name' => 'JOSE CARLO B. LAVAPIE, MPA',
                                'position' => 'Assistant Professor I/ Program Adviser',
                                'image' => 'SirJose.jpg',
                                'credentials' => [
                                    'Master in Public Administration (MPA)',
                                    'Bachelor of Arts major in Philosophy minor in Religious Education (Holy Rosary Minor Seminary)',
                                    'PhD in Extension Education, minor in Environmental Studies (University of the Philippines Los Baños, 1995)'
                                ]
                            ],
                            [
                                'name' => 'PROF. ROLLIE N. MONTEALEGRE',
                                'position' => 'Instructor I',
                                'image' => 'SirRollie.jpg',
                                'credentials' => [
                                    'Bachelor of Science in Computer Science (Bicol University College of Science, 2006)',
                                    'Master in Information System (Bicol University Graduate School)'
                                ]
                            ],
                            [
                                'name' => 'JULIE ANNE C. QUIÑONES',
                                'position' => 'Faculty Member',
                                'image' => 'MaamJulie.jpg',
                                'credentials' => [
                                    'Bachelor in Secondary Education Major in Biological Science',
                                    'Master of Arts in Biology Education',
                                    'Doctor of Education in Educational Leadership and Management'
                                ]
                            ],
                        ];
                    @endphp

                    <div class="row justify-content-center">
                        <div class="col-lg-10"> @foreach($faculties as $faculty)
                                <div class="row align-items-center faculty-card gy-4 mb-5 border-0 shadow-sm rounded-4 p-4">
                                    <div class="col-md-4">
                                        <div class="faculty-image-wrapper">
                                            <img src="{{ asset('assets/Faculty/' . $faculty['image']) }}" 
                                                alt="{{ $faculty['name'] }}" 
                                                class="faculty-image">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <h4 class="faculty-name fw-bold mb-1" style="color: #2c3e50;">{{ $faculty['name'] }}</h4>
                                        <p class="faculty-position text-muted mb-3">{{ $faculty['position'] }}</p>

                                        <ul class="faculty-credentials list-unstyled">
                                            @foreach($faculty['credentials'] as $credential)
                                                <li class="mb-2 text-muted" style="font-size: 0.95rem; line-height: 1.6;">
                                                    {{ $credential }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </section>
        </div>

        <!------------------>
        <!-- NEWS SECTION -->
        <!------------------>

        <div class="tab-pane fade" id="news-section" role="tabpanel" aria-labelledby="news-tab">
            <section id="news" class="about-section py-5">
            <section id="news" class="py-5">
                <div class="container">
                    <div class="faq-wrapper mx-auto about-accordion"> 
                        
                        <div class="text-center mb-5">
                            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill mb-3" style="letter-spacing: 0.5px;">📰 BUOU UPDATES</span>
                            <h2 class="fw-bold text-uppercase" style="letter-spacing: 1px; color: #333;">Latest News & Announcements</h2>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question d-flex justify-content-between align-items-center w-100 py-3 border-bottom" 
                                    type="button" data-bs-toggle="collapse" data-bs-target="#news-enrollment">
                                <span class="fw-bold text-uppercase" style="letter-spacing: 0.5px;">Enrollment for 2nd Semester AY 2025-2026</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="faq-answer collapse show" id="news-enrollment">
                                <div class="py-4 text-muted text-justify">
                                    <div class="news-img-wrapper mb-3 text-center">
                                        <img src="https://images.unsplash.com/photo-1523050335392-93851179ae22?q=80&w=800" class="img-fluid rounded shadow-sm" alt="Enrollment" style="max-height: 300px; width: 100%; object-fit: cover;">
                                    </div>
                                    <p class="mb-3">The Bicol University Open University (BUOU) is now accepting applicants for the 2nd Semester of the Academic Year 2025-2026. The general enrollment period for graduate and undergraduate programs is currently underway.</p>
                                    <p class="mb-0 small text-uppercase fw-bold text-primary">Status: Ongoing</p>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question d-flex justify-content-between align-items-center w-100 py-3 border-bottom" 
                                    type="button" data-bs-toggle="collapse" data-bs-target="#news-anniversary">
                                <span class="fw-bold text-uppercase" style="letter-spacing: 0.5px;">BUOU Marks 27th Founding Anniversary</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="faq-answer collapse" id="news-anniversary">
                                <div class="py-4 text-muted text-justify">
                                    <div class="news-img-wrapper mb-3 text-center">
                                        <img src="https://images.unsplash.com/photo-1544531586-fde5298cdd40?q=80&w=800" class="img-fluid rounded shadow-sm" alt="Anniversary" style="max-height: 300px; width: 100%; object-fit: cover;">
                                    </div>
                                    <p class="mb-3">BUOU recently celebrated its 27th anniversary with the theme "Embracing a Global and Inclusive Learning Culture." The event highlighted the university's commitment to providing quality distance education to students across the Bicol region and beyond.</p>
                                    <p class="mb-0 small italic">Posted: November 2025</p>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question d-flex justify-content-between align-items-center w-100 py-3 border-bottom" 
                                    type="button" data-bs-toggle="collapse" data-bs-target="#news-ibusis">
                                <span class="fw-bold text-uppercase" style="letter-spacing: 0.5px;">Transition to iBU (New Student Portal)</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="faq-answer collapse" id="news-ibusis">
                                <div class="py-4 text-muted text-justify">
                                    <p class="mb-3">In line with the university's digitalization efforts, the official student portal has migrated from iBUSIS to the new <strong>iBU</strong> platform. Students are encouraged to update their bookmarks and synchronize their accounts for seamless access to grades and enrollment data.</p>
                                    <p class="mb-0 small text-uppercase fw-bold text-danger">Notice: Required Action for All Students</p>
                                </div>
                    <div class="faq-wrapper mx-auto news-accordion"> 
                        
                        <div class="text-center mb-5">
                            <span class="badge news-bg-orange text-white px-3 py-2 rounded-pill mb-3" style="letter-spacing: 0.5px;">📰 BUOU UPDATES</span>
                            <h2 class="fw-bold text-uppercase" style="letter-spacing: 1px; color: #333;">Latest News & Announcements</h2>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question d-flex justify-content-between align-items-center w-100 py-3 border-bottom" 
                                    type="button" data-bs-toggle="collapse" data-bs-target="#news-item-enrollment">
                                <span class="fw-bold text-uppercase" style="letter-spacing: 0.5px;">Enrollment for 2nd Semester AY 2025-2026</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="faq-answer collapse" id="news-item-enrollment">
                                <div class="py-4 text-muted text-justify">
                                    <div class="news-img-wrapper mb-3 text-center">
                                        <img src="https://images.unsplash.com/photo-1523050335392-93851179ae22?q=80&w=800" class="img-fluid rounded shadow-sm" alt="Enrollment" style="max-height: 300px; width: 100%; object-fit: cover;">
                                    </div>
                                    <p class="mb-3">The Bicol University Open University (BUOU) is now accepting applicants for the 2nd Semester of the Academic Year 2025-2026. The general enrollment period for graduate and undergraduate programs is currently underway.</p>
                                    <p class="mb-0 small text-uppercase fw-bold text-primary">Status: Ongoing</p>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question d-flex justify-content-between align-items-center w-100 py-3 border-bottom" 
                                    type="button" data-bs-toggle="collapse" data-bs-target="#news-item-anniversary">
                                <span class="fw-bold text-uppercase" style="letter-spacing: 0.5px;">BUOU Marks 27th Founding Anniversary</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="faq-answer collapse" id="news-item-anniversary">
                                <div class="py-4 text-muted text-justify">
                                    <div class="news-img-wrapper mb-3 text-center">
                                        <img src="https://images.unsplash.com/photo-1544531586-fde5298cdd40?q=80&w=800" class="img-fluid rounded shadow-sm" alt="Anniversary" style="max-height: 300px; width: 100%; object-fit: cover;">
                                    </div>
                                    <p class="mb-3">BUOU recently celebrated its 27th anniversary with the theme "Embracing a Global and Inclusive Learning Culture." The event highlighted the university's commitment to providing quality distance education to students across the Bicol region and beyond.</p>
                                    <p class="mb-0 small italic">Posted: November 2025</p>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question d-flex justify-content-between align-items-center w-100 py-3 border-bottom" 
                                    type="button" data-bs-toggle="collapse" data-bs-target="#news-item-portal">
                                <span class="fw-bold text-uppercase" style="letter-spacing: 0.5px;">Transition to iBU (New Student Portal)</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="faq-answer collapse" id="news-item-portal">
                                <div class="py-4 text-muted text-justify">
                                    <p class="mb-3">In line with the university's digitalization efforts, the official student portal has migrated from iBUSIS to the new <strong>iBU</strong> platform. Students are encouraged to update their bookmarks and synchronize their accounts for seamless access to grades and enrollment data.</p>
                                    <p class="mb-0 small text-uppercase fw-bold text-danger">Notice: Required Action for All Students</p>
                                </div>
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
            <section id="faqs" class="buou-faq-section py-5">
                <div class="container">
                    <div class="row mb-5 justify-content-center text-center">
                        <div class="col-lg-8">
                            <span class="badge news-bg-orange text-black px-3 py-2 rounded-pill mb-3">📰 BUOU FAQS</span>
                            <h2 class="buou-faq-main-title">Frequently Asked Questions</h2>
                            <p class="text-muted mt-3">
                                Find quick answers to common inquiries about admission, enrollment, facilities, and services at the BU Open University.
                            </p>
                        </div>
                    </div>

                    <div class="buou-faq-accordion-wrapper mx-auto" id="buouFaqAccordion">

                        <div class="buou-faq-card">
                            <button class="buou-faq-btn" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                How to request for Admission to BU Open University?
                                <span class="buou-faq-icon">+</span>
                            </button>
                            <div id="faq1" class="collapse" data-bs-parent="#buouFaqAccordion">
                                <div class="buou-faq-body">
                                    <p><strong>For Master’s and Doctoral Applicants:</strong></p>
                                    <ul>
                                        <li>Duly Accomplished Application Form (BUGS Form 1)</li>
                                        <li>One Original and One photocopy of official Transcript of Records (TOR) from college previously attended.</li>
                                        <li>Photocopy of Special Order (for graduates of Private School)</li>
                                        <li>Copy of honorable dismissal from school last attended.</li>
                                        <li>Two letters for recommendation preferably from former professors.</li>
                                        <li>Photocopy of Birth Certificate (NSO or PSA).</li>
                                        <li>Photocopy of Marriage Contract (for married female applicants).</li>
                                        <li>Certificate of English Proficiency for Foreign students (TOEFL score 460).</li>
                                    </ul>
                                    <p><strong>Forms are available at the BUGS Office or can be downloaded here:</strong></p>
                                    <a href="https://drive.google.com/drive/u/5/folders/1JKlEhnDs_oJ-4kt461kWpkepN1osYG1M" target="_blank" class="btn btn-orange btn-sm">BUGS Open Access Drive</a>
                                </div>
                            </div>
                        </div>

                        <div class="buou-faq-card">
                            <button class="buou-faq-btn" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                How to request approval for use of venue, Facility/equipment?
                                <span class="buou-faq-icon">+</span>
                            </button>
                            <div id="faq2" class="collapse" data-bs-parent="#buouFaqAccordion">
                                <div class="buou-faq-body">
                                    <ol>
                                        <li>Forward communication: submit the letter request to the office staff.
                                            <ul class="sub-list mt-2">
                                                <li>1.1. Processing time: 3-5 minutes per transaction.</li>
                                                <li>1.2. Check availability of venue/facility/equipment.</li>
                                                <li>1.3. Forward communication to the Dean.</li>
                                                <li>1.4. Dean acts on communication (approval/endorsement).</li>
                                            </ul>
                                        </li>
                                        <li class="mt-2">Receive documents: Client receives the document from office staff.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="buou-faq-card">
                            <button class="buou-faq-btn" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                How to address the needs of the visitors/clients?
                                <span class="buou-faq-icon">+</span>
                            </button>
                            <div id="faq3" class="collapse" data-bs-parent="#buouFaqAccordion">
                                <div class="buou-faq-body">
                                    <ol>
                                        <li>Fill out the message slip available in the front desk.</li>
                                        <li>Present the slip to the front desk clerk.
                                            <ul class="sub-list mt-2">
                                                <li>2.1 Receives the accomplished message slip.</li>
                                                <li>2.2 Inform the Dean regarding the concern.</li>
                                                <li>2.4 Prepare/record regarding the action of the Dean.</li>
                                                <li>2.5 Provide certification of appearance.</li>
                                            </ul>
                                        </li>
                                        <li class="mt-2">Receives the Certificate of appearance.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="buou-faq-card">
                            <button class="buou-faq-btn" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                How to Enroll in BU Open University?
                                <span class="buou-faq-icon">+</span>
                            </button>
                            <div id="faq4" class="collapse" data-bs-parent="#buouFaqAccordion">
                                <div class="buou-faq-body">
                                    <ul>
                                        <li>Secure a Notice of Admission (NOA) from the Office of the Dean.</li>
                                        <li>Wait for notification either online or onsite.</li>
                                        <li>Registrar will encode subjects and issue Assessment of Fees via email or print.</li>
                                    </ul>
                                    <p class="mt-3"><strong>Payment Options:</strong></p>
                                    <ol>
                                        <li><strong>Onsite:</strong> Pay at BUGS Cashier Office for Certificate of Registration.</li>
                                        <li><strong>Online:</strong> Landbank Account: 0132-0265-48 | Name: Bicol University – STF (164) | Branch: LBP Legazpi.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="buou-faq-card">
                            <button class="buou-faq-btn" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                How to request for approval to conduct Activity?
                                <span class="buou-faq-icon">+</span>
                            </button>
                            <div id="faq5" class="collapse" data-bs-parent="#buouFaqAccordion">
                                <div class="buou-faq-body">
                                    <ol>
                                        <li>Forward Activity proposal to BUOU front desk.
                                            <ul class="sub-list mt-2">
                                                <li>1.1 Receives/stamp the activity proposal.</li>
                                                <li>1.2 Assign reference number and record in logbook.</li>
                                                <li>1.3 Forward to the Dean.</li>
                                                <li>1.4 Dean acts on proposal (endorsed/other action).</li>
                                            </ul>
                                        </li>
                                        <li class="mt-2">Receives the endorsement/routing slip or transmittal.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="buou-faq-card">
                            <button class="buou-faq-btn" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                                How to receive and release communication/document?
                                <span class="buou-faq-icon">+</span>
                            </button>
                            <div id="faq6" class="collapse" data-bs-parent="#buouFaqAccordion">
                                <div class="buou-faq-body">
                                    <ol>
                                        <li>Forward document to front desk.
                                            <ul class="sub-list mt-2">
                                                <li>1.1 Receive and assign reference number.</li>
                                                <li>1.3 Forward to the Dean for review/signature.</li>
                                                <li>1.7 Reproduce copies for dissemination.</li>
                                                <li>1.10 Store file copies in labeled folders/boxes.</li>
                                            </ul>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="buou-faq-card">
                            <button class="buou-faq-btn" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
                                Enrolment of Students at BU Open University
                                <span class="buou-faq-icon">+</span>
                            </button>
                            <div id="faq7" class="collapse" data-bs-parent="#buouFaqAccordion">
                                <div class="buou-faq-body">
                                    <p><strong>Required for Master’s/Doctoral:</strong></p>
                                    <ul class="mb-3">
                                        <li>Notice of Admission, Advising Slip, Program Courseworks, Adviser Nomination, Concept Note.</li>
                                    </ul>
                                    <p><strong>Client Steps:</strong></p>
                                    <ol>
                                        <li>Submit documents and wait for notification.</li>
                                        <li>New Students: Receive Certificate of Registration and contact ICTO for BU email.</li>
                                        <li>Inform Faculty in Charge (FIC) of your enrollment.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                    </div> </div>
            </section>
        </div>

    </div>

@endsection