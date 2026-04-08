<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function index(Request $request)
    {
        $query = Admin::query();

        // SEARCH
        if ($request->search) {
            $query->where(function($q) use ($request){
                $q->where('txt_fname','like','%'.$request->search.'%')
                  ->orWhere('txt_lname','like','%'.$request->search.'%')
                  ->orWhere('txt_email','like','%'.$request->search.'%');
            });
        }

        // ROLE FILTER
        if ($request->role && $request->role != 'all') {
            $query->where('txt_role',$request->role);
        }

        // STATUS FILTER
        if ($request->status && $request->status != 'all') {
            $query->where('txt_status',$request->status);
        }

        $users = $query->orderBy('admin_id','desc')->get();

        return view('Admin.user_management', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'txt_fname' => 'required|string|max:45',
            'txt_lname' => 'required|string|max:45',
            'txt_email' => 'required|email|max:100|unique:admins',
            'txt_password' => 'required|string|min:6|confirmed',
            'txt_role'=>'required|in:admin,faculty,staff',
            'txt_position' => 'nullable|string|max:100', // NEW VALIDATION
        ]);

        Admin::create([
            'txt_fname' => $request->txt_fname,
            'txt_minitial' => $request->txt_minitial, // ✅ ADD
            'txt_lname' => $request->txt_lname,
            'txt_extension' => $request->txt_extension, // ✅ ADD
            'txt_email' => $request->txt_email,
            'txt_password' => Hash::make($request->txt_password),
            'txt_role' => $request->txt_role,
            'txt_status' => 'active',
            'txt_position' => $request->txt_position // NEW FIELD
        ]);

        return redirect()->back()->with('success','User created successfully.');
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
            'txt_minitial' => 'nullable|string|max:10', // ✅ ADD
            'txt_lname' => 'required|string|max:45',
            'txt_extension' => 'nullable|string|max:10', // ✅ ADD
            'txt_email' => "required|email|max:100|unique:admins,txt_email,{$id},admin_id",
            'txt_password' => 'nullable|string|min:6|confirmed', // NULLABLE for updates
            'txt_role' => 'required|in:admin,faculty,staff',
            'txt_position' => 'nullable|string|max:100', // NEW VALIDATION
        ]);

        $user->txt_fname = $request->txt_fname;
        $user->txt_minitial = $request->txt_minitial; // ✅ ADD
        $user->txt_lname = $request->txt_lname;
        $user->txt_extension = $request->txt_extension; // ✅ ADD
        $user->txt_email = $request->txt_email;
        $user->txt_role = $request->txt_role;
        $user->txt_position = $request->txt_position; // NEW FIELD

        if($request->txt_password){
            $user->txt_password = Hash::make($request->txt_password);
        }

        $user->save();

        return redirect()->back()->with('success','User updated successfully.');
    }

    public function toggleStatus($id)
    {
        $user = Admin::findOrFail($id);
        $user->txt_status = $user->txt_status == 'active' ? 'inactive':'active';
        $user->save();

        return redirect()->back()->with('success','User status updated.');
    }
}