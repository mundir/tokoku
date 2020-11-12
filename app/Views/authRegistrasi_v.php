<?= $this->extend('authLayout_v') ?>

<?= $this->section('content') ?>
<?php if ($pesanError) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $pesanError; ?>
    </div>
<?php endif;  ?>
<?= form_open('akun/registrasi_proses'); ?>
<?php
$fld = 'nama_pengguna';
$class = ($validasi->hasError($fld)) ? 'form-control is-invalid' : 'form-control';
$extra = [
    'id' => $fld,
    'class' => $class,
];
$val = (old($fld) != null) ? old($fld) : '';
$err = $validasi->getError($fld);
?>
<div class="form-group row m-b-20">
    <div class="col-12">
        <?= form_label('Nama', $fld); ?>
        <?= form_input($fld, $val, $extra); ?>
        <div class="invalid-feedback">
            <?= $err ?>
        </div>
    </div>
</div>



<!-- nomor_hp -->
<?php
$fld = 'nomor_hp';
$label = 'Nomor HP';
$class = ($validasi->hasError($fld)) ? 'form-control is-invalid' : 'form-control';
$extra = [
    'id' => $fld,
    'class' => $class,
];
$val = (old($fld) != null) ? old($fld) : '';
$err = $validasi->getError($fld);
?>
<div class="form-group row m-b-20">
    <div class="col-12">
        <?= form_label($label, $fld); ?>
        <?= form_input($fld, $val, $extra); ?>
        <div class="invalid-feedback">
            <?= $err ?>
        </div>
    </div>
</div>

<!-- username -->
<?php
$fld = 'username';
$label = 'Username';
$class = ($validasi->hasError($fld)) ? 'form-control is-invalid' : 'form-control';
$extra = [
    'id' => $fld,
    'class' => $class,
];
$val = (old($fld) != null) ? old($fld) : '';
$err = $validasi->getError($fld);
?>
<div class="form-group row m-b-20">
    <div class="col-12">
        <?= form_label($label, $fld); ?>
        <?= form_input($fld, $val, $extra); ?>
        <div class="invalid-feedback">
            <?= $err ?>
        </div>
    </div>
</div>

<!-- password -->
<?php
$fld = 'password';
$label = 'Pasword';
$class = ($validasi->hasError($fld)) ? 'form-control is-invalid' : 'form-control';
$extra = [
    'id' => $fld,
    'class' => $class,
];
$val = (old($fld) != null) ? old($fld) : '';
$err = $validasi->getError($fld);
?>
<div class="form-group row m-b-20">
    <div class="col-12">
        <?= form_label($label, $fld); ?>
        <?= form_password($fld, $val, $extra); ?>
        <div class="invalid-feedback">
            <?= $err ?>
        </div>
    </div>
</div>

<!-- password -->
<?php
$fld = 'repassword';
$label = 'Ulangi Password';
$class = ($validasi->hasError($fld)) ? 'form-control is-invalid' : 'form-control';
$extra = [
    'id' => $fld,
    'class' => $class,
];
$val = (old($fld) != null) ? old($fld) : '';
$err = $validasi->getError($fld);
?>
<div class="form-group row m-b-20">
    <div class="col-12">
        <?= form_label($label, $fld); ?>
        <?= form_password($fld, $val, $extra); ?>
        <div class="invalid-feedback">
            <?= $err ?>
        </div>
    </div>
</div>

<!-- email -->
<?php
$fld = 'email';
$label = 'Email';
$class = ($validasi->hasError($fld)) ? 'form-control is-invalid' : 'form-control';
$extra = [
    'id' => $fld,
    'class' => $class,
];
$val = (old($fld) != null) ? old($fld) : '';
$err = $validasi->getError($fld);
?>
<div class="form-group row m-b-20">
    <div class="col-12">
        <?= form_label($label, $fld); ?>
        <?= form_input($fld, $val, $extra); ?>
        <div class="invalid-feedback">
            <?= $err ?>
        </div>
    </div>
</div>

<!-- alamat -->
<?= form_hidden('alamat', '-'); ?>
<!-- kab_kota -->
<?= form_hidden('kab_kota', 'Kab. Malang'); ?>
<!-- kodepos -->
<?= form_hidden('kodepos', '65171'); ?>
<!-- user_group -->
<?= form_hidden('user_group', '3'); ?>
<!-- avatar -->
<?= form_hidden('avatar', 'default.jpg'); ?>


<div class="form-group row text-center m-t-10">
    <div class="col-12">
        <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Registrasi</button>
    </div>
</div>

</form>
<div class="row m-t-50">
    <div class="col-sm-12 text-center">
        <p class="text-muted">Saya sudah punya akun! <a href="<?= base_url('akun'); ?>" class="text-dark m-l-5"><b>Login</b></a></p>
    </div>
</div>
<?= $this->endSection(); ?>