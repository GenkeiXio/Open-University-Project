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
use App\Http\Controllers\Admin\StudentManagementController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\PermissionsController;

// ─────────────────────────────────────────────────────────────────────────────
// PUBLIC ROUTES
// ─────────────────────────────────────────────────────────────────────────────

Route::get('/', [NewsController::class, 'index'])->name('home');
Route::get('/news/image/{id}', [NewsController::class, 'showImage'])->name('news.image.show');

// ─────────────────────────────────────────────────────────────────────────────
// AUTH
// ─────────────────────────────────────────────────────────────────────────────

Route::get('/admin/login', [AdminLoginController::class, 'showLogin'])->name('Auth.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('login.submit');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/student/login', [AdminLoginController::class, 'showLogin'])->name('student.login.show');
Route::post('/student/login', [StudentLoginController::class, 'login'])->name('student.login');
Route::post('/student/logout', [StudentLoginController::class, 'logout'])->name('student.logout');
Route::post('/student/register', [StudentRegisterController::class, 'store'])->name('student.register');

// ─────────────────────────────────────────────────────────────────────────────
// STUDENT
// ─────────────────────────────────────────────────────────────────────────────

Route::middleware(['student'])->group(function () {
    Route::get('/student/dashboard', fn() => view('Student.dashboard'))->name('student.dashboard');
    Route::get('/student/requests', fn() => view('Student.requestlist'))->name('student.requests.list');
    Route::get('/student/requests/checklist', fn() => view('Student.checklist'))->name('student.checklist');
});

// ─────────────────────────────────────────────────────────────────────────────
// ADMIN  (role = 'admin' only — guarded by AdminMiddleware)
// ─────────────────────────────────────────────────────────────────────────────

Route::middleware(['admin'])->group(function () {

    Route::get('/admin/dashboard', fn() => view('Admin.admin'))->name('admin.dashboard');

    // News
   

    // --- NEWS MANAGEMENT (Added these for you) ---
    Route::get('/admin/news', [NewsController::class, 'manage'])->name('admin.news.index');
    Route::post('/admin/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/admin/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/admin/news/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/admin/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

    // User management
    Route::get('/admin/user-management', [UserManagementController::class, 'index'])->name('admin.user_management');
    Route::post('/admin/user-management/store', [UserManagementController::class, 'store'])->name('admin.user.store');
    Route::get('/admin/user-management/edit/{id}', [UserManagementController::class, 'edit'])->name('admin.user.edit');
    Route::post('/admin/user-management/update/{id}', [UserManagementController::class, 'update'])->name('admin.user.update');
    Route::post('/admin/user-management/toggle/{id}', [UserManagementController::class, 'toggleStatus'])->name('admin.user.toggle');

    // Pending users (faculty/staff)
    Route::get('/admin/pending-users', [PendingUserController::class, 'index'])->name('admin.pending');
    Route::post('/admin/pending-users/approve/{id}', [PendingUserController::class, 'approve'])->name('admin.pending.approve');
    Route::post('/admin/pending-users/reject/{id}', [PendingUserController::class, 'reject'])->name('admin.pending.reject');

    // Pending students
    Route::get('/admin/pending-students', [PendingStudentController::class, 'index'])->name('admin.pending-students.index');
    Route::post('/admin/pending-students/approve/{id}', [PendingStudentController::class, 'approve'])->name('admin.pending-students.approve');
    Route::post('/admin/pending-students/reject/{id}', [PendingStudentController::class, 'reject'])->name('admin.pending-students.reject');

    // Student management
    Route::get('/admin/student-management', [StudentManagementController::class, 'index'])->name('admin.students.index');
    Route::post('/admin/student-management/toggle/{id}', [StudentManagementController::class, 'toggleStatus'])->name('admin.students.toggle');

    // Faculty module (admin mirror)
    Route::prefix('admin/faculty-module')->group(function () {
        Route::get('/dashboard', fn() => view('Faculty.dashboard'))->name('admin.faculty.dashboard');
        Route::get('/profile', fn() => view('Faculty.profile'))->name('admin.faculty.profile');
        Route::get('/trainings', fn() => view('Faculty.trainings.index'))->name('admin.faculty.trainings');
        Route::get('/tns', fn() => view('Faculty.tna.index'))->name('admin.faculty.tns');
        Route::get('/reports', fn() => view('Faculty.reports.index'))->name('admin.faculty.reports');
        Route::get('/publications', fn() => view('Faculty.publications.index'))->name('admin.faculty.publications');
        Route::get('/seminars', fn() => view('Faculty.seminars.index'))->name('admin.faculty.seminars');
        Route::get('/presentations', fn() => view('Faculty.presentations.index'))->name('admin.faculty.presentations');
    });

    Route::get('/admin/thesis-dissertation', fn() => view('Admin.placeholder', ['title' => 'Thesis Dissertation']))->name('admin.thesis');
    Route::get('/admin/office-transaction', fn() => view('Admin.placeholder', ['title' => 'Office Transaction']))->name('admin.office');

    // Activity logs
    Route::get('/admin/activity-logs', [ActivityLogController::class, 'index'])->name('admin.logs');

    // Permissions management (admin-only)
    Route::get('/admin/permissions', [PermissionsController::class, 'index'])->name('admin.permissions');
    Route::post('/admin/permissions/update', [PermissionsController::class, 'update'])->name('admin.permissions.update');
    Route::post('/admin/permissions/preset', [PermissionsController::class, 'preset'])->name('admin.permissions.preset');
});

// ─────────────────────────────────────────────────────────────────────────────
// FACULTY  (role = 'faculty' — guarded by FacultyMiddleware)
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
    Route::get('/faculty', fn() => view('Faculty.faculty', ['staffName' => session('admin_name')]))->name('Faculty.faculty');
});

