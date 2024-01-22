<div class="modal fade" id="editbiodata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Biodata</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ml-2 mr-2">
                <div id="formeditbiodata">

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ubahpesantren" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Pesantren</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ml-2 mr-2">
                <form class="login100-form validate-form" id="formeditpesantren">
                    <div class="wrap-input100 validate-input" data-validate="Pesantren Tidak boleh kosong">
                        <span class="label-input100">Komplek Pesantren</span>
                        <select class="select-text" name="pesantren" id="edit-pesantren" required>
                            <option value="" class="" disabled selected>--- Pilih Komplek Pesantren ---</option>
                            <?php foreach ($pesantren as $pondok) : ?>
                            <option value="<?= $pondok['id']; ?>"><?= $pondok['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="focus-select" data-symbol="location_city"></span>
                    </div>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit">
                                Ubah Pesantren
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="daftarsekolah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftar Sekolah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ml-2 mr-2">
                <form class="login100-form validate-form" id="formdaftarsekolah">
                    <div class="wrap-input100 validate-input">
                        <span class="label-input100">Jenis Pendaftaran</span>
                        <select class="select-text" name="jenisdaftar" id="edit-jenisdaftar" required>
                            <option value="" class="" disabled selected>--- Pilih jenis Pendaftaran ---</option>
                            <?php foreach ($jenisDaftar as $jd) : ?>
                            <option value="<?= $jd['cvalue']; ?>"><?= $jd['cvalue']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="focus-select" data-symbol="assignment"></span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <span class="label-input100">Asal Sekolah</span>
                        <input class="input100" type="text" name="asalsekolah" id="edit-asalsekolah"
                            placeholder="Masukkan Asal Sekolah" value="<?= $user['sekolahasal']; ?>" required>
                        <span class="focus-input100" data-symbol="history_edu"></span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <span class="label-input100">NISN</span>
                        <input class="input100" type="tel" name="nisn" id="edit-nisn" placeholder="Masukkan NISN"
                            value="<?= $user['nisn']; ?>" required>
                        <span class="focus-input100" data-symbol="pin"></span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <span class="label-input100">Lembaga Sekolah</span>
                        <select class="select-text" name="sekolah" id="edit-sekolah" required>
                            <option value="" class="" disabled selected>--- Pilih Lembaga Sekolah ---</option>
                            <?php foreach ($sekolah as $skl) : ?>
                            <option value="<?= $skl['id']; ?>" data-jurusan="<?= $skl['inc_jurusan']; ?>">
                                <?= $skl['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="focus-select" data-symbol="school"></span>
                    </div>
                    <div id="jurusanlist" hidden>
                    </div>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit">
                                Daftar Sekolah
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editsekolah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Sekolah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ml-2 mr-2">
                <form class="login100-form validate-form" id="formeditsekolah">
                    <div class="wrap-input100 validate-input">
                        <span class="label-input100">Jenis Pendaftaran</span>
                        <select class="select-text" name="jenisdaftar" id="edit-jenisdaftar" required>
                            <option value="" class="" disabled selected>--- Pilih jenis Pendaftaran ---</option>
                            <?php foreach ($jenisDaftar as $jd) : ?>
                            <option value="<?= $jd['cvalue']; ?>"><?= $jd['cvalue']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="focus-select" data-symbol="assignment"></span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <span class="label-input100">Asal Sekolah</span>
                        <input class="input100" type="text" name="asalsekolah" id="edit-asalsekolah"
                            placeholder="Masukkan Asal Sekolah" value="<?= $user['sekolahasal']; ?>" required>
                        <span class="focus-input100" data-symbol="history_edu"></span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <span class="label-input100">NISN</span>
                        <input class="input100" type="tel" name="nisn" id="edit-nisn" placeholder="Masukkan NISN"
                            value="<?= $user['nisn']; ?>" required>
                        <span class="focus-input100" data-symbol="pin"></span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <span class="label-input100">Lembaga Sekolah</span>
                        <select class="select-text" name="sekolah" id="edit-sekolah2" required>
                            <option value="" class="" disabled selected>--- Pilih Lembaga Sekolah ---</option>
                            <?php foreach ($sekolah as $skl) : ?>
                            <option value="<?= $skl['id']; ?>" data-jurusan="<?= $skl['inc_jurusan']; ?>">
                                <?= $skl['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="focus-select" data-symbol="school"></span>
                    </div>
                    <div id="jurusanlist2" hidden>
                    </div>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit">
                                Ubah Sekolah
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
var BaseURL = "<?= base_url() ?>";
var idpesantren = "<?= $user['id_pesantren'];  ?>";
var idsekolah = "<?= $user['id_sekolah'];  ?>";
var idjurusan = "<?= $user['id_jurusan'];  ?>";
var jdku = "<?= $user['jenis_daftar'];  ?>";

$("#edit-pesantren option[value='" + idpesantren + "']").attr("selected", "selected");
$("#edit-sekolah option[value='" + idsekolah + "']").attr("selected", "selected");
$("#edit-sekolah2 option[value='" + idsekolah + "']").attr("selected", "selected");
$("#edit-jenisdaftar option[value='" + jdku + "']").attr("selected", "selected");

$('#edit-sekolah').change(function() {
    var sekolah = $(this).val();
    $.ajax({
        type: "post",
        url: BaseURL + "ppdb/jurusan",
        data: {
            sekolah: sekolah
        },
        success: function(data) {
            $('#edit-jurusan').val('');
            $("#jurusanlist").html(data);
            if ($('#edit-sekolah').children('option:selected').data('jurusan') == 0) {
                $('#jurusanlist').attr('hidden', '');
                $('#edit-jurusan').removeAttr('required');
            } else {
                $('#jurusanlist').removeAttr('hidden');
                $('#edit-jurusan').attr('required', '');
            };
        },
    });
});

$('#edit-sekolah2').change(function() {
    var sekolah = $(this).val();
    $.ajax({
        type: "post",
        url: BaseURL + "ppdb/jurusan",
        data: {
            sekolah: sekolah
        },
        success: function(data) {
            $('#edit-jurusan').val('');
            $("#jurusanlist2").html(data);
            if ($('#edit-sekolah2').children('option:selected').data('jurusan') == 0) {
                $('#jurusanlist2').attr('hidden', '');
                $('#edit-jurusan').removeAttr('required');
            } else {
                $('#jurusanlist2').removeAttr('hidden');
                $('#edit-jurusan').attr('required', '');
            };
        },
    });
});

$('#btn-editsekolah').on('click', function() {
    var inc_jurusan = $('#edit-sekolah2').children('option:selected').data('jurusan');
    var sekolah = $('#edit-sekolah2').val();
    $.ajax({
        type: "post",
        url: BaseURL + "ppdb/jurusanl",
        data: {
            inc_jurusan: inc_jurusan,
            sekolah: sekolah
        },
        success: function(data) {
            $("#jurusanlist2").html(data);
            if ($('#edit-sekolah2').children('option:selected').data('jurusan') == 0) {
                $('#jurusanlist2').attr('hidden', '');
                $('#edit-jurusan').removeAttr('required');
            } else {
                $('#jurusanlist2').removeAttr('hidden');
                $('#edit-jurusan').attr('required', '');
                $("#edit-jurusan option[value='" + idjurusan + "']").attr("selected",
                    "selected");
            };
        },
    });
});

$('#btn-editbiodata').on('click', function() {
    // ambil element id pada saat klik ubah
    var id = $(this).data('id');
    var jk = "<?= $user['jnskelamin'];  ?>";
    var agama = "<?= $user['agama'];  ?>";
    var avghasil = "<?= $user['avgpenghasilan'];  ?>";

    $.ajax({
        type: "post",
        url: "<?= base_url('ppdb/formeditbiodata') ?>",
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
            id: id
        },
        success: function(data) {
            swal.close();
            $('#formeditbiodata').html(data);
            $("#edit-jeniskelamin option[value='" + jk + "']").attr("selected", "selected");
            $("#edit-agama option[value='" + agama + "']").attr("selected", "selected");
            $("#edit-avghasil option[value='" + avghasil + "']").attr("selected", "selected");

            // proses untuk mengubah data
            $('#formeditbiodatasubmit').on('submit', function() {
                var nama = $('#edit-nama').val();
                var nohp = $('#edit-nohp').val();
                var nik = $('#edit-nik').val();
                var tmplahir = $('#edit-tmplahir').val();
                var tgllahir = $('#edit-tgllahir').val();
                var jeniskelamin = $('#edit-jeniskelamin').val();
                var agama = $('#edit-agama').val();
                var hobi = $('#edit-hobi').val();
                var jalan = $('#edit-jalan').val();
                var rt = $('#edit-rt').val();
                var rw = $('#edit-rw').val();
                var no = $('#edit-no').val();
                var dukuh = $('#edit-dukuh').val();
                var desa = $('#edit-desa').val();
                var kec = $('#edit-kec').val();
                var kab = $('#edit-kab').val();
                var ayahnama = $('#edit-ayahnama').val();
                var ayahkerja = $('#edit-ayahkerja').val();
                var ayahnohp = $('#edit-ayahnohp').val();
                var ibunama = $('#edit-ibunama').val();
                var ibukerja = $('#edit-ibukerja').val();
                var ibunohp = $('#edit-ibunohp').val();
                var sdrkandung = $('#edit-sdrkandung').val();
                var avghasil = $('#edit-avghasil').val();
                $.ajax({
                    type: "post",
                    url: "<?= base_url('ppdb/editbiodata') ?>",
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
                        nohp: nohp,
                        nik: nik,
                        tmplahir: tmplahir,
                        tgllahir: tgllahir,
                        jeniskelamin: jeniskelamin,
                        agama: agama,
                        hobi: hobi,
                        jalan: jalan,
                        rt: rt,
                        rw: rw,
                        no: no,
                        dukuh: dukuh,
                        desa: desa,
                        kec: kec,
                        kab: kab,
                        ayahnama: ayahnama,
                        ayahkerja: ayahkerja,
                        ayahnohp: ayahnohp,
                        ibunama: ibunama,
                        ibukerja: ibukerja,
                        ibunohp: ibunohp,
                        sdrkandung: sdrkandung,
                        avghasil: avghasil
                    },
                    dataType: "JSON",
                    error: function(data) {
                        console.log('gagal mengirim data');
                    },
                    success: function(data) {
                        Swal.fire(
                            "Edit Biodata",
                            "Datamu berhasil diedit, tekan OK untuk merefresh halaman",
                            "success"
                        ).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    }
                })
                return false;
            });
        }
    });
});
$('#btn-laju').on('click', function() {
    var idsantri = $(this).data('idsantri');
    swal.fire({
        title: 'Pesantren',
        text: "Apakah anda yakin untuk memilih tidak masuk pesantren, ? Sebelumnya, pastikan terlebih dahulu rumah anda dekat dengan lembaga.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yakin',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?= base_url('ppdb/laju') ?>",
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
                    idsantri: idsantri
                },
                dataType: "JSON",
                success: function(data) {
                    Swal.fire(
                        "Non Pesantren",
                        "Anda Berhasil memilih untuk tidak masuk pesantren, tekan OK untuk refresh",
                        "success"
                    ).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }
            })
        } else if (result.dismiss === swal.DismissReason.cancel) {
            swal.fire(
                'Batal',
                'Anda membatalkan untuk tidak masuk pesantren',
                'success'
            )
        }
    })
});

