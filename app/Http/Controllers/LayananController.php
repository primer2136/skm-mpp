<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\Tenant;

class LayananController extends Controller
{
    public function show($nomor)
    {
        // Gunakan $nomor sesuai kebutuhan Anda
        $layananData = [
            'nomor' => $nomor,
            'judul' => $this->getJudulByNomor($nomor),
            'info' => $this->getInfoByNomor($nomor),
        ];
        return view('masyarakat.layanan', compact('layananData'));
    }

    public function showSurveyForm($nomor)
    {
        // Logika untuk menampilkan halaman survey
        // Gunakan data yang diperlukan sesuai kebutuhan
        $layananData = [
            'nomor' => $nomor,
        ];

        return view('masyarakat.survey', compact('layananData'));
    }

    

    private function getJudulByNomor($nomor)
    {
        // Tambahkan logika atau kueri database sesuai kebutuhan
        // Contoh: Ambil judul berdasarkan nomor layanan
        $judulLayanan = [
            1 => 'SURVEI KEPUASAN MASYARAKAT DEKRANASDA',
            2 => 'SURVEI KEPUASAN MASYARAKAT IMIGRASI',
            3 => 'SURVEI KEPUASAN MASYARAKAT BADAN NARKOTIKA NASIONAL',
            4 => 'SURVEI KEPUASAN MASYARAKAT PENGADILAN AGAMA',
            5 => 'SURVEI KEPUASAN MASYARAKAT PT TASPEN',
            6 => 'SURVEI KEPUASAN MASYARAKAT SAMSAT',
            7 => 'SURVEI KEPUASAN MASYARAKAT POLRES',
            8 => 'SURVEI KEPUASAN MASYARAKAT PT PEGADAIAN',
            9 => 'SURVEI KEPUASAN MASYARAKAT DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL',
            10 => 'SURVEI KEPUASAN MASYARAKAT BJB KCP PEMDA CIMAHI',
            11 => 'SURVEI KEPUASAN MASYARAKAT KANTOR PAJAK PRATAMA',
            12 => 'SURVEI KEPUASAN MASYARAKAT BPJS KESEHATAN',
            13 => 'SURVEI KEPUASAN MASYARAKAT BPJS KETENAGAKERJAAN',
            14 => 'SURVEI KEPUASAN MASYARAKAT KEJAKSAAN NEGERI CIMAHI',
            15 => 'SURVEI KEPUASAN MASYARAKAT BAPPENDA',
            16 => 'SURVEI KEPUASAN MASYARAKAT KEMENTERIAN AGAMA',
            17 => 'SURVEI KEPUASAN MASYARAKAT KADIN',
            18 => 'SURVEI KEPUASAN MASYARAKAT DPMPTSP CIMAHI',
            19 => 'SURVEI KEPUASAN MASYARAKAT DPUPR',
            20 => 'SURVEI KEPUASAN MASYARAKAT NOTARIAT',
            21 => 'SURVEI KEPUASAN MASYARAKAT PT POS INDONESIA',
            22 => 'SURVEI KEPUASAN MASYARAKAT BPN ATR',
            23 => 'SURVEI KEPUASAN MASYARAKAT BPOM',
            24 => 'SURVEI KEPUASAN MASYARAKAT BEA CUKAI BANDUNG',
            25 => 'SURVEI KEPUASAN MASYARAKAT DPMPTSP PROVINSI JAWA BARAT',
            26 => 'SURVEI KEPUASAN MASYARAKAT KECAMATAN CIMAHI SELATAN',
            27 => 'SURVEI KEPUASAN MASYARAKAT PT PLN (Persero) UP3 Cimahi',
            28 => 'SURVEI KEPUASAN MASYARAKAT KECAMATAN CIMAHI TENGAH',
            29 => 'SURVEI KEPUASAN MASYARAKAT KECAMATAN CIMAHI UTARA',
            30 => 'SURVEI KEPUASAN MASYARAKAT DISDAGKOPERIN',
            31 => 'SURVEI KEPUASAN MASYARAKAT DINAS TENAGA KERJA',
            32 => 'SURVEI KEPUASAN MASYARAKAT DINAS PENDIDIKAN',
            33 => 'SURVEI KEPUASAN MASYARAKAT PERUMDA AIR MINUM TIRTA RAHARJA',
            34 => 'SURVEI KEPUASAN MASYARAKAT BADAN KESATUAN BANGSA DAN POLITIK',
            35 => 'SURVEI KEPUASAN MASYARAKAT DINAS PERHUBUNGAN',
            36 => 'SURVEI KEPUASAN MASYARAKAT SATPOL PP DAN DAMKAR',
            37 => 'SURVEI KEPUASAN MASYARAKAT DINAS LINGKUNGAN HIDUP',
            38 => 'SURVEI KEPUASAN MASYARAKAT DINAS PERUMAHAN DAN KAWASAN PEMUKIMAN',
            39 => 'SURVEI KEPUASAN MASYARAKAT DINAS SOSIAL',
            40 => 'SURVEI KEPUASAN MASYARAKAT DISBUDPARPORA CIMAHI',
            41 => 'SURVEI KEPUASAN MASYARAKAT DINAS KESEHATAN',
            42 => 'SURVEI KEPUASAN MASYARAKAT DINAS PANGAN DAN PERTANIAN',
            43 => 'SURVEI KEPUASAN MASYARAKAT KEJAKSAAN - E TILANG',
            44 => 'SURVEI KEPUASAN MASYARAKAT PENGADILAN NEGERI BALE BANDUNG',
        ];

        return $judulLayanan[$nomor] ?? 'Judul tidak ditemukan';
    }

