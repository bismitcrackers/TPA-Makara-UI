@extends('layout/master')

@section('title', 'Berita')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <h1 class = "bukupenghubung-title underliner">
            {{ $news->judul }}
        </h1>
    </div>
    <div class = "pengumuman-show">
        <div class="imgbpkb">
            <img src="{{ asset($news->gambar) }}" alt="please insert image">
        </div>
        <br>
        <p class="kegiatan-field-answer" id="judul">
            {{ $news->isi }}
        </p>
    </div>
@endsection

@section('extra-js')

@endsection
