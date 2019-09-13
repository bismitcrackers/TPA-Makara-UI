@extends('layout/master')

@section('title','Show Pengumuman')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

@foreach($pengumumans as $pengumuman)
<h3>
    <a href="{{ route('admin.pengumuman.edit',['id'=>$pengumuman->id]) }}">
        {{ $pengumuman->judul }}
    </a>
</h3>

<p>
    {{ $pengumuman->deskripsi }}
</p>
<p>
    {{ $pengumuman->tanggal }}
</p>
<p>
    {{ $pengumuman->tempat }}
</p>
<p>
    {{ $pengumuman->jenis }}
</p>
@endforeach

@endsection
