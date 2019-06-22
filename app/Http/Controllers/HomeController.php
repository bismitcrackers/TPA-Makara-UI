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

    public function teacherHome(Request $request) {
        $request->user()->authorizeRoles(['teacher']);
        return view('dashboard.teacherHome');
    }

    public function headmasterHome(Request $request) {
        $request->user()->authorizeRoles(['headmaster']);
        return view('dashboard.headmasterHome');
    }

    public function parentHome(Request $request) {
        $request->user()->authorizeRoles(['parent']);
        return view('dashboard.parentHome');
    }
}
