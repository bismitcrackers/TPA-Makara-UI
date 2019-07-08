@extends('layout/master')

@section('title', 'Create Buku Penghubung Kelompok Bermain')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <h1 class = "bukupenghubung-title underliner">
            Buku Penghubung
        </h1>
    </div>
    @if($route == 'createDailyBookKB')
    <form method="POST" action="{{ route('dailyBook.kb.add', ['student_id' => $student_id]) }}" enctype="multipart/form-data">
    @elseif($route == 'reviewDailyBookKB')
    <form method="POST" action="{{ route('dailyBook.kb.publish', ['student_id' => $student_id, 'daily_book_id' => $dailyBook]) }}" enctype="multipart/form-data">
    @endif
        {{ csrf_field() }}
        <div class="tab">
            <div class="form-group">
                <label for="pembuatdc" class="dclabel">PEMBUAT</label>
                @if($route == 'createDailyBookKB')
                <input value="auth()->user()->name" name="pembuat" type="text" class="form-control dcinput" id="pembuatdc" aria-describedby="pembuat" placeholder="Nama Pembuat" autocapitalize="words" required>
                @elseif($route == 'reviewDailyBookKB')
                <input value="{{ $dailyBook->pembuat }}" name="pembuat" type="text" class="form-control dcinput" id="pembuatdc" aria-describedby="pembuat" placeholder="Nama Pembuat" autocapitalize="words" required>
                @endif
            </div>
            <div class="form-group">
                <label for="datepicker" class="dclabel">TANGGAL</label>
                @if($route == 'createDailyBookKB')
                <input name="tanggal" type="text" class="form-control dcinput tanggaldc" id="datepicker" placeholder="dd-mm-yyyy" required>
                @elseif($route == 'reviewDailyBookKB')
                <input value="{{ $dailyBook->tanggal }}" name="tanggal" type="text" class="form-control dcinput tanggaldc" id="datepicker" placeholder="dd-mm-yyyy" required>
                @endif
            </div>
            <div class="form-group">
                <label for="temadc" class="dclabel">TEMA</label>
                @if($route == 'createDailyBookKB')
                <input name="tema" type="text" class="form-control dcinput" id="temadc" aria-describedby="tema" placeholder="Tema" required>
                @elseif($route == 'reviewDailyBookKB')
                <input value="{{ $dailyBook->tema }}" name="tema" type="text" class="form-control dcinput" id="temadc" aria-describedby="tema" placeholder="Tema" required>
                @endif
            </div>
            <div class="form-group">
                <label for="subtemadc" class="dclabel">SUBTEMA</label>
                @if($route == 'createDailyBookKB')
                <input name="subtema" type="text" class="form-control dcinput" id="subtemadc" aria-describedby="subtema" placeholder="Sub Tema" required>
                @elseif($route == 'reviewDailyBookKB')
                <input value="{{ $dailyBook->subtema }}" name="subtema" type="text" class="form-control dcinput" id="subtemadc" aria-describedby="subtema" placeholder="Sub Tema" required>
                @endif
            </div>
            <button type="button" class="btn btn-primary dcbutton d-flex justify-content-center" onclick = "nextPrev(1)">
                Next
                <img src="{{asset('svg/nextsign.svg')}}" alt="nextsign">
            </button>
        </div>

        <div class="tab">
            <h2 class="subbukupenghubung-title"><u>CATATAN</u></h2>
            <div class="form-group">
                <label for="snackdc" class="dclabel">KEGIATAN</label>
                @if($route == 'createDailyBookKB')
                <textarea name="kegiatan" class="form-control dcinput" id="snackdc" rows="5" placeholder="Catatan" maxlength="150"></textarea>
                @elseif($route == 'reviewDailyBookKB')
                <textarea text="{{ $dailyBook->kegiatan }}" name="kegiatan" class="form-control dcinput" id="snackdc" rows="5" placeholder="Catatan" maxlength="150"></textarea>
                @endif
            </div>
            <h2 class="subbukupenghubung-title"><u>CATATAN KHUSUS</u></h2>
            <div class="form-group">
                @if($route == 'createDailyBookKB')
                <textarea name="catatanKhusus" class="form-control dcinput" id="catatankhususdc" rows="5" placeholder="Catatan Khusus" maxlength="150"></textarea>
                @elseif($route == 'reviewDailyBookKB')
                <textarea text="{{ $dailyBook->catatan_khusus }}" name="catatanKhusus" class="form-control dcinput" id="catatankhususdc" rows="5" placeholder="Catatan Khusus" maxlength="150"></textarea>
                @endif
            </div>
            <h2 class="subbukupenghubung-title"><u>LAMPIRAN</u></h2>
            <a href="#" class="tambahfoto d-flex justify-content-center dcinput" onclick="burninput()">
                <span>Tambah Foto</span>
                <img src="{{asset('svg/plus.svg')}}" alt="nextsign">
            </a>
            <input name="lampiran" type="file" id="inputfile">
            <button type="submit" class="btn btn-primary dcbutton d-flex justify-content-center">
                @if($route == 'createDailyBookKB')
                Save
                @elseif($route == 'reviewDailyBookKB')
                Publish
                @endif
                <img src="{{asset('svg/nextsign.svg')}}" alt="nextsign">
            </button>
        </div>
    </form>
@endsection

@section('extra-js')

<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    (document.getElementsByClassName("tab"))[currentTab].style.transform = "scale(1,1)";
    (document.getElementsByClassName("tab"))[currentTab].style.height = "100%";


    function nextPrev(n) {
        var x = document.getElementsByClassName("tab");
        if (n == 1 && !validateForm()) return false;
        x[currentTab].style.display = "none";
        currentTab += n;
        console.log(currentTab);
        x[currentTab].style.transform = "scale(1,1)";
        x[currentTab].style.height = "100%";

    }


    function validateForm() {
    // This function deals with validation of the form fields
        var x, y, i, test, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");

        if (y.length<1){
            y = x[currentTab].getElementsByTagName("textarea");
        }


        // Function that verify
        for (i = 0; i < y.length; i++) {
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].style.background="#ffdddd";
                y[i].placeholder = "Input invalid!"
                // and set the current valid status to false:
                valid = false;
                console.log("false");
            }
            else{
                y[i].style.background = "white";
            }
        }
        console.log(valid);
        return valid; // return the valid status
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
