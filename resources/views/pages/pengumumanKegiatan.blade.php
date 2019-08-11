@extends('layout/master')

@section('title', 'List Student Kelas Bermain - GURU')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

    <div class="d-flex justify-content-center">
        <h1 class = "daftarsiswa-title underliner">
            Pengumuman Kegiatan Kelompok Bermain
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
                    <button type="button" class="btn delete" id = "agree-button">Ya</button>
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

    <div class="agenda-content">
        <div class = "row justify-content-around ">
            <div class="col-sm-9 col-auto agenda">
                Kerja Bakti di Halaman TPA Makara
            </div>
            <div class="col-sm-1 col-auto agenda-detail">
                    Detail
            </div>
            <div class="col-sm-2 col-auto centerer">
                <span>
                    <img src="{{asset('svg/editIcon.svg')}}" alt="Edit">
                </span>
                <span class = "deleteKegiatan">
                    <img src="{{asset('svg/deleteIcon.svg')}}" alt="Delete">
                </span>
            </div>
        </div>
    </div>

    <div href="" class="tambahpengumuman d-flex justify-content-center">
        <span>Tambah Agenda</span>
        <img src="{{asset('svg/plus.svg')}}" alt="nextsign">
    </div>

    <div class = "parent-profile d-flex pengumuman">
        <p class = "underliner-parent-profile">Pengumuman</p>
    </div>

    <div class="agenda-content">
        <div class = "row justify-content-around ">
            <div class="col-sm-9 col-auto agenda">
                Kerja Bakti di Halaman TPA Makara
            </div>
            <div class="col-sm-1 col-auto agenda-detail">
                    Detail
            </div>
            <div class="col-sm-2 col-auto centerer">
                <span>
                    <img src="{{asset('svg/editIcon.svg')}}" alt="Edit">
                </span>
                <span class = "deleteKegiatan">
                    <img src="{{asset('svg/deleteIcon.svg')}}" alt="Delete">
                </span>
            </div>
        </div>
    </div>


    <div href="" class="tambahpengumuman d-flex justify-content-center">
        <span>Tambah Pengumuman</span>
        <img src="{{asset('svg/plus.svg')}}" alt="nextsign">
    </div>


    

@endsection

@section('extra-js')

<script>
    function modalConfirm(callback){
        
        $(".deleteKegiatan").on("click", function(){
            $("#pengumumanKegiatanModal").modal('show');
        });

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
