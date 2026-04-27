@extends('Faculty.facultylayout')

@section('title', 'Presentations & Seminars')

@section('content')

<link rel="stylesheet" href="{{ asset('css/Faculty/Faculty_Dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('css/Faculty/Faculty_Seminar.css') }}">

<div class="space-y-6">

    {{-- ── PAGE HEADER ──────────────────────────────────────── --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Presentations &amp; Seminars</h1>
            <p class="page-subtitle">Track your conference papers, invited talks, and seminar deliveries</p>
        </div>
        <button class="btn-add" onclick="openModal('addModal')">
            <i data-lucide="plus" style="width:16px;height:16px;"></i>
            Add Presentation
        </button>
    </div>

    {{-- ── STATS ────────────────────────────────────────────── --}}
    <div class="pres-stats">
        <div class="pres-stat-box">
            <div class="pres-stat-num" style="color:#10b981;" id="statTotal">12</div>
            <div class="pres-stat-label">Total</div>
        </div>
        <div class="pres-stat-box">
            <div class="pres-stat-num" style="color:#2563eb;" id="statIntl">4</div>
            <div class="pres-stat-label">International</div>
        </div>
        <div class="pres-stat-box">
            <div class="pres-stat-num" style="color:#7c3aed;" id="statNatl">5</div>
            <div class="pres-stat-label">National</div>
        </div>
        <div class="pres-stat-box">
            <div class="pres-stat-num" style="color:#F57C00;" id="statTalks">3</div>
            <div class="pres-stat-label">Invited Talks</div>
        </div>
        <div class="pres-stat-box">
            <div class="pres-stat-num" style="color:#ef4444;" id="statUpcoming">2</div>
            <div class="pres-stat-label">Upcoming</div>
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
                           placeholder="Search presentations..." style="padding-left:32px;" autocomplete="off">
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
                    <button class="filter-tab" data-filter="Invited Talk">
                        Invited Talk <span class="tab-count">0</span>
                    </button>
                </div>
            </div>
            <div style="display:flex;align-items:center;gap:10px;">
                <span id="presCount" style="font-size:.78rem;color:var(--clr-muted);">0 presentations</span>
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
            $presentations = [
                [
                    'title'    => 'AI-Augmented Pedagogy: Reimagining the Filipino Classroom',
                    'venue'    => 'Asia Pacific Education Conference 2024',
                    'location' => 'Singapore',
                    'date'     => '2024-11-14',
                    'disp_date'=> 'Nov 14–16, 2024',
                    'type'     => 'International',
                    'role'     => 'Paper Presenter',
                    'color'    => '#10b981',
                    'icon'     => 'presentation',
                    'status'   => 'Completed',
                    'badge'    => 'badge-green',
                ],
                [
                    'title'    => 'Participatory Action Research in Bicol Region Schools',
                    'venue'    => 'National Research Symposium 2024',
                    'location' => 'Quezon City, PH',
                    'date'     => '2024-09-05',
                    'disp_date'=> 'Sep 5–6, 2024',
                    'type'     => 'National',
                    'role'     => 'Paper Presenter',
                    'color'    => '#2563eb',
                    'icon'     => 'presentation',
                    'status'   => 'Completed',
                    'badge'    => 'badge-blue',
                ],
                [
                    'title'    => 'Digital Literacy and Teacher Competency in the 21st Century',
                    'venue'    => 'BUOU Faculty Research Forum 2024',
                    'location' => 'Legazpi City, PH',
                    'date'     => '2024-07-10',
                    'disp_date'=> 'Jul 10, 2024',
                    'type'     => 'Invited Talk',
                    'role'     => 'Keynote Speaker',
                    'color'    => '#7c3aed',
                    'icon'     => 'mic',
                    'status'   => 'Completed',
                    'badge'    => 'badge-purple',
                ],
                [
                    'title'    => 'Competency Gaps in Philippine STEM Education: Evidence from Bicol',
                    'venue'    => 'International STEM Education Conference',
                    'location' => 'Kuala Lumpur, MY',
                    'date'     => '2024-03-20',
                    'disp_date'=> 'Mar 20–22, 2024',
                    'type'     => 'International',
                    'role'     => 'Paper Presenter',
                    'color'    => '#F57C00',
                    'icon'     => 'presentation',
                    'status'   => 'Completed',
                    'badge'    => 'badge-orange',
                ],
                [
                    'title'    => 'Governance and Accountability in SUC Management',
                    'venue'    => 'CHED Regional Conference V 2025',
                    'location' => 'Naga City, PH',
                    'date'     => '2025-06-05',
                    'disp_date'=> 'Jun 5, 2025',
                    'type'     => 'Regional',
                    'role'     => 'Invited Speaker',
                    'color'    => '#06b6d4',
                    'icon'     => 'mic',
                    'status'   => 'Upcoming',
                    'badge'    => 'badge-blue',
                ],
                [
                    'title'    => 'Transformative Learning and Faculty Wellness Post-Pandemic',
                    'venue'    => 'National Psychology and Education Summit',
                    'location' => 'Cebu City, PH',
                    'date'     => '2025-08-22',
                    'disp_date'=> 'Aug 22–23, 2025',
                    'type'     => 'National',
                    'role'     => 'Panel Discussant',
                    'color'    => '#ec4899',
                    'icon'     => 'presentation',
                    'status'   => 'Upcoming',
                    'badge'    => 'badge-gray',
                ],
            ];
        @endphp

        {{-- GRID VIEW --}}
        <div class="pres-grid" id="presGrid">
            @foreach($presentations as $i => $pres)
            <div class="pres-card"
                 data-pres-type="{{ $pres['type'] }}"
                 data-title="{{ $pres['title'] }}"
                 data-venue="{{ $pres['venue'] }}"
                 data-location="{{ $pres['location'] }}"
                 data-isodate="{{ $pres['date'] }}"
                 data-type="{{ $pres['type'] }}"
                 data-role="{{ $pres['role'] }}"
                 data-status="{{ $pres['status'] }}"
                 style="animation-delay:{{ $i * 0.07 }}s;">

                <div class="pres-card-head" style="background:{{ $pres['color'] }};">
                    <div class="pres-card-icon">
                        <i data-lucide="{{ $pres['icon'] }}"
                           style="width:20px;height:20px;color:#fff;"></i>
                    </div>
                    <h6>{{ $pres['title'] }}</h6>
                    <div class="pres-venue">{{ $pres['venue'] }}</div>
                </div>

                <div class="pres-card-body">
                    <div class="pres-card-meta">
                        <span>
                            <i data-lucide="map-pin" style="width:11px;height:11px;"></i>
                            {{ $pres['location'] }}
                        </span>
                        <span>
                            <i data-lucide="calendar" style="width:11px;height:11px;"></i>
                            {{ $pres['disp_date'] }}
                        </span>
                    </div>

                    <div class="pres-tags">
                        <span class="badge {{ $pres['badge'] }}" style="font-size:.7rem;">
                            {{ $pres['type'] }}
                        </span>
                        <span class="pres-role-tag">{{ $pres['role'] }}</span>
                    </div>

                    <div class="pres-card-footer">
                        <span class="pres-status"
                              style="color:{{ $pres['status'] === 'Upcoming' ? '#F57C00' : '#10b981' }};">
                            <i data-lucide="{{ $pres['status'] === 'Upcoming' ? 'clock' : 'check-circle' }}"
                               style="width:12px;height:12px;"></i>
                            {{ $pres['status'] }}
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
            @foreach($presentations as $i => $pres)
            <div class="pres-list-card"
                 data-pres-type="{{ $pres['type'] }}"
                 data-title="{{ $pres['title'] }}"
                 data-venue="{{ $pres['venue'] }}"
                 data-location="{{ $pres['location'] }}"
                 data-isodate="{{ $pres['date'] }}"
                 data-type="{{ $pres['type'] }}"
                 data-role="{{ $pres['role'] }}"
                 data-status="{{ $pres['status'] }}"
                 style="animation-delay:{{ $i * 0.04 }}s;">
                <span class="pres-list-dot" style="background:{{ $pres['color'] }};"></span>
                <div class="pres-list-body">
                    <div class="pres-list-title">{{ $pres['title'] }}</div>
                    <div class="pres-list-meta">
                        <span>{{ $pres['venue'] }}</span>
                        <span>{{ $pres['disp_date'] }}</span>
                        <span>{{ $pres['location'] }}</span>
                    </div>
                </div>
                <span class="badge {{ $pres['badge'] }}" style="font-size:.7rem;flex-shrink:0;">
                    {{ $pres['type'] }}
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
                    <path d="M15 10l4.553-2.276A1 1 0 0 1 21 8.618v6.764a1 1 0 0 1-1.447.894L15 14M3 8a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8z"/>
                </svg>
                <h5>No presentations found</h5>
                <p>Try adjusting your search or filter, or add a new presentation.</p>
            </div>
        </div>

    </div>

</div>

{{-- ═══════════════════════════════════════════════════════════
     ADD PRESENTATION MODAL
════════════════════════════════════════════════════════════ --}}
<div id="addModal" class="modal-overlay">
    <div class="card-ui modal-box">
        <div class="modal-header">
            <h6>
                <i data-lucide="plus-circle"
                   style="width:16px;height:16px;display:inline;vertical-align:middle;
                          margin-right:6px;color:var(--clr-accent);"></i>
                Add Presentation
            </h6>
            <button class="icon-btn" style="width:32px;height:32px;" onclick="closeModal('addModal')">
                <i data-lucide="x" style="width:14px;height:14px;"></i>
            </button>
        </div>
        <form id="addPresForm" novalidate>
            @csrf

            <div class="form-group">
                <label class="form-label">Presentation Title <span style="color:#ef4444;">*</span></label>
                <input type="text" class="form-input" name="txt_title"
                       placeholder="Full title of paper or talk" required>
                <div class="form-error">This field is required.</div>
            </div>

            <div class="form-group">
                <label class="form-label">Conference / Venue <span style="color:#ef4444;">*</span></label>
                <input type="text" class="form-input" name="txt_venue"
                       placeholder="e.g. Asia Pacific Education Conference 2024" required>
                <div class="form-error">This field is required.</div>
            </div>

            <div class="form-group">
                <label class="form-label">Location</label>
                <input type="text" class="form-input" name="txt_location"
                       placeholder="e.g. Singapore or Quezon City, PH">
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
                        <option>Invited Talk</option>
                    </select>
                    <div class="form-error">Please select a type.</div>
                </div>
            </div>

            <div class="form-grid-2">
                <div class="form-group">
                    <label class="form-label">Your Role</label>
                    <select class="form-input" name="txt_role">
                        <option value="" disabled selected>Select role</option>
                        <option>Paper Presenter</option>
                        <option>Keynote Speaker</option>
                        <option>Invited Speaker</option>
                        <option>Panel Discussant</option>
                        <option>Co-Presenter</option>
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
                    Save Presentation
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ═══════════════════════════════════════════════════════════
     EDIT MODAL — dynamically populated via JS
════════════════════════════════════════════════════════════ --}}
<div id="editModal" class="modal-overlay">
    <div class="card-ui modal-box">
        <div class="modal-header">
            <h6>
                <i data-lucide="pencil"
                   style="width:15px;height:15px;display:inline;vertical-align:middle;
                          margin-right:6px;color:#F57C00;"></i>
                Edit Presentation
            </h6>
            <button class="icon-btn" style="width:32px;height:32px;" onclick="closeModal('editModal')">
                <i data-lucide="x" style="width:14px;height:14px;"></i>
            </button>
        </div>
        <form id="editPresForm" novalidate>
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label">Presentation Title <span style="color:#ef4444;">*</span></label>
                <input type="text" class="form-input" name="txt_title" required>
                <div class="form-error">This field is required.</div>
            </div>

            <div class="form-group">
                <label class="form-label">Conference / Venue <span style="color:#ef4444;">*</span></label>
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
                        <option>Invited Talk</option>
                    </select>
                    <div class="form-error">Please select a type.</div>
                </div>
            </div>

            <div class="form-grid-2">
                <div class="form-group">
                    <label class="form-label">Your Role</label>
                    <select class="form-input" name="txt_role">
                        <option value="">Select role</option>
                        <option>Paper Presenter</option>
                        <option>Keynote Speaker</option>
                        <option>Invited Speaker</option>
                        <option>Panel Discussant</option>
                        <option>Co-Presenter</option>
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
                    Update Presentation
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
            Delete Presentation?
        </h6>
        <p style="font-size:.83rem;color:var(--clr-muted);margin-bottom:20px;line-height:1.5;">
            This action cannot be undone. The presentation record will be permanently removed.
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