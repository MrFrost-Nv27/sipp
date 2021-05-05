<!-- Detail santri by id -->
<div class="alert alert-success text-justify" role="alert">
    بارك الله
    <br>Kamu telah melewati tahap kedua, yaitu pengisian biodata lengkap, tahap ini adalah tahap untuk mendaftar ke
    satuan lembaga sekolah dan pesantren yang berada di naungan <b>Yayasan Pendidikan Pondok Pesantren Al Hikmah 1</b>
    <br><br>Cek kembali biodata anda, silahkan perbaiki jika ada inputan yang salah, kemudian memulai untuk mendaftar di
    lembaga yang anda inginkan.
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="main-card pb-3 mb-3 card">
            <div class="card-header text-center">Biodata
                <div class="btn-actions-pane-right">
                    <div role="group" class="btn-group-sm btn-group">
                        <button type="button" class="btn btn-outline-success" data-toggle='modal'
                            data-id="<?= $user['id']; ?>" id="btn-editbiodata" data-target="#editbiodata">Edit</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="scroll-area-lg">
                    <div class="scrollbar-container ps--active-y">
                        <table class="mb-0 table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center" scope="row">Pendaftaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tanggal Pendaftaran</td>
                                    <td><?= date("d-F-Y", $user['date_created']); ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor Pendaftaran</td>
                                    <td><?= $user['nomor_daftar']; ?></td>
                                </tr>
                                <thead>
                                    <tr>
                                        <th colspan="2" class="text-center" scope="row">Data Diri</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td><?= $user['nama']; ?></td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td><?= $user['nik']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tempat Lahir</td>
                                    <td><?= $user['tempat_lahir']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td><?= $user['tgl_lahir']; ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td><?= $user['jnskelamin']; ?></td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td><?= $user['agama']; ?></td>
                                </tr>
                                <tr>
                                    <td>Hobi</td>
                                    <td><?= $user['hobby']; ?></td>
                                </tr>
                                <thead>
                                    <tr>
                                        <th colspan="2" class="text-center" scope="row">Alamat</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>Jalan, RT / RW, No</td>
                                    <td><?= $user['alamat_jl']; ?>, <?= $user['alamat_rt']; ?> /
                                        <?= $user['alamat_rw']; ?> , Nomor <?= $user['alamat_no']; ?></td>
                                </tr>
                                <tr>
                                    <td>Dukuh</td>
                                    <td><?= $user['alamat_dk']; ?></td>
                                </tr>
                                <tr>
                                    <td>Desa</td>
                                    <td><?= $user['alamat_ds']; ?></td>
                                </tr>
                                <tr>
                                    <td>Kecamatan</td>
                                    <td><?= $user['alamat_kec']; ?></td>
                                </tr>
                                <tr>
                                    <td>Kabupaten</td>
                                    <td><?= $user['alamat_kab']; ?></td>
                                </tr>
                                <thead>
                                    <tr>
                                        <th colspan="2" class="text-center" scope="row">Keluarga</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>Nama Ayah</td>
                                    <td><?= $user['ayah_nama']; ?></td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan Ayah</td>
                                    <td><?= $user['ayah_kerja']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor Hp Ayah</td>
                                    <td><?= $user['ayah_nohp']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Ibu</td>
                                    <td><?= $user['ibu_nama']; ?></td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan Ibu</td>
                                    <td><?= $user['ibu_kerja']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor Hp Ibu</td>
                                    <td><?= $user['ibu_nohp']; ?></td>
                                </tr>
                                <tr>
                                    <td>Penghasilan Rata-Rata Orang Tua</td>
                                    <td><?= $user['avgpenghasilan']; ?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Saudara Kandung</td>
                                    <td><?= $user['sdrkandung']; ?></td>
                                </tr>
                                <thead>
                                    <tr>
                                        <th colspan="2" class="text-center" scope="row">Kontak</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>Nomor Hp Santri</td>
                                    <td><?= $user['no_hp']; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat Email</td>
                                    <td><?= $user['email']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="main-card pb-3 mb-3 card">
            <div class="card-header text-center">Status Pendaftaran Pesantren
                <div class="btn-actions-pane-right">
                    <div role="group" class="btn-group-sm btn-group">
                        <?php if ($user['status_pesantren'] == 0) : ?>
                        <button type="button" id="btn-laju" class="btn btn-outline-warning mr-2"
                            data-idsantri="<?= $user['id'] ?>">Laju</button>
                        <button type="button" id="btn-ubahpesantren" class="btn btn-outline-success"
                            data-id="<?= $user['id']; ?>" data-toggle='modal'
                            data-target="#ubahpesantren">Daftar</button>
                        <?php elseif ($user['is_takhasus'] == 1) : ?>
                        <button type="button" class="btn btn-outline-danger mr-2" disabled>Laju</button>
                        <button type="button" class="btn btn-outline-success" disabled>Daftar</button>
                        <?php else : ?>
                        <?php if ($user['is_pesantren'] == 1) : ?>
                        <button type="button" id="btn-laju" class="btn btn-outline-danger mr-2"
                            data-idsantri="<?= $user['id'] ?>">Laju</button>
                        <?php endif; ?>
                        <button type="button" id="btn-ubahpesantren" class="btn btn-outline-success mr-2"
                            data-id="<?= $user['id']; ?>" data-toggle='modal' data-target="#ubahpesantren">Ubah</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?php if ($user['status_pesantren'] == 0) : ?>
                <div class="alert alert-warning text-justify" role="alert">
                    Anda belum mendaftar di pesantren manapun ! Silahkan lakukan pendaftaran terlebih dahulu ! atau jika
                    anda memilih untuk tidak masuk ke pesantren dikarenakan rumahnya dekat dengan lokasi lembaga kami,
                    silahkan tekan tombol laju.
                </div>
                <?php else : ?>
                <?php if ($user['is_pesantren'] == 0) : ?>
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <h4>Non Pesantren / Laju</h4>
                            <button type="button" class="badge badge-pill badge-success">Selesai</button>
                        </div>
                    </div>
                </div>
                <?php else :
                        $pesantrenku = $this->Pesantren_model->getpesantrenById($user['id_pesantren']); ?>
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <h4>Komplek <?= $pesantrenku['nama']; ?></h4>
                            <p>Tanggal Daftar : <?= date("d-F-Y", $user['tanggal_daftar_pesantren']); ?><br></p>
                            <?php if ($user['status_pesantren'] == 1) : ?>
                            <button type="button" class="badge badge-pill badge-success">Selesai</button>
                            <?php elseif ($user['status_pesantren'] == 2) : ?>
                            <button type="button" class="badge badge-pill badge-warning">Proses</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="main-card pb-3 mb-3 card">
            <div class="card-header text-center">Status Pendaftaran Sekolah
                <div class="btn-actions-pane-right">
                    <div role="group" class="btn-group-sm btn-group">
                        <?php if ($user['status_sekolah'] == 0) : ?>
                        <button type="button" class="btn btn-outline-warning mr-2" id="btn-takhasus"
                            data-id="<?= $user['id']; ?>">Takhasus</button>
                        <button type="button" class="btn btn-outline-success" id="btn-daftarsekolah"
                            data-id="<?= $user['id']; ?>" data-toggle='modal'
                            data-target="#daftarsekolah">Daftar</button>
                        <?php elseif ($user['is_takhasus'] == 1) : ?>
                        <button type="button" class="btn btn-outline-success" id="btn-daftarsekolah"
                            data-id="<?= $user['id']; ?>" data-toggle='modal'
                            data-target="#daftarsekolah">Daftar</button>
                        <?php else : ?>
                        <button type="button" class="btn btn-outline-danger mr-2" id="btn-takhasus"
                            data-id="<?= $user['id']; ?>">Takhasus</button>
                        <button type="button" class="btn btn-outline-success" id="btn-editsekolah"
                            data-id="<?= $user['id']; ?>" data-toggle='modal' data-target="#editsekolah">Ubah</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?php if ($user['status_sekolah'] == 0) : ?>
                <div class="alert alert-warning text-justify" role="alert">
                    Anda belum mendaftar di satuan lembaga sekolah manapun ! Silahkan lakukan pendaftaran terlebih
                    dahulu !
                </div>
                <?php elseif ($user['is_takhasus'] == 1) : ?>
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <h4>Non Sekolah / Takhasus</h4>
                            <button type="button" class="badge badge-pill badge-success">Selesai</button>
                        </div>
                    </div>
                </div>
                <?php else :
                    $sekolahku = $this->Sekolah_model->getLembagaOpt($user['id_sekolah']); ?>
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <h4><?= $sekolahku['nama']; ?></h4>
                            <?php if ($user['id_jurusan'] !== '0') :
                                    $jurusanku = $this->Sekolah_model->getJurusanById($user['id_jurusan']); ?>
                            <p>(<?= $jurusanku['jurusan'] ?>)</p>
                            <?php endif; ?>
                            <p>Tanggal Daftar : <?= date("d-F-Y", $user['tanggal_daftar_sekolah']); ?><br></p>
                            <?php if ($user['status_sekolah'] == 1) : ?>
                            <button type="button" class="badge badge-pill badge-success">Selesai</button>
                            <?php elseif ($user['status_sekolah'] == 2) : ?>
                            <button type="button" class="badge badge-pill badge-warning">Proses</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="main-card pb-3 mb-3 card">
            <div class="card-header text-center">Selesaikan Pendaftaran</div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-success text-center" role="alert">
                                pendaftaran hanya dapat diselesaikan ketika pendaftaran pesantren dan sekolah
                                sudah berstatus <b>selesai</b>.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button type="button" id="btn-hapus" data-idsantri="<?= $user['id']; ?>"
                                data-iduser="<?= $user['login_id']; ?>" class="btn btn-danger mr-2">Hapus Akun</button>
                            <?php if ($user['status_pesantren'] == 1 & $user['status_sekolah'] == 1) : ?>
                            <button type="button" class="btn btn-success">Selesai</button>
                            <?php else : ?>
                            <button type="button" class="btn btn-success" disabled>Selesai</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End -->
