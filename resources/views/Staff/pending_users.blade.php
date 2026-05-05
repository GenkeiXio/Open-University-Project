@extends('Staff.layout')

@section('title', 'User Approvals')

@section('content')
    <div class="w-full px-4 sm:px-6 lg:px-8 py-6">

        {{-- ── Header ── --}}
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">User Approvals</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1 text-sm">
                Review and approve or reject faculty and staff account requests.
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
                            <th class="px-6 py-4">Name</th>
                            <th class="px-6 py-4">Email</th>
                            <th class="px-6 py-4">Submitted</th>
                            <th class="px-6 py-4">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                        @forelse($users as $user)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition">

                                {{-- Name --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-xl flex items-center justify-center
                                                        font-bold text-xs flex-shrink-0
                                                        bg-violet-100 dark:bg-violet-900/30
                                                        text-violet-700 dark:text-violet-300">
                                            {{ strtoupper(substr($user->txt_fname, 0, 1) . substr($user->txt_lname, 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-800 dark:text-gray-200">
                                                {{ $user->txt_fname }}
                                                {{ $user->txt_minitial ? $user->txt_minitial . '.' : '' }}
                                                {{ $user->txt_lname }}
                                                {{ $user->txt_extension ?? '' }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                {{-- Email --}}
                                <td class="px-6 py-4 text-gray-500 dark:text-gray-400">
                                    {{ $user->txt_email }}
                                </td>

                                {{-- Submitted --}}
                                <td class="px-6 py-4 text-gray-500 dark:text-gray-400 whitespace-nowrap">
                                    {{ $user->created_at->format('M d, Y h:i A') }}
                                </td>

                                {{-- Actions --}}
                                <td class="px-6 py-4">
                                    <form method="POST" action="{{ route('staff.pending.approve', $user->pending_id) }}"
                                        class="flex items-center gap-2 flex-wrap">
                                        @csrf

                                        <select name="txt_role" required class="border border-gray-300 dark:border-gray-700
                                                       bg-white dark:bg-gray-800
                                                       text-gray-700 dark:text-gray-300
                                                       rounded-xl px-3 py-1.5 text-xs
                                                       focus:outline-none focus:ring-2 focus:ring-violet-400">
                                            <option value="">Select Role</option>
                                            <option value="faculty">Faculty</option>
                                            <option value="staff">Staff</option>
                                        </select>

                                        <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl
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

                                    <form method="POST" action="{{ route('staff.pending.reject', $user->pending_id) }}"
                                        class="mt-2">
                                        @csrf
                                        <button type="submit" onclick="return confirm('Reject this user?')" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl
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
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-16 text-center text-gray-400 dark:text-gray-500">
                                    <div class="flex flex-col items-center gap-2">
                                        <i data-lucide="user-check" class="w-8 h-8 text-gray-300 dark:text-gray-600"></i>
                                        <p class="text-sm font-semibold">No pending user approvals</p>
                                        <p class="text-xs">All faculty and staff requests have been processed.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- ── Pagination footer ── --}}
            @if($users->hasPages())
                <div class="px-6 py-4 border-t border-gray-100 dark:border-gray-800
                                flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <p class="text-xs text-gray-400">
                        Showing {{ $users->firstItem() }}–{{ $users->lastItem() }}
                        of {{ $users->total() }} entries
                    </p>
                    {{ $users->appends(request()->query())->links() }}
                </div>
            @elseif($users->total() > 0)
                <div class="px-6 py-4 border-t border-gray-100 dark:border-gray-800">
                    <p class="text-xs text-gray-400">
                        Showing all {{ $users->total() }} {{ Str::plural('entry', $users->total()) }}
                    </p>
                </div>
            @endif
        </div>

    </div>

    <script>lucide.createIcons();</script>
@endsection