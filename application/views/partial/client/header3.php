<div class=" bg-info">
        <div class="container">
          <a href="#"><small class="text-white"><i class="fa fa-facebook"></i></small></a>
        </div>
    </div>
<nav class="navbar navbar-expand navbar-dark bg-dark topbar mb-4 sticky-top">
  <div class="container">
          <!-- Sidebar Toggle (Topbar) -->
          <a class="navbar-brand " href="" data-toggle="modal" data-target="#mediumModal">
            <img src="<?= base_url('vendor_assets/img/logo.png'); ?>" height="40" class="d-inline-block align-top" alt="" align="center">
          </a>

  </div>
</nav>
          <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="mediumModalLabel">Apakah kamu yakin ?</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            Perubahan yang Anda lakukan di halaman ini tidak akan disimpan
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <a href="<?= base_url('pemesanan/delete/'.$pemesanan[0]->id_pemesanan); ?>" class="btn btn-primary">
                                            Confirm
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>