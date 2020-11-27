<div id="belumLoginModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="labelBelum" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="labelBelum">Belum Login</h4>
            </div>
            <div class="modal-body">
                <div class="card m-b-30">
                    <img class="card-img-top img-fluid" src="<?= base_url(); ?>/logofamili/loginplease.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p>Maaf, anda belum bisa menambahkan ke Keranjang karena belum Login</p>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                <a href="<?= base_url('login'); ?>" class="btn btn-danger waves-effect waves-light">Login</a>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->