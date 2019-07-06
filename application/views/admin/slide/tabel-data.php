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
                                <a href="<?= base_url('admin/slide/tambah'); ?>">
                                <button type="button" class="btn btn-info">
                                    <i class="fa fa-plus"></i>&nbsp; Tambah Baru
                                </button>
                                </a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="50">No</th>
                                            <th>Slide</th>
                                            <th width="100">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($slide as $fitur): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no++ ?>
                                                </td>
                                                <td>
                                                    <img src="<?= base_url('upload/slide/'.$fitur->slide) ?>"class="thumbnail2 rounded" />
                                                </td>
                                                <td align="center">
                                                    <button type="button" class="btn btn-danger btn-sm hapus" data-toggle="modal" data-target="#mediumModal" data="<?= $fitur->id ?>">
                                                      <i class="fa fa-trash"></i>
                                                    </button>
                                                    <a href="<?= base_url('admin/slide/edit/'.$fitur->id); ?>" class="btn btn-success btn-sm">
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
                                                    <a href="" class="btn btn-primary delete">
                                                        Confirm
                                                    </a>
                                                </div>
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
        $(".hapus").on("click", function(){
            var link = $(this).attr("data");
            $('.delete').attr("href", "<?= base_url('admin/slide/hapus/');?>"+link)
        });
    </script>
    
</body>
</html>