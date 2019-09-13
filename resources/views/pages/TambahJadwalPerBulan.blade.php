@extends('layout/master')

@section('title', 'Tambah Jadwal Perbulan')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

    <div class="d-flex justify-content-center">
        <h1 class = "daftarsiswa-title underliner">
            Tambah Jadwal Perbulan
        </h1>
    </div>

    @if($schedule == null)
    <form action="{{ route('profile.schedule.add') }}" method="post" enctype="multipart/form-data">
    @else
    <form action="{{ route('profile.schedule.edit', ['id', $schedule->id]) }}" method="post" enctype="multipart/form-data">
    @endif
        {{ csrf_field() }}
        <div class="form-group">
            <label for="judul" class="dclabel">JUDUL</label>
            @if($schedule == null)
                <input name="judul" type="text" class="form-control dcinput" id="judul" aria-describedby="judul" placeholder="" required>
            @else
                <input value="{{ $schedule->judul }}" name="judul" type="text" class="form-control dcinput" id="judul" aria-describedby="judul" placeholder="" required>
            @endif
        </div>

        <div href="" class="tambahfoto d-flex justify-content-center dcinput tambahpdf" onclick="burninput()">
            <span>Tambah PDF</span>
            <img src="{{asset('svg/plus.svg')}}" alt="nextsign">
        </div>

        <input name="schedules[]" type="file" id="inputfile" multiple>

        <input name="kelas" type="hidden" value="{{ $kelas }}">

        @if($schedule != null)
        <div class="gallery">
        @foreach($scheduleImages as $scheduleImage)
            <img id="imgbuku" src="{{ asset($scheduleImage->url_lampiran) }}" alt="please insert image">
        @endforeach
        </div>
        @else
            <div class="gallery">
            </div>
        @endif

        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-primary editbuttoncancel d-flex justify-content-center">
                Cancel
            </button>
            <button type="submit" class="btn btn-primary editbutton d-flex justify-content-center">
                <p>Save</p>
                <img src="{{asset('svg/nextsign.svg')}}" alt="nextsign">
            </button>
        </div>

    </form>


@endsection

@section('extra-js')

<script>
   function burninput(event){
            $("#inputfile").click();
   }

   var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#inputfile').on('change', function() {
        $('.gallery').html('');
        imagesPreview(this, 'div.gallery');
    });
</script>

@endsection
