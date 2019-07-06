@extends('layout/master')

@section('title', 'Komentar Buku Penghubung Daycare')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <div class="komentar">
        <h2>Bagian Komentar Orang Tua</h2>
        <h2>dengan Pihak TPAM</h2>
        <div class= "d-flex justify-content-center">
            <div class="underline"></div>
        </div>
    </div>

    @foreach($chats as $chat)
    @if($chat->user == auth()->user())
    <div class="righter">
        <div class = "d-inline-flex">
            <div class="dari">
                <p class="namapesan">{{ $chat->user()->first()->name }}</p>
                <p class="contentpesan">{{ $chat->message }}</p>
            </div>
        </div>
    </div>
    @else
    <div>
        <div class ="d-inline-flex">
            <div class="ke">
                <p class="namapesandark">{{ $chat->user()->first()->name }}</p>
                <p class="contentpesandark">{{ $chat->message }}</p>
            </div>
        </div>
    </div>
    @endif
    @endforeach

    <a href="{{ route('dailyBook.comments.send', ['daily_book_id' => $daily_book_id]) }}" class="tambahfoto tambahkomentar">
        <img src="{{asset('svg/plus.svg')}}" alt="nextsign">
        <span>Tambah Komentar</span>
    </a>

    <button onclick="location.reload();" type="button" class="btn btn-primary dcbutton d-flex justify-content-center">
            Done
        <img src="{{asset('svg/nextsign.svg')}}" alt="nextsign">
    </button>


@endsection

@section('extra-js')


@endsection
