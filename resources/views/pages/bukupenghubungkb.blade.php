@extends('layout/master')

@section('title', 'Buku Penghubung Kelas Bermain')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <h1 class = "bukupenghubung-title">
        Buku Penghubung
        <div class= "d-flex justify-content-center">
            <div class="underline"></div>
        </div>
    </h1>

    <!-- Search form -->
    <form class="md-form form-sm mt-0 search-bukbul">
        <i class="fas fa-search opacitydown inline ml-2" aria-hidden="true"></i>
        <input class="form-control sizer form-control-sm ml-2 border-bottom-0 inline" type="text" placeholder="Search book" aria-label="Search">
    </form>
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-sm bukbul">
                <a href="">
                    <img src="{{asset('svg/bukbul.svg')}}" alt="" class= "photobukbul">
                    <p>Januari 2019</p>
                </a>
            </div>
            <div class="col-sm bukbul">
                <a href="">
                    <img src="{{asset('svg/bukbul.svg')}}" alt="" class= "photobukbul">
                    <p>Februari 2019</p>
                </a>
            </div>
            <div class="col-sm bukbul">
                <a href="">
                    <img src="{{asset('svg/bukbul.svg')}}" alt="" class= "photobukbul">
                    <p>Maret 2019</p>
                </a>
            </div>
        </div>
        <div class="row justify-content-around">
            <div class="col-sm bukbul">
                <a href="">
                    <img src="{{asset('svg/bukbul.svg')}}" alt="" class= "photobukbul">
                    <p>April 2019</p>
                </a>
            </div>
            <div class="col-sm bukbul">
                <a href="">
                    <img src="{{asset('svg/bukbul.svg')}}" alt="" class= "photobukbul">
                    <p>Mei 2019</p>
                </a>
            </div>
            <div class="col-sm bukbul">
                <a href="">
                    <img src="{{asset('svg/bukbul.svg')}}" alt="" class= "photobukbul">
                    <p>Juni 2019</p>
                </a>
            </div>
        </div>
        <div class="row justify-content-around">
            <div class="col-sm bukbul">
                <a href="">
                    <img src="{{asset('svg/bukbul.svg')}}" alt="" class= "photobukbul">
                    <p>Juli 2019</p>
                </a>
            </div>
            <div class="col-sm bukbul">
                <a href="">
                    <img src="{{asset('svg/bukbul.svg')}}" alt="" class= "photobukbul">
                    <p>Agustus 2019</p>
                </a>
            </div>
            <div class="col-sm bukbul">
                <a href="">
                    <img src="{{asset('svg/bukbul.svg')}}" alt="" class= "photobukbul">
                    <p>September 2019</p>
                </a>
            </div>
        </div>
        <div class="row justify-content-around">
            <div class="col-sm bukbul">
                <a href="">
                    <img src="{{asset('svg/bukbul.svg')}}" alt="" class= "photobukbul">
                    <p>Oktober 2019</p>
                </a>
            </div>
            <div class="col-sm bukbul">
                <a href="">
                    <img src="{{asset('svg/bukbul.svg')}}" alt="" class= "photobukbul">
                    <p>November 2019</p>
                </a>
            </div>
            <div class="col-sm bukbul">
                <a href="">
                    <img src="{{asset('svg/bukbul.svg')}}" alt="" class= "photobukbul">
                    <p>Desember 2019</p>
                </a>
            </div>
        </div>
    </div>


@endsection

@section('extra-js')

@endsection
