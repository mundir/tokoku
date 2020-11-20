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
        overflow-y: auto;


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
                <?php if ($userGroup != '0') : ?>
                    <button id="btn-modal-beli" onclick="xx()" type="button" class="btn btn-sm btn-danger waves-effect waves-light">Beli</button>
                <?php else : ?>
                    <button onclick="silahkan_login()" type="button" class="btn btn-sm btn-danger waves-effect waves-light">Beli</button>
                <?php endif ?>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->