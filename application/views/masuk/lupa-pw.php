<?= $this->session->flashdata('message'); ?>
<span class="login100-form-title p-b-30">
    <?= $judul; ?>
</span>
<form class="login100-form validate-form" action="" method="POST">
    <div class="wrap-input100 validate-input m-b-23" data-validate="Email Tidak boleh kosong">
        <span class="label-input100"></span>
        <?= form_error('email', '<small class="badge badge-pill badge-danger">', '</small>'); ?>
        <input class="input100" type="email" name="email" placeholder="Masukkan Email Anda" autocomplete="email">
        <span class="focus-input100" data-symbol="mail_outline"></span>
    </div>

    <div class="container-login100-form-btn">
        <div class="wrap-login100-form-btn">
            <div class="login100-form-bgbtn"></div>
            <button class="login100-form-btn">
                Kirim
            </button>
        </div>
    </div>

    <div class="flex-col-c p-t-20 p-b-17">
        <a href="<?= base_url(); ?>" class="txt2 p-b-10">
            <strong>Kembali</strong>
        </a>
        <span class="txt1 p-b-10">
            Atau
        </span>
        <a href="#" class="txt2">
            <strong>Kehilangan akses akun</strong>
        </a>
    </div>
</form>
