<!-- Content -->
<h5 class="card-title text-center">Jumlah Calon Santri Baru</h5>
<div class="row">
    <?php foreach ($lembaga as $lmb) :
        $jumlahdaftar = $this->Santri_model->getDataSantri('jumlahlembaga', $lmb['id'], true) ?>
    <div class="col-lg-6 col-xl-4">
        <div class="card mb-3 widget-content bg-heavy-rain">
            <div class="widget-content-wrapper text-black">
                <div class="widget-content-left">
                    <div class="widget-heading"><?= $lmb['nama']; ?></div>
                    <div class="widget-subheading">Jumlah Calon Pendaftar</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-black"><span><?= $jumlahdaftar; ?></span></div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<div class="row">
    <div class="col">
        <div class="card mb-3 widget-content bg-asteroid">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total</div>
                    <div class="widget-subheading">Jumlah Calon Pendaftar</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-warning">
                        <span><?= $this->Santri_model->getDataSantri('jumlahtotal', '', true); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->
