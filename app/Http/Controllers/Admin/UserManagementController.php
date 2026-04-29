<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ActivityLogger;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function index(Request $request)
    {
        $perPage = in_array($request->per_page, [5, 10, 15, 25]) ? (int) $request->per_page : 5;

        $query = Admin::query(); // swap for your actual model

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('txt_fname', 'like', '%' . $request->search . '%')
                    ->orWhere('txt_lname', 'like', '%' . $request->search . '%')
                    ->orWhere('txt_email', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->role && $request->role !== 'all') {
            $query->where('txt_role', $request->role);
        }

        if ($request->status && $request->status !== 'all') {
            $query->where('txt_status', $request->status);
        }

        $users = $query->latest()->paginate($perPage);
        return view('admin.user_management', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'txt_fname' => 'required|string|max:45',
            'txt_lname' => 'required|string|max:45',
            'txt_email' => 'required|email|max:100|unique:admins',
            'txt_password' => 'required|string|min:6|confirmed',
            'txt_role' => 'required|in:admin,faculty,staff',
            'txt_position' => 'nullable|string|max:100',
        ]);

        Admin::create([
            'txt_fname' => $request->txt_fname,
            'txt_minitial' => $request->txt_minitial,
            'txt_lname' => $request->txt_lname,
            'txt_extension' => $request->txt_extension,
            'txt_email' => $request->txt_email,
            'txt_password' => Hash::make($request->txt_password),
            'txt_role' => $request->txt_role,
            'txt_status' => 'active',
            'txt_position' => $request->txt_position,
        ]);

        ActivityLogger::log(
            action: 'Created user account: ' . $request->txt_fname . ' ' . $request->txt_lname . ' (' . $request->txt_role . ')',
            module: 'User Management',
        );

        return redirect()->back()->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = Admin::findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = Admin::findOrFail($id);

        $request->validate([
            'txt_fname' => 'required|string|max:45',
            'txt_minitial' => 'nullable|string|max:10',
            'txt_lname' => 'required|string|max:45',
            'txt_extension' => 'nullable|string|max:10',
            'txt_email' => "required|email|max:100|unique:admins,txt_email,{$id},admin_id",
            'txt_password' => 'nullable|string|min:6|confirmed',
            'txt_role' => 'required|in:admin,faculty,staff',
            'txt_position' => 'nullable|string|max:100',
        ]);

        $user->txt_fname = $request->txt_fname;
        $user->txt_minitial = $request->txt_minitial;
        $user->txt_lname = $request->txt_lname;
        $user->txt_extension = $request->txt_extension;
        $user->txt_email = $request->txt_email;
        $user->txt_role = $request->txt_role;
        $user->txt_position = $request->txt_position;

        if ($request->txt_password) {
            $user->txt_password = Hash::make($request->txt_password);
        }

        $user->save();

        ActivityLogger::log(
            action: 'Updated user account: ' . $user->txt_fname . ' ' . $user->txt_lname . ' (' . $user->txt_role . ')',
            module: 'User Management',
        );

        return redirect()->back()->with('success', 'User updated successfully.');
    }

    public function toggleStatus($id)
    {
        $user = Admin::findOrFail($id);
        $user->txt_status = $user->txt_status == 'active' ? 'inactive' : 'active';
        $user->save();

        ActivityLogger::log(
            action: 'Set user ' . $user->txt_fname . ' ' . $user->txt_lname . ' to ' . $user->txt_status,
            module: 'User Management',
        );

        return redirect()->back()->with('success', 'User status updated.');
    }
}