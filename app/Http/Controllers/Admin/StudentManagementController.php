<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Services\ActivityLogger;
use Illuminate\Http\Request;

class StudentManagementController extends Controller
{
    public function index(Request $request)
    {
        $perPage = in_array($request->per_page, [5, 10, 15, 25]) ? (int) $request->per_page : 5;

        $query = Student::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('txt_fname', 'like', '%' . $request->search . '%')
                    ->orWhere('txt_lname', 'like', '%' . $request->search . '%')
                    ->orWhere('txt_email', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->status && $request->status !== 'all') {
            $query->where('txt_status', $request->status);
        }

        $students = $query->latest()->paginate($perPage);
        return view('Admin.student_management', compact('students'));
    }

    public function toggleStatus($id)
    {
        $student = Student::findOrFail($id);
        $student->txt_status = $student->txt_status == 'active' ? 'inactive' : 'active';
        $student->save();

        ActivityLogger::log(
            action: 'Set student ' . $student->txt_fname . ' ' . $student->txt_lname . ' to ' . $student->txt_status,
            module: 'Student Management',
        );

        return back()->with('success', 'Student status updated.');
    }
}