<?= $this->extend('layout_v') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card-deck-wrapper">
            <div class="card-deck">
                <?php foreach ($dtTabel as $dt) : ?>
                    <div class="card m-b-30" style="max-width: 400px;">
                        <div class="card-body">
                            <div class="card-title">
                                <h5><?= $dt['transaksi']->id; ?></h5>
                                <p><small><?= $dt['transaksi']->created_at; ?></small></p>
                            </div>

                            <div style="max-height: 300px;overflow:auto">
                                <ul class="list-group list-group-flush">
                                    <?php foreach ($dt['detail'] as $detail) : ?>

                                        <li class="list-group-item">
                                            <p class="mb-0"><?= $detail->nama_barang; ?></p>
                                            <div class="text-right text-danger"><small><?= $detail->hrg . ' x ' . $detail->qty; ?></small></div>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>

                            <div class="text-center mt-5">
                                <h5 class="font-normal text-muted">Tagihan anda</h5>
                                <h3>Rp <?= number_format($dt['transaksi']->total_harga, 0, ",", "."); ?></h3>
                                <?php if ($showExp) : ?>
                                    <h6 class="mb-0">Batas Pengambilan </h6>
                                    <?php $exp = $dt['transaksi']->expired_at ?>
                                    <h6 class="m-b-30 mt-0"> <?= date('d/m/Y h:i:s', strtotime($exp)); ?></h6>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>