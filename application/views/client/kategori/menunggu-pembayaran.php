<?php foreach ($pemesanan as $order): ?>
            <div class="row py-3 border-bottom d-flex align-items-center">
                <div class="col-auto">
                    <img class="img-thumbnail" id="thumbnail" src="<?= base_url('upload/pemesanan/'.$order->desain) ?>">
                </div>
                <div class="col">
                    <h5 class="text-dark"><b><?= ucwords($order->nama) ?></b></h5>
                    <h6>Total : <b class="text-success">Rp.&nbsp;<?= $order->total_tagihan ?>&nbsp;</b>
                        |&nbsp;Tanggal Pemesanan :&nbsp;<b><?= $order->tanggal_pemesanan ?></b>
                    </h6>
                    <h6><b>Alamat Pengiriman</b></h6>
                    <h6>Penerima : <b class="text-dark">&nbsp;<?= $order->nama_penerima?>&nbsp;</b></h6>
                    <h6><?= $order->alamat?>,&nbsp;<?= $order->kota?>,&nbsp;<?= $order->kode_pos?></b></h6>
                </div>
                <div class="col d-flex justify-content-end">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                        <div class="card-title text-center"> 
                            <h6><b class="text-info">&nbsp;<?= ucwords($order->status) ?>&nbsp;</b></h6>
                        </div>
                            <button data-toggle="modal" data-target="#mediumModal" class="btn btn-outline-danger btn-block" type="button">Batalkan Pemesanan</button>
                            <a href="<?= base_url('pembayaran/tambah/'.$order->id_pemesanan); ?>" class="btn btn-info btn-block">Bayar Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
<?php endforeach; ?>
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
                                            Data yang dihapus tidak akan bisa dikembalikan
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <a href="<?= base_url('pemesanan/delete3/'.$order->id_pemesanan); ?>" class="btn btn-primary">
                                            Confirm
                                        </a>
                                    </div>
                                </div>
                            </div>
</div>