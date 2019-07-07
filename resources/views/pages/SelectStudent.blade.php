@extends('layout/master')

@section('title', 'List Student ' . $class . ' - GURU')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <h1 class = "daftarsiswa-title underliner">
            Daftar Siswa {{$class}}
        </h1>
    </div>
    <!-- Search form -->
    <form action="">
        <input class="form-control search-siswa" type="search" placeholder="Cari Siswa {{ $class }}">
    </form>
    <div class="container">
        {{-- minimal 2 --}}
        {{-- font-size dikurangin --}}
        <div class="row justify-content-around">
            @foreach($students as $student)
            <div class="col siswa">
                @if($route == 'dayCareDailyBook')
                    <a href="{{ route('dailyBook.dc.month', ['student_id' => $student->id]) }}">
                @elseif($route == 'kelompokBermainDailyBook')
                    <a href="{{ route('dailyBook.kb.month', ['student_id' => $student->id]) }}">
                @elseif($route == 'dayCareProfile')
                    <a href="{{ route('profile.details', ['student_id' => $student->id]) }}">
                @elseif($route == 'kelompokBermainProfile')
                    <a href="{{ route('profile.details', ['student_id' => $student->id]) }}">
                @endif
                @if($student->jenis_kelamin == 'laki-laki')
                    <img src="{{ asset('svg/laki.svg') }}" alt="" class= "photosiswa">
                @else
                    <img src="{{ asset('svg/perempuan.svg') }}" alt="" class= "photosiswa">
                @endif
                    <p>{{ $student->nama_lengkap }}</p>
                </a>
            </div>
            @endforeach
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
