<?= $this->extend('layoutAdmin_v') ?>

<?= $this->section('mycss') ?>
<!-- <link rel="stylesheet" href="<?= base_url('mycss/main.css'); ?>"> -->
<?= $this->endSection(); ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card-box">
            <div>
                <?php $hidden = ['id_kategori' => $id_kategori, 'gambar' => 'default.jpg'] ?>
                <?= form_open('admin/barang/simpan', ['class' => 'form-horizontal'], $hidden); ?>
                <div class="form-group row">
                    <?= form_label('Nama Barang', 'nama_barang', ['class' => 'col-md-2 col-form-label']); ?>
                    <div class="col-md-10">
                        <?= form_input('nama_barang', '', ['class' => 'form-control']); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <?= form_label('Harga', 'harga', ['class' => 'col-md-2 col-form-label']); ?>
                    <div class="col-md-10">
                        <?= form_input('harga', '', ['class' => 'form-control'], 'number'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <?= form_label('Stok', 'stok', ['class' => 'col-md-2 col-form-label']); ?>
                    <div class="col-md-10">
                        <?= form_input('stok', '', ['class' => 'form-control'], 'number'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <?= form_label('Deskripsi', 'deskripsi', ['class' => 'col-md-2 col-form-label']); ?>
                    <div class="col-md-10">
                        <?= form_textarea('deskripsi', '', ['class' => 'form-control', 'row' => 5]); ?>
                    </div>
                </div>

                <?= form_submit('submit', $submit, ['class' => 'btn btn-primary']); ?>
                <?= form_close(); ?>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>