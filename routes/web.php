<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/loginpost', [AuthController::class, 'store'])->name('login.post');
Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::middleware(['auth', 'role:1,2,3'])->group(function () {
    // sample page
    Route::get('/sample', [DashboardController::class, 'sample'])->name('sample');
});
