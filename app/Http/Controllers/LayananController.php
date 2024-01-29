<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\Responden;
use App\Models\Pertanyaan;
use App\Models\Jawaban;

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
            'chartData' => $this->getDataForCharts($id_tenant),
        ];

        $totalResponden = Responden::whereHas('tenant', function ($query) use ($id_tenant) {
            $query->where('id_tenant', $id_tenant);
        })->count();

        return view('masyarakat.layanan', compact('layananData', 'totalResponden'));
    }

    public function showSurveyForm($id_tenant)
    {
        $layanan = Tenant::where('id_tenant', $id_tenant)->first();
        $pertanyaans = Pertanyaan::orderBy('id_pertanyaan')->get();

        // Jika Layanan tidak ditemukan, arahkan ke halaman 404
        if (!$layanan) {
            abort(404);
        }

        $layananData = [
            'nomor' => $id_tenant,
        ];

        $totalPertanyaan = count($pertanyaans);

        return view('masyarakat.survey', compact('layananData', 'pertanyaans', 'totalPertanyaan'));
    }

    public function getDataForCharts($id_tenant)
    {
        // Ambil data jumlah responden berdasarkan riwayat pendidikan
        $eduData = DB::table('respondens')
            ->select('riwayat_pendidikan', DB::raw('count(*) as total'))
            ->where('id_tenant', $id_tenant)
            ->groupBy('riwayat_pendidikan')
            ->get();

        // Ambil data jumlah responden berdasarkan pekerjaan
        $jobData = DB::table('respondens')
            ->select('pekerjaan', DB::raw('count(*) as total'))
            ->where('id_tenant', $id_tenant)
            ->groupBy('pekerjaan')
            ->get();

        return compact('eduData', 'jobData');
    }

    public function submitResponden($id_tenant)
    {
        // dd(request()->all());

        // Validate the request data
        $validatedData = request()->validate([
            'nama' => 'required|string|max:255',
            'tahun-lahir' => 'required|numeric|min:1900|max:' . date('Y'),
            'jenis-kelamin' => 'required|string|in:pria,wanita',
            'nomor-antrian' => 'required|string|max:10',
            'pendidikan' => 'required|string',
            'kerjaan' => 'required|string',
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

        $id_responden = $responden->id;

        // Arahkan pengguna ke formulir pertanyaan
        return redirect()->route('masyarakat.pertanyaan', ['id_tenant' => $id_tenant, 'id_responden' => $id_responden]);
    }

    public function showPertanyaanForm($id_tenant, $id_responden)
    {
        // Dapatkan data responden berdasarkan ID
        $responden = Responden::find($id_responden);

        // Dapatkan pertanyaan dari database
        $pertanyaans = Pertanyaan::orderBy('id_pertanyaan')->get();

        // Jika responden atau pertanyaan tidak ditemukan, kembalikan 404
        if (!$responden || !$pertanyaans) {
            abort(404);
        }

        // Kirim data responden dan pertanyaan ke view
        $data = [
            'layananData' => [
                'nomor' => $id_tenant,
            ],
            'responden' => $id_responden,
            'pertanyaans' => $pertanyaans,
        ];

        return view('masyarakat.pertanyaan', $data);
    }

    public function submitJawaban(Request $request, $id_tenant)
    {
        // Ambil data input dari formPertanyaan
        $id_responden = $request->input('id_responden');

        // Periksa apakah id_responden valid
        $responden = Responden::find($id_responden);
        if (!$responden) {
            abort(404); // atau lakukan penanganan error sesuai kebutuhan
        }

        // Ambil data input dari formPertanyaan kecuali token dan id_responden
        $input = $request->except('_token', 'id_responden');

        // Loop melalui data input untuk mendapatkan id pertanyaan dan bobotnya
        foreach ($input as $idPertanyaan => $bobot) {
            // Buat objek Jawaban
            $jawaban = new Jawaban();
            $jawaban->id_responden = $id_responden;
            $jawaban->id_pertanyaan = $idPertanyaan;
            $jawaban->bobot = $bobot;

            // Simpan objek Jawaban ke dalam database
            $jawaban->save();
        }

        return redirect('/');
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
