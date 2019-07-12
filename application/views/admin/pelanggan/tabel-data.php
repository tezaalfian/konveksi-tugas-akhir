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
                                <a href="<?= base_url('admin/pelanggan/tambah'); ?>">
                                <button type="button" class="btn btn-info">
                                    <i class="fa fa-plus"></i>&nbsp; Tambah Baru
                                </button>
                                </a>
                            </div>
                            <div class="card-body">
                                <?= $this->session->flashdata('message'); ?>
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>No. Hp</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pelanggan as $user): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $user->username ?>
                                                </td>
                                                <td>
                                                    <?php echo $user->email ?>
                                                </td>
                                                <td>
                                                    <?php echo $user->no_hp?>
                                                </td>
                                                <td>
                                                    <?php echo $user->jenis_kelamin?>
                                                </td>
                                                <td align="center">
                                                    <button type="button" class="btn btn-danger btn-sm hapus" data-toggle="modal" data-target="#mediumModal" data="<?= $user->id_user ?>">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <a href="<?= base_url('admin/pelanggan/edit/'.$user->id_user); ?>" class="btn btn-success btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
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
                                            <a href="" class="btn btn-primary delete">Confirm</a>
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
    <?php $this->load->view('partial/admin/js');?>
    
    <script type="text/javascript">
        $(".hapus").on("click", function(){
            var link = $(this).attr("data");
            $('.delete').attr("href", "<?= base_url('admin/pelanggan/delete/');?>"+link)
        });
    </script>
</body>
</html>