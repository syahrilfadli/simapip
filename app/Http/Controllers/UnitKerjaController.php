<?php

namespace App\Http\Controllers;

use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UnitKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unitKerja = UnitKerja::all();
        return view('DataUnitKerja.index', compact('unitKerja'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('DataUnitKerja.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama_unit' => 'required',
            'nama_singkatan' => 'nullable',
            'alamat' => 'nullable',
            'pimpinan' => 'nullable',
            'no_telp' => 'nullable|digits_between:10,15',
            'email' => 'nullable|email',
            'website' => 'nullable|regex:/^https:\/\/.*/',
            'nomor_urut' => 'required',
            'unitKerja_Kode' => 'required|min=9|max=14',
        ]);

        UnitKerja::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);
        
        // return redirect()->back();
        return Redirect::to('/jenis-pengawasan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnitKerja  $unitKerja
     * @return \Illuminate\Http\Response
     */
    public function show(UnitKerja $unitKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnitKerja  $unitKerja
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitKerja $unitKerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UnitKerja  $unitKerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnitKerja $unitKerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnitKerja  $unitKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitKerja $unitKerja)
    {
        //
    }
}
