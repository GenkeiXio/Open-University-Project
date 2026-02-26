<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth; //

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

        $admin = DB::table('admins')
            ->where('username', $request->username)
            ->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->with('error', 'Invalid username or password');
        }

        // Store session
        Session::put('superadmin', $admin->admin_id);
        Session::put('superadmin_name', $admin->f_name . ' ' . $admin->l_name);

        return redirect('/Super-Admin/super_admin');
    }

    public function logout(Request $request)
    {
        // Clear your custom sessions
        session()->forget('superadmin');
        session()->forget('superadmin_name');

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/superadmin/login');
    }
}