@extends('layout/master')

@section('title', 'List Student Kelas Bermain - GURU')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

    <div class = "d-flex justify-content-center">
        <h1 class = "daftarsiswa-title underliner">
            {{ $student->nama_panggilan }}’s Profile
        </h1>
    </div>

    @if(auth()->user()->roles()->first()->description == 'Full Access')
    <div class = "d-flex justify-content-end">
        <div>
            <button type="button" id = "btn-passconfirm" class="btn btn-danger pass" data-toggle="modal" data-target="#studentPassModal">
                @if($student->lulus)
                    Batalkan kelulusan
                @else
                    Lulus
                @endif
            </button>
        </div>
    </div>
    @endif

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
                    @if($student->lulus)
                    <p>Yakin ingin membatalkan kelulusan</p>
                    @else
                    <p>Yakin ingin meluluskan</p>
                    @endif
                    <p>{{ $student->nama_lengkap }}?</p>
                </h5>
            </div>
            <div class="modal-footer centerer">

                <div class = "confirm-button">
                    <button type="button" class="btn btn-secondary editbuttoncancel" data-dismiss="modal" id = "disagree-button">Tidak</button>
                    @if($student->lulus)
                    <form method="POST" action="{{ route('profile.edit.ungraduate', ['student_id' => $student->id]) }}">
                        {{ csrf_field() }}
                        <button type="submit" class="btn editbutton" id = "agree-button">Ya</button>
                    </form>
                    @else
                    <form method="POST" action="{{ route('profile.edit.graduate', ['student_id' => $student->id]) }}">
                        {{ csrf_field() }}
                        <button type="submit" class="btn editbutton" id = "agree-button">Ya</button>
                    </form>
                    @endif
                </div>
            </div>
            </div>
        </div>
    </div>

    <!-- alert agree -->
    <div class="alert alert-success" id="agree" role="alert" aria-hidden="true">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        @if($student->lulus)
        <strong>Siswa </strong>tidak diluluskan.
        @else
        <strong>Siswa </strong>diluluskan.
        @endif
    </div>

    <!-- alert disagree -->
    <div class="alert alert-danger" id="disagree" role="alert" aria-hidden="true">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        @if($student->lulus)
        <strong>Siswa </strong>tetap diluluskan.
        @else
        <strong>Siswa </strong>tetap tidak diluluskan.
        @endif
    </div>

    <div class="d-flex justify-content-center">
        <div class="d-flex flex-row justify-content-around boxprofile p-3">
            <div class ="d-flex align-items-center margin-profile sizingprof">
                <div>
                    @if($student->jenis_kelamin == 'laki-laki')
                    <img id="pp-siswa" src="{{asset('picture/laki.png')}}" class="profilepicture" alt="laki" onmouseover="hover(this);" onmouseout="unhoverboy(this);">
                    @else
                    <img id="pp-siswa" src="{{asset('picture/perempuan.png')}}" class="profilepicture" alt="perempuan" onmouseover="hover(this);" onmouseout="unhovergirl(this);">
                    @endif
                    <a href="{{ route('profile.edit.student.form', ['student_id' => $student->id]) }}" class="linkeditprofile">
                        <div class="editprofile">
                            <p class="paragrapheditprofile">Edit Profile</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="ml-4">
                <div class="row justify-content-between">
                    <p class="col-5 p-0 profilelabel mb-0">Nama</p>
                    <p class="col-1 p-0 m-0">:</p>
                    <p class="col-5 p-0 profilecontent mb-0 pr-0"> {{ $student->nama_lengkap }} </p>
                </div>
                <div class="row justify-content-between">
                    <p class="col-5 p-0 mb-0 profilelabel">Nama Panggilan</p>
                    <p class="col-1 p-0 m-0">:</p>
                    <p class="col-5 p-0 mb-0 profilecontent">{{ $student->nama_panggilan }}</p>
                </div>
                <div class="row justify-content-between">
                    <p class="col-5 p-0 mb-0 profilelabel">Tempat</p>
                    <p class="col-1 p-0 m-0">:</p>
                    <p class="col-5 p-0 mb-0 profilecontent">{{ $student->tempat_lahir }}</p>
                </div>
                <div class="row justify-content-between">
                    <p class="col-5 p-0 mb-0 profilelabel">Tanggal Lahir</p>
                    <p class="col-1 p-0 m-0">:</p>
                    <p class="col-5 p-0 mb-0 profilecontent">{{ date('d-m-Y', strtotime($student->tanggal_lahir)) }}</p>
                </div>
                <div class="row justify-content-between">
                    <p class="col-5 p-0 mb-0 profilelabel">Agama</p>
                    <p class="col-1 p-0 m-0">:</p>
                    <p class="col-5 p-0 mb-0 profilecontent">{{ $student->agama }}</p>
                </div>
                <div class="row justify-content-between">
                    <p class="col-5 p-0 mb-0 profilelabel">Alamat Rumah</p>
                    <p class="col-1 p-0 m-0">:</p>
                    <p class="col-5 p-0 mb-0 profilecontent">{{ $student->alamat_rumah }}</p>
                </div>
                <div class="row justify-content-between">
                    <p class="col-5 p-0 mb-0 profilelabel">Telepon Rumah</p>
                    <p class="col-1 p-0 m-0">:</p>
                    <p class="col-5 p-0 mb-0 profilecontent">{{ $student->telepon_rumah }}</p>
                </div>
                <div class="row justify-content-between">
                    <p class="col-5 p-0 mb-0 profilelabel">Kelas</p>
                    <p class="col-1 p-0 m-0">:</p>
                    <p class="col-5 p-0 mb-0 profilecontent">{{ $student->kelas }}</p>
                </div>
            </div>
        </div>
    </div>


    <div class="d-flex justify-content-center">
        <div class="boxprofile-outer">
            <div class = "d-flex justify-content-start">
                <h4 class = "parent-profile underliner-parent-profile">
                    {{ $student->nama_panggilan }} Mom’s Profile
                </h4>
            </div>
            <div class="d-flex flex-row justify-content-around p-3 boxprofile">
                <div class ="d-flex align-items-center margin-profile sizingprof">
                    <div>
                        <img src="{{asset('picture/mom.png')}}" class="profilepicture" alt="Mom">
                        <a href="{{ route('profile.edit.mother.form', ['student_id' => $student->id]) }}" class="linkeditprofile">
                            <div class="editprofile">
                                <p class="paragrapheditprofile">Edit Profile</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="ml-4">
                    <div class="row justify-content-center">
                        <p class="col-5 p-0 profilelabel mb-0">Nama</p>
                        <p class="col-1 p-0 m-0">:</p>
                        <p class="col-5 p-0 profilecontent mb-0 pr-0">{{ $mom->nama_lengkap }}</p>
                    </div>
                    <div class="row justify-content-center">
                        <p class="col-5 p-0 mb-0 profilelabel">Tanggal Lahir</p>
                        <p class="col-1 p-0 m-0">:</p>
                        <p class="col-5 p-0 mb-0 profilecontent">{{ date('d-m-Y', strtotime($mom->tanggal_lahir)) }}</p>
                    </div>
                    <div class="row justify-content-center">
                        <p class="col-5 p-0 mb-0 profilelabel">Pendidikan Terakhir</p>
                        <p class="col-1 p-0 m-0">:</p>
                        <p class="col-5 p-0 mb-0 profilecontent">{{ $mom->pendidikan }}</p>
                    </div>
                    <div class="row justify-content-center">
                        <p class="col-5 p-0 mb-0 profilelabel">Pekerjaan</p>
                        <p class="col-1 p-0 m-0">:</p>
                        <p class="col-5 p-0 mb-0 profilecontent">{{ $mom->pekerjaan }}</p>
                    </div>
                    <div class="row justify-content-center">
                        <p class="col-5 p-0 mb-0 profilelabel">Alamat Kantor</p>
                        <p class="col-1 p-0 m-0">:</p>
                        <p class="col-5 p-0 mb-0 profilecontent">{{ $mom->alamat_rumah }}</p>
                    </div>
                    <div class="row justify-content-center">
                        <p class="col-5 p-0 mb-0 profilelabel">Email</p>
                        <p class="col-1 p-0 m-0">:</p>
                        <p class="col-5 p-0 mb-0 profilecontent">{{ $mom->email }}</p>
                    </div>
                    <div class="row justify-content-center">
                        <p class="col-5 p-0 mb-0 profilelabel">No. HP</p>
                        <p class="col-1 p-0 m-0">:</p>
                        <p class="col-5 p-0 mb-0 profilecontent">{{ $mom->no_handphone }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="d-flex justify-content-center">
        <div class="boxprofile-outer">
            <div class = "d-flex justify-content-start">
                <h4 class = "parent-profile underliner-parent-profile">
                    {{ $student->nama_panggilan }} Dad’s Profile
                </h4>
            </div>
            <div class="d-flex flex-row justify-content-around boxprofile p-3">
                <div class ="d-flex align-items-center margin-profile sizingprof">
                    <div>
                        <img src="{{asset('picture/dad.png')}}" class="profilepicture" alt="Dad">
                        <a href="{{ route('profile.edit.father.form', ['student_id' => $student->id]) }}" class="linkeditprofile">
                            <div class="editprofile">
                                <p class="paragrapheditprofile">Edit Profile</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="ml-4">
                    <div class="row justify-content-center">
                        <p class="col-5 p-0 profilelabel mb-0">Nama</p>
                        <p class="col-1 p-0 m-0">:</p>
                        <p class="col-5 p-0 profilecontent mb-0 pr-0"> {{ $dad->nama_lengkap }} </p>
                    </div>
                    <div class="row justify-content-center">
                        <p class="col-5 p-0 mb-0 profilelabel">Tanggal Lahir</p>
                        <p class="col-1 p-0 m-0">:</p>
                        <p class="col-5 p-0 mb-0 profilecontent">{{ date('d-m-Y', strtotime($dad->tanggal_lahir)) }}</p>
                    </div>
                    <div class="row justify-content-center">
                        <p class="col-5 p-0 mb-0 profilelabel">Pendidikan Terakhir</p>
                        <p class="col-1 p-0 m-0">:</p>
                        <p class="col-5 p-0 mb-0 profilecontent">{{ $dad->pendidikan }}</p>
                    </div>
                    <div class="row justify-content-center">
                        <p class="col-5 p-0 mb-0 profilelabel">Pekerjaan</p>
                        <p class="col-1 p-0 m-0">:</p>
                        <p class="col-5 p-0 mb-0 profilecontent">{{ $dad->pekerjaan }}</p>
                    </div>
                    <div class="row justify-content-center">
                        <p class="col-5 p-0 mb-0 profilelabel">Alamat Kantor</p>
                        <p class="col-1 p-0 m-0">:</p>
                        <p class="col-5 p-0 mb-0 profilecontent">{{ $dad->alamat_rumah }}</p>
                    </div>
                    <div class="row justify-content-center">
                        <p class="col-5 p-0 mb-0 profilelabel">Email</p>
                        <p class="col-1 p-0 m-0">:</p>
                        <p class="col-5 p-0 mb-0 profilecontent">{{ $dad->email }}</p>
                    </div>
                    <div class="row justify-content-center">
                        <p class="col-5 p-0 mb-0 profilelabel">No. HP</p>
                        <p class="col-1 p-0 m-0">:</p>
                        <p class="col-5 p-0 mb-0 profilecontent">{{ $dad->no_handphone }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class = "parent-profile d-flex agenda-kegiatan">
        <p class = "underliner-parent-profile">Jadwal Per Bulan</p>
    </div>

    @if($schedule != null)
    <div style="margin: 0 auto; text-align: center" for="pembuatdc" class="dclabel">{{ $schedule->judul }}</div>
    @endif

    <div style="text-align:center;">
        @if($schedule != null)
            @foreach($scheduleImages as $scheduleImage)
                <div class="dcinput">
                    <img id="imgbuku" src="{{ asset($scheduleImage->url_lampiran) }}" alt="please insert image">
                </div>
            @endforeach
        @endif
    </div>

    <div class = "parent-profile d-flex agenda-kegiatan">
        <p class = "underliner-parent-profile">Agenda Kegiatan</p>
    </div>

        <div class="agenda-content">
            <div class = "row justify-content-around ">
            @foreach( $agenda as $ag )
                <div class="col-sm-11 col-auto agenda">
                    {{ $ag->judul }}
                </div>
                <a href="{{ route('profile.pengumuman.show', ['kelas' => $student->kelas, 'id' => $ag->id]) }}">
                    <div class="col-sm-1 col-auto agenda-detail">
                            Detail
                    </div>
                </a>
            @endforeach
            </div>

        </div>

        <div class = "parent-profile d-flex pengumuman">
            <p class = "underliner-parent-profile">Pengumuman</p>
        </div>

        <div class="agenda-content">
            <div class = "row justify-content-around ">
            @foreach( $pengumuman as $p )
                <div class="col-sm-11 col-auto agenda">
                    {{ $p->judul }}
                </div>
                <a href="{{ route('profile.pengumuman.show', ['kelas' => $student->kelas, 'id' => $p->id]) }}">
                    <div class="col-sm-1 col-auto agenda-detail">
                            Detail
                    </div>
                </a>
            @endforeach
            </div>
        </div>

        <div class = "parent-profile d-flex pengumuman">
            <p class = "underliner-parent-profile">Tagihan Pembayaran</p>
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
                </tr>
            </thead>
            <tbody>
                @foreach($formattedTagihanList as $formattedTagihan)
                    <tr>
                        <th scope="row" class = "name">{{ $formattedTagihan->nama_lengkap }}</th>
                        <td>{{ $formattedTagihan->jenis_tagihan }}</td>
                        <td>Rp {{ $formattedTagihan->jumlah_tagihan }}</td>
                        <td>
                            @if($formattedTagihan->status == '')

                            @elseif($formattedTagihan->status != 'Lunas')
                            <div class="belum-lunas">
                                {{ $formattedTagihan->status }}
                            </div>
                            @else
                            <div class="lunas">
                                {{ $formattedTagihan->status }}
                            </div>
                            @endif
                        </td>
                        <td>Rp {{ $formattedTagihan->total_tagihan }}</td>
                        <td>
                            @if($formattedTagihan->bukti_pembayaran != '')
                                <img id="imgbuku" src="{{ asset($formattedTagihan->bukti_pembayaran) }}" alt="please insert image">
                            @else
                                <div href="#" class="tambahfoto d-flex justify-content-center dcinput" onclick="burninput()">
                                    <span>Upload Bukti</span>
                                    <img src="{{asset('svg/plus.svg')}}" alt="plus">
                                </div>
                                <form method="POST" action="{{ route('profile.tagihan.upload', ['kelas' => $student->kelas, 'student_id' => $formattedTagihan->student_id, 'tagihan_id' => $formattedTagihan->tagihan_id]) }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input name="bukti_pembayaran" type="file" id="inputfile">
                                    <button type="submit" class="belum-lunas btn editbutton" id = "upload-button" hidden>Upload Bukti</button>
                                </form>
                            @endif
                        </td>
                        <td>
                            @if($formattedTagihan->kwitansiCheck)
                            <a href="{{ route('profile.tagihan.kwitansi', ['kelas' => $student->kelas, 'student_id' => $formattedTagihan->student_id, 'tagihan_id' => $formattedTagihan->tagihan_id]) }}">
                                <div class="btn btn-danger">
                                    Kwitansi
                                </div>
                            </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



@endsection

@section('extra-js')

    <script>

        function modalConfirm(callback){
            $("#btn-passconfirm").on("click", function(){
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

        function burninput(event){
            $("#inputfile").click();
        }

        function readURL(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
              // $('#imgbuku').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
          }
        }

        $("#inputfile").change(function() {
          readURL(this);
          $("#upload-button").click();
        });

        function hover(element) {
          element.setAttribute('src', "{{asset($student->foto_profile)}}");
        }

        function unhoverboy(element) {
          element.setAttribute('src', "{{asset('picture/laki.png')}}");
        }

        function unhovergirl(element) {
          element.setAttribute('src', "{{asset('picture/perempuan.png')}}");
        }

    </script>

@endsection
