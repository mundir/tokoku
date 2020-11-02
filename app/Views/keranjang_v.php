<?= $this->extend('layout_v') ?>
<?= $this->section('content') ?>
<!-- <div class="checkbox checkbox-custom">
    <input id="checkbox2" type="checkbox">
    <label for="checkbox2">
        Check me out !
    </label>
</div> -->
<style>
    .cart-item-overview__thumbnail {
        background-position: 50%;
        background-size: contain;
        background-repeat: no-repeat;
        width: 5rem;
        height: 5rem;
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

    .qty-input {
        width: 50px;
    }

    .custom-checkbox {
        padding-top: 7px;
        padding-left: 42px;
    }

    .total-harga {
        display: inline-block;
        padding: 0;
        margin: 0;
    }

    .srupiah {
        margin: 0;
        padding: 0;
        display: block;
        font-size: 8pt;
    }

    .rupiah {
        padding: 0;
        margin: 0;
        font-size: 16pt;
        line-height: 10px;
        font-weight: 500;

    }

    .checkout {
        height: 67px;
    }
</style>
<div class="fixed-bottom p-3 checkout d-flex justify-content-between bg-white border-top">
    <div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck1">
            <label class="custom-control-label" for="customCheck1"><small>Semua</small></label>
        </div>
    </div>

    <div class="div-harga d-flex">
        <div class="total-harga mr-1">
            <div class="srupiah mb-1">Sub Total:</div>
            <div class="text-danger rupiah">Rp 356.000</div>
        </div>
        <div>
            <button type="submit" class="btn btn-danger">Check Out</button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Keranjang Belanja</h4>
            <p class="text-muted font-14 m-b-20">
                Berikut barang-barang yang ada dalam keranjang belanja. Anda bisa bayar beberapa atau semuanya. silahkan klik Checkout untuk buat pesanan
            </p>

            <table class="table">

                <tbody>
                    <tr>
                        <td>
                            <div class="checkbox checkbox-custom">
                                <input id="checkbox3" type="checkbox">
                                <label for="checkbox3">1</label>

                            </div>
                        </td>
                        <td>
                            <div class="nama-barang">Sepeda Motor Prima tahun 1975 Mesib Bagus original 100% tangan pertama</div>
                            <div class="d-flex">
                                <div class="cart-item-overview__thumbnail" alt="cart_thumbnail" style="background-image: url(&quot;<?= base_url('img/oppo4.jpg'); ?>&quot;);"></div>
                                <div>
                                    <h5 class="text-danger mb-1"> Rp. 45.750</h5>
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-sm btn-light"><i class="fi-circle-minus"></i></button>
                                        <input class="form-control qty-input" type="number" value="1">
                                        <button type="button" class="btn btn-sm btn-light"><i class="fi-circle-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="text-right">
                                <h3 class="text-danger"> Rp. 45.750</h3>
                            </div> -->
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <div class="checkbox checkbox-custom">
                                <input id="checkbox4" type="checkbox">
                                <label for="checkbox4">2</label>

                            </div>
                        </td>
                        <td>
                            <div class="nama-barang">Sepeda Motor Prima tahun 1975 Mesib Bagus original 100% tangan pertama</div>
                            <div class="d-flex">
                                <div class="cart-item-overview__thumbnail" alt="cart_thumbnail" style="background-image: url(&quot;<?= base_url('img/oppo4.jpg'); ?>&quot;);"></div>
                                <div>
                                    <h5 class="text-danger mb-1"> Rp. 45.750</h5>
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-sm btn-light"><i class="fi-circle-minus"></i></button>
                                        <input class="form-control qty-input" type="number" value="1">
                                        <button type="button" class="btn btn-sm btn-light"><i class="fi-circle-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="text-right">
                                <h3 class="text-danger"> Rp. 45.750</h3>
                            </div> -->
                        </td>

                    </tr>

                </tbody>
            </table>
        </div>

    </div>


</div>
<?= $this->endSection(); ?>