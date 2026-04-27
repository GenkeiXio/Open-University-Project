@extends('Faculty.facultylayout')

@section('title', 'Faculty Profile')

@section('content')

<link rel="stylesheet" href="{{ asset('css/Faculty/Faculty_Dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('css/Faculty/Faculty_Profile.css') }}">

<div class="space-y-6">

    {{-- ── PAGE HEADER ──────────────────────────────────────── --}}
    <div class="dashboard-header">
        <div>
            <h1 style="font-size:1.35rem;font-weight:700;color:var(--clr-text);letter-spacing:-.3px;">My Profile</h1>
            <p style="font-size:.82rem;color:var(--clr-muted);margin-top:2px;">
                View and manage your academic portfolio
            </p>
        </div>
        <div class="header-actions">
            <button class="sidebar-btn sidebar-btn-outline" style="width:auto;gap:6px;"
                    onclick="document.getElementById('editModal').classList.remove('hidden')">
                <i data-lucide="pencil" style="width:14px;height:14px;"></i>
                Edit Profile
            </button>
            <button class="sidebar-btn sidebar-btn-primary" style="width:auto;gap:6px;">
                <i data-lucide="download" style="width:14px;height:14px;"></i>
                Download CV
            </button>
        </div>
    </div>

    {{-- ── PROFILE LAYOUT ───────────────────────────────────── --}}
    <div class="profile-layout">

        {{-- LEFT SIDEBAR ─────────────────────────────────────── --}}
        <aside class="profile-sidebar">

            <div class="profile-avatar-wrap">
                <div class="profile-avatar-xl">
                    {{ strtoupper(substr(session('admin_name') ?? 'F', 0, 1)) }}
                </div>
                <div class="profile-name">{{ session('admin_name') ?? 'Faculty Name' }}</div>
                <div class="profile-role-pill">Faculty Member</div>
            </div>

            <hr class="profile-divider">

            {{-- Contact info --}}
            <div class="sidebar-section-label">Contact</div>

            <div class="contact-row">
                <div class="contact-icon">
                    <i data-lucide="mail" style="width:14px;height:14px;"></i>
                </div>
                <span>faculty@buou.edu.ph</span>
            </div>

            <div class="contact-row">
                <div class="contact-icon">
                    <i data-lucide="phone" style="width:14px;height:14px;"></i>
                </div>
                <span>+63 912 345 6789</span>
            </div>

            <div class="contact-row">
                <div class="contact-icon">
                    <i data-lucide="map-pin" style="width:14px;height:14px;"></i>
                </div>
                <span>Legazpi City, Albay</span>
            </div>

            <div class="contact-row">
                <div class="contact-icon">
                    <i data-lucide="building-2" style="width:14px;height:14px;"></i>
                </div>
                <span>College of Education</span>
            </div>

            <hr class="profile-divider">

            {{-- Skills --}}
            <div class="sidebar-section-label">Skills</div>
            <div class="skills-wrap">
                <span class="badge-skill">Research</span>
                <span class="badge-skill">Teaching</span>
                <span class="badge-skill">Leadership</span>
                <span class="badge-skill">Communication</span>
                <span class="badge-skill">ICT</span>
            </div>

            <hr class="profile-divider">

            {{-- Actions --}}
            <div style="display:flex;flex-direction:column;gap:8px;">
                <button class="sidebar-btn sidebar-btn-primary"
                        onclick="document.getElementById('editModal').classList.remove('hidden')">
                    <i data-lucide="pencil" style="width:14px;height:14px;"></i>
                    Edit Profile
                </button>
                <button class="sidebar-btn sidebar-btn-outline">
                    <i data-lucide="download" style="width:14px;height:14px;"></i>
                    Download CV
                </button>
            </div>

        </aside>

        {{-- MAIN CONTENT ─────────────────────────────────────── --}}
        <div class="profile-main">

            {{-- SKILL SCORES ──────────────────────────────────── --}}
            <div class="card-ui">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px;">
                    <h6 style="font-size:.95rem;font-weight:700;color:var(--clr-text);">Competency Scores</h6>
                    <span style="font-size:.75rem;color:var(--clr-muted);">Academic Year 2024–2025</span>
                </div>

                @php
                    $stats = [
                        ['label' => 'Research',        'value' => 91, 'color' => '#10b981'],
                        ['label' => 'Teaching',        'value' => 90, 'color' => '#2563eb'],
                        ['label' => 'Leadership',      'value' => 87, 'color' => '#7c3aed'],
                        ['label' => 'Communication',   'value' => 61, 'color' => '#F57C00'],
                        ['label' => 'Responsibility',  'value' => 96, 'color' => '#10b981'],
                        ['label' => 'Engagement',      'value' => 45, 'color' => '#ef4444'],
                    ];
                @endphp

                <div class="skill-scores-grid">
                    @foreach($stats as $i => $stat)
                    <div class="skill-score-card" style="animation-delay: {{ $i * 0.06 }}s;">
                        <h4 style="color:{{ $stat['color'] }};">{{ $stat['value'] }}%</h4>
                        <small>{{ $stat['label'] }}</small>
                        <div class="prog-bar-wrap">
                            <div class="prog-bar-fill"
                                 style="width:{{ $stat['value'] }}%;background:{{ $stat['color'] }};"
                                 data-width="{{ $stat['value'] }}"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- SUMMARY ROW ───────────────────────────────────── --}}
            <div class="summary-row">

                {{-- Aspect score --}}
                <div class="card-ui" style="text-align:center;">
                    <h6 style="font-size:.9rem;font-weight:700;color:var(--clr-text);">Aspect Score</h6>
                    <div class="circle-wrap">
                        <svg width="120" height="120" viewBox="0 0 120 120">
                            <circle class="circle-bg" cx="60" cy="60" r="48"/>
                            <circle class="circle-fill" cx="60" cy="60" r="48"
                                    id="circleProgress" data-value="86"/>
                        </svg>
                        <div class="circle-label">
                            <span id="circleValue">86</span>
                            <small>/ 100</small>
                        </div>
                    </div>
                    <p style="font-size:.8rem;color:var(--clr-muted);margin-top:12px;">
                        Above Average Performance
                    </p>
                </div>

                {{-- Overall --}}
                <div class="card-ui">
                    <h6 style="font-size:.9rem;font-weight:700;color:var(--clr-text);margin-bottom:8px;">
                        Overall Standing
                    </h6>
                    <div style="display:inline-block;padding:4px 14px;border-radius:999px;
                                background:var(--clr-accent-soft);color:var(--clr-accent);
                                font-size:.8rem;font-weight:700;margin-bottom:12px;">
                        ★ High Potential
                    </div>
                    <ul class="check-list">
                        <li>Top faculty performer this quarter</li>
                        <li>Strong research output &amp; publications</li>
                        <li>Consistently active in trainings</li>
                        <li>Recommended for leadership roles</li>
                    </ul>
                </div>

                {{-- Training summary --}}
                <div class="card-ui">
                    <h6 style="font-size:.9rem;font-weight:700;color:var(--clr-text);margin-bottom:14px;">
                        Training Summary
                    </h6>

                    @php
                        $trainingSummary = [
                            ['label' => 'International', 'count' => 3,  'total' => 10, 'color' => '#10b981'],
                            ['label' => 'National',      'count' => 5,  'total' => 10, 'color' => '#2563eb'],
                            ['label' => 'Regional',      'count' => 2,  'total' => 10, 'color' => '#7c3aed'],
                            ['label' => 'Local',         'count' => 7,  'total' => 10, 'color' => '#F57C00'],
                        ];
                    @endphp

                    @foreach($trainingSummary as $t)
                    <div class="training-row">
                        <div class="training-row-header">
                            <span>{{ $t['label'] }}</span>
                            <span>{{ $t['count'] }} / {{ $t['total'] }}</span>
                        </div>
                        <div class="prog-bar-wrap">
                            <div class="prog-bar-fill"
                                 style="width:{{ ($t['count']/$t['total'])*100 }}%;background:{{ $t['color'] }};">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>

            {{-- PORTFOLIO ─────────────────────────────────────── --}}
            <div class="card-ui">
                <h6 style="font-size:.95rem;font-weight:700;color:var(--clr-text);margin-bottom:16px;">
                    Academic Portfolio
                </h6>

                <div class="portfolio-grid">

                    <div class="portfolio-item">
                        <div class="portfolio-item-icon">
                            <i data-lucide="graduation-cap" style="width:18px;height:18px;"></i>
                        </div>
                        <h6>Qualification</h6>
                        <p>PhD in Education (ongoing) · Master of Arts in Teaching, BUOU 2015</p>
                    </div>

                    <div class="portfolio-item">
                        <div class="portfolio-item-icon">
                            <i data-lucide="briefcase" style="width:18px;height:18px;"></i>
                        </div>
                        <h6>Experience</h6>
                        <p>10 years teaching undergraduate &amp; graduate courses in the College of Education</p>
                    </div>

                    <div class="portfolio-item">
                        <div class="portfolio-item-icon">
                            <i data-lucide="award" style="width:18px;height:18px;"></i>
                        </div>
                        <h6>Awards</h6>
                        <p>Best Faculty Award 2022 · Outstanding Researcher 2023 · CSC Awardee</p>
                    </div>

                </div>
            </div>

            {{-- TRAINING HISTORY ───────────────────────────────── --}}
            <div class="card-ui">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px;">
                    <h6 style="font-size:.95rem;font-weight:700;color:var(--clr-text);">Training History</h6>
                    <a href="{{ route('Faculty.trainings') }}"
                       style="font-size:.78rem;color:var(--clr-accent);font-weight:600;text-decoration:none;">
                        View all →
                    </a>
                </div>

                @php
                    $history = [
                        ['title' => 'Research Methodology Seminar', 'type' => 'International', 'date' => 'Apr 15, 2025', 'pct' => 100, 'color' => '#10b981', 'badge' => 'badge-green'],
                        ['title' => 'Procurement Training',          'type' => 'National',      'date' => 'Mar 5, 2025',  'pct' => 80,  'color' => '#2563eb', 'badge' => 'badge-blue'],
                        ['title' => 'ICT Integration Workshop',      'type' => 'Regional',      'date' => 'Feb 20, 2025', 'pct' => 60,  'color' => '#7c3aed', 'badge' => 'badge-purple'],
                        ['title' => 'Leadership & Governance Forum', 'type' => 'Local',         'date' => 'Jan 10, 2025', 'pct' => 100, 'color' => '#F57C00', 'badge' => 'badge-orange'],
                    ];
                @endphp

                @foreach($history as $h)
                <div class="training-history-row">
                    <div class="training-history-info">
                        <strong>{{ $h['title'] }}</strong>
                        <span>{{ $h['date'] }}</span>
                    </div>
                    <span class="badge {{ $h['badge'] }}">{{ $h['type'] }}</span>
                    <div style="width:80px;">
                        <div class="prog-bar-wrap">
                            <div class="prog-bar-fill"
                                 style="width:{{ $h['pct'] }}%;background:{{ $h['color'] }};"></div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
        {{-- /profile-main --}}

    </div>
    {{-- /profile-layout --}}

</div>

{{-- ── EDIT MODAL ──────────────────────────────────────────── --}}
<div id="editModal"
     class="hidden fixed inset-0 z-50 flex items-center justify-center"
     style="background:rgba(0,0,0,.45);backdrop-filter:blur(4px);">

    <div class="card-ui" style="width:100%;max-width:480px;margin:16px;animation:fadeUp .25s ease;">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
            <h6 style="font-size:1rem;font-weight:700;color:var(--clr-text);">Edit Profile</h6>
            <button onclick="document.getElementById('editModal').classList.add('hidden')"
                    class="icon-btn" style="width:32px;height:32px;">
                <i data-lucide="x" style="width:14px;height:14px;"></i>
            </button>
        </div>

        <form style="display:flex;flex-direction:column;gap:14px;">
            @csrf
            <div>
                <label style="font-size:.8rem;font-weight:600;color:var(--clr-muted);display:block;margin-bottom:6px;">
                    Full Name
                </label>
                <input type="text" class="search-box" style="width:100%;"
                       value="{{ session('admin_name') ?? '' }}" placeholder="Full name">
            </div>
            <div>
                <label style="font-size:.8rem;font-weight:600;color:var(--clr-muted);display:block;margin-bottom:6px;">
                    Email Address
                </label>
                <input type="email" class="search-box" style="width:100%;"
                       placeholder="email@buou.edu.ph">
            </div>
            <div>
                <label style="font-size:.8rem;font-weight:600;color:var(--clr-muted);display:block;margin-bottom:6px;">
                    Phone Number
                </label>
                <input type="text" class="search-box" style="width:100%;" placeholder="+63 9XX XXX XXXX">
            </div>
            <div>
                <label style="font-size:.8rem;font-weight:600;color:var(--clr-muted);display:block;margin-bottom:6px;">
                    Department
                </label>
                <input type="text" class="search-box" style="width:100%;" placeholder="College / Department">
            </div>
            <div style="display:flex;gap:10px;justify-content:flex-end;margin-top:4px;">
                <button type="button" class="sidebar-btn sidebar-btn-outline" style="width:auto;"
                        onclick="document.getElementById('editModal').classList.add('hidden')">
                    Cancel
                </button>
                <button type="submit" class="sidebar-btn sidebar-btn-primary" style="width:auto;">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {

    /* Animate circular progress */
    const circle = document.getElementById('circleProgress');
    if (circle) {
        const val = parseInt(circle.getAttribute('data-value'));
        const circumference = 2 * Math.PI * 48; // r=48
        const offset = circumference - (val / 100) * circumference;
        setTimeout(() => { circle.style.strokeDasharray = circumference; circle.style.strokeDashoffset = offset; }, 100);
    }

    /* Animate progress bars from 0 */
    document.querySelectorAll('.prog-bar-fill[data-width]').forEach(bar => {
        const w = bar.getAttribute('data-width');
        bar.style.width = '0';
        setTimeout(() => { bar.style.width = w + '%'; }, 200);
    });

    if (typeof lucide !== 'undefined') lucide.createIcons();
});
</script>
@endpush