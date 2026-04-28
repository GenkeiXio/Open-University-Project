{{-- resources/views/Admin/pending_students.blade.php --}}
@extends('Admin.adminlayout')   {{-- was: Admin.layouts.app --}}

@section('title', 'Pending Student Registrations')

@section('content')
    <div class="p-6">

        <h1 class="text-2xl font-bold mb-4">Pending Student Registrations</h1>
        <p class="text-gray-500 dark:text-gray-400 mb-6">Review and approve or reject student account requests.</p>

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
                            <th class="p-3">#</th>
                            <th class="p-3">Name</th>
                            <th class="p-3">Email</th>
                            <th class="p-3">Submitted</th>
                            <th class="p-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 dark:text-gray-300">
                        @forelse($students as $student)
                            <tr class="border-t border-gray-100 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                                <td class="p-3">{{ $loop->iteration }}</td>
                                <td class="p-3">{{ $student->txt_fname }} {{ $student->txt_lname }}</td>
                                <td class="p-3">{{ $student->txt_email }}</td>
                                <td class="p-3">{{ $student->created_at->format('M d, Y h:i A') }}</td>
                                <td class="p-3 flex gap-2">

                                    {{-- APPROVE --}}
                                    <form method="POST"
                                          action="{{ route('admin.pending-students.approve', $student->pending_student_id) }}"
                                          style="display:inline;">
                                        @csrf
                                        <button type="submit"
                                                onclick="return confirm('Approve this student?')"
                                                class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs">
                                            <i class="fa-solid fa-check"></i> Approve
                                        </button>
                                    </form>

                                    {{-- REJECT --}}
                                    <form method="POST"
                                          action="{{ route('admin.pending-students.reject', $student->pending_student_id) }}"
                                          style="display:inline;">
                                        @csrf
                                        <button type="submit"
                                                onclick="return confirm('Reject this student?')"
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">
                                            <i class="fa-solid fa-xmark"></i> Reject
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-6 text-gray-500 dark:text-gray-400">
                                    No pending student registrations.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection