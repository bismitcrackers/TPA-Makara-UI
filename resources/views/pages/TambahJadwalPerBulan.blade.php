@extends('layout/master')

@section('title', 'List Student Kelas Bermain - GURU')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

    <div class="d-flex justify-content-center">
        <h1 class = "daftarsiswa-title underliner">
            Tambah Jadwal Perbulan
        </h1>
    </div>

    <div href="" class="tambahfoto d-flex justify-content-center dcinput tambahpdf" onclick="burninput()">
        <span>Tambah PDF</span>
        <img src="{{asset('svg/plus.svg')}}" alt="nextsign">
    </div>

    <input name="lampiran" type="file" id="inputfile">

    <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-primary editbuttoncancel d-flex justify-content-center">
            Cancel
        </button>
        <button type="submit" class="btn btn-primary editbutton d-flex justify-content-center">
            <p>Save</p>
            <img src="{{asset('svg/nextsign.svg')}}" alt="nextsign">
        </button>
    </div>


@endsection

@section('extra-js')

<script>
   function burninput(event){
            $("#inputfile").click();
   }
</script>

@endsection
