@extends('Faculty.facultylayout')

@section('title', 'Publications')

@section('content')

<link rel="stylesheet" href="{{ asset('css/Faculty/Faculty_Dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('css/Faculty/Faculty_Publications.css') }}">

<div class="space-y-6">

    {{-- ── PAGE HEADER ──────────────────────────────────────── --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Publications</h1>
            <p class="page-subtitle">Manage your research outputs and scholarly works</p>
        </div>
        <button class="btn-add" onclick="openModal('addModal')">
            <i data-lucide="plus" style="width:16px;height:16px;"></i>
            Add Publication
        </button>
    </div>

    {{-- ── STATS ROW ────────────────────────────────────────── --}}
    <div class="pub-stats-row">
        <div class="pub-stat-box">
            <div class="pub-stat-num" style="color:#10b981;">8</div>
            <div class="pub-stat-label">Total Publications</div>
        </div>
        <div class="pub-stat-box">
            <div class="pub-stat-num" style="color:#2563eb;">3</div>
            <div class="pub-stat-label">International</div>
        </div>
        <div class="pub-stat-box">
            <div class="pub-stat-num" style="color:#7c3aed;">24</div>
            <div class="pub-stat-label">Total Citations</div>
        </div>
        <div class="pub-stat-box">
            <div class="pub-stat-num" style="color:#F57C00;">2</div>
            <div class="pub-stat-label">Pending Review</div>
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
                    <input type="text" id="pubSearch" class="search-box"
                           placeholder="Search publications..." style="padding-left:32px;">
                </div>
                <div class="filter-tabs">
                    <button class="filter-tab active" data-filter="all">All</button>
                    <button class="filter-tab" data-filter="International">International</button>
                    <button class="filter-tab" data-filter="National">National</button>
                    <button class="filter-tab" data-filter="Local">Local</button>
                    <button class="filter-tab" data-filter="Pending">Pending</button>
                </div>
            </div>
            <div style="display:flex;align-items:center;gap:8px;">
                <span id="pubCount" style="font-size:.78rem;color:var(--clr-muted);">8 publications</span>
                {{-- View toggle --}}
                <div class="view-toggle">
                    <button class="view-toggle-btn active" id="btnGrid" title="Card view">
                        <i data-lucide="layout-grid" style="width:14px;height:14px;"></i>
                    </button>
                    <button class="view-toggle-btn" id="btnList" title="List view">
                        <i data-lucide="list" style="width:14px;height:14px;"></i>
                    </button>
                </div>
            </div>
        </div>

        {{-- ── CARD GRID VIEW ────────────────────────────────── --}}
        @php
            $publications = [
                [
                    'title'   => 'Integrating AI Tools in Higher Education: A Mixed-Methods Study',
                    'authors' => 'Dela Cruz, J., Santos, M., Reyes, P.',
                    'journal' => 'International Journal of Educational Technology',
                    'year'    => 2024,
                    'type'    => 'International',
                    'doi'     => '10.1234/ijet.2024.001',
                    'if'      => 'IF: 3.2',
                    'abstract'=> 'This study investigates the integration of artificial intelligence tools within Philippine higher education institutions, employing a mixed-methods approach across four universities in Region V.',
                    'color'   => '#10b981',
                    'status_badge' => 'badge-green',
                    'status'  => 'Published',
                ],
                [
                    'title'   => 'Competency-Based Assessment in STEM Education: A Systematic Review',
                    'authors' => 'Dela Cruz, J., Mendoza, R.',
                    'journal' => 'Philippine Journal of Science and Education',
                    'year'    => 2024,
                    'type'    => 'National',
                    'doi'     => '10.5678/pjse.2024.042',
                    'if'      => 'Peer-reviewed',
                    'abstract'=> 'A systematic review of competency-based assessment frameworks applied in STEM disciplines across Philippine educational institutions from 2018 to 2024.',
                    'color'   => '#2563eb',
                    'status_badge' => 'badge-blue',
                    'status'  => 'Published',
                ],
                [
                    'title'   => 'Faculty Development Needs in the Post-Pandemic Landscape',
                    'authors' => 'Dela Cruz, J., Torres, A., Garcia, L.',
                    'journal' => 'Asia Pacific Journal of Education',
                    'year'    => 2023,
                    'type'    => 'International',
                    'doi'     => '10.9012/apje.2023.017',
                    'if'      => 'IF: 2.8',
                    'abstract'=> 'Explores faculty professional development needs and institutional support systems following the COVID-19 pandemic, with focus on digital readiness and instructional continuity.',
                    'color'   => '#7c3aed',
                    'status_badge' => 'badge-purple',
                    'status'  => 'Published',
                ],
                [
                    'title'   => 'Participatory Action Research in Community-Based Education Programs',
                    'authors' => 'Dela Cruz, J.',
                    'journal' => 'BUOU Research Journal',
                    'year'    => 2023,
                    'type'    => 'Local',
                    'doi'     => '—',
                    'if'      => 'Institutional',
                    'abstract'=> 'A participatory action research examining community-based education programs implemented in partnership with Barangay Councils in Legazpi City.',
                    'color'   => '#F57C00',
                    'status_badge' => 'badge-orange',
                    'status'  => 'Published',
                ],
                [
                    'title'   => 'Digital Literacy Frameworks for 21st Century Filipino Teachers',
                    'authors' => 'Dela Cruz, J., Buena, K., Lim, S.',
                    'journal' => 'Educational Technology & Society',
                    'year'    => 2025,
                    'type'    => 'International',
                    'doi'     => 'Under review',
                    'if'      => 'IF: 4.1',
                    'abstract'=> 'Proposes a localized digital literacy framework for Filipino secondary and tertiary educators, anchored on the DepEd and CHED digital competency standards.',
                    'color'   => '#94a3b8',
                    'status_badge' => 'badge-gray',
                    'status'  => 'Pending',
                ],
            ];
        @endphp

        <div class="pub-grid" id="pubGrid">
            @foreach($publications as $i => $pub)
            <div class="pub-card" data-type="{{ $pub['type'] }}"
                 style="animation-delay: {{ $i * 0.07 }}s;">
                <div class="pub-card-stripe" style="background:{{ $pub['color'] }};"></div>

                <div class="pub-card-header">
                    <h6 class="pub-card-title">{{ $pub['title'] }}</h6>
                    <div class="pub-card-actions">
                        @if($pub['doi'] !== '—' && $pub['doi'] !== 'Under review')
                        <a href="https://doi.org/{{ $pub['doi'] }}" target="_blank"
                           class="pub-action-btn link" title="Open DOI">
                            <i data-lucide="external-link" style="width:12px;height:12px;"></i>
                        </a>
                        @endif
                        <button class="pub-action-btn edit" title="Edit"
                                onclick="openModal('editModal')">
                            <i data-lucide="pencil" style="width:12px;height:12px;"></i>
                        </button>
                        <button class="pub-action-btn del" title="Delete"
                                onclick="confirmDelete(this)">
                            <i data-lucide="trash-2" style="width:12px;height:12px;"></i>
                        </button>
                    </div>
                </div>

                <p class="pub-authors">{{ $pub['authors'] }}</p>

                <div class="pub-meta">
                    <i data-lucide="book-open" style="width:11px;height:11px;"></i>
                    <span>{{ $pub['journal'] }}</span>
                    <span class="pub-meta-sep">·</span>
                    <span>{{ $pub['year'] }}</span>
                    <span class="pub-meta-sep">·</span>
                    <span class="badge {{ $pub['status_badge'] }}" style="font-size:.68rem;padding:2px 8px;">
                        {{ $pub['type'] }}
                    </span>
                </div>

                <p class="pub-abstract">{{ $pub['abstract'] }}</p>

                <div class="pub-card-footer">
                    @if($pub['doi'] !== '—' && $pub['doi'] !== 'Under review')
                    <a href="https://doi.org/{{ $pub['doi'] }}" target="_blank" class="pub-doi">
                        <i data-lucide="link" style="width:10px;height:10px;"></i>
                        DOI: {{ $pub['doi'] }}
                    </a>
                    @else
                    <span style="font-size:.72rem;color:var(--clr-muted);">{{ $pub['doi'] }}</span>
                    @endif
                    <div class="impact-pill">{{ $pub['if'] }}</div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- ── LIST VIEW (hidden by default) ─────────────────── --}}
        <div id="pubList" class="hidden">
            <div class="table-wrapper">
                @foreach($publications as $i => $pub)
                <div class="pub-list-item" data-type="{{ $pub['type'] }}">
                    <div class="pub-list-num">{{ $i + 1 }}</div>
                    <div class="pub-list-body">
                        <div class="pub-list-title">{{ $pub['title'] }}</div>
                        <div class="pub-list-meta">
                            {{ $pub['authors'] }} ·
                            <em>{{ $pub['journal'] }}</em> ·
                            {{ $pub['year'] }}
                        </div>
                    </div>
                    <span class="badge {{ $pub['status_badge'] }}" style="flex-shrink:0;">
                        {{ $pub['type'] }}
                    </span>
                    <div style="display:flex;gap:4px;flex-shrink:0;">
                        <button class="pub-action-btn edit" onclick="openModal('editModal')"
                                title="Edit">
                            <i data-lucide="pencil" style="width:12px;height:12px;"></i>
                        </button>
                        <button class="pub-action-btn del" onclick="confirmDelete(this)"
                                title="Delete">
                            <i data-lucide="trash-2" style="width:12px;height:12px;"></i>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>

