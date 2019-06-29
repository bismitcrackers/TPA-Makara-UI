@extends('layout/master')

@section('title', 'List Student Kelas Bermain - GURU')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

    <div class = "d-flex justify-content-center">
        <h1 class = "daftarsiswa-title underliner">
            Abyan’s Profile        
        </h1>
    </div>

    <div class="d-flex justify-content-center">
        <div class="d-flex flex-row justify-content-around boxprofile p-3">
            <div class ="d-flex align-items-center margin-profile">
                <div>
                    <img src="{{asset('svg/lakilarge.svg')}}" class="profilepicture" alt="laki">
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
                    <p class="col-2 p-0 mb-0">:</p>
                    <p class="col-6 p-0 profilecontent mb-0 pr-0"> Abyan Althaf K. </p>
                </div>
                <div class="row justify-content-center">
                    <p class="col-4 p-0 mb-0 profilelabel">Nama Panggilan</p>
                    <p class="col-2 p-0 mb-0">:</p>
                    <p class="col-6 p-0 mb-0 profilecontent">Abyan</p>
                </div>
                <div class="row justify-content-center">
                    <p class="col-4 p-0 mb-0 profilelabel">Tempat</p>
                    <p class="col-2 p-0 mb-0">:</p>
                    <p class="col-6 p-0 mb-0 profilecontent">Depok</p>
                </div>
                <div class="row justify-content-center">
                    <p class="col-4 p-0 mb-0 profilelabel">Tanggal Lahir</p>
                    <p class="col-2 p-0 mb-0">:</p>
                    <p class="col-6 p-0 mb-0 profilecontent">03 Januari 2015</p>
                </div>
                <div class="row justify-content-center">
                    <p class="col-4 p-0 mb-0 profilelabel">Agama</p>
                    <p class="col-2 p-0 mb-0">:</p>
                    <p class="col-6 p-0 mb-0 profilecontent">Islam</p>
                </div>
                <div class="row justify-content-center">
                    <p class="col-4 p-0 mb-0 profilelabel">Alamat Rumah</p>
                    <p class="col-2 p-0 mb-0">:</p>
                    <p class="col-6 p-0 mb-0 profilecontent">Orchid Residence, Jl. Dahlia 2, Blok D/34, Beji, Depok</p>
                </div>
                <div class="row justify-content-center">
                    <p class="col-4 p-0 mb-0 profilelabel">Telepon Rumah</p>
                    <p class="col-2 p-0 mb-0">:</p>
                    <p class="col-6 p-0 mb-0 profilecontent">-</p>
                </div>
                <div class="row justify-content-center">
                    <p class="col-4 p-0 mb-0 profilelabel">Kelas</p>
                    <p class="col-2 p-0 mb-0">:</p>
                    <p class="col-6 p-0 mb-0 profilecontent">Kelompok Bermain</p>
                </div>
            </div>
        </div>
    </div>

    <div class = "d-flex justify-content-start margin-ortu">
        <h4 class = "parent-profile underliner-parent-profile">
            Abyan Mom’s Profile      
        </h4>
    </div>

    <div class="d-flex justify-content-center">
        <div class="d-flex flex-row justify-content-around boxprofile p-3">
            <div class ="d-flex align-items-center margin-profile">
                <div>
                    <img src="{{asset('svg/mom.svg')}}" class="profilepicture" alt="Mom">
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
                    <p class="col-2 p-0 mb-0">:</p>
                    <p class="col-6 p-0 profilecontent mb-0 pr-0"> Dwi Ely Pradinayanti </p>
                </div>
                <div class="row justify-content-center">
                    <p class="col-4 p-0 mb-0 profilelabel">Tanggal Lahir</p>
                    <p class="col-2 p-0 mb-0">:</p>
                    <p class="col-6 p-0 mb-0 profilecontent">29 September 1982</p>
                </div>
                <div class="row justify-content-center">
                    <p class="col-4 p-0 mb-0 profilelabel">Pendidikan Terakhir</p>
                    <p class="col-2 p-0 mb-0">:</p>
                    <p class="col-6 p-0 mb-0 profilecontent">S1</p>
                </div>
                <div class="row justify-content-center">
                    <p class="col-4 p-0 mb-0 profilelabel">Pekerjaan</p>
                    <p class="col-2 p-0 mb-0">:</p>
                    <p class="col-6 p-0 mb-0 profilecontent">PNS</p>
                </div>
                <div class="row justify-content-center">
                    <p class="col-4 p-0 mb-0 profilelabel">Alamat Kantor</p>
                    <p class="col-2 p-0 mb-0">:</p>
                    <p class="col-6 p-0 mb-0 profilecontent">Kementerian Komunikasi dan Informatika</p>
                </div>
                <div class="row justify-content-center">
                    <p class="col-4 p-0 mb-0 profilelabel">Email</p>
                    <p class="col-2 p-0 mb-0">:</p>
                    <p class="col-6 p-0 mb-0 profilecontent">elyrisani@gmail.com</p>
                </div>
                <div class="row justify-content-center">
                    <p class="col-4 p-0 mb-0 profilelabel">No. HP</p>
                    <p class="col-2 p-0 mb-0">:</p>
                    <p class="col-6 p-0 mb-0 profilecontent">0817 070 9404</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class = "d-flex justify-content-start margin-ortu">
        <h4 class = "parent-profile underliner-parent-profile">
            Abyan Dad’s Profile      
        </h4>
    </div>

    <div class="d-flex justify-content-center">
        <div class="d-flex flex-row justify-content-around boxprofile p-3">
            <div class ="d-flex align-items-center margin-profile">
                <div>
                    <img src="{{asset('svg/dad.svg')}}" class="profilepicture" alt="Dad">
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
                    <p class="col-2 p-0 mb-0">:</p>
                    <p class="col-6 p-0 profilecontent mb-0 pr-0"> Suta Risani </p>
                </div>
                <div class="row justify-content-center">
                    <p class="col-4 p-0 mb-0 profilelabel">Tanggal Lahir</p>
                    <p class="col-2 p-0 mb-0">:</p>
                    <p class="col-6 p-0 mb-0 profilecontent">24 Maret 1982</p>
                </div>
                <div class="row justify-content-center">
                    <p class="col-4 p-0 mb-0 profilelabel">Pendidikan Terakhir</p>
                    <p class="col-2 p-0 mb-0">:</p>
                    <p class="col-6 p-0 mb-0 profilecontent">S1</p>
                </div>
                <div class="row justify-content-center">
                    <p class="col-4 p-0 mb-0 profilelabel">Pekerjaan</p>
                    <p class="col-2 p-0 mb-0">:</p>
                    <p class="col-6 p-0 mb-0 profilecontent">Karyawan Swasta</p>
                </div>
                <div class="row justify-content-center">
                    <p class="col-4 p-0 mb-0 profilelabel">Alamat Kantor</p>
                    <p class="col-2 p-0 mb-0">:</p>
                    <p class="col-6 p-0 mb-0 profilecontent">PT XL Axiata, Graha XL, Kuningan, Setiabudi, Jaksel</p>
                </div>
                <div class="row justify-content-center">
                    <p class="col-4 p-0 mb-0 profilelabel">Email</p>
                    <p class="col-2 p-0 mb-0">:</p>
                    <p class="col-6 p-0 mb-0 profilecontent">Indriasuta@gmail.com</p>
                </div>
                <div class="row justify-content-center">
                    <p class="col-4 p-0 mb-0 profilelabel">No. HP</p>
                    <p class="col-2 p-0 mb-0">:</p>
                    <p class="col-6 p-0 mb-0 profilecontent">0819 3289 1370</p>
                </div>
            </div>
        </div>
    </div>



        
    

@endsection

@section('extra-js')

@endsection
