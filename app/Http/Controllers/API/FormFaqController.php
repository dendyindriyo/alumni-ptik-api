<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class FormFaqController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required',
            'jawaban' => 'required',
        ]);

        $faq = new Faq;
        $faq->pertanyaan = $request->pertanyaan;
        $faq->jawaban = $request->jawaban;
        $faq->save();

        return response()->json([
            'message'       => 'Data faq berhasil ditambahkan',
            'data_faq'  => $faq
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pertanyaan' => 'required',
            'jawaban' => 'required',
        ]);

        $faq = Faq::where('id', $id)->first();
        $faq->update($request->all());

        return response()->json([
            'message'       => 'Data faq berhasil diubah',
            'data_faq'  => $faq
        ], 200);
    }

    public function delete($id)
    {
        Faq::where('id', $id)->delete();

        return response()->json([
            'message'       => 'Data faq berhasil dihapus',
        ], 200);
    }

    public function show()
    {
        $faq = Faq::get();

        return response()->json([
            'message'       => 'Berhasil menampilkan data faq',
            'data_faq'  => $faq
        ], 200);
    }
}
