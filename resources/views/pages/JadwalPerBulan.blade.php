@extends('layout/master')

@section('title', 'List Student Kelas Bermain - GURU')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

    <div class="d-flex justify-content-center">
        <h1 class = "daftarsiswa-title underliner">
            Jadwal Per Bulan Daycare
        </h1>
    </div>

    <div style="text-align:center; margin-bottom: 220px;">
        <img src="{{asset('svg/dummypdf.svg')}}" alt="dummypdf">
    </div>

    <div href="" class="tambahpengumuman d-flex justify-content-center">
        <span>Tambah Jadwal</span>
        <img src="{{asset('svg/plus.svg')}}" alt="nextsign">
    </div>

    <div class="d-flex justify-content-center">
        <button type="button" class="btn canceldelete d-flex justify-content-center">
            Delete
        </button>
        <button type="button" class="btn editjadwal d-flex justify-content-center">
            Edit
        </button>
    </div>


@endsection

@section('extra-js')

<script>

</script>

@endsection
