<?= $this->extend('layoutAdmin_v') ?>

<?= $this->section('content') ?>

<div class="card-box">
    <div class="text-right mb-2">
        <a href="<?= base_url('admin/pengguna/tambah'); ?>" class="btn btn-success">Tambah</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Nomor HP</th>
                    <th>Nama</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php $hitung = 1 ?>
                <?php foreach ($tbMain as $row) : ?>
                    <tr>
                        <td><?= $hitung; ?></td>
                        <td><?= $row->id; ?></td>
                        <td><?= $row->nomor_hp; ?></td>
                        <td><?= $row->nama_pengguna; ?></td>
                        <td><a href="<?= base_url('admin/pengguna/edit/' . $row->id); ?>" class="btn btn-success btn-sm"><i class="icon-note"></i></a></td>
                    </tr>
                    <?php $hitung++; ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php echo $this->endSection() ?>