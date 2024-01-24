<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\pembelianController;
use App\Http\Controllers\penjualanController;
use App\Http\Controllers\transaksiController;
use App\Http\Controllers\UserController;
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

Route::get('/Login', [UserController::class, 'login'])->name('login-view');

// route dashboard
Route::get('Dashboard', [DashboardController::class, 'index'])->name('dashboard');

// route enter itemdata
Route::get('Kategori', [InputController::class, 'kategori'])->name('index-kategori');
Route::post('Kategori/insert-data', [InputController::class, 'incat'])->name('input-kategori');
Route::get('Barang/Gudang', [InputController::class, 'barangGudang'])->name('index-barang-gudang');

// route pembelian
Route::get('Pembelian', [pembelianController::class, 'pembelian'])->name('index-pembelian');
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
