<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Responden;
use App\Models\Tenant;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRespondenSemuaTenant = Responden::count();
        $totalTenant = Tenant::count();

        return view('admin.dashboard.index', compact(
            'totalRespondenSemuaTenant',
            'totalTenant'
        ));
    }
}
