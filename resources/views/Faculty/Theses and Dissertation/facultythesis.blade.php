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
                    {{ $adviserCount }}
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
                    {{ $chairCount }}
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
                    {{ $memberCount }}
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
                        id="searchInput"
                        placeholder="Search title..."
                        class="w-full pl-9 pr-3 py-2 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-xs text-gray-700 dark:text-gray-200 focus:ring-2 focus:ring-blue-500 outline-none"
                    >

                </div>

                {{-- YEAR --}}
                <select id="yearFilter" class="w-[120px] py-2 px-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-xs text-gray-700 dark:text-gray-200 focus:ring-2 focus:ring-blue-500 outline-none">
                    <option value="">All Years</option>
                    <option value="2026">2026</option>
                    <option value="2025">2025</option>
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                </select>

                {{-- DEGREE --}}
                <select id="degreeFilter" class="w-[130px] py-2 px-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-xs text-gray-700 dark:text-gray-200 focus:ring-2 focus:ring-blue-500 outline-none">
                    <option value="">All Degrees</option>
                    @php
                        $uniqueDegrees = $uploadedRecords->pluck('degree')->unique()->sort();
                    @endphp
                    @foreach($uniqueDegrees as $deg)
                        <option value="{{ $deg }}">{{ $deg }}</option>
                    @endforeach
                </select>

                {{-- DOCUMENT TYPE --}}
                <select id="docTypeFilter" class="w-[160px] py-2 px-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-xs text-gray-700 dark:text-gray-200 focus:ring-2 focus:ring-blue-500 outline-none">
                    <option value="">All Types</option>
                    <option value="Thesis">Thesis (Master's)</option>
                    <option value="Dissertation">Dissertation (Doctoral)</option>
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
                        <th class="px-4 py-3 text-center">Status</th>
                        <th class="px-4 py-3 text-center">Action</th>

                    </tr>

                </thead>

                <tbody id="recordsTable">

                    @forelse($uploadedRecords as $record)

                    <tr class="border-b border-gray-100 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-900/40 transition record-row"
                        data-title="{{ strtolower($record->title) }}"
                        data-year="{{ \Carbon\Carbon::parse($record->published_date)->format('Y') }}"
                        data-degree="{{ $record->degree }}"
                        data-doctype="{{ $record->document_type }}">

                        <td class="px-4 py-3 text-xs text-gray-600 dark:text-gray-300">
                            {{ \Carbon\Carbon::parse($record->published_date)->format('M d, Y') }}
                        </td>

                        <td class="px-4 py-3">

                            <div class="font-semibold text-sm text-slate-800 dark:text-white">
                                {{ $record->title }}
                            </div>

                            <div class="text-[10px] text-gray-400 mt-1">
                                Uploaded Research Document
                            </div>

                        </td>

                        <td class="px-4 py-3 text-xs text-gray-600 dark:text-gray-300">
                            {{ $record->author }}
                        </td>

                        <td class="px-4 py-3">

                            <span class="bg-slate-100 dark:bg-gray-700 px-2.5 py-1 rounded-full text-[10px]">
                                {{ $record->degree }}
                            </span>

                        </td>

                        <td class="px-4 py-3">

                            @if($record->document_type == 'Dissertation')

                                <span class="bg-purple-100 text-purple-700 dark:bg-purple-900/30 dark:text-purple-300 px-2.5 py-1 rounded-full text-[10px] font-semibold">
                                    Dissertation
                                </span>

                            @else

                                <span class="bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-300 px-2.5 py-1 rounded-full text-[10px] font-semibold">
                                    Thesis
                                </span>

                            @endif

                        </td>

                        <td class="px-4 py-3 text-center">

                            <span class="bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-300 px-2.5 py-1 rounded-full text-[10px] font-semibold">
                                Completed
                            </span>

                        </td>

                        <td class="px-4 py-3">

                            <div class="flex justify-center gap-1.5">

                                {{-- VIEW --}}
                                <a href="{{ route('view_theses', ['id' => $record->id]) }}"
                                   class="bg-blue-50 hover:bg-blue-100 dark:bg-blue-900/20 p-1.5 rounded-lg transition">

                                    <i data-lucide="eye" class="w-3.5 h-3.5 text-blue-600"></i>

                                </a>

                                {{-- EDIT --}}
                                <a href="{{ route('faculty.theses.edit', $record->id) }}"
                                   class="bg-yellow-50 hover:bg-yellow-100 dark:bg-yellow-900/20 p-1.5 rounded-lg transition">

                                    <i data-lucide="square-pen" class="w-3.5 h-3.5 text-yellow-600"></i>

                                </a>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7"
                            class="text-center py-10 text-sm text-gray-500 dark:text-gray-400">

                            No thesis/dissertation records found.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>
        
        {{-- NO RESULTS MESSAGE (hidden by default) --}}
        <div id="noResultsMsg" class="hidden text-center py-6 text-sm text-gray-500 dark:text-gray-400">
            No matching records found.
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
        
        // ==================== FILTER FUNCTIONALITY ====================
        const searchInput = document.getElementById('searchInput');
        const yearFilter = document.getElementById('yearFilter');
        const degreeFilter = document.getElementById('degreeFilter');
        const docTypeFilter = document.getElementById('docTypeFilter');
        const recordsTable = document.getElementById('recordsTable');
        const noResultsMsg = document.getElementById('noResultsMsg');
        
        // Get all record rows (excluding the empty row)
        const allRows = Array.from(document.querySelectorAll('.record-row'));
        
        function filterTable() {
            const searchTerm = searchInput.value.toLowerCase().trim();
            const selectedYear = yearFilter.value;
            const selectedDegree = degreeFilter.value;
            const selectedDocType = docTypeFilter.value;
            
            let visibleCount = 0;
            
            allRows.forEach(row => {
                const title = row.getAttribute('data-title') || '';
                const year = row.getAttribute('data-year') || '';
                const degree = row.getAttribute('data-degree') || '';
                const doctype = row.getAttribute('data-doctype') || '';
                
                // Check search match
                const matchesSearch = searchTerm === '' || title.includes(searchTerm);
                
                // Check year match
                const matchesYear = selectedYear === '' || year === selectedYear;
                
                // Check degree match
                const matchesDegree = selectedDegree === '' || degree === selectedDegree;
                
                // Check document type match
                const matchesDocType = selectedDocType === '' || doctype === selectedDocType;
                
                if (matchesSearch && matchesYear && matchesDegree && matchesDocType) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });
            
            // Show/hide no results message
            if (visibleCount === 0 && allRows.length > 0) {
                if (recordsTable) recordsTable.style.display = 'none';
                if (noResultsMsg) noResultsMsg.classList.remove('hidden');
            } else {
                if (recordsTable) recordsTable.style.display = '';
                if (noResultsMsg) noResultsMsg.classList.add('hidden');
            }
        }
        
        // Add event listeners
        if (searchInput) searchInput.addEventListener('keyup', filterTable);
        if (yearFilter) yearFilter.addEventListener('change', filterTable);
        if (degreeFilter) degreeFilter.addEventListener('change', filterTable);
        if (docTypeFilter) docTypeFilter.addEventListener('change', filterTable);
        
    });
</script>
@endpush