@extends('layouts.app')

@section('title', 'Edit Provinsi')
@section('page-title', 'Edit Provinsi')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0"><i class="fas fa-edit"></i> Edit Data Provinsi</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('provinsi.update', $provinsi->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Kode Provinsi <span class="text-danger">*</span></label>
                        <input type="text" name="kode_provinsi" class="form-control @error('kode_provinsi') is-invalid @enderror" 
                            value="{{ old('kode_provinsi', $provinsi->kode_provinsi) }}" required>
                        @error('kode_provinsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Provinsi <span class="text-danger">*</span></label>
                        <input type="text" name="nama_provinsi" class="form-control @error('nama_provinsi') is-invalid @enderror" 
                            value="{{ old('nama_provinsi', $provinsi->nama_provinsi) }}" required>
                        @error('nama_provinsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('provinsi.index') }}" class="btn btn-secondary">
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