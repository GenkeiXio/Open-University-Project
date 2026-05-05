@extends('Student.layout')

@section('title', 'Request Checklist')

@push('styles')
<style>
    /* ── Checklist item transitions ── */
    .req-item { transition: background 0.15s ease, border-color 0.15s ease; }
    .req-item.is-checked { background-color: rgba(34,197,94,0.04); }
    .req-item.is-checked .req-label { text-decoration: line-through; color: var(--checked-label); }

    .dark .req-item.is-checked { background-color: rgba(34,197,94,0.06); }

    /* Custom checkbox */
    .req-checkbox { display: none; }
    .req-check-ui {
        width: 20px; height: 20px; border-radius: 6px; flex-shrink: 0;
        border: 2px solid #D1D5DB; background: white;
        display: flex; align-items: center; justify-content: center;
        cursor: pointer; transition: all 0.2s ease;
    }
    .dark .req-check-ui { background: #1F2937; border-color: #374151; }
    .req-checkbox:checked ~ .req-check-ui {
        background: #22C55E; border-color: #22C55E;
    }
    .req-check-ui svg { opacity: 0; transform: scale(0.5); transition: all 0.15s ease; }
    .req-checkbox:checked ~ .req-check-ui svg { opacity: 1; transform: scale(1); }

    /* Progress bar */
    .progress-fill {
        transition: width 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        background: linear-gradient(90deg, #3B82F6, #6366F1);
    }

    /* Modal */
    #reqModal { transition: opacity 0.2s ease; }
    #reqModal.hidden { opacity: 0; pointer-events: none; }
    #reqModal .modal-box {
        transition: transform 0.25s cubic-bezier(0.16,1,0.3,1), opacity 0.2s ease;
    }
    #reqModal.hidden .modal-box { transform: translateY(16px); opacity: 0; }

    /* Dropzone */
    .dropzone {
        border: 2px dashed #D1D5DB; border-radius: 12px;
        transition: all 0.2s ease; cursor: pointer;
    }
    .dropzone:hover, .dropzone.drag-over {
        border-color: #3B82F6; background: rgba(59,130,246,0.04);
    }
    .dark .dropzone { border-color: #374151; }
    .dark .dropzone:hover { border-color: #3B82F6; background: rgba(59,130,246,0.08); }

    /* Sidebar sticky */
    .sidebar-sticky { position: sticky; top: 88px; }

    /* Note card pulse */
    @keyframes noteIn {
        from { opacity: 0; transform: translateY(6px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .note-card { animation: noteIn 0.3s ease both; }

    /* Attachment preview tag */
    .attach-tag {
        display: inline-flex; align-items: center; gap: 6px;
        font-size: 11px; font-weight: 600; padding: 3px 10px;
        border-radius: 20px; background: #D1FAE5; color: #065F46;
        border: 1px solid #A7F3D0;
    }
    .dark .attach-tag { background: rgba(34,197,94,0.15); color: #6EE7B7; border-color: rgba(34,197,94,0.3); }
</style>
@endpush

@section('content')

{{-- ── Page Header ── --}}
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
    <div>
        <div class="flex items-center gap-2 text-xs text-gray-400 dark:text-gray-500 mb-1.5">
            <a href="{{ route('student.requests.list') }}" class="hover:text-blue-500 transition">File a Request</a>
            <i data-lucide="chevron-right" class="w-3 h-3"></i>
            <span class="text-gray-600 dark:text-gray-300 font-medium">Checklist</span>
        </div>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Requirements Checklist</h1>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-0.5">
            Check off each item as you prepare it. Staff will be notified as you progress.
        </p>
    </div>
    <a href="{{ route('student.requests.list') }}"
        class="inline-flex items-center gap-2 text-sm font-semibold text-gray-500 dark:text-gray-400
               hover:text-blue-600 dark:hover:text-blue-400 transition">
        <i data-lucide="arrow-left" class="w-4 h-4"></i>
        Back to Request Types
    </a>
</div>

{{-- ── Request Info Banner ── --}}
<div class="bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 shadow-sm p-5 mb-6">
    <div class="flex flex-col sm:flex-row sm:items-start gap-5">

        {{-- Icon + title --}}
        <div class="flex items-center gap-4 flex-1">
            <div class="w-12 h-12 rounded-2xl bg-violet-50 dark:bg-violet-900/20 text-violet-600
                        flex items-center justify-center flex-shrink-0">
                <i data-lucide="user-check" class="w-6 h-6"></i>
            </div>
            <div>
                <div class="flex items-center gap-2 flex-wrap">
                    <h2 class="font-bold text-gray-900 dark:text-white text-base leading-snug">
                        Students' Request for Adviser & Adviser's Designation
                    </h2>
                    <span class="inline-flex items-center text-[10px] font-bold px-2 py-0.5 rounded-full
                                 bg-amber-50 dark:bg-amber-900/30 text-amber-700 dark:text-amber-400
                                 border border-amber-100 dark:border-amber-800/50 uppercase tracking-wide">
                        Complex
                    </span>
                </div>
                <div class="flex flex-wrap items-center gap-x-4 gap-y-1 mt-1.5">
                    <span class="text-xs text-gray-500 dark:text-gray-400 flex items-center gap-1.5">
                        <i data-lucide="clock" class="w-3.5 h-3.5"></i>
                        Processing: <strong class="text-gray-700 dark:text-gray-300">7 Days</strong>
                    </span>
                    <span class="text-xs text-gray-500 dark:text-gray-400 flex items-center gap-1.5">
                        <i data-lucide="users" class="w-3.5 h-3.5"></i>
                        Currently enrolled Graduate Students
                    </span>
                    <span class="text-xs text-gray-500 dark:text-gray-400 flex items-center gap-1.5">
                        <i data-lucide="calendar" class="w-3.5 h-3.5"></i>
                        Filed: <strong class="text-gray-700 dark:text-gray-300">May 4, 2025</strong>
                    </span>
                </div>
            </div>
        </div>

        {{-- Progress ring + pct ── desktop only --}}
        <div class="hidden sm:flex flex-col items-center justify-center gap-1 flex-shrink-0">
            <div class="relative w-16 h-16">
                <svg class="w-full h-full -rotate-90" viewBox="0 0 64 64">
                    <circle cx="32" cy="32" r="26" fill="none" stroke="#E5E7EB" stroke-width="6"
                            class="dark:stroke-gray-700"/>
                    <circle id="ringFill" cx="32" cy="32" r="26" fill="none"
                            stroke="url(#ringGrad)" stroke-width="6" stroke-linecap="round"
                            stroke-dasharray="163.36" stroke-dashoffset="163.36"
                            style="transition: stroke-dashoffset 0.6s cubic-bezier(0.4,0,0.2,1)"/>
                    <defs>
                        <linearGradient id="ringGrad" x1="0%" y1="0%" x2="100%" y2="0%">
                            <stop offset="0%" stop-color="#3B82F6"/>
                            <stop offset="100%" stop-color="#6366F1"/>
                        </linearGradient>
                    </defs>
                </svg>
                <div class="absolute inset-0 flex items-center justify-center">
                    <span id="pctLabel" class="text-sm font-bold text-gray-800 dark:text-white">0%</span>
                </div>
            </div>
            <span class="text-[10px] font-semibold text-gray-400 uppercase tracking-wide">Progress</span>
        </div>
    </div>

    {{-- Progress bar ── full width ── --}}
    <div class="mt-5">
        <div class="flex items-center justify-between mb-1.5">
            <span class="text-xs font-semibold text-gray-500 dark:text-gray-400">Overall Progress</span>
            <span id="progressText" class="text-xs font-bold text-blue-600 dark:text-blue-400">0 of 4 completed</span>
        </div>
        <div class="h-2.5 rounded-full bg-gray-100 dark:bg-gray-800 overflow-hidden">
            <div id="progressBar" class="progress-fill h-full rounded-full" style="width: 0%"></div>
        </div>
    </div>

    {{-- Staff monitoring notice --}}
    <div class="mt-4 flex items-start gap-2.5 bg-blue-50 dark:bg-blue-900/20 border border-blue-100
                dark:border-blue-800/40 rounded-xl px-4 py-3">
        <i data-lucide="eye" class="w-4 h-4 text-blue-500 dark:text-blue-400 flex-shrink-0 mt-0.5"></i>
        <p class="text-xs text-blue-700 dark:text-blue-300 leading-relaxed">
            <strong>Your checklist is being monitored by BUGS staff.</strong>
            They may leave comments or flag items that need attention. You can also send a message
            if you have questions about any requirement.
        </p>
    </div>
</div>

{{-- ── Main 2-column layout ── --}}
<div class="grid grid-cols-1 xl:grid-cols-[1fr_300px] gap-6 items-start">

    {{-- ═══════════════════════════════════
         LEFT — Checklist
    ═══════════════════════════════════ --}}
    <div class="space-y-3">

        {{-- Section label --}}
        <div class="flex items-center justify-between">
            <p class="text-[11px] font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest">
                Requirements — 4 items
            </p>
            <button onclick="checkAll()"
                class="text-[11px] font-semibold text-blue-600 dark:text-blue-400
                       hover:underline transition">
                Mark all complete
            </button>
        </div>

        {{-- ── Requirement Item Template ──
             data-req-id: unique key
             data-form: 'true'/'false' whether there's a downloadable form
        --}}

        {{-- Item 1 --}}
        <div class="req-item bg-white dark:bg-[#111827] rounded-2xl border border-gray-200
                    dark:border-gray-800 shadow-sm overflow-hidden"
             data-req-id="r1">
            <div class="p-4 flex items-start gap-4">
                {{-- Checkbox --}}
                <label class="mt-0.5 cursor-pointer flex-shrink-0">
                    <input type="checkbox" class="req-checkbox" onchange="onCheck(this)">
                    <span class="req-check-ui">
                        <svg width="11" height="9" viewBox="0 0 11 9" fill="none">
                            <path d="M1 4L4 7.5L10 1" stroke="white" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </label>

                {{-- Content --}}
                <div class="flex-1 min-w-0">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex-1">
                            <p class="req-label text-sm font-semibold text-gray-800 dark:text-gray-200 leading-snug">
                                Fully Accomplished Request for Thesis/Dissertation Adviser Form
                                <span class="font-normal text-gray-500">(BU-F-GS-8)</span>
                            </p>
                            <div class="flex flex-wrap items-center gap-x-3 gap-y-1 mt-1.5">
                                <span class="text-[11px] text-violet-600 dark:text-violet-400 font-semibold
                                             bg-violet-50 dark:bg-violet-900/20 border border-violet-100
                                             dark:border-violet-800/50 px-2 py-0.5 rounded-full">
                                    📋 2 copies
                                </span>
                                <span class="text-[11px] text-gray-400 dark:text-gray-500 flex items-center gap-1">
                                    <i data-lucide="map-pin" class="w-3 h-3"></i>
                                    BU Graduate School Staff / BUGS Open Access Drive
                                </span>
                            </div>
                            {{-- Attachment preview (hidden until file attached) --}}
                            <div id="attach-preview-r1" class="hidden mt-2">
                                <span class="attach-tag">
                                    <i data-lucide="paperclip" class="w-3 h-3"></i>
                                    <span class="attach-name"></span>
                                    <button onclick="removeAttachment('r1')" class="ml-1 opacity-60 hover:opacity-100">
                                        <i data-lucide="x" class="w-3 h-3"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <button onclick="openReqModal('r1')"
                            class="flex-shrink-0 inline-flex items-center gap-1.5 text-[11px] font-semibold
                                   text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/20
                                   border border-blue-100 dark:border-blue-800/50
                                   hover:bg-blue-600 hover:text-white hover:border-blue-600
                                   dark:hover:bg-blue-600 dark:hover:text-white
                                   px-3 py-1.5 rounded-xl transition">
                            <i data-lucide="eye" class="w-3 h-3"></i>
                            View More
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Item 2 --}}
        <div class="req-item bg-white dark:bg-[#111827] rounded-2xl border border-gray-200
                    dark:border-gray-800 shadow-sm overflow-hidden"
             data-req-id="r2">
            <div class="p-4 flex items-start gap-4">
                <label class="mt-0.5 cursor-pointer flex-shrink-0">
                    <input type="checkbox" class="req-checkbox" onchange="onCheck(this)">
                    <span class="req-check-ui">
                        <svg width="11" height="9" viewBox="0 0 11 9" fill="none">
                            <path d="M1 4L4 7.5L10 1" stroke="white" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </label>
                <div class="flex-1 min-w-0">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex-1">
                            <p class="req-label text-sm font-semibold text-gray-800 dark:text-gray-200 leading-snug">
                                Accomplished Concept Note
                                <span class="font-normal text-gray-500">— approved by the Program Adviser</span>
                            </p>
                            <div class="flex flex-wrap items-center gap-x-3 gap-y-1 mt-1.5">
                                <span class="text-[11px] text-violet-600 dark:text-violet-400 font-semibold
                                             bg-violet-50 dark:bg-violet-900/20 border border-violet-100
                                             dark:border-violet-800/50 px-2 py-0.5 rounded-full">
                                    📋 1 copy
                                </span>
                                <span class="text-[11px] text-gray-400 dark:text-gray-500 flex items-center gap-1">
                                    <i data-lucide="map-pin" class="w-3 h-3"></i>
                                    BU Graduate School Staff / BUGS Open Access Drive
                                </span>
                            </div>
                            <div id="attach-preview-r2" class="hidden mt-2">
                                <span class="attach-tag">
                                    <i data-lucide="paperclip" class="w-3 h-3"></i>
                                    <span class="attach-name"></span>
                                    <button onclick="removeAttachment('r2')" class="ml-1 opacity-60 hover:opacity-100">
                                        <i data-lucide="x" class="w-3 h-3"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <button onclick="openReqModal('r2')"
                            class="flex-shrink-0 inline-flex items-center gap-1.5 text-[11px] font-semibold
                                   text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/20
                                   border border-blue-100 dark:border-blue-800/50
                                   hover:bg-blue-600 hover:text-white hover:border-blue-600
                                   dark:hover:bg-blue-600 dark:hover:text-white
                                   px-3 py-1.5 rounded-xl transition">
                            <i data-lucide="eye" class="w-3 h-3"></i>
                            View More
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Item 3 --}}
        <div class="req-item bg-white dark:bg-[#111827] rounded-2xl border border-gray-200
                    dark:border-gray-800 shadow-sm overflow-hidden"
             data-req-id="r3">
            <div class="p-4 flex items-start gap-4">
                <label class="mt-0.5 cursor-pointer flex-shrink-0">
                    <input type="checkbox" class="req-checkbox" onchange="onCheck(this)">
                    <span class="req-check-ui">
                        <svg width="11" height="9" viewBox="0 0 11 9" fill="none">
                            <path d="M1 4L4 7.5L10 1" stroke="white" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </label>
                <div class="flex-1 min-w-0">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex-1">
                            <p class="req-label text-sm font-semibold text-gray-800 dark:text-gray-200 leading-snug">
                                Certificate of Registration <span class="font-normal text-gray-500">(COR)</span>
                            </p>
                            <div class="flex flex-wrap items-center gap-x-3 gap-y-1 mt-1.5">
                                <span class="text-[11px] text-violet-600 dark:text-violet-400 font-semibold
                                             bg-violet-50 dark:bg-violet-900/20 border border-violet-100
                                             dark:border-violet-800/50 px-2 py-0.5 rounded-full">
                                    📋 1 photocopy
                                </span>
                                <span class="text-[11px] text-gray-400 dark:text-gray-500 flex items-center gap-1">
                                    <i data-lucide="map-pin" class="w-3 h-3"></i>
                                    Student Portal or BUGS Registrar
                                </span>
                            </div>
                            <div id="attach-preview-r3" class="hidden mt-2">
                                <span class="attach-tag">
                                    <i data-lucide="paperclip" class="w-3 h-3"></i>
                                    <span class="attach-name"></span>
                                    <button onclick="removeAttachment('r3')" class="ml-1 opacity-60 hover:opacity-100">
                                        <i data-lucide="x" class="w-3 h-3"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <button onclick="openReqModal('r3')"
                            class="flex-shrink-0 inline-flex items-center gap-1.5 text-[11px] font-semibold
                                   text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/20
                                   border border-blue-100 dark:border-blue-800/50
                                   hover:bg-blue-600 hover:text-white hover:border-blue-600
                                   dark:hover:bg-blue-600 dark:hover:text-white
                                   px-3 py-1.5 rounded-xl transition">
                            <i data-lucide="eye" class="w-3 h-3"></i>
                            View More
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Item 4 --}}
        <div class="req-item bg-white dark:bg-[#111827] rounded-2xl border border-gray-200
                    dark:border-gray-800 shadow-sm overflow-hidden"
             data-req-id="r4">
            <div class="p-4 flex items-start gap-4">
                <label class="mt-0.5 cursor-pointer flex-shrink-0">
                    <input type="checkbox" class="req-checkbox" onchange="onCheck(this)">
                    <span class="req-check-ui">
                        <svg width="11" height="9" viewBox="0 0 11 9" fill="none">
                            <path d="M1 4L4 7.5L10 1" stroke="white" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </label>
                <div class="flex-1 min-w-0">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex-1">
                            <p class="req-label text-sm font-semibold text-gray-800 dark:text-gray-200 leading-snug">
                                Notice of Admission
                                <span class="font-normal text-gray-500">(NOA) — for newly admitted students only</span>
                            </p>
                            <div class="flex flex-wrap items-center gap-x-3 gap-y-1 mt-1.5">
                                <span class="text-[11px] text-violet-600 dark:text-violet-400 font-semibold
                                             bg-violet-50 dark:bg-violet-900/20 border border-violet-100
                                             dark:border-violet-800/50 px-2 py-0.5 rounded-full">
                                    📋 1 copy
                                </span>
                                <span class="text-[11px] text-gray-400 dark:text-gray-500 flex items-center gap-1">
                                    <i data-lucide="map-pin" class="w-3 h-3"></i>
                                    BUGS Registrar
                                </span>
                            </div>
                            <div id="attach-preview-r4" class="hidden mt-2">
                                <span class="attach-tag">
                                    <i data-lucide="paperclip" class="w-3 h-3"></i>
                                    <span class="attach-name"></span>
                                    <button onclick="removeAttachment('r4')" class="ml-1 opacity-60 hover:opacity-100">
                                        <i data-lucide="x" class="w-3 h-3"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <button onclick="openReqModal('r4')"
                            class="flex-shrink-0 inline-flex items-center gap-1.5 text-[11px] font-semibold
                                   text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/20
                                   border border-blue-100 dark:border-blue-800/50
                                   hover:bg-blue-600 hover:text-white hover:border-blue-600
                                   dark:hover:bg-blue-600 dark:hover:text-white
                                   px-3 py-1.5 rounded-xl transition">
                            <i data-lucide="eye" class="w-3 h-3"></i>
                            View More
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Submit button ── unlocks at 100% --}}
        <div class="pt-2">
            <button id="submitBtn" disabled
                class="w-full py-3 rounded-2xl text-sm font-bold transition-all duration-200
                       bg-gray-100 dark:bg-gray-800 text-gray-400 dark:text-gray-500
                       cursor-not-allowed flex items-center justify-center gap-2">
                <i data-lucide="send" class="w-4 h-4"></i>
                <span id="submitText">Complete all requirements to submit</span>
            </button>
        </div>
    </div>

    {{-- ═══════════════════════════════════
         RIGHT — Sidebar
    ═══════════════════════════════════ --}}
    <div class="sidebar-sticky space-y-4">

        {{-- Staff Notes & Comments --}}
        <div class="bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 shadow-sm overflow-hidden">
            <div class="px-5 py-4 border-b border-gray-100 dark:border-gray-800 flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <div class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></div>
                    <h3 class="text-sm font-bold text-gray-800 dark:text-white">Staff Notes</h3>
                </div>
                <span class="text-[10px] font-bold text-amber-600 dark:text-amber-400
                             bg-amber-50 dark:bg-amber-900/30 border border-amber-100
                             dark:border-amber-800/50 px-2 py-0.5 rounded-full">1 new</span>
            </div>

            {{-- Note from staff --}}
            <div class="px-5 py-4 space-y-3">
                <div class="note-card bg-amber-50 dark:bg-amber-900/20 border border-amber-100
                             dark:border-amber-800/40 rounded-xl p-3">
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded-full bg-amber-400 flex items-center justify-center
                                        text-white text-[10px] font-bold">S</div>
                            <span class="text-xs font-bold text-gray-700 dark:text-gray-200">Staff Reviewer</span>
                        </div>
                        <span class="text-[10px] text-gray-400">May 4, 2025</span>
                    </div>
                    <p class="text-xs text-amber-800 dark:text-amber-300 leading-relaxed">
                        Please make sure the Concept Note form (Item 2) is signed and
                        stamped by your Program Adviser before submission. Unsigned forms will be returned.
                    </p>
                </div>

                {{-- Reply / Ask a question --}}
                <div>
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">
                        Send a message to staff
                    </p>
                    <textarea id="studentMessage" rows="3" placeholder="Type your question or reply here…"
                        class="w-full text-xs text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-800/60
                               border border-gray-200 dark:border-gray-700 rounded-xl px-3 py-2.5
                               placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500
                               resize-none transition"></textarea>
                    <button onclick="sendMessage()"
                        class="mt-2 w-full text-xs font-bold py-2 rounded-xl
                               bg-blue-600 hover:bg-blue-700 text-white transition
                               flex items-center justify-center gap-1.5">
                        <i data-lucide="send" class="w-3.5 h-3.5"></i>
                        Send Message
                    </button>
                </div>
            </div>
        </div>

        {{-- Full Requirements Document --}}
        <div class="bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 shadow-sm p-5">
            <div class="flex items-center gap-2.5 mb-3">
                <div class="w-8 h-8 rounded-xl bg-blue-50 dark:bg-blue-900/20 text-blue-600
                            flex items-center justify-center">
                    <i data-lucide="book-open" class="w-4 h-4"></i>
                </div>
                <h3 class="text-sm font-bold text-gray-800 dark:text-white">Official Requirements</h3>
            </div>
            <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed mb-4">
                View the full official document with detailed procedures, fees,
                processing steps, and policy references from the BUGS Citizen's Charter.
            </p>
            <a href="#" target="_blank"
                class="flex items-center justify-center gap-2 w-full py-2.5 rounded-xl text-xs font-bold
                       text-blue-600 dark:text-blue-400 border border-blue-200 dark:border-blue-800/60
                       bg-blue-50 dark:bg-blue-900/20 hover:bg-blue-600 hover:text-white
                       dark:hover:bg-blue-600 dark:hover:text-white hover:border-blue-600 transition">
                <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                Open Citizen's Charter PDF
            </a>
        </div>

        {{-- Contact & Help --}}
        <div class="bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 shadow-sm p-5">
            <div class="flex items-center gap-2.5 mb-3">
                <div class="w-8 h-8 rounded-xl bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600
                            flex items-center justify-center">
                    <i data-lucide="life-buoy" class="w-4 h-4"></i>
                </div>
                <h3 class="text-sm font-bold text-gray-800 dark:text-white">Need Help?</h3>
            </div>
            <div class="space-y-2.5 text-xs text-gray-500 dark:text-gray-400">
                <div class="flex items-center gap-2.5">
                    <i data-lucide="mail" class="w-3.5 h-3.5 text-gray-400 flex-shrink-0"></i>
                    <a href="mailto:bugs-dean@bicol-u.edu.ph"
                       class="hover:text-blue-500 transition truncate">bugs-dean@bicol-u.edu.ph</a>
                </div>
                <div class="flex items-center gap-2.5">
                    <i data-lucide="phone" class="w-3.5 h-3.5 text-gray-400 flex-shrink-0"></i>
                    <span>(052) 742-3758</span>
                </div>
                <div class="flex items-center gap-2.5">
                    <i data-lucide="map-pin" class="w-3.5 h-3.5 text-gray-400 flex-shrink-0"></i>
                    <span>Aquilino P. Bonto Bldg., Legazpi City 4500</span>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-gray-100 dark:border-gray-800">
                <p class="text-[11px] text-gray-400 mb-2 font-semibold">Office Hours</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">Mon – Fri, 8:00 AM – 5:00 PM</p>
                <p class="text-xs text-gray-400 dark:text-gray-500">(Closed on holidays)</p>
            </div>
        </div>

    </div>{{-- end sidebar --}}
