<?= $this->extend('layout_v') ?>

<?= $this->section('mycss') ?>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Pilih Kategori</h4>

            <div class="row">
                <div class="col-12">
                    <div class="p-20">
                        <?= form_open('admin/barang/sesskategori', 'class="form-horizontal"'); ?>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Kategori</label>
                            <div class="col-9">
                                <?php
                                foreach ($dataTabel as $dt) {
                                    $options[$dt->id] = $dt->nama_kategori;
                                }
                                echo form_dropdown('kategori', $options, '', ['class' => 'form-control']);
                                ?>
                            </div>
                        </div>
                        <div class="text-right">
                            <?= form_submit('submit', 'Tampilkan', 'class="btn btn-primary"'); ?>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div>
    </div>
</div>

<?php echo $this->endSection() ?>