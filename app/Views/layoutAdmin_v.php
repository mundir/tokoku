<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?= $judulWeb; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="Menjual segala kebutuhan anda secara online, mudah dan praktis." name="description" />
    <meta content="mundir_muzaini" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('logofamili/favicon.ico'); ?>">

    <!-- App css -->
    <link href="<?= base_url('template/vertical'); ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('template/vertical'); ?>/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('template/vertical'); ?>/assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('template/vertical'); ?>/assets/css/style.css" rel="stylesheet" type="text/css" />

    <script src="<?= base_url('template/vertical'); ?>/assets/js/modernizr.min.js"></script>

    <?= $this->renderSection('mycss'); ?>
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

</head>


<body>

    <!-- Begin page -->
    <div id="wrapper">
        <div class="loading">
            <div class="spinner-border"></div>
        </div>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">

            <div class="slimscroll-menu" id="remove-scroll">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.html" class="logo">
                        <span>
                            <img src="<?= base_url('logofamili/logo_hijau_283.jpg'); ?>" alt="" style="width: 177px;">
                        </span>
                        <i>
                            <img src="<?= base_url('logofamili/bulat.png'); ?>" alt="" style="width: 54px;">
                        </i>
                    </a>
                </div>

                <!-- User box -->
                <div class="user-box">
                    <div class="user-img">
                        <img src="<?= base_url('profil/thumb/' . $avatar) ?>" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
                    </div>
                    <h5><a href="#"><?= $nama; ?></a> </h5>
                    <p class="text-muted"><?= $userGroup; ?></p>
                </div>

                <!--- Sidemenu -->
                <?= $this->include('layoutSuperMenu_v'); ?>
                <!-- Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

        <div class="content-page">

            <!-- Top Bar Start -->
            <div class="topbar">

                <nav class="navbar-custom">

                    <ul class="list-unstyled topbar-right-menu float-right mb-0">

                        <li class="hide-phone app-search">
                            <form>
                                <input type="text" placeholder="Search..." class="form-control">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </li>





                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="<?= base_url('profil/thumb/' . $avatar) ?>" alt="user" class="rounded-circle"> <span class="ml-1"><?= $nama; ?> <i class="mdi mdi-chevron-down"></i> </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="<?= base_url('admin/akun'); ?>" class="dropdown-item notify-item">
                                    <i class="fi-head"></i> <span>My Account</span>
                                </a>

                                <!-- item-->
                                <!-- <a href="javascript:void(0);" class="dropdown-item notify-item"> -->
                                <a href="<?= base_url('akun/logout'); ?>" class="dropdown-item notify-item">
                                    <i class="fi-power"></i> <span>Logout</span>
                                </a>

                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left disable-btn">
                                <i class="dripicons-menu"></i>
                            </button>
                        </li>
                        <li>
                            <div class="page-title-box">
                                <h4 class="page-title"><?= $judulPage; ?> </h4>
                                <!-- <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Highdmin</a></li>
                                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                    <li class="breadcrumb-item active">Starter</li>
                                </ol> -->
                            </div>
                        </li>

                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->



            <!-- Start Page content -->
            <div class="content">
                <div class="container-fluid">

                    <?= $this->renderSection('content'); ?>

                </div> <!-- container -->

            </div> <!-- content -->

            <footer class="footer text-right">
                2018 © Highdmin. - Coderthemes.com
            </footer>

        </div>


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->



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


    <?= $this->renderSection('skrip'); ?>

    <script>
        $(document).ready(function() {
            $('.loading').hide();
        })
    </script>
</body>

</html>