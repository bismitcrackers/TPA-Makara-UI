@extends('layout/master')

@section('title', 'Tagihan Siswa')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

    <div class = "d-flex justify-content-start">
        <h1 class = "kwitansi-title underliner">
            Notifications
        </h1>
    </div>

    <ul class="list-group">
        @foreach($notifications as $notification)
            <a href="{{ route('notification.read', ['id' => $notification->id]) }}">
            @if($notification->is_read)
                <li class="list-group-item">{{ $notification->sender }} {{ $notification->content }}</li>
            @else
                <li class="list-group-item list-group-item-success">{{ $notification->sender }} {{ $notification->content }}</li>
            @endif
            </a>
        @endforeach
    </ul>

@endsection

@section('extra-js')

@endsection
