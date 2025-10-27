@extends('layouts.app')

@section('title', 'Tambah Kecamatan')
@section('page-title', 'Tambah Kecamatan')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0"><i class="fas fa-plus"></i> Tambah Data Kecamatan</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('kecamatan.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Kota/Kabupaten <span class="text-danger">*</span></label>
                        <select name="kota_id" class="form-select @error('kota_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Kota/Kabupaten --</option>
                            @foreach($kota as $item)
                                <option value="{{ $item->id }}" {{ old('kota_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_kota }} - {{ $item->provinsi->nama_provinsi }}
                                </option>
                            @endforeach
                        </select>
                        @error('kota_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kode Kecamatan <span class="text-danger">*</span></label>
                        <input type="text" name="kode_kecamatan" class="form-control @error('kode_kecamatan') is-invalid @enderror" 
                            value="{{ old('kode_kecamatan') }}" placeholder="Contoh: 3273010" required>
                        @error('kode_kecamatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Kecamatan <span class="text-danger">*</span></label>
                        <input type="text" name="nama_kecamatan" class="form-control @error('nama_kecamatan') is-invalid @enderror" 
                            value="{{ old('nama_kecamatan') }}" placeholder="Contoh: Bandung Wetan" required>
                        @error('nama_kecamatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('kecamatan.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-info">
                            <i class="fas fa-save"></i> Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection