<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\SuperAdmin;
use Illuminate\Support\Facades\Session;

class SuperAdminLoginController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $admin = SuperAdmin::where('username', $request->username)
            ->where('status', 'active')
            ->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->with('error', 'Invalid credentials');
        }

        Session::put('superadmin', $admin);

        return redirect('/superadmin/dashboard');
    }
}
