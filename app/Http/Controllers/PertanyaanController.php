<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertanyaan;

class PertanyaanController extends Controller
{
    public function index()
    {
        $pertanyaans = Pertanyaan::orderBy('id_pertanyaan')->get();

        return view('admin.pertanyaan.index', compact('pertanyaans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pertanyaans = Pertanyaan::all();

        return view('admin.pertanyaan.create', compact('pertanyaans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Pertanyaan::create($request->all());

        return redirect()->route('pertanyaan.index')->with('message', 'Berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_pertanyaan)
    {
        $pertanyaans = Pertanyaan::findOrFail($id_pertanyaan);

        return view('admin.pertanyaan.edit', compact('pertanyaans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_pertanyaan)
    {
        $pertanyaans = Pertanyaan::findOrFail($id_pertanyaan);

        $pertanyaans->update($request->all());

        return redirect()->route('pertanyaan.index')->with('message', 'Berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_pertanyaan)
    {

        $pertanyaans = Pertanyaan::findOrFail($id_pertanyaan);

        $pertanyaans->delete();

        return redirect()->route('pertanyaan.index')->with('message', 'Berhasil dihapus');
    }
}
