<?php foreach ($brgid as $brg) : ?>
    <div class="col col-brg">
        <div class="card isi">
            <div class="gambar">
                <img src="<?= base_url('img/preview') . '/' . $brg->gambar ?>" class="img-fluid" alt="..." />
            </div>
            <div class="card-body p-2">
                <div class="card-nmbarang">
                    <a href="#" onclick="ambildata('<?= $brg->id; ?>')">
                        <h5 class="nama-barang m-0 p-0"><?= $brg->nama_barang; ?></h5>
                    </a>
                </div>
                <div class="d-flex flex-row">
                    <div class="harga">Rp <?= number_format($brg->harga, 0, ",", "."); ?></div>
                    <div class="terjual text-right">
                        <div><?= $brg->terjual; ?> terjual</div>
                        <div><?= $brg->stok; ?> tersedia</div>
                    </div>
                </div>
                <div class="mt-2">
                    <!-- <button type="button" class="btn btn-primary waves-effect waves-light mr-1" onclick="ambildata('<?= $brg->id; ?>')">Detail</button> -->
                    <?php if ($userGroup != '0') : ?>
                        <button onclick="beli('<?= $brg->id; ?>')" type="button" class="btn btn-block btn-danger waves-effect waves-light">Beli</button>
                    <?php else : ?>
                        <button onclick="silahkan_login()" type="button" class="btn btn-block btn-success waves-effect waves-light">Beli</button>
                    <?php endif ?>
                </div>
            </div>



        </div>
    </div>
<?php endforeach; ?>