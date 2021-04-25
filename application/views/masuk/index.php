<span class="login100-form-title p-b-30">
    <?= $judul; ?>
</span>
<?php

echo $this->session->flashdata('message');
$formopen = [
    'class' => 'login100-form validate-form',
    'id' => 'gologin',
    'name' => 'gologin'
];
echo form_open('#', $formopen); ?>
<div class="wrap-input100 validate-input m-b-23" data-validate="ID Pengguna Tidak boleh kosong">
    <span class="label-input100">ID Pengguna</span>
    <?php
    echo form_error('idpengguna', '<small class="badge badge-pill badge-danger">', '</small>');
    $masuk_username = [
        'class' => 'input100',
        'id' => 'idpengguna',
        'name' => 'idpengguna',
        'type' => 'text',
        'placeholder' => 'Masukkan ID Pengguna',
        'autocomplete' => 'name',
        'required' => true
    ];
    echo form_input($masuk_username); ?>
    <span class="focus-input100" data-symbol="person_outline"></span>
</div>

<div class="wrap-input100 validate-input" data-validate="Password tidak boleh kosong">
    <span class="label-input100">Kata Sandi</span>
    <?= form_error('pass', '<small class="badge badge-pill badge-danger">', '</small>');
    $masuk_password = [
        'class' => 'input100',
        'id' => 'idpass',
        'name' => 'idpass',
        'type' => 'password',
        'placeholder' => 'Masukkan Kata Sandi',
        'autocomplete' => 'current-password',
        'required' => true
    ];
    echo form_input($masuk_password); ?>
    <span class="focus-input100" data-symbol="lock_open"></span>
</div>

<div class="text-right p-t-8 p-b-20">
    <a href="<?= base_url(); ?>forget">
        Lupa Kata Sandi ?
    </a>
</div>

<div class="container-login100-form-btn">
    <div class="wrap-login100-form-btn">
        <div class="login100-form-bgbtn"></div>
        <button class="login100-form-btn" type="submit">
            Masuk
        </button>
    </div>
</div>

<div class="flex-col-c p-t-30 p-b-17 text-center">
    <span class="txt1 p-b-10">
        Atau mendaftar sebagai siswa / santri baru
    </span>

    <a href="#" id="tombolsignup" class="txt2">
        <strong>Daftar</strong>
    </a>
</div>
</form>
