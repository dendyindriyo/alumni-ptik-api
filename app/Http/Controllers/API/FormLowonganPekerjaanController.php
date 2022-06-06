<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LowonganPekerjaan;

class FormLowonganPekerjaanController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'nama_lowongan' => 'required|max:50',
            'deksripsi_lowongan' => 'required',
            'waktu_lowongan' => 'required',
            'alamat_lowongan' => 'required|max:255',
            'kontak_lowongan' => 'required|max:255',
            'foto_lowongan' => 'nullable|image|mimes:jpg,bmp,png|max:2048',
        ]);

        $lowonganpekerjaan = new LowonganPekerjaan;
        $lowonganpekerjaan->nama_lowongan = $request->nama_lowongan;
        $lowonganpekerjaan->deksripsi_lowongan = $request->deksripsi_lowongan;
        $lowonganpekerjaan->waktu_lowongan = $request->waktu_lowongan;
        $lowonganpekerjaan->alamat_lowongan = $request->alamat_lowongan;
        $lowonganpekerjaan->kontak_lowongan = $request->kontak_lowongan;
        if ($request->foto_lowongan && $request->foto_lowongan->isValid()) {
            $file_name = time() . '.' . $request->foto_lowongan->extension();
            $request->foto_lowongan->move(storage_path('app/images/lowonganpekerjaan'), $file_name);
            $path = "storage/app/images/lowonganpekerjaan/$file_name";
            $lowonganpekerjaan->foto_lowongan = $path;
        }
        $lowonganpekerjaan->save();

        return response()->json([
            'message'       => 'Data lowongan pekerjaan berhasil ditambahkan',
            'data_lowongan_pekerjaan'  => $lowonganpekerjaan
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lowongan' => 'required|max:50',
            'deksripsi_lowongan' => 'required',
            'waktu_lowongan' => 'required',
            'alamat_lowongan' => 'required|max:255',
            'kontak_lowongan' => 'required|max:255',
            'foto_lowongan' => 'nullable|image|mimes:jpg,bmp,png|max:2048',
        ]);

        $lowonganpekerjaan = LowonganPekerjaan::where('id', $id)->first();;
        $lowonganpekerjaan->nama_lowongan = $request->nama_lowongan;
        $lowonganpekerjaan->deksripsi_lowongan = $request->deksripsi_lowongan;
        $lowonganpekerjaan->waktu_lowongan = $request->waktu_lowongan;
        $lowonganpekerjaan->alamat_lowongan = $request->alamat_lowongan;
        $lowonganpekerjaan->kontak_lowongan = $request->kontak_lowongan;
        if ($request->foto_lowongan && $request->foto_lowongan->isValid()) {
            $file_name = time() . '.' . $request->foto_lowongan->extension();
            $request->foto_lowongan->move(storage_path('app/images/lowonganpekerjaan'), $file_name);
            $path = "storage/app/images/lowonganpekerjaan/$file_name";
            $lowonganpekerjaan->foto_lowongan = $path;
        }
        $lowonganpekerjaan->update();

        return response()->json([
            'message'       => 'Data lowongan pekerjaan berhasil ditambahkan',
            'data_lowongan_pekerjaan'  => $lowonganpekerjaan
        ], 200);
    }

    public function delete($id)
    {
        LowonganPekerjaan::where('id', $id)->delete();

        return response()->json([
            'message'       => 'Data lowongan pekerjaan berhasil dihapus',
        ], 200);
    }

    public function show()
    {
        $lowonganpekerjaan = LowonganPekerjaan::get();

        return response()->json([
            'message'       => 'Berhasil menampilkan data lowongan pekerjaan',
            'data_lowongan_pekerjaan'  => $lowonganpekerjaan
        ], 200);
    }
}
