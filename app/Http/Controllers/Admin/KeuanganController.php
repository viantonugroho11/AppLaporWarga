<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Keuangan;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keuangan =Keuangan::all();
        return view('',compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view();
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
            'nama_keuangan'=>'required',
            'nominal_keuangan'=>'required',
            'jenis_keuangan'=>'required',
            'keterangan_keuangan'=>'required',
        ]);
        $keuangan=Keuangan::create([
            'nama_keuangan'=>$request->nama_keuangan,
            'nominal_keuangan'=>$request->nominal_keuangan,
            'jenis_keuangan'=>$request->jenis_keuangan,
            'keterangan_keuangan'=>$request->keterangan_keuangan,
        ]);
        if ($keuangan) {
            return redirect()->route('keuangan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('keuangan.index')->with(['failed' => 'Data Berhasil gagal Disimpan!']);
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Keuangan $keuangan)
    {
        return view('',compact(''));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Keuangan $keuangan)
    {
        return view('', compact(''));
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
        $keuangan= Keuangan::findorfail($id);
        $request->validate([
            'nama_keuangan' => 'required',
            'nominal_keuangan' => 'required',
            'jenis_keuangan' => 'required',
            'keterangan_keuangan' => 'required',
        ]);
        $keuangan->update([
            'nama_keuangan' => $request->nama_keuangan,
            'nominal_keuangan' => $request->nominal_keuangan,
            'jenis_keuangan' => $request->jenis_keuangan,
            'keterangan_keuangan' => $request->keterangan_keuangan,
        ]);
        if ($keuangan) {
            return redirect()->route('keuangan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('keuangan.index')->with(['failed' => 'Data Berhasil gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keuangan=Keuangan::find($id);
        $keuangan->delete();
        
        if ($keuangan) {
            return redirect()->route('keuangan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('keuangan.index')->with(['failed' => 'Data Berhasil gagal Disimpan!']);
        }
    }
}
