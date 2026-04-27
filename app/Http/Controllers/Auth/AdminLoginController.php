<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            'txt_password' => 'required'
        ]);

        $admin = DB::table('admins')
            ->where('txt_email', $request->txt_email)
            ->first();

        if (!$admin || !Hash::check($request->txt_password, $admin->txt_password)) {
            return back()->with('error', 'Invalid email or password');
        }

        if ($admin->txt_status !== 'active') {
            return back()->with('error', 'Account inactive');
        }

        // ✅ Update last_login
        DB::table('admins')
            ->where('admin_id', $admin->admin_id)
            ->update(['txt_lastlogin' => now()]);

        // ✅ STORE SESSION
        session([
            'admin_id' => $admin->admin_id,
            'admin_name' => $admin->txt_fname . ' ' . $admin->txt_lname,
            'admin_role' => $admin->txt_role,
        ]);

        return redirect('/admin/dashboard');
    }

    public function logout(Request $request)
    {
        $adminId = session('admin_id');

        if ($adminId) {
            // ✅ Update last_logout
            DB::table('admins')
                ->where('admin_id', $adminId)
                ->update(['txt_lastlogout' => now()]);
        }

        // Clear session
        $request->session()->forget(['admin_id', 'admin_name', 'admin_role']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}