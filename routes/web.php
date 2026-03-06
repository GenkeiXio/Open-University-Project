<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SuperAdminLoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Admin\UserManagementController;

// --- Public Routes ---
// The Home Route displays the News and the Calendar
Route::get('/', [NewsController::class, 'index'])->name('home');

// --- Login & Authentication ---
Route::get('/superadmin/login', [SuperAdminLoginController::class, 'showLogin'])->name('Auth.login'); 
Route::post('/superadmin/login', [SuperAdminLoginController::class, 'login'])->name('login.submit');

Route::middleware(['User'])->group(function () {
    Route::get('/home', [NewsController::class, 'index'])->name('user.home');
});

// Change this in web.php
Route::match(['get', 'post'], '/superadmin/logout', [SuperAdminLoginController::class, 'logout'])->name('logout');


// --- Protected Super Admin Routes ---
Route::middleware(['superadmin'])->group(function () {
    
    // Main Dashboard
    Route::get('/Super-Admin/super_admin', function () {
        return view('Super-Admin.super_admin');
    })->name('Super-Admin.super_admin');

    // News Management Routes
    // This shows the list of news in the dashboard
    Route::get('/Super-Admin/news', [NewsController::class, 'manage'])->name('admin.news.index');
    
    // This handles the "Add News" form submission
    Route::post('/Super-Admin/news/store', [NewsController::class, 'store'])->name('news.store');
    
    // Edit and update routes for existing news items
    Route::get('/Super-Admin/news/{id}/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::put('/Super-Admin/news/{id}', [NewsController::class, 'update'])->name('news.update');

    // Delete route to remove news items
    Route::delete('/Super-Admin/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
});

// --- Protected Faculty Routes ---
Route::middleware(['faculty'])->group(function () {
    Route::get('/Faculty/faculty', function () {
        return view('Faculty.faculty', [
            'staffName' => session('admin_name')
        ]);
    })->name('Faculty.faculty');
});