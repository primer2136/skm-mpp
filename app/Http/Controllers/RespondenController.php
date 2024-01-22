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
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'tahun_lahir' => 'required|integer|min:1900|max:2024',
            'jenis_kelamin' => 'required|string',
            'nomor_antrian' => 'required|string',
            'pendidikan' => 'required|string',
            'pekerjaan' => 'required|string',
        ]);

        Responden::create($validatedData);

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
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'tahun_lahir' => 'required|integer|min:1900|max:2024',
            'jenis_kelamin' => 'required|string',
            'nomor_antrian' => 'required|string',
            'pendidikan' => 'required|string',
            'pekerjaan' => 'required|string',
        ]);

        $respondens = Responden::findOrFail($id_responden);
        $respondens->update($validatedData);

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
}
