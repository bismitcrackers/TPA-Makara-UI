<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
        <meta name="description" content="Description of the page">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}">
        <!-- Foundation Zurb CSS -->
        <!-- <link rel="stylesheet" href="{{ asset('css/vendor/foundation.min.css') }}"> -->
        <!-- Materialize CSS -->
        <!-- <link rel="stylesheet" href="{{ asset('css/vendor/materialize.min.css') }}"> -->
        <!-- Flat UI CSS -->
        {{-- <link rel="stylesheet" href="{{ asset('css/vendor/flat-ui.min.css') }}"> --}}
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('css/vendor/all.min.css') }}">
        <!-- Font Link -->
        <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
        <!-- App CSS -->
        {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
        <title>@yield('title')</title>
        @yield('extra-css')
    </head>
    <body>
        @include('layout/_nav')
        @yield('content')
        @include('layout/_footer')
        @yield('extra-js')
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
