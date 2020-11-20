<?= $this->extend('layout_v') ?>

<?= $this->section('mycss') ?>
<!-- Sweet Alert css -->
<link href="<?= base_url('template'); ?>/plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?= base_url('mycss/main.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<div class="row row-cols-2 row-cols-sm-3 row-cols-md-6">
    <?php foreach ($dtBarang as $brg) : ?>
        <div class="col col-brg">
            <div class="card isi">
                <div class="gambar">
                    <img src="<?= base_url('img/kotak') . '/' . $brg->gambar ?>" class="img-fluid" alt="..." />
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

                    <div class="d-flex flex-row mt-2">
                        <button type="button" class="btn btn-primary waves-effect waves-light mr-1" onclick="ambildata('<?= $brg->id; ?>')">Detail</button>
                        <?php if ($userGroup != '0') : ?>
                            <button onclick="beli('<?= $brg->id; ?>')" type="button" class="flex-fill btn btn-sm btn-danger waves-effect waves-light">Beli</button>
                        <?php else : ?>
                            <button onclick="silahkan_login()" type="button" class="flex-fill btn btn-sm btn-danger waves-effect waves-light">Beli</button>
                        <?php endif ?>
                    </div>

                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->include('modalDetail_v') ?>
<?= $this->include('modalGuest_v') ?>
<?php echo $this->endSection() ?>

<?= $this->section('skrip'); ?>
<!-- Sweet Alert Js  -->
<script src="<?= base_url('template'); ?>/plugins/sweet-alert/sweetalert2.min.js"></script>
<!-- Rating js -->
<script src="<?= base_url('template'); ?>/plugins/raty-fa/jquery.raty-fa.js"></script>
<script src="<?= base_url('myjs/mainPage.js'); ?>"></script>
<script>
    $(document).ready(function() {

        $('#score').raty({
            score: 4,
            readOnly: true,
            starOff: 'fa fa-star-o text-muted',
            starOn: 'fa fa-star text-danger'
        });
        $(".img-detail").click(function() {
            var src = $(this).attr('src');
            $('#img-img').attr('src', src);
        });

    });
</script>
<?= $this->endSection(); ?>