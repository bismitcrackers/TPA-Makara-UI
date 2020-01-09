@extends('layout/master')

@section('title', 'Homepage')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
<div class="container">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100 fill" src="{{asset('picture/image1crs.png')}}" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 fill" src="{{asset('picture/image2crs.jpg')}}" alt="Second slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <div class="col-md-12">
    <h3 id="homeHead">
        Taman Pengembangan Anak Makara UI
    </h3>
    <br>
    <p id="homePara">
        TPAM didirikan oleh Fakultas Psikologi, bekerjasama dengan Fakultas Kedokteran, Fakultas Kedokteran Gigi dan Fakultas Ilmu Keperawatan UI. Kegiatan di TPAM diterapkan melalui metode bermain sambil belajar untuk menstimulasi aspek fisik-motorik, kognitif, sosial-emosi dan kemandirian anak. TPAM bekerjasama dengan orangtua untuk bersama-sama mencapai tumbuh kembang anak yang optimal.
    </p>
  </div>
  <br><br>

  <div class="col-md-12" id="homeVideo">
    <iframe width="100%" height="auto" src="https://www.youtube.com/embed/acl3R_HxYuI" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>

  <br>
  <div class="col-md">
    <h3 id="headerBerita">
        Berita TPAM
    </h3>
    <div class="row">
        <div id="" class="col-md-4"></div>
            <div id="garis" class="col-md-4"></div>
        <div id="" class="col-md-4"></div>
    </div>

    <div class="row" id="berita">
        @foreach($news as $new)
        <div class="col-12 col-sm-6 col-lg-4" id="beritaCont">
        <div style="padding:20px;" id="isiBerita">
          <div>
            <img style="width:100%; height:20vh; object-fit: cover;" id="imgBerita" src="{{asset($new->gambar)}}" alt="bla">
          </div>
          <div>
            <a href="{{ route('admin.berita.show', ['beritum' => $new->id]) }}">
                <h3 id="judulBerita">
                  {{ $new->judul }}
                </h3>
            </a>
            <br>
            <p id="prgBerita" style="height:150px;">
                {{ str_limit(strip_tags($new->isi), 100) }}
            </p>
          </div>
        </div>
        </div>
        @endforeach
    </div>
    <div align="center">
        {{ $news->links("pagination::bootstrap-4") }}
    </div>
  </div>
  <div id="prfsCont">
    <div class="row" id="prfsTpam">
      <div class="col-md-6 ">
        <img src="{{asset('picture\fasilitas1.jpg')}}" alt="prog" class="">
      </div>
      <div class="col-md-6 " id="prfsDesc">
        <div id="imgCont">
          <img src="{{asset('svg\graduation-cap.svg')}}" alt="">
        </div>
        <h3>Program TPAM</h3>
        <p>
          Program dibuat menggunakan pendekatan tematik pada setiap caturwulannya, misalnya kebun binatang, transportasi, buah-buahan dan sayur-sayuran. Aspek perkembangan anak yang distimulasi adalah motorik kasar, motorik halus, kognitif, sosial-emosi.
        </p>
      </div>
    </div>

    <div class="row" id="prfsTpam">

      <div class="col-md-6">
        <img src="{{asset('picture\program1.jpg')}}" alt="fasil">
      </div>
      <div class="col-md-6  order-first" id="prfsDesc">
        <div id="imgCont">
          <img src="{{asset('svg\sand-castle.svg')}}" alt="">
        </div>
        <h3>Fasilitas TPAM</h3>
        <p>TPA Makara dilengkapi dengan berbagai fasilitas bermain dan penunjang kegiatan belajar anak yang dapat mendukung tercapainya perkembangan motorik, kognitif, dan sosial emosi anak. Fasilitas yang ada disesuaikan dengan kebutuhan kelompok usia anak dan didesain seaman mungkin bagi putra-putri tercinta.</p>
      </div>
    </div>
  </div>

  <br>
  <div id="lokasiCont">
    <h3 id="headerLokasi">
        Lokasi TPAM
    </h3>
    <div class="row">
        <div id="" class="col-md-4"></div>
            <div id="garis" class="col-md-4"></div>
        <div id="" class="col-md-4"></div>
    </div>

  </div>

  <div class="lokasi-section container">
      <div style="background-image:url({{ asset('picture/tpamakara.png') }});" class="card-loc">
          <div style="margin: 15px 0 0 0; filter: none; -webkit-filter: none;" class="row loc">
              <img style="width:20px;height:20px;" src="{{asset('svg\clock.svg')}}" alt="jam">
              &nbsp;&nbsp;&nbsp;
              <h5 class="title3">
                Jam Operasional
            </h5>
          </div>
          <div style="margin: 0 0 15px 0;" class="row loc">
              <p style="margin-left:4vh;" class="almlocp">
                  &nbsp;&nbsp;&nbsp;Senin-jum'at : 08.00-16.30 Hrs
              </p>
          </div>
          <div style="margin: 15px 0 0 0;" class="row loc">
              <img style="width:20px;height:20px;" src="{{asset('svg\maps.svg')}}" alt="jam">
              &nbsp;&nbsp;&nbsp;
              <h5 class="title3">
                Alamat TPAM
            </h5>
          </div>
          <div style="margin: 0 0 15px 0;" class="row loc">
              <p style="margin-left:4vh;" class="almlocp">
                  &nbsp;&nbsp;&nbsp;Gedung TPA Makara Fakultas Psikologi Universitas Indonesia
                  <br>&nbsp;&nbsp;&nbsp;Kampus Depok - Jawa Barat
                  <br>&nbsp;&nbsp;&nbsp;Telp: 021-778881082
                  <br>&nbsp;&nbsp;&nbsp;Whatsapp kantor: 0857-7170-6484
                  <br>&nbsp;&nbsp;&nbsp;Email: tpamakara@gmail.com
              </p>
          </div>
      </div>
  </div>
  <!-- <div id="tv" class="jamLoc" >

  <img src="{{asset('svg\clock.svg')}}" alt="jam">
    <div class="row" id="jamOps">
      <div id="logoJam" class="col-md-3 col-3">
      </div>
      <div class="col-md col">
        <h3 class="title3">
          Jam Operasional
        </h3>
        <p  class="almlocp">
          Senin-jum'at : 08.00-16.30 Hrs
        </p>
      </div>
    </div> -->
