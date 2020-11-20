<?= $this->extend('layout_v') ?>

<?= $this->section('content') ?>
<div class="card-box">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Nomor HP</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php $hitung = 1 ?>
                <?php foreach ($tbMain as $row) : ?>
                    <tr>
                        <td><?= $hitung; ?></td>
                        <td><?= $row->id; ?></td>
                        <td><?= $row->nama_pengguna; ?></td>
                        <td><?= $row->nomor_hp; ?></td>
                        <td>detail</td>
                    </tr>
                    <?php $hitung++; ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php echo $this->endSection() ?>