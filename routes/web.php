<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeperluanController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/loginpost', [AuthController::class, 'store'])->name('login.post');
Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::middleware(['auth', 'role:1,2,3'])->group(function () {
    // sample page
    Route::get('/sample', [DashboardController::class, 'sample'])->name('sample');

    // Kategrori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    // Keperluan
    Route::get('/keperluan', [KeperluanController::class, 'index'])->name('keperluan.index');
    Route::get('/keperluan/create', [KeperluanController::class, 'create'])->name('keperluan.create');
    Route::post('/keperluan', [KeperluanController::class, 'store'])->name('keperluan.store');
    Route::get('/keperluan/{keperluan}/edit', [KeperluanController::class, 'edit'])->name('keperluan.edit');
    Route::put('/keperluan/{keperluan}', [KeperluanController::class, 'update'])->name('keperluan.update');
    Route::delete('/keperluan/{keperluan}', [KeperluanController::class, 'destroy'])->name('keperluan.destroy');
});
