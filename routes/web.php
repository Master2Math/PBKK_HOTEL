<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/pengguna',\App\Http\Controllers\UserController::class);
Route::resource('/kelas',\App\Http\Controllers\KelasController::class);
Route::resource('/customer',\App\Http\Controllers\CustomerController::class);
Route::resource('/kamar',\App\Http\Controllers\KamarController::class);

