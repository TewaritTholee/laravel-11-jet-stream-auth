<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\RegisteredUserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// login
Route::get('/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);
Route::get('/user/dashboard', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'dashboard'])->middleware('auth');

// กำหนดเส้นทางไปยังหน้า dashboard ในโฟลเดอร์ user
Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard')->middleware('auth');

Route::get('/user/dashboard', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'dashboard'])->middleware('auth');


// กำหนดเส้นทางไปยังหน้า dashboard ในโฟลเดอร์ register
Route::get('/user/register', [App\Http\Controllers\UserController::class, 'showRegisterForm'])->name('user.register');
Route::post('/user/register', [App\Http\Controllers\UserController::class, 'register'])->name('user.register.submit');





// เช็คการเข้าถึงจาก Authenticate
// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// });

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard')->middleware('auth');

