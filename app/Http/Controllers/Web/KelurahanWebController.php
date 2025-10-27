<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KelurahanWebController extends Controller
{
    public function index()
    {
        $kelurahan = Kelurahan::with('kecamatan.kota.provinsi')->latest()->get();
        return view('kelurahan.index', compact('kelurahan'));
    }

    public function create()
    {
        $kecamatan = Kecamatan::with('kota.provinsi')->get();
        return view('kelurahan.create', compact('kecamatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kecamatan_id' => 'required|exists:kecamatan,id',
            'kode_kelurahan' => 'required|string|max:10|unique:kelurahan',
            'nama_kelurahan' => 'required|string|max:100',
            'jenis' => 'required|in:Kelurahan,Desa'
        ]);

        Kelurahan::create($request->all());

        return redirect()->route('kelurahan.index')
            ->with('success', 'Data kelurahan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kecamatan = Kecamatan::with('kota.provinsi')->get();
        return view('kelurahan.edit', compact('kelurahan', 'kecamatan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kecamatan_id' => 'required|exists:kecamatan,id',
            'kode_kelurahan' => 'required|string|max:10|unique:kelurahan,kode_kelurahan,'.$id,
            'nama_kelurahan' => 'required|string|max:100',
            'jenis' => 'required|in:Kelurahan,Desa'
        ]);

        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->update($request->all());

        return redirect()->route('kelurahan.index')
            ->with('success', 'Data kelurahan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->delete();

        return redirect()->route('kelurahan.index')
            ->with('success', 'Data kelurahan berhasil dihapus!');
    }
}