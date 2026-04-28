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
            return redirect('/admin/login')->with('error', 'Please login first.');
        }

        // ✅ Allow both faculty AND admin roles
        $role = Session::get('admin_role', null);
        if (!in_array($role, ['faculty', 'admin'])) {
            return redirect('/')->with('error', 'Unauthorized access.');
        }

        return $next($request);
    }
}