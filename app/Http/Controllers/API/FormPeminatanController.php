<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminatan;

class FormPeminatanController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'nama_peminatan' => 'required|unique:peminatan|max:50'
        ]);

        $peminatan = new Peminatan;
        $peminatan->nama_peminatan = $request->nama_peminatan;
        $peminatan->save();

        return response()->json([
            'message'       => 'Data peminatan berhasil ditambahkan',
            'data_peminatan'  => $peminatan
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $peminatan = Peminatan::where('id', $id)->first();
        $peminatan->update($request->all());

        return response()->json([
            'message'       => 'Data peminatan berhasil diubah',
            'data_alumni'  => $peminatan
        ], 200);
    }

    public function delete($id)
    {
        Peminatan::where('id', $id)->delete();

        return response()->json([
            'message'       => 'Data peminatan berhasil dihapus',
        ], 200);
    }

    public function show()
    {
        $peminatan = Peminatan::get();

        return response()->json([
            'message'       => 'Berhasil menampilkan data peminatan',
            'data_peminatan'  => $peminatan
        ], 200);
    }
}
