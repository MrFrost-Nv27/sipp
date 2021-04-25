<?= $this->session->flashdata('message'); ?>
<span class="login100-form-title p-b-30">
    <?= $judul; ?>
</span>
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading text-center">بارك الله</h4>
    <hr>
    <p class="mb-0 text-center"><b>Halo, <?= $user['email']; ?></b></p>
    <hr>
    <p class="text-justify">Alhamdulilah, anda sudah terdaftar namun akun anda belum diaktivasi. Kami telah mengirimkan
        pesan berisi kode
        aktivasi berupa 6 digit nomor unik ke alamat email dan nomor whatsapp anda. Silahkan cek mailbox dan pesan
        masuk.</p>
</div>
<?php
$formopen = [
    'class' => 'login100-form validate-form',
    'id' => 'formactive',
    'name' => 'formactive'
];
echo form_open('#', $formopen); ?>
<div class="wrap-input100 validate-input m-b-23" data-validate="Email Tidak boleh kosong">
    <span class="label-input100"></span>
    <input class="input100" type="tel" name="actv" id="kodeactive" placeholder="Masukkan Kode Verifikasi"
        autocomplete="email" required>
    <span class="focus-input100" data-symbol="pin"></span>
</div>

<div class="container-login100-form-btn pb-3">
    <div class="wrap-login100-form-btn">
        <div class="login100-form-bgbtn"></div>
        <button class="login100-form-btn">
            Kirim
        </button>
    </div>
</div>
</form>
