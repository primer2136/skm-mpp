<?php

namespace App\Http\Controllers;

use App\Models\Responden;
use Illuminate\Http\Request;

class RespondenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $respondens = Responden::orderBy('created_at')->get();

        return view('admin.responden.index', compact('respondens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.responden.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Responden::create($request->all());

        return redirect()->route('responden.index')->with('message', 'Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_responden)
    {
        $respondens = Responden::findOrFail($id_responden);

        return view('admin.responden.edit', compact('respondens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_responden)
    {
        $respondens = Responden::findOrFail($id_responden);

        $respondens->update($request->all());

        return redirect()->route('responden.index')->with('message', 'Berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_responden)
    {
        // DB::table('respondens')->where('id_responden', $id)->delete();
        // return redirect()->back()->with('message', 'Berhasil dihapus');

        $respondens = Responden::findOrFail($id_responden);

        $respondens->delete();

        return redirect()->route('responden.index')->with('message', 'Berhasil dihapus');
    }

    public function simpanSurvey(Request $request)
    {
        // Validasi data dari formulir survey
        $validatedData = $request->validate([
            'nama_responden' => 'required',
            'tahun_lahir' => 'required|numeric|min:1900|max:' . date('Y'),
            'jenis_kelamin' => 'required',
            'nomor_antrian' => 'required',
            'riwayat_pendidikan' => 'required',
            'pekerjaan' => 'required',
            // ... tambahkan validasi untuk pertanyaan lainnya sesuai kebutuhan
        ]);

        // Simpan data responden ke dalam tabel responden
        $responden = Responden::create($validatedData);

        // Menanggapi dengan data atau pesan sukses jika diperlukan
        return response()->json(['message' => 'Survey berhasil disimpan', 'responden' => $responden]);
    }
}
