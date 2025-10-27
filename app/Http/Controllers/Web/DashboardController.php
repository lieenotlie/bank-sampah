<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Penduduk;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'total_provinsi' => Provinsi::count(),
            'total_kota' => Kota::count(),
            'total_kecamatan' => Kecamatan::count(),
            'total_kelurahan' => Kelurahan::count(),
            'total_penduduk' => Penduduk::count(),
        ];

        return view('dashboard.index', compact('data'));
    }
}