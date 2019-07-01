<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Comments;
use App\DailyBook;
use App\Student;
use App\Helper\WebHelper;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index() {
        return view('pages.index');
    }

    public function success() {
        return view('pages.success');
    }

    public function studentsList($class) {
        $role = auth()->user()->roles()->first()->name;
        if ($role == 'Orangtua') {
            return redirect()->route('orangtua.home');
        } else if ($role == 'Co-fasilitator') {
            $kelas = 'DayCare';
        } else if ($role == 'Guru') {
            $kelas = 'KelompokBermain';
        } else {
            $kelas = $class;
        }
        $students = Student::where('kelas', $kelas)->get();
        return view('pages.liststudentkb', ['students' => $students]);
    }

    public function selectMonth($student_id) {
        // $months = DB::table('daily_books')
        //     ->select(DB::raw('YEAR(created_at) year, MONTH(created_at) month, MONTHNAME(created_at) month_name'))
        //     ->groupBy('year')
        //     ->groupBy('month')
        //     ->groupBy('month_name')
        //     ->orderBy('year', 'desc')
        //     ->orderBy('month', 'desc')
        //     ->get();
        $months = WebHelper::getMonthListFromDate(Carbon::parse('first day of January ' . Carbon::now()->year));
        $end = Carbon::today()->startOfMonth()->format('m');
        // return $months;
        return view('pages.bukupenghubungkb', ['months' => $months, 'student_id' => $student_id, 'end' => $end]);
    }

    public function selectDate($student_id, $month, $year) {
        // $dates = DailyBook::whereMonth('created_at', '=', $month)->get();
        $dates = DB::table('daily_books')
            ->select(DB::raw('YEAR(created_at) year, MONTH(created_at) month, MONTHNAME(created_at) month_name, DAY(created_at) day, id'))
            ->where('student_id', '=', $student_id)
            ->whereYear('created_at', '=', $year)
            ->whereMonth('created_at', '=', $month)
            ->groupBy('year')
            ->groupBy('month')
            ->groupBy('month_name')
            ->groupBy('day')
            ->groupBy('id')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->orderBy('day', 'desc')
            ->get();
        return view('pages.bukupenghubungdc', ['dates' => $dates, 'student_id' => $student_id]);
    }

    public function formDailyBook($student_id) {
        return view('pages.createbukupenghubungdc', ['student_id' => $student_id]);
    }

    public function successdc() {
        return view('pages.successdc');
    }

    public function showComments($daily_book_id) {
        $chats = Comments::where('daily_book_id', $daily_book_id)->get();
        return view('pages.komentar', ['chats' => $chats, 'daily_book_id' => $daily_book_id]);
    }

    public function sendComments($daily_book_id) {
        return view('pages.tambahkomentar', ['daily_book_id' => $daily_book_id]);
    }

    public function showbukupenghubungkb(){
        return view('pages.showBukupenghubungkb');
    }

    public function showbukupenghubungkb2(){
        return view('pages.showBukupenghubungkb2');
    }


    public function typeclass() {
        return view('pages.typeclass');
    }

    public function abyanprofile() {
        return view('pages.abyanprofile');
    }
}
