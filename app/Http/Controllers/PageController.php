<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Berita;
use App\Jadwal;
use App\Pengumuman;
use App\Comments;
use App\DailyBook;
use App\Student;
use App\Helper\WebHelper;
use Illuminate\Http\Request;

class PageController extends Controller
{

// MAIN

    public function index() {
        $news = Berita::all();
        return view('pages.Homepage', ['news' => $news]);
    }

    public function success() {
        return view('pages.SuccessMessage');
    }

    public function editProfileSiswa() {
        return view('pages.EditProfileSiswa');
    }

    public function editProfileAyah() {
        return view('pages.EditProfileAyah');
    }

    public function editProfileIbu() {
        return view('pages.EditProfileIbu');
    }

    public function pengumumanKegiatan() {
        return view('pages.pengumumanKegiatan');
    }

    public function ubahPengumuman() {
        return view('pages.UbahPengumuman');
    }

    public function showPengumuman() {
        return view('pages.ShowPengumuman');
    }

    public function jadwalPerBulan() {
        return view('pages.JadwalPerBulan');
    }

    public function tambahJadwalPerBulan() {
        return view('pages.TambahJadwalPerBulan');
    }



// BUKU PENGHUBUNG

    public function selectClassDailyBook() {
        if (auth()->user() == null) {return redirect()->route('login');}
        return view('pages.SelectClass', ['route' => 'dailyBook']);
    }

// BUKU PENGHUBUNG DAY CARE

    public function dayCareStudents() {
        if (auth()->user() == null) {return redirect()->route('login');}
        $role = auth()->user()->roles()->first()->name;
        if ($role == 'Orangtua') {
            return redirect()->route('orangtua.home');
        } else {
            $students = Student::where('kelas', 'Day Care')->orderBy('nama_lengkap')->get();
            return view('pages.SelectStudent', ['students' => $students, 'route' => 'dayCareDailyBook', 'class' => 'Day Care']);
        }
    }

    public function dayCareSelectMonth($student_id) {
        if (auth()->user() == null) {return redirect()->route('login');}
        $months = WebHelper::getMonthListFromDate(Carbon::parse('first day of January ' . Carbon::now()->year));
        $end = Carbon::today()->startOfMonth()->format('m');
        return view('pages.SelectMonthBukuPenghubung', ['months' => $months, 'student_id' => $student_id, 'end' => $end, 'class' => 'Day Care']);
    }

    public function dayCareSelectDate($student_id, $month, $year) {
        if (auth()->user() == null) {return redirect()->route('login');}
        $role = auth()->user()->roles()->first()->name;
        if ($role != 'Orangtua') {
            $dates = DB::table('daily_books')
                ->select(DB::raw('YEAR(tanggal) year, MONTH(tanggal) month, MONTHNAME(tanggal) month_name, DAY(tanggal) day, id, dipublish, dibaca'))
                ->where('student_id', '=', $student_id)
                ->whereYear('tanggal', '=', $year)
                ->whereMonth('tanggal', '=', $month)
                ->groupBy('year')
                ->groupBy('month')
                ->groupBy('month_name')
                ->groupBy('day')
                ->groupBy('id')
                ->groupBy('dibaca')
                ->orderBy('dibaca')
                ->orderBy('year', 'desc')
                ->orderBy('month', 'desc')
                ->orderBy('day', 'desc')
                ->get();
        } else {
            $dates = DB::table('daily_books')
                ->select(DB::raw('YEAR(tanggal) year, MONTH(tanggal) month, MONTHNAME(tanggal) month_name, DAY(tanggal) day, id, dipublish, dibaca'))
                ->where('student_id', '=', $student_id)
                ->where('dipublish', '=', True)
                ->whereYear('tanggal', '=', $year)
                ->whereMonth('tanggal', '=', $month)
                ->groupBy('year')
                ->groupBy('month')
                ->groupBy('month_name')
                ->groupBy('day')
                ->groupBy('id')
                ->groupBy('dibaca')
                ->orderBy('dibaca')
                ->orderBy('year', 'desc')
                ->orderBy('month', 'desc')
                ->orderBy('day', 'desc')
                ->get();
        }

        return view('pages.SelectDateBukuPenghubung', ['dates' => $dates, 'student_id' => $student_id, 'class' => 'Day Care']);
    }

