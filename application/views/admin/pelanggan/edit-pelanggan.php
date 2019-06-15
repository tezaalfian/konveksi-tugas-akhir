<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('partial/admin/css');?>
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
                                <a href="<?= base_url('admin/pelanggan'); ?>">
	                                <button type="button" class="btn btn-info">
	                                    <i class="fa fa-angle-left"></i>&nbsp; Kembali
	                                </button>
                            	</a>
                            </div>
                            <div class="card-body">
		                        <form action="<?= base_url('admin/pelanggan/edit/').$pelanggan->id_pelanggan;?>" method="post" enctype="multipart/form-data">
		                            <div class="row">
		                                <div class="col-md-3">
			                                <div class="form-group">
		                                		<label for="foto">Foto</label>
		                            			<img src="<?=base_url('upload/pelanggan/'.$pelanggan->foto); ?>" class="img-thumbnail">
			                                	<input type="hidden" name="old_foto" value="<?= $pelanggan->foto ?>"/>
			                                    <input class="form-control-file <?php echo form_error('foto') ? 'is-invalid':'' ?>" type="file" name="foto" value="<?= $pelanggan->foto ?>">
			                                    <div class="invalid-feedback">
			                                        <?php echo form_error('foto')?>
			                                    </div>
			                                </div>
		                            	</div>
		                            	<div class="col-md-9">
		                            		<input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan->id_pelanggan?>" />
			                                <div class="form-group">
			                                    <label for="username">Username*</label>
			                                    <input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>" type="text" name="username" placeholder="username" value="<?= $pelanggan->username ?>">
			                                    <div class="invalid-feedback">
			                                        <?php echo form_error('username') ?>
			                                    </div>
			                                </div>

			                                <div class="form-group">
			                                    <label for="email">Email*</label>
			                                    <input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>" type="email" name="email" placeholder="email" value="<?= $pelanggan->email ?>">
			                                    <div class="invalid-feedback">
			                                        <?php echo form_error('email') ?>
			                                    </div>
			                                </div>

			                                <div class="form-group">
			                                    <label for="password">Password*</label>
			                                    <input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>" type="text" name="password" placeholder="password" value="<?= $pelanggan->password ?>">
			                                    <div class="invalid-feedback">
			                                        <?php echo form_error('password') ?>
			                                    </div>
			                                </div>

			                                <div class="form-group">
			                                    <label for="no_hp">No Hp*</label>
			                                    <input class="form-control <?php echo form_error('no_hp') ? 'is-invalid':'' ?>" type="text" name="no_hp" placeholder="No Hp" value="<?= $pelanggan->no_hp ?>">
			                                    <div class="invalid-feedback">
			                                        <?php echo form_error('no_hp') ?>
			                                    </div>
			                                </div>

			                                <label class=" form-control-label">Jenis Kelamin*</label>
			                                <div class="form-group">
			                                	<div class="form-check-inline form-check <?php echo form_error('jenis_kelamin') ? 'is-invalid':'' ?>">
		                                            <input type="radio" id="inline-radio1" name="jenis_kelamin" value="Laki-Laki" class="form-check-input"<?= is_checked($pelanggan->jenis_kelamin, "Laki-Laki"); ?>>
		                                            Laki-Laki &nbsp;
		                                            <input type="radio" id="inline-radio2" name="jenis_kelamin" value="Perempuan" class="form-check-input"<?=is_checked($pelanggan->jenis_kelamin, "Perempuan"); ?>> 
		                                            Perempuan
		                                        </div>
		                                        <div class="invalid-feedback">
			                                        <?php echo form_error('jenis_kelamin') ?>
			                                    </div>
			                                </div>

			                                <div class="form-group">
	                                            <label for="alamat">Alamat*</label>
	                                            <textarea class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>" name="alamat" placeholder="alamat..."><?= $pelanggan->alamat ?></textarea>
	                                            <div class="invalid-feedback">
	                                                <?php echo form_error('alamat'); ?>
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
    <?php $this->load->view('partial/admin/js');?>
    
</body>
</html>