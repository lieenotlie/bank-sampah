@extends('layouts.app')

@section('title', 'Tambah Provinsi')
@section('page-title', 'Tambah Provinsi')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fas fa-plus"></i> Tambah Data Provinsi</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('provinsi.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Kode Provinsi <span class="text-danger">*</span></label>
                        <input type="text" name="kode_provinsi" class="form-control @error('kode_provinsi') is-invalid @enderror" 
                            value="{{ old('kode_provinsi') }}" placeholder="Contoh: 32" required>
                        @error('kode_provinsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Masukkan kode provinsi (maksimal 10 karakter)</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Provinsi <span class="text-danger">*</span></label>
                        <input type="text" name="nama_provinsi" class="form-control @error('nama_provinsi') is-invalid @enderror" 
                            value="{{ old('nama_provinsi') }}" placeholder="Contoh: Jawa Barat" required>
                        @error('nama_provinsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('provinsi.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection