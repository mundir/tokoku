<?= $this->extend('layoutAdmin_v') ?>
<?= $this->section('content') ?>
<?= form_open('admin/pengguna/simpan', ['class' => 'form-horizontal']); ?>
<div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-6">
        <div class="card-box">
            <?= $validasi->listErrors() ?>
            <!-- 'id' -->
            <?php
            $fld = 'id';
            $label = 'ID User';
            $class = ($validasi->hasError($fld)) ? 'form-control is-invalid' : 'form-control';
            $extra = [
                'id' => $fld,
                'class' => $class,
                'readonly' => 'readonly'
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

            <!-- 'nomor_hp' -->
            <?php
            $fld = 'nomor_hp';
            $label = 'Nomor HP';
            $class = ($validasi->hasError($fld)) ? 'form-control is-invalid' : 'form-control';
            $extra = [
                'id' => $fld,
                'class' => $class
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

            <!-- 'nama_pengguna' -->
            <?php
            $fld = 'nama_pengguna';
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

            <!-- 'nama_pendek' -->
            <?php
            $fld = 'nama_pendek';
            $label = 'Alias';
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
            <!-- 'password' -->
            <?php
            $fld = 'password';
            $label = 'Password';
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
            <!-- 'email' -->
            <?php
            $fld = 'email';
            $label = 'Email';
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

            <!-- 'alamat' -->
            <?php
            $fld = 'alamat';
            $label = 'Alamat';
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



            <!-- 'kodepos' -->
            <?php
            $fld = 'kodepos';
            $label = 'Kodepos';
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

            <!-- 'user_group' -->
            <?php
            $fld = 'user_group';
            $label = 'User Group';
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
                    <?php
                    echo form_dropdown($fld, $ugoptions, $val, $extra);
                    ?>
                    <div class="invalid-feedback">
                        <?= $err ?>
                    </div>
                </div>
            </div>

            <!-- 'aktif' -->
            <?php
            $fld = 'aktif';
            $label = 'Status';
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
                        <?= form_label('Aktif', $fld, ['class' => 'form-check-label']); ?>
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