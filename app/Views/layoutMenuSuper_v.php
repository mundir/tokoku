<div class="navbar-custom">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">

                <li class="has-submenu">
                    <a href="index.html"><i class="icon-home"></i>Home</a>
                </li>

                <li class="has-submenu">
                    <a href="#"><i class="icon-layers"></i>Data</a>
                    <ul class="submenu">
                        <li><a href="<?= base_url('admin/pengguna'); ?>">Pengguna</a></li>
                        <li><a href="<?= base_url('admin/barang'); ?>">Barang</a></li>
                        <li><a href="<?= base_url('admin/transaksi'); ?>">Transaksi</a></li>
                        <li><a href="<?= base_url('admin/pengiriman'); ?>">Pengiriman</a></li>
                    </ul>
                </li>

                <li class="has-submenu">
                    <a href="<?= base_url('admin/akun/profilku'); ?>"><i class="icon-user"></i>Akun</a>
                </li>








            </ul>
            <!-- End navigation menu -->
        </div> <!-- end #navigation -->
    </div> <!-- end container -->
</div>