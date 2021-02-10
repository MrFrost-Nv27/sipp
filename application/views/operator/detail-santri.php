<!-- Detail santri by id -->
<div class="row">
    <div class="col-lg-6">
        <div class="main-card pb-3 card">
            <div class="card-header text-center"><?= $santri['nama']; ?>
                <div class="btn-actions-pane-right">
                    <div role="group" class="btn-group-sm btn-group">
                        <a href="<?= base_url('operator/index'); ?>" class="mb-2 mr-2 badge badge-success">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="scroll-area-md">
                    <div class="scrollbar-container ps--active-y">
                        <table class="mb-0 table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center" scope="row">Pendaftaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($santri) : ?>
                                <tr>
                                    <td>Jenis Pendaftaran</td>
                                    <td><?= $santri['jenis_daftar']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pendaftar</td>
                                    <td><?= date("d-F-Y", $santri['date_created']); ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor Pendaftaran</td>
                                    <td><?= $santri['nomor_daftar']; ?></td>
                                </tr>
                                <tr>
                                    <td>Sekolah</td>
                                    <td><?= $santri['nama_lembaga']; ?></td>
                                </tr>
                                <?php if ($santri['id_sekolah'] == 3) : ?>
                                <tr>
                                    <td>Program Keahlian</td>
                                    <td><?= $santri['jurusan']; ?></td>
                                </tr>
                                <?php elseif ($santri['id_sekolah'] == 5 or 6) : ?>
                                <tr>
                                    <td>Jurusan</td>
                                    <td><?= $santri['jurusan']; ?></td>
                                </tr>
                                <?php endif; ?>
                                <thead>
                                    <tr>
                                        <th colspan="2" class="text-center" scope="row">Detail Sekolah Nama</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>Asal Sekolah</td>
                                    <td><?= $santri['sekolahasal']; ?></td>
                                </tr>
                                <tr>
                                    <td>NISN</td>
                                    <td><?= $santri['nisn']; ?></td>
                                </tr>
                                <thead>
                                    <tr>
                                        <th colspan="2" class="text-center" scope="row">Biodata</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td><?= $santri['nama']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tempat Lahir</td>
                                    <td><?= $santri['tempat_lahir']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td><?= $santri['tgl_lahir']; ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td><?= $santri['jnskelamin']; ?></td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td><?= $santri['agama']; ?></td>
                                </tr>
                                <tr>
                                    <td>Hobi</td>
                                    <td><?= $santri['hobby']; ?></td>
                                </tr>
                                <thead>
                                    <tr>
                                        <th colspan="2" class="text-center" scope="row">Alamat</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>Jalan, RT / RW, No</td>
                                    <td><?= $santri['alamat_jl']; ?>, <?= $santri['alamat_rt']; ?> /
                                        <?= $santri['alamat_rw']; ?> , Nomor <?= $santri['alamat_no']; ?></td>
                                </tr>
                                <tr>
                                    <td>Dukuh</td>
                                    <td><?= $santri['alamat_dk']; ?></td>
                                </tr>
                                <tr>
                                    <td>Desa</td>
                                    <td><?= $santri['alamat_ds']; ?></td>
                                </tr>
                                <tr>
                                    <td>Kecamatan</td>
                                    <td><?= $santri['alamat_kec']; ?></td>
                                </tr>
                                <tr>
                                    <td>Kabupaten</td>
                                    <td><?= $santri['alamat_kab']; ?></td>
                                </tr>
                                <thead>
                                    <tr>
                                        <th colspan="2" class="text-center" scope="row">Keluarga</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>Nama Ayah</td>
                                    <td><?= $santri['ayah_nama']; ?></td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan Ayah</td>
                                    <td><?= $santri['ayah_kerja']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor Hp Ayah</td>
                                    <td><?= $santri['ayah_nohp']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Ibu</td>
                                    <td><?= $santri['ibu_nama']; ?></td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan Ibu</td>
                                    <td><?= $santri['ibu_kerja']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor Hp Ibu</td>
                                    <td><?= $santri['ibu_nohp']; ?></td>
                                </tr>
                                <tr>
                                    <td>Penghasilan Rata-Rata Orang Tua</td>
                                    <td><?= $santri['avgpenghasilan']; ?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Saudara Kandung</td>
                                    <td><?= $santri['sdrkandung']; ?></td>
                                </tr>
                                <thead>
                                    <tr>
                                        <th colspan="2" class="text-center" scope="row">Kontak</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>Nomor Hp Santri</td>
                                    <td><?= $santri['no_hp']; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat Email</td>
                                    <td><?= $santri['email']; ?></td>
                                </tr>
                                <?php else : ?>
                                <tr>
                                    <td colspan="4">
                                        <div class="alert alert-danger" role="alert">
                                            Data Tidak Ditemukan ! Jangan nakal ya :(
                                        </div>
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End -->
