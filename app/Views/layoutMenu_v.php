<div class="navbar-custom">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
                <?php
                //$uri = current_url(true);
                //if ($uri->getSegment(3) == 'guest')
                //echo uri_string();
                ?>
                <li class="has-submenu">
                    <a href="<?= base_url(); ?>"><i class="icon-home"></i>Home</a>
                </li>

                <li class="has-submenu">
                    <a href="#"><i class="icon-layers"></i>Kategori</a>
                    <ul class="submenu">
                        <li><a href="<?= base_url('home/barang/1'); ?>">Paket Data</a></li>
                        <li><a href=" <?= base_url('home/barang/1'); ?>">Aksesoris HP</a></li>
                        <li><a href="<?= base_url('home/barang/1'); ?>">Alat Listrik</a></li>
                        <li><a href=" <?= base_url('home/barang/1'); ?>">Elektronika</a></li>
                        <li><a href="<?= base_url('home/barang/1'); ?>">Ikan Koi</a></li>
                        <li><a href=" <?= base_url('home/barang/1'); ?>">Obat Herbal</a></li>
                        <li><a href="<?= base_url('home/barang/1'); ?>">Voucher Bimbelajj</a></li>
                    </ul>
                </li>

                <li class=" has-submenu">
                    <a href="<?= base_url("keranjang") ?>"><i class="icon-basket"></i>Keranjang Belanja</a>
                </li>

                <li class="has-submenu">
                    <a href="<?= base_url("pesananku") ?>"><i class="icon-list"></i>Pesanan Saya</a>
                </li>

                <li class="has-submenu">
                    <a href="<?= base_url('whishlist') ?>"><i class="icon-heart"></i>Keinginan</a>
                </li>

                <li class="has-submenu">
                    <a href="<?= base_url('akun/profil_saya') ?>"><i class="icon-user"></i>Akun</a>
                </li>








            </ul>
            <!-- End navigation menu -->
        </div> <!-- end #navigation -->
    </div> <!-- end container -->
</div>