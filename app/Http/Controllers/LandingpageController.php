<?php

namespace App\Http\Controllers;

use App\Models\Bibit;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LandingpageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $databibit = Bibit::all();
        $dataartikel = Artikel::all();

        return view('landingpage.galeri', ['bibits' => $databibit, 'artikels' => $dataartikel]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bibit = Bibit::find($id);

        if ($bibit) {
            // Jika ditemukan entitas Bibit dengan ID yang sesuai
            return view('landingpage.detail', compact('bibit'));
        }

        // Tangani situasi ketika tidak ada $bibit maupun $artikel yang ditemukan
        abort(404); // Tampilkan halaman error 404 atau tangani sesuai kebutuhan
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}