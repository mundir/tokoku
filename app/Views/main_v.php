<?= $this->extend('layout_v') ?>
<?= $this->section('content') ?>

<style>
    .col-brg {
        /* border: 1px solid red; */
        padding: .1875rem;
        max-width: 200px;
    }

    .isi2 {
        background-color: beige;
        height: 230px;
        width: 100%
    }

    .nama-barang {
        white-space: normal;
        word-break: break-all;
        margin-bottom: .3125rem;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .harga {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        color: #ee4d2d;
        -webkit-flex-shrink: 0;
        -ms-flex-negative: 0;
        flex-shrink: 0;
        margin-right: auto;
        font-size: 1rem;
    }

    .terjual {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        color: rgba(0, 0, 0, .87);
        padding-left: .1875rem;
        font-family: -apple-system, Helvetica Neue, Helvetica, Roboto, Droid Sans, Arial, sans-serif;
        font-weight: 400;
        font-size: .625rem;
    }
</style>

<div class="row row-cols-2 row-cols-sm-4">
    <div class="col col-brg">
        <div class="card isi">
            <img src=" <?= base_url('img'); ?>/beras.jpg" class="card-img-top" alt="...">
            <div class="card-body p-2">
                <div class="card-title">
                    <h5 class="nama-barang">Beras Merk Rose Brand 10KG Bisa COD gratis Ongkir selamanya</h5>
                </div>
                <div class="d-flex flex-row">
                    <div class="harga">Rp. 25.000</div>
                    <div class="terjual">10rb+ terjual</div>
                </div>
                <hr class="my-1">
                <div class="d-flex flex-row">
                    <button type="button" class="flex-fill mr-2 btn btn-sm btn-success">Detail</button>
                    <button type="button" class="flex-fill btn btn-sm btn-danger">Beli</button>

                </div>

            </div>
        </div>
    </div>
    <div class="col col-brg">
        <div class="card isi">
            <img src=" <?= base_url('img'); ?>/beras.jpg" class="card-img-top" alt="...">
            <div class="card-body p-2">
                <div class="card-title">
                    <h5 class="nama-barang">Beras Merk Rose Brand 10KG Bisa COD gratis Ongkir selamanya</h5>
                </div>
                <div class="d-flex flex-row">
                    <div class="harga">Rp. 25.000</div>
                    <div class="terjual">10rb+ terjual</div>
                </div>
                <hr class="my-1">
                <div class="d-flex flex-row">
                    <button type="button" class="flex-fill mr-2 btn btn-sm btn-success">Detail</button>
                    <button type="button" class="flex-fill btn btn-sm btn-danger">Beli</button>

                </div>

            </div>
        </div>
    </div>

    <div class="col col-brg">
        <div class="card isi">
            <img src=" <?= base_url('img'); ?>/beras.jpg" class="card-img-top" alt="...">
            <div class="card-body p-2">
                <div class="card-title">
                    <h5 class="nama-barang">Beras Merk Rose Brand 10KG Bisa COD gratis Ongkir selamanya</h5>
                </div>
                <div class="d-flex flex-row">
                    <div class="harga">Rp. 25.000</div>
                    <div class="terjual">10rb+ terjual</div>
                </div>
                <hr class="my-1">
                <div class="d-flex flex-row">
                    <button type="button" class="flex-fill mr-2 btn btn-sm btn-success">Detail</button>
                    <button type="button" class="flex-fill btn btn-sm btn-danger">Beli</button>

                </div>

            </div>
        </div>
    </div>


    <div class="col col-brg">
        <div class="card isi">
            <img src=" <?= base_url('img'); ?>/beras.jpg" class="card-img-top" alt="...">
            <div class="card-body p-2">
                <div class="card-title">
                    <h5 class="nama-barang">Beras Merk Rose Brand 10KG Bisa COD gratis Ongkir selamanya</h5>
                </div>
                <div class="d-flex flex-row">
                    <div class="harga">Rp. 25.000</div>
                    <div class="terjual">10rb+ terjual</div>
                </div>
                <hr class="my-1">
                <div class="d-flex flex-row">
                    <button type="button" class="flex-fill mr-2 btn btn-sm btn-success">Detail</button>
                    <button type="button" class="flex-fill btn btn-sm btn-danger">Beli</button>

                </div>

            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection() ?>