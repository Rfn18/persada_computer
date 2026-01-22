<?php

use App\Http\Controllers\Api\BarangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('barang.index', [BarangController::class, 'index']);
})->middleware('auth:sanctum');

Route::get('/register', function() {
    return view('auth.register');
});
Route::get('/login', function() {
    return view('auth.login');
});