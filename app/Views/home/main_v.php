<?= $this->extend('layout_v') ?>

<?= $this->section('mycss') ?>
<!-- Sweet Alert css -->
<link href="<?= base_url('template'); ?>/plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?= base_url('mycss/main.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<?php foreach ($dtKategori as $row) : ?>
    <div class="card-kategori mb-0 mt-3 d-flex justify-content-between">
        <div>
            <h5 class="group-kategori"><?= $row->nama_kategori; ?></h5>
        </div>
        <a class="lihat-semua text-danger" href="<?= base_url('home/kategori/' . $row->id); ?>">Lihat semua <i class="icon-arrow-right-circle"></i></a>
    </div>
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-6">
        <?php $sdata['brgid'] = $dtBarang[$row->id]; ?>
        <?= view('home/card_v', $sdata); ?>
    </div>
<?php endforeach; ?>


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