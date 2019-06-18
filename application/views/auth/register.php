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
		/*.card-img {
			max-height: 100%;
			width: auto;
		}
*/    </style>
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
		        <h4 class="card-title text-info"><b>DAFTAR</b></h4>

		        	<form class="mx-lg-5 mx-md-1 mx-sm-3" method="post" action="<?=base_url('register'); ?>">
					  <div class="form-group">
					    <input type="text" class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>" name="email" placeholder="Alamat email" value="<?= set_value('email'); ?>">
						  <div class="invalid-feedback">
	                        <?php echo form_error('email')?>
	                      </div>
					  </div>

					  <div class="form-group">
					    <input type="text" class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>" placeholder="Username" name="username" value="<?= set_value('username'); ?>">
					    <div class="invalid-feedback">
	                        <?php echo form_error('username')?>
	                    </div>
					  </div>

					  <div class=" row">
					  	<div class="form-group col-md-6">
					    	<input type="password" class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>" placeholder="Password" name="password">
					    	<div class="invalid-feedback">
		                        <?php echo form_error('password')?>
		                    </div>
					  	</div>					   
					  	<div class="form-group col-md-6">
					    	<input type="password" class="form-control" placeholder="Ulangi Password" name="password1">
					    	<div class="invalid-feedback">
		                        <?php echo form_error('password1')?>
		                    </div>
					  	</div>
					  </div>
					  <button type="submit" class="btn btn-info btn-block radius">Daftar</button><hr>
					</form>
					<small class="text-dark">Sudah punya akun ?<a href="<?=base_url('login'); ?>" class="text-info">&nbsp;Masuk</a></small>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
<!-- LIBRARY JS -->
<!-- <div class="push"></div>
</div>
    <footer class="footer">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
	        <div class="container">
			  <strong>Copyright &copy;&nbsp;<a href="<?=base_url();?>"><?php echo SITE_NAME ." ". Date('Y') ?></a>.</strong>&nbsp; All rights reserved.

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			  </div>
			  <form class="form-inline">
			    <div>Designed by Teza Alfian</div>
			  </form>
			</div>
		</nav>
    </footer> -->
</body>
</html>