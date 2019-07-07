@extends('layout/master')

@section('title', 'Buku Penghubung ' . $class)

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
    <div class="container">
        @for($i = 1; $i < $end + 1; $i++)
            @if(($i - 1) % 3 == 0)
            <div class="row justify-content-around">
            @endif
                <div class="col-sm-4 bukbul">
                    @if($class == 'Day Care')
                    <a href="{{ route('dailyBook.dc.date', ['student_id' => $student_id, 'month' => $months[$i]['month'], 'year' => $months[$i]['year']]) }}">
                    @elseif($class == 'Kelompok Bermain')
                    <a href="{{ route('dailyBook.kb.date', ['student_id' => $student_id, 'month' => $months[$i]['month'], 'year' => $months[$i]['year']]) }}">
                    @endif
                        <img src="{{asset('svg/bukbul.svg')}}" alt="" class= "photobukbul">
                        <p>{{ $months[$i]['month_name'] . ' ' . $months[$i]['year'] }}</p>
                    </a>
                </div>
            @if(($i) % 3 == 0 || $i == $end)
            </div>
            @endif
        @endfor
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
