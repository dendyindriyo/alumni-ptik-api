<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Beasiswa;

class FormBeasiswaController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'nama_beasiswa' => 'required',
            'waktu_beasiswa' => 'required',
            'deskripsi_beasiswa' => 'required',
        ]);

        $beasiswa = new Beasiswa;
        $beasiswa->nama_beasiswa = $request->nama_beasiswa;
        $beasiswa->waktu_beasiswa = $request->waktu_beasiswa;
        $beasiswa->deskripsi_beasiswa = $request->deskripsi_beasiswa;
        $beasiswa->save();

        return response()->json([
            'message'       => 'Data beasiswa berhasil ditambahkan',
            'data_beasiswa'  => $beasiswa
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_beasiswa' => 'required',
            'waktu_beasiswa' => 'required',
            'deskripsi_beasiswa' => 'required',
        ]);

        $beasiswa = Beasiswa::where('id', $id)->first();
        $beasiswa->update($request->all());

        return response()->json([
            'message'       => 'Data beasiswa berhasil diubah',
            'data_beasiswa'  => $beasiswa
        ], 200);
    }

    public function delete($id)
    {
        Beasiswa::where('id', $id)->delete();

        return response()->json([
            'message'       => 'Data beasiswa berhasil dihapus',
        ], 200);
    }

    public function show()
    {
        $beasiswa = Beasiswa::get();

        return response()->json([
            'message'       => 'Berhasil menampilkan data beasiswa',
            'data_beasiswa'  => $beasiswa
        ], 200);
    }
}
