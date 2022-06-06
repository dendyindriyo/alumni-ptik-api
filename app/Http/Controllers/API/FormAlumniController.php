<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumni;
use App\Models\RiwayatPekerjaanAlumni;

class FormAlumniController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:alumni|max:15',
            'id_tahun_masuk' => 'nullable|max:3',
            'id_tahun_lulus' => 'nullable|max:3',
            'id_provinsi' => 'nullable|max:2',
            'id_peminatan' => 'nullable|max:1',
            'no_anggota_ika' => 'nullable|max:15',
            'nama_alumni' => 'required|max:100',
            'jenis_kelamin' => 'required|max:10',
            'tempat_lahir' => 'required|max:50',
            'tanggal_lahir' => 'required',
            'agama' => 'required|max:20',
            'status_pernikahan' => 'required|max:15',
            'tahun_masuk' => 'nullable',
            'tahun_lulus' => 'nullable',
            'peminatan' => 'nullable|max:30',
            'alamat' => 'required|max:255',
            'kelurahan' => 'required|max:50',
            'kecamatan' => 'required|max:50',
            'kota' => 'required|max:50',
            'provinsi' => 'nullable|max:50',
            'kode_pos' => 'required|max:5',
            'no_telp' => 'required|max:15',
            'email' => 'required|max:100',
            'foto_alumni' => 'nullable|image|mimes:jpg,bmp,png|max:2048',
            'pekerjaan' => 'nullable|max:50',
            'nama_ayah' => 'nullable|max:100',
            'tempat_tanggal_lahir_ayah' => 'nullable|max:50',
            'nama_pekerjaan_ayah' => 'nullable|max:50',
            'nama_ibu' => 'nullable|max:100',
            'tempat_tanggal_lahir_ibu' => 'nullable|max:50',
            'nama_pekerjaan_ibu' => 'nullable|max:50',
            'nama_wali' => 'nullable|max:100',
            'tempat_tanggal_lahir_wali' => 'nullable|max:50',
            'nama_pekerjaan_wali' => 'nullable|max:50',
        ]);

        $alumni = new Alumni;
        $alumni->nim = $request->nim;
        $alumni->id_tahun_masuk = $request->id_tahun_masuk;
        $alumni->id_tahun_lulus = $request->id_tahun_lulus;
        $alumni->id_provinsi = $request->id_provinsi;
        $alumni->id_peminatan = $request->id_peminatan;
        $alumni->no_anggota_ika = $request->no_anggota_ika;
        $alumni->nama_alumni = $request->nama_alumni;
        $alumni->jenis_kelamin = $request->jenis_kelamin;
        $alumni->tempat_lahir = $request->tempat_lahir;
        $alumni->tanggal_lahir = $request->tanggal_lahir;
        $alumni->agama = $request->agama;
        $alumni->status_pernikahan = $request->status_pernikahan;
        $alumni->tahun_masuk = $request->tahun_masuk;
        $alumni->tahun_lulus = $request->tahun_lulus;
        $alumni->peminatan = $request->peminatan;
        $alumni->alamat = $request->alamat;
        $alumni->kelurahan = $request->kelurahan;
        $alumni->kecamatan = $request->kecamatan;
        $alumni->kota = $request->kota;
        $alumni->provinsi = $request->provinsi;
        $alumni->kode_pos = $request->kode_pos;
        $alumni->no_telp = $request->no_telp;
        $alumni->email = $request->email;
        if ($request->foto_alumni && $request->foto_alumni->isValid()) {
            $file_name = time() . '.' . $request->foto_alumni->extension();
            $request->foto_alumni->move(storage_path('app/images/alumni'), $file_name);
            $path = "storage/app/images/alumni/$file_name";
            $alumni->foto_alumni = $path;
        }
        $alumni->pekerjaan = $request->pekerjaan;
        $alumni->nama_ayah = $request->nama_ayah;
        $alumni->tempat_tanggal_lahir_ayah = $request->tempat_tanggal_lahir_ayah;
        $alumni->nama_pekerjaan_ayah = $request->nama_pekerjaan_ayah;
        $alumni->nama_ibu = $request->nama_ibu;
        $alumni->tempat_tanggal_lahir_ibu = $request->tempat_tanggal_lahir_ibu;
        $alumni->nama_pekerjaan_ibu = $request->nama_pekerjaan_ibu;
        $alumni->nama_wali = $request->nama_wali;
        $alumni->tempat_tanggal_lahir_wali = $request->tempat_tanggal_lahir_wali;
        $alumni->nama_pekerjaan_wali = $request->nama_pekerjaan_wali;
        $alumni->save();
        $alumni = Alumni::with('tahunMasuk', 'tahunLulus', 'provinsi', 'peminatan')->where('nim', $alumni->nim)->get()->toArray();

        return response()->json([
            'message'       => 'Data alumni berhasil ditambahkan',
            'data_alumni'  => $alumni
        ], 201);
    }

    public function update(Request $request, $nim)
    {
        $request->validate([
            'id_tahun_masuk' => 'nullable|max:3',
            'id_tahun_lulus' => 'nullable|max:3',
            'id_provinsi' => 'nullable|max:2',
            'id_peminatan' => 'nullable|max:1',
            'no_anggota_ika' => 'nullable|max:15',
            'nama_alumni' => 'required|max:100',
            'jenis_kelamin' => 'required|max:10',
            'tempat_lahir' => 'required|max:50',
            'tanggal_lahir' => 'required',
            'agama' => 'required|max:20',
            'status_pernikahan' => 'required|max:15',
            'tahun_masuk' => 'nullable',
            'tahun_lulus' => 'nullable',
            'peminatan' => 'nullable|max:30',
            'alamat' => 'required|max:255',
            'kelurahan' => 'required|max:50',
            'kecamatan' => 'required|max:50',
            'kota' => 'required|max:50',
            'provinsi' => 'nullable|max:50',
            'kode_pos' => 'required|max:5',
            'no_telp' => 'required|max:15',
            'email' => 'required|max:100',
            'foto_alumni' => 'nullable|image|mimes:jpg,bmp,png|max:2048',
            'pekerjaan' => 'nullable|max:50',
            'nama_ayah' => 'nullable|max:100',
            'tempat_tanggal_lahir_ayah' => 'nullable|max:50',
            'nama_pekerjaan_ayah' => 'nullable|max:50',
            'nama_ibu' => 'nullable|max:100',
            'tempat_tanggal_lahir_ibu' => 'nullable|max:50',
            'nama_pekerjaan_ibu' => 'nullable|max:50',
            'nama_wali' => 'nullable|max:100',
            'tempat_tanggal_lahir_wali' => 'nullable|max:50',
            'nama_pekerjaan_wali' => 'nullable|max:50',
        ]);

        $alumni = Alumni::where('nim', $nim)->first();
        $alumni->id_tahun_masuk = $request->id_tahun_masuk;
        $alumni->id_tahun_lulus = $request->id_tahun_lulus;
        $alumni->id_provinsi = $request->id_provinsi;
        $alumni->id_peminatan = $request->id_peminatan;
        $alumni->no_anggota_ika = $request->no_anggota_ika;
        $alumni->nama_alumni = $request->nama_alumni;
        $alumni->jenis_kelamin = $request->jenis_kelamin;
        $alumni->tempat_lahir = $request->tempat_lahir;
        $alumni->tanggal_lahir = $request->tanggal_lahir;
        $alumni->agama = $request->agama;
        $alumni->status_pernikahan = $request->status_pernikahan;
        $alumni->tahun_masuk = $request->tahun_masuk;
        $alumni->tahun_lulus = $request->tahun_lulus;
        $alumni->peminatan = $request->peminatan;
        $alumni->alamat = $request->alamat;
        $alumni->kelurahan = $request->kelurahan;
        $alumni->kecamatan = $request->kecamatan;
        $alumni->kota = $request->kota;
        $alumni->provinsi = $request->provinsi;
        $alumni->kode_pos = $request->kode_pos;
        $alumni->no_telp = $request->no_telp;
        $alumni->email = $request->email;
        if ($request->foto_alumni && $request->foto_alumni->isValid()) {
            $file_name = time() . '.' . $request->foto_alumni->extension();
            $request->foto_alumni->move(storage_path('app/images/alumni'), $file_name);
            $path = "storage/app/images/alumni/$file_name";
            $alumni->foto_alumni = $path;
        }
        $alumni->pekerjaan = $request->pekerjaan;
        $alumni->nama_ayah = $request->nama_ayah;
        $alumni->tempat_tanggal_lahir_ayah = $request->tempat_tanggal_lahir_ayah;
        $alumni->nama_pekerjaan_ayah = $request->nama_pekerjaan_ayah;
        $alumni->nama_ibu = $request->nama_ibu;
        $alumni->tempat_tanggal_lahir_ibu = $request->tempat_tanggal_lahir_ibu;
        $alumni->nama_pekerjaan_ibu = $request->nama_pekerjaan_ibu;
        $alumni->nama_wali = $request->nama_wali;
        $alumni->tempat_tanggal_lahir_wali = $request->tempat_tanggal_lahir_wali;
        $alumni->nama_pekerjaan_wali = $request->nama_pekerjaan_wali;
        $alumni->update();
        // $alumni->update($request->all());

        return response()->json([
            'message'       => 'Data alumni berhasil diubah',
            'data_alumni'  => $alumni = Alumni::with('tahunMasuk', 'tahunLulus', 'provinsi', 'peminatan')->where('nim', $alumni->nim)->get()->toArray()
        ], 200);
    }

    public function delete($nim)
    {
        Alumni::where('nim', $nim)->delete();

        return response()->json([
            'message'       => 'Data alumni berhasil dihapus',
        ], 200);
    }

    public function show(Request $request)
    {
        $alumni = Alumni::query();

        if ($keyword = $request->input('keyword')) {
            $alumni->where('nama_alumni', 'LIKE', '%' . $keyword . '%')
                ->orWhere('nim', 'LIKE', '%' . $keyword . '%');
        }

        if ($sortnama = $request->input('sortnama')) {
            $alumni->orderBy('nama_alumni', $sortnama);
        }

        if ($sortnim = $request->input('sortnim')) {
            $alumni->orderBy('nim', $sortnim);
        }

        return response()->json([
            'message'       => 'Berhasil menampilkan detail data alumni',
            'data_alumni'  => $alumni = Alumni::with('tahunMasuk', 'tahunLulus', 'provinsi', 'peminatan')->get()->toArray()
        ], 200);
    }

    // public function searchNamaAlumni($nama_alumni)
    // {
    //     $nama_alumni = Alumni::with('riwayatPekerjaanAlumnis')->where('nama_alumni', 'LIKE', '%' . $nama_alumni . '%')->get();

    //     return response()->json([
    //         'message'       => 'Berhasil menampilkan detail data alumni',
    //         'data_alumni'  => $nama_alumni
    //     ], 200);
    // }

    // public function searchNim($nim)
    // {
    //     $nim = Alumni::with('riwayatPekerjaanAlumnis')->where('nim', 'LIKE', '%' . $nim . '%')->get();

    //     return response()->json([
    //         'message'       => 'Berhasil menampilkan detail data alumni',
    //         'data_alumni'  => $nim
    //     ], 200);
    // }

    // public function sortNamaAlumni(Request $request)
    // {
    //     $query = Alumni::with('riwayatPekerjaanAlumnis');
    //     if ($sort = $request->input('sort')) {
    //         $query->orderBy('nama_alumni', $sort);
    //     }

    //     return response()->json([
    //         'message'       => 'Berhasil menampilkan detail data alumni',
    //         'data_alumni'  => $query->get()
    //     ], 200);
    // }

    // public function sortNim(Request $request)
    // {
    //     $query = Alumni::with('riwayatPekerjaanAlumnis');
    //     if ($sort = $request->input('sort')) {
    //         $query->orderBy('nama_alumni', $sort);
    //     }

    //     return response()->json([
    //         'message'       => 'Berhasil menampilkan detail data alumni',
    //         'data_alumni'  => $query->get()
    //     ], 200);
    // }
}
