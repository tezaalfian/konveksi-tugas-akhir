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

    <!-- END CONTENT -->
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= base_url('admin/medsos'); ?>">
                                <button type="button" class="btn btn-info">
                                    <i class="fa fa-angle-left"></i>&nbsp; Kembali
                                </button>
                            </a>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/medsos/edit/'.$medsos->id);?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama">Akun</label>
                                            <input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" type="text" name="nama" value="<?= $medsos->nama ?>" >
                                        </div>

                                        <div class="form-group">
                                            <label for="icon">Icon</label>
                                            <input class="form-control <?php echo form_error('icon') ? 'is-invalid':'' ?>" type="text" name="icon" value="<?= $medsos->kode ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="link">Link</label>
                                            <input class="form-control <?php echo form_error('link') ? 'is-invalid':'' ?>" type="text" name="link" value="<?= $medsos->link ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="link"></label><br>
                                            <button class="btn btn-success" type="submit">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>   
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div>
    <!-- FOOTER -->
        <?php $this->load->view('partial/admin/footer');?>
    </div>

<!-- LIBRARY JS -->
    <?php $this->load->view('partial/admin/js');?>
</body>
</html>