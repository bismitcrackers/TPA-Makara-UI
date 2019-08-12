<?php

namespace App\Http\Controllers;

use App\Jadwal;
use App\Student;
use App\Helper\WebHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addSchedule(Request $request)
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
            if ($request->has('lampiran')) {
                $image = WebHelper::saveImageToPublic($request->file('schedule'), '/picture/schedule');
            }
            $schedule = new Jadwal;
            $schedule->pembuat             = $user->name;
            if ($request->has('lampiran')) {
                $schedule->url_lampiran    = $image;
            }
            $schedule->tanggal_berlaku     = new Carbon('first day of this month');
            $schedule->tanggal_berakhir    = new Carbon('last day of this month');
            $schedule->save();
            return redirect()->route('success');
        }
    }

    public function editSchedule(Request $request, $id)
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
            if ($request->has('lampiran')) {
                $image = WebHelper::saveImageToPublic($request->file('schedule'), '/picture/schedule');
                $jadwal = Jadwal::where('id', $id)->update(
                    [
                        'pembuat'             => $user->name,
                        'url_lampiran'        => $image,
                        // 'tanggal_berlaku'     => $request->tanggalBerlaku,
                        // 'tanggal_berakhir'    => $request->tanggalBerakhir,
                        'tanggal_berlaku'     => new Carbon('first day of this month'),
                        'tanggal_berakhir'    => new Carbon('last day of this month'),
                    ]
                );
            } else {
                $jadwal = Jadwal::where('id', $id)->update(
                    [
                        'pembuat'             => $user->name,
                        // 'tanggal_berlaku'     => $request->tanggalBerlaku,
                        // 'tanggal_berakhir'    => $request->tanggalBerakhir,
                        'tanggal_berlaku'     => new Carbon('first day of this month'),
                        'tanggal_berakhir'    => new Carbon('last day of this month'),
                    ]
                );
            }
            return redirect()->route('success');
        }
    }

    public function deleteSchedule($id)
    {
        $jadwal = Jadwal::find($id);
        $jadwal->delete();

        return redirect()->route('success');
    }

}
