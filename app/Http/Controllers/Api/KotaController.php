<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KotaController extends Controller
{
    public function index()
    {
        $kota = Kota::with('provinsi')->get();
        return response()->json([
            'success' => true,
            'message' => 'Data kota berhasil diambil',
            'data' => $kota
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'provinsi_id' => 'required|exists:provinsi,id',
            'kode_kota' => 'required|string|max:10|unique:kota',
            'nama_kota' => 'required|string|max:100',
            'jenis' => 'required|in:Kota,Kabupaten'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $kota = Kota::create($request->all());
        $kota->load('provinsi');

        return response()->json([
            'success' => true,
            'message' => 'Data kota berhasil ditambahkan',
            'data' => $kota
        ], 201);
    }

    public function show($id)
    {
        $kota = Kota::with('provinsi')->find($id);

        if (!$kota) {
            return response()->json([
                'success' => false,
                'message' => 'Data kota tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail data kota',
            'data' => $kota
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $kota = Kota::find($id);

        if (!$kota) {
            return response()->json([
                'success' => false,
                'message' => 'Data kota tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'provinsi_id' => 'required|exists:provinsi,id',
            'kode_kota' => 'required|string|max:10|unique:kota,kode_kota,'.$id,
            'nama_kota' => 'required|string|max:100',
            'jenis' => 'required|in:Kota,Kabupaten'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $kota->update($request->all());
        $kota->load('provinsi');

        return response()->json([
            'success' => true,
            'message' => 'Data kota berhasil diupdate',
            'data' => $kota
        ], 200);
    }

    public function destroy($id)
    {
        $kota = Kota::find($id);

        if (!$kota) {
            return response()->json([
                'success' => false,
                'message' => 'Data kota tidak ditemukan'
            ], 404);
        }

        $kota->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data kota berhasil dihapus'
        ], 200);
    }
}