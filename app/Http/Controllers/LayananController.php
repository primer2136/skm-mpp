<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertanyaan;

class LayananController extends Controller
{
    public function tampilkanPertanyaan($layananId, $halaman)
    {
        // Logika untuk menampilkan pertanyaan dari $layananId dan $halaman tertentu
        // Contoh: $pertanyaan = Pertanyaan::where('layanan_id', $layananId)->skip($halaman - 1)->first();

        // Kemudian kembalikan tampilan dengan data pertanyaan
        return view('layanan.pertanyaan')->with(compact('pertanyaan'));
    }

    public function simpanJawaban(Request $request)
    {
        // Logika untuk menyimpan jawaban dari request yang diterima
        // Contoh: Pertanyaan::where('id', $request->pertanyaan_id)->update(['jawaban' => $request->jawaban]);

        // Redirect ke halaman pertanyaan selanjutnya atau ke halaman terima kasih jika sudah selesai
        // return redirect()->route('layanan.pertanyaan', ['layananId' => $request->layanan_id, 'halaman' => $request->halaman + 1]);
    }
}
