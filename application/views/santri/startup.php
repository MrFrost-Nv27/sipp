<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $judul; ?></title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/'); ?>img/icons/logo1.png" />

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>css/bootstrap-datepicker3.min.css">
    <link href="<?= base_url('assets/'); ?>vendor/sweetalert2/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/ppdb/'); ?>style.css" />
    <!-- Preloader -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>css/preloader.css">
    <!--  -->
</head>

<body>
    <div class="preloader">
        <div class="loading">
            <img src="<?= base_url('assets/'); ?>img/preloader.gif" width="80" class="animated bounceIn">
            <p class="pt-2 animated fadeInDown">إِنَّ اللَّهَ مَعَ الصَّابِرِينَ</p>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-10">
                <div class="modal-wrap">
                    <div class="modal-header">
                        <span class="is-active"></span><span></span><span></span><span></span>
                    </div>
                    <div class="modal-bodies text-center">
                        <div class="modal-body modal-body-step-1 is-showing">
                            <div class="title">Halo, <?= $santri['nama']; ?></div>
                            <div class="description ml-3 mr-3 text-justify">
                                Anda sedang berada di layanan <b>SIPP (Sistem Informasi Pendidikan Pesantren) Al Hikmah
                                    1</b>.
                                Layanan ini digunakan sebagai media pendaftaran santri baru ke lembaga sekolah dan
                                pondok pesantren
                                yang berada di
                                naungan Yayasan Pendidikan Pondok Pesantren Al Hikmah 1. Sebelumnya Anda
                                telah mendaftar dan sudah
                                berhasil melewati tahap aktivasi, untuk tahap berikutnya adalah pengisian biodata
                                lengkap, siapkan
                                data yang diperlukan meliputi :
                            </div>
                            <ul class="list-group text-left ml-3 mr-3">
                                <li class="list-group-item">Data Pribadi</li>
                                <li class="list-group-item">Rincian Alamat Rumah</li>
                                <li class="list-group-item">Data Keluarga</li>
                            </ul>
                            <div class="description">
                                Sudah siap, ?
                            </div>
                            <div class="text-center fade-in mt-3">
                                <button type="button" class="button btn btn-success">Mulai</button>
                            </div>
                        </div>
                        <div class="modal-body modal-body-step-2">
                            <div class="title">Data Pribadi</div>
                            <div class="container text-left">
                                <div class="row">
                                    <div class="col">
                                        <form id="formsatu">
                                            <div class="form-group">
                                                <small class="form-text text-muted">Nama Lengkap</small>
                                                <input type="text" class="form-control" disabled
                                                    value="<?= $santri['nama']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <small class="form-text text-muted">Nomor Hp</small>
                                                <input type="tel" class="form-control" id="nohp"
                                                    value="<?= $santri['no_hp']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <small class="form-text text-muted">Nomor Induk Keluarga</small>
                                                <input type="tel" class="form-control" id="nik"
                                                    value="<?= $santri['nik']; ?>" placeholder="Masukkan NIK" required>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <small class="form-text text-muted">Tempat Lahir</small>
                                                    <input type="text" class="form-control" id="tmplahir"
                                                        value="<?= $santri['tempat_lahir']; ?>"
                                                        placeholder="Masukkan Tempat Lahir" required>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <small class="form-text text-muted">Tanggal Lahir</small>
                                                    <input type="date" class="form-control"
                                                        placeholder="Masukkan Tanggal Lahir" id="tgllahir"
                                                        value="<?= $santri['tgl_lahir']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <small class="form-text text-muted">Agama</small>
                                                <select id="agama" class="form-control" required>
                                                    <option value="" disabled selected>Pilih Agama</option>
                                                    <?php foreach ($agama as $agm) : ?>
                                                    <option value="<?= $agm['cvalue']; ?>"><?= $agm['cvalue']; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <small class="form-text text-muted">Hobi</small>
                                                <input type="text" class="form-control" id="hobby"
                                                    value="<?= $santri['hobby']; ?>" placeholder="Masukkan Hobby Anda"
                                                    required>
                                            </div>
                                            <div class="text-center fade-in mt-3">
                                                <button type="submit" class="btn btn-success">Lanjut</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body modal-body-step-3">
                            <div class="title">Alamat Rumah</div>
                            <div class="container text-left">
                                <div class="row">
                                    <div class="col">
                                        <form id="formdua">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <small class="form-text text-muted">Jalan</small>
                                                    <input type="text" class="form-control" id="jl"
                                                        value="<?= $santri['alamat_jl']; ?>"
                                                        placeholder="Masukkan Nama Jalan" required>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <small class="form-text text-muted">RT</small>
                                                    <input type="number" class="form-control" id="rt"
                                                        value="<?= $santri['alamat_rt']; ?>" placeholder="Masukkan Rt"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <small class="form-text text-muted">RW</small>
                                                    <input type="number" class="form-control" placeholder="Masukkan Rw"
                                                        id="rw" value="<?= $santri['alamat_rw']; ?>" required>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <small class="form-text text-muted">No. Rumah</small>
                                                    <input type="number" class="form-control"
                                                        placeholder="Masukkan Nomor Rumah" id="no"
                                                        value="<?= $santri['alamat_no']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <small class="form-text text-muted">Dukuh</small>
                                                    <input type="text" class="form-control" id="dk"
                                                        value="<?= $santri['alamat_dk']; ?>"
                                                        placeholder="Masukkan Nama Dukuh" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <small class="form-text text-muted">Desa</small>
                                                    <input type="text" class="form-control"
                                                        placeholder="Masukkan Nama Desa" id="ds"
                                                        value="<?= $santri['alamat_ds']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <small class="form-text text-muted">Kecamatan</small>
                                                    <input type="text" class="form-control" id="kec"
                                                        value="<?= $santri['alamat_kec']; ?>"
                                                        placeholder="Masukkan Nama Kecamatan" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <small class="form-text text-muted">Kabupaten</small>
                                                    <input type="text" class="form-control"
                                                        placeholder="Masukkan Nama Kabupaten" id="kab"
                                                        value="<?= $santri['alamat_kab']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="text-center fade-in mt-3">
                                                <button type="submit" class="btn btn-success">Lanjut</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body modal-body-step-4">
                            <div class="title">Data keluarga</div>
                            <div class="container text-left">
                                <div class="row">
                                    <div class="col">
                                        <form id="formtiga">
                                            <div class="form-group">
                                                <small class="form-text text-muted">Nama Ayah</small>
                                                <input type="text" id="ayah_nama" class="form-control"
                                                    value="<?= $santri['ayah_nama']; ?>"
                                                    placeholder="Masukkan Nama Lengkap Ayah Kandung" required>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <small class="form-text text-muted">Nomor Hp Ayah</small>
                                                    <input type="tel" class="form-control" id="ayah_nohp"
                                                        value="<?= $santri['ayah_nohp']; ?>"
                                                        placeholder="Masukkan Nomor Hp Ayah" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <small class="form-text text-muted">Pekerjaan Ayah</small>
                                                    <input type="text" class="form-control"
                                                        placeholder="Masukkan Pekerjaan Ayah" id="ayah_kerja"
                                                        value="<?= $santri['ayah_kerja']; ?>" required>
                                                </div>
                                            </div>
                                            <hr>

                                            <div class="form-group">
                                                <small class="form-text text-muted">Nama Ibu</small>
                                                <input type="text" id="ibu_nama" class="form-control"
                                                    value="<?= $santri['ibu_nama']; ?>"
                                                    placeholder="Masukkan Nama Lengkap ibu Kandung" required>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <small class="form-text text-muted">Nomor Hp Ibu</small>
                                                    <input type="tel" class="form-control" id="ibu_nohp"
                                                        value="<?= $santri['ibu_nohp']; ?>"
                                                        placeholder="Masukkan Nomor Hp ibu" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <small class="form-text text-muted">Pekerjaan Ibu</small>
                                                    <input type="text" class="form-control"
                                                        placeholder="Masukkan Pekerjaan ibu" id="ibu_kerja"
                                                        value="<?= $santri['ibu_kerja']; ?>" required>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <small class="form-text text-muted">Jumlah Saudara Kandung</small>
                                                    <input type="number" class="form-control" id="sdrkandung"
                                                        value="<?= $santri['sdrkandung']; ?>"
                                                        placeholder="Masukkan Jumlah Saudara Kandung" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <small class="form-text text-muted">Penghasilan Per Bulan Orang
                                                        Tua</small>
                                                    <select id="avghasil" class="form-control" required>
                                                        <option value="" disabled selected>Pilih Rata-Rata penghasilan
                                                        </option>
                                                        <?php foreach ($penghasilan as $hasil) : ?>
                                                        <option value="<?= $hasil['cvalue']; ?>">
                                                            <?= $hasil['cvalue']; ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="text-center fade-in mt-3">
                                                <button type="submit" class="btn btn-success">Kirim</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/'); ?>js/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/'); ?>vendor/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/ppdb/'); ?>script.js"></script>
</body>

</html>
