@extends('layouts.app')

@section('title', 'Edit Kecamatan')
@section('page-title', 'Edit Kecamatan')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0"><i class="fas fa-edit"></i> Edit Data Kecamatan</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('kecamatan.update', $kecamatan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Kota/Kabupaten <span class="text-danger">*</span></label>
                        <select name="kota_id" class="form-select @error('kota_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Kota/Kabupaten --</option>
                            @foreach($kota as $item)
                                <option value="{{ $item->id }}" {{ old('kota_id', $kecamatan->kota_id) == $item->id ? 'selected' : '' }}>
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
                            value="{{ old('kode_kecamatan', $kecamatan->kode_kecamatan) }}" required>
                        @error('kode_kecamatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Kecamatan <span class="text-danger">*</span></label>
                        <input type="text" name="nama_kecamatan" class="form-control @error('nama_kecamatan') is-invalid @enderror" 
                            value="{{ old('nama_kecamatan', $kecamatan->nama_kecamatan) }}" required>
                        @error('nama_kecamatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('kecamatan.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save"></i> Update Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection