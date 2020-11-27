<?= $this->extend('layout_v') ?>
<?= $this->section('content') ?>
<?= form_open('profilku/simpan', ['class' => 'form-horizontal']); ?>
<div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-6">
        <div class="card-box">
            <?= $validasi->listErrors() ?>
            <!-- 'nama_pengguna' -->
            <?php
            $fld = 'nama_pengguna';
            $label = 'Nama';
            $class = ($validasi->hasError($fld)) ? 'form-control is-invalid' : 'form-control';
            $extra = [
                'id' => $fld,
                'class' => $class,
            ];
            $dtt = $dataTabel->$fld;
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

            <!-- 'nama_pendek' -->
            <?php
            $fld = 'nama_pendek';
            $label = 'Alias';
            $class = ($validasi->hasError($fld)) ? 'form-control is-invalid' : 'form-control';
            $extra = [
                'id' => $fld,
                'class' => $class,
            ];
            $dtt = $dataTabel->$fld;
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

            <!-- 'password' -->
            <?php
            $fld = 'password';
            $label = 'Password';
            $class = ($validasi->hasError($fld)) ? 'form-control is-invalid' : 'form-control';
            $extra = [
                'id' => $fld,
                'class' => $class,
            ];
            $dtt = $dataTabel->$fld;
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

            <!-- 'alamat' -->
            <?php
            $fld = 'alamat';
            $label = 'Alamat';
            $class = ($validasi->hasError($fld)) ? 'form-control is-invalid' : 'form-control';
            $extra = [
                'id' => $fld,
                'class' => $class,
            ];
            $dtt = $dataTabel->$fld;
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

            <hr>
            <div class="text-right">
                <a href="<?= $cancel; ?>" class="btn btn-primary">Cancel</a>
                <?= form_submit('submit', $submit, ['class' => 'btn btn-primary']); ?>
            </div>
        </div>
    </div>


</div>

<?= form_close(); ?>
<?= $this->endSection() ?>