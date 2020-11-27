<?= $this->extend('layoutAdmin_v') ?>

<?= $this->section('content') ?>
<style>
    .tbl-tgl {
        font-size: 8pt;
        margin: 0;
        padding: 0;
    }

    .tbl-idtr {
        font-weight: bold;
        margin: 0;
        padding: 0;
    }
</style>
<div class="card">

    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><?= $judulCard; ?></h4>
                <p class="text-muted font-14 m-b-20">
                    <?= $keterangan; ?>
                </p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Transaksi</th>
                                <th><?= $proses; ?></th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $hitung = 1 ?>
                            <?php foreach ($dtTabel as $row) : ?>
                                <tr>
                                    <th scope="row"><?= $hitung; ?></th>
                                    <td><?= $row->id; ?></td>
                                    <?php if ($row->status_proses == 0) : ?>
                                        <td class="text-danger">...</td>
                                    <?php else : ?>
                                        <td class="text-success">OK</td>
                                    <?php endif ?>
                                    <td><button class="btn btn-small btn-danger">Cek</button></td>
                                </tr>
                            <?php endforeach ?>



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>