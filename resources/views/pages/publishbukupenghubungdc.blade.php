@extends('layout/master')

@section('title', 'Create Buku Penghubung Daycare')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

    <div class="d-flex justify-content-center">
        <h1 class = "bukupenghubung-title underliner">
            Buku Penghubung
        </h1>
    </div>

    <form action="">
        <div class="tab">
            <div class="form-group">
                <label for="pembuatdc" class="dclabel">PEMBUAT</label>
                <input type="text" class="form-control dcinput" id="pembuatdc" aria-describedby="pembuat" placeholder="Nama Pembuat" autocapitalize="words" required>
            </div>
            <div class="form-group">
                <label for="datepicker" class="dclabel">TANGGAL</label>
                <input type="text" class="form-control dcinput tanggaldc" id="datepicker" placeholder="dd-mm-yyyy" required>
            </div>
            <div class="form-group">
                <label for="temadc" class="dclabel">TEMA</label>
                <input type="text" class="form-control dcinput" id="temadc" aria-describedby="tema" placeholder="Tema" required>
            </div>
            <div class="form-group">
                <label for="subtemadc" class="dclabel">SUBTEMA</label>
                <input type="text" class="form-control dcinput" id="subtemadc" aria-describedby="subtema" placeholder="Sub Tema" required>
            </div>
            <button type="button" class="btn btn-primary dcbutton d-flex justify-content-center" onclick = "nextPrev(1)">
                Next
                <img src="{{asset('svg/nextsign.svg')}}" alt="nextsign">
            </button>
        </div>

        <div class="tab">
            <h2 class="subbukupenghubung-title"><u>ASPEK</u></h2>
            <div class="centerer">
                <img src="{{asset('svg/fisik.svg')}}" class="dcimg" alt="fisik">
            </div>
            <div class="form-group">
                <label for="keterangandcfisik" class="dclabel ">KETERANGAN</label>
                <textarea class="form-control dcinput" id="keterangandcfisik" rows="5" placeholder="Max. 150 karakter" maxlength="150" required></textarea>
            </div>
            <div class="centerer">
                <img src="{{asset('svg/kognitif.svg')}}" class="dcimg" alt="kognitif">
            </div>
            <div class="form-group">
                <label for="keterangandckognitif" class="dclabel">KETERANGAN</label>
                <textarea class="form-control dcinput" id="keterangandckognitif" rows="5" placeholder="Max. 150 karakter" maxlength="150" required></textarea>
            </div>
            <div class="centerer">
                <img src="{{asset('svg/sosial-emosi.svg')}}" class="dcimg" alt="sosial-emosi">
            </div>
            <div class="form-group">
                <label for="keterangandcfisiksosialem" class="dclabel">KETERANGAN</label>
                <textarea class="form-control dcinput" id="keterangandcsosialem" rows="5" placeholder="Max. 150 karakter" maxlength="150" required></textarea>
            </div>
            <button type="button" class="btn btn-primary dcbutton d-flex justify-content-center" onclick="nextPrev(1)">
                Next
                <img src="{{asset('svg/nextsign.svg')}}" alt="nextsign">
            </button>
        </div>

        <div class="tab">
            <h2 class="subbukupenghubung-title"><u>CATATAN</u></h2>
            <div class="form-group">
                <label for="snackdc" class="dclabel ">SNACK</label>
                <textarea class="form-control dcinput" id="snackdc" rows="5" placeholder="Max. 150 karakter" maxlength="150"></textarea>
            </div>
            <div class="form-group">
                <label for="makansiangdc" class="dclabel ">MAKAN SIANG</label>
                <textarea class="form-control dcinput" id="makansiangdc" rows="5" placeholder="Max. 150 karakter" maxlength="150"></textarea>
            </div>
            <div class="form-group">
                <label for="tidursiangdc" class="dclabel ">TIDUR SIANG</label>
                <textarea class="form-control dcinput" id="tidursiangdc" rows="5" placeholder="Max. 150 karakter" maxlength="150"></textarea>
            </div>
            <h2 class="subbukupenghubung-title"><u>CATATAN KHUSUS</u></h2>
            <div class="form-group">
                <textarea class="form-control dcinput" id="catatankhususdc" rows="5" placeholder="Max. 150 karakter" maxlength="150"></textarea>
            </div>
            <h2 class="subbukupenghubung-title"><u>LAMPIRAN</u></h2>
            <div href="" class="tambahfoto d-flex justify-content-center dcinput" onclick="burninput()">
                <span>Tambah Foto</span>
                <img src="{{asset('svg/plus.svg')}}" alt="nextsign">
            </div>
            <input type="file" id="inputfile">
            <button type="submit" class="btn btn-primary dcbutton d-flex justify-content-center" onclick="nextPrev(1)">
                Publish
                <img src="{{asset('svg/nextsign.svg')}}" alt="nextsign">
            </button>    
        </div>        
    </form>
    

@endsection

@section('extra-js')

    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        (document.getElementsByClassName("tab"))[currentTab].style.transform = "scale(1,1)";
        (document.getElementsByClassName("tab"))[currentTab].style.height = "100%";


        function nextPrev(n) {
            var x = document.getElementsByClassName("tab");
            if (n == 1 && !validateForm()) return false;
            x[currentTab].style.display = "none";
            currentTab += n;
            console.log(currentTab);
            x[currentTab].style.transform = "scale(1,1)";
            x[currentTab].style.height = "100%";
            
        }


        function validateForm() {
        // This function deals with validation of the form fields
            var x, y, i, test, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");

            if (y.length<1){
                y = x[currentTab].getElementsByTagName("textarea");
            }
           

            // Function that verify
            for (i = 0; i < y.length; i++) {
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].style.background="#ffdddd";
                    y[i].placeholder = "Input invalid!"
                    // and set the current valid status to false:
                    valid = false;
                    console.log("false");
                }
                else{
                    y[i].style.background = "white";
                }
            }
            console.log(valid);
            return valid; // return the valid status
        }

        function burninput(event){
            $("#inputfile").click();
        }

        $( function() {
            $( "#datepicker" ).datepicker({
                dateFormat: "dd-mm-yy",
                defaultDate: 0,
            });
        });
    </script>

    <script>
        
    </script>


    
@endsection
