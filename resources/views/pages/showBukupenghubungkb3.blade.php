
@extends('layout/master')

@section('title', 'Homepage')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')


    <div id="showBukuPeng3" class="showbp">

        <h2 class="title">
            BUKU PENGUHUBUNG   
        </h2>

        <div class="row">
            <div id="" class="col-md-4"></div>
                <div id="garis" class="col-md-4"></div>
            <div id="" class="col-md-4"></div>
        </div>
        <h2 class="title title4">
            ASPEK
        </h2>
        <h2 class="title2">KETERANGAN</h2>
        <div class="imgbpkb">
            <img src="{{asset('svg/fisik.svg')}}" alt="gmbrbuku">
        </div>
            aaa
        <h2 class="title2">KETERANGAN</h2>
        <div class="imgbpkb">
            <img src="{{asset('svg/kognitif.svg')}}" alt="gmbrbuku">
        </div>
            aaa
        <h2 class="title2">KETERANGAN</h2>
        <div class="imgbpkb">
            <img src="{{asset('svg/sosial-emosi.svg')}}" alt="gmbrbuku">
        </div>
            aaa
        
        <button type="submit" class="btn btn-primary dcbutton d-flex justify-content-center" >
            NEXT
            <img src="{{asset('svg/nextsign.svg')}}" alt="nextsign">
        </button>

    </div>

@endsection