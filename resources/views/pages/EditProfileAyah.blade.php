@extends('layout/master')

@section('title', 'Edit Profile Ayah')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

    <div class="d-flex justify-content-center">
        <h1 class = "bukupenghubung-title underliner">
             {{ $student->nama_panggilan }} Dad's Profile
        </h1>
    </div>

    <form method="POST" action="{{ route('profile.edit.father.post', ['student_id' => $student->id]) }}">
        {{ csrf_field() }}
        <div>
            <div class="form-group">
                <label for="nama" class="editlabel">Nama</label>
                <input value="{{ $dad->nama_lengkap }}" name="namaLengkapAyah" type="text" class="form-control editinput" id="nama" aria-describedby="nama siswa" placeholder="Nama Siswa" autocapitalize="words" required>
            </div>
            <div class="form-group">
                <label for="datepicker" class="editlabel">TANGGAL LAHIR</label>
                <input value="{{ $dad->tanggal_lahir }}" name="tanggalLahirAyah" type="date" class="form-control editinput tanggaldc" id = "datepicker" required>
            </div>
            <div class="form-group">
                    <label for="pendidikan-terakhir" class="editlabel">PENDIDIKAN TERAKHIR</label>
                    <input value="{{ $dad->pendidikan }}" name="pendidikanTerakhirAyah" type="text" class="form-control editinput" id="pendidikan-terakhir" aria-describedby="pendidikan-terakhir" placeholder="Pendidikan Terakhir" required>
            </div>
            <div class="form-group">
                <label for="pekerjaan" class="editlabel">PEKERJAAN</label>
                <input value="{{ $dad->pekerjaan }}" name="pekerjaanAyah" type="text" class="form-control editinput" id="pekerjaan" aria-describedby="pekerjaan" placeholder="Pekerjaan" required>
            </div>
            <div class="form-group">
                <label for="alamat-kantor" class="editlabel">ALAMAT KANTOR</label>
                <input value="{{ $dad->alamat_kantor }}" name="alamatKerjaAyah" type="text" class="form-control editinput" id="alamat-kantor" aria-describedby="alamat-kantor" placeholder="Alamat Kantor" required>
            </div>
            <div class="form-group">
                <label for="email" class="editlabel">EMAIL</label>
                <input value="{{ $dad->email }}" name="emailAyah" type="email" class="form-control editinput" id="email" aria-describedby="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                    <label for="nomor telepon" class="editlabel">NO TELEPON</label>
                    <input value="{{ $dad->no_handphone }}" name="nomorHpAyah" type="text" class="form-control editinput" id="nomor telepon" aria-describedby="Nomor Telepon" placeholder="nomor telepon" required>
            </div>
            <div class="d-flex justify-content-center">
                <a href="{{ url()->previous() }}">
                    <button type="button" class="btn btn-primary editbuttoncancel d-flex justify-content-center">
                      Cancel
                    </button>
                </a>
                <button type="submit" class="btn btn-primary editbutton d-flex justify-content-center">
                    <p>Save</p>
                    <img src="{{asset('svg/nextsign.svg')}}" alt="nextsign">
                </button>
            </div>
        </div>
    </form>
@endsection

@section('extra-js')

    <script>
        //  var currentTab = 0; // Current tab is set to be the first tab (0)
        // (document.getElementsByClassName("tab"))[currentTab].style.transform = "scale(1,1)";
        // (document.getElementsByClassName("tab"))[currentTab].style.height = "100%";


        // function nextPrev(n) {
        //     var x = document.getElementsByClassName("tab");
        //     if (n == 1 && !validateForm()) return false;
        //     x[currentTab].style.display = "none";
        //     currentTab += n;
        //     console.log(currentTab);
        //     x[currentTab].style.transform = "scale(1,1)";
        //     x[currentTab].style.height = "100%";

        // }


        // function validateForm() {
        // // This function deals with validation of the form fields
        //     var x, y, i, test, valid = true;
        //     x = document.getElementsByClassName("tab");
        //     y = x[currentTab].getElementsByTagName("input");

        //     if (y.length<1){
        //         y = x[currentTab].getElementsByTagName("textarea");
        //     }


        //     // Function that verify
        //     for (i = 0; i < y.length; i++) {
        //         if (y[i].value == "") {
        //             // add an "invalid" class to the field:
        //             y[i].style.background="#ffdddd";
        //             y[i].placeholder = "Input invalid!"
        //             // and set the current valid status to false:
        //             valid = false;
        //             console.log("false");
        //         }
        //         else{
        //             y[i].style.background = "white";
        //         }
        //     }
        //     console.log(valid);
        //     return valid; // return the valid status
        // }

        // function burninput(event){
        //     $("#inputfile").click();
        // }

        // // $( function() {
        // //     $( "#datepicker" ).datepicker({
        // //         dateFormat: "dd-mm-yy",
        // //         defaultDate: 0,
        // //     });
        // // });

        // function readURL(input) {
        //   if (input.files && input.files[0]) {
        //     var reader = new FileReader();

        //     reader.onload = function(e) {
        //       $('#imgbuku').attr('src', e.target.result);
        //     }

        //     reader.readAsDataURL(input.files[0]);
        //   }
        // }

        // $("#inputfile").change(function() {
        //   readURL(this);
        // });
    </script>


@endsection
