@extends('layout/master')

@section('title', 'Buat Komentar Buku Penghubung Daycare')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

    <div class="d-flex justify-content-center">
        <div class="komentar underliner">
            <h2>Bagian Komentar Orang Tua</h2>
            <h2>dengan Pihak TPAM</h2>
        </div>
    </div>

    <form action="{{route('komentar')}}">
        <h2 class="subbukupenghubung-title"><u>KOMENTAR</u></h2>
        <div class="form-group">
                <textarea class="form-control dcinput" id="snackdc" rows="5" placeholder="Komentar" maxlength="150"></textarea>
        </div>

        <div class="righter">
            <button type="submit" class="btn btn-primary dcbutton">
                    Send
                <img src="{{asset('svg/nextsign.svg')}}" alt="nextsign">
            </button>    
        </div>
    </form>

                    
@endsection
    
@section('extra-js')
    

@endsection