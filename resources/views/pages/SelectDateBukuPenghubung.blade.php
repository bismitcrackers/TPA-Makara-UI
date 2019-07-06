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
        @if(auth()->user()->roles()->first()->name == 'Orangtua' || auth()->user()->roles()->first()->name == 'Guru' || auth()->user()->roles()->first()->name == 'Co-fasilitator')
            @if($class == 'Day Care')
            <a class="dateblock inline" href="{{ route('dailyBook.dc.show', ['student_id' => $student_id, 'day' => $date->day, 'month' => $date->month, 'year' => $date->year]) }}">{{ $date->day . ' ' . $date->month_name . ' ' . $date->year }}</a>
            @elseif($class == 'Kelompok Bermain')
            <a class="dateblock inline" href="{{ route('dailyBook.dc.show', ['student_id' => $student_id, 'day' => $date->day, 'month' => $date->month, 'year' => $date->year]) }}">{{ $date->day . ' ' . $date->month_name . ' ' . $date->year }}</a>
            @endif
        @elseif(auth()->user()->roles()->first()->description == 'Full Access' || auth()->user()->roles()->first()->name == 'Fasilitator')
            @if($class == 'Day Care')
            <a class="dateblock inline" href="{{ route('dailyBook.dc.review', ['student_id' => $student_id, 'day' => $date->day, 'month' => $date->month, 'year' => $date->year]) }}">{{ $date->day . ' ' . $date->month_name . ' ' . $date->year }}</a>
            @elseif($class == 'Kelompok Bermain')
            <a class="dateblock inline" href="{{ route('dailyBook.kb.review', ['student_id' => $student_id, 'day' => $date->day, 'month' => $date->month, 'year' => $date->year]) }}">{{ $date->day . ' ' . $date->month_name . ' ' . $date->year }}</a>
            @endif
        @endif
        <a href="{{ route('dailyBook.comments.show', ['daily_book_id' => $date->id]) }}">
            <img src="{{asset('svg/message.svg')}}" alt="msgicon" class="inline messagedc">
        </a>
        <br>
        @endforeach
        @if($class == 'Day Care')
        <a href="{{ route('dailyBook.dc.form', ['student_id' => $student_id, 'route' => 'createDailyBookDC']) }}">
        @elseif($class == 'Kelompok Bermain')
        <a href="{{ route('dailyBook.kb.form', ['student_id' => $student_id, 'route' => 'createDailyBookKB']) }}">
        @endif
            <img src="{{asset('svg/addsign.svg')}}" alt="addsign" class="addsign">
        </a>
    </div>

@endsection

@section('extra-js')

@endsection
