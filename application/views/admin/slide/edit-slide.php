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
                            <a href="<?= base_url('admin/slide'); ?>">
                                <button type="button" class="btn btn-info">
                                    <i class="fa fa-angle-left"></i>&nbsp; Kembali
                                </button>
                            </a>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/slide/edit/'.$slide->id);?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card" style="border: solid #d4d4d4 1px;">
                                            <div class="card-body">
                                                <div class="image2">
                                                    <img class="image-fit rounded" src="<?=base_url('upload/slide/'.$slide->slide); ?>">
                                                </div><br>
                                                <div class="custom-file">
                                                    <input name="slide" type="file" class="custom-file-input" id="customFilen" accept=".jpg,.jpeg,.png" required>
                                                    <input type="hidden" name="id" value="<?= $slide->id ?>">
                                                    <label class="custom-file-label" for="customFile">Pilih foto</label>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <small>Besar file : maksimum 10 Mb</small><br>
                                                <small>Ekstensi file yang diperbolehkan : .JPG .JPEG .PNG</small>
                                            </div>
                                        </div>
                                        <button class="btn btn-success" type="submit">Simpan</button>
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