$('#btn-takhasus').on('click', function() {
    var id = $(this).data('id');
    swal.fire({
        title: 'Takhasus',
        text: "Apakah anda yakin untuk memilih takhasus, ? Saat ini komplek pesantren yang mendukung takhasus hanya komplek tahfidzul qur'an. Setelah anda memilih takhasus maka komplek pesantren yang anda pilih otomatis akan berganti ke tahfidzul qur'an",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yakin',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?= base_url('ppdb/takhasus') ?>",
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
                    id: id
                },
                dataType: "JSON",
                success: function(data) {
                    Swal.fire(
                        "Program Takhasus",
                        "Anda Berhasil memilih program takhasus, tekan OK untuk refresh",
                        "success"
                    ).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }
            })
        } else if (result.dismiss === swal.DismissReason.cancel) {
            swal.fire(
                'Batal',
                'Anda membatalkan untuk memilih program takhasus',
                'warning'
            )
        }
    })
});

$('#formeditpesantren').on('submit', function() {
    var pesantren = $('#edit-pesantren').val();
    $.ajax({
        type: "post",
        url: "<?= base_url('ppdb/editpesantren') ?>",
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
            pesantren: pesantren
        },
        dataType: "JSON",
        error: function(data) {
            console.log('gagal mengirim data');
        },
        success: function(data) {
            Swal.fire(
                "Edit Pesantren",
                "Data pesantren berhasil diedit, tekan OK untuk merefresh halaman",
                "success"
            ).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    location.reload();
                }
            });
        }
    })
    return false;
});

