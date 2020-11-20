<?= $this->extend('layout_v') ?>

<?= $this->section('mycss') ?>
<link href="<?= base_url('template'); ?>/plugins/jquery-te-1.4.0.css" rel="stylesheet" type="text/css" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= form_open('admin/barang/simpan', ['class' => 'form-horizontal'], $hidden); ?>
<div class="row">
    <div class="col-md-6">
        <div class="card-box">
            <!-- 'nama_barang' -->
            <?php
            $fld = 'nama_barang';
            $label = 'Nama';
            $class = ($validasi->hasError($fld)) ? 'form-control is-invalid' : 'form-control';
            $extra = [
                'id' => $fld,
                'class' => $class,
            ];
            $dtt = ($submit == 'Edit') ? $dataTabel->$fld : '';
            $val = (old($fld) != null) ? old($fld) : $dtt;
            $err = $validasi->getError($fld);
            ?>

            <div class="form-group row">
                <?= form_label($label, $fld, ['class' => 'col-md-2 col-form-label']); ?>
                <div class="col-md-10">
                    <?= form_input($fld, $val, $extra); ?>
                    <div class="invalid-feedback">
                        <?= $err ?>
                    </div>
                </div>
            </div>
            <!-- 'harga_beli' -->
            <?php
            $fld = 'harga_beli';
            $label = 'Harga Beli';
            $class = ($validasi->hasError($fld)) ? 'form-control is-invalid' : 'form-control';
            $extra = [
                'id' => $fld,
                'class' => $class,
            ];
            $dtt = ($submit == 'Edit') ? $dataTabel->$fld : '';
            $val = (old($fld) != null) ? old($fld) : $dtt;
            $err = $validasi->getError($fld);
            ?>

            <div class="form-group row">
                <?= form_label($label, $fld, ['class' => 'col-md-2 col-form-label']); ?>
                <div class="col-md-10">
                    <?= form_input($fld, $val, $extra); ?>
                    <div class="invalid-feedback">
                        <?= $err ?>
                    </div>
                </div>
            </div>

            <!-- 'harga' -->
            <?php
            $fld = 'harga';
            $label = 'Harga';
            $class = ($validasi->hasError($fld)) ? 'form-control is-invalid' : 'form-control';
            $extra = [
                'id' => $fld,
                'class' => $class,
            ];
            $dtt = ($submit == 'Edit') ? $dataTabel->$fld : '';
            $val = (old($fld) != null) ? old($fld) : $dtt;
            $err = $validasi->getError($fld);
            ?>

            <div class="form-group row">
                <?= form_label($label, $fld, ['class' => 'col-md-2 col-form-label']); ?>
                <div class="col-md-10">
                    <?= form_input($fld, $val, $extra); ?>
                    <div class="invalid-feedback">
                        <?= $err ?>
                    </div>
                </div>
            </div>

            <!-- 'stok' -->
            <?php
            $fld = 'stok';
            $label = 'Stok';
            $class = ($validasi->hasError($fld)) ? 'form-control is-invalid' : 'form-control';
            $extra = [
                'id' => $fld,
                'class' => $class,
            ];
            $dtt = ($submit == 'Edit') ? $dataTabel->$fld : '';
            $val = (old($fld) != null) ? old($fld) : $dtt;
            $err = $validasi->getError($fld);
            ?>

            <div class="form-group row">
                <?= form_label($label, $fld, ['class' => 'col-md-2 col-form-label']); ?>
                <div class="col-md-10">
                    <?= form_input($fld, $val, $extra); ?>
                    <div class="invalid-feedback">
                        <?= $err ?>
                    </div>
                </div>
            </div>

            <!-- 'terjual' -->
            <?php
            $fld = 'terjual';
            $label = 'Terjual';
            $class = ($validasi->hasError($fld)) ? 'form-control is-invalid' : 'form-control';
            $extra = [
                'id' => $fld,
                'class' => $class,
            ];
            $dtt = ($submit == 'Edit') ? $dataTabel->$fld : '';
            $val = (old($fld) != null) ? old($fld) : $dtt;
            $err = $validasi->getError($fld);
            ?>

            <div class="form-group row">
                <?= form_label($label, $fld, ['class' => 'col-md-2 col-form-label']); ?>
                <div class="col-md-10">
                    <?= form_input($fld, $val, $extra); ?>
                    <div class="invalid-feedback">
                        <?= $err ?>
                    </div>
                </div>
            </div>

            <!-- 'promoted' -->
            <?php
            $fld = 'promoted';
            $label = 'Promosikan';
            $class = ($validasi->hasError($fld)) ? 'form-control is-invalid' : 'form-control';
            $extra = [
                'id' => $fld,
                'class' => $class,
            ];
            $dtt = ($submit == 'Edit') ? $dataTabel->$fld : '';
            $val = (old($fld) != null) ? old($fld) : $dtt;
            $err = $validasi->getError($fld);
            ?>

            <div class="form-group row">
                <?= form_label($label, $fld, ['class' => 'col-md-2 col-form-label']); ?>
                <div class="col-md-10" style="padding-top: calc(.375rem + 1px);padding-bottom: calc(.375rem + 1px);">
                    <div class="form-check">
                        <?= form_checkbox($fld, '1', $val, 'class="form-check-input" id="' . $fld . '"'); ?>
                        <?= form_label('YA', $fld, ['class' => 'form-check-label']); ?>
                    </div>
                </div>
            </div>

            <!-- 'aktif' -->
            <?php
            $fld = 'aktif';
            $label = 'Aktif';
            $class = ($validasi->hasError($fld)) ? 'form-control is-invalid' : 'form-control';
            $extra = [
                'id' => $fld,
                'class' => $class,
            ];
            $dtt = ($submit == 'Edit') ? $dataTabel->$fld : '1';
            $val = (old($fld) != null) ? old($fld) : $dtt;
            $err = $validasi->getError($fld);
            ?>
            <div class="form-group row">
                <?= form_label($label, $fld, ['class' => 'col-md-2 col-form-label']); ?>
                <div class="col-md-10" style="padding-top: calc(.375rem + 1px);padding-bottom: calc(.375rem + 1px);">
                    <div class="form-check">
                        <?= form_checkbox($fld, '1', $val, 'class="form-check-input" id="' . $fld . '"'); ?>
                        <?= form_label('Aktifkan', $fld, ['class' => 'form-check-label']); ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-6">
        <div class="card-box">
            <div>
                <!-- 'deskripsi' -->
                <?php
                $fld = 'deskripsi';
                $label = 'Deskripsi';
                $class = ($validasi->hasError($fld)) ? 'form-control is-invalid' : 'form-control';
                $extra = [
                    'id' => $fld,
                    'class' => $class,

                ];
                $dtt = ($submit == 'Edit') ? $dataTabel->$fld : '';
                $val = (old($fld) != null) ? old($fld) : $dtt;
                $err = $validasi->getError($fld);
                ?>

                <div class="form-group">
                    <?= form_label($label, $fld); ?>
                    <div>
                        <textarea id="elm1" name="deskripsi"><?= $val; ?></textarea>
                        <div class="invalid-feedback">
                            <?= $err ?>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<hr>
<div class="text-right">
    <a href="<?= $cancel; ?>" class="btn btn-primary">Cancel</a>
    <?= form_submit('submit', $submit, ['class' => 'btn btn-primary']); ?>
</div>
<?= form_close(); ?>

<?= $this->endSection(); ?>

<?= $this->section('skrip'); ?>
<!--Wysiwig js-->
<script src="<?= base_url('template'); ?>/plugins/jquery-te-1.4.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#elm1").jqte({
            link: false,
            unlink: false,
            source: false
        });
    });
</script>


<?= $this->endSection(); ?>