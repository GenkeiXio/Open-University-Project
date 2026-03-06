<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Check for the user_id session we set in the controller
        if (!Session::has('user_id')) {
            return redirect('/superadmin/login')->with('error', 'Please login first.');
        }

        return $next($request);
    }
}