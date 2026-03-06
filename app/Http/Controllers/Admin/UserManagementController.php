<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuperAdmin;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function index(Request $request)
    {
        $query = SuperAdmin::query();

        // SEARCH
        if ($request->search) {
            $query->where(function($q) use ($request){
                $q->where('f_name','like','%'.$request->search.'%')
                  ->orWhere('l_name','like','%'.$request->search.'%')
                  ->orWhere('username','like','%'.$request->search.'%');
            });
        }

        // ROLE FILTER
        if ($request->role && $request->role != 'all') {
            $query->where('role',$request->role);
        }

        // STATUS FILTER
        if ($request->status && $request->status != 'all') {
            $query->where('status',$request->status);
        }

        $users = $query->orderBy('admin_id','desc')->get();

        return view('Super-Admin.user_management', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'f_name' => 'required|string|max:45',
            'l_name' => 'required|string|max:45',
            'username' => 'required|string|max:45|unique:admins',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:super admin,admin,faculty',
        ]);

        SuperAdmin::create([
            'f_name'=>$request->f_name,
            'l_name'=>$request->l_name,
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
            'role'=>$request->role,
            'status'=>'active'
        ]);

        return redirect()->back()->with('success','User created successfully.');
    }

    public function edit($id)
    {
        $user = SuperAdmin::findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = SuperAdmin::findOrFail($id);

        $request->validate([
            'f_name'=>'required|string|max:45',
            'l_name'=>'required|string|max:45',
            'username'=>'required|string|max:45|unique:admins,username,'.$id.',admin_id',
            'role'=>'required|in:super admin,admin,faculty',
            'password'=>'nullable|string|min:6|confirmed'
        ]);

        $user->f_name=$request->f_name;
        $user->l_name=$request->l_name;
        $user->username=$request->username;
        $user->role=$request->role;

        if($request->password){
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success','User updated successfully.');
    }

    public function toggleStatus($id)
    {
        $user = SuperAdmin::findOrFail($id);
        $user->status = $user->status == 'active' ? 'inactive':'active';
        $user->save();

        return redirect()->back()->with('success','User status updated.');
    }
}