<?= $this->extend('layoutAdmin_v') ?>

<?= $this->section('mycss') ?>
<!-- Bootstrap fileupload css -->
<link href="<?= base_url('template'); ?>/plugins/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" />
<?= $this->endSection(); ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card-box">
            <?php if ($pesanError) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $pesanError; ?>
                </div>
            <?php endif ?>
            <div>
                <?php $hidden = [
                    'id' => $dataTabel->id,
                    'id_kategori' => $dataTabel->id_kategori,
                ] ?>
                <?= form_open_multipart('admin/barang/upload', ['class' => 'form-horizontal'], $hidden); ?>
                <h5><?= $dataTabel->nama_barang; ?></h5>
                <div class="form-group">
                    <?= form_label('Cari Gambar', 'gambar', ['class' => 'col-md-4 col-form-label']); ?>
                    <div class="col-md-8">
                        <input id="gambar" type="file" style="overflow:hidden" name="gambar" onchange=previewFile() />

                        <img id="previewImg" src="<?= base_url('img/detail') . '/' . $dataTabel->gambar; ?>" alt="preview" class="img-fluid mt-3">
                    </div>
                </div>

                <hr>
                <div class="text-right">
                    <?= form_submit('submit', $submit, ['class' => 'btn btn-primary']); ?>
                </div>
                <?= form_close(); ?>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
<?= $this->section('skrip'); ?>
<!-- Bootstrap fileupload js -->

<script>
    function previewFile() {
        var file = $("input[type=file]").get(0).files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function() {
                $("#previewImg").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }
    }
</script>

<?= $this->endSection(); ?>