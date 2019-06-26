
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
                            <a href="<?= base_url('admin/pengiriman'); ?>">
                                <button type="button" class="btn btn-info">
                                    <i class="fa fa-angle-left"></i>&nbsp; Kembali
                                </button>
                            </a>
                        </div>
                        <div class="card-body">
                        	<div class="row">
                        	<div class="col-lg-7">
			                    <form action="<?= base_url('admin/pengiriman/edit/'.$pemesanan[0]->id_pemesanan) ?>" method="post" enctype="multipart/form-data">
			                        <input type="hidden" name="pemesanan_id" value="<?= $pemesanan[0]->id_pemesanan?>">
			                        <!-- <input type="hidden" name="Id_pengiriman" value="<?= $pemesanan[0]->id_pengiriman?>"> -->
			                        <div class="form-group">
			                            <label for="harga">Label Alamat</label>
			                            <input class="form-control" type="text" name="label" placeholder="Alamat Rumah, Alamat Kantor, dll" value="<?= $pemesanan[0]->label ?>">
			                            <div class="invalid-feedback">
			                                <?php echo form_error('label')?>
			                            </div>
			                        </div>
			                        <div class="row">
			                            <div class="col-sm-6">
			                                <div class="form-group">
			                                    <label for="harga">Nama Penerima</label>
			                                    <input class="form-control" type="text" name="nama_penerima" value="<?= $pemesanan[0]->username ?>">
			                                    <div class="invalid-feedback">
			                                        <?php echo form_error('nama_penerima')?>
			                                    </div>
			                                </div>
			                            </div>
			                            <div class="col-sm-6">
			                                <div class="form-group">
			                                    <label for="harga">Nomor Telpon Penerima</label>
			                                    <input class="form-control" type="text" name="no_hp" value="<?= $pemesanan[0]->no_hp ?>">
			                                    <div class="invalid-feedback">
			                                        <?php echo form_error('no_hp')?>
			                                    </div>
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
			                                    <input name="kode_pos" id="kode_pos" class="form-control"value="<?= $pemesanan[0]->kode_pos ?>">
			                                </div>
			                            </div>
			                            
			                        </div>
			                        <div class="row">
			                            <div class="col-sm-8">
			                                <div class="form-group">
			                                    <label for="pelanggan">Alamat</label>
			                                    <textarea name="alamat" id="alamat" class="form-control"><?= $pemesanan[0]->alamat ?></textarea>
			                                    <div class="invalid-feedback">
			                                        <?php echo form_error('alamat')?>
			                                    </div>
			                                </div>
			                            </div>
			                            <div class="col-sm-4">
			                                <div class="form-group">
			                                    <label for="pelanggan">Kurir</label>
			                                    <select id="kurir" class="form-control"></select>
			                                    <input type="hidden" name="kurir" id="kurir_paket">
			                                </div>
			                            </div>
			                        </div>
			                </div>
			                <div class="col-lg-5 d-flex  align-items-start justify-content-end">
			                    <div class="card" style="width: 100%;">
			                        <div class="card-body">
			                            <h5 class="card-title text-dark"><b>Ringkasan Belanja</b></h5>
			                            <div class="row py-2">
			                                <div class="col-auto">Total Harga :&nbsp;(<?= $pemesanan[0]->jumlah ?>&nbsp;item)</div>
			                                <div class="col text-right">Rp.&nbsp;<?= $pemesanan[0]->tagihan ?></div>
			                            </div>
			                            <div class="row py-2">
			                                <div class="col-auto">Berat :</div>
			                                <div class="col text-right"><?= $pemesanan[0]->berat ?>&nbsp;gram</div>
			                            </div>
			                            <div class="row">
			                                <div class="col-6">
			                                    <label for="ongkir" class="col-form-label">Ongkos Kirim :</label>
			                                </div>
			                                <div class="col-6">
			                                    <input style="text-align: right;" type="text" class="form-control-plaintext" name="ongkir" id="ongkir" value="<?= $pemesanan[0]->ongkir ?>" readonly>
			                                </div>
			                            </div><hr>
			                            <div class="row">
			                                <div class="col-6">
			                                    <label for="total_tagihan" class="col-form-label"><b>Total Tagihan :</b></label>
			                                </div>
			                                <div class="col-6">
			                                    <input style="text-align: right;" type="text" class="form-control-plaintext" name="total_tagihan" id="total_tagihan" value="<?= $pemesanan[0]->total_tagihan ?>" readonly>
			                                </div>
			                            </div><br>
			                            <button class="btn btn-info btn-block" type="submit">Simpan Perubahan</button>
			                        </div>
			                    </div>
			                    </form>
			                </div>
                        	</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- END CONTENT -->

    <!-- FOOTER -->
        <?php $this->load->view('partial/admin/footer');?>
    </div>

