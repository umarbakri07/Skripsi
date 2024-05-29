<?php

namespace App\Http\Controllers;

use App\Models\MSensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function bacasuhu()
    {
        $sensor = MSensor::select('*')->get();

        return view('bacasuhu', ['nilaisensor' => $sensor]);
    }
    public function bacakelembaban()
    {
        $sensor = MSensor::select('*')->get();

        return view('bacakelembaban', ['nilaisensor' => $sensor]);
    }
    public function bacatanah()
    {
        $sensor = MSensor::select('*')->get();

        return view('bacatanah', ['nilaisensor' => $sensor]);
    }

    public function simpansensor()
    {
        MSensor::where('id', '1')->update(['suhu' => request()->nilaisuhu, 'kelembaban' => request()->nilaikelembaban, 'tanah' => request()->nilaitanah]);
    }
}