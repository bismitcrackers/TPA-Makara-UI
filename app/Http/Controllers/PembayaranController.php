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

    public function addTagihan(Request $request, $student_id)
    {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        } else if ($user->roles()->first()->description == 'Full Access') {
            $student = Student::where('id', $student_id)->first();

            $tagihan = new Pembayaran;
            $tagihan->jenis_tagihan = $request->jenis_tagihan;
            $tagihan->jumlah_tagihan = $request->jumlah_tagihan;
            $tagihan->status = "Belum Lunas";
            $tagihan->total_tagihan->$request->total_tagihan;
            $student->pembayaran()->save($tagihan);
            return redirect()->route('success');
        } else {
            return redirect()->route('login');
        }
    }

    public function editTagihan(Request $request, $student_id, $tagihan_id)
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
        }
    }

    public function editTagihanAdmin(Request $request, $student_id, $tagihan_id)
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
                        'total_tagihan' => $request->total_tagihan,
                        'bukti_pembayaran' => $image,
                    ]
                );
            }
        }
    }

    public function changeStatus(Request $request, $student_id, $tagihan_id)
    {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        } else if ($user->roles()->first()->description == 'Full Access') {
            $tagihan = Pembayaran::where('id', $tagihan_id);
            if ($tagihan->status == "Belum Lunas") {
                $tagihan->status = "Lunas";
            } else {
                $tagihan->status = "Belum Lunas";
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function deleteTagihan(Request $request, $student_id, $tagihan_id)
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
