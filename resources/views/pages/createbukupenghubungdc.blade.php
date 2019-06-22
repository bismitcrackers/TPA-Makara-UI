@extends('layout/master')

@section('title', 'Create Buku Penghubung Daycare')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <h1 class = "bukupenghubung-title">
        Buku Penghubung
        <div class= "d-flex justify-content-center">
            <div class="underline"></div>
        </div>
    </h1>

    <form>
        <div class="tab">
            <div class="form-group">
                <label for="pembuatdc" class="dclabel">PEMBUAT</label>
                <input type="text" class="form-control dcinput" id="pembuatdc" aria-describedby="pembuat" placeholder="Nama Pembuat" autocapitalize="words">
            </div>
            <div class="form-group">
                <label for="tanggaldc" class="dclabel">TANGGAL</label>
                <input type="date" class="form-control dcinput" id="tanggaldc">
            </div>
            <div class="form-group">
                <label for="temadc" class="dclabel">TEMA</label>
                <input type="text" class="form-control dcinput" id="temadc" aria-describedby="tema" placeholder="Tema">
            </div>
            <div class="form-group">
                <label for="subtemadc" class="dclabel">SUBTEMA</label>
                <input type="text" class="form-control dcinput" id="subtemadc" aria-describedby="subtema" placeholder="Sub Tema">
            </div>
            <button type="button" class="btn btn-primary dcbutton d-flex justify-content-center">
                Next
                <img src="{{asset('svg/nextsign.svg')}}" alt="nextsign">
            </button>
        </div>

        <div class="tab">
            <h2 class="subbukupenghubung-title"><u>ASPEK</u></h2>
            <div class="centerer">
                <img src="{{asset('svg/fisik.svg')}}" class="dcimg" alt="fisik">
            </div>
            <div class="form-group">
                <label for="keterangandcfisik" class="dclabel ">KETERANGAN</label>
                <textarea class="form-control dcinput" id="keterangandcfisik" rows="5" placeholder="Keterangan Fisik" maxlength="150"></textarea>
            </div>
            <div class="centerer">
                <img src="{{asset('svg/kognitif.svg')}}" class="dcimg" alt="kognitif">
            </div>
            <div class="form-group">
                <label for="keterangandckognitif" class="dclabel">KETERANGAN</label>
                <textarea class="form-control dcinput" id="keterangandckognitif" rows="5" placeholder="Keterangan Kognitif" maxlength="150"></textarea>
            </div>
            <div class="centerer">
                <img src="{{asset('svg/sosial-emosi.svg')}}" class="dcimg" alt="sosial-emosi">
            </div>
            <div class="form-group">
                <label for="keterangandcfisiksosialem" class="dclabel">KETERANGAN</label>
                <textarea class="form-control dcinput" id="keterangandcsosialem" rows="5" placeholder="Keterangan Sosial-emosi" maxlength="150"></textarea>
            </div>
            <button type="button" class="btn btn-primary dcbutton d-flex justify-content-center">
                Next
                <img src="{{asset('svg/nextsign.svg')}}" alt="nextsign">
            </button>
        </div>

        <div class="tab">
            <h2 class="subbukupenghubung-title"><u>CATATAN</u></h2>
            <div class="form-group">
                <label for="snackdc" class="dclabel ">SNACK</label>
                <textarea class="form-control dcinput" id="snackdc" rows="5" placeholder="Snack" maxlength="150"></textarea>
            </div>
            <div class="form-group">
                <label for="makansiangdc" class="dclabel ">MAKAN SIANG</label>
                <textarea class="form-control dcinput" id="makansiangdc" rows="5" placeholder="Makan Siang" maxlength="150"></textarea>
            </div>
            <div class="form-group">
                <label for="tidursiangdc" class="dclabel ">TIDUR SIANG</label>
                <textarea class="form-control dcinput" id="tidursiangdc" rows="5" placeholder="Tidur Siang" maxlength="150"></textarea>
            </div>
            <h2 class="subbukupenghubung-title"><u>CATATAN KHUSUS</u></h2>
            <div class="form-group">
                <textarea class="form-control dcinput" id="catatankhususdc" rows="5" placeholder="Catatan Khusus" maxlength="150"></textarea>
            </div>
            <h2 class="subbukupenghubung-title"><u>LAMPIRAN</u></h2>
            <a href="" class="tambahfoto d-flex justify-content-center dcinput" onclick="burninput()">
                <span>Tambah Foto</span>
                <img src="{{asset('svg/plus.svg')}}" alt="nextsign">
            </a>
            <input type="file" id="inputfile">
            <button type="submit" class="btn btn-primary dcbutton d-flex justify-content-center">
                Save
                <img src="{{asset('svg/nextsign.svg')}}" alt="nextsign">
            </button>    
        </div>        
    </form>
    

@endsection

@section('extra-js')
    <script>
        function burninput(event){
            $("#inputfile").click();
        }
    </script>
@endsection
