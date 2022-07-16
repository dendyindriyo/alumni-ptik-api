<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BeritaAlumni;

class FormBeritaAlumniController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'nama_berita' => 'required|max:50',
            'isi_berita' => 'required',
            'waktu_berita' => 'required',
            'tempat_berita' => 'required|max:255',
            'foto_berita' => 'nullable|image|mimes:jpg,bmp,png|max:2048',
        ]);

        $beritaalumni = new BeritaAlumni;
        $beritaalumni->nama_berita = $request->nama_berita;
        $beritaalumni->isi_berita = $request->isi_berita;
        $beritaalumni->waktu_berita = $request->waktu_berita;
        $beritaalumni->tempat_berita = $request->tempat_berita;
        if ($request->foto_berita && $request->foto_berita->isValid()) {
            $file_name = time() . '.' . $request->foto_berita->extension();
            $request->foto_berita->move(storage_path('app/images/beritaalumni'), $file_name);
            $path = "storage/app/images/beritaalumni/$file_name";
            $beritaalumni->foto_berita = $path;
        }
        $beritaalumni->save();

        return response()->json([
            'message'       => 'Data berita alumni berhasil ditambahkan',
            'data_berita_alumni'  => $beritaalumni
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_berita' => 'required|max:50',
            'isi_berita' => 'required',
            'waktu_berita' => 'required',
            'tempat_berita' => 'required|max:255',
            'foto_berita' => 'nullable|image|mimes:jpg,bmp,png|max:2048',
        ]);

        $beritaalumni = BeritaAlumni::where('id', $id)->first();;
        $beritaalumni->nama_berita = $request->nama_berita;
        $beritaalumni->isi_berita = $request->isi_berita;
        $beritaalumni->waktu_berita = $request->waktu_berita;
        $beritaalumni->tempat_berita = $request->tempat_berita;
        if ($request->foto_berita && $request->foto_berita->isValid()) {
            $file_name = time() . '.' . $request->foto_berita->extension();
            $request->foto_berita->move(storage_path('app/images/beritaalumni'), $file_name);
            $path = "storage/app/images/beritaalumni/$file_name";
            $beritaalumni->foto_berita = $path;
        }
        $beritaalumni->update();

        return response()->json([
            'message'       => 'Data berita alumni berhasil diubah',
            'data_berita_alumni'  => $beritaalumni
        ], 200);
    }

    public function delete($id)
    {
        BeritaAlumni::where('id', $id)->delete();

        return response()->json([
            'message'       => 'Data berita alumni berhasil dihapus',
        ], 200);
    }

    public function show()
    {
        $beritaalumni = BeritaAlumni::get();

        return response()->json([
            'message'       => 'Berhasil menampilkan data berita alumni',
            'data_berita_alumni'  => $beritaalumni
        ], 200);
    }
}
