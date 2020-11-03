<?= $this->extend('layout_v') ?>

<?= $this->section('mycss') ?>
<link rel="stylesheet" href="<?= base_url('mycss/main.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<?php foreach ($dtKategori as $row) : ?>
    <div class="card-kategori mb-0 d-flex justify-content-between">
        <div>
            <h5 class="group-kategori"><?= $row->nama_kategori; ?></h5>
        </div>
        <div class="lihat-semua text-danger">Lihat semua <i class="icon-arrow-right-circle"></i></div>
    </div>
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-6">
        <?php foreach ($dtBarang[$row->id] as $brg) : ?>
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
                        <div class="d-flex flex-row">
                            <button type="button" class="flex-fill mr-2 btn btn-sm btn-success">Detail</button>
                            <button type="button" class="flex-fill btn btn-sm btn-danger">Beli</button>

                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>





<?php echo $this->endSection() ?>