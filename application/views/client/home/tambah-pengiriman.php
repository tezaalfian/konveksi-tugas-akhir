<?php var_dump($produk); ?>
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
                <div class="col-lg-8">
                	<h4 class="text-dark"><b>Checkout</b></h4>
                	<h5 class="text-dark">Alamat Pengiriman</h5><hr>
                	<form action="<?= base_url('home/pengiriman/'.$pemesanan[0]->id_pemesanan) ?>" method="post" enctype="multipart/form-data">
                		<div class="form-group">
                			<label for="harga">Label Alamat</label>
			                <input class="form-control" type="text" name="label" placeholder="Alamat Rumah, Alamat Kantor, dll">
                		</div>
                		<div class="row">
                			<div class="col-sm-6">
                				<div class="form-group">
		                			<label for="harga">Nama Penerima</label>
					                <input class="form-control" type="text" name="nama_penerima" value="<?= $pemesanan[0]->username ?>">
		                		</div>
                			</div>
                			<div class="col-sm-6">
                				<div class="form-group">
		                			<label for="harga">Nomor Telpon Penerima</label>
					                <input class="form-control" type="text" name="no_hp" value="<?= $pemesanan[0]->no_hp ?>">
		                		</div>
                			</div>
                		</div>
                		<div class="row">
                			<div class="col-sm-4">
                				<div class="form-group">
		                			<label for="pelanggan">Provinsi</label>
			                		<select name="provinsi" id="provinsi" class="form-control"></select>
		                		</div>
                			</div>
                			<div class="col-sm-4">
                				<div class="form-group">
		                			<label for="pelanggan">Kota / Kabupaten</label>
			                		<select name="kota" id="kota" class="form-control"></select>
		                		</div>
                			</div>
                			<div class="col-sm-4">
                				<div class="form-group">
		                			<label for="pelanggan">Kode Pos</label>
			                		<input name="kode_pos" id="kode_pos" class="form-control">
		                		</div>
                			</div>
                			
                		</div>
                		<div class="row">
                			<div class="col-sm-8">
                				<div class="form-group">
		                			<label for="pelanggan">Alamat</label>
			                		<textarea name="provinsi" id="alamat" class="form-control"></textarea>
		                		</div>
                			</div>
                			<div class="col-sm-4">
                				<div class="form-group">
		                			<label for="pelanggan">Kurir</label>
			                		<select name="kurir" id="kurir" class="form-control"></select>
		                		</div>
                			</div>
                		</div>
                </div>
                <div class="col-lg-4 d-flex  align-items-start justify-content-end">
                	<div class="card" style="width: 100%;">
						<div class="card-body">
							<h5 class="card-title text-dark"><b>Ringkasan Belanja</b></h5>
							<ul class="list-inline">
								<li class="list-inline-item">Jenis Barang :</li>
								<li class="list-inline-item float-right"><?= $pemesanan[0]->nama ?></li>
							</ul>
							<ul class="list-inline">
								<li class="list-inline-item">Total Harga :&nbsp;(<?= $pemesanan[0]->jumlah ?>&nbsp;item)</li>
								<li class="list-inline-item float-right">Rp.&nbsp;<?= $pemesanan[0]->tagihan ?></li>
							</ul>
							<ul class="list-inline">
								<li class="list-inline-item">Berat :</li>
								<li class="list-inline-item float-right"><?= $pemesanan[0]->berat ?>&nbsp;gram</li>
							</ul>
							<ul class="list-inline">
								<li class="list-inline-item">Ongkos Kirim :</li>
								<li class="list-inline-item float-right" name="ongkir" id="ongkir">Rp. 012000</li>
							</ul><hr>
							<ul class="list-inline">
								<li class="list-inline-item text-dark"><b>Total Tagihan :</b></li>
								<input class="list-inline-item float-right" name="total_tagihan" id="total_tagihan" value="Rp. 20.000.000" readonly>
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
    	var allKota = <?= $kota ?>;
    	var produk = <?= $produk ?>;
    	var prov = "";
    	var id_prov = 0;
    	var getId_prov;
    	var getId_kota;
    	var kota = "";
    	var list_kota = "";
    	var list_pos = "";

    	for (var i = provinsi.rajaongkir.results.length - 1; i >= 0; i--) {
    		prov += "<option value='"+provinsi.rajaongkir.results[i].province_id+"'>"+provinsi.rajaongkir.results[i].province+"</option>";
    	}

    	$('#provinsi').html(prov);

    	for (var i = allKota.rajaongkir.results.length - 1; i >= 0; i--) {
	    	list_kota += "<option value='"+allKota.rajaongkir.results[i].city_id+"'>"+allKota.rajaongkir.results[i].type+" "+allKota.rajaongkir.results[i].city_name+"</option>";
	    }
	    $('#kota').html(list_kota);

    	$('#provinsi').on('change', function() {
    		getId_prov = $('#provinsi option:selected').val();
    		var url_get = "<?= base_url('home/kota/'); ?>";
	    	$.ajax({
	    		url: url_get+getId_prov,
	    		type: 'get',
	    		dataType: 'json',
	    		success: function(result) {
	    			kota = result;
	    			list_kota = "";
	    			for (var i = kota.rajaongkir.results.length - 1; i >= 0; i--) {
	    				list_kota += "<option value='"+kota.rajaongkir.results[i].city_id+"'>"+kota.rajaongkir.results[i].type+" "+kota.rajaongkir.results[i].city_name+"</option>";
	    			}
	    			$('#kota').html(list_kota);
	    		}
	    	});
    	});

    	$('#kota').on('change', function(){
    		getId_prov = $('#provinsi option:selected').val();
    		getId_kota = $('#kota option:selected').val();
    		var url_get = "<?= base_url('home/cost/'); ?>";
    		$.ajax({
	    		url: url_get,
	    		type: 'post',
	    		dataType: 'json',
	    		contentType: "application/json",
	    		data: {
	    			'origin': '431',
	    			'destination': getId_kota,
	    			'weight': produk[0].berat,
	    			'courier': 'jne'
	    		},
	    		success: function(result) {
	    			console.log(result);
	    		}
	    	});
    	});

    </script>
    
</body>
</html>