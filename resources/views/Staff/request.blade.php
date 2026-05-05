@extends('Staff.layout')

@section('title', 'Active Requests')

@push('styles')
<style>
    /* ── Table row hover ── */
    .req-row { transition: background 0.12s ease; }
    .req-row:hover { background-color: rgb(245 243 255 / 1); }
    .dark .req-row:hover { background-color: rgb(46 16 101 / 0.15); }

    /* ── Progress mini bar ── */
    .mini-prog-fill {
        height: 100%;
        border-radius: 99px;
        background: linear-gradient(90deg, #7c3aed, #a78bfa);
        transition: width 0.4s ease;
    }

    /* ── Stat card entry animation ── */
    .stat-card { animation: statIn 0.35s ease both; }
    .stat-card:nth-child(1) { animation-delay: 0.05s; }
    .stat-card:nth-child(2) { animation-delay: 0.10s; }
    .stat-card:nth-child(3) { animation-delay: 0.15s; }
    .stat-card:nth-child(4) { animation-delay: 0.20s; }
    @keyframes statIn {
        from { opacity: 0; transform: translateY(10px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* ── Filter pill active state ── */
    .filter-select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%236B7280' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 10px center;
        padding-right: 32px;
    }

    /* ── View checklist button ── */
    .view-btn {
        transition: all 0.15s ease;
    }
    .view-btn:hover {
        transform: translateX(2px);
    }

    /* ── Badge variants ── */
    .badge-pending  { background:#fef9c3; color:#854d0e; border:1px solid #fde047; }
    .badge-review   { background:#ede9fe; color:#5b21b6; border:1px solid #c4b5fd; }
    .badge-action   { background:#fee2e2; color:#991b1b; border:1px solid #fca5a5; }
    .badge-approved { background:#dcfce7; color:#166534; border:1px solid #86efac; }
    .dark .badge-pending  { background:rgba(250,204,21,0.12); color:#fde047; border-color:rgba(250,204,21,0.25); }
    .dark .badge-review   { background:rgba(167,139,250,0.12); color:#a78bfa; border-color:rgba(167,139,250,0.3); }
    .dark .badge-action   { background:rgba(248,113,113,0.12); color:#f87171; border-color:rgba(248,113,113,0.3); }
    .dark .badge-approved { background:rgba(52,211,153,0.12); color:#34d399; border-color:rgba(52,211,153,0.3); }

    /* ── Empty state ── */
    #emptyRow { display: none; }
</style>
@endpush

@section('content')

{{-- ── Page Header ── --}}
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Active Requests</h1>
    <p class="text-sm text-gray-500 dark:text-gray-400 mt-0.5">
        Monitor and guide students through their ongoing requirement checklists. Leave notes or comments to assist them.
    </p>
</div>

{{-- ── Analytics Cards ── --}}
<div class="grid grid-cols-2 xl:grid-cols-4 gap-4 mb-6">

    <div class="stat-card bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 p-5 shadow-sm">
        <div class="w-9 h-9 rounded-xl bg-violet-50 dark:bg-violet-900/20 text-violet-600
                    flex items-center justify-center mb-3">
            <i data-lucide="clipboard-list" class="w-4 h-4"></i>
        </div>
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Total Active</p>
        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mt-0.5">24</h3>
        <p class="text-[11px] text-gray-400 mt-1 flex items-center gap-1">
            <i data-lucide="trending-up" class="w-3 h-3 text-emerald-500"></i>
            <span class="text-emerald-600 dark:text-emerald-400 font-semibold">+3</span> this week
        </p>
    </div>

    <div class="stat-card bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 p-5 shadow-sm">
        <div class="w-9 h-9 rounded-xl bg-amber-50 dark:bg-amber-900/20 text-amber-500
                    flex items-center justify-center mb-3">
            <i data-lucide="clock" class="w-4 h-4"></i>
        </div>
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Pending Review</p>
        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mt-0.5">9</h3>
        <p class="text-[11px] text-gray-400 mt-1">Awaiting staff action</p>
    </div>

    <div class="stat-card bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 p-5 shadow-sm">
        <div class="w-9 h-9 rounded-xl bg-red-50 dark:bg-red-900/20 text-red-500
                    flex items-center justify-center mb-3">
            <i data-lucide="alert-circle" class="w-4 h-4"></i>
        </div>
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Needs Attention</p>
        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mt-0.5">4</h3>
        <p class="text-[11px] text-gray-400 mt-1">Missing requirements</p>
    </div>

    <div class="stat-card bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 p-5 shadow-sm">
        <div class="w-9 h-9 rounded-xl bg-emerald-50 dark:bg-emerald-900/20 text-emerald-500
                    flex items-center justify-center mb-3">
            <i data-lucide="check-circle" class="w-4 h-4"></i>
        </div>
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Completed Today</p>
        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mt-0.5">3</h3>
        <p class="text-[11px] text-gray-400 mt-1">Ready for release</p>
    </div>

</div>

{{-- ── Requests Table Card ── --}}
<div class="bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 shadow-sm overflow-hidden">

    {{-- Table header + filters --}}
    <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-800">
        <div class="flex flex-col lg:flex-row lg:items-center gap-3">

            {{-- Title --}}
            <div class="flex-1">
                <h2 class="font-bold text-gray-800 dark:text-white text-sm">Student Checklists</h2>
                <p class="text-xs text-gray-400 mt-0.5">
                    <span id="visibleRowCount">7</span> active records shown
                </p>
            </div>

            {{-- Search --}}
            <div class="relative w-full lg:w-64">
                <i data-lucide="search" class="absolute left-3.5 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-gray-400 pointer-events-none"></i>
                <input id="studentSearch" type="text" placeholder="Search student name…"
                    class="w-full pl-9 pr-4 py-2 rounded-xl border border-gray-200 dark:border-gray-700
                           bg-gray-50 dark:bg-gray-800/60 text-sm text-gray-700 dark:text-gray-300
                           placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-violet-500 transition">
            </div>

            {{-- Date filter --}}
            <select id="filterDate"
                class="filter-select text-sm bg-gray-50 dark:bg-gray-800/60 border border-gray-200
                       dark:border-gray-700 rounded-xl px-3 py-2 text-gray-600 dark:text-gray-300
                       focus:outline-none focus:ring-2 focus:ring-violet-500 transition cursor-pointer w-full lg:w-auto">
                <option value="">All Dates</option>
                <option value="today">Filed Today</option>
                <option value="week">This Week</option>
                <option value="month">This Month</option>
            </select>

            {{-- Request type filter --}}
            <select id="filterType"
                class="filter-select text-sm bg-gray-50 dark:bg-gray-800/60 border border-gray-200
                       dark:border-gray-700 rounded-xl px-3 py-2 text-gray-600 dark:text-gray-300
                       focus:outline-none focus:ring-2 focus:ring-violet-500 transition cursor-pointer w-full lg:w-auto">
                <option value="">All Request Types</option>
                <option value="letters">Request Letters</option>
                <option value="adviser">Adviser Request</option>
                <option value="defense">Defense Application</option>
                <option value="comprehensive">Comprehensive Exam</option>
                <option value="committee">Panel/Committee</option>
                <option value="printing">Final Printing</option>
                <option value="revised">Revised Proposal</option>
                <option value="qualifying">Qualifying Exam</option>
                <option value="readmission">Re-Admission</option>
            </select>

            {{-- Status filter --}}
            <select id="filterStatus"
                class="filter-select text-sm bg-gray-50 dark:bg-gray-800/60 border border-gray-200
                       dark:border-gray-700 rounded-xl px-3 py-2 text-gray-600 dark:text-gray-300
                       focus:outline-none focus:ring-2 focus:ring-violet-500 transition cursor-pointer w-full lg:w-auto">
                <option value="">All Statuses</option>
                <option value="pending">Pending</option>
                <option value="review">Under Review</option>
                <option value="action">Needs Attention</option>
                <option value="approved">Approved</option>
            </select>

        </div>
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm" id="requestsTable">
            <thead>
                <tr class="bg-gray-50 dark:bg-gray-800/40 text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                    <th class="px-6 py-3 whitespace-nowrap">Student</th>
                    <th class="px-4 py-3 whitespace-nowrap">Request Type</th>
                    <th class="px-4 py-3 whitespace-nowrap">Reference No.</th>
                    <th class="px-4 py-3 whitespace-nowrap">Date Filed</th>
                    <th class="px-4 py-3 whitespace-nowrap">Progress</th>
                    <th class="px-4 py-3 whitespace-nowrap">Status</th>
                    <th class="px-4 py-3 whitespace-nowrap">Assigned To</th>
                    <th class="px-4 py-3 text-right whitespace-nowrap">Action</th>
                </tr>
            </thead>
            <tbody id="requestsBody" class="divide-y divide-gray-50 dark:divide-gray-800">

                {{-- Row 1 --}}
                <tr class="req-row"
                    data-name="maria cruz"
                    data-type="adviser"
                    data-date="month"
                    data-status="review">
                    <td class="px-6 py-3.5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-xl bg-violet-100 dark:bg-violet-900/30 text-violet-700
                                        dark:text-violet-300 flex items-center justify-center font-bold text-xs flex-shrink-0">MC</div>
                            <div>
                                <p class="font-semibold text-gray-800 dark:text-gray-200 text-sm">Maria Cruz</p>
                                <p class="text-[11px] text-gray-400">2021-00482 · BSCS</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="text-xs text-gray-700 dark:text-gray-300 font-medium">Adviser Request</span>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="text-[11px] font-mono text-gray-400">BUOU-25-0482</span>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="text-xs text-gray-500 dark:text-gray-400">May 2, 2025</span>
                    </td>
                    <td class="px-4 py-3.5">
                        <div class="flex items-center gap-2">
                            <div class="w-20 h-1.5 bg-gray-100 dark:bg-gray-800 rounded-full overflow-hidden">
                                <div class="mini-prog-fill" style="width:75%"></div>
                            </div>
                            <span class="text-[11px] text-gray-400 whitespace-nowrap">3 / 4</span>
                        </div>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="badge-review text-[10px] font-bold px-2.5 py-1 rounded-full whitespace-nowrap">Under Review</span>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="text-xs text-gray-500 dark:text-gray-400">J. Reyes</span>
                    </td>
                    <td class="px-4 py-3.5 text-right">
                        <a href="{{ route('staff.requests.checklist', ['id' => 1]) }}"
                            class="view-btn inline-flex items-center gap-1.5 text-[11px] font-bold
                                   text-violet-600 dark:text-violet-400 bg-violet-50 dark:bg-violet-900/20
                                   border border-violet-200 dark:border-violet-800/50
                                   hover:bg-violet-600 hover:text-white hover:border-violet-600
                                   dark:hover:bg-violet-600 dark:hover:text-white
                                   px-3 py-1.5 rounded-xl transition whitespace-nowrap">
                            <i data-lucide="eye" class="w-3 h-3"></i>
                            View Checklist
                        </a>
                    </td>
                </tr>

                {{-- Row 2 --}}
                <tr class="req-row"
                    data-name="juan dela cruz"
                    data-type="defense"
                    data-date="week"
                    data-status="action">
                    <td class="px-6 py-3.5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-xl bg-red-100 dark:bg-red-900/30 text-red-700
                                        dark:text-red-300 flex items-center justify-center font-bold text-xs flex-shrink-0">JD</div>
                            <div>
                                <p class="font-semibold text-gray-800 dark:text-gray-200 text-sm">Juan Dela Cruz</p>
                                <p class="text-[11px] text-gray-400">2020-01133 · MAED</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="text-xs text-gray-700 dark:text-gray-300 font-medium">Defense Application</span>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="text-[11px] font-mono text-gray-400">BUOU-25-0475</span>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="text-xs text-gray-500 dark:text-gray-400">May 1, 2025</span>
                    </td>
                    <td class="px-4 py-3.5">
                        <div class="flex items-center gap-2">
                            <div class="w-20 h-1.5 bg-gray-100 dark:bg-gray-800 rounded-full overflow-hidden">
                                <div class="mini-prog-fill" style="width:25%; background: linear-gradient(90deg,#ef4444,#f87171);"></div>
                            </div>
                            <span class="text-[11px] text-gray-400 whitespace-nowrap">2 / 8</span>
                        </div>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="badge-action text-[10px] font-bold px-2.5 py-1 rounded-full whitespace-nowrap">Needs Attention</span>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="text-xs text-gray-500 dark:text-gray-400">S. Morales</span>
                    </td>
                    <td class="px-4 py-3.5 text-right">
                        <a href="{{ route('staff.requests.checklist', ['id' => 2]) }}"
                            class="view-btn inline-flex items-center gap-1.5 text-[11px] font-bold
                                   text-violet-600 dark:text-violet-400 bg-violet-50 dark:bg-violet-900/20
                                   border border-violet-200 dark:border-violet-800/50
                                   hover:bg-violet-600 hover:text-white hover:border-violet-600
                                   dark:hover:bg-violet-600 dark:hover:text-white
                                   px-3 py-1.5 rounded-xl transition whitespace-nowrap">
                            <i data-lucide="eye" class="w-3 h-3"></i>
                            View Checklist
                        </a>
                    </td>
                </tr>

                {{-- Row 3 --}}
                <tr class="req-row"
                    data-name="ana lim"
                    data-type="comprehensive"
                    data-date="month"
                    data-status="approved">
                    <td class="px-6 py-3.5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-xl bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700
                                        dark:text-emerald-300 flex items-center justify-center font-bold text-xs flex-shrink-0">AL</div>
                            <div>
                                <p class="font-semibold text-gray-800 dark:text-gray-200 text-sm">Ana Lim</p>
                                <p class="text-[11px] text-gray-400">2022-00718 · PhD-Ed</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="text-xs text-gray-700 dark:text-gray-300 font-medium">Comprehensive Exam</span>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="text-[11px] font-mono text-gray-400">BUOU-25-0470</span>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="text-xs text-gray-500 dark:text-gray-400">Apr 30, 2025</span>
                    </td>
                    <td class="px-4 py-3.5">
                        <div class="flex items-center gap-2">
                            <div class="w-20 h-1.5 bg-gray-100 dark:bg-gray-800 rounded-full overflow-hidden">
                                <div class="mini-prog-fill" style="width:100%; background: linear-gradient(90deg,#10b981,#34d399);"></div>
                            </div>
                            <span class="text-[11px] text-gray-400 whitespace-nowrap">4 / 4</span>
                        </div>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="badge-approved text-[10px] font-bold px-2.5 py-1 rounded-full whitespace-nowrap">Approved</span>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="text-xs text-gray-500 dark:text-gray-400">J. Reyes</span>
                    </td>
                    <td class="px-4 py-3.5 text-right">
                        <a href="{{ route('staff.requests.checklist', ['id' => 3]) }}"
                            class="view-btn inline-flex items-center gap-1.5 text-[11px] font-bold
                                   text-violet-600 dark:text-violet-400 bg-violet-50 dark:bg-violet-900/20
                                   border border-violet-200 dark:border-violet-800/50
                                   hover:bg-violet-600 hover:text-white hover:border-violet-600
                                   dark:hover:bg-violet-600 dark:hover:text-white
                                   px-3 py-1.5 rounded-xl transition whitespace-nowrap">
                            <i data-lucide="eye" class="w-3 h-3"></i>
                            View Checklist
                        </a>
                    </td>
                </tr>

                {{-- Row 4 --}}
                <tr class="req-row"
                    data-name="rina santos"
                    data-type="letters"
                    data-date="month"
                    data-status="pending">
                    <td class="px-6 py-3.5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-xl bg-amber-100 dark:bg-amber-900/30 text-amber-700
                                        dark:text-amber-300 flex items-center justify-center font-bold text-xs flex-shrink-0">RS</div>
                            <div>
                                <p class="font-semibold text-gray-800 dark:text-gray-200 text-sm">Rina Santos</p>
                                <p class="text-[11px] text-gray-400">2023-00291 · MBA</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="text-xs text-gray-700 dark:text-gray-300 font-medium">Request Letters</span>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="text-[11px] font-mono text-gray-400">BUOU-25-0468</span>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="text-xs text-gray-500 dark:text-gray-400">Apr 29, 2025</span>
                    </td>
                    <td class="px-4 py-3.5">
                        <div class="flex items-center gap-2">
                            <div class="w-20 h-1.5 bg-gray-100 dark:bg-gray-800 rounded-full overflow-hidden">
                                <div class="mini-prog-fill" style="width:33%; background: linear-gradient(90deg,#f59e0b,#fbbf24);"></div>
                            </div>
                            <span class="text-[11px] text-gray-400 whitespace-nowrap">1 / 3</span>
                        </div>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="badge-pending text-[10px] font-bold px-2.5 py-1 rounded-full whitespace-nowrap">Pending</span>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="text-xs text-gray-400 italic">Unassigned</span>
                    </td>
                    <td class="px-4 py-3.5 text-right">
                        <a href="{{ route('staff.requests.checklist', ['id' => 4]) }}"
                            class="view-btn inline-flex items-center gap-1.5 text-[11px] font-bold
                                   text-violet-600 dark:text-violet-400 bg-violet-50 dark:bg-violet-900/20
                                   border border-violet-200 dark:border-violet-800/50
                                   hover:bg-violet-600 hover:text-white hover:border-violet-600
                                   dark:hover:bg-violet-600 dark:hover:text-white
                                   px-3 py-1.5 rounded-xl transition whitespace-nowrap">
                            <i data-lucide="eye" class="w-3 h-3"></i>
                            View Checklist
                        </a>
                    </td>
                </tr>

                {{-- Row 5 --}}
                <tr class="req-row"
                    data-name="paolo garcia"
                    data-type="committee"
                    data-date="month"
                    data-status="review">
                    <td class="px-6 py-3.5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-xl bg-sky-100 dark:bg-sky-900/30 text-sky-700
                                        dark:text-sky-300 flex items-center justify-center font-bold text-xs flex-shrink-0">PG</div>
                            <div>
                                <p class="font-semibold text-gray-800 dark:text-gray-200 text-sm">Paolo Garcia</p>
                                <p class="text-[11px] text-gray-400">2021-00560 · MS-Math</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="text-xs text-gray-700 dark:text-gray-300 font-medium">Panel / Committee</span>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="text-[11px] font-mono text-gray-400">BUOU-25-0461</span>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="text-xs text-gray-500 dark:text-gray-400">Apr 28, 2025</span>
                    </td>
                    <td class="px-4 py-3.5">
                        <div class="flex items-center gap-2">
                            <div class="w-20 h-1.5 bg-gray-100 dark:bg-gray-800 rounded-full overflow-hidden">
                                <div class="mini-prog-fill" style="width:66%;"></div>
                            </div>
                            <span class="text-[11px] text-gray-400 whitespace-nowrap">2 / 3</span>
                        </div>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="badge-review text-[10px] font-bold px-2.5 py-1 rounded-full whitespace-nowrap">Under Review</span>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="text-xs text-gray-500 dark:text-gray-400">T. Bautista</span>
                    </td>
                    <td class="px-4 py-3.5 text-right">
                        <a href="{{ route('staff.requests.checklist', ['id' => 5]) }}"
                            class="view-btn inline-flex items-center gap-1.5 text-[11px] font-bold
                                   text-violet-600 dark:text-violet-400 bg-violet-50 dark:bg-violet-900/20
                                   border border-violet-200 dark:border-violet-800/50
                                   hover:bg-violet-600 hover:text-white hover:border-violet-600
                                   dark:hover:bg-violet-600 dark:hover:text-white
                                   px-3 py-1.5 rounded-xl transition whitespace-nowrap">
                            <i data-lucide="eye" class="w-3 h-3"></i>
                            View Checklist
                        </a>
                    </td>
                </tr>

                {{-- Row 6 --}}
                <tr class="req-row"
                    data-name="karla torres"
                    data-type="qualifying"
                    data-date="month"
                    data-status="action">
                    <td class="px-6 py-3.5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-xl bg-pink-100 dark:bg-pink-900/30 text-pink-700
                                        dark:text-pink-300 flex items-center justify-center font-bold text-xs flex-shrink-0">KT</div>
                            <div>
                                <p class="font-semibold text-gray-800 dark:text-gray-200 text-sm">Karla Torres</p>
                                <p class="text-[11px] text-gray-400">2022-00833 · PhD-Nursing</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="text-xs text-gray-700 dark:text-gray-300 font-medium">Qualifying Exam</span>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="text-[11px] font-mono text-gray-400">BUOU-25-0458</span>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="text-xs text-gray-500 dark:text-gray-400">Apr 28, 2025</span>
                    </td>
                    <td class="px-4 py-3.5">
                        <div class="flex items-center gap-2">
                            <div class="w-20 h-1.5 bg-gray-100 dark:bg-gray-800 rounded-full overflow-hidden">
                                <div class="mini-prog-fill" style="width:50%; background: linear-gradient(90deg,#ef4444,#f87171);"></div>
                            </div>
                            <span class="text-[11px] text-gray-400 whitespace-nowrap">2 / 4</span>
                        </div>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="badge-action text-[10px] font-bold px-2.5 py-1 rounded-full whitespace-nowrap">Needs Attention</span>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="text-xs text-gray-500 dark:text-gray-400">S. Morales</span>
                    </td>
                    <td class="px-4 py-3.5 text-right">
                        <a href="{{ route('staff.requests.checklist', ['id' => 6]) }}"
                            class="view-btn inline-flex items-center gap-1.5 text-[11px] font-bold
                                   text-violet-600 dark:text-violet-400 bg-violet-50 dark:bg-violet-900/20
                                   border border-violet-200 dark:border-violet-800/50
                                   hover:bg-violet-600 hover:text-white hover:border-violet-600
                                   dark:hover:bg-violet-600 dark:hover:text-white
                                   px-3 py-1.5 rounded-xl transition whitespace-nowrap">
                            <i data-lucide="eye" class="w-3 h-3"></i>
                            View Checklist
                        </a>
                    </td>
                </tr>

                {{-- Row 7 --}}
                <tr class="req-row"
                    data-name="ben mendoza"
                    data-type="readmission"
                    data-date="today"
                    data-status="pending">
                    <td class="px-6 py-3.5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-xl bg-teal-100 dark:bg-teal-900/30 text-teal-700
                                        dark:text-teal-300 flex items-center justify-center font-bold text-xs flex-shrink-0">BM</div>
                            <div>
                                <p class="font-semibold text-gray-800 dark:text-gray-200 text-sm">Ben Mendoza</p>
                                <p class="text-[11px] text-gray-400">2020-00944 · MSIT</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="text-xs text-gray-700 dark:text-gray-300 font-medium">Re-Admission</span>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="text-[11px] font-mono text-gray-400">BUOU-25-0450</span>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="text-xs text-gray-500 dark:text-gray-400">May 5, 2025</span>
                    </td>
                    <td class="px-4 py-3.5">
                        <div class="flex items-center gap-2">
                            <div class="w-20 h-1.5 bg-gray-100 dark:bg-gray-800 rounded-full overflow-hidden">
                                <div class="mini-prog-fill" style="width:0%; background: linear-gradient(90deg,#f59e0b,#fbbf24);"></div>
                            </div>
                            <span class="text-[11px] text-gray-400 whitespace-nowrap">0 / 1</span>
                        </div>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="badge-pending text-[10px] font-bold px-2.5 py-1 rounded-full whitespace-nowrap">Pending</span>
                    </td>
                    <td class="px-4 py-3.5">
                        <span class="text-xs text-gray-400 italic">Unassigned</span>
                    </td>
                    <td class="px-4 py-3.5 text-right">
                        <a href="{{ route('staff.requests.checklist', ['id' => 7]) }}"
                            class="view-btn inline-flex items-center gap-1.5 text-[11px] font-bold
                                   text-violet-600 dark:text-violet-400 bg-violet-50 dark:bg-violet-900/20
                                   border border-violet-200 dark:border-violet-800/50
                                   hover:bg-violet-600 hover:text-white hover:border-violet-600
                                   dark:hover:bg-violet-600 dark:hover:text-white
                                   px-3 py-1.5 rounded-xl transition whitespace-nowrap">
                            <i data-lucide="eye" class="w-3 h-3"></i>
                            View Checklist
                        </a>
                    </td>
                </tr>

                {{-- Empty state row --}}
                <tr id="emptyRow">
                    <td colspan="8" class="px-6 py-14 text-center">
                        <div class="flex flex-col items-center gap-2">
                            <i data-lucide="search-x" class="w-8 h-8 text-gray-300 dark:text-gray-600"></i>
                            <p class="text-sm font-semibold text-gray-400">No matching requests found</p>
                            <p class="text-xs text-gray-400">Try adjusting your search or filters</p>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

    {{-- Table footer --}}
    <div class="px-6 py-3.5 border-t border-gray-100 dark:border-gray-800
                flex items-center justify-between bg-gray-50 dark:bg-gray-800/20">
        <p class="text-xs text-gray-400">
            Showing <span id="footerCount">7</span> of 24 total active requests
        </p>
        <div class="flex items-center gap-1">
            <button class="text-xs font-semibold text-gray-400 hover:text-violet-600 dark:hover:text-violet-400
                           px-2.5 py-1.5 rounded-lg hover:bg-violet-50 dark:hover:bg-violet-900/20 transition">
                Previous
            </button>
            <button class="text-xs font-bold text-white bg-violet-600 px-2.5 py-1.5 rounded-lg">1</button>
            <button class="text-xs font-semibold text-gray-400 hover:text-violet-600 dark:hover:text-violet-400
                           px-2.5 py-1.5 rounded-lg hover:bg-violet-50 dark:hover:bg-violet-900/20 transition">2</button>
            <button class="text-xs font-semibold text-gray-400 hover:text-violet-600 dark:hover:text-violet-400
                           px-2.5 py-1.5 rounded-lg hover:bg-violet-50 dark:hover:bg-violet-900/20 transition">3</button>
            <button class="text-xs font-semibold text-gray-400 hover:text-violet-600 dark:hover:text-violet-400
                           px-2.5 py-1.5 rounded-lg hover:bg-violet-50 dark:hover:bg-violet-900/20 transition">
                Next
            </button>
        </div>
    </div>

</div>

@endsection

@push('scripts')
<script>
    /* ── Live filter logic ── */
    const searchInput   = document.getElementById('studentSearch');
    const filterDate    = document.getElementById('filterDate');
    const filterType    = document.getElementById('filterType');
    const filterStatus  = document.getElementById('filterStatus');
    const rows          = document.querySelectorAll('#requestsBody .req-row');
    const emptyRow      = document.getElementById('emptyRow');
    const visibleCount  = document.getElementById('visibleRowCount');
    const footerCount   = document.getElementById('footerCount');

    function applyFilters() {
        const q      = searchInput.value.toLowerCase().trim();
        const date   = filterDate.value;
        const type   = filterType.value;
        const status = filterStatus.value;
        let visible  = 0;

        rows.forEach(row => {
            const nameMatch   = !q      || row.dataset.name.includes(q);
            const dateMatch   = !date   || row.dataset.date === date;
            const typeMatch   = !type   || row.dataset.type === type;
            const statusMatch = !status || row.dataset.status === status;
            const show = nameMatch && dateMatch && typeMatch && statusMatch;
            row.style.display = show ? '' : 'none';
            if (show) visible++;
        });

        emptyRow.style.display = visible === 0 ? '' : 'none';
        visibleCount.textContent = visible;
        footerCount.textContent  = visible;
        lucide.createIcons();
    }

    searchInput.addEventListener('input', applyFilters);
    filterDate.addEventListener('change', applyFilters);
    filterType.addEventListener('change', applyFilters);
    filterStatus.addEventListener('change', applyFilters);
</script>
@endpush