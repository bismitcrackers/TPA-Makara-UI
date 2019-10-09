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
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        } else if ($user->roles()->first()->name == 'Orangtua') {
            return redirect()->route('orangtua.home');
        } else if ($user->roles()->first()->name == 'Guru') {
            return redirect()->route('guru.home');
        } else if ($user->roles()->first()->name == 'Fasilitator') {
            return redirect()->route('fasilitator.home');
        } else if ($user->roles()->first()->name == 'Co-fasilitator') {
            return redirect()->route('cofasilitator.home');
        } else {
            $this->validate($request,[
                'judul','deskripsi','tanggal','jenis'
            ]);
            $pengumuman = new Pengumuman;
            $pengumuman->judul = $request['judul'];
            $pengumuman->deskripsi = $request['deskripsi'];
            $pengumuman->tanggal = $request['tanggal'];
            $pengumuman->tempat = $request['tempat'];
            $pengumuman->jenis = $request['jenis'];
            $pengumuman->kelas = $request['kelas'];
            $pengumuman->save();

            $notificationMessage = ', telah menambahkan ' . $request->jenis . ' "' . $request->judul . '" untuk siswa ' . $request->kelas . '! :)';
            $notificationUrl = 'profile/pengumuman/' . $request->kelas . '/show/' . $pengumuman->id ;
            NotificationController::generateNotificationToSpecificClass($user->name, $notificationMessage, $request->kelas, $notificationUrl);

            return redirect()->route('success');
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
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        } else if ($user->roles()->first()->name == 'Orangtua') {
            return redirect()->route('orangtua.home');
        } else if ($user->roles()->first()->name == 'Guru') {
            return redirect()->route('guru.home');
        } else if ($user->roles()->first()->name == 'Fasilitator') {
            return redirect()->route('fasilitator.home');
        } else if ($user->roles()->first()->name == 'Co-fasilitator') {
            return redirect()->route('cofasilitator.home');
        } else {
            $pengumuman = Pengumuman::find($id);

            $this->validate($request,[
                'judul','deskripsi','tanggal','jenis'
            ]);
            $pengumuman->judul = $request['judul'];
            $pengumuman->deskripsi = $request['deskripsi'];
            $pengumuman->tanggal = $request['tanggal'];
            $pengumuman->tanggal = $request['tempat'];
            $pengumuman->jenis = $request['jenis'];
            $pengumuman->kelas = $request['kelas'];
            $pengumuman->save();

            // $notificationMessage = ', telah mengubah ' . $pengumuman->jenis . ' "' . $pengumuman->judul . '" untuk siswa ' . $pengumuman->kelas . '! :)';
            // $notificationUrl = 'profile/pengumuman/' . $pengumuman->kelas . '/show/' . $pengumuman->id ;
            // NotificationController::generateNotificationToSpecificClass($user->name, $notificationMessage, $pengumuman->kelas, $notificationUrl);

            return redirect()->route('success');
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
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        } else if ($user->roles()->first()->name == 'Orangtua') {
            return redirect()->route('orangtua.home');
        } else if ($user->roles()->first()->name == 'Guru') {
            return redirect()->route('guru.home');
        } else if ($user->roles()->first()->name == 'Fasilitator') {
            return redirect()->route('fasilitator.home');
        } else if ($user->roles()->first()->name == 'Co-fasilitator') {
            return redirect()->route('cofasilitator.home');
        } else {
            $pengumuman = Pengumuman::find($id);

            $jenis = $pengumuman->jenis;
            $judul = $pengumuman->judul;
            $kelas = $pengumuman->kelas;

            $pengumuman->delete();

            // $notificationMessage = ', telah menghapus ' . $jenis . ' "' . $judul . '" untuk siswa ' . $kelas . '! :)';
            // $notificationUrl = 'profile/pengumuman/' . $kelas . '/list';
            // NotificationController::generateNotificationToSpecificClass($user->name, $notificationMessage, $kelas, $notificationUrl);

            return redirect()->route('success');
        }
    }
}
