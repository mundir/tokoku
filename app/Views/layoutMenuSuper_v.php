<style>
    #topnav .navbar-custom {
        background-color: green;
    }
</style>
<div class="navbar-custom">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">

                <li class="has-submenu <?= ($aktif == 'pesanan') ? ' active' : ''; ?>">
                    <a href="#"><i class="icon-home"></i>Pesanan</a>
                    <ul class="submenu">
                        <li <?= ($subAktif == 'ambil') ? 'class="active"' : ''; ?>><a href="<?= base_url('admin/home/index'); ?>">Pesanan Ambil di Toko</a></li>
                        <li <?= ($subAktif == 'kirim') ? 'class="active"' : ''; ?>><a href="<?= base_url('admin/home/kirim'); ?>">Pesanan untuk Dikirim</a></li>
                        <li <?= ($subAktif == 'bayar') ? 'class="active"' : ''; ?>><a href="<?= base_url('admin/home/pembayaran'); ?>">Proses Pembayaran</a></li>
                        <li <?= ($subAktif == 'selesai') ? 'class="active"' : ''; ?>><a href="<?= base_url('admin/home/selesai'); ?>">Pesanan Selesai</a></li>
                    </ul>
                </li>

                <li class="has-submenu<?= ($aktif == 'barang') ? ' active' : ''; ?>">
                    <a href="#"><i class="icon-layers"></i>Data Barang</a>
                    <ul class="submenu">
                        <?php foreach ($dtKategori as $kat) : ?>
                            <li><a href="<?= base_url('admin/barang/tampilkan/' . $kat->id); ?>"><?= $kat->nama_kategori; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class="has-submenu<?= ($aktif == 'kategori') ? ' active' : ''; ?>">
                    <a href="#"><i class="icon-list"></i>Kategori</a>
                    <ul class="submenu">
                        <?php foreach ($dtKatGroup as $kat) : ?>
                            <li><a href="<?= base_url('admin/Kategori/tampilkan/' . $kat->id); ?>"><?= $kat->nama_group; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class="has-submenu<?= ($aktif == 'pengguna') ? ' active' : ''; ?>">
                    <a href="#"><i class="icon-user"></i>Pengguna</a>
                    <ul class="submenu">
                        <li <?= ($subAktif == 'super') ? 'class="active"' : ''; ?>><a href="<?= base_url('admin/pengguna/super'); ?>">Manager</a></li>
                        <li <?= ($subAktif == 'admin') ? 'class="active"' : ''; ?>><a href="<?= base_url('admin/pengguna/index'); ?>">Admin</a></li>
                        <li <?= ($subAktif == 'customer') ? 'class="active"' : ''; ?>><a href="<?= base_url('admin/pengguna/customer'); ?>">Customer</a></li>
                    </ul>
                </li>

                <li class="has-submenu<?= ($aktif == 'akun') ? ' active' : ''; ?>">
                    <a href="<?= base_url('admin/akun'); ?>"><i class="icon-user"></i>Akun</a>
                </li>








            </ul>
            <!-- End navigation menu -->
        </div> <!-- end #navigation -->
    </div> <!-- end container -->
</div>