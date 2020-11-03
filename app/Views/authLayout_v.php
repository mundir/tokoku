<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Toko Online Amanah Jaya Bakalan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= $baseTemplate; ?>/assets/images/favicon.ico">

    <!-- App css -->
    <link href="<?= $baseTemplate; ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $baseTemplate; ?>/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?= $baseTemplate; ?>/assets/css/style.css" rel="stylesheet" type="text/css" />

    <script src="<?= $baseTemplate; ?>/assets/js/modernizr.min.js"></script>

</head>

<body>

    <!-- Begin page -->
    <div class="accountbg" style="background: url('<?= $baseTemplate; ?>/assets/images/bg-1.jpg');background-size: cover;"></div>

    <div class="wrapper-page account-page-full">

        <div class="card">
            <div class="card-block">

                <div class="account-box">

                    <div class="card-box p-5">
                        <h2 class="text-uppercase text-center pb-4">
                            <a href="index.html" class="text-success">
                                <span><img src="<?= $baseTemplate; ?>/assets/images/logo.png" alt="" height="26"></span>
                            </a>
                        </h2>

                        <?= $this->renderSection('content'); ?>



                    </div>
                </div>

            </div>
        </div>

        <div class="m-t-40 text-center">
            <p class="account-copyright">2018 © Highdmin. - Coderthemes.com</p>
        </div>

    </div>


    <!-- jQuery  -->
    <script src="<?= $baseTemplate; ?>/assets/js/jquery.min.js"></script>
    <script src="<?= $baseTemplate; ?>/js/popper.min.js"></script>
    <script src="<?= $baseTemplate; ?>/js/bootstrap.min.js"></script>
    <script src="<?= $baseTemplate; ?>/assets/js/waves.js"></script>
    <script src="<?= $baseTemplate; ?>/assets/js/jquery.slimscroll.js"></script>

    <!-- App js -->
    <script src="<?= $baseTemplate; ?>/assets/js/jquery.core.js"></script>
    <script src="<?= $baseTemplate; ?>/assets/js/jquery.app.js"></script>

</body>

</html>