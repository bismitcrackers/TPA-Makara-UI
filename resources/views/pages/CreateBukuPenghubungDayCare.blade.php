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
    @if($route == 'createDailyBookDC')
    <form method="POST" action="{{ route('dailyBook.dc.add', ['student_id' => $student_id]) }}" enctype="multipart/form-data">
    @elseif($route == 'reviewDailyBookDC')
    <form method="POST" action="{{ route('dailyBook.dc.publish', ['student_id' => $student_id, 'daily_book_id' => $dailyBook]) }}" enctype="multipart/form-data">
    @endif
        {{ csrf_field() }}
        <div class="tab">
            <div class="form-group">
                <label for="pembuatdc" class="dclabel">PEMBUAT</label>
                @if($route == 'createDailyBookDC')
                <input value="{{ auth()->user()->first()->name }}" name="pembuat" type="text" class="form-control dcinput" id="pembuatdc" aria-describedby="pembuat" placeholder="Nama Pembuat" autocapitalize="words" required>
                @elseif($route == 'reviewDailyBookDC')
                <input value="{{ $dailyBook->pembuat }}" name="pembuat" type="text" class="form-control dcinput" id="pembuatdc" aria-describedby="pembuat" placeholder="Nama Pembuat" autocapitalize="words" required>
                @endif
            </div>
            <div class="form-group">
                <label for="datepicker" class="dclabel">TANGGAL</label>
                @if($route == 'createDailyBookDC')
                <input name="tanggal" type="date" class="form-control dcinput tanggaldc" id="datepicker" placeholder="dd-mm-yyyy" required>
                @elseif($route == 'reviewDailyBookDC')
                <input value="{{ $dailyBook->tanggal }}" name="tanggal" type="text" class="form-control dcinput tanggaldc" id="datepicker" placeholder="dd-mm-yyyy" required>
                @endif
            </div>
            <div class="form-group">
                <label for="temadc" class="dclabel">TEMA</label>
                @if($route == 'createDailyBookDC')
                <input name="tema" type="text" class="form-control dcinput" id="temadc" aria-describedby="tema" placeholder="Tema" required>
                @elseif($route == 'reviewDailyBookDC')
                <input value="{{ $dailyBook->tema }}" name="tema" type="text" class="form-control dcinput" id="temadc" aria-describedby="tema" placeholder="Tema" required>
                @endif
            </div>
            <div class="form-group">
                <label for="subtemadc" class="dclabel">SUBTEMA</label>
                @if($route == 'createDailyBookDC')
                <input name="subtema" type="text" class="form-control dcinput" id="subtemadc" aria-describedby="subtema" placeholder="Sub Tema" required>
                @elseif($route == 'reviewDailyBookDC')
                <input value="{{ $dailyBook->subtema }}" name="subtema" type="text" class="form-control dcinput" id="subtemadc" aria-describedby="subtema" placeholder="Sub Tema" required>
                @endif
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
            <div class="form-group">
                <label for="keterangandcfisik" class="dclabel ">KETERANGAN</label>
                @if($route == 'createDailyBookDC')
                <textarea name="keteranganFisik" class="form-control dcinput" id="keterangandcfisik" rows="5" placeholder="Max. 150 karakter" maxlength="150" required></textarea>
                @elseif($route == 'reviewDailyBookDC')
                <textarea text="{{$dailyBook->keterangan_fisik}}" name="keteranganFisik" class="form-control dcinput" id="keterangandcfisik" rows="5" placeholder="Max. 150 karakter" maxlength="150" required></textarea>
                @endif
            </div>
            <div class="centerer">
                <img src="{{asset('svg/kognitif.svg')}}" class="dcimg" alt="kognitif">
            </div>
            <div class="form-group">
                <label for="keterangandckognitif" class="dclabel">KETERANGAN</label>
                @if($route == 'createDailyBookDC')
                <textarea name="keteranganKognitif" class="form-control dcinput" id="keterangandckognitif" rows="5" placeholder="Max. 150 karakter" maxlength="150" required></textarea>
                @elseif($route == 'reviewDailyBookDC')
                <textarea text="{{ $dailyBook->keterangan_kognitif }}" name="keteranganKognitif" class="form-control dcinput" id="keterangandckognitif" rows="5" placeholder="Max. 150 karakter" maxlength="150" required></textarea>
                @endif
            </div>
            <div class="centerer">
                <img src="{{asset('svg/sosial-emosi.svg')}}" class="dcimg" alt="sosial-emosi">
            </div>
            <div class="form-group">
                <label for="keterangandcfisiksosialem" class="dclabel">KETERANGAN</label>
                @if($route == 'createDailyBookDC')
                <textarea name="keteranganSosial" class="form-control dcinput" id="keterangandcsosialem" rows="5" placeholder="Max. 150 karakter" maxlength="150" required></textarea>
                @elseif($route == 'reviewDailyBookDC')
                <textarea text="{{$dailyBook->keterangan_sosial}}" name="keteranganSosial" class="form-control dcinput" id="keterangandcsosialem" rows="5" placeholder="Max. 150 karakter" maxlength="150" required></textarea>
                @endif
            </div>
            <button type="button" class="btn btn-primary dcbutton d-flex justify-content-center" onclick="nextPrev(1)">
                Next
                <img src="{{asset('svg/nextsign.svg')}}" alt="nextsign">
            </button>
        </div>

        <div class="tab">
            <h2 class="subbukupenghubung-title"><u>CATATAN</u></h2>
            <div class="form-group">
                <label for="snackdc" class="dclabel ">SNACK</label>
                @if($route == 'createDailyBookDC')
                <textarea name="snack" class="form-control dcinput" id="snackdc" rows="5" placeholder="Max. 150 karakter" maxlength="150"></textarea>
                @elseif($route == 'reviewDailyBookDC')
                <textarea text="{{ $dailyBook->snack }}" name="snack" class="form-control dcinput" id="snackdc" rows="5" placeholder="Max. 150 karakter" maxlength="150"></textarea>
                @endif
            </div>
            <div class="form-group">
                <label for="makansiangdc" class="dclabel ">MAKAN SIANG</label>
                @if($route == 'createDailyBookDC')
                <textarea name="makanSiang" class="form-control dcinput" id="makansiangdc" rows="5" placeholder="Max. 150 karakter" maxlength="150"></textarea>
                @elseif($route == 'reviewDailyBookDC')
                <textarea text="{{ $dailyBook->makan_siang }}" name="makanSiang" class="form-control dcinput" id="makansiangdc" rows="5" placeholder="Max. 150 karakter" maxlength="150"></textarea>
                @endif
            </div>
            <div class="form-group">
                <label for="tidursiangdc" class="dclabel ">TIDUR SIANG</label>
                @if($route == 'createDailyBookDC')
                <textarea name="tidurSiang" class="form-control dcinput" id="tidursiangdc" rows="5" placeholder="Max. 150 karakter" maxlength="150"></textarea>
                @elseif($route == 'reviewDailyBookDC')
                <textarea text="{{ $dailyBook->tidur_siang }}" name="tidurSiang" class="form-control dcinput" id="tidursiangdc" rows="5" placeholder="Max. 150 karakter" maxlength="150"></textarea>
                @endif
            </div>
            <h2 class="subbukupenghubung-title"><u>CATATAN KHUSUS</u></h2>
            <div class="form-group">
                @if($route == 'createDailyBookDC')
                <textarea name="catatanKhusus" class="form-control dcinput" id="catatankhususdc" rows="5" placeholder="Max. 150 karakter" maxlength="150"></textarea>
                @elseif($route == 'reviewDailyBookDC')
                <textarea text="{{ $dailyBook->catatan_khusus }}" name="catatanKhusus" class="form-control dcinput" id="catatankhususdc" rows="5" placeholder="Max. 150 karakter" maxlength="150"></textarea>
                @endif
            </div>
            <h2 class="subbukupenghubung-title"><u>LAMPIRAN</u></h2>
            <div href="" class="tambahfoto d-flex justify-content-center dcinput" onclick="burninput()">
                <span>Tambah Foto</span>
                <img src="{{asset('svg/plus.svg')}}" alt="nextsign">
            </div>
            <input name="lampiran" type="file" id="inputfile">
            <button type="submit" class="btn btn-primary dcbutton d-flex justify-content-center" onclick="nextPrev(1)">
                @if($route == 'createDailyBookDC')
                Save
                @elseif($route == 'reviewDailyBookDC')
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
