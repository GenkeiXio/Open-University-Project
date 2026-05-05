@extends('Staff.layout')

@section('title', 'Student Checklist — Staff View')

@push('styles')
<style>
    /* ── Sidebar sticky ── */
    .sidebar-sticky { position: sticky; top: 88px; }

    /* ── Read-only requirement items ── */
    .req-item-staff { transition: background 0.12s ease; }

    /* ── Checked state (view-only) ── */
    .check-done {
        width: 20px; height: 20px; border-radius: 6px; flex-shrink: 0;
        background: #22c55e; border: 2px solid #22c55e;
        display: flex; align-items: center; justify-content: center;
    }
    .check-pending {
        width: 20px; height: 20px; border-radius: 6px; flex-shrink: 0;
        background: white; border: 2px solid #D1D5DB;
        display: flex; align-items: center; justify-content: center;
    }
    .dark .check-pending { background: #1F2937; border-color: #374151; }

    /* ── Progress bar ── */
    .progress-fill {
        transition: width 0.5s cubic-bezier(0.4,0,0.2,1);
        background: linear-gradient(90deg, #7c3aed, #a78bfa);
    }

    /* ── Note animation ── */
    @keyframes noteIn {
        from { opacity: 0; transform: translateY(6px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .note-card { animation: noteIn 0.3s ease both; }

    /* ── Attachment tag ── */
    .attach-tag {
        display: inline-flex; align-items: center; gap: 6px;
        font-size: 11px; font-weight: 600; padding: 3px 10px;
        border-radius: 20px; background: #D1FAE5; color: #065F46;
        border: 1px solid #A7F3D0;
    }
    .dark .attach-tag {
        background: rgba(34,197,94,0.15); color: #6EE7B7;
        border-color: rgba(34,197,94,0.3);
    }

    /* ── Note thread scroll ── */
    #noteThread { max-height: 340px; overflow-y: auto; }

    /* ── Read-only overlay hint ── */
    .readonly-bar {
        position: sticky;
        top: 0;
        z-index: 10;
    }
</style>
@endpush

@section('content')

{{-- ── Breadcrumb + Header ── --}}
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
    <div>
        <div class="flex items-center gap-2 text-xs text-gray-400 dark:text-gray-500 mb-1.5">
            <a href="{{ route('staff.requests.index') }}"
               class="hover:text-violet-500 transition">Active Requests</a>
            <i data-lucide="chevron-right" class="w-3 h-3"></i>
            <span class="text-gray-600 dark:text-gray-300 font-medium">Student Checklist</span>
        </div>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Student Checklist</h1>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-0.5">
            View-only. Leave notes or comments below each item to guide the student.
        </p>
    </div>
    <a href="{{ route('staff.requests.index') }}"
        class="inline-flex items-center gap-2 text-sm font-semibold text-gray-500 dark:text-gray-400
               hover:text-violet-600 dark:hover:text-violet-400 transition">
        <i data-lucide="arrow-left" class="w-4 h-4"></i>
        Back to Requests
    </a>
</div>

{{-- ── Read-only notice bar ── --}}
<div class="readonly-bar bg-amber-50 dark:bg-amber-900/20 border border-amber-100 dark:border-amber-800/40
            rounded-2xl px-5 py-3 mb-5 flex items-center gap-3">
    <div class="w-8 h-8 rounded-xl bg-amber-100 dark:bg-amber-900/40 text-amber-600
                flex items-center justify-center flex-shrink-0">
        <i data-lucide="shield-alert" class="w-4 h-4"></i>
    </div>
    <p class="text-xs text-amber-800 dark:text-amber-300 leading-relaxed">
        <strong>Staff View — Read Only.</strong>
        You can see the student's checklist progress and attached documents, but cannot modify or check off items.
        Use the Notes panel on the right to leave guidance for the student.
    </p>
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
                <div class="flex items-center gap-2 flex-wrap mb-1">
                    <h2 class="font-bold text-gray-900 dark:text-white text-base leading-snug">
                        Students' Request for Adviser & Adviser's Designation
                    </h2>
                    <span class="inline-flex items-center text-[10px] font-bold px-2 py-0.5 rounded-full
                                 bg-amber-50 dark:bg-amber-900/30 text-amber-700 dark:text-amber-400
                                 border border-amber-100 dark:border-amber-800/50 uppercase tracking-wide">
                        4 requirements
                    </span>
                </div>

                {{-- Student info strip --}}
                <div class="flex items-center gap-3 mt-2">
                    <div class="w-7 h-7 rounded-lg bg-violet-100 dark:bg-violet-900/30 text-violet-700
                                dark:text-violet-300 flex items-center justify-center font-bold text-xs flex-shrink-0">MC</div>
                    <div class="flex flex-wrap items-center gap-x-4 gap-y-1">
                        <span class="text-xs font-semibold text-gray-700 dark:text-gray-300">Maria Cruz</span>
                        <span class="text-xs text-gray-400">2021-00482 · BSCS</span>
                        <span class="text-xs text-gray-400 flex items-center gap-1">
                            <i data-lucide="hash" class="w-3 h-3"></i>BUOU-25-0482
                        </span>
                        <span class="text-xs text-gray-400 flex items-center gap-1">
                            <i data-lucide="calendar" class="w-3 h-3"></i>Filed May 2, 2025
                        </span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Progress ring ── desktop only --}}
        <div class="hidden sm:flex flex-col items-center justify-center gap-1 flex-shrink-0">
            <div class="relative w-16 h-16">
                <svg class="w-full h-full -rotate-90" viewBox="0 0 64 64">
                    <circle cx="32" cy="32" r="26" fill="none" stroke="#E5E7EB" stroke-width="6"
                            class="dark:stroke-gray-700"/>
                    <circle cx="32" cy="32" r="26" fill="none"
                            stroke="url(#staffRingGrad)" stroke-width="6" stroke-linecap="round"
                            stroke-dasharray="163.36" stroke-dashoffset="40.84"/>
                    <defs>
                        <linearGradient id="staffRingGrad" x1="0%" y1="0%" x2="100%" y2="0%">
                            <stop offset="0%" stop-color="#7c3aed"/>
                            <stop offset="100%" stop-color="#a78bfa"/>
                        </linearGradient>
                    </defs>
                </svg>
                <div class="absolute inset-0 flex items-center justify-center">
                    <span class="text-sm font-bold text-gray-800 dark:text-white">75%</span>
                </div>
            </div>
            <span class="text-[10px] font-semibold text-gray-400 uppercase tracking-wide">Progress</span>
        </div>

    </div>

    {{-- Progress bar ── full width ── --}}
    <div class="mt-5">
        <div class="flex items-center justify-between mb-1.5">
            <span class="text-xs font-semibold text-gray-500 dark:text-gray-400">Student Progress</span>
            <span class="text-xs font-bold text-violet-600 dark:text-violet-400">3 of 4 completed</span>
        </div>
        <div class="h-2.5 rounded-full bg-gray-100 dark:bg-gray-800 overflow-hidden">
            <div class="progress-fill h-full rounded-full" style="width:75%"></div>
        </div>
    </div>

    {{-- Staff assignment strip --}}
    <div class="mt-4 flex flex-wrap items-center gap-4 pt-4 border-t border-gray-100 dark:border-gray-800">
        <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-400">
            <i data-lucide="user" class="w-3.5 h-3.5 text-gray-400"></i>
            Assigned to: <strong class="text-violet-600 dark:text-violet-400 ml-1">J. Reyes</strong>
        </div>
        <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-400">
            <i data-lucide="clock" class="w-3.5 h-3.5 text-gray-400"></i>
            Est. Processing: <strong class="text-gray-700 dark:text-gray-300 ml-1">7 Days</strong>
        </div>
        <div class="flex items-center gap-2 text-xs">
            <span class="inline-flex items-center text-[10px] font-bold px-2.5 py-1 rounded-full
                         bg-violet-50 dark:bg-violet-900/30 text-violet-700 dark:text-violet-400
                         border border-violet-100 dark:border-violet-800/50">
                Under Review
            </span>
        </div>
        <button class="ml-auto text-xs font-bold text-violet-600 dark:text-violet-400
                       hover:bg-violet-50 dark:hover:bg-violet-900/20
                       border border-violet-200 dark:border-violet-800/50
                       px-3 py-1.5 rounded-xl transition flex items-center gap-1.5">
            <i data-lucide="user-plus" class="w-3 h-3"></i>
            Assign to Me
        </button>
        <button class="text-xs font-bold text-gray-500 dark:text-gray-400
                       hover:bg-gray-100 dark:hover:bg-gray-800
                       border border-gray-200 dark:border-gray-700
                       px-3 py-1.5 rounded-xl transition flex items-center gap-1.5">
            <i data-lucide="refresh-cw" class="w-3 h-3"></i>
            Update Status
        </button>
    </div>
</div>

{{-- ── Main 2-column layout ── --}}
<div class="grid grid-cols-1 xl:grid-cols-[1fr_320px] gap-6 items-start">

    {{-- ═══════════════════════════════════
         LEFT — Read-only Checklist
    ═══════════════════════════════════ --}}
    <div class="space-y-3">

        <div class="flex items-center justify-between">
            <p class="text-[11px] font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest">
                Requirements — 4 items
            </p>
            <span class="text-[11px] font-semibold text-emerald-600 dark:text-emerald-400
                         bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-100
                         dark:border-emerald-800/40 px-2.5 py-1 rounded-full">
                3 completed · 1 remaining
            </span>
        </div>

        {{-- ── Item 1 — DONE ── --}}
        <div class="req-item-staff bg-white dark:bg-[#111827] rounded-2xl border border-gray-200
                    dark:border-gray-800 shadow-sm overflow-hidden"
             style="background-color: rgba(34,197,94,0.03);">
            <div class="p-4 flex items-start gap-4">

                {{-- Read-only check indicator --}}
                <div class="mt-0.5 flex-shrink-0">
                    <div class="check-done">
                        <svg width="11" height="9" viewBox="0 0 11 9" fill="none">
                            <path d="M1 4L4 7.5L10 1" stroke="white" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>

                <div class="flex-1 min-w-0">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-800 dark:text-gray-200 leading-snug
                                      line-through decoration-gray-400 dark:decoration-gray-500">
                                Fully Accomplished Request for Thesis/Dissertation Adviser Form
                                <span class="font-normal text-gray-400 no-underline">(BU-F-GS-8)</span>
                            </p>
                            <div class="flex flex-wrap items-center gap-x-3 gap-y-1 mt-1.5">
                                <span class="text-[11px] text-emerald-600 dark:text-emerald-400 font-semibold
                                             bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-100
                                             dark:border-emerald-800/40 px-2 py-0.5 rounded-full">
                                    ✓ Completed by student
                                </span>
                                <span class="attach-tag">
                                    <i data-lucide="paperclip" class="w-3 h-3"></i>
                                    BU-F-GS-8_Cruz_signed.pdf
                                </span>
                            </div>
                        </div>
                        {{-- View attachment button --}}
                        <button class="flex-shrink-0 inline-flex items-center gap-1.5 text-[11px] font-semibold
                                       text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/20
                                       border border-blue-100 dark:border-blue-800/50
                                       hover:bg-blue-600 hover:text-white hover:border-blue-600
                                       dark:hover:bg-blue-600 dark:hover:text-white
                                       px-3 py-1.5 rounded-xl transition">
                            <i data-lucide="file-search" class="w-3 h-3"></i>
                            View File
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Item 2 — DONE ── --}}
        <div class="req-item-staff bg-white dark:bg-[#111827] rounded-2xl border border-gray-200
                    dark:border-gray-800 shadow-sm overflow-hidden"
             style="background-color: rgba(34,197,94,0.03);">
            <div class="p-4 flex items-start gap-4">
                <div class="mt-0.5 flex-shrink-0">
                    <div class="check-done">
                        <svg width="11" height="9" viewBox="0 0 11 9" fill="none">
                            <path d="M1 4L4 7.5L10 1" stroke="white" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-800 dark:text-gray-200 leading-snug
                                      line-through decoration-gray-400 dark:decoration-gray-500">
                                Accomplished Concept Note
                                <span class="font-normal text-gray-400 no-underline">— approved by Program Adviser</span>
                            </p>
                            <div class="flex flex-wrap items-center gap-x-3 gap-y-1 mt-1.5">
                                <span class="text-[11px] text-emerald-600 dark:text-emerald-400 font-semibold
                                             bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-100
                                             dark:border-emerald-800/40 px-2 py-0.5 rounded-full">
                                    ✓ Completed by student
                                </span>
                                <span class="attach-tag">
                                    <i data-lucide="paperclip" class="w-3 h-3"></i>
                                    ConceptNote_Cruz.pdf
                                </span>
                            </div>
                        </div>
                        <button class="flex-shrink-0 inline-flex items-center gap-1.5 text-[11px] font-semibold
                                       text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/20
                                       border border-blue-100 dark:border-blue-800/50
                                       hover:bg-blue-600 hover:text-white hover:border-blue-600
                                       dark:hover:bg-blue-600 dark:hover:text-white
                                       px-3 py-1.5 rounded-xl transition">
                            <i data-lucide="file-search" class="w-3 h-3"></i>
                            View File
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Item 3 — DONE ── --}}
        <div class="req-item-staff bg-white dark:bg-[#111827] rounded-2xl border border-gray-200
                    dark:border-gray-800 shadow-sm overflow-hidden"
             style="background-color: rgba(34,197,94,0.03);">
            <div class="p-4 flex items-start gap-4">
                <div class="mt-0.5 flex-shrink-0">
                    <div class="check-done">
                        <svg width="11" height="9" viewBox="0 0 11 9" fill="none">
                            <path d="M1 4L4 7.5L10 1" stroke="white" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-800 dark:text-gray-200 leading-snug
                                      line-through decoration-gray-400 dark:decoration-gray-500">
                                Certificate of Registration
                                <span class="font-normal text-gray-400 no-underline">(COR)</span>
                            </p>
                            <div class="flex flex-wrap items-center gap-x-3 gap-y-1 mt-1.5">
                                <span class="text-[11px] text-emerald-600 dark:text-emerald-400 font-semibold
                                             bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-100
                                             dark:border-emerald-800/40 px-2 py-0.5 rounded-full">
                                    ✓ Completed by student
                                </span>
                                <span class="attach-tag">
                                    <i data-lucide="paperclip" class="w-3 h-3"></i>
                                    COR_Cruz_2025.jpg
                                </span>
                            </div>
                        </div>
                        <button class="flex-shrink-0 inline-flex items-center gap-1.5 text-[11px] font-semibold
                                       text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/20
                                       border border-blue-100 dark:border-blue-800/50
                                       hover:bg-blue-600 hover:text-white hover:border-blue-600
                                       dark:hover:bg-blue-600 dark:hover:text-white
                                       px-3 py-1.5 rounded-xl transition">
                            <i data-lucide="file-search" class="w-3 h-3"></i>
                            View File
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Item 4 — MISSING ── --}}
        <div class="req-item-staff bg-white dark:bg-[#111827] rounded-2xl border border-red-100
                    dark:border-red-900/30 shadow-sm overflow-hidden">
            <div class="p-4 flex items-start gap-4">
                <div class="mt-0.5 flex-shrink-0">
                    <div class="check-pending"></div>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-800 dark:text-gray-200 leading-snug">
                                Notice of Admission
                                <span class="font-normal text-gray-500">(NOA) — for newly admitted students only</span>
                            </p>
                            <div class="flex flex-wrap items-center gap-x-3 gap-y-1 mt-1.5">
                                <span class="text-[11px] text-red-600 dark:text-red-400 font-semibold
                                             bg-red-50 dark:bg-red-900/20 border border-red-100
                                             dark:border-red-800/40 px-2 py-0.5 rounded-full">
                                    ⚠ Not yet submitted
                                </span>
                                <span class="text-[11px] text-gray-400 dark:text-gray-500 flex items-center gap-1">
                                    <i data-lucide="map-pin" class="w-3 h-3"></i>
                                    BUGS Registrar's Office
                                </span>
                            </div>
                        </div>
                        <button onclick="openNoteForItem(4, 'Notice of Admission (NOA)')"
                            class="flex-shrink-0 inline-flex items-center gap-1.5 text-[11px] font-semibold
                                   text-violet-600 dark:text-violet-400 bg-violet-50 dark:bg-violet-900/20
                                   border border-violet-200 dark:border-violet-800/50
                                   hover:bg-violet-600 hover:text-white hover:border-violet-600
                                   dark:hover:bg-violet-600 dark:hover:text-white
                                   px-3 py-1.5 rounded-xl transition">
                            <i data-lucide="message-square-plus" class="w-3 h-3"></i>
                            Add Note
                        </button>
                    </div>
                </div>
            </div>

            {{-- Inline note thread for this item --}}
            <div class="mx-4 mb-4 bg-amber-50 dark:bg-amber-900/15 border border-amber-100
                        dark:border-amber-800/30 rounded-xl p-3">
                <div class="flex items-center gap-2 mb-1.5">
                    <div class="w-5 h-5 rounded-full bg-violet-600 flex items-center justify-center
                                text-white text-[9px] font-bold">S</div>
                    <span class="text-[11px] font-bold text-gray-700 dark:text-gray-200">Staff Reviewer</span>
                    <span class="text-[10px] text-gray-400 ml-auto">May 4, 2025</span>
                </div>
                <p class="text-xs text-amber-800 dark:text-amber-300 leading-relaxed">
                    Please secure your NOA from the BUGS Registrar's Office and upload it here.
                    This is required for new students filing within their first semester.
                </p>
            </div>
        </div>

        {{-- Add general note trigger --}}
        <div class="pt-1">
            <button onclick="document.getElementById('noteTextarea').focus(); document.getElementById('noteLinkedItem').value='General / Overall Request';"
                class="w-full py-3 rounded-2xl text-sm font-bold border-2 border-dashed
                       border-gray-200 dark:border-gray-700 text-gray-400 dark:text-gray-500
                       hover:border-violet-400 hover:text-violet-600 dark:hover:border-violet-500
                       dark:hover:text-violet-400 transition flex items-center justify-center gap-2">
                <i data-lucide="message-square-plus" class="w-4 h-4"></i>
                Add a General Note to Student
            </button>
        </div>

    </div>

    {{-- ═══════════════════════════════════
         RIGHT — Staff Notes Sidebar
    ═══════════════════════════════════ --}}
    <div class="sidebar-sticky space-y-4">

        {{-- Notes & Comments Panel --}}
        <div class="bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 shadow-sm overflow-hidden">
            <div class="px-5 py-4 border-b border-gray-100 dark:border-gray-800 flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <div class="w-2 h-2 rounded-full bg-violet-500 animate-pulse"></div>
                    <h3 class="text-sm font-bold text-gray-800 dark:text-white">Staff Notes & Comments</h3>
                </div>
                <span class="text-[10px] font-bold text-violet-600 dark:text-violet-400
                             bg-violet-50 dark:bg-violet-900/30 border border-violet-100
                             dark:border-violet-800/50 px-2 py-0.5 rounded-full">2 notes</span>
            </div>

            {{-- Thread --}}
            <div id="noteThread" class="px-4 py-4 space-y-3">

                <div class="note-card bg-violet-50 dark:bg-violet-900/15 border border-violet-100
                             dark:border-violet-800/30 rounded-xl p-3">
                    <div class="flex items-center justify-between mb-1.5">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded-full bg-violet-600 flex items-center justify-center
                                        text-white text-[10px] font-bold">JR</div>
                            <span class="text-xs font-bold text-gray-700 dark:text-gray-200">J. Reyes</span>
                            <span class="text-[10px] text-violet-500 dark:text-violet-400 font-semibold
                                         bg-violet-50 dark:bg-violet-900/20 px-1.5 py-0.5 rounded">
                                Item 4
                            </span>
                        </div>
                        <span class="text-[10px] text-gray-400">May 4</span>
                    </div>
                    <p class="text-xs text-gray-700 dark:text-gray-300 leading-relaxed">
                        Please secure your NOA from the BUGS Registrar's Office. This is required for newly admitted students.
                    </p>
                </div>

                <div class="note-card bg-gray-50 dark:bg-gray-800/40 border border-gray-100
                             dark:border-gray-700 rounded-xl p-3">
                    <div class="flex items-center justify-between mb-1.5">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded-full bg-gray-400 flex items-center justify-center
                                        text-white text-[10px] font-bold">SM</div>
                            <span class="text-xs font-bold text-gray-700 dark:text-gray-200">S. Morales</span>
                            <span class="text-[10px] text-gray-400 font-semibold
                                         bg-gray-100 dark:bg-gray-700 px-1.5 py-0.5 rounded">
                                General
                            </span>
                        </div>
                        <span class="text-[10px] text-gray-400">May 2</span>
                    </div>
                    <p class="text-xs text-gray-700 dark:text-gray-300 leading-relaxed">
                        Request has been logged. Concept Note looks good — verified adviser signature is present.
                    </p>
                </div>

            </div>

            {{-- Compose new note ── --}}
            <div class="px-4 pb-4 pt-1 border-t border-gray-100 dark:border-gray-800 mt-1 space-y-2.5">
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest pt-3">Add a Note</p>

                {{-- Linked item selector --}}
                <div>
                    <label class="text-[10px] font-semibold text-gray-400 uppercase tracking-wide block mb-1">
                        Link to requirement
                    </label>
                    <select id="noteLinkedItem"
                        class="w-full text-xs bg-gray-50 dark:bg-gray-800/60 border border-gray-200
                               dark:border-gray-700 rounded-xl px-3 py-2 text-gray-600 dark:text-gray-300
                               focus:outline-none focus:ring-2 focus:ring-violet-500 transition cursor-pointer">
                        <option value="General / Overall Request">General / Overall Request</option>
                        <option value="Item 1">Item 1 — Adviser Form (BU-F-GS-8)</option>
                        <option value="Item 2">Item 2 — Concept Note</option>
                        <option value="Item 3">Item 3 — Certificate of Registration</option>
                        <option value="Item 4">Item 4 — Notice of Admission</option>
                    </select>
                </div>

                <textarea id="noteTextarea" rows="3"
                    placeholder="Type your note or guidance for the student…"
                    class="w-full text-xs text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-800/60
                           border border-gray-200 dark:border-gray-700 rounded-xl px-3 py-2.5
                           placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-violet-500
                           resize-none transition"></textarea>

                <div class="flex gap-2">
                    <button onclick="postNote()"
                        class="flex-1 text-xs font-bold py-2 rounded-xl
                               bg-violet-600 hover:bg-violet-700 text-white transition
                               flex items-center justify-center gap-1.5">
                        <i data-lucide="send" class="w-3.5 h-3.5"></i>
                        Post Note
                    </button>
                    <button onclick="postAndNotify()"
                        class="flex-1 text-xs font-bold py-2 rounded-xl
                               bg-amber-50 dark:bg-amber-900/20 hover:bg-amber-100 dark:hover:bg-amber-900/40
                               text-amber-700 dark:text-amber-400 border border-amber-200 dark:border-amber-800/50
                               transition flex items-center justify-center gap-1.5">
                        <i data-lucide="bell" class="w-3.5 h-3.5"></i>
                        Notify
                    </button>
                </div>
                <p class="text-[10px] text-gray-400 text-center">
                    "Notify" sends the student an in-app notification with your note.
                </p>
            </div>
        </div>

        {{-- Student Info card ── --}}
        <div class="bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 shadow-sm p-5">
            <div class="flex items-center gap-2.5 mb-3">
                <div class="w-8 h-8 rounded-xl bg-violet-50 dark:bg-violet-900/20 text-violet-600
                            flex items-center justify-center">
                    <i data-lucide="user" class="w-4 h-4"></i>
                </div>
                <h3 class="text-sm font-bold text-gray-800 dark:text-white">Student Details</h3>
            </div>
            <div class="space-y-2 text-xs text-gray-500 dark:text-gray-400">
                <div class="flex justify-between">
                    <span>Name</span>
                    <span class="font-semibold text-gray-700 dark:text-gray-300">Maria Cruz</span>
                </div>
                <div class="flex justify-between">
                    <span>Student No.</span>
                    <span class="font-semibold text-gray-700 dark:text-gray-300">2021-00482</span>
                </div>
                <div class="flex justify-between">
                    <span>Program</span>
                    <span class="font-semibold text-gray-700 dark:text-gray-300">BSCS</span>
                </div>
                <div class="flex justify-between">
                    <span>Level</span>
                    <span class="font-semibold text-gray-700 dark:text-gray-300">Master's</span>
                </div>
                <div class="flex justify-between">
                    <span>Reference No.</span>
                    <span class="font-mono font-semibold text-violet-600 dark:text-violet-400">BUOU-25-0482</span>
                </div>
            </div>
        </div>

    </div>{{-- end sidebar --}}

