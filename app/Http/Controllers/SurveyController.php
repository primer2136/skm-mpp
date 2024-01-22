<?php

use App\Models\Survey;
use App\Models\JawabanPertanyaan;
use App\Models\KritikSaran;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function submitSurvey(Request $request)
    {
        // Validasi formulir di sini jika diperlukan

        // Simpan data survey
        $survey = Survey::create($request->only(['nama', 'tahun_lahir', 'jenis_kelamin', 'nomor_antrian', 'pendidikan', 'pekerjaan']));

        // Simpan jawaban pertanyaan
        for ($i = 1; $i <= 9; $i++) {
            JawabanPertanyaan::create([
                'survey_id' => $survey->id,
                'pertanyaan_id' => $i,
                'jawaban' => $request->input("answer_$i"),
            ]);
        }

        // Simpan kritik dan saran
        KritikSaran::create([
            'survey_id' => $survey->id,
            'saran' => $request->input('saran'),
        ]);

        // Redirect atau tampilkan pesan sukses
        return redirect('/')->with('success', 'Terima kasih telah mengisi survei.');
    }
}