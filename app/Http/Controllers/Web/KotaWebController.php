<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class KotaWebController extends Controller
{
    public function index()
    {
        $kota = Kota::with('provinsi')->latest()->get();
        return view('kota.index', compact('kota'));
    }

    public function create()
    {
        $provinsi = Provinsi::all();
        return view('kota.create', compact('provinsi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'provinsi_id' => 'required|exists:provinsi,id',
            'kode_kota' => 'required|string|max:10|unique:kota',
            'nama_kota' => 'required|string|max:100',
            'jenis' => 'required|in:Kota,Kabupaten'
        ]);

        Kota::create($request->all());

        return redirect()->route('kota.index')
            ->with('success', 'Data kota berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kota = Kota::findOrFail($id);
        $provinsi = Provinsi::all();
        return view('kota.edit', compact('kota', 'provinsi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'provinsi_id' => 'required|exists:provinsi,id',
            'kode_kota' => 'required|string|max:10|unique:kota,kode_kota,'.$id,
            'nama_kota' => 'required|string|max:100',
            'jenis' => 'required|in:Kota,Kabupaten'
        ]);

        $kota = Kota::findOrFail($id);
        $kota->update($request->all());

        return redirect()->route('kota.index')
            ->with('success', 'Data kota berhasil diupdate!');
    }

    public function destroy($id)
    {
        $kota = Kota::findOrFail($id);
        $kota->delete();

        return redirect()->route('kota.index')
            ->with('success', 'Data kota berhasil dihapus!');
    }
}