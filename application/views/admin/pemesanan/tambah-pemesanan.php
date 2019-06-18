<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('partial/admin/css');?>
</head>
<body>
<!-- SIDEBAR -->
    <?php $this->load->view('partial/admin/sidebar');?>

    <div id="right-panel" class="right-panel">
    <!-- HEADER -->
        <?php $this->load->view('partial/admin/header');?>

        <?php $this->load->view('partial/admin/breadcrumb');?>

    <!-- CONTENT -->
    <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                    	<?php if ($this->session->flashdata('success')): ?>
	                        <div class="alert alert-success" role="alert">
	                            <?php echo $this->session->flashdata('success'); ?>
	                        </div>
                    	<?php endif; ?>
                        <div class="card">
                            <div class="card-header">
                                <a href="<?= base_url('admin/pemesanan'); ?>">
	                                <button type="button" class="btn btn-info">
	                                    <i class="fa fa-angle-left"></i>&nbsp; Kembali
	                                </button>
                            	</a>
                            </div>
                            <div class="card-body">
		                        <form action="<?= base_url('admin/pemesanan/tambah')?>" method="post" enctype="multipart/form-data">
		                            <div class="row">
		                                <div class="col-md-3">
			                                <div class="form-group">
		                                		<label for="desain">Desain</label>
		                            			<img src="<?=base_url('upload/pemesanan/default.jpg'); ?>" class="img-thumbnail" widht="100%">
			                                    <input class="form-control-file <?php echo form_error('desain') ? 'is-invalid':'' ?>" type="file" name="desain">
			                                    <div class="custom-file">
	                                              <input type="file" class="custom-file-input" id="customFile" name="desain">
	                                              <label class="custom-file-label" for="customFile">Choose file</label>
	                                            </div>
			                                    <div class="invalid-feedback">
			                                        <?php echo form_error('desain')?>
			                                    </div>
			                                </div>
		                            	</div>
		                            	<div class="col-md-9">
			                                <div class="form-group">
			                                    <label for="pelanggan">Pelanggan*</label>
			                                    <select name="pelanggan" id="pelanggan" class="form-control">
	                                                <option>Silahkan pilih</option>

	                                                <?php foreach ($pelanggan as $user) : ?>
	                                                <option><?= $user->username ?></option>
	                                            	<?php endforeach; ?>

	                                            </select>
			                                    <div class="invalid-feedback">
			                                        <?php echo form_error('pelanggan') ?>
			                                    </div>
			                                </div>

			                                <div class="form-group">
			                                    <label for="produk">Produk*</label>
			                                    <select name="produk" id="produk" class="form-control" <?php echo form_error('produk') ? 'is-invalid':'' ?>>
	                                            </select>
			                                    <div class="invalid-feedback">
			                                        <?php echo form_error('produk') ?>
			                                    </div>
			                                </div>

			                                <div class="form-group">
			                                    <label for="harga">Harga Satuan</label>
			                                    <input class="form-control <?php echo form_error('harga') ? 'is-invalid':'' ?>" type="number" id="harga" name="harga" readonly>
			                                </div>

			                                <div class="form-group">
			                                    <label for="harga">Ukuran</label>
			                                <div class="row">
			                                	<div class="col-sm-4">
			                                    	<div class="input-group">
			                                            <div class="input-group-addon"><b>S</b></div>
			                                            <input type="number" id="size1" name="s"class="form-control" value="0" min="0">
			                                        </div>
				                                </div><br><br>
				                                <div class="col-sm-4">
			                                    	<div class="input-group">
			                                            <div class="input-group-addon"><b>M</b></div>
			                                            <input type="number" id="size2" name="m"class="form-control" value="0" min="0">
			                                        </div>
				                                </div><br><br>
				                                <div class="col-sm-4">
			                                    	<div class="input-group">
			                                            <div class="input-group-addon"><b>L</b></div>
			                                            <input type="number" id="size3" name="l"class="form-control" value="0" min="0">
			                                        </div>
				                                </div><br><br>
				                                <div class="col-sm-4">
			                                    	<div class="input-group">
			                                            <div class="input-group-addon"><b>XL</b></div>
			                                            <input type="number" id="size4" name="xl"class="form-control" value="0" min="0">
			                                        </div>
				                                </div><br><br>
				                                <div class="col-sm-4">
			                                    	<div class="input-group">
			                                            <div class="input-group-addon"><b>XXL</b></div>
			                                            <input type="number" id="size5" name="xxl"class="form-control" value="0" min="0">
			                                        </div>
				                                </div><br><br>
				                                <div class="col-sm-4">
			                                    	<div class="input-group">
			                                            <div class="input-group-addon"><b>XXXL</b></div>
			                                            <input type="number" id="size6" name="xxxl"class="form-control" value="0" min="0">
			                                        </div>
				                                </div>
				                            </div>
			                                </div>

			                                <div class="form-group">
			                                    <label for="jumlah">Jumlah</label>
			                                    <input class="form-control <?php echo form_error('jumlah') ? 'is-invalid':'' ?>" type="number" name="jumlah" id="jumlah" readonly>
			                                    <div class="invalid-feedback">
			                                        <?php echo form_error('jumlah') ?>
			                                    </div>
			                                </div>

			                                <div class="form-group">
			                                    <label for="tagihan">Total Tagihan*</label>
			                                    <input class="form-control <?php echo form_error('tagihan') ? 'is-invalid':'' ?>" type="number" name="tagihan" id="tagihan" readonly>
			                                </div>

			                                <div class="form-group">
	                                            <label for="catatan">Catatan*</label>
	                                            <textarea class="form-control <?php echo form_error('catatan') ? 'is-invalid':'' ?>" name="catatan2" id="catatan2" placeholder="catatan..."></textarea>
	                                            <input type="hidden" name="ket_ukuran" id="ket_ukuran">
	                                            <input type="hidden" name="catatan" id="catatan">
	                                            <div class="invalid-feedback">
	                                                <?php echo form_error('catatan'); ?>
	                                            </div>
	                                        </div>
			                                <button class="btn btn-success" type="submit" name="btn">Simpan</button>
			                            </div>
		                            </div>
		                        </form>
                        	</div>
                        	<div class="card-footer small text-muted">
	                            *wajib diisi
	                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .animated -->
    </div>

    <!-- END CONTENT -->

    <!-- FOOTER -->
        <?php $this->load->view('partial/admin/footer');?>
    </div>

