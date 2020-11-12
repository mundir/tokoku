<?= $this->extend('layoutAdmin_v') ?>

<?= $this->section('mycss') ?>
<link rel="stylesheet" href="<?= base_url('mycss/main.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<div class="card mb-2">
    <div class="d-flex">
        <div class="input-group mr-2">
            <input type="text" class="form-control" placeholder="Cari nama barang..." aria-label="Recipient's username" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Cari</button>
            </div>
        </div>
        <a href="<?= base_url('admin/barang/tambah'); ?>" class="btn btn-primary btn-sm">Tambah</a>
    </div>
</div>
<div class="row row-cols-2 row-cols-sm-3 row-cols-md-6">
    <?php foreach ($mainTabel as $brg) : ?>
        <div class="col col-brg">
            <div class="card isi">
                <img src="<?= base_url('img') . '/' . $brg->gambar ?>" class="card-img-top" alt="...">
                <div class="card-body p-2">
                    <div class="card-title">
                        <h5 class="nama-barang"><?= $brg->nama_barang; ?></h5>
                    </div>
                    <div class="d-flex flex-row">
                        <div class="harga">Rp <?= $brg->harga; ?></div>
                        <div class="terjual">10rb+ terjual</div>
                    </div>
                    <hr class="my-1">
                    <div class="text-right">
                        <a href="<?= $mainCtrl . '/edit/' . $brg->id; ?>" class="btn btn-sm btn-danger">Edit</a>
                    </div>

                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php echo $this->endSection() ?>