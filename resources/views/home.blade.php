@extends('layouts.app')

@section('content')

    @include('layouts.navbar')

    <div class="container-fluid bg-white" style="margin-top: 90px; padding-top: 20px;">
        <div class="row g-0">
            
            <div class="col-lg-3 d-none d-lg-block border-end py-4">
                <div id="fb-root"></div>
                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v24.0&appId=APP_ID"></script>
                
                <div class="px-4">
                    <h5 class="fw-bold text-uppercase border-bottom pb-2">BUOU News</h5>
                    <p class="small text-muted mb-3">BUOU Official FB Page</p>
                    <div class="fb-page mb-5" data-href="https://www.facebook.com/BUOU1997" data-tabs="timeline" data-width="350" data-height="350" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/BUOU1997" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/BUOU1997">Bicol University Open University</a></blockquote>
                    </div>

                    <p class="small text-muted mb-3">BUOU Student Council Official FB Page</p>
                    <div class="fb-page" data-href="https://www.facebook.com/buousc" data-tabs="timeline" data-width="350" data-height="350" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/buousc" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/buousc">BUOU Student Council</a></blockquote>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 px-lg-5 pt-2 pb-5">
                
                <div class="selection-menu-wrapper py-3 mb-4"> 
                    <ul class="nav nav-pills justify-content-center mb-0" id="buouTab" role="tablist">
                        <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#home-section" type="button">HOME</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#about-section" type="button">ABOUT</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#programs-section" type="button">PROGRAMS</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#faculty-section" type="button">FACULTY</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#news-section" type="button">NEWS</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#contacts-section" type="button">CONTACTS</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#faqs-section" type="button">FAQS</button></li>
                    </ul>
                </div>

                <div class="tab-content" id="buouTabContent">
                    <div class="tab-pane fade show active text-center" id="home-section" role="tabpanel">
                        <span class="badge badge-custom mb-3">🎓 Distance Education Excellence</span>
                        <h1 class="hero-title mt-2">
                            <span class="text-gradient-orange">BICOL UNIVERSITY</span><br>
                            <span class="text-gradient-blue">OPEN UNIVERSITY</span>
                        </h1>
                        <p class="hero-text mt-4 text-muted mx-auto" style="max-width: 500px;">
                            Breaking Barriers, Connecting People to Quality Education 
                        </p>

                        <div class="welcome-card mt-5 mx-auto">
                            <h3 id="welcomeTitle" class="welcome-title mb-3"></h3>
                            <p id="welcomeText" class="welcome-text mb-4"></p>
                            <div class="welcome-signature">
                                <strong id="welcomeSignature"></strong><br>
                                <span id="welcomePosition" class="text-muted small"></span>
                            </div>
                        </div>
                    </div>
                </div>
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

            <div class="tab-pane fade" id="about-section" role="tabpanel" aria-labelledby="about-tab">
                <div class="faq-wrapper mx-auto about-accordion"> 
                    <h2 class="fw-bold mb-4 text-uppercase text-center" style="letter-spacing: 1px; color: #333;">THE BICOL UNIVERSITY OPEN UNIVERSITY</h2>
                    
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

            <div class="col-lg-3 d-none d-lg-block border-start py-5 text-center">
                <div class="px-4">
                    <div id="facultySlider" class="carousel slide mb-5" data-bs-ride="carousel">
                        <div class="carousel-inner pb-4">
                            <div class="carousel-item active">
                                <div class="mb-3 mx-auto" style="max-width: 180px;">
                                    <img src="{{ asset('assets/Faculty/SirBalilo.jpg') }}" class="img-fluid rounded shadow-sm" alt="Dean">
                                </div>
                                <h6 class="fw-bold mb-0">Dr. Benedicto B. Balilo Jr.</h6>
                                <p class="small text-muted">Dean, BU Open University</p>
                            </div>
                        </div>
                    </div>

                    <div class="buou-side-news-container mt-5 text-start">
                        <h6 class="fw-bold text-uppercase border-bottom pb-2 mb-3" style="font-size: 0.85rem;">Latest News</h6>
                        <div class="buou-side-news-card mb-4 p-3 shadow-sm border rounded-3 bg-white">
                            <h6 class="buou-side-news-title fw-bold mb-1" style="font-size: 0.8rem;">BUeño journos shine at RTSPC...</h6>
                            <p class="small text-muted italic mb-2">February 2, 2026</p>
                            <a href="#" class="buou-side-news-btn text-center d-block py-1">READ MORE</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('layouts.footer')

@endsection