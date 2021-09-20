<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery=Gallery::all();
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
            'nama'=>'required',
            'foto'=>'required',
        ]);
        $image = $request->file('foto');
        $image->storeAs('public/gallery', $image->hashName());

        $gallery=Gallery::create([
            'nama'=>$request->nama,
            'foto'=>$image,
        ]);
        if ($gallery) {
            return redirect()->route('gallery.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('gallery.index')->with(['failed' => 'Data Berhasil gagal Disimpan!']);
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        return view('',compact(''));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
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
        $gallery=Gallery::findorfail($id);
        if ($request->file('foto') == "") {


            $gallery = Gallery::create([
                'nama' => $request->nama,
            ]);
        }else{
            Storage::disk('local')->delete('public/posts/' . $gallery->foto);

            $image = $request->file('foto');
            $image->storeAs('public/gallery', $image->hashName());

            $gallery = Gallery::create([
                'nama' => $request->nama,
                'foto' => $image,
            ]);
        }
        if ($gallery) {
            return redirect()->route('gallery.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('gallery.index')->with(['failed' => 'Data Berhasil gagal Disimpan!']);
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
        $gallery = Gallery::findorfail($id);
        Storage::disk('local')->delete('public/posts/' . $gallery->foto);
        $gallery->delete();
        if ($gallery) {
            return redirect()->route('gallery.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('gallery.index')->with(['failed' => 'Data Berhasil gagal Disimpan!']);
        }
    }
}
