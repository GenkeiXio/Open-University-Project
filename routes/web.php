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
Route::post('/superadmin/login', [SuperAdminLoginController::class, 'login'])->name('login.submit');


// Change this in web.php
Route::match(['get', 'post'], '/superadmin/logout', [SuperAdminLoginController::class, 'logout'])->name('logout');


// --- Protected Super Admin Routes ---
Route::middleware(['superadmin'])->group(function () {
    // Match this name to the controller's redirect logic
    Route::get('/Super-Admin/super_admin', function () {
        return view('Super-Admin.super_admin');
    })->name('Super-Admin.super_admin');
});

// --- Protected Faculty Routes ---
Route::middleware(['faculty'])->group(function () {
    Route::get('/Faculty/faculty', function () {
        return view('Faculty.faculty', [
            'staffName' => session('admin_name')
        ]);
    })->name('Faculty.faculty');
});