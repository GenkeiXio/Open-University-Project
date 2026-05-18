@extends('Staff.layout')

@section('title', 'Add Thesis & Dissertation')

@push('styles')
<style>
    .page-fade-in {
        animation: fadeIn 0.35s ease both;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(12px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endpush

@section('content')

<div class="max-w-7xl mx-auto page-fade-in px-4 py-8">

    {{-- Header --}}
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-8">
        <div>
            <div class="flex items-center gap-3 mb-2"><div>
                    <h1 class="text-3xl font-black text-gray-900 tracking-tight">
                     Upload New Theses and Dissertation
                    </h1>
                    <p class="text-sm text-gray-500 mt-1">
                        Upload graduate thesis publications in the repository.
                    </p>
                </div>
            </div>
        </div>

        <a href="#" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-gray-200 bg-white text-sm font-semibold text-gray-700 hover:bg-violet-300  transition">
            ← Back to Repository
        </a>
    </div>

    <form method="POST" enctype="multipart/form-data" onsubmit="event.preventDefault(); handleFormSubmit(this);">

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

            {{-- LEFT CONTENT --}}
            <div class="xl:col-span-2 space-y-6">

                {{-- Research Details --}}
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">

                    <div class="px-6 py-5 border-b border-gray-100">
                        <h2 class="text-lg font-semibold text-black-500 tracking-wide flex items-center gap-2">
                            Research Information
                        </h2>
                    </div>

                    <div class="p-5 md:p-6 space-y-5">

                        {{-- Title --}}
                        <div>
                            <label class="text-md font-lg text-black-500 tracking-wide block mb-1">Research Title <span class="text-red-500">*</span></label>
                            <textarea name="title" rows="3"
                                placeholder="Enter thesis or dissertation title..."
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-700 focus:border-[#0B439B] focus:ring-2 focus:ring-[#0B439B]/20 outline-none resize-none" required></textarea>
                        </div>

                        {{-- Degree Program Dropdown --}}
                        <div>
                            <label class="text-md font-lg text-black-500 tracking-wide block mb-1">Degree Program <span class="text-red-500">*</span></label>
                            <select id="degreeSelect" name="degree" class="w-full bg-white border border-gray-200 rounded-xl px-4 py-2.5 text-sm appearance-none focus:border-[#0B439B] focus:ring-2 focus:ring-[#0B439B]/20 outline-none" style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"%230B439B\" viewBox=\"0 0 20 20\"><path fill-rule=\"evenodd\" d=\"M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z\"/></svg>'); background-repeat: no-repeat; background-position: right 1rem center; background-size: 1em;" required>
                                <option value="" disabled selected>Select degree</option>
                                <option value="Doctor of Education in Educational Leadership & Management (EdDELM)">Doctor of Education in Educational Leadership & Management (EdDELM)</option>
                                <option value="Master of Arts in Educational Leadership & Management (MAELM)">Master of Arts in Educational Leadership & Management (MAELM)</option>
                                <option value="Master of Arts in English Education (MAEngEd)">Master of Arts in English Education (MAEngEd)</option>
                                <option value="Master of Arts in Social Studies Education (MASocStEd)">Master of Arts in Social Studies Education (MASocStEd)</option>
                                <option value="Master in Management (MM)">Master in Management (MM)</option>
                                <option value="Master of Public Administration (MPA)">Master of Public Administration (MPA)</option>
                            </select>
                        </div>

                        {{-- Abstract with OCR --}}
                        <div>
                            <div class="flex justify-between items-center mb-1">
                                <label class="text-md font-lg text-black-500 tracking-wide">Abstract <span class="text-red-500">*</span></label>
                                <button type="button" id="scanAbstractBtn" class="bg-gray-100 hover:bg-gray-200 text-[#0B439B] text-s font-semibold px-3 py-1.5 rounded-full transition">
                                    <i class="fas fa-camera mr-1"></i> Scan Image
                                </button>
                            </div>
                            <div class="relative">
                                <textarea id="abstractTextarea" name="abstract" rows="8" class="w-full bg-white border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:border-[#0B439B] focus:ring-2 focus:ring-[#0B439B]/20 outline-none resize-y" placeholder="Paste abstract or click 'Scan Image' to extract from photo..." required></textarea>
                                <div id="ocrLoadingOverlay" class="absolute inset-0 bg-white/80 backdrop-blur-sm rounded-xl flex items-center justify-center flex-col gap-1 hidden">
                                    <div class="w-6 h-6 border-2 border-gray-200 border-t-[#F5A623] rounded-full animate-spin"></div>
                                    <span class="text-xs font-medium text-[#0B439B]">OCR processing...</span>
                                </div>
                            </div>
                            <p class="text-[10px] text-gray-400 mt-1">
                                <i class="fas fa-arrow-down text-[#F5A623] text-[9px] mr-1"></i> Drop an image on the box for auto-extraction
                            </p>
                        </div>

                        {{-- Document Type --}}
                        <div>
                            <label class="text-md font-lg text-black-500 tracking-wide block mb-1">Document Type <span class="text-red-500">*</span></label>
                            <select name="document_type" class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm focus:border-[#0B439B] focus:ring-2 focus:ring-[#0B439B]/20 outline-none" id="document_type" required>
                                <option value="">Select Type</option>
                                <option value="Thesis">Thesis (Master's)</option>
                                <option value="Dissertation">Dissertation (Doctoral)</option>
                            </select>
                        </div>

                        {{-- Author + Published --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="text-md font-lg text-black-500 tracking-wide block mb-1">Author <span class="text-red-500">*</span></label>
                                <input type="text" name="author"
                                    placeholder="Author name"
                                    class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm focus:border-[#0B439B] focus:ring-2 focus:ring-[#0B439B]/20 outline-none" required>
                            </div>

                            <div>
                                <label class="text-md font-lg text-black-500 tracking-wide block mb-1">Date Published <span class="text-red-500">*</span></label>
                                <input type="date" name="published_date" class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm focus:border-[#0B439B] focus:ring-2 focus:ring-[#0B439B]/20 outline-none" required>
                            </div>
                        </div>

                        {{-- Keywords with add button --}}
                        <div>
                            <label class="text-md font-lg text-black-500 tracking-wide block mb-1">Keywords</label>
                            <div class="flex flex-wrap gap-2 mb-2" id="keywordsContainer"></div>
                            <div class="flex gap-2">
                                <input type="text" id="keywordInput" class="flex-1 bg-white border border-gray-200 rounded-xl px-4 py-2 text-sm focus:border-[#0B439B] focus:ring-2 focus:ring-[#0B439B]/20 outline-none" placeholder="e.g., education, leadership" onkeypress="handleKeywordKeypress(event)">
                                <button type="button" id="addKeywordBtn" class="bg-violet-600 hover:bg-violet-700  text-white text-sm font-semibold px-5 rounded-xl transition">Add</button>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Thesis Committee --}}
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">

                    <div class="px-6 py-5 border-b border-gray-100">
                        <h2 class="text-md font-lg text-black-500 tracking-wide flex items-center gap-2">
                            Thesis Committee
                        </h2>
                        <p class="text-xs text-gray-400 mt-1" id="committee_info">
                            For Thesis: 1 Adviser, 1 Panel Chair, 2 Panel Members<br>
                            For Dissertation: 1 Adviser, 1 Panel Chair, 4 Panel Members
                        </p>
                    </div>

                    <div class="p-6 space-y-4">

                        <div>
                            <label class="block text-sm font-lg text-black-500 tracking-wide mb-1.5">Adviser <span class="text-red-500">*</span></label>
                            <input type="text" name="adviser" placeholder="Enter adviser name" class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm focus:border-[#0B439B] focus:ring-2 focus:ring-[#0B439B]/20 outline-none" required>
                        </div>

                        <div>
                            <label class="block text-sm font-lg text-black-500 tracking-wide mb-1.5">Panel Chairperson <span class="text-red-500">*</span></label>
                            <input type="text" name="chairperson" placeholder="Enter chairperson name" class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm focus:border-[#0B439B] focus:ring-2 focus:ring-[#0B439B]/20 outline-none" required>
                        </div>

                        <div id="panel_members_container">
                            <label class="block text-sm font-lg text-black-500 tracking-wide mb-1.5">Panel Members <span class="text-red-500">*</span></label>
                            
                            <div class="mb-3">
                                <input type="text" name="panel_members[]" placeholder="Panel Member 1" class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm focus:border-[#0B439B] focus:ring-2 focus:ring-[#0B439B]/20 outline-none" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="panel_members[]" placeholder="Panel Member 2" class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm focus:border-[#0B439B] focus:ring-2 focus:ring-[#0B439B]/20 outline-none" required>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            {{-- RIGHT SIDEBAR --}}
            <div class="space-y-6">

                {{-- Upload File --}}
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">

                    <div class="px-6 py-5 border-b border-gray-100">
                        <h2 class="text-md font-lg text-black-500 tracking-wide flex items-center gap-2">
                            Upload Document (Optional)
                        </h2>
                    </div>

                    <div class="p-6">

                        <label id="file_upload_label"
                            class="relative flex flex-col items-center justify-center border-2 border-dashed border-gray-300 rounded-2xl px-6 py-10 cursor-pointer hover:bg-blue-50 transition">

                            <p class="text-sm font-semibold text-gray-700" id="file_label_text">
                                Upload here 
                            </p>

                            <p class="text-xs text-gray-400 mt-1 text-center" id="file_status_text">
                                Click or drag & drop your thesis/dissertation PDF here
                            </p>

                            <input type="file" id="file_input" name="file" accept=".pdf" class="hidden" required>
                        </label>

                        <div class="mt-4 text-xs text-gray-400 text-center">
                            <p>Maximum file size: 50MB</p>
                            <p>Only PDF files are allowed</p>
                        </div>

                    </div>
                </div>

                {{-- Citation --}}
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">

                    <div class="px-6 py-5 border-b border-gray-100">
                        <h2 class="text-md font-lg text-black-500 tracking-wide flex items-center gap-2">
                         Recommended Citation
                        </h2>
                    </div>

                    <div class="p-6">
                        <textarea name="citation" rows="6"
                            placeholder="Enter citation format (e.g., APA, MLA, Chicago)..."
                            class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm focus:border-[#0B439B] focus:ring-2 focus:ring-[#0B439B]/20 outline-none resize-none"></textarea>
                        <p class="text-xs text-gray-400 mt-2">
                            Example: Author, A. A. (Year). Title of thesis/dissertation. [Type of document], University Name.
                        </p>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                    <div class="p-6">
                        <button type="submit" class="w-full bg-violet-600 hover:bg-violet-700 text-white font-bold py-3 px-4 rounded-xl transition flex items-center justify-center gap-2">
                            Publish Thesis
                        </button>
                    </div>
                </div>

            </div>

        </div>

    </form>

</div>

@endsection

@push('scripts')
{{-- Include Tesseract.js for OCR --}}
<script src="https://cdn.jsdelivr.net/npm/tesseract.js@5/dist/tesseract.min.js"></script>
{{-- Font Awesome for icons --}}
<script src="https://kit.fontawesome.com/a1e0a2b4b3.js" crossorigin="anonymous"></script>

<script>
    // File upload handling
    const fileInput = document.getElementById('file_input');
    const fileLabelText = document.getElementById('file_label_text');
    const fileStatusText = document.getElementById('file_status_text');

    if (fileInput) {
        fileInput.addEventListener('change', (e) => {
            if (e.target.files.length > 0) {
                const file = e.target.files[0];
                if (file.type === 'application/pdf') {
                    fileLabelText.textContent = file.name;
                    fileStatusText.textContent = `Selected: ${(file.size / 1024 / 1024).toFixed(2)} MB`;
                    fileStatusText.style.color = '#10b981';
                } else {
                    alert('Please select a PDF file');
                    fileInput.value = '';
                    fileLabelText.textContent = 'Upload PDF File';
                    fileStatusText.textContent = 'Click or drag & drop your thesis/dissertation PDF here';
                    fileStatusText.style.color = '#9ca3af';
                }
            } else {
                fileLabelText.textContent = 'Upload PDF File';
                fileStatusText.textContent = 'Click or drag & drop your thesis/dissertation PDF here';
                fileStatusText.style.color = '#9ca3af';
            }
        });
    }

    // Keywords management
    (function() {
        let keywords = [];
        const keywordsContainer = document.getElementById('keywordsContainer');
        const keywordInput = document.getElementById('keywordInput');
        const addKeywordBtn = document.getElementById('addKeywordBtn');
        
        function renderKeywords() {
            if(!keywordsContainer) return;
            keywordsContainer.innerHTML = '';
            keywords.forEach((kw, idx) => {
                const tag = document.createElement('span');
                tag.className = 'bg-gray-100 text-[#0B439B] text-xs font-medium px-3 py-1.5 rounded-full flex items-center gap-2';
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
        
        function escapeHtml(str) { 
            return str.replace(/[&<>]/g, function(m){
                if(m==='&') return '&amp;'; 
                if(m==='<') return '&lt;'; 
                if(m==='>') return '&gt;'; 
                return m;
            }); 
        }
        
        function addKeyword() {
            let val = keywordInput.value.trim();
            if(val === '') return;
            if(val.includes(',')) {
                val.split(',').forEach(part => { 
                    let clean = part.trim(); 
                    if(clean && !keywords.includes(clean)) keywords.push(clean); 
                });
            } else { 
                if(!keywords.includes(val)) keywords.push(val); 
            }
            keywordInput.value = '';
            renderKeywords();
        }
        
        window.handleKeywordKeypress = function(e) { 
            if(e.key === 'Enter') { 
                addKeyword(); 
                e.preventDefault(); 
            } 
        };
        
        if(addKeywordBtn) addKeywordBtn.addEventListener('click', addKeyword);
        if(keywordInput) keywordInput.addEventListener('keypress', window.handleKeywordKeypress);
        
        window.getKeywords = () => keywords;
    })();

    // Document type change handling for panel members
    const documentTypeSelect = document.getElementById('document_type');
    const panelMembersContainer = document.getElementById('panel_members_container');
    
    function updatePanelMembers() {
        if (!documentTypeSelect || !panelMembersContainer) return;
        
        const selectedType = documentTypeSelect.value;
        let panelCount = 2;
        
        if (selectedType === 'Dissertation') {
            panelCount = 4;
        }
        
        const existingInputs = panelMembersContainer.querySelectorAll('input');
        const existingValues = Array.from(existingInputs).map(input => input.value);
        
        const label = panelMembersContainer.querySelector('.block');
        panelMembersContainer.innerHTML = '';
        panelMembersContainer.appendChild(label);
        
        for (let i = 1; i <= panelCount; i++) {
            const div = document.createElement('div');
            div.className = 'mb-3';
            
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'panel_members[]';
            input.placeholder = `Panel Member ${i}`;
            input.className = 'w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm focus:border-[#0B439B] focus:ring-2 focus:ring-[#0B439B]/20 outline-none';
            input.required = true;
            
            if (existingValues[i-1]) {
                input.value = existingValues[i-1];
            }
            
            div.appendChild(input);
            panelMembersContainer.appendChild(div);
        }
        
        const committeeInfo = document.getElementById('committee_info');
        if (selectedType === 'Dissertation') {
            committeeInfo.innerHTML = 'For Dissertation: 1 Adviser, 1 Panel Chair, 4 Panel Members';
        } else {
            committeeInfo.innerHTML = 'For Thesis: 1 Adviser, 1 Panel Chair, 2 Panel Members';
        }
    }
    
    if (documentTypeSelect) {
        documentTypeSelect.addEventListener('change', updatePanelMembers);
    }
    
    // ---------- OCR ABSTRACT with Tesseract.js ----------
    const scanBtn = document.getElementById('scanAbstractBtn');
    const abstractTextarea = document.getElementById('abstractTextarea');
    const ocrOverlay = document.getElementById('ocrLoadingOverlay');
    const hiddenImageInput = document.createElement('input');
    hiddenImageInput.type = 'file';
    hiddenImageInput.accept = 'image/jpeg,image/png,image/jpg,image/webp';
    hiddenImageInput.classList.add('hidden');
    document.body.appendChild(hiddenImageInput);
    
    if(scanBtn && abstractTextarea) {
        scanBtn.addEventListener('click', () => hiddenImageInput.click());
        
        hiddenImageInput.addEventListener('change', async (ev) => {
            const imgFile = ev.target.files[0];
            if(!imgFile) return;
            if(!imgFile.type.startsWith('image/')) { 
                alert('Please select a valid image file'); 
                hiddenImageInput.value=''; 
                return; 
            }
            
            ocrOverlay.classList.remove('hidden');
            abstractTextarea.disabled = true;
            
            try {
                const { data: { text } } = await Tesseract.recognize(imgFile, 'eng+fil');
                const extracted = text.trim();
                
                if(!extracted) {
                    alert('No text found in the image. Please try a clearer image.');
                } else {
                    const current = abstractTextarea.value.trim();
                    if(current.length && confirm('Replace current abstract text with extracted text?')) {
                        abstractTextarea.value = extracted;
                    } else if(!current) {
                        abstractTextarea.value = extracted;
                    } else {
                        abstractTextarea.value = current + "\n\n[OCR Extracted]\n" + extracted;
                    }
                }
            } catch(err) { 
                alert('OCR error: ' + err.message); 
            } finally { 
                ocrOverlay.classList.add('hidden'); 
                abstractTextarea.disabled = false; 
                hiddenImageInput.value=''; 
            }
        });
        
        // Drop image on abstract container
        const absContainer = abstractTextarea.parentElement;
        if(absContainer) {
            absContainer.addEventListener('dragover', (e) => { 
                e.preventDefault(); 
                absContainer.classList.add('ring-2', 'ring-[#F5A623]', 'rounded-xl'); 
            });
            
            absContainer.addEventListener('dragleave', () => 
                absContainer.classList.remove('ring-2', 'ring-[#F5A623]')
            );
            
            absContainer.addEventListener('drop', async (e) => {
                e.preventDefault();
                absContainer.classList.remove('ring-2', 'ring-[#F5A623]');
                
                const files = e.dataTransfer.files;
                if(files.length && files[0].type.startsWith('image/')) {
                    ocrOverlay.classList.remove('hidden');
                    abstractTextarea.disabled = true;
                    
                    try {
                        const { data: { text } } = await Tesseract.recognize(files[0], 'eng+fil');
                        const extText = text.trim();
                        
                        if(extText) {
                            const curr = abstractTextarea.value.trim();
                            if(curr && confirm('Replace current abstract text?')) {
                                abstractTextarea.value = extText;
                            } else if(!curr) {
                                abstractTextarea.value = extText;
                            } else {
                                abstractTextarea.value = curr + "\n\n--- Extracted ---\n" + extText;
                            }
                        } else {
                            alert('No text extracted from the image');
                        }
                    } catch(err) { 
                        alert('OCR error: ' + err.message); 
                    } finally { 
                        ocrOverlay.classList.add('hidden'); 
                        abstractTextarea.disabled = false; 
                    }
                }
            });
        }
    }
    
    // Form submission handler
    function handleFormSubmit(form) {
        const requiredFields = form.querySelectorAll('[required]');
        let isValid = true;
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                field.style.borderColor = '#ef4444';
                isValid = false;
            } else {
                field.style.borderColor = '#e5e7eb';
            }
        });
        
        if (!isValid) {
            alert('Please fill in all required fields');
            return;
        }
        
        const file = fileInput.files[0];
        if (!file) {
            alert('Please upload a PDF file');
            return;
        }
        
        const keywords = window.getKeywords ? window.getKeywords() : [];
        
        const formData = new FormData(form);
        const formObject = {};
        formData.forEach((value, key) => {
            if (key === 'panel_members[]') {
                if (!formObject.panel_members) formObject.panel_members = [];
                formObject.panel_members.push(value);
            } else {
                formObject[key] = value;
            }
        });
        
        formObject.keywords = keywords;
        
        console.log('Form Data:', formObject);
        alert('✓ Form submitted successfully!\n\n' +
              'Degree: ' + formObject.degree + '\n' +
              'Document Type: ' + formObject.document_type + '\n' +
              'Panel Members: ' + (formObject.panel_members?.length || 0) + '\n' +
              'Keywords: ' + keywords.length);
    }
    
    // Remove required field red border on input
    document.querySelectorAll('[required]').forEach(field => {
        field.addEventListener('input', function() {
            this.style.borderColor = '#e5e7eb';
        });
    });
</script>
@endpush