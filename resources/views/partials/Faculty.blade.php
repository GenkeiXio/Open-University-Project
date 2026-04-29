<div class="tab-pane fade" id="faculty-section" role="tabpanel" aria-labelledby="faculty-tab">
                        <section id="faculty" class="faculty-section pt-0 pb-5 bg-white">
                            <div class="row justify-content-center">
                                <div class="col-lg-12 text-center mb-4">
                                    <h2 class="faculty-title text-uppercase mt-0" style="letter-spacing: 1px;">BU Open University Faculty</h2>
                                    <p class="faculty-subtitle text-muted">A.Y. 2025–2026</p>
                                </div>
                            </div>

                            @php
                                $faculties = [
                                    ['name' => 'MARIA JANE B. MASCARIÑAS, PhD', 'position' => 'Professor VI / Graduate Faculty', 'image' => 'MaamMaria.jpg', 'credentials' => ['Bachelor of Science in Agribusiness (BU College of Agriculture, 1985)', 'Master of Management major in Rural Development Management (University of the Philippines Los Baños, 1991)', 'PhD in Extension Education, minor in Environmental Studies (University of the Philippines Los Baños, 1995)']],
                                    ['name' => 'MELINDA D. DE GUZMAN, EdD', 'position' => 'Professor VI/ Program Adviser', 'image' => 'MaamMelinda.jpg', 'credentials' => ['Bachelors of Science in Nursing (Bicol University College of Nursing, 1985)', 'Methods of Teaching (Bicol University, 1987)', 'Master in Management (Bicol University Graduate School, 1989)', 'MA in Educational Leadership and Management (MAELM) and EdD in Educational Leadership and Management (EdDELM)', 'EdD Educational Management (Bicol University Graduate School, 1993)']],
                                    ['name' => 'EMILY M. AGONOS, PhD', 'position' => 'Associate Professor V/Program Adviser', 'image' => 'MaamEmily.jpg', 'credentials' => ['Master in Management (MM)', 'BS Commerce Accounting (1989)', 'CCT (2003) - (Bicol University)', 'Master in Management (Bicol University Graduate School)', 'PhD in Development Management (Bicol University Graduate School, 2018)']],
                                    ['name' => 'RAMON T. DE LEON, PhD', 'position' => 'Associate Professor I/ Program Adviser', 'image' => 'SirRamon.jpg', 'credentials' => ['Master in Local Government Management (MLGM)', 'MA in Social Studies Education (MASocStEd)', 'AB Economics (Adamson University-Manila, 1987)', 'Master in Business Administration (Divine Word College of Legazpi, 1995)', 'PhD in Counselor Education (University of Santo Tomas, 2012)', 'PhD in Counseling Psychology (Cand.) (De la Salle University - Manila)']],
                                    ['name' => 'ROLDAN C. CABILES, PhD', 'position' => 'Assistant Professor II/ Program Adviser', 'image' => 'SirRoldan.jpg', 'credentials' => ['MA in English Education (MAEngEd)', 'Bachelor of Secondary Education major in English (Bicol University College of Education, 2015)', 'Master of Arts in English Education (Bicol University Graduate School, 2018)', 'PhD in Educational Foundations (Bicol University Graduate School, 2021)']],
                                    ['name' => 'JOSE CARLO B. LAVAPIE, MPA', 'position' => 'Assistant Professor I/ Program Adviser', 'image' => 'SirJose.jpg', 'credentials' => ['Master in Public Administration (MPA)', 'Bachelor of Arts major in Philosophy minor in Religious Education (Holy Rosary Minor Seminary)', 'PhD in Extension Education, minor in Environmental Studies (University of the Philippines Los Baños, 1995)']],
                                    ['name' => 'PROF. ROLLIE N. MONTEALEGRE', 'position' => 'Instructor I', 'image' => 'SirRollie.jpg', 'credentials' => ['Bachelor of Science in Computer Science (Bicol University College of Science, 2006)', 'Master in Information System (Bicol University Graduate School)']],
                                    ['name' => 'JULIE ANNE C. QUIÑONES', 'position' => 'Faculty Member', 'image' => 'MaamJulie.jpg', 'credentials' => ['Bachelor in Secondary Education Major in Biological Science', 'Master of Arts in Biology Education', 'Doctor of Education in Educational Leadership and Management']],
                                ];
                            @endphp

                            <div id="facultyMainCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($faculties as $index => $faculty)
                                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                            <div class="row justify-content-center px-2">
                                                <div class="col-lg-12"> 
                                                    <div class="row align-items-start faculty-card border shadow-sm rounded-3 p-4 mx-0 bg-white" style="min-height: 250px;">
                                                        
                                                        <div class="col-md-4">
                                                            <div class="faculty-image-wrapper border shadow-sm" style="padding: 6px; border-radius: 8px;">
                                                                <img src="{{ asset('assets/Faculty/' . $faculty['image']) }}" 
                                                                    alt="{{ $faculty['name'] }}" 
                                                                    class="faculty-main-img img-fluid"
                                                                    style="width: 100%; height: auto; object-fit: cover; display: block; border-radius: 4px;">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-8 pt-2 ps-md-4">
                                                            <h4 class="faculty-name fw-bold mb-1 fs-5" style="color: #2c3e50; line-height: 1.2;">
                                                                {{ $faculty['name'] }}
                                                            </h4>
                                                            <p class="faculty-position text-muted mb-3 small fw-bold" style="font-size: 0.9rem; font-style: italic; color: #176d86 !important;">
                                                                {{ $faculty['position'] }}
                                                            </p>
                                                            
                                                            <ul class="faculty-credentials list-unstyled mb-0 text-start">
                                                                @foreach($faculty['credentials'] as $credential)
                                                                    <li class="mb-2 text-muted" style="font-size: 0.85rem; line-height: 1.4;">
                                                                        <span class="me-2 text-warning">•</span> {{ $credential }}
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#facultyMainCarousel" data-bs-slide="prev" style="width: 5%; left: -35px; opacity: 1;">
                                    <span style="color: #ea6a0e; font-size: 2.5rem; font-weight: bold;" aria-hidden="true">❮</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#facultyMainCarousel" data-bs-slide="next" style="width: 5%; right: -35px; opacity: 1;">
                                    <span style="color: #ea6a0e; font-size: 2.5rem; font-weight: bold;" aria-hidden="true">❯</span>
                                </button>
                            </div>
                        </section>

                        <!-- ================= PUBLICATIONS ================= -->
                        <div class="faculty-publications">

                            <!-- Toolbar -->
                            <div class="pub-toolbar">
                                <input type="text" class="pub-search" placeholder="Search publications...">

                                <div class="pub-filters">
                                    <button class="pub-filter active" data-filter="all">All</button>
                                    <button class="pub-filter" data-filter="International">International</button>
                                    <button class="pub-filter" data-filter="National">National</button>
                                    <button class="pub-filter" data-filter="Local">Local</button>
                                    <button class="pub-filter" data-filter="Pending">Pending</button>
                                </div>

                                <span class="pub-count">5 publications</span>
                            </div>

                            <!-- GRID -->
                            <div class="pub-grid">

                                @php
                                $publications = [
                                    [
                                        'title'=>'Integrating AI Tools in Higher Education',
                                        'authors'=>'Dela Cruz, J., Santos, M.',
                                        'journal'=>'International Journal of EdTech',
                                        'year'=>2024,
                                        'type'=>'International',
                                        'abstract'=>'AI integration in higher education institutions...',
                                        'if'=>'IF: 3.2'
                                    ],
                                    [
                                        'title'=>'STEM Competency Assessment',
                                        'authors'=>'Dela Cruz, J.',
                                        'journal'=>'Philippine Journal',
                                        'year'=>2024,
                                        'type'=>'National',
                                        'abstract'=>'Assessment frameworks in STEM...',
                                        'if'=>'Peer-reviewed'
                                    ],
                                ];
                                @endphp

                                @foreach($publications as $pub)
                                <div class="pub-card" data-type="{{ $pub['type'] }}">

                                    <div class="pub-card-header">
                                        <h6>{{ $pub['title'] }}</h6>
                                    </div>

                                    <p class="pub-authors">{{ $pub['authors'] }}</p>

                                    <div class="pub-meta">
                                        <span>{{ $pub['journal'] }}</span>
                                        <span>·</span>
                                        <span>{{ $pub['year'] }}</span>
                                        <span class="badge">{{ $pub['type'] }}</span>
                                    </div>

                                    <p class="pub-abstract">{{ $pub['abstract'] }}</p>

                                    <div class="pub-footer">
                                        <span>{{ $pub['if'] }}</span>
                                    </div>

                                </div>
                                @endforeach

                            </div>

                        </div>
                    </div>