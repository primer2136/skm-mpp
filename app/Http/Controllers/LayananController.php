<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tenant;

class LayananController extends Controller
{
    public function show($id_tenant)
    {
        // Cek apakah Layanan dengan id_tenant tertentu ditemukan
        $layanan = Tenant::where('id_tenant', $id_tenant)->first();

        // Jika Layanan tidak ditemukan, arahkan ke halaman 404
        if (!$layanan) {
            abort(404);
        }

        // Jika Layanan ditemukan, lemparkan data ke view
        $layananData = [
            'nomor' => $id_tenant,
            'judul' => $this->getJudulByNomor($id_tenant),
            'info' => $this->getInfoByNomor($id_tenant),
        ];

        return view('masyarakat.layanan', compact('layananData'));
    }

    public function showSurveyForm($id_tenant)
    {
        $layanan = Tenant::where('id_tenant', $id_tenant)->first();

        // Jika Layanan tidak ditemukan, arahkan ke halaman 404
        if (!$layanan) {
            abort(404);
        }

        $layananData = [
            'nomor' => $id_tenant,
        ];

        return view('masyarakat.survey', compact('layananData'));
    }



    private function getJudulByNomor($id_tenant)
    {
        $tenant = Tenant::find($id_tenant);

        if ($tenant) {

            $judulLayanan = 'SURVEI KEPUASAN MASYARAKAT ' . $tenant->nama_tenant;
        } else {
            // Jika tidak ditemukan, berikan judul default
            $judulLayanan = 'Judul tidak ditemukan';
        }

        return $judulLayanan;
    }

    private function getInfoByNomor($id_tenant)
    {
        // Ambil informasi dari database
        $tenant = Tenant::find($id_tenant);

        // Jika data ditemukan, kembalikan informasi
        if ($tenant) {
            return $tenant->nama_tenant;
        }

        return 'Informasi tidak ditemukan';
    }
}
