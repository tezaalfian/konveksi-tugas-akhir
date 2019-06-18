<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('partial/client/css');?>
</head>
<body>
<!-- SIDEBAR -->
    <?php $this->load->view('partial/client/sidebar');?>

    <div id="right-panel" class="right-panel">
    <!-- HEADER -->
        <?php $this->load->view('partial/client/header');?>

        <?php $this->load->view('partial/client/breadcrumb');?>

    <!-- END CONTENT -->
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div>
    <!-- FOOTER -->
        <?php $this->load->view('partial/client/footer');?>
    </div>

<!-- LIBRARY JS -->
    <?php $this->load->view('partial/client/js');?>
    
</body>
</html>