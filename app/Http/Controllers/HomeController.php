<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Jawaban;
use App\Models\Pertanyaan;
use App\Models\Tenant;
use App\Models\Responden;

class HomeController extends Controller
{
    public function index()
    {
        $tenant = Tenant::first();

        $layananData = [
            'layananTenant' => Tenant::all(),
            'info' => $tenant->nama_tenant ?? '',
        ];

        $totalRespondenSemuaTenant = Responden::count();
        $skmData = $this->hitungSkmSeluruhTenant();

        // Retrieve education history data for all respondents
        $eduData = Responden::select('riwayat_pendidikan', \DB::raw('count(*) as total'))
            ->groupBy('riwayat_pendidikan')
            ->get();

        // Retrieve job data for all respondents
        $jobData = Responden::select('pekerjaan', \DB::raw('count(*) as total'))
            ->groupBy('pekerjaan')
            ->get();

        // Extract labels and data for education chart
        $eduLabels = $eduData->pluck('riwayat_pendidikan')->toArray();
        $eduValues = $eduData->pluck('total')->toArray();

        // Extract labels and data for job chart
        $jobLabels = $jobData->pluck('pekerjaan')->toArray();
        $jobValues = $jobData->pluck('total')->toArray();


        // dd($skmData);
        
        return view('masyarakat.home', compact(
            'layananData',
            'totalRespondenSemuaTenant',
            'eduLabels',
            'eduValues',
            'jobLabels',
            'jobValues',
            'skmData'
        ));
    }

    public function hitungSkmSeluruhTenant()
    {
        // Dapatkan semua pertanyaan
        $pertanyaans = Pertanyaan::all();

        // Inisialisasi array untuk menyimpan total nilai jawaban untuk setiap pertanyaan
        $nilaiRataRata = [];

        // Inisialisasi variabel untuk menyimpan total responden dari seluruh tenant
        $totalRespondenSeluruhTenant = Responden::count();

        // Iterasi melalui setiap pertanyaan untuk menghitung total nilai jawaban
        foreach ($pertanyaans as $pertanyaan) {
            // Hitung total bobot jawaban untuk pertanyaan tertentu dari seluruh tenant
            $totalBobot = Jawaban::where('id_pertanyaan', $pertanyaan->id_pertanyaan)
                ->sum('bobot');

            // Hitung rata-rata nilai jawaban untuk pertanyaan tertentu
            $rataRata = $totalRespondenSeluruhTenant > 0 ? $totalBobot / $totalRespondenSeluruhTenant : 0;

            // Simpan rata-rata nilai jawaban untuk pertanyaan tertentu
            $nilaiRataRata[$pertanyaan->id_pertanyaan] = $rataRata;
        }

        // Hitung nilai rata-rata tertimbang (dikali 0.11)
        $nilaiRataRataTertimbang = array_map(function ($nilai) {
            return $nilai * 0.11;
        }, $nilaiRataRata);

        // Hitung total nilai rata-rata tertimbang
        $skm = array_sum($nilaiRataRataTertimbang);

        // Hitung nilai konversi SKM
        $konversiSKM = $skm * 25;

        // Tentukan Kualitas Pelayanan berdasarkan nilai konversiSKM
        if ($konversiSKM >= 25.00 && $konversiSKM <= 64.99) {
            $kualitasPelayanan = 'Tidak Baik';
        } elseif ($konversiSKM >= 65.00 && $konversiSKM <= 76.60) {
            $kualitasPelayanan = 'Kurang Baik';
        } elseif ($konversiSKM >= 76.61 && $konversiSKM <= 88.30) {
            $kualitasPelayanan = 'Baik';
        } elseif ($konversiSKM >= 88.31 && $konversiSKM <= 100.00) {
            $kualitasPelayanan = 'Sangat Baik';
        } else {
            $kualitasPelayanan = '-';
        }

        // Ambil data untuk diagram
        $chartData = $this->getDataForChartsAllTenants();

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

    public function getDataForChartsAllTenants()
    {
        // Ambil semua pertanyaan
        // Dapatkan semua pertanyaan
        $pertanyaans = Pertanyaan::all();

        // Inisialisasi array untuk menyimpan total nilai jawaban untuk setiap pertanyaan
        $nilaiRataRata = [];

        // Inisialisasi variabel untuk menyimpan total responden dari seluruh tenant
        $totalRespondenSeluruhTenant = Responden::count();

        // Iterasi melalui setiap pertanyaan untuk menghitung total nilai jawaban
        foreach ($pertanyaans as $pertanyaan) {
            // Hitung total bobot jawaban untuk pertanyaan tertentu dari seluruh tenant
            $totalBobot = Jawaban::where('id_pertanyaan', $pertanyaan->id_pertanyaan)
                ->sum('bobot');

            // Hitung rata-rata nilai jawaban untuk pertanyaan tertentu
            $rataRata = $totalRespondenSeluruhTenant > 0 ? $totalBobot / $totalRespondenSeluruhTenant : 0;

            // Simpan rata-rata nilai jawaban untuk pertanyaan tertentu
            $nilaiRataRata[$pertanyaan->id_pertanyaan] = $rataRata;
        }

        return $nilaiRataRata;
    }
}
