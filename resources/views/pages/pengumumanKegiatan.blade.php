@extends('layout/master')

@section('title', 'List Pengumuman')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

    <div class="d-flex justify-content-center">
        <h1 class = "daftarsiswa-title underliner">
            Pengumuman Kegiatan {{ $kelas }}
        </h1>
    </div>

    <!-- modal -->

    <div class="modal fade" id="pengumumanKegiatanModal" tabindex="-1" role="dialog" aria-labelledby="pengumumanKegiatanModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="d-flex justify-content-end">
                <button type="button" class="close closepass" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-header">
                <h5 class="modal-title" id="pengumumanKegiatanModalTitle">
                    <p>Yakin ingin menghapus pengumuman ini?</p>
                </h5>
            </div>
            <div class="modal-footer centerer">
                <div class = "confirm-button">
                    <button type="button" class="btn btn-danger canceldelete" data-dismiss="modal" id = "disagree-button">Tidak</button>
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

    <!-- alert agree -->
    <div class="alert alert-success" id="agree" role="alert" aria-hidden="true">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p>Pengumuman dihapus</p>
    </div>

    <!-- alert disagree -->
    <div class="alert alert-danger" id="disagree" role="alert" aria-hidden="true">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p>Pengumuman tetap ada</p>
    </div>

    <div class = "parent-profile d-flex agenda-kegiatan">
        <p class = "underliner-parent-profile">Agenda Kegiatan</p>
    </div>

    @foreach($agenda as $a)
    <div class="agenda-content">
        <div class = "row justify-content-around ">
            <div class="col-sm-9 col-auto agenda">
                {{ $a->judul }}
            </div>
            <a href="{{ route('profile.pengumuman.show', ['kelas' => $kelas, 'id' => $a->id]) }}">
                <div class="col-sm-1 col-auto agenda-detail">
                    Detail
                </div>
            </a>
            <div class="col-sm-2 col-auto centerer">
                <a href="{{ route('profile.pengumuman.form.edit', ['kelas' => $kelas, 'id' => $a->id]) }}">
                    <span>
                        <img src="{{asset('svg/editIcon.svg')}}" alt="Edit">
                    </span>
                </a>
                    <span class = "deleteKegiatan" onclick="deleteId({{ $a->id }})">
                        <img src="{{asset('svg/deleteIcon.svg')}}" alt="Delete">
                    </span>

            </div>
        </div>
    </div>
    @endforeach


    <div href="" class="tambahpengumuman d-flex justify-content-center">
        <a href="{{ route('profile.pengumuman.form.add', ['kelas' => $kelas] ) }}">
            <span>Tambah Agenda</span>
            <img src="{{asset('svg/plus.svg')}}" alt="nextsign">
        </a>
    </div>

    <div class = "parent-profile d-flex pengumuman">
        <p class = "underliner-parent-profile">Pengumuman</p>
    </div>

    @foreach($pengumuman as $p)
    <div class="agenda-content">
        <div class = "row justify-content-around ">
            <div class="col-sm-9 col-auto agenda">
                {{ $p->judul }}
            </div>
            <a href="{{ route('profile.pengumuman.show', ['kelas' => $kelas, 'id' => $p->id]) }}">
                <div class="col-sm-1 col-auto agenda-detail">
                    Detail
                </div>
            </a>
            <div class="col-sm-2 col-auto centerer">
                <a href="{{ route('profile.pengumuman.form.edit', ['kelas' => $kelas, 'id' => $p->id]) }}">
                    <span>
                        <img src="{{asset('svg/editIcon.svg')}}" alt="Edit">
                    </span>
                </a>
                    <span class = "deleteKegiatan" onclick="deleteId({{ $p->id }})">
                        <img src="{{asset('svg/deleteIcon.svg')}}" alt="Delete">
                    </span>
            </div>
        </div>
    </div>
    @endforeach


    <div href="" class="tambahpengumuman d-flex justify-content-center">
        <a href="{{ route('profile.pengumuman.form.add', ['kelas' => $kelas] ) }}">
            <span>Tambah Pengumuman</span>
            <img src="{{asset('svg/plus.svg')}}" alt="nextsign">
        </a>
    </div>




@endsection

@section('extra-js')

<script type="text/javascript" src="{{ asset('js/pengumuman.js')}}">

</script>

<script>

    function modalConfirm(callback){

        // $(".deleteKegiatan").on("click", function(){
        //     var id = $(this).attr("id");
        //     console.log(id);
        //     $("#pengumumanKegiatanModal").modal('show');
        //     $('#formDelete').attr('action', '{{ route("admin.pengumuman.destroy", ["pengumuman" => ' + id + ']) }}');
        // });

        $("#agree-button").on("click", function(){
            callback(true);
            $("#pengumumanKegiatanModal").modal('hide');
        });

        $("#disagree-button").on("click", function(){
            callback(false);
            $("#pengumumanKegiatanModal").modal('hide');
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
