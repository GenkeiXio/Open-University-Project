@extends('Faculty.facultylayout')

@section('title', 'Faculty Dashboard - Theses & Dissertations')

@section('content')

<div class="p-3 space-y-3 bg-gray-50 dark:bg-gray-900 min-h-screen">

    {{-- HEADER --}}
    <div class="bg-white rounded-3xl px-5 py-6  shadow-md">

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-3">

            <div>
                <h1 class="text-[26px] text-black font-bold tracking-wide">
                    Faculty Thesis & Dissertation Portal
                </h1>

                <p class="text-[#0B439B] text-xs mt-1">
                    Upload students research outputs and monitor faculty panel records.
                </p>
            </div>

            <div class="flex flex-wrap gap-2">
            <button onclick="window.location='{{ route('faculty.theses.upload') }}'"
            class="bg-[#30B439] text-white hover:bg-[#279632] transition px-4 py-2 rounded-xl text-xs font-semibold flex items-center gap-2 shadow-sm">
            <i data-lucide="upload" class="w-4 h-4"></i>
                  Upload Thesis
            </button>

            </div>

        </div>

    </div>

    {{-- COMPACT TOTAL CARDS --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-2">

        {{-- THESIS ADVISER --}}
        <div class="bg-white dark:bg-gray-800 rounded-[24px] shadow-sm border border-gray-200 dark:border-gray-700 px-4 py-3 flex items-center justify-between">

            <div class="flex items-center gap-3">

                <div class="w-2.5 h-14 bg-blue-700 rounded-full"></div>

                <div class="w-14 h-14 rounded-2xl bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center">
                    <i data-lucide="user-check" class="w-6 h-6 text-blue-600 dark:text-blue-400"></i>
                </div>

                <div>
                    <h2 class="text-md font-bold text-blue-800 dark:text-blue-300 leading-tight">
                        Thesis Adviser
                    </h2>

                    <p class="text-[12px] text-gray-500 dark:text-gray-400">
                        Advisory Records
                    </p>
                </div>

            </div>

            <div class="text-center">

                <h1 class="text-2xl font-extrabold text-blue-800 dark:text-blue-300 leading-none">
                    30
                </h1>

                <p class="text-xs font-semibold text-blue-700 dark:text-blue-400">
                    Total
                </p>

            </div>

        </div>

        {{-- PANEL CHAIR --}}
        <div class="bg-white dark:bg-gray-800 rounded-[24px] shadow-sm border border-gray-200 dark:border-gray-700 px-4 py-3 flex items-center justify-between">

            <div class="flex items-center gap-3">

                <div class="w-2.5 h-14 bg-orange-500 rounded-full"></div>

                <div class="w-14 h-14 rounded-2xl bg-orange-100 dark:bg-orange-900/30 flex items-center justify-center">
                    <i data-lucide="shield-check" class="w-6 h-6 text-orange-600 dark:text-orange-400"></i>
                </div>

                <div>
                    <h2 class="text-md font-bold text-orange-700 dark:text-orange-300 leading-tight">
                        Panel Chair
                    </h2>

                    <p class="text-[12px] text-gray-500 dark:text-gray-400">
                        Defense Records
                    </p>
                </div>

            </div>

            <div class="text-center">

                <h1 class="text-2xl font-extrabold text-orange-700 dark:text-orange-300 leading-none">
                    12
                </h1>

                <p class="text-xs font-semibold text-orange-600 dark:text-orange-400">
                    Total
                </p>

            </div>

        </div>

        {{-- PANEL MEMBER --}}
        <div class="bg-white dark:bg-gray-800 rounded-[24px] shadow-sm border border-gray-200 dark:border-gray-700 px-4 py-3 flex items-center justify-between">

            <div class="flex items-center gap-3">

                <div class="w-2.5 h-14 bg-green-600 rounded-full"></div>

                <div class="w-14 h-14 rounded-2xl bg-green-100 dark:bg-green-900/30 flex items-center justify-center">
                    <i data-lucide="graduation-cap" class="w-6 h-6 text-green-600 dark:text-green-400"></i>
                </div>

                <div>
                    <h2 class="text-md font-bold text-green-700 dark:text-green-300 leading-tight">
                        Panel Member
                    </h2>

                    <p class="text-[12px] text-gray-500 dark:text-gray-400">
                        Participation Records
                    </p>
                </div>

            </div>

            <div class="text-center">

                <h1 class="text-2xl font-extrabold text-green-700 dark:text-green-300 leading-none">
                    18
                </h1>

                <p class="text-xs font-semibold text-green-600 dark:text-green-400">
                    Total
                </p>

            </div>

        </div>

    </div>

    {{-- MAIN TABLE CARD --}}
    <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">

        {{-- TOP --}}
        <div class="px-5 py-4 border-b border-gray-200 dark:border-gray-700">

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-3">

                <div>
                    <h2 class="text-lg font-bold text-slate-800 dark:text-white">
                        Faculty Advisory & Panel Records
                    </h2>

                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                        Thesis and dissertation participation history
                    </p>
                </div>

                 <button class="bg-blue-500 hover:bg-blue-600 transition px-4 py-2 rounded-xl text-xs text-white font-semibold flex items-center gap-2 shadow-sm">
                    <i data-lucide="folder-open" class="w-4 h-4"></i>
                    Browse Records
                </button>

            </div>

        </div>

        {{-- FILTERS --}}
        <div class="px-5 py-3 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/40">

            <div class="flex flex-wrap gap-2 items-center">

                {{-- SEARCH --}}
                <div class="relative w-[220px]">

                    <i data-lucide="search"
                       class="w-3.5 h-3.5 absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                    </i>

                    <input
                        type="text"
                        placeholder="Search title..."
                        class="w-full pl-9 pr-3 py-2 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-xs text-gray-700 dark:text-gray-200 focus:ring-2 focus:ring-blue-500 outline-none"
                    >

                </div>

                {{-- YEAR --}}
                <select class="w-[120px] py-2 px-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-xs text-gray-700 dark:text-gray-200 focus:ring-2 focus:ring-blue-500 outline-none">
                    <option>Year</option>
                    <option>2026</option>
                    <option>2025</option>
                    <option>2024</option>
                    <option>2023</option>
                </select>

                {{-- DEGREE --}}
                <select class="w-[130px] py-2 px-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-xs text-gray-700 dark:text-gray-200 focus:ring-2 focus:ring-blue-500 outline-none">
                    <option>Degree</option>
                    <option>MSIT</option>
                    <option>MIT</option>
                    <option>MIT-CS</option>
                    <option>PhD IT</option>
                </select>

                {{-- DOCUMENT TYPE --}}
                <select class="w-[160px] py-2 px-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-xs text-gray-700 dark:text-gray-200 focus:ring-2 focus:ring-blue-500 outline-none">
                    <option>Document Type</option>
                    <option>Master's Thesis</option>
                    <option>Dissertation</option>
                </select>

            </div>

        </div>

        {{-- TABLE --}}
        <div class="overflow-x-auto">

            <table class="w-full min-w-[1000px]">

                <thead class="bg-slate-100 dark:bg-gray-900">

                    <tr class="text-left text-[11px] uppercase tracking-wider text-gray-500 dark:text-gray-400">

                        <th class="px-4 py-3">Defense Date</th>
                        <th class="px-4 py-3">Research Title</th>
                        <th class="px-4 py-3">Student</th>
                        <th class="px-4 py-3">Degree</th>
                        <th class="px-4 py-3">Document</th>
                        <th class="px-4 py-3">Role</th>
                        <th class="px-4 py-3 text-center">Status</th>
                        <th class="px-4 py-3 text-center">Action</th>

                    </tr>

                </thead>

                <tbody>

                    {{-- RECORD 1 --}}
                    <tr class="border-b border-gray-100 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-900/40 transition">

                        <td class="px-4 py-3 text-xs text-gray-600 dark:text-gray-300">
                            Apr 3, 2023
                        </td>

                        <td class="px-4 py-3">

                            <div class="font-semibold text-sm text-slate-800 dark:text-white">
                                AI in Healthcare & Environmental Computing
                            </div>

                            <div class="text-[10px] text-gray-400 mt-1">
                                Uploaded Thesis Document
                            </div>

                        </td>

                        <td class="px-4 py-3 text-xs text-gray-600 dark:text-gray-300">
                            Anya Gupta
                        </td>

                        <td class="px-4 py-3">
                            <span class="bg-slate-100 dark:bg-gray-700 px-2.5 py-1 rounded-full text-[10px]">
                                MSIT
                            </span>
                        </td>

                        <td class="px-4 py-3">
                            <span class="bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-300 px-2.5 py-1 rounded-full text-[10px] font-semibold">
                                Master's
                            </span>
                        </td>

                        <td class="px-4 py-3">
                            <span class="bg-indigo-100 text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-300 px-2.5 py-1 rounded-full text-[10px] font-semibold">
                                Adviser
                            </span>
                        </td>

                        <td class="px-4 py-3 text-center">
                            <span class="bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-300 px-2.5 py-1 rounded-full text-[10px] font-semibold">
                                Approved
                            </span>
                        </td>

                        <td class="px-4 py-3">

                            <div class="flex justify-center gap-1.5">

                                <button class="bg-blue-50 hover:bg-blue-100 dark:bg-blue-900/20 p-1.5 rounded-lg transition">
                                    <i data-lucide="eye" class="w-3.5 h-3.5 text-blue-600"></i>
                                </button>

                                <button class="bg-yellow-50 hover:bg-yellow-100 dark:bg-yellow-900/20 p-1.5 rounded-lg transition">
                                    <i data-lucide="square-pen" class="w-3.5 h-3.5 text-yellow-600"></i>
                                </button>
                            </div>

                        </td>

                    </tr>

                    {{-- RECORD 2 --}}
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-900/40 transition">

                        <td class="px-4 py-3 text-xs text-gray-600 dark:text-gray-300">
                            Jul 1, 2023
                        </td>

                        <td class="px-4 py-3">

                            <div class="font-semibold text-sm text-slate-800 dark:text-white">
                                Big Data Analytics in Healthcare Systems
                            </div>

                            <div class="text-[10px] text-gray-400 mt-1">
                                Dissertation Defense Record
                            </div>

                        </td>

                        <td class="px-4 py-3 text-xs text-gray-600 dark:text-gray-300">
                            Sarah Williams
                        </td>

                        <td class="px-4 py-3">
                            <span class="bg-slate-100 dark:bg-gray-700 px-2.5 py-1 rounded-full text-[10px]">
                                PhD IT
                            </span>
                        </td>

                        <td class="px-4 py-3">
                            <span class="bg-purple-100 text-purple-700 dark:bg-purple-900/30 dark:text-purple-300 px-2.5 py-1 rounded-full text-[10px] font-semibold">
                                Dissertation
                            </span>
                        </td>

                        <td class="px-4 py-3">
                            <span class="bg-orange-100 text-orange-700 dark:bg-orange-900/30 dark:text-orange-300 px-2.5 py-1 rounded-full text-[10px] font-semibold">
                                Chair
                            </span>
                        </td>

                        <td class="px-4 py-3 text-center">
                            <span class="bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-300 px-2.5 py-1 rounded-full text-[10px] font-semibold">
                                Pending
                            </span>
                        </td>

                        <td class="px-4 py-3">

                            <div class="flex justify-center gap-1.5">

                                <button class="bg-blue-50 hover:bg-blue-100 dark:bg-blue-900/20 p-1.5 rounded-lg transition">
                                    <i data-lucide="eye" class="w-3.5 h-3.5 text-blue-600"></i>
                                </button>

                                <button class="bg-yellow-50 hover:bg-yellow-100 dark:bg-yellow-900/20 p-1.5 rounded-lg transition">
                                    <i data-lucide="square-pen" class="w-3.5 h-3.5 text-yellow-600"></i>
                                </button>
                            </div>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {

        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

    });
</script>
@endpush