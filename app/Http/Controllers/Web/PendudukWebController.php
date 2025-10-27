<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class PendudukWebController extends Controller
{
    // Tampilkan halaman list penduduk
    public function index()
    {
        $penduduk = Penduduk::with('kelurahan.kecamatan.kota.provinsi')->get();
        return view('penduduk.index', compact('penduduk'));
    }

    // Tampilkan form tambah penduduk
    public function create()
    {
        $kelurahan = Kelurahan::with('kecamatan.kota.provinsi')->get();
        return view('penduduk.create', compact('kelurahan'));
    }

    // Proses simpan data penduduk
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|size:16|unique:penduduk',
            'nama_lengkap' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'kelurahan_id' => 'required|exists:kelurahan,id',
            'rt' => 'required|string|max:5',
            'rw' => 'required|string|max:5',
            'no_telepon' => 'nullable|string|max:15'
        ]);

        Penduduk::create($request->all());

        return redirect()->route('penduduk.index')
            ->with('success', 'Data penduduk berhasil ditambahkan!');
    }

    // Tampilkan form edit penduduk
    public function edit($id)
    {
        $penduduk = Penduduk::findOrFail($id);
        $kelurahan = Kelurahan::with('kecamatan.kota.provinsi')->get();
        return view('penduduk.edit', compact('penduduk', 'kelurahan'));
    }

    // Proses update data penduduk
    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required|string|size:16|unique:penduduk,nik,'.$id,
            'nama_lengkap' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'kelurahan_id' => 'required|exists:kelurahan,id',
            'rt' => 'required|string|max:5',
            'rw' => 'required|string|max:5',
            'no_telepon' => 'nullable|string|max:15'
        ]);

        $penduduk = Penduduk::findOrFail($id);
        $penduduk->update($request->all());

        return redirect()->route('penduduk.index')
            ->with('success', 'Data penduduk berhasil diupdate!');
    }

    // Proses hapus data penduduk
    public function destroy($id)
    {
        $penduduk = Penduduk::findOrFail($id);
        $penduduk->delete();

        return redirect()->route('penduduk.index')
            ->with('success', 'Data penduduk berhasil dihapus!');
    }
}