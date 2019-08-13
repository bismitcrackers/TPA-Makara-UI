function deleteId(id) {
    console.log(id);
    $('#formDelete').attr('action', 'http://localhost:8000/admin/pengumuman/' + id);
    $("#pengumumanKegiatanModal").modal('show');
}
