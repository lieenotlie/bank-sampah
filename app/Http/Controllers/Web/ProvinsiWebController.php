<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiWebController extends Controller
{
    public function index()
    {
        $provinsi = Provinsi::latest()->get();
        return view('provinsi.index', compact('provinsi'));
    }

    public function create()
    {
        return view('provinsi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_provinsi' => 'required|string|max:10|unique:provinsi',
            'nama_provinsi' => 'required|string|max:100'
        ]);

        Provinsi::create($request->all());

        return redirect()->route('provinsi.index')
            ->with('success', 'Data provinsi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        return view('provinsi.edit', compact('provinsi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_provinsi' => 'required|string|max:10|unique:provinsi,kode_provinsi,'.$id,
            'nama_provinsi' => 'required|string|max:100'
        ]);

        $provinsi = Provinsi::findOrFail($id);
        $provinsi->update($request->all());

        return redirect()->route('provinsi.index')
            ->with('success', 'Data provinsi berhasil diupdate!');
    }

    public function destroy($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->delete();

        return redirect()->route('provinsi.index')
            ->with('success', 'Data provinsi berhasil dihapus!');
    }
}