    public function dayCareSelectDateParent($student_id) {
        if (auth()->user() == null) {return redirect()->route('login');}
        $dates = DB::table('daily_books')
            ->select(DB::raw('YEAR(tanggal) year, MONTH(tanggal) month, MONTHNAME(tanggal) month_name, DAY(tanggal) day, id, dibaca'))
            ->where('student_id', '=', $student_id)
            ->where('dipublish', '=', True)
            ->whereYear('tanggal', '<=', Carbon::now()->year)
            ->whereMonth('tanggal', '<=', Carbon::now()->month)
            ->groupBy('year')
            ->groupBy('month')
            ->groupBy('month_name')
            ->groupBy('day')
            ->groupBy('id')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->orderBy('day', 'desc')
            ->orderBy('dibaca')
            ->get();
        return view('pages.SelectDateBukuPenghubung', ['dates' => $dates, 'student_id' => $student_id, 'class' => 'Day Care']);
    }

    public function formDailyBookDayCare($student_id) {
        if (auth()->user() == null) {return redirect()->route('login');}
        return view('pages.CreateBukuPenghubungDayCare', ['student_id' => $student_id, 'class' => 'Day Care', 'route' => 'createDailyBookDC']);
    }

    public function showDailyBookDayCare($student_id, $day, $month, $year){
        if (auth()->user() == null) {return redirect()->route('login');}
        $role = auth()->user()->roles()->first()->name;
        if ($role == 'Orangtua') {
            $dailyBook = DailyBook::where('student_id', '=', $student_id)
                ->whereDay('tanggal', '=', $day)
                ->whereYear('tanggal', '=', $year)
                ->whereMonth('tanggal', '=', $month)
                ->update(['dibaca' => True]);
        }
        $dailyBook = DailyBook::where('student_id', '=', $student_id)
            ->whereDay('tanggal', '=', $day)
            ->whereYear('tanggal', '=', $year)
            ->whereMonth('tanggal', '=', $month)
            ->first();
        // return $dailyBook;
        return view('pages.ShowBukuPenghubungDayCare', ['student_id' => $student_id, 'dailyBook' => $dailyBook]);
    }

    public function reviewDailyBookDayCare($student_id, $day, $month, $year) {
        if (auth()->user() == null) {return redirect()->route('login');}
        $dailyBook = DailyBook::where('student_id', '=', $student_id)
            ->whereDay('tanggal', '=', $day)
            ->whereYear('tanggal', '=', $year)
            ->whereMonth('tanggal', '=', $month)
            ->first();
        return view('pages.CreateBukuPenghubungDayCare',['student_id' => $student_id, 'route' => 'reviewDailyBookDC', 'dailyBook' => $dailyBook, 'route' => 'reviewDailyBookDC']);
    }

// BUKU PENGUHUBUNG KELOMPOK BERMAIN

    public function kelompokBermainStudents() {
        if (auth()->user() == null) {return redirect()->route('login');}
        $role = auth()->user()->roles()->first()->name;
        if ($role == 'Orangtua') {
            return redirect()->route('orangtua.home');
        } else {
            $students = Student::where('kelas', 'Kelompok Bermain')->orderBy('nama_lengkap')->get();
            return view('pages.SelectStudent', ['students' => $students, 'route' => 'kelompokBermainDailyBook', 'class' => 'Kelompok Bermain']);
        }
    }

    public function kelompokBermainSelectMonth($student_id) {
        if (auth()->user() == null) {return redirect()->route('login');}
        $months = WebHelper::getMonthListFromDate(Carbon::parse('first day of January ' . Carbon::now()->year));
        $end = Carbon::today()->startOfMonth()->format('m');
        return view('pages.SelectMonthBukuPenghubung', ['months' => $months, 'student_id' => $student_id, 'end' => $end, 'class' => 'Kelompok Bermain']);
    }

