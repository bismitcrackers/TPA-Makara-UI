@extends('layout/master')

@section('title', 'List Student Kelas Bermain - GURU')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

    <div class="d-flex justify-content-center">
        <h1 class = "daftarsiswa-title underliner">
            Daftar Tipe Kelas
        </h1>
    </div>

    <div class="d-flex justify-content-center">
        <div class="d-flex align-items-center">
            <div class="centerer">
                @if($route == 'profile')
                <a class="linkclass" href="{{ route('profile.dc.student') }}">
                @else
                <a class="linkclass" href="{{ route('dailyBook.dc.student') }}">
                @endif
                    <img src="{{asset('picture/daycare.png')}}" alt="daycare">
                    <h1 class="typeclass">Daycare</h1>
                </a>

                @if($route == 'profile')
                <a class="linkclass" href="{{ route('profile.kb.student') }}">
                @else
                <a class="linkclass" href="{{ route('dailyBook.kb.student') }}">
                @endif
                    <img src="{{asset('picture/kelompokbermain.png')}}" alt="kelompok bermain">
                    <h1 class="typeclass">Kelompok Bermain</h1>
                </a>
            </div>
        </div>
    </div>

@endsection

@section('extra-js')

@endsection
