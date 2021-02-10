<!-- Content -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title text-center">Profil</h5>
                    <div class="text-center">
                        <img src="<?= base_url('data/avatars/'); ?><?= $image; ?>" alt="" class="image-circle"
                            style="height: 200px;">
                        <p class="mt-2"><b><?= $user['nama']; ?></b>
                            <br><?= $user['role'] . ' '; ?>
                            <br><br><i
                                class="fa fa-user fa-w-20"></i><?= ' ' . $user['login_userid'] . ' / ' . $user['login_username']; ?>
                            <br><i class="fa fa-envelope fa-fw-20"></i><?= ' ' . $user['email']; ?>
                        </p>
                        <a class="badge badge-pill badge-primary" href="<?= base_url('super/akunsuper'); ?>"
                            style="width: 100px;">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->
