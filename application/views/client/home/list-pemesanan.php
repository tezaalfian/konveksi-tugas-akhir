
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('partial/client/css');?>
</head>
<body class="d-flex flex-column">
<div id="page-content">
    <?php $this->load->view('partial/client/header2');?>

        <div class="container my-3">
            <div class="row my-2 py-3">
                <div class="col-md-12">
                	<div id="keterangan">
                		<h4 class="text-dark"><b>Pemesanan</b></h4>
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('pemesanan/list'); ?>">All</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('pemesanan/list?filter=2'); ?>">Menunggu Pembayaran</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('pemesanan/list?filter=3'); ?>">Menunggu Konfirmasi</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('pemesanan/list?filter=4'); ?>">Sedang Diproses</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('pemesanan/list?filter=5'); ?>">Pengerjaan Selesai</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('pemesanan/list?filter=6'); ?>">Pemesanan Selesai</a>
                      </li>
                    </ul> 
                </div>
            </div>
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('empty'); ?>
            <?= $this->session->flashdata('message'); ?>
            <div id="filter">
                <?php foreach ($pemesanan as $order) :?>
                    <!-- KALO MASIH BELUM BAYAR -->
                    <?php if($order->status_id == 2) :?>
                        <div class="card my-3">
                          <div class="card-body">
                                <div class="row py-3 d-flex align-items-center">
                                    <div class="col-auto my-sm-3">
                                        <img class="rounded" id="thumbnail" src="<?= base_url('upload/pemesanan/'.$order->desain) ?>">
                                    </div>
                                    <div class="col">
                                        <h5 class="text-dark"><b><?= ucwords($order->nama) ?>&nbsp;/&nbsp;
                                        <?= ucwords($order->deskripsi) ?></b></h5>
                                        <h6 class="">
                                                <b>Rp.&nbsp;<?= number_format($order->harga) ?>&nbsp;</b>
                                                <b><?= $order->jumlah?>&nbsp;Produk&nbsp;
                                                (<?= $order->weight?>&nbsp;gr)</b>
                                        </h6>
                                        <h6>Penerima : <b class="text-dark">&nbsp;<?= $order->nama_penerima?>&nbsp;</b></h6>
                                        <h6><?= $order->alamat?>,&nbsp;<?= $order->kota?>,&nbsp;<?= $order->kode_pos?></b></h6>
                                        <h6>Total : <b class="text-success">Rp.&nbsp;<?= number_format($order->total_tagihan) ?>&nbsp;</b>
                                            |&nbsp;Tanggal Pemesanan :&nbsp;<b><?= $order->tanggal_pemesanan ?></b>
                                        </h6>
                                    </div>
                                    <div class="col-md-3 text-center my-sm-3  my-md-3 mx-md-auto">
                                        <div>
                                            <h6><b class="text-info">&nbsp;<?= ucwords($order->status) ?>&nbsp;</b></h6>
                                            <button data="<?=$order->id_pemesanan ?>" data-toggle="modal" data-target="#mediumModal" class="btn btn-outline-danger btn-block hapus" type="button">Batalkan Pemesanan</button>
                                            <a href="<?= base_url('pembayaran/tambah/'.$order->id_pemesanan); ?>" class="btn btn-info btn-block">Bayar Sekarang</a>
                                        </div>
                                    </div>
                                </div>
                          </div>
                        </div>
                    <?php endif; ?>

                    <!-- KALO UDAH DIBAYAR -->
                    <?php if($order->status_id == 3||$order->status_id == 4||$order->status_id == 5||$order->status_id == 10||$order->status_id == 6) :?>
                        <div class="card my-3">
                            <div class="card-body">
                                <div class="row py-2 border-bottom d-flex align-items-center">
                                    <div class="col-md-6 d-flex flex-column">
                                        <span><b>Kode :&nbsp;</b></span>
                                        <b><span class="text-info"><?= strtoupper($order->id_pemesanan) ?></span></b>
                                    </div>
                                    <div class="col-md-4 d-flex flex-column border-left">
                                        <span><b>Status :&nbsp;</b></span>
                                        <b><span class="text-info"><?= ucwords($order->status) ?></span></b>
                                    </div>
                                    <div class="col-md-2 d-flex flex-column border-left">
                                         <span><b>Total Tagihan :&nbsp;</b></span>
                                        <b><span class="text-info">Rp.&nbsp;<?= number_format($order->total_tagihan) ?></span></b>
                                    </div>
                                </div>
                                    <div class="row py-3 border-bottom d-flex align-items-center">
                                        <div class="col-md-6 d-flex justify-content-start">
                                            <img class="rounded mr-3" id="cover" src="<?= base_url('upload/pemesanan/'.$order->desain) ?>">
                                            <div class="d-flex flex-column">
                                                <h5 class="text-dark"><b><?= ucwords($order->nama) ?></b></h5>
                                                <h5 class="text-dark"><b><?= ucwords($order->deskripsi) ?></b></h5>
                                                <small class="d-flex justify-content-start">
                                                    <b><div class="text-success">Rp.&nbsp;<?= number_format($order->harga) ?>&nbsp;</div></b>
                                                    <b><?= $order->jumlah?>&nbsp;Produk&nbsp;
                                                    (<?= $order->weight?>&nbsp;gr)</b>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-4 d-flex flex-column border-left">
                                            <span><b>Total Harga Produk :&nbsp;</b></span>
                                            <b><span class="text-info">Rp.&nbsp;<?= number_format($order->tagihan) ?>
                                            &nbsp;(<?= $order->berat?>&nbsp;gr)</span></b>
                                        </div>
                                        <div class="col-md-2 d-flex flex-column">
                                            <?php if($order->status_id == 10) :?>
                                                <a href="<?= base_url('pemesanan/diterima/'.$order->id_pemesanan) ?>" class="btn btn-block btn-outline-success">
                                                    Sudah Diterima ?
                                                </a>
                                            <?php endif; ?>
                                            <button data="<?=$order->id_pemesanan ?>" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-info btn-block detail">Lihat Detail</button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>		        
        </div>
    <!-- FOOTER -->
