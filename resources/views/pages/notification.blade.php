@extends('layout/master')

@section('title', 'Tagihan Siswa')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

    <div class = "d-flex justify-content-start">
        <h1 class = "kwitansi-title underliner">
            Notifications
        </h1>
    </div>

    <ul class="list-group">
        <li class="list-group-item list-group-item-success">A simple info list group item</li>
        <li class="list-group-item">Dapibus ac facilisis in</li>
        <li class="list-group-item">Dapibus ac facilisis in</li>
    </ul>

@endsection

@section('extra-js')

@endsection
