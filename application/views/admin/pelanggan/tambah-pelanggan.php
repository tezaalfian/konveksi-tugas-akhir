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
                                <a href="<?= base_url('admin/pelanggan'); ?>">
	                                <button type="button" class="btn btn-info">
	                                    <i class="fa fa-angle-left"></i>&nbsp; Kembali
	                                </button>
                            	</a>
                            </div>
                            <div class="card-body">
		                        <form action="<?= base_url('admin/pelanggan/tambah')?>" method="post" enctype="multipart/form-data">
		                            <div class="row">
		                                <div class="col-md-3">
			                                <div class="form-group">
		                                		<label for="foto">Foto</label>
		                            			<img src="<?=base_url('upload/pelanggan/default.jpg'); ?>" class="img-thumbnail">
			                                    <input class="form-control-file <?php echo form_error('foto') ? 'is-invalid':'' ?>" type="file" name="foto">
			                                    <div class="invalid-feedback">
			                                        <?php echo form_error('foto')?>
			                                    </div>
			                                </div>
		                            	</div>
		                            	<div class="col-md-9">
			                                <div class="form-group">
			                                    <label for="username">Username*</label>
			                                    <input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>" type="text" name="username" placeholder="username">
			                                    <div class="invalid-feedback">
			                                        <?php echo form_error('username') ?>
			                                    </div>
			                                </div>

			                                <div class="form-group">
			                                    <label for="email">Email*</label>
			                                    <input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>" type="email" name="email" placeholder="email">
			                                    <div class="invalid-feedback">
			                                        <?php echo form_error('email') ?>
			                                    </div>
			                                </div>

			                                <div class="form-group">
			                                    <label for="password">Password*</label>
			                                    <input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>" type="text" name="password" placeholder="password">
			                                    <div class="invalid-feedback">
			                                        <?php echo form_error('password') ?>
			                                    </div>
			                                </div>

			                                <div class="form-group">
			                                    <label for="no_hp">No Hp*</label>
			                                    <input class="form-control <?php echo form_error('no_hp') ? 'is-invalid':'' ?>" type="text" name="no_hp" placeholder="No Hp">
			                                    <div class="invalid-feedback">
			                                        <?php echo form_error('no_hp') ?>
			                                    </div>
			                                </div>

			                                <label class=" form-control-label">Jenis Kelamin*</label>
			                                <div class="form-group">
			                                	<div class="form-check-inline form-check <?php echo form_error('jenis_kelamin') ? 'is-invalid':'' ?>">
		                                            <input type="radio" id="inline-radio1" name="jenis_kelamin" value="Laki-Laki" class="form-check-input">
		                                            Laki-Laki &nbsp;
		                                            <input type="radio" id="inline-radio2" name="jenis_kelamin" value="Perempuan" class="form-check-input"> 
		                                            Perempuan
		                                        </div>
		                                        <div class="invalid-feedback">
			                                        <?php echo form_error('jenis_kelamin') ?>
			                                    </div>
			                                </div>

			                                <div class="form-group">
	                                            <label for="alamat">Alamat*</label>
	                                            <textarea class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>" name="alamat" placeholder="alamat..."></textarea>
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