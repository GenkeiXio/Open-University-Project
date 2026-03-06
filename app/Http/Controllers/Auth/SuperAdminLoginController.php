<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SuperAdminLoginController extends Controller
{
    public function showLogin()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // 1. Check admins table
        $admin = DB::table('admins')->where('username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            if ($admin->status !== 'active') {
                return back()->with('error', 'Account is inactive.');
            }

        // Store session
        Session::put('admin_id', $admin->admin_id);
        Session::put('admin_name', $admin->f_name . ' ' . $admin->l_name);
        Session::put('admin_role', $admin->role);

        // 🔥 ROLE BASED REDIRECT
        // once logged in we no longer send admins off to the dashboard automatically
        // instead stay on the homepage so the user can keep browsing the public site
        // and access the dashboard via a button in the navbar.
        if ($admin->role === 'super admin') {
            // stay on the public site after login
            return redirect()->intended(route('home'));
        }

        if ($admin->role === 'faculty') {
            // faculty users should follow the same pattern as super admins
            // keep them on the public site and let them navigate to the dashboard
            // via the navbar or a button. this fixes the prior behaviour where
            // faculty were automatically redirected immediately upon login.
            return redirect()->intended(route('home'));
        }

        return back()->with('error', 'Unauthorized role.');
    }

    public function logout(Request $request)
    {
        // Clear the custom session keys we set during login
        session()->forget(['admin_id', 'admin_name', 'admin_role']);
        // compatibility with legacy names (if any were used elsewhere)
        session()->forget('superadmin');
        session()->forget('superadmin_name');

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/superadmin/login');
    }
}