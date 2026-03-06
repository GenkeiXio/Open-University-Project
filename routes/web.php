<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SuperAdminLoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Admin\UserManagementController;

// --- Public Routes ---
Route::get('/', [NewsController::class, 'index'])->name('home');

// NEW: Secure Image Proxy (Publicly accessible but physically private)
// This allows your <img> tags to work even though the files aren't in /public
Route::get('/news/image/{id}', [NewsController::class, 'showImage'])->name('news.image.show');

// --- Login & Authentication ---
Route::get('/superadmin/login', [SuperAdminLoginController::class, 'showLogin'])->name('Auth.login'); 
Route::post('/superadmin/login', [SuperAdminLoginController::class, 'login'])->name('login.submit');
Route::match(['get', 'post'], '/superadmin/logout', [SuperAdminLoginController::class, 'logout'])->name('logout');

Route::middleware(['User'])->group(function () {
    Route::get('/home', [NewsController::class, 'index'])->name('user.home');
});

// --- Protected Super Admin Routes ---
Route::middleware(['superadmin'])->group(function () {
    
    // DASHBOARD
    Route::get('/Super-Admin/super_admin', function () {
        return view('Super-Admin.super_admin');
    })->name('Super-Admin.super_admin');

    // --- NEWS MANAGEMENT (Added these for you) ---
    Route::get('/Super-Admin/news', [NewsController::class, 'manage'])->name('admin.news.index');
    Route::post('/Super-Admin/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/Super-Admin/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/Super-Admin/news/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/Super-Admin/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

    // --- USER MANAGEMENT ---
    Route::get('/Super-Admin/user-management', [UserManagementController::class, 'index'])->name('Super-Admin.user_management');
    Route::post('/Super-Admin/user-management/store', [UserManagementController::class, 'store'])->name('Super-Admin.user.store');
    Route::get('/Super-Admin/user-management/edit/{id}', [UserManagementController::class, 'edit'])->name('Super-Admin.user.edit');
    Route::post('/Super-Admin/user-management/update/{id}', [UserManagementController::class, 'update'])->name('Super-Admin.user.update');
    Route::post('/Super-Admin/user-management/toggle/{id}', [UserManagementController::class, 'toggleStatus'])->name('Super-Admin.user.toggle');
});

// --- Protected Faculty Routes ---
Route::middleware(['faculty'])->group(function () {
    Route::get('/Faculty/faculty', function () {
        return view('Faculty.faculty', [
            'staffName' => session('admin_name')
        ]);
    })->name('Faculty.faculty');
});