// ─────────────────────────────────────────────────────────────────────────────
// STAFF  (role = 'staff' — guarded by StaffMiddleware)
// ─────────────────────────────────────────────────────────────────────────────

Route::middleware(['staff', 'sync.permissions'])->group(function () {

    Route::get('/staff/dashboard', fn() => view('Staff.dashboard'))->name('staff.dashboard');
    Route::post('/staff/logout', [AdminLoginController::class, 'logout'])->name('staff.logout');

    // News (no extra permission needed — basic staff feature)
    Route::get('/staff/news', [NewsController::class, 'manage'])->name('staff.news.index');
    Route::post('/staff/news', [NewsController::class, 'store'])->name('staff.news.store');

    // ── Requests ──────────────────────────────────────────────────────────────
    Route::get('/staff/requests', [fn() => view('Staff.request')])->name('staff.requests.index');
    Route::get('/staff/requests/assigned', [fn() => view('Staff.request')])->name('staff.requests.assigned');
    Route::get('/staff/requests/{id}/checklist', function ($id) {
        return view('Staff.stdntchecklist', ['requestId' => $id]);
    })->name('staff.requests.checklist');

    // ── Thesis ────────────────────────────────────────────────────────────────
    Route::get('/staff/thesis-dissertation', fn() => view('Admin.placeholder', ['title' => 'Thesis & Dissertation']))->name('staff.thesis.index');
    Route::get('/staff/thesis-dissertation/defense-schedule', fn() => view('Admin.placeholder', ['title' => 'Defense Schedule']))->name('staff.thesis.defense');

    // ─────────────────────────────────────────────────────────────────────────
    // PERMISSION-GATED ROUTES
    // Staff can only reach these if the admin has granted the matching permission.
    // The 'permission' middleware checks session('admin_permissions') and aborts
    // with 403 if the permission key is absent.
    // ─────────────────────────────────────────────────────────────────────────

    // User (faculty/staff) approvals — requires 'user_approvals' permission
    Route::middleware('permission:user_approvals')->group(function () {
        Route::get('/staff/pending-users', [PendingUserController::class, 'index'])->name('staff.users.index');
        Route::post('/staff/pending-users/approve/{id}', [PendingUserController::class, 'approve'])->name('staff.pending.approve');
        Route::post('/staff/pending-users/reject/{id}', [PendingUserController::class, 'reject'])->name('staff.pending.reject');
    });

    // Student approvals — requires 'student_approvals' permission
    Route::middleware('permission:student_approvals')->group(function () {
        Route::get('/staff/pending-students', [PendingStudentController::class, 'index'])->name('staff.students.index');
        Route::post('/staff/pending-students/approve/{id}', [PendingStudentController::class, 'approve'])->name('staff.pending-students.approve');
        Route::post('/staff/pending-students/reject/{id}', [PendingStudentController::class, 'reject'])->name('staff.pending-students.reject');
    });

});
});


Route::view('/theses', 'Users.theses_dissertation')->name('theses_dissertation');
Route::view('/theses-output', 'Users.theses_output')->name('theses_output');
Route::view('/view-theses', 'Users.view_theses')->name('view_theses');
Route::view('/add-theses', 'Users.add_theses')->name('add_theses');
