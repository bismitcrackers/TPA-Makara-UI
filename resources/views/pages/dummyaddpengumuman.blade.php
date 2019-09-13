@extends('layout/master')

@section('title', 'Create Pengumuman')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
@if($route == 'create')
<form action="{{ route('admin.pengumuman.store') }}" method="post">
@else
<form action="{{ route('admin.pengumuman.update',['id' => $pengumuman->id]) }}" method="post">
{{method_field('PATCH')}}
@endif
    {{csrf_field()}}
    <div class="form-group">
        <label for="jdlPeng">JUDUL</label>
        @if($route == 'create')
        <textarea class="form-control" name="jdlPeng" id="jdlPeng" rows="1"></textarea>
        @else
        <textarea class="form-control" name="jdlPeng" id="jdlPeng" rows="1">{{$pengumuman->judul}}</textarea>
        @endif
    </div>
    <div class="form-group">
        <label for="dscPeng">DESKRIPSI</label>
        @if($route == 'create')
        <textarea class="form-control" name="dscPeng" id="dscPeng"  rows="1"></textarea>
        @else
        <textarea class="form-control" name="dscPeng" id="dscPeng"  rows="1">{{$pengumuman->deskripsi}}</textarea>
        @endif
    </div>

    <div class="form-group">
        <label for="tglPeng">TANGGAL KEGIATAN</label>
        @if($route == 'create')
        <input type="date" class="form-control" name="tglPeng" id="tglPeng" ></textarea>
        @else
        <input type="date" class="form-control" name="tglPeng" id="tglPeng" >{{$pengumuman->tanggal}}</textarea>
        @endif
    </div>

    <div class="form-group">
        <label for="tglPeng">TEMPAT KEGIATAN</label>
        @if($route == 'create')
        <input type="text" class="form-control" name="tptPeng" id="tglPeng" ></textarea>
        @else
        <input type="text" class="form-control" name="tptPeng" id="tglPeng" >{{$pengumuman->tempat}}</textarea>
        @endif
    </div>

    <div class="form-group">
        <label for="jnsKeg">JENIS KEGIATAN</label>
        <select class="form-control" name="jnsKeg" id="jnsKeg">
            @if($route == 'create'){
            <option value="1">Agenda Kegiatan</option>
            <option value="2">Pengumuman</option>
            }@else{
                @if($pengumuman->jenis == 1){
                    <option value="1" selected>Agenda Kegiatan</option>
                    <option value="2">Pengumuman</option>
                }@else{
                    <option value="1">Agenda Kegiatan</option>
                    <option value="2" selected>Pengumuman</option>
                }@endif
            }@endif
        </select>
    </div>

    <button type="submit">SUBMIT</button>

</form>
@endsection
