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
        width: 60px;
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
</style>
<?= form_open('keranjang/proses'); ?>
<div class="fixed-bottom p-3 checkout d-flex justify-content-end bg-white border-top">

    <div class="div-harga d-flex">
        <div class="total-harga mr-1">
            <div class="srupiah mb-1">Total:</div>
            <input name='total' type="hidden" value="0" id="total">
            <div id="total-v" class="text-danger rupiah">Rp 0</div>
        </div>
        <div>
            <button type="submit" class="btn btn-danger">Buat Pesanan</button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Keranjang Belanja</h4>
            <p class="text-muted font-13 m-b-20">
                Berikut barang-barang yang ada dalam keranjang belanja. Klik tanda centang untuk membeli, dan tombol PLUS/MINUS untuk atur jumlah barang.
            </p>
            <!-- pesan Error -->
            <?php if ($pesan = session()->getFlashdata('pesanError')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $pesan ?>
                </div>
            <?php endif ?>
            <table class="table">
                <?php $hitung = 1; ?>
                <tbody>
                    <?php foreach ($dtKeranjang as $row) : ?>
                        <tr>
                            <td>
                                <div class="checkbox checkbox-custom">
                                    <input name="cbk[]" type="checkbox" value='<?= $hitung; ?>' class="form-check-input cbk-list" id="<?= 'cbk' . $hitung; ?>">
                                    <label class="form-check-label" for="<?= 'cbk' . $hitung; ?>"><?= $hitung; ?></label>
                                </div>
                            </td>
                            <td>
                                <?php
                                echo form_hidden('id_keranjang[]', $row->id,);
                                echo form_input('id_barang[]', $row->id_barang, ["id" => 'id_barang' . $hitung], "hidden");
                                echo form_input('harga[]', $row->harga, ["id" => 'harga' . $hitung], "hidden");
                                $total = $row->harga * $row->qty;
                                echo form_input('sub_total[]', $total, ['id' => 'sub-total' . $hitung], "hidden");
                                ?>

                                <div class="nama-barang"><?= $row->nama_barang; ?></div>
                                <div class="d-flex">
                                    <div class="cart-item-overview__thumbnail" alt="cart_thumbnail" style="background-image: url(&quot;<?= base_url('img/thumb') . '/' . $row->gambar; ?>&quot;);"></div>
                                    <div class="ml-1">
                                        <h6 class="m-0 text-muted"><span id="ket-stok<?= $hitung; ?>"><?= $row->stok; ?></span> tersedia</h6>
                                        <div class="text-muted m-0"> Rp <?= number_format($row->harga, 0, ",", "."); ?></div>
                                        <div class="d-flex mb-1">
                                            <button type="button" onclick="kurangi(<?= $hitung; ?>)" class="btn btn-sm btn-light"><i class="fi-circle-minus"></i></button>
                                            <input name="qty[]" id="qty<?= $hitung; ?>" class="form-control qty-input" type="number" value="<?= $row->qty; ?>">
                                            <button type="button" onclick="tambahi(<?= $hitung; ?>)" class="btn btn-sm btn-light"><i class="fi-circle-plus"></i></button>
                                        </div>
                                        <div class="text-right">
                                            <h5 id="sub-total-view<?= $hitung; ?>" class="text-danger">Rp <?= number_format($total, 0, ",", "."); ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="text-right">
                                <h3 class="text-danger"> Rp. 45.750</h3>
                            </div> -->
                            </td>

                        </tr>
                        <?php $hitung++; ?>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>

    </div>


</div>

<?= form_close(); ?>

<?= $this->endSection(); ?>

<?= $this->extend('layout_v') ?>

<?= $this->section('skrip'); ?>
<script>
    var grandTotal = 0;
    $(document).ready(function() {
        $('input:checkbox.cbk-list').prop('checked', false);

        $('input:checkbox.cbk-list').click(function() {
            if ($(this).prop("checked") == true) {
                var nomor = $(this).val();
                grandTotal += parseInt($('#sub-total' + nomor).val());
                tampil_total(grandTotal);
            } else if ($(this).prop("checked") == false) {
                var nomor = $(this).val();
                grandTotal -= parseInt($('#sub-total' + nomor).val());
                tampil_total(grandTotal);

            }
        });


        $("input.qty-input").blur(function() {
            var idx = $(this).attr('id').replace('qty', '');
            var qty = $(this).val();
            var subTotalLama = $('#sub-total' + idx).val();
            var subTotalbaru = tampilkan_plusminus(idx, qty);
            if ($("#cbk" + idx).prop("checked") == true) {
                grandTotal -= subTotalLama;
                grandTotal += subTotalbaru;
                tampil_total(grandTotal);
            }
        });

        $("input.qty-input").change(function() {
            var idx = $(this).attr('id').replace('qty', '');
            var qty = $(this).val();
            var stok = parseInt($('#ket-stok' + idx).text());
            if ($(this).val() >= stok) {
                alert('tidak boleh melebihi stok barang' + stok);
                $(this).val(stok);
            }
        });
    });


    function kurangi(idx) {
        var qty = $('#qty' + idx).val();
        if (qty > 1) {
            qty--;
            var subTotal = tampilkan_plusminus(idx, qty);
            if (document.getElementById('cbk' + idx).checked) {
                var harga = $("#harga" + idx).val();
                grandTotal -= parseInt(harga);
                tampil_total(grandTotal);
            }
        }
    }

    function tambahi(idx) {
        var stok = parseInt($('#ket-stok' + idx).text());
        var qty = $('#qty' + idx).val();
        console.log(stok);

        if (qty < stok) {
            qty++;
            var subTotal = tampilkan_plusminus(idx, qty);
        }
        if (document.getElementById('cbk' + idx).checked) {
            var harga = $("#harga" + idx).val();
            grandTotal += parseInt(harga);
            tampil_total(grandTotal);
        }
    }

    function tampilkan_plusminus(idx, qty) {
        $('#qty' + idx).val(qty);
        var harga = $("#harga" + idx).val();
        var sub_total = harga * qty;
        $('#sub-total' + idx).val(sub_total);
        var format_st = sub_total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        $('#sub-total-view' + idx).text('Rp ' + format_st);
        return sub_total;
    }

    function tampil_total(total) {
        var format_st = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        $('#total').val(total);
        $('#total-v').text('Rp ' + format_st);
    }
</script>
<?= $this->endSection(); ?>