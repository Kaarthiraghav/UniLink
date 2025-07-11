<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/register', [AuthController::class, 'create'])->name('create.submit');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');


// Group management routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/groups', [AdminController::class, 'groups'])->name('groups.list');
    Route::get('/admin/groups/{group}/rename', [AdminController::class, 'showRenameGroup'])->name('groups.rename');
    Route::post('/admin/groups/{group}/rename', [AdminController::class, 'renameGroup'])->name('groups.rename.submit');
    Route::delete('/admin/groups/{group}', [AdminController::class, 'deleteGroup'])->name('groups.delete');
    Route::get('/admin/groups/{group}/add-users', [AdminController::class, 'showAddUsers'])->name('groups.addUsers');
    Route::post('/admin/groups/{group}/add-users', [AdminController::class, 'addUsers'])->name('groups.addUsers.submit');
    Route::post('/admin/groups/create', [AdminController::class, 'createGroup'])->name('group.create');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
    Route::get('/lecturer/dashboard', [LecturerController::class, 'index']);
    Route::get('/student/dashboard', [StudentController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
