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
        <a class="dateblock inline" href="#">
            <p>1 April, 2019</p>
            <img src="{{asset('svg/bpcheckgreen.svg')}}" alt="checkgreen" class="ml-3">
        </a>
        <a href="#"><img src="{{asset('svg/message.svg')}}" alt="msgicon" class="inline messagedc ml-2"></a>
        <br>

        <a class="dateblock inline" href="#">
            <p>2 April, 2019</p>
            <img src="{{asset('svg/bpcheckgreen.svg')}}" alt="checkgreen" class="ml-3">
        </a>
        <a href="#"><img src="{{asset('svg/message.svg')}}" alt="msgicon" class="inline messagedc ml-2"></a>
        <br>

        <a class="dateblock inline" href="#">
            <p>3 April, 2019</p>
            <img src="{{asset('svg/bpcheckgreen.svg')}}" alt="checkgreen" class="ml-3">
        </a>
        <a href="#"><img src="{{asset('svg/message.svg')}}" alt="msgicon" class="inline messagedc ml-2"></a>
        <br>

        <a class="dateblock inline" href="#">
            <p>4 April, 2019</p>
            <img src="{{asset('svg/bpcheckgreen.svg')}}" alt="checkgreen" class="ml-3">
        </a>
        <a href="#"><img src="{{asset('svg/message.svg')}}" alt="msgicon" class="inline messagedc ml-2"></a>
        <br> 

        <a class="dateblock inline" href="#">
            <p>5 April, 2019</p>
            <img src="{{asset('svg/bpcheckgreen.svg')}}" alt="checkgreen" class="ml-3">
        </a>
        <a href="#"><img src="{{asset('svg/message.svg')}}" alt="msgicon" class="inline messagedc ml-2"></a>
        <br>

        <a class="dateblock inline" href="#">
            <p>6 April, 2019</p>
            <img src="{{asset('svg/bpcheckgreen.svg')}}" alt="checkgreen" class="ml-3">
        </a>
        <a href="#"><img src="{{asset('svg/message.svg')}}" alt="msgicon" class="inline messagedc ml-2"></a>
        <br>

        <a class="dateblock inline" href="#">
            <p>7 April, 2019</p>
            <img src="{{asset('svg/bpcheckgreen.svg')}}" alt="checkgreen" class="ml-3">
        </a>
        <a href="#"><img src="{{asset('svg/message.svg')}}" alt="msgicon" class="inline messagedc ml-2"></a>
        <br>

        <a class="dateblock inline" href="#">
            <p>8 April, 2019</p>
            <img src="{{asset('svg/bpcheckgreen.svg')}}" alt="checkgreen" class="ml-3">
        </a>
        <a href="#"><img src="{{asset('svg/message.svg')}}" alt="msgicon" class="inline messagedc ml-2"></a>
        <br>

        <a class="dateblock inline" href="#">
            <p>9 April, 2019</p>
            <img src="{{asset('svg/bpcheckgreen.svg')}}" alt="checkgreen" class="ml-3">
        </a>
        <a href="#"><img src="{{asset('svg/message.svg')}}" alt="msgicon" class="inline messagedc ml-2"></a>
        <br>

        <a class="dateblock dateblock-disabled inline" href="#">
            <p>10 April, 2019</p>
            <img src="{{asset('svg/bpcheckgray.svg')}}" alt="checkgreen" class="ml-3">
        </a>
        <a href="#"><img src="{{asset('svg/message.svg')}}" alt="msgicon" class="inline messagedc ml-2"></a>
        <br>
        
        <a href="#">
            <img src="{{asset('svg/addsign.svg')}}" alt="addsign" class="addsign">
        </a>    
    </div>

@endsection

@section('extra-js')

@endsection