    private function getInfoByNomor($nomor)
    {
        // Tambahkan logika atau kueri database sesuai kebutuhan
        // Contoh: Ambil informasi berdasarkan nomor layanan
        $informasiLayanan = [
            1 => 'DEKRANASDA',
            2 => 'IMIGRASI',
            3 => 'BADAN NARKOTIKA NASIONAL',
            4 => 'PENGADILAN AGAMA',
            5 => 'PT TASPEN',
            6 => 'SAMSAT',
            7 => 'POLRES',
            8 => 'PT PEGADAIAN',
            9 => 'DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL',
            10 => 'BJB KCP PEMDA CIMAHI',
            11 => 'KANTOR PAJAK PRATAMA',
            12 => 'BPJS KESEHATAN',
            13 => 'BPJS KETENAGAKERJAAN',
            14 => 'KEJAKSAAN NEGERI CIMAHI',
            15 => 'BAPPENDA',
            16 => 'KEMENTERIAN AGAMA',
            17 => 'KADIN',
            18 => 'DPMPTSP CIMAHI',
            19 => 'DPUPR',
            20 => 'NOTARIAT',
            21 => 'PT POS INDONESIA',
            22 => 'BPN ATR',
            23 => 'BPOM',
            24 => 'BEA CUKAI BANDUNG',
            25 => 'DPMPTSP PROVINSI JAWA BARAT',
            26 => 'KECAMATAN CIMAHI SELATAN',
            27 => 'PT PLN (Persero) UP3 Cimahi',
            28 => 'KECAMATAN CIMAHI TENGAH',
            29 => 'KECAMATAN CIMAHI UTARA',
            30 => 'DISDAGKOPERIN',
            31 => 'DINAS TENAGA KERJA',
            32 => 'DINAS PENDIDIKAN',
            33 => 'PERUMDA AIR MINUM TIRTA RAHARJA',
            34 => 'BADAN KESATUAN BANGSA DAN POLITIK',
            35 => 'DINAS PERHUBUNGAN',
            36 => 'SATPOL PP DAN DAMKAR',
            37 => 'DINAS LINGKUNGAN HIDUP',
            38 => 'DINAS PERUMAHAN DAN KAWASAN PEMUKIMAN',
            39 => 'DINAS SOSIAL',
            40 => 'DISBUDPARPORA CIMAHI',
            41 => 'DINAS KESEHATAN',
            42 => 'DINAS PANGAN DAN PERTANIAN',
            43 => 'KEJAKSAAN - E TILANG',
            44 => 'PENGADILAN NEGERI BALE BANDUNG',
        ];

        return $informasiLayanan[$nomor] ?? 'Informasi tidak ditemukan';
    }
}