</div>
                    <!-- DETAIL PEMESANAN -->
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content p-3">
                              <div class="modal-header">
                                <h5 class="modal-title text-dark" id="exampleModalCenterTitle">
                                    <b>Detail Pemesanan</b>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="row py-2 border-bottom">
                                    <div class="col-md-6 kode">
                                        
                                    </div>
                                    <div class="col-md-6 border-left">
                                        <small>Tanggal Pemesanan</small>
                                        <h6 class="text-info"><b class="tanggal_pemesanan"></b></h6>
                                        <small>Perkiraan Selesai</small>
                                        <h6 class="text-info"><b class="perkiraan"></b></h6>
                                    </div>
                                </div>
                                <div class="row py-2 my-2 border-bottom">
                                    <div class="col-md-6">
                                        <div class="d-flex justify-content-start produk">
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6 border-left">
                                        <small>Total Harga</small>
                                        <h6 class="text-info"><b class="total_harga"></b></h6>
                                    </div>
                                </div>
                                <div class="row py-2 my-2 border-bottom">
                                    <div class="col-md-6 d-flex flex-column pengiriman">
                                        
                                    </div>
                                    <?php if($order->status_id == 10||$order->status_id == 6) :?>
                                    <div class="col-md-6 d-flex flex-column border-left resi">
                                        <small>No Resi</small>
                                        <h6 class="text-info"><b class="no_resi"></b></h6>
                                        <small>Tanggal Dikirim</small>
                                        <h6 class="text-info"><b class="tanggal_dikirim"></b></h6>
                                    <?php if($order->status_id == 6) :?>
                                        <small>Tanggal Diterima</small>
                                        <h6 class="text-info"><b class="tanggal_diterima"></b></h6>
                                    <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="row py-2 my-2 border-bottom pembayaran">
                                    
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    
                    <!-- HAPUS PEMESANAN -->
                    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="mediumModalLabel">Apakah kamu yakin ?</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        Data yang dihapus tidak akan bisa dikembalikan
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <a href="" class="btn btn-primary delete">Confirm
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php $this->load->view('partial/client/footer');?>
        </div>
    </div>

