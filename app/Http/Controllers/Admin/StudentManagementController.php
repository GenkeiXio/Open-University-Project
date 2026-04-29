<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentManagementController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('txt_fname', 'like', '%' . $request->search . '%')
                    ->orWhere('txt_lname', 'like', '%' . $request->search . '%')
                    ->orWhere('txt_email', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->status && $request->status != 'all') {
            $query->where('txt_status', $request->status);
        }

        $students = $query->latest()->get();

        return view('Admin.student_management', compact('students'));
    }

    public function toggleStatus($id)
    {
        // If your primary key is student_id, use findOrFail with the correct key
        $student = Student::findOrFail($id);
        $student->txt_status = $student->txt_status == 'active' ? 'inactive' : 'active';
        $student->save();

        return back()->with('success', 'Student status updated.');
    }
}