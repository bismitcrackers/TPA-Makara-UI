@extends('layout/master')

@section('title', 'Edit Profile Siswa')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

    <div class="d-flex justify-content-center">
        <h1 class = "bukupenghubung-title underliner">
            Ubah Pengumuman
        </h1>
    </div>

    <form >
        <div class="form-group">
            <label for="judul" class="editlabel">JUDUL</label>
            <input name="judul" type="text" class="form-control editinput" id="judul" aria-describedby="judul" placeholder="Judul" autocapitalize="words" required>
        </div>
        <div class="form-group">
            <label for="deskripsi" class="editlabel">DESKRIPSI</label>
            <input name="deskripsi" type="text" placeholder = "Deskripsi" class="form-control editinput" id = "deskripsi" required>
        </div>
        <div class="form-group">
            <label for="datepicker" class="editlabel">TANGGAL KEGIATAN</label>
            <input name="tanggalKegiatan" type="date" class="form-control editinput tanggaldc" id = "datepicker" required>
        </div>
        <div class="form-group">
            <label for="jeniskegiatan" class="editlabel">JENIS KEGIATAN</label>
            <input name="jeniskegiatan" type="text" class="form-control editinput" id="jeniskegiatan" aria-describedby="jenis kegiatan" placeholder="Jenis Kegiatan" required>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-primary editbuttoncancel d-flex justify-content-center">
                Cancel
            </button>
            <button type="button" class="btn btn-primary editbutton d-flex justify-content-center">
                <div class="d-flex align-items-center">
                    <p>Save</p>
                    <img src="{{asset('svg/nextsign.svg')}}" alt="nextsign">
                </div>
            </button>
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
