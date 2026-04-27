@extends('Faculty.facultylayout')

@section('title', 'Seminars')

@section('content')

<link rel="stylesheet" href="{{ asset('css/Faculty/Faculty_Dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('css/Faculty/Faculty_Seminar.css') }}">

<div class="space-y-6">

    {{-- ── PAGE HEADER ──────────────────────────────────────── --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Seminars Attended</h1>
            <p class="page-subtitle">Record and manage seminars, workshops, and professional development events</p>
        </div>
        <button class="btn-add" onclick="openModal('addModal')">
            <i data-lucide="plus" style="width:16px;height:16px;"></i>
            Add Seminar
        </button>
    </div>

    {{-- ── STATS ────────────────────────────────────────────── --}}
    <div class="pres-stats">
        <div class="pres-stat-box">
            <div class="pres-stat-num" style="color:#10b981;" id="statTotal">8</div>
            <div class="pres-stat-label">Total Seminars</div>
        </div>
        <div class="pres-stat-box">
            <div class="pres-stat-num" style="color:#2563eb;" id="statIntl">2</div>
            <div class="pres-stat-label">International</div>
        </div>
        <div class="pres-stat-box">
            <div class="pres-stat-num" style="color:#7c3aed;" id="statNatl">3</div>
            <div class="pres-stat-label">National</div>
        </div>
        <div class="pres-stat-box">
            <div class="pres-stat-num" style="color:#06b6d4;" id="statRegional">2</div>
            <div class="pres-stat-label">Regional</div>
        </div>
        <div class="pres-stat-box">
            <div class="pres-stat-num" style="color:#F57C00;" id="statLocal">1</div>
            <div class="pres-stat-label">Local</div>
        </div>
    </div>

    {{-- ── CARD SECTION ──────────────────────────────────────── --}}
    <div class="card-ui">

        <div class="toolbar">
            <div class="toolbar-left">
                <div style="position:relative;">
                    <i data-lucide="search"
                       style="position:absolute;left:10px;top:50%;transform:translateY(-50%);
                              width:14px;height:14px;color:var(--clr-muted);pointer-events:none;"></i>
                    <input type="text" id="presSearch" class="search-box"
                           placeholder="Search seminars..." style="padding-left:32px;" autocomplete="off">
                </div>
                <div class="filter-tabs">
                    <button class="filter-tab active" data-filter="all">
                        All <span class="tab-count">0</span>
                    </button>
                    <button class="filter-tab" data-filter="International">
                        International <span class="tab-count">0</span>
                    </button>
                    <button class="filter-tab" data-filter="National">
                        National <span class="tab-count">0</span>
                    </button>
                    <button class="filter-tab" data-filter="Regional">
                        Regional <span class="tab-count">0</span>
                    </button>
                    <button class="filter-tab" data-filter="Local">
                        Local <span class="tab-count">0</span>
                    </button>
                </div>
            </div>
            <div style="display:flex;align-items:center;gap:10px;">
                <span id="presCount" style="font-size:.78rem;color:var(--clr-muted);">0 seminars</span>
                <div class="view-toggle">
                    <button class="view-toggle-btn active" id="viewGrid" title="Grid view">
                        <i data-lucide="layout-grid" style="width:14px;height:14px;"></i>
                    </button>
                    <button class="view-toggle-btn" id="viewList" title="List view">
                        <i data-lucide="list" style="width:14px;height:14px;"></i>
                    </button>
                </div>
                <button class="icon-btn" id="exportPresBtn" title="Export CSV"
                        style="width:36px;height:36px;">
                    <i data-lucide="download" style="width:15px;height:15px;"></i>
                </button>
            </div>
        </div>

        @php
            $seminars = [
                [
                    'title'     => 'Seminar on Outcome-Based Education (OBE) Implementation',
                    'organizer' => 'Commission on Higher Education (CHED)',
                    'location'  => 'Manila, PH',
                    'date'      => '2025-01-20',
                    'disp_date' => 'Jan 20–21, 2025',
                    'type'      => 'National',
                    'topic'     => 'Curriculum',
                    'color'     => '#2563eb',
                    'icon'      => 'graduation-cap',
                    'status'    => 'Completed',
                    'badge'     => 'badge-blue',
                ],
                [
                    'title'     => 'International Workshop on Blended Learning Strategies',
                    'organizer' => 'Asia-Pacific Quality Network (APQN)',
                    'location'  => 'Bangkok, TH',
                    'date'      => '2024-10-08',
                    'disp_date' => 'Oct 8–10, 2024',
                    'type'      => 'International',
                    'topic'     => 'Pedagogy',
                    'color'     => '#10b981',
                    'icon'      => 'globe',
                    'status'    => 'Completed',
                    'badge'     => 'badge-green',
                ],
                [
                    'title'     => 'Seminar on Research Ethics and Intellectual Property Rights',
                    'organizer' => 'BUOU Research and Development Office',
                    'location'  => 'Legazpi City, PH',
                    'date'      => '2024-08-14',
                    'disp_date' => 'Aug 14, 2024',
                    'type'      => 'Local',
                    'topic'     => 'Research',
                    'color'     => '#F57C00',
                    'icon'      => 'shield-check',
                    'status'    => 'Completed',
                    'badge'     => 'badge-orange',
                ],
                [
                    'title'     => 'Regional Summit on Mental Health and Faculty Well-Being',
                    'organizer' => 'SUC Regional Directors Council V',
                    'location'  => 'Naga City, PH',
                    'date'      => '2024-06-05',
                    'disp_date' => 'Jun 5–6, 2024',
                    'type'      => 'Regional',
                    'topic'     => 'Well-Being',
                    'color'     => '#ec4899',
                    'icon'      => 'heart-handshake',
                    'status'    => 'Completed',
                    'badge'     => 'badge-purple',
                ],
                [
                    'title'     => 'National Conference on Data Privacy and Cybersecurity in HEIs',
                    'organizer' => 'National Privacy Commission',
                    'location'  => 'Cebu City, PH',
                    'date'      => '2024-04-22',
                    'disp_date' => 'Apr 22–23, 2024',
                    'type'      => 'National',
                    'topic'     => 'Technology',
                    'color'     => '#7c3aed',
                    'icon'      => 'lock',
                    'status'    => 'Completed',
                    'badge'     => 'badge-purple',
                ],
                [
                    'title'     => 'International Forum on Sustainable Development Goals in Education',
                    'organizer' => 'UNESCO Regional Bureau for Education',
                    'location'  => 'Kuala Lumpur, MY',
                    'date'      => '2025-07-15',
                    'disp_date' => 'Jul 15–17, 2025',
                    'type'      => 'International',
                    'topic'     => 'Sustainability',
                    'color'     => '#059669',
                    'icon'      => 'leaf',
                    'status'    => 'Upcoming',
                    'badge'     => 'badge-green',
                ],
                [
                    'title'     => 'Regional Workshop on Gender and Development (GAD) in SUCs',
                    'organizer' => 'Philippine Commission on Women',
                    'location'  => 'Legazpi City, PH',
                    'date'      => '2024-03-08',
                    'disp_date' => 'Mar 8, 2024',
                    'type'      => 'Regional',
                    'topic'     => 'Gender & Dev.',
                    'color'     => '#06b6d4',
                    'icon'      => 'users',
                    'status'    => 'Completed',
                    'badge'     => 'badge-blue',
                ],
                [
                    'title'     => 'National Seminar on Inclusive Education and Persons with Disabilities',
                    'organizer' => 'Department of Education (DepEd)',
                    'location'  => 'Quezon City, PH',
                    'date'      => '2025-09-10',
                    'disp_date' => 'Sep 10–11, 2025',
                    'type'      => 'National',
                    'topic'     => 'Inclusive Ed.',
                    'color'     => '#f59e0b',
                    'icon'      => 'accessibility',
                    'status'    => 'Upcoming',
                    'badge'     => 'badge-orange',
                ],
            ];
        @endphp

        {{-- GRID VIEW --}}
        <div class="pres-grid" id="presGrid">
            @foreach($seminars as $i => $sem)
            <div class="pres-card"
                 data-pres-type="{{ $sem['type'] }}"
                 data-title="{{ $sem['title'] }}"
                 data-venue="{{ $sem['organizer'] }}"
                 data-location="{{ $sem['location'] }}"
                 data-isodate="{{ $sem['date'] }}"
                 data-type="{{ $sem['type'] }}"
                 data-role="{{ $sem['topic'] }}"
                 data-status="{{ $sem['status'] }}"
                 style="animation-delay:{{ $i * 0.07 }}s;">

                <div class="pres-card-head" style="background:{{ $sem['color'] }};">
                    <div class="pres-card-icon">
                        <i data-lucide="{{ $sem['icon'] }}"
                           style="width:20px;height:20px;color:#fff;"></i>
                    </div>
                    <h6>{{ $sem['title'] }}</h6>
                    <div class="pres-venue">{{ $sem['organizer'] }}</div>
                </div>

                <div class="pres-card-body">
                    <div class="pres-card-meta">
                        <span>
                            <i data-lucide="map-pin" style="width:11px;height:11px;"></i>
                            {{ $sem['location'] }}
                        </span>
                        <span>
                            <i data-lucide="calendar" style="width:11px;height:11px;"></i>
                            {{ $sem['disp_date'] }}
                        </span>
                    </div>

                    <div class="pres-tags">
                        <span class="badge {{ $sem['badge'] }}" style="font-size:.7rem;">
                            {{ $sem['type'] }}
                        </span>
                        <span class="pres-role-tag">
                            <i data-lucide="tag" style="width:10px;height:10px;display:inline;vertical-align:middle;margin-right:2px;"></i>
                            {{ $sem['topic'] }}
                        </span>
                    </div>

                    <div class="pres-card-footer">
                        <span class="pres-status"
                              style="color:{{ $sem['status'] === 'Upcoming' ? '#F57C00' : '#10b981' }};">
                            <i data-lucide="{{ $sem['status'] === 'Upcoming' ? 'clock' : 'check-circle' }}"
                               style="width:12px;height:12px;"></i>
                            {{ $sem['status'] }}
                        </span>
                        <div style="display:flex;gap:4px;">
                            <button class="pres-action-btn edit" title="Edit"
                                    onclick="openEditModal(this)">
                                <i data-lucide="pencil" style="width:12px;height:12px;"></i>
                            </button>
                            <button class="pres-action-btn del" title="Delete"
                                    onclick="confirmDelete(this)">
                                <i data-lucide="trash-2" style="width:12px;height:12px;"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
        </div>

        {{-- LIST VIEW (hidden by default) --}}
        <div class="pres-list" id="presList" style="display:none;">
            @foreach($seminars as $i => $sem)
            <div class="pres-list-card"
                 data-pres-type="{{ $sem['type'] }}"
                 data-title="{{ $sem['title'] }}"
                 data-venue="{{ $sem['organizer'] }}"
                 data-location="{{ $sem['location'] }}"
                 data-isodate="{{ $sem['date'] }}"
                 data-type="{{ $sem['type'] }}"
                 data-role="{{ $sem['topic'] }}"
                 data-status="{{ $sem['status'] }}"
                 style="animation-delay:{{ $i * 0.04 }}s;">
                <span class="pres-list-dot" style="background:{{ $sem['color'] }};"></span>
                <div class="pres-list-body">
                    <div class="pres-list-title">{{ $sem['title'] }}</div>
                    <div class="pres-list-meta">
                        <span>{{ $sem['organizer'] }}</span>
                        <span>{{ $sem['disp_date'] }}</span>
                        <span>{{ $sem['location'] }}</span>
                    </div>
                </div>
                <span class="badge {{ $sem['badge'] }}" style="font-size:.7rem;flex-shrink:0;">
                    {{ $sem['type'] }}
                </span>
                <div style="display:flex;gap:4px;flex-shrink:0;">
                    <button class="pres-action-btn edit" title="Edit" onclick="openEditModal(this)">
                        <i data-lucide="pencil" style="width:12px;height:12px;"></i>
                    </button>
                    <button class="pres-action-btn del" title="Delete" onclick="confirmDelete(this)">
                        <i data-lucide="trash-2" style="width:12px;height:12px;"></i>
                    </button>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Empty state --}}
        <div id="presEmptyState" style="display:none;">
            <div class="pres-empty">
                <svg class="pres-empty-icon" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
                <h5>No seminars found</h5>
                <p>Try adjusting your search or filter, or add a new seminar record.</p>
            </div>
        </div>

    </div>

