@extends('admin.adminlayout')

@section('content')

<div class="p-6">

    <h1 class="text-2xl font-bold mb-4">User Approvals</h1>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white dark:bg-[#1e293b] rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-50 dark:bg-gray-800 text-gray-600 dark:text-gray-400">
                    <tr>
                        <th class="p-3">Name</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Action</th>
                    </tr>
                </thead>

                <tbody class="text-gray-700 dark:text-gray-300">
                    @forelse($users as $user)
                        <tr class="border-t border-gray-100 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                            <td class="px-6 py-4">
                                {{ $user->txt_fname }}
                                {{ $user->txt_minitial ? $user->txt_minitial.'.' : '' }}
                                {{ $user->txt_lname }}
                            </td>

                            <td class="p-3">{{ $user->txt_email }}</td>

                            <td class="p-3 flex gap-2">
                                <form method="POST" action="{{ route('admin.pending.approve', $user->pending_id) }}" class="flex gap-2">
                                    @csrf

                                    <!-- ROLE SELECT -->
                                    <select name="txt_role" required class="border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded px-2 py-1 text-sm">
                                        <option value="">Select Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="faculty">Faculty</option>
                                        <option value="staff">Staff</option>
                                    </select>

                                    <!-- APPROVE BUTTON -->
                                    <button class="bg-green-500 text-white px-3 py-1 rounded text-xs hover:bg-green-600">
                                        Approve
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('admin.pending.reject', $user->pending_id) }}">
                                    @csrf
                                    <button class="bg-red-500 text-white px-3 py-1 rounded">Reject</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-6 text-gray-500 dark:text-gray-400">
                                No pending users
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div> <!-- overflow-x-auto -->
    </div> <!-- card container -->

</div> <!-- p-6 -->

@endsection