<?= $this->extend('layout_v') ?>

<?= $this->section('mycss') ?>
<!-- Sweet Alert css -->
<link href="<?= base_url('template'); ?>/plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?= base_url('mycss/main.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('content') ?>



<?php foreach ($dtKategori as $row) : ?>
    <div class="card-kategori mb-0 d-flex justify-content-between">
        <div>
            <h5 class="group-kategori"><?= $row->nama_kategori; ?></h5>
        </div>
        <div class="lihat-semua text-danger">Lihat semua <i class="icon-arrow-right-circle"></i></div>
    </div>
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-6">
        <?php foreach ($dtBarang[$row->id] as $brg) : ?>
            <div class="col col-brg">
                <div class="card isi">
                    <img src="<?= base_url('img') . '/' . $brg->gambar ?>" class="card-img-top" alt="...">
                    <div class="card-body p-2">
                        <div class="card-title">
                            <h5 class="nama-barang"><?= $brg->nama_barang; ?></h5>
                        </div>
                        <div class="d-flex flex-row">
                            <div class="harga">Rp <?= $brg->harga; ?></div>
                            <div class="terjual">10rb+ terjual</div>
                        </div>
                        <hr class="my-1">
                        <div class="d-flex flex-row">
                            <button type="button" class="btn btn-primary waves-effect waves-light" onclick="ambildata(<?= $brg->id; ?>)">Detail</button>
                            <button onclick="silahkan_login()" type="button" class="flex-fill btn btn-sm btn-danger waves-effect waves-light">Beli</button>

                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>

<style>
    .img-detail {
        width: 100%;
        margin: auto 0;
    }

    .isix {
        position: absolute;
        top: 17rem;
    }

    .gg-detail {
        position: relative;
        vertical-align: middle;

    }

    .dx {
        width: 100px;
    }

    .deskripsi {
        padding: 1em;
        height: 17em;
        overflow-y: scroll;


    }
</style>
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalDetail" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="modalDetail">Detail Barang</h4>
            </div>
            <div class="gg-detail">
                <!-- <div style="background-image: url('img/printer-laser.jpg'); background-size: contain; background-repeat: no-repeat;"></div> -->
                <img id="img-img" src="<?= base_url('img/printer-laser.jpg'); ?>" class="img-detail" alt="Foto Barang">
            </div>
            <div class="modal-body">
                <h4 id="dt_nama_barang">Beras Merk Rose Brand 10KG Bisa COD gratis Ongkir selamanya</h4>
                <div class="harga p-2">
                    <h3 id="dt_harga" class="text-danger">Rp. 56.750</h3>
                </div>
                <div class="d-flex">
                    <div id="score" class="mr-5"></div>
                    <p class="card-text">
                        <small class="text-muted">10 terjual | <span id="dt_stok"></span> Tersedia</small>
                    </p>
                </div>
            </div>
            <div class="deskripsi">
                <h5 class="modal-title">Deskripsi</h5>
                <div id="dt_deskripsi"></div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                <button onclick="silahkan_login()" type="button" class="btn btn-danger waves-effect waves-light">Masukkan Keranjang</button>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="belumLoginModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="labelBelum" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="labelBelum">Belum Login</h4>
            </div>
            <div class="modal-body">
                <p>Maaf, anda belum bisa menambahkan ke Keranjang karena belum Login</p>
                <p>Bila anda sudah memiliki Akun, silahkan lakukan <a href="<?= base_url('login'); ?>">LOGIN</a></p>
                <p>Atau jika bila belum memiliki Akun, silahkan lakukan <a href="<?= base_url('regisrasi'); ?>">REGISTRASI</a></p>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                <a href="<?= base_url('login'); ?>" class="btn btn-danger waves-effect waves-light">Login</a>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php echo $this->endSection() ?>

<?= $this->section('skrip'); ?>
<!-- Sweet Alert Js  -->
<script src="<?= base_url('template'); ?>/plugins/sweet-alert/sweetalert2.min.js"></script>
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

    function ambildata(idx) {
        var xambil = $.ajax({
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            method: "POST",
            url: "guest_ambil_data",
            data: {
                id: idx
            }
        });
        xambil.done(function(data) {
            var mydata = JSON.parse(data);
            $("#img-img").attr('src', 'img/' + mydata.gambar);
            $("#dt_nama_barang").text(mydata.nama_barang);
            $("#dt_harga").text(mydata.harga);
            $("#dt_stok").text(mydata.stok);
            $("#dt_deskripsi").html("<p>" + mydata.deskripsi + "</p>");
            $("#myModal").modal("show");
        });
    }

    function silahkan_login() {
        $('#myModal').modal('hide');
        $('#belumLoginModal').modal('show');
    }

    function masuk_keranjang() {
        swal({
            title: 'Berhasil!',
            text: 'Barang telah dimasukkan kedalam keranjang',
            type: 'success',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
    }
</script>
<?= $this->endSection(); ?>