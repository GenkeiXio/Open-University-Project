<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Services\ActivityLogger;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    const VALID_PERMISSIONS = [
        'user_approvals',
        'student_approvals',
        'user_management',
        'student_mgmt',
        'news_management',
        'activity_logs',
    ];

    // ── GET /admin/permissions ────────────────────────────────────────────────
    public function index(Request $request)
    {
        $perPage = in_array($request->per_page, [5, 10, 15, 25]) ? (int) $request->per_page : 15;

        $query = Admin::whereIn('txt_role', ['staff', 'faculty']);

        if ($request->filled('search')) {
            $q = $request->search;
            $query->where(function ($builder) use ($q) {
                $builder->where('txt_fname', 'like', "%{$q}%")
                    ->orWhere('txt_lname', 'like', "%{$q}%")
                    ->orWhere('txt_email', 'like', "%{$q}%");
            });
        }

        if ($request->filled('role') && $request->role !== 'all') {
            $query->where('txt_role', $request->role);
        }

        $users = $query->orderBy('txt_role')->orderBy('txt_lname')->paginate($perPage);

        // Sidebar badge: staff/faculty with no permissions at all
        $pendingPermissionsCount = Admin::whereIn('txt_role', ['staff', 'faculty'])
            ->where(function ($q) {
                $q->whereNull('txt_permissions')
                    ->orWhere('txt_permissions', '[]')
                    ->orWhere('txt_permissions', '');
            })->count();

        return view('Admin.permissions', compact('users', 'pendingPermissionsCount'));
    }

    // ── POST /admin/permissions/update  (AJAX) ────────────────────────────────
    public function update(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:admins,admin_id',
            'permissions' => 'array',
            'permissions.*' => 'in:' . implode(',', self::VALID_PERMISSIONS),
        ]);

        $user = Admin::findOrFail($request->user_id);

        if (!in_array($user->txt_role, ['staff', 'faculty'])) {
            return response()->json(['message' => 'Cannot modify admin permissions here.'], 403);
        }

        $cleaned = array_values(
            array_intersect($request->permissions ?? [], self::VALID_PERMISSIONS)
        );

        $user->txt_permissions = $cleaned;   // cast handles JSON encoding
        $user->save();

        ActivityLogger::log(
            action: 'Updated permissions for ' . $user->txt_fname . ' ' . $user->txt_lname
            . ' (' . $user->txt_role . '): '
            . (count($cleaned) ? implode(', ', $cleaned) : 'none'),
            module: 'Permissions',
        );

        return response()->json([
            'message' => 'Permissions saved for ' . $user->txt_fname . '.',
        ]);
    }

    // ── POST /admin/permissions/preset ───────────────────────────────────────
    public function preset(Request $request)
    {
        $request->validate([
            'role' => 'required|in:staff,faculty,all',
            'preset' => 'required|in:approvals_only,readonly,full,none',
        ]);

        $permSet = match ($request->preset) {
            'approvals_only' => ['user_approvals', 'student_approvals'],
            'readonly' => ['activity_logs'],
            'full' => self::VALID_PERMISSIONS,
            'none' => [],
        };

        $roles = $request->role === 'all' ? ['staff', 'faculty'] : [$request->role];

        Admin::whereIn('txt_role', $roles)
            ->update(['txt_permissions' => json_encode($permSet)]);

        ActivityLogger::log(
            action: "Applied preset '{$request->preset}' to all {$request->role} accounts.",
            module: 'Permissions',
        );

        return back()->with(
            'success',
            "Preset '{$request->preset}' applied to all {$request->role} accounts."
        );
    }
}