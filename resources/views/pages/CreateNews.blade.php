@extends('layout/master')

@section('title', 'Homepage')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    @if($route == 'edit')
    <form action="{{ route('admin.berita.update', ['id' => $berita->id]) }}" method="post" enctype="multipart/form-data">
    {{method_field('PATCH')}}
    @else
    <form action="{{ route('admin.berita.store') }}" method="post" enctype="multipart/form-data">
    @endif
        {{ csrf_field() }}
            <div id="beritaForm">
                <a href="#" class="tambahfoto d-flex justify-content-center dcinput" onclick="burninput()">
                    <span>Tambah Foto</span>
                    <img src="{{asset('svg/plus.svg')}}" alt="nextsign">
                </a>
                <input type="file" id="inputfile" name="fotoBerita">
                @if($route == 'edit')
                <div class="dcinput">
                    <img id="imgbuku" src="{{ asset($berita->gambar) }}">
                </div>
                @else
                <div class="dcinput">
                    <img id="imgbuku" src="">
                </div>
                @endif
                <h2 class="title">JUDUL BERITA</h2>
                <div class="form-group">
                    @if($route == 'edit')
                    <textarea class="form-control dcinput" id="" name="judulBerita">{{ $berita->judul }}</textarea>
                    @else
                    <textarea class="form-control dcinput" id="" name="judulBerita"></textarea>
                    @endif
                </div>
                <h2 class="title">ISI BERITA</h2>
                <div class="form-group ">
                    @if($route == 'edit')
                    <textarea class="form-control dcinput" id="" name="isiBerita">{{ $berita->isi }}</textarea>
                    @else
                    <textarea class="form-control dcinput" id="" name="isiBerita"></textarea>
                    @endif
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

        function readURL(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
              $('#imgbuku').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
          }
        }

        $("#inputfile").change(function() {
          readURL(this);
        });
    </script>
@endsection
