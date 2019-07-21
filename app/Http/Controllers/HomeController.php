<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use DB;

class HomeController extends Controller
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

    public function administratorHome(Request $request) {
        if (auth()->user() == null) {return redirect()->route('login');}
        $news = Berita::orderBy('created_at','updated_at')->paginate(3);
        $request->user()->authorizeRoles(['Administrator','Staf Administrasi','Koordinator','Wakil Koordinator']);
        return view('dashboard.administratorHome', ['news' => $news]);
    }

    public function fasilitatorHome(Request $request) {
        if (auth()->user() == null) {return redirect()->route('login');}
        $news = Berita::orderBy('created_at','updated_at')->paginate(3);
        $request->user()->authorizeRoles(['Fasilitator']);
        return view('dashboard.fasilitatorHome', ['news' => $news]);
    }

    public function teacherHome(Request $request) {
        if (auth()->user() == null) {return redirect()->route('login');}
        $news = Berita::orderBy('created_at','updated_at')->paginate(3);
        $request->user()->authorizeRoles(['Guru']);
        return view('dashboard.teacherHome', ['news' => $news]);
    }

    public function cofasilitatorHome(Request $request) {
        if (auth()->user() == null) {return redirect()->route('login');}
        $news = Berita::orderBy('created_at','updated_at')->paginate(3);
        $request->user()->authorizeRoles(['Co-fasilitator']);
        return view('dashboard.cofasilitatorHome', ['news' => $news]);
    }

    public function parentHome(Request $request) {
        if (auth()->user() == null) {return redirect()->route('login');}
        $news = Berita::orderBy('created_at','updated_at')->paginate(3);
        $request->user()->authorizeRoles(['Orangtua']);
        return view('dashboard.parentHome', ['news' => $news]);
    }
}
