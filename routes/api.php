<?php

use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\JualController;
use App\Http\Controllers\Api\KasirController;
use Illuminate\Support\Facades\Route;

Route::apiResource('barang', BarangController::class);
Route::apiResource('kasir', KasirController::class);
Route::apiResource('jual', JualController::class);
    