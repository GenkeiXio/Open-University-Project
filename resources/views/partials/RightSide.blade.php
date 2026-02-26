<div class="col-lg-3 d-none d-lg-block border-start pt-0 pb-5 text-center"> 
                <div class="px-4" style="top: 110px;"> 
                    <div id="facultySlider" class="carousel slide mb-5" data-bs-ride="false">
                        <div class="carousel-inner text-center pb-2">
                            <div class="carousel-item active">
                                <div class="mb-3 mx-auto" style="max-width: 205px;">
                                    <img src="{{ asset('assets/Faculty/SirBalilo.jpg') }}"
                                        class="img-fluid rounded shadow-sm"
                                        alt="Dean">
                                </div>
                                <h6 class="fw-bold mb-0">Dr. Benedicto B. Balilo Jr.</h6>
                                <p class="small text-muted">Dean, BU Open University</p>
                            </div>

                            <div class="carousel-item">
                                <div class="mb-3 mx-auto" style="max-width: 180px;">
                                    <img src="{{ asset('assets/Faculty/SirJose.jpg') }}"
                                        class="img-fluid rounded shadow-sm"
                                        alt="Associate Dean">
                                </div>
                                <h6 class="fw-bold mb-0">Prof. Jose Carlo B. Lavapie</h6>
                                <p class="small text-muted">Associate Dean, BU Open University</p>
                            </div>
                        </div>

                        <div class="carousel-indicators position-static mt-2">
                            <button type="button" data-bs-target="#facultySlider" data-bs-slide-to="0" class="active" aria-current="true"></button>
                            <button type="button" data-bs-target="#facultySlider" data-bs-slide-to="1"></button>
                        </div>
                    </div>

                    <!----------------->
                    <!-- Latest News -->
                    <!----------------->

                    <div class="buou-side-news-container mt-4 text-start">
                        <div class="d-flex align-items-center mb-3">
                            <h6 class="fw-bold text-uppercase mb-0" style="letter-spacing: 1.5px; color: #333; font-size: 0.9rem;">
                                Latest News
                            </h6>
                            <div class="flex-grow-1 ms-3" style="height: 2px; background: linear-gradient(to right, #eee, transparent);"></div>
                        </div>

                        @forelse($latestNewsItems as $news)
                            <div class="buou-side-news-card mb-4 p-3 shadow-sm" style="background: #ffffff; border-radius: 12px; border: 1px solid #f0f0f0;">
                                <div class="buou-side-news-img-frame mb-3" style="overflow: hidden; border-radius: 8px;">
                                    <img src="{{ asset('assets/' . $news->image) }}" 
                                        class="img-fluid" 
                                        alt="{{ $news->title }}" 
                                        style="transition: transform 0.5s ease; width: 100%; height: auto;">
                                </div>
                                <h6 class="buou-side-news-title fw-bold mb-1" style="line-height: 1.4; color: #2d3436; font-size: 0.85rem;">
                                    {{ $news->title }}
                                </h6>
                                <p class="buou-side-news-date mb-3" style="font-size: 0.7rem; color: #a0a0a0; font-style: italic;">
                                    {{ $news->created_at->format('F d, Y') }}
                                </p>
                                <div class="text-center">
                                    <a href="#news-tab" class="buou-side-news-btn" data-bs-toggle="tab" data-bs-target="#news-section">READ MORE</a>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted small text-center">No recent updates available.</p>
                        @endforelse
                    </div>

                    <!---------------------------->
                    <!-- Calendar of Activities -->
                    <!---------------------------->

                    <div class="buou-side-calendar-container mt-5 text-start">
                        <div class="d-flex align-items-center mb-3">
                            <h6 class="fw-bold text-uppercase mb-0" style="letter-spacing: 1.5px; color: #333; font-size: 0.9rem;">
                                Calendar of Activities
                            </h6>
                            <div class="flex-grow-1 ms-3" style="height: 2px; background: linear-gradient(to right, #eee, transparent);"></div>
                        </div>

                        <div class="calendar-scroll-area shadow-sm" style="max-height: 400px; overflow-y: auto; background: #fff; border-radius: 12px; border: 1px solid #f0f0f0; padding: 15px;">
                            
                            <div class="calendar-day-item d-flex mb-4">
                                <div class="calendar-date-box text-center me-3" style="min-width: 50px;">
                                    <div class="fw-bold text-white rounded-top" style="background: #176d86; font-size: 0.7rem; padding: 2px 0;">FEB</div>
                                    <div class="fw-bold border border-top-0 rounded-bottom" style="font-size: 1.1rem; color: #333; padding: 5px 0; background: #f8f9fa;">24</div>
                                </div>
                                <div class="calendar-info">
                                    <h6 class="fw-bold mb-1" style="font-size: 0.85rem; color: #2d3436;">Comprehensive Examinations</h6>
                                    <p class="mb-0 text-muted" style="font-size: 0.75rem;"><i class="bi bi-clock me-1"></i> 7:00 PM - Online</p>
                                </div>
                            </div>

                            <div class="calendar-day-item d-flex mb-4">
                                <div class="calendar-date-box text-center me-3" style="min-width: 50px;">
                                    <div class="fw-bold text-white rounded-top" style="background: #ea6a0e; font-size: 0.7rem; padding: 2px 0;">MAR</div>
                                    <div class="fw-bold border border-top-0 rounded-bottom" style="font-size: 1.1rem; color: #333; padding: 5px 0; background: #f8f9fa;">05</div>
                                </div>
                                <div class="calendar-info">
                                    <h6 class="fw-bold mb-1" style="font-size: 0.85rem; color: #2d3436;">Thesis Defense Period</h6>
                                    <p class="mb-0 text-muted" style="font-size: 0.75rem;"><i class="bi bi-geo-alt me-1"></i> BUOU Conference Room</p>
                                </div>
                            </div>

                            <div class="calendar-day-item d-flex mb-4">
                                <div class="calendar-date-box text-center me-3" style="min-width: 50px;">
                                    <div class="fw-bold text-white rounded-top" style="background: #176d86; font-size: 0.7rem; padding: 2px 0;">MAR</div>
                                    <div class="fw-bold border border-top-0 rounded-bottom" style="font-size: 1.1rem; color: #333; padding: 5px 0; background: #f8f9fa;">15</div>
                                </div>
                                <div class="calendar-info">
                                    <h6 class="fw-bold mb-1" style="font-size: 0.85rem; color: #2d3436;">Deadline: Grade Submission</h6>
                                    <p class="mb-0 text-muted" style="font-size: 0.75rem;"><i class="bi bi-info-circle me-1"></i> 2nd Semester AY 2025-26</p>
                                </div>
                            </div>

                            <div class="calendar-day-item d-flex">
                                <div class="calendar-date-box text-center me-3" style="min-width: 50px;">
                                    <div class="fw-bold text-white rounded-top" style="background: #ea6a0e; font-size: 0.7rem; padding: 2px 0;">APR</div>
                                    <div class="fw-bold border border-top-0 rounded-bottom" style="font-size: 1.1rem; color: #333; padding: 5px 0; background: #f8f9fa;">20</div>
                                </div>
                                <div class="calendar-info">
                                    <h6 class="fw-bold mb-1" style="font-size: 0.85rem; color: #2d3436;">BU Day Celebration</h6>
                                    <p class="mb-0 text-muted" style="font-size: 0.75rem;"><i class="bi bi-flag me-1"></i> Main Campus</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>