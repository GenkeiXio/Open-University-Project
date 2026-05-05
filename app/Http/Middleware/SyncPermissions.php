<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Admin;
use Symfony\Component\HttpFoundation\Response;

/**
 * Keeps session('admin_permissions') in sync with the database on every
 * request for staff and faculty users.
 *
 * This means an admin can grant/revoke permissions and the change takes
 * effect on the staff member's NEXT page load — no logout required.
 *
 * Register in bootstrap/app.php inside the 'staff' middleware group,
 * or append it to the staff route group.
 */
class SyncPermissions
{
    public function handle(Request $request, Closure $next): Response
    {
        $adminId = session('admin_id');
        $role = session('admin_role');

        if ($adminId && in_array($role, ['staff', 'faculty'], true)) {
            $user = Admin::find($adminId);

            if ($user) {
                // Re-read permissions fresh from DB
                $perms = $user->txt_permissions ?? [];
                if (is_string($perms)) {
                    $perms = json_decode($perms, true) ?? [];
                }

                // Overwrite whatever was in the session
                session(['admin_permissions' => $perms]);
            }
        }

        return $next($request);
    }
}