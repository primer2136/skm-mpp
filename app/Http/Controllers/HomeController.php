<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tenant;

class HomeController extends Controller
{
    public function index()
    {
        $tenant = Tenant::first();

        $layananData = [
            'layananTenant' => Tenant::all(),
            'info' => $tenant->nama_tenant ?? '',
        ];

        return view('masyarakat.home', compact('layananData'));
    }
}
