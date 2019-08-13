@extends('layout/master')

@section('title', 'Pengumuman Form')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

    <div class="d-flex justify-content-center">
        <h1 class = "bukupenghubung-title underliner">
            @if($route == 'add')
                Tambah Pengumuman
            @elseif($route == 'edit')
                Ubah Pengumuman
            @endif
        </h1>
    </div>

    @if($route == 'add')
    <form method="POST" action="{{ route('admin.pengumuman.store') }}">
    @elseif($route == 'edit')
    <form method="POST" action="{{ route('admin.pengumuman.update') }}">
    {{method_field('PATCH')}}
    @endif
     {{ csrf_field() }}
        <div class="form-group">
            <label for="judul" class="editlabel">JUDUL</label>
            <input <?php if($route=='edit') {echo 'value="{{ $pengumuman->judul }}"';} ?> name="judul" type="text" class="form-control editinput" id="judul" aria-describedby="judul" placeholder="Judul" autocapitalize="words" required>
        </div>
        <div class="form-group">
            <label for="deskripsi" class="editlabel">DESKRIPSI</label>
            <input <?php if($route=='edit') {echo 'value="{{ $pengumuman->deskripsi }}"';} ?> name="deskripsi" type="text" placeholder = "Deskripsi" class="form-control editinput" id = "deskripsi" required>
        </div>
        <div class="form-group">
            <label for="datepicker" class="editlabel">TANGGAL KEGIATAN</label>
            <input <?php if($route=='edit') {echo 'value="{{ $pengumuman->tanggal }}"';} ?> name="tanggal" type="date" class="form-control editinput tanggaldc" id = "datepicker" required>
        </div>
        <div class="form-group">
            <label for="jeniskegiatan" class="editlabel">JENIS KEGIATAN</label>
            <div class="col-auto">
                <select class="form-control" id="jeniskegiatan" name="jenis" required>
                    @if($route == 'add')
                    <option value="Pengumuman">Pengumuman</option>
                    <option value="Agenda Kegiatan">Agenda Kegiatan</option>
                    @elseif($pengumuman->jenis == 'Pengumuman')
                    <option value="Pengumuman" selected>Pengumuman</option>
                    <option value="Agenda Kegiatan">Agenda Kegiatan</option>
                    @elseif($pengumuman->jenis == 'Agenda Kegiatan')
                    <option value="Pengumuman">Pengumuman</option>
                    <option value="Agenda Kegiatan" selected>Agenda Kegiatan</option>
                    @endif
                </select>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-primary editbuttoncancel d-flex justify-content-center">
                Cancel
            </button>
            <button type="submit" class="btn btn-primary editbutton d-flex justify-content-center">
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
