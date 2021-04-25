<span class="login100-form-title p-b-30">
    <?= $judul; ?>
</span>
<?php
echo $this->session->flashdata('message');
$formopen = [
    'class' => 'login100-form validate-form',
    'id' => 'signup',
    'name' => 'signup'
];
echo form_open('#', $formopen); ?>
<div class="page-isi">
    <div class="wrap-input100 validate-input m-b-23" data-validate="Nama Tidak boleh kosong">
        <span class="label-input100">Nama Lengkap</span>
        <?php $daftar_nama = [
            'class' => 'input100',
            'id' => 'daftar-nama',
            'name' => 'nama',
            'type' => 'text',
            'placeholder' => 'Masukkan Nama Lengkap',
            'autocomplete' => 'name',
            'required' => true
        ];
        echo form_input($daftar_nama); ?>
        <span class="focus-input100" data-symbol="account_circle"></span>
    </div>
    <div class="wrap-input100 validate-input m-b-23" data-validate="Password tidak boleh kosong">
        <span class="label-input100">Kata Sandi</span>
        <input class="input100 password" type="password" name="pass" id="password" placeholder="Masukkan Kata Sandi"
            autocomplete="current-password" required>
        <span class="focus-input100" data-symbol="lock_open"></span>
    </div>
    <div class="wrap-input100 validate-input m-b-23" data-validate="Nomor Hp Tidak boleh kosong">
        <span class="label-input100">Nomor Hp</span>
        <div class="form-row">
            <div class="col pos-fixed">
                <input class="input100" value="+62" disabled>
            </div>
            <div class="col-md-10 ml-5">
                <input class="input100" type="tel" name="nohp" id="daftar-nohp" placeholder="Masukkan Nomor Hp"
                    value="<?= set_value('nohp'); ?>" required>
            </div>
        </div>
        <span class="focus-input100" data-symbol="contacts"></span>
    </div>
    <div class="wrap-input100 validate-input m-b-23" data-validate="Alamat Email Tidak boleh kosong">
        <span class="label-input100">Alamat Email</span>
        <?= form_error('email', '<small class="badge badge-pill badge-danger">', '</small>'); ?>
        <input class="input100" type="email" name="email" id="daftar-email" placeholder="Masukkan Alamat Email"
            value="<?= set_value('email'); ?>" required>
        <span class="focus-input100" data-symbol="email"></span>
    </div>
    <div class="wrap-input100 validate-input m-b-23 select" data-validate="Jenis Kelamin Tidak boleh kosong">
        <span class="label-input100">Jenis Kelamin</span>
        <?= form_error('jeniskelamin', '<small class="badge badge-pill badge-danger">', '</small>'); ?>
        <select class="select-text" name="jeniskelamin" id="jeniskelamin" required>
            <option value="" disabled selected>--- Pilih Jenis Kelamin ---</option>
            <?php foreach ($jk as $kl) : ?>
            <option value="<?= $kl['cvalue']; ?>"><?= $kl['cvalue']; ?></option>
            <?php endforeach; ?>
        </select>
        <span class="focus-select" data-symbol="wc"></span>
    </div>
</div>
<div class="container-login100-form-btn p-t-2">
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

    <a href="#" id="tombolsignin" class="txt2">
        <strong>Masuk</strong>
    </a>
</div>
