<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PendingUser;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
            'txt_fname' => 'required|string|max:45',
            'txt_lname' => 'required|string|max:45',
            'txt_email' => 'required|email|max:100|unique:pending_users,txt_email',
            'txt_password' => 'required|string|min:6|confirmed',
        ]);

        $token = Str::random(60);

        PendingUser::create([
            'txt_fname' => $request->txt_fname,
            'txt_lname' => $request->txt_lname,
            'txt_email' => $request->txt_email,
            'txt_password' => Hash::make($request->txt_password),
            'status' => 'pending'
        ]);

        return redirect('/admin/login')->with('success','Registered! Wait for approval.');
    }
}