<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StaffMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('admin_id')) {
            return redirect('/admin/login')->with('error', 'Please login first.');
        }

        if (Session::get('admin_role') !== 'staff') {
            return redirect('/')->with('error', 'Unauthorized access.');
        }

        return $next($request);
    }
}