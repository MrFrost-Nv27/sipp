<!-- Modal untuk tambah data santri -->
<div class="modal fade" id="tambahsantri" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Santri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formtambahdatasantri">
                    <div class="form-group row">
                        <label for="inputnama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" placeholder="nama" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" placeholder="alamat" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah Data Santri</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    // ini adalah fungsi untuk mengambil data santri dan di include ke dalam datatable
    var datasantri = $('#datasantri').DataTable({
        "processing": true,
        "ajax": "<?= base_url("operator/datasantri") ?>",
        stateSave: true,
        "order": []
    })

    // Fungsi untuk Refresh data
    $('#refreshdata').on('click', function() {
        datasantri.ajax.reload(null, false)
    });

    // fungsi untuk menambah data  
    $('#formtambahdatasantri').on('submit', function() {
        var nama = $('#nama').val(); // diambil dari id nama yang ada diform modal
        var alamat = $('#alamat').val(); // diambil dari id alamat yanag ada di form modal 

        $.ajax({
            type: "post",
            url: "<?= base_url('operator/add') ?>",
            beforeSend: function() {
                swal.fire({
                    title: 'Menunggu',
                    html: 'Memproses data',
                    didOpen: () => {
                        swal.showLoading()
                    }
                })
            },
            data: {
                nama: nama,
                alamat: alamat
            }, // ambil datanya dari form yang ada di variabel
            dataType: "JSON",
            success: function(data) {
                datasantri.ajax.reload(null, false);
                // bersihkan form pada modal
                swal.fire({
                    icon: 'success',
                    title: 'Tambah Santri',
                    text: 'Anda Berhasil Menambah Mahasiswa'
                })
                $('#tambahsantri').modal('hide');
                // tutup modal
                $('#nama').val('');
                $('#alamat').val('');
                console.log('Insert data berhasil');
            }
        })
        return false;
    });

    // fungsi untuk Aktivasi Akun Santri
    // pilih selector dari table id datasantri dengan class .aktivasi-santri
    $('#datasantri').on('click', '.aktivasi-santri', function() {
        var idsantri = $(this).data('idsantri');
        var iduser = $(this).data('iduser');
        swal.fire({
            title: 'Aktivasi Akun',
            text: "Anda ingin mengaktivasi akun ini ? Sebelum mengaktivasi akun, harap konfirmasi terlebih dahulu kepada pendaftar !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Aktivasi',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?= base_url('operator/index/actv') ?>",
                    method: "post",
                    beforeSend: function() {
                        swal.fire({
                            title: 'Menunggu',
                            html: 'Memproses data',
                            didOpen: () => {
                                swal.showLoading()
                            }
                        })
                    },
                    data: {
                        iduser: iduser,
                        idsantri: idsantri
                    },
                    success: function(data) {
                        swal.fire(
                            'Aktivasi',
                            'Akun Berhasil Diaktivasi',
                            'success'
                        )
                        datasantri.ajax.reload(null, false)
                    }
                })
            } else if (result.dismiss === swal.DismissReason.cancel) {
                swal.fire(
                    'Batal',
                    'Anda membatalkan aktivasi akun',
                    'error'
                )
            }
        })
    });

    // fungsi untuk hapus data
    //pilih selector dari table id datasantri dengan class .hapus-santri
    $('#datasantri').on('click', '.hapus-santri', function() {
        var idsantri = $(this).data('idsantri');
        var iduser = $(this).data('iduser');
        swal.fire({
            title: 'Hapus Akun',
            text: "Anda ingin menghapus akun ini ? Harap tinjau kembali sebelum menghapus akun",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?= base_url('operator/index/hapussantri') ?>",
                    method: "post",
                    beforeSend: function() {
                        swal.fire({
                            title: 'Menunggu',
                            html: 'Memproses data',
                            didOpen: () => {
                                swal.showLoading()
                            }
                        })
                    },
                    data: {
                        iduser: iduser,
                        idsantri: idsantri
                    },
                    success: function(data) {
                        swal.fire(
                            'Hapus',
                            'Berhasil Terhapus',
                            'success'
                        )
                        datasantri.ajax.reload(null, false)
                    }
                })
            } else if (result.dismiss === swal.DismissReason.cancel) {
                swal.fire(
                    'Batal',
                    'Anda membatalkan penghapusan',
                    'error'
                )
            }
        })
    });
});
</script>
