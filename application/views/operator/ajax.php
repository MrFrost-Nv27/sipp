<script>
$(document).ready(function() {
    // ini adalah fungsi untuk mengambil data santri dan di include ke dalam datatable
    var datasantri = $('#datasantri').DataTable({
        "processing": true,
        "ajax": "<?= base_url("operator/datasantri") ?>",
        stateSave: true,
        "order": []
    })

    // fungsi untuk hapus data
    //pilih selector dari table id datasantri dengan class .hapus-santri
    $('#datasantri').on('click', '.hapus-santri', function() {
        var idsantri = $(this).data('idsantri');
        var iduser = $(this).data('iduser');
        swal.fire({
            title: 'Konfirmasi',
            text: "Anda ingin menghapus ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?= base_url('operator/hapussantri') ?>",
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
