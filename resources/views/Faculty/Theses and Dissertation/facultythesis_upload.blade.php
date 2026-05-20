@extends('Faculty.facultylayout')

@section('title', 'Faculty - Upload Thesis & Dissertation')

@push('styles')
<style>
    .page-fade-in {
        animation: fadeIn 0.35s ease both;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(12px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endpush

@section('content')

<div class="max-w-7xl mx-auto page-fade-in px-4 py-6">

    {{-- HEADER --}}
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-6">

        <div>
            <h1 class="text-3xl font-black text-gray-900 dark:text-white tracking-tight">
                Upload New Thesis & Dissertation
            </h1>

            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                Upload graduate research publications into the faculty repository.
            </p>
        </div>

        <a href="#"
            class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm font-semibold text-gray-700 dark:text-gray-200 hover:bg-blue-50 dark:hover:bg-gray-700 transition">

            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            Back to Records

        </a>

    </div>

    <form method="POST" enctype="multipart/form-data" 
    action="{{ isset($research) 
        ? route('faculty.theses.update', $research->id) 
        : route('faculty.theses.store') }}"
    onsubmit="event.preventDefault(); handleFormSubmit(this);">

    @csrf

    @if(isset($research))
        @method('PUT')
    @endif

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

            {{-- LEFT SECTION --}}
            <div class="xl:col-span-2 space-y-6">

                {{-- RESEARCH INFORMATION --}}
                <div
                    class="bg-white dark:bg-gray-800 rounded-3xl border border-gray-200 dark:border-gray-700 shadow-sm overflow-hidden">

                    <div class="px-6 py-5 border-b border-gray-100 dark:border-gray-700">

                        <h2
                            class="text-lg font-bold text-[#0B439B] dark:text-blue-400 flex items-center gap-2">

                            <i data-lucide="book-open" class="w-5 h-5"></i>
                            Research Information

                        </h2>

                    </div>

                    <div class="p-6 space-y-5">

                        {{-- TITLE --}}
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">
                                Research Title <span class="text-red-500">*</span>
                            </label>

                            <textarea name="title" rows="3"
                            placeholder="Enter thesis or dissertation title..."
                            class="w-full rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3 text-sm text-gray-700 dark:text-gray-200 focus:border-[#0B439B] focus:ring-2 focus:ring-[#0B439B]/20 outline-none resize-none"
                            required>{{ old('title', $research->title ?? '') }}</textarea>

                        </div>

                        {{-- DEGREE + DOCUMENT TYPE --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            {{-- DEGREE --}}
                            {{-- DEGREE PROGRAM --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">
                                    Degree Program <span class="text-red-500">*</span>
                                </label>

                                <select name="program_id"
                                    class="w-full rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3 text-sm text-gray-700 dark:text-gray-200 focus:border-[#0B439B] focus:ring-2 focus:ring-[#0B439B]/20 outline-none"
                                    required>
                                    <option value="">Select Degree Program</option>
                                    @foreach($programs as $program)
                                        <option value="{{ $program->id }}"
    {{ isset($research) && $research->program_id == $program->id ? 'selected' : '' }}>
    {{ $program->name }}
</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- DOCUMENT TYPE --}}
                            <div>

                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">
                                    Document Type <span class="text-red-500">*</span>
                                </label>

                                <select name="document_type" id="document_type"
                                    class="w-full rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3 text-sm text-gray-700 dark:text-gray-200 focus:border-[#0B439B] focus:ring-2 focus:ring-[#0B439B]/20 outline-none"
                                    required>

                                    <option value="">Select Type</option>
                                    <option value="Thesis"
    {{ isset($research) && $research->document_type == 'Thesis' ? 'selected' : '' }}>
    Thesis (Master's)
</option>

<option value="Dissertation"
    {{ isset($research) && $research->document_type == 'Dissertation' ? 'selected' : '' }}>
    Dissertation (Doctoral)
</option>

                                </select>

                            </div>

                        </div>

                        {{-- ABSTRACT --}}
                        <div>

                            <div class="flex justify-between items-center mb-2">

                                <label class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                                    Abstract <span class="text-red-500">*</span>
                                </label>

                                <button type="button" id="scanAbstractBtn"
                                    class="bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-[#0B439B] dark:text-blue-300 text-xs font-semibold px-3 py-1.5 rounded-full transition">

                                    <i class="fas fa-camera mr-1"></i>
                                    Scan Image

                                </button>

                            </div>

                            <div class="relative">

                                <textarea id="abstractTextarea" name="abstract" rows="8"
                                    placeholder="Paste abstract or scan image..."
                                    class="w-full rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3 text-sm text-gray-700 dark:text-gray-200 focus:border-[#0B439B] focus:ring-2 focus:ring-[#0B439B]/20 outline-none resize-y"
                                    required>{{ old('abstract', $research->abstract ?? '') }}</textarea>

                                <div id="ocrLoadingOverlay"
                                    class="absolute inset-0 bg-white/80 dark:bg-black/60 backdrop-blur-sm rounded-2xl hidden items-center justify-center flex-col gap-2">

                                    <div
                                        class="w-6 h-6 border-2 border-gray-200 border-t-[#0B439B] rounded-full animate-spin">
                                    </div>

                                    <span class="text-xs font-semibold text-[#0B439B] dark:text-blue-300">
                                        OCR Processing...
                                    </span>

                                </div>

                            </div>

                        </div>

                        {{-- AUTHOR + DATE --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            {{-- AUTHOR --}}
                            <div>

                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">
                                    Author <span class="text-red-500">*</span>
                                </label>

                                <input type="text" name="author"
value="{{ old('author', $research->author ?? '') }}"
placeholder="Author name"
class="w-full rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3 text-sm text-gray-700 dark:text-gray-200 focus:border-[#0B439B] focus:ring-2 focus:ring-[#0B439B]/20 outline-none"
required>

                            </div>

                            {{-- DATE --}}
<div>
    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">
        Date Published <span class="text-red-500">*</span>
    </label>

    <input type="date" name="published_date"
        value="{{ old('published_date', isset($research) && $research->published_date ? date('Y-m-d', strtotime($research->published_date)) : '') }}"
        class="w-full rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3 text-sm text-gray-700 dark:text-gray-200 focus:border-[#0B439B] focus:ring-2 focus:ring-[#0B439B]/20 outline-none"
        required>
</div>

                        </div>

                        {{-- KEYWORDS --}}
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">
                                Keywords
                            </label>

                            <div id="keywordsContainer" class="flex flex-wrap gap-2 mb-3"></div>

                            <div class="flex gap-2">

                                <input type="text" id="keywordInput"
                                    placeholder="e.g. education, leadership"
                                    class="flex-1 rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3 text-sm text-gray-700 dark:text-gray-200 focus:border-[#0B439B] focus:ring-2 focus:ring-[#0B439B]/20 outline-none">

                                <button type="button" id="addKeywordBtn"
                                    class="bg-[#0B439B] hover:bg-[#08357A] text-white text-sm font-semibold px-5 rounded-2xl transition">

                                    Add

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- THESIS COMMITTEE --}}
                <div
                    class="bg-white dark:bg-gray-800 rounded-3xl border border-gray-200 dark:border-gray-700 shadow-sm overflow-hidden">

                    <div class="px-6 py-5 border-b border-gray-100 dark:border-gray-700">

                        <h2
                            class="text-lg font-bold text-[#0B439B] dark:text-blue-400 flex items-center gap-2">

                            <i data-lucide="users" class="w-5 h-5"></i>
                            Thesis Committee

                        </h2>

                        <p class="text-xs text-gray-400 mt-1" id="committee_info">
                            For Thesis: 1 Adviser, 1 Panel Chair, 2 Panel Members
                        </p>

                    </div>

                    <div class="p-6 space-y-4">

                        <input type="text" name="adviser"
value="{{ old('adviser', $research->adviser ?? '') }}"
placeholder="Adviser Name"
class="w-full rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3 text-sm outline-none">

                        <input type="text" name="chairperson"
value="{{ old('chairperson', $research->chairperson ?? '') }}"
placeholder="Panel Chairperson"
class="w-full rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3 text-sm outline-none">

                        <div id="panel_members_container" class="space-y-3">

@php
    $panelMembers = old('panel_members', $research->panel_members ?? ['', '']);
@endphp

@foreach($panelMembers as $index => $member)

<input type="text"
    name="panel_members[]"
    value="{{ $member }}"
    placeholder="Panel Member {{ $index + 1 }}"
    class="w-full rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3 text-sm outline-none">

@endforeach

</div>

                    </div>

                </div>

            </div>

            {{-- RIGHT SIDEBAR --}}
            <div class="space-y-6">

{{-- FILE UPLOAD --}}
<div
    class="bg-white dark:bg-gray-800 rounded-3xl border border-gray-200 dark:border-gray-700 shadow-sm overflow-hidden">

    <div class="px-6 py-5 border-b border-gray-100 dark:border-gray-700">

        <h2
            class="text-lg font-bold text-[#0B439B] dark:text-blue-400 flex items-center gap-2">

            <i data-lucide="upload-cloud" class="w-5 h-5"></i>
            Upload PDF

        </h2>

    </div>

    <div class="p-6">

        <label
            class="flex flex-col items-center justify-center border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-3xl px-6 py-10 cursor-pointer hover:bg-blue-50 dark:hover:bg-gray-700 transition">

            <i data-lucide="file-text"
                class="w-10 h-10 text-[#0B439B] dark:text-blue-400 mb-3"></i>

            <p class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                Upload PDF Here
            </p>

            <p class="text-xs text-gray-400 mt-1 text-center">
                Click or drag & drop thesis/dissertation PDF
            </p>

            <input type="file" name="file" accept=".pdf" class="hidden">

        </label>
    </div>

</div>



                {{-- CITATION --}}
                <div
                    class="bg-white dark:bg-gray-800 rounded-3xl border border-gray-200 dark:border-gray-700 shadow-sm overflow-hidden">

                    <div class="px-6 py-5 border-b border-gray-100 dark:border-gray-700">

                        <h2
                            class="text-lg font-bold text-[#0B439B] dark:text-blue-400 flex items-center gap-2">

                            <i data-lucide="quote" class="w-5 h-5"></i>
                            Recommended Citation

                        </h2>

                    </div>

                    <div class="p-6">

                        <textarea name="citation" rows="6"
    placeholder="Enter citation..."
    class="w-full rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3 text-sm text-gray-700 dark:text-gray-200 focus:border-[#0B439B] focus:ring-2 focus:ring-[#0B439B]/20 outline-none resize-none">{{ old('citation', $research->citation ?? '') }}</textarea>

                    </div>

                </div>

                {{-- SUBMIT --}}
                <div
                    class="bg-white dark:bg-gray-800 rounded-3xl border border-gray-200 dark:border-gray-700 shadow-sm overflow-hidden">

                    <div class="p-6">

                        <button type="submit"
                            class="w-full bg-[#0B439B] hover:bg-[#08357A] text-white font-bold py-3 px-4 rounded-2xl transition flex items-center justify-center gap-2">

                            <i data-lucide="check-circle" class="w-5 h-5"></i>
                            {{ isset($research) ? 'Update Thesis' : 'Publish Thesis' }}

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>

@endsection

@push('scripts')

<!-- SweetAlert2 CSS and JS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/tesseract.js@5/dist/tesseract.min.js"></script>

<script>

    // Custom top-center green Toast notification (no timer bar)
    const showToast = (message, duration = 3000) => {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: duration,
            timerProgressBar: false,
            background: '#28a745',
            color: '#ffffff',
            iconColor: '#ffffff',
            customClass: {
                popup: 'rounded-xl shadow-xl'
            }
        });
        Toast.fire({
            icon: 'success',
            title: message,
            iconColor: '#ffffff'
        });
    };

    // Custom top-center warning toast
    const showWarningToast = (message, duration = 3000) => {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: duration,
            timerProgressBar: false,
            background: '#ffc107',
            color: '#000000',
            customClass: {
                popup: 'rounded-xl shadow-xl'
            }
        });
        Toast.fire({
            icon: 'warning',
            title: message
        });
    };

    // Custom top-center error toast
    const showErrorToast = (message, duration = 3000) => {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: duration,
            timerProgressBar: false,
            background: '#dc3545',
            color: '#ffffff',
            customClass: {
                popup: 'rounded-xl shadow-xl'
            }
        });
        Toast.fire({
            icon: 'error',
            title: message
        });
    };

    // ==================== PDF PREVIEW FUNCTIONALITY ====================
    function initPDFPreview() {
        const fileInput = document.querySelector('input[name="file"]');
        const uploadLabel = document.querySelector('.border-2.border-dashed');
        
        if (!fileInput) return;
        
        // Create preview container
        let previewContainer = document.getElementById('pdfPreviewContainer');
        if (!previewContainer) {
            previewContainer = document.createElement('div');
            previewContainer.id = 'pdfPreviewContainer';
            previewContainer.className = 'mt-4 hidden';
            previewContainer.innerHTML = `
                <div class="bg-gray-50 dark:bg-gray-900 rounded-xl p-3">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-semibold text-gray-700 dark:text-gray-200">PDF Preview</span>
                        <button type="button" id="removePDFBtn" class="text-red-500 hover:text-red-700 text-xs">Remove</button>
                    </div>
                    <div id="pdfPreview" class="border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden bg-white">
                        <canvas id="pdfCanvas" class="w-full"></canvas>
                    </div>
                    <p id="pdfFileName" class="text-xs text-gray-500 mt-2 truncate"></p>
                </div>
            `;
            uploadLabel.parentNode.appendChild(previewContainer);
        }
        
        // Handle file selection
        fileInput.addEventListener('change', async function(e) {
            const file = e.target.files[0];
            if (file) {
                if (file.type !== 'application/pdf') {
                    showErrorToast('Please upload a PDF file only.');
                    this.value = '';
                    return;
                }
                if (file.size > 20 * 1024 * 1024) {
                    showErrorToast('File size must be less than 20MB.');
                    this.value = '';
                    return;
                }
                
                // Show preview of new file
                await showPDFPreview(file);
            }
        });
        
        // Remove PDF button
        document.addEventListener('click', function(e) {
            if (e.target.id === 'removePDFBtn') {
                fileInput.value = '';
                const container = document.getElementById('pdfPreviewContainer');
                if (container) container.style.display = 'none';
                showToast('PDF removed');
            }
        });
    }
    
    // Function to load and preview existing PDF from server
    async function loadExistingPDF(pdfPath) {
        const previewContainer = document.getElementById('pdfPreviewContainer');
        const pdfFileName = document.getElementById('pdfFileName');
        const pdfCanvas = document.getElementById('pdfCanvas');
        
        if (!previewContainer || !pdfFileName || !pdfCanvas) return;
        
        try {
            // Load PDF.js if not already loaded
            if (typeof pdfjsLib === 'undefined') {
                await loadPDFJS();
            }
            
            // Fetch the PDF file from server
            const response = await fetch('/storage/' + pdfPath);
            const arrayBuffer = await response.arrayBuffer();
            const pdf = await pdfjsLib.getDocument({ data: arrayBuffer }).promise;
            const page = await pdf.getPage(1);
            
            const viewport = page.getViewport({ scale: 0.8 });
            const canvasContext = pdfCanvas.getContext('2d');
            
            // Set canvas dimensions
            pdfCanvas.width = viewport.width;
            pdfCanvas.height = viewport.height;
            
            // Render PDF page
            await page.render({
                canvasContext: canvasContext,
                viewport: viewport
            }).promise;
            
            // Show filename
            const fileName = pdfPath.split('/').pop();
            pdfFileName.textContent = `Current file: ${fileName}`;
            
            // Show container
            previewContainer.style.display = 'block';
            previewContainer.classList.remove('hidden');
            
            // Remove existing info message if any
            const oldMsg = document.getElementById('pdfInfoMsg');
            if (oldMsg) oldMsg.remove();
            
            // Add info message
            const infoMsg = document.createElement('div');
            infoMsg.id = 'pdfInfoMsg';
            infoMsg.className = 'text-xs text-blue-600 dark:text-blue-400 mt-2 p-2 bg-blue-50 dark:bg-blue-900/20 rounded';
            infoMsg.innerHTML = 'Current PDF is displayed below. Upload a new file to replace it.';
            pdfFileName.parentNode.appendChild(infoMsg);
            
        } catch (error) {
            console.error('Error loading existing PDF:', error);
            pdfFileName.textContent = `Current file: ${pdfPath.split('/').pop()} (Preview not available)`;
            previewContainer.style.display = 'block';
        }
    }
    
    async function showPDFPreview(file) {
        const previewContainer = document.getElementById('pdfPreviewContainer');
        const pdfFileName = document.getElementById('pdfFileName');
        const pdfCanvas = document.getElementById('pdfCanvas');
        
        if (!previewContainer || !pdfFileName || !pdfCanvas) return;
        
        try {
            // Load PDF.js dynamically if not already loaded
            if (typeof pdfjsLib === 'undefined') {
                await loadPDFJS();
            }
            
            const arrayBuffer = await file.arrayBuffer();
            const pdf = await pdfjsLib.getDocument({ data: arrayBuffer }).promise;
            const page = await pdf.getPage(1);
            
            const viewport = page.getViewport({ scale: 0.8 });
            const canvasContext = pdfCanvas.getContext('2d');
            
            // Set canvas dimensions
            pdfCanvas.width = viewport.width;
            pdfCanvas.height = viewport.height;
            
            // Render PDF page
            await page.render({
                canvasContext: canvasContext,
                viewport: viewport
            }).promise;
            
            // Show filename
            pdfFileName.textContent = `Selected: ${file.name} (${(file.size / 1024).toFixed(2)} KB)`;
            
            // Remove info message if exists
            const infoMsg = document.getElementById('pdfInfoMsg');
            if (infoMsg) infoMsg.remove();
            
            // Show container
            previewContainer.style.display = 'block';
            
        } catch (error) {
            console.error('PDF preview error:', error);
            pdfFileName.textContent = `Selected: ${file.name} (Preview not available)`;
            previewContainer.classList.remove('hidden');
            previewContainer.style.display = 'block';
        }
    }
    
    function loadPDFJS() {
        return new Promise((resolve, reject) => {
            if (typeof pdfjsLib !== 'undefined') {
                resolve();
                return;
            }
            const script = document.createElement('script');
            script.src = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js';
            script.onload = () => {
                pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js';
                resolve();
            };
            script.onerror = reject;
            document.head.appendChild(script);
        });
    }

    // ==================== OCR / SCAN IMAGE FUNCTIONALITY ====================
    const scanBtn = document.getElementById('scanAbstractBtn');
    const abstractTextarea = document.getElementById('abstractTextarea');
    const ocrOverlay = document.getElementById('ocrLoadingOverlay');
    
    if (scanBtn) {
        scanBtn.addEventListener('click', function() {
            // Create file input for image
            const imageInput = document.createElement('input');
            imageInput.type = 'file';
            imageInput.accept = 'image/*';
            imageInput.style.display = 'none';
            
            imageInput.addEventListener('change', async function(e) {
                const file = e.target.files[0];
                if (!file) return;
                
                // Show loading overlay
                ocrOverlay.classList.remove('hidden');
                ocrOverlay.classList.add('flex');
                
                try {
                    // Perform OCR
                    const text = await performOCR(file);
                    
                    // Insert text into textarea
                    if (text && text.trim()) {
                        const currentText = abstractTextarea.value;
                        if (currentText) {
                            abstractTextarea.value = currentText + '\n\n' + text;
                        } else {
                            abstractTextarea.value = text;
                        }
                        showToast('Text extracted successfully!');
                    } else {
                        showWarningToast('No text could be extracted from the image.');
                    }
                    
                } catch (error) {
                    console.error('OCR Error:', error);
                    showErrorToast('Error processing image. Please try again.');
                } finally {
                    // Hide loading overlay
                    ocrOverlay.classList.add('hidden');
                    ocrOverlay.classList.remove('flex');
                    document.body.removeChild(imageInput);
                }
            });
            
            document.body.appendChild(imageInput);
            imageInput.click();
        });
    }
    
    async function performOCR(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            
            reader.onload = async function(e) {
                try {
                    const img = new Image();
                    img.src = e.target.result;
                    
                    img.onload = async function() {
                        try {
                            // Use Tesseract.js for OCR
                            const result = await Tesseract.recognize(
                                img,
                                'eng',
                                {
                                    logger: (m) => {
                                        console.log('OCR Progress:', m);
                                    }
                                }
                            );
                            
                            // Clean up the extracted text
                            let extractedText = result.data.text;
                            extractedText = extractedText.replace(/\s+/g, ' ').trim();
                            
                            resolve(extractedText);
                        } catch (error) {
                            reject(error);
                        }
                    };
                    
                    img.onerror = () => {
                        reject(new Error('Failed to load image'));
                    };
                    
                } catch (error) {
                    reject(error);
                }
            };
            
            reader.onerror = () => {
                reject(new Error('Failed to read file'));
            };
            
            reader.readAsDataURL(file);
        });
    }

    // ==================== KEYWORDS FUNCTIONALITY ====================
    let keywords = [];

    const keywordInput = document.getElementById('keywordInput');
    const addKeywordBtn = document.getElementById('addKeywordBtn');
    const keywordsContainer = document.getElementById('keywordsContainer');

    // Load existing keywords when editing
    @if(isset($research) && $research->keywords)
        keywords = {!! json_encode(is_string($research->keywords) ? json_decode($research->keywords, true) ?? [] : $research->keywords ?? []) !!};
    @endif

    function renderKeywords() {
        if (!keywordsContainer) return;
        keywordsContainer.innerHTML = '';
        keywords.forEach((keyword, index) => {
            const tag = document.createElement('span');
            tag.className = 'bg-blue-100 text-[#0B439B] text-xs font-semibold px-3 py-1 rounded-full flex items-center gap-2';
            tag.innerHTML = `
                ${escapeHtml(keyword)}
                <button type="button" onclick="removeKeyword(${index})" class="hover:text-red-600">×</button>
            `;
            keywordsContainer.appendChild(tag);
        });
    }

    // Helper function to escape HTML
    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    window.removeKeyword = function(index) {
        keywords.splice(index, 1);
        renderKeywords();
    }

    if (addKeywordBtn) {
        addKeywordBtn.addEventListener('click', () => {
            const value = keywordInput.value.trim();
            if (value && !keywords.includes(value)) {
                keywords.push(value);
                renderKeywords();
                keywordInput.value = '';
            }
        });
        
        keywordInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                addKeywordBtn.click();
            }
        });
    }

    // ==================== DOCUMENT TYPE PANEL MEMBERS ====================
    const documentTypeSelect = document.getElementById('document_type');
    const panelContainer = document.getElementById('panel_members_container');
    const committeeInfo = document.getElementById('committee_info');

    if (documentTypeSelect) {
        // Function to set panel members based on document type
        function setPanelMembers() {
            const docType = documentTypeSelect.value;
            const count = docType === 'Dissertation' ? 4 : 2;
            
            // Get existing panel members from server
            let existingMembers = [];
            @if(isset($research) && $research->panel_members)
                existingMembers = {!! json_encode(is_array($research->panel_members) ? $research->panel_members : json_decode($research->panel_members, true) ?? []) !!};
            @endif
            
            panelContainer.innerHTML = '';
            for (let i = 1; i <= count; i++) {
                const memberValue = (existingMembers[i-1] !== undefined && existingMembers[i-1]) ? existingMembers[i-1] : '';
                panelContainer.innerHTML += `
                    <input type="text"
                        name="panel_members[]"
                        value="${escapeHtml(memberValue)}"
                        placeholder="Panel Member ${i}"
                        class="w-full rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3 text-sm outline-none">
                `;
            }
            
            committeeInfo.innerHTML = docType === 'Dissertation'
                ? 'For Dissertation: 1 Adviser, 1 Panel Chair, 4 Panel Members'
                : 'For Thesis: 1 Adviser, 1 Panel Chair, 2 Panel Members';
        }
        
        // Initialize panel members on page load
        setPanelMembers();
        
        // Change panel members when document type changes
        documentTypeSelect.addEventListener('change', setPanelMembers);
    }

    // ==================== FORM SUBMIT HANDLER ====================
    window.handleFormSubmit = async function(form) {
        // Validate required fields
        const programId = form.querySelector('select[name="program_id"]').value;
        if (!programId) {
            showWarningToast('Please select a degree program.');
            return;
        }
        
        const fileInput = form.querySelector('input[name="file"]');
        // Only require file if it's a new upload (no existing file)
        @if(!isset($research))
        if (!fileInput.files || !fileInput.files[0]) {
            showWarningToast('Please upload a PDF file.');
            return;
        }
        @endif
        
        // Show loading state
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<div class="w-5 h-5 border-2 border-white border-t-transparent rounded-full animate-spin"></div> Uploading...';
        submitBtn.disabled = true;
        
        try {
            const formData = new FormData(form);
            formData.append('keywords', JSON.stringify(keywords));
            
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json'
                },
                body: formData
            });
            
            const result = await response.json();
            
            if (result.success) {
                // Success modal
                Swal.fire({
                    icon: 'success',
                    title: '{{ isset($research) ? "Update Successful!" : "Upload Successful!" }}',
                    text: '{{ isset($research) ? "Your thesis/dissertation has been updated." : "Your thesis/dissertation has been published to the repository." }}',
                    confirmButtonColor: '#0B439B',
                    confirmButtonText: 'Great!',
                    background: '#ffffff',
                    backdrop: true
                }).then(() => {
                    // Redirect to faculty thesis page
                    window.location.href = '{{ route("Faculty.facultythesis") }}';
                });
            } else {
                // Error modal
                Swal.fire({
                    icon: 'error',
                    title: '{{ isset($research) ? "Update Failed" : "Upload Failed" }}',
                    text: result.message || 'Something went wrong. Please try again.',
                    confirmButtonColor: '#0B439B',
                    confirmButtonText: 'OK'
                });
            }
        } catch (error) {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: '{{ isset($research) ? "Update Failed" : "Upload Failed" }}',
                text: 'An error occurred. Please try again.',
                confirmButtonColor: '#0B439B',
                confirmButtonText: 'OK'
            });
        } finally {
            // Restore button
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }
    };

// ==================== PAGE LOAD INITIALIZATION ====================
document.addEventListener('DOMContentLoaded', async function () {
    // Initialize Lucide icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
    
    // Initialize PDF preview UI
    initPDFPreview();
    
    // Load existing PDF preview when editing
    @if(isset($research) && $research->pdf_path)
        await loadPDFJS();
        await loadExistingPDF('{{ $research->pdf_path }}');
    @endif
    
    // Render existing keywords
    renderKeywords();
});

</script>

@endpush