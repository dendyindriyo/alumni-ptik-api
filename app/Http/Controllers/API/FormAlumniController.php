<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumni;
use App\Models\RiwayatPekerjaanAlumni;

class FormAlumniController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:alumni|max:15',
            'no_anggota_ika' => 'nullable|unique:alumni|max:15',
            'nama_alumni' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required'
        ]);

        $alumni = new Alumni;
        $alumni->nim = $request->nim;
        $alumni->no_anggota_ika = $request->no_anggota_ika;
        $alumni->nama_alumni = $request->nama_alumni;
        $alumni->jenis_kelamin = $request->jenis_kelamin;
        $alumni->tempat_lahir = $request->tempat_lahir;
        $alumni->tanggal_lahir = $request->tanggal_lahir;
        $alumni->agama = $request->agama;
        $alumni->save();

        return response()->json([
            'message'       => 'Data alumni berhasil ditambahkan',
            'data_alumni'  => $alumni
        ], 200);
    }

    public function update(Request $request, $nim)
    {
        $alumni = Alumni::where('nim', $nim)->first();
        $alumni->update($request->all());

        return response()->json([
            'message'       => 'Data alumni berhasil diubah',
            'data_alumni'  => $alumni
        ], 200);
    }

    public function delete($nim)
    {
        Alumni::where('nim', $nim)->delete();

        return response()->json([
            'message'       => 'Data alumni berhasil dihapus',
        ], 200);
    }

    public function show()
    {
        $alumni = Alumni::get();

        return response()->json([
            'message'       => 'Berhasil menampilkan detail data alumni',
            'data_alumni'  => $alumni
        ], 200);
    }

    public function searchNamaAlumni($nama_alumni)
    {
        $nama_alumni = Alumni::with('riwayatPekerjaanAlumnis')->where('nama_alumni', 'LIKE', '%' . $nama_alumni . '%')->get();

        return response()->json([
            'message'       => 'Berhasil menampilkan detail data alumni',
            'data_alumni'  => $nama_alumni
        ], 200);
    }

    public function searchNim($nim)
    {
        $nim = Alumni::with('riwayatPekerjaanAlumnis')->where('nim', 'LIKE', '%' . $nim . '%')->get();

        return response()->json([
            'message'       => 'Berhasil menampilkan detail data alumni',
            'data_alumni'  => $nim
        ], 200);
    }
}
