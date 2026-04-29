<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PendingStudent;
use App\Models\Student;
use App\Services\ActivityLogger;
use Illuminate\Http\Request;

class PendingStudentController extends Controller
{
    public function index(Request $request)
    {
        $perPage = in_array($request->per_page, [5, 10, 15, 25]) ? (int) $request->per_page : 5;
        $students = PendingStudent::latest()->paginate($perPage);
        return view('Admin.pending_students', compact('students'));
    }

    public function approve($id)
    {
        $pending = PendingStudent::findOrFail($id);

        Student::create([
            'txt_fname' => $pending->txt_fname,
            'txt_lname' => $pending->txt_lname,
            'txt_email' => $pending->txt_email,
            'txt_password' => $pending->txt_password,
            'txt_status' => 'active',
        ]);

        $pending->update(['status' => 'approved']);

        ActivityLogger::log(
            action: 'Approved student account: ' . $pending->txt_fname . ' ' . $pending->txt_lname,
            module: 'Student Approvals',
        );

        return back()->with('success', 'Student approved successfully.');
    }

    public function reject($id)
    {
        $pending = PendingStudent::findOrFail($id);
        $pending->update(['status' => 'rejected']);

        ActivityLogger::log(
            action: 'Rejected student account: ' . $pending->txt_fname . ' ' . $pending->txt_lname,
            module: 'Student Approvals',
        );

        return back()->with('success', 'Student registration rejected.');
    }
}