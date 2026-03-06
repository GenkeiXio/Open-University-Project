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

        // ✅ Update last_login
        DB::table('admins')
            ->where('admin_id', $admin->admin_id)
            ->update(['last_login' => now()]);

        // Store session
        Session::put('admin_id', $admin->admin_id);
        Session::put('admin_name', $admin->f_name . ' ' . $admin->l_name);
        Session::put('admin_role', $admin->role);

        return redirect()->intended(route('home'));
    }

    public function logout(Request $request)
    {
        $adminId = session('admin_id');

        if ($adminId) {
            // ✅ Update last_logout
            DB::table('admins')
                ->where('admin_id', $adminId)
                ->update(['last_logout' => now()]);
        }

        // Clear session
        $request->session()->forget(['admin_id', 'admin_name', 'admin_role']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/superadmin/login');
    }
}