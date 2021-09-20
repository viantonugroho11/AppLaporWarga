<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatan = Kegiatan::all();
        return view('',compact('kegiatan'));
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
            'nama_kegiatan'=>'required',
            'isi_kegiatan'=>'required',
            'tanggal'=>'required',
        ]);

        $kegiatan=Kegiatan::create([
            'nama_kegiatan'=>$request->nama_kegiatan,
            'keterangan_kegiatan'=>$request->isi_kegiatan,
            'tanggal_pelaksanaan_kegiatan'=>$request->tanggal,
        ]);

        if($kegiatan)
        {
            return redirect()->route('kegiatan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }
        else
        {
            return redirect()->route('kegiatan.index')->with(['failed' => 'Data Berhasil gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kegiatan = Kegiatan::findorfail($id);
        return view('',compact(''));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kegiatan $kegiatan)
    {
        return view('',compact(''));
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
        $kegiatan=Kegiatan::findorfail($id);
        $request->validate([
            'nama_kegiatan' => 'required',
            'isi_kegiatan' => 'required',
            'tanggal' => 'required',
        ]);

        $kegiatan->update([
            'nama_kegiatan' => $request->nama_kegiatan,
            'keterangan_kegiatan' => $request->isi_kegiatan,
            'tanggal_pelaksanaan_kegiatan' => $request->tanggal,
        ]);

        if ($kegiatan) {
            return redirect()->route('kegiatan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('kegiatan.index')->with(['failed' => 'Data Berhasil gagal Disimpan!']);
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
        $kegiatan=Kegiatan::findorfail($id);
        $kegiatan->delete();
        if ($kegiatan) {
            return redirect()->route('kegiatan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('kegiatan.index')->with(['failed' => 'Data Berhasil gagal Disimpan!']);
        }   
    }
}
