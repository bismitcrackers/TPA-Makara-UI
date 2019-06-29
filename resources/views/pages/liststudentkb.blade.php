@extends('layout/master')

@section('title', 'List Student Kelas Bermain - GURU')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <h1 class = "daftarsiswa-title underliner">
            Daftar Siswa Daycare
        </h1>
    </div>
    <!-- Search form -->
    <form action="">
        <input id="userInput" class="form-control search-siswa" type="search" placeholder="Cari Siswa Daycare" onkeyup="searchFunction()">
    </form>
    <div class="row justify-content-around">
        <div class="col-4 siswa">
            <a href="">
                <img src="{{asset('svg/laki.svg')}}" alt="" class= "photosiswa">
                <p>Abyan Althaf K</p>
            </a>
        </div>
        <div class="col-4 siswa">
            <a href="">
                <img src="{{asset('svg/laki.svg')}}" alt="" class= "photosiswa">
                <p>Akhtar Rasyid A</p>
            </a>
        </div>
        <div class="col-4 siswa">
            <a href="">
                <img src="{{asset('svg/laki.svg')}}" alt="" class= "photosiswa">
                <p>Akhtar Saka R</p>
            </a>
        </div>
    
        <div class="col-4 siswa">
            <a href="">
                <img src="{{asset('svg/perempuan.svg')}}" alt="" class= "photosiswa">
                <p>Anya Radhya T</p>
            </a>
        </div>
        <div class="col-4 siswa">
            <a href="">
                <img src="{{asset('svg/laki.svg')}}" alt="" class= "photosiswa">
                <p>Arkha Rayyan S</p>
            </a>
        </div>
        <div class="col-4 siswa">
            <a href="">
                <img src="{{asset('svg/perempuan.svg')}}" alt="" class= "photosiswa">
                <p>Arsyad Ahmad M</p>
            </a>
        </div>
        <div class="col-4 siswa">
            <a href="">
                <img src="{{asset('svg/perempuan.svg')}}" alt="" class= "photosiswa">
                <p>Arudita Saphira P</p>
            </a>
        </div>
        <div class="col-4 siswa">
            <a href="">
                <img src="{{asset('svg/perempuan.svg')}}" alt="" class= "photosiswa">
                <p>Atishalula Atalandra</p>
            </a>
        </div>
        <div class="col-4 siswa">
            <a href="">
                <img src="{{asset('svg/perempuan.svg')}}" alt="" class= "photosiswa">
                <p>Aurora Radhya T</p>
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
        siswaselect = document.getElementsByClassName("siswa");
    
        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < siswaselect.length; i++) {
            a = siswaselect[i].getElementsByTagName("p")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                siswaselect[i].style.display = "";
            } else {
                siswaselect[i].style.display = "none";
            }
        }
    }
</script>

@endsection
