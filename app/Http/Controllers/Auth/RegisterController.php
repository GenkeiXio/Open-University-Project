<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PendingUser;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    // SHOW REGISTRATION PAGE
    public function show()
    {
        return view('Auth.register');
    }

    // HANDLE FORM SUBMIT
    public function store(Request $request)
    {
        $request->validate([
            'txt_fname' => 'required',
            'txt_lname' => 'required',
            'txt_email' => 'required|email|unique:pending_users,txt_email',
        ]);

        // check email domain
        if (!str_ends_with($request->txt_email, '@bicol-u.edu.ph')) {
            return back()->with('error', 'Only bicol-u email allowed');
        }

        $token = Str::random(60);

        PendingUser::create([
            'txt_fname' => $request->txt_fname,
            'txt_minitial' => $request->txt_minitial,
            'txt_lname' => $request->txt_lname,
            'txt_extension' => $request->txt_extension,
            'txt_email' => $request->txt_email,
            'verification_token' => $token,
        ]);

        return redirect('/admin/login')->with('success','Registered! Wait for approval.');
    }
}