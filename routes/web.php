<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\pembelianController;
use App\Http\Controllers\penjualanController;
use App\Http\Controllers\transaksiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.app');
});

Route::middleware(['web', 'auth'])->group(function () {
    // Grup rute untuk pengguna dengan level admin
    Route::middleware(['auth', 'userRole:admin'])->group(function () {
        // Rute-rute yang hanya bisa diakses oleh admin
        // route enter itemdata
        Route::get('Kategori', [InputController::class, 'kategori'])->name('index-kategori');
        Route::post('Kategori/insert-data', [InputController::class, 'incat'])->name('input-kategori');
        // Tambahkan rute-rute admin lainnya di sini
    });

    // Grup rute untuk pengguna dengan level user
    Route::middleware(['auth', 'userRole:user'])->group(function () {
        // Rute-rute yang hanya bisa diakses oleh user

        // Tambahkan rute-rute user lainnya di sini
    });
    // route dashboard
    Route::get('Dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // route pembelian
    Route::get('Barang/Beli', [pembelianController::class, 'pembelian'])->name('index-barang-beli');
    Route::post('Pembelian/insert-data', [pembelianController::class, 'inpem'])->name('input-pembelian');

    // route penjualan
    Route::get('Barang/Jual', [penjualanController::class, 'barangJual'])->name('index-barang-jual');
    Route::post('Penjualan/insert-data', [penjualanController::class, 'inju'])->name('input-jual');

    // route transaksi
    // pembelian
    Route::get('Transaksi/Pembelian', [transaksiController::class, 'intrapem'])->name('index-transaksi-pembelian');
    Route::post('Transaksi/Pembelian/Proses', [transaksiController::class, 'protrapem'])->name('proses-transaksi-pembelian');
    // penjualan
    Route::get('Transaksi/Penjualan', [transaksiController::class, 'intrapen'])->name('index-transaksi-penjualan');

});


// route auth
Route::get('/Login', [AuthController::class, 'login'])->name('login-view');
Route::get('/Register', [AuthController::class, 'register'])->name('register-view');
Route::post('/Register-store-daftar/masuk/data/akun', [AuthController::class, 'registerStore'])->name('register-store');
Route::post('/Login-action-masuk/session/data/akun', [AuthController::class, 'loginAction'])->name('login-action');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
