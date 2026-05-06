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
                <img src="https://upload.wikimedia.org/wikipedia/en/thumb/9/9a/Bicol_University.png/220px-Bicol_University.png" alt="BU Logo" class="w-8 h-8 object-contain">
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
                        <select class="custom-select w-full bg-white text-gray-700 rounded-md px-3 py-1.5 font-semibold text-sm outline-none focus:ring-2 focus:ring-bu-orange">
                            <option>2017</option>
                            <option>2018</option>
                            <option>2019</option>
                            <option>2020</option>
                        </select>
                        <i class="fas fa-chevron-down absolute right-3 top-2.5 text-bu-orange text-xs pointer-events-none"></i>
                    </div>
                    <span class="text-white font-bold text-xs">To</span>
                    <div class="relative flex-1">
                        <select class="custom-select w-full bg-white text-gray-700 rounded-md px-3 py-1.5 font-semibold text-sm outline-none focus:ring-2 focus:ring-bu-orange">
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
                <p class="text-white text-xs font-semibold">
                    Showing <span class="text-bu-orange font-black">10</span> out of <span class="text-bu-orange font-black">532</span> results.
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
                            <input type="text" id="searchInput" class="w-full border-2 border-bu-orange/60 rounded-full py-2 px-4 text-sm focus:border-bu-orange focus:ring-0 outline-none transition">
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
                        <ul class="space-y-3 text-[12px] font-semibold text-bu-blue/90">
                            <li class="program-link flex items-start gap-2 hover:text-bu-orange transition-all">
                                <span class="text-bu-orange font-bold">▹</span> 
                                <a href="#" class="leading-tight">Doctor of Education in Educational Leadership & Management (EdDELM)</a>
                            </li>
                            <li class="program-link flex items-start gap-2 hover:text-bu-orange transition-all">
                                <span class="text-bu-orange font-bold">▹</span> 
                                <a href="#" class="leading-tight">Master of Arts in Educational Leadership & Management (MAELM)</a>
                            </li>
                            <li class="program-link flex items-start gap-2 hover:text-bu-orange transition-all">
                                <span class="text-bu-orange font-bold">▹</span> 
                                <a href="#" class="leading-tight">Master of Arts in English Education (MAEngEd)</a>
                            </li>
                            <li class="program-link flex items-start gap-2 hover:text-bu-orange transition-all">
                                <span class="text-bu-orange font-bold">▹</span> 
                                <a href="#" class="leading-tight">Master of Arts in Social Studies Education (MASocStEd)</a>
                            </li>
                            <li class="program-link flex items-start gap-2 hover:text-bu-orange transition-all">
                                <span class="text-bu-orange font-bold">▹</span> 
                                <a href="#" class="leading-tight">Master in Local Government Management (MLGM)</a>
                            </li>
                            <li class="program-link flex items-start gap-2 hover:text-bu-orange transition-all">
                                <span class="text-bu-orange font-bold">▹</span> 
                                <a href="#" class="leading-tight">Master in Management (MM)</a>
                            </li>
                            <li class="program-link flex items-start gap-2 hover:text-bu-orange transition-all">
                                <span class="text-bu-orange font-bold">▹</span> 
                                <a href="#" class="leading-tight">Master of Public Administration (MPA)</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>

        <div class="col-span-12 lg:col-span-9">
    <!-- Header with Orange Line -->
        <div class="flex items-center gap-4 mb-4">
        <h3 class="text-[25px] text-gray-700 font-regular whitespace-nowrap">Theses/Dissertation from 2020</h3>
        <div class="flex-1 h-[2px] bg-bu-orange/60"></div>
     </div>

    <div class="space-y-2">
        <div class="relative bg-white border border-gray-300 rounded-[15px] p-4 pr-32 hover:shadow-sm transition-shadow">
            <span class="inline-block bg-[#D1E1F5] text-bu-blue text-[11px] font-medium px-3 py-0.5 rounded-full mb-1">
                Dissertation
            </span>
            <h4 class="text-black font-regular text-[15px] leading-tight mb-2">
                Screening of Potential Microbes for the Production of Crude Pili Pulpnb dnbdbnsbs hgasfc gwgajw hjsa dg hdshjdhgd
            </h4>
            <p class="text-gray-600 text-[11px] flex items-center gap-1">
                <span class="text-bu-blue text-lg leading-none">•</span> Author: KKK Manzanilla
            </p>
            <span class="absolute bottom-4 right-6 text-gray-600 italic text-[12px]">
                Date: 01/19/2020
            </span>
        </div>

        <div class="relative bg-white border border-gray-300 rounded-[15px] p-4 pr-32 hover:shadow-sm transition-shadow">
            <span class="inline-block bg-[#FDECC8] text-[#916400] text-[11px] font-medium px-3 py-0.5 rounded-full mb-1">
                Master's Theses
            </span>
            <h4 class="text-black font-regular text-[15px] leading-tight mb-2">
                Screening of Potential Microbes for the Production of Crude Pili Pulpnb dnbdbnv sbs hgasfg wgaj whj sad ghdshjdhgd
            </h4>
            <p class="text-gray-600 text-[11px] flex items-center gap-1">
                <span class="text-bu-blue text-lg leading-none">•</span> Author: KKK Manzanilla
            </p>
            <span class="absolute bottom-4 right-6 text-gray-600 italic text-[12px]">
                Date: 01/19/2020
            </span>
            </div>
            </div>

             <div class="flex items-center gap-4 mt-8 mb-4">
                <h3 class="text-[25px] text-gray-700 font-regular whitespace-nowrap">Theses/Dissertation from 2019</h3>
                 <div class="flex-1 h-[2px] bg-bu-orange/60"></div>
             </div>
            
             <div class="relative bg-white border border-gray-300 rounded-[15px] p-4 pr-32 hover:shadow-sm transition-shadow">
            <span class="inline-block bg-[#FDECC8] text-[#916400] text-[12px] font-medium px-3 py-0.5 rounded-full mb-1">
                Master's Theses
            </span>
            <h4 class="text-black font-regular text-[15px]   leading-tight mb-2">
                Screening of Potential Microbes for the Production of Crude Pili Pulpnb dnbdbnsbshgasfgwgajwhjsadghdshjdhgd
            </h4>
            <p class="text-gray-600 text-[11px] flex items-center gap-1">
                <span class="text-bu-blue text-lg leading-none">•</span> Author: KKK Manzanilla
            </p>
            <span class="absolute bottom-4 right-6 text-gray-600 italic text-[12px]">
                Date: 01/19/2019
            </span>
            </div>

            <div class="flex justify-end gap-4 mt-10 pt-4">
                <button class="border-2 border-bu-orange text-bu-orange px-5 py-2 rounded-xl font-bold hover:bg-bu-orange hover:text-white transition duration-200"><i class="fas fa-chevron-left mr-1"></i> Previous</button>
                <button class="border-2 border-bu-orange text-bu-orange px-5 py-2 rounded-xl font-bold hover:bg-bu-orange hover:text-white transition duration-200">Next <i class="fas fa-chevron-right ml-1"></i></button>
            </div>
            </div>  
        </section>
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
        
        
        // Interactive program browsing feedback
        const programLinks = document.querySelectorAll('.program-link a');
        programLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const programName = link.innerText;
                alert(`Showing all theses and dissertations for:\n${programName}`);
            });
        });
        
        // Year range selects interaction
        const yearSelects = document.querySelectorAll('.custom-select');
        yearSelects.forEach(select => {
            select.addEventListener('change', () => {
                console.log('Year range updated (would trigger filter in production)');
            });
        });
        
        // Pagination buttons feedback
        const prevBtn = document.querySelector('.border-2.border-bu-orange.text-bu-orange:first-child');
        const nextBtn = document.querySelector('.border-2.border-bu-orange.text-bu-orange:last-child');
        if (prevBtn && nextBtn) {
            prevBtn.addEventListener('click', () => alert('Previous page (pagination integration would load more results)'));
            nextBtn.addEventListener('click', () => alert('Next page (pagination integration would load more results)'));
        }
    </script>
</body>
</html>
