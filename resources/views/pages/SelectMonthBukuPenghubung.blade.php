@extends('layout/master')

@section('title', 'Buku Penghubung ' . $class)

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

    <!-- Search form -->
    <form class="md-form form-sm mt-0 search-bukbul">
        <i class="fas fa-search opacitydown inline ml-2" aria-hidden="true"></i>
        <input class="form-control sizer form-control-sm ml-2 border-bottom-0 inline" type="text" placeholder="Search book" aria-label="Search">
    </form>
    <div class="container">
        @for($i = 1; $i < $end + 1; $i++)
            @if(($i - 1) % 3 == 0)
            <div class="row justify-content-around">
            @endif
                <div class="col-sm-4 bukbul">
                    @if($class == 'Day Care')
                    <a href="{{ route('dailyBook.dc.date', ['student_id' => $student_id, 'month' => $months[$i]['month'], 'year' => $months[$i]['year']]) }}">
                    @elseif($class == 'Kelompok Bermain')
                    <a href="{{ route('dailyBook.kb.date', ['student_id' => $student_id, 'month' => $months[$i]['month'], 'year' => $months[$i]['year']]) }}">
                    @endif
                        <img src="{{asset('svg/bukbul.svg')}}" alt="" class= "photobukbul">
                        <p>{{ $months[$i]['month_name'] . ' ' . $months[$i]['year'] }}</p>
                    </a>
                </div>
            @if(($i) % 3 == 0 || $i == $end)
            </div>
            @endif
        @endfor
    </div>


@endsection

@section('extra-js')

@endsection
