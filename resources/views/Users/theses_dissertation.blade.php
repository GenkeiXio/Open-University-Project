{{-- FILE: resources/views/Users/theses_dissertation.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>BU Open University - Theses & Dissertation</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'bu-blue': '#0B439B',
                        'bu-orange': '#F5A623',
                        'bu-light': '#D1E1F5',
                    },
                    fontFamily: {
                        raleway: ['Raleway', 'sans-serif'],
                        poppins: ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        .program-link {
            transition: all 0.2s ease;
        }
        .program-link:hover {
            transform: translateX(4px);
        }
        
        .bg-ou-header {
            background-image: url('{{ asset("assets/OU-Header-1.png") }}');
            background-size: cover;
            background-position: center;
        }
        
        .chart-container {
            position: relative;
        }

        /* Thesis Insights numbers - Poppins font */
        .insight-number {
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            font-size: 14px;
            letter-spacing: 0.5px;
        }
    </style>
</head>
<body class="font-raleway bg-[#F9FAFE] pb-12">

    <!-- Navigation Bar -->
    <nav class="bg-[#063e92] text-white px-6 md:px-8 py-3 flex justify-between items-center sticky top-0 z-50 shadow-md">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md overflow-hidden">
                <img 
                    src="{{ asset('assets/Logo/OU LOGO.jpg') }}" 
                    alt="Bicol University Logo">
            </div>
            <div>
                <h1 class="font-black text-xs uppercase leading-tight tracking-wide">Bicol University</h1>
                <p class="text-[9px] font-medium opacity-90">Open University</p>
            </div>
        </div>
        
        <div class="flex items-center gap-4">
            <div class="bg-white rounded-full py-1 px-1 flex items-center shadow-lg">
                <div class="bg-bu-orange text-white rounded-full px-3 py-0.5 flex flex-col leading-tight items-center justify-center">
                    <span class="font-bold text-[8px]" id="dayName">WED</span>
                    <span class="font-black text-[10px]" id="dateDisplay">APR 8</span>
                </div>
                <div class="flex items-baseline gap-1 px-3">
                    <span class="text-bu-orange font-black text-[15px]" id="liveTime">4:50</span>
                    <span class="text-[#07357E] font-bold text-[10px]" id="ampmLabel">PM</span>
                </div>
            </div>
        </div>
    </nav>

    <div class="relative bg-bu-blue text-white overflow-hidden">
        <div class="absolute inset-0 z-0 bg-cover bg-center bg-ou-header"></div>
        <div class="absolute inset-0 z-0 bg-black/30"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 py-12 md:py-16 flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center space-x-5 ml-8 md:space-x-7">
                <div>
                    <p class="text-sm md:text-base font-bold uppercase tracking-wider bg-black/20 inline-block px-3 py-1 rounded-full backdrop-blur-sm mb-2">Bicol University Open University</p>
                    <h1 class="text-4xl md:text-6xl font-black tracking-tight leading-tight drop-shadow-md">Theses & Dissertations</h1>
                    <p class="text-sm font-medium mt-2 opacity-90 max-w-md">Preserving excellence · Open access scholarly works</p>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <main class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-12 gap-8 relative z-10">
        
        <!-- SIDEBAR -->
        <aside class="col-span-12 lg:col-span-3 space-y-7">
            <!-- Search Box -->
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow">
                <div class="bg-bu-blue px-5 py-3.5 text-white font-bold text-m flex items-center gap-2 tracking-wide">
                    <div class="w-1.5 h-5 bg-bu-orange rounded-full"></div> Search
                </div>
                <div class="p-5">
                    <p class="text-[10px] text-gray-500 font-bold uppercase mb-2 tracking-wide">Enter search terms</p>
                    <div class="relative flex items-center">
                        <input type="text" id="searchInput" class="w-full border-2 border-bu-orange/60 rounded-full py-2 px-4 text-sm focus:border-bu-orange focus:ring-0 outline-none transition">
                        <button id="searchBtn" class="absolute right-1.5 bg-bu-orange text-white text-[11px] font-semibold px-3 py-1 rounded-full hover:bg-orange-600 transition">Search</button>
                    </div>
                    <a href="#" class="text-bu-orange text-[11px] font-bold mt-4 block uppercase italic">Advanced search &rarr;</a>
                </div>
            </div>

            <!-- Browse by Program -->
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
                <div class="bg-bu-blue px-5 py-3.5 text-white font-bold text-m flex items-center gap-2 tracking-wide">
                    <div class="w-1.5 h-5 bg-bu-orange rounded-full"></div> Browse
                </div>
                <div class="p-5">
                    <ul class="space-y-3 text-[12px] font-semibold text-bu-blue/90" id="programList">
                        <!-- Programs will be dynamically loaded here -->
                    </ul>
                </div>
            </div>
        </aside>

        <!-- CHART & LIST -->
        <div class="col-span-12 lg:col-span-9 space-y-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-7">
                <!-- Unified One-Color Chart - FIXED ALIGNMENT -->
                <div class="lg:col-span-8 bg-white p-4 rounded-2xl shadow-md border border-gray-100">
                    <h3 class="font-black text-bu-blue text-lg text-center mb-4 tracking-wide">Research per Program</h3>
                    <div class="flex flex-col items-center">
                        <div class="w-full h-48 border-l-2 border-b-2 border-gray-300 relative bg-[linear-gradient(to_right,#E2E8F0_1px,transparent_1px),linear-gradient(to_bottom,#E2E8F0_1px,transparent_1px)] bg-[size:20%_20%]">
                            <div class="absolute inset-0 flex items-end justify-around px-2 gap-1" id="chartBarsContainer">
                                <!-- Bars will be dynamically loaded here -->
                            </div>
                        </div>
                        <div class="flex justify-between w-full mt-3 text-[11px] font-bold text-bu-blue uppercase px-1" id="chartLabels">
                            <!-- Labels will be dynamically loaded here -->
                        </div>
                    </div>
                </div>
    
                <!-- THESIS INSIGHTS with POPPINS font for numbers -->
                <div class="lg:col-span-4 bg-white p-6 rounded-2xl shadow-md border border-gray-100 space-y-4">
                    <h3 class="text-center font-black text-[#0B439B] text-lg mb-5 tracking-wider">Thesis Insights</h3>
                    
                    <div class="flex items-center justify-between bg-[#D1E1F5]/30 p-4 rounded-xl border-l-4 border-[#0B439B] shadow-sm transition-transform hover:scale-[1.02]">
                        <span class="text-[14px] font-bold text-[#0B439B]">Total Research</span>
                        <span class="insight-number bg-[#0B439B] text-white px-4 py-1.5 rounded-full shadow-md" id="totalResearch">0</span>
                    </div>
                    <div class="flex items-center justify-between bg-[#D1E1F5]/30 p-4 rounded-xl border-l-4 border-[#0B439B] shadow-sm transition-transform hover:scale-[1.02]">
                        <span class="text-[14px] font-bold text-[#0B439B]">Master's Theses</span>
                        <span class="insight-number bg-[#0B439B] text-white px-4 py-1.5 rounded-full shadow-md" id="mastersCount">0</span>
                    </div>
                    <div class="flex items-center justify-between bg-[#D1E1F5]/30 p-4 rounded-xl border-l-4 border-[#0B439B] shadow-sm transition-transform hover:scale-[1.02]">
                        <span class="text-[14px] font-bold text-[#0B439B]">Dissertations</span>
                        <span class="insight-number bg-[#0B439B] text-white px-4 py-1.5 rounded-full shadow-md" id="doctorateCount">0</span>
                    </div>
                </div>
            </div>

            <section class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
                <div class="bg-bu-blue px-7 py-4 text-white font-bold flex justify-between items-center">
                    <span class="text-m">Recent Research Updates</span>
                    <a href="#" class="text-[10px] bg-white/10 px-3 py-1.5 rounded-full hover:bg-white/20 transition">View all</a>
                </div>
                <div class="p-6 space-y-4" id="researchList">
                    <!-- Research items will be dynamically loaded here -->
                </div>
            </section>
        </div>
    </main>

<script>
    // Lucide icons initializer
    if (typeof lucide !== 'undefined' && lucide.createIcons) {
        lucide.createIcons();
    }
    
    // Real-time clock update
    function updateClock() {
        const now = new Date();
        const days = ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'];
        const months = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
        const dayNameElem = document.getElementById('dayName');
        const dateDisplayElem = document.getElementById('dateDisplay');
        const liveTimeElem = document.getElementById('liveTime');
        const ampmElem = document.getElementById('ampmLabel');
        if (dayNameElem) dayNameElem.textContent = days[now.getDay()];
        if (dateDisplayElem) dateDisplayElem.textContent = `${months[now.getMonth()]} ${now.getDate()}`;
        let h = now.getHours();
        const m = now.getMinutes().toString().padStart(2, '0');
        const ampm = h >= 12 ? 'PM' : 'AM';
        h = h % 12 || 12;
        if (liveTimeElem) liveTimeElem.textContent = `${h}:${m}`;
        if (ampmElem) ampmElem.textContent = ampm;
    }
    setInterval(updateClock, 1000);
    updateClock();

    // ==================== RECENT SEARCHES ====================
    
    // Save search to localStorage
    function saveSearchToHistory(query) {
        if (!query || query.trim() === '') return;
        
        let searchHistory = JSON.parse(localStorage.getItem('thesis_search_history') || '[]');
        
        // Remove duplicate
        searchHistory = searchHistory.filter(item => item.query.toLowerCase() !== query.toLowerCase());
        
        // Add new search at the beginning
        searchHistory.unshift({
            query: query,
            timestamp: new Date().toISOString()
        });
        
        // Keep only last 5
        searchHistory = searchHistory.slice(0, 5);
        
        localStorage.setItem('thesis_search_history', JSON.stringify(searchHistory));
        displayRecentSearches();
    }
    
    // Display recent searches
    function displayRecentSearches() {
        const searchHistory = JSON.parse(localStorage.getItem('thesis_search_history') || '[]');
        const recentSearchesContainer = document.getElementById('recentSearchesList');
        
        if (!recentSearchesContainer) return;
        
        if (searchHistory.length === 0) {
            recentSearchesContainer.innerHTML = '<li class="text-gray-400 text-xs italic text-center py-2">No recent searches</li>';
            return;
        }
        
        recentSearchesContainer.innerHTML = searchHistory.map(item => `
            <li class="recent-search-item flex items-center justify-between hover:bg-gray-50 p-2 rounded-lg cursor-pointer transition group">
                <div class="flex items-center gap-2 flex-1">
                    <i class="fas fa-search text-bu-orange text-[10px]"></i>
                    <span class="text-sm font-medium text-gray-700 truncate max-w-[150px]">${escapeHtml(item.query)}</span>
                </div>
                <span class="text-[9px] text-gray-400">${formatRelativeTime(item.timestamp)}</span>
                <button class="text-[10px] text-red-400 hover:text-red-600 ml-2 delete-search" data-query="${escapeHtml(item.query)}">
                    <i class="fas fa-times-circle"></i>
                </button>
            </li>
        `).join('');
        
        // Click to search again
        document.querySelectorAll('.recent-search-item').forEach(item => {
            item.addEventListener('click', (e) => {
                if (e.target.closest('.delete-search')) return;
                const querySpan = item.querySelector('span');
                const query = querySpan?.innerText;
                if (query) {
                    window.location.href = `/theses-output?search=${encodeURIComponent(query)}`;
                }
            });
        });
        
        // Delete individual search
        document.querySelectorAll('.delete-search').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const query = btn.getAttribute('data-query');
                let searchHistory = JSON.parse(localStorage.getItem('thesis_search_history') || '[]');
                searchHistory = searchHistory.filter(item => item.query !== query);
                localStorage.setItem('thesis_search_history', JSON.stringify(searchHistory));
                displayRecentSearches();
            });
        });
    }
    
    // Format relative time
    function formatRelativeTime(timestamp) {
        const now = new Date();
        const past = new Date(timestamp);
        const diffMins = Math.floor((now - past) / 60000);
        
        if (diffMins < 1) return 'Just now';
        if (diffMins < 60) return `${diffMins} min ago`;
        if (diffMins < 1440) return `${Math.floor(diffMins / 60)} hour${Math.floor(diffMins / 60) > 1 ? 's' : ''} ago`;
        return past.toLocaleDateString();
    }
    
    // Clear all history
    function clearAllSearchHistory() {
        if (confirm('Clear all search history?')) {
            localStorage.removeItem('thesis_search_history');
            displayRecentSearches();
        }
    }
    
    // Add Recent Searches section to sidebar
    function addRecentSearchesSection() {
        const sidebar = document.querySelector('aside .space-y-7');
        if (sidebar && !document.getElementById('recentSearchesSection')) {
            const recentSectionHTML = `
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden" id="recentSearchesSection">
                    <div class="bg-bu-blue px-5 py-3.5 text-white font-bold text-m flex items-center gap-2 tracking-wide">
                        <div class="w-1.5 h-5 bg-bu-orange rounded-full"></div> 
                        <i class="fas fa-history text-sm"></i> Recent Searches
                    </div>
                    <div class="p-4">
                        <ul class="space-y-2" id="recentSearchesList">
                            <li class="text-gray-400 text-xs italic text-center py-2">Loading...</li>
                        </ul>
                        <button id="clearSearchHistoryBtn" class="text-[10px] text-red-500 hover:text-red-700 mt-3 block w-full text-center transition">
                            <i class="fas fa-trash-alt mr-1"></i> Clear history
                        </button>
                    </div>
                </div>
            `;
            sidebar.insertAdjacentHTML('afterbegin', recentSectionHTML);
            document.getElementById('clearSearchHistoryBtn')?.addEventListener('click', clearAllSearchHistory);
            displayRecentSearches();
        }
    }

    // ==================== END RECENT SEARCHES ====================

    // Fetch and display all data on page load
    async function loadAllData() {
        await loadInsights();
        await loadProgramsAndResearch();
        addRecentSearchesSection();
    }

    // Fetch insights data
    async function loadInsights() {
        try {
            const response = await fetch('/theses/insights');
            const data = await response.json();
            document.getElementById('totalResearch').textContent = data.total || 0;
            document.getElementById('mastersCount').textContent = data.masters || 0;
            document.getElementById('doctorateCount').textContent = data.doctorate || 0;
        } catch (error) {
            console.error('Error loading insights:', error);
        }
    }

    // Fetch programs and research data
    async function loadProgramsAndResearch() {
        try {
            const response = await fetch('/theses/data');
            const researches = await response.json();
            
            // Group researches by program
            const programMap = new Map();
            researches.forEach(research => {
                if (research.program) {
                    const programId = research.program.id;
                    if (!programMap.has(programId)) {
                        programMap.set(programId, {
                            id: programId,
                            name: research.program.name,
                            code: research.program.code,
                            count: 0
                        });
                    }
                    programMap.get(programId).count++;
                }
            });
            
            const programs = Array.from(programMap.values());
            const maxCount = Math.max(...programs.map(p => p.count), 1);
            
            // Render program list in sidebar
            const programListEl = document.getElementById('programList');
            if (programListEl) {
                programListEl.innerHTML = programs.map(program => `
                    <li class="program-link flex items-start gap-2 hover:text-bu-orange transition-all cursor-pointer">
                        <span class="text-bu-orange font-bold">▹</span> 
                        <a href="#" data-program-code="${program.code}" class="program-browse-link leading-tight">${escapeHtml(program.name)}</a>
                    </li>
                `).join('');
                
                document.querySelectorAll('.program-browse-link').forEach(link => {
                    link.addEventListener('click', (e) => {
                        e.preventDefault();
                        const programCode = link.getAttribute('data-program-code');
                        window.location.href = `/theses-output?program=${encodeURIComponent(programCode)}`;
                    });
                });
            }
            
            // Render chart bars
            const chartBarsContainer = document.getElementById('chartBarsContainer');
            const chartLabelsContainer = document.getElementById('chartLabels');
            if (chartBarsContainer && chartLabelsContainer) {
                chartBarsContainer.innerHTML = '';
                chartLabelsContainer.innerHTML = '';
                
                programs.forEach(program => {
                    const heightPercent = (program.count / maxCount) * 100;
                    const bar = document.createElement('div');
                    bar.className = 'w-9 bg-[#aecbf2] rounded-t-md hover:bg-bu-orange transition-colors duration-300 cursor-pointer';
                    bar.style.height = `${Math.max(heightPercent, 5)}%`;
                    bar.title = `${program.name}: ${program.count} research output(s)`;
                    
                    bar.addEventListener('click', () => {
                        window.location.href = `/theses-output?program=${encodeURIComponent(program.code)}`;
                    });
                    
                    chartBarsContainer.appendChild(bar);
                    
                    const label = document.createElement('span');
                    label.textContent = program.code || program.name.substring(0, 6);
                    chartLabelsContainer.appendChild(label);
                });
            }
            
            // Render recent research list (latest 3)
            const researchListEl = document.getElementById('researchList');
            if (researchListEl) {
                const recentResearches = researches.slice(0, 3);
                researchListEl.innerHTML = recentResearches.map(research => `
                    <div class="group border border-bu-light/60 rounded-2xl p-5 hover:border-bu-orange hover:-translate-y-1 transition-all duration-300 cursor-pointer" onclick="viewResearchDetail(${research.id})">
                        <div class="flex justify-between items-start mb-2">
                            <h4 class="text-bu-blue font-semibold text-base leading-tight">${escapeHtml(research.title)}</h4>
                            <span class="bg-emerald-600 text-white text-[8px] px-2 py-1 rounded-full font-black uppercase">Completed</span>
                        </div>
                        <p class="text-xs font-regular text-black">Author: ${escapeHtml(research.author)}</p>
                        <div class="flex flex-wrap gap-2 mt-2">
                            <span class="text-[9px] bg-gray-100 text-gray-600 px-2 py-0.5 rounded-full">${escapeHtml(research.program?.name || 'N/A')}</span>
                        </div>
                    </div>
                `).join('');
            }
            
        } catch (error) {
            console.error('Error loading research data:', error);
        }
    }

    // Search functionality - SAVE TO HISTORY then REDIRECT
    function performSearch() {
        const searchInput = document.getElementById('searchInput');
        const query = searchInput.value.trim();
        
        if (query === "") {
            alert("Please enter search terms to explore theses & dissertations.");
            return;
        }
        
        // Save to search history
        saveSearchToHistory(query);
        
        // Redirect to theses-output page
        window.location.href = `/theses-output?search=${encodeURIComponent(query)}`;
    }

    // View research detail
    function viewResearchDetail(id) {
        window.location.href = `/view-theses?id=${id}`;
    }

    // Helper function
    function escapeHtml(text) {
        if (!text) return '';
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    // Event listeners
    const searchBtn = document.getElementById('searchBtn');
    const searchInput = document.getElementById('searchInput');
    
    if (searchBtn) {
        searchBtn.addEventListener('click', performSearch);
    }
    
    if (searchInput) {
        searchInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                performSearch();
            }
        });
    }

    // Load all data
    loadAllData();
</script>
</body>
</html>