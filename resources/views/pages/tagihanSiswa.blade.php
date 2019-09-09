@extends('layout/master')

@section('title', 'Tagihan Siswa')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <div class = "d-flex justify-content-center">
        <h1 class = "bukupenghubung-title underliner">
            Tagihan Siswa Daycare
        </h1>
    </div>   

    <div class="row justify-content-between">
        <p class="col-2">Nama</p>
        <p class="col-2">Jenis Tagihan</p>
        <p class="col-2">Jumlah Tagihan</p>
        <p class="col-1">Status</p>
        <p class="col-1">Total Tagihan</p>
        <p class="col-1">Bukti Pembayaran</p>
        <p class="col-1">Kwitansi</p>
        <div class="col-2">Kwitansi</div>
    </div>

@endsection

@section('extra-js')

@endsection
