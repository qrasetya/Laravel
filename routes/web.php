<?php

use Illuminate\Support\Facades\Route;

//route resource
//route resource
Route::resource('/posts', \App\Http\Controllers\PostController::class);
Route::resource('/kategori', \App\Http\Controllers\KategoriController::class);
Route::resource('/barang', \App\Http\Controllers\BarangController::class);