<!-- LIBRARY JS -->
    <?php $this->load->view('partial/client/js');?>
    <script type="text/javascript">
        var order = "";

        $(".hapus").on("click", function(){
            var link = $(this).attr("data");
            $('.delete').attr("href", "<?= base_url('pemesanan/delete3/'); ?>"+link)
        });

        function makeTimer(tanggal) {

        //      var endTime = new Date("29 April 2018 9:56:00 GMT+01:00");  
            var endTime = new Date(tanggal);          
                endTime = (Date.parse(endTime) / 1000);

                var now = new Date();
                now = (Date.parse(now) / 1000);

                var timeLeft = endTime - now;

                var days = Math.floor(timeLeft / 86400); 
                var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
                var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
                var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
      
                if (hours < "10") { hours = "0" + hours; }
                if (minutes < "10") { minutes = "0" + minutes; }
                if (seconds < "10") { seconds = "0" + seconds; }

                // $("#days").html(days + "<span>Days</span>");
                // $("#hours").html(hours + "<span>Hours</span>");
                // $("#minutes").html(minutes + "<span>Minutes</span>");
                // $("#seconds").html(seconds + "<span>Seconds</span>");

                $('.perkiraan').html(days + " hari "+hours+" jam "+minutes+" menit "+seconds+" detik");
        }

    	$(document).ready(function(){
            $(".detail").on("click", function(){
                var url_get = "<?= base_url('pemesanan/detail/') ?>";
                var id = $(this).attr("data");
                $.ajax({
                    url: url_get+id,
                    type: 'get',
                    dataType: 'json',
                    success: function(result) {
                        order = result;
                        $('.kode').html(
                            "<small>Kode Pemesanan</small>"+
                            "<h6 class='text-info'><b>"+order[0].id_pemesanan.toUpperCase()+
                            "&nbsp;|&nbsp;<a class='text-info' href='<?= base_url('upload/pembayaran/')?>"+order[0].bukti_pembayaran+"' target='_blank'>BUKTI PEMBAYARAN</a></b></h6>"+
                            "<small>Status</small>"+
                            "<h6 class='text-info'><b>"+order[0].status+"</b></h6>"
                        );
                        $('.tanggal_pemesanan').html(order[0].tanggal_pemesanan);
                        $('.perkiraan').html(order[0].perkiraan);
                        // setInterval(function() { makeTimer(order[0].perkiraan); }, 1000);
                        $('.produk').html(
                            "<img class='rounded mr-3' id='cover' src='<?= base_url('upload/pemesanan/')?>"+order[0].desain+"'>"+
                            "<div class='d-flex flex-column'>"+
                            "<small>Data Produk</small>"+
                            "<h6 class='text-info'><b>"+order[0].nama+" / "+
                            order[0].deskripsi+"</b></h6>"+
                            "<small class='d-flex justify-content-start'>"+
                            "<b>"+order[0].jumlah+"&nbsp;Produk&nbsp;"+
                            "("+order[0].weight+"&nbsp;gr)</b>&nbsp;x&nbsp;"+
                            "<b>Rp.&nbsp;"+order[0].harga+"&nbsp;</b></small></div>"
                        );
                        
                        $('.pengiriman').html(
                            "<h6 class='text-info'><b>Pengiriman</b></h6>"+
                            "<small>"+order[0].kurir.toUpperCase()+"</small>"+
                            "<small>Dikirim kepada :&nbsp;<b>"+order[0].nama_penerima+"</b></small>"+
                            "<small>"+order[0].alamat+"</small>"+
                            "<small>Kota&nbsp;"+order[0].kota+","+
                            "Kode pos&nbsp;"+order[0].kode_pos+"</small>"+
                            "<small>"+order[0].provinsi+"</small>"+
                            "<small>Telp :&nbsp;<?= ucwords($order->no_hp) ?></small>"
                        );

                        $('.pembayaran').html(
                            "<div class='col-md-6 d-flex flex-column'>"+
                                "<h6 class='text-info'><b>Pembayaran</b></h6>"+
                                "<small>Total Harga&nbsp;("+order[0].jumlah+"&nbsp;produk)</small>"+
                                "<small>Total Ongkos Kirim&nbsp;("+order[0].berat+"&nbsp;gram)</small>"+
                                "<small>Total Pembayaran</small>"+
                                "<small>Total Tagihan</small>"+
                            "</div>"+
                            "<div class='col-md-6 d-flex flex-column border-left'>"+
                                "<h6 class='text-info'><b>Ket.</b></h6>"+
                                "<small><b>Rp.&nbsp;"+order[0].tagihan+"</b></small>"+
                                "<small><b>Rp.&nbsp;"+order[0].ongkir+"</b></small>"+
                                "<small><b>Rp.&nbsp;"+order[0].nominal+"</b></small>"+
                                "<small><b class='text-info'>Rp.&nbsp;"+order[0].total_tagihan+"</b></small>"+
                            "</div>"
                        );

                        $('.total_harga').html("Rp. "+order[0].tagihan);
                        $('.no_resi').html(order[0].no_resi);
                        $('.tanggal_diterima').html(order[0].tanggal_diterima);
                        $('.tanggal_dikirim').html(order[0].tanggal_dikirim);
                    }
                });
            });
        });
        
        $('.nav-link').on('click', function(){
            var url_get = "<?= base_url('pemesanan/list') ?>";
            var id = $(this).attr("data");
                $.ajax({
                    url: url_get+id,
                    type: 'get',
                    dataType: 'json',
                    success: function(result) {
                        $('.nav-link').removeClass('active');
                        $(this).addClass('active');
                    }
                });
        });
    	
    </script>
    
</body>
</html>