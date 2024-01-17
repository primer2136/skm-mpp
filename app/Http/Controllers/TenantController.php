<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenants = Tenant::orderBy('created_at')->get();

        return view('admin.tenant.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tenant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Tenant::create($request->all());

        return redirect()->route('tenant.index')->with('message', 'Berhasil ditambahkan');
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
    public function edit(string $id_tenant)
    {
        $tenants = Tenant::findOrFail($id_tenant);

        return view('admin.tenant.edit', compact('tenants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_tenant)
    {
        $tenants = Tenant::findOrFail($id_tenant);

        $tenants->update($request->all());

        return redirect()->route('tenant.index')->with('message', 'Berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_tenant)
    {
        // DB::table('tenants')->where('id_tenant', $id)->delete();
        // return redirect()->back()->with('message', 'Berhasil dihapus');

        $tenants = Tenant::findOrFail($id_tenant);

        $tenants->delete();

        return redirect()->route('tenant.index')->with('message', 'Berhasil dihapus');
    }
}
