<?= $this->session->flashdata('message'); ?>
<!-- Content -->
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-header"><?= $user['nama_lembaga']; ?>
                <div class="btn-actions-pane-right">
                    <div role="group" class="btn-group-sm btn-group">
                        <button class="mb-2 mr-2 btn btn-success" id="refreshdata"><span
                                class="btn-icon-wrapper opacity-7">
                                <i class="fa fa-fw" aria-hidden="true" title="Refresh data"></i>
                            </span></button>
                        <button class="mb-2 mr-2 btn btn-primary" data-toggle="modal" data-target="#tambahsantri"><span
                                class="btn-icon-wrapper pr-2 opacity-7">
                                <i class="fa fa-plus fa-w-20"></i>
                            </span>Tambah</button>
                        <div class="d-inline-block dropdown" id="exportdata">
                            <?php if ($jumlahdaftar == 0) :
                                $classtombol = 'btn-shadow dropdown-toggle btn btn-info disabled';
                            else :
                                $classtombol = 'btn-shadow dropdown-toggle btn btn-info';
                            endif; ?>
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                class="<?= $classtombol; ?>">
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
                <table class="mb-0 table table-hover table-striped" id="datasantri">
                    <thead align="center">
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Tanggal Daftar</th>
                            <th>Aksi</th>
                            <th>Aktif</th>
                        </tr>
                    </thead>
                    <tbody align="center">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End of content -->
