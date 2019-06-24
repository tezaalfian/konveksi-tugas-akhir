<?php foreach ($pemesanan as $order): ?>
<div class="card">
    <div class="card-body">
        <div class="row py-2 border-bottom d-flex align-items-center">
            <div class="col-md-6 d-flex flex-column">
                <span><b>Kode :&nbsp;</b></span>
                <b><span class="text-info"><?= strtoupper($order->id_pemesanan) ?></span></b>
            </div>
            <div class="col-md-4 d-flex flex-column border-left">
                <span><b>Status :&nbsp;</b></span>
                <b><span class="text-info"><?= ucwords($order->status) ?></span></b>
            </div>
            <div class="col-md-2 d-flex flex-column border-left">
                 <span><b>Total Tagihan :&nbsp;</b></span>
                <b><span class="text-info">Rp.&nbsp;<?= $order->total_tagihan ?></span></b>
            </div>
        </div>
            <div class="row py-3 border-bottom d-flex align-items-center">
                <div class="col-md-6 d-flex justify-content-start">
                    <img class="rounded mr-3" id="cover" src="<?= base_url('upload/pemesanan/'.$order->desain) ?>">
                    <div class="d-flex flex-column">
                        <h5 class="text-dark"><b><?= ucwords($order->nama) ?></b></h5>
                        <h5 class="text-dark"><b><?= ucwords($order->deskripsi) ?></b></h5>
                        <small class="d-flex justify-content-start">
                            <b><div class="text-success">Rp.&nbsp;<?= $order->harga?>&nbsp;</div></b>
                            <b><?= $order->jumlah?>&nbsp;Produk&nbsp;
                            (<?= $order->weight?>&nbsp;gr)</b>
                        </small>
                    </div>
                </div>
                <div class="col-md-4 d-flex flex-column border-left">
                    <span><b>Total Harga Produk :&nbsp;</b></span>
                    <b><span class="text-info">Rp.&nbsp;<?= ucwords($order->tagihan) ?>
                    &nbsp;(<?= $order->berat?>&nbsp;gr)</span></b>
                </div>
                <div class="col-md-2 d-flex flex-column">
                    <a data-toggle="modal" data-target=".bd-example-modal-lg" href="#" class="btn btn-info btn-block">Lihat Detail</a>
                </div>
            </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content p-3">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalCenterTitle">
            <b>Detail Pemesanan</b>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row my-2 border-bottom">
            <div class="col-md-12">
                <small>Kode Pemesanan</small>
                <h6 class="text-info"><b><?= strtoupper($order->id_pemesanan) ?></b></h6>
                <small>Status</small>
                <h6 class="text-info"><b><?= ucwords($order->status) ?></b></h6>
                <small>Tanggal Pemesanan</small>
                <h6 class="text-info"><b><?= ucwords($order->tanggal_pemesanan) ?></b></h6>
            </div>
        </div>
        <div class="row py-2 my-2 border-bottom">
            <div class="col-md-6">
                <div class="d-flex justify-content-start">
                    <img class="rounded mr-3" id="cover" src="<?= base_url('upload/pemesanan/'.$order->desain) ?>">
                    <div class="d-flex flex-column">
                        <small>Data Produk</small>
                        <h6 class="text-info"><b>
                            <?= ucwords($order->nama) ?>&nbsp;/&nbsp;
                            <?= ucwords($order->deskripsi) ?>
                        </b></h6>
                        <small class="d-flex justify-content-start">
                            <b><?= $order->jumlah?>&nbsp;Produk&nbsp;
                            (<?= $order->weight?>&nbsp;gr)</b>&nbsp;x&nbsp;
                            <b>Rp.&nbsp;<?= $order->harga?>&nbsp;</b>
                        </small>
                    </div>
                </div>
            </div>
            <div class="col-md-6 border-left">
                <small>Total Harga</small>
                <h6 class="text-info"><b>Rp.&nbsp;<?= strtoupper($order->tagihan) ?></b></h6>
            </div>
        </div>
        <div class="row py-2 my-2 border-bottom">
            <div class="col-md-12 d-flex flex-column">
                <h6 class="text-info"><b>Pengiriman</b></h6>
                <small><?= strtoupper($order->kurir) ?></small>
                <small>Dikirim kepada :&nbsp;<b><?= ucwords($order->nama_penerima) ?></b></small>
                <small><?= ucwords($order->alamat) ?></small>
                <small>Kota&nbsp;<?= ucwords($order->kota) ?>, 
                    Kode pos&nbsp;<?= ucwords($order->kode_pos) ?></small>
                <small><?= ucwords($order->provinsi) ?></small>
                <small>Telp :&nbsp;<?= ucwords($order->no_hp) ?></small>
            </div>
        </div>
        <div class="row py-2 my-2 border-bottom">
            <div class="col-md-6 d-flex flex-column">
                <h6 class="text-info"><b>Pembayaran</b></h6>
                <small>Total Harga&nbsp;(<?= $order->jumlah?>&nbsp;produk)</small>
                <small>Total Ongkos Kirim&nbsp;(<?= $order->berat?>&nbsp;gram)</small>
                <small>Total Pembayaran</small>
            </div>
            <div class="col-md-6 d-flex flex-column border-left">
                <h6 class="text-info"><b>Ket.</b></h6>
                <small><b>Rp.&nbsp;<?= $order->tagihan?></b></small>
                <small><b>Rp.&nbsp;<?= $order->ongkir?></b></small>
                <small><b class="text-info">Rp.&nbsp;<?= $order->total_tagihan?></b></small>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>