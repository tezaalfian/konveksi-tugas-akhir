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
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="card text-white bg-flat-color-1">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="count_order"></h3>
                                    <p class="text-light mt-1 m-0">Pemesanan</p>
                                </div>
                                <div class="card-right float-right text-right">
                                    <i class="icon fade-5 icon-lg pe-7s-cart"></i>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card text-white bg-flat-color-2">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="count-pay"></h3>
                                    <p class="text-light mt-1 m-0">Uang Masuk</p>
                                </div>
                                <div class="card-right float-right text-right">
                                    <i class="icon fade-5 icon-lg far fa-money-bill-alt"></i>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card text-white bg-flat-color-3">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="count-user">
                                        
                                    </h3>
                                    <p class="text-light mt-1 m-0">Pelanggan</p>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                    <i class="icon fade-5 icon-lg pe-7s-users"></i>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </div>
                </div>
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