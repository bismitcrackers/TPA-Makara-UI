
@extends('layout/master')

@section('title', 'Homepage')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')


    <div id="showBukuPeng2" class="showbp">

        <h2 class="title">
            BUKU PENGUHUBUNG   
        </h2>

        <div class="row">
            <div id="" class="col-md-4"></div>
                <div id="garis" class="col-md-4"></div>
            <div id="" class="col-md-4"></div>
        </div>
        <h2 class="title title4">
            CATATAN   
        </h2>
        <h2 class="title2">SNACK</h2>
            aaa
        <h2 class="title2">MAKAN SIANG</h2>
            aaa
        <h2 class="title2">TIDUR SIANG</h2>
            aaa
        <h2 class="title title4">CATATAN KHUSUS</h2>
            aaa
        <h2 class="title title4">
            LAMPIRAN
        </h2>
        
        <div class="imgbpkb">
            <img src="" alt="gmbrbuku">
        </div>

        <button type="submit" class="btn btn-primary dcbutton d-flex justify-content-center" >
            Done    
            <img src="{{asset('svg/nextsign.svg')}}" alt="nextsign">
        </button>

    </div>

@endsection