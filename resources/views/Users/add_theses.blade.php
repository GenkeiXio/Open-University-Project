<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>BU Open University - Theses & Dissertations Repository</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Tesseract.js for OCR -->
    <script src="https://cdn.jsdelivr.net/npm/tesseract.js@5/dist/tesseract.min.js"></script>
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
<body class="font-raleway bg-gray-50 antialiased">

    <!-- Navigation - compact minimalist -->
    <nav class="bg-bu-blue sticky top-0 z-50 px-5 lg:px-8 py-2.5 flex justify-between items-center shadow-md">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center">
                <span class="text-white font-black text-sm">BU</span>
            </div>
            <div>
                <h1 class="font-extrabold text-white text-sm tracking-wide">Bicol University</h1>
                <p class="text-[10px] font-medium text-white/80">Open University · Repository</p>
            </div>
        </div>
        <div class="bg-white/95 backdrop-blur rounded-full py-1 px-4 shadow-sm">
            <div class="flex items-center gap-2 text-xs font-semibold text-bu-blue">
                <i class="fas fa-graduation-cap text-bu-orange text-xs"></i>
                <span>Submit Thesis</span>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4 py-8">
        <!-- header compact -->
        <div class="flex items-center gap-4 mb-6">
            <div class="w-2 h-12 bg-bu-orange rounded-full"></div>
            <div>
                <h2 class="text-xl md:text-4xl font-bold text-bu-blue tracking-tight">Add New Submission</h2>
                <p class="text-xs text-gray-500">Theses and Dissertations</p>
            </div>
        </div>

        <!-- form card - compact grid -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 divide-y lg:divide-y-0 lg:divide-x divide-gray-100">
                
                <!-- LEFT COLUMN -->
                <div class="p-5 md:p-6 space-y-5">
                    <!-- Title - full width -->
                    <div>
                        <label class="text-xs font-bold text-bu-blue uppercase tracking-wide block mb-1">Thesis / Dissertation Title</label>
                        <input type="text" id="thesisTitle" class="w-full bg-white border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:border-bu-blue focus:ring-2 focus:ring-bu-blue/20 outline-none transition" placeholder="Enter full title">
                    </div>

                    <!-- Degree Program - below title, full width -->
                    <div>
                        <label class="text-xs font-bold text-bu-blue uppercase tracking-wide block mb-1">Degree Program</label>
                        <select id="degreeSelect" class="w-full bg-white border border-gray-200 rounded-xl px-4 py-2.5 text-sm appearance-none focus:border-bu-blue focus:ring-2 focus:ring-bu-blue/20 outline-none" style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"%230B439B\" viewBox=\"0 0 20 20\"><path fill-rule=\"evenodd\" d=\"M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z\"/></svg>'); background-repeat: no-repeat; background-position: right 1rem center; background-size: 1em;">
                            <option disabled selected>Select degree</option>
                            <option>Doctor of Education in Educational Leadership & Management (EdDELM)</option>
                            <option>Master of Arts in Educational Leadership & Management (MAELM)</option>
                            <option>Master of Arts in English Education (MAEngEd)</option>
                            <option>Master of Arts in Social Studies Education (MASocStEd)</option>
                            <option>Master in Management (MM)</option>
                            <option>Master of Public Administration (MPA)</option>
                        </select>
                    </div>

                    <!-- Document Type + Date Row -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="text-xs font-bold text-bu-blue uppercase tracking-wide block mb-1">Document Type</label>
                            <select id="docTypeSelect" class="w-full bg-white border border-gray-200 rounded-xl px-4 py-2.5 text-sm appearance-none focus:border-bu-blue focus:ring-2 focus:ring-bu-blue/20 outline-none" style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"%230B439B\" viewBox=\"0 0 20 20\"><path fill-rule=\"evenodd\" d=\"M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z\"/></svg>'); background-repeat: no-repeat; background-position: right 1rem center; background-size: 1em;">
                                <option disabled selected>Select type</option>
                                <option value="thesis">Master Thesis</option>
                                <option value="dissertation">Dissertation</option>
                            </select>
                        </div>
                        <div>
                            <label class="text-xs font-bold text-bu-blue uppercase tracking-wide block mb-1">Month Completed</label>
                            <select id="monthSelect" class="w-full bg-white border border-gray-200 rounded-xl px-4 py-2.5 text-sm appearance-none focus:border-bu-blue focus:ring-2 focus:ring-bu-blue/20 outline-none" style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"%230B439B\" viewBox=\"0 0 20 20\"><path fill-rule=\"evenodd\" d=\"M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z\"/></svg>'); background-repeat: no-repeat; background-position: right 1rem center; background-size: 1em;">
                                <option disabled selected>Month</option>
                                <option>January</option><option>February</option><option>March</option><option>April</option><option>May</option><option>June</option>
                                <option>July</option><option>August</option><option>September</option><option>October</option><option>November</option><option>December</option>
                            </select>
                        </div>
                        <div>
                            <label class="text-xs font-bold text-bu-blue uppercase tracking-wide block mb-1">Year Completed</label>
                            <select id="yearSelect" class="w-full bg-white border border-gray-200 rounded-xl px-4 py-2.5 text-sm appearance-none focus:border-bu-blue focus:ring-2 focus:ring-bu-blue/20 outline-none" style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"%230B439B\" viewBox=\"0 0 20 20\"><path fill-rule=\"evenodd\" d=\"M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z\"/></svg>'); background-repeat: no-repeat; background-position: right 1rem center; background-size: 1em;">
                                <option disabled selected>Year</option>
                                <option>2026</option><option>2025</option><option>2024</option><option>2023</option><option>2022</option>
                            </select>
                        </div>
                    </div>

                    <!-- Author -->
                    <div class="bg-bu-light-blue/30 rounded-xl p-3">
                        <label class="text-xs font-bold text-bu-blue uppercase tracking-wide block mb-1">Author's Name</label>
                        <input type="text" id="authorNameInput" class="w-full bg-white border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:border-bu-blue focus:ring-2 focus:ring-bu-blue/20 outline-none" placeholder="Full name as on document">
                    </div>

                    <!-- Keywords -->
                    <div>
                        <label class="text-xs font-bold text-bu-blue uppercase tracking-wide block mb-1">Keywords</label>
                        <div class="flex flex-wrap gap-2 mb-2" id="keywordsContainer"></div>
                        <div class="flex gap-2">
                            <input type="text" id="keywordInput" class="flex-1 bg-white border border-gray-200 rounded-xl px-4 py-2 text-sm focus:border-bu-blue focus:ring-2 focus:ring-bu-blue/20 outline-none" placeholder="e.g., education, leadership" onkeypress="handleKeywordKeypress(event)">
                            <button type="button" id="addKeywordBtn" class="bg-bu-blue hover:bg-blue-800 text-white text-sm font-semibold px-5 rounded-xl transition">Add</button>
                        </div>
                    </div>

                    <!-- Dynamic Committee Section (compact) -->
                    <div class="pt-2 border-t border-gray-100">
                        <div class="flex items-center gap-2 mb-3">
                            <div class="w-1 h-5 bg-bu-orange rounded-full"></div>
                            <h3 class="font-bold text-bu-blue text-base">Committee</h3>
                            <span id="committeeBadge" class="text-[10px] font-semibold bg-gray-100 text-bu-blue px-2 py-0.5 rounded-full">Select type</span>
                        </div>
                        <div id="dynamicCommitteeFields" class="space-y-3">
                            <!-- dynamic injected -->
                            <div class="text-sm text-gray-400 italic">Select Master Thesis or Dissertation</div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN -->
                <div class="p-5 md:p-6 space-y-5">
                    <!-- Abstract with OCR -->
                    <div>
                        <div class="flex justify-between items-center mb-1">
                            <label class="text-xs font-bold text-bu-blue uppercase tracking-wide">Abstract</label>
                            <button type="button" id="scanAbstractBtn" class="bg-gray-100 hover:bg-gray-200 text-bu-blue text-xs font-semibold px-3 py-1.5 rounded-full transition"><i class="fas fa-camera mr-1"></i> Scan Image</button>
                        </div>
                        <div class="relative">
                            <textarea id="abstractTextarea" rows="5" class="w-full bg-white border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:border-bu-blue focus:ring-2 focus:ring-bu-blue/20 outline-none resize-y" placeholder="Paste abstract or click 'Scan Image' to extract from photo..."></textarea>
                            <div id="ocrLoadingOverlay" class="absolute inset-0 bg-white/80 backdrop-blur-sm rounded-xl flex items-center justify-center flex-col gap-1 hidden">
                                <div class="w-6 h-6 border-2 border-gray-200 border-t-bu-orange rounded-full animate-spin"></div>
                                <span class="text-xs font-medium text-bu-blue">OCR processing...</span>
                            </div>
                        </div>
                        <p class="text-[10px] text-gray-400 mt-1"><i class="fas fa-arrow-down text-bu-orange text-[9px] mr-1"></i> Drop an image on the box for auto-extraction</p>
                    </div>

                    <!-- Citation -->
                    <div>
                        <label class="text-xs font-bold text-bu-blue uppercase tracking-wide block mb-1">Recommended Citation (APA)</label>
                        <textarea id="citationTextarea" rows="2" class="w-full bg-white border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:border-bu-blue focus:ring-2 focus:ring-bu-blue/20 outline-none resize-none" placeholder="e.g., Lastname, F. (2025). Title. BU Open University Repository."></textarea>
                    </div>

                    <!-- File Upload -->
                    <div>
                        <label class="text-xs font-bold text-bu-blue uppercase tracking-wide block mb-1">Full Manuscript</label>
                        <div id="fileUploadArea" class="border-2 border-dashed border-gray-300 rounded-xl p-4 transition cursor-pointer hover:border-bu-orange hover:bg-orange-50/30">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-xl bg-bu-blue/10 flex items-center justify-center"><i class="fas fa-file-pdf text-bu-orange text-xl"></i></div>
                                <div class="flex-1">
                                    <button type="button" id="triggerFileUpload" class="bg-bu-blue hover:bg-blue-800 text-white text-xs font-semibold px-4 py-2 rounded-lg transition">Browse</button>
                                    <div class="mt-2 flex items-center justify-between flex-wrap gap-1">
                                        <span id="fileNameDisplay" class="text-gray-500 text-xs truncate">No file selected</span>
                                        <button type="button" id="clearFileBtn" class="text-red-500 text-xs font-medium hidden">Remove</button>
                                    </div>
                                    <p class="text-[9px] text-gray-400 mt-1">PDF/DOC/DOCX up to 20MB</p>
                                </div>
                            </div>
                        </div>
                        <input type="file" id="thesisFileInput" class="hidden" accept=".pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                    </div>

                    <!-- Submit -->
                    <button id="submitFormBtn" class="w-full bg-bu-orange hover:bg-amber-600 text-white font-extrabold py-3 rounded-xl transition shadow-md text-sm tracking-wide"><i class="fas fa-paper-plane mr-2"></i> Publish to Repository</button>
                </div>
            </div>
        </div>
    </main>

    <script>
        (function() {
            // ---------- KEYWORDS ----------
            let keywords = [];
            const keywordsContainer = document.getElementById('keywordsContainer');
            const keywordInput = document.getElementById('keywordInput');
            const addKeywordBtn = document.getElementById('addKeywordBtn');
            
            function renderKeywords() {
                if(!keywordsContainer) return;
                keywordsContainer.innerHTML = '';
                keywords.forEach((kw, idx) => {
                    const tag = document.createElement('span');
                    tag.className = 'bg-gray-100 text-bu-blue text-xs font-medium px-3 py-1.5 rounded-full flex items-center gap-2';
                    tag.innerHTML = `${escapeHtml(kw)}<span class="keyword-remove text-gray-400 hover:text-red-500 cursor-pointer text-sm font-bold" data-index="${idx}">×</span>`;
                    keywordsContainer.appendChild(tag);
                });
                document.querySelectorAll('.keyword-remove').forEach(el => {
                    el.addEventListener('click', (e) => {
                        const index = parseInt(el.getAttribute('data-index'), 10);
                        if(!isNaN(index)) { keywords.splice(index, 1); renderKeywords(); }
                        e.stopPropagation();
                    });
                });
            }
            function escapeHtml(str) { return str.replace(/[&<>]/g, function(m){if(m==='&') return '&amp;'; if(m==='<') return '&lt;'; if(m==='>') return '&gt;'; return m;}); }
            function addKeyword() {
                let val = keywordInput.value.trim();
                if(val === '') return;
                if(val.includes(',')) {
                    val.split(',').forEach(part => { let clean = part.trim(); if(clean && !keywords.includes(clean)) keywords.push(clean); });
                } else { if(!keywords.includes(val)) keywords.push(val); }
                keywordInput.value = '';
                renderKeywords();
            }
            window.handleKeywordKeypress = function(e) { if(e.key === 'Enter') { addKeyword(); e.preventDefault(); } };
            if(addKeywordBtn) addKeywordBtn.addEventListener('click', addKeyword);
            if(keywordInput) keywordInput.addEventListener('keypress', window.handleKeywordKeypress);
            
            // ---------- DYNAMIC COMMITTEE ----------
            const docTypeSelect = document.getElementById('docTypeSelect');
            const dynamicContainer = document.getElementById('dynamicCommitteeFields');
            const committeeBadge = document.getElementById('committeeBadge');
            
            function buildCommitteeFields(docType) {
                if(docType === 'thesis') {
                    committeeBadge.innerText = '1 Adviser · 1 Chair · 2 Members';
                    dynamicContainer.innerHTML = `
                        <div><label class="text-xs font-semibold text-bu-blue/80 block mb-1">Thesis Adviser</label><input type="text" id="adviserInput" class="w-full bg-white border border-gray-200 rounded-xl px-3 py-2 text-sm" placeholder="Full name"></div>
                        <div><label class="text-xs font-semibold text-bu-blue/80 block mb-1">Panel Chairperson</label><input type="text" id="chairpersonInput" class="w-full bg-white border border-gray-200 rounded-xl px-3 py-2 text-sm" placeholder="Chairperson name"></div>
                        <div><label class="text-xs font-semibold text-bu-blue/80 block mb-1">Panel Member 1</label><input type="text" id="panelMember1" class="w-full bg-white border border-gray-200 rounded-xl px-3 py-2 text-sm" placeholder="Member name"></div>
                        <div><label class="text-xs font-semibold text-bu-blue/80 block mb-1">Panel Member 2</label><input type="text" id="panelMember2" class="w-full bg-white border border-gray-200 rounded-xl px-3 py-2 text-sm" placeholder="Member name"></div>
                    `;
                } else if(docType === 'dissertation') {
                    committeeBadge.innerText = '1 Adviser · 1 Chair · 4 Members';
                    dynamicContainer.innerHTML = `
                        <div><label class="text-xs font-semibold text-bu-blue/80 block mb-1">Dissertation Adviser</label><input type="text" id="adviserInput" class="w-full bg-white border border-gray-200 rounded-xl px-3 py-2 text-sm" placeholder="Full name"></div>
                        <div><label class="text-xs font-semibold text-bu-blue/80 block mb-1">Panel Chairperson</label><input type="text" id="chairpersonInput" class="w-full bg-white border border-gray-200 rounded-xl px-3 py-2 text-sm" placeholder="Chairperson name"></div>
                        <div><label class="text-xs font-semibold text-bu-blue/80 block mb-1">Panel Member 1</label><input type="text" id="panelMember1" class="w-full bg-white border border-gray-200 rounded-xl px-3 py-2 text-sm" placeholder="Member name"></div>
                        <div><label class="text-xs font-semibold text-bu-blue/80 block mb-1">Panel Member 2</label><input type="text" id="panelMember2" class="w-full bg-white border border-gray-200 rounded-xl px-3 py-2 text-sm" placeholder="Member name"></div>
                        <div><label class="text-xs font-semibold text-bu-blue/80 block mb-1">Panel Member 3</label><input type="text" id="panelMember3" class="w-full bg-white border border-gray-200 rounded-xl px-3 py-2 text-sm" placeholder="Member name"></div>
                        <div><label class="text-xs font-semibold text-bu-blue/80 block mb-1">Panel Member 4</label><input type="text" id="panelMember4" class="w-full bg-white border border-gray-200 rounded-xl px-3 py-2 text-sm" placeholder="Member name"></div>
                    `;
                } else {
                    committeeBadge.innerText = 'Select type';
                    dynamicContainer.innerHTML = '<div class="text-sm text-gray-400 italic">Choose Master Thesis or Dissertation</div>';
                }
            }
            if(docTypeSelect) {
                docTypeSelect.addEventListener('change', (e) => { buildCommitteeFields(e.target.value); });
                buildCommitteeFields(docTypeSelect.value);
            }
            
            // ---------- FILE HANDLING ----------
            const fileInput = document.getElementById('thesisFileInput');
            const browseBtn = document.getElementById('triggerFileUpload');
            const fileNameSpan = document.getElementById('fileNameDisplay');
            const clearBtn = document.getElementById('clearFileBtn');
            let selectedFile = null;
            
            function resetFileSelection() {
                fileInput.value = '';
                selectedFile = null;
                fileNameSpan.textContent = 'No file selected';
                fileNameSpan.classList.remove('font-medium', 'text-gray-800');
                if(clearBtn) clearBtn.classList.add('hidden');
            }
            function updateFileUI(file) {
                if(file) {
                    const maxSize = 20 * 1024 * 1024;
                    if(file.size > maxSize) { alert(`File exceeds 20MB (${(file.size/(1024*1024)).toFixed(2)} MB).`); resetFileSelection(); return false; }
                    const allowed = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
                    if(!allowed.includes(file.type) && !file.name.match(/\.(pdf|doc|docx)$/i)) { alert('Only PDF, DOC, DOCX allowed.'); resetFileSelection(); return false; }
                    selectedFile = file;
                    fileNameSpan.textContent = file.name;
                    fileNameSpan.classList.add('font-medium', 'text-gray-800');
                    if(clearBtn) clearBtn.classList.remove('hidden');
                    return true;
                } else { resetFileSelection(); return false; }
            }
            if(browseBtn) browseBtn.addEventListener('click', () => fileInput.click());
            if(fileInput) fileInput.addEventListener('change', (e) => { if(fileInput.files?.length) updateFileUI(fileInput.files[0]); else resetFileSelection(); });
            if(clearBtn) clearBtn.addEventListener('click', (e) => { e.preventDefault(); resetFileSelection(); });
            
            // drag-drop for file zone
            const dropZone = document.getElementById('fileUploadArea');
            if(dropZone) {
                ['dragenter','dragover','dragleave','drop'].forEach(ev => dropZone.addEventListener(ev, (e) => { e.preventDefault(); e.stopPropagation(); }));
                dropZone.addEventListener('dragenter', () => dropZone.classList.add('border-bu-orange', 'bg-orange-50'));
                dropZone.addEventListener('dragleave', () => dropZone.classList.remove('border-bu-orange', 'bg-orange-50'));
                dropZone.addEventListener('drop', (e) => {
                    dropZone.classList.remove('border-bu-orange', 'bg-orange-50');
                    const files = e.dataTransfer.files;
                    if(files?.length) {
                        const dropped = files[0];
                        const dt = new DataTransfer();
                        dt.items.add(dropped);
                        fileInput.files = dt.files;
                        updateFileUI(dropped);
                    }
                });
            }
            
            // ---------- OCR ABSTRACT ----------
            const scanBtn = document.getElementById('scanAbstractBtn');
            const abstractTextarea = document.getElementById('abstractTextarea');
            const ocrOverlay = document.getElementById('ocrLoadingOverlay');
            const hiddenImageInput = document.createElement('input');
            hiddenImageInput.type = 'file';
            hiddenImageInput.accept = 'image/jpeg,image/png,image/jpg,image/webp';
            hiddenImageInput.classList.add('hidden');
            document.body.appendChild(hiddenImageInput);
            
            if(scanBtn) {
                scanBtn.addEventListener('click', () => hiddenImageInput.click());
                hiddenImageInput.addEventListener('change', async (ev) => {
                    const imgFile = ev.target.files[0];
                    if(!imgFile) return;
                    if(!imgFile.type.startsWith('image/')) { alert('Select valid image'); hiddenImageInput.value=''; return; }
                    ocrOverlay.classList.remove('hidden');
                    abstractTextarea.disabled = true;
                    try {
                        const { data: { text } } = await Tesseract.recognize(imgFile, 'eng+fil');
                        const extracted = text.trim();
                        if(!extracted) alert('No text found. Try clearer image.');
                        else {
                            const current = abstractTextarea.value.trim();
                            if(current.length && confirm('Replace current abstract?')) abstractTextarea.value = extracted;
                            else if(!current) abstractTextarea.value = extracted;
                            else abstractTextarea.value = current + "\n\n[OCR Extracted]\n" + extracted;
                        }
                    } catch(err) { alert('OCR error: '+err.message); }
                    finally { ocrOverlay.classList.add('hidden'); abstractTextarea.disabled = false; hiddenImageInput.value=''; }
                });
            }
            // drop image on abstract container
            if(abstractTextarea) {
                const absContainer = abstractTextarea.parentElement;
                absContainer.addEventListener('dragover', (e) => { e.preventDefault(); absContainer.classList.add('ring-2', 'ring-bu-orange', 'rounded-xl'); });
                absContainer.addEventListener('dragleave', () => absContainer.classList.remove('ring-2', 'ring-bu-orange'));
                absContainer.addEventListener('drop', async (e) => {
                    e.preventDefault();
                    absContainer.classList.remove('ring-2', 'ring-bu-orange');
                    const files = e.dataTransfer.files;
                    if(files.length && files[0].type.startsWith('image/')) {
                        ocrOverlay.classList.remove('hidden');
                        abstractTextarea.disabled = true;
                        try {
                            const { data: { text } } = await Tesseract.recognize(files[0], 'eng+fil');
                            const extText = text.trim();
                            if(extText) {
                                const curr = abstractTextarea.value.trim();
                                if(curr && confirm('Replace current abstract?')) abstractTextarea.value = extText;
                                else if(!curr) abstractTextarea.value = extText;
                                else abstractTextarea.value = curr + "\n\n--- Extracted ---\n" + extText;
                            } else alert('No text extracted');
                        } catch(err) { alert('OCR error'); }
                        finally { ocrOverlay.classList.add('hidden'); abstractTextarea.disabled = false; }
                    }
                });
            }
            
        })();
    </script>
</body>
</html>