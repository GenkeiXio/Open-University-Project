<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class FacultyMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Require a logged-in admin
        if (!Session::has('admin_id')) {
            return redirect('/superadmin/login')->with('error', 'Please login first.');
        }

        // Ensure the admin has the faculty role
        $role = Session::get('admin_role', null);
        if ($role !== 'faculty') {
            return redirect('/')->with('error', 'Unauthorized access.');
        }

        return $next($request);
    }
}
