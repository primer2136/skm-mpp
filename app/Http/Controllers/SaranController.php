<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saran;

class SaranController extends Controller
{
    public function index()
    {
        $sarans = Saran::orderBy('created_at')->get();
        $sarans = Saran::with('responden')->get();
        return view('admin.saran.index', compact('sarans'));
    }
}
