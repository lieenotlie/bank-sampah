@extends('layouts.app')

@section('title', 'Data Penduduk')
@section('page-title', 'Data Penduduk')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-users"></i> Data Penduduk</h5>
                <a href="{{ route('penduduk.create') }}" class="btn btn-light btn-sm">
                    <i class="fas fa-plus"></i> Tambah Penduduk
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover data-table">
                        <thead class="table-dark">
                            <tr>
                                <th width="5%">No</th>
                                <th>NIK</th>
                                <th>Nama Lengkap</th>
                                <th>JK</th>
                                <th>TTL</th>
                                <th>Alamat</th>
                                <th>Kelurahan</th>
                                <th>RT/RW</th>
                                <th>Telepon</th>
                                <th width="12%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($penduduk as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><small class="badge bg-secondary">{{ $item->nik }}</small></td>
                                    <td>{{ $item->nama_lengkap }}</td>
                                    <td>
                                        @if($item->jenis_kelamin == 'L')
                                            <span class="badge bg-primary">L</span>
                                        @else
                                            <span class="badge bg-danger">P</span>
                                        @endif
                                    </td>
                                    <td>
                                        <small>
                                            {{ $item->tempat_lahir }}, 
                                            {{ date('d-m-Y', strtotime($item->tanggal_lahir)) }}
                                        </small>
                                    </td>
                                    <td><small>{{ Str::limit($item->alamat, 30) }}</small></td>
                                    <td>
                                        <small>
                                            {{ $item->kelurahan->nama_kelurahan }}<br>
                                            <span class="text-muted">
                                                Kec. {{ $item->kelurahan->kecamatan->nama_kecamatan }}
                                            </span>
                                        </small>
                                    </td>
                                    <td><small>{{ $item->rt }}/{{ $item->rw }}</small></td>
                                    <td><small>{{ $item->no_telepon ?? '-' }}</small></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('penduduk.edit', $item->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('penduduk.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" 
                                                    onclick="return confirm('Yakin ingin menghapus data {{ $item->nama_lengkap }}?')" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center">
                                        <div class="alert alert-info mb-0">
                                            <i class="fas fa-info-circle"></i> Belum ada data penduduk
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