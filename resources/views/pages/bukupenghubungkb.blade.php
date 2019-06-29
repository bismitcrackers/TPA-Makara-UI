@extends('layout/master')

@section('title', 'Buku Penghubung Kelas Bermain')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

    <div class = "d-flex justify-content-center">
        <h1 class = "bukupenghubung-title underliner">
            Buku Penghubung
        </h1>
    </div>

    <!-- Search form -->
    <form class="md-form form-sm mt-0 search-bukbul">
        <i class="fas fa-search opacitydown inline ml-2" aria-hidden="true"></i>
        <input id = "userInput" class="form-control sizer form-control-sm ml-2 border-bottom-0 inline" type="text" placeholder="Search book" aria-label="Search" onkeyup="searchFunction()">
    </form>
        <div class="row justify-content-around">
            <div class="col-4 bukbul">
                <a href="">
                    <img src="{{asset('svg/bukbul.svg')}}" alt="" class= "photobukbul">
                    <p>Januari 2019</p>
                </a>
            </div>
            <div class="col-4 bukbul">
                <a href="">
                    <img src="{{asset('svg/bukbul.svg')}}" alt="" class= "photobukbul">
                    <p>Februari 2019</p>
                </a>
            </div>
            <div class="col-4 bukbul">
                <a href="">
                    <img src="{{asset('svg/bukbul.svg')}}" alt="" class= "photobukbul">
                    <p>Maret 2019</p>
                </a>
            </div>
            <div class="col-4 bukbul">
                <a href="">
                    <img src="{{asset('svg/bukbul.svg')}}" alt="" class= "photobukbul">
                    <p>April 2019</p>
                </a>
            </div>
            <div class="col-4 bukbul">
                <a href="">
                    <img src="{{asset('svg/bukbul.svg')}}" alt="" class= "photobukbul">
                    <p>Mei 2019</p>
                </a>
            </div>
            <div class="col-4 bukbul">
                <a href="">
                    <img src="{{asset('svg/bukbul.svg')}}" alt="" class= "photobukbul">
                    <p>Juni 2019</p>
                </a>
            </div>
            <div class="col-4 bukbul">
                <a href="">
                    <img src="{{asset('svg/bukbul.svg')}}" alt="" class= "photobukbul">
                    <p>Juli 2019</p>
                </a>
            </div>
            <div class="col-4 bukbul">
                <a href="">
                    <img src="{{asset('svg/bukbul.svg')}}" alt="" class= "photobukbul">
                    <p>Agustus 2019</p>
                </a>
            </div>
            <div class="col-4 bukbul">
                <a href="">
                    <img src="{{asset('svg/bukbul.svg')}}" alt="" class= "photobukbul">
                    <p>September 2019</p>
                </a>
            </div>
            <div class="col-4 bukbul">
                <a href="">
                    <img src="{{asset('svg/bukbul.svg')}}" alt="" class= "photobukbul">
                    <p>Oktober 2019</p>
                </a>
            </div>
            <div class="col-4 bukbul">
                <a href="">
                    <img src="{{asset('svg/bukbul.svg')}}" alt="" class= "photobukbul">
                    <p>November 2019</p>
                </a>
            </div>
            <div class="col-4 bukbul">
                <a href="">
                    <img src="{{asset('svg/bukbul.svg')}}" alt="" class= "photobukbul">
                    <p>Desember 2019</p>
                </a>
            </div>
        </div>


@endsection

@section('extra-js')

<script>
    function searchFunction() {
        // Declare variables
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById('userInput');
        filter = input.value.toUpperCase();
        bookselect = document.getElementsByClassName("bukbul");
    
        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < bookselect.length; i++) {
            a = bookselect[i].getElementsByTagName("p")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                bookselect[i].style.display = "";
            } else {
                bookselect[i].style.display = "none";
            }
        }
    }
</script>



@endsection
