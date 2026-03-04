@extends('Super-Admin.adminlayout')

@section('content')
<div class="p-6 transition-colors duration-300">
    
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">News Management</h2>
            <p class="text-gray-500 dark:text-gray-400">Create and manage official BUOU news updates.</p>
        </div>
        <button class="bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2.5 rounded-lg flex items-center gap-2 transition-all shadow-md active:scale-95" 
                data-bs-toggle="modal" data-bs-target="#addNewsModal">
            <i data-lucide="plus" class="w-5 h-5"></i>
            <span class="font-medium">Add News</span>
        </button>
    </div>

    @if(session('success'))
        <div class="bg-emerald-100 border-l-4 border-emerald-500 text-emerald-700 px-4 py-3 rounded-r-lg mb-6 shadow-sm dark:bg-emerald-900/20 dark:text-emerald-400" role="alert">
            <p class="text-sm font-medium">{{ session('success') }}</p>
        </div>
    @endif

    <div class="bg-white dark:bg-[#111827] border border-gray-200 dark:border-gray-800 rounded-xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 dark:bg-gray-800/50 border-b border-gray-200 dark:border-gray-800">
                    <tr>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Content Preview</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider text-center">Date</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                    @forelse($news as $item)
                    <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-800/30 transition-colors group"
                        data-id="{{ $item->id }}" 
                        data-title="{{ htmlspecialchars($item->title, ENT_QUOTES) }}" 
                        data-content="{{ htmlspecialchars($item->content, ENT_QUOTES) }}" 
                        data-created_at="{{ $item->created_at->format('Y-m-d') }}">
                        
                        <td class="px-6 py-4 text-sm text-gray-400 dark:text-gray-500 font-mono">#{{ $item->id }}</td>
                        <td class="px-6 py-4 text-sm font-semibold text-gray-800 dark:text-gray-100">
                            {{ Str::limit($item->title, 35) }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 max-w-xs">
                            {{ Str::limit($item->content, 50) }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-400">
                                {{ $item->created_at->format('M d, Y') }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right space-x-3">
                            <button class="text-emerald-600 hover:text-emerald-700 dark:text-emerald-400 dark:hover:text-emerald-300 font-semibold text-sm edit-btn transition-colors" 
                                    data-bs-toggle="modal" data-bs-target="#editNewsModal">
                                Edit
                            </button>
                            <form action="{{ route('news.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600 dark:text-red-400 dark:hover:text-red-300 font-semibold text-sm transition-colors" 
                                        onclick="return confirm('Delete this news item?');">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-400 italic">No news items found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="addNewsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-white dark:bg-[#111827] border-0 shadow-2xl rounded-2xl overflow-hidden">
            <div class="modal-header border-b border-gray-100 dark:border-gray-800 p-6">
                <h5 class="text-lg font-bold text-gray-800 dark:text-white">Create New Update</h5>
                <button type="button" class="btn-close dark:btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-8 space-y-5 text-left">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-2">News Title</label>
                        <input type="text" name="title" class="w-full bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 text-gray-900 dark:text-white outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all" placeholder="Enter headline..." required>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-2">Content Details</label>
                        <textarea name="content" rows="6" class="w-full bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 text-gray-900 dark:text-white outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all resize-none" placeholder="Write news content here..." required></textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-2">Publish Date</label>
                            <input type="date" name="created_at" class="w-full bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all" required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-2">Feature Image</label>
                            <input type="file" name="image" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 dark:file:bg-emerald-900/30 dark:file:text-emerald-400 hover:file:bg-emerald-100 transition-all">
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-gray-50 dark:bg-gray-800/30 border-t border-gray-100 dark:border-gray-800 p-6 flex justify-end gap-3">
                    <button type="button" class="px-5 py-2 text-sm font-semibold text-gray-500 hover:text-gray-700 transition-colors" data-bs-dismiss="modal">Discard</button>
                    <button type="submit" class="bg-emerald-600 text-white px-8 py-2.5 rounded-xl font-bold hover:bg-emerald-700 shadow-lg shadow-emerald-500/20 transition-all">Publish Now</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editNewsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-white dark:bg-[#111827] border-0 shadow-2xl rounded-2xl overflow-hidden">
            <div class="modal-header border-b border-gray-100 dark:border-gray-800 p-6">
                <h5 class="text-lg font-bold text-gray-800 dark:text-white">Modify News Item</h5>
                <button type="button" class="btn-close dark:btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editNewsForm" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="modal-body p-8 space-y-5 text-left">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-2">News Title</label>
                        <input type="text" name="title" id="editTitle" class="w-full bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all" required>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-2">Content</label>
                        <textarea name="content" id="editContent" rows="6" class="w-full bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all resize-none" required></textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-2">Publication Date</label>
                        <input type="date" name="created_at" id="editDate" class="w-full bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all" required>
                    </div>
                </div>
                <div class="modal-footer bg-gray-50 dark:bg-gray-800/30 border-t border-gray-100 dark:border-gray-800 p-6 flex justify-end gap-3">
                    <button type="button" class="px-5 py-2 text-sm font-semibold text-gray-500 hover:text-gray-700 transition-colors" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="bg-emerald-600 text-white px-8 py-2.5 rounded-xl font-bold hover:bg-emerald-700 transition-all">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (window.lucide) { lucide.createIcons(); }

        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', event => {
                const row = event.target.closest('tr');
                const id = row.dataset.id;
                document.getElementById('editTitle').value = row.dataset.title;
                document.getElementById('editContent').value = row.dataset.content;
                document.getElementById('editDate').value = row.dataset.created_at;
                document.getElementById('editNewsForm').action = '/Super-Admin/news/' + id;
            });
        });
    });
</script>
@endpush