    public function kelompokBermainSelectDate($student_id, $month, $year) {
        if (auth()->user() == null) {return redirect()->route('login');}
        $role = auth()->user()->roles()->first()->name;
        if ($role != 'Orangtua') {
            $dates = DB::table('daily_books')
                ->select(DB::raw('YEAR(tanggal) year, MONTH(tanggal) month, MONTHNAME(tanggal) month_name, DAY(tanggal) day, id, dipublish, dibaca'))
                ->where('student_id', '=', $student_id)
                ->whereYear('tanggal', '=', $year)
                ->whereMonth('tanggal', '=', $month)
                ->groupBy('year')
                ->groupBy('month')
                ->groupBy('month_name')
                ->groupBy('day')
                ->groupBy('id')
                ->groupBy('dibaca')
                ->orderBy('dibaca')
                ->orderBy('year', 'desc')
                ->orderBy('month', 'desc')
                ->orderBy('day', 'desc')
                ->get();
        } else {
            $dates = DB::table('daily_books')
                ->select(DB::raw('YEAR(tanggal) year, MONTH(tanggal) month, MONTHNAME(tanggal) month_name, DAY(tanggal) day, id, dipublish, dibaca'))
                ->where('student_id', '=', $student_id)
                ->where('dipublish', '=', True)
                ->whereYear('tanggal', '=', $year)
                ->whereMonth('tanggal', '=', $month)
                ->groupBy('year')
                ->groupBy('month')
                ->groupBy('month_name')
                ->groupBy('day')
                ->groupBy('id')
                ->groupBy('dibaca')
                ->orderBy('dibaca')
                ->orderBy('year', 'desc')
                ->orderBy('month', 'desc')
                ->orderBy('day', 'desc')
                ->get();
        }
        return view('pages.SelectDateBukuPenghubung', ['dates' => $dates, 'student_id' => $student_id, 'class' => 'Kelompok Bermain']);
    }

    public function kelompokBermainSelectDateParent($student_id) {
        if (auth()->user() == null) {return redirect()->route('login');}
        $dates = DB::table('daily_books')
            ->select(DB::raw('YEAR(tanggal) year, MONTH(tanggal) month, MONTHNAME(tanggal) month_name, DAY(tanggal) day, id, dibaca'))
            ->where('student_id', '=', $student_id)
            ->where('dipublish', '=', True)
            ->whereYear('tanggal', '<=', Carbon::now()->year)
            ->whereMonth('tanggal', '<=', Carbon::now()->month)
            ->groupBy('year')
            ->groupBy('month')
            ->groupBy('month_name')
            ->groupBy('day')
            ->groupBy('id')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->orderBy('day', 'desc')
            ->orderBy('dibaca')
            ->get();
        return view('pages.SelectDateBukuPenghubung', ['dates' => $dates, 'student_id' => $student_id, 'class' => 'Kelompok Bermain']);
    }

    public function formDailyBookKelompokBermain($student_id) {
        if (auth()->user() == null) {return redirect()->route('login');}
        return view('pages.CreateBukuPenghubungKelompokBermain', ['student_id' => $student_id, 'route' => 'createDailyBookKB']);
    }

    public function showDailyBookKelompokBermain($student_id, $day, $month, $year){
        if (auth()->user() == null) {return redirect()->route('login');}
        $role = auth()->user()->roles()->first()->name;
        if ($role == 'Orangtua') {
            $dailyBook = DailyBook::where('student_id', '=', $student_id)
                ->whereDay('tanggal', '=', $day)
                ->whereYear('tanggal', '=', $year)
                ->whereMonth('tanggal', '=', $month)
                ->update(['dibaca' => True]);
        }
        $dailyBook = DailyBook::where('student_id', '=', $student_id)
            ->whereDay('tanggal', '=', $day)
            ->whereYear('tanggal', '=', $year)
            ->whereMonth('tanggal', '=', $month)
            ->first();
        return view('pages.ShowBukuPenghubungKelompokBermain', ['student_id' => $student_id, 'dailyBook' => $dailyBook]);
    }

    public function reviewDailyBookKelompokBermain($student_id, $day, $month, $year) {
        if (auth()->user() == null) {return redirect()->route('login');}
        $dailyBook = DailyBook::where('student_id', '=', $student_id)
            ->whereDay('tanggal', '=', $day)
            ->whereYear('tanggal', '=', $year)
            ->whereMonth('tanggal', '=', $month)
            ->first();
        return view('pages.CreateBukuPenghubungKelompokBermain', ['student_id' => $student_id, 'route' => 'reviewDailyBookKB', 'dailyBook' => $dailyBook]);
    }

// EDIT PROFILE

    public function selectClassProfile() {
        if (auth()->user() == null) {return redirect()->route('login');}
        return view('pages.SelectClass', ['route' => 'profile']);
    }

    public function studentsProfileDayCare() {
        // $role = auth()->user()->roles()->first()->description;
        // if ($role != 'Full Access') {
        //     return redirect()->route('index');
        // } else {
        if (auth()->user() == null) {return redirect()->route('login');}
        $students = Student::where('kelas', 'Day Care')->orderBy('nama_lengkap')->get();
        return view('pages.SelectStudent', ['students' => $students, 'route' => 'dayCareProfile', 'class' => 'Day Care']);
        // }
    }

