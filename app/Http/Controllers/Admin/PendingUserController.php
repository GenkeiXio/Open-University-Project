<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PendingUser;
use App\Models\Admin;
use App\Services\ActivityLogger;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PendingUserController extends Controller
{
    public function index(Request $request)
    {
        $perPage = in_array($request->per_page, [5, 10, 15, 25]) ? (int) $request->per_page : 5;
        $users = PendingUser::latest()->paginate($perPage);
        return view('admin.pending_users', compact('users'));
    }

    public function approve(Request $request, $id)
    {
        $request->validate([
            'txt_role' => 'required|in:admin,faculty,staff',
        ]);

        $pending = PendingUser::findOrFail($id);

        Admin::create([
            'txt_fname' => $pending->txt_fname,
            'txt_lname' => $pending->txt_lname,
            'txt_email' => $pending->txt_email,
            'txt_password' => $pending->txt_password,
            'txt_role' => $request->txt_role,
            'txt_status' => 'active',
        ]);

        $pending->update(['status' => 'approved']);

        ActivityLogger::log(
            action: 'Approved faculty/staff account: ' . $pending->txt_fname . ' ' . $pending->txt_lname . ' (' . $request->txt_role . ')',
            module: 'User Approvals',
        );

        return back()->with('success', 'User approved successfully.');
    }

    public function reject($id)
    {
        $pending = PendingUser::findOrFail($id);
        $pending->update(['status' => 'rejected']);

        ActivityLogger::log(
            action: 'Rejected faculty/staff account: ' . $pending->txt_fname . ' ' . $pending->txt_lname,
            module: 'User Approvals',
        );

        return back()->with('success', 'User rejected.');
    }
}