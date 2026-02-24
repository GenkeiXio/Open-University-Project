<div class="tab-pane fade show active" id="home-section" role="tabpanel" aria-labelledby="home-tab">
                        <section id="home" class="hero-section pt-0 pb-5 bg-white">
                            <div class="row justify-content-center align-items-center">
                                
                                <div class="col-lg-12 text-center">
                                    <span class="badge badge-custom mb-3 mt-0">
                                        Distance Education Excellence
                                    </span>

                                    <h1 class="hero-title mt-2">
                                        <span class="text-gradient-orange">BICOL UNIVERSITY</span><br>
                                        <span class="text-gradient-blue">OPEN UNIVERSITY</span>
                                    </h1>

                                    <p class="hero-text mt-4 text-muted mx-auto" style="max-width: 600px;">
                                        Breaking Barriers, Connecting People to Quality Education 
                                    </p>
 
                                    <!-- MODERN WELCOME CARD -->
                                    <div class="welcome-card mt-4 mx-auto text-center p-4">
                                        <h3 id="welcomeTitle" class="welcome-title"></h3>
                                        <div class="welcome-divider my-2"></div>
                                        <p id="welcomeText" class="welcome-text"></p>
                                        <div class="welcome-signature mt-4">
                                            <strong id="welcomeSignature" class="welcome-name"></strong><br>
                                            <span id="welcomePosition" class="welcome-position"></span>
                                        </div>
                                    </div>

                                    <div class="row g-4 mt-5 justify-content-center">
                                        <div class="col-lg-12"> <div class="d-flex flex-wrap justify-content-center gap-4">
                                                
                                                @php
                                                    $modules = [
                                                        ['title' => 'IBU', 'icon' => 'ibu.png'],
                                                        ['title' => 'BU-LMS', 'icon' => 'lms.png'],
                                                        ['title' => 'E-JOURNAL', 'icon' => 'journal.png'],
                                                        ['title' => 'BIDS AND AWARDS', 'icon' => 'bids.png'],
                                                        ['title' => 'ICTO SERVICES', 'icon' => 'icto.png']
                                                    ];
                                                @endphp

                                                @foreach($modules as $mod)
                                                    <a href="#" class="buou-module-link">
                                                        <div class="buou-module-card shadow text-center">
                                                            <h6 class="buou-module-title">{{ $mod['title'] }}</h6>
                                                            <div class="buou-module-icon-bg mx-auto">
                                                                <img src="{{ asset('assets/Icons/' . $mod['icon']) }}" alt="{{ $mod['title'] }}" class="img-fluid">
                                                            </div>
                                                        </div>
                                                    </a>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>