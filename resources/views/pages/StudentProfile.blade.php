@extends('layout/master')

@section('title', 'List Student Kelas Bermain - GURU')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

    <div class = "d-flex justify-content-center">
        <h1 class = "daftarsiswa-title underliner">
            {{ $student->nama_panggilan }}’s Profile
        </h1>
    </div>

    <div class = "d-flex justify-content-end">
        <div>
            <button type="button" id = "btn-passconfirm" class="btn btn-danger pass" data-toggle="modal" data-target="#studentPassModal">
                @if($student->lulus)
                    Batalkan kelulusan
                @else
                    Lulus
                @endif
            </button>
        </div>
    </div>

    <!-- Modal -->

    <div class="modal fade" id="studentPassModal" tabindex="-1" role="dialog" aria-labelledby="studentPassModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="d-flex justify-content-end">
                <button type="button" class="close closepass" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-header">
                <h5 class="modal-title" id="studentPassModalTitle">
                    @if($student->lulus)
                    <p>Yakin ingin membatalkan kelulusan</p>
                    @else
                    <p>Yakin ingin meluluskan</p>
                    @endif
                    <p>{{ $student->nama_lengkap }}?</p>
                </h5>
            </div>
            <div class="modal-footer centerer">

                <div class = "confirm-button">
                    <button type="button" class="btn btn-secondary editbuttoncancel" data-dismiss="modal" id = "disagree-button">Tidak</button>
                    @if($student->lulus)
                    <form method="POST" action="{{ route('profile.edit.ungraduate', ['student_id' => $student->id]) }}">
                        {{ csrf_field() }}
                        <button type="submit" class="btn editbutton" id = "agree-button">Ya</button>
                    </form>
                    @else
                    <form method="POST" action="{{ route('profile.edit.graduate', ['student_id' => $student->id]) }}">
                        {{ csrf_field() }}
                        <button type="submit" class="btn editbutton" id = "agree-button">Ya</button>
                    </form>
                    @endif
                </div>
            </div>
            </div>
        </div>
    </div>

    <!-- alert agree -->
    <div class="alert alert-success" id="agree" role="alert" aria-hidden="true">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        @if($student->lulus)
        <strong>Siswa </strong>tidak diluluskan.
        @else
        <strong>Siswa </strong>diluluskan.
        @endif
    </div>

    <!-- alert disagree -->
    <div class="alert alert-danger" id="disagree" role="alert" aria-hidden="true">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        @if($student->lulus)
        <strong>Siswa </strong>tetap diluluskan.
        @else
        <strong>Siswa </strong>tetap tidak diluluskan.
        @endif
    </div>

    <div class="d-flex justify-content-center">
        <div class="d-flex flex-row justify-content-around boxprofile p-3">
            <div class ="d-flex align-items-center margin-profile sizingprof">
                <div>
                    @if($student->jenis_kelamin == 'laki-laki')
                    <img src="{{asset('picture/laki.png')}}" class="profilepicture" alt="laki">
                    @else
                    <img src="{{asset('picture/perempuan.png')}}" class="profilepicture" alt="perempuan">
                    @endif
                    <a href="{{ route('profile.edit.student.form', ['student_id' => $student->id]) }}" class="linkeditprofile">
                        <div class="editprofile">
                            <p class="paragrapheditprofile">Edit Profile</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="ml-4">
                <div class="row justify-content-between">
                    <p class="col-4 p-0 profilelabel mb-0">Nama</p>
                    <p class="col-1 p-0 m-0">:</p>
                    <p class="col-6 p-0 profilecontent mb-0 pr-0"> {{ $student->nama_lengkap }} </p>
                </div>
                <div class="row justify-content-between">
                    <p class="col-4 p-0 mb-0 profilelabel">Nama Panggilan</p>
                    <p class="col-1 p-0 m-0">:</p>
                    <p class="col-6 p-0 mb-0 profilecontent">{{ $student->nama_panggilan }}</p>
                </div>
                <div class="row justify-content-between">
                    <p class="col-4 p-0 mb-0 profilelabel">Tempat</p>
                    <p class="col-1 p-0 m-0">:</p>
                    <p class="col-6 p-0 mb-0 profilecontent">{{ $student->tempat_lahir }}</p>
                </div>
                <div class="row justify-content-between">
                    <p class="col-4 p-0 mb-0 profilelabel">Tanggal Lahir</p>
                    <p class="col-1 p-0 m-0">:</p>
                    <p class="col-6 p-0 mb-0 profilecontent">{{ date('d-m-Y', strtotime($student->tanggal_lahir)) }}</p>
                </div>
                <div class="row justify-content-between">
                    <p class="col-4 p-0 mb-0 profilelabel">Agama</p>
                    <p class="col-1 p-0 m-0">:</p>
                    <p class="col-6 p-0 mb-0 profilecontent">{{ $student->agama }}</p>
                </div>
                <div class="row justify-content-between">
                    <p class="col-4 p-0 mb-0 profilelabel">Alamat Rumah</p>
                    <p class="col-1 p-0 m-0">:</p>
                    <p class="col-6 p-0 mb-0 profilecontent">{{ $student->alamat_rumah }}</p>
                </div>
                <div class="row justify-content-between">
                    <p class="col-4 p-0 mb-0 profilelabel">Telepon Rumah</p>
                    <p class="col-1 p-0 m-0">:</p>
                    <p class="col-6 p-0 mb-0 profilecontent">{{ $student->telepon_rumah }}</p>
                </div>
                <div class="row justify-content-between">
                    <p class="col-4 p-0 mb-0 profilelabel">Kelas</p>
                    <p class="col-1 p-0 m-0">:</p>
                    <p class="col-6 p-0 mb-0 profilecontent">{{ $student->kelas }}</p>
                </div>
            </div>
        </div>
    </div>


    <div class="d-flex justify-content-center">
        <div class="boxprofile-outer">
            <div class = "d-flex justify-content-start">
                <h4 class = "parent-profile underliner-parent-profile">
                    {{ $student->nama_panggilan }} Mom’s Profile
                </h4>
            </div>
            <div class="d-flex flex-row justify-content-around p-3 boxprofile">
                <div class ="d-flex align-items-center margin-profile sizingprof">
                    <div>
                        <img src="{{asset('picture/mom.png')}}" class="profilepicture" alt="Mom">
                        <a href="{{ route('profile.edit.mother.form', ['student_id' => $student->id]) }}" class="linkeditprofile">
                            <div class="editprofile">
                                <p class="paragrapheditprofile">Edit Profile</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="ml-4">
                    <div class="row justify-content-center">
                        <p class="col-4 p-0 profilelabel mb-0">Nama</p>
                        <p class="col-1 p-0 m-0">:</p>
                        <p class="col-6 p-0 profilecontent mb-0 pr-0">{{ $mom->nama_lengkap }}</p>
                    </div>
                    <div class="row justify-content-center">
                        <p class="col-4 p-0 mb-0 profilelabel">Tanggal Lahir</p>
                        <p class="col-1 p-0 m-0">:</p>
                        <p class="col-6 p-0 mb-0 profilecontent">{{ date('d-m-Y', strtotime($mom->tanggal_lahir)) }}</p>
                    </div>
                    <div class="row justify-content-center">
                        <p class="col-4 p-0 mb-0 profilelabel">Pendidikan Terakhir</p>
                        <p class="col-1 p-0 m-0">:</p>
                        <p class="col-6 p-0 mb-0 profilecontent">{{ $mom->pendidikan }}</p>
                    </div>
                    <div class="row justify-content-center">
                        <p class="col-4 p-0 mb-0 profilelabel">Pekerjaan</p>
                        <p class="col-1 p-0 m-0">:</p>
                        <p class="col-6 p-0 mb-0 profilecontent">{{ $mom->pekerjaan }}</p>
                    </div>
                    <div class="row justify-content-center">
                        <p class="col-4 p-0 mb-0 profilelabel">Alamat Kantor</p>
                        <p class="col-1 p-0 m-0">:</p>
                        <p class="col-6 p-0 mb-0 profilecontent">{{ $mom->alamat_rumah }}</p>
                    </div>
                    <div class="row justify-content-center">
                        <p class="col-4 p-0 mb-0 profilelabel">Email</p>
                        <p class="col-1 p-0 m-0">:</p>
                        <p class="col-6 p-0 mb-0 profilecontent">{{ $mom->email }}</p>
                    </div>
                    <div class="row justify-content-center">
                        <p class="col-4 p-0 mb-0 profilelabel">No. HP</p>
                        <p class="col-1 p-0 m-0">:</p>
                        <p class="col-6 p-0 mb-0 profilecontent">{{ $mom->no_handphone }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="d-flex justify-content-center">
        <div class="boxprofile-outer">
            <div class = "d-flex justify-content-start">
                <h4 class = "parent-profile underliner-parent-profile">
                    {{ $student->nama_panggilan }} Dad’s Profile
                </h4>
            </div>
            <div class="d-flex flex-row justify-content-around boxprofile p-3">
                <div class ="d-flex align-items-center margin-profile sizingprof">
                    <div>
                        <img src="{{asset('picture/dad.png')}}" class="profilepicture" alt="Dad">
                        <a href="{{ route('profile.edit.father.form', ['student_id' => $student->id]) }}" class="linkeditprofile">
                            <div class="editprofile">
                                <p class="paragrapheditprofile">Edit Profile</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="ml-4">
                    <div class="row justify-content-center">
                        <p class="col-4 p-0 profilelabel mb-0">Nama</p>
                        <p class="col-1 p-0 m-0">:</p>
                        <p class="col-6 p-0 profilecontent mb-0 pr-0"> {{ $dad->nama_lengkap }} </p>
                    </div>
                    <div class="row justify-content-center">
                        <p class="col-4 p-0 mb-0 profilelabel">Tanggal Lahir</p>
                        <p class="col-1 p-0 m-0">:</p>
                        <p class="col-6 p-0 mb-0 profilecontent">{{ date('d-m-Y', strtotime($dad->tanggal_lahir)) }}</p>
                    </div>
                    <div class="row justify-content-center">
                        <p class="col-4 p-0 mb-0 profilelabel">Pendidikan Terakhir</p>
                        <p class="col-1 p-0 m-0">:</p>
                        <p class="col-6 p-0 mb-0 profilecontent">{{ $dad->pendidikan }}</p>
                    </div>
                    <div class="row justify-content-center">
                        <p class="col-4 p-0 mb-0 profilelabel">Pekerjaan</p>
                        <p class="col-1 p-0 m-0">:</p>
                        <p class="col-6 p-0 mb-0 profilecontent">{{ $dad->pekerjaan }}</p>
                    </div>
                    <div class="row justify-content-center">
                        <p class="col-4 p-0 mb-0 profilelabel">Alamat Kantor</p>
                        <p class="col-1 p-0 m-0">:</p>
                        <p class="col-6 p-0 mb-0 profilecontent">{{ $dad->alamat_rumah }}</p>
                    </div>
                    <div class="row justify-content-center">
                        <p class="col-4 p-0 mb-0 profilelabel">Email</p>
                        <p class="col-1 p-0 m-0">:</p>
                        <p class="col-6 p-0 mb-0 profilecontent">{{ $dad->email }}</p>
                    </div>
                    <div class="row justify-content-center">
                        <p class="col-4 p-0 mb-0 profilelabel">No. HP</p>
                        <p class="col-1 p-0 m-0">:</p>
                        <p class="col-6 p-0 mb-0 profilecontent">{{ $dad->no_handphone }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class = "parent-profile d-flex agenda-kegiatan">
            <p class = "underliner-parent-profile">Agenda Kegiatan</p>
        </div>

        <div class="agenda-content">
            <div class = "row justify-content-around ">
                <div class="col-sm-11 col-auto agenda">
                    Kerja Bakti di Halaman TPA Makara
                </div>
                <div class="col-sm-1 col-auto agenda-detail">
                        Detail
                </div>
            </div>
        </div>

        <div class = "parent-profile d-flex pengumuman">
            <p class = "underliner-parent-profile">Pengumuman</p>
        </div>

        <div class="agenda-content">
            <div class = "row justify-content-around ">
                <div class="col-sm-11 col-auto agenda">
                    Kerja Bakti di Halaman TPA Makara
                </div>
                <div class="col-sm-1 col-auto agenda-detail">
                        Detail
                </div>
            </div>
        </div>






@endsection

@section('extra-js')

    <script>

        function modalConfirm(callback){

        $("#btn-passconfirm").on("click", function(){
            $("#studentPassModal").modal('show');
        });

        $("#agree-button").on("click", function(){
            callback(true);
            $("#studentPassModal").modal('hide');
        });

        $("#disagree-button").on("click", function(){
            callback(false);
            $("#studentPassModal").modal('hide');
        });
        };

        modalConfirm(function(confirm){
        if(confirm){
            $("#agree").fadeTo(500, 1).slideDown(500);
            window.setTimeout(function() {
            $("#agree").fadeTo(500, 0).slideUp(500);
            }, 4000)
        }else{
            $("#disagree").fadeTo(500, 1).slideDown(500);
            window.setTimeout(function() {
            $("#disagree").fadeTo(500, 0).slideUp(500);
            }, 4000)
        }
        });

    </script>

@endsection
