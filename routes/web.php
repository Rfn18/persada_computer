<?php

use App\Http\Controllers\Api\BarangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('barang.index', [BarangController::class, 'index']);
});
