@extends('layout/master')

@section('title', 'Tambah Tagihan')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

    <div class="d-flex justify-content-center">
        <h1 class = "bukupenghubung-title underliner">
            Tambah Tagihan
        </h1>
    </div>

    @if($route == 'add')
    <form method="POST" action="{{ route('profile.tagihan.add', ['kelas' => $kelas, 'student_id' => $student_id]) }}" enctype="multipart/form-data">
    @elseif($route == 'edit')
    <form method="POST" action="{{ route('profile.tagihan.edit', ['kelas' => $kelas, 'student_id' => $student_id, 'tagihan_id' => $tagihan_id]) }}" enctype="multipart/form-data">
    @endif
    {{ csrf_field() }}
        <div class="form-group">
            <label for="jenistagihan" class="editlabel">JENIS TAGIHAN</label>
            <div class="col-auto">
                <select class="form-control" id="jenistagihan" name="jenis_tagihan" required>
                    <option value="Uang Pangkal" <?php if($route=='edit' && $tagihan->jenis_tagihan=='Uang Pangkal') {echo 'selected';} ?> >Uang Pangkal</option>
                    @if($kelas == 'Kelompok Bermain')
                    <option value="Iuran Bulanan Kupu-Kupu" <?php if($route=='edit' && $tagihan->jenis_tagihan=='Iuran Bulanan Kupu-Kupu') {echo 'selected';} ?> >Iuran Bulanan Kupu-Kupu</option>
                    <option value="Iuran Bulanan Kepompong" <?php if($route=='edit' && $tagihan->jenis_tagihan=='Iuran Bulanan Kepompong') {echo 'selected';} ?> >Iuran Bulanan Kepompong</option>
                    <option value="Iuran Kegiatan" <?php if($route=='edit' && $tagihan->jenis_tagihan=='Iuran Kegiatan') {echo 'selected';} ?> >Iuran Kegiatan</option>
                    @else
                    <option value="Iuran Bulanan (2 x seminggu)" <?php if($route=='edit' && $tagihan->jenis_tagihan=='Iuran Bulanan (2 x seminggu)') {echo 'selected';} ?> >Iuran Bulanan (2 x seminggu)</option>
                    <option value="Iuran Bulanan (3 x seminggu)" <?php if($route=='edit' && $tagihan->jenis_tagihan=='Iuran Bulanan (3 x seminggu)') {echo 'selected';} ?> >Iuran Bulanan (3 x seminggu)</option>
                    <option value="Iuran Bulanan (5 x seminggu)" <?php if($route=='edit' && $tagihan->jenis_tagihan=='Iuran Bulanan (5 x seminggu)') {echo 'selected';} ?> >Iuran Bulanan (5 x seminggu)</option>
                    <option value="Iuran Kegiatan (2 x seminggu)" <?php if($route=='edit' && $tagihan->jenis_tagihan=='Iuran Kegiatan (2 x seminggu)') {echo 'selected';} ?> >Iuran Kegiatan (2 x seminggu)</option>
                    <option value="Iuran Kegiatan (3 x seminggu)" <?php if($route=='edit' && $tagihan->jenis_tagihan=='Iuran Kegiatan (3 x seminggu)') {echo 'selected';} ?> >Iuran Kegiatan (3 x seminggu)</option>
                    <option value="Iuran Kegiatan (5 x seminggu)" <?php if($route=='edit' && $tagihan->jenis_tagihan=='Iuran Kegiatan (5 x seminggu)') {echo 'selected';} ?> >Iuran Kegiatan (5 x seminggu)</option>
                    @endif
                    <option value="Trial" <?php if($route=='edit' && $tagihan->jenis_tagihan=='Trial') {echo 'selected';} ?> >Trial</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="bulan" class="editlabel">BULAN</label>
            <input <?php if($route=='edit') {echo 'value="' . $tagihan->bulan_tagihan . '"';} ?> name="bulan_tagihan" type="month" placeholder = "Bulan" class="form-control editinput" id = "bulan" required>
        </div>
        <div class="form-group">
            <label for="jumlahtagihan" class="editlabel">JUMLAH TAGIHAN</label>
            <div class="input-group">
                <span class="input-group-btn">
                    <button disabled id="show_password" class="btn btn-secondary" type="button">
                        <span class="Rp">Rp</span>
                    </button>
                </span>
                <input <?php if($route=='edit') {echo 'value="' . $tagihan->jumlah_tagihan . '"';} ?> name="jumlah_tagihan" class="form-control editinput" id="jumlahtagihan" aria-describedby="jumlahtagihan" placeholder="Jumlah Tagihan" required>
            </div>
        </div>
        <div class="form-group">
            <label for="deskripsi" class="editlabel">DESKRIPSI</label>
            <input <?php if($route=='edit') {echo 'value="' . $tagihan->deskripsi . '"';} ?> name="deskripsi" type="text" placeholder = "Deskripsi" class="form-control editinput" id = "deskripsi">
        </div>
        <div class="form-group">
            <label for="status" class="editlabel">STATUS</label>
            <div class="col-auto">
                @if($route == 'add')
                    <select class="form-control" id="status" name="status" required>
                        <option value="Belum Lunas">Belum Lunas</option>
                        <option value="Lunas">Lunas</option>
                    </select>
                @else
                    <select class="form-control" id="status" name="status" required>
                        @if($tagihan->status == 'Belum Lunas')
                        <option value="Belum Lunas" selected>Belum Lunas</option>
                        <option value="Lunas">Lunas</option>
                        @else
                        <option value="Belum Lunas">Belum Lunas</option>
                        <option value="Lunas" selected>Lunas</option>
                        @endif
                    </select>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="buktipembayaran" class="editlabel">BUKTI PEMBAYARAN</label>
            <input name="bukti_pembayaran" type="file" class="form-control editinput" id = "buktipembayaran">
        </div>
        @if($route=='edit')
            <img id="imgbuku" src="{{ asset($tagihan->bukti_pembayaran) }}" alt="please insert image">
        @else
            <img id="imgbuku" src="" alt="please insert image">
        @endif
        <div class="d-flex justify-content-center">
          <a href="{{ url()->previous() }}">
            <button type="button" class="btn btn-primary editbuttoncancel d-flex justify-content-center">
                Cancel
            </button>
          </a>
            <button type="submit" class="btn btn-primary editbutton d-flex justify-content-center">
                <div class="d-flex align-items-center">
                    <p>Save</p>
                    <img src="{{asset('svg/nextsign.svg')}}" alt="nextsign">
                </div>
            </button>
        </div>
    </form>
@endsection

@section('extra-js')

<script>

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#imgbuku').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#buktipembayaran").change(function() {
  readURL(this);
});

</script>

<script type="text/javascript" src="{{ asset('js/form-tagihan.js') }}"></script>

@endsection
