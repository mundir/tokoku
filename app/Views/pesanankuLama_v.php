<?= $this->extend('layout_v') ?>
<?= $this->section('content') ?>
<div class="card m-b-30">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#proses">Belum Bayar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#belum-bayar">Menunggu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#dikirim">Dikirim</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#selesai">Selesai</a>
            </li>
        </ul>
    </div>
    <div class="tab-content">

        <div class="tab-pane active card-body" id="proses">
            <h5 class="card-title">Barang dikemas dan siap ambil</h5>
            <p class="card-text">Berikut pesanan anda siap untuk diambil di Toko kami. Batas waktu pengambilan
                adalah hari ini jam 21.00,
                selebihnya otomatis pesanan dibatalkan.<br> Terima Kasih..</p>
            <div class="card">
                <?php $hit = 0 ?>
                <?php foreach ($dtTabel as $dts) : ?>

                    <div class="card-body mb-2">
                        <h5 class="d-inline" class="card-title"><?= $dts['total_harga']; ?></h5><span> 25/06/2015</span>
                        <ul class="list-group list-group-flush">
                            <?php $hitung = 1 ?>
                            <?php foreach ($dts['detail'] as $dtli) : ?>
                                <li class="list-group-item"><?= $hitung . '. ini biar lebih panjang aja gimana nasibnya' . $dtli->nama_barang; ?></li>
                                <?php $hitung++; ?>
                            <?php endforeach ?>
                        </ul>

                    </div>
                <?php endforeach ?>
            </div>

        </div>

        <div class="tab-pane fade card-body" id="belum-bayar">
            <h5 class="card-title">Menunggu Pembayaran</h5>
            <p class="card-text">Silahkan lakukan pembayaran untuk proses selanjutnya.</p>
            <div class="card mb-3">
                <div class="card-body">
                    <?php foreach ($dtTabel as $dts) : ?>
                        <h5 class="d-inline" class="card-title"><?= $dts['total_harga']; ?></h5><span> 25/06/2015</span>
                        <ul class="list-group list-group-flush">
                            <?php $hitung = 1 ?>
                            <?php foreach ($dts['detail'] as $dtli) : ?>
                                <li class="list-group-item"><?= $hitung . '. ' . $dtli->nama_barang; ?></li>
                                <?php $hitung++; ?>
                            <?php endforeach ?>
                        </ul>
                        <hr>
                        <div class="text-right">
                            <button type="button" class="btn btn-light mr-2">Batalkan</button>
                            <button type="button" class="btn btn-danger">Bayar</button>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <div class="tab-pane fade card-body" id="dikirim">
            <h5 class="card-title">Sedang dalam Pengiriman</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-custom waves-effect waves-light">Go somewhere</a>
        </div>
        <div class="tab-pane fade card-body" id="selesai">
            <h5 class="card-title">Selesai</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-custom waves-effect waves-light">Go somewhere</a>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>