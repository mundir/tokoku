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
                <li class="has-submenu <?= ($aktif == 'home') ? 'active' : ''; ?>">
                    <a href="<?= base_url(); ?>"><i class="icon-home"></i>Home</a>
                </li>

                <li class="has-submenu <?= ($aktif == 'kategori') ? 'active' : ''; ?>">
                    <a href="#"><i class="icon-layers"></i>Kategori</a>
                    <ul class="submenu">
                        <?php foreach ($dtKategori as $dt) : ?>
                            <li><a href="<?= base_url('home/kategori/' . $dt->id); ?>"><?= $dt->nama_kategori; ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </li>

                <li class=" has-submenu <?= ($aktif == 'keranjang') ? 'active' : ''; ?>">
                    <a href="<?= base_url("keranjang") ?>"><i class="icon-basket"></i>Keranjang Belanja</a>
                </li>

                <li class="has-submenu <?= ($aktif == 'pesanan') ? 'active' : ''; ?>">
                    <a href="<?= base_url("pesananku") ?>"><i class="icon-list"></i>Pesanan Saya</a>
                </li>

                <li class="has-submenu <?= ($aktif == 'keinginan') ? 'active' : ''; ?>">
                    <a href="<?= base_url('whishlist') ?>"><i class="icon-heart"></i>Keinginan</a>
                </li>

                <li class="has-submenu <?= ($aktif == 'akun') ? 'active' : ''; ?>">
                    <a href="<?= base_url('akun/profil_saya') ?>"><i class="icon-user"></i>Akun</a>
                </li>








            </ul>
            <!-- End navigation menu -->
        </div> <!-- end #navigation -->
    </div> <!-- end container -->
</div>