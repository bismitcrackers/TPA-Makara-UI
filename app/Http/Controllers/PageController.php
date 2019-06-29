<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index() {
        return view('pages.index');
    }

    public function success() {
        return view('pages.success');
    }

    public function liststudentkb() {
        return view('pages.liststudentkb');
    }

    public function bukupenghubungkb() {
        return view('pages.bukupenghubungkb');
    }

    public function bukupenghubungdc() {
        return view('pages.bukupenghubungdc');
    }

    public function createbukupenghubungdc() {
        return view('pages.createbukupenghubungdc');
    }

    public function successdc() {
        return view('pages.successdc');
    }

    public function komentar() {
        return view('pages.komentar');
    }

    public function tambahkomentar() {
        return view('pages.tambahkomentar');
    }

    public function typeclass() {
        return view('pages.typeclass');
    }

    public function abyanprofile() {
        return view('pages.abyanprofile');
    }
    
}
