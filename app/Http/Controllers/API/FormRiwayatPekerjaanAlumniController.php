<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use Illuminate\Http\Request;
use App\Models\RiwayatPekerjaanAlumni;

class FormRiwayatPekerjaanAlumniController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'nim' => 'required|max:15',
            'nama_pekerjaan' => 'nullable|max:50',
            'nama_perusahaan' => 'nullable|max:50',
            'tahun_mulai' => 'nullable',
            'tahun_selesai' => 'nullable',
            'lokasi_pekerjaan' => 'nullable|max:255',
            'deskripsi_pekerjaan' => 'nullable|max:255',
        ]);

        $riwayat = new RiwayatPekerjaanAlumni();
        $riwayat->nim = $request->nim;
        $riwayat->nama_pekerjaan = $request->nama_pekerjaan;
        $riwayat->nama_perusahaan = $request->nama_perusahaan;
        $riwayat->tahun_mulai = $request->tahun_mulai;
        $riwayat->tahun_selesai = $request->tahun_selesai;
        $riwayat->lokasi_pekerjaan = $request->lokasi_pekerjaan;
        $riwayat->deskripsi_pekerjaan = $request->deskripsi_pekerjaan;
        $riwayat->save();

        return response()->json([
            'message'       => 'Data riwayat pekerjaan alumni berhasil ditambahkan',
            'data_riwayat_pekerjaan_alumni'  => $riwayat
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $riwayat = RiwayatPekerjaanAlumni::where('id', $id)->first();
        $riwayat->update($request->all());

        return response()->json([
            'message'       => 'Data riwayat pekerjaan alumni berhasil diubah',
            'data_riwayat_pekerjaan_alumni'  => $riwayat
        ], 200);
    }

    public function delete($id)
    {
        RiwayatPekerjaanAlumni::where('id', $id)->delete();

        return response()->json([
            'message'       => 'Data riwayat pekerjaan alumni berhasil dihapus',
        ], 200);
    }

    public function show(Alumni $nim)
    {
        $nim = Alumni::with('tahunMasuk', 'tahunLulus', 'provinsi', 'peminatan', 'riwayatPekerjaanAlumnis')->where('nim', $nim->nim)->get();

        return response()->json([
            'message'       => 'Berhasil menampilkan data alumni serta riwayat pekerjaan alumni',
            'data_alumni'  => $nim
        ], 200);
    }
}
