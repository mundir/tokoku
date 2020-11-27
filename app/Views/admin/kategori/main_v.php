<?= $this->extend('layoutAdmin_v') ?>
<?= $this->section('content') ?>
<div class="card-box">
    <div class="text-right mb-2">
        <a href="<?= base_url('admin/kategori/tambah'); ?>" class="btn btn-success btn-sm"><i class="icon-plus"></i> Tambah</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode</th>
                    <th>Nama Kategori</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php $hitung = 1 ?>
                <?php foreach ($dataTabel as $row) : ?>
                    <tr>
                        <td><?= $hitung; ?></td>
                        <td><?= $row->id; ?></td>
                        <td><?= $row->nama_kategori; ?></td>
                        <td><a href="<?= base_url('admin/kategori/edit/' . $row->id); ?>" class="btn btn-success btn-sm"><i class="icon-note"></i></a></td>
                    </tr>
                    <?php $hitung++; ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>