@extends('layout/master')

@section('title', 'List Student Kelas Bermain - GURU')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <h1 class = "daftarsiswa-title">
        Daftar Siswa Daycare
        <div class= "d-flex justify-content-center">
            <div class="underline"></div>
        </div>
    </h1>
    <!-- Search form -->
    <form action="">
        <input class="form-control search-siswa" type="search" placeholder="Cari Siswa Daycare">
    </form>
    <div class="container">
        {{-- minimal 2 --}}
        {{-- font-size dikurangin --}}
        <div class="row justify-content-around">
            <div class="col siswa">
                <a href="">
                    <img src="{{asset('svg/laki.svg')}}" alt="" class= "photosiswa">
                    <p>Abyan Althaf K</p>
                </a>
            </div>
            <div class="col siswa">
                <a href="">
                    <img src="{{asset('svg/laki.svg')}}" alt="" class= "photosiswa">
                    <p>Akhtar Rasyid A</p>
                </a>
            </div>
            <div class="col siswa">
                <a href="">
                    <img src="{{asset('svg/laki.svg')}}" alt="" class= "photosiswa">
                    <p>Akhtar Saka R</p>
                </a>
            </div>
        
            <div class="col siswa">
                <a href="">
                    <img src="{{asset('svg/perempuan.svg')}}" alt="" class= "photosiswa">
                    <p>Anya Radhya T</p>
                </a>
            </div>
            <div class="col siswa">
                <a href="">
                    <img src="{{asset('svg/laki.svg')}}" alt="" class= "photosiswa">
                    <p>Arkha Rayyan S</p>
                </a>
            </div>
            <div class="col siswa">
                <a href="">
                    <img src="{{asset('svg/perempuan.svg')}}" alt="" class= "photosiswa">
                    <p>Arsyad Ahmad M</p>
                </a>
            </div>
            <div class="col siswa">
                <a href="">
                    <img src="{{asset('svg/perempuan.svg')}}" alt="" class= "photosiswa">
                    <p>Arudita Saphira P</p>
                </a>
            </div>
            <div class="col siswa">
                <a href="">
                    <img src="{{asset('svg/perempuan.svg')}}" alt="" class= "photosiswa">
                    <p>Atishalula Atalandra</p>
                </a>
            </div>
            <div class="col siswa">
                <a href="">
                    <img src="{{asset('svg/perempuan.svg')}}" alt="" class= "photosiswa">
                    <p>Aurora Radhya T</p>
                </a>
            </div>
        </div>
        </div>
    </div>


@endsection

@section('extra-js')

@endsection
