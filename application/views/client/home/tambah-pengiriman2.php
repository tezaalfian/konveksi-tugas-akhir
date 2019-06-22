<?php var_dump($kota); ?>
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

        <div class="container">
            <div class="row py-3">
                <div class="col-md-8">
                	<h4 class="text-dark"><b>Checkout</b></h4>
                	<h5 class="text-dark">Alamat Pengiriman</h5><hr>
                	<form action="" method="post" enctype="multipart/form-data">
                		<div class="form-group">
                			<label for="harga">Label Alamat</label>
			                <input class="form-control" type="text" name="label" placeholder="Alamat Rumah, Alamat Kantor, dll">
                		</div>
                		<div class="row">
                			<div class="col-sm-6">
                				<div class="form-group">
		                			<label for="harga">Nama Penerima</label>
					                <input class="form-control" type="text" name="label" value="<?= $pemesanan[0]->username ?>">
		                		</div>
                			</div>
                			<div class="col-sm-6">
                				<div class="form-group">
		                			<label for="harga">Nomor Telpon Penerima</label>
					                <input class="form-control" type="text" name="label" value="<?= $pemesanan[0]->no_hp ?>">
		                		</div>
                			</div>
                		</div>
                		<div class="row">
                			<div class="col-sm-6">
                				<div class="form-group">
		                			<label for="pelanggan">Provinsi</label>
			                		<select name="provinsi" id="provinsi" class="form-control"></select>
		                		</div>
                			</div>
                			<div class="col-sm-6">
                				<div class="form-group">
		                			<label for="pelanggan">Kota</label>
			                		<input name="kode_pos" id="pos" class="form-control">
		                		</div>
                			</div>
                		</div>
                		<div class="row">
                			<div class="col-sm-12">
                				<div class="form-group">
		                			<label for="pelanggan">Alamat</label>
			                		<textarea name="provinsi" id="provinsi" class="form-control"></textarea>
		                		</div>
                			</div>
                		</div>
                </div>
                <div class="col-md-4 d-flex  align-items-start justify-content-end">
                	<div class="card" style="width: 100%;">
						<div class="card-body">
							<h5 class="card-title text-dark"><b>Ringkasan Belanja</b></h5>
							<ul class="list-inline">
								<li class="list-inline-item">Jumlah Barang :</li>
								<li class="list-inline-item float-right"><?= $pemesanan[0]->jumlah ?></li>
							</ul>
							<ul class="list-inline">
								<li class="list-inline-item">Total Harga :</li>
								<li class="list-inline-item float-right">Rp.&nbsp;<?= $pemesanan[0]->tagihan ?></li>
							</ul>
							<ul class="list-inline">
								<li class="list-inline-item">Ongkos Kirim :</li>
								<li class="list-inline-item float-right" name="ongkir" id="ongkir"></li>
							</ul><hr>
							<ul class="list-inline">
								<li class="list-inline-item">Total Tagihan :</li>
								<li class="list-inline-item float-right" name="total_tagihan" id="total_tagihan"></li>
							</ul>
							<button class="btn btn-info btn-block" type="submit" name="btn">Lanjut ke Pembayaran</button>
						</div>
					</div>
					</form>
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
    <!-- <script type="text/javascript">
    	var provinsi = <?= $provinsi ?>;
    	var prov = "";
    	var id_prov = "";
    	var province = document.getElementById('provinsi');

    	prov += "<option></option>";

    	for (var i = provinsi.rajaongkir.results.length - 1; i >= 0; i--) {
    		prov += "<option>"+provinsi.rajaongkir.results[i].province+"</option>";
    		id_prov = provinsi.rajaongkir.results[i].province_id;
    	}
    	province.innerHTML = prov;
    </script> -->

    <script type="text/javascript">
    	var provinsi = <?= $provinsi ?>;
    	var prov = "";
    	var id_prov = 0;
    	var id;
    	var kota = "";

    	var url = 'Ys1cV1dhiLseSm0E4nFzzqJBFvAzzCw60FJ1wNTZ6Z8dxjVAfC';
    	prov += "<option></option>";

    	for (var i = provinsi.rajaongkir.results.length - 1; i >= 0; i--) {
    		prov += "<option value='"+provinsi.rajaongkir.results[i].province_id+"'>"+provinsi.rajaongkir.results[i].province+"</option>";
    	}

    	$('#provinsi').html(prov);

    	$('#provinsi').on('change', function() {
    		id = $('#provinsi option:selected').val();
	    	$.ajax({
	    		url:'https://api.rajaongkir.com/starter/city',
	    		headers: { 
	    			"content-type": "application/json",	
				},
	    		type: 'get',
	    		dataType: 'json',
	    		data: {
	    			'key': '6b2693fdcd367bfa028faa8e9e69b3ff',
	    			'province': id 
	    		},
	    		success: function(kota) {
	    			console.log(kota);
	    		}
	    	});
    	});

    		$.ajax({
	    		url:'https://x.rajaapi.com/poe',

	    		type: 'get',
	    		dataType: 'json',

	    		success: function(kota) {
	    			console.log(kota);
	    		}
	    	});
    </script>
    
</body>
</html>