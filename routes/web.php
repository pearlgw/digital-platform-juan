<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index']);
Route::get('/product/{id}', [FrontController::class, 'show'])->name('show.product');
Route::get('/about', [FrontController::class, 'about']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('/buy', [TransaksiController::class, 'buy'])->name('buy');
    Route::get('/histori-transaksi', [TransaksiController::class, 'historiTransaksi'])->name('histori-transaksi');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::middleware('can:manage users')->group(function () {
            Route::resource('users', UserController::class);
        });
        Route::middleware('can:transaksi products')->group(function () {
            Route::resource('transactions', TransaksiController::class);
        });
    });

    Route::prefix('adminprodusen')->name('adminprodusen.')->group(function () {
        Route::middleware('can:manage products')->group(function () {
            Route::get('update-stok', [UpdateController::class, 'index'])->name('update-stok');
            Route::post('update-stok', [UpdateController::class, 'store'])->name('add-stok');
            Route::resource('products', ProductController::class);
            Route::patch('/admin/products/{id}/approve', [ProductController::class, 'approve'])->name('products.approve');
        });
    });

    Route::prefix('reseller')->name('reseller.')->group(function () {
        Route::middleware('can:view products')->group(function () {
            Route::get('products', [ProductController::class, 'index']);
        });
        // Route::middleware('can:transaksi products')->group(function () {
        //     Route::resource('transactions', TransaksiController::class);
        // });
    });
});

require __DIR__.'/auth.php';