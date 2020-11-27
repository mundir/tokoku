<?= $this->extend('layoutAdmin_v') ?>

<?= $this->section('mycss'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
<?= $this->endSection(); ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card py-4">
            <?php if ($pesanError) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $pesanError; ?>
                </div>
            <?php endif ?>
            <div>

                <?= form_open_multipart('admin/akun/upload'); ?>
                <div class="form-group mb-3">
                    <?= form_label('Pilih Foto', 'gambar', ['class' => 'col-md-4 col-form-label']); ?>
                    <div class="col-md-8">
                        <input id="gambar" type="file" style="overflow:hidden" name="avatar" />
                    </div>
                </div>
                <div id="upload-demo"></div>

                <hr>
                <div class="text-right">
                    <div class="btn btn-primary btn-upload-image mr-3">Upload</div>
                </div>
                <?= form_close(); ?>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
<?= $this->section('skrip'); ?>
<!-- Bootstrap fileupload js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>

<script>
    var resize = $('#upload-demo').croppie({
        enableExif: true,
        enableOrientation: true,
        viewport: { // Default { width: 100, height: 100, type: 'square' } 
            width: 250,
            height: 250,
            type: 'square' //'circle' //square
        },
        boundary: {
            width: 300,
            height: 300
        }
    });


    $('#gambar').on('change', function() {
        var reader = new FileReader();
        reader.onload = function(e) {
            resize.croppie('bind', {
                url: e.target.result
            }).then(function() {
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
    });


    $('.btn-upload-image').on('click', function(ev) {
        resize.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(img) {
            $.ajax({
                url: "simpan_foto",
                type: "POST",
                data: {
                    "image": img
                },
                success: function(data) {
                    window.location.href = data;
                    //html = '<img src="' + img + '" />';
                    //$("#preview-crop-image").html(html);
                }
            });
        });
    });
</script>

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