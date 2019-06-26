
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
                                <!-- <a href="<?= base_url('admin/pemesanan/tambah'); ?>">
                                <button type="button" class="btn btn-info">
                                    <i class="fa fa-plus"></i>&nbsp; Tambah Baru
                                </button>
                                </a> -->
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kode Pemesanan</th>
                                            <th>Jumlah Pembayaran</th>
                                            <th>Total Tagihan</th>
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
                                                    Rp.&nbsp;<?= $order->nominal ?>
                                                </td>
                                                <td>
                                                    Rp.&nbsp;<?= $order->total_tagihan ?>
                                                </td>
                                                <td class="text-center">
                                                    <h4><span class="badge badge-primary"><?= ucwords( $order->status)?></span></h4>
                                                </td>
                                                <td align="center">
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail">
                                                        <i class="fa fa-info-circle"></i>
                                                    </button>
                                            <?php if ($order->ket == 8||$order->ket == 5) : ?>
                                                    <button class="btn btn-success btn-sm"><i class="fa fa-edit" data-toggle="modal" data-target=".anu"></i></button>
                                            <?php endif; ?>
                                                </td>
                                            </tr>
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
                                                                <small>Kode Pemesanan</small>
                                                                    <h6 class="text-info"><b><?= strtoupper($order->id_pemesanan) ?></b></h6>
                                                                <small>Status</small>
                                                                    <h6 class="text-info"><b><?= ucwords($order->status) ?></b></h6>
                                                            </div>
                                                            <div class="col-md-6 border-left">
                                                                <small>Bukti Pembayaran</small><br>
                                                                <a class="text-info" href="<?= base_url('upload/pembayaran/'.$order->bukti_pembayaran) ?>" target="_blank">
                                                                    <img class="rounded mr-3" id="cover2" src="<?= base_url('upload/pembayaran/'.$order->bukti_pembayaran) ?>">
                                                                </a>
                                                            </div>
                                                        </div><hr>
                                                        <div class="row">
                                                            <div class="col-md-6 d-flex flex-column">
                                                                <small>Total Harga&nbsp;(<?= $order->jumlah?>&nbsp;produk)</small>
                                                                <small>Total Ongkos Kirim&nbsp;(<?= $order->berat?>&nbsp;gram)</small>
                                                                <small>Total Pembayaran</small>
                                                                <small>Total Tagihan</small>
                                                            </div>
                                                            <div class="col-md-6 d-flex flex-column border-left">
                                                                <small><b>Rp.&nbsp;<?= $order->tagihan?></b></small>
                                                                <small><b>Rp.&nbsp;<?= $order->ongkir?></b></small>
                                                                <small><b>Rp.&nbsp;<?= $order->nominal?></b></small>
                                                                <small><b class="text-info">Rp.&nbsp;<?= $order->total_tagihan?></b></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade anu" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Input Jumlah Pembayaran</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <form method="post" action="">
                                                        <div class="form-group">
                                                            <input type="email" class="form-control" placeholder="Jumlah yang sudah dibayar" type="number" min="0">
                                                        </div>
                                                        <button type="submit" class="btn btn-info btn-block">Submit</button>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </tbody>
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

<!-- LIBRARY JS -->
    <?php $this->load->view('partial/admin/js');?>
    
</body>
</html>