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