<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
        $request->validate([
            'logo' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simpan gambar ke penyimpanan dan dapatkan path-nya
        $logoPath = $request->file('logo')->store('public/logos');

        // Simpan data ke database
        Tenant::create([
            'nama_tenant' => $request->input('nama_tenant'),
            'logo' => $logoPath, // Simpan path gambar
            // ... (Tambahkan kolom lainnya sesuai kebutuhan)
        ]);

        return redirect()->route('tenant.index')->with('message', 'Layanan Tenant Berhasil ditambahkan');
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

        // Periksa apakah file gambar baru diunggah
        if ($request->hasFile('logo')) {
            // Lakukan pemrosesan untuk menyimpan gambar baru
            $request->validate([
                'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan dengan kebutuhan Anda
            ]);

            // Hapus gambar lama jika ada
            if ($tenants->logo) {
                Storage::delete($tenants->logo);
            }

            // Simpan gambar baru
            $logoPath = $request->file('logo')->store('public/logos');
            $tenants->update(['logo' => $logoPath]);
        }

        // Lanjutkan pembaruan data lainnya
        $tenants->update($request->except('logo'));

        return redirect()->route('tenant.index')->with('message', 'Layanan Tenant Berhasil diperbarui');
    }

    public function destroy(string $id_tenant)
    {
        // DB::table('tenants')->where('id_tenant', $id)->delete();
        // return redirect()->back()->with('message', 'Berhasil dihapus');

        $tenants = Tenant::findOrFail($id_tenant);

        $tenants->delete();

        return redirect()->route('tenant.index')->with('message', 'Berhasil dihapus');
    }
}
