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

    <div class = "pengumuman-show">
        <p class="kegiatan-field">JUDUL</p>
        <p class="kegiatan-field-answer" id="judul">
            Kerja Bakti Di Ruang Kelas
        </p>
        <p class="kegiatan-field">DESKRIPSI</p>
        <p class="kegiatan-field-answer" id = "deskripsi">
            Di himbau untuk membawa baju kotor
        </p>
        <p class="kegiatan-field">TANGGAL KEGIATAN</p>
        <p class="kegiatan-field-answer" id = "datepicker">
            1 Agustus 2019
        </p>
        <p class="kegiatan-field">JENIS KEGIATAN</p>
        <p class="kegiatan-field-answer" id="jeniskegiatan">
            Agenda Kegiatan
        </p>
    </div>

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
