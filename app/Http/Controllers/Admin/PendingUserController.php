<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PendingUser;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PendingUserController extends Controller
{
    // SHOW PENDING USERS
    public function index()
    {
        $users = PendingUser::where('status', 'pending')->latest()->get();

        return view('Admin.pending_users', compact('users'));
    }

    // APPROVE USER
    public function approve(Request $request, $id)
    {
        $request->validate([
            'txt_role' => 'required|in:admin,faculty,staff'
        ]);

        $pending = PendingUser::findOrFail($id);

        Admin::create([
            'txt_fname' => $pending->txt_fname,
            'txt_lname' => $pending->txt_lname,
            'txt_email' => $pending->txt_email,
            'txt_password' => $pending->txt_password,
            'txt_role' => $request->txt_role, // ✅ dynamic role
            'txt_status' => 'active'
        ]);

        $pending->update([
            'status' => 'approved'
        ]);

        return back()->with('success', 'User approved successfully.');
    }

    // REJECT USER
    public function reject($id)
    {
        $pending = PendingUser::findOrFail($id);

        $pending->update([
            'status' => 'rejected'
        ]);

        return back()->with('success', 'User rejected.');
    }
}