</div>

{{-- ── ADD PUBLICATION MODAL ──────────────────────────────── --}}
<div id="addModal" class="modal-overlay">
    <div class="card-ui modal-box">
        <div class="modal-header">
            <h6>Add Publication</h6>
            <button class="icon-btn" style="width:32px;height:32px;" onclick="closeModal('addModal')">
                <i data-lucide="x" style="width:14px;height:14px;"></i>
            </button>
        </div>

        <form id="addPubForm">
            @csrf
            <div class="form-group">
                <label class="form-label">Title *</label>
                <input type="text" class="form-input" name="txt_title"
                       placeholder="Full paper title" required>
            </div>
            <div class="form-group">
                <label class="form-label">Authors *</label>
                <input type="text" class="form-input" name="txt_authors"
                       placeholder="e.g. Dela Cruz, J., Santos, M." required>
            </div>
            <div class="form-group">
                <label class="form-label">Journal / Publication Venue *</label>
                <input type="text" class="form-input" name="txt_journal"
                       placeholder="Journal or conference name" required>
            </div>
            <div class="form-grid-2">
                <div class="form-group">
                    <label class="form-label">Year *</label>
                    <input type="number" class="form-input" name="txt_year"
                           min="2000" max="2030" placeholder="e.g. 2024" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Type *</label>
                    <select class="form-input" name="txt_type" required>
                        <option value="" disabled selected>Select type</option>
                        <option>International</option>
                        <option>National</option>
                        <option>Local</option>
                    </select>
                </div>
            </div>
            <div class="form-grid-2">
                <div class="form-group">
                    <label class="form-label">DOI / URL</label>
                    <input type="text" class="form-input" name="txt_doi"
                           placeholder="10.xxxx/xxxxx">
                </div>
                <div class="form-group">
                    <label class="form-label">Status</label>
                    <select class="form-input" name="txt_status">
                        <option value="" disabled selected>Select status</option>
                        <option>Published</option>
                        <option>Pending</option>
                        <option>In Press</option>
                        <option>Retracted</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Abstract</label>
                <textarea class="form-input" name="txt_abstract" rows="3"
                          placeholder="Brief description of the paper..."></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeModal('addModal')">Cancel</button>
                <button type="submit" class="btn-save">
                    <i data-lucide="save" style="width:13px;height:13px;display:inline;vertical-align:middle;margin-right:4px;"></i>
                    Save Publication
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ── EDIT MODAL ──────────────────────────────────────────── --}}
<div id="editModal" class="modal-overlay">
    <div class="card-ui modal-box">
        <div class="modal-header">
            <h6>Edit Publication</h6>
            <button class="icon-btn" style="width:32px;height:32px;" onclick="closeModal('editModal')">
                <i data-lucide="x" style="width:14px;height:14px;"></i>
            </button>
        </div>
        <form>
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="form-label">Title</label>
                <input type="text" class="form-input" name="txt_title"
                       value="Integrating AI Tools in Higher Education: A Mixed-Methods Study">
            </div>
            <div class="form-group">
                <label class="form-label">Authors</label>
                <input type="text" class="form-input" name="txt_authors"
                       value="Dela Cruz, J., Santos, M., Reyes, P.">
            </div>
            <div class="form-grid-2">
                <div class="form-group">
                    <label class="form-label">Year</label>
                    <input type="number" class="form-input" name="txt_year" value="2024">
                </div>
                <div class="form-group">
                    <label class="form-label">Type</label>
                    <select class="form-input" name="txt_type">
                        <option selected>International</option>
                        <option>National</option>
                        <option>Local</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeModal('editModal')">Cancel</button>
                <button type="submit" class="btn-save">Update Publication</button>
            </div>
        </form>
    </div>
</div>

{{-- ── DELETE CONFIRM ───────────────────────────────────────── --}}
<div id="deleteModal" class="modal-overlay">
    <div class="card-ui modal-box" style="max-width:380px;text-align:center;">
        <div style="width:52px;height:52px;border-radius:16px;background:#fef2f2;
                    color:#ef4444;display:flex;align-items:center;justify-content:center;
                    margin:0 auto 16px;">
            <i data-lucide="trash-2" style="width:22px;height:22px;"></i>
        </div>
        <h6 style="font-size:1rem;font-weight:700;color:var(--clr-text);margin-bottom:8px;">
            Remove Publication?
        </h6>
        <p style="font-size:.83rem;color:var(--clr-muted);margin-bottom:20px;">
            This will permanently delete the publication record. This action cannot be undone.
        </p>
        <div style="display:flex;gap:10px;justify-content:center;">
            <button class="btn-cancel" onclick="closeModal('deleteModal')">Cancel</button>
            <button class="btn-save" style="background:#ef4444;" id="confirmDeleteBtn">
                Yes, Delete
            </button>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/Faculty/Faculty_Publications.js') }}"></script>
@endpush