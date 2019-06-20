<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('partial/client/css');?>
</head>
<body>
    <?php $this->load->view('partial/client/header2');?>

        <div class="container">
            <div class="row py-5">
                <div class="col-md-4">
<!--                 	<?php var_dump($produk); ?> -->
					<!-- <label for="pelanggan"><b>Sampel</b></label> -->
                	<img style="cursor: pointer;}" data-toggle="modal" data-target="#exampleModal" src="<?=base_url('upload/produk/'.$produk->foto);  ?>" class="img-thumbnail">
					<div id="myModal" class="modal">
					  <span class="close">&times;</span>
					  <img class="modal-content" id="img01">
					  <div id="caption"></div>
					</div>
                </div>
                <div class="col-md-8">
                	<h3 class="text-dark"><?= $produk->nama ?> - <span class="text-dark"><?= $produk->deskripsi ?></span></h3>
                	<h4 class="text-info"><b>Rp.&nbsp;<?= $produk->harga ?></b></h4>
                	<form class="my-4" action="<?= base_url('admin/pemesanan/tambah')?>" method="post" enctype="multipart/form-data">
			            <div class="form-group">
			                <label for="pelanggan"><b>Ukuran</b></label>
				                <div class="row">
				                    <div class="col-sm-4">
										<div class="input-group mb-1">
					                        <div class="input-group-prepend">
										       <div class="input-group-text"><b>S</b></div>
										    </div>
					                        <input type="number" id="size1" name="s"class="form-control ukuran" value="0" min="0">
						                </div>    
					                </div>
					                <div class="col-sm-4">
										<div class="input-group mb-1">
					                        <div class="input-group-prepend">
										       <div class="input-group-text"><b>M</b></div>
										    </div>
					                        <input type="number" id="size2" name="m"class="form-control ukuran" value="0" min="0">
						                </div>    
					                </div>
					                <div class="col-sm-4">
										<div class="input-group mb-1">
					                        <div class="input-group-prepend">
										       <div class="input-group-text"><b>L</b></div>
										    </div>
					                        <input type="number" id="size3" name="l"class="form-control ukuran" value="0" min="0">
						                </div>    
					                </div>
					                <div class="col-sm-4">
										<div class="input-group mb-1">
					                        <div class="input-group-prepend">
										       <div class="input-group-text"><b>XL</b></div>
										    </div>
					                        <input type="number" id="size4" name="xl"class="form-control ukuran" value="0" min="0">
						                </div>    
					                </div>
					                <div class="col-sm-4">
										<div class="input-group mb-1">
					                        <div class="input-group-prepend">
										       <div class="input-group-text"><b>XXL</b></div>
										    </div>
					                        <input type="number" id="size5" name="xxl"class="form-control ukuran" value="0" min="0">
						                </div>    
					                </div>
					                <div class="col-sm-4">
										<div class="input-group mb-1">
					                        <div class="input-group-prepend">
										       <div class="input-group-text"><b>Other</b></div>
										    </div>
					                        <input type="number" id="size6" name="xxxl"class="form-control ukuran" value="0" min="0">
						                </div>    
					                </div>
					            </div>
					        <i><small>*Untuk ukuran selain yang ada diatas silahkan masukkan Other dengan menjelaskan keterangannya di Catatan </small></i>
			                <div class="invalid-feedback">
			                    <?php echo form_error('pelanggan') ?>
			                </div>
			            </div>
			            <input class="form-control" type="hidden" id="harga" name="harga" value="$produk->harga" readonly>

			            <div class="row">
			            	<div class="col-md-6">
			            		<div class="form-group">
					                <label for="pelanggan"><b>Jumlah</b></label>
					                <input class="form-control <?php echo form_error('jumlah') ? 'is-invalid':'' ?>" type="number" name="jumlah" id="jumlah" readonly>
					                <div class="invalid-feedback">
					                    <?php echo form_error('jumlah') ?>
					                </div>
					            </div>
			            	</div>
			            	<div class="col-md-6">
			            		<div class="form-group">
					                <label for="pelanggan"><b>Total</b></label>
					                <input class="form-control <?php echo form_error('tagihan') ? 'is-invalid':'' ?>" type="number" name="tagihan" id="tagihan" readonly>
					            </div>
			            	</div>
			            </div>

			            <div class="row">
			            	<div class="col-md-6">
			            		<div class="form-group">
					                <label for="pelanggan"><b>Catatan</b></label>
					                <textarea rows="4" class="form-control <?php echo form_error('catatan') ? 'is-invalid':'' ?>" name="catatan2" id="catatan2" placeholder="Catatan khusus admin..."></textarea>
					            </div>
			            	</div>
			            	<div class="col-md-6">
			                    <div class="form-group">
			                    	<label for="pelanggan"><b>Desain</b></label>
		                            <!-- <img src="<?=base_url('upload/pelanggan/default.jpg'); ?>" class="img-thumbnail"> -->
			                        <div class="custom-file">
	                                    <input type="file" class="custom-file-input" id="customFilen" name="foto" accept=".jpg,.jpeg,.png">
	                                    <label class="custom-file-label" for="customFile">Upload Desain Anda</label>
	                                </div>
			                        <i>
			                            <small>*Besar file : maksimum 10 Mb</small><br>
			                            <small>*Ekstensi file yang diperbolehkan : .JPG .JPEG .PNG</small>
			                        </i>
			                    </div>
			            	</div>
			            </div>

			            <button class="btn btn-info" type="submit" name="btn">Pesan Sekarang</button>
			        </form>
                </div>
            </div>
        </div>

        <!-- Modal -->
		<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Desain</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <img data-toggle="modal" data-target="#exampleModal" src="<?=base_url('upload/produk/'.$produk->foto);  ?>" class="img-thumbnail">
		      </div>
		    </div>
		  </div>
		</div>

    <!-- FOOTER -->
            <?php $this->load->view('partial/client/footer');?>
        </div>
    </div>

<!-- LIBRARY JS -->
    <?php $this->load->view('partial/client/js');?>
    
</body>
</html>