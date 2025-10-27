@extends('layouts.app')

@section('title', 'Data Kelurahan')
@section('page-title', 'Data Kelurahan/Desa')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Data Kelurahan/Desa</h5>
                <a href="{{ route('kelurahan.create') }}" class="btn btn-dark btn-sm">
                    <i class="fas fa-plus"></i> Tambah Kelurahan
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover data-table">
                        <thead class="table-dark">
                            <tr>
                                <th width="5%">No</th>
                                <th>Kode Kelurahan</th>
                                <th>Nama Kelurahan/Desa</th>
                                <th>Jenis</th>
                                <th>Kecamatan</th>
                                <th>Kota/Kabupaten</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kelurahan as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><span class="badge bg-secondary">{{ $item->kode_kelurahan }}</span></td>
                                    <td>{{ $item->nama_kelurahan }}</td>
                                    <td>
                                        @if($item->jenis == 'Kelurahan')
                                            <span class="badge bg-primary">Kelurahan</span>
                                        @else
                                            <span class="badge bg-success">Desa</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->kecamatan->nama_kecamatan }}</td>
                                    <td>{{ $item->kecamatan->kota->nama_kota }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('kelurahan.edit', $item->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('kelurahan.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" 
                                                    onclick="return confirm('Yakin ingin menghapus {{ $item->jenis }} {{ $item->nama_kelurahan }}?')" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">
                                        <div class="alert alert-info mb-0">
                                            <i class="fas fa-info-circle"></i> Belum ada data kelurahan
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