<!--
    <div class="row" id="almtTpam">
      <div id="logoAlmt" class="col-md-3 col-3">
        <img src="{{asset('svg\maps.svg')}}" alt="almt">
      </div>
      <div class="col-md col">
        <h3 class="title3">
          Alamat TPAM
        </h3>
        <p class="almlocp">
          Gedung TPA Makara Fakultas Psikologi Universitas Indonesia
          Kampus Depok - Jawa Barat
          Telp: 021-778881082
          Whatsapp kantor: 0857-7170-6484
          Email: tpamakara@gmail.com
        </p>
      </div>
    </div> -->

  </div>

  <br>
  <div class="pigeon">
    <h3 id="headerLokasi">
          Supported By
    </h3>
    <div class="row">
        <div id="" class="col-md-4"></div>
            <div id="garis" class="col-md-4"></div>
        <div id="" class="col-md-4"></div>
    </div>
    <div id="imgCont">
      <img src="{{asset('picture\pigeon-logo.png')}}" alt="">
    </div>
  </div>

  <div class="row" id="sosmed">
    <div>
      <a style="border-radius: 10%;" href="https://www.facebook.com/tpa.makara"><img style="border-radius: 20%;" src="{{asset('svg/facebook.svg')}}" alt="" ></a>
      <a style="border-radius: 10%;" href="https://www.instagram.com/tpamakara/"><img style="border-radius: 20%;"  src="{{asset('svg/instagram.svg')}}" alt="" ></a>
      <a style="border-radius: 10%;" href="https://youtu.be/acl3R_HxYuI"><img style="border-radius: 20%;" src="{{asset('svg/youtube.svg')}}" alt="" ></a>
    </div>
  </div>
</div>



@endsection

@section('extra-js')
@endsection
