
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
                                <!-- <a href="<?= base_url('admin/pengiriman/tambah'); ?>">
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
                                            <th>Alamat Pengiriman</th>
                                            <th>Tanggal Dikirim</th>
                                            <th>Tanggal Diterima</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php var_dump($pengiriman); ?>
                                        <?php foreach ($pengiriman as $order): ?>
                                            <tr>
                                                <td>
                                                    <?php echo strtoupper($order->pemesanan_id); ?>
                                                </td>
                                                <td>
                                                    <?php echo $order->nama_penerima ?>
                                                </td>
                                                <td>
                                                    
                                                </td>
                                                <td>
                                                    <?php echo $order->tanggal_dikirim?>
                                                </td>
                                                <td>
                                                    <h4><span class="badge badge-primary"><?= ucwords( $order->status)?></span></h4>
                                                </td>
                                                <td align="center">
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#mediumModal">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <a href="<?= base_url('admin/pengiriman/edit/'.$order->pemesanan_id); ?>" class="btn btn-success btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <!-- <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
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
                                        <a href="<?= base_url('admin/pengiriman/delete/'.$order->id_pengiriman); ?>" class="btn btn-primary">
                                            Confirm
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
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