<?= $this->extend('layout_v') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-4">
        <div class="card m-b-30">
            <img class="card-img-top img-fluid" src="<?= base_url('img/profil/kotak/' . $dataTabel->avatar); ?>" alt="Card image cap">
            <div class="card-body text-right">
                <a href="<?= base_url('admin/akun/ganti_foto'); ?>" class="btn btn-custom waves-effect waves-light">Ganti Foto</a>
            </div>
        </div>
    </div>
    <div class="col-md-8 mb-0">
        <div class="card-box">
            <dl class="row">
                <!-- 'username',  -->
                <dt class="col-sm-3">Username</dt>
                <dd class="col-sm-9"><?= $dataTabel->username; ?></dd>
                <!-- 'password',  -->
                <dt class="col-sm-3">Password</dt>
                <dd class="col-sm-9"><?= $dataTabel->password; ?></dd>
                <!-- 'nomor_hp',  -->
                <dt class="col-sm-3">Nomor HP</dt>
                <dd class="col-sm-9"><?= $dataTabel->nomor_hp; ?></dd>
                <!-- 'email',  -->
                <dt class="col-sm-3">email</dt>
                <dd class="col-sm-9"><?= $dataTabel->email; ?></dd>
                <!-- 'nama_pengguna',  -->
                <dt class="col-sm-3">Nama</dt>
                <dd class="col-sm-9"><?= $dataTabel->nama_pengguna; ?></dd>
                <!-- 'alamat',  -->
                <dt class="col-sm-3">Alamat</dt>
                <dd class="col-sm-9"><?= $dataTabel->alamat; ?></dd>
                <!-- 'kab_kota',  -->
                <dt class="col-sm-3">Kab/Kota</dt>
                <dd class="col-sm-9"><?= $dataTabel->kab_kota; ?></dd>
                <!-- 'kodepos',  -->
                <dt class="col-sm-3">Kodepos</dt>
                <dd class="col-sm-9"><?= $dataTabel->kodepos; ?></dd>
                <!-- 'user_group',  -->
                <dt class="col-sm-3">User Group</dt>
                <dd class="col-sm-9"><?= $dataTabel->user_group; ?></dd>
            </dl>
            <hr>
            <div class="text-right">
                <a href="<?= base_url('admin/akun/edit'); ?>" class="btn btn-custom waves-effect waves-light">Edit Data</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>