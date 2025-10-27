@extends('layouts.app')

@section('title', 'Data Provinsi')
@section('page-title', 'Data Provinsi')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-map-marked-alt"></i> Data Provinsi</h5>
                <a href="{{ route('provinsi.create') }}" class="btn btn-light btn-sm">
                    <i class="fas fa-plus"></i> Tambah Provinsi
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover data-table">
                        <thead class="table-dark">
                            <tr>
                                <th width="5%">No</th>
                                <th>Kode Provinsi</th>
                                <th>Nama Provinsi</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($provinsi as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><span class="badge bg-secondary">{{ $item->kode_provinsi }}</span></td>
                                    <td>{{ $item->nama_provinsi }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('provinsi.edit', $item->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('provinsi.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" 
                                                    onclick="return confirm('Yakin ingin menghapus provinsi {{ $item->nama_provinsi }}?')" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">
                                        <div class="alert alert-info mb-0">
                                            <i class="fas fa-info-circle"></i> Belum ada data provinsi
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