<!-- LIBRARY JS -->

    <?php $this->load->view('partial/client/js');?>

    <script type="text/javascript">
    	var provinsi = <?= $provinsi ?>;
    	var allKota = <?= $kota ?>;
    	var produk = <?= $produk ?>;
    	var prov = "";
    	var id_prov = 0;
    	var getId_prov;
    	var getId_kota;
    	var kota = "";
    	var cost = "";
    	var list_kota = "";
    	var list_pos = "";
    	var list_kurir = "";

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

	    			list_kurir = "";
	    			for (var i = cost.rajaongkir.results[0].costs.length - 1; i >= 0; i--) {
	    				list_kurir += "<option value='"+cost.rajaongkir.results[0].costs[i].cost[0].value+"'>"+cost.rajaongkir.results[0].code+" - "+cost.rajaongkir.results[0].costs[i].service+" "+cost.rajaongkir.results[0].costs[i].cost[0].etd+" Hari"+"</option>";
	    			}
	    			$('#kurir').html(list_kurir);
	    			var ongkir = $('#kurir option:selected').val();
		    		$('#ongkir').val(ongkir);
		    		$('#total_tagihan').val(parseInt(produk[0].tagihan) + parseInt($('#ongkir').val()));
		    		$('#kurir_paket').val("");
		    		$('#kurir_paket').val($('#kurir option:selected').html());
	    		}
	    	});
    	});

    	$('#kota').on('change', function(){
    		getId_prov = $('#provinsi option:selected').val();
    		getId_kota = $('#kota option:selected').val();
    		var url_get = "<?= base_url('home/cost/'); ?>";
    		$.ajax({
	    		url: url_get+getId_kota+"/"+produk[0].berat,
	    		type: 'post',
	    		dataType: 'json',
	    		success: function(result) {
	    			console.log(result);
	    			cost = result;
	    			list_kurir = "";
	    			for (var i = cost.rajaongkir.results[0].costs.length - 1; i >= 0; i--) {
	    				list_kurir += "<option value='"+cost.rajaongkir.results[0].costs[i].cost[0].value+"'>"+cost.rajaongkir.results[0].code+" - "+cost.rajaongkir.results[0].costs[i].service+" "+cost.rajaongkir.results[0].costs[i].cost[0].etd+" Hari"+"</option>";
	    			}
	    			$('#kurir').html(list_kurir);
	    			var ongkir = $('#kurir option:selected').val();
		    		$('#ongkir').val(ongkir);
		    		$('#total_tagihan').val(parseInt(produk[0].tagihan) + parseInt($('#ongkir').val()));
		    		$('#kurir_paket').val("");
		    		$('#kurir_paket').val($('#kurir option:selected').html());
	    		}
	    	});
    	});

    	$('#kurir').on('change', function(){
    		 var ongkir = $('#kurir option:selected').val();
    		 $('#ongkir').val(ongkir);
    		 $('#total_tagihan').val(parseInt(produk[0].tagihan) + parseInt($('#ongkir').val()));
    		 $('#kurir_paket').val("");
    		 $('#kurir_paket').val($('#kurir option:selected').html());
    	});

</script>

</body>
</html>