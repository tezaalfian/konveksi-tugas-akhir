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
                            <a href="<?= base_url('admin/administrator'); ?>">
                                <button type="button" class="btn btn-info">
                                    <i class="fa fa-angle-left"></i>&nbsp; Kembali
                                </button>
                            </a>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/administrator/tambah');?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card" style="border: solid #d4d4d4 1px;">
                                            <div class="card-body">
                                            <div class="form-group">
                                                <div class="image">
                                                        <img class="image-fit rounded" src="<?=base_url('upload/administrator/default.jpg'); ?>">
                                                    </div>
                                                <br>
                                                <div class="custom-file">
                                                  <input type="file" class="custom-file-input" id="customFilen" name="foto" accept=".jpg,.jpeg,.png">
                                                  <label class="custom-file-label" for="customFile">Pilih Foto</label>
                                                </div>
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('foto')?>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="card-footer">
                                                <small>Besar file : maksimum 10 Mb</small><br>
                                                <small>Ekstensi file yang diperbolehkan : .JPG .JPEG .PNG</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="nama">Nama*</label>
                                            <input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" type="text" name="nama" placeholder="Nama" value="<?= set_value('nama'); ?>">
                                            <div class="invalid-feedback">
                                                <?php echo form_error('nama') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="username">Username*</label>
                                            <input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>" type="text" name="username" placeholder="username" value="<?= set_value('username'); ?>">
                                            <div class="invalid-feedback">
                                                <?php echo form_error('username') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password*</label>
                                            <input type="password" class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>" name="password" placeholder="password">
                                            <div class="invalid-feedback">
                                                <?= form_error('password'); ?>
                                            </div>
                                        </div>
                                        <button class="btn btn-success" type="submit" name="btn">Simpan</button>
                                    </div>
                                </div>
                            </form>   
                        </div>
                        <div class="card-footer small text-muted">
                            *wajib diisi
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