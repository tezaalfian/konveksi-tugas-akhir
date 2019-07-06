
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
                        <div class="card">
                            <div class="card-header">
                                <?php if ($this->session->flashdata('success')): ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($this->session->flashdata('gagal')): ?>
                                    <?php echo $this->session->flashdata('gagal'); ?>
                                <?php endif; ?>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kode Pemesanan</th>
                                            <th>Pembayaran</th>
                                            <th>Total Tagihan</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pembayaran as $order): ?>
                                            <tr>
                                                <td>
                                                    <?php echo strtoupper($order->pemesanan_id); ?>
                                                </td>
                                                <td>
                                                    Rp.&nbsp;<?= number_format($order->nominal) ?>
                                                </td>
                                                <td>
                                                    Rp.&nbsp;<?= number_format($order->total_tagihan) ?>
                                                </td>
                                                <td><?= $order->tanggal_pembayaran ?></td>
                                                <td class="text-center">
                                                    <h4><span class="badge badge-primary"><?= ucwords( $order->status)?></span></h4>
                                                </td>
                                                <td align="center">
                                                    <button type="button" class="btn btn-info btn-sm detail" data-toggle="modal" data-target="#detail" data="<?= $order->id_pemesanan?>">
                                                        <i class="fa fa-info-circle"></i>
                                                    </button>
                                            <?php if ($order->ket == 8||$order->ket == 5) : ?>
                                                    <button class="btn btn-success btn-sm confirm" data-toggle="modal" data-target=".anu" data="<?= $order->id_pemesanan?>">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                            <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

    <!-- DETAIL PEMBAYARAN -->
    <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalCenterTitle">Detail Pembayaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <small>Kode Pemesanan</small><br>
                            <h6><b class="text-info id_pemesanan"></b></h6>
                            <small>Tanggal Pembayaran</small>
                            <h6><b class="text-info tanggal_pembayaran"></b></h6>
                        </div>
                        <div class="col-md-6 border-left">
                            <small>Status</small>
                            <h6><b class="text-info status"></b></h6>
                            <a class="text-dark bukti" href="" target="_blank"><b>BUKTI PEMBAYARAN</b></a>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-md-6 d-flex flex-column barang">
                            
                        </div>
                        <div class="col-md-6 d-flex flex-column border-left keterangan">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- KONFIRMASI PEMBAYARAN -->
    <div class="modal fade anu" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" class="yes my-2" action="">
                        <h6><b>Bukti Pembayaran</b></h6><br>
                        <a class="text-info struk" href="" target="_blank">
                        <img class="rounded mr-3 foto_struk" id="cover2" src=""></a>
                        <div class="form-group">
                        <input name="nominal" type="hidden" class="form-control nominal" placeholder="Jumlah yang sudah dibayar" type="number" value="">
                        </div>
                        <button type="submit" class="btn btn-info btn-block">Input Pembayaran</button>
                    </form>
                    <a href="" class="btn btn-outline-danger btn-block hapus">Bukti Pembayaran Tidak Valid</a>
                </div>
            </div>
        </div>
    </div>
                            </div>
                    </div>
                </div>
            </div>
            <!-- .animated -->
    </div>

    <!-- END CONTENT -->

    <!-- FOOTER -->
        <?php $this->load->view('partial/admin/footer');?>
    </div>

<!-- LIBRARY JS -->
    <?php $this->load->view('partial/admin/js');?>
    
    <script type="text/javascript">
        var url_get = "";
        var id = "";
        var pay ="";
        var foto = "";
        $(".detail").on("click", function(){
            url_get = "<?= base_url('admin/pembayaran/detail/') ?>";
            var id = $(this).attr("data");
            $.ajax({
                url: url_get+id,
                type: 'get',
                dataType: 'json',
                success: function(result) {
                    pay = result;
                    $('.id_pemesanan').html(pay[0].id_pemesanan.toUpperCase());
                    $('.tanggal_pembayaran').html(pay[0].tanggal_pembayaran);
                    $('.status').html(pay[0].status);
                    $('.barang').html(
                        "<small>Total Harga&nbsp;("+pay[0].jumlah+"&nbsp;produk)</small>"+
                        "<small>Total Ongkos Kirim&nbsp;("+pay[0].berat+"&nbsp;gram)</small>"+
                        "<small>Total Pembayaran</small>"+
                        "<small>Total Tagihan</small>"
                    );
                    $('.keterangan').html(
                        "<small><b>Rp.&nbsp;"+pay[0].tagihan+"</b></small>"+
                        "<small><b>Rp.&nbsp;"+pay[0].ongkir+"</b></small>"+
                        "<small><b>Rp.&nbsp;"+pay[0].nominal+"</b></small>"+
                        "<small><b class='text-info'>Rp.&nbsp;"+pay[0].total_tagihan+"</b></small>"
                    );
                    $('.bukti').attr('href', "<?= base_url('upload/pembayaran/')?>"+pay[0].bukti_pembayaran);
                }
            });
        });

        $(".hapus").on("click", function(){
            var link = $(this).attr("data");
            
        });

        $(".confirm").on("click", function(){
            var link = $(this).attr("data");
            $('.yes').attr("action", "<?= base_url('admin/pembayaran/tambah/'); ?>"+link);
            $('.hapus').attr("href", "<?= base_url('admin/pembayaran/batal/'); ?>"+link);
            
            url_get = "<?= base_url('admin/pembayaran/detail/') ?>";
            var id = $(this).attr("data");
            $.ajax({
                url: url_get+id,
                type: 'get',
                dataType: 'json',
                success: function(result) {
                    foto = result;
                    $('.nominal').val(foto[0].total_tagihan);
                    $('.struk').attr('href', "<?= base_url('upload/pembayaran/')?>"+foto[0].bukti_pembayaran);
                    $('.foto_struk').attr('src', "<?= base_url('upload/pembayaran/') ?>"+foto[0].bukti_pembayaran);
                }
            });
        });
        
        String.prototype.capitalize = function() {
          return this.charAt(0).toUpperCase() + this.slice(1)
        }
    </script>
</body>
</html>