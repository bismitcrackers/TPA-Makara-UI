@extends('layout/master')

@section('title', 'Edit Profile Siswa')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

    <div class="d-flex justify-content-center">
        <h1 class = "bukupenghubung-title underliner">
            Abyan Mom's Profile
        </h1>
    </div>

    <form >
        <div>
            <div class="form-group">
                <label for="nama" class="editlabel">Nama</label>
                <input name="nama" type="text" class="form-control editinput" id="nama" aria-describedby="nama siswa" placeholder="Nama Siswa" autocapitalize="words" required>
            </div>
            <div class="form-group">
                <label for="datepicker" class="editlabel">TANGGAL LAHIR</label>
                <input name="tanggal" type="date" class="form-control editinput tanggaldc" id = "datepicker" required>
            </div>
            <div class="form-group">
                    <label for="pendidikan-terakhir" class="editlabel">PENDIDIKAN TERAKHIR</label>
                    <input name="pendidikan-terakhir" type="text" class="form-control editinput" id="pendidikan-terakhir" aria-describedby="pendidikan-terakhir" placeholder="Pendidikan Terakhir" required>
            </div>
            <div class="form-group">
                <label for="pekerjaan" class="editlabel">PEKERJAAN</label>
                <input name="pekerjaan" type="text" class="form-control editinput" id="pekerjaan" aria-describedby="pekerjaan" placeholder="Pekerjaan" required>
            </div>
            <div class="form-group">
                <label for="alamat-kantor" class="editlabel">ALAMAT KANTOR</label>
                <input name="alamat-kantor" type="text" class="form-control editinput" id="alamat-kantor" aria-describedby="alamat-kantor" placeholder="Alamat Kantor" required>
            </div>
            <div class="form-group">
                <label for="email" class="editlabel">EMAIL</label>
                <input name="email" type="email" class="form-control editinput" id="email" aria-describedby="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                    <label for="nomor telepon" class="editlabel">NO TELEPON</label>
                    <input name="nomor telepon" type="text" class="form-control editinput" id="nomor telepon" aria-describedby="Nomor Telepon" placeholder="nomor telepon" required>
            </div>
            <div class="d-flex">
                <button type="button" class="btn btn-primary editbuttoncancel d-flex justify-content-center">
                    Cancel
                </button>
                <button type="button" class="btn btn-primary dcbutton d-flex justify-content-center">
                    Save
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
