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
        onsubmit="event.preventDefault(); handleFormSubmit(this);">

        @csrf

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
                                required></textarea>

                        </div>

                        {{-- DEGREE + DOCUMENT TYPE --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            {{-- DEGREE --}}
                            <div>

                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">
                                    Degree Program <span class="text-red-500">*</span>
                                </label>

                                <select name="degree"
                                    class="w-full rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3 text-sm text-gray-700 dark:text-gray-200 focus:border-[#0B439B] focus:ring-2 focus:ring-[#0B439B]/20 outline-none"
                                    required>

                                    <option value="">Select Degree</option>

                                    <option>Doctor of Education in Educational Leadership & Management (EdDELM)</option>
                                    <option>Master of Arts in Educational Leadership & Management (MAELM)</option>
                                    <option>Master of Arts in English Education (MAEngEd)</option>
                                    <option>Master of Arts in Social Studies Education (MASocStEd)</option>
                                    <option>Master in Management (MM)</option>
                                    <option>Master of Public Administration (MPA)</option>

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
                                    <option value="Thesis">Thesis (Master's)</option>
                                    <option value="Dissertation">Dissertation (Doctoral)</option>

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
                                    required></textarea>

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
                            placeholder="Adviser Name"
                            class="w-full rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3 text-sm outline-none">

                        <input type="text" name="chairperson"
                            placeholder="Panel Chairperson"
                            class="w-full rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3 text-sm outline-none">

                        <div id="panel_members_container" class="space-y-3">

                            <input type="text" name="panel_members[]"
                                placeholder="Panel Member 1"
                                class="w-full rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3 text-sm outline-none">

                            <input type="text" name="panel_members[]"
                                placeholder="Panel Member 2"
                                class="w-full rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3 text-sm outline-none">

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
                            class="w-full rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3 text-sm text-gray-700 dark:text-gray-200 focus:border-[#0B439B] focus:ring-2 focus:ring-[#0B439B]/20 outline-none resize-none"></textarea>

                    </div>

                </div>

                {{-- SUBMIT --}}
                <div
                    class="bg-white dark:bg-gray-800 rounded-3xl border border-gray-200 dark:border-gray-700 shadow-sm overflow-hidden">

                    <div class="p-6">

                        <button type="submit"
                            class="w-full bg-[#0B439B] hover:bg-[#08357A] text-white font-bold py-3 px-4 rounded-2xl transition flex items-center justify-center gap-2">

                            <i data-lucide="check-circle" class="w-5 h-5"></i>
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

<script src="https://cdn.jsdelivr.net/npm/tesseract.js@5/dist/tesseract.min.js"></script>

<script>

    // LUCIDE
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    });

    // KEYWORDS
    let keywords = [];

    const keywordInput = document.getElementById('keywordInput');
    const addKeywordBtn = document.getElementById('addKeywordBtn');
    const keywordsContainer = document.getElementById('keywordsContainer');

    function renderKeywords() {

        keywordsContainer.innerHTML = '';

        keywords.forEach((keyword, index) => {

            const tag = document.createElement('span');

            tag.className =
                'bg-blue-100 text-[#0B439B] text-xs font-semibold px-3 py-1 rounded-full flex items-center gap-2';

            tag.innerHTML = `
                ${keyword}
                <button type="button" onclick="removeKeyword(${index})">×</button>
            `;

            keywordsContainer.appendChild(tag);

        });

    }

    function removeKeyword(index) {
        keywords.splice(index, 1);
        renderKeywords();
    }

    addKeywordBtn.addEventListener('click', () => {

        const value = keywordInput.value.trim();

        if (value && !keywords.includes(value)) {

            keywords.push(value);

            renderKeywords();

            keywordInput.value = '';

        }

    });

    // DOCUMENT TYPE PANEL MEMBERS
    const documentType = document.getElementById('document_type');
    const panelContainer = document.getElementById('panel_members_container');
    const committeeInfo = document.getElementById('committee_info');

    documentType.addEventListener('change', function () {

        panelContainer.innerHTML = '';

        let count = this.value === 'Dissertation' ? 4 : 2;

        committeeInfo.innerHTML =
            this.value === 'Dissertation'
            ? 'For Dissertation: 1 Adviser, 1 Panel Chair, 4 Panel Members'
            : 'For Thesis: 1 Adviser, 1 Panel Chair, 2 Panel Members';

        for (let i = 1; i <= count; i++) {

            panelContainer.innerHTML += `
                <input type="text"
                    name="panel_members[]"
                    placeholder="Panel Member ${i}"
                    class="w-full rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3 text-sm outline-none">
            `;

        }

    });

</script>

@endpush