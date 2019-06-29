
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('partial/client/css');?>
    <style type="text/css">
    	#tengah {
    		vertical-align: middle;
    	}
    	.hidden {
    		display: none;
    	}
    </style>
    <?php 
    	function is_checked($db_value, $html_value){
		  if($db_value == $html_value){
		    return "checked";
		  }
		  else{
		    return "";
		  }
		}
    ?>
</head>
<body class="d-flex flex-column">
<div id="page-content">
    <?php $this->load->view('partial/client/header2');?>

        <div class="container my-5">
            <div class="row my-3">
            	<div class="col-md-12">
            		<?php $this->load->view('client/profil/link'); ?>
            		
            	</div>
            </div>
            <div class="row my-3">
				<div class="col-md-12">
					<div class="card-body">
		                        <form action="<?= base_url('profil/edit/'); ?>" method="post" enctype="multipart/form-data">
		                            <div class="row">
		                                <div class="col-md-4">
			                                <div class="card" style="border: solid #d4d4d4 1px;">
			                                	<div class="card-body">
				                                <div class="form-group">
				                                	<div class="image">
			                            				<img class="image-fit rounded" src="<?=base_url('upload/pelanggan/'.$user['foto']); ?>">
			                            			</div><br>
				                                    <div class="custom-file">
		                                              <input type="file" class="custom-file-input" id="customFilen" name="foto" accept=".jpg,.jpeg,.png">
		                                              <label class="custom-file-label" for="customFile">Pilih Foto</label>
		                                              <input type="hidden" name="old_foto" value="<?php echo $user['foto']?>" />
		                                            </div>
				                                    <div class="invalid-feedback">
				                                        <?php echo form_error('foto')?>
				                                    </div>
				                                </div>
				                            	</div>
				                            	<div class="card-footer">
				                            		<small>Besar file : maksimum 10 Mb</small><br>
				                            		<small>Ekstensi file yang diperbolehkan : .JPG .JPEG .PNG</small>
				                            	</div>
				                            </div>
		                            	</div>
		                            	<div class="col-md-8">
		                            		<input type="hidden" name="id_user" value="<?php echo $user['id_user']?>" />
			                                <div class="form-group">
			                                    <label for="username">Username*</label>
			                                    <input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>" type="text" name="username" placeholder="username" value="<?= $user['username'] ?>" required>
			                                </div>

			                                <div class="form-group">
			                                    <input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>" type="hidden" name="email" placeholder="email" value="<?= $user['email'] ?>" readonly>
			                                </div>

			                                <div class="form-group">
			                                    <label for="no_hp">No Hp</label>
			                                    <input class="form-control <?php echo form_error('no_hp') ? 'is-invalid':'' ?>" type="text" name="no_hp" placeholder="No Hp" value="<?= $user['no_hp'] ?>">
			                                </div>

			                                <label class=" form-control-label">Jenis Kelamin</label>
			                                <div class="form-group">
			                                	<div class="form-check-inline form-check <?php echo form_error('jenis_kelamin') ? 'is-invalid':'' ?>">
		                                            <input type="radio" id="inline-radio1" name="jenis_kelamin" value="Laki-Laki" class="form-check-input" <?php if ($user['jenis_kelamin'] == "Laki-Laki") echo "checked";?>>
		                                            Laki-Laki &nbsp;
		                                            <input type="radio" id="inline-radio2" name="jenis_kelamin" value="Perempuan" class="form-check-input" <?php if ($user['jenis_kelamin'] == "Perempuan") echo "checked";?>> 
		                                            Perempuan
		                                            <input type="radio" id="inline-radio2" name="jenis_kelamin" value="" class="form-check-input hidden">
		                                        </div>
			                                </div>

			                                <div class="form-group">
	                                            <label for="alamat">Alamat</label>
	                                            <textarea class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>" name="alamat" placeholder="alamat..."><?= $user['alamat'] ?></textarea>
	                                        </div>
			                                <button class="btn btn-success" type="submit">Simpan</button>
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
    <!-- FOOTER -->
</div>

            <?php $this->load->view('partial/client/footer');?>
        </div>
    </div>

<!-- LIBRARY JS -->
    <?php $this->load->view('partial/client/js');?>
    
</body>
</html>