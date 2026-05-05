@extends('Staff.layout')

@section('title', 'Student Approvals')

@section('content')
    <div class="w-full px-4 sm:px-6 lg:px-8 py-6">

        {{-- ── Header ── --}}
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Student Approvals</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1 text-sm">
                Review and approve or reject student account requests.
            </p>
        </div>

        @if(session('success'))
            <div class="mb-5 flex items-center gap-3 p-4 bg-emerald-50 dark:bg-emerald-900/20
                            border border-emerald-200 dark:border-emerald-800/40 rounded-xl
                            text-emerald-700 dark:text-emerald-400 text-sm font-semibold">
                <i data-lucide="check-circle" class="w-4 h-4 flex-shrink-0"></i>
                {{ session('success') }}
            </div>
        @endif

        {{-- ── Per-page selector ── --}}
        <form method="GET" class="flex items-center gap-2 mb-5">
            <label class="text-sm text-gray-500 dark:text-gray-400">Show</label>
            <select name="per_page" onchange="this.form.submit()" class="border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800
                       text-gray-700 dark:text-gray-300 rounded-xl px-3 py-1.5 text-sm
                       focus:outline-none focus:ring-2 focus:ring-violet-400">
                @foreach([5, 10, 15, 25] as $size)
                    <option value="{{ $size }}" {{ request('per_page', 5) == $size ? 'selected' : '' }}>
                        {{ $size }}
                    </option>
                @endforeach
            </select>
            <label class="text-sm text-gray-500 dark:text-gray-400">entries</label>
        </form>

        {{-- ── Table ── --}}
        <div class="bg-white dark:bg-[#111827] rounded-2xl border border-gray-200 dark:border-gray-800
                    shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-50 dark:bg-gray-800/40 text-gray-500 dark:text-gray-400
                                  text-xs uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-4">#</th>
                            <th class="px-6 py-4">Name</th>
                            <th class="px-6 py-4">Email</th>
                            <th class="px-6 py-4">Submitted</th>
                            <th class="px-6 py-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                        @forelse($students as $student)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition">

                                {{-- Row number --}}
                                <td class="px-6 py-4 text-gray-400 text-xs font-mono">
                                    {{ $students->firstItem() + $loop->index }}
                                </td>

                                {{-- Name --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-xl flex items-center justify-center
                                                        font-bold text-xs flex-shrink-0
                                                        bg-violet-100 dark:bg-violet-900/30
                                                        text-violet-700 dark:text-violet-300">
                                            {{ strtoupper(substr($student->txt_fname, 0, 1) . substr($student->txt_lname, 0, 1)) }}
                                        </div>
                                        <p class="font-semibold text-gray-800 dark:text-gray-200">
                                            {{ $student->txt_fname }} {{ $student->txt_lname }}
                                        </p>
                                    </div>
                                </td>

                                {{-- Email --}}
                                <td class="px-6 py-4 text-gray-500 dark:text-gray-400">
                                    {{ $student->txt_email }}
                                </td>

                                {{-- Submitted --}}
                                <td class="px-6 py-4 text-gray-500 dark:text-gray-400 whitespace-nowrap">
                                    {{ $student->created_at->format('M d, Y h:i A') }}
                                </td>

                                {{-- Actions --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">

                                        {{-- APPROVE --}}
                                        <form method="POST"
                                            action="{{ route('staff.pending-students.approve', $student->pending_student_id) }}">
                                            @csrf
                                            <button type="submit" onclick="return confirm('Approve this student?')" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl
                                                           text-xs font-bold
                                                           bg-emerald-100 dark:bg-emerald-900/30
                                                           text-emerald-700 dark:text-emerald-400
                                                           border border-emerald-200 dark:border-emerald-800/50
                                                           hover:bg-emerald-600 hover:text-white hover:border-emerald-600
                                                           dark:hover:bg-emerald-600 dark:hover:text-white
                                                           transition">
                                                <i data-lucide="check" class="w-3 h-3"></i>
                                                Approve
                                            </button>
                                        </form>

                                        {{-- REJECT --}}
                                        <form method="POST"
                                            action="{{ route('staff.pending-students.reject', $student->pending_student_id) }}">
                                            @csrf
                                            <button type="submit" onclick="return confirm('Reject this student?')" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl
                                                           text-xs font-bold
                                                           bg-red-100 dark:bg-red-900/30
                                                           text-red-600 dark:text-red-400
                                                           border border-red-200 dark:border-red-800/50
                                                           hover:bg-red-600 hover:text-white hover:border-red-600
                                                           dark:hover:bg-red-600 dark:hover:text-white
                                                           transition">
                                                <i data-lucide="x" class="w-3 h-3"></i>
                                                Reject
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center text-gray-400 dark:text-gray-500">
                                    <div class="flex flex-col items-center gap-2">
                                        <i data-lucide="graduation-cap" class="w-8 h-8 text-gray-300 dark:text-gray-600"></i>
                                        <p class="text-sm font-semibold">No pending student registrations</p>
                                        <p class="text-xs">All student requests have been processed.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- ── Pagination footer ── --}}
            @if($students->hasPages())
                <div class="px-6 py-4 border-t border-gray-100 dark:border-gray-800
                                flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <p class="text-xs text-gray-400">
                        Showing {{ $students->firstItem() }}–{{ $students->lastItem() }}
                        of {{ $students->total() }} entries
                    </p>
                    {{ $students->appends(request()->query())->links() }}
                </div>
            @elseif($students->total() > 0)
                <div class="px-6 py-4 border-t border-gray-100 dark:border-gray-800">
                    <p class="text-xs text-gray-400">
                        Showing all {{ $students->total() }} {{ Str::plural('entry', $students->total()) }}
                    </p>
                </div>
            @endif
        </div>

    </div>

    <script>lucide.createIcons();</script>
@endsection