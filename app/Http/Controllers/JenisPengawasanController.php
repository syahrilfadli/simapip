<?php

namespace App\Http\Controllers;

use App\Models\JenisPengawasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class JenisPengawasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis = JenisPengawasan::all();
        return view('JenisPengawasan.index', compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('JenisPengawasan.create');
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
            'nama' => 'required',
        ]);

        JenisPengawasan::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisPengawasan  $jenisPengawasan
     * @return \Illuminate\Http\Response
     */
    public function show(JenisPengawasan $jenisPengawasan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisPengawasan  $jenisPengawasan
     * @return \Illuminate\Http\Response
     */
    public function edit(String $id)
    {
        $jenis = JenisPengawasan::find($id);
        return view('JenisPengawasan.edit', compact('jenis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisPengawasan  $jenisPengawasan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, String $id)
    {
        $request->validate([
            'kode' => 'required|string|min:5|max:30',
            'nama' => 'required|string|min:5|max:100',
        ]);

        JenisPengawasan::where('id', $id)->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
    ]);

        return Redirect::to('/jenis-pengawasan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisPengawasan  $jenisPengawasan
     * @return \Illuminate\Http\Response
     */
    public function destroy(String $id)
    {
        JenisPengawasan::where('id', $id)->delete();
        return redirect()->back();
    }
}