</div>

{{-- ═══════════════════════════════════════════════════════════
     ADD SEMINAR MODAL
════════════════════════════════════════════════════════════ --}}
<div id="addModal" class="modal-overlay">
    <div class="card-ui modal-box">
        <div class="modal-header">
            <h6>
                <i data-lucide="plus-circle"
                   style="width:16px;height:16px;display:inline;vertical-align:middle;
                          margin-right:6px;color:var(--clr-accent);"></i>
                Add Seminar
            </h6>
            <button class="icon-btn" style="width:32px;height:32px;" onclick="closeModal('addModal')">
                <i data-lucide="x" style="width:14px;height:14px;"></i>
            </button>
        </div>
        <form id="addPresForm" novalidate>
            @csrf

            <div class="form-group">
                <label class="form-label">Seminar Title <span style="color:#ef4444;">*</span></label>
                <input type="text" class="form-input" name="txt_title"
                       placeholder="e.g. Seminar on Outcome-Based Education" required>
                <div class="form-error">This field is required.</div>
            </div>

            <div class="form-group">
                <label class="form-label">Organizer / Institution <span style="color:#ef4444;">*</span></label>
                <input type="text" class="form-input" name="txt_venue"
                       placeholder="e.g. Commission on Higher Education (CHED)" required>
                <div class="form-error">This field is required.</div>
            </div>

            <div class="form-group">
                <label class="form-label">Location</label>
                <input type="text" class="form-input" name="txt_location"
                       placeholder="e.g. Manila, PH or Legazpi City, PH">
            </div>

            <div class="form-grid-2">
                <div class="form-group">
                    <label class="form-label">Date <span style="color:#ef4444;">*</span></label>
                    <input type="date" class="form-input" name="txt_date" required>
                    <div class="form-error">Please select a date.</div>
                </div>
                <div class="form-group">
                    <label class="form-label">Type <span style="color:#ef4444;">*</span></label>
                    <select class="form-input" name="txt_type" required>
                        <option value="" disabled selected>Select type</option>
                        <option>International</option>
                        <option>National</option>
                        <option>Regional</option>
                        <option>Local</option>
                    </select>
                    <div class="form-error">Please select a type.</div>
                </div>
            </div>

            <div class="form-grid-2">
                <div class="form-group">
                    <label class="form-label">Topic / Category</label>
                    <select class="form-input" name="txt_role">
                        <option value="" disabled selected>Select topic</option>
                        <option>Curriculum</option>
                        <option>Pedagogy</option>
                        <option>Research</option>
                        <option>Technology</option>
                        <option>Well-Being</option>
                        <option>Leadership</option>
                        <option>Gender &amp; Dev.</option>
                        <option>Inclusive Ed.</option>
                        <option>Sustainability</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Status</label>
                    <select class="form-input" name="txt_status">
                        <option value="" disabled selected>Select status</option>
                        <option>Completed</option>
                        <option>Upcoming</option>
                        <option>Cancelled</option>
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeModal('addModal')">Cancel</button>
                <button type="submit" class="btn-save">
                    <i data-lucide="save" style="width:13px;height:13px;"></i>
                    Save Seminar
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ═══════════════════════════════════════════════════════════
     EDIT SEMINAR MODAL — dynamically populated via JS
