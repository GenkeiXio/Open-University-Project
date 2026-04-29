@extends('Admin.adminlayout')

@section('title', 'Student Management')

@section('content')

    <div class="w-full">

        <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-6 mt-4 mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Student Management</h1>
                <p class="text-gray-500 dark:text-gray-400 mt-1 text-sm">Manage all registered student accounts</p>
            </div>
        </div>

        <!-- SEARCH + FILTERS -->
        <form method="GET" id="filterForm"
            class="bg-white dark:bg-[#1e293b] p-4 rounded-2xl mb-6 border border-gray-200 dark:border-gray-700 shadow-sm">
            <div class="grid md:grid-cols-3 gap-4">

                <!-- SEARCH -->
                <div class="relative">
                    <i data-lucide="search" class="absolute left-3 top-3 w-4 h-4 text-gray-400"></i>
                    <input type="text" name="search" id="searchInput"
                        value="{{ request('search') }}"
                        placeholder="Search name or email..."
                        class="w-full pl-9 pr-3 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                </div>

                <!-- STATUS FILTER -->
                <select name="status" id="statusFilter"
                    class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                    <option value="all">All Status</option>
                    <option value="active"   {{ request('status') == 'active'   ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>

                <!-- PER PAGE -->
                <div class="flex items-center gap-2">
                    <label class="text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap">Show</label>
                    <select name="per_page" id="perPageFilter"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                        @foreach([5, 10, 15, 25] as $size)
                            <option value="{{ $size }}" {{ request('per_page', 5) == $size ? 'selected' : '' }}>
                                {{ $size }} per page
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>
        </form>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- STUDENTS TABLE -->
        <div class="bg-white dark:bg-[#1e293b] rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-50 dark:bg-gray-800 text-gray-600 dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-4">#</th>
                            <th class="px-6 py-4">Name</th>
                            <th class="px-6 py-4">Email</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Registered</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="text-gray-700 dark:text-gray-300">
                        @forelse($students as $student)
                            <tr class="border-t border-gray-100 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800 transition">

                                <td class="px-6 py-4 text-gray-400">{{ $students->firstItem() + $loop->index }}</td>

                                <td class="px-6 py-4 font-medium">
                                    {{ $student->txt_fname }} {{ $student->txt_lname }}
                                </td>

                                <td class="px-6 py-4 text-gray-500">{{ $student->txt_email }}</td>

                                <td class="px-6 py-4">
                                    @if($student->txt_status == 'active')
                                        <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-600">Active</span>
                                    @else
                                        <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-600">Inactive</span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-gray-500">
                                    {{ $student->created_at ? $student->created_at->format('M d, Y') : 'N/A' }}
                                </td>

                                <td class="px-6 py-4 flex justify-end gap-2">
                                    <form method="POST" action="{{ route('admin.students.toggle', $student->student_id) }}">
                                        @csrf
                                        <button type="submit"
                                            class="p-2 rounded-lg {{ $student->txt_status == 'active' ? 'bg-red-100 text-red-600 hover:bg-red-200' : 'bg-green-100 text-green-600 hover:bg-green-200' }} transition"
                                            title="{{ $student->txt_status == 'active' ? 'Deactivate' : 'Activate' }}">
                                            <i data-lucide="{{ $student->txt_status == 'active' ? 'user-x' : 'user-check' }}" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-10 text-gray-400 dark:text-gray-500">
                                    No students found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination footer --}}
            @if($students->hasPages())
                <div class="px-6 py-4 border-t border-gray-100 dark:border-gray-700 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <p class="text-xs text-gray-400">
                        Showing {{ $students->firstItem() }}–{{ $students->lastItem() }} of {{ $students->total() }} entries
                    </p>
                    {{ $students->appends(request()->query())->links() }}
                </div>
            @else
                <div class="px-6 py-4 border-t border-gray-100 dark:border-gray-700">
                    <p class="text-xs text-gray-400">
                        Showing {{ $students->total() }} {{ Str::plural('entry', $students->total()) }}
                    </p>
                </div>
            @endif
        </div>
    </div>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();

        const form    = document.getElementById('filterForm');
        const search  = document.getElementById('searchInput');
        const status  = document.getElementById('statusFilter');
        const perPage = document.getElementById('perPageFilter');

        let debounceTimer;
        search.addEventListener('keyup', () => {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => form.submit(), 500);
        });

        status.addEventListener('change',  () => form.submit());
        perPage.addEventListener('change', () => form.submit());
    </script>

@endsection