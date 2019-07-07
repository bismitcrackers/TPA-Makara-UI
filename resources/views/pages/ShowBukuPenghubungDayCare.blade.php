@extends('layout/master')

@section('title', 'Create Buku Penghubung Daycare')

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
            <h2 class="subbukupenghubung-title"><u>ASPEK</u></h2>
            <div class="centerer">
                <img src="{{asset('svg/fisik.svg')}}" class="dcimg" alt="fisik">
            </div>
            {{ $dailyBook->keterangan_fisik }}
            <div class="centerer">
                <img src="{{asset('svg/kognitif.svg')}}" class="dcimg" alt="kognitif">
            </div>
            {{ $dailyBook->keterangan_kognitif }}
            <div class="centerer">
                <img src="{{asset('svg/sosial-emosi.svg')}}" class="dcimg" alt="sosial-emosi">
            </div>
            {{ $dailyBook->keterangan_sosial }}
            <button type="button" class="btn btn-primary dcbutton d-flex justify-content-center" onclick="nextPrev(1)">
                Next
                <img src="{{asset('svg/nextsign.svg')}}" alt="nextsign">
            </button>
        </div>

        <div class="tab">
            <h2 class="subbukupenghubung-title"><u>CATATAN</u></h2>
            <h2 class="title2">SNACK</h2>
            {{ $dailyBook->snack }}
            <h2 class="title2">MAKAN SIANG</h2>
            {{ $dailyBook->makan_siang }}
            <h2 class="title2">TIDUR SIANG</h2>
            {{ $dailyBook->tidur_siang }}
            <h2 class="subbukupenghubung-title"><u>CATATAN KHUSUS</u></h2>
            {{ $dailyBook->catatan_khusus }}
            <h2 class="subbukupenghubung-title"><u>LAMPIRAN</u></h2>
            <div class="imgbpkb">
                <img src="{{ asset($dailyBook->url_lampiran) }}" alt="gmbrbuku">
            </div>
            <a href-"{{ route('dailyBook.dc.read', ['student_id' => $student_id, 'dailyBook' => $dailyBook]) }}" class="btn btn-primary dcbutton d-flex justify-content-center">
                Okay
                <img src="{{asset('svg/nextsign.svg')}}" alt="nextsign">
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
