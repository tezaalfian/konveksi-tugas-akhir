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
                                            <th>Kode Pemesanan</th>
                                            <th>Alamat Pengiriman</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pengiriman as $order): ?>
                                            <tr>
                                                <td>
                                                    <?php echo strtoupper($order->pemesanan_id); ?>
                                                </td>
                                                <td>
                                                    <h6><b><?php echo ucwords($order->nama_penerima) ?></b></h6>
                                                    <span><?= $order->alamat ?>,&nbsp;
                                                        Kota&nbsp;<?= $order->kota ?>,
                                                    &nbsp;<?= $order->kode_pos ?>      
                                                    </span>
                                                    <h6><?= ucwords($order->provinsi) ?></h6>
                                                </td>
                                                <td class="text-center">
                                                    <h4><span class="badge badge-primary"><?= ucwords( $order->status)?></span></h4>
                                                </td>
                                                <td align="center">
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail">
                                                        <i class="fa fa-info-circle"></i>
                                                    </button>
                                            <?php if ($order->status_id == 2||$order->status_id == 3||$order->status_id == 4) : ?>
                                                    <a href="<?= base_url('admin/pengiriman/edit/'.$order->pemesanan_id); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                            <?php endif; ?>
                                            <?php if ($order->status_id == 5) : ?>
                                                    <button data-toggle="modal" data-target="#kirim" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                                            <?php endif; ?>
                                                </td>
                                            </tr>
                                    <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalCenterTitle">Detail Pengiriman</h4>
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
                                                <div class="col-md-6">
                                                    <small>Tanggal Dikirim</small>
                                                        <h6 class="text-info"><b><?= strtoupper($order->tanggal_dikirim) ?></b></h6>
                                                    <small>Tanggal Diterima</small>
                                                        <h6 class="text-info"><b><?= strtoupper($order->tanggal_diterima) ?></b></h6>
                                                </div>
                                            </div><hr>
                                            <div class="row">
                                                <div class="col-md-6 d-flex flex-column">
                                                    <small><b>Alamat Pengiriman</b></small>
                                                    <small><?= strtoupper($order->kurir) ?></small>
                                                    <small>Dikirim kepada :&nbsp;<b><?= ucwords($order->nama_penerima) ?></b></small>
                                                    <small><?= ucwords($order->alamat) ?></small>
                                                    <small>Kota&nbsp;<?= ucwords($order->kota) ?>, 
                                                                            Kode pos&nbsp;<?= ucwords($order->kode_pos) ?></small>
                                                    <small><?= ucwords($order->provinsi) ?></small>
                                                    <small>Telp :&nbsp;<?= ucwords($order->no_hp) ?></small>
                                                </div>
                                                <div class="col-md-6">
                                                    <small><b>Ongkos Kirim</b></small>
                                                        <h6 class="text-info"><b>Rp.&nbsp;<?= strtoupper($order->ongkir) ?></b></h6>
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                        <div class="modal fade" id="kirim" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Pengiriman Pesanan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <form method="post" action="<?= base_url('admin/pengiriman/kirim/'.$order->id_pemesanan); ?>">
                                                        <div class="form-group">
                                                        <input name="no_resi" type="number" class="form-control" placeholder="Masukkan No Resi" type="number" min="0" required>
                                                            <div class="invalid-feedback">
                                                                <?php echo form_error('nominal')?>
                                                            </div>
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