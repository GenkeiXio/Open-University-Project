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



                <div class="row g-4 mt-5 justify-content-center">
                    <div class="col-lg-12">
                        <div class="d-flex flex-wrap justify-content-center gap-4">
                
                            @php
                                $modules = [
                                    [
                                        'title' => 'Theses & Dissertation',
                                        'icon' => 'fa-solid fa-book-open',
                                        'route' => route('admin.thesis'),
                                    ],
                                    [
                                        'title' => 'Student Request',
                                        'icon' => 'fa-solid fa-file-circle-plus',
                                        'route' => '#',
                                    ],
                                    [
                                        'title' => 'Office Transactions',
                                        'icon' => 'fa-solid fa-building-columns',
                                        'route' => route('admin.office'),
                                    ],
                                ];
                            @endphp
                
                            @foreach($modules as $mod)
                                <a href="{{ $mod['route'] }}" class="buou-module-link">
                                    <div class="buou-module-card shadow text-center">
                                        <div class="buou-module-icon-bg mx-auto mb-3">
                                            <i class="{{ $mod['icon'] }} module-fa-icon"></i>
                                        </div>
                                        <h6 class="buou-module-title">{{ $mod['title'] }}</h6>
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