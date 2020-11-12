<?= $this->extend('layoutAdmin_v') ?>

<?= $this->section('content') ?>
<style>
    .satu {
        margin-top: auto;
        margin-bottom: auto;
    }
</style>
<div class="row satu">
    <div class="col-md-6 offset-md-3">
        <div class="card-box">
            <h4 class="m-t-0 header-title text-danger">Tidak Ada Data</h4>
            <p><?= $keterangan; ?></p>
            <div class="card-footer text-right">
                <a href="<?= $mainCtrl; ?>" class="btn btn-light"> Kembali </a>
                <a href="<?= $mainCtrl . '/tambah'; ?>" class="btn btn-primary"> <?= $labelProses; ?> </a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>