@extends('Faculty.facultylayout')

@section('title', 'Trainings')

@section('content')

<link rel="stylesheet" href="{{ asset('css/Faculty/Faculty_Dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('css/Faculty/Faculty_Trainings.css') }}">

<div class="space-y-6">

    {{-- ── PAGE HEADER ──────────────────────────────────────── --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Trainings &amp; Seminars</h1>
            <p class="page-subtitle">Track, manage, and upload your training certificates</p>
        </div>
        <button class="btn-add" onclick="openModal('addModal')">
            <i data-lucide="plus" style="width:16px;height:16px;"></i>
            Add Training
        </button>
    </div>

    {{-- ── QUICK STATS ───────────────────────────────────────── --}}
    <div class="stats-grid">

        <div class="stat-card border-green">
            <div class="stat-card-inner">
                <div class="stat-info">
                    <p>Total Trainings</p>
                    <h2 id="statTotal">3</h2>
                    <small>All records</small>
                </div>
                <div class="stat-icon">
                    <i data-lucide="book-open" style="width:22px;height:22px;"></i>
                </div>
            </div>
        </div>

        <div class="stat-card border-blue">
            <div class="stat-card-inner">
                <div class="stat-info">
                    <p>International</p>
                    <h2 id="statIntl">1</h2>
                    <small>Completed</small>
                </div>
                <div class="stat-icon">
                    <i data-lucide="globe" style="width:22px;height:22px;"></i>
                </div>
            </div>
        </div>

        <div class="stat-card border-purple">
            <div class="stat-card-inner">
                <div class="stat-info">
                    <p>National</p>
                    <h2 id="statNatl">1</h2>
                    <small>Completed</small>
                </div>
                <div class="stat-icon">
                    <i data-lucide="flag" style="width:22px;height:22px;"></i>
                </div>
            </div>
        </div>

        <div class="stat-card border-orange">
            <div class="stat-card-inner">
                <div class="stat-info">
                    <p>Pending / Ongoing</p>
                    <h2 id="statPending">1</h2>
                    <small>In progress</small>
                </div>
                <div class="stat-icon">
                    <i data-lucide="clock" style="width:22px;height:22px;"></i>
                </div>
            </div>
        </div>

    </div>

    {{-- ── TABLE CARD ────────────────────────────────────────── --}}
    <div class="card-ui">

        {{-- Toolbar --}}
        <div class="toolbar">
            <div class="toolbar-left">
                <div style="position:relative;">
                    <i data-lucide="search"
                       style="position:absolute;left:10px;top:50%;transform:translateY(-50%);
                              width:14px;height:14px;color:var(--clr-muted);pointer-events:none;"></i>
                    <input type="text" id="trainingSearch"
                           placeholder="Search trainings..."
                           class="search-box" style="padding-left:32px;" autocomplete="off">
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

            <div class="toolbar-right">
                <button class="icon-btn" id="exportBtn" title="Export CSV"
                        style="width:36px;height:36px;">
                    <i data-lucide="download" style="width:15px;height:15px;"></i>
                </button>
            </div>
        </div>

        {{-- Table --}}
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th><button class="table-sort-btn" data-col="title">
                            Title <i data-lucide="chevrons-up-down" class="sort-icon" style="width:10px;height:10px;"></i>
                        </button></th>
                        <th><button class="table-sort-btn" data-col="type">
                            Type <i data-lucide="chevrons-up-down" class="sort-icon" style="width:10px;height:10px;"></i>
                        </button></th>
                        <th><button class="table-sort-btn" data-col="category">
                            Category <i data-lucide="chevrons-up-down" class="sort-icon" style="width:10px;height:10px;"></i>
                        </button></th>
                        <th><button class="table-sort-btn" data-col="date">
                            Date <i data-lucide="chevrons-up-down" class="sort-icon" style="width:10px;height:10px;"></i>
                        </button></th>
                        <th>Certificate</th>
                        <th><button class="table-sort-btn" data-col="status">
                            Status <i data-lucide="chevrons-up-down" class="sort-icon" style="width:10px;height:10px;"></i>
                        </button></th>
                        <th style="text-align:right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="trainingTableBody">

                    {{-- Replace with @forelse when connected to DB --}}
                    <tr data-type="International">
                        <td style="font-weight:600;">Research Methodology Seminar</td>
                        <td><span class="badge badge-green">International</span></td>
                        <td style="color:var(--clr-muted);font-size:.82rem;">Research</td>
                        <td style="color:var(--clr-muted);font-size:.82rem;">Apr 15, 2025</td>
                        <td>
                            <span style="display:flex;align-items:center;gap:6px;font-size:.8rem;color:var(--clr-accent);">
                                <i data-lucide="file-check" style="width:14px;height:14px;"></i> Uploaded
                            </span>
                        </td>
                        <td><span class="badge badge-green">Completed</span></td>
                        <td>
                            <div class="action-btns" style="justify-content:flex-end;">
                                <button class="action-btn view" title="View" onclick="openViewModal(this)">
                                    <i data-lucide="eye" style="width:13px;height:13px;"></i>
                                </button>
                                <button class="action-btn edit" title="Edit" onclick="openEditModal(this)">
                                    <i data-lucide="pencil" style="width:13px;height:13px;"></i>
                                </button>
                                <button class="action-btn del" title="Delete" onclick="confirmDelete(this)">
                                    <i data-lucide="trash-2" style="width:13px;height:13px;"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr data-type="National">
                        <td style="font-weight:600;">Procurement Training</td>
                        <td><span class="badge badge-blue">National</span></td>
                        <td style="color:var(--clr-muted);font-size:.82rem;">Finance</td>
                        <td style="color:var(--clr-muted);font-size:.82rem;">Mar 5, 2025</td>
                        <td>
                            <span style="display:flex;align-items:center;gap:6px;font-size:.8rem;color:var(--clr-muted);">
                                <i data-lucide="file-x" style="width:14px;height:14px;"></i> Pending
                            </span>
                        </td>
                        <td><span class="badge badge-blue">Completed</span></td>
                        <td>
                            <div class="action-btns" style="justify-content:flex-end;">
                                <button class="action-btn view" title="View" onclick="openViewModal(this)">
                                    <i data-lucide="eye" style="width:13px;height:13px;"></i>
                                </button>
                                <button class="action-btn edit" title="Edit" onclick="openEditModal(this)">
                                    <i data-lucide="pencil" style="width:13px;height:13px;"></i>
                                </button>
                                <button class="action-btn del" title="Delete" onclick="confirmDelete(this)">
                                    <i data-lucide="trash-2" style="width:13px;height:13px;"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr data-type="Regional">
                        <td style="font-weight:600;">ICT Integration Workshop</td>
                        <td><span class="badge badge-purple">Regional</span></td>
                        <td style="color:var(--clr-muted);font-size:.82rem;">Technology</td>
                        <td style="color:var(--clr-muted);font-size:.82rem;">May 3, 2025</td>
                        <td>
                            <span style="display:flex;align-items:center;gap:6px;font-size:.8rem;color:var(--clr-muted);">
                                <i data-lucide="file-x" style="width:14px;height:14px;"></i> None
                            </span>
                        </td>
                        <td><span class="badge badge-orange">Ongoing</span></td>
                        <td>
                            <div class="action-btns" style="justify-content:flex-end;">
                                <button class="action-btn view" title="View" onclick="openViewModal(this)">
                                    <i data-lucide="eye" style="width:13px;height:13px;"></i>
                                </button>
                                <button class="action-btn edit" title="Edit" onclick="openEditModal(this)">
                                    <i data-lucide="pencil" style="width:13px;height:13px;"></i>
                                </button>
                                <button class="action-btn del" title="Delete" onclick="confirmDelete(this)">
                                    <i data-lucide="trash-2" style="width:13px;height:13px;"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- Empty state row (hidden when rows exist) --}}
                    <tr id="emptyState" style="display:none;">
                        <td colspan="7">
                            <div class="empty-state">
                                <svg class="empty-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/>
                                    <rect x="9" y="3" width="6" height="4" rx="1"/>
                                    <line x1="9" y1="12" x2="15" y2="12"/>
                                    <line x1="9" y1="16" x2="13" y2="16"/>
                                </svg>
                                <h5>No trainings found</h5>
                                <p>Try adjusting your search or filter, or add a new training record.</p>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="pagination-bar">
            <span id="rowCountTrainings">Showing 3 entries</span>
            <div class="page-btns">
                <button class="page-btn" disabled>
                    <i data-lucide="chevron-left" style="width:12px;height:12px;"></i>
                </button>
                <button class="page-btn active">1</button>
                <button class="page-btn" disabled>
                    <i data-lucide="chevron-right" style="width:12px;height:12px;"></i>
                </button>
            </div>
        </div>

    </div>

