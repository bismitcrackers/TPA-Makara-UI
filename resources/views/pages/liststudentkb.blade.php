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
            @foreach($students as $student)
            <div class="col siswa">
                <a href="{{ route('dailyBook.month', ['student_id' => $student->id]) }}">
                    <img src="{{asset('svg/laki.svg')}}" alt="" class= "photosiswa">
                    <p>{{ $student->nama_lengkap }}</p>
                </a>
            </div>
            @endforeach
        </div>
        </div>
    </div>


@endsection

@section('extra-js')

@endsection
