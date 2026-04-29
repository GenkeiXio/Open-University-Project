@extends('Admin.adminlayout')

@section('title', 'Activity Logs')

@section('content')
    <div class="w-full px-4 sm:px-6 lg:px-8 py-6">

        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Activity Logs</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1 text-sm">
                A full record of every action taken across the BUOU platform.
            </p>
        </div>

        <form method="GET" action="{{ route('admin.logs') }}" class="flex flex-wrap gap-3 mb-6">

            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name or action..." class="border border-gray-300 dark:border-gray-700 rounded-xl px-4 py-2 text-sm
                           bg-white dark:bg-gray-800 dark:text-gray-200
                           focus:outline-none focus:ring-2 focus:ring-emerald-400 w-60">

            <select name="role" class="border border-gray-300 dark:border-gray-700 rounded-xl px-4 py-2 text-sm
                           bg-white dark:bg-gray-800 dark:text-gray-200 focus:outline-none">
                <option value="all">All Roles</option>
                <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="faculty" {{ request('role') === 'faculty' ? 'selected' : '' }}>Faculty</option>
                <option value="staff" {{ request('role') === 'staff' ? 'selected' : '' }}>Staff</option>
                <option value="student" {{ request('role') === 'student' ? 'selected' : '' }}>Student</option>
            </select>

            <select name="module" class="border border-gray-300 dark:border-gray-700 rounded-xl px-4 py-2 text-sm
                           bg-white dark:bg-gray-800 dark:text-gray-200 focus:outline-none">
                <option value="all">All Modules</option>
                @foreach($modules as $mod)
                    <option value="{{ $mod }}" {{ request('module') === $mod ? 'selected' : '' }}>
                        {{ $mod }}
                    </option>
                @endforeach
            </select>

            <!-- PER PAGE -->
            <select name="per_page" class="border border-gray-300 dark:border-gray-700 rounded-xl px-4 py-2 text-sm
                           bg-white dark:bg-gray-800 dark:text-gray-200 focus:outline-none">
                @foreach([5, 10, 15, 25] as $size)
                    <option value="{{ $size }}" {{ request('per_page', 5) == $size ? 'selected' : '' }}>
                        {{ $size }} per page
                    </option>
                @endforeach
            </select>

            <button type="submit"
                class="px-5 py-2 bg-emerald-600 text-white rounded-xl text-sm hover:bg-emerald-700 transition">
                Filter
            </button>

            <a href="{{ route('admin.logs') }}" class="px-5 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200
                           rounded-xl text-sm hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                Reset
            </a>
        </form>

        <div
            class="bg-white dark:bg-[#1e293b] rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead
                        class="bg-gray-50 dark:bg-gray-800 text-gray-500 dark:text-gray-400 text-xs uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-4">Timestamp</th>
                            <th class="px-6 py-4">Who</th>
                            <th class="px-6 py-4">Role</th>
                            <th class="px-6 py-4">Module</th>
                            <th class="px-6 py-4">Action</th>
                            <th class="px-6 py-4">IP Address</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                        @forelse($logs as $log)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition">
                                <td class="px-6 py-3 text-gray-400 whitespace-nowrap text-xs">
                                    {{ $log->created_at->format('M d, Y h:i A') }}
                                </td>
                                <td class="px-6 py-3 font-medium text-gray-800 dark:text-gray-200 whitespace-nowrap">
                                    {{ $log->actor_name }}
                                </td>
                                <td class="px-6 py-3">
                                    @php
                                        $badge = match ($log->actor_role) {
                                            'admin' => 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900 dark:text-emerald-300',
                                            'faculty' => 'bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-300',
                                            'staff' => 'bg-amber-100 text-amber-700 dark:bg-amber-900 dark:text-amber-300',
                                            'student' => 'bg-violet-100 text-violet-700 dark:bg-violet-900 dark:text-violet-300',
                                            default => 'bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-300',
                                        };
                                    @endphp
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $badge }}">
                                        {{ ucfirst($log->actor_role) }}
                                    </span>
                                </td>
                                <td class="px-6 py-3 text-gray-500 dark:text-gray-400 whitespace-nowrap">{{ $log->module }}</td>
                                <td class="px-6 py-3 text-gray-700 dark:text-gray-300">{{ $log->action }}</td>
                                <td class="px-6 py-3 text-gray-400 text-xs font-mono">{{ $log->ip_address }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-16 text-center text-gray-400">
                                    No activity logs found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination footer --}}
            @if($logs->hasPages())
                <div
                    class="px-6 py-4 border-t border-gray-100 dark:border-gray-700 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <p class="text-xs text-gray-400">
                        Showing {{ $logs->firstItem() }}–{{ $logs->lastItem() }} of {{ $logs->total() }} entries
                    </p>
                    {{ $logs->appends(request()->query())->links() }}
                </div>
            @elseif($logs->total() > 0)
                <div class="px-6 py-4 border-t border-gray-100 dark:border-gray-700">
                    <p class="text-xs text-gray-400">
                        Showing all {{ $logs->total() }} {{ Str::plural('entry', $logs->total()) }}
                    </p>
                </div>
            @endif
        </div>

    </div>
@endsection