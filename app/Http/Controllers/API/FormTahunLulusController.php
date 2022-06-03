<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TahunLulus;

class FormTahunLulusController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'tahun_lulus' => 'required|unique:tahun_lulus'
        ]);

        $tahunlulus = new TahunLulus;
        $tahunlulus->tahun_lulus = $request->tahun_lulus;
        $tahunlulus->save();

        return response()->json([
            'message'       => 'Data tahun lulus berhasil ditambahkan',
            'data_tahun_lulus'  => $tahunlulus
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $tahunlulus = TahunLulus::where('id', $id)->first();
        $tahunlulus->update($request->all());

        return response()->json([
            'message'       => 'Data tahun lulus berhasil diubah',
            'data_alumni'  => $tahunlulus
        ], 200);
    }

    public function delete($id)
    {
        TahunLulus::where('id', $id)->delete();

        return response()->json([
            'message'       => 'Data tahun lulus berhasil dihapus',
        ], 200);
    }

    public function show()
    {
        $tahunlulus = TahunLulus::get();

        return response()->json([
            'message'       => 'Berhasil menampilkan data tahun lulus',
            'data_tahun_lulus'  => $tahunlulus
        ], 200);
    }
}