<!-- LIBRARY JS -->
	<script type="text/javascript">
		var string = "";
		var result = <?= $produk ?>;

		var pelanggan = document.getElementById('pelanggan');
		var jenis_produk = document.getElementById('produk');
		var harga = document.getElementById('harga');
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

		string += "<option> Silahkan pilih </option>";

	    for(value in result){
	        string += "<option>"+ result[value].nama +"</option>";
	    }
	      
	    jenis_produk.innerHTML = string;

		jenis_produk.addEventListener('change', (event) => {
			harga.value = result[jenis_produk.selectedIndex-1].harga;
			jumlah.value = parseInt(s.value) + parseInt(m.value) + parseInt(l.value) + parseInt(xl.value) +parseInt(xxl.value) +parseInt(xxxl.value);
			tagihan.value = parseInt(jumlah.value) * parseInt(harga.value);
		});

		s.addEventListener('change', (event)=>{
			jumlah.value = parseInt(s.value) + parseInt(m.value) + parseInt(l.value) + parseInt(xl.value) +parseInt(xxl.value) +parseInt(xxxl.value);
			tagihan.value = parseInt(jumlah.value) * parseInt(harga.value);
			// catatan.value = "KETERANGAN UKURAN : S = "+s.value+", M = "+m.value+", L = "+l.value+", XL = "+xl.value+", XXL = "+xxl.value+", XXXL = "+xxxl.value+" | ";
			// allCatatan.value = catatan.value + catatan2.value;
		});

		m.addEventListener('change', (event)=>{
			jumlah.value = parseInt(s.value) + parseInt(m.value) + parseInt(l.value) + parseInt(xl.value) +parseInt(xxl.value) +parseInt(xxxl.value);
			tagihan.value = parseInt(jumlah.value) * parseInt(harga.value);
			// catatan.value = "KETERANGAN UKURAN : S = "+s.value+", M = "+m.value+", L = "+l.value+", XL = "+xl.value+", XXL = "+xxl.value+", XXXL = "+xxxl.value+" | ";
			// allCatatan.value = catatan.value + catatan2.value;
		});
		l.addEventListener('change', (event)=>{
			jumlah.value = parseInt(s.value) + parseInt(m.value) + parseInt(l.value) + parseInt(xl.value) +parseInt(xxl.value) +parseInt(xxxl.value);
			tagihan.value = parseInt(jumlah.value) * parseInt(harga.value);
			// catatan.value = "KETERANGAN UKURAN : S = "+s.value+", M = "+m.value+", L = "+l.value+", XL = "+xl.value+", XXL = "+xxl.value+", XXXL = "+xxxl.value+" | ";
			// allCatatan.value = catatan.value + catatan2.value;
		});
		xl.addEventListener('change', (event)=>{
			jumlah.value = parseInt(s.value) + parseInt(m.value) + parseInt(l.value) + parseInt(xl.value) +parseInt(xxl.value) +parseInt(xxxl.value);
			tagihan.value = parseInt(jumlah.value) * parseInt(harga.value);
			// catatan.value = "KETERANGAN UKURAN : S = "+s.value+", M = "+m.value+", L = "+l.value+", XL = "+xl.value+", XXL = "+xxl.value+", XXXL = "+xxxl.value+" | ";
			// allCatatan.value = catatan.value + catatan2.value;
		});
		xxl.addEventListener('change', (event)=>{
			jumlah.value = parseInt(s.value) + parseInt(m.value) + parseInt(l.value) + parseInt(xl.value) +parseInt(xxl.value) +parseInt(xxxl.value);
			tagihan.value = parseInt(jumlah.value) * parseInt(harga.value);
			// catatan.value = "KETERANGAN UKURAN : S = "+s.value+", M = "+m.value+", L = "+l.value+", XL = "+xl.value+", XXL = "+xxl.value+", XXXL = "+xxxl.value+" | ";
			// allCatatan.value = catatan.value + catatan2.value;
		});
		xxxl.addEventListener('change', (event)=>{
			jumlah.value = parseInt(s.value) + parseInt(m.value) + parseInt(l.value) + parseInt(xl.value) +parseInt(xxl.value) +parseInt(xxxl.value);
			tagihan.value = parseInt(jumlah.value) * parseInt(harga.value);
			// catatan.value = "KETERANGAN UKURAN : S = "+s.value+", M = "+m.value+", L = "+l.value+", XL = "+xl.value+", XXL = "+xxl.value+", XXXL = "+xxxl.value+" | ";
			// allCatatan.value = catatan.value + catatan2.value;
		});

		catatan2.addEventListener('change', (event)=>{
			allCatatan.value = catatan.value + catatan2.value;	
		});

	</script>
    <?php $this->load->view('partial/admin/js');?>
    
</body>
</html>