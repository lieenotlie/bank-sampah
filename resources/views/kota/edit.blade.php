@extends('layouts.app')

@section('title', 'Edit Kota')
@section('page-title', 'Edit Kota/Kabupaten')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0"><i class="fas fa-edit"></i> Edit Data Kota/Kabupaten</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('kota.update', $kota->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Provinsi <span class="text-danger">*</span></label>
                        <select name="provinsi_id" class="form-select @error('provinsi_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Provinsi --</option>
                            @foreach($provinsi as $item)
                                <option value="{{ $item->id }}" {{ old('provinsi_id', $kota->provinsi_id) == $item->id ? 'selected' : '' }}>
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
                            value="{{ old('kode_kota', $kota->kode_kota) }}" required>
                        @error('kode_kota')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Kota/Kabupaten <span class="text-danger">*</span></label>
                        <input type="text" name="nama_kota" class="form-control @error('nama_kota') is-invalid @enderror" 
                            value="{{ old('nama_kota', $kota->nama_kota) }}" required>
                        @error('nama_kota')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jenis <span class="text-danger">*</span></label>
                        <select name="jenis" class="form-select @error('jenis') is-invalid @enderror" required>
                            <option value="">-- Pilih Jenis --</option>
                            <option value="Kota" {{ old('jenis', $kota->jenis) == 'Kota' ? 'selected' : '' }}>Kota</option>
                            <option value="Kabupaten" {{ old('jenis', $kota->jenis) == 'Kabupaten' ? 'selected' : '' }}>Kabupaten</option>
                        </select>
                        @error('jenis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('kota.index') }}" class="btn btn-secondary">
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