<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\BahanKeluarController;
use App\Http\Controllers\BahanMasukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeperluanController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
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

    // Supplier
    Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
    Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::post('/supplier', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/supplier/{supplier}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::put('/supplier/{supplier}', [SupplierController::class, 'update'])->name('supplier.update');
    Route::delete('/supplier/{supplier}', [SupplierController::class, 'destroy'])->name('supplier.destroy');

    // Bahan
    Route::get('/bahan', [BahanController::class, 'index'])->name('bahan.index');
    Route::get('/bahan/data', [BahanController::class, 'getData'])->name('bahan.getData');
    Route::get('/bahan/create', [BahanController::class, 'create'])->name('bahan.create');
    Route::post('/bahan', [BahanController::class, 'store'])->name('bahan.store');
    Route::get('/bahan/{bahan}/edit', [BahanController::class, 'edit'])->name('bahan.edit');
    Route::put('/bahan/{bahan}', [BahanController::class, 'update'])->name('bahan.update');
    Route::delete('/bahan/{bahan}', [BahanController::class, 'destroy'])->name('bahan.destroy');

    // Bahan Masuk
    Route::get('/bahanmasuk', [BahanMasukController::class, 'index'])->name('bahanmasuk.index');
    Route::get('/bahanmasuk/create', [BahanMasukController::class, 'create'])->name('bahanmasuk.create');
    Route::post('/bahanmasuk', [BahanMasukController::class, 'store'])->name('bahanmasuk.store');
    Route::get('/bahanmasuk/{bahanmasuk}/edit', [BahanMasukController::class, 'edit'])->name('bahanmasuk.edit');
    Route::put('/bahanmasuk/{bahanmasuk}', [BahanMasukController::class, 'update'])->name('bahanmasuk.update');
    Route::delete('/bahanmasuk/{bahanmasuk}', [BahanMasukController::class, 'destroy'])->name('bahanmasuk.destroy');

    // Bahan Keluar
    Route::get('/bahankeluar', [BahanKeluarController::class, 'index'])->name('bahankeluar.index');
    Route::get('/bahankeluar/create', [BahanKeluarController::class, 'create'])->name('bahankeluar.create');
    Route::post('/bahankeluar', [BahanKeluarController::class, 'store'])->name('bahankeluar.store');
    Route::get('/bahankeluar/{bahankeluar}/edit', [BahanKeluarController::class, 'edit'])->name('bahankeluar.edit');
    Route::put('/bahankeluar/{bahankeluar}', [BahanKeluarController::class, 'update'])->name('bahankeluar.update');
    Route::delete('/bahankeluar/{bahankeluar}', [BahanKeluarController::class, 'destroy'])->name('bahankeluar.destroy');

    // User
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});
