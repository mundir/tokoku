<?= $this->extend('layoutAdmin_v') ?>

<?= $this->section('mycss') ?>
<link rel="stylesheet" href="<?= base_url('mycss/main.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<div class="card mb-2">
    <div class="d-flex justify-content-between">
        <?= form_open('admin/barang/cari'); ?>
        <div class="input-group mr-2">
            <input name="txt-cari" type="text" class="form-control" placeholder="Cari nama barang..." aria-label="cari barang" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-light" type="submit" id="button-addon2"><i class="icon-magnifier"></i></button>
            </div>
        </div>
        <?= form_close(); ?>
        <div class="text-right">
            <a href="<?= base_url('admin/barang/input_data'); ?>" class="btn btn-primary">Tambah</a>
        </div>
    </div>

</div>
<div class="row row-cols-2 row-cols-sm-3 row-cols-md-6">
    <?php foreach ($mainTabel as $brg) : ?>
        <div class="col col-brg" style="max-width:210px">
            <div class="card isi">
                <div class="gambar">
                    <img src="<?= base_url('img/preview') . '/' . $brg->gambar ?>" class="card-img-top" alt="..." />
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
<div class="d-flex justify-content-center mt-3">
    <?= $pager->links('group1', 'bstrap'); ?>
</div>

<?php echo $this->endSection() ?>