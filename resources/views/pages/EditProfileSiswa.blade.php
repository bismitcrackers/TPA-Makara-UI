@extends('layout/master')

@section('title', 'Edit Profile Siswa')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

    <div class="d-flex justify-content-center">
        <h1 class = "bukupenghubung-title underliner">
             {{ $student->nama_panggilan }}'s Profile
        </h1>
    </div>

    <form method="POST" action="{{ route('profile.edit.student.post', ['student_id' => $student->id]) }}">
        {{ csrf_field() }}
        <div>
            <div class="form-group">
                <label for="nama" class="editlabel">NAMA</label>
                <input value="{{ $student->nama_lengkap }}" name="namaLengkap" type="text" class="form-control editinput" id="nama" aria-describedby="nama siswa" placeholder="Nama Siswa" autocapitalize="words" required>
            </div>
            <div class="form-group">
                <label for="nama-panggilan" class="editlabel">NAMA PANGGILAN</label>
                <input value="{{ $student->nama_panggilan }}" name="namaPanggilan" type="text" class="form-control editinput" id = "nama-panggilan" required>
            </div>
            <div class="form-group">
                <label for="jenis-kelamin" class="editlabel">JENIS KELAMIN</label>
                <div class="col-auto">
                    <select class="form-control" id="jenis-kelamin" name="jenisKelamin" required>
                        @if( $student->jenis_kelamin == "laki-laki" )
                        <option value="laki-laki" selected>👦 Laki-laki</option>
                        <option value="perempuan">👧 Perempuan</option>
                        @else
                        <option value="laki-laki">👦 Laki-laki</option>
                        <option value="perempuan" selected>👧 Perempuan</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="tempat-lahir" class="editlabel">TEMPAT LAHIR</label>
                <input  value="{{ $student->tempat_lahir }}" name="tempatLahir" type="text" class="form-control editinput" id="tempat-lahir" aria-describedby="tempat lahir" placeholder="Tempat Lahir" required>
            </div>
            <div class="form-group">
                <label for="datepicker" class="editlabel">TANGGAL LAHIR</label>
                <input  value="{{ $student->tanggal_lahir }}" name="tanggalLahir" type="date" class="form-control editinput tanggaldc" id = "datepicker" required>
            </div>
            <div class="form-group">
                <label for="agama" class="editlabel">AGAMA</label>
                <input value="{{ $student->agama }}"  name="agama" type="text" class="form-control editinput" id="agama" aria-describedby="agama" placeholder="Agama" required>
            </div>
            <div class="form-group">
                <label for="alamat-rumah" class="editlabel">ALAMAT RUMAH</label>
                <input value="{{ $student->alamat_rumah }}"  name="alamatRumah" type="text" class="form-control editinput" id="alamat-rumah" aria-describedby="alamat-rumah" placeholder="Alamat Rumah" required>
            </div>
            <div class="form-group">
                <label for="telepon-rumah" class="editlabel">TELEPON RUMAH</label>
                <input value="{{ $student->telepon_rumah }}"  name="teleponRumah" type="text" class="form-control editinput" id="telepon-rumah" aria-describedby="telepon-rumah" placeholder="Telepon Rumah" required>
            </div>
            <div class="form-group">
                <label for="kelas" class="editlabel">KELAS</label>
                <select class="form-control" id="kelas" name="kelas" required>
                    @if( $student->kelas == "Day Care" )
                    <option value="Day Care" selected>Day Care</option>
                    <option value="Kelompok Bermain">Kelompok Bermain</option>
                    @elseif( $student->kelas == "Kelompok Bermain" )
                    <option value="Day Care">Day Care</option>
                    <option value="Kelompok Bermain" selected>Kelompok Bermain</option>
                    @endif
                </select>
            </div>
            <div class="d-flex justify-content-center">
              <a href="{{ url()->previous() }}">
                <button type="button" class="btn btn-primary editbuttoncancel d-flex justify-content-center">
                    Cancel
                </button>
              </a>
                <button type="submit" class="btn btn-primary editbutton d-flex justify-content-center">
                    <div class="d-flex align-items-center">
                        <p>Save</p>
                        <img src="{{asset('svg/nextsign.svg')}}" alt="nextsign">
                    </div>
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
