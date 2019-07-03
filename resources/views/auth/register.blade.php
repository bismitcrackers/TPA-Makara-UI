@extends('layout/master')

@section('title', 'Register TPA Makara UI')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <div class="picture-logo">
        <img src="{{asset('picture/logoTPAM.png')}}" alt="Logo TPAM">
    </div>
    <h1 class = "title">Welcome to TPA Makara UI!</h1>
    <div class="register-anak">
        <h2>Data Anak</h2>
        <h2>Taman Pengembangan Anak Makara</h2>
    </div>
    <h1 class = "sign-in">Sign Up</h1>
    <form method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

        <div class="tab">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" aria-describedby="emailHelp" placeholder="Email" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="Password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="password-confirm">Repeat Password</label>
                <input id="password-confirm" type="password" class="form-control {{$errors->has('password_confirmation') ?  ' is-invalid' : ' '}}"  name="password_confirmation" required>
                @if ($errors->has('password_confimation'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password_confimation') }}</strong>
                    </span>
                @endif
            </div>

            <div class=button-section>
                <button class="halo btn-primary btn" onclick = "nextPrev(1)" >Sign Up</button>
            </div>
            <p class="bottom-auth">Already have an account?
                <a href="{{ route('login') }}">Login</a>
            </p>
        </div>


        <div class="tab">
            <div class="form-group">
                <label for=""><u>DATA ANAK</u></label>
            </div>
            <div class="form-group">
                <label for="namaLengkap">Nama Lengkap: </label>
                <input type="text" class="form-control{{ $errors->has('namaLengkap') ? ' is-invalid' : '' }}" id="namaLengkap" name="namaLengkap" placeholder="Nama Lengkap" required>
                @if ($errors->has('namaLengkap'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('namaLengkap') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="namaPanggilan">Nama Panggilan: </label>
                <input type="text" class="form-control{{ $errors->has('namaPanggilan') ? ' is-invalid' : '' }}" id="namaPanggilan" name="namaPanggilan" placeholder="Nama Panggilan" required>
                @if ($errors->has('namaPanggilan'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('namaPanggilan') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group row shorter">
                <label for="jenisKelamin" class="col-auto mr-auto col-form-label">Jenis Kelamin:</label>
                <div class="col-auto">
                    <select class="form-control{{ $errors->has('jenisKelamin') ? ' is-invalid' : '' }}" id="jenisKelamin" name="jenisKelamin" required>
                        <option value="laki-laki">👦 Laki-laki</option>
                        <option value="perempuan">👧 Perempuan</option>
                    </select>
                    @if ($errors->has('jenisKelamin'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('jenisKelamin') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-auto mr-auto">
                        <label for="tempatLahir" class="col-form-label">Tempat tanggal lahir:</label>
                    </div>
                    <div class="col-auto">
                        <input type="date" class="form-control{{ $errors->has('tanggalLahir') ? ' is-invalid' : '' }}" id="tanggalLahir" name="tanggalLahir"  data-date-format="DD MM YYYY" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <input type="text" class="form-control{{ $errors->has('tempatLahir') ? ' is-invalid' : '' }}" id="tempatLahir" name="tempatLahir" placeholder="Tempat Lahir" required>
                        @if ($errors->has('tanggalLahir'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('tanggalLahir') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="usia">Usia: </label>
                <input type="number" class="form-control{{ $errors->has('usia') ? ' is-invalid' : '' }}" id="usia" name="usia" placeholder="Usia" required>
                @if ($errors->has('usia'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('usia') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="agama">Agama: </label>
                <input type="text" class="form-control{{ $errors->has('agama') ? ' is-invalid' : '' }}" id="agama" name="agama" placeholder="Agama" required>
                @if ($errors->has('agama'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('agama') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="alamatRumah">Alamat Rumah: </label>
                <input type="text" class="form-control{{ $errors->has('alamatRumah') ? ' is-invalid' : '' }}" id="alamatRumah" name="alamatRumah" placeholder="Alamat Rumah" required>
                @if ($errors->has('alamatRumah'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('alamatRumah') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="teleponRumah">Telepon Rumah: </label>
                <input type="text" class="form-control{{ $errors->has('teleponRumah') ? ' is-invalid' : '' }}" id="teleponRumah" name="teleponRumah" placeholder="Telepon Rumah" required>
                @if ($errors->has('teleponRumah'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('teleponRumah') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group row">
                <label class = "col-sm-12">Keadaan Anak: </label>
                <label for="anakKe" class = "col-sm col-form-label short">Anak ke</label>
                <input type="number" class="form-control{{ $errors->has('anakKe') ? ' is-invalid' : '' }} col-sm-4" id="anakKe" name="anakKe" placeholder="Urutan" required>
                @if ($errors->has('anakKe'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('anakKe') }}</strong>
                    </span>
                @endif
                <label for="anakDari" class = "col-sm col-form-label short">dari</label>
                <input type="number" class="form-control{{ $errors->has('anakDari') ? ' is-invalid' : '' }} col-sm-4" id="anakDari" name="anakDari" placeholder="Total Anak" required>
                @if ($errors->has('anakDari'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('anakDari') }}</strong>
                    </span>
                @endif
            </div>
            <div class=button-section>
                <button class="halo btn-primary btn" onclick = "nextPrev(1)" >
                    <img src="{{asset('svg/checksign.svg')}}" alt="checksign">
                    Next
                </button>
            </div>
        </div>


        <div class="tab">
            <div class="form-group">
                <label for=""><u>DATA ANAK</u></label>
            </div>
            <div class="form-check">
                <p class="font-basic">Catatan Khusus Medis:</p>
                <input class="form-check-input{{ $errors->has('catatanMedis') ? ' is-invalid' : '' }}" type="radio" name="catatanMedis" id="tidakAda" value="tidak ada">
                @if ($errors->has('catatanMedis'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('catatanMedis') }}</strong>
                    </span>
                @endif
                <label class="form-check-label" for="tidakAda">
                    Tidak ada
                </label>
            </div>
            <div class="form-check">
                <input class="{{ $errors->has('catatanMedis') ? ' is-invalid' : '' }} form-check-input" type="radio" name="catatanMedis" id="ada" value="ada" required>
                <label class="form-check-label" for="ada">
                    Ada, keterangan:
                </label>
            </div>
            <div class="form-group">
                <input type="text" class="form-control {{ $errors->has('keteranganMedis') ? ' is-invalid' : '' }}" id="keteranganMedis" name="keteranganMedis" placeholder="Keterangan medis">
                @if ($errors->has('keteranganMedis'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('keteranganMedis') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="penyakit">Penyakit Berat yang Pernah Dialami Anak: </label>
                <input type="text" class="form-control{{ $errors->has('penyakit') ? ' is-invalid' : '' }}" id="penyakit" name="penyakit">
                @if ($errors->has('penyakit'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('penyakit') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="keadaan">Keadaan yang Perlu Mendapat Perhatian Khusus TPAM: </label>
                <input type="text" class="form-control{{ $errors->has('keadaan') ? ' is-invalid' : '' }}" id="keadaan" name="keadaan">
                @if ($errors->has('keadaan'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('keadaan') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="sifatBaik">Sifat-sifat baik/positif yang paling menonjol:</label>
                <input type="text" class="form-control{{ $errors->has('sifatBaik') ? ' is-invalid' : '' }}" id="sifatBaik" name="sifatBaik">
                @if ($errors->has('sifatBaik'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('sifatBaik') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="sifatPerhatian">Sifat-sifat anak yang masih perlu mendapatkan perhatian:</label>
                <input type="text" class="form-control{{ $errors->has('sifatPerhatian') ? ' is-invalid' : '' }}" id="sifatPerhatian" name="sifatPerhatian">
                @if ($errors->has('sifatPerhatian'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('sifatPerhatian') }}</strong>
                    </span>
                @endif
            </div>
            <div class=button-section>
                <button class="halo btn-primary btn" onclick = "nextPrev(1)">
                    <img src="{{asset('svg/checksign.svg')}}" alt="checksign">
                    Next
                </button>
            </div>
        </div>


        <div class="tab">
            <div class="form-group">
                <label for=""><u>DATA IBU</u></label>
            </div>
            <div class="form-group">
                <label for="namaLengkapIbu">Nama Lengkap: </label>
                <input type="text" class="form-control{{ $errors->has('namaLengkapIbu') ? ' is-invalid' : '' }}" id="namaLengkapIbu" name="namaLengkapIbu" placeholder="Nama Lengkap" required>
                @if ($errors->has('namaLengkapIbu'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('namaLengkapIbu') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-auto mr-auto">
                        <label for="tempatLahirIbu" class="col-form-label">Tempat tanggal lahir:</label>
                    </div>
                    <div class="col-auto">
                        <input type="date" class="form-control{{ $errors->has('tanggalLahirIbu') ? ' is-invalid' : '' }}" id="tanggalLahirIbu" name="tanggalLahirIbu" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <input type="text" class="form-control{{ $errors->has('tempatLahirIbu') ? ' is-invalid' : '' }}" id="tempatLahirIbu" name="tempatLahirIbu" placeholder="Tempat Lahir" required>
                        @if ($errors->has('tanggalLahir'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('tanggalLahirIbu') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="agamaIbu">Agama: </label>
                <input type="text" class="form-control{{ $errors->has('agamaIbu') ? ' is-invalid' : '' }}" id="agamaIbu" name="agamaIbu" placeholder="Agama">
                @if ($errors->has('agamaIbu'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('agamaIbu') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="pendidikanTerakhirIbu">Pendidikan terkahir: </label>
                <input type="text" class="form-control{{ $errors->has('pendidikanTerakhirIbu') ? ' is-invalid' : '' }}" id="pendidikanTerakhirIbu" name="pendidikanTerakhirIbu" placeholder="Pendidikan Terakhir" required>
                @if ($errors->has('pendidikanTerakhirIbu'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('pendidikanTerakhirIbu') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="jurusanIbu">Jurusan: </label>
                <input type="text" class="form-control{{ $errors->has('jurusanIbu') ? ' is-invalid' : '' }}" id="jurusanIbu" name="jurusanIbu" placeholder="Jurusan">
                @if ($errors->has('jurusanIbu'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('jurusanIbu') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="pekerjaanIbu">Pekerjaan: </label>
                <input type="text" class="form-control{{ $errors->has('pekerjaanIbu') ? ' is-invalid' : '' }}" id="pekerjaanIbu" name="pekerjaanIbu" placeholder="Pekerjaan">
                @if ($errors->has('pekerjaanIbu'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('pekerjaanIbu') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="alamatKerjaIbu">Alamat Kerja: </label>
                <input type="text" class="form-control{{ $errors->has('alamatKerjaIbu') ? ' is-invalid' : '' }}" id="alamatKerjaIbu" name="alamatKerjaIbu" placeholder="Alamat Kerja">
                @if ($errors->has('alamatKerjaIbu'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('alamatKerjaIbu') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="teleponKantorIbu">Telepon Kantor: </label>
                <input type="text" class="form-control{{ $errors->has('teleponKantorIbu') ? ' is-invalid' : '' }}" id="teleponKantorIbu" name="teleponKantorIbu" placeholder="Telepon Kantor">
                @if ($errors->has('teleponKantorIbu'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('teleponKantorIbu') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="emailIbu">Email: </label>
                <input type="email" class="form-control{{ $errors->has('emailIbu') ? ' is-invalid' : '' }}" id="emailIbu" name="emailIbu" placeholder="Email">
                @if ($errors->has('emailIbu'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('emailIbu') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="alamatRumahIbu">Alamat Rumah: </label>
                <input type="text" class="form-control{{ $errors->has('alamatRumahIbu') ? ' is-invalid' : '' }}" id="alamatRumahIbu" name="alamatRumahIbu" placeholder="Alamat Rumah" required>
                @if ($errors->has('alamatRumahIbu'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('alamatRumahIbu') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="nomorHpIbu">Nomor Handphone: </label>
                <input type="text" class="form-control{{ $errors->has('nomorHpIbu') ? ' is-invalid' : '' }}" id="nomorHpIbu" name="nomorHpIbu" placeholder="+628...">
                @if ($errors->has('nomorHpIbu'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nomorHpIbu') }}</strong>
                    </span>
                @endif
            </div>
            <div class=button-section>
                <button class="halo btn-primary btn" onclick = "nextPrev(1)">
                    <img src="{{asset('svg/checksign.svg')}}" alt="checksign">
                    Next
                </button>
            </div>
        </div>


        <div class="tab">
            <div class="form-group">
                <label for=""><u>DATA AYAH</u></label>
            </div>
            <div class="form-group">
                <label for="namaLengkapAyah">Nama Lengkap: </label>
                <input type="text" class="form-control{{ $errors->has('namaLengkapAyah') ? ' is-invalid' : '' }}" id="namaLengkapAyah" name="namaLengkapAyah" placeholder="Nama Lengkap" required>
                @if ($errors->has('namaLengkapAyah'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('namaLengkapAyah') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-auto mr-auto">
                        <label for="tempatLahirAyah" class="col-form-label">Tempat tanggal lahir:</label>
                    </div>
                    <div class="col-auto">
                        <input type="date" class="form-control{{ $errors->has('tanggalLahirAyah') ? ' is-invalid' : '' }}" id="tanggalLahirAyah" name="tanggalLahirAyah" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <input type="text" class="form-control{{ $errors->has('tempatLahirAyah') ? ' is-invalid' : '' }}" id="tempatLahirAyah" name="tempatLahirAyah" placeholder="Tempat Lahir" required>
                        @if ($errors->has('tanggalLahirAyah'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('tanggalLahirAyah') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="agamaAyah">Agama: </label>
                <input type="text" class="form-control{{ $errors->has('agamaAyah') ? ' is-invalid' : '' }}" id="agamaAyah" name="agamaAyah" placeholder="Agama">
                @if ($errors->has('agamaAyah'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('agamaAyah') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="pendidikanTerakhirAyah">Pendidikan terkahir: </label>
                <input type="text" class="form-control{{ $errors->has('pendidikanTerakhirAyah') ? ' is-invalid' : '' }}" id="pendidikanTerakhirAyah" name="pendidikanTerakhirAyah" placeholder="Pendidikan Terakhir" required>
                @if ($errors->has('pendidikanTerakhirAyah'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('pendidikanTerakhirAyah') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="jurusanAyah">Jurusan: </label>
                <input type="text" class="form-control{{ $errors->has('jurusanAyah') ? ' is-invalid' : '' }}" id="jurusanAyah" name="jurusanAyah" placeholder="Jurusan">
                @if ($errors->has('jurusanAyah'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('jurusanAyah') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="pekerjaanAyah">Pekerjaan: </label>
                <input type="text" class="form-control{{ $errors->has('pekerjaanAyah') ? ' is-invalid' : '' }}" id="pekerjaanAyah" name="pekerjaanAyah" placeholder="Pekerjaan">
            </div>
            <div class="form-group">
                <label for="alamatKerjaAyah" >Alamat Kerja: </label>
                <input type="text" class="form-control{{ $errors->has('alamatKerjaAyah') ? ' is-invalid' : '' }}" id="alamatKerjaAyah" name="alamatKerjaAyah" placeholder="Alamat Kerja">
                @if ($errors->has('alamatKerjaAyah'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('alamatKerjaAyah') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="teleponKantorAyah">Telepon Kantor: </label>
                <input type="text" class="form-control{{ $errors->has('teleponKantorAyah') ? ' is-invalid' : '' }}" id="teleponKantorAyah" name="teleponKantorAyah" placeholder="Telepon Kantor">
                @if ($errors->has('teleponKantorAyah'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('teleponKantorAyah') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="emailAyah">Email: </label>
                <input type="email" class="form-control{{ $errors->has('emailAyah') ? ' is-invalid' : '' }}" id="emailAyah" name="emailAyah" placeholder="Email">
                @if ($errors->has('emailAyah'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('emailAyah') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="alamatRumahAyah">Alamat Rumah: </label>
                <input type="text" class="form-control{{ $errors->has('alamatRumahAyah') ? ' is-invalid' : '' }}" id="alamatRumahAyah" name="alamatRumahAyah" placeholder="Alamat Rumah" required>
                @if ($errors->has('alamatRumahAyah'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('alamatRumahAyah') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="nomorHpAyah">Nomor Handphone: </label>
                <input type="text" class="form-control{{ $errors->has('nomorHpAyah') ? ' is-invalid' : '' }}" id="nomorHpAyah" name="nomorHpAyah" placeholder="+628...">
                @if ($errors->has('nomorHpAyah'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nomorHpAyah') }}</strong>
                    </span>
                @endif
            </div>
            <div class=button-section>
                <button class="halo btn-primary btn" onclick = "nextPrev(1)">
                    <img src="{{asset('svg/checksign.svg')}}" alt="checksign">
                    Next
                </button>
            </div>
        </div>


        <div class="tab">
            <div class="form-group">
                <label for=""><u>DATA WALI</u></label>
            </div>
            <div class="form-group">
                <label for="namaLengkapWali">Nama Lengkap: </label>
                <input type="text" class="form-control{{ $errors->has('namaLengkapWali') ? ' is-invalid' : '' }}" id="namaLengkapWali" name="namaLengkapWali" placeholder="Nama Lengkap">
                @if ($errors->has('namaLengkapWali'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('namaLengkapWali') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-auto mr-auto">
                        <label for="tempatLahirWali" class="col-form-label">Tempat tanggal lahir:</label>
                    </div>
                    <div class="col-auto">
                        <input type="date" class="form-control{{ $errors->has('tanggalLahirWali') ? ' is-invalid' : '' }}" id="tanggalLahirWali" name="tanggalLahirWali">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="text" class="form-control{{ $errors->has('tempatLahirWali') ? ' is-invalid' : '' }}" id="tempatLahirWali" name="tempatLahirWali" placeholder="Tempat Lahir">
                        @if ($errors->has('tanggalLahirWali'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('tanggalLahirWali') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="agamaWali">Agama: </label>
                <input type="text" class="form-control{{ $errors->has('agamaWali') ? ' is-invalid' : '' }}" id="agamaWali" name="agamaWali" placeholder="Agama">
                @if ($errors->has('agamaWali'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('agamaWali') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="pendidikanTerakhirWali">Pendidikan terkahir: </label>
                <input type="text" class="form-control{{ $errors->has('pendidikanTerakhirWali') ? ' is-invalid' : '' }}" id="pendidikanTerakhirWali" name="pendidikanTerakhirWali" placeholder="Pendidikan Terakhir">
                @if ($errors->has('pendidikanTerakhirWali'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('pendidikanTerakhirWali') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="jurusanWali">Jurusan: </label>
                <input type="text" class="form-control{{ $errors->has('jurusanWali') ? ' is-invalid' : '' }}" id="jurusanWali" name="jurusanWali" placeholder="Jurusan">
                @if ($errors->has('jurusanWali'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('jurusanWali') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="pekerjaanWali">Pekerjaan: </label>
                <input type="text" class="form-control{{ $errors->has('pekerjaanWali') ? ' is-invalid' : '' }}" id="pekerjaanWali" name="pekerjaanWali" placeholder="Pekerjaan">
                @if ($errors->has('pekerjaanWali'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('pekerjaanWali') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="alamatKerjaWali">Alamat Kerja: </label>
                <input type="text" class="form-control{{ $errors->has('alamatKerjaWali') ? ' is-invalid' : '' }}" id="alamatKerjaWali" name="alamatKerjaWali" placeholder="Alamat Kerja">
                @if ($errors->has('alamatKerjaWali'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('alamatKerjaWali') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="teleponKantorWali">Telepon Kantor: </label>
                <input type="text" class="form-control{{ $errors->has('teleponKantorWali') ? ' is-invalid' : '' }}" id="teleponKantorWali" name="teleponKantorWali" placeholder="Telepon Kantor">
                @if ($errors->has('teleponKantorWali'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('teleponKantorWali') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="emailWali">Email: </label>
                <input type="email" class="form-control{{ $errors->has('emailWali') ? ' is-invalid' : '' }}" id="emailWali" name="emailWali" placeholder="Email">
                @if ($errors->has('emailWali'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('emailWali') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="alamatRumahWali">Alamat Rumah: </label>
                <input type="text" class="form-control{{ $errors->has('alamatRumahWali') ? ' is-invalid' : '' }}" id="alamatRumahWali" name="alamatRumahWali" placeholder="Alamat Rumah">
                @if ($errors->has('alamatRumahWali'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('alamatRumahWali') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="nomorHpWali">Nomor Handphone: </label>
                <input type="text" class="form-control{{ $errors->has('nomorHpWali') ? ' is-invalid' : '' }}" id="nomorHpWali" name="nomorHpWali" placeholder="+628...">
                @if ($errors->has('nomorHpWali'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nomorHpWali') }}</strong>
                    </span>
                @endif
            </div>
            <div class=button-section>
                <button class="halo btn-primary btn" onclick = "nextPrev(1)">
                    <img src="{{asset('svg/checksign.svg')}}" alt="checksign">
                    Next
                </button>
            </div>
        </div>


        <div class="tab">
            <div class="form-group">
                <label for=""><u>ANGGOTA KELUARGA YANG DAPAT DIHUBUNGI SELAIN ORANG TUA DAN WALI</u></label>
            </div>
            <div class="form-group">
                <label for="namaLengkapNonWali">Nama Lengkap: </label>
                <input type="text" class="form-control{{ $errors->has('namaLengkapNonWali') ? ' is-invalid' : '' }}" id="namaLengkapNonWali" name="namaLengkapNonWali" placeholder="Nama Lengkap">
                @if ($errors->has('namaLengkapNonWali'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('namaLengkapNonWali') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="teleponRumahNonWali">Telepon Rumah: </label>
                <input type="text" class="form-control{{ $errors->has('teleponRumahNonWali') ? ' is-invalid' : '' }}" id="teleponRumahNonWali" name="teleponRumahNonWali" placeholder="Telepon Rumah">
                @if ($errors->has('teleponRumahNonWali'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('teleponRumahNonWali') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="nomorHpNonWali">Nomor Handphone: </label>
                <input type="text" class="form-control{{ $errors->has('nomorHpNonWali') ? ' is-invalid' : '' }}" id="nomorHpNonWali" name="nomorHpNonWali" placeholder="+628...">
                @if ($errors->has('nomorHpNonWali'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nomorHpNonWali') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="emailNonWali">Email: </label>
                <input type="email" class="form-control{{ $errors->has('emailNonWali') ? ' is-invalid' : '' }}" id="emailNonWali" name="emailNonWali" placeholder="Email">
                @if ($errors->has('emailNonWali'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('emailNonWali') }}</strong>
                    </span>
                @endif
            </div>
            <div class="button-section">
                <button type="submit" class="btn btn-primary" id = "final-button">
                    <img src="{{asset('svg/checksign.svg')}}" alt="checksign">
                    Save
                </button>
            </div>
        </div>
    </form>


@endsection

@section('extra-js')
    <!-- <script>
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
    </script> -->

    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        (document.getElementsByClassName("tab"))[currentTab].style.transform = "scale(1,1)";
        (document.getElementsByClassName("tab"))[currentTab].style.height = "100%";


        function nextPrev(n) {
            var x = document.getElementsByClassName("tab");
            if (n == 1 && !validateForm()) return false;
            x[currentTab].style.display = "none";
            currentTab += n;
            console.log(currentTab);
            x[currentTab].style.transform = "scale(1,1)";
            x[currentTab].style.height = "100%";

        }


        // function validateForm() {
        // // This function deals with validation of the form fields
        //     var x, y, i, valid = true;
        //     x = document.getElementsByClassName("tab");
        //     y = x[currentTab].getElementsByTagName("input");
        //     // A loop that checks every input field in the current tab:
        //     for (i = 0; i < y.length; i++) {
        //         // If a field is empty...
        //         if (y[i].value == "") {
        //         // add an "invalid" class to the field:
        //         y[i].className += " invalid";
        //         // and set the current valid status to false:
        //         valid = false;
        //         console.log("false");
        //         }
        //     }
        //     console.log("true");
        //     return valid; // return the valid status
        // }

        function validateForm() {
        // This function deals with validation of the form fields
            var x, y, i, test, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");

            // Function that verify
            if(y[0].name==="email"){
                for (i = 0; i < y.length; i++) {
                    if (y[i].value == "") {
                        // add an "invalid" class to the field:
                        y[i].style.background="#ffdddd";
                        y[i].placeholder = "Input invalid!"
                        // and set the current valid status to false:
                        valid = false;
                        console.log("false");
                    }
                    else{
                        y[i].style.background = "white";
                    }
                }

                if (y[0].value.search(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/) == -1){
                    y[0].style.background="#ffdddd"
                    y[0].placeholder  = "Email invalid";
                    valid = false;
                    console.log("false");
                }

                if (y[1].value!=y[2].value){
                    y[2].style.background="#ffdddd"
                    y[2].placeholder = "Password berbeda";
                    valid = false;
                    console.log("false");
                }
                // else if (y[2].value!=""){
                //     y[2].style.background="white";
                // }
                
            }

            else if(y[0].type=="radio"){
                for (i = 0; i < y.length; i++) {
                    if(y[i].required == true){
                        if (y[i].value == "") {
                            // add an "invalid" class to the field:
                            y[i].style.background="#ffdddd";
                            y[i].placeholder = "Input invalid!"
                            // and set the current valid status to false:
                            valid = false;
                            console.log("false");
                        }
                        else{
                            y[i].style.background = "white";
                        }
                    }
                }

                if(!(y[0].checked||y[1].checked)){
                    y[0].style.background="#ffdddd";
                    // and set the current valid status to false:
                    valid = false;
                    console.log("false");
                }
            }

            else{
                for (i = 0; i < y.length; i++) {
                    if(y[i].required == true){
                        if (y[i].value == "") {
                            // add an "invalid" class to the field:
                            y[i].style.background="#ffdddd";
                            y[i].placeholder = "Input invalid!"
                            // and set the current valid status to false:
                            valid = false;
                            console.log("false");
                        }
                        else{
                            y[i].style.background = "white";
                        }
                    }
                    
                    else if(y[i].type=="email"){
                        if (y[i].value==""){}
                        else{
                            if(y[i].value.search(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/) == -1){
                                y[i].style.background="#ffdddd"
                                y[i].placeholder  = "Email invalid";
                                valid = false;
                                console.log("false");
                            }
                        }
                    }
                }
            }
            console.log(valid);
            return valid; // return the valid status
        }

  
    </script>

@endsection
