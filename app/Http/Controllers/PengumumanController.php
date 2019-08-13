<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengumuman;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pengumumans = Pengumuman::all();

        return view('pages.dummyshowpengumuman',['pengumumans'=>$pengumumans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dummyaddpengumuman',['route'=>'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul','deskripsi','tanggal','jenis'
        ]);
        $pengumuman = new Pengumuman;
        $pengumuman->judul = $request['judul'];
        $pengumuman->deskripsi = $request['deskripsi'];
        $pengumuman->tanggal = $request['tanggal'];
        $pengumuman->jenis = $request['jenis'];
        $pengumuman->save();

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
        $pengumuman = Pengumuman::find($id);

        return $pengumuman;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengumuman = Pengumuman::find($id);

        return view('pages.dummyaddpengumuman',['pengumuman'=>$pengumuman,'route'=>'edit']);
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
        $pengumuman = Pengumuman::find($id);

        $this->validate($request,[
            'judul','deskripsi','tanggal','jenis'
        ]);
        $pengumuman->judul = $request['judul'];
        $pengumuman->deskripsi = $request['deskripsi'];
        $pengumuman->tanggal = $request['tanggal'];
        $pengumuman->jenis = $request['jenis'];
        $pengumuman->save();

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
        $pengumuman = Pengumuman::find($id);
        $pengumuman->delete();

        return redirect()-route('success');
    }
}
