
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('partial/client/css');?>
    <style type="text/css">
    	#tengah {
    		vertical-align: middle;
    	}
    	#ongkir, #total_tagihan {
    		text-align: right;
    	}
    </style>
</head>
<body class="d-flex flex-column">
<div id="page-content">
    <?php $this->load->view('partial/client/header2');?>

        <div class="container">
            <div class="row my-5">
                <div class="col"></div>
                <div class="col-lg-6 col-md-8">
                	<div class="card">
					  <h5 class="card-header bg-info text-white text-center"><b>PEMBAYARAN</b></h5>
					  <div class="card-body">
					  	<div class="text-center">
					  		<img class="my-4" src="https://image.flaticon.com/icons/svg/164/164436.svg" width="50%">
					  	</div>
						<p class="card-title text-dark"><b>Jumlah yang harus dibayar :</b></p>
						<h5 class="text-success"><b>Rp.&nbsp;<?= $pembayaran->total_tagihan ?></b></h5><hr>
					    <h6 class="card-title text-dark"><b>Cara Pembayaran</b></h6>
					    <ul>
					    	<li>Pembayaran dilakukan melalui transfer ke Bank BNI Syari'ah dengan 
					    		<b>No. Rekening : 0238272088 </b>atas Nama : <b>Ahmad Mahmud.</b> </li>
					    	<li>Jumlah pembayaran harus sesuai dengan total tagihan.</li>
					    	<li>Setelah melakukan transfer silahkan upload bukti pembayaran ke form berikut.</li>
					    	<li>Pesanan anda akan dilanjutkan setelah dikonfirmasi oleh pihak kami.</li>
					    </ul><hr>
					    <h6 class="card-title text-dark"><b>Upload Bukti Pembayaran</b></h6>
					    <form method="post" action="<?= base_url('pembayaran/tambah/'.$pembayaran->pemesanan_id); ?>" enctype="multipart/form-data">
					    	<input type="hidden" name="pemesanan_id" value="<?= $pembayaran->pemesanan_id ?>">
					    	<div class="input-group">
							  <div class="custom-file">
							    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="bukti_pembayaran" accept=".jpg,.jpeg,.png">
							    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
							  </div>
							  <div class="input-group-append">
							    <button class="btn btn-outline-dark" type="submit" id="inputGroupFileAddon04">Kirim</button>
							  </div>
							</div>
							<small class="text-danger"><i>* File ekstensi yang diperbolehkan : PNG, JPG, JPEG</i></small><br>
							<?= $this->session->flashdata("salah"); ?>
					    </form>
					  </div>
					</div>
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