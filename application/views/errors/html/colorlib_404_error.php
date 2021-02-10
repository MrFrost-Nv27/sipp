<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <title>SIPP | Waduh!</title>

        <!-- Google font -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,700" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.min.css">

        <!-- Custom stlylesheet -->
        <link type="text/css" rel="stylesheet" href="<?= base_url('assets/'); ?>css/error.css" />

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>css/login-main.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>css/login-util.css">

    </head>

    <body class="bg-gradient-primary">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div id="notfound">
                        <div class="card mt-4 mb-4 pl-2 pr-2">
                            <div class="card-body text-center">
                                <div class="text-center pb-4">
                                    <span>Mohon Maaf .. Halaman yang anda cari tidak ditemukan</span>
                                </div>
                                <a href="<?= base_url('masuk'); ?>" class="btn btn-outline-success" role="button"
                                    aria-pressed="true">Kembali ke
                                    halaman utama</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
