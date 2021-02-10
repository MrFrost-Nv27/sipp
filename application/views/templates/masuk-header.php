<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SIPP | <?= $judul; ?></title>

        <!-- Require CSS -->
        <link rel="icon" type="image/png" href="<?= base_url('assets/'); ?>img/icons/logo1.png" />
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css"
            href="<?= base_url('assets/'); ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css"
            href="<?= base_url('assets/'); ?>fonts/iconic/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" type="text/css"
            href="<?= base_url('assets/'); ?>vendor/css-hamburgers/hamburgers.min.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>vendor/animate/animate.css">
        <link rel="stylesheet" type="text/css"
            href="<?= base_url('assets/'); ?>vendor/animsition/css/animsition.min.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>vendor/select2/select2.min.css">
        <link rel="stylesheet" type="text/css"
            href="<?= base_url('assets/'); ?>vendor/daterangepicker/daterangepicker.css">
        <!--  -->

        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>css/login-util.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>css/login-main.css">
        <!--  -->

        <!-- Preloader -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>css/preloader.css">
        <!--  -->

    </head>

    <body class="bg-gradient-primary">
        <div class="preloader">
            <div class="loading">
                <img src="<?= base_url('assets/'); ?>img/preloader.gif" width="80" class="animated bounceIn">
                <p class="pt-2 animated fadeInDown">إِنَّ اللَّهَ مَعَ الصَّابِرِينَ</p>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10">
                    <div class="card mt-4 mb-4 pt-4 pl-2 pr-2">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="<?= base_url('assets/'); ?>img/Logo.png" class="rounded mb-2" alt="Logo SIPP"
                                    style="width: 200px; filter:drop-shadow(0px 0px 5px gray);">
                            </div>
                            <span class="login100-form-title p-b-30">
                                <?= $judul; ?>
                            </span>
