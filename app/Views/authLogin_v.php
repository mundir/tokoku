<?= $this->extend('authLayout_v') ?>

<?= $this->section('content') ?>
<?php if ($pesanError) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $pesanError; ?>
    </div>
<?php endif;  ?>
<?= form_open($urlProses); ?>

<div class="form-group m-b-20 row">
    <div class="col-12">
        <label for="nomor_hp">Nomor HP</label>
        <input name="nomor_hp" value="<?= old('nomor_hp'); ?>" class="form-control" type="text" id="nomor_hp" placeholder="Nomor HP">
    </div>
</div>

<div class="form-group row m-b-20">
    <div class="col-12">
        <a href="<?= $urlLupaPassword; ?>" class="text-muted pull-right"><small>saya lupa Password?</small></a>
        <label for="password">Password</label>
        <input name="password" class="form-control" type="password" id="password" placeholder="Enter your password">
    </div>
</div>

<div class="form-group row m-b-20">
    <div class="col-12">

        <div class="checkbox checkbox-custom">
            <input name="ingatkan" id="remember" type="checkbox" checked="">
            <label for="remember">
                ingatkan di perangkat ini
            </label>
        </div>

    </div>
</div>

<div class="form-group row text-center m-t-10">
    <div class="col-12">
        <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Login</button>
    </div>
</div>

</form>
<div class="row m-t-50">
    <div class="col-sm-12 text-center">
        <p class="text-muted">Belum punya Akun? <a href="page-register.html" class="text-dark m-l-5"><b>Registrasi</b></a></p>
    </div>
</div>
<?= $this->endSection(); ?>