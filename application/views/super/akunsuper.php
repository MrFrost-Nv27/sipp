<!-- Content -->
<?= $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Ubah Informasi Akun</h5>
                <?php echo form_open_multipart('super/akunsuper/info'); ?>
                <div class="position-relative form-group">
                    <label for="nama" class="">Nama Lengkap</label>
                    <?= form_error('nama', '<small class="badge badge-pill badge-danger">', '</small>'); ?>
                    <input name="nama" id="nama" placeholder="Masukkan Nama" type="text" class="form-control"
                        value="<?= $user['nama']; ?>">
                </div>
                <div class="position-relative form-group" data-toggle="tooltip" data-placement="bottom"
                    title="Digunakan untuk login dan Tidak Dapat Di ubah">
                    <label for="userid" class="">User ID</label>
                    <input name="userid" id="userid" type="text" class="form-control" disabled
                        value="<?= $user['login_userid']; ?>">
                </div>
                <div class="position-relative form-group" data-toggle="tooltip" data-placement="bottom"
                    title="Username dapat digunakan sebagai alternatif untuk login">
                    <label for="username" class="">Username</label>
                    <?= form_error('username', '<small class="badge badge-pill badge-danger">', '</small>'); ?>
                    <input name="username" id="username" placeholder="Masukkan Username" type="text"
                        class="form-control" value="<?= $user['login_username']; ?>">
                </div>
                <div class="position-relative form-group">
                    <label for="exampleEmail" class="">Email</label>
                    <?= form_error('email', '<small class="badge badge-pill badge-danger">', '</small>'); ?>
                    <input name="email" id="email" placeholder="Masukkan alamat email" type="email" class="form-control"
                        value="<?= $user['email']; ?>">
                </div>
                <div class="text-center">
                    <button class="mt-1 btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Ubah Kata Sandi</h5>
                <?php echo form_open_multipart('super/akunsuper/pass'); ?>
                <div class="position-relative form-group">
                    <label for="pass0" class="">Kata Sandi Lama</label>
                    <?= form_error('pass0', '<small class="badge badge-pill badge-danger">', '</small>'); ?>
                    <input name="pass0" id="pass0" placeholder="Masukkan Kata Sandi Lama" type="password"
                        class="form-control">
                </div>
                <div class="position-relative form-group">
                    <label for="pass1" class="">Kata Sandi Baru</label>
                    <?= form_error('pass1', '<small class="badge badge-pill badge-danger">', '</small>'); ?>
                    <input name="pass1" id="pass1" placeholder="Masukkan Kata Sandi Baru" type="password"
                        class="form-control">
                </div>
                <div class="position-relative form-group">
                    <label for="pass2" class="">Konfirmasi Kata Sandi Baru</label>
                    <?= form_error('pass2', '<small class="badge badge-pill badge-danger">', '</small>'); ?>
                    <input name="pass2" id="pass2" placeholder="Masukkan Ulang Kata Sandi Baru" type="password"
                        class="form-control">
                </div>
                <div class="text-center">
                    <button class="mt-1 btn btn-primary" type="submit">Ubah Kata Sandi</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->
