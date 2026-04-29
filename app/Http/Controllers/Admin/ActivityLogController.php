<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index(Request $request)
    {
        $perPage = in_array($request->per_page, [5, 10, 15, 25]) ? (int) $request->per_page : 5;

        $query = ActivityLog::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('actor_name', 'like', '%' . $request->search . '%')
                    ->orWhere('action', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->role && $request->role !== 'all') {
            $query->where('actor_role', $request->role);
        }

        if ($request->module && $request->module !== 'all') {
            $query->where('module', $request->module);
        }

        $logs = $query->latest()->paginate($perPage);
        $modules = ActivityLog::distinct()->pluck('module');
        return view('Admin.activity_logs', compact('logs', 'modules'));
    }
}