@extends('layout/master')

@section('title', 'Register TPA Makara UI')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    {{-- <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-0 col-md-2"></div>

                <div class="col-sm-12 col-md-8"> --}}

                    <div class="container-inner">
                    <div class="picture-logo">
                       <img src="{{asset('picture/logoTPAM.png')}}" alt="Logo TPAM">
                    </div>
                    <h1 class = "title">Welcome to TPA Makara UI!</h1>
                    <div class="register-anak">
                        <h2>Data Anak</h2>
                        <h2>Taman Pengembangan Anak Makara</h2>
                    </div>
                    <h1 class = "sign-in">Sign Up</h1>
                    <form action="{{ route('success') }}">
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
                                <a class="halo btn-primary btn" onclick = "toRegistrasiAnakFirst()" href="#">Sign Up</a>
                            </div>
                        </div>
                        <div class="registrasi-anak-first">
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
                                <label for="anakKe" class = "col-sm col-form-label short">Anak ke</label>
                                <input type="anakKe" class="form-control col-sm-4" id="anakKe" placeholder="Anak Ke">
                                <label for="anakDari" class = "col-sm col-form-label short">dari</label>
                                <input type="anakDari" class="form-control col-sm-4" id="anakDari" placeholder="dari">
                            </div>
                            <div class=button-section>
                                <a class="halo btn-primary btn" onclick = "toRegistrasiAnakSecond()" href="#">
                                    <img src="{{asset('svg/checksign.svg')}}" alt="checksign">
                                    Next
                                </a>
                            </div>
                        </div>
                        <div class="registrasi-anak-second">
                            <div class="form-group">
                                <label for=""><u>DATA ANAK</u></label>
                            </div>
                            <div class="form-check">
                                <p class="font-basic">Catatan Khusus Medis:</p>
                                <input class="form-check-input correcting" type="radio" name="catatan" id="tidakAda" value="option1">
                                <label class="form-check-label" for="tidakAda">
                                    Tidak ada
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input correcting" type="radio" name="catatan" id="ada" value="option2">
                                <label class="form-check-label" for="ada">
                                    Ada, keterangan:
                                </label>
                                {{-- belum jalan validation radio buttonnya --}}
                                <input type="adaKeterangan" class="form-control" id="adaKeterangan">
                            </div>
                            <div class="form-group">
                                <label for="penyakit">Penyakit Berat yang Pernah Dialami Anak: </label>
                                <input type="penyakit" class="form-control" id="penyakit">
                            </div>
                            <div class="form-group">
                                <label for="keadaan">Keadaan yang Perlu Mendapat Perhatian Khusus TPAM: </label>
                                <input type="keadaan" class="form-control" id="keadaan">
                            </div>
                            <div class="form-group">
                                <label for="sifatPerhatian">Sifat-sifat anak yang masih perlu mendapatkan perhatian:</label>
                                <input type="sifatPerhatian" class="form-control" id="sifatPerhatian">
                            </div>
                            <div class=button-section>
                                <a class="halo btn-primary btn" onclick = "toRegistrasiIbu()" href="#">
                                    <img src="{{asset('svg/checksign.svg')}}" alt="checksign">
                                    Next
                                </a>
                            </div>
                        </div>
                        <div class="registrasi-ibu">
                            <div class="form-group">
                                <label for=""><u>DATA IBU</u></label>
                            </div>
                            <div class="form-group">
                                <label for="namaLengkapIbu">Nama Lengkap: </label>
                                <input type="namaLengkapIbu" class="form-control" id="namaLengkapIbu" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group row">
                                <label for="tempatTanggalLahirIbu" class="col-sm-10 col-form-label">Tempat tanggal lahir:</label>
                                <div class="col-sm-2">
                                    <select class="form-control" id="tempatTanggalLahirIbu">
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>
                                <input type="tempatLahirIbu" class="form-control" id="tempatLahirIbu" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="agamaIbu">Agama: </label>
                                <input type="agamaIbu" class="form-control" id="agamaIbu" placeholder="Agama">
                            </div>
                            <div class="form-group">
                                <label for="pendidikanTerakhirIbu">Pendidikan terkahir: </label>
                                <input type="pendidikanTerakhirIbu" class="form-control" id="pendidikanTerakhirIbu" placeholder="Pendidikan Terakhir">
                            </div>
                            <div class="form-group">
                                <label for="jurusanIbu">Jurusan: </label>
                                <input type="jurusanIbu" class="form-control" id="jurusanIbu" placeholder="Jurusan">
                            </div>
                            <div class="form-group">
                                <label for="pekerjaanIbu">Pekerjaan: </label>
                                <input type="pekerjaanIbu" class="form-control" id="pekerjaanIbu" placeholder="Pekerjaan">
                            </div>
                            <div class="form-group">
                                <label for="alamatKerjaIbu">Alamat Kerja: </label>
                                <input type="alamatKerjaIbu" class="form-control" id="alamatKerjaIbu" placeholder="Alamat Kerja">
                            </div>
                            <div class="form-group">
                                <label for="teleponKantorIbu">Telepon Kantor: </label>
                                <input type="teleponKantorIbu" class="form-control" id="teleponKantorIbu" placeholder="Telepon Kantor">
                            </div>
                            <div class="form-group">
                                <label for="emailIbu">Email: </label>
                                <input type="emailIbu" class="form-control" id="emailIbu" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="alamatRumahIbu">Alamat Rumah: </label>
                                <input type="alamatRumahIbu" class="form-control" id="alamatRumahIbu" placeholder="Alamat Rumah">
                            </div>
                            <div class="form-group">
                                <label for="nomorHpIbu">Nomor Handphone: </label>
                                <input type="nomorHpIbu" class="form-control" id="nomorHpIbu" placeholder="+628...">
                            </div>
                            <div class=button-section>
                                <a class="halo btn-primary btn" onclick = "toRegistrasiAyah()" href="#">
                                    <img src="{{asset('svg/checksign.svg')}}" alt="checksign">
                                    Next
                                </a>
                            </div>
                        </div>
                        <div class="registrasi-ayah">
                            <div class="form-group">
                                <label for=""><u>DATA AYAH</u></label>
                            </div>
                            <div class="form-group">
                                <label for="namaLengkapAyah">Nama Lengkap: </label>
                                <input type="namaLengkapAyah" class="form-control" id="namaLengkapAyah" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group row">
                                <label for="tempatTanggalLahirAyah" class="col-sm-10 col-form-label">Tempat tanggal lahir:</label>
                                <div class="col-sm-2">
                                    <select class="form-control" id="tempatTanggalLahirAyah">
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>
                                <input type="tempatLahirAyah" class="form-control" id="tempatLahirAyah" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="agamaAyah">Agama: </label>
                                <input type="agamaAyah" class="form-control" id="agamaAyah" placeholder="Agama">
                            </div>
                            <div class="form-group">
                                <label for="pendidikanTerakhirAyah">Pendidikan terkahir: </label>
                                <input type="pendidikanTerakhirAyah" class="form-control" id="pendidikanTerakhirAyah" placeholder="Pendidikan Terakhir">
                            </div>
                            <div class="form-group">
                                <label for="jurusanAyah">Jurusan: </label>
                                <input type="jurusanAyah" class="form-control" id="jurusanAyah" placeholder="Jurusan">
                            </div>
                            <div class="form-group">
                                <label for="pekerjaanAyah">Pekerjaan: </label>
                                <input type="pekerjaanAyatext" class="form-control" id="pekerjaanAyah" placeholder="Pekerjaan">
                            </div>
                            <div class="form-group">
                                <label for="alamatKerjaAyah" >Alamat Kerja: </label>
                                <input type="alamatKerjaAyah" class="form-control" id="alamatKerjaAyah" placeholder="Alamat Kerja">
                            </div>
                            <div class="form-group">
                                <label for="teleponKantorAyah">Telepon Kantor: </label>
                                <input type="teleponKantorAyah" class="form-control" id="teleponKantorAyah" placeholder="Telepon Kantor">
                            </div>
                            <div class="form-group">
                                <label for="emailAyah">Email: </label>
                                <input type="emailAyah" class="form-control" id="emailAyah" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="alamatRumahAyah">Alamat Rumah: </label>
                                <input type="alamatRumahAyah" class="form-control" id="alamatRumahAyah" placeholder="Alamat Rumah">
                            </div>
                            <div class="form-group">
                                <label for="nomorHpAyah">Nomor Handphone: </label>
                                <input type="nomorHpAyah" class="form-control" id="nomorHpAyah" placeholder="+628...">
                            </div>
                            <div class=button-section>
                                <a class="halo btn-primary btn" onclick = "toRegistrasiWali()" href="#">
                                    <img src="{{asset('svg/checksign.svg')}}" alt="checksign">
                                    Next
                                </a>
                            </div>
                        </div>
                        <div class="registrasi-wali">
                            <div class="form-group">
                                <label for=""><u>DATA WALI</u></label>
                            </div>
                            <div class="form-group">
                                <label for="namaLengkapWali">Nama Lengkap: </label>
                                <input type="namaLengkapWali" class="form-control" id="namaLengkapWali" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group row">
                                <label for="tempatTanggalLahirWali" class="col-sm-10 col-form-label">Tempat tanggal lahir:</label>
                                <div class="col-sm-2">
                                    <select class="form-control" id="tempatTanggalLahirWali">
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>
                                <input type="tempatLahirWali" class="form-control" id="tempatLahirWali" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="agamaWali">Agama: </label>
                                <input type="agamaWali" class="form-control" id="agamaWali" placeholder="Agama">
                            </div>
                            <div class="form-group">
                                <label for="pendidikanTerakhirWali">Pendidikan terkahir: </label>
                                <input type="pendidikanTerakhirWali" class="form-control" id="pendidikanTerakhirWali" placeholder="Pendidikan Terakhir">
                            </div>
                            <div class="form-group">
                                <label for="jurusanWali">Jurusan: </label>
                                <input type="jurusanWali" class="form-control" id="jurusanWali" placeholder="Jurusan">
                            </div>
                            <div class="form-group">
                                <label for="pekerjaanWali">Pekerjaan: </label>
                                <input type="pekerjaanWali" class="form-control" id="pekerjaanWali" placeholder="Pekerjaan">
                            </div>
                            <div class="form-group">
                                <label for="alamatKerjaWali">Alamat Kerja: </label>
                                <input type="alamatKerjaWali" class="form-control" id="alamatKerjaWali" placeholder="Alamat Kerja">
                            </div>
                            <div class="form-group">
                                <label for="teleponKantorWali">Telepon Kantor: </label>
                                <input type="teleponKantorWali" class="form-control" id="teleponKantorWali" placeholder="Telepon Kantor">
                            </div>
                            <div class="form-group">
                                <label for="emailWali">Email: </label>
                                <input type="emailWali" class="form-control" id="emailWali" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="alamatRumahWali">Alamat Rumah: </label>
                                <input type="alamatRumahWali" class="form-control" id="alamatRumahWali" placeholder="Alamat Rumah">
                            </div>
                            <div class="form-group">
                                <label for="nomorHpWali">Nomor Handphone: </label>
                                <input type="nomorHpWali" class="form-control" id="nomorHpWali" placeholder="+628...">
                            </div>
                            <div class=button-section>
                                <a class="halo btn-primary btn" onclick = "toRegistrasiNonWali()" href="#">
                                    <img src="{{asset('svg/checksign.svg')}}" alt="checksign">
                                    Next
                                </a>
                            </div>
                        </div>
                        <div class="registrasi-non-wali">
                            <div class="form-group">
                                <label for=""><u>ANGGOTA KELUARGA YANG DAPAT DIHUBUNGI SELAIN ORANG TUA DAN WALI</u></label>
                            </div>
                            <div class="form-group">
                                <label for="namaLengkapNonWali">Nama Lengkap: </label>
                                <input type="namaLengkapNonWali" class="form-control" id="namaLengkapNonWali" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <label for="teleponRumahNonWali">Telepon Rumah: </label>
                                <input type="teleponRumahNonWali" class="form-control" id="teleponRumahNonWali" placeholder="Telepon Rumah">
                            </div>
                            <div class="form-group">
                                <label for="nomorHpNonWali">Nomor Handphone: </label>
                                <input type="nomorHpNonWali" class="form-control" id="nomorHpNonWali" placeholder="+628...">
                            </div>
                            <div class="form-group">
                                <label for="emailNonWali">Email: </label>
                                <input type="emailNonWali" class="form-control" id="emailNonWali" placeholder="Email">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id = "final-button">
                            <img src="{{asset('svg/checksign.svg')}}" alt="checksign">
                            Save
                        </button>
                    </form>
                    <p class="bottom-auth">Already have an account? <a href="{{ route('login') }}">Login</a></p>
                {{-- </div>
                
            </div>

            <div class="col-sm-0 col-md-2"></div>
        </div>
    </div> --}}
    @endsection
    
    @section('extra-js')
    <script>
            function toRegistrasiAnakFirst(){
                // disappear
                var listErase = new Array();
                var pictureLogo = (document.getElementsByClassName("picture-logo"))[0];
                var title = (document.getElementsByClassName("title"))[0];
                var signIn = (document.getElementsByClassName("sign-in"))[0];
                var register = (document.getElementsByClassName("register"))[0];
                var auth = (document.getElementsByClassName("bottom-auth"))[0];
                listErase.push(pictureLogo);
                listErase.push(title);
                listErase.push(signIn);
                listErase.push(register);
                listErase.push(auth);
                for (let i of listErase){
                    i.style.display = "none";
                    i.style.tranform = "scale(0,0)";
                    i.style.height = "0";
                }

                //appear
                var registerAnak = (document.getElementsByClassName("register-anak"))[0];
                var registrasiAnakFirst = (document.getElementsByClassName("registrasi-anak-first"))[0];
                registerAnak.style.transform = "scale(1,1)";
                registerAnak.style.height = "100%";
                registrasiAnakFirst.style.transform = "scale(1,1)";
                registrasiAnakFirst.style.height = "100%";
            }

            function toRegistrasiAnakSecond(){
                //disappear
                var registrasiAnakFirst = (document.getElementsByClassName("registrasi-anak-first"))[0];
                registrasiAnakFirst.style.display = "none";
                registrasiAnakFirst.style.transform = "scale(0,0)";
                registrasiAnakFirst.style.height = "0";

                //appear
                var registrasiAnakSecond = (document.getElementsByClassName("registrasi-anak-second"))[0];
                registrasiAnakSecond.style.transform = "scale(1,1)";
                registrasiAnakSecond.style.height = "100%";
            }

            function toRegistrasiIbu(){
                //disappear
                var registrasiAnakSecond = (document.getElementsByClassName("registrasi-anak-second"))[0];
                registrasiAnakSecond.style.display = "none";
                registrasiAnakSecond.style.transform = "scale(0,0)";
                registrasiAnakSecond.style.height = "0";


                //appear
                var registrasiIbu = (document.getElementsByClassName("registrasi-ibu"))[0];
                registrasiIbu.style.transform = "scale(1,1)";
                registrasiIbu.style.height = "100%";
            }

            function toRegistrasiAyah(){
                //disappear
                var registrasiIbu = (document.getElementsByClassName("registrasi-ibu"))[0];
                registrasiIbu.style.display = "none";
                registrasiIbu.style.transform = "scale(0,0)";
                registrasiIbu.style.height = "0";

                //appear
                var registrasiAyah = (document.getElementsByClassName("registrasi-ayah"))[0];
                registrasiAyah.style.transform = "scale(1,1)";
                registrasiAyah.style.height = "100%";
            }

            function toRegistrasiWali(){
                //disappear
                var registrasiAyah = (document.getElementsByClassName("registrasi-ayah"))[0];
                registrasiAyah.style.display = "none";
                registrasiAyah.style.transform = "scale(0,0)";
                registrasiAyah.style.height = "0";


                //appear
                var registrasiWali = (document.getElementsByClassName("registrasi-wali"))[0];
                registrasiWali.style.transform = "scale(1,1)";
                registrasiWali.style.height = "100%";
            }

            function toRegistrasiNonWali(){
                //disappear
                var registrasiWali = (document.getElementsByClassName("registrasi-wali"))[0];
                registrasiWali.style.display = "none";
                registrasiWali.style.transform = "scale(0,0)";
                registrasiWali.style.height = "0";


                //appear
                var registrasiNonWali = (document.getElementsByClassName("registrasi-non-wali"))[0];
                registrasiNonWali.style.transform = "scale(1,1)";
                registrasiNonWali.style.height = "100%";

                //button
                var finalButton = document.getElementById("final-button");
                finalButton.style.display = "block";
            }

</script>

@endsection