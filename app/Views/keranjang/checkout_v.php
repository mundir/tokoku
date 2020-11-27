<?= $this->extend('layout_v') ?>
<?= $this->section('content') ?>
<style>
    .gbrku {
        width: 60px;
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
<div class="row">

    <div class="col-md-6 offset-md-3">
        <?= form_open('keranjang/buat_pesanan'); ?>
        <div class="card m-b-30 card-body">
            <h5 class="card-title">Data Barang</h5>
            <ul class="list-group list-group-flush">
                <?php $total = 0; ?>
                <?php $hit = 0 ?>
                <?php foreach ($dataTabel as $dtx) : ?>
                    <li class="list-group-item">
                        <h5 class="mt-0 mb-1"><?= $dtx['barang']->nama_barang; ?></h5>
                        <div class="d-flex">
                            <img src="<?= base_url('img/thumb/' . $dtx['barang']->gambar); ?>" alt="" class="img-thumbnail gbrku mr-2">

                            <?php $subTotal = $dtx['barang']->harga * $dtx['qty']; ?>
                            <?php $total += $subTotal ?>
                            <div class="flex-grow-1 text-danger text-right"><?= $dtx['barang']->harga . ' x ' . $dtx['qty'] . ' = Rp ' . number_format($subTotal, 0, ",", ".") ?></div>
                        </div>
                    </li>
                    <?php
                    echo form_hidden('barang[' . $hit . '][id_keranjang]', $dtx['id_keranjang']);
                    echo form_hidden('barang[' . $hit . '][id_barang]', $dtx['barang']->id);
                    echo form_hidden('barang[' . $hit . '][harga]', $dtx['barang']->harga);
                    echo form_hidden('barang[' . $hit . '][qty]', $dtx['qty']);
                    $hit++;
                    ?>
                <?php endforeach ?>
                <?php $diskon = 2 / 100 * $total ?>
                <?php $totalbayar = $total - $diskon ?>
                <?= form_hidden('harga_barang', $total); ?>
                <li class="list-group-item item-gbr">
                    <div class="text-right"><strong>Total: <span class="text-danger">Rp <?= number_format($total, 0, ",", "."); ?></span></strong></div>
                </li>
            </ul>

        </div>

        <div class="card m-b-30 card-body">
            <h5 class="card-title">Cara Penyerahan Barang</h5>
            <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="cara_kirim" id="rd1" value="ambil" checked>
                <label class="form-check-label" for="rd1">
                    Diambil di Toko <small class="text-muted"> anda berhak mendapatkan diskon 2%</small>
                </label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="cara_kirim" id="rd2" value="kirim">
                <label class="form-check-label" for="rd2">
                    Dikirim ke Alamat <small class="text-muted"> gratis ongkir dengan minimal belanja 200.000</small>
                </label>
            </div>
            <div style="padding: 1rem;">
                <div class="border-delivery"></div>
                <div class="div-alamat">
                    <p>Alamat : <?= $dataCust->alamat; ?></p>
                    <p>Nomor HP : <?= $dataCust->nomor_hp; ?></p>
                </div>
                <div class="border-delivery"></div>
            </div>
        </div>

        <div class="card m-b-30 card-body">
            <h5 class="card-title">Rincian Pesanan</h5>
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Ambil/Kirim</th>
                        <td id="ket-ambil" class="text-right">Diambil</td>
                    </tr>
                    <tr>
                        <th scope="row">Harga Barang</th>
                        <td id="ket-hargabarang" class="text-right"><?= number_format($total, 0, ",", "."); ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Ongkos Kirim</th>
                        <td id="ket-ongkoskirim" class="text-right">0</td>
                    </tr>
                    <tr>
                        <th scope="row">Diskon</th>
                        <td id="ket-diskon" class="text-right">0</td>
                    </tr>
                    <tr>
                        <th scope="row">Total Bayar</th>
                        <th id="ket-totalbayar" class="text-right"><?= number_format($totalbayar, 0, ",", "."); ?></th>
                    </tr>

                </tbody>
            </table>
            <?= form_hidden('biaya_pengiriman', 0); ?>
            <?= form_hidden('diskon', $diskon); ?>
            <?= form_hidden('total_harga', $totalbayar); ?>

            <hr>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Catatan Tambahan</label>
                <textarea name="keterangan" class="form-control" id="keterangan" rows="3"></textarea>
            </div>
            <hr>

            <div class="text-right">
                <button type="submit" class="btn btn-primary">Buat Pesanan</button>
            </div>
        </div>






        <?= form_close(); ?>
    </div>

</div>

<?= $this->endSection() ?>

<?= $this->section('skrip'); ?>

<script>
    var total = <?= $total; ?>;
    $(document).ready(function() {
        var diskon = 2 / 100 * total;
        $('#ket-diskon').text(diskon);

        $('input[type=radio][name=cara_kirim]').change(function() {

            var caraKirim = $(this).val();
            var ongkoskirim = 0;
            var diskon = 2 / 100 * total;
            switch (caraKirim) {
                case "ambil":
                    $('#ket-ambil').text('diambil');
                    $('#ket-ongkoskirim').text('0');
                    $('#ket-diskon').text(diskon);
                    $('input[name="biaya_pengiriman"]').val(ongkoskirim);
                    $('input[name="diskon"]').val(diskon);
                    break;
                case "kirim":
                    (total < 200000) ? ongkoskirim = 10000: 0;
                    $('#ket-ambil').text('dikirim');
                    $('#ket-ongkoskirim').text(ongkoskirim);
                    diskon = 0;
                    $('#ket-diskon').text(diskon);
                    $('input[name="biaya_pengiriman"]').val(ongkoskirim);
                    $('input[name="diskon"]').val(diskon);
                    break;
            }
            var newTotal = total + ongkoskirim - diskon;
            var format_st = newTotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            $('#ket-totalbayar').text(format_st);
            $('input[name="total_harga"]').val(newTotal);

        });

    });
</script>




<?= $this->endSection(); ?>