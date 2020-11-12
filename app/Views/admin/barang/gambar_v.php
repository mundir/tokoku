<?= $this->extend('layoutAdmin_v') ?>

<?= $this->section('mycss') ?>
<!-- Bootstrap fileupload css -->
<link href="<?= base_url('template'); ?>/plugins/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" />
<?= $this->endSection(); ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card-box">
            <div>
                <?php $hidden = ['id' => $dataTabel->id] ?>
                <?= form_open_multipart('admin/barang/upload', ['class' => 'form-horizontal'], $hidden); ?>

                <div class="form-group row">
                    <?= form_label('Cari Gambar', 'gambar', ['class' => 'col-md-2 col-form-label']); ?>
                    <div class="col-md-10">
                        <input type="file" name="gambar" onchange=previewFile() />

                        <img id="previewImg" src="<?= base_url('img') . '/' . $dataTabel->gambar; ?>" alt="preview" class="img-fluid mt-3">
                    </div>
                </div>


                <?= form_submit('submit', $submit, ['class' => 'btn btn-primary']); ?>
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