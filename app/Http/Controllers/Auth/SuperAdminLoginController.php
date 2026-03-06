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

        // 1. Check admins table
        $admin = DB::table('admins')->where('username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            if ($admin->status !== 'active') {
                return back()->with('error', 'Account is inactive.');
            }

            // Aligning keys with your Middleware
            Session::put('admin_id', $admin->admin_id); 
            Session::put('admin_name', $admin->f_name . ' ' . $admin->l_name);
            Session::put('admin_role', $admin->role);
            
            Session::save();

            // Specific redirects based on role
            if ($admin->role === 'super admin') {
                return redirect()->route('home');
            } elseif ($admin->role === 'faculty') {
                return redirect()->route('home');
            }
        }

        // 2. Check users table
        $user = DB::table('users')->where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('user_id', $user->user_id); 
            Session::put('name', $user->f_name . ' ' . $user->l_name);

            Session::save(); 
            return redirect()->route('home'); 
        }

        return back()->with('error', 'Invalid username or password');
    }

    public function logout(Request $request)
    {
        Session::flush(); // Wipes all custom session keys at once
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/superadmin/login');
    }
}