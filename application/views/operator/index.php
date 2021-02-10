<?php
$nomer = 1;

?>
<!-- Content -->
<div class="row">
    <div class="col-md-5">
        <form action="<?= base_url('operator/index'); ?>" method="POST">
            <div class="input-group mb-3">
                <?php if ($jumlahdaftar == 0) : ?>
                    <input type="text" class="form-control" placeholder="Cari nama siswa.." name="keyword" autocomplete="off" autofocus disabled>
                    <div class="input-group-append">
                        <input class="btn btn-primary" type="submit" name="submit" value="Cari" disabled>
                    <?php else : ?>
                        <input type="text" class="form-control" placeholder="Cari nama siswa.." name="keyword" autocomplete="off" autofocus>
                        <div class="input-group-append">
                            <input class="btn btn-primary" type="submit" name="submit" value="Cari">
                        <?php endif; ?>
                        </div>
                    </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-header"><?= $user['nama_lembaga']; ?>
                <div class="btn-actions-pane-right">
                    <div role="group" class="btn-group-sm btn-group">
                        <button class="mb-2 mr-2 btn btn-focus">Jumlah Calon Siswa Baru :
                            <?= $jumlahdaftar; ?></button>
                        <div class="d-inline-block dropdown">
                            <?php if ($jumlahdaftar == 0) :
                                $classtombol = 'btn-shadow dropdown-toggle btn btn-info disabled';
                            else :
                                $classtombol = 'btn-shadow dropdown-toggle btn btn-info';
                            endif; ?>
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="<?= $classtombol; ?>">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                    <i class="fa fa-download fa-w-20"></i>
                                </span>
                                Export
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a href="<?= base_url('operator/index/export/pdf');
                                                    ?>" class="nav-link">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                <i class="fa fa-file-pdf fa-w-20"></i>
                                            </span>
                                            Pdf
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('operator/index/export/xlsx'); ?>" class="nav-link">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                <i class="fa fa-file-excel fa-w-20"></i>
                                            </span>
                                            Excel
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="mb-0 table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Lengkap</th>
                            <th>Tanggal Daftar</th>
                            <th>Aksi</th>
                            <th>Aktif</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($jumlahdaftar == 0) : ?>
                            <tr>
                                <td colspan="4">
                                    <div class="alert alert-success" role="alert">
                                        Daftar Calon Santri Kosong
                                    </div>
                                </td>
                            </tr>
                        <?php elseif (empty($santri)) : ?>
                            <tr>
                                <td colspan="4">
                                    <div class="alert alert-danger" role="alert">
                                        Data Tidak Ditemukan !
                                    </div>
                                </td>
                            </tr>
                            <?php else :
                            foreach ($santri as $siswa) :
                                $siswadetail = $this->Santri_model->getDataSantri('setid', $siswa['id_santri']);
                            ?>
                                <tr>
                                    <th scope="row"><?= ++$start; ?></th>
                                    <td><?= $siswadetail['nama']; ?></td>
                                    <td><?= date("d-F-Y", $siswadetail['date_created']); ?></td>
                                    <td>
                                        <a class="badge badge-pill badge-warning" href="<?= base_url('operator/index/detail/'); ?><?= $siswadetail['id_santri']; ?>"><i class=" fa fa-info-circle fa-w-20"></i></a>
                                    </td>
                                    <td>
                                        <?php if ($siswadetail['is_active'] == 0) : ?>
                                            <div class="badge badge-pill badge-danger" data-toggle="tooltip" data-placement="top" title="Akun belum diaktivasi !"><i class="fa fa-w-20"></i></div>
                                        <?php elseif ($siswadetail['is_active'] == 1) : ?>
                                            <div class="badge badge-pill badge-success" data-toggle="tooltip" data-placement="top" title="Akun sudah diaktivasi"><i class="fa fa-check fa-w-20"></i></div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php //$nomer++;
                                ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
                <?php if ($jumlahdaftar !== 0) : ?>
                    <?= $this->pagination->create_links(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- End of content -->