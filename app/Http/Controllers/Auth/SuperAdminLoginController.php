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

        $admin = DB::table('admins')
            ->where('username', $request->username)
            ->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->with('error', 'Invalid username or password');
        }

        if ($admin->status !== 'active') {
            return back()->with('error', 'Account is inactive. Contact administrator.');
        }

        // Store session
        Session::put('admin_id', $admin->admin_id);
        Session::put('admin_name', $admin->f_name . ' ' . $admin->l_name);
        Session::put('admin_role', $admin->role);

        // 🔥 ROLE BASED REDIRECT
        if ($admin->role === 'super admin') {
            return redirect('/Super-Admin/super_admin');
        }

        if ($admin->role === 'faculty') {
            return redirect()->route('Faculty.faculty');
        }

        return back()->with('error', 'Unauthorized role.');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/superadmin/login');
    }
}