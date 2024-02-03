<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\Responden;
use App\Models\Pertanyaan;
use App\Models\Jawaban;
use App\Models\Saran;

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

        // Hitung rata-rata nilai jawaban untuk setiap pertanyaan
        $skm = $this->hitungSkmPerTenant($id_tenant);

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
        // dd($skm);
        return view('masyarakat.layanan', compact('layananData', 'totalResponden', 'skm'));
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

        // Simpan ID responden ke dalam sesi
        session(['id_responden' => $responden->id_responden]);

        // Cetak nilai ID responden dari sesi (untuk tujuan debugging)
        // dd(session('id_responden'));

        return redirect()->route('masyarakat.pertanyaan', [
            'id_tenant' => $id_tenant,
            'id_responden' => session('id_responden')
        ]);
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
        $id_responden = session('id_responden');

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

        // dd($jawaban);

        return redirect()->route('masyarakat.saran', [
            'id_tenant' => $id_tenant,
            'id_responden' => session('id_responden')
        ]);
    }

    public function showSaranForm($id_tenant)
    {
        // Dapatkan data responden berdasarkan ID
        $id_responden = session('id_responden');
        $responden = Responden::find($id_responden);

        // Jika responden tidak ditemukan, kembalikan 404
        if (!$responden) {
            abort(404);
        }

        $data = [
            'layananData' => [
                'nomor' => $id_tenant,
            ],
            'responden' => $id_responden,
        ];

        return view('masyarakat.saran', $data);
    }

    public function submitSaran(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'saran' => 'nullable|string|max:255',
        ]);

        // Simpan saran ke dalam database
        $saran = new Saran();
        $saran->id_responden = session('id_responden');
        $saran->saran = $request->input('saran');
        $saran->save();

        // dd($saran);

        return redirect('/');
    }

    public function hapusResponden($id_responden)
    {
        $responden = Responden::find($id_responden);
        if ($responden) {
            $responden->delete();
        }
        return redirect()->route('/');
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

    public function hitungSkmPerTenant($id_tenant)
    {
        // Dapatkan semua pertanyaan
        $pertanyaans = Pertanyaan::all();

        // Inisialisasi array untuk menyimpan total nilai jawaban untuk setiap pertanyaan
        $nilaiRataRata = [];

        // Inisialisasi array untuk menyimpan total responden
        $totalResponden = Responden::where('id_tenant', $id_tenant)->count();

        // Iterasi melalui setiap pertanyaan untuk menghitung total nilai jawaban
        foreach ($pertanyaans as $pertanyaan) {
            // Hitung total bobot jawaban untuk pertanyaan tertentu
            $totalBobot = Jawaban::where('id_pertanyaan', $pertanyaan->id_pertanyaan)
                ->whereHas('responden', function ($query) use ($id_tenant) {
                    $query->where('id_tenant', $id_tenant);
                })
                ->sum('bobot');

            // Hitung rata-rata nilai jawaban untuk pertanyaan tertentu
            $rataRata = $totalResponden > 0 ? $totalBobot / $totalResponden : 0;

            // Simpan rata-rata nilai jawaban untuk pertanyaan tertentu
            $nilaiRataRata[$pertanyaan->id_pertanyaan] = $rataRata;
        }

        // Hitung nilai rata-rata tertimbang (dikali 0.11)
        $nilaiRataRataTertimbang = array_map(function ($nilai) {
            return $nilai * 1/9;
        }, $nilaiRataRata);

        // Hitung total nilai rata-rata tertimbang
        $skm = array_sum($nilaiRataRataTertimbang);

        // Hitung nilai konversi SKM
        $konversiSKM = $skm * 25;

        // Tentukan Kualitas Pelayanan berdasarkan nilai konversiSKM
        if (
            $konversiSKM >= 25.00 && $konversiSKM <= 64.99
        ) {
            $kualitasPelayanan = 'Tidak Baik';
        } elseif ($konversiSKM >= 65.00 && $konversiSKM <= 76.60) {
            $kualitasPelayanan = 'Kurang Baik';
        } elseif ($konversiSKM >= 76.61 && $konversiSKM <= 88.30) {
            $kualitasPelayanan = 'Baik';
        } elseif ($konversiSKM >= 88.31 && $konversiSKM <= 100.01) {
            $kualitasPelayanan = 'Sangat Baik';
        } elseif ($konversiSKM >= 0 && $konversiSKM <= 24.49) {
            $kualitasPelayanan = '-';
        } else {
            $kualitasPelayanan = 'Invalid';
        }

        // Ambil data untuk diagram
        $chartData = $this->getDataForCharts($id_tenant);

        // Kembalikan array total nilai pertanyaan dan nilai rata-rata tertimbang
        return [
            'nilaiRataRata' => $nilaiRataRata,
            'nilaiRataRataTertimbang' => $nilaiRataRataTertimbang,
            'skm' => $skm,
            'konversiSKM' => $konversiSKM,
            'kualitasPelayanan' => $kualitasPelayanan,
            'chartData' => $chartData,
        ];
    }
}
