<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\Responden;

class HomeController extends Controller
{
    public function index()
    {
        $tenant = Tenant::first();

        $layananData = [
            'layananTenant' => Tenant::all(),
            'info' => $tenant->nama_tenant ?? '',
        ];

        $totalRespondenSemuaTenant = Responden::count();

        // Retrieve education history data for all respondents
        $eduData = Responden::select('riwayat_pendidikan', \DB::raw('count(*) as total'))
            ->groupBy('riwayat_pendidikan')
            ->get();

        // Retrieve job data for all respondents
        $jobData = Responden::select('pekerjaan', \DB::raw('count(*) as total'))
            ->groupBy('pekerjaan')
            ->get();

        // Extract labels and data for education chart
        $eduLabels = $eduData->pluck('riwayat_pendidikan')->toArray();
        $eduValues = $eduData->pluck('total')->toArray();

        // Extract labels and data for job chart
        $jobLabels = $jobData->pluck('pekerjaan')->toArray();
        $jobValues = $jobData->pluck('total')->toArray();

        return view('masyarakat.home', compact(
            'layananData',
            'totalRespondenSemuaTenant',
            'eduLabels',
            'eduValues',
            'jobLabels',
            'jobValues'
        ));
    }
}
