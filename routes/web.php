<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\StudentRegisterController;
use App\Http\Controllers\Auth\StudentLoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\PendingUserController;
use App\Http\Controllers\Admin\PendingStudentController;

// ─────────────────────────────────────────────────────────────────────────────
// PUBLIC ROUTES
// ─────────────────────────────────────────────────────────────────────────────

Route::get('/', [NewsController::class, 'index'])->name('home');

// Secure image proxy (physically private files served through controller)
Route::get('/news/image/{id}', [NewsController::class, 'showImage'])->name('news.image.show');

// ─────────────────────────────────────────────────────────────────────────────
// FACULTY / STAFF AUTH
// ─────────────────────────────────────────────────────────────────────────────

Route::get('/admin/login', [AdminLoginController::class, 'showLogin'])->name('Auth.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('login.submit');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('logout');

// Faculty/Staff registration (goes to pending_users)
Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// ─────────────────────────────────────────────────────────────────────────────
// STUDENT AUTH
// ─────────────────────────────────────────────────────────────────────────────

Route::get('/student/login', [AdminLoginController::class, 'showLogin'])->name('student.login.show');
Route::post('/student/login', [StudentLoginController::class, 'login'])->name('student.login');
Route::post('/student/logout', [StudentLoginController::class, 'logout'])->name('student.logout');

// Student registration (goes to pending_students)
Route::post('/student/register', [StudentRegisterController::class, 'store'])->name('student.register');

// ─────────────────────────────────────────────────────────────────────────────
// PROTECTED — STUDENT
// ─────────────────────────────────────────────────────────────────────────────

Route::middleware(['student'])->group(function () {
    Route::get('/student/dashboard', function () {
        return view('Student.dashboard');
    })->name('student.dashboard');
});

// ─────────────────────────────────────────────────────────────────────────────
// PROTECTED — ADMIN
// ─────────────────────────────────────────────────────────────────────────────

Route::middleware(['admin'])->group(function () {

    // Dashboard
    Route::get('/admin/dashboard', function () {
        return view('Admin.admin');
    })->name('admin.dashboard');

    // News management
    Route::get('/admin/news', [NewsController::class, 'manage'])->name('admin.news.index');
    Route::post('/admin/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/admin/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/admin/news/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/admin/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

    // User management (faculty/staff/admin accounts)
    Route::get('/admin/user-management', [UserManagementController::class, 'index'])->name('admin.user_management');
    Route::post('/admin/user-management/store', [UserManagementController::class, 'store'])->name('admin.user.store');
    Route::get('/admin/user-management/edit/{id}', [UserManagementController::class, 'edit'])->name('admin.user.edit');
    Route::post('/admin/user-management/update/{id}', [UserManagementController::class, 'update'])->name('admin.user.update');
    Route::post('/admin/user-management/toggle/{id}', [UserManagementController::class, 'toggleStatus'])->name('admin.user.toggle');

    // Pending faculty/staff approvals
    Route::get('/admin/pending-users', [PendingUserController::class, 'index'])->name('admin.pending');
    Route::post('/admin/pending-users/approve/{id}', [PendingUserController::class, 'approve'])->name('admin.pending.approve');
    Route::post('/admin/pending-users/reject/{id}', [PendingUserController::class, 'reject'])->name('admin.pending.reject');

    // Pending student approvals
    Route::get('/admin/pending-students', [PendingStudentController::class, 'index'])->name('admin.pending-students.index');
    Route::post('/admin/pending-students/approve/{id}', [PendingStudentController::class, 'approve'])->name('admin.pending-students.approve');
    Route::post('/admin/pending-students/reject/{id}', [PendingStudentController::class, 'reject'])->name('admin.pending-students.reject');
});

// ─────────────────────────────────────────────────────────────────────────────
// PROTECTED — FACULTY
// ─────────────────────────────────────────────────────────────────────────────

Route::middleware(['faculty'])->prefix('Faculty')->group(function () {
    Route::get('/dashboard', fn() => view('Faculty.dashboard'))->name('Faculty.dashboard');
    Route::get('/profile', fn() => view('Faculty.profile'))->name('Faculty.profile');
    Route::get('/trainings', fn() => view('Faculty.trainings.index'))->name('Faculty.trainings');
    Route::get('/tns', fn() => view('Faculty.tna.index'))->name('Faculty.tns');
    Route::get('/reports', fn() => view('Faculty.reports.index'))->name('Faculty.reports');
    Route::get('/publications', fn() => view('Faculty.publications.index'))->name('Faculty.publications');
    Route::get('/seminars', fn() => view('Faculty.seminars.index'))->name('Faculty.seminars');
    Route::get('/presentations', fn() => view('Faculty.presentations.index'))->name('Faculty.presentations');
});

Route::middleware(['faculty'])->group(function () {
    Route::get('/Faculty/faculty', function () {
        return view('Faculty.faculty', ['staffName' => session('admin_name')]);
    })->name('Faculty.faculty');
});

// ─────────────────────────────────────────────────────────────────────────────
// PROTECTED — STAFF
// ─────────────────────────────────────────────────────────────────────────────

Route::middleware(['staff'])->group(function () {
    Route::get('/staff/dashboard', function () {
        return view('Staff.dashboard');
    })->name('staff.dashboard');

    Route::get('/staff/news', [NewsController::class, 'manage'])->name('staff.news.index');
    Route::post('/staff/news', [NewsController::class, 'store'])->name('staff.news.store');
});