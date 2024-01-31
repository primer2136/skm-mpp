<?php

namespace App\Http\Controllers;

use App\Models\Responden;
use App\Models\Tenant;
use Illuminate\Http\Request;

class RespondenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $id_tenant = $request->input('id_tenant');
        $tenants = Tenant::all();
        $respondens = Responden::query();

        $respondent = Responden::with('tenant');
        
        if ($keyword) {
            $respondens->where(function ($query) use ($keyword) {
                $query->where('nama_responden', 'like', "%$keyword%")
                    ->orWhere('tahun_lahir', 'like', "%$keyword%")
                    ->orWhere('jenis_kelamin', 'like', "%$keyword%")
                    ->orWhere('nomor_antrian', 'like', "%$keyword%")
                    ->orWhere('riwayat_pendidikan', 'like', "%$keyword%")
                    ->orWhere('pekerjaan', 'like', "%$keyword%");
            });
        }
        if ($id_tenant) {
            $respondent->whereHas('tenant', function ($query) use ($id_tenant) {
                $query->where('id_tenant', $id_tenant);
            });
        }

        $respondens = $respondens->orderBy('created_at')->get();

        return view('admin.responden.index', compact('respondens', 'tenants', 'id_tenant', 'respondent'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tenants = Tenant::all();
        return view('admin.responden.create', compact('tenants'));
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
        $tenants = Tenant::all();


        return view('admin.responden.edit', compact('respondens', 'tenants'));
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
}
