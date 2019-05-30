@extends('layout/master')

@section('title', 'Login')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-0 col-md-2"></div>

                <div class="col-sm-12 col-md-8">

                    <div class="container-inner">
                        <div class="picture-logo">
                       <img src="{{asset('svg/logo.svg')}}" alt="">
                    </div>
                    <h1 class = "title">Welcome to TPA Makara UI!</h1>
                    <div class="register-anak">
                        <h2>Data Anak</h2>
                        <h2>Taman Pengembangan Anak Makara</h2>
                    </div>
                    <h1 class = "sign-in">Sign Up</h1>
                    <form>
                        <div class="register">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleRepeatPassword1">Repeat Password</label>
                                <input type="password" class="form-control" id="exampleRepeatPassword1" placeholder="Repeat Password">
                            </div>
                            <div class=button-section>
                                <button type="submit" class="btn btn-primary">Sign Up</button>
                            </div>
                        </div>
                        <div class="register-anak">
                            <div class="form-group">
                                <label for=""><u>DATA ANAK</u></label>
                            </div>
                            <div class="form-group">
                                <label for="namaLengkap">Nama Lengkap: </label>
                                <input type="namaLengkap" class="form-control" id="namaLengkap" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <label for="namaPanggilan">Nama Panggilan: </label>
                                <input type="namaPanggilan" class="form-control" id="namaPanggilan" placeholder="Nama Panggilan">
                            </div>
                            <div class="form-group row shorter">
                                <label for="jenisKelamin" class="col-sm-10 col-form-label">Jenis Kelamin:</label>
                                <div class="col-sm-2">
                                    <select class="form-control" id="jenisKelamin">
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tempatTanggalLahir" class="col-sm-10 col-form-label">Tempat tanggal lahir:</label>
                                <div class="col-sm-2">
                                    <select class="form-control" id="tempatTanggalLahir">
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="usia">Usia: </label>
                                <input type="usia" class="form-control" id="usia" placeholder="Usia">
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama: </label>
                                <input type="agama" class="form-control" id="agama" placeholder="Agama">
                            </div>
                            <div class="form-group">
                                <label for="alamatRumah">Alamat Rumah: </label>
                                <input type="alamatRumah" class="form-control" id="alamatRumah" placeholder="Alamat Rumah">
                            </div>
                            <div class="form-group">
                                <label for="teleponRumah">Telepon Rumah: </label>
                                <input type="teleponRumah" class="form-control" id="teleponRumah" placeholder="Telepon Rumah">
                            </div>
                            <div class="form-group row">
                                <label class = "col-sm-12">Keadaan Anak: </label>
                                <label for="anakKe" class = "col-sm col-form-label">Anak ke</label>
                                <input type="anakKe" class="form-control col-sm-4" id="anakKe" placeholder="Anak Ke">
                                <label for="anakDari" class = "col-sm col-form-label">dari</label>
                                <input type="anakDari" class="form-control col-sm-4" id="anakDari" placeholder="dari">
                            </div>
                            <div class=button-section>
                                <button type="submit" class="btn btn-primary">Sign Up</button>
                            </div>
                        </div>
                    </form>
                    <p class="bottom-auth">Already have an account? <a href="{{ route('login') }}">Login</a></p>
                </div>
                
            </div>

            <div class="col-sm-0 col-md-2"></div>
        </div>
    </div>
@endsection

@section('extra-js')

@endsection