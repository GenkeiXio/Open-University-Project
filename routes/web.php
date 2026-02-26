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
    
    // Dashboard View
    Route::get('/Super-Admin/super_admin', function () {
        return view('Super-Admin.super_admin', [
            'staffName' => session('superadmin_name'),
            'activities' => \App\Models\Activity::orderBy('event_date', 'asc')->get() // Fetch data
        ]);
    });

    // Activity Management (Handled by ActivityController)
    Route::post('/admin/activities/store', [ActivityController::class, 'store'])->name('activities.store');
    
    // News Management (If you add a news form later)
    // Route::post('/admin/news/store', [NewsController::class, 'store'])->name('news.store');
});