<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Student;
use App\Services\ActivityLogger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminLoginController extends Controller
{
    public function showLogin()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'txt_email' => 'required|email',
            'txt_password' => 'required|string',
        ]);

        // ── Try Admin / Faculty / Staff ───────────────────────────────────────
        $admin = Admin::where('txt_email', $request->txt_email)->first();

        if ($admin && Hash::check($request->txt_password, $admin->txt_password)) {

            if ($admin->txt_status !== 'active') {
                return back()
                    ->with('error', 'Your account is inactive. Contact the administrator.')
                    ->with('active_tab', 'faculty');
            }

            // Decode permissions — stored as JSON array in txt_permissions
            $permissions = $admin->txt_permissions ?? [];
            if (is_string($permissions)) {
                $permissions = json_decode($permissions, true) ?? [];
            }

            // Store everything the app needs in session
            Session::put('admin_id', $admin->admin_id);
            Session::put('admin_name', $admin->txt_fname . ' ' . $admin->txt_lname);
            Session::put('admin_email', $admin->txt_email);
            Session::put('admin_role', $admin->txt_role);
            Session::put('admin_permissions', $permissions);   // ← KEY FIX

            // Track last login
            $admin->txt_lastlogin = now();
            $admin->save();

            ActivityLogger::log(
                action: 'Logged in',
                module: 'Auth',
            );

            // Redirect by role
            return match ($admin->txt_role) {
                'admin' => redirect()->route('admin.dashboard'),
                'faculty' => redirect()->route('Faculty.dashboard'),
                'staff' => redirect()->route('staff.dashboard'),
                default => redirect('/'),
            };
        }

        return back()
            ->withInput(['txt_email' => $request->txt_email])
            ->with('error', 'Invalid email or password.')
            ->with('active_tab', 'faculty');
    }

    public function logout(Request $request)
    {
        if (session()->has('admin_id')) {
            $admin = Admin::find(session('admin_id'));
            if ($admin) {
                $admin->txt_lastlogout = now();
                $admin->save();

                ActivityLogger::log(
                    action: 'Logged out',
                    module: 'Auth',
                );
            }
        }

        Session::flush();

        return redirect()->route('Auth.login')->with('success', 'You have been signed out.');
    }
}