@extends('layout/master')

@section('title', 'Buku Penghubung Daycare')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <div class = "d-flex justify-content-center">
        <h1 class = "bukupenghubung-title underliner">
            Buku Penghubung
        </h1>
    </div>   

    <div class="centerer">
        @foreach($dates as $indexKey => $date)
        <a class="dateblock inline" href="#">{{ $date->day . ' ' . $date->month_name . ' ' . $date->year }}</a>
        <a href="{{ route('dailyBook.comments.show', ['daily_book_id' => $date->id]) }}">
            <img src="{{asset('svg/message.svg')}}" alt="msgicon" class="inline messagedc ml-2">
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
