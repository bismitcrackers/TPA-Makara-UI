@extends('layout/master')

@section('title', 'Login')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row ">
            <div class="col-0 col-md-2"></div>
    
            <div class="col-12 col-md-8">
    
                <div class="container-inner">
                    <div class="picture-logo">
                       <img src="{{asset('svg/logo.svg')}}" alt="">
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
                </div>
                
            </div>
    
            <div class="col-0 col-md-2"></div>
        </div>
    </div>
@endsection

@section('extra-js')

@endsection