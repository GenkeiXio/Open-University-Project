<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>BU Open University - Theses & Dissertation</title>
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
            background-image: url('assets/OU-Header-1.png');
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
                <img src="https://upload.wikimedia.org/wikipedia/en/thumb/9/9a/Bicol_University.png/220px-Bicol_University.png" alt="BU Logo" class="w-8 h-8 object-contain">
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
                    <ul class="space-y-3 text-[12px] font-semibold text-bu-blue/90">
                        <li class="program-link flex items-start gap-2 hover:text-bu-orange transition-all cursor-pointer">
                            <span class="text-bu-orange font-bold">▹</span> 
                            <a href="#" class="leading-tight">Doctor of Education in Educational Leadership & Management (EdDELM)</a>
                        </li>
                        <li class="program-link flex items-start gap-2 hover:text-bu-orange transition-all cursor-pointer">
                            <span class="text-bu-orange font-bold">▹</span> 
                            <a href="#" class="leading-tight">Master of Arts in Educational Leadership & Management (MAELM)</a>
                        </li>
                        <li class="program-link flex items-start gap-2 hover:text-bu-orange transition-all cursor-pointer">
                            <span class="text-bu-orange font-bold">▹</span> 
                            <a href="#" class="leading-tight">Master of Arts in English Education (MAEngEd)</a>
                        </li>
                        <li class="program-link flex items-start gap-2 hover:text-bu-orange transition-all cursor-pointer">
                            <span class="text-bu-orange font-bold">▹</span> 
                            <a href="#" class="leading-tight">Master of Arts in Social Studies Education (MASocStEd)</a>
                        </li>
                        <li class="program-link flex items-start gap-2 hover:text-bu-orange transition-all cursor-pointer">
                            <span class="text-bu-orange font-bold">▹</span> 
                            <a href="#" class="leading-tight">Master in Local Government Management (MLGM)</a>
                        </li>
                        <li class="program-link flex items-start gap-2 hover:text-bu-orange transition-all cursor-pointer">
                            <span class="text-bu-orange font-bold">▹</span> 
                            <a href="#" class="leading-tight">Master in Management (MM)</a>
                        </li>
                        <li class="program-link flex items-start gap-2 hover:text-bu-orange transition-all cursor-pointer">
                            <span class="text-bu-orange font-bold">▹</span> 
                            <a href="#" class="leading-tight">Master of Public Administration (MPA)</a>
                        </li>
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
                            <div class="absolute inset-0 flex items-end justify-around px-2 gap-1">
                                <div class="w-9 bg-[#aecbf2] rounded-t-md hover:bg-bu-orange transition-colors duration-300 cursor-pointer" style="height: 28%;" title="EdDELM"></div>
                                <div class="w-9 bg-[#aecbf2] rounded-t-md hover:bg-bu-orange transition-colors duration-300 cursor-pointer" style="height: 58%;" title="MAELM"></div>
                                <div class="w-9 bg-[#aecbf2] rounded-t-md hover:bg-bu-orange transition-colors duration-300 cursor-pointer" style="height: 44%;" title="MAEngEd"></div>
                                <div class="w-9 bg-[#aecbf2] rounded-t-md hover:bg-bu-orange transition-colors duration-300 cursor-pointer" style="height: 32%;" title="MASocStEd"></div>
                                <div class="w-9 bg-[#aecbf2] rounded-t-md hover:bg-bu-orange transition-colors duration-300 cursor-pointer" style="height: 68%;" title="MPA"></div>
                                <div class="w-9 bg-[#aecbf2] rounded-t-md hover:bg-bu-orange transition-colors duration-300 cursor-pointer" style="height: 48%;" title="MM"></div>
                                <div class="w-9 bg-[#aecbf2] rounded-t-md hover:bg-bu-orange transition-colors duration-300 cursor-pointer" style="height: 27%;" title="MLGM"></div>
                            </div>
                        </div>
                        <div class="flex justify-between w-full mt-3 text-[11px] font-bold text-bu-blue uppercase px-1">
                            <span>EdDELM</span><span>MAELM</span><span>MAEngEd</span><span>MASocSt</span><span>MPA</span><span>MM</span><span>MLGM</span>
                        </div>
                    </div>
                </div>
    
                <!-- THESIS INSIGHTS with POPPINS font for numbers -->
                <div class="lg:col-span-4 bg-white p-6 rounded-2xl shadow-md border border-gray-100 space-y-4">
                    <h3 class="text-center font-black text-[#0B439B] text-lg mb-5 tracking-wider">Thesis Insights</h3>
                    
                    <div class="flex items-center justify-between bg-[#D1E1F5]/30 p-4 rounded-xl border-l-4 border-[#0B439B] shadow-sm transition-transform hover:scale-[1.02]">
                        <span class="text-[14px] font-bold text-[#0B439B]">Total Research</span>
                        <span class="insight-number bg-[#0B439B] text-white px-4 py-1.5 rounded-full shadow-md">32</span>
                    </div>
                    <div class="flex items-center justify-between bg-[#D1E1F5]/30 p-4 rounded-xl border-l-4 border-[#0B439B] shadow-sm transition-transform hover:scale-[1.02]">
                        <span class="text-[14px] font-bold text-[#0B439B]">Master's Theses</span>
                        <span class="insight-number bg-[#0B439B] text-white px-4 py-1.5 rounded-full shadow-md">21</span>
                    </div>
                    <div class="flex items-center justify-between bg-[#D1E1F5]/30 p-4 rounded-xl border-l-4 border-[#0B439B] shadow-sm transition-transform hover:scale-[1.02]">
                        <span class="text-[14px] font-bold text-[#0B439B]">Dissertations</span>
                        <span class="insight-number bg-[#0B439B] text-white px-4 py-1.5 rounded-full shadow-md">11</span>
                    </div>
                </div>
            </div>

            <section class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
                <div class="bg-bu-blue px-7 py-4 text-white font-bold flex justify-between items-center">
                    <span class="text-m">Recent Research Updates</span>
                    <a href="#" class="text-[10px] bg-white/10 px-3 py-1.5 rounded-full hover:bg-white/20 transition">View all</a>
                </div>
                <div class="p-6 space-y-4">
                    <div class="group border border-bu-light/60 rounded-2xl p-5 hover:border-bu-orange hover:-translate-y-1 transition-all duration-300">
                        <div class="flex justify-between items-start mb-2">
                            <h4 class="text-bu-blue font-semibold text-base leading-tight">Screening of Potential Microbes for the Production of Crude Pili Pulp</h4>
                            <span class="bg-emerald-600 text-white text-[8px] px-2 py-1 rounded-full font-black uppercase">Completed</span>
                        </div>
                        <p class="text-xs font-regular text-black">Author: Dr. Maria K. Manzanilla</p>
                        <div class="flex flex-wrap gap-2 mt-2">
                            <span class="text-[9px] bg-gray-100 text-gray-600 px-2 py-0.5 rounded-full">Master of Public Administration</span>
                        </div>
                    </div>
                    <div class="group border border-bu-light/60 rounded-2xl p-5 hover:border-bu-orange hover:-translate-y-1 transition-all duration-300">
                        <div class="flex justify-between items-start mb-2">
                            <h4 class="text-bu-blue font-semibold text-base leading-tight">Transformational Leadership and Its Impact on Organizational Culture in Higher Education</h4>
                            <span class="bg-emerald-600 text-white text-[8px] px-2 py-1 rounded-full font-black uppercase">Completed</span>
                        </div>
                        <p class="text-xs font-regular text-black">Author: Dr. Jonathan P. Mercado</p>
                        <div class="flex flex-wrap gap-2 mt-2">
                            <span class="text-[9px] bg-gray-100 text-gray-600 px-2 py-0.5 rounded-full">Doctor of Education (EdDELM)</span>
                        </div>
                    </div>
                    <div class="group border border-bu-light/60 rounded-2xl p-5 hover:border-bu-orange hover:-translate-y-1 transition-all duration-300">
                        <div class="flex justify-between items-start mb-2">
                            <h4 class="text-bu-blue font-semibold text-base leading-tight">Local Governance and Community Participation: A Study of Municipal Development Planning</h4>
                            <span class="bg-emerald-600 text-white text-[8px] px-2 py-1 rounded-full font-black uppercase">Completed</span>
                        </div>
                        <p class="text-xs font-regular text-black">Author: Prof. Luzviminda R. Castillo</p>
                        <div class="flex flex-wrap gap-2 mt-2">
                            <span class="text-[9px] bg-gray-100 text-gray-600 px-2 py-0.5 rounded-full">Master in Local Government Management</span>
                        </div>
                    </div>
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

        // Simple interactive search with alert
        const searchBtn = document.getElementById('searchBtn');
        const searchInput = document.getElementById('searchInput');
        if (searchBtn && searchInput) {
            searchBtn.addEventListener('click', () => {
                const query = searchInput.value.trim();
                if (query === "") {
                    alert("Please enter search terms to explore theses & dissertations.");
                } else {
                    alert(`Searching repository for: "${query}"\n(Full-text search integration would be available in the backend.)`);
                }
            });
            searchInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    searchBtn.click();
                }
            });
        }

        // Program links browsing feedback
        const programLinks = document.querySelectorAll('.program-link a');
        programLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const programText = link.innerText;
                alert(`Browsing "${programText}"\nShowing all theses & dissertations related to this program.`);
            });
        });

        // Chart bars hover effect to show program name via title
        const chartBars = document.querySelectorAll('.bg-bu-blue.rounded-t-md');
        const programLabels = ['EdDELM', 'MAELM', 'MAEngEd', 'MASocStEd', 'MPA', 'MM', 'MLGM'];
        chartBars.forEach((bar, idx) => {
            if (programLabels[idx]) {
                bar.setAttribute('title', `${programLabels[idx]} - research output`);
            }
        });

    </script>
</body>
</html>