@extends('layout/master')

@section('title', 'Tagihan Siswa')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <div class = "d-flex justify-content-center">
        <h1 class = "tagihan-title underliner">
            Tagihan Siswa Daycare
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
                    <button type="submit" class="btn editbutton" id = "agree-button">Ya</button>
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
                    <th scope="col">action</th>            
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" rowspan="2" class = "name">Abyan Althaf K</th>
                    <td>Uang Pangkal</td>
                    <td>Rp 500.000</td>
                    <td>
                        <div class = "belum-lunas">
                            Belum Lunas
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a>
                            <img src="{{asset('svg/tagihan-edit.svg')}}" alt="tagihan-edit">
                        </a>
                        <a class = "btn-passconfirm">
                            <img src="{{asset('svg/tagihan-delete.svg')}}" alt="tagihan-delete">
                        </a>
                        <a href="" class = "name add-tagihan">
                            <img src="{{ asset('svg/plus.svg') }}" alt="">
                            <span>Tambah Tagihan</span>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Iuran Bulanan (2 x seminggu)</td>
                    <td>Rp500.000</td>
                    <td>
                        <div class = "belum-lunas">
                            Belum Lunas
                        </div>
                    </td>
                    <td>Rp1.000.000</td>
                    <td></td>
                    <td></td>
                    <td>
                        <a>
                            <img src="{{asset('svg/tagihan-edit.svg')}}" alt="tagihan-edit">
                        </a>
                        <a class = "btn-passconfirm">
                            <img src="{{asset('svg/tagihan-delete.svg')}}" alt="tagihan-delete">
                        </a>
                        <a href="" class = "name add-tagihan">
                            <img src="{{ asset('svg/plus.svg') }}" alt="">
                            <span>Tambah Tagihan</span>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class = "name">Anya Radhya T</th>
                    <td>Uang Pangkal</td>
                    <td>Rp 500.000</td>
                    <td>
                        <div class = "lunas">
                            Lunas
                            <img style = "padding-left: 4px" src="{{asset('svg/lunasarrow.svg')}}" alt="">
                        </div>
                    </td>
                    <td>Rp 500.000</td>
                    <td>
                        <img src="{{asset('svg/exampleBuktiPembayaran.svg')}}" alt="">
                    </td>
                    <td></td>
                    <td>
                        <a>
                            <img src="{{asset('svg/tagihan-edit.svg')}}" alt="tagihan-edit">
                        </a>
                        <a class = "btn-passconfirm">
                            <img src="{{asset('svg/tagihan-delete.svg')}}" alt="tagihan-delete">
                        </a>
                        <a href="" class = "name add-tagihan">
                            <img src="{{ asset('svg/plus.svg') }}" alt="">
                            <span>Tambah Tagihan</span>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Akhtar Rasyid A</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a>
                            <img src="{{asset('svg/tagihan-edit.svg')}}" alt="tagihan-edit">
                        </a>
                        <a class = "btn-passconfirm">
                            <img src="{{asset('svg/tagihan-delete.svg')}}" alt="tagihan-delete">
                        </a>
                        <a href="" class = "name add-tagihan">
                            <img src="{{ asset('svg/plus.svg') }}" alt="">
                            <span>Tambah Tagihan</span>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Arudita Saphira P</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a>
                            <img src="{{asset('svg/tagihan-edit.svg')}}" alt="tagihan-edit">
                        </a>
                        <a class = "btn-passconfirm">
                            <img src="{{asset('svg/tagihan-delete.svg')}}" alt="tagihan-delete">
                        </a>
                        <a href="" class = "name add-tagihan">
                            <img src="{{ asset('svg/plus.svg') }}" alt="">
                            <span>Tambah Tagihan</span>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Akhtar Rasyid A</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a>
                            <img src="{{asset('svg/tagihan-edit.svg')}}" alt="tagihan-edit">
                        </a>
                        <a class = "btn-passconfirm">
                            <img src="{{asset('svg/tagihan-delete.svg')}}" alt="tagihan-delete">
                        </a>
                        <a href="" class = "name add-tagihan">
                            <img src="{{ asset('svg/plus.svg') }}" alt="">
                            <span>Tambah Tagihan</span>
                        </a>
                    </td>
                </tr>
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
     function modalConfirm(callback){
            $(".btn-passconfirm").on("click", function(){
                $("#studentPassModal").modal('show');
            });

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
