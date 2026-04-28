<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PendingStudent;
use App\Models\Student;
use Illuminate\Http\Request;

class PendingStudentController extends Controller
{
    // SHOW PENDING STUDENTS
    public function index()
    {
        $students = PendingStudent::where('status', 'pending')->latest()->get();

        return view('Admin.pending_students', compact('students'));
    }

    // APPROVE STUDENT — moves record to students table
    public function approve($id)
    {
        $pending = PendingStudent::findOrFail($id);

        Student::create([
            'txt_fname' => $pending->txt_fname,
            'txt_lname' => $pending->txt_lname,
            'txt_email' => $pending->txt_email,
            'txt_password' => $pending->txt_password, // already hashed
            'txt_status' => 'active',
        ]);

        $pending->update(['status' => 'approved']);

        return back()->with('success', 'Student approved successfully.');
    }

    // REJECT STUDENT
    public function reject($id)
    {
        $pending = PendingStudent::findOrFail($id);
        $pending->update(['status' => 'rejected']);

        return back()->with('success', 'Student registration rejected.');
    }
}