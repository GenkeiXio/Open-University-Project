@extends('Faculty.facultylayout')

@section('title', 'Reports & Analytics')

@section('content')

<link rel="stylesheet" href="{{ asset('css/Faculty/Faculty_Dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('css/Faculty/Faculty_Reports.css') }}">

<div class="space-y-6">

    {{-- ── PAGE HEADER ──────────────────────────────────────── --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Reports &amp; Analytics</h1>
            <p class="page-subtitle">Training performance overview and gap analysis</p>
        </div>
        <div class="header-actions">
            {{-- Period tabs --}}
            <div class="period-bar">
                <button class="period-tab active" data-period="2025">AY 2024–2025</button>
                <button class="period-tab" data-period="2024">AY 2023–2024</button>
                <button class="period-tab" data-period="2023">AY 2022–2023</button>
            </div>
            <button class="btn-outline-sm" id="printBtn">
                <i data-lucide="printer" style="width:14px;height:14px;"></i> Print
            </button>
            <button class="btn-export" id="exportBtn">
                <i data-lucide="download" style="width:14px;height:14px;"></i> Export
            </button>
        </div>
    </div>

    {{-- ── KPI CARDS ────────────────────────────────────────── --}}
    <div class="kpi-grid">

        <div class="kpi-card green">
            <div class="kpi-label">Total Trainings</div>
            <div class="kpi-value green">17</div>
            <div class="kpi-sub">All types combined</div>
            <span class="kpi-trend up">
                <i data-lucide="trending-up" style="width:10px;height:10px;"></i> +4 vs last year
            </span>
        </div>

        <div class="kpi-card blue">
            <div class="kpi-label">Hours Rendered</div>
            <div class="kpi-value blue">142</div>
            <div class="kpi-sub">Training hours this AY</div>
            <span class="kpi-trend up">
                <i data-lucide="trending-up" style="width:10px;height:10px;"></i> +18 hrs
            </span>
        </div>

        <div class="kpi-card purple">
            <div class="kpi-label">Certificates Earned</div>
            <div class="kpi-value purple">14</div>
            <div class="kpi-sub">Out of 17 trainings</div>
            <span class="kpi-trend up">
                <i data-lucide="trending-up" style="width:10px;height:10px;"></i> 82% completion
            </span>
        </div>

        <div class="kpi-card orange">
            <div class="kpi-label">Pending / Gaps</div>
            <div class="kpi-value orange">3</div>
            <div class="kpi-sub">Needs attention</div>
            <span class="kpi-trend down">
                <i data-lucide="trending-down" style="width:10px;height:10px;"></i> 2 critical
            </span>
        </div>

        <div class="kpi-card red">
            <div class="kpi-label">Overall Rating</div>
            <div class="kpi-value red">86%</div>
            <div class="kpi-sub">Competency score</div>
            <span class="kpi-trend up">
                <i data-lucide="trending-up" style="width:10px;height:10px;"></i> Above average
            </span>
        </div>

    </div>

    {{-- ── CHARTS ROW ───────────────────────────────────────── --}}
    <div class="charts-grid">

        {{-- Bar chart: Monthly trainings --}}
        <div class="chart-card">
            <div class="chart-header">
                <h6 class="chart-title">Monthly Training Attendance</h6>
                <div class="chart-legend">
                    <span class="legend-dot" style="--dot-color:#10b981;">Completed</span>
                    <span class="legend-dot" style="--dot-color:#e5e7eb;">Pending</span>
                </div>
            </div>
            <div class="bar-chart">
                @php
                    $months = [
                        ['m'=>'Aug','v'=>1], ['m'=>'Sep','v'=>2], ['m'=>'Oct','v'=>1],
                        ['m'=>'Nov','v'=>3], ['m'=>'Dec','v'=>0], ['m'=>'Jan','v'=>2],
                        ['m'=>'Feb','v'=>2], ['m'=>'Mar','v'=>2], ['m'=>'Apr','v'=>2],
                        ['m'=>'May','v'=>2],
                    ];
                    $max = max(array_column($months, 'v')) ?: 1;
                @endphp
                @foreach($months as $m)
                <div class="bar-group">
                    <div class="bar-track">
                        @if($m['v'] > 0)
                        <div class="bar-fill"
                             style="background:linear-gradient(180deg,#10b981,#059669);height:0;"
                             data-height="{{ round(($m['v']/$max)*100) }}"
                             data-val="{{ $m['v'] }}">
                        </div>
                        @endif
                    </div>
                    <span class="bar-label">{{ $m['m'] }}</span>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Donut chart: Training types --}}
        <div class="chart-card">
            <div class="chart-header">
                <h6 class="chart-title">Training Types</h6>
            </div>
            @php
                $donutSegments = [
                    ['label'=>'International','value'=>18,'color'=>'#10b981'],
                    ['label'=>'National',     'value'=>29,'color'=>'#2563eb'],
                    ['label'=>'Regional',     'value'=>12,'color'=>'#7c3aed'],
                    ['label'=>'Local',        'value'=>41,'color'=>'#F57C00'],
                ];
            @endphp
            <div style="display:flex;align-items:center;gap:20px;flex-wrap:wrap;">
                <div class="donut-wrap">
                    <svg id="donutCanvas" width="160" height="160" viewBox="0 0 160 160"
                         data-segments='{{ json_encode($donutSegments) }}'
                         style="transform:rotate(-90deg);">
                        <circle cx="80" cy="80" r="60" fill="none"
                                stroke="var(--clr-border)" stroke-width="18"/>
                    </svg>
                    <div class="donut-label">
                        <span>17</span>
                        <small>trainings</small>
                    </div>
                </div>
                <div class="donut-legend">
                    @foreach($donutSegments as $seg)
                    <div class="donut-legend-item">
                        <div class="donut-legend-left">
                            <div class="donut-dot" style="background:{{ $seg['color'] }};"></div>
                            <span>{{ $seg['label'] }}</span>
                        </div>
                        <span class="donut-count">{{ $seg['value'] }}%</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

    {{-- ── COMPETENCY SCORES ────────────────────────────────── --}}
    <div class="card-ui">
        <div class="chart-header">
            <h6 class="chart-title">Competency Scores vs Target</h6>
            <span style="font-size:.75rem;color:var(--clr-muted);">Target: 80% minimum</span>
        </div>

        @php
            $scores = [
                ['label'=>'Research',       'score'=>91, 'target'=>80, 'color'=>'#10b981'],
                ['label'=>'Teaching',       'score'=>90, 'target'=>80, 'color'=>'#2563eb'],
                ['label'=>'Leadership',     'score'=>87, 'target'=>80, 'color'=>'#7c3aed'],
                ['label'=>'Communication',  'score'=>61, 'target'=>80, 'color'=>'#F57C00'],
                ['label'=>'Responsibility', 'score'=>96, 'target'=>80, 'color'=>'#10b981'],
                ['label'=>'Engagement',     'score'=>45, 'target'=>80, 'color'=>'#ef4444'],
            ];
        @endphp

        <div style="display:flex;flex-direction:column;gap:12px;">
            @foreach($scores as $s)
            <div style="display:grid;grid-template-columns:140px 1fr 50px;align-items:center;gap:12px;">
                <span style="font-size:.82rem;color:var(--clr-text);font-weight:500;">{{ $s['label'] }}</span>
                <div style="position:relative;">
                    <div class="score-track">
                        <div class="score-fill"
                             style="background:{{ $s['color'] }};width:0;"
                             data-width="{{ $s['score'] }}">
                        </div>
                    </div>
                    {{-- Target marker --}}
                    <div style="position:absolute;top:-4px;left:{{ $s['target'] }}%;
                                width:2px;height:14px;background:#94a3b8;border-radius:1px;"
                         title="Target: {{ $s['target'] }}%">
                    </div>
                </div>
                <span style="font-size:.82rem;font-weight:700;color:{{ $s['score'] >= $s['target'] ? '#10b981' : '#ef4444' }};">
                    {{ $s['score'] }}%
                </span>
            </div>
            @endforeach
        </div>

        <div style="display:flex;align-items:center;gap:8px;margin-top:16px;padding-top:12px;border-top:1px solid var(--clr-border);">
            <div style="width:2px;height:12px;background:#94a3b8;border-radius:1px;"></div>
            <span style="font-size:.73rem;color:var(--clr-muted);">Gray marker indicates minimum target (80%)</span>
        </div>
    </div>

    {{-- ── BOTTOM GRID: Gap Analysis + Timeline ─────────────── --}}
    <div class="charts-grid">

        {{-- Gap Analysis Table --}}
        <div class="chart-card full">
            <div class="chart-header">
                <h6 class="chart-title">Training Gap Analysis</h6>
                <div style="position:relative;">
                    <i data-lucide="search"
                       style="position:absolute;left:10px;top:50%;transform:translateY(-50%);
                              width:13px;height:13px;color:var(--clr-muted);pointer-events:none;"></i>
                    <input type="text" id="gapSearch" class="search-box-sm"
                           placeholder="Search competency..." style="padding-left:30px;">
                </div>
            </div>

            <div class="gap-table-wrap">
                <table class="gap-table">
                    <thead>
                        <tr>
                            <th>Competency Area</th>
                            <th>Current Score</th>
                            <th>Target</th>
                            <th>Gap</th>
                            <th>Status</th>
                            <th>Recommended Training</th>
                        </tr>
                    </thead>
                    <tbody id="gapTableBody">
                        @php
                            $gaps = [
                                ['area'=>'Engagement',     'score'=>45, 'target'=>80, 'gap'=>35, 'sev'=>'critical', 'rec'=>'Communication & Engagement Workshop'],
                                ['area'=>'Communication',  'score'=>61, 'target'=>80, 'gap'=>19, 'sev'=>'moderate', 'rec'=>'Public Speaking Seminar'],
                                ['area'=>'Leadership',     'score'=>87, 'target'=>80, 'gap'=>0,  'sev'=>'none',     'rec'=>'—'],
                                ['area'=>'Teaching',       'score'=>90, 'target'=>80, 'gap'=>0,  'sev'=>'none',     'rec'=>'—'],
                                ['area'=>'Research',       'score'=>91, 'target'=>80, 'gap'=>0,  'sev'=>'none',     'rec'=>'—'],
                                ['area'=>'Responsibility', 'score'=>96, 'target'=>80, 'gap'=>0,  'sev'=>'none',     'rec'=>'—'],
                            ];
                        @endphp
                        @foreach($gaps as $g)
                        <tr>
                            <td style="font-weight:600;">{{ $g['area'] }}</td>
                            <td>
                                <div class="score-bar-wrap">
                                    <div class="score-track">
                                        <div class="score-fill"
                                             style="background:{{ $g['score'] >= $g['target'] ? '#10b981' : ($g['gap'] > 25 ? '#ef4444' : '#F57C00') }};
                                                    width:{{ $g['score'] }}%;">
                                        </div>
                                    </div>
                                    <span class="score-num">{{ $g['score'] }}%</span>
                                </div>
                            </td>
                            <td style="color:var(--clr-muted);">{{ $g['target'] }}%</td>
                            <td style="font-weight:700;color:{{ $g['gap'] > 0 ? '#ef4444' : '#10b981' }};">
                                {{ $g['gap'] > 0 ? '-'.$g['gap'].'%' : '✓' }}
                            </td>
                            <td>
                                @if($g['sev'] === 'critical')
                                    <span class="gap-badge critical">
                                        <i data-lucide="alert-circle" style="width:10px;height:10px;"></i> Critical
                                    </span>
                                @elseif($g['sev'] === 'moderate')
                                    <span class="gap-badge moderate">
                                        <i data-lucide="alert-triangle" style="width:10px;height:10px;"></i> Moderate
                                    </span>
                                @else
                                    <span class="gap-badge none">Met</span>
                                @endif
                            </td>
                            <td style="font-size:.8rem;color:var(--clr-muted);">{{ $g['rec'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    {{-- ── RECENT ACTIVITY + TOP CATEGORIES ───────────────── --}}
    <div class="charts-grid">

        {{-- Training Timeline --}}
        <div class="chart-card">
            <div class="chart-header">
                <h6 class="chart-title">Recent Training Activity</h6>
                <a href="{{ route('Faculty.trainings') }}"
                   style="font-size:.75rem;color:var(--clr-accent);font-weight:600;text-decoration:none;">
                    View all →
                </a>
            </div>
            <div class="timeline">
                @php
                    $activities = [
                        ['title'=>'Research Methodology Seminar', 'type'=>'International', 'date'=>'Apr 15, 2025', 'color'=>'green'],
                        ['title'=>'Procurement Training',          'type'=>'National',      'date'=>'Mar 5, 2025',  'color'=>'blue'],
                        ['title'=>'ICT Integration Workshop',      'type'=>'Regional',      'date'=>'Feb 20, 2025', 'color'=>'purple'],
                        ['title'=>'Leadership & Governance Forum', 'type'=>'Local',         'date'=>'Jan 10, 2025', 'color'=>'orange'],
                    ];
                @endphp
                @foreach($activities as $a)
                <div class="timeline-item">
                    <div class="timeline-left">
                        <div class="timeline-dot {{ $a['color'] }}">
                            <i data-lucide="check" style="width:12px;height:12px;"></i>
                        </div>
                        <div class="timeline-line"></div>
                    </div>
                    <div class="timeline-content">
                        <div class="timeline-title">{{ $a['title'] }}</div>
                        <div class="timeline-meta">
                            <span>{{ $a['type'] }}</span>
                            <span>{{ $a['date'] }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Top training categories --}}
        <div class="chart-card">
            <div class="chart-header">
                <h6 class="chart-title">Top Training Categories</h6>
            </div>
            <div class="rank-list">
                @php
                    $ranks = [
                        ['name'=>'Research & Methodology', 'sub'=>'5 trainings attended',  'val'=>'29%'],
                        ['name'=>'ICT / Technology',       'sub'=>'4 trainings attended',  'val'=>'24%'],
                        ['name'=>'Procurement / Finance',  'sub'=>'3 trainings attended',  'val'=>'18%'],
                        ['name'=>'Leadership / Governance','sub'=>'3 trainings attended',  'val'=>'18%'],
                        ['name'=>'Communication',          'sub'=>'2 trainings attended',  'val'=>'11%'],
                    ];
                @endphp
                @foreach($ranks as $i => $r)
                <div class="rank-item">
                    <div class="rank-num {{ $i===0?'gold':($i===1?'silver':($i===2?'bronze':'')) }}">
                        {{ $i + 1 }}
                    </div>
                    <div class="rank-info">
                        <div class="rank-name">{{ $r['name'] }}</div>
                        <div class="rank-sub">{{ $r['sub'] }}</div>
                    </div>
                    <span class="rank-val">{{ $r['val'] }}</span>
                </div>
                @endforeach
            </div>
        </div>

    </div>

</div>

@endsection

@push('scripts')
<script src="{{ asset('js/Faculty/Faculty_Reports.js') }}"></script>
@endpush