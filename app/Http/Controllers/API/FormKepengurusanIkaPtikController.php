<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KepengurusanIkaPtik;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FormKepengurusanIkaPtikController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'nama_jabatan_ika' => 'required|max:50',
            'no_anggota_ika' => 'nullable|max:15',
            'nama_alumni' => 'required|max:100',
            'foto_alumni' => 'nullable|image|mimes:jpg,bmp,png|max:2048',
            'alamat_alumni' => 'required|max:255',
            'kontak_alumni' => 'required|max:100',
            'tahun_mulai' => 'required',
            'tahun_selesai' => 'required',
            'aktif' => 'required|boolean',
        ]);

        // $file = $request->file('file');

        // $file = $request->file;
        // if ($request->hasFile('file')) {
        //     $kepengurusanikaptik = $request->file->getClientOriginalName();

        //     $uploaded_files = $request->file->storeAs('public/uploads/images', $request->file->getClientOriginalName());

        //     $kepengurusanikaptik->foto_alumni = $request->file->hashName();
        // }

        $kepengurusanikaptik = new KepengurusanIkaPtik;
        $kepengurusanikaptik->nama_jabatan_ika = $request->nama_jabatan_ika;
        $kepengurusanikaptik->no_anggota_ika = $request->no_anggota_ika;
        $kepengurusanikaptik->nama_alumni = $request->nama_alumni;
        if ($request->foto_alumni && $request->foto_alumni->isValid()) {
            $file_name = time() . '.' . $request->foto_alumni->extension();
            $request->foto_alumni->move(storage_path('app/images/kepengurusanikaptik'), $file_name);
            $path = "storage/app/images/kepengurusanikaptik/$file_name";
            $kepengurusanikaptik->foto_alumni = $path;
        }

        $kepengurusanikaptik->alamat_alumni = $request->alamat_alumni;
        $kepengurusanikaptik->kontak_alumni = $request->kontak_alumni;
        $kepengurusanikaptik->tahun_mulai = $request->tahun_mulai;
        $kepengurusanikaptik->tahun_selesai = $request->tahun_selesai;
        $kepengurusanikaptik->aktif = $request->aktif;
        $kepengurusanikaptik->save();

        return response()->json([
            'message'       => 'Data kepengurusan IKA PTIK berhasil ditambahkan',
            'data_kepengurusan_ika_ptik'  => $kepengurusanikaptik
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jabatan_ika' => 'required|max:50',
            'no_anggota_ika' => 'nullable|max:15',
            'nama_alumni' => 'required|max:100',
            'foto_alumni' => 'nullable|image|mimes:jpg,bmp,png|max:2048',
            'alamat_alumni' => 'required|max:255',
            'kontak_alumni' => 'required|max:100',
            'tahun_mulai' => 'required',
            'tahun_selesai' => 'required',
            'aktif' => 'required|boolean'
        ]);

        $kepengurusanikaptik = KepengurusanIkaPtik::where('id', $id)->first();
        $kepengurusanikaptik->nama_jabatan_ika = $request->nama_jabatan_ika;
        $kepengurusanikaptik->no_anggota_ika = $request->no_anggota_ika;
        $kepengurusanikaptik->nama_alumni = $request->nama_alumni;
        if ($request->foto_alumni && $request->foto_alumni->isValid()) {
            $file_name = time() . '.' . $request->foto_alumni->extension();
            $request->foto_alumni->move(storage_path('app/images/kepengurusanikaptik'), $file_name);
            $path = "storage/app/images/kepengurusanikaptik/$file_name";
            $kepengurusanikaptik->foto_alumni = $path;
        }

        $kepengurusanikaptik->alamat_alumni = $request->alamat_alumni;
        $kepengurusanikaptik->kontak_alumni = $request->kontak_alumni;
        $kepengurusanikaptik->tahun_mulai = $request->tahun_mulai;
        $kepengurusanikaptik->tahun_selesai = $request->tahun_selesai;
        $kepengurusanikaptik->aktif = $request->aktif;
        $kepengurusanikaptik->update();
        // $kepengurusanikaptik->update($request->all());

        return response()->json([
            'message'       => 'Data kepengurusan IKA PTIK berhasil diubah',
            'data_kepengurusan_ika_ptik'  => $kepengurusanikaptik
        ], 200);
    }

    public function delete($id)
    {
        KepengurusanIkaPtik::where('id', $id)->delete();

        return response()->json([
            'message'       => 'Data kepengurusan IKA PTIK berhasil dihapus',
        ], 200);
    }

    public function show()
    {
        $kepengurusanikaptik = KepengurusanIkaPtik::get();

        return response()->json([
            'message'       => 'Berhasil menampilkan data kepengurusan IKA PTIK',
            'data_kepengurusan_ika_ptik'  => $kepengurusanikaptik
        ], 200);
    }
}
