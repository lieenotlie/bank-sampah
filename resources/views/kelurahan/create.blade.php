@extends('layouts.app')

@section('title', 'Tambah Kelurahan')
@section('page-title', 'Tambah Kelurahan/Desa')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0"><i class="fas fa-plus"></i> Tambah Data Kelurahan/Desa</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('kelurahan.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Kecamatan <span class="text-danger">*</span></label>
                        <select name="kecamatan_id" class="form-select @error('kecamatan_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Kecamatan --</option>
                            @foreach($kecamatan as $item)
                                <option value="{{ $item->id }}" {{ old('kecamatan_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_kecamatan }} - {{ $item->kota->nama_kota }}
                                </option>
                            @endforeach
                        </select>
                        @error('kecamatan_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kode Kelurahan <span class="text-danger">*</span></label>
                        <input type="text" name="kode_kelurahan" class="form-control @error('kode_kelurahan') is-invalid @enderror" 
                            value="{{ old('kode_kelurahan') }}" placeholder="Contoh: 3273010001" required>
                        @error('kode_kelurahan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Kelurahan/Desa <span class="text-danger">*</span></label>
                        <input type="text" name="nama_kelurahan" class="form-control @error('nama_kelurahan') is-invalid @enderror" 
                            value="{{ old('nama_kelurahan') }}" placeholder="Contoh: Cihapit" required>
                        @error('nama_kelurahan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jenis <span class="text-danger">*</span></label>
                        <select name="jenis" class="form-select @error('jenis') is-invalid @enderror" required>
                            <option value="">-- Pilih Jenis --</option>
                            <option value="Kelurahan" {{ old('jenis') == 'Kelurahan' ? 'selected' : '' }}>Kelurahan</option>
                            <option value="Desa" {{ old('jenis') == 'Desa' ? 'selected' : '' }}>Desa</option>
                        </select>
                        @error('jenis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('kelurahan.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save"></i> Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection