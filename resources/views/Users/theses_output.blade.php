<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>BU Open University - Theses & Dissertations Repository</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'bu-blue': '#0B439B',
                        'bu-orange': '#F5A623',
                        'bu-light': '#D1E1F5',
                        'bu-light-blue': '#E6F0FF'
                    },
                    fontFamily: {
                        raleway: ['Raleway', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        body { font-family: 'Raleway', sans-serif; background-color: #F9FAFE; }
        .custom-select { appearance: none; -webkit-appearance: none; }
        .program-link { transition: all 0.2s ease; cursor: pointer; }
        .program-link:hover { transform: translateX(4px); }
        .result-card {
            transition: all 0.25s ease;
            cursor: pointer;
        }
        .result-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px -8px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="bg-[#F9FAFE] pb-12">

    <!-- Navigation -->
    <nav class="bg-bu-blue text-white px-6 md:px-8 py-3 flex justify-between items-center sticky top-0 z-50 shadow-lg">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md overflow-hidden">
                <img 
                    src="{{ asset('assets/Logo/OU LOGO.jpg') }}" 
                    alt="Bicol University Logo">
            </div>
            <div>
                <h1 class="font-black text-xs uppercase leading-tight tracking-wide">Bicol University</h1>
                <p class="text-[10px] font-medium opacity-90">Open University</p>
            </div>
        </div>
        
        <div class="flex items-center gap-4">
            <div class="time-widget bg-white rounded-full py-1 px-1 flex items-center shadow-md">
                <div class="bg-bu-orange text-white rounded-full px-3 py-0.5 flex flex-col leading-tight items-center justify-center">
                    <span class="font-bold text-[8px]" id="dayName">WED</span>
                    <span class="font-black text-[10px]" id="dateDisplay">APR 8</span>
                </div>
                <div class="flex items-baseline gap-1 px-3">
                    <span class="text-bu-orange font-black text-[15px]" id="liveTime">4:50</span>
                    <span class="text-bu-blue font-bold text-[10px]" id="ampmLabel">PM</span>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 md:px-8 py-10">
        
        <!-- Header with proper styling -->
        <div class="flex flex-wrap justify-between items-center mb-6 gap-4">
            <div class="flex items-center gap-3">
                <div class="w-2 h-10 bg-bu-orange rounded-full"></div>
                <h2 class="text-3xl md:text-[42px] font-extrabold text-bu-blue tracking-tight leading-tight">Browse Theses and Dissertations Collections:</h2>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-4 items-end mb-2">
            <div class="col-span-12 md:col-span-4">
                <label class="text-bu-orange text-xs font-bold mb-2 block uppercase tracking-wide">Search by Year Range</label>
                <div class="bg-bu-blue rounded-lg p-3 flex items-center gap-3">
                    <div class="relative flex-1">
                        <select id="yearFrom" class="custom-select w-full bg-white text-gray-700 rounded-md px-3 py-1.5 font-semibold text-sm outline-none focus:ring-2 focus:ring-bu-orange">
                            <option value="">All</option>
                            <option>2017</option>
                            <option>2018</option>
                            <option>2019</option>
                            <option>2020</option>
                            <option>2021</option>
                            <option>2022</option>
                            <option>2023</option>
                            <option>2024</option>
                            <option>2025</option>
                        </select>
                        <i class="fas fa-chevron-down absolute right-3 top-2.5 text-bu-orange text-xs pointer-events-none"></i>
                    </div>
                    <span class="text-white font-bold text-xs">To</span>
                    <div class="relative flex-1">
                        <select id="yearTo" class="custom-select w-full bg-white text-gray-700 rounded-md px-3 py-1.5 font-semibold text-sm outline-none focus:ring-2 focus:ring-bu-orange">
                            <option value="">All</option>
                            <option>2017</option>
                            <option>2018</option>
                            <option>2019</option>
                            <option>2020</option>
                            <option>2021</option>
                            <option>2022</option>
                            <option>2023</option>
                            <option>2024</option>
                            <option>2025</option>
                        </select>
                        <i class="fas fa-chevron-down absolute right-3 top-2.5 text-bu-orange text-xs pointer-events-none"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Results Info Bar - Fixed color and layout -->
        <div class="bg-bu-blue rounded-lg overflow-hidden shadow-md mb-8">
            <div class="bg-bu-light px-6 py-3 border-l-[8px] border-bu-orange italic text-bu-blue font-semibold">
                <i class="fas fa-graduation-cap mr-2"></i> Searching Graduate Student's Output
            </div>
            <div class="flex flex-wrap justify-between items-center px-6 py-3 gap-3">
                <p class="text-white text-xs font-semibold" id="resultStats">
                    Loading results...
                </p>
                <button class="bg-[#5078B3] px-4 py-1.5 text-white text-[12px] font-semibold flex items-center gap-2 hover:bg-opacity-80 transition">
                    <i class="fas fa-bookmark text-bu-orange"></i> My saved searches
                </button>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-8">
            <!-- Sidebar -->
            <aside class="col-span-12 lg:col-span-3 space-y-7">
                <!-- Search Box -->
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="bg-bu-blue px-5 py-3.5 text-white font-bold text-md flex items-center gap-2 tracking-wide">
                        <div class="w-1.5 h-5 bg-bu-orange rounded-full"></div> Search 
                    </div>
                    <div class="p-5">
                        <p class="text-[10px] text-gray-500 font-bold uppercase mb-2 tracking-wide">Enter search terms</p>
                        <div class="relative flex items-center">
                            <input type="text" id="searchInput" class="w-full border-2 border-bu-orange/60 rounded-full py-2 px-4 text-sm focus:border-bu-orange focus:ring-0 outline-none transition" placeholder="Title, author, or keywords...">
                            <button id="searchBtn" class="absolute right-1.5 bg-bu-orange text-white text-[12px] font-semibold px-3 py-1 rounded-full hover:bg-orange-600 transition">Search</button>
                        </div>
                        <a href="#" class="text-bu-orange text-[11px] font-bold mt-4 block uppercase italic hover:underline">Advanced search &rarr;</a>
                    </div>
                </div>

                <!-- Browse by Program - FIXED with full program names as requested -->
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
                    <div class="bg-bu-blue px-5 py-3.5 text-white font-bold text-md flex items-center gap-2 tracking-wide">
                        <div class="w-1.5 h-5 bg-bu-orange rounded-full"></div> Browse
                    </div>
                    <div class="p-5">
                        <ul class="space-y-3 text-[12px] font-semibold text-bu-blue/90" id="programList">
                            <li class="text-gray-400 text-center">Loading programs...</li>
                        </ul>
                    </div>
                </div>
            </aside>

            <div class="col-span-12 lg:col-span-9" id="resultsContainer">
                <div id="dynamicResultsArea">
                    <div class="text-center py-12 text-gray-500"><i class="fas fa-spinner fa-spin mr-2"></i> Loading results...</div>
                </div>
                <div class="flex justify-end gap-4 mt-10 pt-4" id="paginationControls" style="display: none;">
                    <button class="border-2 border-bu-orange text-bu-orange px-5 py-2 rounded-xl font-bold hover:bg-bu-orange hover:text-white transition duration-200" id="prevPageBtn"><i class="fas fa-chevron-left mr-1"></i> Previous</button>
                    <button class="border-2 border-bu-orange text-bu-orange px-5 py-2 rounded-xl font-bold hover:bg-bu-orange hover:text-white transition duration-200" id="nextPageBtn">Next <i class="fas fa-chevron-right ml-1"></i></button>
                </div>
            </div>  
        </div>
    </main>

<script>
        // Real-time clock functionality
        function updateClock() {
            const now = new Date();
            const days = ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'];
            const months = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
            const dayElem = document.getElementById('dayName');
            const dateElem = document.getElementById('dateDisplay');
            const timeElem = document.getElementById('liveTime');
            const ampmElem = document.getElementById('ampmLabel');
            
            if (dayElem) dayElem.textContent = days[now.getDay()];
            if (dateElem) dateElem.textContent = `${months[now.getMonth()]} ${now.getDate()}`;
            
            let hours = now.getHours();
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12 || 12;
            
            if (timeElem) timeElem.textContent = `${hours}:${minutes}`;
            if (ampmElem) ampmElem.textContent = ampm;
        }
        
        setInterval(updateClock, 1000);
        updateClock();

        // -------------------------------
        // BACKEND INTEGRATION (NO STYLES CHANGED)
        // -------------------------------
        let currentResults = [];
        let currentPage = 1;
        const resultsPerPage = 5;
        let currentQuery = '';
        let currentProgramCode = '';
        let currentYearFrom = '';
        let currentYearTo = '';

        function escapeHtml(str) {
            if (!str) return '';
            return str.replace(/[&<>]/g, function(m) {
                if (m === '&') return '&amp;';
                if (m === '<') return '&lt;';
                if (m === '>') return '&gt;';
                return m;
            });
        }

        function extractYear(dateStr) {
            if (!dateStr) return null;
            try {
                const year = new Date(dateStr).getFullYear();
                return isNaN(year) ? null : year;
            } catch(e) { return null; }
        }

        function filterByYearRange(items, fromYear, toYear) {
            if (!fromYear && !toYear) return items;
            return items.filter(item => {
                const year = extractYear(item.published_date || item.created_at);
                if (!year) return false;
                if (fromYear && year < parseInt(fromYear)) return false;
                if (toYear && year > parseInt(toYear)) return false;
                return true;
            });
        }

        // Function to navigate to research details page
        function viewResearchDetails(id) {
            window.location.href = `/view-theses?id=${id}`;
        }

        function renderResults() {
            const container = document.getElementById('dynamicResultsArea');
            const paginationDiv = document.getElementById('paginationControls');
            const resultStats = document.getElementById('resultStats');
            
            if (!currentResults.length) {
                if (container) container.innerHTML = `<div class="text-center py-12 text-gray-500">No theses or dissertations found matching your criteria.</div>`;
                if (paginationDiv) paginationDiv.style.display = 'none';
                if (resultStats) resultStats.innerHTML = `Showing <span class="text-bu-orange font-black">0</span> results.`;
                return;
            }
            
            const startIdx = (currentPage - 1) * resultsPerPage;
            const endIdx = startIdx + resultsPerPage;
            const paginatedItems = currentResults.slice(startIdx, endIdx);
            const totalPages = Math.ceil(currentResults.length / resultsPerPage);
            
            if (resultStats) resultStats.innerHTML = `Showing <span class="text-bu-orange font-black">${currentResults.length}</span> out of <span class="text-bu-orange font-black">${currentResults.length}</span> results.`;
            
            const groupedByYear = {};
            paginatedItems.forEach(item => {
                const year = extractYear(item.published_date || item.created_at) || 'Unknown';
                if (!groupedByYear[year]) groupedByYear[year] = [];
                groupedByYear[year].push(item);
            });
            
            const sortedYears = Object.keys(groupedByYear).sort((a,b) => {
                if (a === 'Unknown') return 1;
                if (b === 'Unknown') return -1;
                return parseInt(b) - parseInt(a);
            });
            
            let html = '';
            sortedYears.forEach(year => {
                html += `
                    <div class="flex items-center gap-4 mb-4 mt-6 first:mt-0">
                        <h3 class="text-[25px] text-gray-700 font-regular whitespace-nowrap">Theses/Dissertation from ${year}</h3>
                        <div class="flex-1 h-[2px] bg-bu-orange/60"></div>
                    </div>
                    <div class="space-y-2">
                `;
                groupedByYear[year].forEach(res => {
                    const levelLabel = (res.document_type === 'Dissertation' || res.level === 'doctorate') ? 'Dissertation' : 'Thesis';
                    const levelBadgeClass = (levelLabel === 'Dissertation') ? 'bg-[#D1E1F5] text-bu-blue' : 'bg-[#FDECC8] text-[#916400]';
                    const programName = res.program ? res.program.name : (res.degree || 'General');
                    const displayDate = res.published_date ? new Date(res.published_date).toLocaleDateString('en-US', { year: 'numeric', month: '2-digit', day: '2-digit' }) : 'Date unknown';
                    
                    html += `
                        <div class="relative bg-white border border-gray-300 rounded-[15px] p-4 pr-32 hover:shadow-sm transition-shadow result-card" onclick="viewResearchDetails(${res.id})">
                            <span class="inline-block ${levelBadgeClass} text-[11px] font-medium px-3 py-0.5 rounded-full mb-1">
                                ${levelLabel}
                            </span>
                            <h4 class="text-black font-regular text-[15px] leading-tight mb-2">
                                ${escapeHtml(res.title)}
                            </h4>
                            <p class="text-gray-600 text-[11px] flex items-center gap-1">
                                <span class="text-bu-blue text-lg leading-none">•</span> Author: ${escapeHtml(res.author)}
                            </p>
                            <p class="text-gray-500 text-[10px] mt-1 flex items-center gap-1">
                                <i class="fas fa-graduation-cap text-bu-orange text-[9px]"></i> ${escapeHtml(programName)}
                            </p>
                            <span class="absolute bottom-4 right-6 text-gray-600 italic text-[12px]">
                                Date: ${displayDate}
                            </span>
                        </div>
                    `;
                });
                html += `</div>`;
            });
            
            if (container) container.innerHTML = html;
            
            if (paginationDiv) {
                if (totalPages > 1) {
                    paginationDiv.style.display = 'flex';
                    const prevBtn = document.getElementById('prevPageBtn');
                    const nextBtn = document.getElementById('nextPageBtn');
                    if (prevBtn) {
                        prevBtn.disabled = (currentPage === 1);
                        prevBtn.style.opacity = (currentPage === 1) ? '0.5' : '1';
                        prevBtn.style.cursor = (currentPage === 1) ? 'not-allowed' : 'pointer';
                    }
                    if (nextBtn) {
                        nextBtn.disabled = (currentPage === totalPages);
                        nextBtn.style.opacity = (currentPage === totalPages) ? '0.5' : '1';
                        nextBtn.style.cursor = (currentPage === totalPages) ? 'not-allowed' : 'pointer';
                    }
                } else {
                    paginationDiv.style.display = 'none';
                }
            }
        }

        async function fetchAndDisplayResults() {
            const container = document.getElementById('dynamicResultsArea');
            if (container) {
                container.innerHTML = `<div class="text-center py-12 text-gray-500"><i class="fas fa-spinner fa-spin mr-2"></i> Loading results...</div>`;
            }
            
            try {
                let url = '';
                if (currentProgramCode) {
                    url = `/theses/program/${encodeURIComponent(currentProgramCode)}`;
                } else if (currentQuery.trim() !== '') {
                    url = `/theses/search?q=${encodeURIComponent(currentQuery)}`;
                } else {
                    url = `/theses/data`;
                }
                
                const response = await fetch(url);
                if (!response.ok) throw new Error('Network error');
                let data = await response.json();
                
                let filtered = filterByYearRange(data, currentYearFrom, currentYearTo);
                filtered.sort((a,b) => new Date(b.published_date || b.created_at) - new Date(a.published_date || a.created_at));
                currentResults = filtered;
                currentPage = 1;
                renderResults();
            } catch (error) {
                console.error('Error fetching results:', error);
                if (container) container.innerHTML = `<div class="text-center py-12 text-red-500">Failed to load results. Please check your connection.</div>`;
                const resultStats = document.getElementById('resultStats');
                if (resultStats) resultStats.innerHTML = `Showing <span class="text-bu-orange font-black">0</span> results.`;
            }
        }

        function applyFilters() {
            fetchAndDisplayResults();
        }

        async function loadPrograms() {
            try {
                const response = await fetch('/theses/data');
                const researches = await response.json();
                const programMap = new Map();
                researches.forEach(r => {
                    if (r.program && r.program.id && !programMap.has(r.program.id)) {
                        programMap.set(r.program.id, {
                            id: r.program.id,
                            name: r.program.name,
                            code: r.program.code
                        });
                    }
                });
                const programs = Array.from(programMap.values());
                const programListEl = document.getElementById('programList');
                if (programListEl) {
                    if (programs.length === 0) {
                        programListEl.innerHTML = `<li class="text-gray-500 text-center">No programs found</li>`;
                        return;
                    }
                    let html = '';
                    programs.forEach(prog => {
                        html += `
                            <li class="program-link flex items-start gap-2 hover:text-bu-orange transition-all">
                                <span class="text-bu-orange font-bold">▹</span> 
                                <a href="#" data-program-code="${prog.code}" class="program-browse-link leading-tight">${escapeHtml(prog.name)} (${prog.code})</a>
                            </li>
                        `;
                    });
                    programListEl.innerHTML = html;
                    
                    document.querySelectorAll('.program-browse-link').forEach(link => {
                        link.addEventListener('click', (e) => {
                            e.preventDefault();
                            const code = link.getAttribute('data-program-code');
                            currentProgramCode = code;
                            currentQuery = '';
                            document.getElementById('searchInput').value = '';
                            const newUrl = `/theses-output?program=${encodeURIComponent(code)}`;
                            window.history.pushState({}, '', newUrl);
                            applyFilters();
                        });
                    });
                }
            } catch(e) {
                console.warn('Could not load programs list');
                const programListEl = document.getElementById('programList');
                if (programListEl) {
                    programListEl.innerHTML = `<li class="text-gray-500 text-center">Error loading programs</li>`;
                }
            }
        }

        function resetToSearch(query) {
            currentProgramCode = '';
            currentQuery = query;
            applyFilters();
        }

        function loadFiltersFromURL() {
            const urlParams = new URLSearchParams(window.location.search);
            const searchQuery = urlParams.get('search');
            const programCode = urlParams.get('program');
            
            if (searchQuery) {
                currentQuery = searchQuery;
                currentProgramCode = '';
                const searchInput = document.getElementById('searchInput');
                if (searchInput) searchInput.value = searchQuery;
            } else if (programCode) {
                currentProgramCode = programCode;
                currentQuery = '';
            } else {
                currentQuery = '';
                currentProgramCode = '';
            }
            fetchAndDisplayResults();
        }

        // Event listeners
        const searchBtn = document.getElementById('searchBtn');
        const searchInput = document.getElementById('searchInput');
        
        if (searchBtn) {
            searchBtn.addEventListener('click', () => {
                const query = searchInput.value.trim();
                if (query === '') {
                    alert('Please enter search terms to explore theses & dissertations.');
                    return;
                }
                const newUrl = `/theses-output?search=${encodeURIComponent(query)}`;
                window.history.pushState({}, '', newUrl);
                resetToSearch(query);
            });
        }
        
        if (searchInput) {
            searchInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    searchBtn.click();
                }
            });
        }
        
        const yearFrom = document.getElementById('yearFrom');
        const yearTo = document.getElementById('yearTo');
        if (yearFrom) {
            yearFrom.addEventListener('change', () => {
                currentYearFrom = yearFrom.value;
                applyFilters();
            });
        }
        if (yearTo) {
            yearTo.addEventListener('change', () => {
                currentYearTo = yearTo.value;
                applyFilters();
            });
        }
        
        const prevBtn = document.getElementById('prevPageBtn');
        const nextBtn = document.getElementById('nextPageBtn');
        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                if (currentPage > 1) {
                    currentPage--;
                    renderResults();
                }
            });
        }
        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                const totalPages = Math.ceil(currentResults.length / resultsPerPage);
                if (currentPage < totalPages) {
                    currentPage++;
                    renderResults();
                }
            });
        }
        
        const savedBtn = document.querySelector('.bg-\\[\\#5078B3\\]');
        if (savedBtn) {
            savedBtn.addEventListener('click', () => {
                alert('Your saved searches would appear here.');
            });
        }
        
        const advancedLink = document.querySelector('.text-bu-orange.text-\\[11px\\].font-bold.mt-4.block.uppercase.italic');
        if (advancedLink) {
            advancedLink.addEventListener('click', (e) => {
                e.preventDefault();
                alert('Advanced search filters (author, program, year) can be implemented as needed.');
            });
        }
        
        loadPrograms();
        loadFiltersFromURL();
    </script>
</body>
</html>