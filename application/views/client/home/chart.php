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
            <div class="row my-2 py-3">
                <div class="col-md-12">
                	<div id="keterangan">
                		<h4 class="text-dark"><b>Keranjang</b></h4>
                    </div>
                </div>
            </div>
                		<?= $this->session->flashdata('kosong'); ?>
            <?php foreach ($pemesanan as $order): ?>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-2 col-md-4">
                            <img class="rounded" id="img-cart" src="<?= base_url('upload/pemesanan/'.$order->desain) ?>" height="100" />
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <h5 class="text-dark"><b><?= $order->nama ?>&nbsp;/&nbsp;
                            <?= $order->deskripsi ?></b></h5>
                            <h6 class="text-info"><b>Rp.&nbsp;<?= $order->harga ?></b></h6>
                            <span>Catatan :&nbsp;<?= $order->catatan ?></span>
                        </div>
                        <div class="col-lg-2 col-md-4 d-flex justify-content-end">
                            <ul class="list-inline">
                              <li class="list-inline-item px-2">
                                <a class="btn btn-success" href="<?= base_url('pemesanan/edit/'.$order->id_pemesanan); ?>"><i class="fa fa-pencil"></i></a>  
                              </li>
                              <li class="list-inline-item px-2">
                                <a class="btn btn-danger" href="" data-toggle="modal" data-target="#mediumModal"><i class="fa fa-trash"></i></a>  
                              </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-8 my-lg-1 my-md-3 mx-md-auto d-flex justify-content-lg-end justify-content-md-center">
                            <div class="card" style="width: 100%;">
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