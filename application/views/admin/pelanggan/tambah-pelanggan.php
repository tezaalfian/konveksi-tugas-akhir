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
		                                <div class="col-md-4">
		                                <div class="card" style="border: solid #d4d4d4 1px;">
		                                	<div class="card-body">
			                                <div class="form-group">
		                            			<img src="<?=base_url('upload/pelanggan/default.jpg'); ?>" class="img-thumbnail"><br><br>
			                                    <div class="custom-file">
	                                              <input type="file" class="custom-file-input" id="customFilen" name="foto" accept=".jpg,.jpeg,.png">
	                                              <label class="custom-file-label" for="customFile">Pilih Foto</label>
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
			                                <div class="form-group">
			                                    <label for="username">Username*</label>
			                                    <input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>" type="text" name="username" placeholder="username" value="<?= set_value('username'); ?>">
			                                    <div class="invalid-feedback">
			                                        <?php echo form_error('username') ?>
			                                    </div>
			                                </div>

			                                <div class="form-group">
			                                    <label for="email">Email*</label>
			                                    <input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>" type="email" name="email" placeholder="email" value="<?= set_value('email'); ?>">
			                                    <div class="invalid-feedback">
			                                        <?php echo form_error('email') ?>
			                                    </div>
			                                </div>

			                                <div class="form-group">
			                                    <label for="password">Password*</label>
			                                    <input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>" type="password" name="password" placeholder="password">
			                                    <div class="invalid-feedback">
			                                        <?php echo form_error('password') ?>
			                                    </div>
			                                </div>

			                                <div class="form-group">
			                                    <label for="no_hp">No Hp</label>
			                                    <input class="form-control <?php echo form_error('no_hp') ? 'is-invalid':'' ?>" type="text" name="no_hp" placeholder="No Hp" value="<?= set_value('no_hp'); ?>">
			                                    <div class="invalid-feedback">
			                                        <?php echo form_error('no_hp') ?>
			                                    </div>
			                                </div>

			                                <label class=" form-control-label">Jenis Kelamin*</label>
			                                <div class="form-group">
			                                	<div class="form-check-inline form-check <?php echo form_error('jenis_kelamin') ? 'is-invalid':'' ?>">
		                                            <input type="radio" id="inline-radio1" name="jenis_kelamin" value="Laki-Laki" class="form-check-input" value="<?= set_value('jenis_kelamin'); ?>">
		                                            Laki-Laki &nbsp;
		                                            <input type="radio" id="inline-radio2" name="jenis_kelamin" value="Perempuan" class="form-check-input" value="<?= set_value('jenis_kelamin'); ?>">
		                                            Perempuan
		                                            <input type="radio" id="inline-radio2" name="jenis_kelamin" value=" " class="form-check-input hidden" checked>
		                                        </div>
		                                        <div class="invalid-feedback">
			                                        <?php echo form_error('jenis_kelamin') ?>
			                                    </div>
			                                </div>

			                                <div class="form-group">
	                                            <label for="alamat">Alamat</label>
	                                            <textarea class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>" name="alamat" placeholder="alamat..."><?= set_value('alamat'); ?></textarea>
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