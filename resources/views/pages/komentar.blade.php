@extends('layout/master')

@section('title', 'Komentar Buku Penghubung Daycare')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <div class="komentar underliner">
            <h2>Bagian Komentar Orang Tua</h2>
            <h2>dengan Pihak TPAM</h2>
        </div>
    </div>

    <div class="righter">
        <div class = "d-inline-flex">
            <div class="dari">
                <p class="namapesan">You1</p>
                <p class="contentpesan">Makin pinter anak saya:)</p>
            </div>
        </div>
    </div>

    <div>
        <div class ="d-inline-flex">
            <div class="ke">
                <p class="namapesandark">Betti</p>
                <p class="contentpesandark">Ya, Bu. Mari kita cetak generasi bangsa :)</p>
            </div>
        </div>
    </div>

    <a href="{{route("tambahkomentar")}}" class="tambahfoto tambahkomentar">
        <img src="{{asset('svg/plus.svg')}}" alt="nextsign">
        <span>Tambah Komentar</span>
    </a>

    <button  onclick="location.reload();" type="button" class="btn btn-primary dcbutton d-flex justify-content-center">
            Done
        <img src="{{asset('svg/nextsign.svg')}}" alt="nextsign">
    </button>    

                    
@endsection
    
@section('extra-js')
    

@endsection