<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function index() {
        return view('index');
    }

    // public function test() {
    //     return view('pages.login');
    // }
    public function login(){
        return view('pages.login');
    }

    public function register(){
        return view('pages.register');
    }

    public function success(){
        return view('pages.success');
    }
}
