@extends('layout/master')

@section('title', 'Create Buku Kelompok Bermain')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

    <div class="d-flex justify-content-center">
        <h1 class = "bukupenghubung-title underliner">
            Buku Penghubung
        </h1>
    </div>
        <div class="tab">
            <div class="row">
                <div id="" class="col-md-4"></div>
                    <div id="garis" class="col-md-4"></div>
                <div id="" class="col-md-4"></div>
            </div>
            <div class="dcinput">
                <h2 class="title2">PEMBUAT</h2>
                    {{ $dailyBook->pembuat }}
                <h2 class="title2">TANGGAL</h2>
                    {{ $dailyBook->tanggal }}
                <h2 class="title2">TEMA</h2>
                    {{ $dailyBook->tema }}
                <h2 class="title2">SUBTEMA</h2>
                    {{ $dailyBook->subtema }}
            </div>
            <button type="button" class="btn btn-primary dcbutton d-flex justify-content-center" onclick = "nextPrev(1)">
                Next
                <img src="{{asset('svg/nextsign.svg')}}" alt="nextsign">
            </button>
        </div>
        <div class="tab">
            <h2 class="subbukupenghubung-title"><u>CATATAN</u></h2>
            {{ $dailyBook->kegiatan }}
            <h2 class="subbukupenghubung-title"><u>CATATAN KHUSUS</u></h2>
            {{ $dailyBook->catatan_khusus }}
            <h2 class="subbukupenghubung-title"><u>LAMPIRAN</u></h2>
            <div class="imgbpkb">
                <img src="{{ asset($dailyBook->url_lampiran) }}" alt="please insert image">
            </div>
            @if(auth()->user()->roles()->first()->name == 'Orangtua')
            <a href="{{ route('orangtua.home') }}">
            @elseif(auth()->user()->roles()->first()->name == 'Co-fasilitator')
            <a href="{{ route('cofasilitator.home') }}">
            @elseif(auth()->user()->roles()->first()->name == 'Guru')
            <a href="{{ route('guru.home') }}">
            @elseif(auth()->user()->roles()->first()->name == 'Fasilitator')
            <a href="{{ route('fasilitator.home') }}">
            @elseif(auth()->user()->roles()->first()->description == 'Full Access')
            <a href="{{ route('admin.home') }}">
            @endif
            <button type="button" class="btn btn-primary dcbutton d-flex justify-content-center">
                    Done
                <img src="{{asset('svg/nextsign.svg')}}" alt="nextsign">
            </button>
        </a>
        </div>

@endsection
@section('extra-js')

    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        (document.getElementsByClassName("tab"))[currentTab].style.transform = "scale(1,1)";
        (document.getElementsByClassName("tab"))[currentTab].style.height = "100%";

        function nextPrev(n) {
            var x = document.getElementsByClassName("tab");
            x[currentTab].style.display = "none";
            currentTab += n;
            console.log(currentTab);
            x[currentTab].style.transform = "scale(1,1)";
            x[currentTab].style.height = "100%";

        }

        function burninput(event){
            $("#inputfile").click();
        }

        $( function() {
            $( "#datepicker" ).datepicker({
                dateFormat: "dd-mm-yy",
                defaultDate: 0,
            });
        });
    </script>


@endsection
