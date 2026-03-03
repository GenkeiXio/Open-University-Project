<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth; // Recommended to have this ready
use Symfony\Component\HttpFoundation\Response;

class SuperAdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Check for the session key your SuperAdminLoginController creates
        if (!Session::has('admin_id')) {
            return redirect('/superadmin/login')->with('error', 'Please login first.');
        }

        return $next($request);
    }
}