<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?= SITE_NAME .": ".ucfirst($this->uri->segment(1)) ." - ". ucfirst($this->uri->segment(2)) ?></title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">

    <style type="text/css">
    	html, body {
		  height: 100%;
		  margin: 0;
		}
		.wrapper {
		  min-height: 100%;
		  margin-bottom: -50px;
		}
		.footer,
		.push {
		  height: 50px;
		}
		.form-control, .radius {
			border-radius: 100px;
			text-align: center;
		}
		.bg-logo{
			background-image: url("<?= base_url('vendor_assets/img/login.png'); ?>");
			height: 100%; 
			  background-position: center;
			  background-repeat: no-repeat;
			  background-size: cover;
		}
    </style>
</head>
<body>
<!-- SIDEBAR -->
<!-- <div class="wrapper"> -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container justify-content-center">
			<a class="navbar-brand " href="<?= base_url(); ?>">
			    <img src="<?= base_url('vendor_assets/img/logo.png'); ?>" height="40" class="d-inline-block align-top" alt="" align="center">
			</a>
		</div>
	</nav>

	<div class="container my-5">
		<div class="card text-center align-items-center">
		  <div class="row no-gutters">
		    <div class="col-md-6">
		       <img height="100%" src="<?= base_url('vendor_assets/img/login.png'); ?>" class="card-img">
		    </div>
		    <div class="col-md-6 align-self-center">
		      <div class="card-body my-auto">
		        <h4 class="card-title text-info"><b>LUPA KATA SANDI ?</b></h4>
		        	<form class="mx-lg-5 mx-md-2 mx-sm-3" method="post" action="<?=base_url('auth/atursandi/'.$user['id_user']); ?>">
                        <?php echo $this->session->flashdata('message'); ?>
					  <div class="form-group">
					    <input required type="password" name="password" class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>" placeholder="Masukkan password" value="<?= set_value('password'); ?>">
					    <div class="invalid-feedback">
	                        <?php echo form_error('password')?>
	                    </div>
					  </div>
					  <div class="form-group">
	                    <input required type="password" name="password2" class="form-control <?php echo form_error('password2') ? 'is-invalid':'' ?>" placeholder="Konfirmasi Password" value="<?= set_value('password2'); ?>">
					    <div class="invalid-feedback">
	                        <?php echo form_error('password2')?>
	                    </div>
	                </div>
					  <button type="submit" class="btn btn-info btn-block radius">Reset Password</button><hr>
					</form>
					<small class="text-dark">Sudah punya akun ?<a href="<?=base_url('login'); ?>" class="text-info">&nbsp;Login</a></small><br>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</body>
</html>