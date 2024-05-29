<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $dataartikel = Artikel::where('artikel_anggur', 'LIKE', '%' . $request->search . '%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());

        } else {
            $dataartikel = Artikel::paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }
        //$databibit = Bibit::all();
        return view('admin.artikel.artikel', [
            'artikels' => $dataartikel
            // 'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataartikel = Artikel::all();
        return view('admin.artikel.t_artikel', ['artikels' => $dataartikel]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'artikel_anggur' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'keterangan' => 'required'
        ]);

        if ($request->hasFile('foto')) {
            $imageName = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('foto/', $imageName);
            $data['foto'] = $imageName;
        }

        Artikel::create($data);

        return redirect('/artikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $artikel)
    {
        return view('admin.artikel.e_artikel', [
            'artikel' => $artikel
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artikel $artikel)
    {
        $request->validate([
            'artikel_anggur' => 'required',
            'keterangan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only([
            'artikel_anggur',
            'keterangan'
        ]);

        if ($request->hasFile('foto')) {
            // Hapus gambar lama jika ada
            if ($artikel->foto) {
                File::delete(public_path('foto') . '/' . $artikel->foto);
            }

            // Simpan gambar baru
            $imageName = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('foto/', $imageName);
            $data['foto'] = $imageName;
        }

        // Update data bibit
        $artikel->update($data);

        return redirect('/artikel')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel)
    {
        $data = Artikel::where('id', $artikel->id)->first();
        File::delete(public_path('foto') . '/' . $data->foto);
        Artikel::destroy('id', $artikel->id);
        return redirect('/artikel');
    }
}