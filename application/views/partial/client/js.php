    <script src="<?= base_url('vendor_assets/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('vendor_assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('vendor_assets/bootstrap/js/sb-admin-2.min.js'); ?>"></script>
    <script src="<?= base_url('vendor_assets/bootstrap/js/jquery.easing.min.js'); ?>"></script>

    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );

        $('.custom-file-input').on('change', function(){
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>

    <script type="text/javascript">
        var string = "";
        var result = <?= $produk ?>;

        var pelanggan = document.getElementById('pelanggan');
        var jenis_produk = document.getElementById('produk');
        var harga = document.getElementById('harga');
        var s = document.getElementById('size1');
        var m = document.getElementById('size2');
        var l = document.getElementById('size3');
        var xl = document.getElementById('size4');
        var xxl = document.getElementById('size5');
        var xxxl = document.getElementById('size6');        
        var jumlah = document.getElementById('jumlah');
        var tagihan = document.getElementById('tagihan');
        var catatan = document.getElementById('ket_ukuran');
        var catatan2 = document.getElementById('catatan2');
        var allCatatan = document.getElementById('catatan');
        var ukuran = document.getElementsByClassName('ukuran');

        string += "<option> Silahkan pilih </option>";

        for(value in result){
            string += "<option>"+ result[value].nama +"</option>";
        }
          
        jenis_produk.innerHTML = string;

        jenis_produk.addEventListener('change', (event) => {
            harga.value = result[jenis_produk.selectedIndex-1].harga;
            jumlah.value = parseInt(s.value) + parseInt(m.value) + parseInt(l.value) + parseInt(xl.value) +parseInt(xxl.value) +parseInt(xxxl.value);
            tagihan.value = parseInt(jumlah.value) * parseInt(harga.value);
        });

        s.addEventListener('change', (event)=>{
            jumlah.value = parseInt(s.value) + parseInt(m.value) + parseInt(l.value) + parseInt(xl.value) +parseInt(xxl.value) +parseInt(xxxl.value);
            tagihan.value = parseInt(jumlah.value) * parseInt(harga.value);
            // catatan.value = "KETERANGAN UKURAN : S = "+s.value+", M = "+m.value+", L = "+l.value+", XL = "+xl.value+", XXL = "+xxl.value+", XXXL = "+xxxl.value+" | ";
            // allCatatan.value = catatan.value + catatan2.value;
        });

        // m.addEventListener('change', (event)=>{
        //     jumlah.value = parseInt(s.value) + parseInt(m.value) + parseInt(l.value) + parseInt(xl.value) +parseInt(xxl.value) +parseInt(xxxl.value);
        //     tagihan.value = parseInt(jumlah.value) * parseInt(harga.value);
        //     // catatan.value = "KETERANGAN UKURAN : S = "+s.value+", M = "+m.value+", L = "+l.value+", XL = "+xl.value+", XXL = "+xxl.value+", XXXL = "+xxxl.value+" | ";
        //     // allCatatan.value = catatan.value + catatan2.value;
        // });
        // l.addEventListener('change', (event)=>{
        //     jumlah.value = parseInt(s.value) + parseInt(m.value) + parseInt(l.value) + parseInt(xl.value) +parseInt(xxl.value) +parseInt(xxxl.value);
        //     tagihan.value = parseInt(jumlah.value) * parseInt(harga.value);
        //     // catatan.value = "KETERANGAN UKURAN : S = "+s.value+", M = "+m.value+", L = "+l.value+", XL = "+xl.value+", XXL = "+xxl.value+", XXXL = "+xxxl.value+" | ";
        //     // allCatatan.value = catatan.value + catatan2.value;
        // });
        // xl.addEventListener('change', (event)=>{
        //     jumlah.value = parseInt(s.value) + parseInt(m.value) + parseInt(l.value) + parseInt(xl.value) +parseInt(xxl.value) +parseInt(xxxl.value);
        //     tagihan.value = parseInt(jumlah.value) * parseInt(harga.value);
        //     // catatan.value = "KETERANGAN UKURAN : S = "+s.value+", M = "+m.value+", L = "+l.value+", XL = "+xl.value+", XXL = "+xxl.value+", XXXL = "+xxxl.value+" | ";
        //     // allCatatan.value = catatan.value + catatan2.value;
        // });
        // xxl.addEventListener('change', (event)=>{
        //     jumlah.value = parseInt(s.value) + parseInt(m.value) + parseInt(l.value) + parseInt(xl.value) +parseInt(xxl.value) +parseInt(xxxl.value);
        //     tagihan.value = parseInt(jumlah.value) * parseInt(harga.value);
        //     // catatan.value = "KETERANGAN UKURAN : S = "+s.value+", M = "+m.value+", L = "+l.value+", XL = "+xl.value+", XXL = "+xxl.value+", XXXL = "+xxxl.value+" | ";
        //     // allCatatan.value = catatan.value + catatan2.value;
        // });
        // xxxl.addEventListener('change', (event)=>{
        //     jumlah.value = parseInt(s.value) + parseInt(m.value) + parseInt(l.value) + parseInt(xl.value) +parseInt(xxl.value) +parseInt(xxxl.value);
        //     tagihan.value = parseInt(jumlah.value) * parseInt(harga.value);
        //     // catatan.value = "KETERANGAN UKURAN : S = "+s.value+", M = "+m.value+", L = "+l.value+", XL = "+xl.value+", XXL = "+xxl.value+", XXXL = "+xxxl.value+" | ";
        //     // allCatatan.value = catatan.value + catatan2.value;
        // });

        catatan2.addEventListener('change', (event)=>{
            allCatatan.value = catatan.value + catatan2.value;  
        });

    </script>

    