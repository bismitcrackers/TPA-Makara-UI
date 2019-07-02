@extends('layout/master')

@section('title', 'Buku Penghubung Daycare')

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
    <div class="centerer">
        @foreach($dates as $indexKey => $date)
        <a class="dateblock inline" href="#">{{ $date->day . ' ' . $date->month_name . ' ' . $date->year }}</a>
        <a href="{{ route('dailyBook.comments.show', ['daily_book_id' => $date->id]) }}">
            <img src="{{asset('svg/message.svg')}}" alt="msgicon" class="inline messagedc">
        </a>
        <br>
        @endforeach
        <a href="{{ route('dailyBook.form', ['student_id' => $student_id]) }}">
            <img src="{{asset('svg/addsign.svg')}}" alt="addsign" class="addsign">
        </a>
    </div>

@endsection

@section('extra-js')

@endsection
