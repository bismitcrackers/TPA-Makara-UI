@extends('layout/master')

@section('title', 'Jadwal Per Bulan')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

    <div class="d-flex justify-content-center">
        <h1 class = "daftarsiswa-title underliner">
            Jadwal Per Bulan {{ $kelas }}
        </h1>
    </div>

    <div style="text-align:center; margin-bottom: 220px;">
        @if($schedule != null)
        <img src="{{ asset($schedule->url_lampiran) }}" alt="please insert image">
        @endif
    </div>

    @if($schedule == null)
    <div href="" class="tambahpengumuman d-flex justify-content-center">
        <a href="{{ route('profile.schedule.form', ['kelas' => $kelas]) }}">
            <span>Tambah Jadwal</span>
            <img src="{{asset('svg/plus.svg')}}" alt="nextsign">
        </a>
    </div>
    @endif

    @if($schedule != null)
    <div class="d-flex justify-content-center">
        <form method="POST" action="{{ route('profile.schedule.delete', ['id' => $schedule->id]) }}">
             {{ csrf_field() }}
             {{ method_field('DELETE') }}
            <button type="submit" class="btn canceldelete d-flex justify-content-center">
                Delete
            </button>
        </form>
        <a href="{{ route('profile.schedule.form', ['kelas' => $kelas]) }}">
            <button type="button" class="btn editjadwal d-flex justify-content-center">
                Edit
            </button>
        </a>
    </div>
    @endif


@endsection

@section('extra-js')

<script>

</script>

@endsection
