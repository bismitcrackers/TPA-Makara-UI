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

    <div class="d-flex justify-content-center">
        <div class="d-flex flex-row justify-content-around boxprofile p-3">
            <div class ="d-flex align-items-center margin-profile sizingprof">
                <div>
                    @if($student->jenis_kelamin == 'laki-laki')
                    <img src="{{asset('picture/laki.png')}}" class="profilepicture" alt="laki">
                    @else
                    <img src="{{asset('picture/perempuan.png')}}" class="profilepicture" alt="perempuan">
                    @endif
                    <a href="#" class="linkeditprofile">
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
                        <a href="#" class="linkeditprofile">
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
                        <a href="#" class="linkeditprofile">
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






@endsection

@section('extra-js')

@endsection
