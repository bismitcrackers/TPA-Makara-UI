
@extends('layout/master')

@section('title', 'Homepage')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')


    <div id="showBukuPeng">
        <h2 class="title">
            BUKU PENGUHUBUNG   
        </h2>
        <div class="row">
            <div id="" class="col-md-4"></div>
                <div id="garis" class="col-md-4"></div>
            <div id="" class="col-md-4"></div>
        </div>
        <div class="dcinput">
            <h2 class="title2">PEMBUAT</h2>
                aaa
            <h2 class="title2">TANGGAL</h2>
                aaa
            <h2 class="title2">TEMA</h2>
                aaa
            <h2 class="title2">SUBTEMA</h2>
                aaa
        </div>
        <button type="submit" class="btn btn-primary dcbutton d-flex justify-content-center" >
            Next
            <img src="{{asset('svg/nextsign.svg')}}" alt="nextsign">
        </button>
    </div>

@endsection