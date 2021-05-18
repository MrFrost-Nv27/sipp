<script>
var BaseURL = "<?= base_url() ?>";
$(document).ready(function() {
    // ini adalah fungsi untuk mengambil data santri dan di include ke dalam datatable
    var datasantri = $('#datasantri').DataTable({
        "processing": true,
        responsive: true,
        "ajax": "<?= base_url("pesantren/datasantri") ?>",
        stateSave: true,
        "order": []
    })

    // Fungsi untuk Refresh data
    $('#refreshdata').on('click', function() {
        datasantri.ajax.reload(null, false)
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
                    url: "<?= base_url('pesantren/actv') ?>",
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
                        console.log(data);
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

    $('#datasantri').on('click', '.konfirmasi-santri', function() {
        var idsantri = $(this).data('idsantri');
        var iduser = $(this).data('iduser');
        swal.fire({
            title: 'Konfirmasi Pendaftaran',
            text: "Anda ingin mengkonfirmasi pendaftaran akun ini ? Sebelum konfirmasi pendaftaran, harap periksa validasi data yang bersangkutan terlebih dahulu !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Konfirmasi',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?= base_url('pesantren/confirm') ?>",
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
                            'Konfirmasi',
                            'Akun Berhasil Dikonfirmasi',
                            'success'
                        )
                        console.log(data);
                        datasantri.ajax.reload(null, false)
                    }
                })
            } else if (result.dismiss === swal.DismissReason.cancel) {
                swal.fire(
                    'Batal',
                    'Anda membatalkan konfirmasi akun',
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
                    url: "<?= base_url('pesantren/del') ?>",
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
