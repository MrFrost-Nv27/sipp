<form class="login100-form validate-form" id="formeditbiodatasubmit">
    <legend class="badge badge-pill badge-success mt-2">Data Pribadi</legend>
    <div class="wrap-input100 validate-input" data-validate="Nama Tidak boleh kosong">
        <span class="label-input100">Nama Lengkap</span>
        <input class="input100" type="text" name="nama" id="edit-nama" placeholder="Masukkan Nama Lengkap"
            value="<?= $santri['nama']; ?>" required>
        <span class="focus-input100" data-symbol="account_circle"></span>
    </div>
    <div class="wrap-input100 validate-input" data-validate="Nomor Hp Tidak boleh kosong">
        <span class="label-input100">Nomor HP</span>
        <input class="input100" type="text" name="nohp" id="edit-nohp" placeholder="Masukkan Nomor HP"
            value="<?= $santri['no_hp']; ?>" required>
        <span class="focus-input100" data-symbol="account_circle"></span>
    </div>
    <div class="wrap-input100 validate-input" data-validate="NIK Tidak boleh kosong">
        <span class="label-input100">NIK</span>
        <input class="input100" type="text" name="nik" id="edit-nik" placeholder="Masukkan NIK"
            value="<?= $santri['nik']; ?>" required>
        <span class="focus-input100" data-symbol="format_list_numbered"></span>
    </div>
    <div class="wrap-input100 validate-input" data-validate="Tempat Lahir Tidak boleh kosong">
        <span class="label-input100">Tempat Lahir</span>
        <input class="input100" type="text" name="tempatlahir" id="edit-tmplahir" placeholder="Masukkan Tempat Lahir"
            value="<?= $santri['tempat_lahir']; ?>" required>
        <span class="focus-input100" data-symbol="child_friendly"></span>
    </div>
    <div class="wrap-input100 validate-input" data-validate="Tanggal Lahir Tidak boleh kosong">
        <span class="label-input100">Tanggal Lahir</span>
        <input class="input100" type="date" id="edit-tgllahir" name="tgllahir" value="<?= $santri['tgl_lahir']; ?>"
            required>
        <span class="focus-input100" data-symbol="event"></span>
    </div>
    <div class="wrap-input100 validate-input select" data-validate="Jenis Kelamin Tidak boleh kosong">
        <span class="label-input100">Jenis Kelamin</span>
        <select class="select-text" name="jeniskelamin" id="edit-jeniskelamin" required>
            <option value="" disabled>--- Pilih Jenis Kelamin ---</option>
            <?php foreach ($jk as $kl) : ?>
            <option value="<?= $kl['cvalue']; ?>"><?= $kl['cvalue']; ?></option>
            <?php endforeach; ?>
        </select>
        <span class="focus-select" data-symbol="wc"></span>
    </div>
    <div class="wrap-input100 validate-input" data-validate="Agama Tidak boleh kosong">
        <span class="label-input100">Agama</span>
        <select class="select-text" name="agama" id="edit-agama" required>
            <option value="" disabled>--- Pilih Agama ---</option>
            <?php foreach ($agama as $agm) : ?>
            <option value="<?= $agm['cvalue']; ?>"><?= $agm['cvalue']; ?></option>
            <?php endforeach; ?>
        </select>
        <span class="focus-select" data-symbol="self_improvement"></span>
    </div>
    <div class="wrap-input100 validate-input" data-validate="Hobi Tidak boleh kosong">
        <span class="label-input100">Hobi</span>
        <input class="input100" type="text" name="hobi" id="edit-hobi" placeholder="Masukkan Hobi Anda"
            value="<?= $santri['hobby']; ?>" required>
        <span class="focus-input100" data-symbol="turned_in"></span>
    </div>
    <legend class="badge badge-pill badge-success mt-2">Alamat Rumah</legend>
    <div class="wrap-input100 validate-input" data-validate="Jalan Tidak boleh kosong">
        <span class="label-input100">Jalan</span>
        <input class="input100" type="text" name="jalan" id="edit-jalan" placeholder="Masukkan Jalan"
            value="<?= $santri['alamat_jl']; ?>" required>
        <span class="focus-input100" data-symbol="traffic"></span>
    </div>
    <div class="wrap-input100 validate-input" data-validate="RT Tidak boleh kosong">
        <span class="label-input100">RT</span>
        <input class="input100" type="number" name="RT" id="edit-rt" placeholder="Masukkan RT"
            value="<?= $santri['alamat_rt']; ?>" required>
        <span class="focus-input100" data-symbol="tag"></span>
    </div>
    <div class="wrap-input100 validate-input" data-validate="RW Tidak boleh kosong">
        <span class="label-input100">RW</span>
        <input class="input100" type="number" name="RW" id="edit-rw" placeholder="Masukkan RW"
            value="<?= $santri['alamat_rw']; ?>" required>
        <span class="focus-input100" data-symbol="tag"></span>
    </div>
    <div class="wrap-input100 validate-input" data-validate="Nomor Rumah Tidak boleh kosong">
        <span class="label-input100">Nomor Rumah</span>
        <input class="input100" type="number" name="Nomor Rumah" id="edit-no" placeholder="Masukkan Nomor Rumah"
            value="<?= $santri['alamat_no']; ?>" required>
        <span class="focus-input100" data-symbol="tag"></span>
    </div>
    <div class="wrap-input100 validate-input" data-validate="Dukuh Tidak boleh kosong">
        <span class="label-input100">Dukuh</span>
        <input class="input100" type="text" name="Dukuh" id="edit-dukuh" placeholder="Masukkan Dukuh"
            value="<?= $santri['alamat_dk']; ?>" required>
        <span class="focus-input100" data-symbol="home"></span>
    </div>
    <div class="wrap-input100 validate-input" data-validate="Desa Tidak boleh kosong">
        <span class="label-input100">Desa</span>
        <input class="input100" type="text" name="desa" id="edit-desa" placeholder="Masukkan Desa"
            value="<?= $santri['alamat_ds']; ?>" required>
        <span class="focus-input100" data-symbol="house"></span>
    </div>
    <div class="wrap-input100 validate-input" data-validate="Kecamatan Tidak boleh kosong">
        <span class="label-input100">Kecamatan</span>
        <input class="input100" type="text" name="kecamatan" id="edit-kec" placeholder="Masukkan Kecamatan"
            value="<?= $santri['alamat_kec']; ?>" required>
        <span class="focus-input100" data-symbol="apartment"></span>
    </div>
    <div class="wrap-input100 validate-input" data-validate="Kabupaten Tidak boleh kosong">
        <span class="label-input100">Kabupaten</span>
        <input class="input100" type="text" name="kabupaten" id="edit-kab" placeholder="Masukkan Kabupaten"
            value="<?= $santri['alamat_kab']; ?>" required>
        <span class="focus-input100" data-symbol="golf_course"></span>
    </div>
    <legend class="badge badge-pill badge-success mt-2">Keluarga</legend>
    <div class="wrap-input100 validate-input" data-validate="Nama Ayah Tidak boleh kosong">
        <span class="label-input100">Nama Ayah</span>
        <input class="input100" type="text" name="ayah_nama" id="edit-ayahnama" placeholder="Masukkan Nama Ayah"
            value="<?= $santri['ayah_nama']; ?>" required>
        <span class="focus-input100" data-symbol="account_circle"></span>
    </div>
    <div class="wrap-input100 validate-input" data-validate="Pekerjaan Ayah Tidak boleh kosong">
        <span class="label-input100">Pekerjaan Ayah</span>
        <input class="input100" type="text" name="ayah_kerja" id="edit-ayahkerja" placeholder="Masukkan Pekerjaan Ayah"
            value="<?= $santri['ayah_kerja']; ?>" required>
        <span class="focus-input100" data-symbol="work"></span>
    </div>
    <div class="wrap-input100 validate-input" data-validate="Nomor HP Ayah Tidak boleh kosong">
        <span class="label-input100">Nomor HP Ayah</span>
        <input class="input100" type="text" name="ayah_nohp" id="edit-ayahnohp" placeholder="Masukkan Nomor HP Ayah"
            value="<?= $santri['ayah_nohp']; ?>" required>
        <span class="focus-input100" data-symbol="phone"></span>
    </div>
    <div class="wrap-input100 validate-input" data-validate="Nama Ayah Tidak boleh kosong">
        <span class="label-input100">Nama Ibu</span>
        <input class="input100" type="text" name="ibu_nama" id="edit-ibunama" placeholder="Masukkan Nama Ibu"
            value="<?= $santri['ibu_nama']; ?>" required>
        <span class="focus-input100" data-symbol="account_circle"></span>
    </div>
    <div class="wrap-input100 validate-input" data-validate="Pekerjaan Ibu Tidak boleh kosong">
        <span class="label-input100">Pekerjaan Ibu</span>
        <input class="input100" type="text" name="ibu_kerja" id="edit-ibukerja" placeholder="Masukkan Pekerjaan Ibu"
            value="<?= $santri['ibu_kerja']; ?>" required>
        <span class="focus-input100" data-symbol="work"></span>
    </div>
    <div class="wrap-input100 validate-input" data-validate="Nomor HP Ibu Tidak boleh kosong">
        <span class="label-input100">Nomor HP Ibu</span>
        <input class="input100" type="text" name="ibu_nohp" id="edit-ibunohp" placeholder="Masukkan Nomor HP Ibu"
            value="<?= $santri['ibu_nohp']; ?>" required>
        <span class="focus-input100" data-symbol="phone"></span>
    </div>
    <div class="wrap-input100 validate-input" data-validate="Jumlah Saudara Kandung Tidak boleh kosong">
        <span class="label-input100">Jumlah Saudara Kandung</span>
        <input class="input100" type="number" name="sdrkandung" id="edit-sdrkandung"
            placeholder="Masukkan Jumlah Saudara Kandung" value="<?= $santri['sdrkandung']; ?>" required>
        <span class="focus-input100" data-symbol="family_restroom"></span>
    </div>
    <div class="wrap-input100 validate-input" data-validate="Rata-Rata Penghasilan Orang Tua Tidak boleh kosong">
        <span class="label-input100">Rata-Rata Penghasilan Orang Tua</span>
        <select class="select-text" name="avghasil" id="edit-avghasil" required>
            <option value="" disabled>--- Pilih Rata-Rata penghasilan ---</option>
            <?php foreach ($penghasilan as $hasil) : ?>
            <option value="<?= $hasil['cvalue']; ?>"><?= $hasil['cvalue']; ?></option>
            <?php endforeach; ?>
        </select>
        <span class="focus-select" data-symbol="paid"></span>
    </div>
    <div class="container-login100-form-btn">
        <div class="wrap-login100-form-btn">
            <div class="login100-form-bgbtn"></div>
            <button class="login100-form-btn" type="submit">
                Edit Data
            </button>
        </div>
    </div>
</form>
