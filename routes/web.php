<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

// Route untuk halaman selamat datang (opsional)
Route::get('/', function () {
    return view('welcome');
});

// Route untuk halaman publik berita Anda
Route::get('/berita', [NewsController::class, 'index'])->name('news.index');
Route::get('/berita/{news:slug}', [NewsController::class, 'show'])->name('news.show');