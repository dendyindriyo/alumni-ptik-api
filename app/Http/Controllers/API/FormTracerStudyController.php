<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TracerStudy;

class FormTracerStudyController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'isi_tracer' => 'required',
        ]);

        $tracerstudy = new TracerStudy;
        $tracerstudy->isi_tracer = $request->isi_tracer;
        $tracerstudy->save();

        return response()->json([
            'message'       => 'Data tracer study berhasil ditambahkan',
            'data_tracer_study'  => $tracerstudy
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'isi_tracer' => 'required',
        ]);

        $tracerstudy = TracerStudy::where('id', $id)->first();
        $tracerstudy->update($request->all());

        return response()->json([
            'message'       => 'Data tracer study berhasil diubah',
            'data_tracer_study'  => $tracerstudy
        ], 200);
    }

    public function delete($id)
    {
        TracerStudy::where('id', $id)->delete();

        return response()->json([
            'message'       => 'Data tracer study berhasil dihapus',
        ], 200);
    }

    public function show()
    {
        $tracerstudy = TracerStudy::get();

        return response()->json([
            'message'       => 'Berhasil menampilkan data tracer study',
            'data_tracer_study'  => $tracerstudy
        ], 200);
    }
}
