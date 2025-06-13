<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HistoryController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Route untuk tampilkan daftar user di admin
Route::get('/admin/users', [AdminController::class, 'users'])->middleware('auth')->name('users.index');
// Route untuk hapus user
Route::delete('/admin/users/{id}', [AdminController::class, 'destroyUser'])->middleware('auth')->name('users.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

    Route::get('/users/{user}/password', [UserController::class, 'passwordUpdateForm'])->name('password.edit');
    Route::put('/users/{user}/password', [UserController::class, 'passwordUpdate'])->name('password.update');
});

Route::get('/histories', [HistoryController::class, 'index'])->name('histories.index');
Route::post('/histories', [HistoryController::class, 'store'])->name('histories.store');
Route::delete('/histories/{id}', [HistoryController::class, 'destroy'])->name('histories.destroy');

Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

    // Foods (CRUD)
    Route::resource('/foods', FoodController::class)->names('foods');

    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Foods Management (CRUD)
    Route::resource('/foods', FoodController::class)->names('foods');

    // Categories Management (CRUD)
    Route::resource('/categories', CategoryController::class)->names('categories');

    // Optional: Admin bisa punya profile sendiri juga
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
});