@extends('layout/master')

@section('title', 'Test')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('css/test.css') }}">
@endsection

@section('content')
<div class="container">
    Halo ini test
<a href="{{ route('index') }}">go to homepage</a>
</div>
@endsection

@section('extra-js')
<link rel= href="">
@endsection