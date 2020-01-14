<?php

namespace App\Http\Controllers;

use App\Jadwal;
use App\JadwalGambar;
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
            $schedule = new Jadwal;
            $schedule->pembuat             = $user->name;
            $schedule->judul               = $request->judul;
            $schedule->kelas               = $request->kelas;
            $schedule->save();
            if ($files=$request->file('schedules')) {
                foreach($files as $file){
                    $image = WebHelper::saveImageToPublic($file, '/picture/schedule');
                    $imageSchedule = new JadwalGambar;
                    $imageSchedule->url_lampiran = $image;
                    $imageSchedule->jadwal()->associate($schedule);
                    $imageSchedule->save();
                }
            }
            $notificationMessage = ', telah menambahkan jadwal "' . $request->judul . '" untuk siswa ' . $request->kelas . '! :)';
            $notificationUrl = 'profile/schedule/' . $request->kelas . '/list';
            NotificationController::generateNotificationToSpecificClass($user->roles()->first()->name, $notificationMessage, $request->kelas, $notificationUrl);
            return redirect()->route('successAndRedirect', ['url' => route('profile.schedule.list', ['kelas' => $schedule->kelas])]);
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
            $jadwal = Jadwal::where('kelas', $request->kelas)->first();
            $jadwal->judul = $request->judul;
            $jadwal->pembuat = $user->name;
            $jadwal->save();
            if($files=$request->file('schedules')){
                foreach($files as $file){
                    $image = WebHelper::saveImageToPublic($file, '/picture/schedule');
                    $imageSchedule = new JadwalGambar;
                    $imageSchedule->url_lampiran = $image;
                    $imageSchedule->jadwal()->associate($jadwal);
                    $imageSchedule->save();
                }
            }
            // $notificationMessage = ', telah mengubah jadwal "' . $jadwal->judul . '" untuk siswa ' . $jadwal->kelas . '! :)';
            // $notificationUrl = 'profile/schedule/' . $jadwal->kelas . '/list';
            // NotificationController::generateNotificationToSpecificClass($user->name, $notificationMessage, $jadwal->kelas, $notificationUrl);
            return redirect()->route('successAndRedirect', ['url' => route('profile.schedule.list', ['kelas' => $jadwal->kelas])]);
        }
    }

    public function deleteSchedule($id)
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
            $jadwal = Jadwal::find($id);
            $jadwalGambar = JadwalGambar::where('jadwal_id',$id);

            $judul = $jadwal->judul;
            $kelas = $jadwal->kelas;

            $jadwalGambar->delete();
            $jadwal->delete();

            // $notificationMessage = ', telah menghapus jadwal "' . $judul . '" untuk siswa ' . $kelas . '! :)';
            // $notificationUrl = 'profile/schedule/' . $kelas . '/list';
            // NotificationController::generateNotificationToSpecificClass($user->name, $notificationMessage, $kelas, $notificationUrl);

            return redirect()->route('successAndRedirect', ['url' => route('profile.schedule.list', ['kelas' => $kelas])]);
        }
    }

}
