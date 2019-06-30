<?php

namespace App\Http\Controllers;

use App\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view form
        return view('pages.createBerita');
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
        $this->validate($request,[
            'judulBerita' => 'required',
            'isiBerita' => 'required',
            'fotoBerita' => 'image|nullable|max:1999'
        ]);
        // tambah store gambar
        if($request->hasFile('fotoBerita')){
            $fileName = pathinfo($request->file('fotoBerita')->getClientOriginalName(),PATHINFO_FILENAME);
            $extension = $request->file('fotoBerita')->getClientOriginalExtension();
            $fileNameToStore = $fileName. '_'. time(). '.'.$extension;
            
            $path = $request->file('fotoBerita')->storeAs('public/photos', $fileNameToStore);
        
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $berita = new Berita;
        $berita->judul = $request['judulBerita'];
        $berita->isi = $request['isiBerita'];
        $berita->gambar = $fileNameToStore;
        $berita->save();

        return redirect('/admin/berita');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $berita = Berita::find($id);
        
        return $berita;
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
        $berita = Berita::find($id);

        return view('pages.createBerita')->with('berita', $berita);
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

        $this->validate($request,[
            'judulBerita' => 'required',
            'isiBerita' => 'required',
            'fotoBerita' => 'image|nullable|max:1999'
        ]);
        // tambah store gambar
        if($request->hasFile('fotoBerita')){
            $fileName = pathinfo($request->file('fotoBerita')->getClientOriginalName(),PATHINFO_FILENAME);
            $extension = $request->file('fotoBerita')->getClientOriginalExtension();
            $fileNameToStore = $fileName. '_'. time(). '.'.$extension;
            
            $path = $request->file('fotoBerita')->storeAs('public/photos', $fileNameToStore);
        
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $berita = Berita::find($id);
        $berita->judul = $request['judulBerita'];
        $berita->isi = $request['isiBerita'];
        $berita->gambar = $fileNameToStore;
        $berita->save();

        return redirect('/admin/berita');
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
        $berita = Berita::find($id);
        $berita->delete();

        return redirect('/berita');
    }
}
