<?= $this->extend('layout_v') ?>
<?= $this->section('content') ?>
<style>
    .gbrku {
        width: 60px;
        height: 60px;
        overflow: hidden;
        display: inline-block;
    }

    .item-gbr {
        padding: 1rem 0;
    }

    div.scrollmenu {
        background-color: white;
        overflow: auto;
        white-space: nowrap;
        top: 4rem;
    }

    div.scrollmenu a {
        display: inline-block;
        color: tomato;
        text-align: center;
        padding: .5rem 1rem;
        border-right: 1px solid #e3eaef;

    }

    div.scrollmenu a.active {
        background-color: #17a2b8;
        color: white;
    }
</style>
<div class="scrollmenu sticky-top mb-1">
    <a class="<?= ($aktif == 'blmbayar') ? 'active' : ''; ?>" href="<?= base_url('pesananku') ?>">Belum bayar</a>
    <a class="<?= ($aktif == 'dikemas') ? 'active' : ''; ?>" href="<?= base_url('pesananku/dikemas') ?>">Dikemas</a>
    <a class="<?= ($aktif == 'dikirim') ? 'active' : ''; ?>" href="<?= base_url('pesananku/dikirim') ?>">Dikirim</a>
    <a class="<?= ($aktif == 'selesai') ? 'active' : ''; ?>" href="<?= base_url('pesananku/selesai') ?>">Selesai</a>
</div>
<div class="row">
    <?php foreach ($dtTabel as $item) : ?>
        <div class="col-md-6 col-lg-3">
            <div class="company-card card-box">
                <h6 class="m-0"><?= $item['transaksi']->created_at; ?></h6>
                <h4 class="mb-1 mt-0"><?= $item['transaksi']->id; ?></h4>
                <div class="list-barang" style="height: 13rem;overflow:auto">
                    <?php $total_barang = 0 ?>
                    <?php foreach ($item['detail'] as $rowDetail) : ?>
                        <li class="list-group list-group-flush item-gbr d-flex flex-row">
                            <img src="<?= base_url('img/preview/' . $rowDetail->gambar); ?>" alt="" class="img-thumbnail gbrku mr-2">
                            <div class="brg-ket flex-fill">
                                <p class="mt-0 mb-1"><?= $rowDetail->nama_barang; ?></p>
                                <?php $subTotal = $rowDetail->harga * $rowDetail->qty; ?>
                                <?php $total_barang += $subTotal ?>
                                <div class="text-danger text-right"><?= $rowDetail->harga . ' x ' . $rowDetail->qty . ' = Rp ' . number_format($subTotal, 0, ",", ".") ?></div>
                            </div>
                        </li>
                    <?php endforeach ?>
                </div>
                <dl class="row" style="font-size: 10pt;">
                    <dt class="col-5 text-right">Cara Kirim</dt>
                    <dd id="ket-pengiriman" class="col-7"><?= $item['transaksi']->cara_kirim; ?></dd>

                    <dt class="col-5 text-right">Cara Bayar</dt>
                    <dd id="ket-pembayaran" class="col-7"><?= $item['transaksi']->cara_bayar; ?></dd>

                    <dt class="col-5 text-right">Harga Barang</dt>
                    <dd id="ket-hargabarang" class="col-7"><?= number_format($item['transaksi']->harga_barang, 0, ",", "."); ?></dd>

                    <dt class="col-5 text-right">Ongkos Kirim</dt>
                    <dd id="ket-ongkoskirim" class="col-7"><?= number_format($item['transaksi']->biaya_pengiriman, 0, ",", "."); ?></dd>

                    <dt class="col-5 text-right">Penanganan</dt>
                    <dd id="ket-penanganan" class="col-7"><?= number_format($item['transaksi']->biaya_penanganan, 0, ",", "."); ?></dd>

                </dl>

                <div class="text-center mt-5">
                    <h5 class="font-normal text-muted">Tagihan anda</h5>
                    <h3>Rp <?= number_format($item['transaksi']->total_harga, 0, ",", "."); ?></h3>
                    <h6 class="mb-0">Batas Pembayaran </h6>
                    <?php $exp = $item['transaksi']->expired_at ?>
                    <h6 class="m-b-30 mt-0"> <?= date('d/m/Y h:i:s', strtotime($exp)); ?></h6>
                </div>
                <?php if ($showBayar) : ?>
                    <div class="text-right"><a href="<?= base_url('pesananku/bayar') ?>" class="btn btn-custom waves-effect waves-light">Bayar</a></div>
                <?php endif ?>

            </div>
        </div>
    <?php endforeach ?>

</div>



<?= $this->endSection(); ?>