</div>{{-- end 2-col grid --}}


{{-- ═══════════════════════════════════════════════════════════
     REQUIREMENT DETAIL MODAL
═══════════════════════════════════════════════════════════ --}}
<div id="reqModal"
     class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50
            flex items-center justify-center p-4"
     onclick="handleBackdrop(event)">
    <div class="modal-box bg-white dark:bg-[#111827] rounded-2xl shadow-2xl w-full max-w-md
                border border-gray-200 dark:border-gray-800 flex flex-col max-h-[90vh]">

        {{-- Modal Header --}}
        <div class="px-6 py-5 border-b border-gray-100 dark:border-gray-800 flex items-start justify-between gap-4 flex-shrink-0">
            <div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-0.5">Requirement Details</p>
                <h3 id="modalReqName" class="font-bold text-gray-800 dark:text-white text-base leading-snug"></h3>
                <p id="modalReqCopies" class="text-xs text-violet-600 dark:text-violet-400 font-semibold mt-1"></p>
            </div>
            <button onclick="closeModal()"
                class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 transition flex-shrink-0">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        {{-- Modal Body --}}
        <div class="px-6 py-5 overflow-y-auto space-y-5 flex-1">

            {{-- Where to get --}}
            <div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Where to Secure</p>
                <div class="flex items-start gap-2.5 bg-gray-50 dark:bg-gray-800/60
                            border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3">
                    <i data-lucide="map-pin" class="w-4 h-4 text-gray-400 flex-shrink-0 mt-0.5"></i>
                    <p id="modalWhere" class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed"></p>
                </div>
            </div>

            {{-- Form Document (only shown if req has a form) --}}
            <div id="modalFormSection" class="hidden">
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Official Form</p>
                <div class="border border-gray-200 dark:border-gray-700 rounded-xl overflow-hidden">
                    {{-- Form preview placeholder --}}
                    <div class="bg-gray-50 dark:bg-gray-800/40 h-36 flex flex-col items-center justify-center gap-2 border-b border-gray-200 dark:border-gray-700">
                        <i data-lucide="file-text" class="w-8 h-8 text-gray-300 dark:text-gray-600"></i>
                        <p id="modalFormName" class="text-xs font-semibold text-gray-400"></p>
                        <p class="text-[11px] text-gray-400">Form preview will appear here</p>
                    </div>
                    <div class="flex">
                        <button onclick="viewForm()"
                            class="flex-1 flex items-center justify-center gap-1.5 text-xs font-bold
                                   text-blue-600 dark:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/20
                                   py-2.5 transition border-r border-gray-200 dark:border-gray-700">
                            <i data-lucide="eye" class="w-3.5 h-3.5"></i>
                            View Form
                        </button>
                        <button onclick="printForm()"
                            class="flex-1 flex items-center justify-center gap-1.5 text-xs font-bold
                                   text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800/60
                                   py-2.5 transition">
                            <i data-lucide="printer" class="w-3.5 h-3.5"></i>
                            Print Form
                        </button>
                    </div>
                </div>
            </div>

            {{-- Dropzone --}}
            <div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">
                    Attach Accomplished Document
                </p>
                <div class="dropzone p-5 text-center" id="modalDropzone"
                     ondragover="event.preventDefault(); this.classList.add('drag-over')"
                     ondragleave="this.classList.remove('drag-over')"
                     ondrop="handleDrop(event)"
                     onclick="document.getElementById('modalFileInput').click()">
                    <i data-lucide="upload-cloud" class="w-8 h-8 text-gray-300 dark:text-gray-600 mx-auto mb-2"></i>
                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400">
                        Click or drag &amp; drop your completed form here
                    </p>
                    <p class="text-[11px] text-gray-400 mt-1">PDF, JPG, PNG — max 10MB</p>
                    <input type="file" id="modalFileInput" class="hidden" accept=".pdf,.jpg,.jpeg,.png"
                           onchange="handleFileSelect(event)">
                </div>
                {{-- Attached file preview --}}
                <div id="attachedFilePreview" class="hidden mt-3 flex items-center justify-between
                          bg-green-50 dark:bg-green-900/20 border border-green-100 dark:border-green-800/40
                          rounded-xl px-4 py-2.5">
                    <div class="flex items-center gap-2">
                        <i data-lucide="file-check" class="w-4 h-4 text-green-600 dark:text-green-400"></i>
                        <span id="attachedFileName" class="text-xs font-semibold text-green-700 dark:text-green-400 truncate max-w-[180px]"></span>
                    </div>
                    <button onclick="clearAttachment()" class="text-gray-400 hover:text-red-500 transition">
                        <i data-lucide="x" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>

        </div>

        {{-- Modal Footer --}}
        <div class="px-6 py-4 border-t border-gray-100 dark:border-gray-800 flex justify-end gap-3 flex-shrink-0">
            <button onclick="closeModal()"
                class="text-sm font-semibold text-gray-500 hover:text-gray-700 dark:hover:text-gray-300
                       px-4 py-2 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                Close
            </button>
            <button onclick="saveAttachment()"
                class="text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700
                       px-5 py-2 rounded-xl transition shadow-sm flex items-center gap-2">
                <i data-lucide="save" class="w-3.5 h-3.5"></i>
                Save & Close
            </button>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
