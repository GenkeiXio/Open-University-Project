<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth; //


class FacultyController extends Controller
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

        $faculty = DB::table('faculty')
            ->where('username', $request->username)
            ->first();

        if (!$faculty || !Hash::check($request->password, $faculty->password)) {
            return back()->with('error', 'Invalid username or password');
        }

        if ($faculty->status !== 'active') {
            return back()->with('error', 'Account is inactive. Contact administrator.');
        }

        // Store session
        Session::put('faculty_id', $faculty->faculty_id);
        Session::put('faculty_name', $faculty->f_name . ' ' . $faculty->l_name);
        Session::put('faculty_role', $faculty->role);

        // 🔥 ROLE BASED REDIRECT
        if ($faculty->role === 'faculty') {
            return redirect('/Faculty/faculty');
        }

        return back()->with('error', 'Unauthorized role.');
    }
}
