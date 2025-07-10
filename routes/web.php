<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PembayaranController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('/home');
})->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});
 Route::get('/cektemplate', function(){
     return view('layouts.template');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan');
Route::get('/pelanggan/create', [PelangganController::class, 'create']);
Route::post('/pelanggan', [PelangganController::class, 'store']);
Route::get('/pelanggan/edit/{id}', [PelangganController::class, 'edit']);
Route::put('/pelanggan/{id}', [PelangganController::class, 'update']);
Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy']);


Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan');
Route::get('/pemesanan/create', [PemesananController::class, 'create']);
Route::post('/pemesanan', [PemesananController::class, 'store']);
Route::get('/pemesanan/edit/{id}', [PemesananController::class, 'edit']);
Route::put('/pemesanan/{id}', [PemesananController::class, 'update']);
Route::delete('/pemesanan/{id}', [PemesananController::class, 'destroy']);

Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');
Route::get('/pembayaran/create', [PembayaranController::class, 'create']);
Route::post('/pembayaran', [PembayaranController::class, 'store']);
Route::get('/pembayaran/edit/{id}', [PembayaranController::class, 'edit']);
Route::put('/pembayaran/{id}', [PembayaranController::class, 'update']);
Route::delete('/pembayaran/{id}', [PembayaranController::class, 'destroy']);

