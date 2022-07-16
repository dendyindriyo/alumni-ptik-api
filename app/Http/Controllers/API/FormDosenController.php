<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dosen;

class FormDosenController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'nip' => 'required|max:25',
            'nama_dosen' => 'required|max:100',
            'nama_jabatan_dosen' => 'required|max:50',
            'foto_dosen' => 'nullable|image|mimes:jpg,bmp,png|max:2048',
            'alamat_dosen' => 'required|max:255',
            'kontak_dosen' => 'required|max:100',
        ]);

        $dosen = new Dosen;
        $dosen->nip = $request->nip;
        $dosen->nama_dosen = $request->nama_dosen;
        $dosen->nama_jabatan_dosen = $request->nama_jabatan_dosen;
        if ($request->foto_dosen && $request->foto_dosen->isValid()) {
            $file_name = time() . '.' . $request->foto_dosen->extension();
            $request->foto_dosen->move(storage_path('app/images/dosen'), $file_name);
            $path = "storage/app/images/dosen/$file_name";
            $dosen->foto_dosen = $path;
        }

        $dosen->alamat_dosen = $request->alamat_dosen;
        $dosen->kontak_dosen = $request->kontak_dosen;
        $dosen->save();

        return response()->json([
            'message'       => 'Data dosen berhasil ditambahkan',
            'data_dosen'  => $dosen
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nip' => 'required|max:25',
            'nama_dosen' => 'required|max:100',
            'nama_jabatan_dosen' => 'required|max:50',
            'foto_dosen' => 'nullable|image|mimes:jpg,bmp,png|max:2048',
            'alamat_dosen' => 'required|max:255',
            'kontak_dosen' => 'required|max:100',
        ]);

        $dosen = Dosen::where('id', $id)->first();;
        $dosen->nip = $request->nip;
        $dosen->nama_dosen = $request->nama_dosen;
        $dosen->nama_jabatan_dosen = $request->nama_jabatan_dosen;
        if ($request->foto_dosen && $request->foto_dosen->isValid()) {
            $file_name = time() . '.' . $request->foto_dosen->extension();
            $request->foto_dosen->move(storage_path('app/images/dosen'), $file_name);
            $path = "storage/app/images/dosen/$file_name";
            $dosen->foto_dosen = $path;
        }

        $dosen->alamat_dosen = $request->alamat_dosen;
        $dosen->kontak_dosen = $request->kontak_dosen;
        $dosen->update();

        return response()->json([
            'message'       => 'Data dosen berhasil diubah',
            'data_dosen'  => $dosen
        ], 200);
    }

    public function delete($id)
    {
        Dosen::where('id', $id)->delete();

        return response()->json([
            'message'       => 'Data dosen berhasil dihapus',
        ], 200);
    }

    public function show()
    {
        $dosen = Dosen::get();

        return response()->json([
            'message'       => 'Berhasil menampilkan data dosen',
            'data_dosen'  => $dosen
        ], 200);
    }
}
