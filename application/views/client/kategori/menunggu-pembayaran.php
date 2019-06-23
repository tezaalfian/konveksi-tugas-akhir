<?php foreach ($pemesanan as $order): ?>
            <div class="row py-3 border-bottom d-flex align-items-center">
                <div class="col-auto">
                    <img src="https://image.flaticon.com/icons/svg/1162/1162493.svg" height="100" />
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
                <!-- <div class="col-auto d-flex justify-content-end">
                    <ul class="list-inline">
                      <li class="list-inline-item px-2">
                        <a href="<?= base_url('pemesanan/edit/'.$order->id_pemesanan); ?>"><h3 class="text-success"><i class="fa fa-pencil"></i></h3></a>  
                      </li>
                      <li class="list-inline-item px-2">
                        <a href="" data-toggle="modal" data-target="#mediumModal"><h3 class="text-danger"><i class="fa fa-trash"></i></h3></a>  
                      </li>
                    </ul>
                </div> -->
                <div class="col d-flex justify-content-end">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                        <div class="card-title text-center"> 
                            <h6><b class="text-info">&nbsp;<?= ucwords($order->status) ?>&nbsp;</b></h6>
                        </div>
                            <button data-toggle="modal" data-target="#mediumModal" class="btn btn-outline-danger btn-block" type="button">Batalkan Pemesanan</button>
                            <a href="<?= base_url('home/pembayaran/'.$order->id_pemesanan); ?>" class="btn btn-info btn-block">Pesan Sekarang</a>
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
                                        <a href="<?= base_url('pemesanan/delete2/'.$order->id_pemesanan); ?>" class="btn btn-primary">
                                            Confirm
                                        </a>
                                    </div>
                                </div>
                            </div>