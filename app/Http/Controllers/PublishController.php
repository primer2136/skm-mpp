<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survei;
use App\Models\Responden;
use App\Models\Hasil;

class PublishController extends Controller
{
    public function index()
    {
        $surveis = Survei::orderBy('id_survei')->get();

        return view('admin.publish.index', compact('surveis'));
    }

    public function show(string $id_jawaban)
    {
        $hasils = Hasil::findOrFail($id_jawaban);

        return view('admin.publish.view', compact('hasils'));
    }
}
