<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

// Route publik
Route::get('/', [SupplierController::class, 'daftar'])->name('supplier.daftar');
Route::get('/supplier', [SupplierController::class, 'daftar']);

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route yang wajib login
Route::middleware('auth')->group(function () {
    Route::get('/supplier/tambah', [SupplierController::class, 'create'])->name('supplier.create');
    Route::post('/supplier', [SupplierController::class, 'store'])->name('supplier.store');

    Route::get('/supplier/{supplier}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::put('/supplier/{supplier}', [SupplierController::class, 'update'])->name('supplier.update');
    Route::delete('/supplier/{supplier}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
});