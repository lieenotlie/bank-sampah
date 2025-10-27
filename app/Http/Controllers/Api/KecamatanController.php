<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KecamatanController extends Controller
{
    public function index()
    {
        $kecamatan = Kecamatan::with('kota.provinsi')->get();
        return response()->json([
            'success' => true,
            'message' => 'Data kecamatan berhasil diambil',
            'data' => $kecamatan
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kota_id' => 'required|exists:kota,id',
            'kode_kecamatan' => 'required|string|max:10|unique:kecamatan',
            'nama_kecamatan' => 'required|string|max:100'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $kecamatan = Kecamatan::create($request->all());
        $kecamatan->load('kota.provinsi');

        return response()->json([
            'success' => true,
            'message' => 'Data kecamatan berhasil ditambahkan',
            'data' => $kecamatan
        ], 201);
    }

    public function show($id)
    {
        $kecamatan = Kecamatan::with('kota.provinsi')->find($id);

        if (!$kecamatan) {
            return response()->json([
                'success' => false,
                'message' => 'Data kecamatan tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail data kecamatan',
            'data' => $kecamatan
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $kecamatan = Kecamatan::find($id);

        if (!$kecamatan) {
            return response()->json([
                'success' => false,
                'message' => 'Data kecamatan tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'kota_id' => 'required|exists:kota,id',
            'kode_kecamatan' => 'required|string|max:10|unique:kecamatan,kode_kecamatan,'.$id,
            'nama_kecamatan' => 'required|string|max:100'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $kecamatan->update($request->all());
        $kecamatan->load('kota.provinsi');

        return response()->json([
            'success' => true,
            'message' => 'Data kecamatan berhasil diupdate',
            'data' => $kecamatan
        ], 200);
    }

    public function destroy($id)
    {
        $kecamatan = Kecamatan::find($id);

        if (!$kecamatan) {
            return response()->json([
                'success' => false,
                'message' => 'Data kecamatan tidak ditemukan'
            ], 404);
        }

        $kecamatan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data kecamatan berhasil dihapus'
        ], 200);
    }
}