<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\ProvinsiWebController;
use App\Http\Controllers\Web\KotaWebController;
use App\Http\Controllers\Web\KecamatanWebController;
use App\Http\Controllers\Web\KelurahanWebController;
use App\Http\Controllers\Web\PendudukWebController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Rute-rute ini menangani permintaan yang harus mengembalikan tampilan (HTML/Blade).
|
*/

// 1. DASHBOARD
// Rute utama (misalnya: http://127.0.0.1:8000/)
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// 2. DATA MASTER (Menggunakan prefix 'data' untuk membedakan dari rute API)
// Prefix ini akan membuat URL menjadi: /data/provinsi, /data/kota, dll.
Route::prefix('data')->group(function () {
    
    // Data Provinsi (URL: /data/provinsi)
    Route::resource('provinsi', ProvinsiWebController::class)->names([
        'index' => 'provinsi.index',       // Digunakan di navigasi Anda: route('provinsi.index')
        'create' => 'provinsi.create',
        'store' => 'provinsi.store',
        'show' => 'provinsi.show',
        'edit' => 'provinsi.edit',
        'update' => 'provinsi.update',
        'destroy' => 'provinsi.destroy',
    ]);
    
    // Data Kota/Kabupaten (URL: /data/kota)
    Route::resource('kota', KotaWebController::class)->names([
        'index' => 'kota.index',
        // ... rute lainnya
    ]);
    
    // Data Kecamatan (URL: /data/kecamatan)
    Route::resource('kecamatan', KecamatanWebController::class)->names([
        'index' => 'kecamatan.index',
        // ... rute lainnya
    ]);
    
    // Data Kelurahan/Desa (URL: /data/kelurahan)
    Route::resource('kelurahan', KelurahanWebController::class)->names([
        'index' => 'kelurahan.index',
        // ... rute lainnya
    ]);

    // Data Penduduk (URL: /data/penduduk)
    Route::resource('penduduk', PendudukWebController::class)->names([
        'index' => 'penduduk.index',
        // ... rute lainnya
    ]);
});
