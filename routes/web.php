<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SuperAdminLoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ActivityController;

// --- Public Routes ---
// The Home Route displays the News and the Calendar
Route::get('/', [NewsController::class, 'index'])->name('home');

// --- Login & Authentication ---
Route::get('/superadmin/login', [SuperAdminLoginController::class, 'showLogin'])->name('Auth.login');
Route::post('/superadmin/login', [SuperAdminLoginController::class, 'login']);

// Change this in web.php
Route::match(['get', 'post'], '/superadmin/logout', [SuperAdminLoginController::class, 'logout'])->name('logout');


// --- Protected Super Admin Routes ---
Route::middleware(['superadmin'])->group(function () {

    // ✅ Super Admin Dashboard
    Route::get('/Super-Admin/super_admin', function () {
        return view('Super-Admin.super_admin', [
            'staffName' => session('superadmin_name')
        ]);
    })->name('Super-Admin.super_admin');

    // ✅ Faculty Page (if you need it)
    Route::get('/Faculty/faculty', function () {
        return view('Faculty.faculty', [
            'staffName' => session('faculty_name')
        ]);
    })->name('Faculty.faculty');

    // ✅ Activity Management
    Route::post('/admin/activities/store', [ActivityController::class, 'store'])->name('activities.store');

    // ✅ News Management (optional)
    // Route::post('/admin/news/store', [NewsController::class, 'store'])->name('news.store');
});