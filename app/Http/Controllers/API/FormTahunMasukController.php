<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TahunMasuk;
use App\Models\Alumni;

class FormTahunMasukController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'tahun_masuk' => 'required|unique:tahun_masuk'
        ]);

        $tahunmasuk = new TahunMasuk;
        $tahunmasuk->tahun_masuk = $request->tahun_masuk;
        $tahunmasuk->save();

        return response()->json([
            'message'       => 'Data tahun masuk berhasil ditambahkan',
            'data_tahun_masuk'  => $tahunmasuk
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun_masuk' => 'required|unique:tahun_masuk'
        ]);
        $tahunmasuk = TahunMasuk::where('id', $id)->first();
        $tahunmasuk->update($request->all());

        return response()->json([
            'message'       => 'Data tahun masuk berhasil diubah',
            'data_tahun_masuk'  => $tahunmasuk
        ], 200);
    }

    public function delete($id)
    {
        TahunMasuk::where('id', $id)->delete();

        return response()->json([
            'message'       => 'Data tahun masuk berhasil dihapus',
        ], 200);
    }

    public function show()
    {
        $tahunmasuk = TahunMasuk::get();

        return response()->json([
            'message'       => 'Berhasil menampilkan data tahun masuk',
            'data_tahun_masuk'  => $tahunmasuk
        ], 200);
    }

    public function showAlumni(TahunMasuk $id_tahun_masuk)
    {
        $id_tahun_masuk = TahunMasuk::with('alumnis')->where('id', $id_tahun_masuk->id)->get();

        return response()->json([
            'message'       => 'Berhasil menampilkan detail data alumni berdasarkan tahun masuk',
            'data_tahun_masuk'  => $id_tahun_masuk
        ], 200);
    }
}
