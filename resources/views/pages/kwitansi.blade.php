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
        <p>Sudah diterima dari: Orangtua {{ $student->nama_lengkap }}</p>
        <br>
        <p>Untuk pembayaran:
            <?php $i = 1; ?>
            @foreach($allTagihan as $eachTagihan)
            <br>
            {{ $i }}. {{ $eachTagihan->jenis_tagihan }}
            <?php $i = $i + 1; ?>
            @endforeach
        </p>
        <br>
        <p>Bulan: {{ $tagihan->bulan_tagihan }}</p>
        <br>
        <p>Jumlah: Rp{{ number_format((float)$totalTagihan,2,',','.') }}</p>
        <br>
        <p>Status: Lunas</p>
    </div>

    <div align="right">
        <img width="200px" src="{{ asset('picture/tandaTangan/ttd.png') }}">
        @if(auth()->user()->roles()->first()->description == 'Full Access')
            <form action="{{ route('admin.ganti.ttd') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <label for="file-ttd">Upload Only PNG</label>
                <input type="file" name="ttd" id="file-ttd">
                <button type="submit" class="btn btn-primary" style="border-radius:50%;" id = "final-button">
                    ✎
                </button>
            </form>
        @endif
    </div>



@endsection

@section('extra-js')


@endsection
