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

        // Allow username OR email login
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

    public function logout()
    {
        Session::flush();
        return redirect('/superadmin/login');
    }
}