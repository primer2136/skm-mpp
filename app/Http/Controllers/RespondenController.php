<?php

// app/Http/Controllers/RespondenController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Responden; // Pastikan model sudah dibuat

class RespondenController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'tahun_lahir' => 'required|numeric|min:1900|max:2024',
            'jenis_kelamin' => 'required',
            'nomor_antrian' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
        ]);

        Responden::create($data);

        return redirect()->route('responden.store'); // Sesuaikan dengan rute yang ingin Anda gunakan
    }
}

