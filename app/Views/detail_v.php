<?= $this->extend('layout_v') ?>
<?= $this->section('content') ?>
<style>
    .col {
        padding: 0;
    }

    .nama-barang {
        white-space: normal;
        word-break: break-all;
        margin-bottom: .3125rem;
        /* display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        overflow: hidden;
        text-overflow: ellipsis; */
    }

    .list-img {
        padding: 0;
        overflow-x: scroll;
    }

    .img-detail {
        width: 75px;
    }
</style>
<div class="d-flex p-0 fixed-bottom justify-content-end bg-light d-sm-none" style="height: 50px;">
    <button type="button" class="btn btn-success rounded-0 mr-auto"><i class="fi-bag mr-2"></i>Keranjang</button>
    <button type="button" class="btn btn-danger rounded-0 w-50">Beli Sekarang</button>
</div>
<!-- <div class="container-fluid"> -->
<nav class="navbar sticky-top navbar-light bg-light">
    <a class="navbar-brand" href="#">Sticky top</a>
</nav>
<div class="row bg-white">
    <div class="col-sm-6">
        <div class="card">

            <img class="card-img-top" src="<?= base_url('img/printer-laser.jpg'); ?>" alt="Card image cap">
            <div class="d-flex list-img">
                <img src="<?= base_url('img/printer-laser.jpg'); ?>" alt="..." class="img-thumbnail img-detail">
                <img src="<?= base_url('img/printer-laser.jpg'); ?>" alt="..." class="img-thumbnail img-detail">
                <img src="<?= base_url('img/printer-laser.jpg'); ?>" alt="..." class="img-thumbnail img-detail">
                <img src="<?= base_url('img/printer-laser.jpg'); ?>" alt="..." class="img-thumbnail img-detail">
                <img src="<?= base_url('img/printer-laser.jpg'); ?>" alt="..." class="img-thumbnail img-detail">

            </div>
        </div>

    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h4 class="nama-barang">Beras Merk Rose Brand 10KG Bisa COD gratis Ongkir selamanya</h4>
                <div class="harga p-2">
                    <h3 class="text-danger">Rp. 56.750</h3>
                    <p class="card-text">
                        <small class="text-muted">10 terjual | 2879 Tersedia</small>
                    </p>
                </div>
                <div class="p-0 d-none d-sm-flex justify-content-end" style="height: 50px;">
                    <button type="button" class="h-100 btn btn-warning rounded-0 mr-1">Keranjang</button>
                    <button type="button" class="h-100 btn btn-danger rounded-0">Beli Sekarang</button>
                </div>
                <hr>
                <div class="text-right p-0">
                    <button type="button" class="btn btn-success rounded-0"> Tanyakan </button>

                </div>
            </div>
        </div>

    </div>
</div>
<div class="row mt-3">
    <div class="col">
        <div class="card card-body text-xs-right">
            <h5 class="card-title">Spesifikasi Produk</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional
                content.</p>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col">
        <div class="card m-b-30 card-body text-xs-right">
            <h5 class="card-title">Deskripsi</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional
                content.</p>
        </div>
    </div>
</div>

<!-- </div> -->



<?= $this->endSection(); ?>