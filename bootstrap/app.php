<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        // ── Route-level middleware aliases ──────────────────────────────────
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
            'staff' => \App\Http\Middleware\StaffMiddleware::class,
            'faculty' => \App\Http\Middleware\FacultyMiddleware::class,
            'student' => \App\Http\Middleware\StudentMiddleware::class,
            'permission' => \App\Http\Middleware\CheckPermission::class,
            'sync.permissions' => \App\Http\Middleware\SyncPermissions::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();