</div>

{{-- ═══════════════════════════════════════════════════════════
     ADD TRAINING MODAL
════════════════════════════════════════════════════════════ --}}
<div id="addModal" class="modal-overlay">
    <div class="card-ui modal-box">

        <div class="modal-header">
            <h6>
                <i data-lucide="plus-circle"
                   style="width:16px;height:16px;display:inline;vertical-align:middle;
                          margin-right:6px;color:var(--clr-accent);"></i>
                Add New Training
            </h6>
            <button class="icon-btn" style="width:32px;height:32px;" onclick="closeModal('addModal')">
                <i data-lucide="x" style="width:14px;height:14px;"></i>
            </button>
        </div>

        <form id="addTrainingForm" enctype="multipart/form-data" novalidate>
            @csrf

            <div class="form-group">
                <label class="form-label">Training Title <span style="color:#ef4444;">*</span></label>
                <input type="text" class="form-input" name="txt_title"
                       placeholder="e.g. Research Methodology Seminar" required>
                <div class="form-error">This field is required.</div>
            </div>

            <div class="form-grid-2">
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
                <div class="form-group">
                    <label class="form-label">Category</label>
                    <select class="form-input" name="txt_category">
                        <option value="" disabled selected>Select category</option>
                        <option>Research</option>
                        <option>Teaching</option>
                        <option>Finance / Procurement</option>
                        <option>Leadership</option>
                        <option>Technology / ICT</option>
                        <option>Health &amp; Safety</option>
                        <option>Other</option>
                    </select>
                </div>
            </div>

            <div class="form-grid-2">
                <div class="form-group">
                    <label class="form-label">Start Date</label>
                    <input type="date" class="form-input" name="txt_start_date">
                </div>
                <div class="form-group">
                    <label class="form-label">End Date</label>
                    <input type="date" class="form-input" name="txt_end_date">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Status</label>
                <select class="form-input" name="txt_status">
                    <option value="" disabled selected>Select status</option>
                    <option>Completed</option>
                    <option>Ongoing</option>
                    <option>Pending</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Certificate (PDF / Image)</label>
                <input type="file" class="form-input" name="txt_certificate"
                       id="certFile" accept=".pdf,.jpg,.jpeg,.png">
                <div class="cert-preview" id="certPreview">
                    <i data-lucide="file-check" style="width:14px;height:14px;flex-shrink:0;"></i>
                    <span id="certName"></span>
                    <button type="button" class="cert-preview-remove" title="Remove file">
                        <i data-lucide="x" style="width:12px;height:12px;"></i>
                    </button>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeModal('addModal')">Cancel</button>
                <button type="submit" class="btn-save">
                    <i data-lucide="save" style="width:14px;height:14px;"></i>
                    Save Training
                </button>
            </div>
        </form>

    </div>
