<?= $this->extend('layout_v') ?>

<?= $this->section('skrip'); ?>
<script>
    var grandTotal = 0;
    $(document).ready(function() {
        $('input:checkbox').click(function() {
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
        var qty = $('#qty' + idx).val();
        qty++;
        var subTotal = tampilkan_plusminus(idx, qty);
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
        $('#total-v').text('Rp ' + format_st);
    }
</script>
<?= $this->endSection(); ?>