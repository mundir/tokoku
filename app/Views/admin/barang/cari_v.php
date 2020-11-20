<?= $this->extend('layout_v') ?>

<?= $this->section('mycss') ?>
<link rel="stylesheet" href="<?= base_url('mycss/main.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('content') ?>
<div class="row row-cols-2 row-cols-sm-3 row-cols-md-6">
    <?php foreach ($mainTabel as $brg) : ?>
        <div class="col col-brg">
            <div class="card isi">
                <div class="gambar">
                    <img src="<?= base_url('img/kotak') . '/' . $brg->gambar ?>" class="card-img-top" alt="..." />
                </div>
                <div class="card-body p-2">
                    <div class="card-nmbarang">
                        <h5 class="nama-barang m-0 p-0"><?= $brg->nama_barang; ?></h5>
                    </div>
                    <div class="d-flex flex-row">
                        <div class="harga">Rp <?= number_format($brg->harga, 0, ",", "."); ?></div>
                        <div class="terjual text-right">
                            <div><?= $brg->terjual; ?> terjual</div>
                            <div><?= $brg->stok; ?> tersedia</div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-2">
                        <a href="<?= base_url('admin/barang/gambar/' . $brg->id) ?>" class="btn btn-primary">Foto</a>
                        <a href="<?= base_url('admin/barang/input_data/' . $brg->id); ?>" class="btn btn-danger">Edit</a>
                    </div>

                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection(); ?>