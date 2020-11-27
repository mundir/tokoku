<?= $this->extend('authLayout_v') ?>

<?= $this->section('content') ?>
<?php if ($pesanSukses) : ?>
    <div class="alert alert-success" role="alert">
        <?= $pesanSukses; ?>
    </div>
<?php endif;  ?>
<?php if ($pesanError) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $pesanError; ?>
    </div>
<?php endif;  ?>
<?= form_open('auth/login_proses'); ?>

<div class="form-group m-b-20 row">
    <div class="col-12">
        <label for="nomor_hp">Nomor HP</label>
        <input name="nomor_hp" value="<?= old('nomor_hp'); ?>" class="form-control" type="text" id="nomor_hp" placeholder="Nomor HP" required>
    </div>
</div>

<div class="form-group row m-b-20">
    <div class="col-12">
        <a href="https://wa.me/6281249565788?text=Amanahjaya%0ASaya%20lupa%20password" class="text-muted pull-right"><small>saya lupa Password?</small></a>
        <label for="password">Password</label>
        <input name="password" class="form-control" type="password" id="password" required>

    </div>
</div>

<!-- <div class="form-group row m-b-20">
    <div class="col-12">

        <div class="checkbox checkbox-custom">
            <input name="ingatkan" id="remember" type="checkbox" checked="">
            <label for="remember">
                ingatkan di perangkat ini
            </label>
        </div>

    </div>
</div> -->

<div class="p-5">
    <button class="btn btn-block btn-success waves-effect waves-light" type="submit">Login</button>
</div>

</form>
<div class="mt-3 mb-3 text-center">
    <p class="text-muted">Belum punya Akun? <a href="<?= base_url('auth/regis'); ?>" class="text-danger m-l-5"><b>Registrasi</b></a></p>
    <a class="text-success" href="https://wa.me/6285700500836?text=Amanahjaya%0ASaya%20ingin%20dibantu%20untuk%20registrasi%20nomor%20WA%20ini">-- Bantuan Whatsapp --</a>
</div>
<?= $this->endSection(); ?>