@extends('layouts.app')

@section('title', 'Data Kota')
@section('page-title', 'Data Kota/Kabupaten')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-city"></i> Data Kota/Kabupaten</h5>
                <a href="{{ route('kota.create') }}" class="btn btn-light btn-sm">
                    <i class="fas fa-plus"></i> Tambah Kota
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover data-table">
                        <thead class="table-dark">
                            <tr>
                                <th width="5%">No</th>
                                <th>Kode Kota</th>
                                <th>Nama Kota</th>
                                <th>Jenis</th>
                                <th>Provinsi</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kota as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><span class="badge bg-secondary">{{ $item->kode_kota }}</span></td>
                                    <td>{{ $item->nama_kota }}</td>
                                    <td>
                                        @if($item->jenis == 'Kota')
                                            <span class="badge bg-primary">Kota</span>
                                        @else
                                            <span class="badge bg-info">Kabupaten</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->provinsi->nama_provinsi }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('kota.edit', $item->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('kota.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" 
                                                    onclick="return confirm('Yakin ingin menghapus {{ $item->jenis }} {{ $item->nama_kota }}?')" title="Hapus">
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
                                            <i class="fas fa-info-circle"></i> Belum ada data kota
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