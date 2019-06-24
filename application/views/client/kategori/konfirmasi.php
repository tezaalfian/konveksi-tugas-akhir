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
                            <div class="text-success">Rp.&nbsp;<?= $order->harga?>&nbsp;</div>
                            <?= $order->jumlah?>&nbsp;Produk&nbsp;
                            (<?= $order->weight?>&nbsp;gr)
                        </small>
                    </div>
                </div>
                <div class="col-md-4 d-flex flex-column border-left">
                    <span><b>Total Harga Produk :&nbsp;</b></span>
                    <b><span class="text-info">Rp.&nbsp;<?= ucwords($order->tagihan) ?></span></b>
                </div>
                <div class="col-md-2 d-flex flex-column">
                    <a href="#" class="btn btn-info btn-block">Lihat Detail</a>
                </div>
            </div>
    </div>
</div>
<?php endforeach; ?>