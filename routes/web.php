<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ObatController;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    $data = ['nama' => "user"];
    return view('dashboard', compact('data'));
})->name('home')->middleware('auth');


Route::middleware(['auth'])->group(function () {
    Route::get('/obat', [ObatController::class, 'index']);
    Route::get('/kategori', [KategoriController::class, 'index']);
});

Route::middleware(['admin'])->group(function () {
    Route::resource('obat', ObatController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('kategori', KategoriController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
