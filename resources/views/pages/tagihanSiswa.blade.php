@extends('layout/master')

@section('title', 'Tagihan Siswa')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <div class = "d-flex justify-content-center">
        <h1 class = "tagihan-title underliner">
            Tagihan Siswa {{ $kelas }}
        </h1>
    </div>

    <!-- Modal -->

    <div class="modal fade" id="studentPassModal" tabindex="-1" role="dialog" aria-labelledby="studentPassModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="d-flex justify-content-end">
                <button type="button" class="close closepass" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-header">
                <h5 class="modal-title" id="studentPassModalTitle">
                    <p>Yakin ingin menghapus tagihan ini?</p>
                </h5>
            </div>
            <div class="modal-footer centerer">

                <div class = "confirm-button">
                    <button type="button" class="btn btn-secondary editbuttoncancel" data-dismiss="modal" id = "disagree-button">Tidak</button>
                    <form method="POST" action="test" id="formDelete">
                         {{ csrf_field() }}
                         {{ method_field('DELETE') }}
                         <button type="submit" class="btn delete" id = "agree-button">Ya</button>
                     </form>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class = "tagihan-table d-flex table-responsive justify-content-center">
        <table class="table table-borderless table-responsive">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Tagihan</th>
                    <th scope="col">Jumlah Tagihan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Total Tagihan</th>
                    <th scope="col">Bukti Pembayaran</th>
                    <th scope="col">Kwitansi</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($formattedTagihanList as $formattedTagihan)
                    <tr>
                        <th scope="row" class = "name">{{ $formattedTagihan->nama_lengkap }}</th>
                        <td>{{ $formattedTagihan->jenis_tagihan }}</td>
                        <td>Rp{{number_format((float)$formattedTagihan->jumlah_tagihan,2,',','.') }}</td>
                        <td>
                            @if($formattedTagihan->status == '')

                            @elseif($formattedTagihan->status != 'Lunas')
                            <div class="belum-lunas">
                                {{ $formattedTagihan->status }}
                            </div>
                            <form method="POST" action="{{ route('profile.tagihan.lunaskan', ['kelas' => $kelas, 'student_id' => $formattedTagihan->student_id, 'tagihan_id' => $formattedTagihan->tagihan_id]) }}">
                                {{ csrf_field() }}
                                <button type="submit" class="lunas btn editbutton" id = "agree-button">Lunaskan</button>
                            </form>
                            @else
                            <div class="lunas">
                                {{ $formattedTagihan->status }}
                            </div>
                            <form method="POST" action="{{ route('profile.tagihan.cancelLunaskan', ['kelas' => $kelas, 'student_id' => $formattedTagihan->student_id, 'tagihan_id' => $formattedTagihan->tagihan_id]) }}">
                                {{ csrf_field() }}
                                <button type="submit" class="belum-lunas btn editbutton" id = "agree-button">Batalkan Kelunasan</button>
                            </form>
                            @endif
                        </td>
                        <td>Rp{{ number_format((float)$formattedTagihan->total_tagihan,2,',','.') }}</td>
                        <td>
                            @if($formattedTagihan->bukti_pembayaran != '')
                                <img id="imgbuku" src="{{ asset($formattedTagihan->bukti_pembayaran) }}" alt="please insert image">
                            @endif
                        </td>
                        <td>
                            @if($formattedTagihan->kwitansiCheck)
                            <a href="{{ route('profile.tagihan.kwitansi', ['kelas' => $kelas, 'student_id' => $formattedTagihan->student_id, 'tagihan_id' => $formattedTagihan->tagihan_id]) }}">
                                <div class="btn btn-danger">
                                    Kwitansi
                                </div>
                            </a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('profile.tagihan.form.edit', ['kelas' => $kelas, 'student_id' => $formattedTagihan->student_id, 'tagihan_id' => $formattedTagihan->tagihan_id]) }}">
                                <img src="{{ asset('svg/tagihan-edit.svg') }}" alt="tagihan-edit">
                            </a>
                            <a class="btn-passconfirm" onclick="deleteId('{{ $kelas }}', {{ $formattedTagihan->student_id }}, {{ $formattedTagihan->tagihan_id }})">
                                <img src="{{ asset('svg/tagihan-delete.svg') }}" alt="tagihan-delete">
                            </a>
                            <a href="{{ route('profile.tagihan.form.add', ['kelas' => $kelas, 'student_id' => $formattedTagihan->student_id]) }}" class = "name add-tagihan">
                                <img src="{{ asset('svg/plus.svg') }}" alt="">
                                <span>Tambah Tagihan</span>
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    {{-- <div class="row justify-content-center">
        <p class="col-md-1 col-sm-12">Nama</p>
        <p class="col-md-2 col-sm-12">Jenis Tagihan</p>
        <p class="col-md-2 col-sm-12">Jumlah Tagihan</p>
        <p class="col-md-1 col-sm-12">Status</p>
        <p class="col-md-2 col-sm-12">Total Tagihan</p>
        <p class="col-md-2 col-sm-12">Bukti Pembayaran</p>
        <p class="col-md-1 col-sm-12">Kwitansi</p>
        <div class="col-1">Kwitansi</div>
    </div>

    <div class="row justify-content-center">
        <p class="col-md-1 col-sm-12">Abiyan Abiyan</p>
        <div class = "d-flex">
            <p class="col-md-2 col-sm-12">Jenis Tagihan</p>
            <p class="col-md-2 col-sm-12">Jenis Tagihan</p>
            <p class="col-md-2 col-sm-12">Jenis Tagihan</p>
        </div>
        <p class="col-md-2 col-sm-12">Jumlah Tagihan</p>
        <p class="col-md-1 col-sm-12">Status</p>
        <p class="col-md-2 col-sm-12">Total Tagihan</p>
        <p class="col-md-2 col-sm-12">Bukti Pembayaran</p>
        <p class="col-md-1 col-sm-12">Kwitansi</p>
        <div class="col-1">Kwitansi</div>
    </div> --}}



@endsection

@section('extra-js')

<script>
    function deleteId(kelas, student_id, tagihan_id) {
        console.log(tagihan_id);
        $('#formDelete').attr('action', 'http://localhost:8000/profile/tagihan/' + kelas  + '/delete/' + student_id + '/' + tagihan_id);
        $("#studentPassModal").modal('show');
    }

    function modalConfirm(callback){

        $("#agree-button").on("click", function(){
            callback(true);
            $("#studentPassModal").modal('hide');
        });

        $("#disagree-button").on("click", function(){
            callback(false);
            $("#studentPassModal").modal('hide');
        });
        };

        modalConfirm(function(confirm){
            if(confirm){
                $("#agree").fadeTo(500, 1).slideDown(500);
                window.setTimeout(function() {
                $("#agree").fadeTo(500, 0).slideUp(500);
                }, 4000)
            }else{
                $("#disagree").fadeTo(500, 1).slideDown(500);
                window.setTimeout(function() {
                $("#disagree").fadeTo(500, 0).slideUp(500);
                }, 4000)
            }
        });

</script>

@endsection
