
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
</head>
<body class="d-flex flex-column">
<div id="page-content">
    <?php $this->load->view('partial/client/header2');?>

        <div class="container my-5">
            <div class="row my-3">
            	<div class="col-md-12">
            		<?php $this->load->view('client/profil/link'); ?>
	                <?php echo $this->session->flashdata('message'); ?>
            	</div>
            </div>
            <div class="row my-3">
				<div class="col-lg-6">
					<form method="post" action="<?= base_url('profil/change_password') ?>">
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
				<div class="col"></div>
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