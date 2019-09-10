@extends('layout/master')

@section('title', 'Tagihan Siswa')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

    <div class = "d-flex justify-content-center kwitansi-header">
        <img class = "kwitansi-logo" src="{{ asset('picture/logoTPAM.png')}}" alt="">
        <div>
            <p class = "kwitansi-address">
                Taman Pengembangan Anak Makara
                <br>
                Fakultas Psikologi UI, Depok
                <br>
                Telp. 021 7888 1082/ 
                <br>
                0857 7170 6484
            </p>
        </div>
    </div>


    <div class = "d-flex justify-content-start">
        <h1 class = "kwitansi-title underliner">
            Kwitansi
        </h1>
    </div>

    <div class = "kwitansi-content">
        <p>Sudah diterima dari: Orangtua Abyan</p>
        <br>
        <p>Untuk pembayaran:
            <br>
            1. Uang Pangkal
            <br>
            2. Iuran Bulanan (2 x seminggu)
        </p>
        <br>
        <p>Bulan: Agustus 2019</p>
        <br>
        <p>Jumlah: Rp1.500.000</p>
        <br>
        <p>Status: Lunas</p>
    </div>



    

@endsection

@section('extra-js')


@endsection
