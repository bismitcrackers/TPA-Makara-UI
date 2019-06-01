@extends('layout/master')

@section('title', 'Login TPA Makara UI')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')          
    <div class="picture-logo">
        <img src="{{asset('picture/logoTPAM.png')}}" alt="Logo TPAM">
     </div>
    <h1 class = "title">Welcome to TPA Makara UI!</h1>
    <h1 class = "sign-in">Sign In</h1>
    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" class = "">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class=button-section>
            <button type="submit" class="btn btn-primary">Sign In</button>
        </div>
    </form>
    <p class="bottom-auth">New here? <a href="{{ route('register') }}">Register here!</a></p>
@endsection

@section('extra-js')

@endsection