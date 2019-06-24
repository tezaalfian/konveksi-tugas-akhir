<?php foreach ($pemesanan as $order): ?>
            <div class="row py-3 border-bottom d-flex align-items-center">
                <div class="col-auto">
                    <!-- <div style="background-image: url('<?= base_url('upload/pemesanan/'.$order->desain) ?>');">
                        <p class="text-white ">hallo</p>
                    </div> -->
                    <img class="img-thumbnail" id="cover" src="<?= base_url('upload/pemesanan/'.$order->desain) ?>">
                </div>
                <div class="col">
                    <h5 class="text-dark"><b><?= ucwords($order->nama) ?>&nbsp;
                        </b></h5>
                    <h6>Total : <b class="text-success">Rp.&nbsp;<?= $order->total_tagihan ?>&nbsp;</b>
                        |&nbsp;Tanggal Pemesanan :&nbsp;<b><?= $order->tanggal_pemesanan ?></b>
                    </h6>
                    <h6><b>Kode :&nbsp;<?= strtoupper($order->id_pemesanan) ?></b></h6>
                    <h6>Penerima : <b class="text-dark">&nbsp;<?= $order->nama_penerima?>&nbsp;</b></h6>
                    <h6><?= $order->alamat?>,&nbsp;<?= $order->kota?>,&nbsp;<?= $order->kode_pos?></b></h6>
                </div>
                <div class="col d-flex justify-content-end">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                        <div class="card-title text-center"> 
                            <h6><b class="text-info">&nbsp;<?= ucwords($order->status) ?>&nbsp;</b></h6>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
<?php endforeach; ?>