<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PendudukController extends Controller
{
    public function index()
    {
        $penduduk = Penduduk::with('kelurahan.kecamatan.kota.provinsi')->get();
        return response()->json([
            'success' => true,
            'message' => 'Data penduduk berhasil diambil',
            'data' => $penduduk
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
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

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $penduduk = Penduduk::create($request->all());
        $penduduk->load('kelurahan.kecamatan.kota.provinsi');

        return response()->json([
            'success' => true,
            'message' => 'Data penduduk berhasil ditambahkan',
            'data' => $penduduk
        ], 201);
    }

    public function show($id)
    {
        $penduduk = Penduduk::with('kelurahan.kecamatan.kota.provinsi')->find($id);

        if (!$penduduk) {
            return response()->json([
                'success' => false,
                'message' => 'Data penduduk tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail data penduduk',
            'data' => $penduduk
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $penduduk = Penduduk::find($id);

        if (!$penduduk) {
            return response()->json([
                'success' => false,
                'message' => 'Data penduduk tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
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

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $penduduk->update($request->all());
        $penduduk->load('kelurahan.kecamatan.kota.provinsi');

        return response()->json([
            'success' => true,
            'message' => 'Data penduduk berhasil diupdate',
            'data' => $penduduk
        ], 200);
    }

    public function destroy($id)
    {
        $penduduk = Penduduk::find($id);

        if (!$penduduk) {
            return response()->json([
                'success' => false,
                'message' => 'Data penduduk tidak ditemukan'
            ], 404);
        }

        $penduduk->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data penduduk berhasil dihapus'
        ], 200);
    }
}