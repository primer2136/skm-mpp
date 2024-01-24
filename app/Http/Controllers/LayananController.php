<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\Responden;

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

    public function submitSurvey($id_tenant)
    {
        // Validate the request data
        $validatedData = request()->validate([
            'nama' => 'required|string|max:255',
            'tahun-lahir' => 'required|numeric|min:1900|max:' . date('Y'),
            'jenis-kelamin' => 'required|string|in:pria,wanita',
            'nomor-antrian' => 'required|string|max:10',
            'pendidikan' => 'required|string',
            'kerjaan' => 'required|string',
            'saran' => 'nullable|string',
        ]);

        // Find the tenant
        $tenant = Tenant::where('id_tenant', $id_tenant)->first();

        // If tenant not found, return 404
        if (!$tenant) {
            abort(404);
        }

        // Create a new Responden instance and fill it with validated data
        $responden = new Responden($validatedData);

        $responden->nama_responden = request('nama');
        $responden->tahun_lahir = request('tahun-lahir');
        $responden->jenis_kelamin = request('jenis-kelamin');
        $responden->nomor_antrian = request('nomor-antrian');
        $responden->pekerjaan = request('kerjaan');
        $responden->riwayat_pendidikan = request('pendidikan');

        // Associate the Responden with the Tenant
        $responden->tenant()->associate($tenant);

        // Save the Responden to the database
        $responden->save();

        // dd($responden);

        return redirect('/')->with('success', 'Survey berhasil disubmit!');
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
