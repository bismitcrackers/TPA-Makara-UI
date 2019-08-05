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
            'jdlPeng','dscPeng','tglPeng','jnsKeg'
        ]);
        $pengumuman = new Pengumuman;
        $pengumuman->judul = $request['jdlPeng'];
        $pengumuman->deskripsi = $request['dscPeng'];
        $pengumuman->tanggal = $request['tglPeng'];
        $pengumuman->jenis = $request['jnsKeg'];
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
            'jdlPeng','dscPeng','tglPeng','jnsKeg'
        ]);
        $pengumuman = new Pengumuman;
        $pengumuman->judul = $request['jdlPeng'];
        $pengumuman->deskripsi = $request['dscPeng'];
        $pengumuman->tanggal = $request['tglPeng'];
        $pengumuman->jenis = $request['jnsKeg'];
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
