@extends('layout/master')

@section('title', 'Komentar Buku Penghubung Daycare')

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
    @if(auth()->user()->roles()->first()->name == 'Orangtua')
    <a href="{{ route('orangtua.home') }}">
    @elseif(auth()->user()->roles()->first()->name == 'Co-fasilitator')
    <a href="{{ route('cofasilitator.home') }}">
    @elseif(auth()->user()->roles()->first()->name == 'Guru')
    <a href="{{ route('guru.home') }}">
    @elseif(auth()->user()->roles()->first()->name == 'Fasilitator')
    <a href="{{ route('fasilitator.home') }}">
    @elseif(auth()->user()->roles()->first()->description == 'Full Access')
    <a href="{{ route('admin.home') }}">
    @endif
        <button type="button" class="btn btn-primary dcbutton d-flex justify-content-center">
                Done
            <img src="{{asset('svg/nextsign.svg')}}" alt="nextsign">
        </button>
    </a>


@endsection

@section('extra-js')


@endsection