/* ── Requirement data (static demo) ── */
const requirements = {
    r1: {
        name: 'Fully Accomplished Request for Thesis/Dissertation Adviser Form (BU-F-GS-8)',
        copies: '2 copies — signed by the prospective adviser, endorsed by Program Adviser/Department Chair',
        where: 'BU Graduate School Staff or BUGS Open Access Drive (BU Graduate School Facebook Page)',
        hasForm: true,
        formName: 'BU-F-GS-8 — Request for Thesis/Dissertation Adviser Form',
    },
    r2: {
        name: 'Accomplished Concept Note',
        copies: '1 copy — approved by the Program Adviser',
        where: 'BU Graduate School Staff or BUGS Open Access Drive (BU Graduate School Facebook Page)',
        hasForm: true,
        formName: 'Concept Note Form',
    },
    r3: {
        name: 'Certificate of Registration (COR)',
        copies: '1 photocopy',
        where: 'Student Portal or BUGS Registrar\'s Office',
        hasForm: false,
        formName: null,
    },
    r4: {
        name: 'Notice of Admission (NOA)',
        copies: '1 copy — for newly admitted students only',
        where: 'BUGS Registrar\'s Office',
        hasForm: false,
        formName: null,
    },
};

/* ── State ── */
let currentReqId  = null;
let pendingFile   = null;
const attachments = {}; // reqId → { file, name }
const TOTAL = 4;

