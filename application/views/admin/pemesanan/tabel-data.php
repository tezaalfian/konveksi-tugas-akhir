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
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#mediumModal">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                        <?php if ($order->status_id == 1) : ?>
                                                    <a href="<?= base_url('admin/pemesanan/edit/'.$order->id_pemesanan); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                        <?php endif; ?>
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail"><i class="fa fa-info-circle"></i></button>
                                                </td>
                                            </tr>
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
                                                    <a href="<?= base_url('admin/pemesanan/delete/'.$order->id_pemesanan); ?>" class="btn btn-primary">
                                                        Confirm
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                                    <h6 class="text-info"><b><?= strtoupper($order->id_pemesanan) ?>
                                                    &nbsp;
                                                    </b></h6>
                                                    <small>Status</small>
                                                    <h6 class="text-info"><b><?= ucwords($order->status) ?></b></h6>
                                                </div>
                                                <div class="col-md-6 border-left">
                                                    <small>Tanggal Pemesanan</small>
                                                    <h6 class="text-info"><b><?= ucwords($order->tanggal_pemesanan) ?></b></h6>
                                                    <small>Pelanggan</small>
                                                    <h6 class="text-info"><b><?= ucwords($order->username) ?></b></h6>
                                                </div>
                                            </div>
                                            <div class="row py-2 my-2 border-bottom">
                                                <div class="col-md-6">
                                                    <div class="d-flex justify-content-start">
                                                        <a href="<?= base_url('upload/pemesanan/'.$order->desain) ?>" target="_blank">
                                                            <img class="rounded mr-3" id="cover" src="<?= base_url('upload/pemesanan/'.$order->desain) ?>">
                                                        </a>
                                                        <div class="d-flex flex-column">
                                                            <small>Data Produk</small>
                                                            <h6 class="text-info"><b>
                                                                <?= ucwords($order->nama) ?>&nbsp;/&nbsp;
                                                                <?= ucwords($order->deskripsi) ?>
                                                            </b></h6>
                                                            <small class="d-flex justify-content-start">
                                                                <b><?= $order->jumlah?>&nbsp;Produk&nbsp;
                                                                (<?= $order->weight?>&nbsp;gr)</b>&nbsp;x&nbsp;
                                                                <b>Rp.&nbsp;<?= $order->harga?>&nbsp;</b>
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 border-left">
                                                    <small>Total Harga</small>
                                                    <h6 class="text-info"><b>Rp.&nbsp;<?= strtoupper($order->tagihan) ?></b></h6>
                                                </div>
                                            </div>
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