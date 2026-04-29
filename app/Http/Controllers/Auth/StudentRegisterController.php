<?php

// ============================================================
// FILE PATH: app/Http/Controllers/Auth/StudentRegisterController.php
// ============================================================

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PendingStudent;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentRegisterController extends Controller
{
    // HANDLE STUDENT REGISTRATION FORM SUBMIT
    // Called via POST /student/register from the shared register.blade.php
    public function store(Request $request)
    {
        $request->validate([
            'txt_fname' => 'required|string|max:45',
            'txt_lname' => 'required|string|max:45',
            'txt_email' => 'required|email|max:100|unique:pending_students,txt_email',
            'txt_password' => 'required|string|min:6|confirmed',
        ]);

        // Block if already an approved student
        if (Student::where('txt_email', $request->txt_email)->exists()) {
            return back()
                ->withInput()
                ->with('error', 'An account with this email already exists.')
                ->with('active_role', 'student');
        }

        PendingStudent::create([
            'txt_fname' => $request->txt_fname,
            'txt_lname' => $request->txt_lname,
            'txt_email' => $request->txt_email,
            'txt_password' => Hash::make($request->txt_password),
            'status' => 'pending',
        ]);

        return redirect()->route('Auth.login')
            ->with('success', 'Registration submitted! Please wait for admin approval before signing in.');
    }
}