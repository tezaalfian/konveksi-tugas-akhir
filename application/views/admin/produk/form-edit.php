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
                            <form action="<?= base_url('admin/produk/edit/').$produk->id;?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="foto">Foto</label>
                                            <img src="<?=base_url('upload/produk/'.$produk->foto); ?>" class="img-thumbnail">
                                            <input type="hidden" name="old_foto" value="<?= $produk->foto ?>"/>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFilen" name="foto" value="<?= $produk->foto ?>">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?php echo form_error('foto')?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-9">
                                        <input type="hidden" name="id" value="<?php echo $produk->id?>" />
                                        <div class="form-group">
                                            <label for="nama">Nama*</label>
                                            <input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" type="text" name="nama" placeholder="Nama produk" value="<?= $produk->nama ?>">
                                            <div class="invalid-feedback">
                                                <?php echo form_error('nama') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="harga">Harga*</label>
                                            <input class="form-control <?php echo form_error('harga') ? 'is-invalid':'' ?>" type="number" name="harga" min="0" placeholder="Harga produk" value="<?= $produk->harga ?>">
                                            <div class="invalid-feedback">
                                                <?php echo form_error('harga') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi*</label>
                                            <textarea class="form-control <?php echo form_error('deskripsi') ? 'is-invalid':'' ?>" name="deskripsi" placeholder="Deskripsi produk..."><?= $produk->deskripsi ?></textarea>
                                            <div class="invalid-feedback">
                                                <?php echo form_error('deskripsi'); ?>
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