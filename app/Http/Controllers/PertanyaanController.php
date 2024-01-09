// app/Http/Controllers/PertanyaanController.php
<?php

use App\Models\Layanan;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    public function show($layanan_id, $pertanyaan_id)
    {
        $layanan = Layanan::findOrFail($layanan_id);
        $pertanyaan = Pertanyaan::findOrFail($pertanyaan_id);
        return view('pertanyaan.show', compact('layanan', 'pertanyaan'));
    }

    public function store(Request $request, $layanan_id, $pertanyaan_id)
    {
        // Logika untuk menyimpan jawaban yang di-submit oleh pengguna
        // Contoh: $jawaban = $request->input('jawaban');
        // Lakukan sesuai kebutuhan aplikasi Anda

        // Redirect ke halaman pertanyaan berikutnya atau ke halaman hasil jika sudah selesai
        return redirect()->route('pertanyaan.show', ['layanan_id' => $layanan_id, 'pertanyaan_id' => $pertanyaan_id + 1]);
    }
}