    public function studentsProfileKelompokBermain() {
        // $role = auth()->user()->roles()->first()->description;
        // if ($role != 'Full Access') {
        //     return redirect()->route('index');
        // } else {
        if (auth()->user() == null) {return redirect()->route('login');}
        $students = Student::where('kelas', 'Kelompok Bermain')->orderBy('nama_lengkap')->get();
        return view('pages.SelectStudent', ['students' => $students, 'route' => 'kelompokBermainProfile', 'class' => 'Kelompok Bermain']);
        // }
    }

    public function profileDetails($student_id) {
        if (auth()->user() == null) {return redirect()->route('login');}
        $student = Student::where('id', $student_id)->first();
        $dad = $student->user()->first()->parents()->where('peran', 'Ayah')->first();
        $mom = $student->user()->first()->parents()->where('peran', 'Ibu')->first();
        $pengumuman = Pengumuman::where('kelas', $student->kelas)->where('jenis', 'Pengumuman')->get();
        $agenda = Pengumuman::where('kelas', $student->kelas)->where('jenis', 'Agenda Kegiatan')->get();
        $schedule = Jadwal::where('kelas', $student->kelas)->first();
        return view('pages.StudentProfile', ['student' => $student, 'dad' => $dad, 'mom' => $mom,'pengumuman' => $pengumuman, 'agenda' => $agenda, 'schedule' => $schedule]);
    }

// COMMENTS

    public function showComments($daily_book_id) {
        if (auth()->user() == null) {return redirect()->route('login');}
        $chats = Comments::where('daily_book_id', $daily_book_id)->get();
        return view('pages.ShowBukuPenghubungComments', ['chats' => $chats, 'daily_book_id' => $daily_book_id]);
    }

    public function sendComments($daily_book_id) {
        if (auth()->user() == null) {return redirect()->route('login');}
        return view('pages.PostBukuPenghubungComments', ['daily_book_id' => $daily_book_id]);
    }

// SCHEDULE

    public function scheduleForm($kelas) {
        if (auth()->user() == null) {return redirect()->route('login');}
        $schedule = Jadwal::where('kelas', $kelas)->first();
        return view('pages.TambahJadwalPerBulan', ['kelas' => $kelas, 'schedule' => $schedule]);
    }

    public function scheduleList($kelas) {
        if (auth()->user() == null) {return redirect()->route('login');}
        $schedule = Jadwal::where('kelas', $kelas)->first();
        return view('pages.JadwalPerBulan', ['kelas' => $kelas, 'schedule' => $schedule]);
    }

// PENGUMUMAN

    public function pengumumanList($kelas) {
        if (auth()->user() == null) {return redirect()->route('login');}
        if (auth()->user()->roles()->first()->description != 'Full Access') {return redirect()->route('login');}
        $pengumuman = Pengumuman::where('kelas', $kelas)->where('jenis', 'Pengumuman')->get();
        $agenda = Pengumuman::where('kelas', $kelas)->where('jenis', 'Agenda Kegiatan')->get();
        return view('pages.pengumumanKegiatan', ['kelas' => $kelas, 'pengumuman' => $pengumuman, 'agenda' => $agenda]);
    }

    public function addPengumuman($kelas) {
        if (auth()->user() == null) {return redirect()->route('login');}
        if (auth()->user()->roles()->first()->description != 'Full Access') {return redirect()->route('login');}
        return view('pages.ubahPengumuman', ['kelas' => $kelas, 'route' => 'add']);
    }

    public function editPengumuman($kelas, $id) {
        if (auth()->user() == null) {return redirect()->route('login');}
        if (auth()->user()->roles()->first()->description != 'Full Access') {return redirect()->route('login');}
        $pengumuman = Pengumuman::where('id', $id)->first();
        return view('pages.UbahPengumuman', ['kelas' => $kelas, 'route' => 'edit', 'pengumuman' => $pengumuman]);
    }

    public function seePengumuman($kelas, $id) {
        if (auth()->user() == null) {return redirect()->route('login');}
        $pengumuman = Pengumuman::where('id', $id)->first();
        return view('pages.ShowPengumuman', ['kelas' => $kelas, 'pengumuman' => $pengumuman]);
    }

}
