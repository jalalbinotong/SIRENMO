<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Http\Requests\StoreKendaraanRequest;
use App\Http\Requests\UpdateKendaraanRequest;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.data-kendaraan', [
            'kendaraan' => Kendaraan::all(),
            'kategori' => Kategori::all()
        ]);
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
     * @param  \App\Http\Requests\StoreKendaraanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKendaraanRequest $request)
    {
        //
        $validatedData = $request->validate([
            'nama' => ['required'],
            'nomor_plat' => 'required',
            'tahun' => 'required',
            'harga_perjam' => 'required',
            'harga_paket' => 'required',
            'transmisi' => 'required',
            'kategori_id' => 'required',
            'status' => 'required',
            'deskripsi' => 'required',
        ]);

        if (Kendaraan::create($validatedData)) {
            return redirect('/login')->with('success', 'Registration successfull! Please login');
        } else {
            return 'gagal';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function show(Kendaraan $kendaraan)
    {
        //
        return view('admin.pages.data-kendaraan', [
            'kendaraan' => $kendaraan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kendaraan $kendaraan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKendaraanRequest  $request
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKendaraanRequest $request, Kendaraan $kendaraan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kendaraan $kendaraan, $id)
    {
        $kendaraan->destroy($id);
        return redirect('/data-kendaraan');
    }
}
