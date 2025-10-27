<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProvinsiController;
use App\Http\Controllers\Api\KotaController;
use App\Http\Controllers\Api\KecamatanController;
use App\Http\Controllers\Api\KelurahanController;
use App\Http\Controllers\Api\PendudukController;

Route::resource('provinsi', ProvinsiController::class)->names('api.provinsi')->only([
    'index', 'store', 'show', 'update', 'destroy'
]);

Route::resource('kota', KotaController::class)->names('api.kota')->only([
    'index', 'store', 'show', 'update', 'destroy'
]);

Route::resource('kecamatan', KecamatanController::class)->names('api.kecamatan')->only([
    'index', 'store', 'show', 'update', 'destroy'
]);

Route::resource('kelurahan', KelurahanController::class)->names('api.kelurahan')->only([
    'index', 'store', 'show', 'update', 'destroy'
]);

Route::resource('penduduk', PendudukController::class)->names('api.penduduk')->only([
    'index', 'store', 'show', 'update', 'destroy'
]);
