<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jawaban;
use App\Models\Responden;


class PublishController extends Controller
{
    public function index()
    {
        $jawabans = Responden::orderBy('id_responden')->get();
        // dd($jawabans);

        foreach ($jawabans as $jawaban) {
            $jawabanSurvei = Jawaban::where('id_responden', $jawaban->id_responden)->get();
            $totalBobot = $jawabanSurvei->sum('bobot');
            $jumlahPertanyaan = $jawabanSurvei->count();
            $jawaban->rataRata = $jumlahPertanyaan > 0 ? $totalBobot / $jumlahPertanyaan : 0;
        }

        return view('admin.publish.index', compact('jawabans'));
    }

    public function show($id_responden)
    {
        // Mengambil jawaban dari survei yang sesuai untuk responden tertentu
        $jawabanSurvei = Jawaban::where('id_responden', $id_responden)
            ->with('pertanyaan')
            ->get();

        // dd($jawabanSurvei);

        $totalBobot = $jawabanSurvei->sum('bobot');
        $jumlahPertanyaan = $jawabanSurvei->count();
        $rataRata = $jumlahPertanyaan > 0 ? $totalBobot / $jumlahPertanyaan : 0;

        return view('admin.publish.view', compact('jawabanSurvei', 'rataRata'));
    }
}
