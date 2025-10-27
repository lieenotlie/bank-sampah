@extends('layouts.app')

@section('title', 'Data Kecamatan')
@section('page-title', 'Data Kecamatan')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-map-marked"></i> Data Kecamatan</h5>
                <a href="{{ route('kecamatan.create') }}" class="btn btn-light btn-sm">
                    <i class="fas fa-plus"></i> Tambah Kecamatan
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover data-table">
                        <thead class="table-dark">
                            <tr>
                                <th width="5%">No</th>
                                <th>Kode Kecamatan</th>
                                <th>Nama Kecamatan</th>
                                <th>Kota/Kabupaten</th>
                                <th>Provinsi</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kecamatan as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><span class="badge bg-secondary">{{ $item->kode_kecamatan }}</span></td>
                                    <td>{{ $item->nama_kecamatan }}</td>
                                    <td>{{ $item->kota->nama_kota }}</td>
                                    <td>{{ $item->kota->provinsi->nama_provinsi }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('kecamatan.edit', $item->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('kecamatan.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" 
                                                    onclick="return confirm('Yakin ingin menghapus Kecamatan {{ $item->nama_kecamatan }}?')" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">
                                        <div class="alert alert-info mb-0">
                                            <i class="fas fa-info-circle"></i> Belum ada data kecamatan
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection