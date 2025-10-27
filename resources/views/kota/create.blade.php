@extends('layouts.app')

@section('title', 'Tambah Kota')
@section('page-title', 'Tambah Kota/Kabupaten')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0"><i class="fas fa-plus"></i> Tambah Data Kota/Kabupaten</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('kota.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Provinsi <span class="text-danger">*</span></label>
                        <select name="provinsi_id" class="form-select @error('provinsi_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Provinsi --</option>
                            @foreach($provinsi as $item)
                                <option value="{{ $item->id }}" {{ old('provinsi_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_provinsi }}
                                </option>
                            @endforeach
                        </select>
                        @error('provinsi_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kode Kota <span class="text-danger">*</span></label>
                        <input type="text" name="kode_kota" class="form-control @error('kode_kota') is-invalid @enderror" 
                            value="{{ old('kode_kota') }}" placeholder="Contoh: 3273" required>
                        @error('kode_kota')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Kota/Kabupaten <span class="text-danger">*</span></label>
                        <input type="text" name="nama_kota" class="form-control @error('nama_kota') is-invalid @enderror" 
                            value="{{ old('nama_kota') }}" placeholder="Contoh: Bandung" required>
                        @error('nama_kota')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jenis <span class="text-danger">*</span></label>
                        <select name="jenis" class="form-select @error('jenis') is-invalid @enderror" required>
                            <option value="">-- Pilih Jenis --</option>
                            <option value="Kota" {{ old('jenis') == 'Kota' ? 'selected' : '' }}>Kota</option>
                            <option value="Kabupaten" {{ old('jenis') == 'Kabupaten' ? 'selected' : '' }}>Kabupaten</option>
                        </select>
                        @error('jenis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('kota.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection