<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KegiatanAlumni;

class FormKegiatanAlumniController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|max:50',
            'deskripsi_kegiatan' => 'required',
            'waktu_kegiatan' => 'required',
            'tempat_kegiatan' => 'required|max:255',
            'foto_kegiatan' => 'nullable|image|mimes:jpg,bmp,png|max:2048',
        ]);

        $kegiatanalumni = new KegiatanAlumni;
        $kegiatanalumni->nama_kegiatan = $request->nama_kegiatan;
        $kegiatanalumni->deskripsi_kegiatan = $request->deskripsi_kegiatan;
        $kegiatanalumni->waktu_kegiatan = $request->waktu_kegiatan;
        $kegiatanalumni->tempat_kegiatan = $request->tempat_kegiatan;
        if ($request->foto_kegiatan && $request->foto_kegiatan->isValid()) {
            $file_name = time() . '.' . $request->foto_kegiatan->extension();
            $request->foto_kegiatan->move(storage_path('app/images/kegiatanalumni'), $file_name);
            $path = "storage/app/images/kegiatanalumni/$file_name";
            $kegiatanalumni->foto_kegiatan = $path;
        }
        $kegiatanalumni->save();

        return response()->json([
            'message'       => 'Data kegiatan alumni berhasil ditambahkan',
            'data_kegiatan_alumni'  => $kegiatanalumni
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kegiatan' => 'required|max:50',
            'deskripsi_kegiatan' => 'required',
            'waktu_kegiatan' => 'required',
            'tempat_kegiatan' => 'required|max:255',
            'foto_kegiatan' => 'nullable|image|mimes:jpg,bmp,png|max:2048',
        ]);

        $kegiatanalumni = KegiatanAlumni::where('id', $id)->first();;
        $kegiatanalumni->nama_kegiatan = $request->nama_kegiatan;
        $kegiatanalumni->deskripsi_kegiatan = $request->deskripsi_kegiatan;
        $kegiatanalumni->waktu_kegiatan = $request->waktu_kegiatan;
        $kegiatanalumni->tempat_kegiatan = $request->tempat_kegiatan;
        if ($request->foto_kegiatan && $request->foto_kegiatan->isValid()) {
            $file_name = time() . '.' . $request->foto_kegiatan->extension();
            $request->foto_kegiatan->move(storage_path('app/images/kegiatanalumni'), $file_name);
            $path = "storage/app/images/kegiatanalumni/$file_name";
            $kegiatanalumni->foto_kegiatan = $path;
        }
        $kegiatanalumni->update();

        return response()->json([
            'message'       => 'Data kegiatan alumni berhasil diubah',
            'data_kegiatan_alumni'  => $kegiatanalumni
        ], 200);
    }

    public function delete($id)
    {
        KegiatanAlumni::where('id', $id)->delete();

        return response()->json([
            'message'       => 'Data kegiatan alumni berhasil dihapus',
        ], 200);
    }

    public function show()
    {
        $kegiatanalumni = KegiatanAlumni::get();

        return response()->json([
            'message'       => 'Berhasil menampilkan data kegiatan alumni',
            'data_kegiatan_alumni'  => $kegiatanalumni
        ], 200);
    }
}
