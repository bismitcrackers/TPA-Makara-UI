<?php

namespace App\Http\Controllers;

use App\Berita;
use App\Helper\WebHelper;
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
        return view('pages.CreateNews', ['route' => 'create']);
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
        $image = WebHelper::saveImageToPublic($request->file('fotoBerita'), '/picture/news');
        $berita = new Berita;
        $berita->judul = $request['judulBerita'];
        $berita->isi = $request['isiBerita'];
        $berita->gambar = $image;
        $berita->save();

        return redirect()->route('success');
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

        return view('pages.CreateNews', ['berita' => $berita, 'route' => 'edit']);
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

        $berita = Berita::find($id);

        $this->validate($request,[
            'judulBerita' => 'required',
            'isiBerita' => 'required',
            'fotoBerita' => 'image|nullable|max:1999'
        ]);
        // tambah store gambar
        if($request->hasFile('fotoBerita')){
            $image = WebHelper::saveImageToPublic($request->file('fotoBerita'), '/picture/news');
            $berita->gambar = $image;
        }

        $berita->judul = $request['judulBerita'];
        $berita->isi = $request['isiBerita'];
        $berita->save();

        return redirect()->route('success');
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

        return redirect()->route('success');
    }
}
