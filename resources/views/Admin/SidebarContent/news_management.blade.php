@extends('Admin.adminlayout')
@php use Illuminate\Support\Str; @endphp

@section('content')
<div class="p-8 min-h-screen transition-colors duration-300">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-6">
        <div class="space-y-1">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">News Management</h2>
            <p class="text-gray-500 dark:text-gray-400 text-sm">Create and manage official BUOU news updates.</p>
        </div>
        <button type="button" onclick="toggleModal('addNewsModal')" 
            class="bg-emerald-600 hover:bg-emerald-500 text-white px-6 py-3 rounded-xl flex items-center gap-2 transition-all shadow-lg shadow-emerald-500/20 active:scale-95">
            <i data-lucide="plus-circle" class="w-5 h-5"></i>
            <span class="font-bold text-sm tracking-wide uppercase">Add News</span>
        </button>
    </div>

    @if(session('success'))
        <div class="flex items-center p-4 mb-8 text-emerald-800 border-l-4 border-emerald-500 bg-emerald-50 dark:bg-emerald-900/10 dark:text-emerald-400 rounded-lg animate-fade-in">
            <i data-lucide="check-circle" class="w-5 h-5 mr-3"></i>
            <span class="text-sm font-bold">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white dark:bg-[#111827] border border-gray-100 dark:border-gray-800 rounded-2xl shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-50/50 dark:bg-gray-800/40 border-b border-gray-100 dark:border-gray-800">
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">ID</th>
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Headline</th>
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest text-center">Date</th>
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 dark:divide-gray-800/50">
                    @forelse($news as $item)
                    <tr class="group hover:bg-emerald-50/30 dark:hover:bg-emerald-500/5 transition-all"
                        data-id="{{ $item->id }}" 
                        data-title="{{ htmlspecialchars($item->title, ENT_QUOTES) }}" 
                        data-content="{{ htmlspecialchars($item->content, ENT_QUOTES) }}" 
                        data-created_at="{{ $item->created_at->format('Y-m-d') }}">
                        <td class="px-8 py-6 text-xs text-gray-400 font-mono">#{{ $item->id }}</td>
                        <td class="px-8 py-6">
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-gray-800 dark:text-gray-200 group-hover:text-emerald-600 transition-colors">{{ Str::limit($item->title, 50) }}</span>
                                <span class="text-xs text-gray-400 mt-0.5">{{ Str::limit($item->content, 70) }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-6 text-center">
                            <span class="text-xs font-semibold text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-800 px-3 py-1 rounded-full">
                                {{ $item->created_at->format('M d, Y') }}
                            </span>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <div class="flex items-center justify-end gap-3">
                                <button onclick="openEditModal(this)" class="text-emerald-600 hover:text-emerald-400 p-2">
                                    <i data-lucide="edit-3" class="w-4 h-4"></i>
                                </button>
                                <form action="{{ route('news.destroy', $item->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-400 p-2" onclick="return confirm('Delete this?');">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="px-8 py-20 text-center text-gray-400 italic">No news found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="modalBackdrop" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[60] hidden flex items-center justify-center p-4">
    
    <div id="addNewsModal" class="hidden bg-white dark:bg-[#111827] w-full max-w-lg rounded-3xl shadow-2xl border border-gray-200 dark:border-gray-800 overflow-hidden transform transition-all scale-95 opacity-0">
        <div class="p-8">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white uppercase tracking-tighter">New Broadcast</h3>
                <button onclick="toggleModal('addNewsModal')" class="text-gray-400 hover:text-gray-600 dark:hover:text-white"><i data-lucide="x"></i></button>
            </div>
            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Headline</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="w-full bg-transparent border-b-2 border-gray-200 dark:border-gray-800 px-0 py-2.5 text-gray-900 dark:text-white outline-none focus:border-emerald-500 transition-all" placeholder="Enter headline..." required>
                    @error('title')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Content</label>
                    <textarea name="content" rows="3" class="w-full bg-transparent border-b-2 border-gray-200 dark:border-gray-800 px-0 py-2.5 text-gray-900 dark:text-white outline-none focus:border-emerald-500 transition-all resize-none" placeholder="Enter details..." required>{{ old('content') }}</textarea>
                    @error('content')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Date</label>
                        <input type="date" name="created_at" value="{{ old('created_at') }}" class="w-full bg-transparent border-b-2 border-gray-200 dark:border-gray-800 py-2 text-sm dark:text-white outline-none focus:border-emerald-500">
                        @error('created_at')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Cover Image</label>
                        <input type="file" name="image" class="text-[10px] text-gray-400 file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:bg-emerald-500/10 file:text-emerald-500 cursor-pointer">
                        @error('image')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
                <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-4 rounded-xl shadow-lg shadow-emerald-500/20 transition-all mt-4 uppercase text-xs tracking-widest">Publish News</button>
            </form>
        </div>
    </div>

    <div id="editNewsModal" class="hidden bg-white dark:bg-[#111827] w-full max-w-lg rounded-3xl shadow-2xl border border-gray-200 dark:border-gray-800 overflow-hidden transform transition-all scale-95 opacity-0">
        <div class="p-8">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white uppercase tracking-tighter">Modify Update</h3>
                <button onclick="toggleModal('editNewsModal')" class="text-gray-400 hover:text-white"><i data-lucide="x"></i></button>
            </div>
            <form id="editNewsForm" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf @method('PUT')
                
                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Title</label>
                    <input type="text" name="title" id="editTitle" class="w-full bg-transparent border-b-2 border-gray-200 dark:border-gray-800 py-2.5 text-gray-900 dark:text-white outline-none focus:border-emerald-500 transition-all" required>
                </div>

                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Body Content</label>
                    <textarea name="content" id="editContent" rows="3" class="w-full bg-transparent border-b-2 border-gray-200 dark:border-gray-800 py-2.5 text-gray-900 dark:text-white outline-none focus:border-emerald-500 transition-all resize-none" required></textarea>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Date</label>
                        <input type="date" name="created_at" id="editDate" class="w-full bg-transparent border-b-2 border-gray-200 dark:border-gray-800 py-2 text-sm dark:text-white outline-none focus:border-emerald-500" required>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1 text-emerald-500">Update Image</label>
                        <input type="file" name="image" class="text-[10px] text-gray-400 file:mr-3 file:py-1 file:px-3 file:rounded-full file:border-0 file:bg-emerald-500/10 file:text-emerald-500 cursor-pointer">
                    </div>
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="button" onclick="toggleModal('editNewsModal')" class="flex-1 bg-gray-100 dark:bg-gray-800 text-gray-500 py-4 rounded-xl font-bold text-xs uppercase hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors">Discard</button>
                    <button type="submit" class="flex-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-4 px-8 rounded-xl shadow-lg shadow-emerald-500/20 transition-all uppercase text-xs tracking-widest">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if($errors->any())
    <script>
        // if validation failed after submitting add news form, open the add modal again
        document.addEventListener('DOMContentLoaded', function() {
            toggleModal('addNewsModal');
        });
    </script>
@endif

<script>
    // simple utility for showing/hiding the centered modal and backdrop
    function toggleModal(id) {
        const modal = document.getElementById(id);
        const backdrop = document.getElementById('modalBackdrop');
        if (!modal || !backdrop) return;

        const showing = !modal.classList.contains('hidden');
        if (!showing) {
            backdrop.classList.remove('hidden');
            modal.classList.remove('hidden');
            // allow transition to occur
            setTimeout(() => {
                modal.classList.remove('opacity-0','scale-95');
                modal.classList.add('opacity-100','scale-100');
            }, 10);
        } else {
            modal.classList.add('opacity-0','scale-95');
            modal.classList.remove('opacity-100','scale-100');
            setTimeout(() => {
                modal.classList.add('hidden');
                backdrop.classList.add('hidden');
            }, 200);
        }
    }

    function openEditModal(btn) {
        const row = btn.closest('tr');
        document.getElementById('editTitle').value = row.dataset.title;
        document.getElementById('editContent').value = row.dataset.content;
        document.getElementById('editDate').value = row.dataset.created_at;
        
        // Dynamic route matching your Laravel controller
        document.getElementById('editNewsForm').action = '/admin/news/' + row.dataset.id;
        
        toggleModal('editNewsModal');
    }

    // Close on backdrop click
    document.getElementById('modalBackdrop').addEventListener('click', function(e) {
        if (e.target === this) {
            document.querySelectorAll('#modalBackdrop > div').forEach(m => {
                if (!m.classList.contains('hidden')) toggleModal(m.id);
            });
        }
    });
</script>
@endsection