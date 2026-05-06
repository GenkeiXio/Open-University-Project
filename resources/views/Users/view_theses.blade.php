<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BU Open University - Graduate Student's Output</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
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
</head>
<body class="bg-[#F9FAFE] font-raleway text-[#58595B]">
    <nav class="bg-bu-blue text-white px-6 md:px-12 py-3 flex justify-between items-center sticky top-0 z-50 shadow-sm">
        <div class="flex items-center gap-3">
            <img src="assets/OU LOGOtrans.png" class="w-10 h-10 rounded-full p-0.5 bg-white object-contain" alt="BU Logo">
            <div>
                <h1 class="font-black text-[10px] md:text-xs uppercase leading-tight tracking-wider">Bicol University</h1>
                <p class="text-[9px] md:text-[10px] font-medium opacity-90">Open University</p>
            </div>
        </div>
        
        <div class="flex items-center gap-4">
            <div class="bg-white rounded-full p-1 flex items-center shadow-sm">
                <div class="bg-bu-orange text-white rounded-full px-3 py-0.5 flex flex-col leading-tight items-center justify-center">
                    <span class="font-bold text-[7px]" id="dayName">WED</span>
                    <span class="font-black text-[9px]" id="dateDisplay">APR 8</span>
                </div>
                <div class="flex items-baseline gap-1 px-3">
                    <span class="text-bu-orange font-black text-sm md:text-base" id="liveTime">4:50</span>
                    <span class="text-bu-blue font-bold text-[9px]" id="ampmLabel">PM</span>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 py-8">
        
        <div class="flex items-center gap-3 mb-2">
            <div class="w-3 h-10 bg-bu-orange rounded-full"></div>
            <h2 class="text-3xl md:text-[42px] font-extrabold text-bu-blue tracking-tight">Graduate Student's Output</h2>
        </div>

        <div class="flex flex-col md:flex-row justify-end items-center gap-4 mb-5">
            <a href="#" class="text-bu-orange text-[12px] font-semibold border-b-2 border-bu-orange hover:opacity-80 transition-opacity" id="advancedSearchLink">Advanced search &rarr;</a>
            <div class="relative flex items-center">
                <input type="text" id="searchInput" class="w-full border-2 border-bu-orange/60 rounded-full py-2 px-20 text-sm focus:border-bu-orange focus:ring-0 outline-none transition">
                <button id="searchBtn" class="absolute right-1.5 bg-bu-orange text-white text-[11px] font-semibold px-3 py-1 rounded-full hover:bg-orange-600 transition">Search</button>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden mb-10">
            <div class="p-6 md:p-8">
                
                <div class="mb-6">
                    <div class="relative bg-[#F3F8FF] pt-8 pb-6 px-6 rounded-xl shadow-md">
                        <div class="absolute -top-3 left-0">
                            <div class="bg-bu-orange text-white px-8 py-1 rounded-r-full rounded-tl-xl shadow-md">
                                <span class="text-[14px] font-bold tracking-wide">Title</span>
                            </div>
                        </div>
                        <h1 class="text-[25px] font-medium text-[#1E293B] leading-tight tracking-tight">
                            Modeling the Determinants of Export Performance of Medium Agro-Processing Firms in the Philippines
                        </h1>
                    </div>
                    
                    <div class="flex flex-wrap items-center gap-3 mt-6">
                        <span class="bg-[#F3F8FF] text-bu-blue px-3 py-1 rounded-full text-[13px] font-bold">Author</span>
                        <p class="font-regular text-black text-[15px]">Marh kjajhgy B. Klas</p>
                        <button class="ml-auto text-bu-orange text-[10px] font-bold flex items-center gap-1.5 uppercase hover:underline" id="saveSearchBtn">
                            <i class="fas fa-bookmark"></i> Save this search
                        </button>
                    </div>
                </div>

                <div class="w-full h-px bg-gray-100 mb-6"></div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                    
                    <div class="lg:col-span-2 space-y-6">
                        <div>
                            <h4 class="text-[14px] font-bold text-bu-blue mb-1">Date Published</h4>
                            <p class="text-[12px] font-sm text-black">January 6, 2021</p>
                        </div>

                        <div>
                            <h4 class="text-[14px] font-bold text-bu-blue mb-1">Abstract</h4>
                            <div class="text-[12px] font-sm text-black space-y-3">
                                <p>Lorem ipsum dolor sit amet. A tenetur eveniet eos consequatur voluptate eum molestias voluptatem ea quis impedit. Et expedita dolor hic illum ullam et minima magni quo beatae voluptatem vel vero iusto.</p>
                                <p>Sed doloribus dicta et nemo iure ea voluptatem nostrum ea alias accusamus ex velit magni sed magni fugiat. Et doloremque itaque et optio voluptatem qui enim enim.</p>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-[14px] font-bold text-bu-blue mb-0.5">Degree</h4>
                            <p class="text-[12px] font-sm text-black">Master of Arts in Educational Leadership</p>
                        </div>
                        
                        <div class="mt-2 pt-1">
                            <h4 class="text-[14px] font-bold text-bu-blue tracking-wide mb-4 pb-1 border-b-2 border-bu-orange inline-block">Thesis Committee</h4>
                            
                            <div class="bg-[#fafcff] rounded-xl p-5 mt-3 shadow-sm border-l-3 border-bu-blue">
                                <div class="flex items-start gap-4 mb-4 pb-3 border-b border-amber-200/50">
                                    <span class="inline-block w-[140px] font-bold text-bu-blue text-sm flex-shrink-0">Adviser:</span>
                                    <span class="text-black text-sm font-medium">Dr. Ma. Elenita S. Mercado</span>
                                </div>
                                
                                <div class="flex items-start gap-4 mb-4 pb-3 border-b border-amber-200/50">
                                    <span class="inline-block w-[140px] font-bold text-bu-blue text-sm flex-shrink-0">Panel Chairperson:</span>
                                    <span class="text-black text-sm font-medium">Dr. Rafael C. Villanueva</span>
                                </div>

                                <div class="flex items-start gap-4">
                                    <span class="inline-block w-[140px] font-bold text-bu-blue text-sm flex-shrink-0">Panel Committee Members:</span>
                                    <div class="flex-1 space-y-2">
                                        <p class="text-black text-sm font-medium">Dr. Lourdes P. Fajardo</p>
                                        <p class="text-black text-sm font-medium">Dr. Antonio J. Ramirez</p>
                                        <p class="text-black text-sm font-medium">Prof. Maria Theresa B. Glorioso</p>
                                        <p class="text-black text-sm font-medium">Prof. Maria Theresa B. Glorioso</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        <div class="bg-gray-50 p-4 rounded-xl shadow-sm">
                            <h4 class="text-[14px] font-bold text-bu-blue mb-1">Recommended Citation</h4>
                            <p class="text-[11px] italic text-gray-700">Klas, M. B. (2021). Modeling the Determinants of Export Performance of Medium Agro-Processing Firms in the Philippines. BU Open University Graduate Repository.</p>
                        </div>
                    </div>

                    <div class="space-y-6 bg-[#F7FDFF] p-6 rounded-xl border border-gray-100 h-fit shadow-sm">
                        <div>
                            <h4 class="text-[14px] font-bold text-bu-blue mb-2 flex items-center gap-2">
                                Keywords
                            </h4>
                            <p class="text-[12px] font-sm text-black">Export performance, Agro-processing firms, Determinants, Philippine manufacturing, International trade.</p>
                        </div>
                        <div>
                            <h4 class="text-[14px] font-bold text-bu-blue mb-2 flex items-center gap-2">
                                 Document Type
                            </h4>
                            <p class="text-[12px] font-sm text-black">Dissertation</p>
                        </div>

                        <div class="pt-2">
                            <h4 class="text-[14px] font-bold text-bu-blue mb-3 flex items-center gap-2">
                                Share
                            </h4>
                            <button class="w-full bg-white border border-gray-200 py-2.5 rounded-lg text-[11px] font-bold text-bu-blue flex items-center justify-center gap-2 hover:bg-gray-50 transition-all shadow-sm hover:shadow-md" id="copyLinkBtn">
                                <i class="fas fa-link text-bu-orange"></i> Copy Link
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="flex items-center justify-between mb-5">
                <div class="flex items-center gap-3">
                    <div class="w-1 h-5 bg-bu-orange rounded-full"></div>
                    <h3 class="text-bu-blue font-bold text-[20px] tracking-wide">Related Theses & Dissertation Publications</h3>
                </div>
                <button id="browseMoreBtn" class="bg-bu-blue text-white px-5 py-2 rounded-full text-[11px] font-bold tracking-wide hover:bg-opacity-90 transition-all shadow-md hover:shadow-lg flex items-center gap-2">
                    Browse More <i class="fas fa-arrow-right text-[10px]"></i>
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white border border-gray-100 p-5 rounded-xl shadow-lg hover:bg-[#F3F8FF] transition-all cursor-pointer">
                    <span class="text-[9px] font-black text-bu-orange tracking-wide bg-orange-50 px-2 py-0.5 rounded inline-block mb-2">Dissertation</span>
                    <h4 class="font-bold text-bu-blue text-base mt-2">Economic Impact of Agro-Processing in Bicol Region</h4>
                    <p class="text-gray-500 text-[11px] mt-2 flex items-center gap-2">
                        <i class="fas fa-user-pen text-bu-orange text-[9px]"></i> Author: Santos, A. | 2022
                    </p>
                    <div class="mt-3 flex justify-end">
                        <span class="text-bu-orange text-[9px] font-bold uppercase tracking-wide">Read more →</span>
                    </div>
                </div>
     
                 <div class="bg-white border border-gray-100 p-5 rounded-xl shadow-lg hover:bg-[#F3F8FF] transition-all cursor-pointer">
                    <span class="text-[9px] font-black text-bu-orange tracking-wide bg-orange-50 px-2 py-0.5 rounded inline-block mb-2">Dissertation</span>
                    <h4 class="font-bold text-bu-blue text-base mt-2">Global Supply Chain Management in Local Firms</h4>
                    <p class="text-gray-500 text-[11px] mt-2 flex items-center gap-2">
                        <i class="fas fa-user-pen text-bu-orange text-[9px]"></i> Author: Reyes, L. | 2023
                    </p>
                    <div class="mt-3 flex justify-end">
                        <span class="text-bu-orange text-[9px] font-bold uppercase tracking-wide">Read more →</span>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function updateClock() {
            const now = new Date();
            const days = ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'];
            const months = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
            
            if(document.getElementById('dayName')) document.getElementById('dayName').textContent = days[now.getDay()];
            if(document.getElementById('dateDisplay')) document.getElementById('dateDisplay').textContent = `${months[now.getMonth()]} ${now.getDate()}`;
            
            let hours = now.getHours();
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12 || 12;
            
            if(document.getElementById('liveTime')) document.getElementById('liveTime').textContent = `${hours}:${minutes}`;
            if(document.getElementById('ampmLabel')) document.getElementById('ampmLabel').textContent = ampm;
        }
        setInterval(updateClock, 1000);
        updateClock();
    </script>
</body>
</html>