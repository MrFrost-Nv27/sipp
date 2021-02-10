<?= $this->session->flashdata('message') ?>
<form class="login100-form validate-form" method="POST" action="" id="demo-form">
    <div class="page-isi">
        <div class="wrap-input100 validate-input m-b-23 select" data-validate="Jenis pendaftaran Tidak boleh kosong">
            <span class="label-input100">Jenis Pendaftaran</span>
            <?= form_error('jenisdaftar', '<small class="badge badge-pill badge-danger">', '</small>'); ?>
            <select class="select-text" name="jenisdaftar" id="jenisdaftar">
                <option value="" disabled selected>--- Pilih Jenis Pendaftaran ---</option>
                <?php foreach ($jenisDaftar as $jd) : ?>
                <option value="<?= $jd['cvalue']; ?>"><?= $jd['cvalue']; ?></option>
                <?php endforeach; ?>
            </select>
            <span class="focus-select" data-symbol="login"></span>
        </div>
        <div class="wrap-input100 validate-input m-b-23 select" data-validate="Daftar Sekolah Tidak boleh kosong">
            <span class="label-input100">Daftar Sekolah</span>
            <?= form_error('daftarsekolah', '<small class="badge badge-pill badge-danger">', '</small>'); ?>
            <select class="select-text" name="daftarsekolah" id="daftarsekolah">
                <option value="" disabled selected>--- Pilih Sekolah ---</option>
                <?php foreach ($daftarSekolah as $sekolah) : ?>
                <option value="<?= $sekolah['id']; ?>"><?= $sekolah['nama']; ?></option>
                <?php endforeach; ?>
            </select>
            <span class="focus-select" data-symbol="school"></span>
        </div>

        <div class="wrap-input100 validate-input m-b-23" data-validate="Nama Tidak boleh kosong">
            <span class="label-input100">Nama Lengkap</span>
            <?= form_error('nama', '<small class="badge badge-pill badge-danger">', '</small>'); ?>
            <input class="input100" type="text" name="nama" placeholder="Masukkan Nama Lengkap"
                value="<?= set_value('nama'); ?>">
            <span class="focus-input100" data-symbol="account_circle"></span>
        </div>
        <div class="wrap-input100 validate-input m-b-23" data-validate="NISN Tidak boleh kosong">
            <span class="label-input100">NISN</span>
            <?= form_error('nisn', '<small class="badge badge-pill badge-danger">', '</small>'); ?>
            <input class="input100" type="tel" name="nisn" placeholder="Masukkan NISN"
                value="<?= set_value('nisn'); ?>">
            <span class="focus-input100" data-symbol="format_list_numbered"></span>
        </div>
        <div class="wrap-input100 validate-input m-b-23" data-validate="Asal Sekolah Tidak boleh kosong">
            <span class="label-input100">Asal Sekolah</span>
            <?= form_error('asalsekolah', '<small class="badge badge-pill badge-danger">', '</small>'); ?>
            <input class="input100" type="text" name="asalsekolah" placeholder="Masukkan Asal Sekolah"
                value="<?= set_value('asalsekolah'); ?>">
            <span class="focus-input100" data-symbol="history_edu"></span>
        </div>
        <div class="wrap-input100 validate-input m-b-23" data-validate="Tempat Lahir Tidak boleh kosong">
            <span class="label-input100">Tempat Lahir</span>
            <?= form_error('tempatlahir', '<small class="badge badge-pill badge-danger">', '</small>'); ?>
            <input class="input100" type="text" name="tempatlahir" placeholder="Masukkan Tempat Lahir"
                value="<?= set_value('tempatlahir'); ?>">
            <span class="focus-input100" data-symbol="child_friendly"></span>
        </div>
        <div class="wrap-input100 validate-input m-b-23" data-validate="Tanggal Lahir Tidak boleh kosong">
            <span class="label-input100">Tanggal Lahir</span>
            <?= form_error('tgllahir', '<small class="badge badge-pill badge-danger">', '</small>'); ?>
            <input class="input100" type="date" id="date" name="tgllahir" value="<?= set_value('tgllahir'); ?>">
            <span class="focus-input100" data-symbol="event"></span>
        </div>
        <div class="wrap-input100 validate-input m-b-23 select" data-validate="Jenis Kelamin Tidak boleh kosong">
            <span class="label-input100">Jenis Kelamin</span>
            <?= form_error('jeniskelamin', '<small class="badge badge-pill badge-danger">', '</small>'); ?>
            <select class="select-text" name="jeniskelamin" id="jeniskelamin">
                <option value="" disabled selected>--- Pilih Jenis Kelamin ---</option>
                <?php foreach ($jk as $kl) : ?>
                <option value="<?= $kl['cvalue']; ?>"><?= $kl['cvalue']; ?></option>
                <?php endforeach; ?>
            </select>
            <span class="focus-select" data-symbol="wc"></span>
        </div>
        <div class="wrap-input100 validate-input m-b-23" data-validate="Agama Tidak boleh kosong">
            <span class="label-input100">Agama</span>
            <?= form_error('agama', '<small class="badge badge-pill badge-danger">', '</small>'); ?>
            <select class="select-text" name="agama" id="agama">
                <option value="" disabled selected>--- Pilih Agama ---</option>
                <?php foreach ($agama as $agm) : ?>
                <option value="<?= $agm['cvalue']; ?>"><?= $agm['cvalue']; ?></option>
                <?php endforeach; ?>
            </select>
            <span class="focus-select" data-symbol="self_improvement"></span>
        </div>
        <div class="wrap-input100 validate-input m-b-23" data-validate="Desa Tidak boleh kosong">
            <span class="label-input100">Desa</span>
            <?= form_error('desa', '<small class="badge badge-pill badge-danger">', '</small>'); ?>
            <input class="input100" type="text" name="desa" placeholder="Masukkan Desa"
                value="<?= set_value('desa'); ?>">
            <span class="focus-input100" data-symbol="house"></span>
        </div>
        <div class="wrap-input100 validate-input m-b-23" data-validate="Kecamatan Tidak boleh kosong">
            <span class="label-input100">Kecamatan</span>
            <?= form_error('kecamatan', '<small class="badge badge-pill badge-danger">', '</small>'); ?>
            <input class="input100" type="text" name="kecamatan" placeholder="Masukkan Kecamatan"
                value="<?= set_value('kecamatan'); ?>">
            <span class="focus-input100" data-symbol="apartment"></span>
        </div>
        <div class="wrap-input100 validate-input m-b-23" data-validate="Kabupaten Tidak boleh kosong">
            <span class="label-input100">Kabupaten</span>
            <?= form_error('kabupaten', '<small class="badge badge-pill badge-danger">', '</small>'); ?>
            <input class="input100" type="text" name="kabupaten" placeholder="Masukkan Kabupaten"
                value="<?= set_value('kabupaten'); ?>">
            <span class="focus-input100" data-symbol="golf_course"></span>
        </div>
        <div class="wrap-input100 validate-input m-b-23" data-validate="Nomor Hp Tidak boleh kosong">
            <span class="label-input100">Nomor Hp</span>
            <?= form_error('nohp', '<small class="badge badge-pill badge-danger">', '</small>'); ?>
            <input class="input100" type="tel" name="nohp" placeholder="Masukkan Nomor Hp"
                value="<?= set_value('nohp'); ?>">
            <span class="focus-input100" data-symbol="contacts"></span>
        </div>
        <div class="wrap-input100 validate-input m-b-23" data-validate="Alamat Email Tidak boleh kosong">
            <span class="label-input100">Alamat Email</span>
            <?= form_error('email', '<small class="badge badge-pill badge-danger">', '</small>'); ?>
            <input class="input100" type="email" name="email" placeholder="Masukkan Alamat Email"
                value="<?= set_value('email'); ?>">
            <span class="focus-input100" data-symbol="email"></span>
        </div>

    </div>
    <div class="g-recaptcha" data-sitekey="6Ld4mTwaAAAAADq9kcc-2N7pUo4-q7B1V5qvPHyb"></div>
    <div class="container-login100-form-btn p-t-10">
        <div class="wrap-login100-form-btn">
            <div class="login100-form-bgbtn"></div>
            <button class="login100-form-btn" type="submit">
                Kirim
            </button>
        </div>
    </div>
</form>
<div class="flex-col-c p-t-30 p-b-17">
    <span class="txt1 p-b-10">
        Atau sudah memiliki akun
    </span>

    <a href="<?= base_url(); ?>masuk" class="txt2">
        <strong>Masuk</strong>
    </a>
</div>
