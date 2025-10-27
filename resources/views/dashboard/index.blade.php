@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <!-- Stats Cards -->
    <div class="col-md-6 col-lg-4 mb-4">
        <div class="stats-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted mb-2">Total Provinsi</h6>
                    <h2 class="mb-0 fw-bold">{{ $data['total_provinsi'] }}</h2>
                </div>
                <div class="icon bg-primary bg-opacity-10 text-primary">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
            </div>
            <div class="mt-3">
                <a href="{{ route('provinsi.index') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-eye"></i> Lihat Data
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4 mb-4">
        <div class="stats-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted mb-2">Total Kota/Kabupaten</h6>
                    <h2 class="mb-0 fw-bold">{{ $data['total_kota'] }}</h2>
                </div>
                <div class="icon bg-success bg-opacity-10 text-success">
                    <i class="fas fa-city"></i>
                </div>
            </div>
            <div class="mt-3">
                <a href="{{ route('kota.index') }}" class="btn btn-sm btn-success">
                    <i class="fas fa-eye"></i> Lihat Data
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4 mb-4">
        <div class="stats-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted mb-2">Total Kecamatan</h6>
                    <h2 class="mb-0 fw-bold">{{ $data['total_kecamatan'] }}</h2>
                </div>
                <div class="icon bg-info bg-opacity-10 text-info">
                    <i class="fas fa-map-marked"></i>
                </div>
            </div>
            <div class="mt-3">
                <a href="{{ route('kecamatan.index') }}" class="btn btn-sm btn-info">
                    <i class="fas fa-eye"></i> Lihat Data
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4 mb-4">
        <div class="stats-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted mb-2">Total Kelurahan/Desa</h6>
                    <h2 class="mb-0 fw-bold">{{ $data['total_kelurahan'] }}</h2>
                </div>
                <div class="icon bg-warning bg-opacity-10 text-warning">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
            </div>
            <div class="mt-3">
                <a href="{{ route('kelurahan.index') }}" class="btn btn-sm btn-warning">
                    <i class="fas fa-eye"></i> Lihat Data
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4 mb-4">
        <div class="stats-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted mb-2">Total Penduduk</h6>
                    <h2 class="mb-0 fw-bold">{{ $data['total_penduduk'] }}</h2>
                </div>
                <div class="icon bg-danger bg-opacity-10 text-danger">
                    <i class="fas fa-users"></i>
                </div>
            </div>
            <div class="mt-3">
                <a href="{{ route('penduduk.index') }}" class="btn btn-sm btn-danger">
                    <i class="fas fa-eye"></i> Lihat Data
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Quick Info -->
<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0"><i class="fas fa-info-circle"></i> Informasi Sistem</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="fw-bold">Tentang Sistem</h6>
                        <p>Sistem Bank Sampah adalah aplikasi manajemen data wilayah dan penduduk yang terintegrasi dengan database MySQL menggunakan Laravel Framework.</p>
                        
                        <h6 class="fw-bold mt-3">Fitur Utama:</h6>
                        <ul>
                            <li>Manajemen Data Wilayah (Provinsi, Kota, Kecamatan, Kelurahan)</li>
                            <li>Manajemen Data Penduduk</li>
                            <li>CRUD Lengkap untuk Semua Modul</li>
                            <li>RESTful API</li>
                            <li>Responsive Design</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        

                        <h6 class="fw-bold mt-3">Tim Pengembang:</h6>
                        <ul>
                            <li><strong>Firli Herdiansyayh</strong> - Backend & Frontend Developer</li>
                            <li><strong>Dhani F. Sonjaya</strong> -  Support & GitHub Cloning</li>
                        </ul>

                        <div class="mt-3">
                            <a href="https://github.com/lieenotlie/bank-sampah" class="btn btn-dark btn-sm" target="_blank">
                                <i class="fab fa-github"></i> View on GitHub
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection