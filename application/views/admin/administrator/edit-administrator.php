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
                                <a href="<?= base_url('admin/administrator'); ?>">
	                                <button type="button" class="btn btn-info">
	                                    <i class="fa fa-angle-left"></i>&nbsp; Kembali
	                                </button>
                            	</a>
                            </div>
                            <div class="card-body">
		                        <form action="<?= base_url('admin/administrator/edit/').$administrator->id_administrator;?>" method="post" enctype="multipart/form-data">
		                            <div class="row">
		                                <div class="col-md-3">
			                                <div class="form-group">
		                                		<label for="foto">Foto</label>
		                            			<img src="<?=base_url('upload/administrator/'.$administrator->foto); ?>" class="img-thumbnail">
			                                	<input type="hidden" name="old_foto" value="<?= $administrator->foto ?>"/>
			                                	<div class="custom-file">
	                                              <input type="file" class="custom-file-input <?php echo form_error('foto') ? 'is-invalid':'' ?>" id="customFilen" name="foto" value="<?= $administrator->foto ?>">
	                                              <label class="custom-file-label" for="customFile">Choose file</label>
	                                            </div>
			                                    <div class="invalid-feedback">
			                                        <?php echo form_error('foto')?>
			                                    </div>
			                                </div>
		                            	</div>
		                            	<div class="col-md-9">
		                            		<input type="hidden" name="id_administrator" value="<?php echo $administrator->id_administrator?>" />
			                                <div class="form-group">
			                                    <label for="nama">Nama*</label>
			                                    <input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" type="nama" name="nama" placeholder="nama" value="<?= $administrator->nama ?>">
			                                    <div class="invalid-feedback">
			                                        <?php echo form_error('nama') ?>
			                                    </div>
			                                </div>

			                                <div class="form-group">
			                                    <label for="username">Username*</label>
			                                    <input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>" type="text" name="username" placeholder="username" value="<?= $administrator->username ?>">
			                                    <div class="invalid-feedback">
			                                        <?php echo form_error('username') ?>
			                                    </div>
			                                </div>

			                                <div class="form-group">
			                                    <label for="password">Password*</label>
			                                    <input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>" type="text" name="password" placeholder="password" value="<?= $administrator->password ?>">
			                                    <div class="invalid-feedback">
			                                        <?php echo form_error('password') ?>
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