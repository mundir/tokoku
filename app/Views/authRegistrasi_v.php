<?= $this->extend('authLayout_v') ?>

<?= $this->section('content') ?>
<?php if ($pesanError) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $pesanError; ?>
    </div>
<?php endif;  ?>
<?= form_open('auth/regis_proses'); ?>
<!-- nomor_hp -->
<?php
$fld = 'nomor_hp';
$label = 'Nomor WA <small>pastikan nomor WA aktif</small>';
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

<!-- nama -->
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


<div class="px-5 mb-3">
    <button class="btn btn-block btn-success waves-effect waves-light" type="submit">Registrasi</button>
</div>

<?= form_close(); ?>

<div class="text-center">
    <p class="text-muted">Saya sudah punya Akun! <a href="<?= base_url('auth/login'); ?>" class="text-danger m-l-5"><b>Login</b></a></p>
    <a class="text-success" href="https://wa.me/6281249565788?text=Amanahjaya%0ASaya%20ingin%20dibantu%20untuk%20registrasi%20nomor%20WA%20ini">-- Bantuan Whatsapp --</a>
</div>
<?= $this->endSection(); ?>