/* ── Progress ── */
function updateProgress() {
    const checked = document.querySelectorAll('.req-checkbox:checked').length;
    const pct     = Math.round((checked / TOTAL) * 100);
    const offset  = 163.36 * (1 - checked / TOTAL);

    document.getElementById('progressBar').style.width = pct + '%';
    document.getElementById('progressText').textContent = `${checked} of ${TOTAL} completed`;
    document.getElementById('pctLabel').textContent = pct + '%';
    document.getElementById('ringFill').style.strokeDashoffset = offset;

    const btn  = document.getElementById('submitBtn');
    const text = document.getElementById('submitText');
    if (pct === 100) {
        btn.disabled = false;
        btn.classList.remove('bg-gray-100', 'dark:bg-gray-800', 'text-gray-400', 'dark:text-gray-500', 'cursor-not-allowed');
        btn.classList.add('bg-blue-600', 'hover:bg-blue-700', 'text-white', 'cursor-pointer');
        text.textContent = 'Submit Request';
    } else {
        btn.disabled = true;
        btn.classList.add('bg-gray-100', 'dark:bg-gray-800', 'text-gray-400', 'dark:text-gray-500', 'cursor-not-allowed');
        btn.classList.remove('bg-blue-600', 'hover:bg-blue-700', 'text-white', 'cursor-pointer');
        text.textContent = 'Complete all requirements to submit';
    }
}

