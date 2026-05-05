<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Permission gate for Staff and Faculty users.
 *
 * Usage in routes:
 *   ->middleware('permission:user_approvals')
 *
 * Register alias in bootstrap/app.php (Laravel 11):
 *   ->withMiddleware(function (Middleware $middleware) {
 *       $middleware->alias([
 *           'permission' => \App\Http\Middleware\CheckPermission::class,
 *       ]);
 *   })
 *
 * Register alias in Kernel.php (Laravel 10) under $routeMiddleware:
 *   'permission' => \App\Http\Middleware\CheckPermission::class,
 */
class CheckPermission
{
    public function handle(Request $request, Closure $next, string $permission): Response
    {
        // Must be logged in at all
        if (!session()->has('admin_id')) {
            abort(401, 'Unauthenticated.');
        }

        $role = session('admin_role');

        // Admins always pass — they hold full access by design
        if ($role === 'admin') {
            return $next($request);
        }

        // Staff and faculty check their stored permissions array
        $perms = session('admin_permissions', []);

        // Normalise: could be JSON string if session driver serialised oddly
        if (is_string($perms)) {
            $perms = json_decode($perms, true) ?? [];
        }

        if (!is_array($perms) || !in_array($permission, $perms, true)) {
            // AJAX / fetch request → return JSON 403
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'message' => 'You do not have permission to perform this action.',
                ], 403);
            }

            abort(403, 'You do not have permission to access this section.');
        }

        return $next($request);
    }
}