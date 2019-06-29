<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('partial/client/css');?>
    <style type="text/css">
    	#tengah {
    		vertical-align: middle;
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
            		<?php if ($this->session->flashdata('success')): ?>
	                    <div class="alert alert-success" role="alert">
	                        <?php echo $this->session->flashdata('success'); ?>
	                    </div>
                    <?php endif; ?>
                    <?php echo $this->session->flashdata('message'); ?>
            	</div>
            </div>
            <div class="row my-3">
				<div class="col-md-4">
					<div class="card">
						<div class="card-body bg-light">
                            <div class="image">
                                <img class="image-fit rounded" src="<?=base_url('upload/pelanggan/'.$user['foto']); ?>">
                            </div>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<h6><b class="text-dark">Biodata Diri</b></h6>
					<div class="row py-2">
						<div class="col-4">Nama</div>
						<div class="col-8"><?= $user['username'] ?></div>
					</div>
					<div class="row py-2">
						<div class="col-4">Jenis Kelamin</div>
						<div class="col-8"><?= $user['jenis_kelamin'] ?></div>
					</div>
					<div class="row py-2">
						<div class="col-4">Alamat</div>
						<div class="col-8"><?= $user['alamat'] ?></div>
					</div>
					<br>
					<h6><b class="text-dark">Kontak</b></h6>
					<div class="row py-2">
						<div class="col-4">Email</div>
						<div class="col-8"><?= $user['email'] ?></div>
					</div>
					<div class="row py-2">
						<div class="col-4">Nomor HP</div>
						<div class="col-8"><?= $user['no_hp'] ?></div>
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