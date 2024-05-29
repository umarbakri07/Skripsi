<?php

namespace App\Http\Controllers;

use App\Models\Bibit;
use App\Models\Artikel;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $databibit = Bibit::all();
        $dataartikel = Artikel::all();

        return view('landingpage.index', [
            'bibits' => $databibit,
            'artikels' => $dataartikel
        ]);
    }
}