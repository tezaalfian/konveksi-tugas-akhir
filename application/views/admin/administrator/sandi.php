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
                    	<?php echo $this->session->flashdata('message'); ?>
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                            	<div class="col-lg-6">
                            		<form method="post" action="<?= base_url('admin/administrator/sandi'); ?>">
										<div class="form-group">
											<label>Kata Sandi Lama</label>
											<input type="password" class="form-control" name="old_password" required>
											<div class="invalid-feedback">
								                <?php echo form_error('old_password') ?>
								            </div>
										</div>
										<div class="form-group">
											<label>Masukkan Kata Sandi Baru</label>
											<input type="password" class="form-control" name="new_password1" required>
											<small>* Minimal 8 karakter</small>
											<div class="invalid-feedback">
								                <?php echo form_error('new_password1') ?>
								            </div>
										</div>
										<div class="form-group">
											<label>Ulangi Kata Sandi Baru</label>
											<input type="password" class="form-control" name="new_password2" required>
											<div class="invalid-feedback">
								                <?php echo form_error('new_password2') ?>
								            </div>
										</div>
										<button type="submit" class="btn btn-success">Simpan</button>
									</form>
                            	</div>
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