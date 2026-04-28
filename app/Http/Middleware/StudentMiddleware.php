<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StudentMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('student_id')) {
            return redirect()->route('student.login.show')
                ->with('error', 'Please log in to continue.');
        }

        return $next($request);
    }
}