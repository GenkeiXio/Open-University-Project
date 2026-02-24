<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SuperAdminLoginController;

Route::get('/', function () {
    return view('home');
});

// Login Page
Route::get('/superadmin/login', [SuperAdminLoginController::class, 'showLogin'])->name('Auth.login');
Route::post('/superadmin/login', [SuperAdminLoginController::class, 'login']);

// Logout
Route::get('/superadmin/logout', [SuperAdminLoginController::class, 'logout']);

// Protected Super Admin Dashboard
Route::middleware(['superadmin'])->group(function () {
    Route::get('/Super-Admin/super_admin', function () {
        return view('Super-Admin.super_admin', [
            'staffName' => session('superadmin_name')
        ]);
    });
});