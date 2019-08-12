@extends('layout/master')

@section('title', 'Tambah Jadwal Perbulan')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

    <div class="d-flex justify-content-center">
        <h1 class = "daftarsiswa-title underliner">
            Tambah Jadwal Perbulan
        </h1>
    </div>

    @if($schedule == null)
    <form action="{{ route('profile.schedule.add') }}" method="post" enctype="multipart/form-data">
    @else
    <form action="{{ route('profile.schedule.edit', ['id', $schedule->id]) }}" method="post" enctype="multipart/form-data">
    @endif
        {{ csrf_field() }}
        <div href="" class="tambahfoto d-flex justify-content-center dcinput tambahpdf" onclick="burninput()">
            <span>Tambah PDF</span>
            <img src="{{asset('svg/plus.svg')}}" alt="nextsign">
        </div>

        <input name="schedule" type="file" id="inputfile">

        <input name="kelas" type="hidden" value="{{ $kelas }}">

        @if($schedule != null)
        <div class="dcinput">
            <img id="imgbuku" src="{{ asset($schedule->url_lampiran) }}">
        </div>
        @else
        <div class="dcinput">
            <img id="imgbuku" src="">
        </div>
        @endif

        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-primary editbuttoncancel d-flex justify-content-center">
                Cancel
            </button>
            <button type="submit" class="btn btn-primary editbutton d-flex justify-content-center">
                <p>Save</p>
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
