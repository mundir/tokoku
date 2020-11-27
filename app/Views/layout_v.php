<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?= $judulWeb; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="Menjual segala kebutuhan anda secara online, mudah dan praktis." name="description" />
    <meta content="author" name="mundir_muzaini" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <?php $template = base_url('template/horizontal') ?>
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('logofamili/favicon.ico'); ?>">

    <!-- App css -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="<?= $template; ?>/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?= $template; ?>/assets/css/style.css" rel="stylesheet" type="text/css" />

    <script src="<?= $template; ?>/assets/js/modernizr.min.js"></script>
    <?= $this->renderSection('mycss'); ?>
    <style>
        .navbar-hijau {
            background-color: #00933d;
        }
    </style>
</head>

<body>

    <!-- Navigation Bar-->
    <header id="topnav">
        <div class="topbar-main">
            <div class="container-fluid">

                <!-- Logo container-->
                <div class="logo">
                    <!-- Text Logo -->
                    <!-- <a href="index.html" class="logo">
                            <span class="logo-small"><i class="mdi mdi-radar"></i></span>
                            <span class="logo-large"><i class="mdi mdi-radar"></i> Highdmin</span>
                        </a> -->
                    <!-- Image Logo -->
                    <a href="<?= base_url($homepg); ?>" class="logo">
                        <img src="<?= base_url('logofamili/logo_hijau_283.jpg'); ?>" alt="" height="30" class="logo-small">
                        <img src="<?= base_url('logofamili/logo_hijau_283.jpg'); ?>" alt="" height="36" class="logo-large">
                    </a>

                </div>
                <!-- End Logo container-->


                <div class="menu-extras topbar-custom">

                    <ul class="list-unstyled topbar-right-menu float-right mb-0">

                        <?php if ($showMenu || $userGroup == 'super' || $userGroup == 'admin') : ?>
                            <li class="menu-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>
                        <?php endif ?>

                        <?php if ($showKeranjang) : ?>
                            <li class="dropdown notification-list">
                                <a class="nav-link arrow-none waves-effect" href="<?= base_url('keranjang'); ?>">

                                    <i class="noti-icon">
                                        <!-- <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                        <path d="M13.5 21c-.276 0-.5-.224-.5-.5s.224-.5.5-.5.5.224.5.5-.224.5-.5.5m0-2c-.828 0-1.5.672-1.5 1.5s.672 1.5 1.5 1.5 1.5-.672 1.5-1.5-.672-1.5-1.5-1.5m-6 2c-.276 0-.5-.224-.5-.5s.224-.5.5-.5.5.224.5.5-.224.5-.5.5m0-2c-.828 0-1.5.672-1.5 1.5s.672 1.5 1.5 1.5 1.5-.672 1.5-1.5-.672-1.5-1.5-1.5m16.5-16h-2.964l-3.642 15h-13.321l-4.073-13.003h19.522l.728-2.997h3.75v1zm-22.581 2.997l3.393 11.003h11.794l2.674-11.003h-17.861z" />
                                    </svg> -->
                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                            <circle cx="9" cy="21" r="1"></circle>
                                            <circle cx="20" cy="21" r="1"></circle>
                                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                        </svg>
                                    </i>
                                    <span id="jumlah-keranjang" class="badge badge-dark badge-pill noti-icon-badge" style="right:2px"><?= $jumlahKeranjang; ?></span>
                                </a>

                            </li>
                        <?php endif ?>
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="<?= base_url('profil/thumb/' . $avatar) ?>" alt="user" class="rounded-circle"> <span class="ml-1 pro-user-name"><?= $nama; ?><i class="mdi mdi-chevron-down"></i> </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <?php foreach ($akuns as $akun) : ?>
                                    <a href="<?= base_url($akun['link']); ?>" class="dropdown-item notify-item">
                                        <i class="<?= $akun['icon']; ?>"></i> <span><?= $akun['label']; ?></span>
                                    </a>
                                <?php endforeach ?>

                            </div>
                        </li>
                    </ul>
                </div>
                <!-- end menu-extras -->

                <div class="clearfix"></div>

            </div> <!-- end container -->
        </div>
        <!-- end topbar-main -->
        <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
        <?php echo ($showMenu || $userGroup == 'super' || $userGroup == 'admin') ? $this->include($vMenu) : ''; ?>
        <!-- end navbar-custom -->

    </header>
    <!-- End Navigation Bar-->
    <style>
        .loading {
            position: fixed;
            z-index: 999;

            margin: auto;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 50px;
            height: 50px;
        }

        /* Transparent Overlay */
        .loading::before {
            content: '';
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
    </style>

    <div class="wrapper">
        <div class="container">
            <div class="loading">
                <div class="spinner-border"></div>
            </div>
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="d-flex">
                            <?php if ($showBack) : ?>
                                <a href="<?= base_url($backLink); ?>" class="mr-2 text-danger"><i class="icon-arrow-left-circle"></i></a>
                            <?php endif ?>
                            <h4 class="page-title"><?= $judulPage; ?></h4>
                        </div>


                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->




            <?= $this->renderSection('content'); ?>

            <div class="d-block d-sm-none" style="height:60px;"></div>

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->


    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    2020 © Amanahjaya.online
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->


    <!-- jQuery  -->
    <script src="<?= $template; ?>/assets/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="<?= $template; ?>/assets/js/waves.js"></script>
    <script src="<?= $template; ?>/assets/js/jquery.slimscroll.js"></script>

    <!-- App js -->
    <script src="<?= $template; ?>/assets/js/jquery.core.js"></script>
    <script src="<?= $template; ?>/assets/js/jquery.app.js"></script>
    <?= $this->renderSection('skrip'); ?>

    <script>
        $(document).ready(function() {
            $('.loading').hide();
        })
    </script>


</body>

</html>