</div>

{{-- ═══════════════════════════════════════════════════════════
     EDIT MODAL — dynamically populated by JS
════════════════════════════════════════════════════════════ --}}
<div id="editModal" class="modal-overlay">
    <div class="card-ui modal-box">
        <div class="modal-header">
            <h6>
                <i data-lucide="pencil"
                   style="width:15px;height:15px;display:inline;vertical-align:middle;
                          margin-right:6px;color:#F57C00;"></i>
                Edit Training
            </h6>
            <button class="icon-btn" style="width:32px;height:32px;" onclick="closeModal('editModal')">
                <i data-lucide="x" style="width:14px;height:14px;"></i>
            </button>
        </div>
        <form id="editTrainingForm" novalidate>
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label">Training Title <span style="color:#ef4444;">*</span></label>
                <input type="text" class="form-input" name="txt_title" required>
                <div class="form-error">This field is required.</div>
            </div>

            <div class="form-grid-2">
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
                <div class="form-group">
                    <label class="form-label">Category</label>
                    <select class="form-input" name="txt_category">
                        <option value="">Select category</option>
                        <option>Research</option>
                        <option>Teaching</option>
                        <option>Finance / Procurement</option>
                        <option>Leadership</option>
                        <option>Technology / ICT</option>
                        <option>Health &amp; Safety</option>
                        <option>Other</option>
                    </select>
                </div>
            </div>

            <div class="form-grid-2">
                <div class="form-group">
                    <label class="form-label">Start Date</label>
                    <input type="date" class="form-input" name="txt_start_date">
                </div>
                <div class="form-group">
                    <label class="form-label">End Date</label>
                    <input type="date" class="form-input" name="txt_end_date">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Status</label>
                <select class="form-input" name="txt_status">
                    <option value="">Select status</option>
                    <option>Completed</option>
                    <option>Ongoing</option>
                    <option>Pending</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Replace Certificate (optional)</label>
                <input type="file" class="form-input" name="txt_certificate"
                       id="editCertFile" accept=".pdf,.jpg,.jpeg,.png">
                <div class="cert-preview" id="editCertPreview">
                    <i data-lucide="file-check" style="width:14px;height:14px;flex-shrink:0;"></i>
                    <span id="editCertName"></span>
                    <button type="button" class="cert-preview-remove" title="Remove file">
                        <i data-lucide="x" style="width:12px;height:12px;"></i>
                    </button>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeModal('editModal')">Cancel</button>
                <button type="submit" class="btn-save">
                    <i data-lucide="check" style="width:14px;height:14px;"></i>
                    Update Training
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ═══════════════════════════════════════════════════════════
     VIEW MODAL — read-only detail
