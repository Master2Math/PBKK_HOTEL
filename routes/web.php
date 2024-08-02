<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('/pengguna',\App\Http\Controllers\UserController::class);
// sudah
//Route::resource('/kelas',\App\Http\Controllers\KelasController::class);
// sudah
Route::resource('/customer',\App\Http\Controllers\CustomerController::class);
Route::resource('/kamar',\App\Http\Controllers\KamarController::class);
Route::resource('/hotel',\App\Http\Controllers\HotelController::class);
Route::resource('/reservasi',\App\Http\Controllers\ReservasiController::class);
Route::resource('/invoice',\App\Http\Controllers\InvoiceController::class);
Route::resource('/pembayaran',\App\Http\Controllers\PembayaranController::class);

// belum

