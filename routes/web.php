<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Admin\UserManagementController;

// --- Public Routes ---
Route::get('/', [NewsController::class, 'index'])->name('home');

// NEW: Secure Image Proxy (Publicly accessible but physically private)
// This allows your <img> tags to work even though the files aren't in /public
Route::get('/news/image/{id}', [NewsController::class, 'showImage'])->name('news.image.show');

// --- Login & Authentication ---
Route::get('/admin/login', [AdminLoginController::class, 'showLogin'])->name('Auth.login'); 
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('login.submit');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('logout');

Route::middleware(['user'])->group(function () {
    Route::get('/home', [NewsController::class, 'index'])->name('user.home');
});

// --- Protected Admin Routes ---
Route::middleware(['admin'])->group(function () {
    
    // DASHBOARD
    Route::get('/admin/dashboard', function () {
        return view('Admin.admin');
    })->name('admin.dashboard');

    // --- NEWS MANAGEMENT (Added these for you) ---
    Route::get('/admin/news', [NewsController::class, 'manage'])->name('admin.news.index');
    Route::post('/admin/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/admin/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/admin/news/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/admin/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

    // --- USER MANAGEMENT ---
    Route::get('/admin/user-management', [UserManagementController::class, 'index'])->name('admin.user_management');
    Route::post('/admin/user-management/store', [UserManagementController::class, 'store'])->name('admin.user.store');
    Route::get('/admin/user-management/edit/{id}', [UserManagementController::class, 'edit'])->name('admin.user.edit');
    Route::post('/admin/user-management/update/{id}', [UserManagementController::class, 'update'])->name('admin.user.update');
    Route::post('/admin/user-management/toggle/{id}', [UserManagementController::class, 'toggleStatus'])->name('admin.user.toggle');
});

// --- Protected Faculty Routes ---
Route::middleware(['faculty'])->group(function () {
    Route::get('/Faculty/faculty', function () {
        return view('Faculty.faculty', [
            'staffName' => session('admin_name')
        ]);
    })->name('Faculty.faculty');
});

Route::middleware(['staff'])->group(function () {
    Route::get('/staff/dashboard', function () {
        return view('Staff.dashboard', [
            'staffName' => session('admin_name')
        ]);
    })->name('staff.dashboard');

    // Example: allow staff to manage news
    Route::get('/staff/news', [NewsController::class, 'manage'])->name('staff.news.index');
    Route::post('/staff/news', [NewsController::class, 'store'])->name('staff.news.store');
});