════════════════════════════════════════════════════════════ --}}
<div id="viewModal" class="modal-overlay">
    <div class="card-ui modal-box" style="max-width:440px;">
        <div class="modal-header">
            <h6>
                <i data-lucide="eye"
                   style="width:15px;height:15px;display:inline;vertical-align:middle;
                          margin-right:6px;color:#2563eb;"></i>
                Training Details
            </h6>
            <button class="icon-btn" style="width:32px;height:32px;" onclick="closeModal('viewModal')">
                <i data-lucide="x" style="width:14px;height:14px;"></i>
            </button>
        </div>

        <div class="view-detail-row">
            <span class="view-detail-label">Title</span>
            <span class="view-detail-value" id="vwTitle">—</span>
        </div>
        <div class="view-divider"></div>
        <div class="view-detail-row">
            <span class="view-detail-label">Type</span>
            <span class="view-detail-value" id="vwType">—</span>
        </div>
        <div class="view-detail-row">
            <span class="view-detail-label">Category</span>
            <span class="view-detail-value" id="vwCategory">—</span>
        </div>
        <div class="view-detail-row">
            <span class="view-detail-label">Date</span>
            <span class="view-detail-value" id="vwDate">—</span>
        </div>
        <div class="view-detail-row">
            <span class="view-detail-label">Certificate</span>
            <span class="view-detail-value" id="vwCert">—</span>
        </div>
        <div class="view-detail-row">
            <span class="view-detail-label">Status</span>
            <span class="view-detail-value" id="vwStatus">—</span>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn-cancel" onclick="closeModal('viewModal')">Close</button>
        </div>
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
            Delete Training?
        </h6>
        <p style="font-size:.83rem;color:var(--clr-muted);margin-bottom:20px;line-height:1.5;">
            This action cannot be undone. The training record and its certificate will be permanently removed.
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
<script src="{{ asset('js/Faculty/Faculty_Trainings.js') }}"></script>
@endpush