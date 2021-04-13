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
            <div class="modal-body ml-2 mr-2">
                <form class="login100-form validate-form" id="formtambahdatasantri">
                    <legend class="badge badge-pill badge-success mt-2">Data Pendaftaran</legend>
                    <div class="wrap-input100 validate-input select"
                        data-validate="Jenis pendaftaran Tidak boleh kosong">
                        <span class="label-input100">Jenis Pendaftaran</span>
                        <select class="select-text" name="jenisdaftar" id="add-jenisdaftar" required>
                            <option value="" disabled selected>--- Pilih Jenis Pendaftaran ---</option>
                            <?php foreach ($jenisDaftar as $jd) : ?>
                            <option value="<?= $jd['cvalue']; ?>"><?= $jd['cvalue']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="focus-select" data-symbol="login"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Asal Sekolah Tidak boleh kosong">
                        <span class="label-input100">Asal Sekolah</span>
                        <input class="input100 is-valid" type="text" name="asalsekolah" id="add-asalsekolah"
                            placeholder="Masukkan Asal Sekolah" value="<?= set_value('asalsekolah'); ?>" required>
                        <span class="focus-input100" data-symbol="history_edu"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="NISN Tidak boleh kosong">
                        <span class="label-input100">NISN</span>
                        <input class="input100" type="tel" name="nisn" id="add-nisn" placeholder="Masukkan NISN"
                            value="<?= set_value('nisn'); ?>" required>
                        <span class="focus-input100" data-symbol="format_list_numbered"></span>
                    </div>
                    <legend class="badge badge-pill badge-success mt-2">Data Pribadi</legend>
                    <div class="wrap-input100 validate-input" data-validate="Nama Tidak boleh kosong">
                        <span class="label-input100">Nama Lengkap</span>
                        <input class="input100" type="text" name="nama" id="add-nama"
                            placeholder="Masukkan Nama Lengkap" value="<?= set_value('nama'); ?>" required>
                        <span class="focus-input100" data-symbol="account_circle"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Tempat Lahir Tidak boleh kosong">
                        <span class="label-input100">Tempat Lahir</span>
                        <input class="input100" type="text" name="tempatlahir" id="add-tmplahir"
                            placeholder="Masukkan Tempat Lahir" value="<?= set_value('tempatlahir'); ?>" required>
                        <span class="focus-input100" data-symbol="child_friendly"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Tanggal Lahir Tidak boleh kosong">
                        <span class="label-input100">Tanggal Lahir</span>
                        <input class="input100" type="date" id="add-tgllahir" name="tgllahir"
                            value="<?= set_value('tgllahir'); ?>" required>
                        <span class="focus-input100" data-symbol="event"></span>
                    </div>
                    <div class="wrap-input100 validate-input select" data-validate="Jenis Kelamin Tidak boleh kosong">
                        <span class="label-input100">Jenis Kelamin</span>
                        <select class="select-text" name="jeniskelamin" id="add-jeniskelamin" required>
                            <option value="" disabled selected>--- Pilih Jenis Kelamin ---</option>
                            <?php foreach ($jk as $kl) : ?>
                            <option value="<?= $kl['cvalue']; ?>"><?= $kl['cvalue']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="focus-select" data-symbol="wc"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Agama Tidak boleh kosong">
                        <span class="label-input100">Agama</span>
                        <select class="select-text" name="agama" id="add-agama" required>
                            <option value="" disabled selected>--- Pilih Agama ---</option>
                            <?php foreach ($agama as $agm) : ?>
                            <option value="<?= $agm['cvalue']; ?>"><?= $agm['cvalue']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="focus-select" data-symbol="self_improvement"></span>
                    </div>
                    <legend class="badge badge-pill badge-success mt-2">Alamat Rumah</legend>
                    <div class="wrap-input100 validate-input" data-validate="Desa Tidak boleh kosong">
                        <span class="label-input100">Desa</span>
                        <input class="input100" type="text" name="desa" id="add-desa" placeholder="Masukkan Desa"
                            value="<?= set_value('desa'); ?>" required>
                        <span class="focus-input100" data-symbol="house"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Kecamatan Tidak boleh kosong">
                        <span class="label-input100">Kecamatan</span>
                        <input class="input100" type="text" name="kecamatan" id="add-kec"
                            placeholder="Masukkan Kecamatan" value="<?= set_value('kecamatan'); ?>" required>
                        <span class="focus-input100" data-symbol="apartment"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Kabupaten Tidak boleh kosong">
                        <span class="label-input100">Kabupaten</span>
                        <input class="input100" type="text" name="kabupaten" id="add-kab"
                            placeholder="Masukkan Kabupaten" value="<?= set_value('kabupaten'); ?>" required>
                        <span class="focus-input100" data-symbol="golf_course"></span>
                    </div>
                    <legend class="badge badge-pill badge-success mt-2">Kontak Aktif</legend>
                    <div class="wrap-input100 validate-input" data-validate="Nomor Hp Tidak boleh kosong">
                        <span class="label-input100">Nomor Hp</span>
                        <input class="input100" type="tel" name="nohp" id="add-nohp" placeholder="Masukkan Nomor Hp"
                            value="<?= set_value('nohp'); ?>" required>
                        <span class="focus-input100" data-symbol="contacts"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Alamat Email Tidak boleh kosong">
                        <span class="label-input100">Alamat Email</span>
                        <small class="badge badge-pill badge-danger" id="validate-email" hidden>Email Sudah Digunakan
                            !</small>
                        <input class="input100" type="email" name="email" id="add-email"
                            placeholder="Masukkan Alamat Email" value="<?= set_value('email'); ?>" required>
                        <span class="focus-input100" data-symbol="email"></span>
                    </div>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit">
                                Tambah
                            </button>
                        </div>
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
            responsive: true,
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
            var jenisdaftar = $('#add-jenisdaftar').val();
            var asalsekolah = $('#add-asalsekolah').val();
            var nisn = $('#add-nisn').val();
            var nama = $('#add-nama').val();
            var tmplahir = $('#add-tmplahir').val();
            var tgllahir = $('#add-tgllahir').val();
            var jeniskelamin = $('#add-jeniskelamin').val();
            var agama = $('#add-agama').val();
            var desa = $('#add-desa').val();
            var kec = $('#add-kec').val();
            var kab = $('#add-kab').val();
            var nohp = $('#add-nohp').val();
            var email = $('#add-email').val();
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
                    jenisdaftar: jenisdaftar,
                    asalsekolah: asalsekolah,
                    nisn: nisn,
                    nama: nama,
                    tmplahir: tmplahir,
                    tgllahir: tgllahir,
                    jeniskelamin: jeniskelamin,
                    agama: agama,
                    desa: desa,
                    kec: kec,
                    kab: kab,
                    nohp: nohp,
                    email: email
                }, // ambil datanya dari form yang ada di variabel
                dataType: "JSON",
                error: function(data) {
                    console.log('gagal mengirim data');
                },
                success: function(data) {
                    // // bersihkan form pada modal
                    if (data == "email!!!") {
                        swal.close();
                        $('#validate-email').removeAttr('hidden');
                        $('#add-email').val('');
                    } else {
                        // console.log(data);
                        datasantri.ajax.reload(null, false);
                        $('#validate-email').attr("hidden", true);
                        swal.fire({
                            icon: 'success',
                            title: 'Tambah Santri',
                            text: 'Anda Berhasil Menambah Mahasiswa'
                        })
                        // tutup modal
                        $('#add-jenisdaftar').val('');
                        $('#add-asalsekolah').val('');
                        $('#add-nisn').val('');
                        $('#add-nama').val('');
                        $('#add-tmplahir').val('');
                        $('#add-tgllahir').val('');
                        $('#add-jeniskelamin').val('');
                        $('#add-agama').val('');
                        $('#add-desa').val('');
                        $('#add-kec').val('');
                        $('#add-kab').val('');
                        $('#add-nohp').val('');
                        $('#add-email').val('');
                        $('#tambahsantri').toggle('hide');
                        $('.modal-backdrop').toggle();
                    }
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
                        url: "<?= base_url('operator/actv') ?>",
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
                        url: "<?= base_url('operator/del') ?>",
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
