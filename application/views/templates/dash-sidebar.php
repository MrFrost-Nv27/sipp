<!-- Sidebar -->
<?php $this->load->model('Menu_model'); ?>
<div class="app-sidebar sidebar-shadow bg-asteroid sidebar-text-light">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                    data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar scrollbar-container">
        <div class="app-sidebar__inner">

            <!-- SIde bar menu -->
            <ul class="vertical-nav-menu">

                <?php foreach ($header as $head) : ?>
                <li class="app-sidebar__heading"><?= $head['judul']; ?></li>
                <?php $menus = $this->Menu_model->menuQueryByHeader($head['id']);
                    foreach ($menus as $menu) : ?>
                <li>
                    <?php if ($page['menu'] == $menu['menu']) : ?>
                    <a href="<?= base_url($menu['url']); ?>" class="mm-active">
                        <?php else : ?>
                        <a href="<?= base_url($menu['url']); ?>" class="">
                            <?php endif; ?>
                            <i class="metismenu-icon <?= $menu['icon']; ?>"></i>
                            <?= $menu['menu']; ?>
                            <?php if ($menu['is_submenu'] == 0) : ?>
                        </a>
                </li>
                <?php else : ?>
                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>

                    <?php $submenu = $this->Menu_model->subMenuQueryByMenu($head['id'], $menu['id']); ?>

                    <?php foreach ($submenu as $sm) : ?>
                    <?php if ($page['menu'] == $sm['menu']) : ?>
                    <li>
                        <a href="<?= base_url($sm['url']); ?>" class="mm-active">
                            <?php else : ?>
                    <li>
                        <a href="<?= base_url($sm['url']); ?>" class="">
                            <?php endif; ?>
                            <i class="metismenu-icon"></i>
                            <?= $sm['menu']; ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                </li>
                <?php endif; ?>
                <?php endforeach; ?>
                <?php endforeach; ?>

                <hr class="bg-light">
                <li id="tentang">
                    <a href="#">
                        <i class="metismenu-icon pe-7s-info"></i>
                        Tentang
                    </a>
                </li>
                <li id="keluar">
                    <a href="#">
                        <i class="metismenu-icon pe-7s-back"></i>
                        Keluar
                    </a>
                </li>
            </ul>
            <!-- End of Side bar menu -->

        </div>
    </div>
</div>
<!-- End Of Sidebar -->

<div class="app-main__outer">
    <!-- Main Content -->
    <div class="app-main__inner">

        <!-- Title -->
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="<?= $page['icon']; ?> icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div><?= $page['title']; ?>
                        <div class="page-title-subheading"><?= $page['subtitle']; ?>.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- enf of title -->
