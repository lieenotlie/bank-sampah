<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\Kota;
use Illuminate\Http\Request;

class KecamatanWebController extends Controller
{
    public function index()
    {
        $kecamatan = Kecamatan::with('kota.provinsi')->latest()->get();
        return view('kecamatan.index', compact('kecamatan'));
    }

    public function create()
    {
        $kota = Kota::with('provinsi')->get();
        return view('kecamatan.create', compact('kota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kota_id' => 'required|exists:kota,id',
            'kode_kecamatan' => 'required|string|max:10|unique:kecamatan',
            'nama_kecamatan' => 'required|string|max:100'
        ]);

        Kecamatan::create($request->all());

        return redirect()->route('kecamatan.index')
            ->with('success', 'Data kecamatan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kota = Kota::with('provinsi')->get();
        return view('kecamatan.edit', compact('kecamatan', 'kota'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kota_id' => 'required|exists:kota,id',
            'kode_kecamatan' => 'required|string|max:10|unique:kecamatan,kode_kecamatan,'.$id,
            'nama_kecamatan' => 'required|string|max:100'
        ]);

        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->update($request->all());

        return redirect()->route('kecamatan.index')
            ->with('success', 'Data kecamatan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->delete();

        return redirect()->route('kecamatan.index')
            ->with('success', 'Data kecamatan berhasil dihapus!');
    }
}