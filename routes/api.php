<?php

use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\JualController;
use App\Http\Controllers\Api\KasirController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->apiResource('barang', BarangController::class);
Route::middleware('auth:sanctum')->apiResource('kasir', KasirController::class);
Route::middleware('auth:sanctum')->apiResource('jual', JualController::class);

Route::post('register', [UserAuthController::class, 'register']);
Route::post('login', [UserAuthController::class, 'login']);
Route::post('logout', [UserAuthController::class, 'logout'])
    ->middleware('auth:sanctum');

