<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jawaban;
use App\Models\Responden;
use App\Models\Tenant;

class PublishController extends Controller
{
    public function index(Request $request)
    {
        $id_tenant = $request->input('id_tenant');

        // Ambil semua responden
        $respondens = Responden::query();

        // Filter berdasarkan tenant jika dipilih
        if ($id_tenant) {
            $respondens->whereHas('tenant', function ($query) use ($id_tenant) {
                $query->where('id_tenant', $id_tenant);
            });
        }

        // Ambil nilai rata-rata untuk setiap responden
        $jawabans = $respondens->get();

        $jawabans = Responden::orderBy('created_at')->get();
        // dd($jawabans);

        foreach ($jawabans as $jawaban) {
            $jawabanSurvei = Jawaban::where('id_responden', $jawaban->id_responden)->get();
            $totalBobot = $jawabanSurvei->sum('bobot');
            $jumlahPertanyaan = $jawabanSurvei->count();
            $jawaban->rataRata = $jumlahPertanyaan > 0 ? $totalBobot / $jumlahPertanyaan : 0;
        }
        // Ambil semua tenant untuk formulir filter
        $tenants = Tenant::all();

        return view('admin.publish.index', compact('jawabans', 'tenants'));
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
