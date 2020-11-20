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