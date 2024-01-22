<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tenant;

class HomeController extends Controller
{
    public function index()
    {
        $layananData = [
            'layananTenant' => Tenant::all(), // Misalnya, mengambil semua data tenant dari model Tenant
            // ... tambahkan data lain sesuai kebutuhan
        ];

        return view('masyarakat.home', compact('layananData'));
    }
}