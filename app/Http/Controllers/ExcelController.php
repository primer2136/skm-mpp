<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Responden;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;

class ExcelController extends Controller
{
    public function exportDataToExcel()
    {
        // Mengambil data dari model Responden
        $respondens = Responden::with('jawaban', 'saran')->get();

        // Memproses data untuk diekspor ke dalam file Excel
        $data = [];
        foreach ($respondens as $responden) {
            $jawaban = $responden->jawaban->pluck('bobot')->toArray();
            $saran = $responden->saran->saran ?? '';

            $data[] = [
                'Nama Responden' => $responden->nama_responden,
                'Tahun Lahir' => $responden->tahun_lahir,
                'Jenis Kelamin' => $responden->jenis_kelamin,
                'Nomor Antrian' => $responden->nomor_antrian,
                'Riwayat Pendidikan' => $responden->riwayat_pendidikan,
                'Pekerjaan' => $responden->pekerjaan,
                'Jawaban Pertanyaan' => implode(', ', $jawaban),
                'Saran' => $saran,
            ];
        }

        // Membuat file Excel menggunakan Laravel Excel
        return Excel::download(new Collection($data), 'data_responden.xlsx');
    }
}
