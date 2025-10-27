<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelurahanController extends Controller
{
    public function index()
    {
        $kelurahan = Kelurahan::with('kecamatan.kota.provinsi')->get();
        return response()->json([
            'success' => true,
            'message' => 'Data kelurahan berhasil diambil',
            'data' => $kelurahan
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kecamatan_id' => 'required|exists:kecamatan,id',
            'kode_kelurahan' => 'required|string|max:10|unique:kelurahan',
            'nama_kelurahan' => 'required|string|max:100',
            'jenis' => 'required|in:Kelurahan,Desa'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $kelurahan = Kelurahan::create($request->all());
        $kelurahan->load('kecamatan.kota.provinsi');

        return response()->json([
            'success' => true,
            'message' => 'Data kelurahan berhasil ditambahkan',
            'data' => $kelurahan
        ], 201);
    }

    public function show($id)
    {
        $kelurahan = Kelurahan::with('kecamatan.kota.provinsi')->find($id);

        if (!$kelurahan) {
            return response()->json([
                'success' => false,
                'message' => 'Data kelurahan tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail data kelurahan',
            'data' => $kelurahan
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $kelurahan = Kelurahan::find($id);

        if (!$kelurahan) {
            return response()->json([
                'success' => false,
                'message' => 'Data kelurahan tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'kecamatan_id' => 'required|exists:kecamatan,id',
            'kode_kelurahan' => 'required|string|max:10|unique:kelurahan,kode_kelurahan,'.$id,
            'nama_kelurahan' => 'required|string|max:100',
            'jenis' => 'required|in:Kelurahan,Desa'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $kelurahan->update($request->all());
        $kelurahan->load('kecamatan.kota.provinsi');

        return response()->json([
            'success' => true,
            'message' => 'Data kelurahan berhasil diupdate',
            'data' => $kelurahan
        ], 200);
    }

    public function destroy($id)
    {
        $kelurahan = Kelurahan::find($id);

        if (!$kelurahan) {
            return response()->json([
                'success' => false,
                'message' => 'Data kelurahan tidak ditemukan'
            ], 404);
        }

        $kelurahan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data kelurahan berhasil dihapus'
        ], 200);
    }
}