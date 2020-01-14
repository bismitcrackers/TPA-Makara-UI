@extends('layout/master')

@section('title', 'Registrasi User Baru TPA Makara UI')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <div class="picture-logo">
        <img src="{{asset('picture/logoTPAM.png')}}" alt="Logo TPAM">
    </div>
    <h1 class = "title">Welcome to TPA Makara UI!</h1>
    <div class="register-anak">
        <h2>Data User Baru</h2>
        <h2>Taman Pengembangan Anak Makara</h2>
    </div>
    <h1 class = "sign-in">Sign Up</h1>
    <form method="POST" action="{{ route('user.password.submit') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="passwordLama">Password Lama</label>
                <div class="input-group">
                    <input type="password" class="form-control{{ $errors->has('passwordLama') ? ' is-invalid' : '' }}" id="passwordLama" name="passwordLama" placeholder="Password Lama" required>
                    @if ($errors->has('passwordLama') || $msg != '')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('passwordLama') }} . {{ $msg }}</strong>
                    </span>
                    @endif
                    <span class="input-group-btn">
                        <button id= "show_passwordLama" class="btn btn-secondary" type="button">
                                <span class="passwordLama-icon fa fa-eye"></span>
                        </button>
                    </span>
                    <p>{{ $msg }}</p>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password Baru</label>
                <div class="input-group">
                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="Password Baru" required>
                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                    <span class="input-group-btn">
                        <button id= "show_password" class="btn btn-secondary" type="button">
                                <span class="password-icon fa fa-eye"></span>
                        </button>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label for="password-confirm">Repeat Password</label>
                <div class="input-group">
                    <input id="password-confirm" type="password" class="form-control {{$errors->has('password_confirmation') ?  ' is-invalid' : ' '}}"  name="password_confirmation" required>
                    @if ($errors->has('password_confimation'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password_confimation') }}</strong>
                        </span>
                    @endif
                    <span class="input-group-btn">
                        <button id= "show_password-confirm" class="btn btn-secondary" type="button">
                                <span class="passwordconfirm-icon fa fa-eye"></span>
                        </button>
                    </span>
                </div>
            </div>
            <div class="button-section signup">
                <button type="submit" class="halo btn-primary btn">Save</button>
            </div>
    </form>
@endsection

@section('extra-js')
<script type="text/javascript">

    $(function() {
        $("#show_passwordLama").click(
            function toggle() {
                let varPas = $("#passwordLama")
                if (varPas.attr("type") == "password"){
                    varPas.attr("type", "text");
                }
                else{
                    varPas.attr("type", "password");
                }
                $(".passwordLama-icon")
                    .toggleClass("fa-eye")
                    .toggleClass("fa-eye-slash");
            },
        );
        $("#show_password").click(
            function toggle() {
                let varPas = $("#password")
                if (varPas.attr("type") == "password"){
                    varPas.attr("type", "text");
                }
                else{
                    varPas.attr("type", "password");
                }
                $(".password-icon")
                    .toggleClass("fa-eye")
                    .toggleClass("fa-eye-slash");
            },
        );
        $("#show_password-confirm").click(
            function toggle() {
                let varPas = $("#password-confirm")
                if (varPas.attr("type") == "password"){
                    varPas.attr("type", "text");
                }
                else{
                    varPas.attr("type", "password");
                }
                $(".passwordconfirm-icon")
                    .toggleClass("fa-eye")
                    .toggleClass("fa-eye-slash");
            },
        );
    });
</script>
@endsection
