<?= $this->extend('layout_v') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-sm-3">
        <div class="card m-b-30">
            <img class="card-img-top img-fluid" src="<?= base_url('profil/detail/' . $dataTabel->avatar); ?>" alt="Card image cap">
            <div class="card-body text-center">
                <h5 class="card-title mb-1"><?= $dataTabel->nama_pengguna; ?></h5>
                <p class="card-text">ID <?= $dataTabel->id; ?></p>
                <a href="<?= base_url('profilku/ganti_foto'); ?>" class="btn btn-success waves-effect waves-light">Ganti Foto</a>
            </div>
        </div>

    </div>

    <div class="col-sm-9">
        <div class="card-box m-b-30 py-5">
            <table class="table">
                <tbody>
                    <!-- 'id', 'nama_pengguna', 'nama_pendek', 'password', 'nomor_hp', 'email', 'alamat', 'kabkota', 'kodepos', 'user_group', 'avatar', 'aktif' -->
                    <tr>
                        <th scope="row">Nama</th>
                        <td><?= $dataTabel->nama_pengguna; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Alias</th>
                        <td><?= $dataTabel->nama_pendek; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Nomor HP</th>
                        <td><?= $dataTabel->nomor_hp; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Email</th>
                        <td><?= $dataTabel->email; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Alamat</th>
                        <td><?= $dataTabel->alamat; ?></td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <div class="text-right">
                <a href="<?= base_url('profilku/edit'); ?>" class="btn btn-success waves-effect waves-light">Edit Data</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>