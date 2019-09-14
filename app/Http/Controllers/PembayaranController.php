<?php

namespace App\Http\Controllers;

use App\Pembayaran;
use App\Student;
use App\Helper\WebHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
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

    public function addTagihan(Request $request, $kelas, $student_id)
    {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        } else if ($user->roles()->first()->description == 'Full Access') {
            $student = Student::where('id', $student_id)->first();
            $tagihan = new Pembayaran;
            $tagihan->jenis_tagihan = $request->jenis_tagihan;
            $tagihan->jumlah_tagihan = $request->jumlah_tagihan;
            $tagihan->status = $request->status;
            $tagihan->deskripsi = $request->deskripsi;
            $tagihan->bulan_tagihan = $request->bulan_tagihan;
            if ($request->has('bukti_pembayaran')) {
                $image = WebHelper::saveImageToPublic($request->file('bukti_pembayaran'), '/picture/pembayaran');
                $tagihan->bukti_pembayaran = $image;
            }
            $tagihan->kelas = $kelas;
            $student->pembayaran()->save($tagihan);
            return redirect()->route('success');
        } else {
            return redirect()->route('login');
        }
    }

    public function editTagihan(Request $request, $kelas, $student_id, $tagihan_id)
    {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        } else if ($user->roles()->first()->name == 'Orangtua') {
            $student = Student::where('id', $student_id)->first();
            if ($request->has('bukti_pembayaran')) {

                $image = WebHelper::saveImageToPublic($request->file('bukti_pembayaran'), '/picture/pembayaran');
                $tagihan = Pembayaran::where('id', $tagihan_id)->first()->update(
                    [
                        'bukti_pembayaran' => $image,
                    ]
                );
            }
            return redirect()->route('success');
        } else {
            return redirect()->route('login');
        }
    }

    public function editTagihanAdmin(Request $request, $kelas, $student_id, $tagihan_id)
    {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        } else if ($user->roles()->first()->description == 'Full Access') {
            if ($request->has('bukti_pembayaran')) {
                $image = WebHelper::saveImageToPublic($request->file('bukti_pembayaran'), 'picture/pembayaran');
                $tagihan = Pembayaran::where('id', $tagihan_id)->update(
                    [
                        'jenis_tagihan' => $request->jenis_tagihan,
                        'jumlah_tagihan' => $request->jumlah_tagihan,
                        'status' => $request->status,
                        'deskripsi' => $request->deskripsi,
                        'bulan_tagihan' => $request->bulan_tagihan,
                        'bukti_pembayaran' => $image,
                    ]
                );
            } else {
                $tagihan = Pembayaran::where('id', $tagihan_id)->update(
                    [
                        'jenis_tagihan' => $request->jenis_tagihan,
                        'jumlah_tagihan' => $request->jumlah_tagihan,
                        'status' => $request->status,
                        'deskripsi' => $request->deskripsi,
                        'bulan_tagihan' => $request->bulan_tagihan,
                    ]
                );
            }
            return redirect()->route('success');
        } else {
            return redirect()->route('login');
        }
    }

    public function lunaskan(Request $request, $kelas, $student_id, $tagihan_id)
    {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        } else if ($user->roles()->first()->description == 'Full Access') {
            $tagihan = Pembayaran::where('id', $tagihan_id)->first()->update(
                [
                    'status' => 'Lunas',
                ]
            );
            return redirect()->route('success');
        } else {
            return redirect()->route('login');
        }
    }

    public function cancelLunaskan(Request $request, $kelas, $student_id, $tagihan_id)
    {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        } else if ($user->roles()->first()->description == 'Full Access') {
            $tagihan = Pembayaran::where('id', $tagihan_id)->first()->update(
                [
                    'status' => 'Belum Lunas',
                ]
            );
            return redirect()->route('success');
        } else {
            return redirect()->route('login');
        }
    }

    public function deleteTagihan(Request $request, $kelas, $student_id, $tagihan_id)
    {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        } else if ($user->roles()->first()->description == 'Full Access') {
            $tagihan = Pembayaran::where('id', $tagihan_id);
            $tagihan->delete();
        } else {
            return redirect()->route('login');
        }
    }
}
