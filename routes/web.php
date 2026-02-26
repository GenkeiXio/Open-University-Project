<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SuperAdminLoginController;
use App\Http\Controllers\NewsController;

// 1. FIXED: Main Home Route now calls the NewsController index method
// This allows the $latestNews and $archiveNews variables to be sent to your home view.
Route::get('/', [NewsController::class, 'index'])->name('home');

// 2. Login Page
Route::get('/superadmin/login', [SuperAdminLoginController::class, 'showLogin'])->name('Auth.login');
Route::post('/superadmin/login', [SuperAdminLoginController::class, 'login']);

// 3. Logout
Route::post('/superadmin/logout', [SuperAdminLoginController::class, 'logout'])->name('logout');

// 4. Protected Super Admin Dashboard
Route::middleware(['superadmin'])->group(function () {
    Route::get('/Super-Admin/super_admin', function () {
        return view('Super-Admin.super_admin', [
            'staffName' => session('superadmin_name')
        ]);
    });
});

// Faculty Dashboard
Route::middleware(['superadmin'])->group(function () {
    Route::get('/Faculty/faculty', function () {
        return view('Faculty.faculty', [
            'staffName' => session('admin_name')
        ]);
    })->name('Faculty.faculty');
});