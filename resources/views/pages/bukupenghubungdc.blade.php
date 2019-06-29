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
        <a class="dateblock inline" href="#">1 April, 2019</a>
        <a href="#"><img src="{{asset('svg/message.svg')}}" alt="msgicon" class="inline messagedc ml-2"></a>
        <br>
        <a class="dateblock inline" href="#">2 April, 2019</a>
        <a href="#"><img src="{{asset('svg/message.svg')}}" alt="msgicon" class="inline messagedc ml-2"></a>
        <br>
        <a class="dateblock inline" href="#">3 April, 2019</a>
        <a href="#"><img src="{{asset('svg/message.svg')}}" alt="msgicon" class="inline messagedc ml-2"></a>
        <br>
        <a class="dateblock inline" href="#">4 April, 2019</a>
        <a href="#"><img src="{{asset('svg/message.svg')}}" alt="msgicon" class="inline messagedc ml-2"></a>
        <br>
        <a class="dateblock inline" href="#">5 April, 2019</a>
        <a href="#"><img src="{{asset('svg/message.svg')}}" alt="msgicon" class="inline messagedc ml-2"></a>
        <br>
        <a class="dateblock inline" href="#">6 April, 2019</a>
        <a href="#"><img src="{{asset('svg/message.svg')}}" alt="msgicon" class="inline messagedc ml-2"></a>
        <br>
        <a class="dateblock inline" href="#">7 April, 2019</a>
        <a href="#"><img src="{{asset('svg/message.svg')}}" alt="msgicon" class="inline messagedc ml-2"></a>
        <br>
        <a class="dateblock inline" href="#">8 April, 2019</a>
        <a href="#"><img src="{{asset('svg/message.svg')}}" alt="msgicon" class="inline messagedc ml-2"></a>
        <br>
        <a class="dateblock inline" href="#">9 April, 2019</a>
        <a href="#"><img src="{{asset('svg/message.svg')}}" alt="msgicon" class="inline messagedc ml-2"></a>
        <br>
        <a href="#">
            <img src="{{asset('svg/addsign.svg')}}" alt="addsign" class="addsign">
        </a>    
    </div>

@endsection

@section('extra-js')

@endsection
