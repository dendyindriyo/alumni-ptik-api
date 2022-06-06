<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AlumniBerprestasi;

class FormAlumniBerprestasiController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'nama_prestasi' => 'required|max:100',
            'nama_alumni' => 'required|max:100',
            'waktu_prestasi' => 'required',
            'foto_alumni' => 'nullable|image|mimes:jpg,bmp,png|max:2048',
            'deskripsi_prestasi' => 'required',
        ]);

        $alumniberprestasi = new AlumniBerprestasi;
        $alumniberprestasi->nama_prestasi = $request->nama_prestasi;
        $alumniberprestasi->nama_alumni = $request->nama_alumni;
        $alumniberprestasi->waktu_prestasi = $request->waktu_prestasi;
        if ($request->foto_alumni && $request->foto_alumni->isValid()) {
            $file_name = time() . '.' . $request->foto_alumni->extension();
            $request->foto_alumni->move(storage_path('app/images/alumniberprestasi'), $file_name);
            $path = "storage/app/images/alumniberprestasi/$file_name";
            $alumniberprestasi->foto_alumni = $path;
        }
        $alumniberprestasi->deskripsi_prestasi = $request->deskripsi_prestasi;
        $alumniberprestasi->save();

        return response()->json([
            'message'       => 'Data alumni berprestasi berhasil ditambahkan',
            'data_alumni_berprestasi'  => $alumniberprestasi
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_prestasi' => 'required|max:100',
            'nama_alumni' => 'required|max:100',
            'waktu_prestasi' => 'required',
            'foto_alumni' => 'nullable|image|mimes:jpg,bmp,png|max:2048',
            'deskripsi_prestasi' => 'required',
        ]);

        $alumniberprestasi = AlumniBerprestasi::where('id', $id)->first();;
        $alumniberprestasi->nama_prestasi = $request->nama_prestasi;
        $alumniberprestasi->nama_alumni = $request->nama_alumni;
        $alumniberprestasi->waktu_prestasi = $request->waktu_prestasi;
        if ($request->foto_alumni && $request->foto_alumni->isValid()) {
            $file_name = time() . '.' . $request->foto_alumni->extension();
            $request->foto_alumni->move(storage_path('app/images/alumniberprestasi'), $file_name);
            $path = "storage/app/images/alumniberprestasi/$file_name";
            $alumniberprestasi->foto_alumni = $path;
        }
        $alumniberprestasi->deskripsi_prestasi = $request->deskripsi_prestasi;
        $alumniberprestasi->update();

        return response()->json([
            'message'       => 'Data alumni berprestasi berhasil ditambahkan',
            'data_alumni_berprestasi'  => $alumniberprestasi
        ], 200);
    }

    public function delete($id)
    {
        AlumniBerprestasi::where('id', $id)->delete();

        return response()->json([
            'message'       => 'Data alumni berprestasi berhasil dihapus',
        ], 200);
    }

    public function show()
    {
        $alumniberprestasi = AlumniBerprestasi::get();

        return response()->json([
            'message'       => 'Berhasil menampilkan data alumni berprestasi',
            'data_alumni_berprestasi'  => $alumniberprestasi
        ], 200);
    }
}