════════════════════════════════════════════════════════════ --}}
<div id="editModal" class="modal-overlay">
    <div class="card-ui modal-box">
        <div class="modal-header">
            <h6>
                <i data-lucide="pencil"
                   style="width:15px;height:15px;display:inline;vertical-align:middle;
                          margin-right:6px;color:#F57C00;"></i>
                Edit Seminar
            </h6>
            <button class="icon-btn" style="width:32px;height:32px;" onclick="closeModal('editModal')">
                <i data-lucide="x" style="width:14px;height:14px;"></i>
            </button>
        </div>
        <form id="editPresForm" novalidate>
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label">Seminar Title <span style="color:#ef4444;">*</span></label>
                <input type="text" class="form-input" name="txt_title" required>
                <div class="form-error">This field is required.</div>
            </div>

            <div class="form-group">
                <label class="form-label">Organizer / Institution <span style="color:#ef4444;">*</span></label>
                <input type="text" class="form-input" name="txt_venue" required>
                <div class="form-error">This field is required.</div>
            </div>

            <div class="form-group">
                <label class="form-label">Location</label>
                <input type="text" class="form-input" name="txt_location">
            </div>

            <div class="form-grid-2">
                <div class="form-group">
                    <label class="form-label">Date</label>
                    <input type="date" class="form-input" name="txt_date">
                </div>
                <div class="form-group">
                    <label class="form-label">Type <span style="color:#ef4444;">*</span></label>
                    <select class="form-input" name="txt_type" required>
                        <option value="" disabled>Select type</option>
                        <option>International</option>
                        <option>National</option>
                        <option>Regional</option>
                        <option>Local</option>
                    </select>
                    <div class="form-error">Please select a type.</div>
                </div>
            </div>

            <div class="form-grid-2">
                <div class="form-group">
                    <label class="form-label">Topic / Category</label>
                    <select class="form-input" name="txt_role">
                        <option value="">Select topic</option>
                        <option>Curriculum</option>
                        <option>Pedagogy</option>
                        <option>Research</option>
                        <option>Technology</option>
                        <option>Well-Being</option>
                        <option>Leadership</option>
                        <option>Gender &amp; Dev.</option>
                        <option>Inclusive Ed.</option>
                        <option>Sustainability</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Status</label>
                    <select class="form-input" name="txt_status">
                        <option value="">Select status</option>
                        <option>Completed</option>
                        <option>Upcoming</option>
                        <option>Cancelled</option>
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeModal('editModal')">Cancel</button>
                <button type="submit" class="btn-save">
                    <i data-lucide="check" style="width:13px;height:13px;"></i>
                    Update Seminar
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ═══════════════════════════════════════════════════════════
     DELETE CONFIRM MODAL
════════════════════════════════════════════════════════════ --}}
<div id="deleteModal" class="modal-overlay">
    <div class="card-ui modal-box" style="max-width:380px;text-align:center;">
        <div style="width:52px;height:52px;border-radius:16px;background:#fef2f2;
                    color:#ef4444;display:flex;align-items:center;justify-content:center;
                    margin:0 auto 16px;">
            <i data-lucide="trash-2" style="width:22px;height:22px;"></i>
        </div>
        <h6 style="font-size:1rem;font-weight:700;color:var(--clr-text);margin-bottom:8px;">
            Delete Seminar?
        </h6>
        <p style="font-size:.83rem;color:var(--clr-muted);margin-bottom:20px;line-height:1.5;">
            This action cannot be undone. The seminar record will be permanently removed.
        </p>
        <div style="display:flex;gap:10px;justify-content:center;">
            <button class="btn-cancel" onclick="closeModal('deleteModal')">Cancel</button>
            <button class="btn-save" style="background:#ef4444;" id="confirmDeleteBtn">
                <i data-lucide="trash-2" style="width:13px;height:13px;"></i>
                Yes, Delete
            </button>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/Faculty/Faculty_Seminar.js') }}"></script>
@endpush