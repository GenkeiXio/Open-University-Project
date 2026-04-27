<?php

namespace App\Http\Middleware; //

use Closure; //
use Illuminate\Http\Request; //
use Illuminate\Support\Facades\Session; //
use Symfony\Component\HttpFoundation\Response; //

class UserMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Check if the session 'user_id' exists
        if (!Session::has('user_id')) { 
            // 2. If not, redirect to your specific login route
            return redirect('/superadmin/login')->with('error', 'Please login first.'); 
        }

        // 3. If they are logged in, let them proceed to the portal
        return $next($request); 
    }
}