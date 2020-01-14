<?php

namespace App\Http\Controllers;

use App\Comments;
use App\DailyBook;
use App\Student;
use App\Helper\WebHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DailyBooksController extends Controller
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

    public function addDailyBooksDayCare(Request $request, $student_id)
    {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        } else if ($user->roles()->first()->name == 'Orangtua') {
            return redirect()->route('orangtua.home');
        } else {
            $student = Student::where('id', $student_id)->first();
            if ($request->has('lampiran')) {
                $image = WebHelper::saveImageToPublic($request->file('lampiran'), '/picture/daily_books');
            }
            $tanggal = WebHelper::getValidatedDate($request->tanggal);
            $dailyBook = new DailyBook;
            $dailyBook->pembuat             = $request->pembuat;
            $dailyBook->tanggal             = $tanggal;
            $dailyBook->tema                = $request->tema;
            $dailyBook->subtema             = $request->subtema;
            $dailyBook->snack               = $request->snack;
            $dailyBook->keterangan_fisik    = $request->keteranganFisik;
            $dailyBook->keterangan_kognitif = $request->keteranganKognitif;
            $dailyBook->keterangan_sosial   = $request->keteranganSosial;
            $dailyBook->makan_siang         = $request->makanSiang;
            $dailyBook->tidur_siang         = $request->tidurSiang;
            $dailyBook->catatan_khusus      = $request->catatanKhusus;
            if ($request->has('lampiran')) {
                $dailyBook->url_lampiran    = $image;
            }
            $dailyBook->kelas               = 'Day Care';
            $dailyBook->dibaca              = False;
            $dailyBook->dipublish           = False;
            $student->dailyBook()->save($dailyBook);

            // $user_id = Student::where('id', $student_id)->first()->user_id;
            // $notificationMessage = ', telah menambahkan Buku Penghubung untuk siswa ' . $student->nama_lengkap . '! :)';
            // $notificationUrl = 'dailyBook/DayCare/' . $student_id . '/show/' . $tanggal->day . '/' . $tanggal->month . '/' . $tanggal->year;
            // NotificationController::generateNotificationToSpecificUser($user->name, $notificationMessage, $user_id, $notificationUrl);

            return redirect()->route('successAndRedirect', ['url' => route('dailyBook.dc.student')]);
        }
    }

    public function addDailyBooksKelompokBermain(Request $request, $student_id)
    {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        } else if ($user->roles()->first()->name == 'Orangtua') {
            return redirect()->route('orangtua.home');
        } else {
            $student = Student::where('id', $student_id)->first();
            if ($request->has('lampiran')) {
                $image = WebHelper::saveImageToPublic($request->file('lampiran'), '/picture/daily_books');
            }
            $tanggal = WebHelper::getValidatedDate($request->tanggal);
            $dailyBook = new DailyBook;
            $dailyBook->pembuat             = $request->pembuat;
            $dailyBook->tanggal             = $tanggal;
            $dailyBook->tema                = $request->tema;
            $dailyBook->subtema             = $request->subtema;
            $dailyBook->kegiatan            = $request->kegiatan;
            $dailyBook->catatan_khusus      = $request->catatanKhusus;
            if ($request->has('lampiran')) {
                $dailyBook->url_lampiran        = $image;
            }
            $dailyBook->kelas               = 'Kelompok Bermain';
            $dailyBook->dibaca              = False;
            $dailyBook->dipublish           = False;
            $student->dailyBook()->save($dailyBook);

            // $user_id = Student::where('id', $student_id)->first()->user_id;
            // $notificationMessage = ', telah menambahkan Buku Penghubung untuk siswa ' . $student->nama_lengkap . '! :)';
            // $notificationUrl = 'dailyBook/KelompokBermain/' . $student_id . '/show/' . $tanggal->day . '/' . $tanggal->month . '/' . $tanggal->year;
            // NotificationController::generateNotificationToSpecificUser($user->name, $notificationMessage, $user_id, $notificationUrl);

            return redirect()->route('successAndRedirect', ['url' => route('dailyBook.kb.student')]);
        }
    }

    public function publishDailyBookDayCare(Request $request, $student_id, $dailyBook)
    {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        } else if ($user->roles()->first()->name == 'Orangtua') {
            return redirect()->route('orangtua.home');
        } else {
            // $student = Student::where('id', $student_id)->first();
            if ($request->has('lampiran')) {
                $image = WebHelper::saveImageToPublic($request->file('lampiran'), '/picture/daily_books');
                $dailyBook = DailyBook::where('id', $dailyBook)->update(
                    [
                        'pembuat'             => $request->pembuat,
                        'tanggal'             => $request->tanggal,
                        'tema'                => $request->tema,
                        'subtema'             => $request->subtema,
                        'snack'               => $request->snack,
                        'keterangan_fisik'    => $request->keteranganFisik,
                        'keterangan_kognitif' => $request->keteranganKognitif,
                        'keterangan_sosial'   => $request->keteranganSosial,
                        'makan_siang'         => $request->makanSiang,
                        'tidur_siang'         => $request->tidurSiang,
                        'catatan_khusus'      => $request->catatanKhusus,
                        'url_lampiran'        => $image,
                        'kelas'               => 'Day Care',
                        'dipublish'           => True,
                    ]
                );
            } else {
                $dailyBook = DailyBook::where('id', $dailyBook)->update(
                    [
                        'pembuat'             => $request->pembuat,
                        'tanggal'             => $request->tanggal,
                        'tema'                => $request->tema,
                        'subtema'             => $request->subtema,
                        'snack'               => $request->snack,
                        'keterangan_fisik'    => $request->keteranganFisik,
                        'keterangan_kognitif' => $request->keteranganKognitif,
                        'keterangan_sosial'   => $request->keteranganSosial,
                        'makan_siang'         => $request->makanSiang,
                        'tidur_siang'         => $request->tidurSiang,
                        'catatan_khusus'      => $request->catatanKhusus,
                        'kelas'               => 'Day Care',
                        'dipublish'           => True,
                    ]
                );
            }
            // $student->dailyBook()->save($dailyBook);
            $tanggal = WebHelper::getValidatedDate($request->tanggal);
            $student = Student::where('id', $student_id)->first();
            $notificationMessage = ', telah mempublikasikan Buku Penghubung untuk siswa ' . $student->nama_lengkap . '! :)';
            $notificationUrl = 'dailyBook/DayCare/' . $student_id . '/show/' . $tanggal->day . '/' . $tanggal->month . '/' . $tanggal->year;
            NotificationController::generateNotificationToSpecificUser($user->roles()->first()->name, $notificationMessage, $student->user_id, $notificationUrl);

            return redirect()->route('successAndRedirect', ['url' => route('dailyBook.dc.student')]);
        }
    }

    public function publishDailyBookKelompokBermain(Request $request, $student_id, $dailyBook)
    {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        } else if ($user->roles()->first()->name == 'Orangtua') {
            return redirect()->route('orangtua.home');
        } else {
            // $student = Student::where('id', $student_id)->first();
            if ($request->has('lampiran')) {
                $image = WebHelper::saveImageToPublic($request->file('lampiran'), '/picture/daily_books');
                $dailyBook = DailyBook::where('id', $dailyBook)->update(
                    [
                        'pembuat'             => $request->pembuat,
                        'tanggal'             => $request->tanggal,
                        'tema'                => $request->tema,
                        'subtema'             => $request->subtema,
                        'kegiatan'            => $request->kegiatan,
                        'catatan_khusus'      => $request->catatanKhusus,
                        'kelas'               => 'Kelompok Bermain',
                        'url_lampiran'        => $image,
                        'dipublish'           => True,
                    ]
                );
            } else {
                $dailyBook = DailyBook::where('id', $dailyBook)->update(
                    [
                        'pembuat'             => $request->pembuat,
                        'tanggal'             => $request->tanggal,
                        'tema'                => $request->tema,
                        'subtema'             => $request->subtema,
                        'kegiatan'            => $request->kegiatan,
                        'catatan_khusus'      => $request->catatanKhusus,
                        'kelas'               => 'Kelompok Bermain',
                        'dipublish'           => True,
                    ]
                );
            }
            // $student->dailyBook()->save($dailyBook);
            $tanggal = WebHelper::getValidatedDate($request->tanggal);
            $student = Student::where('id', $student_id)->first();
            $notificationMessage = ', telah mempublikasikan Buku Penghubung untuk siswa ' . $student->nama_lengkap . '! :)';
            $notificationUrl = 'dailyBook/KelompokBermain/' . $student_id . '/show/' . $tanggal->day . '/' . $tanggal->month . '/' . $tanggal->year;
            NotificationController::generateNotificationToSpecificUser($user->roles()->first()->name, $notificationMessage, $student->user_id, $notificationUrl);

            return redirect()->route('successAndRedirect', ['url' => route('dailyBook.kb.student')]);
        }
    }

    // public function isRead($student_id, $dailyBook)
    // {
    //     // $student = Student::where('id', $student_id)->first();
    //     $dailyBook->dibaca           = True;
    //     $dailyBook->save();
    //     // $student->dailyBook()->save($dailyBook);
    //     return redirect()->route('orangtua.home');
    // }

    public function addComments (Request $request, $daily_book_id)
    {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        } else {
            $comment = new Comments;
            $comment->message = $request->message;
            $comment->user()->associate($user);
            $comment->dailyBook()->associate($daily_book_id);
            $comment->save();

            if ($user->roles()->first()->name == 'Orangtua') {
                $student = Student::where('user_id', $user->id)->first();
                $notificationMessage = ', telah menambahkan komentar untuk Buku Penghubung siswa ' . $student->nama_lengkap . '! :)';
                $notificationUrl = 'dailyBook/' . $daily_book_id . '/comments/show';
                NotificationController::generateNotificationFromParent('Orangtua ' . $user->name, $notificationMessage, $notificationUrl);
            } else {
                $student_id = DailyBook::where('id', $daily_book_id)->first()->student_id;
                $student = Student::where('id', $student_id)->first();
                $user_id = $student->user_id;
                $notificationMessage = ', telah menambahkan komentar untuk Buku Penghubung siswa ' . $student->nama_lengkap . '! :)';
                $notificationUrl = 'dailyBook/' . $daily_book_id . '/comments/show';
                NotificationController::generateNotificationToSpecificUser($user->roles()->first()->name, $notificationMessage, $user_id, $notificationUrl);
            }
            return redirect()->route('successAndRedirect', ['url' => route('dailyBook.comments.show', ['daily_book_id' => $daily_book_id])]);
        }
    }
}
