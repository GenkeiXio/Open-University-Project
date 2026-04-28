{{-- resources/views/Admin/pending_students.blade.php --}}
@extends('Admin.layouts.app') {{-- adjust to your actual admin layout --}}

@section('title', 'Pending Student Registrations')

@section('content')
    <div class="content-header">
        <h2>Pending Student Registrations</h2>
        <p class="text-muted">Review and approve or reject student account requests.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-card">
        <table class="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Submitted</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->txt_fname }} {{ $student->txt_lname }}</td>
                        <td>{{ $student->txt_email }}</td>
                        <td>{{ $student->created_at->format('M d, Y h:i A') }}</td>
                        <td class="action-btns">

                            {{-- APPROVE --}}
                            <form method="POST"
                                  action="{{ route('admin.pending-students.approve', $student->pending_student_id) }}"
                                  style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm"
                                        onclick="return confirm('Approve this student?')">
                                    <i class="fa-solid fa-check"></i> Approve
                                </button>
                            </form>

                            {{-- REJECT --}}
                            <form method="POST"
                                  action="{{ route('admin.pending-students.reject', $student->pending_student_id) }}"
                                  style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Reject this student?')">
                                    <i class="fa-solid fa-xmark"></i> Reject
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align:center; color:#6b7f93; padding:2rem;">
                            No pending student registrations.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection