<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\ActivityLogger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function showLogin()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'txt_email'    => 'required|email',
            'txt_password' => 'required',
        ]);

        $admin = DB::table('admins')
            ->where('txt_email', $request->txt_email)
            ->first();

        if (!$admin || !Hash::check($request->txt_password, $admin->txt_password)) {
            return back()
                ->withInput($request->only('txt_email'))
                ->with('error', 'Invalid email or password.')
                ->with('active_tab', 'faculty');
        }

        if ($admin->txt_status !== 'active') {
            return back()
                ->withInput($request->only('txt_email'))
                ->with('error', 'Account inactive. Please contact the administrator.')
                ->with('active_tab', 'faculty');
        }

        DB::table('admins')
            ->where('admin_id', $admin->admin_id)
            ->update(['txt_lastlogin' => now()]);

        session([
            'admin_id'   => $admin->admin_id,
            'admin_name' => $admin->txt_fname . ' ' . $admin->txt_lname,
            'admin_role' => $admin->txt_role,
        ]);

        ActivityLogger::log(
            action: 'Logged in',
            module: 'Auth',
        );

        // Redirect based on role
        return match($admin->txt_role) {
            'admin'   => redirect()->route('admin.dashboard'),
            'faculty' => redirect()->route('Faculty.dashboard'),
            'staff'   => redirect()->route('staff.dashboard'),
            default   => redirect()->route('home'),
        };
    }

    public function logout(Request $request)
    {
        $adminId = session('admin_id');

        if ($adminId) {
            ActivityLogger::log(
                action: 'Logged out',
                module: 'Auth',
            );

            DB::table('admins')
                ->where('admin_id', $adminId)
                ->update(['txt_lastlogout' => now()]);
        }

        $request->session()->forget(['admin_id', 'admin_name', 'admin_role']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('Auth.login');
    }
}