<?= $this->extend('layout_v') ?>
<?= $this->section('mycss') ?>
<link rel="stylesheet" type="text/css" href="<?= base_url('template'); ?>/plugins/jquery.steps/css/jquery.steps.css">
<?= $this->endSection(); ?>

<?= $this->section('content') ?>
<?= form_open('keranjang/buat_pesanan'); ?>
<div class="card-box">
    <h4 class="m-t-0 header-title"><b></b></h4>
    <p class="text-muted m-b-30 font-13">
        Teliti baik-baik untuk memproses pesanan anda.
    </p>
    <style>
        .nav-link {
            padding: 0.5rem;
        }

        .gbrku {
            width: 60px;
            height: 60px;
            overflow: hidden;
            display: inline-block;
        }

        .item-gbr {
            padding: 1rem 0;
        }

        .p-keterangan {
            font-size: smaller;
        }

        .div-alamat {
            padding: .5rem 0;
            font-family: 'Courier New', Courier, monospace;
        }

        .border-delivery {
            height: .1875rem;
            width: 100%;
            background-position-x: -1.875rem;
            background-size: 7.25rem .1875rem;
            background-image: repeating-linear-gradient(45deg, #6fa6d6, #6fa6d6 33px, transparent 0, transparent 41px, #f18d9b 0, #f18d9b 74px, transparent 0, transparent 82px);
        }
    </style>
    <div class="pull-in">
        <form id="basic-form" action="#">
            <div class="card">
                <div class="card-header">

                    <ul class="nav nav-tabs card-header-tabs" style="overflow: scroll-x;">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#barang">Barang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kirim">Kirim</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#bayar">Bayar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#rincian">Rincian</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">

                    <div class="tab-pane active card-body" id="barang">
                        <ul class="list-group list-group-flush">
                            <?php $total = 0; ?>
                            <?php foreach ($dataTabel as $dtx) : ?>
                                <li class="list-group-item item-gbr d-flex flex-row">
                                    <img src="<?= base_url('img/thumb/' . $dtx['barang']->gambar); ?>" alt="" class="img-thumbnail gbrku mr-2">
                                    <div class="brg-ket">
                                        <h5 class="mt-0 mb-1"><?= $dtx['barang']->nama_barang; ?></h5>
                                        <?php $subTotal = $dtx['barang']->harga * $dtx['qty']; ?>
                                        <?php $total += $subTotal ?>
                                        <div class="text-danger text-right"><?= $dtx['barang']->harga . ' x ' . $dtx['qty'] . ' = Rp ' . number_format($subTotal, 0, ",", ".") ?></div>
                                    </div>
                                </li>
                            <?php endforeach ?>
                            <li class="list-group-item item-gbr">
                                <div class="text-right"><strong>Total: <span class="text-danger">Rp <?= number_format($total, 0, ",", "."); ?></span></strong></div>
                            </li>
                        </ul>

                        <div class="text-right"><a data-toggle="tab" href="#kirim" onclick="aktifkantab('kirim')" class="btn btn-custom waves-effect waves-light">Selanjutnya</a></div>
                    </div>

                    <div class="tab-pane card-body" id="kirim">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="rd1" name="cara_kirim" class="custom-control-input" checked="checked" value="ambil">
                            <label class="custom-control-label" for="rd1">Diambil Sendiri di toko</label>
                            <p class="p-keterangan text-muted">Biaya penanganan gratis</p>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="rd2" name="cara_kirim" class="custom-control-input" value="kirim">
                            <label class="custom-control-label" for="rd2">Dikirim ke Alamat Saya</label>
                            <p class="p-keterangan text-muted">Pastikan alamat dan nomor HP yang bisa duhubungi sudah benar</p>
                            <div class="div-alamat">
                                <div class="border-delivery"></div>
                                <div class="row py-2">
                                    <div class="col-sm-9">
                                        <p><?= $dataCust->alamat; ?></p>
                                        <p><?= $dataCust->kab_kota; ?></p>
                                        <p>Kodepos <?= $dataCust->kodepos; ?></p>
                                        <p>Telp. <?= $dataCust->nomor_hp; ?></p>
                                    </div>
                                    <div class="col-sm-3">
                                        <button class="btn btn-primary waves-effect waves-light"> Ganti Alamat</button>
                                    </div>
                                </div>
                                <div class="border-delivery"></div>
                            </div>

                        </div>
                        <div class="text-right"><a data-toggle="tab" href="#bayar" onclick="aktifkantab('bayar')" class="btn btn-custom waves-effect waves-light">Selanjutnya</a></div>

                    </div>

                    <div class="tab-pane card-body" id="bayar">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="byr1" name="cara_bayar" class="custom-control-input" checked="checked" value="tunai">
                            <label class="custom-control-label" for="byr1">Bayar Tunai</label>
                            <p class="p-keterangan text-muted">Dibayar ketika ambil di Toko atau ketika barang dikirim sampai di tujuan(COD)</p>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="byr2" name="cara_bayar" class="custom-control-input" value="qrcode">
                            <label class="custom-control-label" for="byr2">Scan Code</label>
                            <p class="p-keterangan text-muted">silahkan lakukan pembayaran dengan scan QR-Code dari Linkaja, Dana, Ovo , Gopay atau Shopeepay</p>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="byr3" name="cara_bayar" class="custom-control-input" value="transfer">
                            <label class="custom-control-label" for="byr3">Transfer Bank</label>
                            <p class="p-keterangan text-muted">silahkan lakukan pembayaran dengan transfer ke rekening BRI an. amanah jaya bakalan 0112 2545 1452 1445</p>
                        </div>


                        <div class="text-right"><a data-toggle="tab" href="#rincian" onclick="aktifkantab('rincian')" class="btn btn-custom waves-effect waves-light">Selanjutnya</a></div>

                    </div>

                    <div class="tab-pane card-body" id="rincian">
                        <dl class="row">
                            <dt class="col-4">Cara Kirim</dt>
                            <dd id="ket-pengiriman" class="col-8">Diambil di Toko</dd>

                            <dt class="col-4">Cara Bayar</dt>
                            <dd id="ket-pembayaran" class="col-8">Tunai</dd>

                            <dt class="col-4">Harga Barang</dt>
                            <dd id="ket-hargabarang" class="col-8">Rp 2.852.222</dd>

                            <dt class="col-4">Ongkos Kirim</dt>
                            <dd id="ket-ongkoskirim" class="col-8">0</dd>

                            <dt class="col-4">Penanganan</dt>
                            <dd id="ket-penanganan" class="col-8">0</dd>

                            <dt class="col-4">Total Bayar</dt>
                            <dd id="ket-totalharga" class="col-8">Rp 2.852.222</dd>
                        </dl>

                        <div class="form-group">
                            <label for="keterangan">Pesan Tambahan</label>
                            <textarea name="keterangan" class="form-control" id="keterangan" rows="3"></textarea>
                        </div>


                        <div class="text-right"><button type="submit" class="btn btn-custom waves-effect waves-light">Buat Pesanan</a></div>

                    </div>
                </div>

            </div>
        </form>
    </div>
    <?php
    $hit = 0;
    foreach ($dataTabel as $dtb) {
        echo form_hidden('barang[' . $hit . '][id_keranjang]', $dtb['id_keranjang']);
        echo form_hidden('barang[' . $hit . '][id_barang]', $dtb['barang']->id);
        echo form_hidden('barang[' . $hit . '][harga]', $dtb['barang']->harga);
        echo form_hidden('barang[' . $hit . '][qty]', $dtb['qty']);
        echo "<br>";
        $hit++;
    }
    echo '<br>harga_barang ' . form_hidden('harga_barang', $total);
    echo '<br>penanganan ' . form_hidden('biaya_penanganan', 0);
    echo '<br>pengiriman ' . form_hidden('biaya_pengiriman', 0);
    echo '<br>total ' . form_hidden('total_harga', $total);
    echo '<br>statusb ' . form_hidden('status_bayar', 0);
    echo '<br>harga_barang ' . form_hidden('status_kirim', 0);
    ?>

</div>
<?= form_close(); ?>
<?= $this->endSection(); ?>

<?= $this->section('skrip'); ?>

<script src="<?= base_url('template'); ?>/plugins/jquery.steps/js/jquery.steps.min.js" type="text/javascript"></script>
<script>
    var total = <?= $total; ?>;
    $(document).ready(function() {
        $('.div-alamat').hide();

        $('input[type=radio][name=cara_kirim]').change(function() {
            if (this.value == 'ambil') {
                $('.div-alamat').hide();
            } else if (this.value == 'kirim') {
                $('.div-alamat').show();
            }
            var caraKirim = $(this).val();
            var ongkoskirim = 0;
            switch (caraKirim) {
                case "ambil":
                    $('#ket-pengiriman').text('Diambil di Toko');
                    $('#ket-ongkoskirim').text('Rp 0');
                    $('input[name="biaya_pengiriman"]').val(0);
                    ongkoskirim = 0;
                    break;
                case "kirim":
                    $('#ket-pengiriman').text('dikirim ke alamat');
                    $('#ket-ongkoskirim').text('Rp 10.000');
                    $('input[name="biaya_pengiriman"]').val(10000);
                    ongkoskirim = 10000;
                    break;
            }
            var penanganan = $('input[name="biaya_penanganan"]').val();
            var newTotal = total + parseInt(penanganan) + ongkoskirim;
            var format_st = newTotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            $('#ket-totalharga').text(format_st);
            $('input[name="total_harga"]').val(newTotal);

        });

        $("input[name='cara_bayar']").change(function() {
            var caraBayar = $(this).val();
            var namaCarabayar, penangananRp, penanganan;
            switch (caraBayar) {
                case "tunai":
                    namaCarabayar = 'Bayar Tunai'
                    penangananRp = "Rp 0";
                    penanganan = 0;
                    break;
                case "qrcode":
                    namaCarabayar = 'Scan QR-Code'
                    penangananRp = "Rp 1000";
                    penanganan = 1000;
                    break;
                case "transfer":
                    namaCarabayar = 'Transfer Bank'
                    penangananRp = "Rp 0";
                    penanganan = 0;
                    break;
            }
            var ongkoskirim = $('input[name="biaya_pengiriman"]').val();
            var newTotal = parseInt(total) + parseInt(penanganan) + parseInt(ongkoskirim);
            var format_st = newTotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            $('#ket-totalharga').text(format_st);

            $('input[name="total_harga"]').val(newTotal);

            $('#ket-penbayaran').text(namaCarabayar);
            $('#ket-penanganan').text(penangananRp);
            $('input[name="biaya_penanganan"]').val(penanganan);
        });
    });

    function aktifkantab(idx) {
        $('.nav-link').removeClass('active');
        $('a.nav-link[href="#' + idx + '"]').addClass('active');
        console.log(idx);
    }
</script>

<?= $this->endSection(); ?>