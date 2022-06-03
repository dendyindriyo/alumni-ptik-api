<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provinsi;

class FormProvinsiController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'nama_provinsi' => 'required|unique:provinsi|max:50'
        ]);

        $provinsi = new Provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();

        return response()->json([
            'message'       => 'Data provinsi berhasil ditambahkan',
            'data_provinsi'  => $provinsi
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $provinsi = Provinsi::where('id', $id)->first();
        $provinsi->update($request->all());

        return response()->json([
            'message'       => 'Data provinsi berhasil diubah',
            'data_alumni'  => $provinsi
        ], 200);
    }

    public function delete($id)
    {
        Provinsi::where('id', $id)->delete();

        return response()->json([
            'message'       => 'Data provinsi berhasil dihapus',
        ], 200);
    }

    public function show()
    {
        $provinsi = Provinsi::get();

        return response()->json([
            'message'       => 'Berhasil menampilkan data provinsi',
            'data_provinsi'  => $provinsi
        ], 200);
    }
}
