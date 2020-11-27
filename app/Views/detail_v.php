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

    .img-group {
        height: 275px;
    }

    .list-img {
        display: inline-block;
        overflow-x: auto;

    }

    .img-detail {
        margin: 3px;
        width: 75px;
    }

    @media (min-width: 576px) {
        .img-group {
            height: auto;
        }
    }
</style>
<div class="d-flex p-0 fixed-bottom justify-content-end bg-light d-sm-none" style="height: 50px;">
    <button type="button" class="btn btn-light rounded-0">
        <i class="fi-arrow-left d-block"></i>
        <span class="d-block">
            <small>Back</small>
        </span>
    </button>
    <button type="button" class="btn btn-success rounded-0">
        <i class="fi-speech-bubble d-block"></i>
        <small>Tanya</small>
    </button>
    <button type="button" class="btn btn-warning rounded-0 flex-fill">
        <i class="fi-bag d-block"></i>
        <span class="d-block">
            <small>Keranjang</small>
        </span>
    </button>
    <button type="button" class="btn btn-danger rounded-0 flex-fill"><strong>BELI SEKARANG</strong></button>
</div>
<!-- <div class="container-fluid"> -->

<div class="row bg-white">
    <div class="col-sm-6">
        <div class="card mt-2">
            <div class="img-group">
                <img class="card-img-top" id="img-img" src="#" alt="Card image cap">
            </div>
            <div class="d-flex list-img">
                <img src="#" alt="..." class="img-thumbnail img-detail">
                <img src="#" alt="..." class="img-thumbnail img-detail">
                <img src="#" alt="..." class="img-thumbnail img-detail">

            </div>

        </div>

    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h4 class="nama-barang">Beras Merk Rose Brand 10KG Bisa COD gratis Ongkir selamanya</h4>
                <div class="harga p-2">
                    <h3 class="text-danger">Rp. 56.750</h3>
                </div>
                <div class="d-flex">
                    <div id="score" class="mr-5"></div>
                    <p class="card-text">
                        <small class="text-muted">10 terjual | 2879 Tersedia</small>
                    </p>
                </div>

                <div class=" d-none d-sm-block mt-3">
                    <div class="p-0 d-sm-flex justify-content-end">
                        <button type="button" class="btn btn-warning rounded-0 mr-1">
                            <i class="fi-bag d-block"></i>
                            <span class="d-block">
                                <small>Keranjang</small>
                            </span>
                        </button>
                        <button type="button" class="btn btn-danger rounded-0">Beli Sekarang</button>
                    </div>
                    <hr>
                    <div class="text-right p-0">
                        <button type="button" class="btn btn-light rounded-0"> <i class="fi-arrow-left"></i></button>
                        <button type="button" class="btn btn-success rounded-0"><i class="fi-speech-bubble mr-2"></i> Tanyakan </button>
                    </div>
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
            <h5 class="card-title">Keterangan</h5>
            <p class="card-text">MAU TAMPIL KECE DENGAN HARGA OKE. MAU TAMPIL KEKINIAN TAPI TAKUT MAHAL. DON'T WORRY GUYS. DI KAMI KALIAN BISA TAMPIL KEREN GK PAKE MAHAL.

                KARNA HARGA YANG KAMI JUAL HARGA RAKYAT KUALITAS KONGLOMERAT👌


                “CATATAN : Tali Hoodie Sewaktu Waktu Bisa Berubah, Gmn Ketersediaan Stock dr Konveksi ☺️
                BISA MENERIMA SERAGAMAN..


                “KETERANGAN: Sweater Hoodie Dengan Bahan Fleece Tebal, Bahan Tidak Kasar, Lembur Di Pakai, Warna Aman Tidak Akan Luntur Saat Di Cuci, Tidak Mudah Berbulu, Cocok Buat Di Pakai Sehari Hari 😊


                KETERANGAN SIZE : LEBAR DADA di x2

                • M -> Lebar Dada 52cm x Panjang 65cm

                • L -> Lebar Dada 55cm x Panjang 68cm

                • XL -> Lebar Dada 58cm x Panjang 71cm


                Real Pic 100% Barang Sesuai Gambar


                ••••HIGH QUALITY DISTRO×BARANG PREMIUM••••



                ***Ready Stok Langsung Order***</p>
        </div>
    </div>
</div>

<!-- </div> -->



<?= $this->endSection(); ?>

<?= $this->section('skrip'); ?>
<!-- Rating js -->
<script src="<?= base_url('template'); ?>/plugins/raty-fa/jquery.raty-fa.js"></script>
<script>
    $(document).ready(function() {
        $('#score').raty({
            score: 4,
            readOnly: true,
            starOff: 'fa fa-star-o text-muted',
            starOn: 'fa fa-star text-danger'
        });
        $(".img-detail").click(function() {
            var src = $(this).attr('src');
            $('#img-img').attr('src', src);
        });
    });
</script>
<?= $this->endSection(); ?>