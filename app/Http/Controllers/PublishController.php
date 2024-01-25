<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublishController extends Controller
{
    public function index()
    {
        $surveis = Survei::orderBy('id_survei')->get();

        return view('admin.publish.index', compact('surveis'));
    }
}
