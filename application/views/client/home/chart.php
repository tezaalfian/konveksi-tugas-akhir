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

        <div class="container">
            <div class="row py-3">
                <div class="col-md-12">
                	<div id="keterangan">
                		<h4 class="text-dark"><b>Keranjang</b></h4>
                		<?= $this->session->flashdata('kosong'); ?>
                		<table class="table ">
						  <thead>
						  	<?php foreach ($pemesanan as $order): ?>
						    <tr>
						      	<th scope="col" id="tengah">
						      		<img src="<?= base_url('upload/pemesanan/'.$order->desain) ?>" height="100" />
						      	</th>
						      	<th id="tengah" width="500">
						      		<?= $order->nama ?><br>
						      		<?= $order->deskripsi ?><br>
						      		<div class="text-info">Rp.&nbsp;<?= $order->harga ?></div>
						      		<span>Catatan :&nbsp;<?= $order->catatan ?></span>
						      	</th>
						      	<th id="tengah">
						      		<a href="<?= base_url('pemesanan/edit/'.$order->id_pemesanan); ?>"><h3 class="text-success"><i class="fa fa-pencil"></i></h3></a>
						      	</th>
						      	<th id="tengah">
						      		<a href="" data-toggle="modal" data-target="#mediumModal"><h3 class="text-danger"><i class="fa fa-trash"></i></h3></a>
						      	</th>
						      	<th id="tengah" align="center">
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
						      	</th>
						    </tr>
						    <?php endforeach; ?>
						  </thead>
						</table>
                	</div>
                </div>
            </div>
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