function onCheck(cb) {
    const item = cb.closest('.req-item');
    if (cb.checked) {
        item.classList.add('is-checked');
    } else {
        item.classList.remove('is-checked');
    }
    updateProgress();
    lucide.createIcons();
}

function checkAll() {
    document.querySelectorAll('.req-checkbox').forEach(cb => {
        if (!cb.checked) { cb.checked = true; cb.closest('.req-item').classList.add('is-checked'); }
    });
    updateProgress();
}

/* ── Modal ── */
function openReqModal(reqId) {
    currentReqId = reqId;
    pendingFile  = null;
    const data   = requirements[reqId];

    document.getElementById('modalReqName').textContent   = data.name;
    document.getElementById('modalReqCopies').textContent = data.copies;
    document.getElementById('modalWhere').textContent     = data.where;

    // Form section
    const formSection = document.getElementById('modalFormSection');
    if (data.hasForm) {
        document.getElementById('modalFormName').textContent = data.formName;
        formSection.classList.remove('hidden');
    } else {
        formSection.classList.add('hidden');
    }

    // Restore any saved attachment
    const saved = attachments[reqId];
    const preview = document.getElementById('attachedFilePreview');
    if (saved) {
        document.getElementById('attachedFileName').textContent = saved.name;
        preview.classList.remove('hidden');
    } else {
        preview.classList.add('hidden');
    }

    // Reset dropzone drag-over state
    document.getElementById('modalDropzone').classList.remove('drag-over');

    const modal = document.getElementById('reqModal');
    modal.classList.remove('hidden');
    requestAnimationFrame(() => {
        modal.querySelector('.modal-box').style.transform = 'translateY(0)';
        modal.querySelector('.modal-box').style.opacity   = '1';
    });
    lucide.createIcons();
}

