<?= $this->extend('layout_v') ?>


<?= $this->section('content') ?>
<div class="card-box px-0">
    <h4 class="m-t-0 ml-3 header-title">Data Barang</h4>

    <div class="table-responsive">
        <table class="table table-centered m-0">


            <tbody>
                <tr>
                    <td>
                        <img src="<?= base_url('img/telkomsel.jpg') ?>" alt="contact-img" title="contact-img" class="thumb-md">
                    </td>

                    <td>
                        <h5 class="m-0 font-weight-normal">Voucher Telkomsel 3.5 GB 30 Hari Exp 2021</h5>
                        <p class="mb-0 text-danger"><small>Rp 10.000 x 12</small></p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <img src="<?= base_url('img/telkomsel.jpg') ?>" alt="contact-img" title="contact-img" class="thumb-md">
                    </td>

                    <td>
                        <h5 class="m-0 font-weight-normal">Voucher Telkomsel 3.5 GB</h5>
                        <p class="mb-0 text-danger"><small>Rp 10.000 x 12</small></p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <img src="<?= base_url('img/telkomsel.jpg') ?>" alt="contact-img" title="contact-img" class="thumb-md">
                    </td>

                    <td style="position: relative;">
                        <h5 class="m-0 font-weight-normal nama-barang">Voucher Telkomsel 3.5 GB 30 Hari Exp 2021 Voucher Telkomsel 3.5 GB 30 Hari Exp 2021</h5>
                        <p class="mb-0 text-danger text-right"><small>Rp 10.000 x 12 =</small><span>Rp 120.000</span>
                        </p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <img src="<?= base_url('img/telkomsel.jpg') ?>" alt="contact-img" title="contact-img" class="thumb-md">
                    </td>

                    <td>
                        <h5 class="m-0 font-weight-normal">Voucher Telkomsel 3.5 GB 30 Hari Exp 2021</h5>
                        <p class="mb-0 text-danger"><small>Rp 10.000 x 12</small></p>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>


</div>
<div class="card-box">
    <h4 class="m-t-0 header-title">Cara Pengiriman</h4>
    <div class="mt-3 ml-3">
        <div class="custom-control custom-radio">
            <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
            <label class="custom-control-label" for="customRadio1">Diambil Sendiri di toko</label>
            <p class="p-keterangan text-muted">Biaya penanganan gratis</p>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
            <label class="custom-control-label" for="customRadio2">Dikirim ke alamat penerima</label>
            <p class="p-keterangan text-muted">Ongkos kirim untuk wilayah Bululawang adalah Rp 10.000. Pengiriman dilakukan setiap jam 3 sore. Setiap pesanan yang masuk
                sebelum jam 3 sore akan dikirim pada hari yang sama, dan selebihnya akan dikirim ke-esokan harinya.
            </p>
        </div>
    </div>