$('#formdaftarsekolah').on('submit', function() {
    var jd = $('#edit-jenisdaftar').val();
    var asalsekolah = $('#edit-asalsekolah').val();
    var nisn = $('#edit-nisn').val();
    var sekolah = $('#edit-sekolah').val();
    var jurusan = $('#edit-jurusan').val();
    var id = $('#btn-daftarsekolah').data('id');
    $.ajax({
        type: "post",
        url: "<?= base_url('ppdb/editsekolah') ?>",
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
            jd: jd,
            asalsekolah: asalsekolah,
            nisn: nisn,
            sekolah: sekolah,
            jurusan: jurusan,
            id: id
        },
        dataType: "JSON",
        error: function(data) {
            console.log('gagal mengirim data');
        },
        success: function(data) {
            Swal.fire(
                "Daftar Sekolah",
                "Mendaftar sekolah berhasil, tekan OK untuk merefresh halaman",
                "success"
            ).then((result) => {
                if (result.isConfirmed) {
                    location.reload();
                }
            });
        }
    })
    return false;
});

$('#formeditsekolah').on('submit', function() {
    var jd = $('#edit-jenisdaftar').val();
    var asalsekolah = $('#edit-asalsekolah').val();
    var nisn = $('#edit-nisn').val();
    var sekolah = $('#edit-sekolah2').val();
    var jurusan = $('#edit-jurusan').val();
    var id = $('#btn-editsekolah').data('id');
    $.ajax({
        type: "post",
        url: "<?= base_url('ppdb/editsekolah') ?>",
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
            jd: jd,
            asalsekolah: asalsekolah,
            nisn: nisn,
            sekolah: sekolah,
            jurusan: jurusan,
            id: id
        },
        dataType: "JSON",
        error: function(data) {
            console.log('gagal mengirim data');
        },
        success: function(data) {
            Swal.fire(
                "Edit Sekolah",
                "Mengedit data sekolah berhasil, tekan OK untuk merefresh halaman",
                "success"
            ).then((result) => {
                if (result.isConfirmed) {
                    location.reload();
                }
            });
        }
    })
    return false;
});

$('#btn-hapus').on('click', function() {
    var idsantri = $(this).data('idsantri');
    var iduser = $(this).data('iduser');
    swal.fire({
        title: 'Hapus Akun',
        text: "Apakah anda yakin untuk menghapus akun, ? Semua data akun anda akan terhapus, dan artinya anda membatalkan untuk mendaftar di Yayasan Pendidikan Pondok Pesantren Al Hikmah 1",
        icon: 'error',
        showCancelButton: true,
        confirmButtonText: 'Yakin',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?= base_url('ppdb/hapusakun') ?>",
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
                    idsantri: idsantri,
                    iduser: iduser
                },
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    Swal.fire(
                        "Hapus Akun",
                        "Anda Berhasil menghapus akun, tekan OK untuk keluar",
                        "success"
                    ).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }
            })
        } else if (result.dismiss === swal.DismissReason.cancel) {
            swal.fire(
                'Batal',
                'Anda membatalkan penghapusan akun',
                'warning'
            )
        }
    })
});
</script>
