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
                            <a href="<?= base_url('admin/produk'); ?>">
                                <button type="button" class="btn btn-info">
                                    <i class="fa fa-angle-left"></i>&nbsp; Kembali
                                </button>
                            </a>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/produk/tambah');?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="foto">Foto</label>
                                            <img src="<?=base_url('upload/produk/default.jpg'); ?>" class="img-thumbnail">
                                            <input class="form-control-file <?php echo form_error('foto') ? 'is-invalid':'' ?>" type="file" name="foto">
                                            <div class="invalid-feedback">
                                                <?php echo form_error('foto')?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="nama">Nama*</label>
                                            <input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" type="text" name="nama" placeholder="Nama produk">
                                            <div class="invalid-feedback">
                                                <?php echo form_error('nama') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="harga">Harga*</label>
                                            <input class="form-control <?php echo form_error('harga') ? 'is-invalid':'' ?>" type="number" name="harga" min="0" placeholder="Harga produk">
                                            <div class="invalid-feedback">
                                                <?php echo form_error('harga') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi*</label>
                                            <textarea class="form-control <?php echo form_error('deskripsi') ? 'is-invalid':'' ?>" name="deskripsi" placeholder="Deskripsi produk..."></textarea>
                                            <div class="invalid-feedback">
                                                <?= form_error('deskripsi'); ?>
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