</div>
<div class="card-box">
    <div class="border-delivery"></div>
    <h4 class="mt-3 header-title">
        <svg viewBox="0 0 12 16" class="ikon-lokasi">
            <g stroke="none" fill-rule="evenodd">
                <path d="M7.63636364,5.86666667 C7.63636364,4.98293333 6.90327273,4.26666667 6,4.26666667 C5.09618182,4.26666667 4.36363636,4.98293333 4.36363636,5.86666667 C4.36363636,6.7504 5.09618182,7.46666667 6,7.46666667 C6.90327273,7.46666667 7.63636364,6.7504 7.63636364,5.86666667 M3.27272727,5.86666667 C3.27272727,4.39466667 4.49345455,3.2 6,3.2 C7.506,3.2 8.72727273,4.39466667 8.72727273,5.86666667 C8.72727273,7.33973333 7.506,8.53333333 6,8.53333333 C4.49345455,8.53333333 3.27272727,7.33973333 3.27272727,5.86666667 M6,1.06613333 C3.28854545,1.06613333 1.09090909,3.30453333 1.09090909,6.06666667 C1.09090909,8.8272 6,14.3989333 6,14.3989333 C6,14.3989333 10.9085455,8.8272 10.9085455,6.06666667 C10.9085455,3.30453333 8.71090909,1.06613333 6,1.06613333 M6.912,14.9328 L9.27272727,14.9328 C9.57381818,14.9328 9.81818182,15.1717333 9.81818182,15.4661333 C9.81818182,15.7610667 9.57381818,15.9994667 9.27272727,15.9994667 L2.72727273,15.9994667 C2.42563636,15.9994667 2.18181818,15.7610667 2.18181818,15.4661333 C2.18181818,15.1717333 2.42563636,14.9328 2.72727273,14.9328 L5.08745455,14.9328 C3.40909091,12.9114667 0,8.49813333 0,5.99946667 C0,2.68533333 2.68636364,0 6,0 C9.31363636,0 12,2.68533333 12,5.99946667 C12,8.49813333 8.58981818,12.9114667 6.912,14.9328"></path>
            </g>
        </svg>
        Alamat Pengiriman
    </h4>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-10">
                <p class="text-muted mb-2">Jl. Raya Bakalan no. 16 RT 1 RW 2 Desa Bakalan Kecamatan Bululawang</p>
                <p class="text-muted mb-2">Kabupaten Malang</p>
                <p class="text-muted mb-2">Telp. 085700500836</p>
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-custom">Ganti Alamat</button>
            </div>
        </div>
    </div>
</div>
<div class="card-box">
    <h4 class="m-t-0 header-title">Cara Bayar</h4>
    <div class="mt-3 ml-3">
        <div class="custom-control custom-radio">
            <input type="radio" id="rd1" name="cara_bayar" class="custom-control-input">
            <label class="custom-control-label" for="rd1">Saldo Akun</label>
            <p class="p-keterangan text-muted">Memotong saldo yang anda miliki di Amanahjaya-pay</p>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" id="rd2" name="cara_bayar" class="custom-control-input">
            <label class="custom-control-label" for="rd2">Tunai</label>
            <p class="p-keterangan text-muted">Ambil di toko dan bayar tunai</p>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" id="rd3" name="cara_bayar" class="custom-control-input">
            <label class="custom-control-label" for="rd3">QR Code</label>
            <p class="p-keterangan text-muted">selanjutnya anda akan diarahkan ke halaman scan QR-Code</p>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" id="rd4" name="cara_bayar" class="custom-control-input">
            <label class="custom-control-label" for="rd4">Transfer Bank</label>
            <p class="p-keterangan text-muted">silahkan transfer ke rekening BCA 350714250000050000 atas nama Amanah Jaya</p>
        </div>
    </div>
</div>
<div class="card-box">
    <h4 class="m-t-0 header-title">Rincian Pesanan</h4>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <dl class="row">
                    <dt class="col-5">Cara Kirim</dt>
                    <dd class="col-7">Diambil di Toko</dd>

                    <dt class="col-5">Cara bayar</dt>
                    <dd class="col-7">Tunai</dd>

                    <dt class="col-5">Total Harga</dt>
                    <dd class="col-7 text-right">Rp 34.950</dd>

                    <dt class="col-5">Ongkos Kirim</dt>
                    <dd class="col-7 text-right">Rp 0</dd>

                    <dt class="col-5">Biaya Penanganan</dt>
                    <dd class="col-7 text-right">Rp 0</dd>

                    <dt class="col-5">Diskon</dt>
                    <dd class="col-7 text-right">Rp 2.000</dd>

                    <dt class="col-5 border-top">
                        <h5>Total Bayar</h5>
                    </dt>
                    <dd class="col-7 border-top">
                        <h5 class="text-danger text-right">Rp 34.950</h5>
                    </dd>

                </dl>
                <div class="text-right">
                    <button type="button" class="btn btn-danger"> Buat Pesanan</button>
                </div>
            </div>
        </div>

    </div>


</div>
<?= $this->endSection(); ?>

<?= $this->section('mycss') ?>
<link rel="stylesheet" href="<?= base_url('mycss/checkout.css'); ?>">
<?= $this->endSection(); ?>