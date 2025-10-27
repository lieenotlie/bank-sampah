<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProvinsiController extends Controller
{
    // GET - Ambil semua data provinsi
    public function index()
    {
        $provinsi = Provinsi::all();
        return response()->json([
            'success' => true,
            'message' => 'Data provinsi berhasil diambil',
            'data' => $provinsi
        ], 200);
    }

    // POST - Tambah data provinsi baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_provinsi' => 'required|string|max:10|unique:provinsi',
            'nama_provinsi' => 'required|string|max:100'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $provinsi = Provinsi::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data provinsi berhasil ditambahkan',
            'data' => $provinsi
        ], 201);
    }

    // GET - Ambil satu data provinsi by ID
    public function show($id)
    {
        $provinsi = Provinsi::find($id);

        if (!$provinsi) {
            return response()->json([
                'success' => false,
                'message' => 'Data provinsi tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail data provinsi',
            'data' => $provinsi
        ], 200);
    }

    // PUT/PATCH - Update data provinsi
    public function update(Request $request, $id)
    {
        $provinsi = Provinsi::find($id);

        if (!$provinsi) {
            return response()->json([
                'success' => false,
                'message' => 'Data provinsi tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'kode_provinsi' => 'required|string|max:10|unique:provinsi,kode_provinsi,'.$id,
            'nama_provinsi' => 'required|string|max:100'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $provinsi->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data provinsi berhasil diupdate',
            'data' => $provinsi
        ], 200);
    }

    // DELETE - Hapus data provinsi
    public function destroy($id)
    {
        $provinsi = Provinsi::find($id);

        if (!$provinsi) {
            return response()->json([
                'success' => false,
                'message' => 'Data provinsi tidak ditemukan'
            ], 404);
        }

        $provinsi->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data provinsi berhasil dihapus'
        ], 200);
    }
}