</div>{{-- end 2-col --}}

@endsection

@push('scripts')
<script>
    function openNoteForItem(itemNum, itemName) {
        const select = document.getElementById('noteLinkedItem');
        const textarea = document.getElementById('noteTextarea');
        // Set the linked item
        for (let i = 0; i < select.options.length; i++) {
            if (select.options[i].value.includes('Item ' + itemNum)) {
                select.selectedIndex = i;
                break;
            }
        }
        textarea.focus();
        textarea.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    function postNote(notify = false) {
        const textarea = document.getElementById('noteTextarea');
        const linked   = document.getElementById('noteLinkedItem');
        const text     = textarea.value.trim();
        if (!text) {
            textarea.classList.add('ring-2', 'ring-red-400');
            setTimeout(() => textarea.classList.remove('ring-2', 'ring-red-400'), 1500);
            return;
        }

        const thread = document.getElementById('noteThread');
        const card   = document.createElement('div');
        card.className = 'note-card bg-violet-50 dark:bg-violet-900/15 border border-violet-100 dark:border-violet-800/30 rounded-xl p-3';
        card.innerHTML = `
            <div class="flex items-center justify-between mb-1.5">
                <div class="flex items-center gap-2">
                    <div class="w-6 h-6 rounded-full bg-violet-600 flex items-center justify-center text-white text-[10px] font-bold">
                        {{ strtoupper(substr(session('staff_name') ?? 'S', 0, 2)) }}
                    </div>
                    <span class="text-xs font-bold text-gray-700 dark:text-gray-200">{{ session('staff_name') ?? 'Staff Member' }}</span>
                    <span class="text-[10px] text-violet-500 dark:text-violet-400 font-semibold bg-violet-50 dark:bg-violet-900/20 px-1.5 py-0.5 rounded">
                        ${linked.value}
                    </span>
                    ${notify ? '<span class="text-[10px] text-amber-600 dark:text-amber-400 font-semibold">📣 Notified</span>' : ''}
                </div>
                <span class="text-[10px] text-gray-400">Just now</span>
            </div>
            <p class="text-xs text-gray-700 dark:text-gray-300 leading-relaxed">${text}</p>
        `;
        thread.appendChild(card);
        thread.scrollTop = thread.scrollHeight;
        textarea.value = '';
        lucide.createIcons();
    }

    function postAndNotify() {
        postNote(true);
    }
</script>
@endpush