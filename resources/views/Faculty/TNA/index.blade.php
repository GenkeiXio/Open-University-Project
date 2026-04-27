@extends('Faculty.facultylayout')

@section('title', 'Training Needs Analysis')

@section('content')

<link rel="stylesheet" href="{{ asset('css/Faculty/Faculty_Dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('css/Faculty/Faculty_TNA.css') }}">

<div class="space-y-6">

    {{-- ── PAGE HEADER ──────────────────────────────────────── --}}
    <div class="page-header" style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px;">
        <div>
            <h1 style="font-size:1.35rem;font-weight:700;color:var(--clr-text);letter-spacing:-.3px;">
                Training Needs Analysis
            </h1>
            <p style="font-size:.82rem;color:var(--clr-muted);margin-top:2px;">
                Identify and submit your training requirements for the academic year
            </p>
        </div>
        <span class="badge badge-green" style="font-size:.8rem;padding:6px 14px;">
            AY 2024–2025
        </span>
    </div>

    {{-- ── STEP BAR ──────────────────────────────────────────── --}}
    <div class="card-ui">
        <div class="step-bar">
            <div class="step done">
                <div class="step-circle">
                    <i data-lucide="check" style="width:14px;height:14px;"></i>
                </div>
                <span class="step-label">Basic Info</span>
            </div>
            <div class="step active">
                <div class="step-circle">2</div>
                <span class="step-label">Categories</span>
            </div>
            <div class="step">
                <div class="step-circle">3</div>
                <span class="step-label">Priorities</span>
            </div>
            <div class="step">
                <div class="step-circle">4</div>
                <span class="step-label">Review</span>
            </div>
        </div>
    </div>

    {{-- ── TNA LAYOUT ───────────────────────────────────────── --}}
    <div class="tna-layout">

        {{-- MAIN FORM ─────────────────────────────────────────── --}}
        <div>
            <form id="tnaForm">
                @csrf

                {{-- Section 1: Basic Info --}}
                <div class="card-ui tna-section">
                    <div class="tna-section-title">
                        <div class="tna-section-title-icon">
                            <i data-lucide="info" style="width:14px;height:14px;"></i>
                        </div>
                        Basic Information
                    </div>

                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">

                        <div class="form-group" style="margin-bottom:0;">
                            <label class="form-label">Academic Year *</label>
                            <select class="form-input" name="txt_year" id="tnaYear" required>
                                <option value="" disabled selected>Select year</option>
                                <option value="2025">2024–2025</option>
                                <option value="2026">2025–2026</option>
                                <option value="2027">2026–2027</option>
                            </select>
                        </div>

                        <div class="form-group" style="margin-bottom:0;">
                            <label class="form-label">Semester *</label>
                            <select class="form-input" name="txt_semester" required>
                                <option value="" disabled selected>Select semester</option>
                                <option>1st Semester</option>
                                <option>2nd Semester</option>
                                <option>Summer</option>
                            </select>
                        </div>

                    </div>

                    <div class="form-group" style="margin-top:14px;margin-bottom:0;">
                        <label class="form-label">Position / Designation</label>
                        <input type="text" class="form-input" name="txt_position"
                               placeholder="e.g. Instructor I, Associate Professor">
                    </div>
                </div>

                {{-- Section 2: Training Categories --}}
                <div class="card-ui tna-section">
                    <div class="tna-section-title">
                        <div class="tna-section-title-icon">
                            <i data-lucide="layers" style="width:14px;height:14px;"></i>
                        </div>
                        Training Categories
                        <span style="font-size:.72rem;color:var(--clr-muted);font-weight:400;margin-left:4px;">
                            (select all that apply)
                        </span>
                    </div>

                    @php
                        $categories = [
                            ['name'=>'Research',        'key'=>'research',        'desc'=>'Publication, methodology, data analysis', 'icon'=>'microscope'],
                            ['name'=>'Teaching',        'key'=>'teaching',        'desc'=>'Pedagogy, curriculum, assessment',         'icon'=>'presentation'],
                            ['name'=>'Leadership',      'key'=>'leadership',      'desc'=>'Management, governance, supervision',      'icon'=>'users'],
                            ['name'=>'ICT / Technology','key'=>'ict',             'desc'=>'Digital tools, e-learning, online systems','icon'=>'monitor'],
                            ['name'=>'Procurement',     'key'=>'procurement',     'desc'=>'Bidding, RA 9184, supply chain',           'icon'=>'shopping-cart'],
                            ['name'=>'Communication',   'key'=>'communication',   'desc'=>'Presentation, writing, public speaking',   'icon'=>'message-circle'],
                            ['name'=>'Health & Safety', 'key'=>'health',          'desc'=>'OSH, mental health, first aid',            'icon'=>'heart'],
                            ['name'=>'Gender & Dev.',   'key'=>'gad',             'desc'=>'GAD, SOGIE, inclusivity programs',         'icon'=>'users-2'],
                            ['name'=>'Finance',         'key'=>'finance',         'desc'=>'Budgeting, accounting, audit',             'icon'=>'calculator'],
                        ];
                    @endphp

                    <div class="category-grid">
                        @foreach($categories as $cat)
                        <label class="category-card" id="card_{{ $cat['key'] }}"
                               onclick="toggleCategory('{{ $cat['key'] }}','{{ $cat['name'] }}')">
                            <input type="checkbox" name="categories[]" value="{{ $cat['key'] }}"
                                   id="chk_{{ $cat['key'] }}">
                            <div class="category-check" id="check_{{ $cat['key'] }}">
                                <i data-lucide="check" class="category-check-icon" style="width:11px;height:11px;"></i>
                            </div>
                            <div class="category-text">
                                <strong>{{ $cat['name'] }}</strong>
                                <span>{{ $cat['desc'] }}</span>
                            </div>
                        </label>
                        @endforeach
                    </div>
                </div>

                {{-- Section 3: Priority & Urgency --}}
                <div class="card-ui tna-section">
                    <div class="tna-section-title">
                        <div class="tna-section-title-icon">
                            <i data-lucide="bar-chart-2" style="width:14px;height:14px;"></i>
                        </div>
                        Priority &amp; Self-Rating
                    </div>

                    <div class="rating-group">
                        @php
                            $ratingItems = [
                                'Research & Writing Skills',
                                'Classroom Management',
                                'Technology Integration',
                                'Administrative Tasks',
                                'Communication Skills',
                            ];
                        @endphp

                        @foreach($ratingItems as $i => $item)
                        <div class="rating-row">
                            <span class="rating-label">{{ $item }}</span>
                            <div class="star-row" data-index="{{ $i }}">
                                @for($s = 1; $s <= 5; $s++)
                                <button type="button" class="star-btn" data-star="{{ $s }}"
                                        onclick="rateStar(this, {{ $i }})">&#9733;</button>
                                @endfor
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Section 4: Additional Notes --}}
                <div class="card-ui tna-section">
                    <div class="tna-section-title">
                        <div class="tna-section-title-icon">
                            <i data-lucide="file-text" style="width:14px;height:14px;"></i>
                        </div>
                        Additional Notes
                    </div>

                    <div class="form-group" style="margin-bottom:0;">
                        <label class="form-label">
                            Specific training topics or concerns you'd like to highlight
                        </label>
                        <textarea class="form-textarea" name="txt_notes" rows="4"
                                  placeholder="e.g. I need training on advanced statistical software for my research..."></textarea>
                    </div>
                </div>

                {{-- Submit --}}
                <div class="card-ui">
                    <div style="display:flex;align-items:center;gap:10px;
                                padding:12px;border-radius:10px;background:var(--clr-accent-soft);
                                border:1px solid var(--clr-accent);margin-bottom:16px;">
                        <i data-lucide="info" style="width:16px;height:16px;color:var(--clr-accent);flex-shrink:0;"></i>
                        <p style="font-size:.8rem;color:var(--clr-accent);font-weight:500;">
                            By submitting, you confirm that the information provided is accurate and complete.
                        </p>
                    </div>
                    <button type="submit" class="tna-submit-btn">
                        <i data-lucide="send" style="width:16px;height:16px;"></i>
                        Submit TNA Form
                    </button>
                </div>

            </form>
        </div>

        {{-- SIDE SUMMARY ─────────────────────────────────────── --}}
        <div>

            {{-- Live summary --}}
            <div class="summary-panel">
                <h6>Form Summary</h6>

                <div class="summary-item">
                    <span>Academic Year</span>
                    <span id="summaryYear">—</span>
                </div>
                <div class="summary-item">
                    <span>Semester</span>
                    <span id="summarySemester">—</span>
                </div>
                <div class="summary-item">
                    <span>Categories Selected</span>
                    <span id="summaryCount">0</span>
                </div>

                <p style="font-size:.73rem;color:var(--clr-muted);margin-top:12px;font-weight:600;
                           text-transform:uppercase;letter-spacing:.5px;">Selected Categories</p>
                <div class="selected-tags" id="selectedTags">
                    <span style="font-size:.78rem;color:var(--clr-muted);">None selected</span>
                </div>
            </div>

            {{-- Previous submissions --}}
            <div class="summary-panel" style="margin-top:16px;">
                <h6>Previous Submissions</h6>

                @php
                    $submissions = [
                        ['year'=>'2023–2024', 'cats'=>5, 'status'=>'Approved',  'badge'=>'badge-green'],
                        ['year'=>'2022–2023', 'cats'=>4, 'status'=>'Approved',  'badge'=>'badge-green'],
                        ['year'=>'2021–2022', 'cats'=>3, 'status'=>'Archived',  'badge'=>'badge-gray'],
                    ];
                @endphp

                @foreach($submissions as $sub)
                <div class="submission-row">
                    <div>
                        <strong style="font-size:.83rem;color:var(--clr-text);">AY {{ $sub['year'] }}</strong>
                        <span style="display:block;font-size:.73rem;color:var(--clr-muted);">{{ $sub['cats'] }} categories</span>
                    </div>
                    <span class="badge {{ $sub['badge'] }}">{{ $sub['status'] }}</span>
                </div>
                @endforeach
            </div>

        </div>

    </div>

</div>

@endsection

@push('scripts')
<script src="{{ asset('js/Faculty/Faculty_TNA.js') }}"></script>
@endpush