<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\ObatController;

Route::get('/', function () {
    return view('welcome');
});



Route::prefix('dokter')->group (function(){
    Route::resource('obat', ObatController::class);
    Route::resource('periksa', PeriksaController::class);
});

Route::prefix('pasien')->group (function(){
    Route::resource('obat', ObatController::class);
    Route::get('/periksa', [PeriksaController::class, 'pasienIndex'])->name('pasien.periksa.index');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dokter', [HomeController::class, 'dokter'])-> name('dokter');

// routes/web.php
Route::get('/pasien', [PeriksaController::class, 'index'])->name('periksa.index');

Route::get('/pasien', [PeriksaController::class, 'index'])->name('riwayat.index');