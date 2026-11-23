<?php

use App\Http\Controllers\LaptopController;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LaptopController::class, 'manage'])->name('home');

// Katalog Laptop (CRUD)
Route::resource('katalog', LaptopController::class)
    ->parameters(['katalog' => 'laptop'])
    ->names('laptops');

// Pemesanan
Route::get('/pesan/{laptop}', [PesananController::class, 'create'])->name('pesanan.create');
Route::post('/pesan', [PesananController::class, 'store'])->name('pesanan.store');
Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
Route::patch('/pesanan/{pesanan}/status', [PesananController::class, 'updateStatus'])->name('pesanan.updateStatus');
Route::get('/pesanan/{pesanan}/nota', [PesananController::class, 'nota'])->name('pesanan.nota');