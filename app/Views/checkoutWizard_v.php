<?= $this->extend('layout_v') ?>
<?= $this->section('mycss') ?>
<link rel="stylesheet" type="text/css" href="<?= base_url('template'); ?>/plugins/jquery.steps/css/jquery.steps.css">
<?= $this->endSection(); ?>

<?= $this->section('content') ?>
<?= form_open('keranjang/buat_pesanan'); ?>
<div class="row">
    <div class="col-sm-3">

    </div>
    <div class="com-sm-6">

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
                                                <p>Telp. <?= $dataCust->nomor_hp; ?></p>
                                            </div>
                                            <div class="col-sm-3">
                                                <a href="<?= base_url('akun/edit_alamat'); ?>" class="btn btn-primary waves-effect waves-light"> Ganti Alamat</a>
                                            </div>
                                        </div>
                                        <div class="border-delivery"></div>
                                    </div>

                                </div>

                            </div>

                            <div class="tab-pane card-body" id="rincian">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Harga Barang</th>
                                            <td id="ket-hargabarang" class="text-right"><?= number_format($total, 0, ",", "."); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Ongkos Kirim</th>
                                            <td id="ket-ongkoskirim" class="text-right">2000</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Diskon</th>
                                            <td id="ket-diskon" class="text-right">0</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Total Bayar</th>
                                            <th id="ket-totalbayar" class="text-right"><?= number_format($total, 0, ",", "."); ?></th>
                                        </tr>

                                    </tbody>
                                </table>

                                <div class="form-group">
                                    <label for="keterangan">Pesan Tambahan</label>
                                    <textarea name="keterangan" class="form-control" id="keterangan" rows="3"></textarea>
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
                                echo form_hidden('harga_barang', $total);
                                echo form_hidden('biaya_penanganan', 0);
                                echo form_hidden('biaya_pengiriman', 0);
                                echo form_hidden('total_harga', $total);
                                echo form_hidden('status_bayar', 0);
                                echo form_hidden('status_kirim', 0);
                                ?>

                                <div class="text-right"><button type="submit" class="btn btn-custom waves-effect waves-light">Buat Pesanan</a></div>

                            </div>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>

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
                    ongkoskirim = 10000;
                    $('#ket-pengiriman').text('dikirim ke alamat');
                    $('#ket-ongkoskirim').text(ongkoskirim);
                    $('input[name="biaya_pengiriman"]').val(10000);
                    break;
            }
            var newTotal = total + ongkoskirim;
            var format_st = newTotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            $('#ket-totalbayar').text(format_st);
            $('input[name="total_bayar"]').val(newTotal);

        });

    });
</script>

<?= $this->endSection(); ?>