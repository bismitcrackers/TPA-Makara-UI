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
        <?php $label1 = False; $label2 = False; ?>
        @foreach($dates as $indexKey => $date)
        @if(auth()->user()->roles()->first()->name == 'Orangtua')
            @if($label1 == False)
            <div class="dclabel centerer readstatus">Belum Dibaca</div>
            <?php $label1 = True; ?>
            @endif
            @if($label2 == False && $date->dibaca == True)
            <div class="dclabel centerer readstatus">Sudah Dibaca</div>
            <?php $label2 = True; ?>
            @endif
            @if($class == 'Day Care')
                @if($date->dibaca == True)
            <a class="dateblock inline" href="{{ route('dailyBook.dc.show', ['student_id' => $student_id, 'day' => $date->day, 'month' => $date->month, 'year' => $date->year]) }}">
                <p>{{ $date->day . ' ' . $date->month_name . ' ' . $date->year }}</p>
                <img src="{{asset('svg/bpcheckgreen.svg')}}" alt="checkgreen" class="ml-3">
                @else
            <a class="dateblock dateblock-disabled inline" href="{{ route('dailyBook.dc.show', ['student_id' => $student_id, 'day' => $date->day, 'month' => $date->month, 'year' => $date->year]) }}">
                <p>{{ $date->day . ' ' . $date->month_name . ' ' . $date->year }}</p>
                <img src="{{asset('svg/bpcheckgray.svg')}}" alt="checkgreen" class="ml-3">
                @endif
            </a>
            @elseif($class == 'Kelompok Bermain')
                @if($date->dibaca == True)
            <a class="dateblock inline" href="{{ route('dailyBook.kb.show', ['student_id' => $student_id, 'day' => $date->day, 'month' => $date->month, 'year' => $date->year]) }}">
                {{ $date->day . ' ' . $date->month_name . ' ' . $date->year }}
                <img src="{{asset('svg/bpcheckgreen.svg')}}" alt="checkgreen" class="ml-3">
                @else
            <a class="dateblock dateblock-disabled inline" href="{{ route('dailyBook.kb.show', ['student_id' => $student_id, 'day' => $date->day, 'month' => $date->month, 'year' => $date->year]) }}">
                {{ $date->day . ' ' . $date->month_name . ' ' . $date->year }}
                <img src="{{asset('svg/bpcheckgray.svg')}}" alt="checkgreen" class="ml-3">
                @endif
            </a>
            @endif
        @elseif(auth()->user()->roles()->first()->name == 'Guru' || auth()->user()->roles()->first()->name == 'Co-fasilitator')
            @if($class == 'Day Care')
            <a class="dateblock inline" href="{{ route('dailyBook.dc.show', ['student_id' => $student_id, 'day' => $date->day, 'month' => $date->month, 'year' => $date->year]) }}">{{ $date->day . ' ' . $date->month_name . ' ' . $date->year }}</a>
            @elseif($class == 'Kelompok Bermain')
            <a class="dateblock inline" href="{{ route('dailyBook.kb.show', ['student_id' => $student_id, 'day' => $date->day, 'month' => $date->month, 'year' => $date->year]) }}">{{ $date->day . ' ' . $date->month_name . ' ' . $date->year }}</a>
            @endif
        @elseif(auth()->user()->roles()->first()->description == 'Full Access' || auth()->user()->roles()->first()->name == 'Fasilitator')
            @if($date->dipublish == True)
                @if($class == 'Day Care')
                <a class="dateblock inline" href="{{ route('dailyBook.dc.review', ['student_id' => $student_id, 'day' => $date->day, 'month' => $date->month, 'year' => $date->year]) }}">{{ $date->day . ' ' . $date->month_name . ' ' . $date->year }}</a>
                @elseif($class == 'Kelompok Bermain')
                <a class="dateblock inline" href="{{ route('dailyBook.kb.review', ['student_id' => $student_id, 'day' => $date->day, 'month' => $date->month, 'year' => $date->year]) }}">{{ $date->day . ' ' . $date->month_name . ' ' . $date->year }}</a>
                @endif
            @else
                @if($class == 'Day Care')
                <a style="background-color:#F2F2F2;" class="dateblock inline" href="{{ route('dailyBook.dc.review', ['student_id' => $student_id, 'day' => $date->day, 'month' => $date->month, 'year' => $date->year]) }}">{{ $date->day . ' ' . $date->month_name . ' ' . $date->year }}</a>
                @elseif($class == 'Kelompok Bermain')
                <a style="background-color:#F2F2F2;" class="dateblock inline" href="{{ route('dailyBook.kb.review', ['student_id' => $student_id, 'day' => $date->day, 'month' => $date->month, 'year' => $date->year]) }}">{{ $date->day . ' ' . $date->month_name . ' ' . $date->year }}</a>
                @endif
            @endif
        @endif
        <a href="{{ route('dailyBook.comments.show', ['daily_book_id' => $date->id]) }}">
            <img src="{{asset('svg/message.svg')}}" alt="msgicon" class="inline messagedc ml-2">
        </a>
        <br>
        @endforeach
        @if(auth()->user()->roles()->first()->name != 'Orangtua')
            @if($class == 'Day Care')
            <a href="{{ route('dailyBook.dc.form', ['student_id' => $student_id, 'route' => 'createDailyBookDC']) }}">
            @elseif($class == 'Kelompok Bermain')
            <a href="{{ route('dailyBook.kb.form', ['student_id' => $student_id, 'route' => 'createDailyBookKB']) }}">
            @endif
            <img src="{{asset('svg/addsign.svg')}}" alt="addsign" class="addsign">
        </a>
        @endif
    </div>

@endsection

@section('extra-js')

@endsection
