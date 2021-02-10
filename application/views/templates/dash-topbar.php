<!-- Topbar -->
<div class="app-header header-shadow bg-grow-early header-text-light">
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
    <div class="app-header__content">

        <!-- Menu Topbar Kanan -->
        <div class="app-header-right">
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left mr-2 header-user-info text-right">
                            <div class="widget-heading">
                                <?= $user['nama']; ?>
                            </div>
                            <div class="widget-subheading">
                                <?= $user['role']; ?>
                            </div>
                        </div>
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <img width="42" class="rounded-circle"
                                    src="<?= base_url('data/'); ?>avatars/<?= $image; ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Of Topbar -->

<!-- Main Content -->
<div class="app-main">
