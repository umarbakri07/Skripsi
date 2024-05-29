<?php

namespace App\Http\Controllers;

use App\Models\Bibit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
// use Spatie\Backtrace\File;
use Illuminate\Support\Facades\Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BibitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $databibit = Bibit::where('nama_anggur', 'LIKE', '%' . $request->search . '%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());

        } else {
            $databibit = Bibit::paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }
        //$databibit = Bibit::all();
        return view('admin.bibit.bibit', [
            'bibits' => $databibit
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
        $databibit = Bibit::all();
        return view('admin.bibit.tambah', ['bibits' => $databibit]);
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
            'nama_anggur' => 'required',
            'nama_latin' => 'required',
            'karakteristik' => 'required',
            'waktu_berbuah' => 'required',
            'asal' => 'required',
            'harga' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'keterangan' => 'required'
        ]);

        if ($request->hasFile('gambar')) {
            $imageName = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move('gambar/', $imageName);
            $data['gambar'] = $imageName;
        }

        Bibit::create($data);

        return redirect('/bibit');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bibit  $bibit
     * @return \Illuminate\Http\Response
     */
    public function show(Bibit $bibit)
    {
        return view('admin.bibit.qrcode', [
            'bibit' => $bibit
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bibit  $bibit
     * @return \Illuminate\Http\Response
     */
    public function edit(Bibit $bibit)
    {
        return view('admin.bibit.edit', [
            'bibit' => $bibit
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bibit  $bibit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bibit $bibit)
    {
        $request->validate([
            'nama_anggur' => 'required',
            'nama_latin' => 'required',
            'karakteristik' => 'required',
            'waktu_berbuah' => 'required',
            'asal' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only([
            'nama_anggur',
            'nama_latin',
            'karakteristik',
            'waktu_berbuah',
            'asal',
            'harga',
            'keterangan'
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($bibit->gambar) {
                File::delete(public_path('gambar') . '/' . $bibit->gambar);
            }

            // Simpan gambar baru
            $imageName = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move('gambar/', $imageName);
            $data['gambar'] = $imageName;
        }

        // Update data bibit
        $bibit->update($data);

        return redirect('/bibit')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bibit  $bibit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bibit $bibit)
    {
        $data = Bibit::where('id', $bibit->id)->first();
        File::delete(public_path('gambar') . '/' . $data->gambar);
        Bibit::destroy('id', $bibit->id);

        return redirect('/bibit');
    }
}