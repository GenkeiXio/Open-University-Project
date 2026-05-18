@extends('Staff.layout')

@section('title', 'Theses & Dissertations')

@push('styles')
<style>
    .page-fade-in {
        animation: fadeIn 0.3s ease both;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .table-container {
        scrollbar-width: thin;
        scrollbar-color: #e5e7eb transparent;
    }
    
    .status-badge {
        transition: all 0.2s ease;
    }
</style>
@endpush

@section('content')

{{-- ── Header Section ── --}}
<div class="mb-7 flex flex-col md:flex-row md:items-center justify-between gap-4 page-fade-in">
    <div>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center gap-2">
            <i data-lucide="book-marked" class="w-7 h-7 text-sky-500"></i>
            Theses & Dissertations
        </h1>

        <p class="text-sm text-gray-500 dark:text-gray-400 mt-0.5">
            Manage and archive the Graduate School's research repository.
        </p>
    </div>

    <button onclick="window.location='{{ route('staff.theses.upload') }}'"
        class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-violet-600 hover:bg-violet-700 text-white text-sm font-bold rounded-xl transition-all shadow-sm shadow-violet-200 dark:shadow-none active:scale-95">
        <i data-lucide="plus-circle" class="w-4 h-4"></i>
        Add Thesis/Dissertation
    </button>
</div>

{{-- ── Repository Stats ── --}}
<div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-7 page-fade-in">
    <div class="bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 p-5 flex items-center gap-4">
        <div class="w-10 h-10 rounded-xl bg-sky-50 dark:bg-sky-900/20 text-sky-600 flex items-center justify-center">
            <i data-lucide="layers" class="w-5 h-5"></i>
        </div>
        <div>
            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">
                Total Records
            </p>
            <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                1,284
            </h3>
        </div>
    </div>

    <div class="bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 p-5 flex items-center gap-4">
        <div class="w-10 h-10 rounded-xl bg-violet-50 dark:bg-violet-900/20 text-violet-600 flex items-center justify-center">
            <i data-lucide="graduation-cap" class="w-5 h-5"></i>
        </div>
        <div>
            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">
                Master's Theses
            </p>
            <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                842
            </h3>
        </div>
    </div>

    <div class="bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 p-5 flex items-center gap-4">
        <div class="w-10 h-10 rounded-xl bg-amber-50 dark:bg-amber-900/20 text-amber-500 flex items-center justify-center">
            <i data-lucide="award" class="w-5 h-5"></i>
        </div>
        <div>
            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">
                Doctoral Dissertations
            </p>
            <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                442
            </h3>
        </div>
    </div>
</div>

{{-- ── Analytics + Monitoring ── --}}
<div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mb-7 page-fade-in">
    {{-- Chart --}}
    <div class="xl:col-span-2 bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 shadow-sm p-5">
        <div class="flex items-center justify-between mb-5">
            <div>
                <h2 class="text-base font-bold text-gray-800 dark:text-white flex items-center gap-2">
                    <i data-lucide="bar-chart-3" class="w-5 h-5 text-violet-500"></i>
                    Degree Program Research Count
                </h2>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                    Tracks which degree program has the highest uploaded theses/dissertations.
                </p>
            </div>
            <span class="px-3 py-1 rounded-lg text-[10px] font-bold bg-violet-50 dark:bg-violet-900/20 text-violet-600">
                Updated Today
            </span>
        </div>
        <div class="h-[340px]">
            <canvas id="degreeChart"></canvas>
        </div>
    </div>

    {{-- Upload Monitoring --}}
    <div class="bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 shadow-sm p-5">
        <div class="mb-5">
            <h2 class="text-base font-bold text-gray-800 dark:text-white flex items-center gap-2">
                <i data-lucide="activity" class="w-5 h-5 text-sky-500"></i>
                Upload Monitoring
            </h2>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                Recent upload activities showing date and faculty uploader.
            </p>
        </div>

        <div class="space-y-4 max-h-[340px] overflow-y-auto pr-1">
            {{-- Item 1 --}}
            <div class="flex items-start gap-3 pb-4 border-b border-gray-100 dark:border-gray-800">
                <div class="w-10 h-10 rounded-xl bg-violet-50 dark:bg-violet-900/20 flex items-center justify-center text-violet-600 flex-shrink-0">
                    <i data-lucide="upload-cloud" class="w-5 h-5"></i>
                </div>
                <div class="flex-1">
                    <div class="flex items-center justify-between">
                        <h4 class="text-xs font-semibold text-gray-800 dark:text-gray-200">
                            Prof. James Wilson
                        </h4>
                    </div>
                    <p class="text-[11px] text-gray-500 dark:text-gray-400 mt-1">
                        Uploaded "AI-Driven Predictive Analytics in Local Governance"
                    </p>
                    <div class="flex items-center gap-3 mt-2">
                        <div class="flex items-center gap-1 text-[10px] text-gray-400">
                            <i data-lucide="calendar-days" class="w-3 h-3"></i>
                            May 12, 2026
                        </div>
                        <button class="text-[10px] text-violet-600 hover:text-violet-700 font-medium">View Details</button>
                    </div>
                </div>
            </div>

            {{-- Item 2 --}}
            <div class="flex items-start gap-3 pb-4 border-b border-gray-100 dark:border-gray-800">
                <div class="w-10 h-10 rounded-xl bg-sky-50 dark:bg-sky-900/20 flex items-center justify-center text-sky-600 flex-shrink-0">
                    <i data-lucide="file-check" class="w-5 h-5"></i>
                </div>
                <div class="flex-1">
                    <div class="flex items-center justify-between">
                        <h4 class="text-xs font-semibold text-gray-800 dark:text-gray-200">
                            Dr. Sarah Parker
                        </h4>
                    </div>
                    <p class="text-[11px] text-gray-500 dark:text-gray-400 mt-1">
                        Uploaded "Impact of Hybrid Learning on Graduate Research"
                    </p>
                    <div class="flex items-center gap-3 mt-2">
                        <div class="flex items-center gap-1 text-[10px] text-gray-400">
                            <i data-lucide="calendar-days" class="w-3 h-3"></i>
                            May 11, 2026
                        </div>
                        <button class="text-[10px] text-violet-600 hover:text-violet-700 font-medium">View Details</button>
                    </div>
                </div>
            </div>

            {{-- Item 3 --}}
            <div class="flex items-start gap-3 pb-4 border-b border-gray-100 dark:border-gray-800">
                <div class="w-10 h-10 rounded-xl bg-red-50 dark:bg-red-900/20 flex items-center justify-center text-red-600 flex-shrink-0">
                    <i data-lucide="shield-alert" class="w-5 h-5"></i>
                </div>
                <div class="flex-1">
                    <div class="flex items-center justify-between">
                        <h4 class="text-xs font-semibold text-gray-800 dark:text-gray-200">
                            Dr. Andrea Cruz
                        </h4>
                    </div>
                    <p class="text-[11px] text-gray-500 dark:text-gray-400 mt-1">
                        Uploaded "Strategic Leadership in Digital Transformation"
                    </p>
                    <div class="flex items-center gap-3 mt-2">
                        <div class="flex items-center gap-1 text-[10px] text-gray-400">
                            <i data-lucide="calendar-days" class="w-3 h-3"></i>
                            May 10, 2026
                        </div>
                        <button class="text-[10px] text-violet-600 hover:text-violet-700 font-medium">View Details</button>
                    </div>
                </div>
            </div>

            {{-- Item 4 --}}
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 rounded-xl bg-emerald-50 dark:bg-emerald-900/20 flex items-center justify-center text-emerald-600 flex-shrink-0">
                    <i data-lucide="badge-check" class="w-5 h-5"></i>
                </div>
                <div class="flex-1">
                    <div class="flex items-center justify-between">
                        <h4 class="text-xs font-semibold text-gray-800 dark:text-gray-200">
                            Prof. Maria Santos
                        </h4>
                    </div>
                    <p class="text-[11px] text-gray-500 dark:text-gray-400 mt-1">
                        Uploaded "Social Studies Curriculum Development"
                    </p>
                    <div class="flex items-center gap-3 mt-2">
                        <div class="flex items-center gap-1 text-[10px] text-gray-400">
                            <i data-lucide="calendar-days" class="w-3 h-3"></i>
                            May 09, 2026
                        </div>
                        <button class="text-[10px] text-violet-600 hover:text-violet-700 font-medium">View Details</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ── Theses & Dissertations List (Table) ── --}}
<div class="bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800 shadow-sm overflow-hidden page-fade-in">
    
    {{-- Table Filters --}}
    <div class="p-4 border-b border-gray-100 dark:border-gray-800 flex flex-wrap items-center justify-between gap-4">
        <div class="relative w-full max-w-sm">
            <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"></i>
            <input type="text" id="searchInput" placeholder="Search by title, author, or year..." 
                   class="w-full pl-10 pr-4 py-2 text-xs bg-gray-50 dark:bg-gray-900/50 border border-gray-200 
                          dark:border-gray-800 rounded-xl focus:ring-2 focus:ring-violet-500 outline-none 
                          text-gray-700 dark:text-gray-300 transition">
        </div>
        <div class="flex items-center gap-2">
            <select id="degreeFilter" class="text-xs bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-800 
                           rounded-lg px-3 py-2 outline-none text-gray-600 dark:text-gray-400 min-w-[200px]">
                <option value="all">All Degrees</option>
                <option value="Doctor of Education in Educational Leadership & Management (EdDELM)">Doctor of Education (EdDELM)</option>
                <option value="Master of Arts in Educational Leadership & Management (MAELM)">Master of Arts in Educational Leadership (MAELM)</option>
                <option value="Master of Arts in English Education (MAEngEd)">Master of Arts in English Education (MAEngEd)</option>
                <option value="Master of Arts in Social Studies Education (MASocStEd)">Master of Arts in Social Studies (MASocStEd)</option>
                <option value="Master in Management (MM)">Master in Management (MM)</option>
                <option value="Master of Public Administration (MPA)">Master of Public Administration (MPA)</option>
            </select>
            
            <select id="typeFilter" class="text-xs bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-800 
                           rounded-lg px-3 py-2 outline-none text-gray-600 dark:text-gray-400">
                <option value="all">All Types</option>
                <option value="Thesis">Master's Theses</option>
                <option value="Dissertation">Doctoral Dissertations</option>
            </select>
            
            <button id="resetFilters" class="p-2 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-800 rounded-lg text-gray-500 hover:text-violet-600 transition">
                <i data-lucide="refresh-cw" class="w-4 h-4"></i>
            </button>
        </div>
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto table-container">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50/50 dark:bg-gray-800/30">
                    <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider">Research Details</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider">Author</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider">Degree Program</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider">Year</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider">Uploaded By</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider">Upload Date</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider text-right">Actions</th>
                </tr>
            </thead>
            <tbody id="tableBody" class="divide-y divide-gray-50 dark:divide-gray-800">
                @php
                $theses = [
                    ['title'=>'AI-Driven Predictive Analytics in Local Governance','type'=>'Dissertation','degree'=>'Doctor of Education in Educational Leadership & Management (EdDELM)','author'=>'Dr. Robert Chen','year'=>'2025','uploader'=>'Prof. James Wilson','uploadDate'=>'May 12, 2026','color'=>'sky'],
                    ['title'=>'Sustainability Models for Coastal Communities in Albay','type'=>'Thesis','degree'=>'Master of Public Administration (MPA)','author'=>'Mark V. Solis','year'=>'2024','uploader'=>'Dr. Sarah Parker','uploadDate'=>'May 11, 2026','color'=>'violet'],
                    ['title'=>'Advanced Research Methods in Education','type'=>'Dissertation','degree'=>'Doctor of Education in Educational Leadership & Management (EdDELM)','author'=>'Dr. Sarah Parker','year'=>'2024','uploader'=>'Prof. Mark Solis','uploadDate'=>'May 10, 2026','color'=>'sky'],
                    ['title'=>'Impact of Hybrid Learning on Graduate Research','type'=>'Thesis','degree'=>'Master of Arts in Educational Leadership & Management (MAELM)','author'=>'Roberto Gomez','year'=>'2023','uploader'=>'Dr. Elena Rossi','uploadDate'=>'May 9, 2026','color'=>'violet'],
                    ['title'=>'Strategic Leadership in Digital Transformation','type'=>'Dissertation','degree'=>'Master in Management (MM)','author'=>'Dr. Andrea Cruz','year'=>'2025','uploader'=>'Prof. James Wilson','uploadDate'=>'May 8, 2026','color'=>'sky'],
                    ['title'=>'Early Childhood Education Methodologies','type'=>'Thesis','degree'=>'Master of Arts in English Education (MAEngEd)','author'=>'Prof. James Wilson','year'=>'2024','uploader'=>'Dr. Sarah Parker','uploadDate'=>'May 7, 2026','color'=>'violet'],
                    ['title'=>'Public Policy and Governance Reforms','type'=>'Thesis','degree'=>'Master of Public Administration (MPA)','author'=>'Dr. Elena Rossi','year'=>'2024','uploader'=>'Prof. Mark Solis','uploadDate'=>'May 6, 2026','color'=>'violet'],
                    ['title'=>'Social Studies Curriculum Development','type'=>'Thesis','degree'=>'Master of Arts in Social Studies Education (MASocStEd)','author'=>'Prof. Maria Santos','year'=>'2025','uploader'=>'Dr. Andrea Cruz','uploadDate'=>'May 5, 2026','color'=>'violet'],
                ];
                @endphp

                @foreach($theses as $t)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/20 transition group" 
                    data-title="{{ $t['title'] }}" 
                    data-author="{{ $t['author'] }}" 
                    data-year="{{ $t['year'] }}" 
                    data-degree="{{ $t['degree'] }}" 
                    data-type="{{ $t['type'] }}"
                    data-uploader="{{ $t['uploader'] }}"
                    data-upload-date="{{ $t['uploadDate'] }}">
                    <td class="px-6 py-4">
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-{{ $t['color'] }}-50 dark:bg-{{ $t['color'] }}-900/20 
                                        text-{{ $t['color'] }}-600 flex items-center justify-center flex-shrink-0 mt-1">
                                <i data-lucide="file-text" class="w-4 h-4"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-800 dark:text-gray-200 line-clamp-1 group-hover:text-violet-600 transition">
                                    {{ $t['title'] }}
                                </p>
                                <div class="flex items-center gap-2 mt-0.5">
                                    <span class="text-[10px] font-bold px-2 py-0.5 rounded-md {{ $t['type'] == 'Thesis' ? 'bg-violet-50 text-violet-600 dark:bg-violet-900/20' : 'bg-sky-50 text-sky-600 dark:bg-sky-900/20' }}">
                                        {{ $t['type'] == 'Thesis' ? "Master's Thesis" : 'Doctoral Dissertation' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-xs font-medium text-gray-700 dark:text-gray-300">{{ $t['author'] }}</p>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $t['degree'] }}</p>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-xs text-gray-500 dark:text-gray-400 font-mono">{{ $t['year'] }}</p>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <i data-lucide="user-check" class="w-3 h-3 text-gray-400"></i>
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $t['uploader'] }}</p>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <i data-lucide="calendar-days" class="w-3 h-3 text-gray-400"></i>
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $t['uploadDate'] }}</p>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <button class="p-2 text-gray-400 hover:text-violet-600 hover:bg-violet-50 dark:hover:bg-violet-900/20 rounded-lg transition" title="Edit Record">
                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                            </button>
                            <button class="p-2 text-gray-400 hover:text-sky-600 hover:bg-sky-50 dark:hover:bg-sky-900/20 rounded-lg transition" title="View Full File">
                                <i data-lucide="external-link" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Footer/Pagination --}}
    <div class="px-6 py-4 bg-gray-50/50 dark:bg-gray-800/30 border-t border-gray-100 dark:border-gray-800 flex items-center justify-between">
        <p id="showingInfo" class="text-[11px] text-gray-500 dark:text-gray-400">Showing 1 to 8 of 8 entries</p>
        <div class="flex gap-1">
            <button id="prevPage" class="px-3 py-1 text-[11px] font-bold text-gray-500 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-md hover:bg-gray-50 transition">Prev</button>
            <button id="page1" class="page-btn px-3 py-1 text-[11px] font-bold text-white bg-violet-600 rounded-md">1</button>
            <button id="nextPage" class="px-3 py-1 text-[11px] font-bold text-gray-500 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-md hover:bg-gray-50 transition">Next</button>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Initialize Lucide icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    // Degree Program Chart
    const degreeCtx = document.getElementById('degreeChart');
    if (degreeCtx) {
        new Chart(degreeCtx, {
            type: 'bar',
            data: {
                labels: ['EdDELM', 'MAELM', 'MAEngEd', 'MASocStEd', 'MM', 'MPA'],
                datasets: [{
                    label: 'Uploaded Research',
                    data: [145, 98, 76, 54, 87, 112],
                    borderRadius: 10,
                    backgroundColor: ['#8B5CF6', '#6366F1', '#0EA5E9', '#14B8A6', '#F59E0B', '#EC4899']
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                plugins: {
                    legend: { display: false },
                    tooltip: { callbacks: { label: function(context) { return context.raw + ' uploads'; } } }
                },
                scales: {
                    y: {
                        ticks: { color: '#9CA3AF', stepSize: 50 },
                        grid: { color: 'rgba(156,163,175,0.1)' }
                    },
                    x: {
                        ticks: { color: '#9CA3AF', font: { size: 10 } },
                        grid: { display: false }
                    }
                }
            }
        });
    }

    // Filter functionality
    const searchInput = document.getElementById('searchInput');
    const degreeFilter = document.getElementById('degreeFilter');
    const typeFilter = document.getElementById('typeFilter');
    const resetBtn = document.getElementById('resetFilters');
    const tableRows = document.querySelectorAll('#tableBody tr');
    const showingInfo = document.getElementById('showingInfo');
    
    let currentPage = 1;
    const rowsPerPage = 5;
    let filteredRows = [];

    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase();
        const degreeValue = degreeFilter.value;
        const typeValue = typeFilter.value;

        filteredRows = Array.from(tableRows).filter(row => {
            const title = row.getAttribute('data-title').toLowerCase();
            const author = row.getAttribute('data-author').toLowerCase();
            const year = row.getAttribute('data-year');
            const degree = row.getAttribute('data-degree');
            const type = row.getAttribute('data-type');

            const matchesSearch = title.includes(searchTerm) || author.includes(searchTerm) || year.includes(searchTerm);
            const matchesDegree = degreeValue === 'all' || degree === degreeValue;
            const matchesType = typeValue === 'all' || type === typeValue;

            return matchesSearch && matchesDegree && matchesType;
        });

        currentPage = 1;
        displayPage();
    }

    function displayPage() {
        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        const pageRows = filteredRows.slice(start, end);

        tableRows.forEach(row => row.style.display = 'none');
        pageRows.forEach(row => row.style.display = '');

        const total = filteredRows.length;
        const startNum = total === 0 ? 0 : start + 1;
        const endNum = Math.min(end, total);
        
        showingInfo.textContent = total === 0 ? 'Showing 0 entries' : `Showing ${startNum} to ${endNum} of ${total} entries`;

        updatePaginationButtons(total);
    }

    function updatePaginationButtons(total) {
        const totalPages = Math.ceil(total / rowsPerPage);
        const prevBtn = document.getElementById('prevPage');
        const nextBtn = document.getElementById('nextPage');

        prevBtn.disabled = currentPage === 1;
        nextBtn.disabled = currentPage === totalPages || totalPages === 0;
        
        prevBtn.style.opacity = prevBtn.disabled ? '0.5' : '1';
        nextBtn.style.opacity = nextBtn.disabled ? '0.5' : '1';
    }

    // Event listeners
    if (searchInput) searchInput.addEventListener('input', filterTable);
    if (degreeFilter) degreeFilter.addEventListener('change', filterTable);
    if (typeFilter) typeFilter.addEventListener('change', filterTable);
    
    if (resetBtn) {
        resetBtn.addEventListener('click', () => {
            if (searchInput) searchInput.value = '';
            if (degreeFilter) degreeFilter.value = 'all';
            if (typeFilter) typeFilter.value = 'all';
            filterTable();
        });
    }

    document.getElementById('prevPage')?.addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            displayPage();
        }
    });

    document.getElementById('nextPage')?.addEventListener('click', () => {
        const totalPages = Math.ceil(filteredRows.length / rowsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            displayPage();
        }
    });

    // Initialize
    filterTable();
});
</script>
@endpush