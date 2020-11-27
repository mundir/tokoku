<div id="sidebar-menu">

    <ul class="metismenu" id="side-menu">

        <!--<li class="menu-title">Navigation</li>-->

        <!-- <li>
            <a href="index.html">
                <i class="fi-air-play"></i><span class="badge badge-danger badge-pill pull-right">7</span> <span> Dashboard </span>
            </a>
        </li> -->

        <li>
            <a href="javascript: void(0);"><i class="fi-box"></i> <span> Pesanan </span> <span class="menu-arrow"></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li <?= ($subAktif == 'ambil') ? 'class="active"' : ''; ?>><a href="<?= base_url('admin/home/index'); ?>">Pesanan Ambil di Toko</a></li>
                <li <?= ($subAktif == 'kirim') ? 'class="active"' : ''; ?>><a href="<?= base_url('admin/home/kirim'); ?>">Pesanan untuk Dikirim</a></li>
                <li <?= ($subAktif == 'bayar') ? 'class="active"' : ''; ?>><a href="<?= base_url('admin/home/pembayaran'); ?>">Proses Pembayaran</a></li>
                <li <?= ($subAktif == 'selesai') ? 'class="active"' : ''; ?>><a href="<?= base_url('admin/home/selesai'); ?>">Pesanan Selesai</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="fi-paper"></i><span> Data Barang </span> <span class="menu-arrow"></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <?php foreach ($dtKategori as $kat) : ?>
                    <li><a href="<?= base_url('admin/barang/tampilkan/' . $kat->id); ?>"><?= $kat->nama_kategori; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="fi-layers"></i><span> Data Kategori </span> <span class="menu-arrow"></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="<?= base_url('admin/Kategori/index'); ?>">Tampilkan Semua</a></li>

            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="fi-briefcase"></i> <span> Pengguna </span> <span class="menu-arrow"></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li <?= ($subAktif == 'super') ? 'class="active"' : ''; ?>><a href="<?= base_url('admin/pengguna/super'); ?>">Manager</a></li>
                <li <?= ($subAktif == 'admin') ? 'class="active"' : ''; ?>><a href="<?= base_url('admin/pengguna/index'); ?>">Admin</a></li>
                <li <?= ($subAktif == 'customer') ? 'class="active"' : ''; ?>><a href="<?= base_url('admin/pengguna/customer'); ?>">Customer</a></li>
            </ul>
        </li>

        <!-- <li>
            <a href="#">
                <i class="fi-user"></i> <span> Akun saya </span>
            </a>
        </li> -->




    </ul>

</div>