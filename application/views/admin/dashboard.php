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
                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-flat-color-1">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="currency float-left mr-1"></span>
                                        <span class="count"></span>
                                    </h3>
                                    <p class="text-light mt-1 m-0">Pemesanan</p>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                    <i class="icon fade-5 icon-lg pe-7s-cart"></i>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </div>
                    <!--/.col-->

                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-flat-color-6">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="count float-left">85</span>
                                        <span>%</span>
                                    </h3>
                                    <p class="text-light mt-1 m-0">Dummy text here</p>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                    <div id="flotBar1" class="flotBar1" style="padding: 0px; position: relative;"><canvas class="flot-base" width="76" height="75" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 76px; height: 75px;"></canvas><canvas class="flot-overlay" width="76" height="75" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 76px; height: 75px;"></canvas></div>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </div>
                    <!--/.col-->

                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-flat-color-3">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="count">6569</span>
                                    </h3>
                                    <p class="text-light mt-1 m-0">Total clients</p>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                    <i class="icon fade-5 icon-lg pe-7s-users"></i>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </div>
                    <!--/.col-->

                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-flat-color-2">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="count">1490</span>
                                    </h3>
                                    <p class="text-light mt-1 m-0">New users</p>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                    <div id="flotLine1" class="flotLine1" style="padding: 0px; position: relative;"><canvas class="flot-base" width="76" height="75" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 76px; height: 75px;"></canvas><canvas class="flot-overlay" width="76" height="75" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 76px; height: 75px;"></canvas></div>
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

    <script type="text/javascript">
        var order = "";
        $(document).ready(function(){
            url_get = "<?= base_url('admin/dashboard/order') ?>";
            $.ajax({
                url: url_get,
                type: 'get',
                dataType: 'json',
                success: function(result) {
                    console.log(result);
                    order = result.length;
                    $('#order').html(order);
                }
            });
        });
    </script>
    
</body>
</html>