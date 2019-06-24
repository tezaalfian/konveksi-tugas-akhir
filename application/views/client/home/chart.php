<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('partial/client/css');?>
    <style type="text/css">
    	#tengah {
    		vertical-align: middle;
    	}
    </style>
</head>
<body class="d-flex flex-column">
<div id="page-content">
    <?php $this->load->view('partial/client/header2');?>

        <div class="container my-3">
            <div class="row my-2 py-3 border-bottom">
                <div class="col-md-12">
                	<div id="keterangan">
                		<h4 class="text-dark"><b>Keranjang</b></h4>
                    </div>
                </div>
            </div>
                		<?= $this->session->flashdata('kosong'); ?>
            <?php foreach ($pemesanan as $order): ?>
            <div class="row py-3 border-bottom d-flex align-items-center">
                <div class="col-md-3">
                    <img src="<?= base_url('upload/pemesanan/'.$order->desain) ?>" height="100" />
                </div>
                <div class="col-md-4">
                    <h5 class="text-dark"><b><?= $order->nama ?></b></h5>
                    <span><?= $order->deskripsi ?></span>
                    <h6 class="text-info"><b>Rp.&nbsp;<?= $order->harga ?></b></h6>
                    <span>Catatan :&nbsp;<?= $order->catatan ?></span>
                </div>
                <div class="col-md-2 d-flex justify-content-end">
                    <ul class="list-inline">
                      <li class="list-inline-item px-2">
                        <a href="<?= base_url('pemesanan/edit/'.$order->id_pemesanan); ?>"><h3 class="text-success"><i class="fa fa-pencil"></i></h3></a>  
                      </li>
                      <li class="list-inline-item px-2">
                        <a href="" data-toggle="modal" data-target="#mediumModal"><h3 class="text-danger"><i class="fa fa-trash"></i></h3></a>  
                      </li>
                    </ul>
                </div>
                <div class="col-md-3 d-flex justify-content-end">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title text-dark"><b>Ringkasan Belanja</b></h5>
                            <ul class="list-inline">
                                <li class="list-inline-item">Jumlah :</li>
                                <li class="list-inline-item float-right"><?= $order->jumlah ?></li>
                            </ul>
                            <ul class="list-inline">
                                <li class="list-inline-item">Total Tagihan :</li>
                                <li class="list-inline-item float-right">Rp.&nbsp;<?= $order->tagihan ?></li>
                            </ul>
                            <a href="<?= base_url('home/checkout/'.$order->id_pemesanan); ?>" class="btn btn-info btn-block">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
			<?php endforeach; ?>		        
        </div>
    <!-- FOOTER -->
</div>
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
                        </div>
            <?php $this->load->view('partial/client/footer');?>
        </div>
    </div>

<!-- LIBRARY JS -->
    <?php $this->load->view('partial/client/js');?>
    <script type="text/javascript">
    	var result = <?= $produk ?>;
        $("#foto_produk").attr("src", "<?= base_url('upload/produk/')?>"+result.foto);
        $("#foto-modal").attr("src", "<?= base_url('upload/produk/')?>"+result.foto);
    	// $("#barang_id").val(result.barang_id);
    </script>
    
</body>
</html>