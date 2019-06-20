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
					<!-- <label for="pelanggan"><b>Sampel</b></label> -->
                	<img style="cursor: pointer;}" id="foto_produk" data-toggle="modal" data-target="#exampleModal" src="" class="img-thumbnail">
					<div id="myModal" class="modal">
					  <span class="close">&times;</span>
					  <img class="modal-content" id="img01">
					  <div id="caption"></div>
					</div>
                </div>
                <div class="col-md-8">
                	<div id="keterangan">
                		
                	</div>
                	
                	<form class="my-4" action="<?= base_url('pemesanan/tambah')?>" method="post" enctype="multipart/form-data">
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
			            <!-- <input class="form-control" type="hidden" id="harga" name="harga"> -->
			            <input class="form-control" type="hidden" id="barang_id" name="barang_id">

			            <div class="row">
			            	<div class="col-md-6">
			            		<div class="form-group">
					                <label for="pelanggan"><b>Jumlah</b></label>
					                <input class="bg-white form-control <?php echo form_error('jumlah') ? 'is-invalid':'' ?>" type="number" name="jumlah" id="jumlah" readonly>
					                <div class="invalid-feedback">
					                    <?php echo form_error('jumlah') ?>
					                </div>
					            </div>
			            	</div>
			            	<div class="col-md-6">
			            		<div class="form-group">
					                <label for="pelanggan"><b>Total</b></label>
					                <div class="input-group mb-1">
						                <div class="input-group-prepend">
											<div class="input-group-text"><b>Rp.</b></div>
										</div>
						                <input class="bg-white form-control <?php echo form_error('tagihan') ? 'is-invalid':'' ?>" type="number" name="tagihan" id="tagihan" readonly>
							        </div>
					            </div>
			            	</div>
			            </div>

			            <div class="row">
			            	<div class="col-md-6">
			            		<div class="form-group">
					                <label for="pelanggan"><b>Catatan</b></label>
					                <textarea rows="4" class="form-control <?php echo form_error('catatan') ? 'is-invalid':'' ?>" name="catatan" id="catatan2" placeholder="Catatan khusus admin..."></textarea>
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
		        <img id="foto-modal" data-toggle="modal" data-target="#exampleModal" src="" class="img-thumbnail">
		      </div>
		    </div>
		  </div>
		</div>

    <!-- FOOTER -->
            <?php $this->load->view('partial/client/footer');?>
        </div>
    </div>

<!-- LIBRARY JS -->
<script type="text/javascript">
		var result = <?= $produk ?>;
        var pelanggan = document.getElementById('pelanggan');
        var jenis_produk = document.getElementById('produk');
        var harga = result.harga;
        var s = document.getElementById('size1');
        var m = document.getElementById('size2');
        var l = document.getElementById('size3');
        var xl = document.getElementById('size4');
        var xxl = document.getElementById('size5');
        var xxxl = document.getElementById('size6');        
        var jumlah = document.getElementById('jumlah');
        var tagihan = document.getElementById('tagihan');
        var catatan = document.getElementById('ket_ukuran');
        var catatan2 = document.getElementById('catatan2');
        var allCatatan = document.getElementById('catatan');
        var ukuran = document.getElementsByClassName('ukuran');
        var barang = document.getElementById('barang_id');

        var string = "<h3 class='text-dark'>"+result.nama+"- <span class='text-dark'>"+result.deskripsi+"</span></h3><h4 class='text-info'><b>Rp.&nbsp;"+result.harga+"</b></h4>";

        document.getElementById('keterangan').innerHTML = string;
        barang.value = result.id;
        

        s.addEventListener('change', (event)=>{
            jumlah.value = parseInt(s.value) + parseInt(m.value) + parseInt(l.value) + parseInt(xl.value) +parseInt(xxl.value) +parseInt(xxxl.value);
            tagihan.value = parseInt(jumlah.value) * parseInt(harga);
        });

        m.addEventListener('change', (event)=>{
            jumlah.value = parseInt(s.value) + parseInt(m.value) + parseInt(l.value) + parseInt(xl.value) +parseInt(xxl.value) +parseInt(xxxl.value);
            tagihan.value = parseInt(jumlah.value) * parseInt(harga);
            // catatan.value = "KETERANGAN UKURAN : S = "+s.value+", M = "+m.value+", L = "+l.value+", XL = "+xl.value+", XXL = "+xxl.value+", XXXL = "+xxxl.value+" | ";
            // allCatatan.value = catatan.value + catatan2.value;
        });
        l.addEventListener('change', (event)=>{
            jumlah.value = parseInt(s.value) + parseInt(m.value) + parseInt(l.value) + parseInt(xl.value) +parseInt(xxl.value) +parseInt(xxxl.value);
            tagihan.value = parseInt(jumlah.value) * parseInt(harga);
            // catatan.value = "KETERANGAN UKURAN : S = "+s.value+", M = "+m.value+", L = "+l.value+", XL = "+xl.value+", XXL = "+xxl.value+", XXXL = "+xxxl.value+" | ";
            // allCatatan.value = catatan.value + catatan2.value;
        });
        xl.addEventListener('change', (event)=>{
            jumlah.value = parseInt(s.value) + parseInt(m.value) + parseInt(l.value) + parseInt(xl.value) +parseInt(xxl.value) +parseInt(xxxl.value);
            tagihan.value = parseInt(jumlah.value) * parseInt(harga);
            // catatan.value = "KETERANGAN UKURAN : S = "+s.value+", M = "+m.value+", L = "+l.value+", XL = "+xl.value+", XXL = "+xxl.value+", XXXL = "+xxxl.value+" | ";
            // allCatatan.value = catatan.value + catatan2.value;
        });
        xxl.addEventListener('change', (event)=>{
            jumlah.value = parseInt(s.value) + parseInt(m.value) + parseInt(l.value) + parseInt(xl.value) +parseInt(xxl.value) +parseInt(xxxl.value);
            tagihan.value = parseInt(jumlah.value) * parseInt(harga);
            // catatan.value = "KETERANGAN UKURAN : S = "+s.value+", M = "+m.value+", L = "+l.value+", XL = "+xl.value+", XXL = "+xxl.value+", XXXL = "+xxxl.value+" | ";
            // allCatatan.value = catatan.value + catatan2.value;
        });
        xxxl.addEventListener('change', (event)=>{
            jumlah.value = parseInt(s.value) + parseInt(m.value) + parseInt(l.value) + parseInt(xl.value) +parseInt(xxl.value) +parseInt(xxxl.value);
            tagihan.value = parseInt(jumlah.value) * parseInt(harga);
            // catatan.value = "KETERANGAN UKURAN : S = "+s.value+", M = "+m.value+", L = "+l.value+", XL = "+xl.value+", XXL = "+xxl.value+", XXXL = "+xxxl.value+" | ";
            // allCatatan.value = catatan.value + catatan2.value;
        });

        catatan2.addEventListener('change', (event)=>{
            allCatatan.value = catatan.value + catatan2.value;  
        });

    </script>

    <?php $this->load->view('partial/client/js');?>
    <script type="text/javascript">
    	var result = <?= $produk ?>;
        $("#foto_produk").attr("src", "<?= base_url('upload/produk/')?>"+result.foto);
        $("#foto-modal").attr("src", "<?= base_url('upload/produk/')?>"+result.foto);
    	// $("#barang_id").val(result.barang_id);
    </script>
    
</body>
</html>