<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\ObatController;

Route::get('/', function () {
    return view('/auth/login');
});

Route::prefix('dokter')->middleware('role:dokter')->group(function () {
    Route::get('/', [HomeController::class, 'dokter'])->name('dokter.home');
    Route::resource('obat', ObatController::class);
    Route::resource('periksa', PeriksaController::class);
});


Route::prefix('pasien')->middleware('role:pasien')->group(function () {
    Route::get('/', [PeriksaController::class, 'index'])->name('pasien.home');
    Route::get('/periksa', [PeriksaController::class, 'pasienindex'])->name('periksa.pasienindex');
    Route::get('/pasien/periksa', [PeriksaController::class, 'pasienindex'])->name('periksa.pasienindex');
    Route::get('/periksa/create', [PeriksaController::class, 'pasiencreate'])->name('pasien.periksa.create');
    Route::post('/periksa/store', [PeriksaController::class, 'pasienstore'])->name('pasien.periksa.store');
    Route::get('/riwayat', [PeriksaController::class, 'riwayatIndex'])->name('pasien.riwayat.index');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
