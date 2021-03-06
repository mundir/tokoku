<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Highdmin - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('logo'); ?>/favicon.ico">

    <!-- App css -->
    <link href="<?= base_url('template/vertical'); ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('template/vertical'); ?>/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('template/vertical'); ?>/assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('template/vertical'); ?>/assets/css/style.css" rel="stylesheet" type="text/css" />

    <script src="<?= base_url('template/vertical'); ?>/assets/js/modernizr.min.js"></script>

</head>


<body class="account-pages">

    <!-- Begin page -->
    <div class="accountbg" style="background: url('assets/images/bg-1.jpg');background-size: cover;"></div>

    <div class="wrapper-page account-page-full">

        <div class="card">
            <div class="card-block">

                <div class="account-box">

                    <div class="card-box pt-5">
                        <h5 class="text-center">
                            Selamat Datang di
                        </h5>
                        <div class="text-center mb-5">
                            <a href="index.html">
                                <span><img src="<?= base_url('logofamili/logoLogin.png'); ?>" alt="logo"></span>
                            </a>
                        </div>

                        <?= $this->renderSection('content'); ?>

                        <div class="m-t-40 text-center text-muted account-copyright">
                            <p class="text-muted">2020-2021 © amanahjaya-dev - familimart.net</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>



    </div>



    <!-- jQuery  -->
    <script src="<?= base_url('template/vertical'); ?>/assets/js/jquery.min.js"></script>
    <script src="<?= base_url('template/vertical'); ?>/assets/js/popper.min.js"></script>
    <script src="<?= base_url('template/vertical'); ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url('template/vertical'); ?>/assets/js/metisMenu.min.js"></script>
    <script src="<?= base_url('template/vertical'); ?>/assets/js/waves.js"></script>
    <script src="<?= base_url('template/vertical'); ?>/assets/js/jquery.slimscroll.js"></script>

    <!-- App js -->
    <script src="<?= base_url('template/vertical'); ?>/assets/js/jquery.core.js"></script>
    <script src="<?= base_url('template/vertical'); ?>/assets/js/jquery.app.js"></script>

</body>

</html>