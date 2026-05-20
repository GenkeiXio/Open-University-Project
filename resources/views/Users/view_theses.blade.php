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
            <img src="{{ asset('assets/Logo/OU LOGO.jpg') }}" class="w-10 h-10 rounded-full p-0.5 bg-white object-contain" alt="BU Logo">
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
                        <h1 class="text-[25px] font-medium text-[#1E293B] leading-tight tracking-tight" id="researchTitle">
                            Loading...
                        </h1>
                    </div>
                    
                    <div class="flex flex-wrap items-center gap-3 mt-6">
                        <span class="bg-[#F3F8FF] text-bu-blue px-3 py-1 rounded-full text-[13px] font-bold">Author</span>
                        <p class="font-regular text-black text-[15px]" id="researchAuthor">Loading...</p>
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
                            <p class="text-[12px] font-sm text-black" id="researchDate">Loading...</p>
                        </div>

                        <div>
                            <h4 class="text-[14px] font-bold text-bu-blue mb-1">Abstract</h4>
                            <div class="text-[12px] font-sm text-black space-y-3" id="researchAbstract">
                                Loading...
                            </div>
                        </div>
                        <div>
                            <h4 class="text-[14px] font-bold text-bu-blue mb-0.5">Degree</h4>
                            <p class="text-[12px] font-sm text-black" id="researchDegree">Loading...</p>
                        </div>
                        
                        <div class="mt-2 pt-1">
                            <h4 class="text-[14px] font-bold text-bu-blue tracking-wide mb-4 pb-1 border-b-2 border-bu-orange inline-block">Thesis Committee</h4>
                            
                            <div class="bg-[#fafcff] rounded-xl p-5 mt-3 shadow-sm border-l-3 border-bu-blue">
                                <div class="flex items-start gap-4 mb-4 pb-3 border-b border-amber-200/50">
                                    <span class="inline-block w-[140px] font-bold text-bu-blue text-sm flex-shrink-0">Adviser:</span>
                                    <span class="text-black text-sm font-medium" id="researchAdviser">Loading...</span>
                                </div>
                                
                                <div class="flex items-start gap-4 mb-4 pb-3 border-b border-amber-200/50">
                                    <span class="inline-block w-[140px] font-bold text-bu-blue text-sm flex-shrink-0">Panel Chairperson:</span>
                                    <span class="text-black text-sm font-medium" id="researchChairperson">Loading...</span>
                                </div>

                                <div class="flex items-start gap-4">
                                    <span class="inline-block w-[140px] font-bold text-bu-blue text-sm flex-shrink-0">Panel Committee Members:</span>
                                    <div class="flex-1 space-y-2" id="researchPanelMembers">
                                        Loading...
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        <div class="bg-gray-50 p-4 rounded-xl shadow-sm">
                            <h4 class="text-[14px] font-bold text-bu-blue mb-1">Recommended Citation</h4>
                            <p class="text-[11px] italic text-gray-700" id="researchCitation">Loading...</p>
                        </div>
                    </div>

                    <div class="space-y-6 bg-[#F7FDFF] p-6 rounded-xl border border-gray-100 h-fit shadow-sm">
                        <div>
                            <h4 class="text-[14px] font-bold text-bu-blue mb-2 flex items-center gap-2">
                                Keywords
                            </h4>
                            <p class="text-[12px] font-sm text-black" id="researchKeywords">Loading...</p>
                        </div>
                        <div>
                            <h4 class="text-[14px] font-bold text-bu-blue mb-2 flex items-center gap-2">
                                 Document Type
                            </h4>
                            <p class="text-[12px] font-sm text-black" id="researchDocumentType">Loading...</p>
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
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6" id="relatedPublications">
                <div class="bg-white border border-gray-100 p-5 rounded-xl shadow-lg hover:bg-[#F3F8FF] transition-all cursor-pointer">
                    <span class="text-[9px] font-black text-bu-orange tracking-wide bg-orange-50 px-2 py-0.5 rounded inline-block mb-2">Loading...</span>
                    <h4 class="font-bold text-bu-blue text-base mt-2">Loading related publications...</h4>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Get research ID from URL parameter
        const urlParams = new URLSearchParams(window.location.search);
        const researchId = urlParams.get('id');
        
        // Function to fetch and display research details
        async function loadResearchDetails() {
            if (!researchId) {
                window.location.href = '/theses';
                return;
            }
            
            try {
                const response = await fetch(`/api/research/${researchId}`);
                const research = await response.json();
                
                // Display research data
                document.getElementById('researchTitle').textContent = research.title || 'No title available';
                document.getElementById('researchAuthor').textContent = research.author || 'No author available';
                
                // Format date
                if (research.published_date) {
                    const date = new Date(research.published_date);
                    document.getElementById('researchDate').textContent = date.toLocaleDateString('en-US', { 
                        year: 'numeric', 
                        month: 'long', 
                        day: 'numeric' 
                    });
                } else {
                    document.getElementById('researchDate').textContent = 'No date available';
                }
                
                document.getElementById('researchAbstract').innerHTML = research.abstract || 'No abstract available';
                document.getElementById('researchDegree').textContent = research.degree || 'No degree information';
                document.getElementById('researchAdviser').textContent = research.adviser || 'Not specified';
                document.getElementById('researchChairperson').textContent = research.chairperson || 'Not specified';
                
                // Handle panel members array
                if (research.panel_members && Array.isArray(research.panel_members) && research.panel_members.length > 0) {
                    const panelHtml = research.panel_members.map(member => 
                        `<p class="text-black text-sm font-medium">${member}</p>`
                    ).join('');
                    document.getElementById('researchPanelMembers').innerHTML = panelHtml;
                } else {
                    document.getElementById('researchPanelMembers').innerHTML = '<p class="text-black text-sm">No panel members specified</p>';
                }
                
                // Handle keywords array
                if (research.keywords && Array.isArray(research.keywords) && research.keywords.length > 0) {
                    document.getElementById('researchKeywords').innerHTML = research.keywords.join(', ');
                } else {
                    document.getElementById('researchKeywords').innerHTML = 'No keywords specified';
                }
                
                document.getElementById('researchDocumentType').textContent = research.document_type || 'Not specified';
                document.getElementById('researchCitation').textContent = research.citation || 'No citation available';
                
                // Load related publications
                await loadRelatedPublications(research.id);
                
            } catch (error) {
                console.error('Error loading research details:', error);
                // Show error message in the UI
                document.getElementById('researchTitle').textContent = 'Error loading research data';
                document.getElementById('researchAuthor').textContent = 'Please try again later';
            }
        }
        
        // Function to load related publications
        async function loadRelatedPublications(currentId) {
            try {
                const response = await fetch('/api/researches/all');
                const researches = await response.json();
                
                // Filter out current research and get 2 random related ones
                const related = researches.filter(r => r.id != currentId).slice(0, 2);
                
                const container = document.getElementById('relatedPublications');
                
                if (related.length === 0) {
                    container.innerHTML = '<div class="col-span-2 text-center text-gray-500">No related publications found</div>';
                    return;
                }
                
                container.innerHTML = related.map(research => `
                    <div class="bg-white border border-gray-100 p-5 rounded-xl shadow-lg hover:bg-[#F3F8FF] transition-all cursor-pointer" onclick="window.location.href='/view-theses?id=${research.id}'">
                        <span class="text-[9px] font-black text-bu-orange tracking-wide bg-orange-50 px-2 py-0.5 rounded inline-block mb-2">${research.document_type || 'Thesis'}</span>
                        <h4 class="font-bold text-bu-blue text-base mt-2">${research.title || 'No title'}</h4>
                        <p class="text-gray-500 text-[11px] mt-2 flex items-center gap-2">
                            <i class="fas fa-user-pen text-bu-orange text-[9px]"></i> Author: ${research.author || 'Unknown'} | ${research.published_date ? new Date(research.published_date).getFullYear() : 'N/A'}
                        </p>
                        <div class="mt-3 flex justify-end">
                            <span class="text-bu-orange text-[9px] font-bold uppercase tracking-wide">Read more →</span>
                        </div>
                    </div>
                `).join('');
                
            } catch (error) {
                console.error('Error loading related publications:', error);
                document.getElementById('relatedPublications').innerHTML = '<div class="col-span-2 text-center text-gray-500">Error loading related publications</div>';
            }
        }
        
        // Function to copy current URL to clipboard
        function copyCurrentUrl() {
            const url = window.location.href;
            navigator.clipboard.writeText(url).then(() => {
                alert('Link copied to clipboard!');
            }).catch(() => {
                alert('Failed to copy link');
            });
        }
        
        // Search functionality
        document.getElementById('searchBtn')?.addEventListener('click', () => {
            const searchTerm = document.getElementById('searchInput').value;
            if (searchTerm) {
                window.location.href = `/theses-output?search=${encodeURIComponent(searchTerm)}`;
            }
        });
        
        document.getElementById('searchInput')?.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                const searchTerm = e.target.value;
                if (searchTerm) {
                    window.location.href = `/theses-output?search=${encodeURIComponent(searchTerm)}`;
                }
            }
        });
        
        // Copy link button
        document.getElementById('copyLinkBtn')?.addEventListener('click', copyCurrentUrl);
        
        // Browse more button
        document.getElementById('browseMoreBtn')?.addEventListener('click', () => {
            window.location.href = '/theses-output';
        });
        
        // Save search button
        document.getElementById('saveSearchBtn')?.addEventListener('click', () => {
            const searchTerm = document.getElementById('searchInput')?.value;
            if (searchTerm) {
                alert(`Search "${searchTerm}" saved!`);
            } else {
                alert('Please enter a search term first');
            }
        });
        
        // Advanced search link
        document.getElementById('advancedSearchLink')?.addEventListener('click', (e) => {
            e.preventDefault();
            window.location.href = '/theses-output?advanced=true';
        });
        
        // Clock function
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
        
        // Load research details on page load
        loadResearchDetails();
    </script>
</body>
</html> 