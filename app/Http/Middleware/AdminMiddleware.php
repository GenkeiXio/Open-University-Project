<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // ✅ Check if logged in
        if (!session()->has('admin_id')) {
            return redirect('/admin/login')->with('error', 'Please login first.');
        }

        // ✅ Check role
        if (session('admin_role') !== 'admin') {
            return redirect('/')->with('error', 'Unauthorized access.');
        }

        return $next($request);
    }
}