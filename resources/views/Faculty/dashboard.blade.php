@extends('Faculty.facultylayout')

@section('title', 'Faculty Dashboard')

@section('content')

<link rel="stylesheet" href="{{ asset('css/Faculty/Faculty_Dashboard.css') }}">

<div class="dashboard-container space-y-6">

    {{-- ── HEADER ──────────────────────────────────────────── --}}
    <div class="dashboard-header">

        <div>
            <h1>Dashboard</h1>
            <p>Welcome back, <strong>{{ session('admin_name') ?? 'Faculty' }}</strong> — here's your overview.</p>
        </div>

        <div class="header-actions">

            <div style="position:relative;">
                <i data-lucide="search"
                   style="position:absolute;left:10px;top:50%;transform:translateY(-50%);
                          width:14px;height:14px;color:var(--clr-muted);pointer-events:none;"></i>
                <input type="text"
                       id="globalSearch"
                       placeholder="Search..."
                       class="search-box"
                       style="padding-left:32px;">
            </div>

            <button class="icon-btn has-notif" title="Notifications">
                <i data-lucide="bell" style="width:16px;height:16px;"></i>
            </button>

            <button class="icon-btn" title="Settings" onclick="window.location='{{ route('Faculty.profile') }}'">
                <i data-lucide="settings" style="width:16px;height:16px;"></i>
            </button>

        </div>

    </div>

    {{-- ── STATS ───────────────────────────────────────────── --}}
    <div class="stats-grid">

        <div class="stat-card border-orange">
            <div class="stat-card-inner">
                <div class="stat-info">
                    <p>Total Trainings</p>
                    <h2>{{ $totalTrainings ?? 0 }}</h2>
                    <small>This academic year</small>
                </div>
                <div class="stat-icon">
                    <i data-lucide="book-open" style="width:22px;height:22px;"></i>
                </div>
            </div>
        </div>

        <div class="stat-card border-green">
            <div class="stat-card-inner">
                <div class="stat-info">
                    <p>Total Faculty</p>
                    <h2>{{ $totalFaculty ?? 0 }}</h2>
                    <small>Active members</small>
                </div>
                <div class="stat-icon">
                    <i data-lucide="users" style="width:22px;height:22px;"></i>
                </div>
            </div>
        </div>

        <div class="stat-card border-blue">
            <div class="stat-card-inner">
                <div class="stat-info">
                    <p>Total Seminars</p>
                    <h2>{{ $totalSeminars ?? 0 }}</h2>
                    <small>Attended & conducted</small>
                </div>
                <div class="stat-icon">
                    <i data-lucide="presentation" style="width:22px;height:22px;"></i>
                </div>
            </div>
        </div>

        <div class="stat-card border-purple">
            <div class="stat-card-inner">
                <div class="stat-info">
                    <p>Total Reports</p>
                    <h2>{{ $totalReports ?? 0 }}</h2>
                    <small>Submitted reports</small>
                </div>
                <div class="stat-icon">
                    <i data-lucide="file-text" style="width:22px;height:22px;"></i>
                </div>
            </div>
        </div>

    </div>

    {{-- ── CONTENT GRID ────────────────────────────────────── --}}
    <div class="content-grid">

        {{-- TABLE ──────────────────────────────────────────── --}}
        <div class="card-ui">

            <div class="table-header">
                <h6>Faculty Trainings</h6>

                <div class="table-actions">
                    <input id="tableSearch" placeholder="Search training...">

                    <button class="filter-btn" id="filterBtn">
                        <i data-lucide="sliders-horizontal"
                           style="width:13px;height:13px;display:inline;vertical-align:middle;margin-right:4px;"></i>
                        Filter
                    </button>
                </div>
            </div>

            <div class="table-wrapper">
                <table>

                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Training</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>

                    <tbody id="trainingTable">

                        {{-- Replace with @forelse $trainings as $training when connected to DB --}}

                        <tr>
                            <td>
                                <div class="name-cell">
                                    <div class="avatar">J</div>
                                    <span>John Doe</span>
                                </div>
                            </td>
                            <td>Research Methodology Seminar</td>
                            <td><span class="badge badge-green">International</span></td>
                            <td><span class="badge badge-blue">Completed</span></td>
                            <td style="color:var(--clr-muted);font-size:.8rem;">Apr 15, 2025</td>
                        </tr>

                        <tr>
                            <td>
                                <div class="name-cell">
                                    <div class="avatar orange">M</div>
                                    <span>Maria Santos</span>
                                </div>
                            </td>
                            <td>Advanced Pedagogy Workshop</td>
                            <td><span class="badge badge-purple">Local</span></td>
                            <td><span class="badge badge-orange">Ongoing</span></td>
                            <td style="color:var(--clr-muted);font-size:.8rem;">Apr 20, 2025</td>
                        </tr>

                        <tr>
                            <td>
                                <div class="name-cell">
                                    <div class="avatar blue">R</div>
                                    <span>Ramon Cruz</span>
                                </div>
                            </td>
                            <td>ICT Integration in Teaching</td>
                            <td><span class="badge badge-blue">Regional</span></td>
                            <td><span class="badge badge-gray">Pending</span></td>
                            <td style="color:var(--clr-muted);font-size:.8rem;">May 3, 2025</td>
                        </tr>

                        {{-- @empty
                        <tr>
                            <td colspan="5">
                                <div class="empty-state">
                                    <i data-lucide="inbox" style="width:32px;height:32px;margin:0 auto 8px;display:block;opacity:.4;"></i>
                                    No trainings found.
                                </div>
                            </td>
                        </tr>
                        @endforelse --}}

                    </tbody>

                </table>
            </div>

            {{-- Pagination placeholder --}}
            <div style="display:flex;justify-content:space-between;align-items:center;
                        margin-top:16px;font-size:.8rem;color:var(--clr-muted);">
                <span id="rowCount">Showing 3 entries</span>
                <a href="{{ route('Faculty.trainings') }}"
                   style="color:var(--clr-accent);font-weight:600;text-decoration:none;">
                    View all →
                </a>
            </div>

        </div>

        {{-- RIGHT PANEL ─────────────────────────────────────── --}}
        <div class="right-panel">

            {{-- Profile card --}}
            <div class="card-ui profile-card">

                <div class="avatar large">
                    {{ strtoupper(substr(session('admin_name') ?? 'F', 0, 1)) }}
                </div>

                <h6>{{ session('admin_name') ?? 'Faculty Name' }}</h6>
                <div class="role-badge">Faculty Member</div>

                <hr class="profile-divider">

                <div class="profile-meta">
                    <div class="profile-meta-item">
                        <span>{{ $totalTrainings ?? 0 }}</span>
                        <span>Trainings</span>
                    </div>
                    <div class="profile-meta-item">
                        <span>{{ $totalSeminars ?? 0 }}</span>
                        <span>Seminars</span>
                    </div>
                    <div class="profile-meta-item">
                        <span>{{ $totalReports ?? 0 }}</span>
                        <span>Reports</span>
                    </div>
                </div>

                <div class="profile-links">
                    <a href="{{ route('Faculty.profile') }}" class="profile-link">
                        <i data-lucide="user" style="width:14px;height:14px;"></i>
                        View Profile
                    </a>
                    <a href="{{ route('Faculty.reports') }}" class="profile-link">
                        <i data-lucide="file-text" style="width:14px;height:14px;"></i>
                        My Reports
                    </a>
                </div>

            </div>

            {{-- Recent Activity --}}
            <div class="card-ui">

                <div class="activity-header">
                    <h6>Recent Activity</h6>
                    <a href="#">View all</a>
                </div>

                <ul class="activity-list">
                    <li>
                        <span class="activity-dot"></span>
                        <div>
                            Uploaded training certificate
                            <span class="activity-time">2 hours ago</span>
                        </div>
                    </li>
                    <li>
                        <span class="activity-dot orange"></span>
                        <div>
                            Submitted TNA form
                            <span class="activity-time">Yesterday, 3:45 PM</span>
                        </div>
                    </li>
                    <li>
                        <span class="activity-dot blue"></span>
                        <div>
                            Completed ICT Workshop
                            <span class="activity-time">Apr 20, 2025</span>
                        </div>
                    </li>
                    <li>
                        <span class="activity-dot"></span>
                        <div>
                            Updated profile information
                            <span class="activity-time">Apr 18, 2025</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/Faculty/Faculty_Dashboard.js') }}"></script>
@endpush
