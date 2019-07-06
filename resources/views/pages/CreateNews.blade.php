@extends('layout/master')

@section('title', 'Homepage')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <form action="/admin/berita" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div id="beritaForm">
                <a href="" class="tambahfoto d-flex justify-content-center dcinput" onclick="burninput()">
                    <span>Tambah Foto</span>
                    <img src="{{asset('svg/plus.svg')}}" alt="nextsign">
                </a>
                <input type="file" id="inputfile" name="fotoBerita">
                <div class="dcinput">
                    aaa
                </div>
                <h2 class="title">JUDUL BERITA</h2>
                <div class="form-group">
                    <textarea class="form-control dcinput" id="" name="judulBerita"></textarea>
                </div>
                <h2 class="title">ISI BERITA</h2>
                <div class="form-group ">
                    <textarea class="form-control dcinput" id="" name="isiBerita"></textarea>
                </div>
                <button type="submit" class="btn btn-primary dcbutton d-flex justify-content-center" >
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