function closeModal() {
    document.getElementById('reqModal').classList.add('hidden');
    currentReqId = null;
    pendingFile  = null;
}

function handleBackdrop(e) {
    if (e.target === document.getElementById('reqModal')) closeModal();
}

/* ── File handling ── */
function handleFileSelect(e) {
    const file = e.target.files[0];
    if (file) showPendingFile(file);
}

function handleDrop(e) {
    e.preventDefault();
    document.getElementById('modalDropzone').classList.remove('drag-over');
    const file = e.dataTransfer.files[0];
    if (file) showPendingFile(file);
}

function showPendingFile(file) {
    pendingFile = file;
    document.getElementById('attachedFileName').textContent = file.name;
    document.getElementById('attachedFilePreview').classList.remove('hidden');
}

function clearAttachment() {
    pendingFile = null;
    document.getElementById('attachedFilePreview').classList.add('hidden');
    document.getElementById('modalFileInput').value = '';
}

function saveAttachment() {
    if (pendingFile && currentReqId) {
        attachments[currentReqId] = { name: pendingFile.name, file: pendingFile };
        // Show tag on the checklist item
        const preview = document.getElementById(`attach-preview-${currentReqId}`);
        if (preview) {
            preview.querySelector('.attach-name').textContent = pendingFile.name;
            preview.classList.remove('hidden');
        }
    }
    closeModal();
    lucide.createIcons();
}

function removeAttachment(reqId) {
    delete attachments[reqId];
    const preview = document.getElementById(`attach-preview-${reqId}`);
    if (preview) preview.classList.add('hidden');
}

/* ── Form actions (placeholder alerts) ── */
function viewForm()  { alert('Opening form preview…\n\nIn production, this would render the PDF in an embedded viewer.'); }
function printForm() { window.print(); }

/* ── Send message ── */
function sendMessage() {
    const msg = document.getElementById('studentMessage').value.trim();
    if (!msg) return;
    alert(`Message sent to staff:\n\n"${msg}"`);
    document.getElementById('studentMessage').value = '';
}

/* ── Init ── */
updateProgress();
</script>
@endpush