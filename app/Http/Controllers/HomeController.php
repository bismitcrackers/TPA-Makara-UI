<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $request->user()->authorizeRoles(['Administrator','Staf Administrasi','Koordinator','Wakil Koordinator']);
        return view('dashboard.administratorHome');
    }

    public function fasilitatorHome(Request $request) {
        $request->user()->authorizeRoles(['Fasilitator']);
        return view('dashboard.fasilitatorHome');
    }

    public function teacherHome(Request $request) {
        $request->user()->authorizeRoles(['Guru']);
        return view('dashboard.teacherHome');
    }

    public function cofasilitatorHome(Request $request) {
        $request->user()->authorizeRoles(['Co-fasilitator']);
        return view('dashboard.cofasilitatorHome');
    }

    public function parentHome(Request $request) {
        $request->user()->authorizeRoles(['Orangtua']);
        return view('dashboard.parentHome');
    }
}
