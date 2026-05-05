@extends('Student.layout')

@section('title', 'File a Request')

@push('styles')
<style>
    .request-card {
        transition: all 0.2s ease;
        cursor: pointer;
    }
    .request-card:hover {
        transform: translateY(-2px);
    }
    .req-count-badge {
        transition: all 0.2s ease;
    }
    .request-card:hover .req-count-badge {
        transform: scale(1.05);
    }

    /* Modal slide-in */
    #requestDetailModal .modal-panel {
        transition: transform 0.25s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.2s ease;
    }
    #requestDetailModal.hidden .modal-panel {
        transform: translateY(12px);
        opacity: 0;
    }
</style>
@endpush

@section('content')

{{-- Page Header --}}
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
    <div>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">File a Request</h1>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-0.5">
            Select a request type below to get started. Each card shows the number of requirements needed.
        </p>
    </div>
    <a href="{{ route('student.dashboard') }}"
        class="inline-flex items-center gap-2 text-sm font-semibold text-gray-500 dark:text-gray-400
               hover:text-blue-600 dark:hover:text-blue-400 transition">
        <i data-lucide="arrow-left" class="w-4 h-4"></i>
        Back to Dashboard
    </a>
</div>

{{-- ── Search / Filter bar ── --}}
<div class="mb-5 flex flex-col sm:flex-row gap-3">
    <div class="relative flex-1">
        <i data-lucide="search" class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none"></i>
        <input id="requestSearch" type="text" placeholder="Search request types…"
            class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 dark:border-gray-700
                   bg-white dark:bg-[#111827] text-sm text-gray-700 dark:text-gray-300
                   placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
    </div>
    <div class="flex items-center gap-2 text-xs text-gray-400 dark:text-gray-500 bg-white dark:bg-[#111827]
                border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-2.5 whitespace-nowrap">
        <i data-lucide="layers" class="w-3.5 h-3.5"></i>
        <span id="visibleCount">9</span> request types
    </div>
</div>

{{-- ── Request Cards Grid ── --}}
<div id="requestGrid" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">

    {{-- 1. Request Letters --}}
    <div class="request-card bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800
                shadow-sm overflow-hidden group"
         data-title="Request Letters"
         data-category="letters"
         onclick="openRequestModal(this)">
        <div class="p-5">
            <div class="flex items-start justify-between mb-4">
                <div class="w-10 h-10 rounded-xl bg-blue-50 dark:bg-blue-900/20 text-blue-600
                            flex items-center justify-center flex-shrink-0
                            group-hover:bg-blue-600 group-hover:text-white transition-all duration-200">
                    <i data-lucide="mail" class="w-5 h-5"></i>
                </div>
                <span class="req-count-badge inline-flex items-center gap-1.5 text-[11px] font-bold
                             text-blue-700 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/30
                             border border-blue-100 dark:border-blue-800/50 px-2.5 py-1 rounded-full">
                    <i data-lucide="list-checks" class="w-3 h-3"></i>
                    3 requirements
                </span>
            </div>
            <h3 class="font-bold text-gray-800 dark:text-white text-sm leading-snug mb-1.5">
                Request Letters
            </h3>
            <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed">
                For students, faculty, stakeholders, alumni, and other parties requesting official correspondence.
            </p>
        </div>
        <div class="px-5 py-3 bg-gray-50 dark:bg-gray-800/40 border-t border-gray-100 dark:border-gray-800
                    flex items-center justify-between">
            <span class="text-[11px] text-gray-400">General</span>
            <span class="text-[11px] font-semibold text-blue-600 dark:text-blue-400 flex items-center gap-1
                         group-hover:gap-2 transition-all">
                View requirements <i data-lucide="arrow-right" class="w-3 h-3"></i>
            </span>
        </div>
    </div>

    {{-- 2. Adviser Request --}}
    <div class="request-card bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800
                shadow-sm overflow-hidden group"
         data-title="Request for Adviser"
         data-category="adviser"
         onclick="openRequestModal(this)">
        <div class="p-5">
            <div class="flex items-start justify-between mb-4">
                <div class="w-10 h-10 rounded-xl bg-violet-50 dark:bg-violet-900/20 text-violet-600
                            flex items-center justify-center flex-shrink-0
                            group-hover:bg-violet-600 group-hover:text-white transition-all duration-200">
                    <i data-lucide="user-check" class="w-5 h-5"></i>
                </div>
                <span class="req-count-badge inline-flex items-center gap-1.5 text-[11px] font-bold
                             text-violet-700 dark:text-violet-400 bg-violet-50 dark:bg-violet-900/30
                             border border-violet-100 dark:border-violet-800/50 px-2.5 py-1 rounded-full">
                    <i data-lucide="list-checks" class="w-3 h-3"></i>
                    4 requirements
                </span>
            </div>
            <h3 class="font-bold text-gray-800 dark:text-white text-sm leading-snug mb-1.5">
                Students' Request for Adviser & Adviser's Designation
            </h3>
            <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed">
                Processing of adviser designation and related documentation for thesis/dissertation supervision.
            </p>
        </div>
        <div class="px-5 py-3 bg-gray-50 dark:bg-gray-800/40 border-t border-gray-100 dark:border-gray-800
                    flex items-center justify-between">
            <span class="text-[11px] text-gray-400">Thesis / Dissertation</span>
            <span class="text-[11px] font-semibold text-violet-600 dark:text-violet-400 flex items-center gap-1
                         group-hover:gap-2 transition-all">
                View requirements <i data-lucide="arrow-right" class="w-3 h-3"></i>
            </span>
        </div>
    </div>

    {{-- 3. Proposal / Final Defense --}}
    <div class="request-card bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800
                shadow-sm overflow-hidden group"
         data-title="Defense Application"
         data-category="defense"
         onclick="openRequestModal(this)">
        <div class="p-5">
            <div class="flex items-start justify-between mb-4">
                <div class="w-10 h-10 rounded-xl bg-amber-50 dark:bg-amber-900/20 text-amber-600
                            flex items-center justify-center flex-shrink-0
                            group-hover:bg-amber-500 group-hover:text-white transition-all duration-200">
                    <i data-lucide="presentation" class="w-5 h-5"></i>
                </div>
                {{-- Dual badge --}}
                <div class="flex flex-col items-end gap-1">
                    <span class="req-count-badge inline-flex items-center gap-1.5 text-[11px] font-bold
                                 text-amber-700 dark:text-amber-400 bg-amber-50 dark:bg-amber-900/30
                                 border border-amber-100 dark:border-amber-800/50 px-2.5 py-1 rounded-full">
                        <i data-lucide="list-checks" class="w-3 h-3"></i>
                        8 — Master's
                    </span>
                    <span class="req-count-badge inline-flex items-center gap-1.5 text-[11px] font-bold
                                 text-orange-700 dark:text-orange-400 bg-orange-50 dark:bg-orange-900/30
                                 border border-orange-100 dark:border-orange-800/50 px-2.5 py-1 rounded-full">
                        <i data-lucide="list-checks" class="w-3 h-3"></i>
                        9 — Doctoral
                    </span>
                </div>
            </div>
            <h3 class="font-bold text-gray-800 dark:text-white text-sm leading-snug mb-1.5">
                Application for Proposal & Final Defense / Re-Defense
            </h3>
            <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed">
                Thesis/dissertation proposal and final defenses, including re-defense applications.
            </p>
        </div>
        <div class="px-5 py-3 bg-gray-50 dark:bg-gray-800/40 border-t border-gray-100 dark:border-gray-800
                    flex items-center justify-between">
            <span class="text-[11px] text-gray-400">Thesis / Dissertation</span>
            <span class="text-[11px] font-semibold text-amber-600 dark:text-amber-400 flex items-center gap-1
                         group-hover:gap-2 transition-all">
                View requirements <i data-lucide="arrow-right" class="w-3 h-3"></i>
            </span>
        </div>
    </div>

    {{-- 4. Comprehensive Exam --}}
    <div class="request-card bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800
                shadow-sm overflow-hidden group"
         data-title="Comprehensive Examination"
         data-category="comprehensive"
         onclick="openRequestModal(this)">
        <div class="p-5">
            <div class="flex items-start justify-between mb-4">
                <div class="w-10 h-10 rounded-xl bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600
                            flex items-center justify-center flex-shrink-0
                            group-hover:bg-emerald-600 group-hover:text-white transition-all duration-200">
                    <i data-lucide="pen-line" class="w-5 h-5"></i>
                </div>
                <span class="req-count-badge inline-flex items-center gap-1.5 text-[11px] font-bold
                             text-emerald-700 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-900/30
                             border border-emerald-100 dark:border-emerald-800/50 px-2.5 py-1 rounded-full">
                    <i data-lucide="list-checks" class="w-3 h-3"></i>
                    4 requirements
                </span>
            </div>
            <h3 class="font-bold text-gray-800 dark:text-white text-sm leading-snug mb-1.5">
                Application for Written & Oral Comprehensive Examination
            </h3>
            <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed">
                For both Master's and Doctoral students applying for written and oral comprehensive exams.
            </p>
        </div>
        <div class="px-5 py-3 bg-gray-50 dark:bg-gray-800/40 border-t border-gray-100 dark:border-gray-800
                    flex items-center justify-between">
            <span class="text-[11px] text-gray-400">Master's · Doctoral</span>
            <span class="text-[11px] font-semibold text-emerald-600 dark:text-emerald-400 flex items-center gap-1
                         group-hover:gap-2 transition-all">
                View requirements <i data-lucide="arrow-right" class="w-3 h-3"></i>
            </span>
        </div>
    </div>

    {{-- 5. Panel / Advisory Committee --}}
    <div class="request-card bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800
                shadow-sm overflow-hidden group"
         data-title="Panel / Advisory Committee"
         data-category="committee"
         onclick="openRequestModal(this)">
        <div class="p-5">
            <div class="flex items-start justify-between mb-4">
                <div class="w-10 h-10 rounded-xl bg-sky-50 dark:bg-sky-900/20 text-sky-600
                            flex items-center justify-center flex-shrink-0
                            group-hover:bg-sky-600 group-hover:text-white transition-all duration-200">
                    <i data-lucide="users" class="w-5 h-5"></i>
                </div>
                <span class="req-count-badge inline-flex items-center gap-1.5 text-[11px] font-bold
                             text-sky-700 dark:text-sky-400 bg-sky-50 dark:bg-sky-900/30
                             border border-sky-100 dark:border-sky-800/50 px-2.5 py-1 rounded-full">
                    <i data-lucide="list-checks" class="w-3 h-3"></i>
                    3 requirements
                </span>
            </div>
            <h3 class="font-bold text-gray-800 dark:text-white text-sm leading-snug mb-1.5">
                Nomination of Panel / Advisory Committee
            </h3>
            <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed">
                Nomination of panel or advisory committee members for Master's and Doctoral programs.
            </p>
        </div>
        <div class="px-5 py-3 bg-gray-50 dark:bg-gray-800/40 border-t border-gray-100 dark:border-gray-800
                    flex items-center justify-between">
            <span class="text-[11px] text-gray-400">Master's · Doctoral</span>
            <span class="text-[11px] font-semibold text-sky-600 dark:text-sky-400 flex items-center gap-1
                         group-hover:gap-2 transition-all">
                View requirements <i data-lucide="arrow-right" class="w-3 h-3"></i>
            </span>
        </div>
    </div>

    {{-- 6. Final Printing Approval --}}
    <div class="request-card bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800
                shadow-sm overflow-hidden group"
         data-title="Final Printing Approval"
         data-category="printing"
         onclick="openRequestModal(this)">
        <div class="p-5">
            <div class="flex items-start justify-between mb-4">
                <div class="w-10 h-10 rounded-xl bg-teal-50 dark:bg-teal-900/20 text-teal-600
                            flex items-center justify-center flex-shrink-0
                            group-hover:bg-teal-600 group-hover:text-white transition-all duration-200">
                    <i data-lucide="printer" class="w-5 h-5"></i>
                </div>
                <span class="req-count-badge inline-flex items-center gap-1.5 text-[11px] font-bold
                             text-teal-700 dark:text-teal-400 bg-teal-50 dark:bg-teal-900/30
                             border border-teal-100 dark:border-teal-800/50 px-2.5 py-1 rounded-full">
                    <i data-lucide="list-checks" class="w-3 h-3"></i>
                    6 requirements
                </span>
            </div>
            <h3 class="font-bold text-gray-800 dark:text-white text-sm leading-snug mb-1.5">
                Approval of Final Printing of Thesis/Dissertation Manuscript
            </h3>
            <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed">
                For the final approval of printing the completed thesis or dissertation manuscript.
            </p>
        </div>
        <div class="px-5 py-3 bg-gray-50 dark:bg-gray-800/40 border-t border-gray-100 dark:border-gray-800
                    flex items-center justify-between">
            <span class="text-[11px] text-gray-400">Thesis / Dissertation</span>
            <span class="text-[11px] font-semibold text-teal-600 dark:text-teal-400 flex items-center gap-1
                         group-hover:gap-2 transition-all">
                View requirements <i data-lucide="arrow-right" class="w-3 h-3"></i>
            </span>
        </div>
    </div>

    {{-- 7. Revised Proposal Approval --}}
    <div class="request-card bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800
                shadow-sm overflow-hidden group"
         data-title="Revised Proposal Approval"
         data-category="revised"
         onclick="openRequestModal(this)">
        <div class="p-5">
            <div class="flex items-start justify-between mb-4">
                <div class="w-10 h-10 rounded-xl bg-pink-50 dark:bg-pink-900/20 text-pink-600
                            flex items-center justify-center flex-shrink-0
                            group-hover:bg-pink-600 group-hover:text-white transition-all duration-200">
                    <i data-lucide="file-pen" class="w-5 h-5"></i>
                </div>
                <span class="req-count-badge inline-flex items-center gap-1.5 text-[11px] font-bold
                             text-pink-700 dark:text-pink-400 bg-pink-50 dark:bg-pink-900/30
                             border border-pink-100 dark:border-pink-800/50 px-2.5 py-1 rounded-full">
                    <i data-lucide="list-checks" class="w-3 h-3"></i>
                    4 requirements
                </span>
            </div>
            <h3 class="font-bold text-gray-800 dark:text-white text-sm leading-snug mb-1.5">
                Approval of Revised Thesis/Dissertation Proposal
            </h3>
            <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed">
                For students submitting a revised thesis or dissertation proposal for approval.
            </p>
        </div>
        <div class="px-5 py-3 bg-gray-50 dark:bg-gray-800/40 border-t border-gray-100 dark:border-gray-800
                    flex items-center justify-between">
            <span class="text-[11px] text-gray-400">Thesis / Dissertation</span>
            <span class="text-[11px] font-semibold text-pink-600 dark:text-pink-400 flex items-center gap-1
                         group-hover:gap-2 transition-all">
                View requirements <i data-lucide="arrow-right" class="w-3 h-3"></i>
            </span>
        </div>
    </div>

    {{-- 8. Qualifying Exam (Doctoral only) --}}
    <div class="request-card bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800
                shadow-sm overflow-hidden group"
         data-title="Qualifying Examination"
         data-category="qualifying"
         onclick="openRequestModal(this)">
        <div class="p-5">
            <div class="flex items-start justify-between mb-4">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 rounded-xl bg-indigo-50 dark:bg-indigo-900/20 text-indigo-600
                                flex items-center justify-center flex-shrink-0
                                group-hover:bg-indigo-600 group-hover:text-white transition-all duration-200">
                        <i data-lucide="graduation-cap" class="w-5 h-5"></i>
                    </div>
                    <span class="text-[10px] font-bold text-indigo-600 dark:text-indigo-400
                                 bg-indigo-50 dark:bg-indigo-900/30 border border-indigo-100
                                 dark:border-indigo-800/50 px-2 py-0.5 rounded-full uppercase tracking-wide">
                        Doctoral only
                    </span>
                </div>
                <span class="req-count-badge inline-flex items-center gap-1.5 text-[11px] font-bold
                             text-indigo-700 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-900/30
                             border border-indigo-100 dark:border-indigo-800/50 px-2.5 py-1 rounded-full">
                    <i data-lucide="list-checks" class="w-3 h-3"></i>
                    4 requirements
                </span>
            </div>
            <h3 class="font-bold text-gray-800 dark:text-white text-sm leading-snug mb-1.5">
                Application for Qualifying Examination
            </h3>
            <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed">
                For doctoral students only. Application for the qualifying examination prior to candidacy.
            </p>
        </div>
        <div class="px-5 py-3 bg-gray-50 dark:bg-gray-800/40 border-t border-gray-100 dark:border-gray-800
                    flex items-center justify-between">
            <span class="text-[11px] text-indigo-500 dark:text-indigo-400 font-semibold">Doctoral students only</span>
            <span class="text-[11px] font-semibold text-indigo-600 dark:text-indigo-400 flex items-center gap-1
                         group-hover:gap-2 transition-all">
                View requirements <i data-lucide="arrow-right" class="w-3 h-3"></i>
            </span>
        </div>
    </div>

    {{-- 9. Re-Admission / Residency --}}
    <div class="request-card bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800
                shadow-sm overflow-hidden group"
         data-title="Re-Admission / Residency"
         data-category="readmission"
         onclick="openRequestModal(this)">
        <div class="p-5">
            <div class="flex items-start justify-between mb-4">
                <div class="w-10 h-10 rounded-xl bg-rose-50 dark:bg-rose-900/20 text-rose-600
                            flex items-center justify-center flex-shrink-0
                            group-hover:bg-rose-600 group-hover:text-white transition-all duration-200">
                    <i data-lucide="refresh-cw" class="w-5 h-5"></i>
                </div>
                <span class="req-count-badge inline-flex items-center gap-1.5 text-[11px] font-bold
                             text-rose-700 dark:text-rose-400 bg-rose-50 dark:bg-rose-900/30
                             border border-rose-100 dark:border-rose-800/50 px-2.5 py-1 rounded-full">
                    <i data-lucide="list-checks" class="w-3 h-3"></i>
                    1 requirement
                </span>
            </div>
            <h3 class="font-bold text-gray-800 dark:text-white text-sm leading-snug mb-1.5">
                Request for Re-Admission, Return, & Residency Evaluation
            </h3>
            <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed">
                For students requesting re-admission, return to program, or residency status evaluation.
            </p>
        </div>
        <div class="px-5 py-3 bg-gray-50 dark:bg-gray-800/40 border-t border-gray-100 dark:border-gray-800
                    flex items-center justify-between">
            <span class="text-[11px] text-gray-400">General</span>
            <span class="text-[11px] font-semibold text-rose-600 dark:text-rose-400 flex items-center gap-1
                         group-hover:gap-2 transition-all">
                View requirements <i data-lucide="arrow-right" class="w-3 h-3"></i>
            </span>
        </div>
    </div>

</div>

{{-- Empty state (shown when search yields no results) --}}
<div id="emptyState" class="hidden text-center py-16">
    <div class="w-14 h-14 rounded-2xl bg-gray-100 dark:bg-gray-800 flex items-center justify-center mx-auto mb-4">
        <i data-lucide="search-x" class="w-7 h-7 text-gray-400"></i>
    </div>
    <p class="text-sm font-semibold text-gray-500 dark:text-gray-400">No request types found</p>
    <p class="text-xs text-gray-400 mt-1">Try a different search term</p>
</div>

{{-- ── REQUEST DETAIL MODAL ── --}}
<div id="requestDetailModal"
    class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="modal-panel bg-white dark:bg-[#111827] rounded-2xl shadow-xl w-full max-w-lg
                border border-gray-200 dark:border-gray-800">

        {{-- Modal header --}}
        <div class="px-6 py-5 border-b border-gray-100 dark:border-gray-800 flex items-start justify-between gap-4">
            <div class="flex items-center gap-3">
                <div id="modalIconWrap"
                    class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0">
                    <i id="modalIcon" data-lucide="file-text" class="w-5 h-5"></i>
                </div>
                <div>
                    <h3 id="modalTitle" class="font-bold text-gray-800 dark:text-white text-base leading-snug"></h3>
                    <p id="modalMeta" class="text-xs text-gray-400 mt-0.5"></p>
                </div>
            </div>
            <button onclick="closeRequestModal()"
                class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 transition flex-shrink-0 mt-0.5">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        {{-- Requirements list --}}
        <div class="px-6 py-5">
            <p class="text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-3">Requirements Checklist</p>
            <ul id="modalRequirements" class="space-y-2.5"></ul>
        </div>

        {{-- Notes section --}}
        <div id="modalNotesWrap" class="hidden px-6 pb-3">
            <div class="bg-amber-50 dark:bg-amber-900/20 border border-amber-100 dark:border-amber-800/40
                        rounded-xl px-4 py-3 flex items-start gap-2.5">
                <i data-lucide="info" class="w-4 h-4 text-amber-600 dark:text-amber-400 flex-shrink-0 mt-0.5"></i>
                <p id="modalNotes" class="text-xs text-amber-700 dark:text-amber-300 leading-relaxed"></p>
            </div>
        </div>

        {{-- Modal footer --}}
        <div class="px-6 py-4 border-t border-gray-100 dark:border-gray-800 flex justify-end gap-3">
            <button onclick="closeRequestModal()"
                class="text-sm font-semibold text-gray-500 hover:text-gray-700 dark:hover:text-gray-300
                       px-4 py-2 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                Close
            </button>
            <a href="{{ route('student.requests.checklist') }}"
                class="text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700
                        px-5 py-2 rounded-xl transition shadow-sm flex items-center gap-2">
                    <i data-lucide="send" class="w-3.5 h-3.5"></i>
                    Start This Request
            </a>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    /* ── Request data ── */
    const requestData = {
        letters: {
            icon: 'mail',
            iconBg: 'bg-blue-50 dark:bg-blue-900/20',
            iconText: 'text-blue-600',
            meta: 'General · 3 requirements',
            requirements: [
                'Duly accomplished request letter form',
                'Valid student/faculty/alumni ID (photocopy)',
                'Other supporting documents as required by the receiving office',
            ],
            notes: null,
        },
        adviser: {
            icon: 'user-check',
            iconBg: 'bg-violet-50 dark:bg-violet-900/20',
            iconText: 'text-violet-600',
            meta: 'Thesis / Dissertation · 4 requirements',
            requirements: [
                'Accomplished adviser request form (signed by student)',
                'Proposed adviser\'s written consent / acceptance letter',
                'Copy of student\'s program of study',
                'Endorsement from the Graduate Program Coordinator',
            ],
            notes: null,
        },
        defense: {
            icon: 'presentation',
            iconBg: 'bg-amber-50 dark:bg-amber-900/20',
            iconText: 'text-amber-600',
            meta: 'Thesis / Dissertation · 8 (Master\'s) or 9 (Doctoral)',
            requirements: [
                'Accomplished application form for defense',
                'Endorsement letter from adviser',
                'Proof of payment for defense fee',
                'Three (3) bound copies of the thesis/dissertation manuscript',
                'Approval sheet signed by all panel members',
                'Certificate of compliance with grammar/format review',
                'Turnitin or plagiarism report (within acceptable threshold)',
                'Panel confirmation and availability sheet',
                '[Doctoral only] External reviewer\'s written evaluation / feedback',
            ],
            notes: 'The 9th requirement (external reviewer evaluation) applies to Doctoral students only. Master\'s students submit 8 requirements.',
        },
        comprehensive: {
            icon: 'pen-line',
            iconBg: 'bg-emerald-50 dark:bg-emerald-900/20',
            iconText: 'text-emerald-600',
            meta: 'Master\'s · Doctoral · 4 requirements',
            requirements: [
                'Accomplished comprehensive exam application form',
                'Endorsement from the Graduate Program Coordinator',
                'Updated program of study / transcript of records',
                'Proof of completion of all required coursework',
            ],
            notes: null,
        },
        committee: {
            icon: 'users',
            iconBg: 'bg-sky-50 dark:bg-sky-900/20',
            iconText: 'text-sky-600',
            meta: 'Master\'s · Doctoral · 3 requirements',
            requirements: [
                'Accomplished panel/advisory committee nomination form',
                'Signed acceptance letters from all nominated panel members',
                'Curriculum vitae (CV) of each nominated panel member',
            ],
            notes: null,
        },
        printing: {
            icon: 'printer',
            iconBg: 'bg-teal-50 dark:bg-teal-900/20',
            iconText: 'text-teal-600',
            meta: 'Thesis / Dissertation · 6 requirements',
            requirements: [
                'Accomplished final printing approval form',
                'Final manuscript with all revisions incorporated',
                'Signed approval sheet by adviser and all panel members',
                'Turnitin/plagiarism clearance certificate',
                'Proof of payment for library and binding fees',
                'Certification of compliance from the Graduate School',
            ],
            notes: null,
        },
        revised: {
            icon: 'file-pen',
            iconBg: 'bg-pink-50 dark:bg-pink-900/20',
            iconText: 'text-pink-600',
            meta: 'Thesis / Dissertation · 4 requirements',
            requirements: [
                'Accomplished revised proposal approval form',
                'Revised proposal manuscript with tracked changes or revision summary',
                'Adviser\'s endorsement letter indicating revisions made',
                'Signed recommendation from the original defense panel',
            ],
            notes: null,
        },
        qualifying: {
            icon: 'graduation-cap',
            iconBg: 'bg-indigo-50 dark:bg-indigo-900/20',
            iconText: 'text-indigo-600',
            meta: 'Doctoral students only · 4 requirements',
            requirements: [
                'Accomplished qualifying examination application form',
                'Updated program of study showing completion of required units',
                'Endorsement from the Graduate Program Coordinator',
                'Certification that no incomplete (INC) grades remain',
            ],
            notes: 'This application is exclusively for doctoral students. Master\'s students are not eligible for this request type.',
        },
        readmission: {
            icon: 'refresh-cw',
            iconBg: 'bg-rose-50 dark:bg-rose-900/20',
            iconText: 'text-rose-600',
            meta: 'General · 1 requirement',
            requirements: [
                'Accomplished re-admission / return / residency evaluation request form',
            ],
            notes: 'Additional documents may be required at the discretion of the Graduate School office upon initial review.',
        },
    };

    /* ── Open modal ── */
    function openRequestModal(card) {
        const category = card.dataset.category;
        const data = requestData[category];
        if (!data) return;

        // Icon
        const iconWrap = document.getElementById('modalIconWrap');
        const icon = document.getElementById('modalIcon');
        iconWrap.className = `w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0 ${data.iconBg}`;
        icon.className = `w-5 h-5 ${data.iconText}`;
        icon.setAttribute('data-lucide', data.icon);

        // Title & meta
        document.getElementById('modalTitle').textContent = card.dataset.title;
        document.getElementById('modalMeta').textContent = data.meta;

        // Requirements
        const ul = document.getElementById('modalRequirements');
        ul.innerHTML = data.requirements.map((req, i) => `
            <li class="flex items-start gap-3">
                <span class="flex-shrink-0 w-5 h-5 rounded-full bg-gray-100 dark:bg-gray-800
                             text-gray-500 dark:text-gray-400 text-[10px] font-bold
                             flex items-center justify-center mt-0.5">${i + 1}</span>
                <span class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed">${req}</span>
            </li>
        `).join('');

        // Notes
        const notesWrap = document.getElementById('modalNotesWrap');
        if (data.notes) {
            document.getElementById('modalNotes').textContent = data.notes;
            notesWrap.classList.remove('hidden');
        } else {
            notesWrap.classList.add('hidden');
        }

        lucide.createIcons();

        const modal = document.getElementById('requestDetailModal');
        modal.classList.remove('hidden');
        // small delay to trigger transition
        requestAnimationFrame(() => {
            modal.querySelector('.modal-panel').style.transform = 'translateY(0)';
            modal.querySelector('.modal-panel').style.opacity = '1';
        });
    }

    function closeRequestModal() {
        document.getElementById('requestDetailModal').classList.add('hidden');
    }

    // Close on backdrop click
    document.getElementById('requestDetailModal').addEventListener('click', function(e) {
        if (e.target === this) closeRequestModal();
    });

    /* ── Search / filter ── */
    document.getElementById('requestSearch').addEventListener('input', function() {
        const q = this.value.toLowerCase().trim();
        const cards = document.querySelectorAll('#requestGrid .request-card');
        let visible = 0;

        cards.forEach(card => {
            const title = card.dataset.title.toLowerCase();
            const body = card.innerText.toLowerCase();
            const match = !q || title.includes(q) || body.includes(q);
            card.style.display = match ? '' : 'none';
            if (match) visible++;
        });

        document.getElementById('visibleCount').textContent = visible;
        document.getElementById('emptyState').classList.toggle('hidden', visible > 0);
    });
</script>
@endpush