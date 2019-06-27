
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
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Pelanggan</th>
                                            <th>Produk</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pemesanan as $order): ?>
                                            <tr>
                                                <td>
                                                    <?php echo strtoupper($order->id_pemesanan); ?>
                                                </td>
                                                <td>
                                                    <?php echo $order->username ?>
                                                </td>
                                                <td>
                                                    <?php echo $order->nama?>
                                                </td>
                                                <td>
                                                    <?php echo $order->tanggal_pemesanan?>
                                                </td>
                                                <td align="center">
                                                    <h4><span class="badge badge-primary"><?= ucwords( $order->status)?></span></h4>
                                                </td>
                                                <td align="center">
                                                    <button type="button" class="btn btn-danger hapus btn-sm" data-toggle="modal" data-target="#mediumModal" data="<?= $order->id_pemesanan ?>">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                        <?php if ($order->status_id == 1) : ?>
                                                    <a href="<?= base_url('admin/pemesanan/edit/'.$order->id_pemesanan); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                        <?php endif; ?>
                                            <?php if ($order->status_id == 4) : ?>
                                                <button type="button" class="btn btn-success btn-sm confirm" data-toggle="modal" data-target="#end" data="<?= $order->id_pemesanan ?>" ><i class="fa fa-edit"></i></button>
                                            <?php endif; ?>
                                                    <button type="button" data="<?= $order->id_pemesanan ?>" class="detail btn btn-info btn-sm" data-toggle="modal" data-target="#detail"><i class="fa fa-info-circle"></i></button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
    <div class="modal fade" id="end" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pesanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah proses pengerjaan barang selesai ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <a href="" class="btn btn-primary yes">Konfirmasi</a>
                    </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
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
                    <a class="btn btn-primary delete">
                        Confirm
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL DETAIL PEMESANAN -->
    <div id="detail" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                    <div class="row pb-2 border-bottom">
                        <div class="col-md-6">
                        <small>Kode Pemesanan</small>
                        <h6 class="text-info"><b class="id_pesan"></b></h6>
                        <small>Status</small>
                        <h6 class="text-info"><b class="status"></b></h6>
                    </div>
                    <div class="col-md-6 border-left">
                        <small>Tanggal Pemesanan</small>
                        <h6 class="text-info"><b class="tanggal_pesan"></b></h6>
                        <small>Pelanggan</small>
                        <h6 class="text-info"><b class="username"></b></h6>
                    </div>
                </div>
                    <div class="row py-2 my-2 border-bottom">
                        <div class="col-md-6">
                            <div class="d-flex justify-content-start">
                                <a class="link_foto" href="" target="_blank">
                                    <img class="rounded mr-3 desain" id="cover" src="">
                                </a>
                                <div class="d-flex flex-column">
                                    <small>Data Produk</small>
                                    <h6 class="text-info"><b class="deskripsi">
                                        
                                    </b></h6>
                                    <small class="d-flex justify-content-start">
                                        <b class="jumlah_berat"></b>
                                        &nbsp;x&nbsp;
                                        <b class="harga"></b>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 border-left">
                            <small>Total Harga</small>
                            <h6 class="text-info"><b class="tagihan"></b></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                                </table>
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
    <!-- MODAL HAPUS -->

<!-- LIBRARY JS -->
    <?php $this->load->view('partial/admin/js');?>

    <script type="text/javascript">
        var url_get = "";
        var id = "";
        var anu = "teing ";
        var order ="";
        $(".detail").on("click", function(){
            url_get = "<?= base_url('admin/pemesanan/detail/') ?>";
            var id = $(this).attr("data");
            $.ajax({
                url: url_get+id,
                type: 'get',
                dataType: 'json',
                success: function(result) {
                    order = result;
                    $(".id_pesan").html(order[0].id_pemesanan.toUpperCase());
                    $('.tagihan').html('Rp. '+order[0].tagihan);
                    $('.harga').html('Rp. '+order[0].harga);
                    $('.jumlah_berat').html(order[0].jumlah+" barang ("+order[0].weight+" gram)");
                    $('.deskripsi').html(order[0].nama+" | "+order[0].deskripsi);
                    $('.status').html(order[0].status);
                    $('.tanggal_pesan').html(order[0].tanggal_pemesanan);
                    $('.username').html(order[0].username);
                    $('.link_foto').attr('href', "<?= base_url('upload/pemesanan/')?>"+order[0].desain);
                    $('.desain').attr('src', "<?= base_url('upload/pemesanan/')?>"+order[0].desain);
                }
            });
        });

        $(".hapus").on("click", function(){
            var link = $(this).attr("data");
            $('.delete').attr("href", "<?= base_url('admin/pemesanan/delete/');?>"+link)
        });

        $(".confirm").on("click", function(){
            var link = $(this).attr("data");
            $('.yes').attr("href", "<?= base_url('admin/pemesanan/selesai/'); ?>"+link)
        });
        
        String.prototype.capitalize = function() {
          return this.charAt(0).toUpperCase() + this.slice(1)
        }
    </script>

    
</body>
</html>