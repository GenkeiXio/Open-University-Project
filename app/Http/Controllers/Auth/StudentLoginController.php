<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\ActivityLogger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentLoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'txt_email' => 'required|email',
            'txt_password' => 'required',
        ]);

        $student = DB::table('students')
            ->where('txt_email', $request->txt_email)
            ->first();

        if (!$student || !Hash::check($request->txt_password, $student->txt_password)) {
            return redirect()->route('Auth.login')
                ->withInput($request->only('txt_email'))
                ->with('error', 'Invalid email or password.')
                ->with('active_tab', 'student');
        }

        if ($student->txt_status !== 'active') {
            return redirect()->route('Auth.login')
                ->withInput($request->only('txt_email'))
                ->with('error', 'Your account is inactive. Please contact the administrator.')
                ->with('active_tab', 'student');
        }

        DB::table('students')
            ->where('student_id', $student->student_id)
            ->update(['txt_lastlogin' => now()]);

        session([
            'student_id' => $student->student_id,
            'student_name' => $student->txt_fname . ' ' . $student->txt_lname,
            'student_email' => $student->txt_email,
        ]);

        ActivityLogger::log(
            action: 'Logged in',
            module: 'Auth',
        );

        return redirect()->route('student.dashboard');
    }

    public function logout(Request $request)
    {
        $studentId = session('student_id');

        if ($studentId) {
            ActivityLogger::log(
                action: 'Logged out',
                module: 'Auth',
            );

            DB::table('students')
                ->where('student_id', $studentId)
                ->update(['txt_lastlogout' => now()]);
        }

        $request->session()->forget(['student_id', 'student_name', 'student_email']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('Auth.login');
    }
}