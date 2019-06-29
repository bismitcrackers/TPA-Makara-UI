<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
        <meta name="description" content="Description of the page">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}">
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('css/vendor/all.min.css') }}">
        <!-- Googlefonts -->
        <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
        <!-- App CSS -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>@yield('title')</title>
        @yield('extra-css')
    </head>
    <body>
        @include('layout/_nav')
        <div class="container-fluid">
            <div class="d-flex justify-content-center">
                <div class="col-md-8 p-0 white-background">
                    <div>
                        <div class="container-inner">
                            <div class="increasemarginbottom">
                                @yield('content')
                            </div>
                            @include('layout/_footer')
                        <div>
                    </div>
                </div>
            </div>
        </div>
        <!-- jQuery JS -->
        <script src="{{ asset('js/vendor/jquery-3.3.1.min.js') }}"></script>
        <!-- Popper JS -->
        <script src="{{ asset('js/vendor/popper.min.js') }}"></script>
        <!-- Bootstrap JS -->
        <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
        <!-- App CSS -->
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('extra-js')
        </div>
    </body>
</html>
